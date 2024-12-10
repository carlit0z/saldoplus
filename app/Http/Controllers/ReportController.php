<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Fungsi untuk membuat laporan transaksi dan mengunduh dalam format PDF
    public function generateTransactionReport($accountId)
    {
        $transactions = Transaction::where('account_id', $accountId)->get();

        if ($transactions->isEmpty()) {
            return response()->json(['message' => 'Tidak ada transaksi untuk akun ini'], 404);
        }

        // Buat PDF menggunakan dompdf
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.transactions', ['transactions' => $transactions]);

        // Download laporan PDF
        return $pdf->download('laporan_transaksi.pdf');
    }
}
