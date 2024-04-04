<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\NewsPost;

class AdminController extends Controller
{

    //Admin Dashboard
    public function AdminDashboard()
    {
        $allnews = NewsPost::latest()->get();
        return view('admin.index',compact('allnews'));
    }


    //Admin Personal Profile Managing
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
        $user->phone = $request->phone;

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $user->photo?unlink($user->photo):null;
            $image_name = date('YmdHi').'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin_images/'),$image_name);
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



    //Admin Manage Other Admins

    public function AllAdmins()
    {
        $admins = User::where('role','admin')->where('email','!=','admin@admin.com')->get();
        return view('admin.admin.all_admin',compact('admins'));
    }

    public function AddAdmin(){
        $roles = Role::all();

        return view('admin.admin.add_admin',compact('roles'));
    }

    public function StoreAdmin(Request $request){

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'inactive';
        $user->save();

        if($request->role_id){
            $user->assignRole($request->role_id);
        }
         $notification = array(
            'message' => 'New Admin User Created Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.admins')->with($notification);

    }

    public function EditAdmin($id){
        $roles= Role::all();
        $adminuser = User::findOrFail($id);
        return view('admin.admin.edit_admin',compact('adminuser','roles'));

    }



public function UpdateAdmin(Request $request){

        $admin_id = $request->id;

        $user = User::findOrFail($admin_id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if($request->role_id){
            $user->assignRole($request->role_id);
        }

         $notification = array(
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.admins')->with($notification);

    }


    public function DeleteAdmin($id){

        $user=User::findOrFail($id);
        if(!is_null($user)){
            $user->delete();
        }
         $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

    public function InactiveAdminUser($id){

        User::findOrFail($id)->update(['status' => 'inactive']);

        $notification = array(
            'message' => 'Admin User Inactive',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }


     public function ActiveAdminUser($id){

        User::findOrFail($id)->update(['status' => 'active']);

        $notification = array(
            'message' => 'Admin User Active',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }


}
