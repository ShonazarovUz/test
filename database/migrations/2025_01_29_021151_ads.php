<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('ads')) {
            Schema::create('ads', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->string('title');
                $table->string('description');
                $table->decimal('price', 10, 2);
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
                $table->foreignId('region_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            });
        }
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

// -- Create `ads` table
// CREATE TABLE ads (
//     id BIGINT AUTO_INCREMENT PRIMARY KEY,
//     user_id BIGINT NOT NULL,
//     title VARCHAR(255) NOT NULL,
//     description TEXT NOT NULL,
//     price DECIMAL(10,2) NOT NULL,
//     category_id BIGINT NOT NULL,
//     region_id BIGINT NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
//     FOREIGN KEY (category_id) REFERENCES categories(id),
//     FOREIGN KEY (region_id) REFERENCES regions(id)
// );
