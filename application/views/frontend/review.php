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
    array('file' => 'jastip1', 'title' => 'Jastip Cafe Malang', 'tag' => 'Jastip Malang', 'desc' => 'Titip beli cafe, dessert, snack viral, dan local finds area Malang.'),
    array('file' => 'jastip2', 'title' => 'Jastip Trawas Trip', 'tag' => 'Jastip Trawas', 'desc' => 'Request cafe, bakery, oleh-oleh, dan hidden local spot area Trawas.'),
    array('file' => 'jastip3', 'title' => 'Daily Local Request', 'tag' => 'Custom Request', 'desc' => 'Titip produk favorit sesuai request customer dan jadwal trip.'),
    array('file' => 'buket1', 'title' => 'Bouquet Gift', 'tag' => 'Bouquet', 'desc' => 'Bouquet manis untuk wisuda, birthday, anniversary, dan surprise.'),
    array('file' => 'buket2', 'title' => 'Pretty Bloom', 'tag' => 'Gift Aesthetic', 'desc' => 'Pilihan gift aesthetic dengan warna yang bisa disesuaikan.'),
    array('file' => 'buket3', 'title' => 'Custom Bouquet', 'tag' => 'Custom Bouquet', 'desc' => 'Request bouquet sesuai budget, warna, dan kebutuhan momen.'),
);
$product_types = isset($product_types) && is_array($product_types) ? $product_types : array();
$template_groups = isset($template_groups) && is_array($template_groups) ? $template_groups : array();
$spreadsheet_previews = array(
    array('title' => 'Order Tracker', 'tag' => 'Spreadsheet', 'desc' => 'Template untuk mencatat order, status pembayaran, dan progress pengiriman.'),
    array('title' => 'Sales Dashboard', 'tag' => 'Dashboard', 'desc' => 'Ringkasan penjualan, produk terlaris, customer, dan total omzet.'),
    array('title' => 'Jastip Recap', 'tag' => 'Jastip Sheet', 'desc' => 'Sheet praktis untuk tracking titipan, fee, ongkir, dan profit jastip.'),
);
?>
<section class="page-hero text-center">
    <div class="container">
        <div class="page-hero-shell">
            <span class="section-kicker">customer preview</span>
            <h1 class="page-title">Review & Preview</h1>
            <p class="section-subtitle mx-auto">Lihat contoh jastip, bouquet, template digital, dan spreadsheet sebelum order.</p>
            <div class="preview-nav mt-4">
                <a href="#jastip-preview">Jastip</a>
                <a href="#bouquet-preview">Bouquet</a>
                <a href="#template-preview">Template</a>
                <a href="#spreadsheet-preview">Spreadsheet</a>
            </div>
        </div>
    </div>
</section>

<section class="section" id="jastip-preview">
    <div class="container">
        <div class="row align-items-end mb-4 g-4">
            <div class="col-lg-8">
                <span class="section-kicker">jastip preview</span>
                <h2 class="section-title">Jastip Malang & Trawas</h2>
            </div>
            <div class="col-lg-4">
                <p class="section-subtitle">Contoh request jastip cafe, dessert, oleh-oleh, dan local finds.</p>
            </div>
        </div>
        <div class="local-photo-grid">
            <?php foreach (array_slice($local_gallery, 0, 3) as $item): ?>
                <?php $img = pretty_local_img($item['file']); ?>
                <article class="local-photo-card">
                    <div class="local-photo-square" <?= $img ? 'style="background-image:url(' . html_escape($img) . ');"' : ''; ?>>
                        <span class="local-photo-tag"><?= html_escape($item['tag']); ?></span>
                    </div>
                    <div class="local-photo-copy">
                        <h3><?= html_escape($item['title']); ?></h3>
                        <p><?= html_escape($item['desc']); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section-soft" id="bouquet-preview">
    <div class="container">
        <div class="row align-items-end mb-4 g-4">
            <div class="col-lg-8">
                <span class="section-kicker">bouquet preview</span>
                <h2 class="section-title">Bouquet & Gift</h2>
            </div>
            <div class="col-lg-4">
                <p class="section-subtitle">Contoh bouquet dan gift yang bisa dicustom sesuai warna, budget, dan momen.</p>
            </div>
        </div>
        <div class="local-photo-grid">
            <?php foreach (array_slice($local_gallery, 3, 3) as $item): ?>
                <?php $img = pretty_local_img($item['file']); ?>
                <article class="local-photo-card">
                    <div class="local-photo-square" <?= $img ? 'style="background-image:url(' . html_escape($img) . ');"' : ''; ?>>
                        <span class="local-photo-tag"><?= html_escape($item['tag']); ?></span>
                    </div>
                    <div class="local-photo-copy">
                        <h3><?= html_escape($item['title']); ?></h3>
                        <p><?= html_escape($item['desc']); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" id="template-preview">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-kicker">template preview</span>
            <h2 class="section-title">Undangan Digital & Greeting Card</h2>
            <p class="section-subtitle mx-auto">Preview template digital yang clean, mobile friendly, dan siap dibagikan.</p>
        </div>
        <div class="row g-4">
            <?php $has_templates = false; ?>
            <?php foreach ($product_types as $type): ?>
                <?php $items = isset($template_groups[$type->code]) ? $template_groups[$type->code] : array(); ?>
                <?php if (!empty($items)): ?>
                    <?php $has_templates = true; ?>
                    <?php foreach ($items as $t): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card-pretty h-100">
                                <div class="template-preview-frame">
                                    <?php if (!empty($t->thumbnail)): ?>
                                        <img src="<?= html_escape($t->thumbnail); ?>" alt="<?= html_escape($t->name); ?>">
                                    <?php else: ?>
                                        <span><?= html_escape($type->name); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="pt-4">
                                    <span class="pill"><?= html_escape($type->name); ?></span>
                                    <h4 class="mt-3"><?= html_escape($t->name); ?></h4>
                                    <p><?= !empty($t->description) ? html_escape($t->description) : 'Template modern, mobile friendly, dan siap disesuaikan dengan kebutuhan acara.'; ?></p>
                                    <div class="d-flex flex-wrap gap-2 mt-3">
                                        <?php if (!empty($t->demo_url)): ?><a href="<?= html_escape($t->demo_url); ?>" target="_blank" class="btn btn-soft btn-sm">Preview</a><?php endif; ?>
                                        <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo kak, aku tertarik dengan template ' . $t->name); ?>" class="btn btn-main btn-sm">Order</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if (!$has_templates): ?>
                <div class="col-lg-4 col-md-6"><div class="card-pretty h-100"><div class="preview-plain-card"><span class="pill">Wedding</span><h4>Digital Invitation</h4><p>Undangan digital untuk wedding, engagement, birthday, dan event personal.</p></div></div></div>
                <div class="col-lg-4 col-md-6"><div class="card-pretty h-100"><div class="preview-plain-card mint"><span class="pill">Greeting</span><h4>Greeting Card</h4><p>Kartu ucapan digital untuk birthday, graduation, anniversary, dan thank you card.</p></div></div></div>
                <div class="col-lg-4 col-md-6"><div class="card-pretty h-100"><div class="preview-plain-card dark"><span class="pill">Custom</span><h4>Custom Template</h4><p>Template bisa disesuaikan dengan warna, nama, detail acara, dan kebutuhan brand.</p></div></div></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section section-soft" id="spreadsheet-preview">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-kicker">spreadsheet preview</span>
            <h2 class="section-title">Spreadsheet Template</h2>
            <p class="section-subtitle mx-auto">Preview template untuk order tracking, laporan penjualan, dashboard, dan kebutuhan usaha kecil.</p>
        </div>
        <div class="row g-4">
            <?php foreach ($spreadsheet_previews as $sheet): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card-pretty h-100 spreadsheet-card">
                        <div class="sheet-topbar"><span></span><span></span><span></span></div>
                        <div class="sheet-grid-preview">
                            <?php for ($i = 0; $i < 30; $i++): ?><i></i><?php endfor; ?>
                        </div>
                        <span class="pill mt-4"><?= html_escape($sheet['tag']); ?></span>
                        <h4 class="mt-3"><?= html_escape($sheet['title']); ?></h4>
                        <p><?= html_escape($sheet['desc']); ?></p>
                        <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo kak, aku mau lihat preview Spreadsheet Template.'); ?>" class="btn btn-main btn-sm mt-2">Tanya Spreadsheet</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta-panel text-center">
            <span class="pill">Ready to order?</span>
            <h2 class="mt-3">Mau order yang mana?</h2>
            <p>Chat admin untuk cek jastip, bouquet, template digital, atau spreadsheet.</p>
            <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo kak, aku sudah lihat review dan mau order.'); ?>" class="btn btn-main">Chat WhatsApp</a>
        </div>
    </div>
</section>
