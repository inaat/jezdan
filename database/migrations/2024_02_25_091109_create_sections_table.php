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
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('partners_section_status')->default(1);
            $table->unsignedTinyInteger('call_to_action_section_status')->default(1);
            $table->unsignedTinyInteger('featured_courses_section_status')->default(1);
            $table->unsignedTinyInteger('features_section_status')->default(1);
            $table->unsignedTinyInteger('video_section_status')->default(1);
            $table->unsignedTinyInteger('work_process_status')->default(1);
            $table->unsignedTinyInteger('testimonials_section_status')->default(1);
            $table->unsignedTinyInteger('newsletter_section_status')->default(1);
            $table->unsignedTinyInteger('featured_instructors_section_status')->default(1);
            $table->unsignedTinyInteger('about_us_section_status')->default(1);
            $table->unsignedTinyInteger('latest_blog_section_status')->default(1);
            $table->unsignedTinyInteger('footer_section_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
