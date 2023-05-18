<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Auth;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function MyTestimonials(){
        $testimonials = Testimonial::latest()->get();
        return view('patient.testimonials',compact('testimonials'));
    }// End Method

    public function StoreTestimonial(Request $request){
        Testimonial::insert([
            'name' => (Auth::user()->name),
            'user_id' => (Auth::user()->id),
            'testimonial' => $request->testimonial,
            'created_at' => Carbon::now(),
        ]);
        
        $notification = array(
            'message' => 'Your Testimonial Submited Successfully', 
            'alert-type' => 'success'
        );
        return back()->with($notification);
    } // end mehtod 

    public function AllTestimonials (){
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.testimonials',compact('testimonials'));
    }// End Method

    public function DeleteTestimonial ($id){
        try{
            Testimonial::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Testimonial Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);  
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }     
    } // End Method 

    public function EditTestimonial (Request $request){
        $testimonial_id = $request->id;
        Testimonial::findOrFail($testimonial_id)->update([
            'status' => $request->status,
           ]); 

           $notification = array(
           'message' => 'Testimonial Status Updated Successfully', 
           'alert-type' => 'info'
       );
        return back()->with($notification);
   } // End Method
}
