<?php

use Illuminate\Support\Facades\Route;
use TaNteE\LaravelModelApi\Http\Controllers\ModelAPIController;

Route::group(["prefix"=>config('model-api.route-prefix'),"middleware"=>config('model-api.route-middleware')],function () {
  Route::prefix('models')->group(function () {
    Route::get('{modelNamespace}/{modelName}',[ModelAPIController::class,'readRouting']);
    Route::post('{modelNamespace}/{modelName}/{method}',[ModelAPIController::class,'methodRouting']);
  });
});