<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
		'type'
    ];

    public function posts(){
        return $this->belongsToMany('App\Post', 'post_tags');
    }
}
