<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;




Route::get('/robots.txt', function () {
  return response()->file(public_path('robots.txt'));
});
Route::get('/sitemap.xml', function () {
  return response()->make(file_get_contents(public_path('sitemap.xml')), 200, [
    'Content-Type' => 'application/xml'
  ]);
});

// ************************************ ADMIN SECTION **********************************************

Route::prefix('admin')->group(function () {

  //------------ ADMIN LOGIN SECTION ------------

  Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
  Route::get('/forgot', 'Admin\LoginController@showForgotForm')->name('admin.forgot');
  Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin.forgot.submit');
  Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

  //------------ ADMIN LOGIN SECTION ENDS ------------
  Route::get('/mode/{id}', 'Admin\DashboardController@mode')->name('admin.mode');

  //------------ ADMIN NOTIFICATION SECTION ------------

  // User Notification
  Route::get('/user/notf/show', 'Admin\NotificationController@user_notf_show')->name('user-notf-show');
  Route::get('/user/notf/count', 'Admin\NotificationController@user_notf_count')->name('user-notf-count');
  Route::get('/user/notf/clear', 'Admin\NotificationController@user_notf_clear')->name('user-notf-clear');
  // User Notification Ends

  // Order Notification
  Route::get('/order/notf/show', 'Admin\NotificationController@order_notf_show')->name('order-notf-show');
  Route::get('/order/notf/count', 'Admin\NotificationController@order_notf_count')->name('order-notf-count');
  Route::get('/order/notf/clear', 'Admin\NotificationController@order_notf_clear')->name('order-notf-clear');
  // Order Notification Ends

  // Product Notification
  Route::get('/product/notf/show', 'Admin\NotificationController@product_notf_show')->name('product-notf-show');
  Route::get('/product/notf/count', 'Admin\NotificationController@product_notf_count')->name('product-notf-count');
  Route::get('/product/notf/clear', 'Admin\NotificationController@product_notf_clear')->name('product-notf-clear');
  // Product Notification Ends

  // Product Notification
  Route::get('/conv/notf/show', 'Admin\NotificationController@conv_notf_show')->name('conv-notf-show');
  Route::get('/conv/notf/count', 'Admin\NotificationController@conv_notf_count')->name('conv-notf-count');
  Route::get('/conv/notf/clear', 'Admin\NotificationController@conv_notf_clear')->name('conv-notf-clear');




  // Product Notification Ends

  //------------ ADMIN NOTIFICATION SECTION ENDS ------------

  //------------ ADMIN DASHBOARD & PROFILE SECTION ------------
  Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
  Route::get('/profile', 'Admin\DashboardController@profile')->name('admin.profile');
  Route::post('/profile/update', 'Admin\DashboardController@profileupdate')->name('admin.profile.update');
  Route::get('/password', 'Admin\DashboardController@passwordreset')->name('admin.password');
  Route::post('/password/update', 'Admin\DashboardController@changepass')->name('admin.password.update');
  //------------ ADMIN DASHBOARD & PROFILE SECTION ENDS ------------



  // user cart information


  Route::get('/CutomerCart/datatables', 'Admin\UserCartController@datatables')->name('admin-user-cart-datatables'); //JSON REQUEST
  Route::get('/CutomerCart', 'Admin\UserCartController@index')->name('admin-user-cart-index');
  Route::get('/CutomerCart/{id}', 'Admin\UserCartController@CustomerCartDetails')->name('admin-user-cart-show');
  Route::get('/CutomerCart/{id}/delete', 'Admin\UserCartController@CustomerCartDelete')->name('admin-user-cart-delete');






  //------------ ADMIN ORDER SECTION ------------




  Route::group(['middleware' => 'permissions:vendors'], function () {

    Route::get('/vendors/datatables', 'Admin\VendorController@datatables')->name('admin-vendor-datatables');
    Route::get('/vendors', 'Admin\VendorController@index')->name('admin-vendor-index');

    Route::get('/vendors/{id}/show', 'Admin\VendorController@show')->name('admin-vendor-show');
    Route::get('/vendors/secret/login/{id}', 'Admin\VendorController@secret')->name('admin-vendor-secret');
    Route::get('/vendor/edit/{id}', 'Admin\VendorController@edit')->name('admin-vendor-edit');
    Route::post('/vendor/edit/{id}', 'Admin\VendorController@update')->name('admin-vendor-update');

    Route::get('/vendor/verify/{id}', 'Admin\VendorController@verify')->name('admin-vendor-verify');
    Route::post('/vendor/verify/{id}', 'Admin\VendorController@verifySubmit')->name('admin-vendor-verify-submit');

    Route::get('/vendors', 'Admin\VendorController@index')->name('admin-vendor-index');
    Route::get('/vendor/color', 'Admin\VendorController@color')->name('admin-vendor-color');
    Route::get('/vendors/status/{id1}/{id2}', 'Admin\VendorController@status')->name('admin-vendor-st');
    Route::get('/vendors/delete/{id}', 'Admin\VendorController@destroy')->name('admin-vendor-delete');

    Route::get('/vendors/withdraws/datatables', 'Admin\VendorController@withdrawdatatables')->name('admin-vendor-withdraw-datatables'); //JSON REQUEST
    Route::get('/vendors/withdraws', 'Admin\VendorController@withdraws')->name('admin-vendor-withdraw-index');
    Route::get('/vendors/withdraw/{id}/show', 'Admin\VendorController@withdrawdetails')->name('admin-vendor-withdraw-show');
    Route::get('/vendors/withdraws/accept/{id}', 'Admin\VendorController@accept')->name('admin-vendor-withdraw-accept');
    Route::get('/vendors/withdraws/reject/{id}', 'Admin\VendorController@reject')->name('admin-vendor-withdraw-reject');

    //  Vendor Registration Section

    Route::get('/general-settings/vendor-registration/{status}', 'Admin\GeneralSettingController@regvendor')->name('admin-gs-regvendor');

    //  Vendor Registration Section Ends



    // Verification Section

    Route::get('/verificatons/datatables/{status}', 'Admin\VerificationController@datatables')->name('admin-vr-datatables');
    Route::get('/verificatons', 'Admin\VerificationController@index')->name('admin-vr-index');
    Route::get('/verificatons/pendings', 'Admin\VerificationController@pending')->name('admin-vr-pending');

    Route::get('/verificatons/show', 'Admin\VerificationController@show')->name('admin-vr-show');
    Route::get('/verificatons/edit/{id}', 'Admin\VerificationController@edit')->name('admin-vr-edit');
    Route::post('/verificatons/edit/{id}', 'Admin\VerificationController@update')->name('admin-vr-update');
    Route::get('/verificatons/status/{id1}/{id2}', 'Admin\VerificationController@status')->name('admin-vr-st');
    Route::get('/verificatons/delete/{id}', 'Admin\VerificationController@destroy')->name('admin-vr-delete');



    // Verification Section Ends



  });


  Route::group(['middleware' => 'permissions:orders'], function () {

    Route::get('/orders/datatables/{slug}', 'Admin\OrderController@datatables')->name('admin-order-datatables'); //JSON REQUEST
    Route::get('/orders', 'Admin\OrderController@index')->name('admin-order-index');
    Route::get('/order/edit/{id}', 'Admin\OrderController@edit')->name('admin-order-edit');
    Route::post('/order/update/{id}', 'Admin\OrderController@update')->name('admin-order-update');
    Route::get('/orders/pending', 'Admin\OrderController@pending')->name('admin-order-pending');
    Route::get('/orders/processing', 'Admin\OrderController@processing')->name('admin-order-processing');
    Route::get('/orders/completed', 'Admin\OrderController@completed')->name('admin-order-completed');
    Route::get('/orders/declined', 'Admin\OrderController@declined')->name('admin-order-declined');
    Route::get('/order/{id}/show', 'Admin\OrderController@show')->name('admin-order-show');
    Route::get('/order/{id}/invoice', 'Admin\OrderController@invoice')->name('admin-order-invoice');
    Route::get('/order/{id}/print', 'Admin\OrderController@printpage')->name('admin-order-print');
    Route::get('/order/{id1}/status/{status}', 'Admin\OrderController@status')->name('admin-order-status');
    Route::post('/order/email/', 'Admin\OrderController@emailsub')->name('admin-order-emailsub');
    Route::post('/order/{id}/license', 'Admin\OrderController@license')->name('admin-order-license');
    Route::get('/order/api/{l}', 'Admin\OrderController@fastlo_show')->name('admin-order-fastlooshow');
    Route::get('deletss_api/{t}', 'Admin\OrderController@fastlos_api_delete');
    Route::get('aramexdetailz/{l}', 'Admin\OrderController@aramex')->name('admin-order');
    Route::get('/order/delete/{id}', 'Admin\OrderController@aramex_delete_pickupz')->name('aramexcancell');
    Route::get('aramextracks/{j}', 'Admin\OrderController@aramex_traack')->name('tracks_aramexx');
    Route::get('fedexlastscan/{id}', 'Admin\OrderController@fedexx')->name('admin-order');
    Route::get('generate_pdf', 'Admin\OrderController@generate_pdf')->name('generate_pdf');
    Route::get('fedexpdff/{j}', 'Admin\OrderController@fedex_Pdf')->name('trackfedex');
    Route::get('/order/{id}/printPolice', 'Admin\OrderController@printPolice')->name('admin-order-printPolice');

    Route::get('/ordersreportform', 'Admin\OrderController@reportsform')->name('admin-order-report-index-form');
    Route::post('/ordersreport', 'Admin\OrderController@reports')->name('admin-order-report-index');
    Route::get('abs_awbs', 'Admin\absController@Awbs')->name('admin-abs-index');
    Route::get('/order/abs/{id}', 'Admin\absController@shipment')->name('admin-order-abs');
    Route::get('mylerzawb/{id}', 'Admin\MylerzController@Awb')->name('admin-mylerz-index');
    Route::get('/order/mylerz/{id}', 'Admin\MylerzController@shipmentstatus')->name('admin-order-mylerz');



    Route::get('getposta', 'Admin\OrderController@getapi');
    Route::delete('deleteapi/{id}', 'Admin\OrderController@deleteapiss')->name('deleteapi');
    Route::get('postaa', 'Admin\OrderController@postapi');
    Route::get('showsposta/{id}', 'Admin\OrderController@showbosta');

    Route::get('/order/{id}/track', 'Admin\OrderTrackController@index')->name('admin-order-track');
    Route::get('/order/{id}/trackload', 'Admin\OrderTrackController@load')->name('admin-order-track-load');
    Route::post('/order/track/store', 'Admin\OrderTrackController@store')->name('admin-order-track-store');
    Route::get('/order/track/add', 'Admin\OrderTrackController@add')->name('admin-order-track-add');
    Route::get('/order/track/edit/{id}', 'Admin\OrderTrackController@edit')->name('admin-order-track-edit');
    Route::post('/order/track/update/{id}', 'Admin\OrderTrackController@update')->name('admin-order-track-update');
    Route::get('/order/track/delete/{id}', 'Admin\OrderTrackController@delete')->name('admin-order-track-delete');

    // Order Tracking Ends

  });

  //------------ ADMIN ORDER SECTION ENDS------------


  //------------ ADMIN PRODUCT SECTION ------------

  Route::group(['middleware' => 'permissions:services'], function () {

    Route::get('/services/datatables', 'Admin\ProductController@datatables')->name('admin-prod-datatables'); //JSON REQUEST
    Route::get('/services', 'Admin\ProductController@index')->name('admin-prod-index');

    Route::post('/services/upload/update/{id}', 'Admin\ProductController@uploadUpdate')->name('admin-prod-upload-update');

    Route::get('/services/deactive/datatables', 'Admin\ProductController@deactivedatatables')->name('admin-prod-deactive-datatables'); //JSON REQUEST
    Route::get('/services/deactive', 'Admin\ProductController@deactive')->name('admin-prod-deactive');


    Route::get('/services/catalogs/datatables', 'Admin\ProductController@catalogdatatables')->name('admin-prod-catalog-datatables'); //JSON REQUEST
    Route::get('/services/catalogs/', 'Admin\ProductController@catalogs')->name('admin-prod-catalog-index');

    // CREATE SECTION
    Route::get('/services/types', 'Admin\ProductController@types')->name('admin-prod-types');
    Route::get('/services/create', 'Admin\ProductController@createPhysical')->name('admin-prod-physical-create');
    Route::get('/services/digital/create', 'Admin\ProductController@createDigital')->name('admin-prod-digital-create');
    Route::get('/services/license/create', 'Admin\ProductController@createLicense')->name('admin-prod-license-create');
    Route::post('/services/store', 'Admin\ProductController@store')->name('admin-prod-store');
    Route::get('/getattributes', 'Admin\ProductController@getAttributes')->name('admin-prod-getattributes');
    // CREATE SECTION

    // EDIT SECTION
    Route::get('/services/edit/{id}', 'Admin\ProductController@edit')->name('admin-prod-edit');
    Route::post('/services/edit/{id}', 'Admin\ProductController@update')->name('admin-prod-update');

    // EDIT SECTION ENDS



    // DELETE SECTION
    Route::get('/services/delete/{id}', 'Admin\ProductController@destroy')->name('admin-prod-delete');
    Route::get('/related/delete/{id}', 'Admin\ProductController@relateddelete')->name('admin-related-delete');
    // DELETE SECTION ENDS


    Route::get('/services/catalog/{id1}/{id2}', 'Admin\ProductController@catalog')->name('admin-prod-catalog');


    Route::post('/services/deactivate', 'Admin\ProductController@ckeckall')->name('admin-prod-all');
    Route::post('/services/activate', 'Admin\ProductController@ckeckactivate')->name('admin-prod-activate');
    Route::post('/services/deleted', 'Admin\ProductController@ckeckdelete')->name('admin-prod-deleted');
    Route::post('/services/catalog/all', 'Admin\ProductController@ckeckcatalog')->name('admin-pro-catalog');
    Route::get('/services/features/all', 'Admin\ProductController@ckeckfeature')->name('admin-pro-feature');
    Route::post('/services/features/alls', 'Admin\ProductController@ckeckfeatures')->name('admin-pro-features');





    Route::get('/add/notfiy_for_users', 'Admin\ProductController@AddNotifyTOUsers')->name('admin-add-notify-to-users');
    Route::post('/store/notfiy_for_users', 'Admin\ProductController@StoreNotifyTOUsers')->name('admin-store-notify-to-users');


    //------------ ADMIN speakers ------------

    Route::get('/speakers/datatables', 'Admin\ShipmentController@datatables')->name('admin-shipment-datatables');
    Route::get('/speakers', 'Admin\ShipmentController@index')->name('admin-shipment-index');
    Route::get('/speakers/create', 'Admin\ShipmentController@create')->name('admin-shipment-create');
    Route::post('/speakers/store', 'Admin\ShipmentController@store')->name('admin-shipment-store');
    Route::get('/speakers/edit/{id}', 'Admin\ShipmentController@edit')->name('admin-shipment-edit');
    Route::post('/speakers/edit/{id}', 'Admin\ShipmentController@update')->name('admin-shipment-update');
    Route::get('/speakers/delete/{id}', 'Admin\ShipmentController@destroy')->name('admin-shipment-delete');

    //------------ ADMIN speakers ENDS ------------

    //------------ ADMIN PRODUCT SECTION ENDS------------

  });



  Route::group(['middleware' => 'permissions:about_us'], function () {

    // about us  section

    Route::get('/about-us/datatables', 'Admin\BrandController@datatables')->name('admin-brand-datatables'); //JSON REQUEST
    Route::get('/about-us', 'Admin\BrandController@index')->name('admin-brand-index');
    Route::get('/about-us/create', 'Admin\BrandController@create')->name('admin-brand-create');
    Route::post('/about-us/create', 'Admin\BrandController@store')->name('admin-brand-store');
    Route::get('/about-us/edit/{id}', 'Admin\BrandController@edit')->name('admin-brand-edit');
    Route::post('/about-us/edit/{id}', 'Admin\BrandController@update')->name('admin-brand-update');
    Route::get('/about-us/delete/{id}', 'Admin\BrandController@destroy')->name('admin-brand-delete');
    Route::get('/about-us/status/{id1}/{id2}', 'Admin\BrandController@status')->name('admin-brand-status');

    Route::post('/about-us/deactivate', 'Admin\BrandController@ckeckall')->name('admin-brand-all');
    Route::post('/about-us/activate', 'Admin\BrandController@ckeckactivate')->name('admin-brand-activate');
    Route::post('/about-us/deleted', 'Admin\BrandController@ckeckdelete')->name('admin-brand-deleted');

    Route::get('/general-settings/brands/{status}', 'Admin\GeneralSettingController@brands')->name('admin-gs-isbrand');

    //------------ ADMIN SERVICE SECTION ------------

    Route::get('/ourteam/datatables', 'Admin\OurTeamController@datatables')->name('admin-service-datatables'); //JSON REQUEST
    Route::get('/ourteam', 'Admin\OurTeamController@index')->name('admin-service-index');
    Route::get('/ourteam/create', 'Admin\OurTeamController@create')->name('admin-service-create');
    Route::post('/ourteam/create', 'Admin\OurTeamController@store')->name('admin-service-store');
    Route::get('/ourteam/edit/{id}', 'Admin\OurTeamController@edit')->name('admin-service-edit');
    Route::post('/ourteam/edit/{id}', 'Admin\OurTeamController@update')->name('admin-service-update');
    Route::get('/ourteam/delete/{id}', 'Admin\OurTeamController@destroy')->name('admin-service-delete');

    //------------ ADMIN SERVICE SECTION ENDS ------------

    Route::get('/history', 'Admin\CountryController@index')->name('admin-country-index');
    Route::get('/home-about', 'Admin\CountryController@home_about')->name('admin-home_about-index');

    //   sponsors
    Route::get('sponsors/datatables', 'Admin\adsController@datatables')->name('admin-ads-datatables'); //JSON REQUEST
    Route::get('sponsors/datatables2', 'Admin\adsController@datatables2')->name('admin-ads-datatables2'); //JSON REQUEST
    Route::get('sponsors/all', 'Admin\adsController@index')->name('admin-ads-index');
    Route::get('sponsors/create', 'Admin\adsController@create')->name('admin-ads-add');
    Route::post('sponsors/create', 'Admin\adsController@store')->name('admin-ads-store');
    Route::get('sponsors/edit/{id}', 'Admin\adsController@edit')->name('admin-ads-edit');
    Route::post('sponsors/edit/{id}', 'Admin\adsController@update')->name('admin-ads-update');
    Route::get('sponsors/delete/{id}', 'Admin\adsController@destroy')->name('admin-ads-delete');
  });

  //------------ ADMIN AFFILIATE PRODUCT SECTION ENDS ------------


  //------------ ADMIN USER SECTION ------------

  Route::group(['middleware' => 'permissions:customers'], function () {

    Route::get('/users/datatables', 'Admin\UserController@datatables')->name('admin-user-datatables'); //JSON REQUEST
    Route::get('/users', 'Admin\UserController@index')->name('admin-user-index');
    Route::get('/users/edit/{id}', 'Admin\UserController@edit')->name('admin-user-edit');
    Route::post('/users/edit/{id}', 'Admin\UserController@update')->name('admin-user-update');
    Route::get('/users/delete/{id}', 'Admin\UserController@destroy')->name('admin-user-delete');
    Route::get('/user/{id}/show', 'Admin\UserController@show')->name('admin-user-show');
    Route::get('/users/ban/{id1}/{id2}', 'Admin\UserController@ban')->name('admin-user-ban');
    Route::get('/user/default/image', 'Admin\UserController@image')->name('admin-user-image');

    // WITHDRAW SECTION
    Route::get('/users/withdraws/datatables', 'Admin\UserController@withdrawdatatables')->name('admin-withdraw-datatables'); //JSON REQUEST
    Route::get('/users/withdraws', 'Admin\UserController@withdraws')->name('admin-withdraw-index');
    Route::get('/user/withdraw/{id}/show', 'Admin\UserController@withdrawdetails')->name('admin-withdraw-show');
    Route::get('/users/withdraws/accept/{id}', 'Admin\UserController@accept')->name('admin-withdraw-accept');
    Route::get('/user/withdraws/reject/{id}', 'Admin\UserController@reject')->name('admin-withdraw-reject');
    // WITHDRAW SECTION ENDS


  });

  //------------ ADMIN USER SECTION ENDS ------------






  //------------ ADMIN CATEGORY SECTION ------------

  Route::group(['middleware' => 'permissions:services'], function () {

    Route::get('/category/datatables', 'Admin\CategoryController@datatables')->name('admin-cat-datatables'); //JSON REQUEST
    Route::get('/category', 'Admin\CategoryController@index')->name('admin-cat-index');
    Route::get('/category/create', 'Admin\CategoryController@create')->name('admin-cat-create');
    Route::post('/category/create', 'Admin\CategoryController@store')->name('admin-cat-store');
    Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin-cat-edit');
    Route::post('/category/edit/{id}', 'Admin\CategoryController@update')->name('admin-cat-update');
    Route::get('/category/delete/{id}', 'Admin\CategoryController@destroy')->name('admin-cat-delete');
    Route::get('/category/status/{id1}/{id2}', 'Admin\CategoryController@status')->name('admin-cat-status');

    Route::post('/category/deactivate', 'Admin\CategoryController@ckeckall')->name('admin-cat-all');
    Route::post('/category/activate', 'Admin\CategoryController@ckeckactivate')->name('admin-cat-activate');
    Route::post('/category/deleted', 'Admin\CategoryController@ckeckdelete')->name('admin-cat-deleted');

    Route::get('/mainservices/datatables', 'Admin\CategoryController@datatables2')->name('admin-cat2-datatables');
    Route::get('/mainservices', 'Admin\CategoryController@index2')->name('admin-cat2-index');
    Route::get('/mainservices/create', 'Admin\CategoryController@create2')->name('admin-cat2-create');
    //------------ ADMIN ATTRIBUTE SECTION ------------



    // SUBCATEGORY SECTION ------------

    Route::get('/subcategory/datatables', 'Admin\SubCategoryController@datatables')->name('admin-subcat-datatables'); //JSON REQUEST
    Route::get('/subcategory', 'Admin\SubCategoryController@index')->name('admin-subcat-index');
    Route::get('/subcategory/create', 'Admin\SubCategoryController@create')->name('admin-subcat-create');
    Route::post('/subcategory/create', 'Admin\SubCategoryController@store')->name('admin-subcat-store');
    Route::get('/subcategory/edit/{id}', 'Admin\SubCategoryController@edit')->name('admin-subcat-edit');
    Route::post('/subcategory/edit/{id}', 'Admin\SubCategoryController@update')->name('admin-subcat-update');
    Route::get('/subcategory/delete/{id}', 'Admin\SubCategoryController@destroy')->name('admin-subcat-delete');
    Route::get('/subcategory/status/{id1}/{id2}', 'Admin\SubCategoryController@status')->name('admin-subcat-status');
    Route::get('/load/subcategories/{id}/', 'Admin\SubCategoryController@load')->name('admin-subcat-load'); //JSON REQUEST


    Route::post('/subcategory/deactivate', 'Admin\SubCategoryController@ckeckall')->name('admin-subcat-all');
    Route::post('/subcategory/activate', 'Admin\SubCategoryController@ckeckactivate')->name('admin-subcat-activate');
    Route::post('/subcategory/deleted', 'Admin\SubCategoryController@ckeckdelete')->name('admin-subcat-deleted');
    // SUBCATEGORY SECTION ENDS------------

    // CHILDCATEGORY SECTION ------------

    Route::get('/childcategory/datatables', 'Admin\ChildCategoryController@datatables')->name('admin-childcat-datatables'); //JSON REQUEST
    Route::get('/childcategory', 'Admin\ChildCategoryController@index')->name('admin-childcat-index');
    Route::get('/childcategory/create', 'Admin\ChildCategoryController@create')->name('admin-childcat-create');
    Route::post('/childcategory/create', 'Admin\ChildCategoryController@store')->name('admin-childcat-store');
    Route::get('/childcategory/edit/{id}', 'Admin\ChildCategoryController@edit')->name('admin-childcat-edit');
    Route::post('/childcategory/edit/{id}', 'Admin\ChildCategoryController@update')->name('admin-childcat-update');
    Route::get('/childcategory/delete/{id}', 'Admin\ChildCategoryController@destroy')->name('admin-childcat-delete');
    Route::get('/childcategory/status/{id1}/{id2}', 'Admin\ChildCategoryController@status')->name('admin-childcat-status');
    Route::get('/load/childcategories/{id}/', 'Admin\ChildCategoryController@load')->name('admin-childcat-load'); //JSON REQUEST


    Route::post('/childcategory/deactivate', 'Admin\ChildCategoryController@ckeckall')->name('admin-childcat-all');
    Route::post('/childcategory/activate', 'Admin\ChildCategoryController@ckeckactivate')->name('admin-childcat-activate');
    Route::post('/childcategory/deleted', 'Admin\ChildCategoryController@ckeckdelete')->name('admin-childcat-deleted');
    // CHILDCATEGORY SECTION ENDS------------

  });

  //------------ ADMIN CATEGORY SECTION ENDS------------




  //------------ ADMIN BLOG DISCUSSION SECTION ------------

  Route::group(['middleware' => 'permissions:blog'], function () {

    // RATING SECTION ENDS------------

    Route::get('/ratings/datatables', 'Admin\RatingController@datatables')->name('admin-rating-datatables'); //JSON REQUEST
    Route::get('/ratings', 'Admin\RatingController@index')->name('admin-rating-index');
    Route::get('/ratings/delete/{id}', 'Admin\RatingController@destroy')->name('admin-rating-delete');
    Route::get('/ratings/show/{id}', 'Admin\RatingController@show')->name('admin-rating-show');

    // RATING SECTION ENDS------------

    // COMMENT SECTION ------------

    Route::get('/comments/datatables', 'Admin\CommentController@datatables')->name('admin-comment-datatables'); //JSON REQUEST
    Route::get('/comments', 'Admin\CommentController@index')->name('admin-comment-index');
    Route::get('/comments/delete/{id}', 'Admin\CommentController@destroy')->name('admin-comment-delete');
    Route::get('/comments/show/{id}', 'Admin\CommentController@show')->name('admin-comment-show');

    // COMMENT CHECK
    Route::get('/general-settings/comment/{status}', 'Admin\GeneralSettingController@comment')->name('admin-gs-iscomment');
    // COMMENT CHECK ENDS


    // COMMENT SECTION ENDS ------------

    // REPORT SECTION ------------

    Route::get('/reports/datatables', 'Admin\ReportController@datatables')->name('admin-report-datatables'); //JSON REQUEST
    Route::get('/reports', 'Admin\ReportController@index')->name('admin-report-index');
    Route::get('/reports/delete/{id}', 'Admin\ReportController@destroy')->name('admin-report-delete');
    Route::get('/reports/show/{id}', 'Admin\ReportController@show')->name('admin-report-show');

    // REPORT CHECK
    Route::get('/general-settings/report/{status}', 'Admin\GeneralSettingController@isreport')->name('admin-gs-isreport');
    // REPORT CHECK ENDS

    // REPORT SECTION ENDS ------------

  });

  //------------ ADMIN BLOG DISCUSSION SECTION ENDS ------------


  //------------ ADMIN COUPON SECTION ------------






  //------------ ADMIN COUPON SECTION ENDS------------

  //------------ ADMIN BLOG SECTION ------------

  Route::group(['middleware' => 'permissions:blog'], function () {

    Route::get('/blog/datatables', 'Admin\BlogController@datatables')->name('admin-blog-datatables'); //JSON REQUEST
    Route::get('/blog', 'Admin\BlogController@index')->name('admin-blog-index');
    Route::get('/blog/create', 'Admin\BlogController@create')->name('admin-blog-create');
    Route::post('/blog/create', 'Admin\BlogController@store')->name('admin-blog-store');
    Route::get('/blog/edit/{id}', 'Admin\BlogController@edit')->name('admin-blog-edit');
    Route::post('/blog/edit/{id}', 'Admin\BlogController@update')->name('admin-blog-update');
    Route::get('/blog/delete/{id}', 'Admin\BlogController@destroy')->name('admin-blog-delete');

    Route::get('/blog/category/datatables', 'Admin\BlogCategoryController@datatables')->name('admin-cblog-datatables'); //JSON REQUEST
    Route::get('/blog/category', 'Admin\BlogCategoryController@index')->name('admin-cblog-index');
    Route::get('/blog/category/create', 'Admin\BlogCategoryController@create')->name('admin-cblog-create');
    Route::post('/blog/category/create', 'Admin\BlogCategoryController@store')->name('admin-cblog-store');
    Route::get('/blog/category/edit/{id}', 'Admin\BlogCategoryController@edit')->name('admin-cblog-edit');
    Route::post('/blog/category/edit/{id}', 'Admin\BlogCategoryController@update')->name('admin-cblog-update');
    Route::get('/blog/category/delete/{id}', 'Admin\BlogCategoryController@destroy')->name('admin-cblog-delete');
  });

  //------------ ADMIN BLOG SECTION ENDS ------------


  //------------ ADMIN USER MESSAGE SECTION ------------

  Route::group(['middleware' => 'permissions:messages'], function () {

    Route::get('/messages/datatables/{type}', 'Admin\MessageController@datatables')->name('admin-message-datatables');
    Route::get('/tickets', 'Admin\MessageController@index')->name('admin-message-index');
    Route::get('/disputes', 'Admin\MessageController@disputes')->name('admin-message-dispute');
    Route::get('/message/{id}', 'Admin\MessageController@message')->name('admin-message-show');
    Route::get('/message/load/{id}', 'Admin\MessageController@messageshow')->name('admin-message-load');
    Route::post('/message/post', 'Admin\MessageController@postmessage')->name('admin-message-store');
    Route::get('/message/{id}/delete', 'Admin\MessageController@messagedelete')->name('admin-message-delete');
    Route::post('/user/send/message', 'Admin\MessageController@usercontact')->name('admin-send-message');
  });

  //------------ ADMIN USER MESSAGE SECTION ENDS ------------

  //------------ ADMIN GENERAL SETTINGS SECTION ------------

  Route::group(['middleware' => 'permissions:general_settings'], function () {

    Route::get('/general-settings/logo', 'Admin\GeneralSettingController@logo')->name('admin-gs-logo');
    Route::get('/general-settings/blocks/icon', 'Admin\GeneralSettingController@blockIcon')->name('admin-gs-block');
    Route::get('/general-settings/blocks/background', 'Admin\GeneralSettingController@background')->name('admin-gs-background');
    Route::get('/general-settings/favicon', 'Admin\GeneralSettingController@fav')->name('admin-gs-fav');
    Route::get('/general-settings/loader', 'Admin\GeneralSettingController@load')->name('admin-gs-load');
    Route::get('/general-settings/Adminloader', 'Admin\GeneralSettingController@load2')->name('admin-gs-load2');
    Route::get('/general-settings/contents', 'Admin\GeneralSettingController@contents')->name('admin-gs-contents');
    Route::get('/general-settings/footer', 'Admin\GeneralSettingController@footer')->name('admin-gs-footer');
    Route::get('/general-settings/header', 'Admin\GeneralSettingController@header')->name('admin-gs-header');
    Route::get('/general-settings/accept', 'Admin\GeneralSettingController@accept')->name('admin-gs-accept');
    Route::get('/general-settings/bank', 'Admin\GeneralSettingController@bank')->name('admin-gs-bankmasr');
    Route::get('/general-settings/nbe', 'Admin\GeneralSettingController@nbe')->name('admin-gs-nbe');
    Route::get('/general-settings/thawani', 'Admin\GeneralSettingController@thwani')->name('admin-gs-thawani');
    Route::get('/general-settings/fawry', 'Admin\GeneralSettingController@fawry')->name('admin-gs-fawry');
    Route::get('/general-settings/fatora', 'Admin\GeneralSettingController@fatora')->name('admin-gs-fatora');
    Route::get('/general-settings/paypal', 'Admin\GeneralSettingController@paypal')->name('admin-gs-paypal');

    Route::get('/general-settings/affilate', 'Admin\GeneralSettingController@affilate')->name('admin-gs-affilate');
    Route::get('/general-settings/error-banner', 'Admin\GeneralSettingController@errorbanner')->name('admin-gs-error-banner');
    Route::get('/general-settings/popup', 'Admin\GeneralSettingController@popup')->name('admin-gs-popup');
    Route::get('/general-settings/maintenance', 'Admin\GeneralSettingController@maintain')->name('admin-gs-maintenance');
    //------------ ADMIN PICKUP LOACTION ------------

    Route::get('/pickup/datatables', 'Admin\PickupController@datatables')->name('admin-pick-datatables'); //JSON REQUEST
    Route::get('/pickup', 'Admin\PickupController@index')->name('admin-pick-index');
    Route::get('/pickup/create', 'Admin\PickupController@create')->name('admin-pick-create');
    Route::post('/pickup/create', 'Admin\PickupController@store')->name('admin-pick-store');
    Route::get('/pickup/edit/{id}', 'Admin\PickupController@edit')->name('admin-pick-edit');
    Route::post('/pickup/edit/{id}', 'Admin\PickupController@update')->name('admin-pick-update');
    Route::get('/pickup/delete/{id}', 'Admin\PickupController@destroy')->name('admin-pick-delete');

    //------------ ADMIN PICKUP LOACTION ENDS ------------

    //------------ ADMIN SHIPPING ------------

    Route::get('/shipping/datatables', 'Admin\ShippingController@datatables')->name('admin-shipping-datatables');
    Route::get('/shipping', 'Admin\ShippingController@index')->name('admin-shipping-index');
    Route::get('/shipping/create', 'Admin\ShippingController@create')->name('admin-shipping-create');
    Route::post('/shipping/create', 'Admin\ShippingController@store')->name('admin-shipping-store');
    Route::get('/shipping/edit/{id}', 'Admin\ShippingController@edit')->name('admin-shipping-edit');
    Route::post('/shipping/edit/{id}', 'Admin\ShippingController@update')->name('admin-shipping-update');
    Route::get('/shipping/delete/{id}', 'Admin\ShippingController@destroy')->name('admin-shipping-delete');

    //------------ ADMIN SHIPPING ENDS ------------ 





    //------------ ADMIN SHIPMENTS PRICE------------

    Route::get('/shipment/price/datatables', 'Admin\ShipmentPriceController@datatables')->name('admin-shipment-price-datatables');
    Route::get('/shipment/price', 'Admin\ShipmentPriceController@index')->name('admin-shipment-price-index');
    Route::get('/shipment/price/create', 'Admin\ShipmentPriceController@create')->name('admin-shipment-price-create');
    Route::post('/shipment/price/create', 'Admin\ShipmentPriceController@store')->name('admin-shipment-price-store');
    Route::get('/shipment/price/edit/{id}', 'Admin\ShipmentPriceController@edit')->name('admin-shipment-price-edit');
    Route::post('/shipment/price/edit/{id}', 'Admin\ShipmentPriceController@update')->name('admin-shipment-price-update');
    Route::get('/shipment/price/delete/{id}', 'Admin\ShipmentPriceController@destroy')->name('admin-shipment-price-delete');

    //------------ ADMIN SHIPMENTS ENDS ------------

    //------------ ADMIN ZONES  ------------

    Route::get('/zones/datatables', 'Admin\ShipmentZoneController@datatables')->name('admin-zones-datatables');
    Route::get('/zones', 'Admin\ShipmentZoneController@index')->name('admin-zones-index');
    Route::get('/zones/create', 'Admin\ShipmentZoneController@create')->name('admin-zones-create');
    Route::post('/zones/store', 'Admin\ShipmentZoneController@store')->name('admin-zones-store');
    Route::get('/zones/edit/{id}', 'Admin\ShipmentZoneController@edit')->name('admin-zones-edit');
    Route::post('/zones/edit/{id}', 'Admin\ShipmentZoneController@update')->name('admin-zones-update');
    Route::get('/zones/delete/{id}', 'Admin\ShipmentZoneController@destroy')->name('admin-zones-delete');


    Route::get('/zones/city/create', 'Admin\ShipmentZoneController@citycreate')->name('admin-city-zone-create');
    Route::post('/zones/city/store', 'Admin\ShipmentZoneController@citystore')->name('admin-city-zone--store');

    Route::get('/zones/city/{id}', 'Admin\ShipmentZoneController@city')->name('admin-city-zone-index');
    Route::get('/zones/city/delete/{id}', 'Admin\ShipmentZoneController@citydelete')->name('admin-zones-delete-city');
    //------------ ADMIN ZONES ENDS ------------ 






    //------------ ADMIN GENERAL SETTINGS JSON SECTION ------------

    // General Setting Section
    Route::get('/general-settings/home/{status}', 'Admin\GeneralSettingController@ishome')->name('admin-gs-ishome');
    Route::get('/general-settings/shop/{status}', 'Admin\GeneralSettingController@isshop')->name('admin-gs-isshop');
    Route::get('/general-settings/disqus/{status}', 'Admin\GeneralSettingController@isdisqus')->name('admin-gs-isdisqus');
    Route::get('/general-settings/allowzip/{status}', 'Admin\GeneralSettingController@allowZip')->name('admin-gs-allowzip');
    Route::get('/general-settings/allowshipto/{status}', 'Admin\GeneralSettingController@allowShipTo')->name('admin-gs-allowshipto');
    Route::get('/general-settings/allowpickup/{status}', 'Admin\GeneralSettingController@allowPickup')->name('admin-gs-allowpickup');
    Route::get('/general-settings/loader/{status}', 'Admin\GeneralSettingController@isloader')->name('admin-gs-isloader');
    Route::get('/general-settings/email-verify/{status}', 'Admin\GeneralSettingController@isemailverify')->name('admin-gs-is-email-verify');
    Route::get('/general-settings/popup/{status}', 'Admin\GeneralSettingController@ispopup')->name('admin-gs-ispopup');

    Route::get('/general-settings/admin/loader/{status}', 'Admin\GeneralSettingController@isadminloader')->name('admin-gs-is-admin-loader');
    Route::get('/general-settings/talkto/{status}', 'Admin\GeneralSettingController@talkto')->name('admin-gs-talkto');
    Route::get('/general-settings/drift/{status}', 'Admin\GeneralSettingController@drift')->name('admin-gs-drift');
    Route::get('/general-settings/messenger/{status}', 'Admin\GeneralSettingController@messenger')->name('admin-gs-messenger');

    Route::get('/general-settings/multiple/shipping/{status}', 'Admin\GeneralSettingController@mship')->name('admin-gs-mship');
    Route::get('/general-settings/multiple/shipment/{status}', 'Admin\GeneralSettingController@shipment')->name('admin-gs-shipment');
    Route::get('/general-settings/multiple/packaging/{status}', 'Admin\GeneralSettingController@mpackage')->name('admin-gs-mpackage');
    Route::get('/general-settings/security/{status}', 'Admin\GeneralSettingController@issecure')->name('admin-gs-secure');
    Route::get('/general-settings/stock/{status}', 'Admin\GeneralSettingController@stock')->name('admin-gs-stock');
    Route::get('/general-settings/maintain/{status}', 'Admin\GeneralSettingController@ismaintain')->name('admin-gs-maintain');
    //  Affilte Section

    Route::get('/general-settings/affilate/{status}', 'Admin\GeneralSettingController@isaffilate')->name('admin-gs-isaffilate');

    //  Capcha Section

    Route::get('/general-settings/capcha/{status}', 'Admin\GeneralSettingController@iscapcha')->name('admin-gs-iscapcha');


    //------------ ADMIN GENERAL SETTINGS JSON SECTION ENDS------------


    Route::get('/subscribes/datatables', 'Admin\SubscribesController@datatables')->name('admin-subscribes-datatables'); //JSON REQUEST
    Route::get('/subscribe', 'Admin\SubscribesController@index')->name('admin-subscribes-index');
    Route::get('/subscribes/create', 'Admin\SubscribesController@create')->name('admin-subscribes-create');
    Route::post('/subscribes/create', 'Admin\SubscribesController@store')->name('admin-subscribes-store');
    Route::get('/subscribes/edit/{id}', 'Admin\SubscribesController@edit')->name('admin-subscribes-edit');
    Route::post('/subscribes/edit/{id}', 'Admin\SubscribesController@update')->name('admin-subscribes-update');
    Route::get('/subscribes/delete/{id}', 'Admin\SubscribesController@destroy')->name('admin-subscribes-delete');
    Route::get('/subscribes/status/{id1}/{id2}', 'Admin\SubscribesController@status')->name('admin-subscribes-status');
  });

  //------------ ADMIN GENERAL SETTINGS SECTION ENDS ------------


  //------------ ADMIN HOME PAGE SETTINGS SECTION ------------

  Route::group(['middleware' => 'permissions:home_page_settings'], function () {

    //------------ ADMIN SLIDER SECTION ------------

    Route::get('/slider/datatables', 'Admin\SliderController@datatables')->name('admin-sl-datatables'); //JSON REQUEST
    Route::get('/slider', 'Admin\SliderController@index')->name('admin-sl-index');
    Route::get('/slider/create', 'Admin\SliderController@create')->name('admin-sl-create');
    Route::post('/slider/create', 'Admin\SliderController@store')->name('admin-sl-store');
    Route::get('/slider/edit/{id}', 'Admin\SliderController@edit')->name('admin-sl-edit');
    Route::post('/slider/edit/{id}', 'Admin\SliderController@update')->name('admin-sl-update');
    Route::get('/slider/delete/{id}', 'Admin\SliderController@destroy')->name('admin-sl-delete');


    //------------ ADMIN SLIDER SECTION ENDS ------------


    //------------ ADMIN BANNER SECTION ------------

    Route::get('/banner/datatables/{type}', 'Admin\BannerController@datatables')->name('admin-sb-datatables'); //JSON REQUEST
    Route::get('top/small/banner/', 'Admin\BannerController@index')->name('admin-sb-index');
    Route::get('large/banner/', 'Admin\BannerController@large')->name('admin-sb-large');
    Route::get('bottom/small/banner/', 'Admin\BannerController@bottom')->name('admin-sb-bottom');
    Route::get('top/small/banner/create', 'Admin\BannerController@create')->name('admin-sb-create');
    Route::get('large/banner/create', 'Admin\BannerController@largecreate')->name('admin-sb-create-large');
    Route::get('bottom/small/banner/create', 'Admin\BannerController@bottomcreate')->name('admin-sb-create-bottom');
    Route::get('fixx/banner/', 'Admin\BannerController@fix')->name('admin-fixx');
    Route::get('fix/create', 'Admin\BannerController@fixcreate')->name('admin-creatss-fix');

    Route::post('/banner/create', 'Admin\BannerController@store')->name('admin-sb-store');
    Route::get('/banner/edit/{id}', 'Admin\BannerController@edit')->name('admin-sb-edit');
    Route::post('/banner/edit/{id}', 'Admin\BannerController@update')->name('admin-sb-update');
    Route::get('/banner/delete/{id}', 'Admin\BannerController@destroy')->name('admin-sb-delete');

    //------------ ADMIN BANNER SECTION ENDS ------------



    //------------ ADMIN PARTNER SECTION ------------

    Route::get('/partner/datatables', 'Admin\PartnerController@datatables')->name('admin-partner-datatables');
    Route::get('/partner', 'Admin\PartnerController@index')->name('admin-partner-index');
    Route::get('/partner/create', 'Admin\PartnerController@create')->name('admin-partner-create');
    Route::post('/partner/create', 'Admin\PartnerController@store')->name('admin-partner-store');
    Route::get('/partner/edit/{id}', 'Admin\PartnerController@edit')->name('admin-partner-edit');
    Route::post('/partner/edit/{id}', 'Admin\PartnerController@update')->name('admin-partner-update');
    Route::get('/partner/delete/{id}', 'Admin\PartnerController@destroy')->name('admin-partner-delete');

    //------------ ADMIN PARTNER SECTION ENDS ------------


    //------------ ADMIN PAGE SETTINGS SECTION ------------

    Route::get('/page-settings/customize', 'Admin\PageSettingController@customize')->name('admin-ps-customize');
    Route::get('/page-settings/big-save', 'Admin\PageSettingController@big_save')->name('admin-ps-big-save');
    Route::get('/page-settings/best-seller', 'Admin\PageSettingController@best_seller')->name('admin-ps-best-seller');

    //------------ ADMIN PACKAGE ------------

    Route::get('/counter/datatables', 'Admin\PackageController@datatables')->name('admin-package-datatables');
    Route::get('/counter', 'Admin\PackageController@index')->name('admin-package-index');
    Route::get('/counter/create', 'Admin\PackageController@create')->name('admin-package-create');
    Route::post('/counter/create', 'Admin\PackageController@store')->name('admin-package-store');
    Route::get('/counter/edit/{id}', 'Admin\PackageController@edit')->name('admin-package-edit');
    Route::post('/counter/edit/{id}', 'Admin\PackageController@update')->name('admin-package-update');
    Route::get('/counter/delete/{id}', 'Admin\PackageController@destroy')->name('admin-package-delete');

    //------------ ADMIN PACKAGE ENDS------------
  });

  //------------ ADMIN HOME PAGE SETTINGS SECTION ENDS ------------

  Route::group(['middleware' => 'permissions:reviews'], function () {


    //------------ ADMIN REVIEW SECTION ------------

    Route::get('/review/datatables', 'Admin\ReviewController@datatables')->name('admin-review-datatables'); //JSON REQUEST
    Route::get('/review', 'Admin\ReviewController@index')->name('admin-review-index');
    Route::get('/review/create', 'Admin\ReviewController@create')->name('admin-review-create');
    Route::post('/review/create', 'Admin\ReviewController@store')->name('admin-review-store');
    Route::get('/review/edit/{id}', 'Admin\ReviewController@edit')->name('admin-review-edit');
    Route::post('/review/edit/{id}', 'Admin\ReviewController@update')->name('admin-review-update');
    Route::get('/review/delete/{id}', 'Admin\ReviewController@destroy')->name('admin-review-delete');

    //------------ ADMIN REVIEW SECTION ENDS ------------
  });

  Route::group(['middleware' => 'permissions:menu_page_settings'], function () {

    //------------ ADMIN MENU PAGE SETTINGS SECTION ------------

    //------------ ADMIN FAQ SECTION ------------

    Route::get('/faq/datatables', 'Admin\FaqController@datatables')->name('admin-faq-datatables'); //JSON REQUEST
    Route::get('/faq', 'Admin\FaqController@index')->name('admin-faq-index');
    Route::get('/faq/create', 'Admin\FaqController@create')->name('admin-faq-create');
    Route::post('/faq/create', 'Admin\FaqController@store')->name('admin-faq-store');
    Route::get('/faq/edit/{id}', 'Admin\FaqController@edit')->name('admin-faq-edit');
    Route::post('/faq/update/{id}', 'Admin\FaqController@update')->name('admin-faq-update');
    Route::get('/faq/delete/{id}', 'Admin\FaqController@destroy')->name('admin-faq-delete');

    //------------ ADMIN FAQ SECTION ENDS ------------


    //------------ ADMIN PAGE SECTION ------------

    Route::get('/page/datatables', 'Admin\PageController@datatables')->name('admin-page-datatables'); //JSON REQUEST
    Route::get('/page', 'Admin\PageController@index')->name('admin-page-index');
    Route::get('/page/create', 'Admin\PageController@create')->name('admin-page-create');
    Route::post('/page/create', 'Admin\PageController@store')->name('admin-page-store');
    Route::get('/page/edit/{id}', 'Admin\PageController@edit')->name('admin-page-edit');
    Route::post('/page/update/{id}', 'Admin\PageController@update')->name('admin-page-update');
    Route::get('/page/delete/{id}', 'Admin\PageController@destroy')->name('admin-page-delete');
    Route::get('/page/header/{id1}/{id2}', 'Admin\PageController@header')->name('admin-page-header');
    Route::get('/page/footer/{id1}/{id2}', 'Admin\PageController@footer')->name('admin-page-footer');
    Route::get('/page/selectemplate/', 'Admin\GeneralSettingController@templateselect')->name('admin-template');

    Route::get('/page/bosta', 'Admin\GeneralSettingController@bosta')->name('admin-bosta');
    Route::get('/page/fastlo', 'Admin\GeneralSettingController@fastlo')->name('admin-fastlo');
    Route::get('/page/aramex', 'Admin\GeneralSettingController@aramex')->name('admin-aramex');
    Route::get('/page/fedex', 'Admin\GeneralSettingController@fedex')->name('admin-fedex');
    Route::get('/page/abs', 'Admin\GeneralSettingController@abs')->name('admin-abs');
    Route::get('/page/mylerz', 'Admin\GeneralSettingController@mylerz')->name('admin-mylerz');

    Route::get('/general-settings/contact/{status}', 'Admin\GeneralSettingController@iscontact')->name('admin-gs-iscontact');
    Route::get('/general-settings/faq/{status}', 'Admin\GeneralSettingController@isfaq')->name('admin-gs-isfaq');

    Route::post('/page-settings/update/contact', 'Admin\PageSettingController@contactupdate')->name('admin-ps-updates');
  });

  //------------ ADMIN MENU PAGE SETTINGS SECTION ENDS ------------



  //------------ ADMIN EMAIL SETTINGS SECTION ------------

  Route::group(['middleware' => 'permissions:emails_settings'], function () {

    Route::get('/email-templates/datatables', 'Admin\EmailController@datatables')->name('admin-mail-datatables');
    Route::get('/email-templates', 'Admin\EmailController@index')->name('admin-mail-index');
    Route::get('/email-templates/{id}', 'Admin\EmailController@edit')->name('admin-mail-edit');
    Route::post('/email-templates/{id}', 'Admin\EmailController@update')->name('admin-mail-update');
    Route::get('/email-config', 'Admin\EmailController@config')->name('admin-mail-config');
    Route::get('/groupemail', 'Admin\EmailController@groupemail')->name('admin-group-show');
    Route::post('/groupemailpost', 'Admin\EmailController@groupemailpost')->name('admin-group-submit');
    Route::get('/issmtp/{status}', 'Admin\GeneralSettingController@issmtp')->name('admin-gs-issmtp');
  });

  Route::group(['middleware' => 'permissions:contact_us'], function () {

    Route::get('/page-settings/contact', 'Admin\PageSettingController@contact')->name('admin-ps-contact');
  });

  //------------ ADMIN EMAIL SETTINGS SECTION ENDS ------------



  //------------ ADMIN PAYMENT SETTINGS SECTION ------------

  Route::group(['middleware' => 'permissions:payment_settings'], function () {

    // Payment Informations

    Route::get('/payment-informations', 'Admin\GeneralSettingController@paymentsinfo')->name('admin-gs-payments');

    Route::get('/general-settings/guest/{status}', 'Admin\GeneralSettingController@guest')->name('admin-gs-guest');
    Route::get('/general-settings/paypal/{status}', 'Admin\GeneralSettingController@paypal')->name('admin-gs-paypal');
    Route::get('/general-settings/instamojo/{status}', 'Admin\GeneralSettingController@instamojo')->name('admin-gs-instamojo');
    Route::get('/general-settings/paystack/{status}', 'Admin\GeneralSettingController@paystack')->name('admin-gs-paystack');
    Route::get('/general-settings/stripe/{status}', 'Admin\GeneralSettingController@stripe')->name('admin-gs-stripe');
    Route::get('/general-settings/cod/{status}', 'Admin\GeneralSettingController@cod')->name('admin-gs-cod');
    Route::get('/general-settings/paytm/{status}', 'Admin\GeneralSettingController@paytm')->name('admin-gs-paytm');
    Route::get('/general-settings/molly/{status}', 'Admin\GeneralSettingController@molly')->name('admin-gs-molly');
    Route::get('/general-settings/razor/{status}', 'Admin\GeneralSettingController@razor')->name('admin-gs-razor');
    // Payment Gateways

    Route::get('/paymentgateway/datatables', 'Admin\PaymentGatewayController@datatables')->name('admin-payment-datatables'); //JSON REQUEST
    Route::get('/paymentgateway', 'Admin\PaymentGatewayController@index')->name('admin-payment-index');
    Route::get('/paymentgateway/create', 'Admin\PaymentGatewayController@create')->name('admin-payment-create');
    Route::post('/paymentgateway/create', 'Admin\PaymentGatewayController@store')->name('admin-payment-store');
    Route::get('/paymentgateway/edit/{id}', 'Admin\PaymentGatewayController@edit')->name('admin-payment-edit');
    Route::post('/paymentgateway/update/{id}', 'Admin\PaymentGatewayController@update')->name('admin-payment-update');
    Route::get('/paymentgateway/delete/{id}', 'Admin\PaymentGatewayController@destroy')->name('admin-payment-delete');
    Route::get('/paymentgateway/status/{id1}/{id2}', 'Admin\PaymentGatewayController@status')->name('admin-payment-status');

    // Currency Settings


    // MULTIPLE CURRENCY

    Route::get('/general-settings/currency/{status}', 'Admin\GeneralSettingController@currency')->name('admin-gs-iscurrency');
    Route::get('/currency/datatables', 'Admin\CurrencyController@datatables')->name('admin-currency-datatables'); //JSON REQUEST
    Route::get('/currency', 'Admin\CurrencyController@index')->name('admin-currency-index');
    Route::get('/currency/create', 'Admin\CurrencyController@create')->name('admin-currency-create');
    Route::post('/currency/create', 'Admin\CurrencyController@store')->name('admin-currency-store');
    Route::get('/currency/edit/{id}', 'Admin\CurrencyController@edit')->name('admin-currency-edit');
    Route::post('/currency/update/{id}', 'Admin\CurrencyController@update')->name('admin-currency-update');
    Route::get('/currency/delete/{id}', 'Admin\CurrencyController@destroy')->name('admin-currency-delete');
    Route::get('/currency/status/{id1}/{id2}', 'Admin\CurrencyController@status')->name('admin-currency-status');
  });

  //------------ ADMIN PAYMENT SETTINGS SECTION ENDS------------





  //------------ ADMIN SOCIAL SETTINGS SECTION ------------

  Route::group(['middleware' => 'permissions:social_settings'], function () {

    Route::get('/social', 'Admin\SocialSettingController@index')->name('admin-social-index');
    Route::post('/social/update', 'Admin\SocialSettingController@socialupdate')->name('admin-social-update');
    Route::post('/social/update/all', 'Admin\SocialSettingController@socialupdateall')->name('admin-social-update-all');
    Route::get('/social/facebook', 'Admin\SocialSettingController@facebook')->name('admin-social-facebook');
    Route::get('/social/google', 'Admin\SocialSettingController@google')->name('admin-social-google');
    Route::get('/social/facebook/{status}', 'Admin\SocialSettingController@facebookup')->name('admin-social-facebookup');
    Route::get('/social/google/{status}', 'Admin\SocialSettingController@googleup')->name('admin-social-googleup');
  });
  //------------ ADMIN SOCIAL SETTINGS SECTION ENDS------------



  //------------ ADMIN LANGUAGE SETTINGS SECTION ------------

  Route::group(['middleware' => 'permissions:language_settings'], function () {

    //  Multiple Language Section

    Route::get('/general-settings/language/{status}', 'Admin\GeneralSettingController@language')->name('admin-gs-islanguage');

    //  Multiple Language Section Ends

    Route::get('/languages/datatables', 'Admin\LanguageController@datatables')->name('admin-lang-datatables'); //JSON REQUEST
    Route::get('/languages', 'Admin\LanguageController@index')->name('admin-lang-index');
    Route::get('/languages/create', 'Admin\LanguageController@create')->name('admin-lang-create');
    Route::get('/languages/edit/{id}', 'Admin\LanguageController@edit')->name('admin-lang-edit');
    Route::post('/languages/create', 'Admin\LanguageController@store')->name('admin-lang-store');
    Route::post('/languages/edit/{id}', 'Admin\LanguageController@update')->name('admin-lang-update');
    Route::get('/languages/status/{id1}/{id2}', 'Admin\LanguageController@status')->name('admin-lang-st');
    Route::get('/languages/delete/{id}', 'Admin\LanguageController@destroy')->name('admin-lang-delete');


    //------------ ADMIN PANEL LANGUAGE SETTINGS SECTION ------------

    Route::get('/adminlanguages/datatables', 'Admin\AdminLanguageController@datatables')->name('admin-tlang-datatables'); //JSON REQUEST
    Route::get('/adminlanguages', 'Admin\AdminLanguageController@index')->name('admin-tlang-index');
    Route::get('/adminlanguages/create', 'Admin\AdminLanguageController@create')->name('admin-tlang-create');
    Route::get('/adminlanguages/edit/{id}', 'Admin\AdminLanguageController@edit')->name('admin-tlang-edit');
    Route::post('/adminlanguages/create', 'Admin\AdminLanguageController@store')->name('admin-tlang-store');
    Route::post('/adminlanguages/edit/{id}', 'Admin\AdminLanguageController@update')->name('admin-tlang-update');
    Route::get('/adminlanguages/status/{id1}/{id2}', 'Admin\AdminLanguageController@status')->name('admin-tlang-st');
    Route::get('/adminlanguages/delete/{id}', 'Admin\AdminLanguageController@destroy')->name('admin-tlang-delete');

    //------------ ADMIN PANEL LANGUAGE SETTINGS SECTION ENDS ------------

    //------------ ADMIN LANGUAGE SETTINGS SECTION ENDS ------------





  });


  Route::group(['middleware' => 'permissions:gallery'], function () {
    //----------------- COUNTRY ----------------------------------

    Route::get('/cat/datatables', 'Admin\CountryController@datatables')->name('admin-country-datatables'); //JSON REQUEST

    Route::get('/cat2', 'Admin\CountryController@index2')->name('admin-country-index2');
    Route::get('/management', 'Admin\CountryController@management')->name('admin-country-management');
    Route::get('/cat/create', 'Admin\CountryController@create')->name('admin-country-create');
    Route::post('/cat/create', 'Admin\CountryController@store')->name('admin-country-store');
    Route::get('/cat/edit/{id}', 'Admin\CountryController@edit')->name('admin-country-edit');
    Route::post('/cat/edit/{id}', 'Admin\CountryController@update')->name('admin-country-update');
    Route::get('/cat/delete/{id}', 'Admin\CountryController@destroy')->name('admin-country-delete');
    Route::get('/cat/status/{id1}/{id2}', 'Admin\CountryController@status')->name('admin-country-status');
    Route::get('/cat/default/{id1}/{id2}', 'Admin\CountryController@Default')->name('admin-country-default');

    Route::post('/country/deactivate', 'Admin\CountryController@ckeckall')->name('admin-country-all');
    Route::post('/country/activate', 'Admin\CountryController@ckeckactivate')->name('admin-country-activate');
    Route::post('/country/deleted', 'Admin\CountryController@ckeckdelete')->name('admin-country-deleted');

    //----------------- Info ----------------------------------
    // Areas
    Route::get('/info/areas/datatables', 'Admin\Info\AreaController@datatables')->name('admin-info-areas-datatables');
    Route::get('/info/areas', 'Admin\Info\AreaController@index')->name('admin-info-areas-index');
    Route::get('/info/areas/create', 'Admin\Info\AreaController@create')->name('admin-info-areas-create');
    Route::post('/info/areas/create', 'Admin\Info\AreaController@store')->name('admin-info-areas-store');
    Route::get('/info/areas/edit/{id}', 'Admin\Info\AreaController@edit')->name('admin-info-areas-edit');
    Route::post('/info/areas/edit/{id}', 'Admin\Info\AreaController@update')->name('admin-info-areas-update');
    Route::get('/info/areas/delete/{id}', 'Admin\Info\AreaController@destroy')->name('admin-info-areas-delete');
    Route::get('/info/areas/status/{id1}/{id2}', 'Admin\Info\AreaController@status')->name('admin-info-areas-status');
    // Budgets
    Route::get('/info/budgets/datatables', 'Admin\Info\BudgetController@datatables')->name('admin-info-budgets-datatables');
    Route::get('/info/budgets', 'Admin\Info\BudgetController@index')->name('admin-info-budgets-index');
    Route::get('/info/budgets/create', 'Admin\Info\BudgetController@create')->name('admin-info-budgets-create');
    Route::post('/info/budgets/create', 'Admin\Info\BudgetController@store')->name('admin-info-budgets-store');
    Route::get('/info/budgets/edit/{id}', 'Admin\Info\BudgetController@edit')->name('admin-info-budgets-edit');
    Route::post('/info/budgets/edit/{id}', 'Admin\Info\BudgetController@update')->name('admin-info-budgets-update');
    Route::get('/info/budgets/delete/{id}', 'Admin\Info\BudgetController@destroy')->name('admin-info-budgets-delete');
    Route::get('/info/budgets/status/{id1}/{id2}', 'Admin\Info\BudgetController@status')->name('admin-info-budgets-status');
    // Requests
    Route::get('/info/requests', 'Admin\Info\RequestController@index')->name('admin-info-requests-index');
    Route::get('/info/requests/datatables', 'Admin\Info\RequestController@datatables')->name('admin-info-requests-datatables');
    Route::get('/info/requests/delete/{id}', 'Admin\Info\RequestController@destroy')->name('admin-info-requests-delete');
    Route::get('/info/requests/export', 'Admin\Info\RequestController@export')->name('admin-info-requests-export');
    //----------------- CITY ----------------------------------

    Route::get('/subgallery/datatables', 'Admin\CityController@datatables')->name('admin-city-datatables'); //JSON REQUEST
    Route::get('/work', 'Admin\CityController@index')->name('admin-city-index');
    Route::get('/subgallery/create', 'Admin\CityController@create')->name('admin-city-create');
    Route::post('/subgallery/create', 'Admin\CityController@store')->name('admin-city-store');
    Route::get('/subgallery/edit/{id}', 'Admin\CityController@edit')->name('admin-city-edit');
    Route::post('/subgallery/edit/{id}', 'Admin\CityController@update')->name('admin-city-update');
    Route::get('/subgallery/delete/{id}', 'Admin\CityController@destroy')->name('admin-city-delete');
    Route::get('/subgallery/status/{id1}/{id2}', 'Admin\CityController@status')->name('admin-city-status');


    Route::post('/city/deactivate', 'Admin\CityController@ckeckall')->name('admin-city-all');
    Route::post('/city/activate', 'Admin\CityController@ckeckactivate')->name('admin-city-activate');
    Route::post('/city/deleted', 'Admin\CityController@ckeckdelete')->name('admin-city-deleted');


    Route::get('/sgallery/datatables', 'Admin\StateController@datatables')->name('admin-state-datatables'); //JSON REQUEST
    Route::get('/sgallery', 'Admin\StateController@index')->name('admin-state-index');
    Route::get('/sgallery/create', 'Admin\StateController@create')->name('admin-state-create');
    Route::post('/sgallery/create', 'Admin\StateController@store')->name('admin-state-store');
    Route::get('/sgallery/edit/{id}', 'Admin\StateController@edit')->name('admin-state-edit');
    Route::post('/sgallery/edit/{id}', 'Admin\StateController@update')->name('admin-state-update');
    Route::get('/sgallery/delete/{id}', 'Admin\StateController@destroy')->name('admin-state-delete');
    Route::get('/sgallery/status/{id1}/{id2}', 'Admin\StateController@status')->name('admin-state-status');
  });

  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

  Route::group(['middleware' => 'permissions:seo_tools'], function () {

    Route::get('/seotools/analytics', 'Admin\SeoToolController@analytics')->name('admin-seotool-analytics');
    Route::post('/seotools/analytics/update', 'Admin\SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
    Route::get('/seotools/keywords', 'Admin\SeoToolController@keywords')->name('admin-seotool-keywords');
    Route::post('/seotools/keywords/update', 'Admin\SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');
    Route::get('/services/popular/{id}', 'Admin\SeoToolController@popular')->name('admin-prod-popular');

    Route::get('/homepage/meta', 'Admin\SeoToolController@homeMeta')->name('admin-home-meta');
    Route::get('/homepage/header', 'Admin\SeoToolController@homePageHeader')->name('admin-homepage-header');
    Route::get('/product/header', 'Admin\SeoToolController@productHeader')->name('admin-product-header');
    Route::get('/category/header', 'Admin\SeoToolController@categoryHeader')->name('admin-category-header');
    Route::get('/offer/header', 'Admin\SeoToolController@offerHeader')->name('admin-offer-header');
    Route::get('/brand/header', 'Admin\SeoToolController@brandHeader')->name('admin-brand-header');
    Route::get('/subcategory/header', 'Admin\SeoToolController@subcategoryHeader')->name('admin-subcategory-header');

    Route::get('/childcategory/header', 'Admin\SeoToolController@childcategoryHeader')->name('admin-childcategory-header');
  });

  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

  //------------ ADMIN STAFF SECTION ------------

  Route::group(['middleware' => 'permissions:manage_staffs'], function () {

    Route::get('/staff/datatables', 'Admin\StaffController@datatables')->name('admin-staff-datatables');
    Route::get('/staff', 'Admin\StaffController@index')->name('admin-staff-index');
    Route::get('/staff/create', 'Admin\StaffController@create')->name('admin-staff-create');
    Route::post('/staff/create', 'Admin\StaffController@store')->name('admin-staff-store');
    Route::get('/staff/edit/{id}', 'Admin\StaffController@edit')->name('admin-staff-edit');
    Route::post('/staff/update/{id}', 'Admin\StaffController@update')->name('admin-staff-update');
    Route::get('/staff/show/{id}', 'Admin\StaffController@show')->name('admin-staff-show');
    Route::get('/staff/delete/{id}', 'Admin\StaffController@destroy')->name('admin-staff-delete');
  });

  //------------ ADMIN STAFF SECTION ENDS------------

  //------------ ADMIN SUBSCRIBERS SECTION ------------

  Route::group(['middleware' => 'permissions:subscribers'], function () {

    Route::get('/subscribers/datatables', 'Admin\SubscriberController@datatables')->name('admin-subs-datatables'); //JSON REQUEST
    Route::get('/subscribers', 'Admin\SubscriberController@index')->name('admin-subs-index');
    Route::get('/subscribers/download', 'Admin\SubscriberController@download')->name('admin-subs-download');
  });

  //------------ ADMIN SUBSCRIBERS ENDS ------------

  // ------------ GLOBAL ----------------------
  Route::post('/general-settings/update/all', 'Admin\GeneralSettingController@generalupdate')->name('admin-gs-update');
  Route::post('/general-settings/update/photo', 'Admin\GeneralSettingController@photoupdate')->name('admin-photo-update');
  Route::post('/general-settings/update/payment', 'Admin\GeneralSettingController@generalupdatepayment')->name('admin-gs-update-payment');

  // STATUS SECTION
  Route::get('/products/status/{id1}/{id2}', 'Admin\ProductController@status')->name('admin-prod-status');
  // STATUS SECTION ENDS
  Route::get('/products/availability/{id1}/{id2}', 'Admin\ProductController@availability')->name('admin-prod-availability');

  // FEATURE SECTION
  Route::get('/products/feature/{id}', 'Admin\ProductController@feature')->name('admin-prod-feature');
  Route::post('/products/feature/{id}', 'Admin\ProductController@featuresubmit')->name('admin-prod-feature');
  // FEATURE SECTION ENDS

  // GALLERY SECTION ------------

  Route::get('/gallery/show', 'Admin\GalleryController@show')->name('admin-gallery-show');

  Route::post('/gallery/store', 'Admin\GalleryController@store')->name('admin-gallery-store');
  Route::get('/gallery/delete', 'Admin\GalleryController@destroy')->name('admin-gallery-delete');

  // GALLERY SECTION ENDS------------

  Route::post('/page-settings/update/all', 'Admin\PageSettingController@update')->name('admin-ps-update');
  Route::post('/page-settings/update/home', 'Admin\PageSettingController@homeupdate')->name('admin-ps-homeupdate');

  // ------------ GLOBAL ENDS ----------------------

  Route::group(['middleware' => 'permissions:super'], function () {
    Route::get('/cache/clear', function () {
      Artisan::call('cache:clear');
      Artisan::call('config:clear');
      Artisan::call('route:clear');
      Artisan::call('view:clear');
      return redirect()->route('admin.dashboard')->with('cache', 'System Cache Has Been Removed.');
    })->name('admin-cache-clear');

    Route::get('/check/movescript', 'Admin\DashboardController@movescript')->name('admin-move-script');
    Route::get('/generate/backup', 'Admin\DashboardController@generate_bkup')->name('admin-generate-backup');
    Route::get('/activation', 'Admin\DashboardController@activation')->name('admin-activation-form');
    Route::post('/activation', 'Admin\DashboardController@activation_submit')->name('admin-activate-purchase');
    Route::get('/clear/backup', 'Admin\DashboardController@clear_bkup')->name('admin-clear-backup');

    // ------------ ROLE SECTION ----------------------

    Route::get('/role/datatables', 'Admin\RoleController@datatables')->name('admin-role-datatables');
    Route::get('/role', 'Admin\RoleController@index')->name('admin-role-index');
    Route::get('/role/create', 'Admin\RoleController@create')->name('admin-role-create');
    Route::post('/role/create', 'Admin\RoleController@store')->name('admin-role-store');
    Route::get('/role/edit/{id}', 'Admin\RoleController@edit')->name('admin-role-edit');
    Route::post('/role/edit/{id}', 'Admin\RoleController@update')->name('admin-role-update');
    Route::get('/role/delete/{id}', 'Admin\RoleController@destroy')->name('admin-role-delete');

    // ------------ ROLE SECTION ENDS ----------------------


  });
});


// ************************************ ADMIN SECTION ENDS**********************************************

// ************************************ USER SECTION **********************************************

Route::prefix('user')->group(function () {

  // User Dashboard
  Route::get('/dashboard', 'User\UserController@index')->name('user-dashboard');

  // User Login
  Route::get('/{lang?}/login', 'User\LoginController@showLoginForm')->name('user.login');
  Route::post('/login', 'User\LoginController@login')->name('user.login.submit');
  // User Login End

  // User Register
  Route::get('/{lang?}/register', 'User\RegisterController@showRegisterForm')->name('user-register');
  Route::post('/register', 'User\RegisterController@register')->name('user-register-submit');
  Route::get('/register/verify/{token}', 'User\RegisterController@token')->name('user-register-token');
  // User Register End

  // User Reset
  Route::get('/reset', 'User\UserController@resetform')->name('user-reset');
  Route::post('/reset', 'User\UserController@reset')->name('user-reset-submit');
  // User Reset End

  // User Profile
  Route::get('/profile', 'User\UserController@profile')->name('user-profile');
  Route::post('/profile', 'User\UserController@profileupdate')->name('user-profile-update');
  // User Profile Ends

  // User Address
  Route::get('/address', 'User\UserController@address')->name('user-address');
  Route::post('/address/store', 'User\UserController@addressstore')->name('user-address-store');

  Route::post('/address{id}', 'User\UserController@addressupdate')->name('user-address-update');


  // User Address Ends

  // User Forgot
  Route::get('/forgot', 'User\ForgotController@showforgotform')->name('user-forgot');
  Route::post('/forgot', 'User\ForgotController@forgot')->name('user-forgot-submit');
  // User Forgot Ends

  // User Wishlist
  Route::get('/wishlists', 'User\WishlistController@wishlists')->name('user-wishlists');
  Route::get('/wishlist/add/{id}', 'User\WishlistController@addwish')->name('user-wishlist-add');
  Route::get('/wishlist/remove/{id}', 'User\WishlistController@removewish')->name('user-wishlist-remove');
  // User Wishlist Ends

  // User Review
  Route::post('/review/submit', 'User\UserController@reviewsubmit')->name('front.review.submit');
  // User Review Ends

  // User Orders

  Route::get('/orders', 'User\OrderController@orders')->name('user-orders');

  Route::get('/subscribes', 'User\OrderController@subscribes')->name('user-subscribes');
  Route::get('/subscribe/{id}', 'User\OrderController@subscribe')->name('user-subscribe');

  Route::get('/order/tracking', 'User\OrderController@ordertrack')->name('user-order-track');
  Route::get('/order/trackings/{id}', 'User\OrderController@trackload')->name('user-order-track-search');
  Route::get('/order/{id}', 'User\OrderController@order')->name('user-order');
  Route::get('/download/order/{slug}/{id}', 'User\OrderController@orderdownload')->name('user-order-download');
  Route::get('print/order/print/{id}', 'User\OrderController@orderprint')->name('user-order-print');
  Route::get('/json/trans', 'User\OrderController@trans');

  // User Orders Ends


  // Wallet & Loyalty & Promo Codes

  Route::get('/wallet', 'User\UserController@wallet')->name('user-wallet');
  Route::get('/refelar', 'User\UserController@refelar')->name('user-refelar');
  Route::get('/points', 'User\UserController@points')->name('user-points');
  Route::get('/promocodes', 'User\UserController@promocodes')->name('user-promo-codes');
  Route::get('/pointscoupon/{id}', 'User\UserController@pointscoupon')->name('user-add-coupon');
  Route::get('/freecoupon/{id}', 'User\UserController@freecoupon')->name('user-add-free-coupon');
  Route::get('/piececoupon/{id}', 'User\UserController@piececoupon')->name('user-add-piece-coupon');


  Route::get('/notifications', 'User\UserController@notifications')->name('user-notifications');

  // User Subscription

  Route::get('/package', 'User\UserController@package')->name('user-package');
  Route::get('/subscription/{id}', 'User\UserController@vendorrequest')->name('user-vendor-request');
  Route::post('/vendor-request', 'User\UserController@vendorrequestsub')->name('user-vendor-request-submit');

  Route::post('/paypal/submit', 'User\PaypalController@store')->name('user.paypal.submit');
  Route::get('/paypal/cancle', 'User\PaypalController@paycancle')->name('user.payment.cancle');
  Route::get('/paypal/return', 'User\PaypalController@payreturn')->name('user.payment.return');
  Route::post('/paypal/notify', 'User\PaypalController@notify')->name('user.payment.notify');
  Route::post('/stripe/submit', 'User\StripeController@store')->name('user.stripe.submit');

  Route::get('/instamojo/notify', 'User\InstamojoController@notify')->name('user.instamojo.notify');
  Route::post('/instamojo/submit', 'User\InstamojoController@store')->name('user.instamojo.submit');


  Route::get('/molly/notify', 'User\MollyController@notify')->name('user.molly.notify');
  Route::post('/molly/submit', 'User\MollyController@store')->name('user.molly.submit');

  Route::get('/paystack/check', 'User\PaystackController@check')->name('user.paystack.check');
  Route::post('/paystack/submit', 'User\PaystackController@store')->name('user.paystack.submit');

  //PayTM Routes
  Route::post('/paytm/submit', 'User\PaytmController@store')->name('user.paytm.submit');;
  Route::post('/paytm/notify', 'User\PaytmController@notify')->name('user.paytm.notify');



  //PayTM Routes
  Route::post('/razorpay/submit', 'User\RazorpayController@store')->name('user.razorpay.submit');;
  Route::post('/razorpay/notify', 'User\RazorpayController@notify')->name('user.razorpay.notify');


  // User Subscription Ends

  // User Vendor Send Message

  Route::post('/user/contact', 'User\MessageController@usercontact');
  Route::get('/messages', 'User\MessageController@messages')->name('user-messages');
  Route::get('/message/{id}', 'User\MessageController@message')->name('user-message');
  Route::post('/message/post', 'User\MessageController@postmessage')->name('user-message-post');
  Route::get('/message/{id}/delete', 'User\MessageController@messagedelete')->name('user-message-delete');
  Route::get('/address/{id}/delete', 'User\UserController@addressdelete')->name('user-address-delete');
  Route::get('/message/load/{id}', 'User\MessageController@msgload')->name('user-vendor-message-load');

  // User Vendor Send Message Ends

  // User Admin Send Message


  // Tickets
  Route::get('admin/tickets', 'User\MessageController@adminmessages')->name('user-message-index');
  // Disputes
  Route::get('admin/disputes', 'User\MessageController@adminDiscordmessages')->name('user-dmessage-index');

  Route::get('admin/message/{id}', 'User\MessageController@adminmessage')->name('user-message-show');
  Route::post('admin/message/post', 'User\MessageController@adminpostmessage')->name('user-message-store');
  Route::get('admin/message/{id}/delete', 'User\MessageController@adminmessagedelete')->name('user-message-delete1');
  Route::post('admin/user/send/message', 'User\MessageController@adminusercontact')->name('user-send-message');
  Route::get('admin/message/load/{id}', 'User\MessageController@messageload')->name('user-message-load');
  // User Admin Send Message Ends

  Route::get('/affilate/code', 'User\WithdrawController@affilate_code')->name('user-affilate-code');
  Route::get('/affilate/withdraw', 'User\WithdrawController@index')->name('user-wwt-index');
  Route::get('/affilate/withdraw/create', 'User\WithdrawController@create')->name('user-wwt-create');
  Route::post('/affilate/withdraw/create', 'User\WithdrawController@store')->name('user-wwt-store');

  // User Favorite Seller

  Route::get('/favorite/seller', 'User\UserController@favorites')->name('user-favorites');
  Route::get('/favorite/{id1?}/{id2?}', 'User\UserController@favorite')->name('user-favorite');
  Route::get('/favorite/seller/{id}/delete', 'User\UserController@favdelete')->name('user-favorite-delete');

  // User Favorite Seller Ends

  // User Logout
  Route::get('/logout', 'User\LoginController@logout')->name('user-logout');
  // User Logout Ends

});

// ************************************ USER SECTION ENDS**********************************************



Route::post('the/genius/ocean/2441139', 'Front\FrontendController@subscription');
Route::get('finalize', 'Front\FrontendController@finalize');

Route::get('/under-maintenance', 'Front\FrontendController@maintenance')->name('front-maintenance');
Route::get('/under-susbends', 'Front\FrontendController@susbend')->name('front-susbend');
Route::get('/under-susbend', 'Front\FrontendController@userpay')->name('front-userpay');


Route::prefix('vendor')->group(function () {


  Route::group(['middleware' => 'vendor'], function () {
    // Vendor Dashboard
    Route::get('/{lang}/dashboard', 'Vendor\VendorController@index')->name('vendor-dashboard');


    //IMPORT SECTION
    Route::get('/products/import/create', 'Vendor\ImportController@createImport')->name('vendor-import-create');
    Route::get('/products/import/edit/{id}', 'Vendor\ImportController@edit')->name('vendor-import-edit');
    Route::get('/products/import/csv', 'Vendor\ImportController@importCSV')->name('vendor-import-csv');
    Route::get('/products/import/datatables', 'Vendor\ImportController@datatables')->name('vendor-import-datatables');
    Route::get('/products/import/index', 'Vendor\ImportController@index')->name('vendor-import-index');
    Route::post('/products/import/store', 'Vendor\ImportController@store')->name('vendor-import-store');
    Route::post('/products/import/update/{id}', 'Vendor\ImportController@update')->name('vendor-import-update');
    Route::post('/products/import/csv/store', 'Vendor\ImportController@importStore')->name('vendor-import-csv-store');
    //IMPORT SECTION


    //------------ ADMIN ORDER SECTION ------------
    Route::get('/orders', 'Vendor\OrderController@index')->name('vendor-order-index');
    Route::get('/order/{id}/show', 'Vendor\OrderController@show')->name('vendor-order-show');
    Route::get('/order/{id}/invoice', 'Vendor\OrderController@invoice')->name('vendor-order-invoice');
    Route::get('/order/{id}/print', 'Vendor\OrderController@printpage')->name('vendor-order-print');
    Route::get('/order/{id1}/status/{status}', 'Vendor\OrderController@status')->name('vendor-order-status');
    Route::post('/order/email/', 'Vendor\OrderController@emailsub')->name('vendor-order-emailsub');
    Route::post('/order/{slug}/license', 'Vendor\OrderController@license')->name('vendor-order-license');

    //------------ ADMIN CATEGORY SECTION ENDS------------


    //------------ VENDOR SUBCATEGORY SECTION ------------

    Route::get('/load/subcategories/{id}/', 'Vendor\VendorController@subcatload')->name('vendor-subcat-load'); //JSON REQUEST

    //------------ VENDOR SUBCATEGORY SECTION ENDS------------

    //------------ VENDOR CHILDCATEGORY SECTION ------------

    Route::get('/load/childcategories/{id}/', 'Vendor\VendorController@childcatload')->name('vendor-childcat-load'); //JSON REQUEST

    //------------ VENDOR CHILDCATEGORY SECTION ENDS------------

    //------------ VENDOR PRODUCT SECTION ------------

    Route::get('/{lang}/products/datatables', 'Vendor\ProductController@datatables')->name('vendor-prod-datatables'); //JSON REQUEST
    Route::get('/{lang}/products', 'Vendor\ProductController@index')->name('vendor-prod-index');

    Route::post('/products/upload/update/{id}', 'Vendor\ProductController@uploadUpdate')->name('vendor-prod-upload-update');

    // CREATE SECTION
    Route::get('/products/types', 'Vendor\ProductController@types')->name('vendor-prod-types');
    Route::get('/{lang}/products/physical/create', 'Vendor\ProductController@createPhysical')->name('vendor-prod-physical-create');
    Route::get('/products/digital/create', 'Vendor\ProductController@createDigital')->name('vendor-prod-digital-create');
    Route::get('/products/license/create', 'Vendor\ProductController@createLicense')->name('vendor-prod-license-create');
    Route::post('/products/store', 'Vendor\ProductController@store')->name('vendor-prod-store');
    Route::get('/getattributes', 'Vendor\ProductController@getAttributes')->name('vendor-prod-getattributes');
    Route::get('/products/import', 'Vendor\ProductController@import')->name('vendor-prod-import');
    Route::post('/products/import-submit', 'Vendor\ProductController@importSubmit')->name('vendor-prod-importsubmit');

    Route::get('/products/catalog/datatables', 'Vendor\ProductController@catalogdatatables')->name('admin-vendor-catalog-datatables');
    Route::get('/products/catalogs', 'Vendor\ProductController@catalogs')->name('admin-vendor-catalog-index');

    // CREATE SECTION

    // EDIT SECTION
    Route::get('/product/edit/{id}', 'Vendor\ProductController@edit')->name('vendor-prod-edit');
    Route::post('/products/edit/{id}', 'Vendor\ProductController@update')->name('vendor-prod-update');

    Route::get('/products/catalog/{id}', 'Vendor\ProductController@catalogedit')->name('vendor-prod-catalog-edit');
    Route::post('/products/catalog/{id}', 'Vendor\ProductController@catalogupdate')->name('vendor-prod-catalog-update');

    // EDIT SECTION ENDS

    // STATUS SECTION
    Route::get('/products/status/{id1}/{id2}', 'Vendor\ProductController@status')->name('vendor-prod-status');
    // STATUS SECTION ENDS

    // DELETE SECTION
    Route::get('/products/delete/{id}', 'Vendor\ProductController@destroy')->name('vendor-prod-delete');
    // DELETE SECTION ENDS

    //------------ VENDOR PRODUCT SECTION ENDS------------

    //------------ VENDOR GALLERY SECTION ------------

    Route::get('/gallery/show', 'Vendor\GalleryController@show')->name('vendor-gallery-show');
    Route::post('/gallery/store', 'Vendor\GalleryController@store')->name('vendor-gallery-store');
    Route::get('/gallery/delete', 'Vendor\GalleryController@destroy')->name('vendor-gallery-delete');

    //------------ VENDOR GALLERY SECTION ENDS------------

    //------------ ADMIN SHIPPING ------------

    Route::get('/shipping/datatables', 'Vendor\ShippingController@datatables')->name('vendor-shipping-datatables');
    Route::get('/shipping', 'Vendor\ShippingController@index')->name('vendor-shipping-index');
    Route::get('/shipping/create', 'Vendor\ShippingController@create')->name('vendor-shipping-create');
    Route::post('/shipping/create', 'Vendor\ShippingController@store')->name('vendor-shipping-store');
    Route::get('/shipping/edit/{id}', 'Vendor\ShippingController@edit')->name('vendor-shipping-edit');
    Route::post('/shipping/edit/{id}', 'Vendor\ShippingController@update')->name('vendor-shipping-update');
    Route::get('/shipping/delete/{id}', 'Vendor\ShippingController@destroy')->name('vendor-shipping-delete');

    //------------ ADMIN SHIPPING ENDS ------------


    //------------ ADMIN PACKAGE ------------

    Route::get('/package/datatables', 'Vendor\PackageController@datatables')->name('vendor-package-datatables');
    Route::get('/package', 'Vendor\PackageController@index')->name('vendor-package-index');
    Route::get('/package/create', 'Vendor\PackageController@create')->name('vendor-package-create');
    Route::post('/package/create', 'Vendor\PackageController@store')->name('vendor-package-store');
    Route::get('/package/edit/{id}', 'Vendor\PackageController@edit')->name('vendor-package-edit');
    Route::post('/package/edit/{id}', 'Vendor\PackageController@update')->name('vendor-package-update');
    Route::get('/package/delete/{id}', 'Vendor\PackageController@destroy')->name('vendor-package-delete');


    //------------ ADMIN PACKAGE ENDS------------



    //------------ VENDOR NOTIFICATION SECTION ------------

    // Order Notification
    Route::get('/order/notf/show/{id}', 'Vendor\NotificationController@order_notf_show')->name('vendor-order-notf-show');
    Route::get('/order/notf/count/{id}', 'Vendor\NotificationController@order_notf_count')->name('vendor-order-notf-count');
    Route::get('/order/notf/clear/{id}', 'Vendor\NotificationController@order_notf_clear')->name('vendor-order-notf-clear');
    // Order Notification Ends

    // Product Notification Ends

    //------------ VENDOR NOTIFICATION SECTION ENDS ------------

    // Vendor Profile
    Route::get('/profile', 'Vendor\VendorController@profile')->name('vendor-profile');
    Route::post('/profile', 'Vendor\VendorController@profileupdate')->name('vendor-profile-update');
    // Vendor Profile Ends

    // Vendor Shipping Cost
    Route::get('/shipping-cost', 'Vendor\VendorController@ship')->name('vendor-shop-ship');

    // Vendor Shipping Cost
    Route::get('/banner', 'Vendor\VendorController@banner')->name('vendor-banner');

    // Vendor Social
    Route::get('/social', 'Vendor\VendorController@social')->name('vendor-social-index');
    Route::post('/social/update', 'Vendor\VendorController@socialupdate')->name('vendor-social-update');

    Route::get('/withdraw/datatables', 'Vendor\WithdrawController@datatables')->name('vendor-wt-datatables');
    Route::get('/withdraw', 'Vendor\WithdrawController@index')->name('vendor-wt-index');
    Route::get('/withdraw/create', 'Vendor\WithdrawController@create')->name('vendor-wt-create');
    Route::post('/withdraw/create', 'Vendor\WithdrawController@store')->name('vendor-wt-store');

    Route::get('/service/datatables', 'Vendor\ServiceController@datatables')->name('vendor-service-datatables');
    Route::get('/service', 'Vendor\ServiceController@index')->name('vendor-service-index');
    Route::get('/service/create', 'Vendor\ServiceController@create')->name('vendor-service-create');
    Route::post('/service/create', 'Vendor\ServiceController@store')->name('vendor-service-store');
    Route::get('/service/edit/{id}', 'Vendor\ServiceController@edit')->name('vendor-service-edit');
    Route::post('/service/edit/{id}', 'Vendor\ServiceController@update')->name('vendor-service-update');
    Route::get('/service/delete/{id}', 'Vendor\ServiceController@destroy')->name('vendor-service-delete');


    Route::get('/verify', 'Vendor\VendorController@verify')->name('vendor-verify');
    Route::get('/warning/verify/{id}', 'Vendor\VendorController@warningVerify')->name('vendor-warning');
    Route::post('/verify', 'Vendor\VendorController@verifysubmit')->name('vendor-verify-submit');
  });
});
Route::group(['middleware' => 'maintenance'], function () {

  // Route::get('/', function () {
  //   $data = DB::table('languages')->where('is_default', '=', 1)->first();
  //   return Redirect::to('/' . $data->sign);
  // });

  Route::get('/{lang?}', 'Front\FrontendController@index')->name('front.index');

  Route::get('/extras', 'Front\FrontendController@extraIndex')->name('front.extraIndex');
  Route::get('/currency/{id}', 'Front\FrontendController@currency')->name('front.currency');
  Route::get('/language/{id}', 'Front\FrontendController@language')->name('front.language');

  // BLOG SECTION
  Route::get('{lang}/about-us', 'Front\FrontendController@about')->name('front.about');
  Route::get('{lang}/about', 'Front\FrontendController@aboutus')->name('front.aboutus');
  Route::get('{lang}/jobs', 'Front\FrontendController@jobs')->name('front.jobs');
  Route::get('{lang}/latestwork', 'Front\FrontendController@latestwork')->name('front.latestwork');
  Route::get('{lang}/profits', 'Front\FrontendController@profits')->name('front.profits');
  Route::get('{lang}/management', 'Front\FrontendController@management')->name('front.management');
  Route::get('{lang}/appointment', 'Front\FrontendController@appointment')->name('front.appointment');

  Route::get('{lang}/gallery', 'Front\FrontendController@gallery')->name('front.gallery');
  Route::get('{lang}/video', 'Front\FrontendController@video')->name('front.video');
  Route::get('{lang}/project-video', 'Front\FrontendController@project_video')->name('front.project_video');
  Route::get('{lang}/product-video', 'Front\FrontendController@product_video')->name('front.product_video');
  Route::get('{lang}/why-us', 'Front\FrontendController@whyus')->name('front.whyus');
  Route::get('{lang}/locations', 'Front\FrontendController@offerss')->name('front.offerss');
  Route::get('{lang}/support', 'Front\FrontendController@support')->name('front.support');
  Route::get('{lang}/review', 'Front\FrontendController@review')->name('front.review');
  Route::get('{lang}/after-before', 'Front\FrontendController@afterbefore')->name('front.afterbefore');

  Route::get('{lang}/what-we-do', 'Front\FrontendController@what_we_do')->name('front.what-we-do');
  Route::get('{lang}/blog', 'Front\FrontendController@blog')->name('front.blog');


  Route::get('{lang}/blog/{id}', 'Front\FrontendController@blogshow')->name('front.blogshow');


  Route::get('{lang}/blog/category/{slug}', 'Front\FrontendController@blogcategory')->name('front.blogcategory');
  Route::get('{lang}/blog/tag/{slug?}', 'Front\FrontendController@blogtags')->name('front.blogtags');
  Route::get('{lang}/blog-search', 'Front\FrontendController@blogsearch')->name('front.blogsearch');
  Route::get('{lang}/blog/archive/{slug}', 'Front\FrontendController@blogarchive')->name('front.blogarchive');
  // BLOG SECTION ENDS

  // FAQ SECTION
  Route::get('{lang}/faq', 'Front\FrontendController@faq')->name('front.faq');
  // FAQ SECTION ENDS 
  Route::get('{lang}/team', 'Front\FrontendController@team')->name('front.team');
  // Offers SECTION
  Route::get('{lang}/offers/{slug}', 'Front\FrontendController@offers')->name('front.offers');
  // Offers SECTION ENDS
  Route::get('{lang}/category/{category?}/{subcategory?}/{childcategory?}', 'Front\CatalogController@category')->name('front.category');
  Route::get('{lang}/category/{slug1}/{slug2}', 'Front\CatalogController@subcategory')->name('front.subcat');
  Route::get('{lang}/category/{slug1}/{slug2}/{slug3}', 'Front\CatalogController@childcategory')->name('front.childcat');

  Route::get('{lang}/service/{service?}', 'Front\FrontendController@service')->name('front.service');
  Route::get('{lang}/services', 'Front\FrontendController@services')->name('front.services');
  // CONTACT SECTION
  Route::get('{lang}/contact', 'Front\FrontendController@contact')->name('front.contact');
  Route::post('/contact', 'Front\FrontendController@contactemail')->name('front.contact.submit');

  Route::post('/appointment', 'Front\FrontendController@appointmentemail')->name('front.appointment.submit');
  Route::get('{lang}/contact/refresh_code', 'Front\FrontendController@refresh_code');
  // CONTACT SECTION  ENDS
  Route::get('{lang}/brands', 'Front\FrontendController@brands')->name('front.brannds');
  // PRODCT AUTO SEARCH SECTION
  Route::get('{lang}/autosearch/product/{slug}', 'Front\FrontendController@autosearch');
  // PRODCT AUTO SEARCH SECTION ENDS

  // CATEGORY SECTION

  Route::get('{lang}/categories/', 'Front\CatalogController@categories')->name('front.categories');
  Route::get('{lang}/childcategories/{slug}', 'Front\CatalogController@childcategories')->name('front.childcategories');
  // CATEGORY SECTION ENDS

  Route::get('{lang}/products', 'Front\FrontendController@products')->name('front.products');
  Route::get('{lang}/product/{slug?}', 'Front\FrontendController@product')->name('front.product2');

  Route::get('{lang}/solution/{slug?}', 'Front\FrontendController@solution')->name('front.solution');

  Route::get('{lang}/markets', 'Front\FrontendController@markets')->name('front.markets');
  Route::get('{lang}/markets-details/{slug?}', 'Front\FrontendController@markets_details')->name('front.markets_details');
  Route::get('{lang}/brand/{slug}', 'Front\FrontendController@brand')->name('front.singlebrands');
  // TAG SECTION
  Route::get('{lang}/tag/{slug}', 'Front\CatalogController@tag')->name('front.tag');
  // TAG SECTION ENDS

  // TAG SECTION
  Route::get('{lang}/search/', 'Front\CatalogController@search')->name('front.search');
  // TAG SECTION ENDS

  // PRODCT SECTION
  Route::get('{lang}/item/{slug?}', 'Front\CatalogController@product')->name('front.product');

  Route::get('{lang}/afbuy/{slug?}', 'Front\CatalogController@affProductRedirect')->name('affiliate.product');
  Route::get('/item/quick/view/{id}/', 'Front\CatalogController@quick')->name('product.quick');
  Route::get('/items/view/{id}/', 'Front\CatalogController@quickss')->name('product.quickz');

  Route::post('/item/review', 'Front\CatalogController@reviewsubmit')->name('front.review.submit');
  Route::get('/item/view/review/{id}', 'Front\CatalogController@reviews')->name('front.reviews');
  // PRODCT SECTION ENDS

  // COMMENT SECTION
  Route::post('/item/comment/store', 'Front\CatalogController@comment')->name('product.comment');
  Route::post('/item/comment/edit/{id}', 'Front\CatalogController@commentedit')->name('product.comment.edit');
  Route::get('/item/comment/delete/{id}', 'Front\CatalogController@commentdelete')->name('product.comment.delete');
  // COMMENT SECTION ENDS

  // REPORT SECTION
  Route::post('/item/report', 'Front\CatalogController@report')->name('product.report');
  // REPORT SECTION ENDS

  Route::get('/end', 'Front\CartController@end');
  // COMPARE SECTION
  Route::get('{lang}/item/compare/view', 'Front\CompareController@compare')->name('product.compare');
  Route::get('/item/compare/add/{id}', 'Front\CompareController@addcompare')->name('product.compare.add');
  Route::get('/item/compare/remove/{id}', 'Front\CompareController@removecompare')->name('product.compare.remove');

  Route::get('acceptapi', 'SiteController@acceptapi');

  // REPLY SECTION
  Route::post('/service/search/', 'Front\FrontendController@search')->name('front.search.submit');



  Route::post('/item/reply/{id}', 'Front\CatalogController@reply')->name('product.reply');

  Route::post('/item/reply/edit/{id}', 'Front\CatalogController@replyedit')->name('product.reply.edit');
  Route::get('/item/reply/delete/{id}', 'Front\CatalogController@replydelete')->name('product.reply.delete');
  // REPLY SECTION ENDS

  // CART SECTION
  Route::get('{lang}/carts/view', 'Front\CartController@cartview');
  Route::get('{lang}/carts2/view', 'Front\CartController@cart2view');
  Route::get('{lang}/carts/', 'Front\CartController@cart')->name('front.cart');
  Route::get('/addcart/{id}', 'Front\CartController@addcart')->name('product.cart.add');
  Route::get('{lang}/addtocart/{id}', 'Front\CartController@addtocart')->name('product.cart.quickadd');
  Route::get('{lang}/addnumcart', 'Front\CartController@addnumcart');
  Route::get('{lang}/addbyone', 'Front\CartController@addbyone');
  Route::get('{lang}/reducebyone', 'Front\CartController@reducebyone');
  Route::get('/upcolor', 'Front\CartController@upcolor');
  Route::get('/removecart/{id}', 'Front\CartController@removecart')->name('product.cart.remove');
  Route::get('/carts/coupon', 'Front\CartController@coupon');
  Route::get('/carts/coupon/check', 'Front\CartController@couponcheck');
  // CART SECTION ENDS




  Route::get('getapi', 'Front\PaymentController@getbankmasrapi');

  Route::get('{lang}/checkout/', 'Front\CheckoutController@checkout')->name('front.checkout');

  //  Route::get('payment/paypaypal','Front\PaymentController@payment');
  Route::get('cancel', 'Front\PaymentController@cancel')->name('payment.cancel');
  Route::get('payment/success', 'Front\PaymentController@success')->name('payment.success');
  Route::get('/checkout/payment/{slug1}/{slug2}', 'Front\CheckoutController@loadpayment')->name('front.load.payment');
  Route::get('{lang}/order/track/{id}', 'Front\FrontendController@trackload')->name('front.track.search');
  Route::get('/checkout/payment/return', 'Front\PaymentController@payreturn')->name('payment.return');
  Route::get('checkout/bankmasr', 'Front\PaymentController@bankmasr');
  Route::get('checkout/fawry', 'Front\PaymentController@fawry_paymentz');
  Route::get('checkout/accept', 'Front\PaymentController@accept');
  Route::get('checkout/nbe', 'Front\PaymentController@NBE_payment');
  Route::get('checkout/thawani', 'Front\PaymentController@thwani');
  Route::get('checkout/paywithpaypal', array('as' => 'paywithpaypal', 'uses' => 'Front\PaypalController@payWithPaypal',));
  // route for post request
  Route::post('paypal', array('as' => 'paypal', 'uses' => 'Front\PaypalController@postPaymentWithpaypal',));
  // route for check status responce
  Route::get('paypal', array('as' => 'status', 'uses' => 'Front\PaypalController@getPaymentStatus',));
  Route::get('{lang}/cancelpayment', 'Front\CheckoutController@cancelpayment');
  Route::get('editorder/{id}', 'Front\CheckoutController@editfinalorder')->name('editorder');
  Route::get('/checkout/payment/cancle', 'Front\PaymentController@paycancle')->name('payment.cancle');
  Route::post('/checkout/payment/notify', 'Front\PaymentController@notify')->name('payment.notify');
  Route::get('/checkout/instamojo/notify', 'Front\InstamojoController@notify')->name('instamojo.notify');

  Route::post('/paystack/submit', 'Front\PaystackController@store')->name('paystack.submit');
  Route::post('/instamojo/submit', 'Front\InstamojoController@store')->name('instamojo.submit');
  Route::post('/paypal-submit', 'Front\PaymentController@store')->name('paypal.submit');
  Route::post('/stripe-submit', 'Front\StripeController@store')->name('stripe.submit');
  Route::post('cities', 'Front\CheckoutController@cities');
  Route::post('citiess', 'Front\CheckoutController@citiess');
  Route::post('/phonenumbers', 'Front\CheckoutController@phoneNumbers');
  Route::post('/shipmentss', 'Front\CheckoutController@shipmentss');
  Route::post('/shipments', 'Front\CheckoutController@shipments');
  Route::post('/addressscity', 'Front\CheckoutController@addressscity');
  Route::post('/colors/colors', 'Front\CheckoutController@colorss')->name('colorss');

  // Molly Routes

  Route::post('/molly/submit', 'Front\MollyController@store')->name('molly.submit');
  Route::get('/molly/notify', 'Front\MollyController@notify')->name('molly.notify');
  // Molly Routes Ends

  //PayTM Routes
  Route::post('/paytm-submit', 'Front\PaytmController@store')->name('paytm.submit');;
  Route::post('/paytm-callback', 'Front\PaytmController@paytmCallback')->name('paytm.notify');

  //RazorPay Routes
  Route::post('/razorpay-submit', 'Front\RazorpayController@store')->name('razorpay.submit');;
  Route::post('/razorpay-callback', 'Front\RazorpayController@razorCallback')->name('razorpay.notify');

  Route::post('/cashondelivery', 'Front\CheckoutController@cashondelivery')->name('cash.submit');
  Route::post('/bankTransfer', 'Front\CheckoutController@bankTransfer')->name('group.submit');
  Route::post('/gateway', 'Front\CheckoutController@gateway')->name('gateway.submit');
  Route::post('fawrypaymentss', 'Front\CheckoutController@fawrypaymentt')->name('fawrygatewaay.submit');
  Route::post('/nbe', 'Front\CheckoutController@Nbe')->name('nbe.submit');
  Route::post('/accept/submit', 'Front\CheckoutController@accepts')->name('accept.submit');
  Route::post('/thawani', 'Front\CheckoutController@thawany')->name('thawani.submit');
  Route::post('/fatora', 'Front\CheckoutController@fatora')->name('fatora.submit');
  Route::post('Paypal', 'Front\CheckoutController@paypal')->name('Paypal.submit');


  // CHECKOUT SECTION ENDS

  // TAG SECTION
  Route::get('/search/', 'Front\CatalogController@search')->name('front.search');
  // TAG SECTION ENDS

  // VENDOR SECTION
  Route::get('/store/{slug?}', 'Front\VendorController@index')->name('front.vendor');
  Route::post('/vendor/contact', 'Front\VendorController@vendorcontact');
  // TAG SECTION ENDS

  // SUBSCRIBE SECTION

  Route::post('/subscriber/store', 'Front\FrontendController@subscribe')->name('front.subscribe');

  // SUBSCRIBE SECTION ENDS



  //  CRONJOB
  Route::get('/vendor/subscription/check', 'Front\FrontendController@subcheck');

  // CRONJOB ENDS

  // PAGE SECTION
  Route::get('{lang}/{slug}', 'Front\FrontendController@page')->name('front.page');
  // PAGE SECTION ENDS


  Route::get('{lang}/read/notification/{id}', 'Front\FrontendController@readnotif')->name('readnotif');


  Route::get('{lang}/forget/coupon', 'Front\FrontendController@forget')->name('forget.coupon');
  // ************************************ FRONT SECTION ENDS**********************************************


  // LOGIN WITH FACEBOOK OR GOOGLE SECTION
  Route::get('user/auth/{provider}', 'User\SocialRegisterController@redirectToProvider')->name('social-provider');
  Route::get('/auth/{provider}/callback', 'User\SocialRegisterController@handleProviderCallback');
  // LOGIN WITH FACEBOOK OR GOOGLE SECTION ENDS

  // ******************************** mobile setting ********************************************************

  Route::get('/mobilesetting/slider/datatables', 'Admin\mobilesettingController@datatables')->name('admin-mobilesetting-datatables'); //JSON REQUEST
  Route::get('/mobilesetting/slider/all', 'Admin\mobilesettingController@index')->name('admin-mobilesetting-index');
  Route::get('/mobilesetting/slider/create', 'Admin\mobilesettingController@create')->name('admin-mobilesetting-add');
  Route::post('/mobilesetting/slider/create', 'Admin\mobilesettingController@store')->name('admin-mobilesetting-store');
  Route::get('/mobilesetting/slider/edit/{id}', 'Admin\mobilesettingController@edit')->name('admin-mobilesetting-edit');
  Route::post('/mobilesetting/slider/edit/{id}', 'Admin\mobilesettingController@update')->name('admin-mobilesetting-update');
  Route::get('/mobilesetting/slider/delete/{id}', 'Admin\mobilesettingController@destroy')->name('admin-mobilesetting-delete');

  Route::post('mobilesetting/slide', 'Admin\mobilesettingController@slide');


  //   banners mobile setting 
  Route::get('/mobilebanners/datatables', 'Admin\mobilebannersController@datatables')->name('admin-mobilebanners-datatables'); //JSON REQUEST
  Route::get('/mobilebanners/all', 'Admin\mobilebannersController@index')->name('admin-mobilebanners-index');
  Route::get('/mobilebanners/create', 'Admin\mobilebannersController@create')->name('admin-mobilebanners-add');
  Route::post('/mobilebanners/create', 'Admin\mobilebannersController@store')->name('admin-mobilebanners-store');
  Route::get('/mobilebanners/edit/{id}', 'Admin\mobilebannersController@edit')->name('admin-mobilebanners-edit');
  Route::post('/mobilebanners/edit/{id}', 'Admin\mobilebannersController@update')->name('admin-mobilebanners-update');
  Route::get('/mobilebanners/delete/{id}', 'Admin\mobilebannersController@destroy')->name('admin-mobilebanners-delete');

  // banners
  Route::get('banner/mobilesetting/datatables', 'Admin\BannerController@bannerdatatables')->name('admin-banner-mobilesetting-datatables'); //JSON REQUEST
  Route::get('banner/mobilesetting/all', 'Admin\BannerController@bannerindex')->name('admin-banner-mobilesetting-index');
  Route::get('banner/mobilesetting/create', 'Admin\BannerController@bannercreate')->name('admin-banner-mobilesetting-add');
  Route::post('banner/mobilesetting/create', 'Admin\BannerController@bannerstore')->name('admin-banner-mobilesetting-store');
  Route::get('/banner/mobilesetting/edit/{id}', 'Admin\BannerController@mobileedit')->name('admin-banner-mobilesetting-edit');
  Route::post('/banner/mobilesetting/edit/{id}', 'Admin\BannerController@mobileupdate')->name('admin-banner-mobilesetting-update');


  /* Products Mobile Settings  */
  Route::get('/mobile/products/datatables', 'Admin\ProductController@mobiledatatables')->name('admin-prod-mobile-datatables'); //JSON REQUEST
  Route::get('/mobile/products', 'Admin\ProductController@mobileindex')->name('admin-prod-mobile-index');
  //Route::get('/mobile/products/create', 'Admin\ProductController@mobilecreate')->name('admin-prod-mobile-create');
  // Route::get('/mobile/products/edit/{id}', 'Admin\ProductController@mobileedit')->name('admin-prod-mobile-edit');
  //  Route::post('/mobile/products/edit/{id}', 'Admin\ProductController@mobileupdate')->name('admin-prod-mobile-update');
  Route::post('/mobile/products/upload/update/{id}', 'Admin\ProductController@uploadUpdatemobile')->name('admin-prod-upload-mobile-update');
  Route::post('/mobile/gallery/store', 'Admin\GalleryController@storemobile')->name('admin-gallery-mobile-store');
  Route::get('/gallery/mobileshow', 'Admin\GalleryController@mobileshow')->name('admin-gallery-mobileshow');
});
