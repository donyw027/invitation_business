<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?> | <?= html_escape($brand_name); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MySimpleGift, JastipinIndahAja, dan template spreadsheet yang simpel, estetik, dan useful.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue-500: #4d83f6;
            --blue-600: #2f68e3;
            --blue-700: #224fb8;
            --pink-500: #ec4899;
            --pink-600: #db2777;
            --yellow-400: #fbbf24;
            --yellow-500: #f59e0b;
            --text: #5e6d83;
            --text-dark: #243b6b;
            --muted: #738198;
            --line: #e6ecfb;
            --soft: #f8fbff;
            --white: #ffffff;
            --shadow-sm: 0 10px 26px rgba(77, 131, 246, .08);
            --shadow-md: 0 18px 44px rgba(77, 131, 246, .12);
            --shadow-lg: 0 30px 70px rgba(77, 131, 246, .16);
            --radius-xl: 32px;
            --radius-lg: 24px;
            --radius-md: 18px;
            --radius-sm: 14px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(77, 131, 246, .04), transparent 22%),
                radial-gradient(circle at bottom right, rgba(236, 72, 153, .05), transparent 25%),
                linear-gradient(180deg, #fcfdff 0%, #f8fbff 45%, #fffaf7 100%);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background: rgba(255, 255, 255, .88) !important;
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(230, 236, 251, .95) !important;
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--text-dark) !important;
            font-size: 1.08rem;
        }

        .nav-link {
            color: #66768e !important;
            font-weight: 700;
        }

        .nav-link:hover {
            color: var(--pink-500) !important;
        }

        .btn {
            border-radius: 16px;
            padding: .9rem 1.2rem;
            font-weight: 700;
            transition: .25s ease;
        }

        .btn-main {
            color: #fff;
            border: none;
            background: linear-gradient(135deg, var(--blue-500) 0%, var(--pink-500) 65%, var(--yellow-400) 100%);
            box-shadow: 0 16px 34px rgba(236, 72, 153, .18);
        }

        .btn-main:hover {
            color: #fff;
            transform: translateY(-2px);
            background: linear-gradient(135deg, var(--blue-600) 0%, var(--pink-600) 65%, var(--yellow-500) 100%);
        }

        .btn-soft {
            background: #fff;
            color: var(--blue-700);
            border: 1px solid #dfe8ff;
            box-shadow: var(--shadow-sm);
        }

        .btn-soft:hover {
            color: var(--pink-600);
            background: #fff8fc;
            border-color: #f1c9df;
        }

        .section {
            padding: 90px 0;
        }

        .section-light {
            background: linear-gradient(180deg, #f8fbff 0%, #fffaf5 100%);
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 12px;
        }

        .section-subtitle {
            max-width: 800px;
            margin: 0 auto;
            color: var(--muted);
            line-height: 1.9;
        }

        .hero {
            padding: 120px 0 92px;
            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, .45), transparent 28%),
                radial-gradient(circle at bottom right, rgba(255, 255, 255, .18), transparent 28%),
                linear-gradient(135deg, #e8f0ff 0%, #dbe7ff 24%, #ffe2f2 64%, #fff2bc 100%);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, .78);
            color: var(--pink-600);
            border: 1px solid rgba(255, 255, 255, .9);
            padding: 10px 18px;
            border-radius: 999px;
            font-size: .92rem;
            font-weight: 800;
            box-shadow: var(--shadow-sm);
            margin-bottom: 22px;
        }

        .hero h1 {
            font-size: clamp(2.7rem, 5vw, 4.7rem);
            font-weight: 800;
            line-height: 1.03;
            color: #223d6d;
            margin-bottom: 18px;
        }

        .hero p {
            font-size: 1.05rem;
            line-height: 1.9;
            color: #5f7088;
            max-width: 700px;
        }

        .hero-points {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 24px;
        }

        .hero-point {
            padding: 10px 14px;
            background: rgba(255, 255, 255, .68);
            border: 1px solid rgba(255, 255, 255, .85);
            border-radius: 999px;
            font-size: .9rem;
            color: var(--blue-700);
            font-weight: 700;
        }

        .card-soft,
        .service-card,
        .price-card,
        .faq-card,
        .gallery-card,
        .review-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 28px;
            box-shadow: var(--shadow-md);
            transition: .28s ease;
            height: 100%;
        }

        .service-card,
        .faq-card,
        .review-card,
        .gallery-card,
        .card-soft {
            padding: 26px;
        }

        .service-card:hover,
        .price-card:hover,
        .faq-card:hover,
        .gallery-card:hover,
        .review-card:hover,
        .card-soft:hover {
            transform: translateY(-5px);
            box-shadow: 0 28px 60px rgba(77, 131, 246, .18);
        }

        .icon-badge {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            font-weight: 800;
            color: #fff;
            background: linear-gradient(135deg, var(--blue-500), var(--pink-500), var(--yellow-400));
            box-shadow: 0 12px 24px rgba(77, 131, 246, .18);
            margin-bottom: 18px;
        }

        .service-card h5,
        .faq-card h5,
        .review-card h5,
        .gallery-card h5,
        .card-soft h5 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .service-card p,
        .faq-card p,
        .review-card p,
        .gallery-card p,
        .card-soft p {
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 0;
        }

        .price-card {
            overflow: hidden;
            position: relative;
        }

        .price-card .card-body {
            padding: 28px;
        }

        .price-card.featured {
            border: 1.5px solid #d7e4ff;
            box-shadow: 0 28px 60px rgba(77, 131, 246, .2);
        }

        .price-card.featured::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 6px;
            background: linear-gradient(90deg, var(--blue-500), var(--pink-500), var(--yellow-400));
        }

        .price-type-label {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: .82rem;
            font-weight: 800;
            color: var(--text-dark);
            background: linear-gradient(135deg, #eef4ff, #fff4fb, #fff8dc);
        }

        .price-name {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-top: 16px;
            margin-bottom: 10px;
        }

        .price-amount {
            font-size: 2rem;
            font-weight: 800;
            color: var(--blue-600);
            line-height: 1.1;
            margin-bottom: 10px;
        }

        .price-desc {
            color: var(--muted);
            margin: 12px 0 18px;
            line-height: 1.8;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0 0 22px;
        }

        .feature-list li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 10px;
            color: #63758b;
            line-height: 1.75;
        }

        .feature-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            top: 0;
            font-weight: 800;
            color: var(--pink-500);
        }

        .footer {
            background: linear-gradient(135deg, var(--blue-700) 0%, var(--blue-500) 45%, var(--pink-500) 78%, var(--yellow-400) 100%);
            color: rgba(255, 255, 255, .95);
            padding: 34px 0;
        }

        .footer strong,
        .footer a {
            color: #fff;
        }

        .page-hero {
            padding: 120px 0 70px;
            background: linear-gradient(135deg, #edf4ff 0%, #fff3fb 58%, #fff8d8 100%);
        }

        .page-hero h1 {
            font-weight: 800;
            color: var(--text-dark);
        }

        .page-hero p {
            color: var(--muted);
            max-width: 760px;
            margin: 0 auto;
            line-height: 1.9;
        }

        .gallery-box {
            height: 240px;
            border-radius: 22px;
            background: linear-gradient(135deg, #f4f8ff, #fff2fa, #fff9df);
            border: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            font-weight: 700;
            text-align: center;
            padding: 20px;
        }

        @media (max-width: 991.98px) {
            .section {
                padding: 76px 0;
            }

            .hero {
                padding: 98px 0 74px;
            }

            .hero h1 {
                font-size: clamp(2.2rem, 8vw, 3.5rem);
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url(); ?>">
                <?= html_escape($brand_name); ?>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <!-- <li class="nav-item"><a class="nav-link" href="<?= site_url(); ?>#mysimplegift">MySimpleGift</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url(); ?>#jastip">Jastip</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url(); ?>#spreadsheet">Spreadsheet</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="<?= site_url(''); ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('cara_order'); ?>">Cara Order</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="<?= site_url('faq'); ?>">FAQ</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('review'); ?>">Review / Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('kontak'); ?>">Kontak</a></li>
                    <li class="nav-item ms-lg-2">
                        <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20bertanya%20tentang%20layanan%20kami" class="btn btn-main">
                            Order Sekarang
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>