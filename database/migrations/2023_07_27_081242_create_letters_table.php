<?php

use App\Models\LetterType;
use App\Models\Unit;
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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->string('code')->comment('Nomer Surat');
            $table->string('code_agenda')->comment('Nomer Agenda');
            $table->enum('status', ['Surat Masuk', 'Surat Keluar'])->default('Surat Masuk');
            $table->date('date');
            $table->string('from');
            $table->string('regarding');
            $table->foreignIdFor(Unit::class)
                ->nullable()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignIdFor(LetterType::class)
                ->nullable()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
