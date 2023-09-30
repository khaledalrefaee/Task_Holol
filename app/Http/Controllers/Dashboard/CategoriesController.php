<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Repository\CategoriesRepositoryInterface;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $Categories;

    public function __construct(CategoriesRepositoryInterface $Categories)
    {
        $this->Categories = $Categories;
    }


    public function index(){
        $Categories = $this->Categories->getAllcat();
        return view('backend.category.index',compact('Categories'));
    }

    public function store(CategoryRequest $request){
        return $this->Categories->StoreCat($request);
    }

    public function edit($id)
    {
        $Cat= $this->Categories->editCat($id);
        return view('backend.category.edit', compact('Cat'));
    }

    public function update(CategoryRequest $request ,$id){
        return $this->Categories->UpdateCategory($request ,$id);
    }


    public function destroy($id)
    {
        return $this->Categories->Deletecategory($id);
    }
}
