<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\User;
use Auth;
use Carbon\Carbon;


class TestController extends Controller
{
    public function DoctorTests ()
    {
        $users = User::all();
        $tests = Test::all();
        return view('ndoctor.tests.tests',compact('tests','users'));
    }

    public function StoreTest(Request $request){

        Test::insert([
            'user_id' => $request->user_id,
            'doctor_id' => Auth::guard('ndoctor')->user()->id,
            'date' => $request->date,
            'created_at' => Carbon::now(),

        ]); 
        $notification = array(
        'message' => 'Test Added Successfully', 
        'alert-type' => 'success'
    );
    return back()->with($notification);
   }// End Method

   public function EditTest($id){
    $tests = Test::findOrFail($id);
    return view('ndoctor.tests.edit_test',compact('tests'));
} // End Method

public function UpdateTest (Request $request){
    $test_id = $request->id;
    Test::findOrFail($test_id)->update([
            'approvment' => $request->approvment,
            'details' => $request->details,
        ]); 
        $notification = array(
        'message' => 'Test Status Updated Successfully', 
        'alert-type' => 'info'
    );
    return redirect()->route('doctor.tests')->with($notification);
   
} // End Method

    public function PatientTests   ()
    {
        $tests = Test::all();
        return view('patient.tests',compact('tests'));
    }

    public function AdminTests  ()
    {
        $users = User::all();
        $tests = Test::all();
        return view('admin.tests.tests',compact('tests','users'));
    }

    public function DeleteTest (Request $request)
    {
        try {
            $tests = Test::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Test Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
