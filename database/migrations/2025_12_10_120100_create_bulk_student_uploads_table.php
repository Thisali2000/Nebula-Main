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
        if (! Schema::hasTable('bulk_student_uploads')) {
            Schema::create('bulk_student_uploads', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('year')->index();
                $table->string('location')->nullable()->index();
                // course can be id or name
                $table->string('course')->nullable()->index();
                $table->integer('student_count')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulk_student_uploads');
    }
};
