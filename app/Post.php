<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use SoftDeletes;
    use Searchable;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'type'
    ];

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'post_tags');
    }

    public function likes(){
        return $this->belongsToMany('App\User', 'post_user_likes');
    }
}
