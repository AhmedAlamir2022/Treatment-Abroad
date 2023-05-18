<?php

namespace App\Http\Controllers;
use App\Models\Subscripe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function StoreOne(Request $request)
    {
        Subscripe::insert([
            'email' => $request->email,
            'created_at' => Carbon::now(),
        ]);
         $notification = array(
            'message' => 'Subscription Sent Successfully !! ', 
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function AllSubscriptions ()
    {
        $subscripes = Subscripe::latest()->get();
        return view('admin.quires.subscripes',compact('subscripes'));
    }

    public function DeleteSubscription(Request $request)
    {
        try {
            $subscripes = Subscripe::findOrFail($request->id)->delete();
            $notification = array(
                'message' => 'Subscription Is Deleted Successfully !!', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
