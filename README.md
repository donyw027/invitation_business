# CI3 Invitation Business Starter

Starter project untuk **jasa undangan digital + greeting card** berbasis **CodeIgniter 3**.

## Cocok untuk flow bisnis ini
Customer chat/WA Anda -> Anda input order -> Anda edit project -> Anda publish -> Anda kirim link ke customer.

## Isi starter pack
- Admin login
- Dashboard ringkas
- CRUD customer & order
- CRUD project
- 3 template public:
  - romantic
  - floral
  - greeting
- Publish / draft status
- RSVP & ucapan untuk wedding
- Greeting card flow sederhana
- SQL import + data sample
- Guest manager per project
- Import tamu CSV / XLSX sederhana
- Personal guest link
- Tombol Share WhatsApp per tamu
- Tracking opened_at ketika link personal dibuka

## Login default
- URL: `/admin/login`
- Username: `admin`
- Password: `admin123`

## Cara pakai
1. Siapkan **CodeIgniter 3.1.13** kosong.
2. Copy isi zip ini ke root project CI3 Anda.
3. Buat database baru, misalnya `ci3_invitation_business`.
4. Import file `database/ci3_invitation_business.sql`.
5. Edit `application/config/database.php`.
6. Edit `application/config/config.php` pada `base_url`.
7. Pastikan folder `uploads/` bisa ditulis.
8. Buka `/admin/login`.

## Catatan penting
Starter ini sengaja dibuat untuk **internal admin workflow**, bukan self-service customer.
Jadi customer tidak perlu login.

## Rekomendasi environment
- PHP 7.4 / 8.0 / 8.1
- MySQL / MariaDB
- mod_rewrite aktif jika ingin URL lebih rapi

## Struktur flow
1. Buat customer
2. Buat order
3. Buat / edit project
4. Pilih template
5. Publish
6. Kirim link ke customer
7. Tamu buka link dan isi RSVP / ucapan (untuk wedding)

## Folder yang perlu Anda punya dari CI3 asli
Zip ini fokus pada **application + assets + starter files**.  
Gunakan bersama instalasi **CodeIgniter 3.1.13** standar agar benar-benar plug and play.



## Fitur versi 2
- Kelola tamu per project dari menu **Guests**
- Import file **CSV** atau **XLSX sederhana** (sheet pertama)
- Download template import CSV
- Generate link personal: `/i/project-slug/guest-slug`
- Tombol Share WA otomatis bila nomor terisi
- Status `Sudah dibuka` ketika tamu membuka link personal
