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
