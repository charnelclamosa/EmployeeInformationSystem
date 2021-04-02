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
            $table->string('job_title_code', 5);
            $table->string('contract_status', 3);
            $table->string('department_code', 5);
            $table->string('section_code', 5);
            $table->string('team_code', 5);
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
