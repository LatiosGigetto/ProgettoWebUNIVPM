<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared( file_get_contents( "database/migrations/couponDB.sql" ) );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('azienda');
        Schema::dropIfExists('coupon');
        Schema::dropIfExists('faq');
        Schema::dropIfExists('gestoriaziende');
        Schema::dropIfExists('offerta');
        Schema::dropIfExists('utente');
    }
};
