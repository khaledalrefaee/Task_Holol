<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function cat(){
        return $this->belongsTo(Category::class ,'category_id');
    }


    protected static function boot()
    {
        parent::boot();

        // عند حذف الفئة، حذف جميع المنتجات المرتبطة
        static::deleting(function ($category) {
            $category->images()->delete();
        });
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
