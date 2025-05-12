<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
        public function index(){
        $data['brands']=Brand::paginate(10);
    return view('admin.Brands.index',$data );
    }
    public function create(){
        return view('admin.Brands.add');
    }
    public function store(Request $req){
        // dd($req->all());
        // $req->validate([
        //     'slug'=>'required|unique:brands',
        // ]);
        
        Brand::create([
            'name'=>$req->name,
            'slug'=>str_replace(' ', '-', strtolower($req->name)),
            'meta_title'=>$req->meta_title,
            'meta_descripation'=>$req->meta_descripation,
            'meta_keywords'=>$req->meta_keywords,
            'status'=>$req->status,
        ]);
        return redirect()->route('brand.list')->with('success','Brand Added Successfully');
    }

    public function edit($id){
        $data['edit']=Brand::find($id);
        return view('admin.Brands.update',$data);
    }
    public function update($id,Request $req){
      $update=Brand::find($id);
    //   $req->validate([
    //  'slug'=>'required',
    //   ]);
      $update->update([
            'name'=>$req->name,
            'slug'=>str_replace(' ', '-', strtolower($req->name)),
            'meta_title'=>$req->meta_title,
            'meta_descripation'=>$req->meta_descripation,
            'meta_keywords'=>$req->meta_keywords,
            'status'=>$req->status,
      ]);
        return redirect()->route('brand.list')->with('success','Brand  Updated Successfully');
    }
       public function destroy($id){
        $delid=Brand::find($id);
        if($delid == null){
            return redirect()->route('brand.list')->with('danger','Brand not found');
        }
        $delid->delete();
            return redirect()->route('brand.list')->with('success','Brand Deleted Successfully');

    } 
}