<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productsByid($id)
    {
        $data=[];
        $data['product'] = Product::where('id',$id) -> first();  //improve select only required fields
        if (!$data['product']){ ///  redirect to previous page with message
            return redirect()->back();
        }

        $product_id = $data['product'] -> id ;
        $product_categories_ids =  $data['product'] -> cat ->pluck('id'); // [1,26,7] get all categories that product on it



        $data['related_products'] = Product::whereHas('cat',function ($cat) use($product_categories_ids){
            $cat-> whereIn('categories.id',$product_categories_ids);
        }) -> limit(20) -> latest() -> get();

        return view('front.products-details', $data);
    }
}
