<?php

namespace App\Repository;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoriesRepository implements CategoriesRepositoryInterface {

    public function getAllcat(){
        return Category::all();
    }

    public function StoreCat($request){

        try {
            $Category = new Category();
            $Category->name = $request->name;
            $Category->save();
            return redirect()->route('admin.categories');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

    public function editCat($id)
    {
        return Category::findOrFail($id);
    }

    public function UpdateCategory($request,$id)
    {
        try {
            $Category = Category::findOrFail($id);

            $Category->save();
            return redirect()->route('admin.categories');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function Deletecategory($id)
    {


        try {
            $Category = Category::findOrFail($id)->delete();;
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }


}
