<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class RolePermissionController extends Controller
{
    public function AllPermissions()
    {
        $permissions = Permission::all();
        return view('admin.roleandpermissions.all_permissions', compact('permissions'));
    }

    public function AddPermission()
    {
        return view('admin.roleandpermissions.add_permission');
    }


    public function StorePermission(Request $request)
    {

        $role = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.permissions')->with($notification);
    }

    public function EditPermission($id)
    {

        $permission = Permission::findOrFail($id);
        return view('admin.roleandpermissions.edit_permission', compact('permission'));
    }


    public function UpdatePermission(Request $request)
    {

        $per_id = $request->id;

        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.permission')->with($notification);
    }


    public function DeletePermission($id)
    {

        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function AllRoles()
    {

        $roles = Role::all();
        return view('admin.roleandpermissions.all_roles', compact('roles'));
    }


    public function AddRole()
    {

        return view('admin.roleandpermissions.add_role');
    }


    public function StoreRole(Request $request)
    {

        $role = Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }


    public function EditRole($id)
    {

        $role = Role::findOrFail($id);
        return view('admin.roleandpermissions.edit_role', compact('role'));
    }


    public function UpdateRoles(Request $request)
    {

        $role_id = $request->id;

        Role::findOrFail($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRoles($id)
    {

        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }

    public function AssignPermission(){

        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.roleandpermissions.assign_permission',compact('roles','permissions','permission_groups'));

    }

    public function StoreAssignedPermission(Request $request){

        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
            
        }

         $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.assignedpermissions')->with($notification);


    }

    public function AllAssignedPermissions(){

       $roles = Role::all();
        return view('admin.roleandpermissions.all_assignedpermissions',compact('roles'));
    }

    public function EditAssignedPermission($id){

        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.roleandpermissions.edit_assignedpermission',compact('role','permissions','permission_groups'));

    }

    public function UpdateAssignedPermission(Request $request,$id){

        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
           $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.assignedpermissions')->with($notification);

    }

    public function DeleteAssignedPermission($id){
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
           $role->delete();
        }

         $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);

    }
}
