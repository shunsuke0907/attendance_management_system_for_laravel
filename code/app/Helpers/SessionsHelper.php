<?php
if (! function_exists('setRedirect')) {

    /**
     * 状況に応じてURLを選定する
     * requestUrlが存在する場合はrequestUrl、管理者の場合はTOP、ユーザーは詳細ページのパスを返す
     * @param $user ログインしたユーザー
     * @param $requestUrl ユーザーがリクエストしたURL
     * @return void
     */
    function setRedirect($user, $requestUrl = null)
    {
        if ($requestUrl) return $requestUrl;

        return ((boolean) $user->is_admin) ? '/' : 'users/' . $user->id;
    }
}
