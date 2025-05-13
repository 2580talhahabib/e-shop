<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductSubCategoryController extends Controller
{
   public function index(Request $req){
    if(!empty($req->cat_id)){
    $subcategories=SubCategory::where('category_id',$req->cat_id)->get();
    return response()->json([
        'status'=>true,
        'message'=>$subcategories,
    ]); 
    }else{
         return response()->json([
        'status'=>false,
        'message'=>'Record Not found',
    ]); 
    }
    
   }
}