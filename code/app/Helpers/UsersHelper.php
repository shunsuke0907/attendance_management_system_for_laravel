<?php
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
