<?php
if (! function_exists('full_title')) {

    /**
     * ページごとにタイトルを整形して返す
     * @param string $pageTitle ページごとのタイトル
     * @return string 条件ごとに整形したタイトル
     */
    function full_title($pageTitle = null)
    {
        $baseTitle = '勤怠管理システム';

        if ($pageTitle) {
            return $pageTitle . ' | ' . $baseTitle;
        } else {
            return $baseTitle;
        }
    }
}
?>
