<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    // Fungsi untuk menampilkan semua anggaran pengguna
    public function index($userId)
    {
        $budgets = Budget::where('user_id', $userId)->get();
        return response()->json($budgets);
    }

    // Fungsi untuk membuat atau memperbarui anggaran
    public function store(Request $request, $userId)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:100',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $budget = Budget::updateOrCreate(
            ['user_id' => $userId, 'category' => $validated['category']],
            [
                'amount' => $validated['amount'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
            ]
        );

        return response()->json(['message' => 'Anggaran berhasil disimpan', 'data' => $budget]);
    }

    // Fungsi untuk menampilkan detail anggaran
    public function show($budgetId)
    {
        $budget = Budget::findOrFail($budgetId);
        return response()->json($budget);
    }

    // Fungsi untuk memperbarui anggaran
    public function update(Request $request, $budgetId)
    {
        $budget = Budget::findOrFail($budgetId);

        $validated = $request->validate([
            'category' => 'string|max:100',
            'amount' => 'numeric',
            'start_date' => 'date',
            'end_date' => 'date',
        ]);

        $budget->update($validated);

        return response()->json(['message' => 'Anggaran berhasil diperbarui', 'data' => $budget]);
    }

    // Fungsi untuk menghapus anggaran
    public function destroy($budgetId)
    {
        $budget = Budget::findOrFail($budgetId);
        $budget->delete();

        return response()->json(['message' => 'Anggaran berhasil dihapus']);
    }
}
