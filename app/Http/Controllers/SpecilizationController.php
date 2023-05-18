<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class SpecilizationController extends Controller
{
    
    public function index()
    {
        $specilizations = Specialization::all();
        return view('admin.specilizations.specilizations',compact('specilizations'));
    }

    public function store(Request $request)
    {
        try {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/specilazation/'.$name_gen);
            $save_url = 'upload/specilazation/'.$name_gen;

            Specialization::insert([
                'name' => $request->name,
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Specialization Added Successfully', 
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $specilization_id = $request->id;
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/specilazation/'.$name_gen);
            $save_url = 'upload/specilazation/'.$name_gen;

            Specialization::findOrFail($specilization_id)->update([
                'name' => $request->name,
                'image' => $save_url,
            ]); 
            $notification = array(
                'message' => 'Specialization Updated Successfully', 
                'alert-type' => 'info'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $Specialization = Specialization::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Specialization Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
