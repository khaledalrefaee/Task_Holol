<?php

namespace App\Repository;


interface CategoriesRepositoryInterface{
    // get all Teachers
    public function getAllcat();



//    // get  Specializations
//    public function getSpecializations();
//
//    // get Genders
//    public function getGenders();
//
//    //store teacher
    public function StoreCat($request);
//
//    //edit
    public function editCat($id);
//
//    //UpdateTeachers
  public function UpdateCategory($request,$id);
//
   public function Deletecategory( $id);


}
