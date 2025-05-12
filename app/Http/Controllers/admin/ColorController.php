<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
         public function index(){
        $data['colors']=Color::paginate(10);
    return view('admin.Color.index',$data );
    }
    public function create(){
        return view('admin.Color.add');
    }
    public function store(Request $req){
       
        
        Color::create([
            'name'=>$req->name,
            'code'=>$req->code,
            'status'=>$req->status,
        ]);
        return redirect()->route('color.list')->with('success','Color Added Successfully');
    }

    public function edit($id){
        $data['edit']=Color::find($id);
        return view('admin.Color.update',$data);
    }
    public function update($id,Request $req){
      $update=Color::find($id);
    //   $req->validate([
    //  'slug'=>'required',
    //   ]);
      $update->update([
                'name'=>$req->name,
            'code'=>$req->code,
            'status'=>$req->status,
      ]);
        return redirect()->route('color.list')->with('success','Color  Updated Successfully');
    }
       public function destroy($id){
        $delid=Color::find($id);
        if($delid == null){
            return redirect()->route('color.list')->with('danger','Color not found');
        }
        $delid->delete();
            return redirect()->route('color.list')->with('success','Color Deleted Successfully');

    }  
}