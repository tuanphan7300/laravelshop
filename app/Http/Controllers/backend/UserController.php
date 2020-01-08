<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{
    function getUser() {
        return view('backend.user.listuser');
    }
    function  getAddUser() {
        return view('backend.user.adduser');
    }
    function  getEditUser() {
        return view('backend.user.edituser');
    }
    function  postAddUser(AddUserRequest $r) {

    }
    function  postEditUser(EditUserRequest $r) {

    }

}
