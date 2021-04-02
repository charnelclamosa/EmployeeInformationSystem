<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_titles', function (Blueprint $table) {
            $table->id();
            $table->string('job_code', 5)->unique();
            $table->string('job_name', 50);
            $table->timestamps();
            $table->softDeletes();
            $table->string('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_titles');
    }
}
