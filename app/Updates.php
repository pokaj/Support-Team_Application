<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Updates extends Model
{
    protected $fillable = [
        'user_id', 'activity_id',
    ];

    protected $table = 'updates';
    public $primaryKey = 'id';
    public $timestamps = true;
}
