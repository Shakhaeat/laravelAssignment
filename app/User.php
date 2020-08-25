<?php

namespace App;

use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'password', 'remember_token',
    ];
    protected $hidden = [
        'password',
    ];
    public $timestamps = true;

//    public static function boot() {
//        parent::boot();
//        static::creating(function($post) {
//            $post->created_by = Auth::user()->id;
//            $post->updated_by = Auth::user()->id;
//        });
//
//        static::updating(function($post) {
//            $post->updated_by = Auth::user()->id;
//        });
//    }
}
