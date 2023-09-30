<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function productsByid($id){
        $data = [];
        $data['category'] = Category::where('id', $id)->firstorfail();

        if ($data['category'])
            $data['products'] = $data['category']->product;

        return view('front.products', $data);
    }
}
