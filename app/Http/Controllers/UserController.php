<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Nationalitie;
use App\Models\Type_Blood;
use App\Models\Religion;
use App\Models\Gender;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function Dashboard(){
        return view('patient.index');
    }// End Method 
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'You Logout Successfully', 
            'alert-type' => 'error'
        );
        return redirect('/login')->with($notification);
    } // End Method 

    public function Profile(){ 
        $nationalites = Nationalitie::all(); 
        $type_bloods = Type_Blood::all();
        $religions = Religion::all();
        $genders = Gender::all();
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('patient.user_profile',compact('userData' , 'nationalites', 'type_bloods','religions','genders'));
    }// End Method 

    public function UpdateProfile (Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->nationality = $request->nationality;
        $data->bloodtype = $request->bloodtype;
        $data->religion = $request->religion;
        $data->contact = $request->contact;
        $data->address = $request->address;
        $data->country = $request->country;
        $data->city = $request->city;
        if ($request->file('user_image')) {
            $file = $request->file('user_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/patients'),$filename);
            $data['user_image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Patient Profile Updated Successfully', 
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }// End Method

    public function ChangePassword(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('patient.change_password',compact('userData'));
    }// End Method

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
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

    }// End Method
}
