<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
           // $table->integer('is_complete')->default(0)->after('description'); //0 uncomplete 1 complete
            //$table->unsignedBigIntegr('user_id')->after('is_complete');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
            $table->integer('is_complete')->default(0)->after('description'); // 0: incomplete, 1: complete
            $table->unsignedBigInteger('user_id')->after('is_complete'); // Corrected method name
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
            $table->dropForeign(['user_id']); // Drop foreign key first
            $table->dropColumn('user_id'); // Then drop the column
            $table->dropColumn('is_complete'); // Drop the is_complete column if needed
                });
    }
};
