<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Requesst;
use App\Models\User;
use App\Models\FDoctor;
use App\Models\NDoctor;
use Auth;
use Carbon\Carbon;

class RequestController extends Controller
{
    public function DoctorRequests  ()
    {
        $users = User::all();
        $fdoctors = FDoctor::all();
        $requests = Requesst::all();
        return view('ndoctor.requests.requests',compact('requests','users','fdoctors'));
    }

    public function FDoctorRequests  ()
    {
        $requests = Requesst::all();
        return view('fdoctor.requests.requests',compact('requests'));
    }

    public function AdminRequests   ()
    {
        $requests = Requesst::all();
        return view('admin.requests.requests',compact('requests'));
    }

    public function PatientRequests    ()
    {
        $requests = Requesst::all();
        return view('patient.requests',compact('requests'));
    }

   public function StoreRequestt(Request $request)
    {
        $requests =  new Requesst();
        $requests->user_id = $request->user_id;
        $requests->ndoctor_id = Auth::guard('ndoctor')->user()->id;
        $requests->fdoctor_id = $request->fdoctor_id;
        $requests->test_result = $request->test_result;
        $requests->ndoctor_details = $request->ndoctor_details;
        $requests->save();
       
        $notification = array(
            'message' => 'Request Added Successfully ', 
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    public function DeleteRequest (Request $request)
    {
        try {
            $requests = Requesst::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Request Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function ViewRequest ($id){
        $requests = Requesst::findOrFail($id);
        return view('fdoctor.requests.view_requests',compact('requests'));
    } // End Method

    public function UpdateRequest (Request $request){
        $request_id = $request->id;
        Requesst::findOrFail($request_id)->update([
                'status' => $request->status,
                'fdoctor_details' => $request->fdoctor_details,
            ]); 
            $notification = array(
            'message' => 'Request Status Updated Successfully', 
            'alert-type' => 'info'
        );
        return redirect()->route('fdoctor.requests')->with($notification);
       
    } // End Method
}
