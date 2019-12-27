<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function getCategory() {
        echo 'category';
    }
    function getEditCategory() {
        echo 'category/edit';
    }
}
