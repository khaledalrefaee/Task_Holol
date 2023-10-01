<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Repository\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $Product;

    public function __construct(ProductRepositoryInterface $Product)
    {
        $this->Product = $Product;
    }

    public function index(){
        $Products = $this->Product->getAllProduct();
        $category =$this->Product->getcategory();
        return view('backend.product.index',compact('Products','category'));
    }

    public function card(){
        $Products = $this->Product->getAllProduct();
        $category = $this->Product->getcategory();
        return view('backend.product.card',compact('Products','category'));
    }

    public  function store(ProductRequest $request){
        return $this->Product->StoreProduct($request);
    }

    public function edit($id){
        $Product= $this->Product->editProduct($id);
        $category =$this->Product->getcategory();
        return view('backend.product.edit', compact('Product','category'));
    }


    public function update(ProductUpdateRequest $request ,$id){
        return $this->Product->UpdateProduct($request ,$id);
    }

    public function destroy($id)
    {
        return $this->Product->DeleteProduct($id);
    }

    public function Filter_Category(Request $request){
        return $this->Product->Filter_Category($request);
    }
}
