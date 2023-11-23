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
        Schema::create('news', function (Blueprint $table) {
            $table->id('news_id');
            $table->string('cat_id');
            $table->string('subcat_id')->nullable;
            $table->string('user_id')->nullable;
            $table->string('news_title_en');
            $table->string('news_title_bn');
            $table->string('img');
            $table->text('news_details_en');
            $table->text('news_details_bn');
            $table->string('news_tags_en');
            $table->string('news_tags_bn');
            $table->string('breaking_news')->nullable;
            $table->string('first_section')->nullable;
            $table->string('first_section_thumbnail')->nullable;
            $table->string('big_thumbnail')->nullable;
            $table->string('second_section_thumbnail')->nullable;
            $table->string('status')->nullable;
            $table->string('post_date')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
