<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProSize extends Model
{
    use HasFactory;
       protected $guarded=[];
        public function productsize(){
        return $this->belongsTo(Product::class);
    }
}