<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('title', 10);    //คำนำหน้า
            $table->string('first_name'); //ชื่อ
            $table->string('last_name'); //สกุ
            $table->date('birth_date');   // วันเกิด 
            $table->string('profile_image')->nullable();  // รูป
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
