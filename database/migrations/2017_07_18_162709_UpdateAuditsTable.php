<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(Config::get('audit.drivers.database.connection'))
            ->table(Config::get('audit.drivers.database.table'), function (Blueprint $table) {
                $table->timestamp('updated_at')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(Config::get('audit.drivers.database.connection'))
            ->table(Config::get('audit.drivers.database.table'), function (Blueprint $table) {
                $table->dropColumn('updated_at');
            });
    }
}
