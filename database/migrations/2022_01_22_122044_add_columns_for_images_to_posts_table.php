<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsForImagesToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //pomni - ejeli redaktiruem migraciu uje imeusheysa tablici bazi to vsegda delay nullable inache migracia ne proidet chtob bila vozmojnost null
        Schema::table('posts', function (Blueprint $table) {
            //posle sozd vot etogo vsego cherez php artisan dobavlaem nije..
            $table->string('preview_image')->nullable();
            $table->string('main_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //esli v budushem baza ne zakhochet dropat srazu 2 kolonki, to delay tak
        //no eshe mojno sozd eshe odnin fail migracii
        Schema::table('posts', function (Blueprint $table) {
            //zdes prosto dropaem
            $table->dropColumn('preview_image');

        });
        Schema::table('posts', function (Blueprint $table) {
            //zdes prosto dropaem
            $table->dropColumn('main_image');
        });
    }
}
