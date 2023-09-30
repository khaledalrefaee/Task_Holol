<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected static function boot()
    {
        parent::boot();

        // عند حذف الفئة، حذف جميع المنتجات المرتبطة
        static::deleting(function ($category) {
            $category->product()->delete();
        });
    }

    public function product(){
        return $this->hasMany(Product::class,'category_id');
    }
}
