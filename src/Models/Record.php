<?php

namespace LasePeCo\Records\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $message
 * @property array $properties
 */
class Record extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    protected $dates = [
        'timestamp'
    ];

    protected $casts = [
        'properties' => 'array'
    ];


    public function causer()
    {
        return $this->morphTo();
    }

    public function subject()
    {
        return $this->morphTo();
    }
}
