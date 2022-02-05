<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait CompanyTrait
{
    public function getSlug()
    {
        return Str::slug($this->name, '-');
    }
}