<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activity_title', 'activity_description', 'activity_status' , 'user_id',
    ];

    protected $table = 'activities';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
