<?php

namespace TaNteE\LaravelModelApi\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TaNteE\LaravelModelApi\Http\Controllers\Asset\AssetController;
use TaNteE\LaravelModelApi\Traits\UserStamps;

class Assets extends Model
{
    use SoftDeletes;
    use UserStamps;

    protected $guarded = [];

    public function getBase64dataAttribute()
    {
        return AssetController::getAssetDataBase64($this);
    }
}
