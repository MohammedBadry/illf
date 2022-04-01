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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{

    // front routes
    Auth::routes();

    //social login routes
    Route::get('/redirect/{service}', 'SocialAuthController@redirect');
    Route::get('/callback/{service}', 'SocialAuthController@callback');

    Route::get('/clearcache185', function () {
        $clearcache = Artisan::call('cache:clear');
        echo "Cache cleared<br>";

        $clearview = Artisan::call('view:clear');
        echo "View cleared<br>";
    });

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('signinphone','HomeController@signinphone');
    Route::post('loginwithphone','HomeController@loginwithphone');
    Route::get('signinphone_activation','HomeController@signinphone_activation');
    Route::post('activat_account','HomeController@activat_account');
    Route::get('join_illff','HomeController@vendorjoin');
    Route::post('vendor_register','HomeController@vendorregister');
    Route::get('join_iilff_response','HomeController@joiniilffresponse');
    Route::get('products/{id}','HomeController@search');
    Route::get('products','HomeController@products');
    Route::get('search','HomeController@search2');
    Route::get('p/{id}','HomeController@showproduct');


    Route::post('/sendemail', 'HomeController@store');
    Route::resource('contactus','contactController');
    Route::get('aboutus','HomeController@aboutus');
    Route::get('privacy','HomeController@privacy');
    Route::get('policy','HomeController@policy');
    Route::get('faq','HomeController@faq');
    Route::get('support','HomeController@support');
    Route::get('charge','HomeController@charge');
    Route::get('return','HomeController@return');
    Route::get('epolicy','HomeController@epolicy');
    Route::get('bankaccounts','HomeController@bankaccounts');
    Route::resource('cart','cartController');
    Route::resource('items','itemController');
    Route::resource('categories','categoryController');

    Route::group(['middleware' => ['auth:web']], function ()
    {
        Route::resource('profile','profileController');
        Route::get('myorders','profileController@index2');
        Route::get('myfavorites','profileController@index3');
        Route::get('mynotification','profileController@index4');
        Route::get('mybills','profileController@index5');
        Route::get('orders/{id}','profileController@showorder');
        Route::post('orders/{id}','profileController@makeReturn');
        Route::post('addtowishlist','HomeController@addtowishlist');
        Route::post('removefromwishlist/{id}','HomeController@removefromwishlist');
        Route::get('cartcharge','cartController@index2');
        Route::get('wishlist','HomeController@wishlist');
        Route::get('checkout','cartController@checkout');
        Route::get('banktransfer/{id}','profileController@banktransfer');
        Route::post('sendbanktransfer/{id}','profileController@sendbanktransfer');
        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
        Route::post('coupon/{code}','HomeController@useCoupon');
    });
});
/*
// change language routes
Route::get('locale/{locale}', function ($locale)
{
    Session::put('locale', $locale);
    return redirect()->back();
});
*/

//admin routes
Route::resource('adminpanel/','adminloginController');
Route::group(['middleware' => ['adminauth:admin']], function ()
{
  Route::resource('adminpanel/users','adminmemberController');
  Route::get('adminpanel/phoneusers','adminmemberController@index2');
  Route::get('adminpanel/facebookusers','adminmemberController@index3');
  Route::get('adminpanel/googleusers','adminmemberController@index4');
  Route::resource('adminpanel/vendors','adminvendorController');
  Route::get('adminpanel/newvendors','adminvendorController@index2');
  Route::resource('adminpanel/countries','admincountryController');
  Route::get('adminpanel/cities/{id}','admincountryController@show2');

  Route::resource('adminpanel/provider','providerController');
  Route::resource('adminpanel/about','adminaboutController');
  Route::resource('adminpanel/privacy','adminprivacyController');
  Route::resource('adminpanel/conditions','adminconditionsController');
  Route::resource('adminpanel/faq','adminfaqController');
  Route::resource('adminpanel/support','adminsupportController');
  Route::resource('adminpanel/charge','adminchargeController');
  Route::resource('adminpanel/return','adminreturnController');
  Route::resource('adminpanel/epolicy','adminepolicyController');
  Route::resource('adminpanel/home-adv','adminhomeadvController');
  Route::resource('adminpanel/setapp','adminchangelogoController');
  Route::resource('adminpanel/items','adminitemController');
  Route::post('adminpanel/filtercats', 'adminitemController@filtercats');
  Route::post('adminpanel/filterfeatures', 'adminitemController@filterfeatures');
  Route::delete('myitemssDeleteAll', 'adminitemController@deleteAll');
  Route::resource('adminpanel/bills','adminillController');
  Route::resource('adminpanel/orders','adminorderController');
  Route::delete('myordersDeleteAll', 'adminorderController@deleteAll');
  Route::get('adminpanel/itemrates/{id}','adminitemController@showrates');
  Route::resource('adminpanel/contactus','admincontactController');
  Route::delete('mycontactsDeleteAll', 'admincontactController@deleteAll');
  Route::resource('adminpanel/transfers','admintransferController');
  Route::delete('mytransferDeleteAll', 'admintransferController@deleteAll');
  Route::get('adminpanel/adcomments/{id}','adminadController@showcomments');
  Route::get('adminpanel/adrates/{id}','adminadController@showrates');
  Route::resource('adminpanel/sliders','adminsliderController');
  Route::delete('mysliderDeleteAll', 'adminsliderController@deleteAll');
  Route::resource('adminpanel/categories','admincategoryController');
  Route::resource('adminpanel/features','adminfeatureController');
  Route::resource('adminpanel/coupons','admincouponController');
});

// ajax routes
Route::post('filtercities','HomeController@filtercity');

//admin logout
Route::Delete('adminpanel/{id}','adminloginController@destroy');


