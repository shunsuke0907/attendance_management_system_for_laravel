<?php

use App\Models\User;

use Carbon\Carbon;

if (! function_exists('isAdmin')) {

    /**
     * ログインしているユーザーが管理者かどうか判別
     * @return bool
     */
    function isAdmin()
    {
        return (boolean) Auth::user()->is_admin;
    }
}

if (! function_exists('formatBasicTime')) {

    /**
     * 基本時間の値を、指定のフォーマットにして返す
     * @param datetime $datetime
     * @return string ○○時間に整形した値
     */
    function formatBasicTime($datetime)
    {
        $dt = Carbon::parse($datetime);
        $timeFormat = (($dt->hour * 60) + $dt->minute) / 60.0;

        return floatval(number_format($timeFormat, 2));
    }
}
