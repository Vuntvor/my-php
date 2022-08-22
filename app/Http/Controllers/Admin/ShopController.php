<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopProduct;


class ShopController extends Controller
{
    public function list()
    {
        $allProduct = ShopProduct::query()->get();
        return view('admin/product_list',
            [
            'productList' => $allProduct,
            ]
        );
    }

    public function create()
    {
        $productQuery = ShopProduct::query();
        $productId = null;
        return view('admin/create_product',
            [
                'categoryList' => $categoryQuery->get(),
                'edit' => $categoryId,
                'messageTmpl' => HelperController::renderMessage($request->session()->get('status')),
            ]
        );
    }
}
