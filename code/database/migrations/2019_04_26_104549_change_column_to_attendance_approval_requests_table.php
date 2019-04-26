<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnToAttendanceApprovalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendance_approval_requests', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('approval_status')->unsigned()->change();
            $table->integer('approver')->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendance_approval_requests', function (Blueprint $table) {
            $table->integer('user_id')->index('user_id')->comment('外部キー')->change();
            $table->integer('approval_status')->default(0)->comment('承認状況')->change();
            $table->integer('approver')->nullable()->comment('承認者')->change();
        });
    }
}
