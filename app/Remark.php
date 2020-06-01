<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $fillable = [
        'user_id', 'activity_id', 'remarks',
    ];

    protected $table = 'remarks';
    public $primaryKey = 'id';
    public $timestamps = true;
}
