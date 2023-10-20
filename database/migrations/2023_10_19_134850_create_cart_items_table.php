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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->foreignId('menu_id')->constrained(
                'menus', 'id', 'post_menu_id'
            )->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreignId('cart_id')->constrained(
                'carts', 'id', 'post_cart_id'
            )->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
