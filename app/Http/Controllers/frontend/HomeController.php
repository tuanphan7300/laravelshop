<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function getIndex() {
        echo 'index';
    }
    function getAbout() {
        echo 'about';
    }
    function getContact() {
        echo 'contact';
    }
}
