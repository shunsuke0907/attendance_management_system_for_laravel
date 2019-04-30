<?php

use Carbon\Carbon;

if (! function_exists('getTime')) {

    /**
     * datetimeのフォーマットの値を、HH:MM に整形して返す
     * @param datetime $datetime
     * @param string $hourType 「時」のフォーマットを指定（ex: g, G, h, H）
     * @param bool $second 秒の表示が必要かどうか（必要 => true, 不要 => false）
     * @return string 指定のフォーマットにに整形した値
     */
    function getTime($datetime, $hourType, $second = false)
    {
        $s = ($second) ? ':00' : null;
        return ($datetime) ? date($hourType . ':i' . $s, strtotime($datetime)) : null;
    }
}

if (! function_exists('getFormatDate')) {

    /**
     * datetimeのフォーマットの値を、HH:MM に整形して返す
     * @param datetime $datetime
     * @return string 指定のフォーマットにに整形した値
     */
    function getFormatDate($datetime)
    {
        return date('n/j', strtotime($datetime));
    }
}

if (! function_exists('getFormatMonth')) {

    /**
     * datetimeのフォーマットの値を、HH:MM に整形して返す
     * @param datetime $datetime
     * @return string 指定のフォーマットにに整形した値
     */
    function getFormatMonth($datetime)
    {
        return date('Y年n月', strtotime($datetime));
    }
}

if (! function_exists('getWeekType')) {

    /**
     * 曜日のIDをそれぞれに対応する文字列に変換して返す
     * @param int $dayOfWeek 曜日に対応するID
     * @return string IDに対応する文字列
     */
    function getWeekType($dayOfWeek)
    {
        switch ($dayOfWeek) {
            case 0:
                $thisWeek = 'sunday';
                break;
            case 6:
                $thisWeek = 'saturday';
                break;
            default:
                $thisWeek = 'weekday';
                break;
        }

        return $thisWeek;
    }
}
