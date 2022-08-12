<?php

namespace App\Http\Controllers;

use App\Models\Caregory;
use Illuminate\Http\Request;

class CategoryController
{
    public function category()
    {
        $category_query = Caregory::query();
        return view(
            'layouts/category',
            [
                'all_category' => $category_query->get(),
            ]
        );
    }
    public function categoryAddOrEdit(Request $request)
    {
        $one_category = null;
        if ($request->route()->named('edit-category')) {
            $category_id = $request->route()->parameter('category_id');
            $one_category = Caregory::find($category_id);
        }

        return view(
            'layouts/add_category',
            [
                'category' => $one_category ?? null,
            ]
        );
    }

    public function categoryAddProcess(Request $request)
    {
        $category_data = $request->post('form-category');

        $new_category = new Caregory();
        $new_category->category = $category_data['form-category'];
        $new_category->priority = $category_data['form-priority'];
        $new_category->save(); // INSERT INTO notes ('title', 'content') VALUES ('qqq', 'www')

        return redirect('/category');
    }

    public function categoryEditProcess(Request $request)
    {
        $category_data = $request->post('form-category');

        $category_id = $request->route()->parameter('category_id');
        $category = Caregory::find($category_id);
        $category->category = $category_data['form-category'];
        $category->priority = $category_data['form-priority'];
        $category->save();

        return redirect('/category');
    }

    public function categoryDelete(Request $request)
    {
        $category_id = $request->route()->parameter('category_id');
        $category = Caregory::find($category_id);
        $category->delete(); // DELETE FROM notes WHERE id = {id}

        return redirect('/category');
    }
}
