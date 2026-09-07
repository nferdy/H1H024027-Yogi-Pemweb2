Nama : Yogi Ferdiansyah Amta Miluloh
NIM  : H1H024027
Shift: C
KRS  : C

**Jawaban Pertanyaan Pembahasan Praktikum Modul 1**

**1. Mengapa folder vendor pada Laravel dan berkas binary Go tidak diikutsertakan dalam repositori Git?**
* **Folder `vendor` (Laravel):** Berisi seluruh *library* pihak ketiga yang ukurannya sangat besar. Folder ini tidak perlu dilacak Git karena dapat digenerasi ulang secara otomatis kapan saja melalui perintah instalasi yang merujuk pada `composer.json`.
* **Berkas *binary* Go:** Merupakan hasil akhir dari kompilasi program yang berjalan spesifik untuk arsitektur sistem operasi tertentu. Dalam pengelolaan versi, cukup kode sumbernya saja yang dilacak untuk menjaga efisiensi ruang repositori.



**2. Apa fungsi berkas composer.json dan go.mod, serta apa persamaan keduanya?**
* **Fungsi `composer.json`:** Berfungsi mengelola daftar dependensi (paket atau *library*) pada ekosistem pengembangan PHP.
* **Fungsi `go.mod`:** Berfungsi mengelola daftar dependensi (*module*) pada ekosistem pengembangan Go.
* **Persamaan:** Keduanya sama-sama bertugas sebagai *package manager* yang merekam daftar lengkap pustaka eksternal beserta versi spesifik yang digunakan. Hal ini memastikan aplikasi tetap dapat berjalan konsisten meski dipindahkan ke lingkungan atau perangkat yang berbeda.



**3. Jelaskan perbedaan port 8000 pada Laravel dan port 3000 pada Fiber dalam konteks praktikum ini.**
* **Port 8000 (Laravel):** Merupakan jalur akses standar (*default*) yang digunakan oleh *development server* bawaan PHP saat dieksekusi melalui perintah `php artisan serve`.
* **Port 3000 (Fiber):** Merupakan jalur akses yang secara eksplisit ditetapkan melalui kode pada fungsi `app.Listen(":3000")`.
* **Konteks Praktikum:** Penggunaan angka port yang berbeda ini bertujuan agar layanan Laravel dan layanan Fiber dapat dijalankan secara bersamaan pada mesin komputer yang sama tanpa saling memicu bentrokan (*conflict*) jaringan.
