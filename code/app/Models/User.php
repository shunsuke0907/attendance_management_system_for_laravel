<?php

namespace  App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Observers\UserObserver;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public static $rules = [
    //     'name' => '',
    //     'email' => 'email',
    //     'password' => '',
    //     'base_id' => '',
    //     'is_admin' => '',
    //     'position' => '',
    //     'employee_number' => '',
    //     'card_number' => '',
    //     'department' => '',
    //     'basic_time' => '',
    //     'designated_working_start_time' => '',
    //     'designated_working_end_time' => ''
    // ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        User::observe(new UserObserver); // オブザーバーを使用したイベントのフック
    }
}
