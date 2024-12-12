<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\IcsbBranchRequest;
use App\Models\IcsbBranch;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class IcsbBranchController extends Controller
{
    //

    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index(): View
    {
        $s['branches'] = IcsbBranch::where('deleted_at', null)->orderBy('order_key', 'ASC')->get();
        return view('backend.employee_pages.branches.index', $s);
    }
    public function create(): View
    {
        return view('backend.employee_pages.branches.create');
    }
    public function store(IcsbBranchRequest $request): RedirectResponse
    {
        $branch = new IcsbBranch();
        $branch->name = $request->name;
        $branch->slug = $request->slug;
        $branch->order_key = $request->order_key;
        $branch->address = $request->address;
        $branch->phone = $request->phone;
        $branch->email = $request->email;
        $branch->created_by = auth()->user()->id;
        $branch->save();
        return redirect()->route('branch.branch_list')->withStatus(__('Branch ' . $request->name . ' created successfully.'));
    }
    public function edit($id): View
    {
        $s['branch'] = IcsbBranch::findOrFail($id);
        return view('backend.employee_pages.branches.edit', $s);
    }
    public function update(IcsbBranchRequest $request, $id): RedirectResponse
    {
        $branch = IcsbBranch::findOrFail($id);

        $branch->name = $request->name;
        $branch->slug = $request->slug;
        $branch->order_key = $request->order_key;
        $branch->address = $request->address;
        $branch->phone = $request->phone;
        $branch->email = $request->email;
        $branch->updated_by = auth()->user()->id;
        $branch->update();

        return redirect()->route('branch.branch_list')->withStatus(__('Branch ' . $branch->name . ' updated successfully.'));
    }
    public function delete($id): RedirectResponse
    {
        $branch = IcsbBranch::findOrFail($id);
        $this->soft_delete($branch);
        return redirect()->route('branch.branch_list')->withStatus(__('Branch ' . $branch->name . ' deleted successfully.'));
    }
    public function status($id): RedirectResponse
    {
        $branch = IcsbBranch::findOrFail($id);
        $this->statusChange($branch);
        return redirect()->route('branch.branch_list')->withStatus(__($branch->name . ' status updated successfully.'));
    }
}