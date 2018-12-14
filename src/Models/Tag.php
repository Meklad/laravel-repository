<?php

namespace Owllog\LaravelTaggy\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Protect table columns from mass assignment.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'slug',
        'count'
    ];
}
