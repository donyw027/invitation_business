<?php
/* MySimpleGift homepage. Public frontend only; no database changes. */
if (!function_exists('msg_home_asset')) {
    function msg_home_asset($basename)
    {
        foreach (array('jpg', 'jpeg', 'png', 'webp') as $extension) {
            $relative = 'assets/img/' . $basename . '.' . $extension;
            if (is_file(FCPATH . $relative)) {
                return base_url($relative);
            }
        }
        return '';
    }
}
$bouquets = array(
    array('image' => 'buket1', 'name' => 'Bouquet Collection 01'),
    array('image' => 'buket2', 'name' => 'Bouquet Collection 02'),
    array('image' => 'buket3', 'name' => 'Bouquet Collection 03'),
    array('image' => 'buket4', 'name' => 'Bouquet Collection 04'),
    array('image' => 'buket5', 'name' => 'Bouquet Collection 05'),
    array('image' => 'buket6', 'name' => 'Bouquet Collection 06'),
);
$waClean = preg_replace('/[^0-9]/', '', (string)($wa_number ?? ''));
$waGift = 'https://wa.me/' . $waClean . '?text=' . rawurlencode('Halo kak, aku mau tanya bouquet dan custom gift MySimpleGift.');
?>
<style>
/* Scoped to home: does not alter existing pages or invitation themes. */
.msg-home { overflow:hidden; }
.msg-home .msg-hero { padding:115px 0 76px; background:linear-gradient(120deg,#fff8ec 0%,#fff 54%,#f8ead2 100%); position:relative; }
.msg-home .msg-hero:before { content:"";position:absolute;width:380px;height:380px;right:-160px;top:-120px;background:#f7e7b7;border-radius:50%;opacity:.28;pointer-events:none; }
.msg-home .msg-eyebrow { display:inline-flex;align-items:center;gap:8px;font-size:12px;letter-spacing:.12em;font-weight:800;text-transform:uppercase;color:#8b5e34; }
.msg-home .msg-title { color:#3f2e24;font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(3.1rem,6vw,5.6rem);font-weight:700;line-height:1.02;letter-spacing:-.025em;margin:15px 0 22px; }
.msg-home .msg-title em { color:#8b5e34;font-weight:600; }
.msg-home .msg-lead { color:#6f5a48;max-width:570px;line-height:1.85;font-size:1.04rem; }
.msg-home .msg-btn-main { background:#8b5e34;color:#fff;border:1px solid #8b5e34;border-radius:999px;padding:13px 25px;font-weight:750;text-decoration:none;display:inline-flex;align-items:center;justify-content:center;transition:.2s; }
.msg-home .msg-btn-main:hover { background:#704724;color:#fff;transform:translateY(-2px); }
.msg-home .msg-btn-outline { color:#65442a;border:1px solid #bfa385;background:#fffaf2;border-radius:999px;padding:13px 25px;text-decoration:none;font-weight:750;display:inline-flex;justify-content:center;transition:.2s; }
.msg-home .msg-btn-outline:hover { background:#f7e7d0;color:#65442a; }
.msg-home .msg-hero-gallery { display:grid;grid-template-columns:1.1fr .9fr;grid-template-rows:195px 195px;gap:13px;max-width:500px;margin:auto; }
.msg-home .msg-hero-gallery .msg-hero-shot:first-child { grid-row:span 2; }
.msg-home .msg-hero-shot { border-radius:25px;overflow:hidden;background:linear-gradient(135deg,#f8ead2,#efe0c8);position:relative;border:7px solid #fff;box-shadow:0 17px 40px rgba(63,46,36,.09); }
.msg-home .msg-hero-shot img { width:100%;height:100%;object-fit:cover; }
.msg-home .msg-placeholder { width:100%;height:100%;display:flex;align-items:center;justify-content:center;text-align:center;color:#8b5e34;font-size:14px;font-weight:700;padding:20px; }
.msg-home .msg-section { padding:84px 0; }
.msg-home .msg-section-alt { background:linear-gradient(180deg,#fffaf2,#f8eadb); }
.msg-home .msg-heading { color:#3f2e24;font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(2.4rem,4.3vw,3.5rem);font-weight:700;line-height:1.05;margin:12px 0; }
.msg-home .msg-subtitle { color:#826c58;line-height:1.8; }
.msg-home .msg-photo-card { height:100%;overflow:hidden;background:#fff;border:1px solid rgba(63,46,36,.09);border-radius:23px;box-shadow:0 12px 32px rgba(63,46,36,.06);transition:transform .2s,box-shadow .2s; }
.msg-home .msg-photo-card:hover { transform:translateY(-5px);box-shadow:0 20px 44px rgba(63,46,36,.10); }
.msg-home .msg-photo-frame { aspect-ratio:4/4.3;background:linear-gradient(130deg,#f8ead2,#efe0c8);overflow:hidden; }
.msg-home .msg-photo-frame img { display:block;width:100%;height:100%;object-fit:cover;transition:transform .35s; }
.msg-home .msg-photo-card:hover img { transform:scale(1.035); }
.msg-home .msg-photo-label { padding:16px 18px;color:#3f2e24;font-weight:750;font-size:14px; }
.msg-home .msg-service-card { display:flex;flex-direction:column;height:100%;background:#fff;padding:30px;border:1px solid rgba(63,46,36,.1);border-radius:24px;box-shadow:0 12px 36px rgba(63,46,36,.05); }
.msg-home .msg-service-icon { width:51px;height:51px;border-radius:15px;display:grid;place-items:center;background:#f8ead2;font-size:25px;margin-bottom:20px; }
.msg-home .msg-service-card h3 { color:#3f2e24;font-size:21px;font-weight:800;margin-bottom:10px; }
.msg-home .msg-service-card p { color:#826c58;line-height:1.8;margin-bottom:22px; }
.msg-home .msg-text-link { display:inline-flex;align-items:center;gap:7px;color:#8b5e34;font-weight:800;text-decoration:none;margin-top:auto; }
.msg-home .msg-text-link:hover { color:#5d3d24;text-decoration:underline; }
.msg-home .msg-cta { background:linear-gradient(120deg,#3f2e24,#7f4f24);border-radius:27px;padding:48px 42px;color:#fff8ec; }
.msg-home .msg-cta h2 { font-family:'Cormorant Garamond',Georgia,serif;font-weight:700;font-size:clamp(2.3rem,4vw,3.3rem); }
.msg-home .msg-cta p { color:#f0ded0;line-height:1.75; }
.msg-home .msg-cta .msg-btn-outline { background:#fff8ec;color:#56391f;border-color:#fff8ec; }
@media(max-width:991.98px) { .msg-home .msg-hero { padding-top:90px; } .msg-home .msg-hero-gallery { margin-top:20px; } }
@media(max-width:575.98px) { .msg-home .msg-hero { padding:82px 0 54px; } .msg-home .msg-section { padding:58px 0; } .msg-home .msg-hero-gallery { grid-template-rows:150px 150px;gap:9px; } .msg-home .msg-hero-shot { border-width:4px;border-radius:19px; } .msg-home .msg-cta { padding:30px 23px; } .msg-home .msg-service-card { padding:24px; } .msg-home .msg-title { font-size:3.5rem; } }
</style>

<main class="msg-home">
    <section class="msg-hero">
        <div class="container position-relative">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="msg-eyebrow">✦ Made with love, gifted with joy</span>
                    <h1 class="msg-title">Hadiah kecil,<br><em>cerita yang spesial.</em></h1>
                    <p class="msg-lead">Dari bouquet, kado custom, hingga undangan digital dan greeting card, MySimpleGift bantu kamu merayakan momen berharga dengan cara yang lebih personal.</p>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="<?= site_url('mysimplegift'); ?>" class="msg-btn-main">Kenalan dengan MySimpleGift <span aria-hidden="true" class="ms-2">↗</span></a>
                        <a href="<?= html_escape($waGift); ?>" class="msg-btn-outline" target="_blank" rel="noopener noreferrer">Tanya Gift Yuk!</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="msg-hero-gallery" aria-label="Pilihan bouquet MySimpleGift">
                        <?php foreach (array('buket1','buket2','buket3') as $imageName): ?>
                            <?php $imageUrl = msg_home_asset($imageName); ?>
                            <div class="msg-hero-shot">
                                <?php if ($imageUrl !== ''): ?>
                                    <img src="<?= html_escape($imageUrl); ?>" alt="Bouquet MySimpleGift <?= html_escape($imageName); ?>" <?= $imageName !== 'buket1' ? 'loading="lazy"' : ''; ?>>
                                <?php else: ?>
                                    <div class="msg-placeholder">MySimpleGift Bouquet</div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="msg-section" id="bouquet-collection">
        <div class="container">
            <div class="row align-items-end g-3 mb-4 mb-lg-5">
                <div class="col-lg-8">
                    <span class="msg-eyebrow">Our gift gallery</span>
                    <h2 class="msg-heading">Pilihan buket buat momenmu.</h2>
                    <p class="msg-subtitle mb-0">Temukan inspirasi bouquet favoritmu. Warna, isi, dan detail hadiah bisa dikonsultasikan sesuai kebutuhan.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="msg-text-link" href="<?= site_url('mysimplegift'); ?>">Lihat layanan gift selengkapnya <span aria-hidden="true">↗</span></a>
                </div>
            </div>
            <div class="row g-3 g-lg-4">
                <?php foreach ($bouquets as $bouquet): ?>
                    <?php $imageUrl = msg_home_asset($bouquet['image']); ?>
                    <div class="col-6 col-lg-4">
                        <article class="msg-photo-card">
                            <div class="msg-photo-frame">
                                <?php if ($imageUrl !== ''): ?>
                                    <img src="<?= html_escape($imageUrl); ?>" loading="lazy" alt="<?= html_escape($bouquet['name']); ?>">
                                <?php else: ?>
                                    <div class="msg-placeholder">Foto <?= html_escape($bouquet['image']); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="msg-photo-label"><?= html_escape($bouquet['name']); ?></div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-4 mt-lg-5"><a class="msg-btn-main" href="<?= html_escape($waGift); ?>" target="_blank" rel="noopener noreferrer">Request Bouquet Favoritmu</a></div>
        </div>
    </section>

    <section class="msg-section msg-section-alt" id="undangan-digital">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="msg-eyebrow">MySimpleGift Digital</span>
                    <h2 class="msg-heading">Undangan digital, cara manis berbagi kabar bahagia.</h2>
                    <p class="msg-subtitle">Bukan cuma bouquet dan kado, MySimpleGift juga menyediakan undangan digital dan greeting card yang personal, rapi, dan mudah dibagikan ke orang tersayang.</p>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <span class="pill">Undangan digital</span>
                        <span class="pill">Greeting card</span>
                        <span class="pill">Mobile friendly</span>
                    </div>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="<?= site_url('review'); ?>#template-preview" class="msg-btn-main">Lihat Template Undangan <span aria-hidden="true" class="ms-2">↗</span></a>
                        <a href="https://wa.me/<?= html_escape($waClean); ?>?text=<?= rawurlencode('Halo kak, aku mau tanya undangan digital MySimpleGift.'); ?>" target="_blank" rel="noopener noreferrer" class="msg-btn-outline">Tanya Undangan Yuk!</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <article class="msg-service-card text-center align-items-center">
                                <div class="msg-service-icon" aria-hidden="true">💌</div>
                                <h3>Undangan Digital</h3>
                                <p class="mb-0">Untuk berbagi detail acara dengan praktis dan tetap berkesan.</p>
                            </article>
                        </div>
                        <div class="col-6">
                            <article class="msg-service-card text-center align-items-center">
                                <div class="msg-service-icon" aria-hidden="true">💝</div>
                                <h3>Greeting Card</h3>
                                <p class="mb-0">Ucapan personal untuk merayakan berbagai momen spesial.</p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="msg-section" id="layanan-lainnya">
        <div class="container">
            <div class="text-center mb-5">
                <span class="msg-eyebrow">More things we do</span>
                <h2 class="msg-heading">Nggak cuma soal kado, lho!</h2>
                <p class="msg-subtitle mx-auto mb-0" style="max-width:690px">Ada juga layanan titip belanja, spreadsheet praktis, sampai pembuatan website untuk bantu kebutuhanmu.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <article class="msg-service-card">
                        <div class="msg-service-icon" aria-hidden="true">🛍️</div>
                        <h3>Jastip Indah Aja</h3>
                        <p>Mau titip makanan, dessert, oleh-oleh, atau barang incaran? Kirim wishlist kamu, nanti kita bantu cek dan proses sesuai jadwal.</p>
                        <a class="msg-text-link" href="<?= site_url('jastipindahaja'); ?>">Yuk, lihat Jastip <span aria-hidden="true">↗</span></a>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="msg-service-card">
                        <div class="msg-service-icon" aria-hidden="true">📊</div>
                        <h3>Spreadsheet & Template</h3>
                        <p>Catatan order, keuangan, dan dashboard sederhana biar urusan bisnis atau aktivitas harian makin tertata.</p>
                        <a class="msg-text-link" href="<?= site_url('spreadsheet'); ?>">Lihat Spreadsheet <span aria-hidden="true">↗</span></a>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="msg-service-card">
                        <div class="msg-service-icon" aria-hidden="true">💻</div>
                        <h3>Jasa Website & Sistem</h3>
                        <p>Butuh website company profile atau sistem berbasis web? Yuk, diskusikan kebutuhan bisnismu bersama kami.</p>
                        <a class="msg-text-link" href="<?= site_url('web-development'); ?>">Lihat Layanan Website <span aria-hidden="true">↗</span></a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="msg-section">
        <div class="container">
            <div class="msg-cta d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
                <div>
                    <span class="msg-eyebrow" style="color:#f7e7b7">Let's make it special</span>
                    <h2 class="mt-2 mb-2">Ada yang mau kamu request?</h2>
                    <p class="mb-0">Ceritain kebutuhanmu, dari gift kecil sampai layanan digital. Kami bantu arahkan ke layanan yang cocok.</p>
                </div>
                <a href="<?= site_url('kontak'); ?>" class="msg-btn-outline flex-shrink-0">Yuk, Hubungi Kami <span aria-hidden="true" class="ms-2">↗</span></a>
            </div>
        </div>
    </section>
</main>
