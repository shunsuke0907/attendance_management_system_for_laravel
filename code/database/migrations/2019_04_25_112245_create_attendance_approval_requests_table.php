<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceApprovalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_approval_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->index('user_id')->comment('外部キー');
            $table->date('target_month')->nullable()->comment('対象の日付');
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
        Schema::dropIfExists('attendance_approval_requests');
    }
}
