<?php

namespace App\Http\Controllers\AdminControllers;

use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index()
    {
        $items = Status::all();
        return view('admin.constant.status.index',compact('items'));
    }


    public function create()
    {
        return view('admin.constant.status.add');
    }

    public function store(Request $request)
    {
        $validation = $request->validate(Status::$rules);
        return(Status::saveStatus($request->all(), null));
    }

    public function edit($id)
    {
        $item = Status::where('id',$id)->first();
        return view('admin.constant.status.edit',compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate(Status::$rules);
        return(Status::saveStatus($request->all(), $id));
    }

    public function destroy($id)
    {
        $item = Status::where('id',$id)->first();
        if ($item) {
            $item->delete();
            toastr( 'Successful Delete',  'danger',  'Status');
            return redirect('admin/status');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/status'); 
    }
}
