<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoryController extends Controller
{
    function getCategory() {
        return view('backend.category.category');
    }
    function getEditCategory() {
        return view('backend.category.editcategory');
    }
    //requet dday du lieu trong form sau khi check vao $r
    function postCategory(AddCategoryRequest $r){
        // dd($r->all());
    }
    function postEditCategory(EditCategoryRequest $r){

    }
    // function postAddCategory(AddCategoryRequest $r){
    //     // dd($r->all());
    // }
}
