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
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('attachment')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id') ->on('users') ->onDelete('cascade'); // Define a a��o de exclus�o em cascata (opcional)
            $table->enum('status', ['Aberto', 'Em atendimento', 'Finalizado'])->default('Aberto');
            $table->timestamps();
        });
           
        
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
