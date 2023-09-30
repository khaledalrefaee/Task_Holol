<?php

namespace App\Repository;


interface ProductRepositoryInterface{

    public function getAllProduct();

    public function getcategory();

    public function StoreProduct($request);

    public function editProduct($id);

  public function UpdateProduct($request,$id);

   public function DeleteProduct( $id);

   public function Filter_Category($request);


}
