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
        // database/migrations/xxxx_xx_xx_create_kaspi_products_table.php

        Schema::create('kaspi_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_url')->unique();
            $table->unsignedBigInteger('author_price');
            $table->timestamp('last_checked_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaspi_products');
    }
};
