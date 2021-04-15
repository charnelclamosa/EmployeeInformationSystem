<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code', 5)->unique();
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->date('birth_date');
            $table->string('address');
            $table->string('contact_no');
            $table->integer('job_title_code');
            $table->integer('contract_status');
            $table->integer('department_code');
            $table->integer('section_code');
            $table->integer('team_code');
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
        Schema::dropIfExists('employees');
    }
}
