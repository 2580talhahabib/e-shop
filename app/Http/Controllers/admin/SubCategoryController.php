<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
     public function index(){
        $data['subcategories']=SubCategory::with('category')->paginate(10);
        
    return view('admin.SubCategories.index',$data );
    }
    public function create(){
        $data['categories']=Category::where('status',1)->get();
        return view('admin.SubCategories.add',$data);
    }
    public function store(Request $req){
        // dd($req->all());
        $req->validate([
            'slug'=>'required|unique:sub_categories',
        ]);
        
        SubCategory::create([
            'category_id'=>$req->category_id,
            'name'=>$req->name,
            'slug'=>str_replace(' ','-',$req->slug),
            'meta_title'=>$req->meta_title,
            'meta_descripation'=>$req->meta_descripation,
            'meta_keywords'=>$req->meta_keywords,
            'status'=>$req->status,
        ]);
        return redirect()->route('subcategory.list')->with('success','subcategory Added Successfully');
    }

    public function edit($id){
        $data['edit']=SubCategory::find($id);
        $data['categories']=Category::where('status',1)->get();
        return view('admin.SubCategories.update',$data);
    }
    public function update($id,Request $req){
      $update=SubCategory::find($id);
      $req->validate([
     'slug'=>'required',
      ]);
      $update->update([
            'category_id'=>$req->category_id,
            'name'=>$req->name,
            'slug'=>$req->slug,
            'meta_title'=>$req->meta_title,
            'meta_descripation'=>$req->meta_descripation,
            'meta_keywords'=>$req->meta_keywords,
            'status'=>$req->status,
      ]);
        return redirect()->route('subcategory.list')->with('success','SubCategory  Updated Successfully');
    }
       public function destroy($id){
        $delid=SubCategory::find($id);
        if($delid == null){
            return redirect()->route('subcategory.list')->with('danger','SubCategory not found');
        }
        $delid->delete();
            return redirect()->route('subcategory.list')->with('success','Subcategory Deleted Successfully');

    } 
}