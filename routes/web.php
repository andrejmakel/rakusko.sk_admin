<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::post('permissions/parse-csv-import', 'PermissionsController@parseCsvImport')->name('permissions.parseCsvImport');
    Route::post('permissions/process-csv-import', 'PermissionsController@processCsvImport')->name('permissions.processCsvImport');
    Route::resource('permissions', 'PermissionsController');
    Route::get('permissions/clone/{id}', 'PermissionsController@clone');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::post('roles/parse-csv-import', 'RolesController@parseCsvImport')->name('roles.parseCsvImport');
    Route::post('roles/process-csv-import', 'RolesController@processCsvImport')->name('roles.processCsvImport');
    Route::resource('roles', 'RolesController');
    Route::get('roles/clone/{id}', 'RolesController@clone');


    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');
    Route::get('visits', 'UsersController@log')->name('users.log');
    Route::get('users/clone/{id}', 'UsersController@clone');

    // Place
    Route::delete('places/destroy', 'PlaceController@massDestroy')->name('places.massDestroy');
    Route::post('places/media', 'PlaceController@storeMedia')->name('places.storeMedia');
    Route::post('places/ckmedia', 'PlaceController@storeCKEditorImages')->name('places.storeCKEditorImages');
    Route::post('places/parse-csv-import', 'PlaceController@parseCsvImport')->name('places.parseCsvImport');
    Route::post('places/process-csv-import', 'PlaceController@processCsvImport')->name('places.processCsvImport');
    Route::resource('places', 'PlaceController');
    Route::get('places/clone/{id}', 'PlaceController@clone');

    // Activity
    Route::delete('activities/destroy', 'ActivityController@massDestroy')->name('activities.massDestroy');
    Route::post('activities/media', 'ActivityController@storeMedia')->name('activities.storeMedia');
    Route::post('activities/ckmedia', 'ActivityController@storeCKEditorImages')->name('activities.storeCKEditorImages');
    Route::post('activities/parse-csv-import', 'ActivityController@parseCsvImport')->name('activities.parseCsvImport');
    Route::post('activities/process-csv-import', 'ActivityController@processCsvImport')->name('activities.processCsvImport');
    Route::resource('activities', 'ActivityController');
    Route::get('activities/clone/{id}', 'ActivityController@clone');

    // Mall
    Route::delete('malls/destroy', 'MallController@massDestroy')->name('malls.massDestroy');
    Route::post('malls/media', 'MallController@storeMedia')->name('malls.storeMedia');
    Route::post('malls/ckmedia', 'MallController@storeCKEditorImages')->name('malls.storeCKEditorImages');
    Route::post('malls/parse-csv-import', 'MallController@parseCsvImport')->name('malls.parseCsvImport');
    Route::post('malls/process-csv-import', 'MallController@processCsvImport')->name('malls.processCsvImport');
    Route::resource('malls', 'MallController');
    Route::get('malls/clone/{id}', 'MallController@clone');

    // Shop
    Route::delete('shops/destroy', 'ShopController@massDestroy')->name('shops.massDestroy');
    Route::post('shops/media', 'ShopController@storeMedia')->name('shops.storeMedia');
    Route::post('shops/ckmedia', 'ShopController@storeCKEditorImages')->name('shops.storeCKEditorImages');
    Route::post('shops/parse-csv-import', 'ShopController@parseCsvImport')->name('shops.parseCsvImport');
    Route::post('shops/process-csv-import', 'ShopController@processCsvImport')->name('shops.processCsvImport');
    Route::resource('shops', 'ShopController');
    Route::get('shops/clone/{id}', 'ShopController@clone');

    // Tags
    Route::delete('tags/destroy', 'TagsController@massDestroy')->name('tags.massDestroy');
    Route::post('tags/parse-csv-import', 'TagsController@parseCsvImport')->name('tags.parseCsvImport');
    Route::post('tags/process-csv-import', 'TagsController@processCsvImport')->name('tags.processCsvImport');
    Route::resource('tags', 'TagsController');
    Route::get('tags/clone/{id}', 'TagsController@clone');

    // Navi
    Route::delete('navis/destroy', 'NaviController@massDestroy')->name('navis.massDestroy');
    Route::post('navis/media', 'NaviController@storeMedia')->name('navis.storeMedia');
    Route::post('navis/ckmedia', 'NaviController@storeCKEditorImages')->name('navis.storeCKEditorImages');
    Route::post('navis/parse-csv-import', 'NaviController@parseCsvImport')->name('navis.parseCsvImport');
    Route::post('navis/process-csv-import', 'NaviController@processCsvImport')->name('navis.processCsvImport');
    Route::resource('navis', 'NaviController');
    Route::get('navis/clone/{id}', 'NaviController@clone');

    // Price Text
    Route::delete('price-texts/destroy', 'PriceTextController@massDestroy')->name('price-texts.massDestroy');
    Route::post('price-texts/parse-csv-import', 'PriceTextController@parseCsvImport')->name('price-texts.parseCsvImport');
    Route::post('price-texts/process-csv-import', 'PriceTextController@processCsvImport')->name('price-texts.processCsvImport');
    Route::resource('price-texts', 'PriceTextController');
    Route::get('price-texts/clone/{id}', 'PriceTextController@clone');

    // Lang
    Route::delete('langs/destroy', 'LangController@massDestroy')->name('langs.massDestroy');
    Route::post('langs/parse-csv-import', 'LangController@parseCsvImport')->name('langs.parseCsvImport');
    Route::post('langs/process-csv-import', 'LangController@processCsvImport')->name('langs.processCsvImport');
    Route::resource('langs', 'LangController');
    Route::get('langs/clone/{id}', 'LangController@clone');

    // Trans Mall
    Route::delete('trans-malls/destroy', 'TransMallController@massDestroy')->name('trans-malls.massDestroy');
    Route::post('trans-malls/media', 'TransMallController@storeMedia')->name('trans-malls.storeMedia');
    Route::post('trans-malls/ckmedia', 'TransMallController@storeCKEditorImages')->name('trans-malls.storeCKEditorImages');
    Route::post('trans-malls/parse-csv-import', 'TransMallController@parseCsvImport')->name('trans-malls.parseCsvImport');
    Route::post('trans-malls/process-csv-import', 'TransMallController@processCsvImport')->name('trans-malls.processCsvImport');
    Route::resource('trans-malls', 'TransMallController');
    Route::get('trans-malls/clone/{id}', 'TransMallController@clone');

    // Trans Shop
    Route::delete('trans-shops/destroy', 'TransShopController@massDestroy')->name('trans-shops.massDestroy');
    Route::post('trans-shops/media', 'TransShopController@storeMedia')->name('trans-shops.storeMedia');
    Route::post('trans-shops/ckmedia', 'TransShopController@storeCKEditorImages')->name('trans-shops.storeCKEditorImages');
    Route::post('trans-shops/parse-csv-import', 'TransShopController@parseCsvImport')->name('trans-shops.parseCsvImport');
    Route::post('trans-shops/process-csv-import', 'TransShopController@processCsvImport')->name('trans-shops.processCsvImport');
    Route::resource('trans-shops', 'TransShopController');
    Route::get('trans-shops/clone/{id}', 'TransShopController@clone');

    // Trans Place
    
    Route::delete('trans-places/destroy', 'TransPlaceController@massDestroy')->name('trans-places.massDestroy');
    Route::post('trans-places/media', 'TransPlaceController@storeMedia')->name('trans-places.storeMedia');
    Route::post('trans-places/ckmedia', 'TransPlaceController@storeCKEditorImages')->name('trans-places.storeCKEditorImages');
    Route::post('trans-places/parse-csv-import', 'TransPlaceController@parseCsvImport')->name('trans-places.parseCsvImport');
    Route::post('trans-places/process-csv-import', 'TransPlaceController@processCsvImport')->name('trans-places.processCsvImport'); 
    Route::resource('trans-places', 'TransPlaceController'); 
    Route::get('trans-places/clone/{id}', 'TransPlaceController@clone');
    
    

    // Trans Post
    Route::delete('trans-posts/destroy', 'TransPostController@massDestroy')->name('trans-posts.massDestroy');
    Route::post('trans-posts/media', 'TransPostController@storeMedia')->name('trans-posts.storeMedia');
    Route::post('trans-posts/ckmedia', 'TransPostController@storeCKEditorImages')->name('trans-posts.storeCKEditorImages');
    Route::post('trans-posts/parse-csv-import', 'TransPostController@parseCsvImport')->name('trans-posts.parseCsvImport');
    Route::post('trans-posts/process-csv-import', 'TransPostController@processCsvImport')->name('trans-posts.processCsvImport');
    Route::resource('trans-posts', 'TransPostController');
    Route::get('trans-posts/clone/{id}', 'TransPostController@clone');

    // Trans Info
    Route::delete('trans-infos/destroy', 'TransInfoController@massDestroy')->name('trans-infos.massDestroy');
    Route::post('trans-infos/media', 'TransInfoController@storeMedia')->name('trans-infos.storeMedia');
    Route::post('trans-infos/ckmedia', 'TransInfoController@storeCKEditorImages')->name('trans-infos.storeCKEditorImages');
    Route::post('trans-infos/parse-csv-import', 'TransInfoController@parseCsvImport')->name('trans-infos.parseCsvImport');
    Route::post('trans-infos/process-csv-import', 'TransInfoController@processCsvImport')->name('trans-infos.processCsvImport');
    Route::resource('trans-infos', 'TransInfoController');
    Route::get('trans-infos/clone/{id}', 'TransInfoController@clone');

    // Price
    Route::delete('prices/destroy', 'PriceController@massDestroy')->name('prices.massDestroy');
    Route::post('prices/parse-csv-import', 'PriceController@parseCsvImport')->name('prices.parseCsvImport');
    Route::post('prices/process-csv-import', 'PriceController@processCsvImport')->name('prices.processCsvImport');
    Route::resource('prices', 'PriceController');
    Route::get('prices/clone/{id}', 'PriceController@clone');

    // Opening
    Route::delete('openings/destroy', 'OpeningController@massDestroy')->name('openings.massDestroy');
    Route::post('openings/parse-csv-import', 'OpeningController@parseCsvImport')->name('openings.parseCsvImport');
    Route::post('openings/process-csv-import', 'OpeningController@processCsvImport')->name('openings.processCsvImport');
    Route::resource('openings', 'OpeningController');
    Route::get('openings/clone/{id}', 'OpeningController@clone');

    // Opening Text
    Route::delete('opening-texts/destroy', 'OpeningTextController@massDestroy')->name('opening-texts.massDestroy');
    Route::post('opening-texts/parse-csv-import', 'OpeningTextController@parseCsvImport')->name('opening-texts.parseCsvImport');
    Route::post('opening-texts/process-csv-import', 'OpeningTextController@processCsvImport')->name('opening-texts.processCsvImport');
    Route::resource('opening-texts', 'OpeningTextController');
    Route::get('opening-texts/clone/{id}', 'OpeningTextController@clone');

    // Price Note
    Route::delete('price-notes/destroy', 'PriceNoteController@massDestroy')->name('price-notes.massDestroy');
    Route::post('price-notes/parse-csv-import', 'PriceNoteController@parseCsvImport')->name('price-notes.parseCsvImport');
    Route::post('price-notes/process-csv-import', 'PriceNoteController@processCsvImport')->name('price-notes.processCsvImport');
    Route::resource('price-notes', 'PriceNoteController');
    Route::get('price-notes/clone/{id}', 'PriceNoteController@clone');

    // Opening Note
    Route::delete('opening-notes/destroy', 'OpeningNoteController@massDestroy')->name('opening-notes.massDestroy');
    Route::post('opening-notes/parse-csv-import', 'OpeningNoteController@parseCsvImport')->name('opening-notes.parseCsvImport');
    Route::post('opening-notes/process-csv-import', 'OpeningNoteController@processCsvImport')->name('opening-notes.processCsvImport');
    Route::resource('opening-notes', 'OpeningNoteController');
    Route::get('opening-notes/clone/{id}', 'OpeningNoteController@clone');

    // Post
    Route::delete('posts/destroy', 'PostController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::post('posts/parse-csv-import', 'PostController@parseCsvImport')->name('posts.parseCsvImport');
    Route::post('posts/process-csv-import', 'PostController@processCsvImport')->name('posts.processCsvImport');
    Route::resource('posts', 'PostController');
    Route::get('posts/clone/{id}', 'PostController@clone');

    // Info
    Route::delete('infos/destroy', 'InfoController@massDestroy')->name('infos.massDestroy');
    Route::post('infos/media', 'InfoController@storeMedia')->name('infos.storeMedia');
    Route::post('infos/ckmedia', 'InfoController@storeCKEditorImages')->name('infos.storeCKEditorImages');
    Route::post('infos/parse-csv-import', 'InfoController@parseCsvImport')->name('infos.parseCsvImport');
    Route::post('infos/process-csv-import', 'InfoController@processCsvImport')->name('infos.processCsvImport');
    Route::resource('infos', 'InfoController');
    Route::get('infos/clone/{id}', 'InfoController@clone');

    // Accordion
    Route::delete('accordions/destroy', 'AccordionController@massDestroy')->name('accordions.massDestroy');
    Route::post('accordions/media', 'AccordionController@storeMedia')->name('accordions.storeMedia');
    Route::post('accordions/ckmedia', 'AccordionController@storeCKEditorImages')->name('accordions.storeCKEditorImages');
    Route::post('accordions/parse-csv-import', 'AccordionController@parseCsvImport')->name('accordions.parseCsvImport');
    Route::post('accordions/process-csv-import', 'AccordionController@processCsvImport')->name('accordions.processCsvImport');
    Route::resource('accordions', 'AccordionController');
    Route::get('accordions/clone/{id}', 'AccordionController@clone');


    // Shop Categories
    Route::delete('shop-categories/destroy', 'ShopCategoriesController@massDestroy')->name('shop-categories.massDestroy');
    Route::resource('shop-categories', 'ShopCategoriesController');
    Route::get('shop-categories/clone/{id}', 'ShopCategoriesController@clone');

    // Sidebar
    Route::delete('sidebars/destroy', 'SidebarController@massDestroy')->name('sidebars.massDestroy');
    Route::post('sidebars/media', 'SidebarController@storeMedia')->name('sidebars.storeMedia');
    Route::post('sidebars/ckmedia', 'SidebarController@storeCKEditorImages')->name('sidebars.storeCKEditorImages');
    Route::resource('sidebars', 'SidebarController');

    // Ad
    Route::delete('ads/destroy', 'AdController@massDestroy')->name('ads.massDestroy');
    Route::post('ads/media', 'AdController@storeMedia')->name('ads.storeMedia');
    Route::post('ads/ckmedia', 'AdController@storeCKEditorImages')->name('ads.storeCKEditorImages');
    Route::resource('ads', 'AdController');

    // Holiday Name
    Route::delete('holiday-names/destroy', 'HolidayNameController@massDestroy')->name('holiday-names.massDestroy');
    Route::resource('holiday-names', 'HolidayNameController');

    // Holiday
    Route::delete('holidays/destroy', 'HolidayController@massDestroy')->name('holidays.massDestroy');
    Route::resource('holidays', 'HolidayController');

    // Carousel
    Route::delete('carousels/destroy', 'CarouselController@massDestroy')->name('carousels.massDestroy');
    Route::post('carousels/media', 'CarouselController@storeMedia')->name('carousels.storeMedia');
    Route::post('carousels/ckmedia', 'CarouselController@storeCKEditorImages')->name('carousels.storeCKEditorImages');
    Route::post('carousels/parse-csv-import', 'CarouselController@parseCsvImport')->name('carousels.parseCsvImport');
    Route::post('carousels/process-csv-import', 'CarouselController@processCsvImport')->name('carousels.processCsvImport');
    Route::resource('carousels', 'CarouselController');


    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
