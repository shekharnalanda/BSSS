<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('membership_application_id')
                ->nullable()
                ->unique()
                ->constrained('membership_applications')
                ->nullOnDelete();

            $table->foreignId('membership_type_id')
                ->nullable()
                ->constrained('membership_types')
                ->nullOnDelete();

            $table->string('membership_number')->unique();

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

            $table->string('photo')->nullable();

            $table->date('joined_on')->nullable();
            $table->date('valid_until')->nullable();

            $table->string('status')->default('active');

            $table->timestamps();

            $table->index(['status', 'joined_on']);
            $table->index('mobile');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
