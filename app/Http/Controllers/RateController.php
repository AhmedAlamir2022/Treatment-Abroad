<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\Hospital;
use Carbon\Carbon;

class RateController extends Controller
{
    
    public function index()
    {
        $hospital = Hospital::orderBy('title','ASC')->get();
        $rates = Rate::all();
        return view('admin.rates.rates',compact('rates','hospital'));
    }

    public function store(Request $request)
    {
        try {
            Rate::insert([
                'name' => $request->name,
                'hospital_id' => $request->hospital_id,
                'ndoctor_id' => $request->ndoctor_id,
                'fdoctor_id' => $request->fdoctor_id ,
                'rating' => $request->rating,
                'review' => $request->review,
                'created_at' => Carbon::now(),
            ]);
             $notification = array(
                'message' => 'Review Submited Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $rates = Rate::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Rate Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
