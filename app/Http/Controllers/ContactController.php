<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function StoreMessage(Request $request)
    {
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message, 
            'created_at' => Carbon::now(),
        ]);
         $notification = array(
            'message' => 'Message sent Successfully !! ', 
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function AllMessages ()
    {
        $contacts = Contact::latest()->get();
        return view('admin.quires.messages',compact('contacts'));
    }

    public function DeleteMessage(Request $request)
    {
        try {
            $Contacts = Contact::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Message Is Deleted Successfully !!', 
                'alert-type' => 'error'
            );
            return redirect()->route('all.messages')->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
