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
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();
        $table->string('meeting_title');
        $table->date('meeting_date'); // Use date type for date
        $table->time('meeting_time'); // Use time type for time
        $table->string('meeting_id');
        $table->unsignedBigInteger('institute_id'); // Change this to match your form input
        $table->text('additional_notes')->nullable(); // Make additional_notes nullable
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
