<?php

namespace App\Repository;


interface CategoriesRepositoryInterface{
    // get all Teachers
    public function getAllcat();




    public function StoreCat($request);

    public function editCat($id);

  public function UpdateCategory($request,$id);

   public function Deletecategory( $id);


}
