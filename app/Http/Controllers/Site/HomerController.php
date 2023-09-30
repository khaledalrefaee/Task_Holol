<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomerController extends Controller
{

    public function home()
    {
        $data = [];
        $data['categories'] = Category::select('id', 'name')->get();
        $data['products'] = Product::all();
        return view('front.home', $data);
    }
}
