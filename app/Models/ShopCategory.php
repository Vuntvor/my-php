<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ShopCategory extends Model
{
    protected $table = 'shop_category';

    public function getImageUrl(){
        return '/'.$this->image_url;
    }

    public function parentCategory()
    {
        return $this->hasOne(ShopCategory::class, 'id', 'parent_category');
    }

    public function childCategories()
    {
        return $this->hasMany(ShopCategory::class, 'parent_category', 'id');
    }
}

