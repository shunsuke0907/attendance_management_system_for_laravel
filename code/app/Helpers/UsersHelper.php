<?php

use App\Models\User;

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
     * @param datetime $datetime
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
     * @param datetime $datetime
     * @return string HH:MM に整形した値
     */
    function reshapeFormatTime($datetime)
    {
        return ($datetime) ? date('H:i', strtotime($datetime)) : null;
    }
}

if (! function_exists('selectPosition')) {

    /**
     * 該当ユーザーの役職が英語で欲しい時に変換して返す
     * @return bool
     */
    function selectUserPosition()
    {
        return User::POSITION_TYPE_JAPANESE;
    }
}

if (! function_exists('positionInEnglish')) {

    /**
     * 該当ユーザーの役職が英語で欲しい時に変換して返す
     * @param object $user 該当のユーザー情報
     * @return string 英語の役職名
     */
    function positionInEnglish($user)
    {
        return User::POSITION_TYPE_ENGLISH[$user->position];
    }
}

if (! function_exists('positionInJapanese')) {

    /**
     * 該当ユーザーの役職が日本語で欲しい時に変換して返す
     * @param object $user 該当のユーザー情報
     * @return string 日本語の役職名
     */
    function positionInJapanese($user)
    {
        return User::POSITION_TYPE_JAPANESE[$user->position];
    }
}
