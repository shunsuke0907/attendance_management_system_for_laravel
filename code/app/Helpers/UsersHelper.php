<?php

use Carbon\Carbon;

if (! function_exists('isAdmin')) {

    /**
     * ページごとにタイトルを整形して返す
     * @return bool
     */
    function isAdmin()
    {
        return (boolean) Auth::user()->is_admin;
    }
}

if (! function_exists('reshapeFormatBasicTime')) {

    /**
     * 基本時間の値を、指定のフォーマットにして返す
     * @return string ○○時間に整形した値
     */
    function reshapeFormatBasicTime($datetime)
    {
        $dt = Carbon::parse($datetime);
        $timeFormat = (($dt->hour * 60) + $dt->minute)/60.0;

        return number_format($timeFormat, 2);
    }
}

if (! function_exists('reshapeFormatTime')) {

    /**
     * datetimeのフォーマットの値を、HH:MM に整形して返す
     * @return string HH:MM に整形した値
     */
    function reshapeFormatTime($datetime)
    {
        return ($datetime) ? date('H:i', strtotime($datetime)) : null;
    }
}

if (! function_exists('positionInEnglish')) {

    /**
     * 該当ユーザーの役職が英語で欲しい時に変換して返す
     * @return bool
     */
    function positionInEnglish($user)
    {
        switch ($user->position) {
            case 0:
                return 'user';
            case 1:
                return 'superior';
            default:
                return null;
        }
    }
}
