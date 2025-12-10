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
        if (! Schema::hasTable('bulk_revenue_uploads')) {
            Schema::create('bulk_revenue_uploads', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('year')->index();
                $table->integer('month')->nullable()->index();
                $table->integer('day')->nullable()->index();
                $table->string('location')->nullable()->index();
                // store course id or name depending on source; keep as string for flexibility
                $table->string('course')->nullable()->index();
                $table->decimal('revenue', 15, 2)->default(0);
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
        Schema::dropIfExists('bulk_revenue_uploads');
    }
};
