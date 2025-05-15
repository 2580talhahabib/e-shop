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
use App\Models\ProSize;
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
          $data['products']=Product::with('productImage')->get();
        $data['edit']=Product::find($id);
        return view('admin.Products.update',$data);
    }
    public function update($id,Request $req){
// dd($req->all());

ProSize::where('product_id', $id)->delete();

if ($req->has('sizes')) {
    foreach ($req->sizes as $size) {
        if (!empty($size['name']) && !empty($size['price'])) {
            ProSize::create([
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
    $imagename=time().'.'.uniqid().'.'.$ext;
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
  public function destroy($id)
{
    // Find the product with its images
    $product = Product::with(['productImage','productsize'])->find($id);
    
    if (!$product) {
        return redirect()->route('product.list')->with('danger', 'Product not found');
    }

    // Delete all associated images
    foreach ($product->productImage as $image) {
        // Delete the physical file
        $imagePath = public_path('storage/product/' . $image->image_name);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        foreach ($product->productsize as $size) {
        $size->delete();
    }
        
        // Delete the database record
        $image->delete();
    }

    // Finally delete the product
    $product->delete();

    return redirect()->route('product.list')
           ->with('success', 'Product and all associated images deleted successfully');
}

    // for product image delete 
    public function deleteImage($id)
{
    $image = ProductImage::find($id);

    if ($image) {
          $productId = $image->product_id;
        $imagePath = public_path('storage/product/' . $image->image_name);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image->delete();

        return redirect()->route('product.edit',$productId)->with('success','product Image Deleted Successfully');
    }

            return redirect()->route('product.edit')->with('danger','product did not found ');

}

}