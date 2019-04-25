<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->index('user_id')->comment('外部キー');
            $table->date('worked_on')->nullable()->comment('対象の日付');
            $table->dateTime('started_at')->nullable()->comment('出社時間');
            $table->dateTime('finished_at')->nullable()->comment('退社時間');
            $table->string('note')->nullable()->comment('備考');
            $table->dateTime('end_estimated_time')->nullable()->comment('終了予定時間');
            $table->string('business_outline')->nullable()->comment('残業業務処理内容');
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
        Schema::dropIfExists('attendances');
    }
}
