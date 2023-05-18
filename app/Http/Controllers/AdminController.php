<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Specialization;
use App\Models\Hospital;
use App\Models\NDoctor;
use App\Models\FDoctor;
use App\Models\Nationalitie;
use App\Models\Type_Blood;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }// End Method 

    public function Login(Request $request){
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'],'password' => $check['password']])){
            $notification = array(
                'message' => 'Welcome Again Super Admin', 
                'alert-type' => 'success'
            );
            return redirect()->route('admin.dashboard')->with($notification);
        }else{
            $notification = array(
                'message' => 'Invalid Email Or Password', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }// End Method 

public function Dashboard(){
        return view('admin.admin_dashboard');
    }// End Method 

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        $notification = array(
            'message' => 'You Logout Successfully', 
            'alert-type' => 'error'
        );
        return redirect()->route('login_form')->with($notification);
    }// End Method 

    public function Profile(){
        $id = Auth::guard('admin')->user()->id;
        $userData = Admin::find($id);
        return view('admin.admin_profile',compact('userData'));
    }// End Method

    public function StoreProfile(Request $request){
        try{
            $id = Auth::guard('admin')->user()->id;
            $data = Admin::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->username = $request->username;
            $data->contact = $request->contact;
            $data->address = $request->address;
            $data->country = $request->country;
            $data->city	 = $request->city	;
            $data->save();
            $notification = array(
                'message' => 'Admin Profile Updated Successfully', 
                'alert-type' => 'info'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }// End Method

    public function ChangePassword(){
        return view('admin.admin_change_password');
    }// End Method

    public function UpdatePassword(Request $request){
        try{
            $validateData = $request->validate([
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'confirm_password' => 'required|same:newpassword',
            ]);

            $hashedPassword = Auth::guard('admin')->user()->password;
            if (Hash::check($request->oldpassword,$hashedPassword )) {
                $users = Admin::find(Auth::guard('admin')->user()->id);
                $users->password = bcrypt($request->newpassword);
                $users->save();

                $notification = array(
                    'message' => 'Password Updated Successfully', 
                    'alert-type' => 'info'
                );
                return back()->with($notification);
            } else{

                $notification = array(
                    'message' => 'Old password is not match', 
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }// End Method

    public function AllAdmins(){
        $admins = Admin::latest()->get();
        return view('admin.users.all_admins',compact('admins'));
    } // End Method

    public function AddAdmin(Request $request){
        try{
            Admin::insert([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'contact' => $request->contact,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Admin Added Successfully', 
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }// End Method 

    public function DeleteAdmin($id){
        try{
            Admin::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Admin Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);  
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }     
    } // End Method 

    public function AllNDr (){
        $hospitals = Hospital::all();
        $specializationss = Specialization::all();
        $nationalites = Nationalitie::all(); 
        $type_bloods = Type_Blood::all();
        $religions = Religion::all();
        $genders = Gender::all();
        $ndoctors = NDoctor::latest()->get();
        return view('admin.users.all_ndoctors',compact('ndoctors', 'nationalites', 'type_bloods','religions','genders','hospitals','specializationss'));
    } // End Method

    public function AddNDr(Request $request){
        try {
            $image = $request->file('doctor_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/NationalDr/'.$name_gen);
            $save_url = 'upload/NationalDr/'.$name_gen;

            NDoctor::insert([
                'name' => $request->name,
                'hospital_id' => $request->hospital_id,
                'specialization_id' => $request->specialization_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'contact' => $request->contact,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
                'bloodtype' => $request->bloodtype,
                'religion' => $request->religion,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'doctor_image' => $save_url,
                'created_at' => Carbon::now(),

            ]); 
            $notification = array(
            'message' => 'National Dr Added Successfully', 
            'alert-type' => 'success'
        );
        return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
   }// End Method

   public function DeleteNDr(Request $request)
    {
        try {
            $NDoctors = NDoctor::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'National Dr Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function EditNDr(Request $request)
    {
        try {
            $doctor_id = $request->id;
            $image = $request->file('doctor_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/NationalDr/'.$name_gen);
            $save_url = 'upload/NationalDr/'.$name_gen;

            NDoctor::findOrFail($doctor_id)->update([
                'name' => $request->name,
                'hospital_id' => $request->hospital_id,
                'specialization_id' => $request->specialization_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'contact' => $request->contact,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
                'bloodtype' => $request->bloodtype,
                'religion' => $request->religion,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'doctor_image' => $save_url,
            ]); 
            $notification = array(
                'message' => 'National Dr Details Updated Successfully', 
                'alert-type' => 'info'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function AllFDr  (){
        $hospitals = Hospital::all();
        $specializationss = Specialization::all();
        $nationalites = Nationalitie::all(); 
        $type_bloods = Type_Blood::all();
        $religions = Religion::all();
        $genders = Gender::all();
        $fdoctors = FDoctor::latest()->get();
        return view('admin.users.all_fdoctors',compact('fdoctors', 'nationalites', 'type_bloods','religions','genders','hospitals','specializationss'));
    } // End Method

    public function AddFDr(Request $request){
        try {
            $image = $request->file('doctor_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/ForginDr/'.$name_gen);
            $save_url = 'upload/ForginDr/'.$name_gen;

            FDoctor::insert([
                'name' => $request->name,
                'hospital_id' => $request->hospital_id,
                'specialization_id' => $request->specialization_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'contact' => $request->contact,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
                'bloodtype' => $request->bloodtype,
                'religion' => $request->religion,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'doctor_image' => $save_url,
                'created_at' => Carbon::now(),

            ]); 
            $notification = array(
            'message' => 'Forgin Dr Added Successfully', 
            'alert-type' => 'success'
        );
        return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
   }// End Method

   public function DeleteFDr(Request $request)
    {
        try {
            $FDoctors = FDoctor::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Forgin Dr Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function EditFDr(Request $request)
    {
        try {
            $doctor_id = $request->id;
            $image = $request->file('doctor_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/ForginDr/'.$name_gen);
            $save_url = 'upload/ForginDr/'.$name_gen;

            FDoctor::findOrFail($doctor_id)->update([
                'name' => $request->name,
                'hospital_id' => $request->hospital_id,
                'specialization_id' => $request->specialization_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'contact' => $request->contact,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
                'bloodtype' => $request->bloodtype,
                'religion' => $request->religion,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'doctor_image' => $save_url,
            ]); 
            $notification = array(
                'message' => 'Forgin Dr Details Updated Successfully', 
                'alert-type' => 'info'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function AllPatients(){
        $users = User::latest()->get();
        return view('admin.users.all_patients',compact('users'));
    } // End Method

    public function DeletePatient($id){
        try{
            User::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Patient Is Deleted Successfully', 
                'alert-type' => 'error'
            );
            return back()->with($notification);  
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }     
    } // End Method 
}
