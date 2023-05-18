<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\NDoctor;
use App\Models\Complaint;
use Carbon\Carbon;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::all();
        return view('admin.complaints.complaints',compact('complaints'));
    }

    public function MyComplaints ()
    {
        $ndoctors = NDoctor::all();
        $complaints = Complaint::latest()->get();
        return view('patient.mycomplaints',compact('complaints','ndoctors'));
    }

    public function DoctorComplaints  ()
    {
        $complaints = Complaint::latest()->get();
        return view('ndoctor.complaints.complaints',compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    

    
    public function store(Request $request)
    {
        Complaint::insert([
            'user_id' => $request->user_id,
            'doctor_id' => $request->doctor_id,
            'complaint' => $request->complaint,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Complaint Send Successfully', 
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    
    public function edit($id)
    {
        $complaints = Complaint::findorfail($id);
        return view('ndoctor.complaints.complaint_view',compact('complaints'));
    }

    public function update(Request $request)
    {
        try {
            $complaint_id = $request->id;
            Complaint::findOrFail($complaint_id)->update([
                'respond' => $request->respond,
            ]); 
            $notification = array(
                'message' => 'Complaint Updated Successfully', 
                'alert-type' => 'info'
            );
            return back()->with($notification);
        
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $complaints = Complaint::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Complaint Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
