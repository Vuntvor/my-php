<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function list()
    {
        $allCategory = ShopCategory::query()->get();

        return view('admin/category_list', [
            'categoryList' => $allCategory,
        ]);
    }

    public function create()
    {
        $categoryQuery = ShopCategory::query();
        $categoryId = null;
        return view('admin/create_category',
            [
                'categoryList' => $categoryQuery->get(),
                'edit' => $categoryId,
            ]
        );
    }
    public function add(Request $request)
    {
        $categoryData = $request->post('form-category');

        $newCategory = new ShopCategory();
        $newCategory->category_name = $categoryData['form-name'];
        $newCategory->category_status = $categoryData['form-status'];
        $newCategory->parent_category = $categoryData['form-parent'];
        $newCategory->category_rating = $categoryData['form-rating'];

        $newCategory->save();

        $this->uploadCategoryImage($newCategory, $request);
        return redirect('/admin/category');
    }

    public function edit(Request $request)
    {
        $categoryId = $request->route()->parameter('category_id');
        $category = ShopCategory::find($categoryId);
        $categoryQuery = ShopCategory::query();
        return view('admin/create_category',
            [
                'categoryList' => $categoryQuery->get(),
                'foundCategory' => $category,
                'edit' => $categoryId,
            ]
        );
    }

    public function save(Request $request)
    {
        $categoryData = $request->post('form-category');
        $categoryId = $request->route()->parameter('category_id');
        $category = ShopCategory::find($categoryId);
        $category->category_name = $categoryData['form-name'];
        $this->uploadCategoryImage($category, $request);
        $category->category_status = $categoryData['form-status'];
        isset($categoryData['form-parent']) ? $category->parent_category = $categoryData['form-parent'] : $category->parent_category = '';
        $category->category_rating = $categoryData['form-rating'];
        $category->save();

        return redirect('/admin/category');
    }

    protected function uploadCategoryImage(ShopCategory $newCategory, Request $request)
    {
        if (!$request->file('form-category.form-image')) {
            return;
        }
        $imageName = $request->file('form-category.form-image')->storeAs('category_image', $newCategory->id . '.jpg');
        $newCategory->image_url = $imageName;
        $newCategory->save();
    }

    public function delete(Request $request)
    {
        $categoryId = $request->route()->parameter('category_id');
        $categoryQuery = ShopCategory::query();
        $categoryQuery->where('parent_category', '=', $request->route()->parameter('category_id'));
        $selectedCategory = $categoryQuery->get();

        foreach ($selectedCategory as $oneCategory) {
            $oneCategory->parent_category = ' ';
            $oneCategory->save();
        };
        $category = ShopCategory::find($categoryId);
        $category->delete();

        return redirect('/admin/category');
    }
}
