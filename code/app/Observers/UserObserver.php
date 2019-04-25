<?php

namespace App\Observers;

use App\Models\User;

use Carbon\Carbon;

class UserObserver
{
    /**
     * User作成save前のイベント
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        //
    }

    /**
     * User情報更新save前のイベント
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updating(User $user)
    {
        $now = Carbon::now()->format('Y-m-d');

        if ($user->basic_time) {
            $user->basic_time = $now . ' ' . $user->basic_time . ':00';
        }

        if ($user->designated_working_start_time) {
            $user->designated_working_start_time = $now . ' ' . $user->designated_working_start_time . ':00';
        }

        if ($user->designated_working_end_time) {
            $user->designated_working_end_time = $now . ' ' . $user->designated_working_end_time . ':00';
        }

        return $user;
    }
}
