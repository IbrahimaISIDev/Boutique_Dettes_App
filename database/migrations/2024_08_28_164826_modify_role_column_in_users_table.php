<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRoleColumnInUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 50)->change(); // Ajustez la taille selon vos besoins
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 20)->change(); // Revenir à la taille d'origine si nécessaire
        });
    }
}
