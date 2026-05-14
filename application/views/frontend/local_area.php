<?php
$area = isset($area) ? $area : 'Malang';
$is_trawas = strtolower($area) === 'trawas';
$headline = $is_trawas ? 'Jastip area Trawas untuk cafe, dessert, dan hidden local finds.' : 'Jastip area Malang untuk cafe hits, dessert, oleh-oleh, dan local finds.';
$copy = $is_trawas ? 'Open jastip area Trawas untuk hidden cafe, bakery aesthetic, resort products, oleh-oleh, dan request toko tertentu.' : 'Open jastip area Malang untuk cafe hits, dessert viral, bakery, oleh-oleh, local brand, skincare, fashion, dan request toko tertentu.';
?>
<section class="page-hero text-center">
    <div class="container">
        <div class="page-hero-shell">
            <span class="section-kicker">📍 <?= html_escape($area); ?> area</span>
            <h1 class="page-title"><?= html_escape($headline); ?></h1>
            <p class="section-subtitle mx-auto"><?= html_escape($copy); ?></p>
            <div class="d-flex justify-content-center flex-wrap gap-3 mt-4">
                <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo kak, aku mau jastip area ' . $area); ?>" class="btn btn-main btn-lg">Titip dari <?= html_escape($area); ?></a>
                <a href="<?= site_url('review'); ?>" class="btn btn-soft btn-lg">Lihat Gallery</a>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="service-grid">
            <div class="card-pretty"><div class="icon-bubble">☕</div><h3>Cafe & Dessert</h3><p>Titip beli menu cafe, dessert, bakery, minuman, dan makanan favorit area <?= html_escape($area); ?>.</p></div>
            <div class="card-pretty"><div class="icon-bubble">🎁</div><h3>Gift & Oleh-oleh</h3><p>Bisa sekalian request gift, souvenir, hampers, atau produk lokal yang cocok dikirim ke luar kota.</p></div>
            <div class="card-pretty"><div class="icon-bubble">🛍️</div><h3>Custom Request</h3><p>Kirim foto produk, nama toko, atau lokasi. Admin bantu cek apakah bisa diproses.</p></div>
        </div>
        <div class="seo-box mt-5">
            <h2 class="section-title">Keyword area <?= html_escape($area); ?></h2>
            <p><?= html_escape($copy); ?> Cocok untuk pencarian jastip <?= html_escape(strtolower($area)); ?>, titip beli <?= html_escape(strtolower($area)); ?>, titip cafe <?= html_escape(strtolower($area)); ?>, dan personal shopper <?= html_escape(strtolower($area)); ?>.</p>
            <div class="seo-keywords"><span>jastip <?= html_escape(strtolower($area)); ?></span><span>titip beli <?= html_escape(strtolower($area)); ?></span><span>titip cafe <?= html_escape(strtolower($area)); ?></span><span>oleh-oleh <?= html_escape(strtolower($area)); ?></span></div>
        </div>
    </div>
</section>
