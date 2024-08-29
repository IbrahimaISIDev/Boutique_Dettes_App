<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleDettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('article_dette')) {
            Schema::create('article_dette', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('article_id');
                $table->unsignedBigInteger('dette_id');
                $table->integer('qteVente');
                $table->decimal('prixVente', 10, 2);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_dette');
    }
}
