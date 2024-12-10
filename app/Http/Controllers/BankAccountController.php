<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    // Fungsi untuk menampilkan semua akun bank milik pengguna
    public function index($userId)
    {
        $accounts = BankAccount::where('user_id', $userId)->get();
        return response()->json($accounts);
    }

    // Fungsi untuk membuat akun bank baru
    public function store(Request $request, $userId)
    {
        $validated = $request->validate([
            'bank_name' => 'required|string|max:100',
            'account_number' => 'required|string|max:50',
            'balance' => 'required|numeric',
            'currency' => 'required|string|max:10',
        ]);

        $account = BankAccount::create([
            'user_id' => $userId,
            'bank_name' => $validated['bank_name'],
            'account_number' => $validated['account_number'],
            'balance' => $validated['balance'],
            'currency' => $validated['currency'],
        ]);

        return response()->json(['message' => 'Akun bank berhasil dibuat', 'data' => $account]);
    }

    // Fungsi untuk menampilkan detail akun bank
    public function show($accountId)
    {
        $account = BankAccount::findOrFail($accountId);
        return response()->json($account);
    }

    // Fungsi untuk memperbarui akun bank
    public function update(Request $request, $accountId)
    {
        $account = BankAccount::findOrFail($accountId);

        $validated = $request->validate([
            'bank_name' => 'string|max:100',
            'account_number' => 'string|max:50',
            'balance' => 'numeric',
            'currency' => 'string|max:10',
        ]);

        $account->update($validated);

        return response()->json(['message' => 'Akun bank berhasil diperbarui', 'data' => $account]);
    }

    // Fungsi untuk menghapus akun bank
    public function destroy($accountId)
    {
        $account = BankAccount::findOrFail($accountId);
        $account->delete();

        return response()->json(['message' => 'Akun bank berhasil dihapus']);
    }
}
