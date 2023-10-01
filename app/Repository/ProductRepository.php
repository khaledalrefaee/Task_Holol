<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Traits\Delete_Old_Image;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface {

    use Delete_Old_Image;
    public function getAllProduct(){
        return get_cols_where_p(new Product(), array("*"), "id", "DESC", PC);
    }

    public function getcategory()
    {
        return Category::all();
    }

    public function StoreProduct($request)
    {
        try {
            DB::beginTransaction();

            // تحقق من وجود الصور


            // إدراج المنتج
            $dataToInsert = [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'selling_price' => $request->selling_price,
                'qty' => $request->qty,
                'description' => $request->description,
            ];

            $product = insert(new Product(), $dataToInsert, true);
            
            $this->addNewImages($product ,$request);


            // إذا كانت هناك صور، ربطها بالمنتج
            if (!empty($imageModels)) {
                $product->images()->saveMany($imageModels);
            }

            DB::commit();
            return redirect()->route('admin.product');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $ex->getMessage()])->withInput();
        }
    }


    public function editProduct($id)
    {
        return Product::findOrFail($id);
    }



// ...

    public function updateProduct($request, $id)
    {
        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            if ($request->hasFile('photos')) {
                $folder = 'product';
                $images = $request->file('photos');
                $imageModels = [];

                $this->deleteOldImages($product);

                foreach ($images as $image) {
                    $fileName = uploadImage($folder, $image);

                    $imageModel = Image::where('filename', $fileName)->where('imageable_id', $product->id)->first();

                    if ($imageModel) {
                        $imageModel->update(['filename' => $fileName]);
                    } else {
                        $imageModel = new Image(['filename' => $fileName]);
                        $product->images()->save($imageModel);
                    }

                    $imageModels[] = $imageModel;
                }
            }

            $dataToUpdate['name'] = $request->name;
            $dataToUpdate['category_id'] = $request->category_id;
            $dataToUpdate['selling_price'] = $request->selling_price;
            $dataToUpdate['qty'] = $request->qty;
            $dataToUpdate['description'] = $request->description;
            update(new Product(), $dataToUpdate, array('id' => $id));

          
            DB::commit();
            return redirect()->route('admin.product');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $ex->getMessage()])->withInput();
        }
    }







    public function DeleteProduct($id)
    {
        $product = Product::findOrFail($id);
        try
        {
            DB::beginTransaction();
            destroy(new Product(),array('id' => $id));

            $this->deleteOldImages($product);

            DB::commit();
            return redirect()->route('admin.product')->with(['success'=>'تم الحذف بنجاح']);
        }
        catch(\Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.product')->with(['error' => 'عفوا حدث خطا ' . $ex->getMessage()]);
        }

    }


    public function Filter_Category($request)
    {
        $category=$this->getcategory();
        $search=Product::select('*')->where('category_id','=',$request->category_id)->get();
        return view('backend.product.index',compact('category'))->withDetails($search);
    }
}
