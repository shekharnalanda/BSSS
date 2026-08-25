<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('affiliation_applications', function (Blueprint $table) {
            $table->id();

            $table->string('institution_name');
            $table->string('institution_type')->nullable();

            $table->string('contact_person');
            $table->string('mobile', 20);
            $table->string('email')->nullable();

            $table->text('address');
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode', 10)->nullable();

            $table->string('establishment_year')->nullable();
            $table->string('registration_number')->nullable();

            $table->string('website')->nullable();

            $table->text('courses_or_activities')->nullable();
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
        Schema::dropIfExists('affiliation_applications');
    }
};
