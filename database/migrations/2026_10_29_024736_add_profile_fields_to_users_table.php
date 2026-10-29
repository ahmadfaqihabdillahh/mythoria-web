<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Method up() dieksekusi saat kita menjalankan: php artisan migrate
     * Digunakan untuk menambah kolom atau tabel baru ke database.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // 1. Username unik: Digunakan untuk identitas publik & URL profil (contoh: /author/@zephyr)
            // diletakkan setelah kolom 'name' menggunakan ->after('name')
            $table->string('username')->unique()->after('name');

            // 2. Avatar: Menyimpan path lokasi foto profil yang diunggah pengguna (opsional / boleh null)
            $table->string('avatar')->nullable()->after('email');

            // 3. Bio: Teks singkat perkenalan tentang si penulis atau pembaca (opsional / boleh null)
            $table->text('bio')->nullable()->after('avatar');

            // 4. Role: Menentukan tingkatan akses pengguna (default: 'member', bisa juga 'admin')
            $table->string('role')->default('member')->after('bio');
        });
    }

    /**
     * Method down() dieksekusi saat kita membatalkan migrasi: php artisan migrate:rollback
     * Berfungsi mengembalikan struktur tabel ke kondisi sebelumnya dengan menghapus kolom yang tadi ditambahkan.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus seluruh kolom tambahan jika migrasi dibatalkan
            $table->dropColumn(['username', 'avatar', 'bio', 'role']);
        });
    }
};
