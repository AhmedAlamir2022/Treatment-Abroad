<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Doucment;
use App\Models\NDoctor;
use Carbon\Carbon;
use App\Http\Traits\AttachFilesTrait;

class DoucmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     use AttachFilesTrait;
    public function index()
    {
        $ndoctors = NDoctor::all();
        $doucments = Doucment::all();
        return view('patient.mydoucments',compact('doucments','ndoctors'));
    }

    
    public function doctorDoucments()
    {
        $doucments = Doucment::all();
        return view('ndoctor.doucments.mydoucments',compact('doucments'));
    }

    public function AdminDoucments()
    {
        $doucments = Doucment::all();
        return view('admin.doucments.doucments',compact('doucments'));
    }

     public function store(Request $request)
    {
        try {
            $doucment = new Doucment();
            $doucment->user_id = $request->user_id;
            $doucment->doctor_id  = $request->doctor_id ;
            $doucment->doucment =  $request->file('doucment')->getClientOriginalName();
            $doucment->save();
            $this->uploadFile($request,'doucment','Doucments');

            $notification = array(
                'message' => 'Doucment Added Successfully', 
                'alert-type' => 'success'
            );
            return back()->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
   
    public function EditDoucment ($id)
    {
        $doucments = Doucment::findorfail($id);
        return view('admin.doucments.edit_doucment',compact('doucments'));
    }

    public function edit($id)
    {
        $doucments = Doucment::findorfail($id);
        return view('ndoctor.doucments.doucment_view',compact('doucments'));
    }

    public function update(Request $request)
    {
        try {
            $doucment_id = $request->id;
            Doucment::findOrFail($doucment_id)->update([
                'dr_agreement' => $request->dr_agreement,
            ]); 
            $notification = array(
                'message' => 'Doctor Aggrement Updated Successfully', 
                'alert-type' => 'info'
            );
            return redirect()->route('doctor.doucments')->with($notification);
        
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function UpdateDoucment(Request $request)
    {
        try {
            $doucment_id = $request->id;
            Doucment::findOrFail($doucment_id)->update([
                'admin_agreement' => $request->admin_agreement,
            ]); 
            $notification = array(
                'message' => 'Admin Aggrement Updated Successfully', 
                'alert-type' => 'info'
            );
            return redirect()->route('admin.doucments')->with($notification);
        
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function downloadAttachment($filename)
    {
        return response()->download(public_path('Attachments/Doucments/'.$filename));
    }

    public function downloadAttachment1($filename)
    {
        return response()->download(public_path('Attachments/Doucments/'.$filename));
    }

    public function destroy(Request $request)
    {
        try {
            $this->deleteFile($request->doucment);
            $doucments = Doucment::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Doucment Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
}
