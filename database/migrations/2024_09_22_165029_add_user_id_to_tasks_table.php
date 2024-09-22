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
        Schema::table('tasks', function (Blueprint $table) {
            //
        
        // Add user_id column with foreign key constraint
        $table->unsignedBigInteger('user_id')->nullable(); // Change to not nullable if required
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
        });
    }
};
