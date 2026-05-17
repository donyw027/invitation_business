<?php
if (!function_exists('pretty_local_img')) {
    function pretty_local_img($name)
    {
        $exts = array('jpg', 'jpeg', 'png', 'webp');
        foreach ($exts as $ext) {
            $path = FCPATH . 'assets/img/' . $name . '.' . $ext;
            if (file_exists($path)) {
                return base_url('assets/img/' . $name . '.' . $ext);
            }
        }
        return '';
    }
}
$local_gallery = array(
    array('file' => 'jastip1', 'title' => 'Jastip Cafe Malang', 'tag' => 'Jastip', 'desc' => 'Titip beli cafe, dessert, dan local finds area Malang.'),
    array('file' => 'jastip2', 'title' => 'Jastip Trawas Trip', 'tag' => 'Trawas', 'desc' => 'Request cafe, bakery, dan oleh-oleh area Trawas.'),
    array('file' => 'jastip3', 'title' => 'Daily Local Request', 'tag' => 'Local Finds', 'desc' => 'Titip produk favorit sesuai request customer.'),
    array('file' => 'buket1', 'title' => 'Bouquet Gift', 'tag' => 'Bouquet', 'desc' => 'Bouquet manis untuk wisuda, birthday, dan surprise.'),
    array('file' => 'buket2', 'title' => 'Pretty Bloom', 'tag' => 'Gift', 'desc' => 'Pilihan gift aesthetic dengan warna yang bisa disesuaikan.'),
    array('file' => 'buket3', 'title' => 'Custom Bouquet', 'tag' => 'Custom', 'desc' => 'Request bouquet sesuai budget dan kebutuhan momen.'),
);
?>
<section class="hero-local">
    <div class="container">
        <div class="hero-wrap">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="kicker">📍 Openzzz jastip Malang • Batu • Trawas</span>
                    <h1 class="hero-title">Pretty Local Finds,<br><span class="script">delivered with care.</span></h1>
                    <p class="hero-copy">
                        Jastip Indah Aja bantu titip beli cafe hits, dessert, oleh-oleh, gift, dan hidden local finds area Malang & Trawas. Plus MySimpleGift untuk bouquet, greeting card, dan undangan digital yang lucu tapi tetap rapi.
                    </p>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo kak, aku mau titip/order area Malang atau Trawas.'); ?>" class="btn btn-main btn-lg">Titip Sekarang ✨</a>
                        <a href="<?= site_url('review'); ?>" class="btn btn-soft btn-lg">Lihat Review</a>
                    </div>
                    <div class="hero-tags">
                        <span class="pill">☕ Cafe & dessert</span>
                        <span class="pill">🎁 Gift aesthetic</span>
                        <span class="pill">🚗 Malang/Trawas trip</span>
                        <span class="pill">💌 Digital card</span>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="moodboard">
                        <div class="float-note">cute but trusted</div>
                        <?php foreach (array_slice($local_gallery, 0, 4) as $i => $item): ?>
                            <?php $img = pretty_local_img($item['file']); ?>
                            <div class="pin <?= $i === 0 ? 'tall' : ($i === 1 ? 'mint' : ($i === 2 ? 'dark' : 'lav')); ?>" <?= $img ? 'style="background-image:url(' . html_escape($img) . ');"' : ''; ?>>
                                <span class="label"><?= html_escape($item['tag']); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="stat-strip">
                <div class="stat-card"><strong>120+</strong><span>successful local orders</span></div>
                <div class="stat-card"><strong>3 area</strong><span>Malang, Batu, Trawas</span></div>
                <div class="stat-card"><strong>Fast</strong><span>response by WhatsApp</span></div>
                <div class="stat-card"><strong>Custom</strong><span>request sesuai kebutuhan</span></div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="section section-soft">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-kicker">main services</span>
            <h2 class="section-title">Small things that feel special.</h2>
            <p class="section-subtitle mx-auto">Dari titip beli cafe viral, bouquet manis, sampai template digital yang siap dipakai. Flow dibuat simple supaya customer langsung paham dan gampang order.</p>
        </div>
        <div class="service-grid">
            <div class="card-pretty">
                <div class="icon-bubble">🛍️</div>
                <h3>Jastip Indah Aja</h3>
                <p>Titip beli makanan, dessert, oleh-oleh, skincare, fashion, atau item request area Malang, Batu, dan Trawas.</p>
                <a href="<?= site_url('review'); ?>#jastip-preview" class="btn btn-soft mt-4">Lihat Preview</a>
            </div>
            <div class="card-pretty">
                <div class="icon-bubble">🎁</div>
                <h3>MySimpleGift</h3>
                <p>Bouquet, gift box, hampers, greeting card, dan custom gift yang cocok untuk wisuda, ulang tahun, anniversary, atau surprise.</p>
                <a href="<?= site_url('review'); ?>#bouquet-preview" class="btn btn-soft mt-4">Lihat Preview</a>
            </div>
            <div class="card-pretty">
                <div class="icon-bubble">💌</div>
                <h3>Digital & Template</h3>
                <p>Undangan digital, greeting card, dan spreadsheet template untuk jualan, tracking order, dan kebutuhan harian yang rapi.</p>
                <a href="<?= site_url('review'); ?>#template-preview" class="btn btn-soft mt-4">Lihat Preview</a>
            </div>
        </div>
    </div>
</section>

<section class="section" id="jastip">
    <div class="container">
        <div class="row align-items-end mb-4 g-4">
            <div class="col-lg-8">
                <span class="section-kicker">local service area</span>
                <h2 class="section-title">Jastip harian untuk Malang, Batu, dan Trawas.</h2>
            </div>
            <div class="col-lg-4">
                <p class="section-subtitle">Titip beli cafe hits, dessert, oleh-oleh, local brand, dan request toko tertentu dengan alur order yang jelas dan fast response.</p>
            </div>
        </div>
        <div class="area-grid">
            <div class="card-pretty area-card">
                <span class="pill">📍 Jastip Area Malang</span>
                <h3 class="mt-3">Cafe, dessert, local brand.</h3>
                <p>Titip beli area Malang untuk cafe hits, dessert viral, bakery, makanan, skincare, fashion, dan local finds yang sedang ramai.</p>
            </div>
            <div class="card-pretty area-card">
                <span class="pill">📍 Jastip Area Trawas</span>
                <h3 class="mt-3">Hidden cafe & mountain finds.</h3>
                <p>Special trip order dari cafe Trawas, hotel/resort, bakery aesthetic, produk lokal, dan oleh-oleh area pegunungan.</p>
            </div>
            <div class="card-pretty area-card">
                <span class="pill">📍 Batu</span>
                <h3 class="mt-3">Oleh-oleh & tourist snacks.</h3>
                <p>Bisa titip oleh-oleh Batu, snack, susu, produk wisata, dan item lokal yang cocok dikirim ke luar kota.</p>
            </div>
            <div class="card-pretty area-card">
                <span class="pill">✨ Popular request</span>
                <h3 class="mt-3">Titip cafe Malang, titip dessert Trawas, dan request toko tertentu.</h3>
                <p>Customer tinggal kirim nama produk, lokasi toko, foto referensi, dan deadline. Admin bantu cek ketersediaan, estimasi biaya, lalu proses jika sudah cocok.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft" id="buket">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <span class="section-kicker">bouquet & gift</span>
                <h2 class="section-title">Bouquet cantik untuk momen kecil yang terasa spesial.</h2>
                <p class="section-subtitle">Hadiah kecil bisa terasa niat kalau dikurasi dengan warna, pesan, dan detail yang tepat. Cocok untuk wisuda, birthday, anniversary, atau moodbooster.</p>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <span class="pill">Bouquet mulai 15K</span>
                    <span class="pill">Greeting card mulai 10K</span>
                    <span class="pill">Custom budget</span>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="gallery-masonry">
                    <div class="gallery-item">
                        <div class="gallery-img" style="--h:320px"><span class="pill">Bouquet Gift</span></div>
                        <div class="gallery-body"><strong>Graduation Bouquet</strong><span>request warna & isi</span></div>
                    </div>
                    <div class="gallery-item">
                        <div class="gallery-img mint" style="--h:220px"><span class="pill">Gift Box</span></div>
                        <div class="gallery-body"><strong>Soft Hampers</strong><span>cute packaging</span></div>
                    </div>
                    <div class="gallery-item">
                        <div class="gallery-img dark" style="--h:280px"><span class="pill">Greeting Card</span></div>
                        <div class="gallery-body"><strong>Personal Note</strong><span>custom message</span></div>
                    </div>
                    <div class="gallery-item">
                        <div class="gallery-img" style="--h:190px"><span class="pill">Custom</span></div>
                        <div class="gallery-body"><strong>Budget Friendly</strong><span>sesuai kebutuhan</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="digital">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-kicker">digital product</span>
            <h2 class="section-title">Digital invitation, greeting card, dan template praktis.</h2>
            <p class="section-subtitle mx-auto">Pilihan digital product yang rapi, lucu, dan mudah dibagikan untuk kebutuhan acara maupun jualan.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card-pretty price-card">
                    <span class="pill">Best seller</span>
                    <h3 class="mt-3">Bouquet & Gift</h3>
                    <div class="price">15K+</div>
                    <p>Untuk wisuda, ulang tahun, anniversary, dan surprise kecil yang personal.</p>
                    <ul class="feature-list">
                        <li>Request warna & tema</li>
                        <li>Greeting card add-on</li>
                        <li>Fleksibel sesuai budget</li>
                    </ul>
                    <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo kak, aku mau order Gift/Bouquet.'); ?>" class="btn btn-main w-100">Order Gift</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-pretty price-card">
                    <span class="pill">Digital cute</span>
                    <h3 class="mt-3">Undangan Digital</h3>
                    <div class="price">25K+</div>
                    <p>Simple, modern, dan gampang dibagikan lewat WhatsApp untuk berbagai acara.</p>
                    <ul class="feature-list">
                        <li>Custom nama & detail</li>
                        <li>Mobile friendly</li>
                        <li>Preview sebelum share</li>
                    </ul>
                    <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo kak, aku mau order Undangan Digital.'); ?>" class="btn btn-main w-100">Order Undangan</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-pretty price-card">
                    <span class="pill">Useful template</span>
                    <h3 class="mt-3">Spreadsheet</h3>
                    <div class="price">Ready</div>
                    <p>Template tracking order, keuangan, dan penjualan untuk usaha kecil yang ingin rapi.</p>
                    <ul class="feature-list">
                        <li>Dashboard simple</li>
                        <li>Form input</li>
                        <li>Custom premium by request</li>
                    </ul>
                    <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo kak, aku mau tanya Spreadsheet Template.'); ?>" class="btn btn-main w-100">Tanya Template</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <span class="section-kicker">how it works</span>
                <h2 class="section-title">Order flow yang simple banget.</h2>
                <p class="section-subtitle">Customer tidak perlu bingung. Cukup kirim wishlist, admin cek, deal, lalu pesanan diproses.</p>
                <a href="<?= site_url('cara_order'); ?>" class="btn btn-soft mt-3">Lihat Cara Order</a>
            </div>
            <div class="col-lg-7">
                <div class="flow-grid">
                    <div class="flow-card">
                        <div class="flow-no">1</div>
                        <h5>Send wishlist</h5>
                        <p>Kirim produk, cafe, toko, foto, atau budget.</p>
                    </div>
                    <div class="flow-card">
                        <div class="flow-no">2</div>
                        <h5>Admin cek</h5>
                        <p>Dicek ketersediaan, estimasi, dan ongkir.</p>
                    </div>
                    <div class="flow-card">
                        <div class="flow-no">3</div>
                        <h5>Confirm</h5>
                        <p>Kalau cocok, lanjut pembayaran sesuai arahan.</p>
                    </div>
                    <div class="flow-card">
                        <div class="flow-no">4</div>
                        <h5>Delivered</h5>
                        <p>Pesanan diproses, dikemas, dan dikirim aman.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="seo-box">
            <div class="row g-4 align-items-center">
                <div class="col-lg-7">
                    <span class="section-kicker">SEO friendly</span>
                    <h2 class="section-title mb-3">Jastip & Bouquet</h2>
                    <p>Open daily jastip service from Malang, Batu, and Trawas area. Helping customers buy trending cafe menus, desserts, souvenirs, gifts, local favorite products, and custom store requests with safe delivery.</p>
                    <div class="seo-keywords"><span>jastip malang</span><span>jastip trawas</span><span>titip cafe malang</span><span>dessert trawas</span><span>oleh-oleh batu</span><span>personal shopper malang</span></div>
                </div>
                <div class="col-lg-5">
                    <div class="cta-panel">
                        <span class="pill">Ready to order?</span>
                        <h2 class="mt-3">Tell us what you want.</h2>
                        <p>Spill aja mau titip apa, nanti admin bantu arahin yang paling cocok.</p>
                        <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo kak, aku mau titip/order dari website.'); ?>" class="btn btn-main">Chat WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>