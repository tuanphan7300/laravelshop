<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function getOrder() {
        echo 'order';
    }
    function getDetail() {
        echo 'detail order';
    }
    function getProcessed() {
        echo 'processed';
    }
}
