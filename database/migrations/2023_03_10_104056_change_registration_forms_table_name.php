<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('registration_forms', 'conferences');
    }

    public function down(): void
    {
        Schema::rename('conferences', 'registration_forms');
    }
};
