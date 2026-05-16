<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?> | <?= html_escape($brand_name); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jastip, bouquet, gift, undangan digital, greeting card, dan template aesthetic. Titip beli area Malang, Batu, Trawas dengan flow mudah dan fast response.">
    <meta name="keywords" content="jastip malang, jastip trawas, titip beli malang, titip cafe trawas, jastip dessert malang, oleh-oleh malang, jastip batu, gift malang, bouquet malang, undangan digital malang">
    <meta property="og:title" content="<?= html_escape($page_title); ?> | <?= html_escape($brand_name); ?>">
    <meta property="og:description" content="Cute local jastip, gift, digital invitation, and spreadsheet template service for Malang, Batu, and Trawas area.">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#fff8ec">

    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600;1,700&family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/css/local-pretty.css'); ?>?v=20260514" rel="stylesheet">
    <style>
        .local-photo-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px
        }

        .local-photo-card {
            background: #fff;
            border: 1px solid rgba(63, 46, 36, .08);
            border-radius: 28px;
            padding: 12px;
            box-shadow: 0 18px 50px rgba(63, 46, 36, .07)
        }

        .local-photo-square {
            position: relative;
            aspect-ratio: 1/1;
            border-radius: 22px;
            background: linear-gradient(135deg, #efe0c8, #f8ead2);
            background-size: cover;
            background-position: center;
            overflow: hidden
        }

        .local-photo-tag {
            position: absolute;
            left: 12px;
            bottom: 12px;
            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(10px);
            border-radius: 999px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 800;
            color: #3f2e24
        }

        .local-photo-copy {
            padding: 14px 6px 4px
        }

        .local-photo-copy h3 {
            font-size: 18px;
            margin: 0 0 5px;
            font-weight: 800
        }

        .local-photo-copy p {
            font-size: 14px;
            margin: 0;
            color: #8a7665
        }

        .moodboard .pin {
            background-size: cover;
            background-position: center
        }

        .review-thumb.is-photo {
            background-size: cover;
            background-position: center;
            color: transparent
        }

        .review-thumb.is-photo span {
            color: #3f2e24;
            background: rgba(255, 255, 255, .88);
            border-radius: 999px;
            padding: 6px 10px;
            font-size: 12px;
            font-weight: 800
        }

        .preview-nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px
        }

        .preview-nav a {
            background: #fff;
            border: 1px solid rgba(63, 46, 36, .08);
            border-radius: 999px;
            padding: 10px 16px;
            color: #3f2e24;
            text-decoration: none;
            font-weight: 800;
            font-size: 14px;
            box-shadow: 0 12px 30px rgba(63, 46, 36, .06)
        }

        .template-preview-frame {
            min-height: 230px;
            border-radius: 24px;
            background: linear-gradient(135deg, #f8ead2, #efe0c8);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden
        }

        .template-preview-frame img {
            width: 100%;
            height: 100%;
            min-height: 230px;
            object-fit: cover
        }

        .template-preview-frame span {
            background: rgba(255, 255, 255, .88);
            border-radius: 999px;
            padding: 10px 16px;
            font-weight: 800
        }

        .preview-plain-card {
            min-height: 230px;
            border-radius: 24px;
            background: linear-gradient(135deg, #f8ead2, #efe0c8);
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end
        }

        .preview-plain-card.mint {
            background: linear-gradient(135deg, #f1ead7, #f8ead2)
        }

        .preview-plain-card.dark {
            background: linear-gradient(135deg, #3f2e24, #6f5a48);
            color: #fff
        }

        .sheet-topbar {
            height: 34px;
            border-radius: 16px 16px 0 0;
            background: #3f2e24;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 0 12px
        }

        .sheet-topbar span {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #fff;
            opacity: .75
        }

        .sheet-grid-preview {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 1px;
            background: #f4eadb;
            border: 1px solid rgba(63, 46, 36, .08);
            border-top: 0;
            border-radius: 0 0 16px 16px;
            overflow: hidden
        }

        .sheet-grid-preview i {
            height: 26px;
            background: #fff
        }

        .sheet-grid-preview i:nth-child(3n) {
            background: #f8ead2
        }

        .sheet-grid-preview i:nth-child(5n) {
            background: #efe0c8
        }

        .spreadsheet-card {
            overflow: hidden
        }



        /* Pastel brown + soft yellow theme override */
        :root {
            --cream: #fff8ec;
            --cream-2: #f8ead2;
            --butter: #f7e7b7;
            --sand: #efe0c8;
            --caramel: #ddb892;
            --brown: #8b5e34;
            --brown-2: #7f4f24;
            --ink: #3f2e24;
            --body: #6f5a48;
            --muted: #8a7665;
            --line: rgba(63, 46, 36, .10);
            --shadow: 0 18px 50px rgba(63, 46, 36, .08);
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(247, 231, 183, .65), transparent 34%),
                radial-gradient(circle at 90% 8%, rgba(221, 184, 146, .32), transparent 30%),
                linear-gradient(180deg, var(--cream) 0%, #fff 48%, var(--cream-2) 100%);
            color: var(--ink);
        }

        .pretty-nav,
        .card-pretty,
        .price-card,
        .contact-card,
        .social-card,
        .flow-card,
        .area-card,
        .seo-box,
        .cta-panel,
        .page-hero-shell,
        .local-photo-card,
        .preview-nav a {
            background: rgba(255, 255, 255, .88) !important;
            border-color: var(--line) !important;
            box-shadow: var(--shadow) !important;
        }

        .hero-local,
        .page-hero,
        .section-soft {
            background:
                radial-gradient(circle at 15% 10%, rgba(247, 231, 183, .70), transparent 32%),
                radial-gradient(circle at 86% 16%, rgba(221, 184, 146, .32), transparent 30%),
                linear-gradient(135deg, var(--cream) 0%, #fff 48%, var(--cream-2) 100%) !important;
        }

        .hero-wrap,
        .stat-strip {
            background: rgba(255, 255, 255, .72) !important;
            border: 1px solid var(--line) !important;
            box-shadow: var(--shadow) !important;
        }

        .brand-dot,
        .icon-bubble,
        .flow-no {
            background: linear-gradient(135deg, var(--butter), var(--caramel)) !important;
            color: var(--brown-2) !important;
        }

        .kicker,
        .section-kicker,
        .pill,
        .local-photo-tag,
        .label {
            background: rgba(247, 231, 183, .66) !important;
            border: 1px solid rgba(139, 94, 52, .16) !important;
            color: var(--brown-2) !important;
        }

        .hero-title,
        .section-title,
        .page-title,
        .card-pretty h3,
        .price,
        .cta-panel h2,
        .seo-box h2,
        .brand-mark,
        .nav-link {
            color: var(--ink) !important;
        }

        .script {
            color: var(--brown) !important;
        }

        .hero-copy,
        .section-subtitle,
        .card-pretty p,
        .flow-card p,
        .local-photo-copy p,
        .footer p,
        .footer small {
            color: var(--muted) !important;
        }

        .btn-main,
        .nav-cta,
        .sticky-wa {
            background: linear-gradient(135deg, var(--brown), #d9a441) !important;
            border-color: transparent !important;
            color: #fffdf8 !important;
            box-shadow: 0 16px 34px rgba(139, 94, 52, .20) !important;
        }

        .btn-soft {
            background: #fffaf0 !important;
            border-color: rgba(139, 94, 52, .16) !important;
            color: var(--brown-2) !important;
        }

        .moodboard .pin,
        .gallery-img,
        .local-photo-square,
        .template-preview-frame,
        .preview-plain-card {
            background-color: var(--sand) !important;
        }

        .moodboard .pin.mint,
        .gallery-img.mint,
        .preview-plain-card.mint {
            background-color: #f1ead7 !important;
        }

        .moodboard .pin.dark,
        .gallery-img.dark,
        .preview-plain-card.dark {
            background-color: var(--ink) !important;
            color: #fff8ec !important;
        }

        .sheet-topbar {
            background: linear-gradient(135deg, var(--ink), #8b5e34) !important;
            color: #fff8ec !important;
        }

        .moodboard .pin.lav,
        .preview-plain-card.lav {
            background-color: #f5e7c6 !important;
        }

        /* IMPORTANT:
           Jangan pakai background: ... !important di class gambar,
           karena akan menimpa inline background-image:url(...) dari PHP.
           Ini memastikan buket1/2/3 dan jastip1/2/3 tetap muncul. */
        .moodboard .pin[style*="background-image"],
        .gallery-img[style*="background-image"],
        .local-photo-square[style*="background-image"],
        .review-thumb[style*="background-image"] {
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
        }

        .footer {
            background: linear-gradient(135deg, #3f2e24, #7f4f24) !important;
            color: #fff8ec !important;
        }

        .footer a,
        .footer strong {
            color: #fff8ec !important;
        }

        .sheet-grid-preview,
        .sheet-grid-preview i:nth-child(3n),
        .sheet-grid-preview i:nth-child(5n) {
            background-color: #f8ead2;
        }

        @media(max-width:991px) {
            .local-photo-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media(max-width:575px) {
            .local-photo-grid {
                grid-template-columns: 1fr
            }

            .local-photo-card {
                border-radius: 24px
            }

            .local-photo-square {
                border-radius: 18px
            }
        }

        .template-card {
            border-radius: 24px;
            padding: 18px;
            height: 100%;
        }

        .template-preview-frame {
            height: 260px;
            border-radius: 20px;
            overflow: hidden;
            background: #f8f3eb;
        }

        .template-preview-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .template-desc {
            min-height: 72px;
            line-height: 1.7;
        }

        .review-static-section {
            background: linear-gradient(180deg, #fffaf1 0%, #f6ead8 100%);
        }

        .review-static-card {
            height: 100%;
            padding: 26px;
            border-radius: 24px;
            background: rgba(255, 255, 255, .78);
            border: 1px solid rgba(176, 137, 104, .22);
            box-shadow: 0 18px 40px rgba(111, 78, 55, .10);
            display: flex;
            flex-direction: column;
        }

        .review-stars {
            color: #d6a84f;
            letter-spacing: 3px;
            font-size: 15px;
            margin-bottom: 16px;
        }

        .review-static-card p {
            color: #6f4e37;
            line-height: 1.75;
            margin-bottom: 24px;
            flex-grow: 1;
        }

        .review-user {
            padding-top: 18px;
            border-top: 1px solid rgba(176, 137, 104, .18);
        }

        .review-user strong {
            display: block;
            color: #5c4033;
            font-size: 15px;
        }

        .review-user span {
            display: block;
            color: #a07b5f;
            font-size: 13px;
            margin-top: 3px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top pretty-nav">
        <div class="container">
            <a class="navbar-brand brand-mark" href="<?= site_url(); ?>">
                <span class="brand-dot">I</span>
                <span><?= html_escape($brand_name); ?></span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item"><a class="nav-link" href="<?= site_url(); ?>#services">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url(); ?>#jastip">Jastip</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url(); ?>#buket">Bouquet</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('cara_order'); ?>">Cara Order</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('review'); ?>">Galery</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('kontak'); ?>">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link nav-cta" href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo kak, aku mau titip/order dari website.'); ?>">Titip Sekarang</a></li>
                </ul>
            </div>
        </div>
    </nav>