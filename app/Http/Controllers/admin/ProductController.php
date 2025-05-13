<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
         public function index(){
        $data['products']=Product::paginate(10);
    return view('admin.Products.index',$data );
    }
    public function create(){
      
        return view('admin.Products.add',);
    }
    public function store(Request $req){
        Product::create([
            'title'=>$req->title,
            'slug'=>str_replace(' ', '-', strtolower($req->title)),
            'status'=>$req->status,
        ]);
        return redirect()->route('product.list')->with('success','Product Added Successfully');
    }

    public function edit($id){
          $data['categories']=Category::where('status',1)->get();
        $data['edit']=Product::find($id);
        return view('admin.Products.update',$data);
    }
    public function update($id,Request $req){
      $update=Product::find($id);

      $update->update([
            'name'=>$req->title,
            'slug'=>str_replace(' ', '-', strtolower($req->title)),
            'meta_title'=>$req->meta_title,
            'meta_descripation'=>$req->meta_descripation,
            'meta_keywords'=>$req->meta_keywords,
            'status'=>$req->status,
      ]);
        return redirect()->route('brand.list')->with('success','Brand  Updated Successfully');
    }
       public function destroy($id){
        $delid=Product::find($id);
        if($delid == null){
            return redirect()->route('product.list')->with('danger','product not found');
        }
        $delid->delete();
            return redirect()->route('product.list')->with('success','product Deleted Successfully');

    } 
}