<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartDateAndDueDateToTodolistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('todolist', function (Blueprint $table) {
            $table->date('start_date','Y-m-d')->nullable();
            $table->date('due_date','Y-m-d')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todolist', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('due_date');
        });
    }
}
