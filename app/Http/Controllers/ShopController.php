<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use App\Models\ShopCategory;


class ShopController extends Controller
{

    public function mainShop()
    {
        $allCategory = ShopCategory::query();
        $categoryTop = $allCategory->orderBy('category_rating', 'desc')->take(10)->get();
//        dd($categoryTop);

        return view('main');
    }

    public function admin_category(Request $request)
    {
        $categoryQwery = ShopCategory::query()->with('parentCategory');
        $getCategory = $categoryQwery->get();
        return view('admin_category',
            [
                'categoryList' => $getCategory,
                'resultMessage' => $request->session()->get('result') ?? null,
            ]
        );
    }

    public function admin()
    {
        return view('admin');
    }

    public function create_category()
    {
        $categoryQwery = ShopCategory::query();
        $categoryId = null;
        return view('create_category',
            [
                'categoryList' => $categoryQwery->get(),
                'edit' => $categoryId,
            ]
        );
    }

    public function add_category(Request $request)
    {
        $categoryData = $request->post('form-category');

        $resultMessage = [];

        $newCategory = new ShopCategory();
        $newCategory->category_name = $categoryData['form-name'];

//        $newCategory->image_url = $categoryData['form-image'];
//        1) Проверяем что изображение вообще пришло.
//        2) Копируем изображение в директорию нашего приложения
//        3) После чего присваиваем Новой категории путь который мы получим.

//        $uploaddir = '/var/www/uploads/';
//        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
//
//        echo '
//        <
//        pre > ';
//        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
//            echo "Файл корректен и был успешно загружен.\n";
//        } else {
//            echo "Возможная атака с помощью файловой загрузки!\n";
//        }
//
//        echo 'Некоторая отладочная информация:';
//        print_r($_FILES);
//
//        print "</pre>";


        $newCategory->category_status = $categoryData['form-status'];

        $newCategory->parent_category = $categoryData['form-parent'] ?? null;
        $newCategory->category_rating = $categoryData['form-rating'];

        $newCategory->save();

        $this->uploadCategoryImage($newCategory, $request);

        $request->session()->flash('result', $resultMessage);

        return redirect('/admin/category');
    }

    public function edit_category(Request $request)
    {
        $categoryId = $request->route()->parameter('category_id');
        $category = ShopCategory::find($categoryId);
        $childCategories = $category->childCategories;
        $categoryQwery = ShopCategory::query();
        return view('create_category',
            [
                'categoryList' => $categoryQwery->get(),
                'foundCategory' => $category,
                'edit' => $categoryId,
            ]
        );
    }

    public function save_category(Request $request)
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

    public function delete_category(Request $request)
    {
        $categoryId = $request->route()->parameter('category_id');
        $categoryQwery = ShopCategory::query();
        $categoryQwery->where('parent_category', '=', $request->route()->parameter('category_id'));
        $selectedCategory = $categoryQwery->get();
//        dd($selectedCategory);
        foreach ($selectedCategory as $oneCategory) {
                $oneCategory->parent_category = ' ';
                $oneCategory->save();
        };
        $category = ShopCategory::find($categoryId);
        $category->delete();

        return redirect('/admin/category');
    }

//    protected function uploadCategoryImage(ShopCategory $newCategory)
//    {
//        $uploadDir = ' /var/www / html / storage / app / category_image / ';
//        if (!isset($_FILES['form - category']['name']['form - image'])){
//            return;
//        }
//
//        if (move_uploaded_file($_FILES['form - category']['tmp_name']['form - image'], $uploadDir.$newCategory->id.' . jpg')) {
////            echo "Файл корректен и был успешно загружен.\n";
//        } else {
////            echo "Возможная атака с помощью файловой загрузки!\n";
//        }
//
//        return;
//    }
    protected function uploadCategoryImage(ShopCategory $newCategory, Request $request)
    {
        if (!$request->file('form-category.form-image')) {
            return;
        }
        $imageName = $request->file('form-category.form-image')->storeAs('category_image', $newCategory->id . '.jpg');
        $newCategory->image_url = $imageName;
        $newCategory->save();
    }
    public function topCategory(){

    }
}
