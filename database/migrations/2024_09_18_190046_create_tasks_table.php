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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->enum("status", ["Waiting","Started","In Proccess","Pause","Finished"]);

            // ->references('id')->on('users')->cascadeOnDelete() , brisanje svih taskova koji pripadaju 
            // nekom useru kada obrisamo samog usera
            
            $table->foreignId("user_id")->references('id')->on('users')->cascadeOnDelete();


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
