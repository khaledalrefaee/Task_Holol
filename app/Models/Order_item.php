<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pro(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
