<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthController extends Controller
{
    // Fungsi untuk mengirim kode 2FA melalui email atau SMS
    public function send2FACode()
    {
        $user = Auth::user();

        // Generate kode 2FA dan kirim ke email atau SMS pengguna
        $code = rand(100000, 999999);
        // Misalnya: Mengirim kode melalui email
        // Mail::to($user->email)->send(new TwoFactorCodeMail($code));

        // Simpan kode 2FA di sesi atau database
        session(['2fa_code' => $code]);

        return response()->json(['message' => 'Kode 2FA telah dikirim']);
    }

    // Fungsi untuk memverifikasi kode 2FA
    public function verify2FACode(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric',
        ]);

        // Cek apakah kode cocok dengan yang disimpan di sesi
        if (session('2fa_code') == $request->input('code')) {
            // Jika kode cocok, lanjutkan akses
            session()->forget('2fa_code'); // Hapus kode dari sesi setelah berhasil
            return response()->json(['message' => 'Verifikasi 2FA berhasil']);
        }

        return response()->json(['message' => 'Kode 2FA salah'], 401);
    }
}
