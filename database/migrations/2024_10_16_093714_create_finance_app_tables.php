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
        // Tabel BankAccounts
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('bank_name');
            $table->string('account_number');
            $table->decimal('balance', 15, 2);
            $table->string('currency', 10);
            $table->timestamps();
        });

        // Tabel Transactions
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('bank_accounts')->onDelete('cascade');
            $table->timestamp('transaction_date');
            $table->decimal('amount', 15, 2);
            $table->text('description')->nullable();
            $table->string('category')->nullable();
            $table->enum('transaction_type', ['debit', 'credit']);
            $table->string('currency', 10);
            $table->timestamps();
        });

        // Tabel ExchangeRates
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->string('base_currency', 10);
            $table->string('target_currency', 10);
            $table->decimal('exchange_rate', 15, 6);
            $table->timestamp('retrieved_at')->useCurrent();
            $table->timestamps();
        });

        // Tabel Budgets
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('category');
            $table->decimal('amount', 15, 2);
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->timestamps();
        });

        // Tabel Notifications
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('message');
            $table->boolean('read_status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('budgets');
        Schema::dropIfExists('exchange_rates');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('bank_accounts');
        Schema::dropIfExists('users');
    }
};
