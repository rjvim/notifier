<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePlaceholdersFromNotifierJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifier_jobs', function (Blueprint $table) {

            $table->dropColumn('placeholders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifier_jobs', function (Blueprint $table) {
            $table->jsonb('placeholders');
        });
    }
}
