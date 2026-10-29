<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Model User mewakili pengguna di platform Mythoria.
 * Sesuai konsep Wattpad, setiap user dapat bertindak sebagai Pembaca sekaligus Penulis.
 *
 * Di Laravel 13, kita bisa menggunakan PHP 8 Attribute seperti #[Fillable] dan #[Hidden]
 * yang membuat deklarasi model jauh lebih bersih dan modern dibanding Laravel 10.
 */
#[Fillable([
    'name',      // Nama lengkap / nama pena
    'username',  // Username unik (@username) untuk URL profil
    'email',     // Alamat email aktif
    'avatar',    // Path foto profil
    'bio',       // Deskripsi / biodata penulis & pembaca
    'role',      // Peran akun ('member' atau 'admin')
    'password',  // Password terenkripsi
])]
#[Hidden([
    'password',
    'remember_token',
])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Di Laravel 13, mutasi tipe data (casting) didefinisikan menggunakan method casts(): array
     * bukan lagi berupa property protected $casts = [] seperti di Laravel 10.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Mengubah string tanggal email_verified_at menjadi instance Carbon (DateTime)
            'email_verified_at' => 'datetime',
            // Otomatis meng-hash password saat disimpan dan memverifikasi saat login
            'password' => 'hashed',
        ];
    }

    /**
     * Helper method untuk memeriksa apakah pengguna berstatus admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
