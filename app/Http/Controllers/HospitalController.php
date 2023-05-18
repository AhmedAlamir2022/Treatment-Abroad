<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Rate;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class HospitalController extends Controller
{
    
    public function index()
    {
        $hospitals = Hospital::all();
        return view('admin.hospitals.hospitals',compact('hospitals'));
    }

    public function create()
    {
        return view('admin.hospitals.add_hospital');
    }

    public function store(Request $request)
    {
        try {
            $image1 = $request->file('image1');
            $name_gen1 = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image1)->resize(430,327)->save('upload/hospital/'.$name_gen1);
            $save_url1 = 'upload/hospital/'.$name_gen1;

            $image2 = $request->file('image2');
            $name_gen2 = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image2)->resize(430,327)->save('upload/hospital/'.$name_gen2);
            $save_url2 = 'upload/hospital/'.$name_gen2;

            $image3 = $request->file('image3');
            $name_gen3 = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image3)->resize(430,327)->save('upload/hospital/'.$name_gen3);
            $save_url3 = 'upload/hospital/'.$name_gen3;

            $image4 = $request->file('image4');
            $name_gen4 = hexdec(uniqid()).'.'.$image4->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image4)->resize(430,327)->save('upload/hospital/'.$name_gen4);
            $save_url4 = 'upload/hospital/'.$name_gen4;

            $image5 = $request->file('image5');
            $name_gen5 = hexdec(uniqid()).'.'.$image5->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image5)->resize(430,327)->save('upload/hospital/'.$name_gen5);
            $save_url5 = 'upload/hospital/'.$name_gen5;

            Hospital::insert([
                'title' => $request->title,
                'email' => $request->email,
                'short_desc' => $request->short_desc,
                'contact' => $request->contact,
                'country' => $request->country,
                'long_desc' => $request->long_desc,
                'city' => $request->city,
                'address' => $request->address,
                'image1' => $save_url1,
                'image2' => $save_url2,
                'image3' => $save_url3,
                'image4' => $save_url4,
                'image5' => $save_url5,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Hospital Added Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('Hospitals.index')->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id){

        $hospital = Hospital::findorfail($id);
        return view('admin.hospitals.edit_hospital',compact('hospital'));

    }

    public function update(Request $request)
    {
        try {
            $hospital_id = $request->id;
            if ($request->file('image1') || $request->file('image2')|| $request->file('image3')|| $request->file('image4')|| $request->file('image5')) {

            $image1 = $request->file('image1');
            $name_gen1 = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image1)->resize(430,327)->save('upload/hospital/'.$name_gen1);
            $save_url1 = 'upload/hospital/'.$name_gen1;

            $image2 = $request->file('image2');
            $name_gen2 = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image2)->resize(430,327)->save('upload/hospital/'.$name_gen2);
            $save_url2 = 'upload/hospital/'.$name_gen2;

            $image3 = $request->file('image3');
            $name_gen3 = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image3)->resize(430,327)->save('upload/hospital/'.$name_gen3);
            $save_url3 = 'upload/hospital/'.$name_gen3;

            $image4 = $request->file('image4');
            $name_gen4 = hexdec(uniqid()).'.'.$image4->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image4)->resize(430,327)->save('upload/hospital/'.$name_gen4);
            $save_url4 = 'upload/hospital/'.$name_gen4;

            $image5 = $request->file('image5');
            $name_gen5 = hexdec(uniqid()).'.'.$image5->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image5)->resize(430,327)->save('upload/hospital/'.$name_gen5);
            $save_url5 = 'upload/hospital/'.$name_gen5;

            Hospital::findOrFail($hospital_id)->update([
                'title' => $request->title,
                'email' => $request->email,
                'short_desc' => $request->short_desc,
                'contact' => $request->contact,
                'country' => $request->country,
                'long_desc' => $request->long_desc,
                'city' => $request->city,
                'address' => $request->address,
                'image1' => $save_url1,
                'image2' => $save_url2,
                'image3' => $save_url3,
                'image4' => $save_url4,
                'image5' => $save_url5,
            ]); 
            $notification = array(
                'message' => 'Hospital Updated Successfully With Images', 
                'alert-type' => 'info'
            );
            return redirect()->route('Hospitals.index')->with($notification);
        } else{
            Hospital::findOrFail($hospital_id)->update([
                'title' => $request->title,
                'email' => $request->email,
                'short_desc' => $request->short_desc,
                'contact' => $request->contact,
                'country' => $request->country,
                'long_desc' => $request->long_desc,
                'city' => $request->city,
                'address' => $request->address,
            ]); 
            $notification = array(
                'message' => 'Hospital Updated Successfully Without Images', 
                'alert-type' => 'info'
            );
            return redirect()->route('Hospitals.index')->with($notification);
        }
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $hospitals = Hospital::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Hospital Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function HospitalDetails ($id){
        $hospital = Hospital::findOrFail($id);
        return view('frontend.hospital_details',compact('hospital'));
    } // End Method 


   
    public function Search(Request $request)
    {
        $searchTerm = $request->input('search'); // استخراج مصطلح البحث من الطلب
        
        $results = Hospital::where('title', 'like', '%'.$searchTerm.'%') // إضافة شرط البحث
                    ->get(); // استرداد النتائج
        
        return view('frontend.search', compact('results')); // إرجاع نتائج البحث إلى العرض
    }
    

}
