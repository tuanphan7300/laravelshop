<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getShop() {
        echo 'product';
    }
    function getDetail() {
        echo 'detail';
    }
}
