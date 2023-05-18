<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\NDoctor;
use Auth;

class ReportController extends Controller
{
    public function FDoctorReports   ()
    {
        $reports = Report::all();
        $users = User::all();
        $ndoctors = NDoctor::all();
        return view('fdoctor.reports.reports',compact('reports','users','ndoctors'));
    }

    public function NDoctorReports   ()
    {
        $reports = Report::all();
        return view('ndoctor.reports.reports',compact('reports'));
    }

    public function AdminReports   ()
    {
        $reports = Report::all();
        return view('admin.reports.reports',compact('reports'));
    }

    public function StoreReport (Request $request)
    {
        $reports =  new Report();
        $reports->user_id = $request->user_id;
        $reports->ndoctor_id  = $request->ndoctor_id ;
        $reports->fdoctor_id  = Auth::guard('fdoctor')->user()->id;
        $reports->start_date = $request->start_date;
        $reports->end_date = $request->end_date;
        $reports->details = $request->details;
        $reports->save();
       
        $notification = array(
            'message' => 'Report Added Successfully ', 
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function DeleteReport  (Request $request)
    {
        try {
            $reports = Report::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Report Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function AdminPrintReport($id){
        $reports = Report::findOrFail($id);
        return view('admin.reports.print_report',compact('reports'));
    } // End Method

    public function NDoctorPrintReport ($id){
        $reports = Report::findOrFail($id);
        return view('ndoctor.reports.print_report',compact('reports'));
    } // End Method

    public function FDoctorPrintReport ($id){
        $reports = Report::findOrFail($id);
        return view('fdoctor.reports.print_report',compact('reports'));
    } // End Method

    
}
