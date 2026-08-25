<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('affiliated_institutions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('affiliation_application_id')
                ->nullable()
                ->unique()
                ->constrained('affiliation_applications')
                ->nullOnDelete();

            $table->string('affiliation_number')->unique();

            $table->string('institution_name');
            $table->string('institution_type')->nullable();

            $table->string('contact_person');
            $table->string('mobile', 20);
            $table->string('email')->nullable();

            $table->text('address');
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode', 10)->nullable();

            $table->string('registration_number')->nullable();
            $table->string('website')->nullable();

            $table->date('affiliated_on')->nullable();
            $table->date('valid_until')->nullable();

            $table->string('status')->default('active');

            $table->timestamps();

            $table->index(['status', 'affiliated_on']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('affiliated_institutions');
    }
};
