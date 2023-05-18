<?php
 
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\NDoctor;
use App\Models\Nationalitie;
use App\Models\Type_Blood;
use App\Models\Religion;
use App\Models\Gender;
 
class NDoctorController extends Controller
{
    public function Index(){
        return view('ndoctor.ndoctor_login');
    }// End Method 

    public function Login(Request $request){
        $check = $request->all();
        if(Auth::guard('ndoctor')->attempt(['email' => $check['email'],'password' => $check['password']])){
            $notification = array(
                'message' => 'Welcome Again Doctor', 
                'alert-type' => 'success'
            );
            return redirect()->route('ndoctor.dashboard')->with($notification);
        }else{
            $notification = array(
                'message' => 'Invalid Email Or Password', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }// End Method 

    public function Dashboard(){
        return view('ndoctor.ndoctor_dashboard');
    }// End Method 

    public function NDoctorLogout (){
        Auth::guard('ndoctor')->logout();
        $notification = array(
            'message' => 'National Doctor Logout Successfully', 
            'alert-type' => 'error'
        );
        return redirect()->route('ndoctor_form')->with($notification);
    }// End Method 

    public function ChangePassword(){
        return view('ndoctor.change_password');
    }// End Method

    public function UpdatePassword(Request $request){
        try{
            $validateData = $request->validate([
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'confirm_password' => 'required|same:newpassword',
            ]);

            $hashedPassword = Auth::guard('ndoctor')->user()->password;
            if (Hash::check($request->oldpassword,$hashedPassword )) {
                $users = NDoctor::find(Auth::guard('ndoctor')->user()->id);
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
        $id = Auth::guard('ndoctor')->user()->id;
        $nationalites = Nationalitie::all(); 
        $type_bloods = Type_Blood::all();
        $religions = Religion::all();
        $genders = Gender::all();
        $userData = NDoctor::find($id);
        return view('ndoctor.profile',compact('userData', 'nationalites', 'type_bloods','religions','genders'));
    }// End Method

    public function StoreProfile  (Request $request){
        $id = Auth::guard('ndoctor')->user()->id;
        $data = NDoctor::find($id);
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
            $file->move(public_path('upload/NationalDr'),$filename);
            $data['doctor_image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'National Dr Profile Updated Successfully', 
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }// End Method

    public function DoctorDetails  ($id){
        $ndoctors = NDoctor::findOrFail($id);
        return view('frontend.ndoctor_details',compact('ndoctors'));
    } // End Method 
 
}
