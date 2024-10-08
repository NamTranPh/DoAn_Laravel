<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\adduser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class user extends Controller
{
    public function user(){

        $data = DB::table('admins')->select('*');
        $data = $data -> get();
        $adminUser = Auth::guard('admin')->user();
        return view('/admin/admin_user', ['user'=>$adminUser], compact('data'));
    }
    public function vadduser(){
        $adminUser = Auth::guard('admin')->user();
        return view('/admin/adduser', ['user'=>$adminUser]);
    }
    public function adduser(Request $request){
        $add = new adduser;
        $add->name = $request->name;
        $add->email = $request->email;
        $add->password = Hash::make($request->password);
        $add->level = $request->level;
        $add->role = $request->role;
        $add->save();
        return redirect()->action([user::class, 'user']);
    }
    public function delete($id){
        $dlt = adduser::find($id);
        $dlt -> delete();
        return redirect()->action([user::class, 'user'])->with('success', 'Xóa dữ liệu thành công');
    }
    public function edit($id){
        $edit = adduser::findOrFail($id);
        $adminUser = Auth::guard('admin')->user();
        return view('/admin/edituser', ['user'=>$adminUser], compact('edit'));
    }
    public function update(Request $request, $id){
        $edit = adduser::find($id);
        $edit->name = $request->name;
        $edit->password = Hash::make($request->password);
        $edit->email = $request->email;
        $edit->level = $request->level;
        $edit->role = $request->role;
        $edit->save();
        return redirect()->action([user::class, 'user']);
    }

    public function customer(){
        $data = DB::table('users')->select('*');
        $data = $data -> get();
        $adminUser = Auth::guard('admin')->user();
        return view('/admin/admin_customer', ['user'=>$adminUser], compact('data'));
    }

    public function deleteCM($id){
        $dlt = DB::table('users')->find($id);
        DB::table('users')->where('id', $id)->delete();
        return redirect()->action([user::class, 'customer'])->with('success', 'Xóa dữ liệu thành công');
    }
}
