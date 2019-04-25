<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceEditRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_edit_requests', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id')->index('user_id')->comment('外部キー');
            $table->date('worked_on')->nullable()->comment('対象の日付');
            $table->datetime('before_change_started_at')->nullable()->comment('変更前出社時間');
            $table->datetime('before_change_finished_at')->nullable()->comment('変更前退社時間');
            $table->datetime('after_change_started_at')->nullable()->comment('変更後出社時間');
            $table->datetime('after_change_finished_at')->nullable()->comment('変更後退社時間');
            $table->boolean('is_leaving_next_day')->default(false)->comment('翌日にまたぐかどうかの判定フラグ');
            $table->integer('approval_status')->default(0)->comment('承認状況');
            $table->date('approval_date')->nullable()->comment('承認日');
            $table->integer('approver')->nullable()->comment('承認者');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_edit_requests');
    }
}
