<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;

class ProductController extends Controller
{
    function getProduct() {
        return view('backend.product.listproduct');
    }
    function  getAddProduct() {
        return view('backend.product.addproduct');
    }
    function getEditProduct() {
        return view('backend.product.editproduct');
    }
    //dữ liệu đi vào addproductrequest check lỗ->show ra thông báo lỗi sau đó mới đi vào $r
    function postAddProduct(AddProductRequest $r){
        // dd($r->all());
    }
    function postEditProduct(EditProductRequest $r){

    }
}
