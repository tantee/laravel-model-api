<?php

namespace TaNteE\LaravelModelApi\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TaNteE\LaravelModelApi\Traits\UserStamps;

class Revisions extends Model
{
    use SoftDeletes;
    use UserStamps;

    protected $guarded = [];

    protected $dates = [
        'revisionDateTime',
    ];

    protected $casts = [
        'revisionData' => 'array',
    ];
}
