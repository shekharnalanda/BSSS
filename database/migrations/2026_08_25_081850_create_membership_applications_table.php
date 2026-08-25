<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('membership_applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('membership_type_id')
                ->nullable()
                ->constrained('membership_types')
                ->nullOnDelete();

            $table->string('name');
            $table->string('mobile', 20);
            $table->string('email')->nullable();

            $table->string('father_or_spouse_name')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->string('occupation')->nullable();
            $table->string('institution_name')->nullable();

            $table->text('address')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode', 10)->nullable();

            $table->text('message')->nullable();

            $table->string('status')->default('pending');
            $table->text('admin_note')->nullable();

            $table->timestamps();

            $table->index(['status', 'created_at']);
            $table->index('mobile');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membership_applications');
    }
};
