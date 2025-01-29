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
        Schema::create('ad_tags', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('ad_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

// -- Create pivot table `ad_tags`
// CREATE TABLE ad_tags (
//     id BIGINT AUTO_INCREMENT PRIMARY KEY,
//     ad_id BIGINT NOT NULL,
//     tag_id BIGINT NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     FOREIGN KEY (ad_id) REFERENCES ads(id) ON DELETE CASCADE,
//     FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
// );
