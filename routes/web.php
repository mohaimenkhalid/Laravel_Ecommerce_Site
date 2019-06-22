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

Route::get('/', 'Frontend\PagesController@index')->name('index');


/*
 product Frontend Routes
All the routes for our product for frontend

*/
Route::group(['prefix' => 'products'], function(){
	Route::get('/', 'Frontend\ProductsController@index')->name('products');
	Route::get('/search', 'Frontend\PagesController@search')->name('search');
	Route::get('/{slug}', 'Frontend\ProductsController@show')->name('products.show');

	//Category show
	Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories.index');
	Route::get('/categories/{id}', 'Frontend\CategoriesController@show')->name('categories.show');

	});


//User Routes....
Route::group(['prefix' => 'user'], function(){
	Route::get('/token/{id}', 'Frontend\VerificationController@verify')->name('user.activation');
	Route::get('/dashboard', 'Frontend\UsersController@dashboard')->name('user.dashboard');
	Route::get('/profile', 'Frontend\UsersController@profile')->name('user.profile');
	Route::post('/profile/update', 'Frontend\UsersController@profileUpdate')->name('user.profile.update');

});


//Cart Routes....
Route::group(['prefix' => 'carts'], function(){
	Route::get('/', 'Frontend\CartsController@index')->name('carts');
	Route::post('/store', 'Frontend\CartsController@store')->name('carts.store');
	Route::post('/update/{id}', 'Frontend\CartsController@update')->name('carts.update');
	Route::post('/delete/{id}', 'Frontend\CartsController@destroy')->name('carts.delete');

});

//Checkout Routes....
Route::group(['prefix' => 'checkout'], function(){
	Route::get('/', 'Frontend\CheckoutsController@index')->name('checkouts');
	Route::post('/store', 'Frontend\CheckoutsController@store')->name('checkouts.store');


});


//Admin Routes
Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'Backend\PagesController@index')->name('admin.index');

	//Admin Login Routes
	Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
	Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');


	//Admin Password reset link Email send
	Route::get('/password/reset', 'Auth\admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request'); 
	Route::post('/password/resetpw', 'Auth\admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');


	//Admin Password reset...
	Route::get('/password/reset/{token}', 'Auth\admin\ResetPasswordController@showResetForm')->name('admin.password.reset'); 
	Route::post('/password/reset/post', 'Auth\admin\ResetPasswordController@reset')->name('admin.password.update'); //admin.password.reset.post



//Admin Product Routes  
	Route::group(['prefix' => '/products'], function(){
		Route::get('/', 'Backend\ProductsController@index')->name('admin.products');
		Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');
		Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
		Route::post('/store', 'Backend\ProductsController@store')->name('admin.product.store');
		Route::post('product/update/{id}', 'Backend\ProductsController@update')->name('admin.product.update');
		Route::post('product/delete/{id}', 'Backend\ProductsController@delete')->name('admin.product.delete');

	});


	//Admin Orders Routes
	Route::group(['prefix' => '/orders'], function(){
		Route::get('/', 'Backend\OrdersController@index')->name('admin.orders');
		Route::get('/show/{id}', 'Backend\OrdersController@show')->name('admin.orders.view');
		Route::post('/delete/{id}', 'Backend\OrdersController@delete')->name('admin.orders.delete');

		Route::post('/seen/{id}', 'Backend\OrdersController@seen')->name('admin.orders.seen');
		Route::post('/paid/{id}', 'Backend\OrdersController@paid')->name('admin.orders.paid');
		Route::post('/completed/{id}', 'Backend\OrdersController@completed')->name('admin.orders.completed');


	});


	//Admin Category Routes
	Route::group(['prefix' => '/categories'], function(){
		Route::get('/', 'Backend\CategoriesController@index')->name('admin.categories');
		Route::get('/edit/{id}', 'Backend\CategoriesController@edit')->name('admin.category.edit');
		Route::get('/create', 'Backend\CategoriesController@create')->name('admin.category.create');
		Route::post('/store', 'Backend\CategoriesController@store')->name('admin.category.store');
		Route::post('category/update/{id}', 'Backend\CategoriesController@update')->name('admin.category.update');
		Route::post('category/delete/{id}', 'Backend\CategoriesController@delete')->name('admin.category.delete');


	});


	//Admin Brand Routes
	Route::group(['prefix' => '/brands'], function(){
		Route::get('/', 'Backend\BrandsController@index')->name('admin.brands');
		Route::get('/edit/{id}', 'Backend\BrandsController@edit')->name('admin.brand.edit');
		Route::get('/create', 'Backend\BrandsController@create')->name('admin.brand.create');
		Route::post('/store', 'Backend\BrandsController@store')->name('admin.brand.store');
		Route::post('brand/update/{id}', 'Backend\BrandsController@update')->name('admin.brand.update');
		Route::post('brand/delete/{id}', 'Backend\BrandsController@delete')->name('admin.brand.delete');

	});


	// Division Routes
	Route::group(['prefix' => '/divisions'], function(){
		Route::get('/', 'Backend\DivisionsController@index')->name('admin.divisions');
		Route::get('/edit/{id}', 'Backend\DivisionsController@edit')->name('admin.division.edit');
		Route::get('/create', 'Backend\DivisionsController@create')->name('admin.division.create');
		Route::post('/store', 'Backend\DivisionsController@store')->name('admin.division.store');
		Route::post('division/update/{id}', 'Backend\DivisionsController@update')->name('admin.division.update');
		Route::post('division/delete/{id}', 'Backend\DivisionsController@delete')->name('admin.division.delete');

	});

	// Division Routes
	Route::group(['prefix' => '/districts'], function(){
		Route::get('/', 'Backend\DistrictsController@index')->name('admin.districts');
		Route::get('/edit/{id}', 'Backend\DistrictsController@edit')->name('admin.district.edit');
		Route::get('/create', 'Backend\DistrictsController@create')->name('admin.district.create');
		Route::post('/store', 'Backend\DistrictsController@store')->name('admin.district.store');
		Route::post('district/update/{id}', 'Backend\DistrictsController@update')->name('admin.district.update');
		Route::post('district/delete/{id}', 'Backend\DistrictsController@delete')->name('admin.district.delete');

	});



});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//API routes

Route::get('get-districts/{id}', function($id){

	return json_encode(App\Models\District::where('division_id', $id)->get());

});
