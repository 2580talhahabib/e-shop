<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Product_Size;
use App\Models\ProductImage;
use App\Models\ProductSize;
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
           $data['brands']=Brand::where('status',1)->get();
           $data['colors']=Color::where('status',1)->get();
        $data['edit']=Product::find($id);
        return view('admin.Products.update',$data);
    }
    public function update($id,Request $req){
// dd($req->all());

ProductSize::where('product_id', $id)->delete();

if ($req->has('sizes')) {
    foreach ($req->sizes as $size) {
        if (!empty($size['name']) && !empty($size['price'])) {
            ProductSize::create([
                'product_id' => $id,
                'name' => $size['name'],
                'price' => $size['price'],
            ]);
        }
    }
}
     if(!empty($req->image)){
        $oldImages = ProductImage::where('product_id', $id)->get();
        
        foreach ($oldImages as $oldImage) {
            $imagePath = public_path('storage/product/'.$oldImage->imagename);
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }
            $oldImage->delete();
        }
  foreach ($req->image as $image) {
    $filename=$req->image;
    $ext=$image->getClientOriginalExtension();
    $imagename=time().'.'.uniqid().$ext;
    $image->move(public_path('storage/product/'),$imagename);
    

   ProductImage::create([
    'product_id'=>$id,
    'image_name'=>$imagename,
    'image_extension'=>$ext,
   ]);
}
   }   

      $update=Product::find($id);
if(!empty($update)){
  
      $update->update([
            'title'=>$req->title,
            'slug'=>str_replace(' ', '-', strtolower($req->title)),
            'sku'=>strip_tags($req->sku),
            'category_id'=>$req->category_id,
            'subcategory_id'=>$req->subcategory_id,
            'brand_id'=>$req->brand_id,
            'old_price'=>$req->old_price,
            'price'=>$req->price,
            'short_desc'=>strip_tags($req->short_desc),
            'descripation'=>$req->descripation,
            'additional_information'=>$req->additional_information,
            'shipping_returns'=>$req->shipping_returns,
            'status'=>$req->status,
      ]);
        return redirect()->route('product.list')->with('success','Product  Updated Successfully'); 
}
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