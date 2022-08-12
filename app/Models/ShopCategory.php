<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ShopCategory extends Model
{
    protected $table = 'shop_category';

    public function getImageUrl(){
        return Storage::url($this->image_url);
    }
}

