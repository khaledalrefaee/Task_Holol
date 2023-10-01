<?php

namespace App\Traits;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
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

    public function addNewImages(Product $product, Request $request)
    {
        if ($request->hasFile('photos')) {
            $folder = 'product';
            $images = $request->file('photos');
            $imageModels = [];

            foreach ($images as $image) {
                $fileName = uploadImage($folder, $image);

                $imageModel = new Image();
                $imageModel->filename = $fileName;
                $imageModels[] = $imageModel;
            }

            // إذا كانت هناك صور جديدة، ربطها بالمنتج
            if (!empty($imageModels)) {
                $product->images()->saveMany($imageModels);
            }
        }
    }
}
