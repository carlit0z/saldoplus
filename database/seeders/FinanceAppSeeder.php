<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FinanceAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'john_doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password1'),
                'access_token' => 'access_token1',
                'refresh_token' => 'refresh_token1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'jane_doe',
                'email' => 'jane@example.com',
                'password' => bcrypt('password2'),
                'access_token' => 'access_token2',
                'refresh_token' => 'refresh_token2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'alex_smith',
                'email' => 'alex@example.com',
                'password' => bcrypt('password3'),
                'access_token' => 'access_token3',
                'refresh_token' => 'refresh_token3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Data BankAccounts
        DB::table('bank_accounts')->insert([
            [
                'user_id' => 1,
                'bank_name' => 'Bank A',
                'account_number' => '1234567890',
                'balance' => 5000.00,
                'currency' => 'USD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'bank_name' => 'Bank B',
                'account_number' => '0987654321',
                'balance' => 3000.50,
                'currency' => 'EUR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'bank_name' => 'Bank C',
                'account_number' => '1112223334',
                'balance' => 7000.75,
                'currency' => 'IDR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Data Transactions
        DB::table('transactions')->insert([
            [
                'account_id' => 1,
                'transaction_date' => Carbon::parse('2024-10-10 10:00:00'),
                'amount' => 250.00,
                'description' => 'Pembayaran listrik',
                'category' => 'Utilities',
                'transaction_type' => 'debit',
                'currency' => 'USD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'account_id' => 2,
                'transaction_date' => Carbon::parse('2024-10-11 15:30:00'),
                'amount' => 100.00,
                'description' => 'Belanja online',
                'category' => 'Shopping',
                'transaction_type' => 'debit',
                'currency' => 'EUR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'account_id' => 3,
                'transaction_date' => Carbon::parse('2024-10-12 12:00:00'),
                'amount' => 500.00,
                'description' => 'Gaji',
                'category' => 'Income',
                'transaction_type' => 'credit',
                'currency' => 'IDR',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Data ExchangeRates
        DB::table('exchange_rates')->insert([
            [
                'base_currency' => 'USD',
                'target_currency' => 'IDR',
                'exchange_rate' => 15000.00,
                'retrieved_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'base_currency' => 'EUR',
                'target_currency' => 'USD',
                'exchange_rate' => 1.12,
                'retrieved_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'base_currency' => 'USD',
                'target_currency' => 'EUR',
                'exchange_rate' => 0.89,
                'retrieved_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Data Budgets
        DB::table('budgets')->insert([
            [
                'user_id' => 1,
                'category' => 'Utilities',
                'amount' => 500.00,
                'start_date' => Carbon::parse('2024-10-01 00:00:00'),
                'end_date' => Carbon::parse('2024-10-31 23:59:59'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'category' => 'Shopping',
                'amount' => 1000.00,
                'start_date' => Carbon::parse('2024-10-01 00:00:00'),
                'end_date' => Carbon::parse('2024-10-31 23:59:59'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'category' => 'Income',
                'amount' => 3000.00,
                'start_date' => Carbon::parse('2024-10-01 00:00:00'),
                'end_date' => Carbon::parse('2024-10-31 23:59:59'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Data Notifications
        DB::table('notifications')->insert([
            [
                'user_id' => 1,
                'message' => 'Anggaran untuk Utilities hampir mencapai batas.',
                'read_status' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'message' => 'Anggaran untuk Shopping tersisa 200.000 IDR.',
                'read_status' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'message' => 'Transaksi kredit baru diterima.',
                'read_status' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
