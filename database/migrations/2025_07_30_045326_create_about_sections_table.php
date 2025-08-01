<?php

// database/migrations/xxxx_xx_xx_create_about_sections_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('main_title')->nullable();
            $table->text('description')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('experience_years')->default(0);
            $table->integer('destinations')->default(0);
            $table->integer('pilgrims_served')->default(0);
            $table->text('bottom_description')->nullable();
            $table->timestamps();
            $table->softDeletes(); // 👈 Soft delete column
        });
    }

    public function down(): void {
        Schema::dropIfExists('about_sections');
    }
};

