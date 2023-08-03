<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\SinglePages;

class SinglePagesController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }

    public function create(){

        return view('create_single');
    }

    public function store(Request $request){
        dd($request->all());
        $sp = new SinglePages;
        $sp->title = $request->title;
        $sp->frontend_slug  = $request->frontend_slug;
        $sp->page_key = $request->page_key;
        $sp->documentation = json_encode($request->documentation);
        $data = [];
        foreach($request->formdata as $key=>$formdata){
            if(isset($formdata['field_name'])){
                $data[$key]['field_key'] = Str::slug($formdata['field_name']);
                $data[$key]['field_name'] = $formdata['field_name'];
                $data[$key]['type'] = $formdata['type'];
                $data[$key]['required'] = $formdata['required'];

                if($formdata['type'] == 'option'){
                    $data[$key]['option_data']  = $this->convertOptionDataToArray($formdata['option_data']) ?? [];
                }
            }
        }

        $sp->form_data = json_encode($data);
        $sp->save();

        return redirect()->route('sp.create')->withStatus(__('Single page created successfully.'));
    }

    public function show($page_key){
        $details = SinglePages::where('page_key', $page_key)->latest()->get()->first();

        return view('show', ['details' => $details]);
    }

    public function form_store(Request $request, $page_key){
        $single_page = SinglePages::where('page_key', $page_key)->latest()->get()->first();
        $params = json_decode($single_page->form_data);
		$rules = [];
        $data = [];

        dd($request->all());

		if ($params != null) {
			foreach ($params as $key => $fd) {
				$rules[$fd->field_key] = [$fd->required];
                $input_name = $fd->field_key;

				if ($fd->type == 'text') {
					array_push($rules[$fd->field_key], 'string');
					array_push($rules[$fd->field_key], 'max:255');

					$data[$fd->field_key]=$request->$input_name;

				}elseif ($fd->type == 'number') {
					array_push($rules[$fd->field_key], 'numeric');
					array_push($rules[$fd->field_key], 'max:55');

					$data[$fd->field_key]=$request->$input_name;
				}elseif ($fd->type == 'url') {
					array_push($rules[$fd->field_key], 'url');

					$data[$fd->field_key]=$request->$input_name;
				}elseif ($fd->type == 'textarea') {

					$data[$fd->field_key]=$request->$input_name;
				}elseif ($fd->type == 'image') {
					array_push($rules[$fd->field_key], 'image');
					array_push($rules[$fd->field_key], 'mimes:jpeg,png,jpg,gif,svg');
					array_push($rules[$fd->field_key], 'max:2048');

                    try{
                        if($request->hasFile($input_name)){
                            $file = $request->file($input_name);

                            $customFileName = time().'.' . $file->getClientOriginalExtension();
                            $path = $file->storeAs('single-page/'.$input_name, $customFileName,'public');
                            $data[$fd->field_key]=$path;
                        }

                    }catch (\Exception $exp) {
                        session()->flash('error', 'Could not upload your ' . $fd->field_name);
                        return back()->withInput();
                    }
				}elseif ($fd->type == 'file_single') {
					array_push($rules[$fd->field_key], 'file');
					array_push($rules[$fd->field_key], 'mimes:jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx,odt,ods,odp');

				}elseif ($fd->type == 'file_multiple') {
					array_push($rules[$fd->field_key.'*'], 'url');

				}elseif ($fd->type == 'email'){
					array_push($rules[$fd->field_key], 'email');

					$data[$fd->field_key]=$request->$input_name;
                }elseif ($fd->type == 'option'){
                    $values = implode(',', array_keys((array)$fd->option_data));
					array_push($rules[$fd->field_key], 'in:'.$values);
					$data[$fd->field_key]=$request->$input_name;
                }
			}
		}
		$this->validate($request, $rules);

        $single_page->saved_data = json_encode($data);
        $single_page->save();
        return redirect()->back()->withStatus(__('Data has been saved successfully.'));

    }

    private function convertOptionDataToArray($optionData)
    {
        $optionsArray = [];
        $options = explode(';', $optionData);

        foreach ($options as $option) {
            $parts = explode('=', $option);
            if (count($parts) === 2) {
                $key = trim($parts[0]);
                $value = trim($parts[1]);
                $optionsArray[$key] = $value;
            }
        }

        return $optionsArray;
    }

    public function file_upload(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('uploads'); // Adjust the storage path as per your requirements.
            return response()->json(['success' => true, 'file_path' => $filePath]);
        }

        return response()->json(['success' => false, 'message' => 'File upload failed.']);
    }

}
