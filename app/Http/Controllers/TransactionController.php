<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Fungsi untuk menampilkan semua transaksi untuk sebuah akun bank
    public function index($accountId)
    {
        $transactions = Transaction::where('account_id', $accountId)->get();
        return response()->json($transactions);
    }

    // Fungsi untuk membuat transaksi baru
    public function store(Request $request, $accountId)
    {
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'string|max:255|nullable',
            'category' => 'string|max:100|nullable',
            'transaction_type' => 'required|in:debit,credit',
            'currency' => 'required|string|max:10',
        ]);

        $transaction = Transaction::create([
            'account_id' => $accountId,
            'transaction_date' => $validated['transaction_date'],
            'amount' => $validated['amount'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'transaction_type' => $validated['transaction_type'],
            'currency' => $validated['currency'],
        ]);

        return response()->json(['message' => 'Transaksi berhasil dibuat', 'data' => $transaction]);
    }

    // Fungsi untuk menampilkan detail transaksi
    public function show($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        return response()->json($transaction);
    }

    // Fungsi untuk memperbarui transaksi
    public function update(Request $request, $transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);

        $validated = $request->validate([
            'transaction_date' => 'date',
            'amount' => 'numeric',
            'description' => 'string|max:255|nullable',
            'category' => 'string|max:100|nullable',
            'transaction_type' => 'in:debit,credit',
            'currency' => 'string|max:10',
        ]);

        $transaction->update($validated);

        return response()->json(['message' => 'Transaksi berhasil diperbarui', 'data' => $transaction]);
    }

    // Fungsi untuk menghapus transaksi
    public function destroy($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        $transaction->delete();

        return response()->json(['message' => 'Transaksi berhasil dihapus']);
    }
}
