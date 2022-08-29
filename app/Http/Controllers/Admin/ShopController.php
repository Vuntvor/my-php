<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

//use App\Models\ShopCategory;
use App\Models\ShopCategory;
use App\Models\ShopProduct;
use Illuminate\Http\Request;


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

    public function create(Request $request)
    {
        $productQuery = ShopProduct::query()->get();
        $categoryQuery = ShopCategory::query()->get();
        $productId = null;
        return view('admin/create_product',
            [
                'productList' => $productQuery,
                'edit' => $productId,
                'categoryList' => $categoryQuery,
                'messageTmpl' => HelperController::renderMessage($request->session()->get('status')),
            ]
        );
    }

    public function add(Request $request)
    {
        $productData = $request->post('form-product');
//        dd($productData);
        $newProduct = new ShopProduct();
        $newProduct->product_name = $productData['form-name'];
        $newProduct->product_status = $productData['form-status'];
        $newProduct->product_category = $productData['form-parent'];
        $newProduct->product_price = $productData['form-price'];

        $duplicateNames = HelperController::getNames($productData['form-name']);

        if ($duplicateNames) {
            $request->session()->flash('status', 'This name already exist! Change name of product!');
            return redirect(route('product.create'));
        };


        $newProduct->save();

        $this->uploadProductImage($newProduct, $request);
        return redirect(route('product.list'));
    }

    public function edit(Request $request)
    {
        $productId = $request->route()->parameter('product_id');
        $product = ShopProduct::find($productId);
        $productQuery = ShopProduct::query();
        $categoryQuery = ShopCategory::query()->get();

        return view('admin/create_product',
            [
                'productList' => $productQuery->get(),
                'foundProduct' => $product,
                'edit' => $productId,
                'categoryList' => $categoryQuery,
                'messageTmpl' => HelperController::renderMessage($request->session()->get('status')),
            ]
        );
    }

    public function save(Request $request)
    {
        $productData = $request->post('form-product');
        $productId = $request->route()->parameter('product_id');
        $product = ShopProduct::find($productId);

        $duplicateNames = HelperController::getNames($productData['form-name']);

        if ($duplicateNames) {
            $request->session()->flash('status', 'This name already exist! Change name of product!');
            return redirect(route('product.edit', ['product_id' => $productId]));
        };
        $product->product_name = $productData['form-name'];
        $this->uploadProductImage($product, $request);
        $product->product_status = $productData['form-status'];
        isset($productData['form-parent']) ? $product->product_category = $productData['form-parent'] : $product->product_category = '';
        $product->product_price = $productData['form-price'];
        $product->save();

        return redirect(route('product.list'));
    }

    protected function uploadProductImage(ShopProduct $newProduct, Request $request)
    {
        if (!$request->file('form-product.form-image')) {
            return;
        }
        $imageName = $request->file('form-product.form-image')->storeAs('product_image', $newProduct->id . '.jpg');
        $newProduct->product_image_url = $imageName;
        $newProduct->save();
    }

    public function delete(Request $request)
    {
        $productId = $request->route()->parameter('product_id');
        $productQuery = ShopProduct::query();
        $productQuery->where('product_category', '=', $request->route()->parameter('product_id'));
        $selectedProduct = $productQuery->get();

        foreach ($selectedProduct as $oneProduct) {
            $oneProduct->product_category = ' ';
            $oneProduct->save();
        };
        $product = ShopProduct::find($productId);
        $product->delete();

        return redirect(route('product.list'));
    }
}
