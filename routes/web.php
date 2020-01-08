<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//--------frontend
//index

use Illuminate\Routing\RouteGroup;

Route::get('','frontend\HomeController@getIndex');

//about
Route::get('about', 'frontend\HomeController@GetAbout');

//contact
Route::get('contact', 'frontend\HomeController@getContact');

//cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('', 'frontend\CartController@getCart');

});

//checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('','frontend\CheckoutController@getCheckout');
    Route::get('complete','frontend\CheckoutController@getComplete');
    Route::post('','frontend\CheckoutController@postCheckout');
});

//product
Route::group(['prefix' => 'product'], function () {
    Route::get('shop', 'frontend\ProductController@getShop');
    Route::get('detail','frontend\ProductController@getDetail');
});


//-----BACKEND-----
//login
Route::get('login','backend\LoginController@getLogin');
//vì trong form k có action nên truyền luôn trên đường dẫn get thay thành post
Route::post('login','backend\LoginController@postLogin');

//admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('','backend\IndexController@getIndex');

    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'backend\CategoryController@getCategory');
        Route::get('edit','backend\CategoryController@getEditCategory');
        Route::post('', 'backend\CategoryController@postCategory');
        Route::post('edit','backend\CategoryController@postEditCategory');
    });

    //order
    Route::group(['prefix' => 'order'], function () {
        Route::get('','backend\OrderController@getOrder');
        Route::get('detail', 'backend\OrderController@getDetail');
        Route::get('processed', 'backend\OrderController@getProcessed');
    });

    //product
    Route::group(['prefix' => 'product'], function () {
        Route::get('','backend\ProductController@getProduct');
        Route::get('add','backend\ProductController@getAddProduct' );
        Route::get('edit', 'backend\ProductController@getEditProduct');
        Route::post('add','backend\ProductController@postAddProduct' );
        Route::post('edit', 'backend\ProductController@postEditProduct');
    });

    //user
    Route::group(['prefix' => 'user'], function () {
        Route::get('','backend\UserController@getUser');
        Route::get('add', 'backend\UserController@getAddUser');
        Route::get('edit', 'backend\UserController@getEditUser');
        Route::post('add', 'backend\UserController@postAddUser');
        Route::post('edit', 'backend\UserController@postEditUser');
    });

});






//-------LÝ THUYÊT--------

//SCHEMA
Route::group(['prefix' => 'schema'], function () {
    //tạo bảng
    Route::get('create-table', function () {
        Schema::create('users', function ($table) {
            $table->bigIncrements('id');//kiểu dữ liệu dạng số bigincreement:bigint , tự tăng, khóa chính, unsigned-không dấu âm
            $table->string('name', )->nullable();//vả
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->timestamps();   //tự tạo 2 trường create_at, update_at
        });
        Schema::create('product', function ( $table) {

            $table->bigIncrements('prd_id');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    });
    //đổi tên bảng
    Route::get('rename', function () {
        Schema::rename('users','thanhvien');
    });
    //xóa bảng
    Route::get('dropIfExits', function () {
        Schema::dropIfExists('users');
        Schema::dropIfExists('product');
    });
    //tương tác với cột
    //thêm cột
    Route::get('add-col', function () {
        Schema::table('users', function ($table) {
            $table->integer('id_number');
        });
    });
    //sửa , xóa cột
    //sử dụng thư viện docttrine/dbal
    //composer require doctrine/dbal
    Route::get('edit-col', function () {
        //sửa tên cột
        Schema::table('users', function ($table) {
            $table->renameColumn('name', 'full');
        });
        //xóa cột
        Schema::table('users', function ($table) {
            $table->dropColumn('id_number');
        });
    });
});

//QUERY BUILDER
    //giúp tương tác với các dữ liệu trong csdl
    // tuongw tác đến database dùng DB::
Route::group(['prefix' => 'query'], function () {
    //thêm dữ liệu mới
    Route::get('insert', function () {
        //thêm 1 bản ghi
        // DB::table('users')->insert([
        //     'email'=>'tuanphan7396@gmail.com',
        //     'password'=>'admin',
        //     'full'=>'phan van tuan',
        //     'address'=>'thaihoa-nghean',
        //     'phone'=>'0942379525',
        //     'level'=>'0'
        // ]);
        //thêm nhiều bản ghi
        DB::table('users')->insert([
            ['email'=>'admin@gmail.com','password'=>'123456','full'=>'nguyenvana','address'=>'hanoi','phone'=>'123456789','level'=>'1'],
            ['email'=>'nguyenvana@gmail.com','password'=>'123456','full'=>'nguyenvana','address'=>'ninh binh','phone'=>'123456799','level'=>'0'],
            ['email'=>'admin123@gmail.com','password'=>'123456','full'=>'nguyenvanc','address'=>'si gon','phone'=>'123452789','level'=>'1']
        ]);
    });
    //sửa bản ghi
    Route::get('update', function () {
        //where là tìm đến bản ghi theo điều kiện
        // DB::table('users')->where('address','hanoi')->update(['password'=>'admin']);// tìm bản ghi trong bảng users với địa chỉ = hà nội, update tên trường muốn sửa ssang giá trị mới như mật khẩu đổi thành admin
        //update nhiều trường, với nhiều điều kiện
         DB::table('users')->where('address','hà nam')->where('password','admin')->update(['address'=>'bacgiang','level'=>0]);

        //updateorinsert([tìm bả ghi],[update bản ghi])
        DB::table('users')->updaOrInsert(['id'=>'3'],['address'=>'ha noi']);
    });
    //xóa bản ghi
    Route::get('del', function () {
        DB::table('users')->where('id',13)->delete();
    });
    //xoa toan bo ban ghi
    Route::get('del-all', function () {
        DB::table('users')->delete();
    });
});



