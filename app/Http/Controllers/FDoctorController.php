<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\FDoctor;
use App\Models\Nationalitie;
use App\Models\Type_Blood;
use App\Models\Religion;
use App\Models\Gender;

class FDoctorController extends Controller
{
    public function Index(){
        return view('fdoctor.fdoctor_login');
    }// End Method 

    public function Login(Request $request){
        $check = $request->all();
        if(Auth::guard('fdoctor')->attempt(['email' => $check['email'],'password' => $check['password']])){
            $notification = array(
                'message' => 'Welcome Again Doctor', 
                'alert-type' => 'success'
            );
            return redirect()->route('fdoctor.dashboard')->with($notification);
        }else{
            $notification = array(
                'message' => 'Invalid Email Or Password', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }// End Method 

    public function Dashboard(){
        return view('fdoctor.fdoctor_dashboard');
    }// End Method 

    public function FDoctorLogout (){
        Auth::guard('fdoctor')->logout();
        $notification = array(
            'message' => 'You Logout Successfully', 
            'alert-type' => 'error'
        );
        return redirect()->route('fdoctor_form')->with($notification);
    }// End Method 

    public function ChangePassword(){
        return view('fdoctor.change_password');
    }// End Method

    public function UpdatePassword(Request $request){
        try{
            $validateData = $request->validate([
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'confirm_password' => 'required|same:newpassword',
            ]);

            $hashedPassword = Auth::guard('fdoctor')->user()->password;
            if (Hash::check($request->oldpassword,$hashedPassword )) {
                $users = FDoctor::find(Auth::guard('fdoctor')->user()->id);
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

    public function Profile(){
        $id = Auth::guard('fdoctor')->user()->id;
        $nationalites = Nationalitie::all(); 
        $type_bloods = Type_Blood::all();
        $religions = Religion::all();
        $genders = Gender::all();
        $userData = FDoctor::find($id);
        return view('fdoctor.profile',compact('userData', 'nationalites', 'type_bloods','religions','genders'));
    }// End Method

    public function StoreProfile  (Request $request){
        $id = Auth::guard('fdoctor')->user()->id;
        $data = FDoctor::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->gender = $request->gender;
        $data->nationality = $request->nationality;
        $data->bloodtype = $request->bloodtype;
        $data->religion = $request->religion;
        $data->contact = $request->contact;
        $data->address = $request->address;
        $data->country = $request->country;
        $data->city = $request->city;
        if ($request->file('doctor_image')) {
            $file = $request->file('doctor_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/ForginDr'),$filename);
            $data['doctor_image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Your Profile Updated Successfully', 
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }// End Method

    public function DoctorDetails  ($id){
        $fdoctors = FDoctor::findOrFail($id);
        return view('frontend.fdoctor_details',compact('fdoctors'));
    } // End Method 
}
