<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;
use Illuminate\Http\Request;

class HelperController extends Controller
{

    public static function getNames($thisName)
    {

        $duplicateNames = ShopCategory::query()
            ->where('category_name', '=', $thisName)
            ->get();
        if ($duplicateNames->isNotEmpty()) {
            return true;
        } else {
            return false;
        }
    }

    public static function renderMessage($messageText, $messageStatus = 'danger')
    {
        return view('admin/layouts/message',
            [
                'memMessageText' => $messageText,
                'messageStatus' => $messageStatus,
            ]);
    }
}
