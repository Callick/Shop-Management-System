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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('phone')->after('email');
            $table->enum('user_role', ['admin', 'assistant'])->default('admin')->after('phone');
            $table->foreignId('shop_id')->after('user_role')->nullable()->constrained('shops', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // drop the foreign key first
            $table->dropForeign(['shop_id']);
            
            // then drop the columns
            $table->dropColumn(['phone', 'user_role', 'shop_id']);
        });
    }
};
