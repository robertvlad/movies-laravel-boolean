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
        Schema::table('movies', function (Blueprint $table) {

                $table->dropColumn('cast');
                $table->unsignedBigInteger('genere_id')->nullable()->after('id');
                $table->foreign('genere_id')->references('id')->on('generes')->OnDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {

                $table->text('cast');
                $table->dropForeign('movies_genere_id_foreign');
                $table->dropColumn('genere_id');
        });
    }
};
