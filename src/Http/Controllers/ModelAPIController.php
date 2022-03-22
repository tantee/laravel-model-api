<?php

namespace TaNteE\LaravelModelApi\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class ModelAPIController extends Controller
{
    private static function genericRouting(Request $request, $methodFunction, $modelNamespace, $modelName, $modelId = null)
    {
        Log::debug($methodFunction." ".$modelNamespace.".".$modelName);
        $modelClassName = "\\App\\Models\\$modelNamespace\\$modelName";
        if (class_exists($modelClassName)) {
            $methodClass = "\\TaNteE\\LaravelModelApi\\LaravelModelApi";
            if (method_exists($methodClass, $methodFunction)) {
                return $methodClass::$methodFunction($request, $modelClassName);
            } else {
                return response("Method not found", 404);
            }
        } else {
            return response("Model not found", 404);
        }
    }

    public static function methodRouting(Request $request, $modelNamespace, $modelName, $method)
    {
        return self::genericRouting($request, $method.'ModelByRequest', $modelNamespace, $modelName);
    }

    public static function readRouting(Request $request, $modelNamespace, $modelName)
    {
        return self::genericRouting($request, 'readModelByRequest', $modelNamespace, $modelName);
    }

    public static function queryRouting(Request $request, $modelNamespace, $modelName)
    {
        return self::genericRouting($request, 'queryModelByRequest', $modelNamespace, $modelName);
    }
}
