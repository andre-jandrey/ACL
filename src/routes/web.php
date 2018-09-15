<?php

/**
 * Rotas protegidas pelo controle de perfis e permissões
 * só acessivel após relizar login com usuario adim e dar permissão ao usuario
 */
Route::group(['middleware' => ['web', 'check.permissions'], 'namespace' => 'Westsoft\Acl\Controllers'], function () {
    Route::get('/permissions/filter', 'PermissionController@filter')->name('permissions.filter');
    Route::resource('/permissions', 'PermissionController');
    Route::resource('/profiles', 'ProfileController');
    Route::resource('/profile_permissions', 'ProfilePermissionsController');
    Route::resource('/user_profiles', 'UserProfilesController');
    Route::resource('/users', 'UserController');
});

