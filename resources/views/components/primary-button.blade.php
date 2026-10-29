{{-- 
    Komponen Tombol Primer dengan Styling Pixel Art Minecraft 
    Menggunakan class .btn-pixel dan .btn-pixel-gold yang kita definisikan di app.css
--}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-pixel btn-pixel-gold tracking-widest uppercase text-xs transition duration-75']) }}>
    {{ $slot }}
</button>
