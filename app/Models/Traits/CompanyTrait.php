<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait CompanyTrait
{
    /**
     * List the categories with a comma
     * @return String
     */
    public function listCategories()
    {
        $categories = $this->categories;
        $list = '';

        foreach ($categories as $index => $category){
            $list .= ($index > 0 ? ', ' : '') . $category->name;
        }

        return $list;
    }
}