<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan halaman formulir registrasi.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Menangani proses pendaftaran akun baru.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input formulir
        // alpha_dash memastikan username hanya boleh berisi huruf, angka, tanda hubung (-), dan underscore (_)
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'alpha_dash', 'min:3', 'max:30', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Simpan user baru ke database
        // username diubah menjadi huruf kecil (lowercase) agar seragam
        $user = User::create([
            'name' => $request->name,
            'username' => strtolower($request->username),
            'email' => $request->email,
            'role' => 'member',
            'password' => Hash::make($request->password),
        ]);

        // 3. Memicu event bawaan Laravel bahwa user baru berhasil terdaftar
        event(new Registered($user));

        // 4. Langsung login-kan user setelah registrasi
        Auth::login($user);

        // 5. Arahkan ke halaman dashboard
        return redirect(route('dashboard', absolute: false));
    }
}
