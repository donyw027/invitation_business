<?php
/**
 * Jastip Indah Aja — public brand page
 * Location: application/views/frontend/jastipindahaja.php
 * Compatible with Public_page::jastipindahaja() and existing shared header/footer.
 */
if (!function_exists('jia_image_url')) {
    function jia_image_url($name)
    {
        foreach (array('jpg', 'jpeg', 'png', 'webp') as $extension) {
            $relative = 'assets/img/' . $name . '.' . $extension;
            if (is_file(FCPATH . $relative)) {
                return base_url($relative);
            }
        }
        return '';
    }
}
$jiaPhone = preg_replace('/\D+/', '', (string) (isset($wa_number) ? $wa_number : ''));
$jiaChat = function ($message) use ($jiaPhone) {
    return 'https://wa.me/' . $jiaPhone . '?text=' . rawurlencode($message);
};
$jiaOrder = $jiaChat('Halo kak, aku mau titip barang lewat Jastip Indah Aja. Bisa dibantu cek?');
$jiaAsk = $jiaChat('Halo kak, aku mau tanya jadwal event, katalog, dan cara order Jastip Indah Aja.');
$jiaEvent = $jiaChat('Halo kak, aku mau tanya event atau open jastip yang sedang tersedia.');
$jiaRequest = $jiaChat('Halo kak, aku nemu promo atau barang incaran. Bisa bantu titip beli?');
$jiaUpdates = $jiaChat('Halo kak, aku mau ikut info katalog, grup WhatsApp, dan live shopping Jastip Indah Aja.');
$jiaGallery = array(
    array('name' => 'jastip2', 'title' => 'Temuan yang bikin happy', 'desc' => 'Lagi ngincer sesuatu? Kirim foto atau link-nya, yuk.'),
    array('name' => 'jastip3', 'title' => 'Bisa request, lho!', 'desc' => 'Titip barang favorit sesuai kebutuhan dan jadwal yang tersedia.'),
    array('name' => 'jastip4', 'title' => 'Titip jadi lebih simpel', 'desc' => 'Ceritakan barang incaranmu, biar kami bantu cek dulu.'),
    array('name' => 'jastip5', 'title' => 'Pilihan seru buat kamu', 'desc' => 'Dari kebutuhan harian sampai yang lagi kamu pengin.'),
    array('name' => 'jastip6', 'title' => 'Yang kamu suka, kita cari', 'desc' => 'Kirim wishlist dan detail produk yang kamu inginkan.'),
    array('name' => 'jastip7', 'title' => 'Belanja tanpa ribet', 'desc' => 'Harga dan jadwal dikonfirmasi sebelum order diproses.'),
    array('name' => 'jastip8', 'title' => 'Ada yang menarik?', 'desc' => 'Tanya dulu juga boleh. Kita cek sesuai kesempatan trip.'),
    array('name' => 'jastip9', 'title' => 'Titipan pilihanmu', 'desc' => 'Berbagai request bisa didiskusikan terlebih dahulu.'),
    array('name' => 'jastip10', 'title' => 'Happy sampai tujuan', 'desc' => 'Pengiriman disesuaikan dengan jenis barang dan lokasi.'),
);
$jiaInstagram = 'https://www.instagram.com/jastip.indahaja_/';
$jiaInstagramDm = 'https://ig.me/m/jastip.indahaja_';
$jiaLogo = jia_image_url('logojastip');
$jiaHero = jia_image_url('jastip1');
?>
<style>
.jia-page{color:#3f2e24;overflow:hidden}
.jia-page .jia-hero{padding:105px 0 83px;background:linear-gradient(120deg,#fff8ec 0%,#fffdf9 56%,#f4e6d3 100%)}
.jia-page .jia-kicker{font:800 12px/1.5 Inter,sans-serif;letter-spacing:.12em;text-transform:uppercase;color:#936537}
.jia-page .jia-title,.jia-page .jia-heading{font-family:'Cormorant Garamond',Georgia,serif;font-weight:700;line-height:1.06;letter-spacing:-.025em;color:#3f2e24}
.jia-page .jia-title{font-size:clamp(3.1rem,6vw,5.7rem);margin:18px 0 20px}
.jia-page .jia-title em{color:#a6764c;font-weight:600}
.jia-page .jia-heading{font-size:clamp(2.35rem,4vw,3.65rem);margin:13px 0 15px}
.jia-page .jia-copy{color:#796756;line-height:1.85;font-size:1rem}
.jia-page .jia-badge{display:inline-flex;align-items:center;gap:8px;padding:8px 14px;background:#f7e7ce;border:1px solid #eddbc2;border-radius:999px;font-size:12px;font-weight:700;color:#795332}
.jia-page .jia-btn{display:inline-flex;align-items:center;justify-content:center;padding:13px 23px;border-radius:999px;font-weight:800;text-decoration:none;transition:transform .2s,background .2s;gap:7px}
.jia-page .jia-btn:hover{transform:translateY(-2px)}
.jia-page .jia-primary{background:#8b5e34;color:#fff!important}
.jia-page .jia-primary:hover{background:#724920}
.jia-page .jia-secondary{background:#fffaf3;color:#664626!important;border:1px solid #ddc6a9}
.jia-page .jia-secondary:hover{background:#f8ead2}
.jia-page .jia-hero-photo,.jia-page .jia-photo{position:relative;overflow:hidden;background:linear-gradient(135deg,#f1ddbf,#f8ead9)}
.jia-page .jia-hero-photo{border-radius:32px;height:480px;box-shadow:0 24px 64px rgba(63,46,36,.12)}
.jia-page .jia-hero-photo img,.jia-page .jia-photo img{display:block;width:100%;height:100%;object-fit:cover;transition:transform .35s}
.jia-page .jia-item:hover img{transform:scale(1.035)}
.jia-page .jia-placeholder{height:100%;min-height:180px;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#eee0cd,#f8ebda);color:#93663b;font-weight:700;text-align:center;padding:20px}
.jia-page .jia-photo-note{position:absolute;bottom:15px;left:15px;padding:9px 15px;background:rgba(255,251,245,.93);border-radius:999px;color:#785033;font-weight:800;font-size:12px}
.jia-page .jia-section{padding:86px 0}
.jia-page .jia-soft{background:#fff9ef}
.jia-page .jia-item{height:100%;overflow:hidden;border-radius:25px;background:#fff;border:1px solid rgba(104,72,45,.1);box-shadow:0 14px 38px rgba(63,46,36,.055)}
.jia-page .jia-photo{height:275px}
.jia-page .jia-photo-wide{height:345px}
.jia-page .jia-item-body{padding:23px 24px}
.jia-page .jia-item-body h3{font-size:19px;font-weight:800;margin:0 0 8px;color:#3f2e24}
.jia-page .jia-item-body p{font-size:14px;line-height:1.75;color:#806d5c;margin:0}
.jia-page .jia-feature{padding:31px;border-radius:26px;background:linear-gradient(120deg,#fffefb,#f6e7d3);border:1px solid #f0dfc8;height:100%}
.jia-page .jia-feature h3{font-size:19px;font-weight:800;margin:0 0 10px}
.jia-page .jia-feature p{color:#806d5c;line-height:1.8;margin:0}
.jia-page .jia-num{font-size:13px;font-weight:900;color:#a16b3c}
.jia-page .jia-step{height:100%;border:1px solid #ecddcb;border-radius:20px;background:#fff;padding:24px}
.jia-page .jia-step strong{display:block;margin:9px 0 7px}
.jia-page .jia-step p{color:#806d5c;line-height:1.7;margin:0;font-size:14px}
.jia-page .jia-cta{padding:46px;border-radius:30px;background:linear-gradient(115deg,#3f2e24,#805839);color:#fffaf3}
.jia-page .jia-cta h2{font-family:'Cormorant Garamond',Georgia,serif;font-weight:700;font-size:clamp(2.35rem,4vw,3.6rem);line-height:1.1}
.jia-page .jia-cta p{color:#f1e0d1;line-height:1.85}
.jia-page .jia-cta .jia-secondary{background:#fffaf2}
.jia-page .jia-brand-inline{width:112px;height:112px;border-radius:24px;object-fit:contain;background:#fff;border:1px solid #eadbcb;padding:7px;flex-shrink:0}
.jia-page .jia-instagram{background:#fff;color:#7b4b63!important;border:1px solid #dfbfce}
.jia-page .jia-instagram:hover{background:#fff1f5}
.jia-page .jia-brand-label{display:flex;flex-direction:column;align-items:flex-start;gap:8px}
@media(max-width:991.98px){.jia-page .jia-hero{padding:85px 0 65px}.jia-page .jia-section{padding:66px 0}.jia-page .jia-hero-photo{height:420px}}
@media(max-width:575.98px){.jia-page .jia-brand-inline{width:92px;height:92px;border-radius:20px}.jia-page .jia-hero{padding:76px 0 54px}.jia-page .jia-section{padding:55px 0}.jia-page .jia-hero-photo{height:345px;border-radius:24px}.jia-page .jia-photo{height:245px}.jia-page .jia-photo-wide{height:275px}.jia-page .jia-cta{padding:29px 24px}.jia-page .jia-btn{width:100%}}
</style>
<main class="jia-page">
    <section class="jia-hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <?php if ($jiaLogo): ?><img class="jia-brand-inline" src="<?= html_escape($jiaLogo); ?>" width="112" height="112" alt="Logo Jastip Indah Aja" decoding="async"><?php endif; ?>
                        <div class="jia-brand-label"><span class="jia-badge">🛍️ Jastip Indah Aja</span><span class="jia-copy small">Personal shopping yang ramah &amp; bersahabat ♡</span></div>
                    </div>
                    <h1 class="jia-title">Ada yang diincer? <em>Titip Indah Aja!</em></h1>
                    <p class="jia-copy mb-4">Lagi ngincer barang diskon, skincare event, outfit lucu, makanan viral, atau oleh-oleh? Titip Indah Aja! Harga jastip bersahabat, admin ramah, dan setiap pesanan dibantu dengan komunikasi yang jelas. Bisa ikut open jastip atau request sendiri, bahkan di luar jadwal event.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a class="jia-btn jia-primary" href="<?= html_escape($jiaOrder); ?>" target="_blank" rel="noopener noreferrer">Titip Sekarang ↗</a>
                        <a class="jia-btn jia-instagram" href="<?= html_escape($jiaInstagramDm); ?>" target="_blank" rel="noopener noreferrer">DM Instagram ↗</a>
                        <a class="jia-btn jia-secondary" href="#inspirasi-jastip">Lihat Inspirasi</a>
                    </div>
                    <p class="jia-copy small mt-4 mb-0">Basis kami di Malang, sering melayani titipan Malang–Trawas, ikut event di berbagai tempat sesuai jadwal, dan bisa kirim ke seluruh Indonesia sesuai jenis barang serta layanan ekspedisi.</p>
                </div>
                <div class="col-lg-6">
                    <div class="jia-hero-photo">
                        <?php if ($jiaHero): ?>
                            <img src="<?= html_escape($jiaHero); ?>" alt="Pilihan titipan dan jastip dari Jastip Indah Aja" fetchpriority="high" loading="eager" decoding="async">
                        <?php else: ?><div class="jia-placeholder">Jastip Indah Aja</div><?php endif; ?>
                        <span class="jia-photo-note">Murce, ramah, dan nyaman buat titip ♡</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="jia-section jia-soft" id="layanan-jastip">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width:790px">
                <span class="jia-kicker">Titip sesuai kebutuhanmu</span>
                <h2 class="jia-heading">Event rame? Diskon dadakan? <em>Kita gas!</em></h2>
                <p class="jia-copy">Jastip Indah Aja siap bantu belanja sesuai kesempatan dan jadwal. Harga dan fee dijelaskan lebih dulu, jadi kamu bisa pesan dengan tenang.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-xl-3"><div class="jia-feature"><span class="jia-badge mb-3">01 · Event</span><h3>Open Jastip Event</h3><p>PRJ, beauty expo, bazar, dan event belanja lainnya ketika jadwal jastip tersedia. Pilih dari katalog atau titip barang incaran.</p></div></div>
                <div class="col-md-6 col-xl-3"><div class="jia-feature"><span class="jia-badge mb-3">02 · Promo</span><h3>Sale &amp; Promo Hunting</h3><p>Lagi ada diskon di toko sepatu, baju, skincare, atau produk lainnya? Kirim infonya, kami bantu cek kemungkinan titip beli.</p></div></div>
                <div class="col-md-6 col-xl-3"><div class="jia-feature"><span class="jia-badge mb-3">03 · Local Finds</span><h3>Makanan &amp; Oleh-oleh</h3><p>Makanan viral, dessert, jajanan, dan oleh-oleh Malang–Trawas. Bisa juga request area lain sesuai kesempatan trip.</p></div></div>
                <div class="col-md-6 col-xl-3"><div class="jia-feature"><span class="jia-badge mb-3">04 · Personal</span><h3>Request Kapan Aja</h3><p>Nggak ada event pun boleh chat. Kirim wishlist atau foto produk dan kami bantu cek toko, jadwal, serta biayanya.</p></div></div>
            </div>
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                <a class="jia-btn jia-primary" href="<?= html_escape($jiaEvent); ?>" target="_blank" rel="noopener noreferrer">Tanya Open Jastip ↗</a>
                <a class="jia-btn jia-secondary" href="<?= html_escape($jiaRequest); ?>" target="_blank" rel="noopener noreferrer">Request Barang Yuk ↗</a>
            </div>
        </div>
    </section>

    <section class="jia-section" id="inspirasi-jastip">
        <div class="container">
            <span class="jia-kicker">Titipan pilihanmu</span>
            <h2 class="jia-heading">Apa pun incarannya, <em>cerita dulu yuk.</em></h2>
            <p class="jia-copy mb-4" style="max-width:780px">Mau ikut event besar, berburu diskon dadakan, atau titip barang tanpa menunggu open jastip? Semua boleh ditanyakan. Galeri ini hanya inspirasi—barang yang bisa dititip tidak terbatas pada contoh foto.</p>
            <div class="row g-4">
                <?php foreach (array_slice($jiaGallery, 0, 3) as $item): $photo = jia_image_url($item['name']); ?>
                    <div class="col-md-4"><article class="jia-item">
                        <div class="jia-photo"><?php if ($photo): ?><img src="<?= html_escape($photo); ?>" alt="<?= html_escape($item['title']); ?> - Jastip Indah Aja" loading="lazy" decoding="async"><?php else: ?><div class="jia-placeholder">Jastip Indah Aja</div><?php endif; ?></div>
                        <div class="jia-item-body"><h3><?= html_escape($item['title']); ?></h3><p><?= html_escape($item['desc']); ?></p></div>
                    </article></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="jia-section jia-soft">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-4">
                    <span class="jia-kicker">Belanja makin praktis</span>
                    <h2 class="jia-heading">Nggak sempat beli sendiri?</h2>
                    <p class="jia-copy">Ada promo sepatu, fashion, skincare, atau barang lain yang lagi kamu incar? Nggak harus menunggu event, kok. Kirim link, foto, toko, dan detailnya. Kami cek kesempatan belanja, harga, fee jastip, serta ongkir terlebih dahulu.</p>
                    <a href="<?= html_escape($jiaAsk); ?>" target="_blank" rel="noopener noreferrer" class="jia-btn jia-secondary mt-2">Tanya Jastip Yuk ↗</a>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <?php foreach (array_slice($jiaGallery, 3, 2) as $item): $photo = jia_image_url($item['name']); ?>
                            <div class="col-sm-6"><article class="jia-item">
                                <div class="jia-photo jia-photo-wide"><?php if ($photo): ?><img src="<?= html_escape($photo); ?>" alt="<?= html_escape($item['title']); ?> - Jastip Indah Aja" loading="lazy" decoding="async"><?php else: ?><div class="jia-placeholder">Jastip Indah Aja</div><?php endif; ?></div>
                                <div class="jia-item-body"><h3><?= html_escape($item['title']); ?></h3><p><?= html_escape($item['desc']); ?></p></div>
                            </article></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="jia-section">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width:700px">
                <span class="jia-kicker">More little finds</span>
                <h2 class="jia-heading">Selalu ada yang menarik untuk dititip.</h2>
                <p class="jia-copy">Dari makanan viral sampai produk event dan promo yang datang tiba-tiba, setiap titipan punya ceritanya sendiri. Foto hanya inspirasi, pilihan tetap mengikuti wishlist kamu.</p>
            </div>
            <div class="row g-4">
                <?php foreach (array_slice($jiaGallery, 5, 4) as $item): $photo = jia_image_url($item['name']); ?>
                    <div class="col-sm-6 col-lg-3"><article class="jia-item">
                        <div class="jia-photo"><?php if ($photo): ?><img src="<?= html_escape($photo); ?>" alt="<?= html_escape($item['title']); ?> - Jastip Indah Aja" loading="lazy" decoding="async"><?php else: ?><div class="jia-placeholder">Jastip Indah Aja</div><?php endif; ?></div>
                        <div class="jia-item-body"><h3><?= html_escape($item['title']); ?></h3><p><?= html_escape($item['desc']); ?></p></div>
                    </article></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section class="jia-section" id="update-jastip">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="jia-kicker">Biar nggak ketinggalan</span>
                    <h2 class="jia-heading">Pantau katalog &amp; <em>live shopping</em> kami!</h2>
                    <p class="jia-copy mb-0">Update open jastip, katalog, dan info live shopping biasanya kami bagikan melalui WhatsApp. Kalau ada event atau promo menarik, kamu bisa pilih dari katalog, kirim screenshot, lalu konfirmasi pesanan. Mau request pribadi? Tetap bisa, kok!</p>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <div class="d-flex flex-wrap justify-content-lg-end gap-2">
                        <a class="jia-btn jia-primary" href="<?= html_escape($jiaUpdates); ?>" target="_blank" rel="noopener noreferrer">Tanya Info Grup &amp; Katalog ↗</a>
                        <a class="jia-btn jia-instagram" href="<?= html_escape($jiaInstagramDm); ?>" target="_blank" rel="noopener noreferrer">DM via Instagram ↗</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="jia-section jia-soft">
        <div class="container">
            <div class="text-center mb-4"><span class="jia-kicker">Cara titip</span><h2 class="jia-heading">Gampang banget, kok!</h2></div>
            <div class="row g-3">
                <div class="col-md-3 col-6"><div class="jia-step"><span class="jia-num">01</span><strong>Kirim wishlist</strong><p>Pilih dari katalog/event atau kirim sendiri foto, link, dan detail barang.</p></div></div>
                <div class="col-md-3 col-6"><div class="jia-step"><span class="jia-num">02</span><strong>Kami cek dulu</strong><p>Kami infokan harga produk, fee jastip, jadwal, serta estimasi ongkir.</p></div></div>
                <div class="col-md-3 col-6"><div class="jia-step"><span class="jia-num">03</span><strong>Konfirmasi</strong><p>Kalau sudah cocok, lanjut proses pembayaran.</p></div></div>
                <div class="col-md-3 col-6"><div class="jia-step"><span class="jia-num">04</span><strong>Titipan diproses</strong><p>Barang dibelikan sesuai kesepakatan dan dikirim ke alamatmu.</p></div></div>
            </div>
            <div class="mt-5 jia-cta text-center">
                <h2 class="mb-3">Titip apa aja, <em>tetap bersahabat!</em></h2>
                <p class="mx-auto mb-4" style="max-width:650px">Boleh tanya tanpa harus langsung order. Kami bantu cek produk, fee jastip yang bersahabat, jadwal pembelian, dan ongkir sebelum kamu memutuskan.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="<?= html_escape($jiaOrder); ?>" target="_blank" rel="noopener noreferrer" class="jia-btn jia-secondary">Chat WhatsApp ↗</a>
                    <a href="<?= html_escape($jiaInstagramDm); ?>" target="_blank" rel="noopener noreferrer" class="jia-btn jia-instagram">DM Instagram ↗</a>
                </div>
            </div>
        </div>
    </section>
</main>
