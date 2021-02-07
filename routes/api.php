<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=>config('model-api.route-prefix'),"middleware"=>config('model-api.route-middleware')],function () {
  Route::prefix('models')->group(function () {
    Route::get('{modelNamespace}/{modelName}','ModelAPIController@readRouting');
    Route::post('{modelNamespace}/{modelName}/{method}','ModelAPIController@methodRouting');
  });
});