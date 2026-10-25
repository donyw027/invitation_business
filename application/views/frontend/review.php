<?php
/** Frontend gallery / preview - CI3, PHP 7.2 compatible. No extra queries. */
if (!function_exists('pretty_local_img')) {
    function pretty_local_img($name) {
        foreach (array('jpg', 'jpeg', 'png', 'webp') as $ext) {
            $relative = 'assets/img/' . $name . '.' . $ext;
            if (is_file(FCPATH . $relative)) return base_url($relative);
        }
        return '';
    }
}
$product_types = isset($product_types) && is_array($product_types) ? $product_types : array();
$template_groups = isset($template_groups) && is_array($template_groups) ? $template_groups : array();
$wa_number = isset($wa_number) ? preg_replace('/\D+/', '', (string)$wa_number) : '';
$wa_link = 'https://wa.me/' . $wa_number;
$photo_sets = array(
    'buket' => array(
        array('name'=>'Little Things, Big Smiles', 'desc'=>'Hadiah kecil yang bisa bikin hari seseorang lebih spesial.'),
        array('name'=>'Made with Love', 'desc'=>'Buket pilihan untuk berbagai momen berkesan.'),
        array('name'=>'Your Colors, Your Story', 'desc'=>'Punya warna favorit? Yuk, ceritakan idemu.'),
        array('name'=>'Simply Sweet', 'desc'=>'Sesuatu yang manis untuk orang tersayang.'),
        array('name'=>'For Every Moment', 'desc'=>'Dari kejutan sederhana sampai hari istimewa.'),
        array('name'=>'A Lovely Surprise', 'desc'=>'Pilihan hadiah yang terasa lebih personal.'),
    ),
    'jastip' => array(
        array('name'=>'Titipan Pilihan', 'desc'=>'Beragam temuan menarik dari momen belanja kami.'),
        array('name'=>'Favorite Finds', 'desc'=>'Barang incaran yang bisa kamu titip sesuai jadwal.'),
        array('name'=>'Little Shopping Joy', 'desc'=>'Belanja pilihan jadi lebih praktis.'),
        array('name'=>'Special Picks', 'desc'=>'Inspirasi titipan untuk berbagai kebutuhan.'),
        array('name'=>'Shopping Moments', 'desc'=>'Cerita kecil dari aktivitas jastip kami.'),
        array('name'=>'What’s Your Wishlist?', 'desc'=>'Punya wishlist sendiri? Boleh banget request.'),
    ),
);
?>
<style>
/* All new rules are scoped to this single gallery view. */
.msg-review { --rv-ink:#453127; --rv-muted:#836b5c; --rv-line:#e8d8c7; --rv-bg:#fffaf4; color:var(--rv-ink); }
.msg-review .rv-wrap { max-width:1160px; margin:0 auto; padding:0 18px; }
.msg-review .rv-hero {padding:112px 0 88px; text-align:center; background:linear-gradient(145deg,#fff6e8,#f7e9d9 60%,#fffaf2);}
.msg-review .rv-kicker {font-size:12px; font-weight:800; letter-spacing:.17em; text-transform:uppercase; color:#98744f;}
.msg-review h1,.msg-review h2,.msg-review h3 {color:var(--rv-ink);}
.msg-review h1 {font-size:clamp(35px,5vw,59px);font-weight:750;line-height:1.12;margin:12px 0 18px;}
.msg-review .rv-sub {font-size:16px;line-height:1.8;color:var(--rv-muted);max-width:690px;margin:0 auto;}
.msg-review .rv-nav {display:flex;flex-wrap:wrap;justify-content:center;gap:12px;margin:38px auto 0;}
.msg-review .rv-nav a {text-decoration:none;padding:10px 16px;border:1px solid #e8d7c2;color:#6e4b32;border-radius:99px;background:#fffaf4;font-size:13px;font-weight:700;}
.msg-review .rv-nav a:hover {background:#88623f;color:white;border-color:#88623f;}
.msg-review .rv-section {padding:82px 0;scroll-margin-top:105px;}
.msg-review .rv-hero + .rv-section {padding-top:105px;}
.msg-review .rv-section.alt {background:#fff8f0;}
.msg-review .rv-section-head {display:flex;justify-content:space-between;align-items:end;gap:22px;margin-bottom:29px;}
.msg-review .rv-section-head h2 {font-size:clamp(28px,3vw,37px);margin:9px 0;line-height:1.2;}
.msg-review .rv-section-head p {margin:0;color:var(--rv-muted);line-height:1.7;max-width:490px;}
.msg-review .rv-btn {display:inline-flex;justify-content:center;align-items:center;text-align:center;padding:12px 20px;border-radius:40px;background:#8b5e34;color:#fff!important;font-size:14px;font-weight:700;text-decoration:none;transition:background .15s;}
.msg-review .rv-btn:hover {background:#65401f;}
.msg-review .rv-btn.light {background:#fff8ee;border:1px solid #dcbf9d;color:#795332!important;}
.msg-review .rv-gallery {display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:20px;}
.msg-review .rv-tile {overflow:hidden;border:1px solid var(--rv-line);border-radius:19px;background:#fff;box-shadow:0 8px 28px rgba(75,43,19,.045);}
.msg-review .rv-tile figure {margin:0;aspect-ratio:4/4.3;background:#f1e4d7;overflow:hidden;}
.msg-review .rv-tile img {display:block;width:100%;height:100%;object-fit:cover;transition:transform .25s ease;}
.msg-review .rv-tile:hover img {transform:scale(1.025);}
.msg-review .rv-tile .rv-copy {padding:18px 20px 21px;}
.msg-review .rv-tile h3 {font-size:17px;font-weight:750;margin:0 0 6px;}
.msg-review .rv-tile p {font-size:13px;line-height:1.65;color:var(--rv-muted);margin:0;}
.msg-review .rv-photo-placeholder {height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(125deg,#f3e1cd,#fbf2e7);color:#8d765f;font-size:13px;}
.msg-review .rv-action {text-align:center;margin-top:30px;}
.msg-review .rv-templates {display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px;}
.msg-review .rv-template {background:#fff;border:1px solid var(--rv-line);border-radius:17px;overflow:hidden;display:flex;flex-direction:column;}
.msg-review .rv-template-visual {aspect-ratio:4/4.5;display:flex;align-items:center;justify-content:center;background:#f4e8d9;overflow:hidden;}
.msg-review .rv-template-visual img {height:100%;width:100%;object-fit:cover;}
.msg-review .rv-template-content {padding:18px;display:flex;flex:1;flex-direction:column;gap:10px;}
.msg-review .rv-tag {font-size:11px;text-transform:uppercase;letter-spacing:.08em;font-weight:750;color:#8d6747;}
.msg-review .rv-template h3 {font-size:17px;margin:0;}
.msg-review .rv-template p {font-size:13px;line-height:1.65;color:var(--rv-muted);margin:0 0 9px;}
.msg-review .rv-template-actions {display:flex;flex-wrap:wrap;gap:8px;margin-top:auto;}
.msg-review .rv-template-actions a {padding:9px 12px;font-size:12px;}
.msg-review .rv-service-grid {display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:19px;}
.msg-review .rv-service {border-radius:20px;border:1px solid #e9dac9;background:#fff;padding:27px;}
.msg-review .rv-service h3 {font-size:23px;margin:8px 0 12px;}
.msg-review .rv-service p {line-height:1.8;color:var(--rv-muted);font-size:14px;}
.msg-review .rv-service ul {padding-left:20px;color:var(--rv-muted);font-size:14px;line-height:1.9;margin:16px 0 25px;}
.msg-review .rv-cta {text-align:center;background:linear-gradient(145deg,#f4e4d1,#fff8ed);padding:55px 22px;border-radius:25px;}
.msg-review .rv-cta h2 {font-size:clamp(28px,3vw,38px);margin:9px 0 12px;}
.msg-review .rv-cta p {color:var(--rv-muted);max-width:620px;margin:0 auto 22px;line-height:1.8;}
@media(max-width:950px){.msg-review .rv-templates{grid-template-columns:repeat(2,minmax(0,1fr));}}
@media(max-width:700px){.msg-review .rv-hero{padding:86px 0 70px}.msg-review .rv-section{padding:58px 0}.msg-review .rv-hero + .rv-section{padding-top:78px}.msg-review .rv-section-head{display:block}.msg-review .rv-section-head .rv-btn{margin-top:16px}.msg-review .rv-gallery{grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}.msg-review .rv-service-grid{grid-template-columns:1fr}.msg-review .rv-tile .rv-copy{padding:13px}.msg-review .rv-tile h3{font-size:14px}.msg-review .rv-tile p{font-size:12px}.msg-review .rv-service{padding:22px}}
@media(max-width:420px){.msg-review .rv-templates{grid-template-columns:1fr}.msg-review .rv-nav a{font-size:12px;padding:9px 12px}}
@media(prefers-reduced-motion:reduce){.msg-review .rv-tile img{transition:none}}
</style>
<div class="msg-review">
    <section class="rv-hero">
        <div class="rv-wrap">
            <span class="rv-kicker">Gallery & Preview</span>
            <h1>Intip dulu, baru pilih yang kamu suka. ♡</h1>
            <p class="rv-sub">Cari inspirasi buket, lihat momen jastip, atau coba preview undangan digital. Untuk spreadsheet dan website custom, kamu juga bisa kenalan dengan jenis solusi yang kami buat.</p>
            <nav class="rv-nav" aria-label="Pilih kategori galeri">
                <a href="#bouquet-preview">Buket & Gift</a>
                <a href="#jastip-preview">Jastip Indah Aja</a>
                <a href="#template-preview">Undangan Digital</a>
                <a href="#spreadsheet-preview">Spreadsheet & Sistem</a>
            </nav>
        </div>
    </section>

    <section class="rv-section" id="bouquet-preview">
        <div class="rv-wrap">
            <div class="rv-section-head">
                <div><span class="rv-kicker">MySimpleGift Collection</span><h2>Yang kecil juga bisa berkesan.</h2><p>Enam inspirasi buket untuk semua momen. Suka salah satu model? Warna, detail, dan budget bisa dikonsultasikan.</p></div>
                <a class="rv-btn light" href="<?= site_url('mysimplegift'); ?>">Kenalan dengan MySimpleGift</a>
            </div>
            <div class="rv-gallery">
                <?php foreach ($photo_sets['buket'] as $i => $item): $src = pretty_local_img('buket' . ($i+1)); ?>
                <article class="rv-tile">
                    <figure><?php if ($src): ?><img src="<?= html_escape($src); ?>" alt="Inspirasi buket MySimpleGift <?= $i+1; ?>" loading="lazy" decoding="async" width="450" height="485"><?php else: ?><div class="rv-photo-placeholder">Foto buket<?= $i+1; ?></div><?php endif; ?></figure>
                    <div class="rv-copy"><h3><?= html_escape($item['name']); ?></h3><p><?= html_escape($item['desc']); ?></p></div>
                </article>
                <?php endforeach; ?>
            </div>
            <div class="rv-action"><a class="rv-btn" href="<?= html_escape($wa_link . '?text=' . rawurlencode('Halo kak, aku mau tanya buket custom MySimpleGift.')); ?>" target="_blank" rel="noopener noreferrer">Tanya Buket Custom</a></div>
        </div>
    </section>

    <section class="rv-section alt" id="jastip-preview">
        <div class="rv-wrap">
            <div class="rv-section-head">
                <div><span class="rv-kicker">Jastip Indah Aja</span><h2>Ada yang diincer? Titip Indah Aja!</h2><p>Inspirasi titipan dari makanan viral, event belanja, promo, sampai request pribadi. Harga jasa titip bersahabat, dengan informasi biaya yang dikonfirmasi di awal.</p></div>
                <a class="rv-btn light" href="<?= site_url('jastipindahaja'); ?>">Lihat Layanan Jastip</a>
            </div>
            <div class="rv-gallery">
                <?php foreach ($photo_sets['jastip'] as $i => $item): $src = pretty_local_img('jastip' . ($i+1)); ?>
                <article class="rv-tile">
                    <figure><?php if ($src): ?><img src="<?= html_escape($src); ?>" alt="Galeri aktivitas Jastip Indah Aja <?= $i+1; ?>" loading="lazy" decoding="async" width="450" height="485"><?php else: ?><div class="rv-photo-placeholder">Foto jastip<?= $i+1; ?></div><?php endif; ?></figure>
                    <div class="rv-copy"><h3><?= html_escape($item['name']); ?></h3><p><?= html_escape($item['desc']); ?></p></div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="rv-section" id="template-preview">
        <div class="rv-wrap">
            <div class="rv-section-head"><div><span class="rv-kicker">Live Preview</span><h2>Undangan Digital & Greeting Card</h2><p>Pilih desain, lihat demonya, lalu konsultasikan detail undangan yang kamu inginkan.</p></div></div>
            <?php $has_templates = false; ?>
            <div class="rv-templates">
            <?php foreach ($product_types as $type): ?>
                <?php $items = isset($template_groups[$type->code]) ? $template_groups[$type->code] : array(); ?>
                <?php foreach ($items as $t): $has_templates = true; ?>
                    <article class="rv-template">
                        <div class="rv-template-visual"><?php if (!empty($t->thumbnail)): ?><img src="<?= html_escape($t->thumbnail); ?>" alt="Preview <?= html_escape($t->name); ?>" loading="lazy" decoding="async"><?php else: ?><span><?= html_escape($type->name); ?></span><?php endif; ?></div>
                        <div class="rv-template-content">
                            <span class="rv-tag"><?= html_escape($type->name); ?></span>
                            <h3><?= html_escape($t->name); ?></h3>
                            <p><?= !empty($t->description) ? html_escape($t->description) : 'Desain digital yang dapat disesuaikan untuk momen spesialmu.'; ?></p>
                            <div class="rv-template-actions">
                                <?php if (!empty($t->demo_url)): ?><a class="rv-btn light" href="<?= html_escape($t->demo_url); ?>" target="_blank" rel="noopener noreferrer">Lihat Demo</a><?php endif; ?>
                                <a class="rv-btn" href="<?= html_escape($wa_link . '?text=' . rawurlencode('Halo kak, aku tertarik dengan template ' . $t->name)); ?>" target="_blank" rel="noopener noreferrer">Tanya Template</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endforeach; ?>
            </div>
            <?php if (!$has_templates): ?><p class="rv-sub" style="text-align:center;padding:25px 0">Preview template belum tersedia saat ini. Silakan chat admin untuk informasi desain.</p><?php endif; ?>
        </div>
    </section>

    <section class="rv-section alt" id="spreadsheet-preview">
        <div class="rv-wrap">
            <div class="rv-section-head"><div><span class="rv-kicker">Digital Solutions</span><h2>Lebih rapi, lebih gampang dikelola.</h2><p>Selain hadiah dan jastip, kami juga membantu kebutuhan kerja dan bisnis lewat spreadsheet maupun website custom.</p></div></div>
            <div class="rv-service-grid">
                <article class="rv-service">
                    <span class="rv-kicker">Spreadsheet & Template</span><h3>Biar data nggak bikin pusing.</h3>
                    <p>Ilustrasi jenis template yang bisa dikonsultasikan sesuai pekerjaan dan kebutuhan.</p>
                    <ul><li>Order, customer, dan payment tracker</li><li>Rekap keuangan, stok, dan penjualan</li><li>Dashboard serta laporan praktis</li></ul>
                    <a class="rv-btn light" href="<?= site_url('spreadsheet'); ?>">Lihat Spreadsheet</a>
                </article>
                <article class="rv-service">
                    <span class="rv-kicker">Website & Web-Based System</span><h3>Ide digitalmu, kita bahas bareng.</h3>
                    <p>Contoh kategori solusi yang dapat dirancang menyesuaikan alur kerja dan tujuan bisnis.</p>
                    <ul><li>Company profile dan landing page</li><li>Sistem inventory dan order management</li><li>Dashboard dan sistem operasional custom</li></ul>
                    <a class="rv-btn light" href="<?= site_url('web-development'); ?>">Lihat Jasa Website & Sistem</a>
                </article>
            </div>
        </div>
    </section>
    <section class="rv-section"><div class="rv-wrap"><div class="rv-cta"><span class="rv-kicker">Let's Talk!</span><h2>Sudah ada yang menarik perhatian? ♡</h2><p>Ceritakan kebutuhanmu, dari buket custom, titipan barang, undangan digital, sampai spreadsheet dan sistem untuk bisnismu.</p><a class="rv-btn" href="<?= html_escape($wa_link . '?text=' . rawurlencode('Halo kak, aku sudah lihat galeri dan mau konsultasi.')); ?>" target="_blank" rel="noopener noreferrer">Chat Admin Yuk!</a></div></div></section>
</div>
