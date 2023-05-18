<?php

namespace App\Http\Controllers;
use App\Models\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function index()
    {
        $quires = Query::latest()->get();
        return view('admin.quires.quires',compact('quires'));
    }

    public function update(Request $request)
    {
        $quires = Query::findOrFail($request->id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'details' => $request->details,
           ]); 

           $notification = array(
           'message' => 'Query Information Updated Successfully !! ', 
           'alert-type' => 'info'
       );
        return back()->with($notification);
    }
}
