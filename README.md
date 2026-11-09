# GameVault 🎮

GameVault adalah website katalog dan koleksi game pribadi.

Website ini memungkinkan pengguna untuk melihat koleksi game, mengetahui informasi permainan, memantau aktivitas bermain, serta menampilkan game favorit dalam satu platform. GameVault mengusung desain **dark modern dengan sentuhan pixel art**, dengan inspirasi tampilan dari platform Steam dan Epic Games Store.

## Tampilan Website

### 1. Login
Halaman Login merupakan halaman awal untuk masuk ke GameVault menggunakan username.

<img width="1365" height="991" alt="127 0 0 1_8000_" src="https://github.com/user-attachments/assets/e2c91620-d649-40a8-9c54-fd1d48a340d4" />

### 2. Dashboard
Dashboard menampilkan informasi koleksi game dan game yang terakhir kali dimainkan.

<img width="1350" height="1742" alt="127 0 0 1_8000_dashboard_username=GOXIC" src="https://github.com/user-attachments/assets/4c7d587d-4901-4116-857d-cba102b3650d" />

### 3. Game Library
Game Library menampilkan seluruh koleksi game yang dimiliki pengguna, dilengkapi informasi genre, platform, status permainan, dan total jam bermain. Tersedia juga fitur pencarian dan filter berdasarkan status game.

<img width="1350" height="2330" alt="127 0 0 1_8000_pengelolaan_username=GOXIC" src="https://github.com/user-attachments/assets/768d6ef5-5377-4a9f-8ff3-a0262bc43271" />

### 4. Profile
Halaman Profile menampilkan identitas pengguna, statistik koleksi game, total jam bermain, jumlah game favorit, serta daftar game favorit dengan tampilan khusus.

<img width="1350" height="2000" alt="127 0 0 1_8000_profile_username=GOXIC" src="https://github.com/user-attachments/assets/6b9ae2e9-bc15-4961-8bfe-2f58711a4b1e" />

## Fitur Website

- **Login:** pengguna dapat masuk menggunakan username. Username diteruskan melalui Request Parameter untuk digunakan pada halaman lainnya.
- **Dashboard:** menampilkan ringkasan koleksi game dan tiga game yang terakhir dimainkan berdasarkan tanggal terakhir bermain.
- **Game Library:** menampilkan seluruh koleksi game beserta genre, platform, status, dan total jam bermain.
- **Search Game:** mencari game berdasarkan judul maupun genre.
- **Filter Status:** menyaring koleksi berdasarkan status Playing, Completed, On Hold, dan status lainnya.
- **Profile:** menampilkan informasi pengguna, total game, total jam bermain, dan jumlah game favorit.
- **Favorite Games:** menampilkan game favorit dengan satu game unggulan dan daftar game favorit lainnya.
- **Navigasi:** menyediakan navigasi antarhalaman Login, Dashboard, Game Library, dan Profile.

## Teknologi yang Digunakan

- **PHP:** bahasa pemrograman utama.
- **Laravel:** framework pengembangan website.
- **Blade Template:** digunakan untuk menyusun tampilan halaman dan menghubungkan data dari Controller ke View.
- **HTML:** menyusun struktur halaman website.
- **CSS:** mengatur desain, tata letak, animasi sederhana, dan tampilan responsif.
- **JavaScript:** mendukung interaksi seperti pencarian dan filter game.

## Konsep dan Desain

GameVault menggunakan konsep dark modern dengan elemen visual pixel art untuk memberikan nuansa gaming yang lebih kuat.

Beberapa elemen desain yang digunakan antara lain:

- Dark theme dengan kombinasi warna gelap dan aksen neon.
- Font bergaya pixel untuk memperkuat identitas gaming.
- Background dekoratif berupa pecahan pixel.
- Artwork game sebagai elemen visual utama.
- Layout yang terinspirasi dari platform distribusi game digital.

## Penyimpanan Data

GameVault menggunakan data simulasi yang disimpan dalam array PHP pada Controller.

Website ini belum menggunakan database seperti MySQL atau PostgreSQL. Data koleksi game, status permainan, jumlah jam bermain, dan game favorit dikelola melalui data yang telah ditentukan dalam kode program.

Fitur pencarian dan filter dijalankan menggunakan JavaScript pada sisi client.

## Cara Menjalankan Project

1. Pastikan PHP dan Composer sudah terpasang.
2. Buka terminal pada direktori project.
3. Instal dependency Laravel:

   ```bash
   composer install
   ```

4. Salin file `.env.example` menjadi `.env` jika file `.env` belum tersedia.
5. Generate application key:

   ```bash
   php artisan key:generate
   ```

6. Jalankan server Laravel:

   ```bash
   php artisan serve
   ```

7. Buka browser dan akses:

   ```text
   http://127.0.0.1:8000
   ```

8. Masukkan username pada halaman Login untuk mulai menggunakan GameVault.

**Catatan:** Project ini menggunakan data simulasi dan tidak memerlukan konfigurasi database untuk menjalankan fitur-fitur yang tersedia.

## Struktur Utama Project

```text
app/
└── Http/
    └── Controllers/
        └── PageController.php

public/
└── images/
    ├── backgrounds/
    ├── games/
    └── profile/

resources/
└── views/
    ├── layouts/
    │   └── app.blade.php
    ├── login.blade.php
    ├── dashboard.blade.php
    ├── pengelolaan.blade.php
    └── profile.blade.php

routes/
└── web.php
```

## Referensi

- [Laravel Documentation](https://laravel.com/docs)
- [Steam](https://store.steampowered.com/)
- [Epic Games Store](https://store.epicgames.com/)

Steam dan Epic Games Store digunakan sebagai referensi konsep dan inspirasi desain untuk pengembangan GameVault.
