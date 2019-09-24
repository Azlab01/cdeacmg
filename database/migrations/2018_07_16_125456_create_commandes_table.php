<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration {

    public function up()
    {
        Schema::create('commandes', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('predicateur', 255)->default('none');
            $table->string('theme', 255)->default('none');
            $table->integer('nbre')->unsigned();
            $table->date('date_livraison');
            $table->date('date_culte');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
                  
            $table->integer('recorder_id')->unsigned();
            $table->foreign('recorder_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::table('commandes', function(Blueprint $table) {
            $table->dropForeign('commandes_user_id_foreign');
        });
        Schema::drop('commandes');
    }

}