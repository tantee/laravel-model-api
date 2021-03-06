<?php

namespace TaNteE\LaravelModelApi\Traits;

use Illuminate\Support\Facades\Auth;

trait UserStamps
{
    public static function bootUserStamps()
    {
        static::creating(function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::user()->username;
            } else {
                $model->created_by = (!empty($model->created_by)) ? $model->created_by : 'anonymous';
            }
        });
        static::updating(function ($model) {
            $original = $model->getOriginal();
            if (array_key_exists('deleted_by',$original) && $model->deleted_by == $original['deleted_by']) {
                if (Auth::check()) {
                    $model->updated_by = Auth::user()->username;
                } else {
                    $model->updated_by = (!empty($original["updated_by"])) ? $original["updated_by"] : $original["created_by"];
                }
            } else {
                $model->timestamps = false;
            }
        });
        static::deleting(function ($model) {
            if (Auth::check()) {
                $model->deleted_by = Auth::user()->username;
            } else {
                $model->deleted_by = 'anonymous';
            }
            $model->save();
        });
        static::restoring(function ($model) {
            $model->deleted_by = null;
        });
    }
}
