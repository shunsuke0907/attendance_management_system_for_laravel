<?php

namespace  App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Observers\UserObserver;

class User extends Authenticatable
{
    use Notifiable;

    const POSITION_USER = 1;
    const POSITION_SUPERIOR = 2;

    const POSITION_TYPE_JAPANESE = [
        self::POSITION_USER => '一般',
        self::POSITION_SUPERIOR => '上長'
    ];

    const POSITION_TYPE_ENGLISH = [
        self::POSITION_USER => 'user',
        self::POSITION_SUPERIOR => 'superior'
    ];

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
        'position' => 'integer',
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

    // hasMany

    public function attendances()
    {
        return $this->hasMany('App\Models\Attendance');
    }

    public function attendance_approval_requests()
    {
        return $this->hasMany('App\Models\AttendanceApprovalRequest');
    }

    public function attendance_edit_requests()
    {
        return $this->hasMany('App\Models\AttendanceEditRequest');
    }

    // belongsTo

    public function base()
    {
        return $this->belongsTo('App\Models\Base');
    }

    // custom method

    /**
     * 役職のテキストを返す
     * @param string $languageType フォーマットの言語を指定
     * @return string/integer 指定のフラグに対応するフォーマット（言語の指定がない場合はフラグをそのまま返す）
     */
    public function getText($languageType = null)
    {
        switch ($languageType) {
            case 'japanese':
                return self::POSITION_TYPE_JAPANESE[$this->position];
            case 'english':
                return self::POSITION_TYPE_ENGLISH[$this->position];
            default:
                return $this->position;
        }
    }
}
