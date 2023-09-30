<?php

namespace App\Traits;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait Delete_Old_Image
{
    public function deleteOldImages(Product $product)
    {
        foreach ($product->images as $oldImage) {
            $oldImagePath = public_path('back/assets/imag/product/' . $oldImage->filename);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $oldImage->delete();
        }
    }

    private function addNewImages(Product $product, Request $request)
    {
        $fileName = "";
        if ($request->hasFile('photos')) {
            $folder = 'product';
            $images = $request->file('photos');
            $fileName = uploadImage('product', $request->photos);


        // تحقق من وجود الصور

            foreach ($images as $image) {
                $fileName = uploadImage($folder, $image);

                $imageModel = new Image();
                $imageModel->filename = $fileName;
                $imageModel->imageable_id = $product->id;
                $imageModel->imageable_type ='App/Model/Product';
                $imageModels[] = $imageModel;
            }
        }

        // إذا كانت هناك صور، ربطها بالمنتج
        if (!empty($imageModels)) {
            $product->images()->saveMany($imageModels);
        }

        DB::commit();
    }
}
