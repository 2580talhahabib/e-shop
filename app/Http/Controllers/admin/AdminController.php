<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $data['admins']=User::where('role',1)->where('status',1)->get();
    return view('admin.admin.list',$data );
    }
    public function create(){
        return view('admin.admin.add');
    }
    public function store(Request $req){
        // dd($req->all());
        $req->validate([
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'password'=>'required',
        ]);
        User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'status'=>$req->status,
            'role'=>1,
            'password'=>Hash::make($req->password),
            
        ]);
        return redirect()->route('admin.list')->with('success','Admin Added Successfully');
    }

    public function edit($id){
        $data['edit']=User::find($id);
        return view('admin.admin.update',$data);
    }
    public function update($id,Request $req){
      $update=User::find($id);
      $req->validate([
        'name'=>'required',
        'email'=>'required',
        'password'=>'required'
      ]);
      $update->update([
        'name'=>$req->name,
        'email'=>$req->email,
        'password'=>$req->password,
        'status'=>$req->status,
      ]);
        return redirect()->route('admin.list')->with('success','Admin Record Updated Successfully');
    }
       public function destroy($id){
        $delid=User::find($id);
        if($delid == null){
            return redirect()->route('admin.list')->with('danger','Record not found');
        }
        $delid->delete();
            return redirect()->route('admin.list')->with('success','Record Deleted Successfully');

    }
}