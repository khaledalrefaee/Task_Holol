<?php

namespace App\Rules;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\Validation\Rule;

class UniqueCategory implements Rule
{
    private $categoryName;
    private $categoryId;

    public function __construct($categoryName, $categoryId)
    {
        $this->categoryName = $categoryName;
        $this->categoryId = $categoryId;
    }


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->categoryId) //edit form
            $attribute = Category::where('name', $value)->where('id','!=', $this->categoryId) ->first();
        else  //creation form
            $attribute = Category::where('name', $value)->first();

        if ($attribute)
            return false;
        else
            return true;
    }

    public function message()
    {
        return ' this name already exists  before';
    }
}
