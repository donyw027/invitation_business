<section class="review-hero">
    <div class="container">
        <div class="review-hero-box text-center">
            <span class="hero-badge">Gallery • Preview • Testimoni</span>
            <h1>Gallery & Review</h1>
            <p>
                Lihat beberapa hasil layanan kami, mulai dari gift, jastip, undangan digital,
                greeting card, sampai spreadsheet template yang siap dipakai.
            </p>
        </div>
    </div>
</section>

<section class="section review-page">
    <div class="container">

        <!-- ================= INTRO ================= -->
        <!-- <div class="section-heading text-center mb-5">
            <h2 class="section-title">Portofolio Layanan Kami</h2>
            <p class="section-subtitle">
                Kami buat semuanya dengan gaya yang simple, manis, modern, dan tetap fungsional.
            </p>
        </div> -->

        <!-- ================= MYSIMPLE GIFT ================= -->
        <div class="service-block mb-5">
            <div class="service-block-head">
                <div>
                    <span class="service-kicker">Gift & Bouquet</span>
                    <h3>🎁 MySimpleGift</h3>
                    <p>
                        Inspirasi bouquet, gift, dan hampers untuk wisuda, ulang tahun,
                        anniversary, dan momen spesial lainnya.
                    </p>
                </div>
                <div class="service-action">
                    <a href="https://instagram.com/mysimple.gift" target="_blank" class="btn btn-soft">
                        Lihat di Instagram
                    </a>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="gallery-card">
                        <img src="<?= base_url('assets/img/logo1.PNG'); ?>" class="img-fluid" alt="MySimpleGift 1">
                        <div class="gallery-overlay">
                            <span>Bouquet Gift</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-card">
                        <img src="<?= base_url('assets/img/logo1.PNG'); ?>" class="img-fluid" alt="MySimpleGift 2">
                        <div class="gallery-overlay">
                            <span>Bouquet Gift</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-card">
                        <img src="<?= base_url('assets/img/logo1.PNG'); ?>" class="img-fluid" alt="MySimpleGift 3">
                        <div class="gallery-overlay">
                            <span>Bouquet Gift</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= JASTIP ================= -->
        <div class="service-block mb-5">
            <div class="service-block-head">
                <div>
                    <span class="service-kicker">Jastip & Titip Beli</span>
                    <h3>🛍️ JastipinIndahAja</h3>
                    <p>
                        Beberapa hasil belanja titipan dan rekomendasi item yang biasa dicari customer.
                    </p>
                </div>
                <div class="service-action">
                    <a href="https://instagram.com/jastip.indahaja_" target="_blank" class="btn btn-soft">
                        Lihat di Instagram
                    </a>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="gallery-card">
                        <img src="<?= base_url('assets/img/logo1.PNG'); ?>" class="img-fluid" alt="Jastip 1">
                        <div class="gallery-overlay">
                            <span>JastipinIndahAja</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-card">
                        <img src="<?= base_url('assets/img/logo1.PNG'); ?>" class="img-fluid" alt="Jastip 2">
                        <div class="gallery-overlay">
                            <span>JastipinIndahAja</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-card">
                        <img src="<?= base_url('assets/img/logo1.PNG'); ?>" class="img-fluid" alt="Jastip 3">
                        <div class="gallery-overlay">
                            <span>JastipinIndahAja</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= DIGITAL ================= -->
        <div class="service-block mb-5">
            <div class="service-block-head">
                <div>
                    <span class="service-kicker">Digital Invitation & Greeting</span>
                    <h3>💌 Undangan Digital & Greeting Card</h3>
                    <p>
                        Pilihan template digital yang modern, elegan, dan bisa disesuaikan dengan kebutuhan acara kamu.
                    </p>
                </div>
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
                                <div class="template-card h-100">
                                    <div class="template-thumb">
                                        <?php if (!empty($t->thumbnail)): ?>
                                            <div class="thumb-bg"
                                                style="background:url('<?= html_escape($t->thumbnail); ?>') center/cover no-repeat;">
                                            </div>
                                        <?php else: ?>
                                            <div class="thumb-bg"
                                                style="background:url('<?= base_url('assets/img/logo1.PNG'); ?>') center/contain no-repeat; background-color:#f8f9ff;">
                                            </div>
                                        <?php endif; ?>

                                        <span class="template-badge"><?= html_escape($type->name); ?></span>
                                    </div>

                                    <div class="template-body">
                                        <h5><?= html_escape($t->name); ?></h5>
                                        <p>
                                            <?= !empty($t->description) ? html_escape($t->description) : 'Template cantik yang siap dipakai dan bisa disesuaikan dengan kebutuhanmu.'; ?>
                                        </p>

                                        <div class="template-actions">
                                            <?php if (!empty($t->demo_url)): ?>
                                                <a href="<?= html_escape($t->demo_url); ?>" target="_blank" class="btn btn-soft btn-sm">
                                                    Preview
                                                </a>
                                            <?php endif; ?>

                                            <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo saya tertarik dengan ' . $t->name); ?>"
                                                class="btn btn-main btn-sm">
                                                Order Sekarang
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ================= SPREADSHEET ================= -->
        <div class="service-block mb-5">
            <div class="service-block-head">
                <div>
                    <span class="service-kicker">Template Siap Pakai</span>
                    <h3>📊 Spreadsheet Template</h3>
                    <p>
                        Cocok untuk pencatatan jualan, keuangan, order, dan kebutuhan operasional harian.
                    </p>
                </div>
                <div class="service-action">
                    <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo saya tertarik dengan Spreadsheetnya'); ?>" target="_blank" class="btn btn-soft">
                        Tanya Spreadsheet
                    </a>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="gallery-card spreadsheet-card">
                        <img src="<?= base_url('assets/img/logo1.PNG'); ?>" class="img-fluid" alt="Spreadsheet 1">
                        <div class="gallery-overlay">
                            <span>Template Spreadsheet</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-card spreadsheet-card">
                        <img src="<?= base_url('assets/img/logo1.PNG'); ?>" class="img-fluid" alt="Spreadsheet 2">
                        <div class="gallery-overlay">
                            <span>Template Spreadsheet</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-card spreadsheet-card">
                        <img src="<?= base_url('assets/img/logo1.PNG'); ?>" class="img-fluid" alt="Spreadsheet 3">
                        <div class="gallery-overlay">
                            <span>Template Spreadsheet</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= REVIEW ================= -->
        <div class="section-heading text-center mt-5 mb-4">
            <h2 class="section-title">Customer Review</h2>
            <p class="section-subtitle">
                Beberapa kesan dari customer yang sudah order layanan kami 💛
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="review-box h-100">
                    <div class="review-stars">★★★★★</div>
                    <h5>Packaging-nya manis banget</h5>
                    <p>
                        Gift-nya rapi, cantik, dan terasa dipersiapkan dengan niat. Cocok banget buat hadiah spesial.
                    </p>
                    <div class="review-user">
                        <div class="review-avatar">A</div>
                        <div>
                            <strong>Customer Gift</strong>
                            <small>Order Bouquet</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="review-box h-100">
                    <div class="review-stars">★★★★★</div>
                    <h5>Fast respon & enak diajak diskusi</h5>
                    <p>
                        Dari awal tanya sampai order jadi, prosesnya jelas dan nyaman. Revisi juga dibantu dengan baik.
                    </p>
                    <div class="review-user">
                        <div class="review-avatar">B</div>
                        <div>
                            <strong>Customer Digital</strong>
                            <small>Order Greeting Card</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="review-box h-100">
                    <div class="review-stars">★★★★★</div>
                    <h5>Simple tapi sangat kepake</h5>
                    <p>
                        Template spreadsheet-nya bantu banget buat pencatatan harian. Tampilan rapi dan gampang dipakai.
                    </p>
                    <div class="review-user">
                        <div class="review-avatar">C</div>
                        <div>
                            <strong>Customer Spreadsheet</strong>
                            <small>Order Custom Sheet</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= CTA ================= -->
        <div class="cta-review mt-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="cta-mini">Masih bingung pilih layanan?</span>
                    <h3>Tanya dulu aja, biar kami bantu kasih opsi yang paling cocok.</h3>
                    <p class="mb-0">
                        Bisa tanya-tanya dulu sebelum order. Tinggal chat, spill kebutuhan dan budget kamu ✨
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo, saya mau Tanya dulu tentang layanan yang tersedia'); ?>"
                        class="btn btn-main btn-lg">
                        Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    .review-page {
        padding-top: 10px;
        padding-bottom: 80px;
    }

    .review-hero {
        padding: 40px 0 10px;
    }

    .review-hero-box {
        background: linear-gradient(135deg, #fff7fb 0%, #fffef7 100%);
        border: 1px solid rgba(0, 0, 0, .05);
        border-radius: 28px;
        padding: 55px 24px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, .06);
    }

    .hero-badge {
        display: inline-block;
        background: #fff;
        color: #ff6fae;
        border: 1px solid rgba(255, 111, 174, .18);
        border-radius: 999px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .review-hero-box h1 {
        font-size: 42px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 14px;
    }

    .review-hero-box p {
        max-width: 760px;
        margin: 0 auto;
        color: #6b7280;
        font-size: 16px;
        line-height: 1.8;
    }

    .section-heading {
        max-width: 760px;
        margin-left: auto;
        margin-right: auto;
    }

    .service-block {
        background: #fff;
        border: 1px solid rgba(0, 0, 0, .06);
        border-radius: 28px;
        padding: 28px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.05);
    }

    .service-block-head {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 20px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .service-kicker {
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: #f59e0b;
        margin-bottom: 8px;
    }

    .service-block-head h3 {
        font-size: 28px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 10px;
    }

    .service-block-head p {
        margin-bottom: 0;
        color: #6b7280;
        line-height: 1.8;
        max-width: 760px;
    }

    .gallery-card {
        position: relative;
        overflow: hidden;
        border-radius: 22px;
        background: #f8fafc;
        border: 1px solid rgba(0, 0, 0, .05);
        height: 100%;
        min-height: 270px;
        box-shadow: 0 14px 35px rgba(15, 23, 42, 0.05);
    }

    .gallery-card img {
        width: 100%;
        height: 270px;
        object-fit: cover;
        display: block;
    }

    .gallery-overlay {
        position: absolute;
        left: 14px;
        right: 14px;
        bottom: 14px;
        background: rgba(255, 255, 255, .92);
        backdrop-filter: blur(6px);
        border-radius: 16px;
        padding: 12px 14px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
    }

    .gallery-overlay span {
        display: block;
        font-size: 14px;
        font-weight: 700;
        color: #1f2937;
    }

    .template-card {
        background: #fff;
        border: 1px solid rgba(0, 0, 0, .06);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 16px 40px rgba(15, 23, 42, 0.05);
        transition: all .25s ease;
    }

    .template-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 45px rgba(15, 23, 42, 0.08);
    }

    .template-thumb {
        position: relative;
        padding: 14px 14px 0;
    }

    .thumb-bg {
        height: 240px;
        border-radius: 20px;
        background-color: #f8fafc;
    }

    .template-badge {
        position: absolute;
        top: 26px;
        left: 26px;
        background: rgba(255, 255, 255, .95);
        color: #111827;
        font-size: 12px;
        font-weight: 700;
        border-radius: 999px;
        padding: 8px 12px;
        box-shadow: 0 8px 18px rgba(0, 0, 0, .08);
    }

    .template-body {
        padding: 20px 20px 22px;
    }

    .template-body h5 {
        font-size: 20px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 10px;
    }

    .template-body p {
        color: #6b7280;
        line-height: 1.75;
        min-height: 78px;
        margin-bottom: 18px;
    }

    .template-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .review-box {
        background: linear-gradient(180deg, #ffffff 0%, #fffdf8 100%);
        border: 1px solid rgba(0, 0, 0, .06);
        border-radius: 24px;
        padding: 24px;
        box-shadow: 0 16px 38px rgba(15, 23, 42, .05);
    }

    .review-stars {
        font-size: 18px;
        letter-spacing: 2px;
        margin-bottom: 14px;
    }

    .review-box h5 {
        font-size: 22px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 12px;
    }

    .review-box p {
        color: #6b7280;
        line-height: 1.8;
        margin-bottom: 18px;
    }

    .review-user {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .review-avatar {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: linear-gradient(135deg, #ffd7e8, #ffe8a3);
        color: #111827;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .review-user strong {
        display: block;
        color: #1f2937;
        font-size: 14px;
    }

    .review-user small {
        color: #9ca3af;
        font-size: 13px;
    }

    .cta-review {
        background: linear-gradient(135deg, #fff6fb 0%, #fffced 100%);
        border: 1px solid rgba(0, 0, 0, .06);
        border-radius: 28px;
        padding: 32px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, .05);
    }

    .cta-mini {
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: #f59e0b;
        margin-bottom: 10px;
    }

    .cta-review h3 {
        font-size: 30px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 10px;
    }

    .cta-review p {
        color: #6b7280;
        line-height: 1.8;
    }

    @media (max-width: 991.98px) {
        .review-hero-box h1 {
            font-size: 34px;
        }

        .service-block-head h3 {
            font-size: 24px;
        }

        .cta-review h3 {
            font-size: 24px;
        }
    }

    @media (max-width: 767.98px) {
        .review-hero {
            padding-top: 24px;
        }

        .review-hero-box {
            padding: 36px 18px;
            border-radius: 22px;
        }

        .review-hero-box h1 {
            font-size: 28px;
        }

        .service-block {
            padding: 20px;
            border-radius: 22px;
        }

        .gallery-card img,
        .thumb-bg {
            height: 220px;
        }

        .template-body p {
            min-height: auto;
        }

        .cta-review {
            padding: 24px 20px;
        }
    }
</style>