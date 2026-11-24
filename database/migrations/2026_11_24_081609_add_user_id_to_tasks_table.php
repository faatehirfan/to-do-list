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
            $table->foreignId('user_id') //create new column to hold user id
                ->after('id') //put this colum right after id column(just for clean structure)
                ->constrained() //auto link to id on user table as FK(becuase we set the col name as user_id).
                ->cascadeOnDelete(); //if user deleted, all tasks will deleted too.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //boleh roll back.
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};