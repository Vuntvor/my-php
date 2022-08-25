<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ShopProduct extends Model
{
    protected $table = 'shop_products';

    public function getImageUrl(){
        return '/'.$this->image_url;
    }
}
