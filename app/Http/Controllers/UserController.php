<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function UserDashboard()
    {
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('frontend.user_dashboard',compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $user->photo?unlink($user->photo):null;
            $image_name = date('YmdHi').'.'.$image->getClientOriginalName();
            $image->move(public_path('uploads/user_images'),$image_name);
            $user->photo = 'uploads/user_images/'.$image_name;
        }

        $user->save();
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function UserChangePassword()
    {
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('frontend.user_change_password',compact('user'));
    }

    public function UserUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ],[
            'old_password.required' => 'Please Enter Your Old Password',
            'new_password.required' => 'Please Enter Your New Password',
            'confirm_password.required' => 'Please Enter Your Confirm Password',
            'confirm_password.same' => 'New Password and Confirm Password Does Not Match',
        ]);

        if(!Hash::check($request->old_password,Auth::user()->password)){
            $notification = array(
                'message' => 'Old Password Does Not Match',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }else{
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->update();
            $notification = array(
                'message' => 'Password Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    }

}
}

