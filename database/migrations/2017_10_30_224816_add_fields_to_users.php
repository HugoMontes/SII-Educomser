<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->string('ci', 15);
        $table->string('paterno', 25);
        $table->string('materno', 25);
        $table->boolean('is_active')->default(1);
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
        $table->dropColumn('ci');
        $table->dropColumn('paterno');
        $table->dropColumn('materno');
        $table->dropColumn('is_active');
      });
    }
}
