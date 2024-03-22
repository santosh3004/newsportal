<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/logout/page');
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    public function AdminLogoutPage()
    {
        return view('admin.admin_logout');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.admin_profile_view',compact('user'));
    }

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->name;

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $user->photo?unlink($user->photo):null;
            $image_name = date('YmdHi').'.'.$image->getClientOriginalName();
            $image->move(public_path('uploads/admin_images'),$image_name);
            $user->photo = 'uploads/admin_images/'.$image_name;
        }

        $user->save();
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function AdminUpdatePassword(Request $request){
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
            return redirect()->back()->with('error','Old Password Does Not Match');
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
