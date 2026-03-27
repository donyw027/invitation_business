<section class="gallery-hero">
    <div class="container">
        <div class="gallery-hero-card">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="eyebrow-chip">portfolio • review • social proof</span>
                    <h1>Kelihatannya simple, tapi effort-nya nggak main-main.</h1>
                    <p>
                        <!-- Lihat preview layanan kami dari gift, jastip, undangan digital, greeting card,
                        sampai spreadsheet template. Dibuat biar calon customer langsung kebayang hasilnya
                        dan makin yakin buat chat. -->
                    </p>

                    <div class="hero-mini-points">
                        <span>🎁 estetik</span>
                        <span>💌 personal</span>
                        <span>🛍️ fleksibel</span>
                        <span>📊 useful</span>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-stat-stack">
                        <div class="stat-float one">
                            <strong>flexible</strong>
                            <small>menyesuaikan kebutuhan & budget</small>
                        </div>
                        <div class="stat-float two">
                            <strong>trusted</strong>
                            <small>sudah dipakai banyak customer</small>
                        </div>
                        <div class="hero-preview-grid">
                            <div class="preview-bubble a">Gift</div>
                            <div class="preview-bubble b">Jastip</div>
                            <div class="preview-bubble c">Produk Digital</div>
                            <div class="preview-bubble d">Spreadsheet</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section review-page-modern">
    <div class="container">

        <div class="row g-4">
            <div class="col-lg-6 col-md-6">
                <div class="portfolio-shell mb-5">
                    <div class="review-topline">
                        <span>MySimpleGift</span>
                        <small>gift & bouquet</small>
                    </div>

                    <h5>🎁 Bouquet, gift, dan hampers yang bikin momen terasa lebih spesial.</h5>

                    <p>
                        Cocok untuk wisuda, ulang tahun, anniversary, dan berbagai momen manis lainnya.
                        Bisa request isi, tema, warna, dan sentuhan personal sesuai budget kamu.
                    </p>

                    <div class="row g-3 mt-2">
                        <div class="col-6">
                            <div class="mock-card">
                                <img src="<?= base_url('assets/img/logo1.PNG'); ?>" alt="Bouquet Gift">
                                <span>Bouquet Gift</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mock-card">
                                <img src="<?= base_url('assets/img/logo1.PNG'); ?>" alt="Gift Box">
                                <span>Bouquet Gift</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mock-card">
                                <img src="<?= base_url('assets/img/logo1.PNG'); ?>" alt="Custom Hampers">
                                <span>Bouquet Gift</span>
                            </div>
                        </div>
                    </div>

                    <div class="review-user-modern mt-4">
                        <div class="avatar-circle">M</div>
                        <div>
                            <strong>MySimpleGift</strong>
                            <small>Bouquet & Gift Collection</small>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="https://instagram.com/mysimple.gift" target="_blank" class="btn btn-soft btn-sm">
                            Lihat Instagram
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="portfolio-shell mb-5">
                    <div class="review-topline">
                        <span>JastipinIndahAja</span>
                        <small>Jastip Apa Aja</small>
                    </div>

                    <h5>🛍️ Titip beli yang simple, lucu, dan tetap rapi alurnya ga ribet.</h5>

                    <p>
                        Cocok buat skincare, snack/Makanan, beauty item, hadiah, sampai request item tertentu.
                        Semua dibuat lebih praktis, jelas, dan nyaman untuk customer.
                    </p>

                    <div class="row g-3 mt-2">
                        <div class="col-6">
                            <div class="mock-card">
                                <img src="<?= base_url('assets/img/logo1.PNG'); ?>" alt="Curated Finds">
                                <span>Jastip</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mock-card">
                                <img src="<?= base_url('assets/img/logo1.PNG'); ?>" alt="Titip Belanja">
                                <span>Jastip</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mock-card">
                                <img src="<?= base_url('assets/img/logo1.PNG'); ?>" alt="Request Item">
                                <span>Jastip</span>
                            </div>
                        </div>
                    </div>

                    <div class="review-user-modern mt-4">
                        <div class="avatar-circle">J</div>
                        <div>
                            <strong>JastipinIndahAja</strong>
                            <small>Curated Shopping & Titip Beli</small>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="https://instagram.com/jastip.indahaja_" target="_blank" class="btn btn-soft btn-sm">
                            Lihat Instagram
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="portfolio-shell mb-5">
            <div class="section-topline align-items-end">
                <div>
                    <span class="section-kicker">digital catalog</span>
                    <h2>Undangan digital & greeting card</h2>
                </div>
                <p>
                    <!-- Bagian ini tetap membaca data dari backend, tapi tampilannya dibuat lebih fresh, lebih social, dan lebih modern. -->
                </p>
            </div>

            <div class="row g-4">
                <?php foreach ($product_types as $type): ?>
                    <?php
                    $items = isset($template_groups[$type->code]) ? $template_groups[$type->code] : array();
                    $allowed = array_keys($template_groups);
                    ?>
                    <?php if (in_array($type->code, $allowed) && !empty($items)): ?>
                        <?php foreach ($items as $t): ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="catalog-card h-100">
                                    <div class="catalog-thumb">
                                        <?php if (!empty($t->thumbnail)): ?>
                                            <div class="thumb-media" style="background:url('<?= html_escape($t->thumbnail); ?>') center/cover no-repeat;"></div>
                                        <?php else: ?>
                                            <div class="thumb-media" style="background:url('<?= base_url('assets/img/logo1.PNG'); ?>') center/contain no-repeat;background-color:#f8f9ff;"></div>
                                        <?php endif; ?>

                                        <div class="catalog-badges">
                                            <span class="badge-type"><?= html_escape($type->name); ?></span>
                                            <span class="badge-mini">ready</span>
                                        </div>
                                    </div>

                                    <div class="catalog-body">
                                        <h5><?= html_escape($t->name); ?></h5>
                                        <p>
                                            <?= !empty($t->description) ? html_escape($t->description) : 'Template modern yang siap dipakai dan tetap bisa disesuaikan dengan kebutuhanmu.'; ?>
                                        </p>

                                        <div class="catalog-meta">
                                            <span>clean look</span>
                                            <span>mobile friendly vibe</span>
                                        </div>

                                        <div class="template-actions mt-3">
                                            <?php if (!empty($t->demo_url)): ?>
                                                <a href="<?= html_escape($t->demo_url); ?>" target="_blank" class="btn btn-soft btn-sm">Preview</a>
                                            <?php endif; ?>
                                            <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo saya tertarik dengan ' . $t->name); ?>" class="btn btn-main btn-sm">Order Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="portfolio-shell mb-5">
            <div class="section-topline align-items-end">
                <div>
                    <span class="section-kicker">useful templates</span>
                    <h2>Spreadsheet yang nggak cuma berguna, tapi juga simpe dan enak dilihat</h2>
                </div>
                <p>
                    <!-- Cocok untuk jualan, keuangan, tracking order, dan operasional harian dengan feel yang lebih premium. -->
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="sheet-card h-100">
                        <div class="sheet-icon">📈</div>
                        <h4>Money Manager</h4>
                        <p>Untuk catat cash flow, pemasukan, pengeluaran, dan dashboard sederhana yang clean.</p>
                        <div class="sheet-preview">
                            <img src="<?= base_url('assets/img/logo1.PNG'); ?>" alt="Spreadsheet 1">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sheet-card h-100">
                        <div class="sheet-icon">🧾</div>
                        <h4>Sales Tracker</h4>
                        <p>Tracking transaksi, customer, produk, dan rekap yang lebih rapi buat usaha kecil.</p>
                        <div class="sheet-preview">
                            <img src="<?= base_url('assets/img/logo1.PNG'); ?>" alt="Spreadsheet 2">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sheet-card h-100 accent">
                        <div class="sheet-icon">✨</div>
                        <h4>Jastip Management</h4>
                        <p>Rekap event, cek barang, tracking pembayaran customer, dan nota otomatis.</p>
                        <div class="sheet-preview">
                            <img src="<?= base_url('assets/img/logo1.PNG'); ?>" alt="Spreadsheet 3">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-heading text-center mt-5 mb-4">
            <span class="section-kicker">customer words</span>
            <h2 class="section-title">Review </h2>
            <p class="section-subtitle">
                <!-- Tampilannya dibuat lebih lively, lebih social proof, dan lebih cocok untuk brand yang playful tapi tetap rapi. -->
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="review-card-modern h-100 tilt-a">
                    <div class="review-topline">
                        <span>★★★★★</span>
                        <small>gift order</small>
                    </div>
                    <h5>Packaging-nya manis banget dan feel-nya niat.</h5>
                    <p>
                        Dari tampilan sampai detail kecilnya berasa dipikirin. Cocok banget buat hadiah yang pengen kelihatan spesial.
                    </p>
                    <div class="review-user-modern">
                        <div class="avatar-circle">A</div>
                        <div>
                            <strong>Customer Gift</strong>
                            <small>Bouquet & Gift</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="review-card-modern h-100 tilt-b">
                    <div class="review-topline">
                        <span>★★★★★</span>
                        <small>digital order</small>
                    </div>
                    <h5>Fast respon, enak diajak diskusi, dan revisinya jelas.</h5>
                    <p>
                        Dari awal konsultasi sampai hasil jadi, prosesnya nyaman. Nggak ribet, tapi tetap profesional.
                    </p>
                    <div class="review-user-modern">
                        <div class="avatar-circle">B</div>
                        <div>
                            <strong>Customer Digital</strong>
                            <small>Greeting Card</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="review-card-modern h-100 tilt-c">
                    <div class="review-topline">
                        <span>★★★★★</span>
                        <small>sheet order</small>
                    </div>
                    <h5>Simple, usable, dan bikin tracking harian jauh lebih enak.</h5>
                    <p>
                        Template spreadsheet-nya nggak cuma membantu kerja, tapi juga nyaman dilihat dan gampang dipahami.
                    </p>
                    <div class="review-user-modern">
                        <div class="avatar-circle">C</div>
                        <div>
                            <strong>Customer Spreadsheet</strong>
                            <small>Custom Template</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cta-review-modern mt-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="cta-mini">ready to chat?</span>
                    <h3>Sudah lihat vibe-nya? sekarang tinggal pilih yang paling cocok.</h3>
                    <p class="mb-0">
                        Bisa konsultasi dulu, spill budget, atau langsung kirim kebutuhanmu. Kami bantu pilihkan opsi yang paling pas.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo, saya mau konsultasi dulu tentang layanan yang tersedia'); ?>" class="btn btn-main btn-lg">
                        Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    .review-page-modern {
        padding-top: 18px;
        padding-bottom: 92px;
    }

    .gallery-hero {
        padding: 42px 0 18px;
    }

    .gallery-hero-card {
        background:
            radial-gradient(circle at top left, rgba(77, 131, 246, .12), transparent 30%),
            radial-gradient(circle at bottom right, rgba(236, 72, 153, .14), transparent 28%),
            linear-gradient(135deg, #eef4ff 0%, #fff1f8 62%, #fff8da 100%);
        border: 1px solid rgba(255, 255, 255, .8);
        border-radius: 34px;
        padding: 38px;
        box-shadow: 0 24px 60px rgba(77, 131, 246, .12);
        overflow: hidden;
        position: relative;
    }

    .eyebrow-chip,
    .soft-label,
    .section-kicker,
    .cta-mini {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .72);
        border: 1px solid rgba(255, 255, 255, .9);
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: var(--pink-600);
    }

    .gallery-hero-card h1 {
        font-size: clamp(2.4rem, 5vw, 4.25rem);
        line-height: 1.02;
        font-weight: 800;
        color: var(--text-dark);
        margin: 16px 0 16px;
        max-width: 680px;
    }

    .gallery-hero-card h1 span {
        background: linear-gradient(90deg, var(--blue-600), var(--pink-500));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .gallery-hero-card p {
        max-width: 700px;
        line-height: 1.9;
        color: #64748b;
        margin-bottom: 0;
    }

    .hero-mini-points {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 24px;
    }

    .hero-mini-points span,
    .catalog-meta span {
        display: inline-flex;
        align-items: center;
        padding: 8px 12px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .7);
        border: 1px solid rgba(255, 255, 255, .88);
        font-size: 13px;
        font-weight: 700;
        color: var(--blue-700);
    }

    .hero-stat-stack {
        position: relative;
        min-height: 320px;
        height: 100%;
    }

    .stat-float {
        position: absolute;
        background: rgba(255, 255, 255, .88);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, .95);
        border-radius: 22px;
        padding: 16px 18px;
        box-shadow: 0 18px 40px rgba(77, 131, 246, .14);
        z-index: 2;
    }

    .stat-float strong {
        display: block;
        color: var(--text-dark);
        font-size: 15px;
        margin-bottom: 4px;
    }

    .stat-float small {
        color: var(--muted);
    }

    .stat-float.one {
        top: 10px;
        right: 10px;
    }

    .stat-float.two {
        bottom: 8px;
        left: 0;
    }

    .hero-preview-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
        position: absolute;
        inset: 56px 26px 48px 26px;
    }

    .preview-bubble {
        border-radius: 26px;
        display: flex;
        align-items: end;
        justify-content: start;
        padding: 18px;
        font-weight: 800;
        color: #223d6d;
        min-height: 110px;
        box-shadow: 0 20px 46px rgba(77, 131, 246, .14);
        border: 1px solid rgba(255, 255, 255, .85);
    }

    .preview-bubble.a {
        background: linear-gradient(135deg, #ffffff, #eef4ff);
    }

    .preview-bubble.b {
        background: linear-gradient(135deg, #fff4fb, #ffffff);
    }

    .preview-bubble.c {
        background: linear-gradient(135deg, #fffde8, #ffffff);
    }

    .preview-bubble.d {
        background: linear-gradient(135deg, #eefbff, #ffffff);
    }

    .portfolio-shell {
        background: rgba(255, 255, 255, .6);
        border: 1px solid rgba(230, 236, 251, .95);
        border-radius: 34px;
        padding: 28px;
        box-shadow: 0 20px 44px rgba(77, 131, 246, .07);
        backdrop-filter: blur(12px);
    }

    .section-topline {
        display: flex;
        justify-content: space-between;
        gap: 24px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .section-topline h2 {
        font-size: clamp(1.8rem, 3vw, 2.7rem);
        font-weight: 800;
        color: var(--text-dark);
        margin: 10px 0 0;
    }

    .section-topline p {
        max-width: 460px;
        margin: 0;
        line-height: 1.9;
        color: var(--muted);
    }

    .spotlight-card,
    .catalog-card,
    .sheet-card,
    .review-card-modern {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 28px;
        box-shadow: 0 18px 44px rgba(77, 131, 246, .1);
    }

    .spotlight-card {
        padding: 24px;
        height: 100%;
    }

    .spotlight-card h3,
    .sheet-card h4,
    .review-card-modern h5,
    .catalog-body h5 {
        color: var(--text-dark);
        font-weight: 800;
    }

    .spotlight-copy p,
    .sheet-card p,
    .review-card-modern p,
    .catalog-body p {
        color: var(--muted);
        line-height: 1.85;
    }

    .spotlight-gift {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        gap: 22px;
        background: linear-gradient(135deg, #ffffff 0%, #fff8fc 55%, #fffbe9 100%);
    }

    .spotlight-jastip {
        background: linear-gradient(135deg, #ffffff 0%, #f7fbff 60%, #fff7ef 100%);
    }

    .spotlight-stack {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        gap: 14px;
        align-items: stretch;
    }

    .mini-stack {
        display: grid;
        gap: 14px;
    }

    .grid-jastip {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

    .mock-card {
        position: relative;
        overflow: hidden;
        border-radius: 22px;
        background: #f8fbff;
        border: 1px solid rgba(0, 0, 0, .04);
        min-height: 180px;
    }

    .mock-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .mock-card span {
        position: absolute;
        left: 12px;
        right: 12px;
        bottom: 12px;
        display: inline-block;
        background: rgba(255, 255, 255, .88);
        backdrop-filter: blur(8px);
        border-radius: 14px;
        padding: 10px 12px;
        font-size: 13px;
        font-weight: 800;
        color: var(--text-dark);
    }

    .mock-card.tall {
        min-height: 100%;
        height: 100%;
    }

    .mock-card.small {
        height: calc(50% - 7px);
        min-height: 150px;
    }

    .mock-card.medium {
        min-height: 150px;
    }

    .mock-card.wide {
        grid-column: span 2;
        min-height: 170px;
    }

    .catalog-card {
        overflow: hidden;
        transition: .28s ease;
        height: 100%;
    }

    .catalog-card:hover,
    .sheet-card:hover,
    .review-card-modern:hover,
    .spotlight-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 26px 56px rgba(77, 131, 246, .16);
    }

    .catalog-thumb {
        padding: 14px 14px 0;
        position: relative;
    }

    .thumb-media {
        height: 250px;
        border-radius: 24px;
        background-color: #f8fbff;
    }

    .catalog-badges {
        position: absolute;
        left: 24px;
        right: 24px;
        top: 24px;
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .badge-type,
    .badge-mini {
        display: inline-flex;
        align-items: center;
        padding: 8px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
        background: rgba(255, 255, 255, .92);
        color: var(--text-dark);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .06);
    }

    .badge-mini {
        color: var(--pink-600);
    }

    .catalog-body {
        padding: 20px 20px 22px;
    }

    .catalog-body h5 {
        font-size: 1.25rem;
        margin-bottom: 10px;
    }

    .catalog-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 12px;
    }

    .sheet-card {
        padding: 24px;
        background: linear-gradient(180deg, #ffffff 0%, #fbfdff 100%);
    }

    .sheet-card.accent {
        background: linear-gradient(180deg, #fff8fc 0%, #fffdf4 100%);
    }

    .sheet-icon {
        width: 60px;
        height: 60px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        background: linear-gradient(135deg, rgba(77, 131, 246, .14), rgba(236, 72, 153, .12), rgba(245, 158, 11, .14));
        margin-bottom: 16px;
    }

    .sheet-preview {
        margin-top: 18px;
        border-radius: 22px;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, .05);
        background: #f8fbff;
    }

    .sheet-preview img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        display: block;
    }

    .review-card-modern {
        padding: 24px;
        position: relative;
        overflow: hidden;
    }

    .review-card-modern::before {
        content: "";
        position: absolute;
        inset: 0 auto auto 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, var(--blue-500), var(--pink-500), var(--yellow-400));
    }

    .tilt-a {
        transform: rotate(-1.2deg);
    }

    .tilt-b {
        transform: rotate(.7deg);
    }

    .tilt-c {
        transform: rotate(-.6deg);
    }

    .review-card-modern:hover {
        transform: translateY(-6px) rotate(0deg);
    }

    .review-topline {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
    }

    .review-topline span {
        font-size: 18px;
        letter-spacing: 2px;
    }

    .review-topline small {
        text-transform: uppercase;
        font-size: 11px;
        letter-spacing: .1em;
        color: var(--pink-600);
        font-weight: 800;
    }

    .review-user-modern {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 18px;
    }

    .avatar-circle {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        color: #223d6d;
        background: linear-gradient(135deg, #dfeaff, #ffe4f2, #fff0c4);
    }

    .review-user-modern strong {
        display: block;
        color: var(--text-dark);
        font-size: 14px;
    }

    .review-user-modern small {
        color: var(--muted);
    }

    .cta-review-modern {
        background: linear-gradient(135deg, #edf4ff 0%, #fff1f8 64%, #fff8d8 100%);
        border: 1px solid rgba(255, 255, 255, .85);
        border-radius: 32px;
        padding: 30px;
        box-shadow: 0 22px 48px rgba(77, 131, 246, .12);
    }

    .cta-review-modern h3 {
        font-size: clamp(1.7rem, 3vw, 2.35rem);
        font-weight: 800;
        color: var(--text-dark);
        margin: 14px 0 10px;
    }

    .cta-review-modern p {
        color: var(--muted);
        line-height: 1.85;
    }

    @media (max-width: 1199.98px) {
        .spotlight-gift {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 991.98px) {
        .gallery-hero-card {
            padding: 28px;
            border-radius: 28px;
        }

        .hero-stat-stack {
            min-height: 280px;
        }

        .portfolio-shell {
            padding: 20px;
            border-radius: 26px;
        }

        .tilt-a,
        .tilt-b,
        .tilt-c {
            transform: none;
        }
    }

    @media (max-width: 767.98px) {
        .gallery-hero {
            padding: 24px 0 12px;
        }

        .gallery-hero-card {
            padding: 22px;
        }

        .hero-preview-grid {
            position: static;
            margin-top: 18px;
            inset: auto;
        }

        .hero-stat-stack {
            min-height: 0;
        }

        .stat-float {
            position: static;
            margin-bottom: 12px;
        }

        .spotlight-stack,
        .grid-jastip {
            grid-template-columns: 1fr;
        }

        .mock-card.wide {
            grid-column: span 1;
        }

        .thumb-media,
        .sheet-preview img {
            height: 210px;
        }

        .cta-review-modern {
            padding: 22px;
            border-radius: 24px;
        }
    }
</style>