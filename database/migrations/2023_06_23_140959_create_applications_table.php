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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Pending', 'Accepted', 'Rejected'])->default('Pending'); // preporucen od strane
            $table->text('app_text');
            $table->string('char_name');
            $table->string('char_password');
            $table->integer('char_dob');
            $table->integer('char_sex')->default(1);
            $table->text('response_text')->nullable();
            $table->integer('account_id')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
