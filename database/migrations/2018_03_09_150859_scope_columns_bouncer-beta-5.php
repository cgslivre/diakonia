<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScopeColumnsBouncerBeta5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abilities', function(Blueprint $table)
        {
            $table->integer('scope');
        });
        Schema::table('roles', function(Blueprint $table)
        {
            $table->integer('scope');
        });
        Schema::table('assigned_roles', function(Blueprint $table)
        {
            $table->integer('scope');
        });
        Schema::table('permissions', function(Blueprint $table)
        {
            $table->integer('scope');
        });

        Schema::table('abilities', function(Blueprint $table)
        {
            $table->dropUnique('abilities_unique_index');

        });
        
        Schema::table('roles', function(Blueprint $table)
        {
            $table->dropUnique('roles_name_unique');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abilities', function (Blueprint $table) {
            $table->dropColumn('scope');
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('scope');
        });
        Schema::table('assigned_roles', function (Blueprint $table) {
            $table->dropColumn('scope');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('scope');
        });

        Schema::table('abilities', function(Blueprint $table)
        {
            $table->unique(
                ['name', 'entity_id', 'entity_type', 'only_owned'],
                'abilities_unique_index'
            );

        });
        
        Schema::table('roles', function(Blueprint $table)
        {
            $table->unique('name');

        });
    }
}
