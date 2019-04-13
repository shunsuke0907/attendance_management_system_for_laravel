<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('base_id')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->integer('position')->default(0);
            $table->string('employee_number')->nullable();
            $table->string('card_number')->nullable();
            $table->string('department')->nullable();
            $table->dateTime('basic_time')->default('2019-01-01 08:00:00');
            $table->dateTime('designated_working_start_time')->nullable();
            $table->dateTime('designated_working_end_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('base_id');
            $table->dropColumn('is_admin');
            $table->dropColumn('position');
            $table->dropColumn('employee_number');
            $table->dropColumn('card_number');
            $table->dropColumn('department');
            $table->dropColumn('basic_time');
            $table->dropColumn('work_time');
            $table->dropColumn('designated_working_start_time');
            $table->dropColumn('designated_working_end_time');
        });
    }
}
