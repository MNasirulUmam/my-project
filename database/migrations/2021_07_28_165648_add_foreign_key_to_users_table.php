<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('users', function (Blueprint $table) {
            // $table->unsignedBigInteger('departement_id')->after('email');
            // $table->unsignedBigInteger('company_id')->after('role');
            // $table->foreign('company_id')
            //     ->on('companies')
            //     ->references('id');
            // $table->foreign('departement_id')
            //     ->on('departements')
            //     ->references('id');
            $table->unsignedBigInteger('company_id')->after('role');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreignId('departement_id')->after('company_id')->constrained();
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
            $table->dropColumn(['company_id', 'departement_id']);
        });
    }
}
