# CI3 Invitation Business V3 Dynamic Master

Starter project untuk jasa undangan digital + greeting card berbasis CodeIgniter 3.

## Fokus V3
- Frontend **paket harga** baca dari backend
- Frontend **template** baca dari backend
- Master **product types**
- Master **packages**
- Master **templates**
- Master **settings** (brand name + WA number)
- Tetap ada order, project, guests, RSVP, wishes

## Login default
- URL: `/admin/login`
- Username: `admin`
- Password: `admin123`

## Cara pakai
1. Siapkan instalasi CodeIgniter 3 kosong.
2. Copy isi zip ini ke root project CI3 Anda.
3. Buat database baru, misalnya `ci3_invitation_business_v3`.
4. Import file `database/ci3_invitation_business_v3.sql`.
5. Edit `application/config/database.php`.
6. Edit `application/config/config.php` pada `base_url`.
7. Pastikan folder `uploads/` bisa ditulis.
8. Buka `/admin/login`.

## Catatan
Paket ini tetap berupa **overlay/starter app** untuk dipasang di instalasi CI3 Anda yang sudah punya folder `system` dan file `index.php`.
