<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Feature;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class FeaturesController extends Controller
{
    
    public function index()
    {
        $features = Feature::all();
        return view('admin.features.features',compact('features'));
    }

    public function store(Request $request)
    {
        try {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/features/'.$name_gen);
            $save_url = 'upload/features/'.$name_gen;

            Feature::insert([
                'name' => $request->name,
                'details' => $request->details,
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Feature Added Successfully', 
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
        $Feature_id = $request->id;
        if ($request->file('image') ) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/features/'.$name_gen);
            $save_url = 'upload/features/'.$name_gen;

            Feature::findOrFail($Feature_id)->update([
                'name' => $request->name,
                'details' => $request->details,
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Feature Updated Successfully With Image', 
                'alert-type' => 'info'
            );
            return back()->with($notification);
        } else{

            Feature::findOrFail($Feature_id)->update([
                'name' => $request->name,
                'details' => $request->details,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Feature Updated Successfully Without Images ', 
                'alert-type' => 'info'
            );
            return back()->with($notification);
        } // end Else
    }

    public function destroy(Request $request)
    {
        try {
            $features = Feature::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Feature Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
