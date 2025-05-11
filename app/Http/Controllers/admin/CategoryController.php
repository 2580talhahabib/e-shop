<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index(){
        $data['categories']=Category::paginate(10);
    return view('admin.categories.index',$data );
    }
    public function create(){
        return view('admin.categories.add');
    }
    public function store(Request $req){
        // dd($req->all());
        $req->validate([
            'slug'=>'required|unique:categories',
        ]);
        
        Category::create([
            'name'=>$req->name,
            'slug'=>str_replace(' ','-',$req->slug),
            'meta_title'=>$req->meta_title,
            'meta_descripation'=>$req->meta_descripation,
            'meta_keywords'=>$req->meta_keywords,
            'status'=>$req->status,
        ]);
        return redirect()->route('category.list')->with('success','Category Added Successfully');
    }

    public function edit($id){
        $data['edit']=Category::find($id);
        return view('admin.categories.update',$data);
    }
    public function update($id,Request $req){
      $update=Category::find($id);
      $req->validate([
     'slug'=>'required',
      ]);
      $update->update([
              'name'=>$req->name,
            'slug'=>$req->slug,
            'meta_title'=>$req->meta_title,
            'meta_descripation'=>$req->meta_descripation,
            'meta_keywords'=>$req->meta_keywords,
            'status'=>$req->status,
      ]);
        return redirect()->route('category.list')->with('success','Category  Updated Successfully');
    }
       public function destroy($id){
        $delid=Category::find($id);
        if($delid == null){
            return redirect()->route('category.list')->with('danger','Category not found');
        }
        $delid->delete();
            return redirect()->route('category.list')->with('success','Category Deleted Successfully');

    } 
}