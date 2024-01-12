<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RestaurantController;
use App\Models\Category;
use App\Models\restaurant;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

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

Route::get('/test', function () {

    Artisan::call("optimize:clear");
    Artisan::call("route:clear");
    Artisan::call("config:cache");
    $restaurant = restaurant::whereNull('slug')->get();
    foreach($restaurant as $res){
        $res->update([
            "slug" => Str::slug($res->restaurant_name)
        ]);
    }
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    Route::get('change_password',function(){
        return view('auth.confirm-password');
    })->name('change_password');
    Route::post('update_password',[RestaurantController::class,'update_password'])->name('update_password');

});

Route::group(['middleware' => 'auth','middleware' => ['role:manager']], function () {
    Route::get('/restaurants' , [RestaurantController::class,'index'])->name('restaurant.index');
    Route::get('profile/destroy/{image}',[RestaurantController::class,'profile_destroy'])->name('profile.destroy');
    Route::get('restaurant/profile' , [RestaurantController::class,'profile'])->name('restaurant.profile');
    Route::post('profile/menu_add' , [RestaurantController::class,'menu_add'])->name('menu_add');
    Route::get('restaurant/buffet' , [RestaurantController::class,'buffet'])->name('restaurant.buffet');
    Route::get('restaurant/hitea' , [RestaurantController::class,'hitea'])->name('restaurant.hitea');
    Route::get('restaurant/brunch' , [RestaurantController::class,'brunch'])->name('restaurant.brunch');

    Route::post('profile/buffet_add' , [RestaurantController::class,'buffet_add'])->name('buffet_add');
    Route::post('profile/hitea_add' , [RestaurantController::class,'hitea_add'])->name('hitea_add');
    Route::post('profile/brunch_add' , [RestaurantController::class,'brunch_add'])->name('brunch_add');

    Route::post('profile/add' , [RestaurantController::class,'profile_add'])->name('profile_add');
    Route::get('restaurant/menu' , [RestaurantController::class,'menu'])->name('restaurant.menu');
    Route::get('restaurant/addrestaurant' , [RestaurantController::class,'create'])->name('restaurant.create');
    Route::post('restaurant/addrestaurant' , [RestaurantController::class,'store'])->name('restaurant.store');
    Route::get('publish/{id}',[RestaurantController::class,'publish'])->name('publish');
    Route::get('unpublish/{id}',[RestaurantController::class,'unpublish'])->name('unpublish');
    Route::post('checkout',[RestaurantController::class,'checkout'])->name('checkout');
    Route::post('purchasePackage',[RestaurantController::class,'purchasePackage'])->name('purchasePackage');
    Route::get('pending_requests',[RestaurantController::class,'user_pending_requests'])->name('user_pending_requests');
    Route::get('accepted_request',[RestaurantController::class,'accepted_request'])->name('accepted_request');
    Route::post('restaurant/updatesubcategories',[RestaurantController::class,'update'])->name('restaurant.update');
});





Route::group(['middleware' => 'auth','middleware' => ['role:admin']], function () {


//category

Route::get('/categories' , [CategoryController::class,'index'])->name('category.index');
Route::get('categories/addcategories' , [CategoryController::class,'create'])->name('category.create');
Route::post('categories/addcategories' , [CategoryController::class,'store'])->name('category.store');
Route::get('categories/updatecategories/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('categories/updatecategories',[CategoryController::class,'update'])->name('category.update');
Route::get('categories/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::get('make_feature/{restaurant}',[RestaurantController::class,'make_feature'])->name('make_feature');
//menu
Route::get('/menu' , [RestaurantController::class,'index'])->name('menu.index');
Route::get('menu/addmenu' , [RestaurantController::class,'create'])->name('menu.create');

Route::get('admin_restaurant' , [RestaurantController::class,'admin_restaurant'])->name('admin_restaurant');
Route::get('viewsinglerestaurant/{id}' , [RestaurantController::class,'viewsinglerestaurant'])->name('viewsinglerestaurant');
Route::get('readall',[RestaurantController::class,'readall'])->name("readall");
Route::get('bannerad',[RestaurantController::class,'bannerad'])->name("bannerad");
Route::post('bannerads',[RestaurantController::class,'bannerads'])->name("bannerads");
Route::get('ads_delete/{id}',[RestaurantController::class,'ads_delete'])->name('ads_delete');
Route::get('publisad/{id}',[RestaurantController::class,'publisad'])->name('publisad');
Route::get('unpublisad/{id}',[RestaurantController::class,'unpublisad'])->name('unpublisad');
Route::get('pending_requests_admin',[RestaurantController::class,'pending_requests_admin'])->name('pending_requests_admin');
Route::get('accepted_request_admin',[RestaurantController::class,'accepted_request_admin'])->name('accepted_request_admin');
Route::post('change_payment_status',[RestaurantController::class,'change_payment_status'])->name('change_payment_status');
Route::post('change_ad_status',[RestaurantController::class,'change_ad_status'])->name('change_ad_status');
Route::get('stop_advertisement/{ad}',[RestaurantController::class,'stop_advertisement'])->name('stop_advertisement');
Route::get('delete_request/{ad}',[RestaurantController::class,'delete_request'])->name('delete_request');
Route::get('restaurant/updaterestaurant/{id}',[RestaurantController::class,'edit'])->name('restaurant.edit');






});

Route::get('restaurant/destroy/{id}',[RestaurantController::class,'destroy'])->name('restaurant.destroy')->middleware('auth');
Route::get('/' , [BlogController::class,'index']);
Route::get('/About' , [BlogController::class,'About']);
Route::get('searchbycategory/{id}',[BlogController::class,'searchbycategory'])->name('searchbycategory');
Route::post('searchcategorysearch/{id}',[BlogController::class,'searchcategorysearch'])->name('searchcategorysearch');
Route::get('packages' , [BlogController::class,'packages'])->name('packages');

Route::any('search_filter',[BlogController::class,'search_filter'])->name('search_filter');
Route::get('/Contact' , [BlogController::class,'Contact']);
Route::get('/blog' , [BlogController::class,'blog']);
Route::get('details/{restaurant}' , [RestaurantController::class,'restaurant_details'])->name('restaurant_details');
Route::post('add_review',[RestaurantController::class,'add_review'])->name('add_review');
Route::get('forgot_password',function(){
    return view('auth.forgot-password');
})->name('forgot_password');

Route::post('contactemail',[BlogController::class,'contactemail'])->name('contactemail');
require __DIR__.'/auth.php';

Route::get('buzzintown',[BlogController::class,'buzzintown'])->name('buzzintown');
Route::get('howitworks',[BlogController::class,'howitworks'])->name('howitworks');
Route::get('policy',function(){
    $data = Category::all();
    return view('frontend.policy',compact('data'));
})->name('policy');
Route::get('terms',function(){
    $data = Category::all();
    return view('frontend.terms',compact('data'));
})->name('terms');



