<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeCategoryRequest;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use App\Models\NoticeCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Http\Traits\SendMailTrait;

class NoticeBoardController extends Controller
{
    //
    use SendMailTrait;

    public function __construct() {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['notices'] = Notice::with('category')->where('deleted_at',null)->latest()->get();
        $s['notice_categories'] = NoticeCategory::with('notices')->where('deleted_at',null)->latest()->get();
        $s['slug'] = "notice_board";
        return view('backend.notice_board.index',$s);
    }
    public function studentNotice(): View
    {
        $s['notices'] = Notice::with('category')->where('cat_id',1)->where('deleted_at',null)->latest()->get();
        $s['slug'] = "student_notice";
        return view('backend.notice_board.index',$s);
    }
    public function memberNotice(): View
    {
        $s['notices'] = Notice::with('category')->where('cat_id',2)->where('deleted_at',null)->latest()->get();
        $s['slug'] = "member_notice";
        return view('backend.notice_board.index',$s);
    }





    public function create(): View
    {
        $s['notice_cats'] = NoticeCategory::where('deleted_at', null)->where('status',1)->get();
        return view('backend.notice_board.create',$s);
    }
    public function store(NoticeRequest $request): RedirectResponse
    {
        $nc = NoticeCategory::findOrFail($request->cat_id);
        $notice = new Notice();
        $filteredFiles = array_filter($request->file, function ($entry) {
            return isset($entry['file_name']) && !is_null($entry['file_name']) &&
                   isset($entry['file_path']) && !is_null($entry['file_path']);
        });
        $data = array();
        if ($filteredFiles) {
            foreach ($request->file as $key => $file) {
                if (isset($file['file_name']) && isset($file['file_path'])) {
                    $input_file = $file['file_path'];
                    if (!empty($input_file)) {
                        $customFileName = $file['file_name'] . '.' . $input_file->getClientOriginalExtension();
                        $input_file->storeAs('notices/'.$nc->title.'/', $customFileName, 'public');

                        $data[$key]['file_path'] = 'notices/'.$nc->title.'/' . $customFileName;
                        $data[$key]['file_name'] = $file['file_name'];
                    }
                }
            }
        }
        $notice->files = json_encode($data);
        $notice->title = $request->title;
        $notice->cat_id = $request->cat_id;
        $notice->slug = $request->slug;
        $notice->description = $request->description;

        if($request->notify == 1 || $request->test_notify == 1){
            $notice->notify = $request->notify ?? 0;
            $notice->email_subject = $request->email_subject;
            $notice->email_body = $request->email_body;
        }
        $notice->created_by = auth()->user()->id;
        $notice->save();
        if($request->notify == 1){
            $this->send_member_email($notice);
        }
        if($request->test_notify == 1){
            $this->send_member_email($notice, $request->test_mail);
        }

        return redirect()->route('notice_board.notice_list')->withStatus(__('Notice '.$notice->title.' created successfully.'));
    }
    public function edit($id): View
    {
        $s['notice'] = Notice::findOrFail($id);
        $s['notice_cats'] = NoticeCategory::where('deleted_at', null)->where('status',1)->get();
        return view('backend.notice_board.edit',$s);
    }
    public function singleFileDelete($id, $key): RedirectResponse
    {
        $notice = Notice::findOrFail($id);
        $files = json_decode($notice->files, true);
        if (isset($files[$key])) {
            $filePathToDelete = $files[$key]['file_path'];
            unset($files[$key]);
            $notice->files = json_encode($files);
            $notice->save();
            $this->fileDelete($filePathToDelete);
        }
        return redirect()->back();
    }
     public function update(NoticeRequest $request , $id): RedirectResponse
    {
        $nc = NoticeCategory::findOrFail($request->cat_id);
        $notice = Notice::findOrFail($id);
        $filteredFiles = array_filter($request->file, function ($entry) {
            return isset($entry['file_name']) && !is_null($entry['file_name']) &&
                   isset($entry['file_path']) && !is_null($entry['file_path']);
        });
        if ($filteredFiles) {
            foreach ($request->file as $file) {
                $files = json_decode($notice->files, true);
                $input_file = $file['file_path'];
                if (!empty($input_file) && !empty($file['file_name'])) {
                    $customFileName = $file['file_name'] . '.' . $input_file->getClientOriginalExtension();
                    $input_file->storeAs('notices/'.$nc->title.'/', $customFileName, 'public');
                    $newFileName = $file['file_name'];
                    $newFilePath = 'notices/'.$nc->title.'/'.$customFileName;
                    array_push($files, ["file_path" => $newFilePath, "file_name" => $newFileName]);
                }
                $notice->files = json_encode($files);
            }
        }

        $notice->title = $request->title;
        $notice->cat_id = $request->cat_id;
        $notice->slug = $request->slug;
        $notice->description = $request->description;

        if($request->notify == 1 || $request->test_notify == 1){
            $notice->notify = $request->notify ?? 0;
            $notice->email_subject = $request->email_subject;
            $notice->email_body = $request->email_body;
        }
        $notice->updated_by = auth()->user()->id;
        $notice->save();
        if($request->notify == 1){
            $this->send_member_email($notice);
        }
        if($request->test_notify == 1){
            $this->send_member_email($notice, $request->test_mail);
        }
        return redirect()->route('notice_board.notice_list')->withStatus(__('Notice '.$notice->title.' updated successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $notice = Notice::findOrFail($id);
        $this->statusChange($notice);
        return redirect()->route('notice_board.notice_list')->withStatus(__($notice->title.' status updated successfully.'));
    }

    public function delete($id): RedirectResponse
    {
        $notice = Notice::findOrFail($id);
        $this->soft_delete($notice);
        return redirect()->route('notice_board.notice_list')->withStatus(__($notice->title.' deleted successfully.'));
    }


    public function nc_create(): View
    {
        return view('backend.notice_board.nc_create');
    }
    public function nc_store(NoticeCategoryRequest $request): RedirectResponse
    {
        $nc = new NoticeCategory();
        $nc->title = $request->title;
        $nc->slug = $request->slug;
        $nc->description = $request->description;
        $nc->created_by = auth()->user()->id;
        $nc->save();

        return redirect()->route('notice_board.notice_list')->withStatus(__('Notice category '.$nc->title.' created successfully.'));
    }
    public function nc_edit($id): View
    {
        $s['nc'] = NoticeCategory::findOrFail($id);
        return view('backend.notice_board.nc_edit',$s);
    }
     public function nc_update(NoticeCategoryRequest $request , $id): RedirectResponse
    {
        $nc = NoticeCategory::findOrFail($id);
        $nc->title = $request->title;
        $nc->slug = $request->slug;
        $nc->description = $request->description;
        $nc->updated_by = auth()->user()->id;
        $nc->save();

        return redirect()->route('notice_board.notice_list')->withStatus(__('Notice category '.$nc->title.' updated successfully.'));
    }
    public function nc_status($id): RedirectResponse
    {
        $nc = NoticeCategory::findOrFail($id);
        $this->statusChange($nc);
        return redirect()->route('notice_board.notice_list')->withStatus(__($nc->title.' status updated successfully.'));
    }

    public function nc_delete($id): RedirectResponse
    {
        $nc = NoticeCategory::findOrFail($id);
        if($nc->notices->count() > 0){
            return redirect()->route('notice_board.notice_list')->withStatus(__($nc->title.' has '.$nc->notices->count().' notices assigned. Can\'t be deleted. Best option is to deactivate it.'));
        }
        $this->soft_delete($nc);
        return redirect()->route('notice_board.notice_list')->withStatus(__($nc->title.' deleted successfully.'));
    }
}
