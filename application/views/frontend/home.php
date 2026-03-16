<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MySimple & JastipinAja - undangan digital, greeting card, bouquet, gift, hampers, serta jasa titip skincare, makanan, dan berbagai kebutuhan lainnya.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- PINK  <style>
        :root {
            --pink-50: #fff7fb;
            --pink-100: #ffe7f1;
            --pink-200: #ffd2e4;
            --pink-300: #ffb7d3;
            --pink-400: #ff8fbe;
            --pink-500: #f45aa0;
            --pink-600: #e63d8c;
            --pink-700: #c92a74;

            --yellow-50: #fffdf4;
            --yellow-100: #fff7d6;
            --yellow-200: #fde68a;
            --yellow-300: #fcd34d;
            --yellow-400: #fbbf24;
            --yellow-500: #f59e0b;

            --cream: #fffaf5;
            --soft: #fff8fb;
            --soft-2: #fffdf7;
            --text: #5d3650;
            --text-dark: #8f1f5e;
            --muted: #8a7280;
            --line: #f5d7e6;
            --white: #ffffff;

            --shadow-sm: 0 10px 25px rgba(244, 90, 160, .08);
            --shadow-md: 0 20px 45px rgba(244, 90, 160, .12);
            --shadow-lg: 0 26px 70px rgba(244, 90, 160, .16);
            --radius: 24px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(180deg, #fffdfd 0%, #fff7fb 40%, #fffdf7 100%);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background: rgba(255, 255, 255, .88) !important;
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(245, 215, 230, .9) !important;
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--text-dark) !important;
            letter-spacing: .2px;
        }

        .nav-link {
            color: #7c6671 !important;
            font-weight: 700;
            transition: .2s ease;
        }

        .nav-link:hover {
            color: var(--pink-600) !important;
        }

        .btn {
            border-radius: 16px;
            padding: .9rem 1.25rem;
            font-weight: 700;
            transition: .25s ease;
        }

        .btn-main {
            color: #fff;
            border: none;
            background: linear-gradient(135deg, var(--pink-500), var(--yellow-400));
            box-shadow: 0 14px 28px rgba(244, 90, 160, .24);
        }

        .btn-main:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 18px 38px rgba(244, 90, 160, .28);
            background: linear-gradient(135deg, var(--pink-600), var(--yellow-500));
        }

        .btn-soft {
            background: #fff;
            color: var(--pink-700);
            border: 1px solid #f6d4e3;
            box-shadow: var(--shadow-sm);
        }

        .btn-soft:hover {
            color: var(--pink-700);
            background: #fff8fb;
            border-color: #efbdd4;
            transform: translateY(-2px);
        }

        .btn-outline-soft {
            background: transparent;
            color: var(--pink-700);
            border: 1.5px solid #efbfd4;
        }

        .btn-outline-soft:hover {
            background: #fff3f9;
            color: var(--pink-700);
            border-color: var(--pink-400);
        }

        .section {
            padding: 95px 0;
            position: relative;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 14px;
            letter-spacing: -.02em;
        }

        .section-subtitle {
            max-width: 760px;
            margin: 0 auto;
            color: var(--muted);
            line-height: 1.9;
        }

        .hero {
            position: relative;
            overflow: hidden;
            padding: 115px 0 90px;
            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, .45), transparent 28%),
                radial-gradient(circle at bottom right, rgba(255, 255, 255, .3), transparent 25%),
                linear-gradient(135deg, #ffd8eb 0%, #ffc8df 28%, #ffe59d 100%);
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .28);
            top: -120px;
            right: -100px;
            filter: blur(10px);
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .2);
            bottom: -100px;
            left: -60px;
            filter: blur(12px);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, .72);
            color: var(--pink-700);
            border: 1px solid rgba(255, 255, 255, .7);
            padding: 10px 18px;
            border-radius: 999px;
            font-size: .92rem;
            font-weight: 800;
            box-shadow: var(--shadow-sm);
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: clamp(2.6rem, 5vw, 4.7rem);
            font-weight: 800;
            line-height: 1.05;
            color: #8d1d5b;
            letter-spacing: -.04em;
            margin-bottom: 18px;
        }

        .hero p {
            font-size: 1.05rem;
            line-height: 1.95;
            color: #7a5769;
            max-width: 680px;
            margin-bottom: 0;
        }

        .hero-actions {
            margin-top: 30px;
        }

        .hero-points {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 26px;
        }

        .hero-point {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            background: rgba(255, 255, 255, .65);
            border: 1px solid rgba(255, 255, 255, .75);
            border-radius: 999px;
            font-size: .9rem;
            color: #8d1d5b;
            font-weight: 700;
        }

        .hero-card {
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(255, 255, 255, .95);
            border-radius: 30px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        .hero-card-top {
            padding: 28px 28px 18px;
            background: linear-gradient(135deg, #fff7fb, #fffdf4);
            border-bottom: 1px solid #f7dbe7;
        }

        .hero-card-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .hero-card-text {
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 0;
        }

        .hero-card-body {
            padding: 22px 28px 28px;
        }

        .mini-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            margin-bottom: 18px;
        }

        .mini-box {
            padding: 16px;
            border-radius: 18px;
            background: linear-gradient(135deg, #fff7fb, #fffdf4);
            border: 1px solid #f7dbe7;
            text-align: center;
        }

        .mini-box span {
            display: inline-flex;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--pink-500), var(--yellow-400));
            color: #fff;
            font-size: .95rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .mini-box h6 {
            margin-bottom: 6px;
            font-size: 1rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .mini-box small {
            color: var(--muted);
        }

        .stats-wrap {
            margin-top: 36px;
        }

        .stats-card {
            padding: 20px;
            border-radius: 22px;
            background: rgba(255, 255, 255, .28);
            border: 1px solid rgba(255, 255, 255, .55);
            box-shadow: var(--shadow-sm);
            height: 100%;
        }

        .stats-card h4 {
            margin-bottom: 6px;
            font-size: 1.4rem;
            font-weight: 800;
            color: #8d1d5b;
        }

        .stats-card p {
            margin-bottom: 0;
            color: #7c6671;
            font-size: .95rem;
        }

        .section-light {
            background: linear-gradient(180deg, #fff8fb 0%, #fffdf8 100%);
        }

        .section-mysimple {
            background: linear-gradient(180deg, #fff4fa 0%, #ffffff 100%);
        }

        .section-jastip {
            background: linear-gradient(180deg, #fffdf4 0%, #ffffff 100%);
        }

        .pill-label {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 999px;
            font-size: .85rem;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .pill-mysimple {
            background: #ffe2ef;
            color: #b91c68;
        }

        .pill-jastip {
            background: #fff2bf;
            color: #a16207;
        }

        .brand-card,
        .service-card,
        .feature-card,
        .price-card,
        .template-card,
        .step-card,
        .faq-card,
        .cta-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 28px;
            box-shadow: var(--shadow-md);
            transition: .28s ease;
            height: 100%;
        }

        .brand-card:hover,
        .service-card:hover,
        .feature-card:hover,
        .price-card:hover,
        .template-card:hover,
        .step-card:hover,
        .faq-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 28px 60px rgba(244, 90, 160, .18);
        }

        .brand-card {
            padding: 34px;
            position: relative;
            overflow: hidden;
        }

        .brand-card.mysimple {
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, .45), transparent 30%),
                linear-gradient(135deg, #fff3f9 0%, #ffe8f1 100%);
        }

        .brand-card.jastip {
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, .45), transparent 30%),
                linear-gradient(135deg, #fffdf4 0%, #fff5cf 100%);
        }

        .brand-icon {
            width: 72px;
            height: 72px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 18px;
            box-shadow: var(--shadow-sm);
        }

        .brand-icon.mysimple {
            background: linear-gradient(135deg, var(--pink-500), var(--pink-700));
        }

        .brand-icon.jastip {
            background: linear-gradient(135deg, var(--yellow-400), var(--yellow-500));
        }

        .brand-card h3 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 14px;
        }

        .brand-card p {
            color: #73616c;
            line-height: 1.9;
            margin-bottom: 22px;
        }

        .tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }

        .tag-pill {
            padding: 9px 14px;
            border-radius: 999px;
            font-size: .83rem;
            font-weight: 700;
            background: #fff;
            border: 1px solid #f3d3e2;
            color: #8a6176;
        }

        .service-card,
        .feature-card,
        .faq-card {
            padding: 28px;
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
            background: linear-gradient(135deg, var(--pink-500), var(--yellow-400));
            box-shadow: 0 12px 24px rgba(244, 90, 160, .18);
            margin-bottom: 18px;
        }

        .service-card h5,
        .feature-card h5,
        .faq-card h5,
        .step-card h5 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .service-card p,
        .feature-card p,
        .faq-card p,
        .step-card p {
            color: var(--muted);
            line-height: 1.85;
            margin-bottom: 0;
        }

        .price-card {
            overflow: hidden;
            position: relative;
        }

        .price-card .card-body {
            padding: 30px;
        }

        .price-card.featured {
            border: 1.5px solid #f6b7d0;
            box-shadow: 0 28px 60px rgba(244, 90, 160, .20);
        }

        .price-card.featured::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--pink-500), var(--yellow-400));
        }

        .price-type-label {
            display: inline-block;
            padding: 9px 15px;
            border-radius: 999px;
            font-size: .84rem;
            font-weight: 800;
            color: var(--text-dark);
            background: linear-gradient(135deg, #fff0f8, #fff6cc);
        }

        .price-name {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-top: 18px;
            margin-bottom: 12px;
        }

        .price-amount {
            font-size: 2.1rem;
            font-weight: 800;
            color: var(--pink-600);
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .old-price {
            color: #d09ab3;
            text-decoration: line-through;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .price-desc {
            color: var(--muted);
            margin: 14px 0 18px;
            line-height: 1.8;
            min-height: 58px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0 0 24px;
        }

        .feature-list li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 11px;
            color: #765f6b;
            line-height: 1.8;
        }

        .feature-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            top: 0;
            font-weight: 800;
            color: var(--pink-600);
        }

        .template-card {
            overflow: hidden;
        }

        .template-preview {
            height: 250px;
            background-size: cover;
            background-position: center;
            background-color: #fff4fa;
            position: relative;
        }

        .template-preview::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(201, 42, 116, .14), rgba(255, 255, 255, 0));
        }

        .template-card .card-body {
            padding: 24px;
        }

        .template-card h5 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .template-card p {
            color: var(--muted);
            line-height: 1.8;
            min-height: 54px;
        }

        .step-card {
            padding: 28px 24px;
        }

        .step-number {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--pink-500), var(--yellow-400));
            box-shadow: 0 12px 24px rgba(244, 90, 160, .18);
            margin-bottom: 16px;
        }

        .faq-card {
            background: linear-gradient(180deg, #fff 0%, #fffafc 100%);
        }

        .cta-section {
            background: linear-gradient(135deg, #fff0f7 0%, #fff9d8 100%);
        }

        .cta-card {
            padding: 48px 34px;
            text-align: center;
            background: rgba(255, 255, 255, .82);
            backdrop-filter: blur(8px);
        }

        .cta-card h2 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 16px;
        }

        .cta-card p {
            max-width: 820px;
            margin: 0 auto 24px;
            color: var(--muted);
            line-height: 1.9;
        }

        .footer {
            background: linear-gradient(135deg, #d43784 0%, #f4b11a 100%);
            color: rgba(255, 255, 255, .94);
            padding: 36px 0;
        }

        .footer strong,
        .footer a {
            color: #fff;
        }

        .text-muted-custom {
            color: var(--muted);
        }

        @media (max-width: 991.98px) {
            .section {
                padding: 75px 0;
            }

            .hero {
                padding: 95px 0 70px;
            }

            .hero h1 {
                font-size: clamp(2.2rem, 8vw, 3.4rem);
            }

            .brand-card,
            .service-card,
            .feature-card,
            .faq-card,
            .step-card {
                padding: 24px;
            }

            .template-preview {
                height: 220px;
            }

            .price-desc,
            .template-card p {
                min-height: auto;
            }
        }

        @media (max-width: 575.98px) {

            .hero-card-top,
            .hero-card-body {
                padding-left: 20px;
                padding-right: 20px;
            }

            .mini-grid {
                gap: 10px;
            }

            .cta-card {
                padding: 36px 22px;
            }
        }
    </style> -->

    <!-- Blue <style>
        :root {
            --blue-50: #f4f9ff;
            --blue-100: #e8f2ff;
            --blue-200: #cfe3ff;
            --blue-300: #a9cbff;
            --blue-400: #79a9ff;
            --blue-500: #4f86f7;
            --blue-600: #356ae6;
            --blue-700: #244fc2;
            --blue-800: #1f3f98;

            --sky-50: #f0f9ff;
            --sky-100: #e0f2fe;
            --sky-200: #bae6fd;

            --yellow-50: #fffdf2;
            --yellow-100: #fff7cc;
            --yellow-200: #fde68a;
            --yellow-300: #fcd34d;
            --yellow-400: #fbbf24;
            --yellow-500: #f59e0b;

            --cream: #fffef8;
            --soft: #f8fbff;
            --soft-2: #fdfdf7;
            --text: #334155;
            --text-dark: #183b72;
            --muted: #64748b;
            --line: #dbe7ff;
            --white: #ffffff;

            --shadow-sm: 0 10px 25px rgba(79, 134, 247, .08);
            --shadow-md: 0 18px 40px rgba(79, 134, 247, .12);
            --shadow-lg: 0 28px 70px rgba(79, 134, 247, .16);
            --radius: 24px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(180deg, #fbfdff 0%, #f5faff 45%, #fffef8 100%);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background: rgba(255, 255, 255, .88) !important;
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(219, 231, 255, .95) !important;
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--text-dark) !important;
            letter-spacing: .2px;
        }

        .nav-link {
            color: #4b5f7a !important;
            font-weight: 700;
            transition: .2s ease;
        }

        .nav-link:hover {
            color: var(--blue-600) !important;
        }

        .btn {
            border-radius: 16px;
            padding: .9rem 1.25rem;
            font-weight: 700;
            transition: .25s ease;
        }

        .btn-main {
            color: #fff;
            border: none;
            background: linear-gradient(135deg, var(--blue-500), var(--blue-700));
            box-shadow: 0 14px 28px rgba(79, 134, 247, .24);
        }

        .btn-main:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 18px 38px rgba(79, 134, 247, .28);
            background: linear-gradient(135deg, var(--blue-600), var(--blue-800));
        }

        .btn-soft {
            background: #fff;
            color: var(--blue-700);
            border: 1px solid #dbe7ff;
            box-shadow: var(--shadow-sm);
        }

        .btn-soft:hover {
            color: var(--blue-700);
            background: #f8fbff;
            border-color: #bfd4ff;
            transform: translateY(-2px);
        }

        .btn-outline-soft {
            background: transparent;
            color: var(--blue-700);
            border: 1.5px solid #cfe0ff;
        }

        .btn-outline-soft:hover {
            background: #f5f9ff;
            color: var(--blue-700);
            border-color: var(--blue-400);
        }

        .section {
            padding: 95px 0;
            position: relative;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 14px;
            letter-spacing: -.02em;
        }

        .section-subtitle {
            max-width: 760px;
            margin: 0 auto;
            color: var(--muted);
            line-height: 1.9;
        }

        .hero {
            position: relative;
            overflow: hidden;
            padding: 115px 0 90px;
            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, .45), transparent 28%),
                radial-gradient(circle at bottom right, rgba(255, 255, 255, .28), transparent 26%),
                linear-gradient(135deg, #dff0ff 0%, #b9d7ff 35%, #79a9ff 68%, #fde68a 100%);
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .28);
            top: -120px;
            right: -100px;
            filter: blur(10px);
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .22);
            bottom: -100px;
            left: -60px;
            filter: blur(12px);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, .74);
            color: var(--blue-700);
            border: 1px solid rgba(255, 255, 255, .78);
            padding: 10px 18px;
            border-radius: 999px;
            font-size: .92rem;
            font-weight: 800;
            box-shadow: var(--shadow-sm);
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: clamp(2.6rem, 5vw, 4.7rem);
            font-weight: 800;
            line-height: 1.05;
            color: #173b73;
            letter-spacing: -.04em;
            margin-bottom: 18px;
        }

        .hero p {
            font-size: 1.05rem;
            line-height: 1.95;
            color: #48627f;
            max-width: 680px;
            margin-bottom: 0;
        }

        .hero-actions {
            margin-top: 30px;
        }

        .hero-points {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 26px;
        }

        .hero-point {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            background: rgba(255, 255, 255, .66);
            border: 1px solid rgba(255, 255, 255, .78);
            border-radius: 999px;
            font-size: .9rem;
            color: var(--blue-700);
            font-weight: 700;
        }

        .hero-card {
            background: rgba(255, 255, 255, .94);
            border: 1px solid rgba(255, 255, 255, .96);
            border-radius: 30px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        .hero-card-top {
            padding: 28px 28px 18px;
            background: linear-gradient(135deg, #f8fbff, #fffdf4);
            border-bottom: 1px solid #e5eeff;
        }

        .hero-card-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .hero-card-text {
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 0;
        }

        .hero-card-body {
            padding: 22px 28px 28px;
        }

        .mini-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            margin-bottom: 18px;
        }

        .mini-box {
            padding: 16px;
            border-radius: 18px;
            background: linear-gradient(135deg, #f8fbff, #fffdf5);
            border: 1px solid #e4eeff;
            text-align: center;
        }

        .mini-box span {
            display: inline-flex;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--blue-500), var(--yellow-400));
            color: #fff;
            font-size: .95rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .mini-box h6 {
            margin-bottom: 6px;
            font-size: 1rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .mini-box small {
            color: var(--muted);
        }

        .stats-wrap {
            margin-top: 36px;
        }

        .stats-card {
            padding: 20px;
            border-radius: 22px;
            background: rgba(255, 255, 255, .30);
            border: 1px solid rgba(255, 255, 255, .58);
            box-shadow: var(--shadow-sm);
            height: 100%;
        }

        .stats-card h4 {
            margin-bottom: 6px;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .stats-card p {
            margin-bottom: 0;
            color: #51667f;
            font-size: .95rem;
        }

        .section-light {
            background: linear-gradient(180deg, #f7fbff 0%, #fffef8 100%);
        }

        .section-mysimple {
            background: linear-gradient(180deg, #f3f8ff 0%, #ffffff 100%);
        }

        .section-jastip {
            background: linear-gradient(180deg, #fffef5 0%, #ffffff 100%);
        }

        .pill-label {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 999px;
            font-size: .85rem;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .pill-mysimple {
            background: #e8f2ff;
            color: var(--blue-700);
        }

        .pill-jastip {
            background: #fff5c8;
            color: #a16207;
        }

        .brand-card,
        .service-card,
        .feature-card,
        .price-card,
        .template-card,
        .step-card,
        .faq-card,
        .cta-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 28px;
            box-shadow: var(--shadow-md);
            transition: .28s ease;
            height: 100%;
        }

        .brand-card:hover,
        .service-card:hover,
        .feature-card:hover,
        .price-card:hover,
        .template-card:hover,
        .step-card:hover,
        .faq-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 28px 60px rgba(79, 134, 247, .18);
        }

        .brand-card {
            padding: 34px;
            position: relative;
            overflow: hidden;
        }

        .brand-card.mysimple {
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, .46), transparent 30%),
                linear-gradient(135deg, #f2f8ff 0%, #e4efff 100%);
        }

        .brand-card.jastip {
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, .46), transparent 30%),
                linear-gradient(135deg, #fffef5 0%, #fff7d8 100%);
        }

        .brand-icon {
            width: 72px;
            height: 72px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 18px;
            box-shadow: var(--shadow-sm);
        }

        .brand-icon.mysimple {
            background: linear-gradient(135deg, var(--blue-500), var(--blue-700));
        }

        .brand-icon.jastip {
            background: linear-gradient(135deg, var(--yellow-400), var(--blue-500));
        }

        .brand-card h3 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 14px;
        }

        .brand-card p {
            color: #5f7187;
            line-height: 1.9;
            margin-bottom: 22px;
        }

        .tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }

        .tag-pill {
            padding: 9px 14px;
            border-radius: 999px;
            font-size: .83rem;
            font-weight: 700;
            background: #fff;
            border: 1px solid #dfe9ff;
            color: #56708d;
        }

        .service-card,
        .feature-card,
        .faq-card {
            padding: 28px;
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
            background: linear-gradient(135deg, var(--blue-500), var(--yellow-400));
            box-shadow: 0 12px 24px rgba(79, 134, 247, .18);
            margin-bottom: 18px;
        }

        .service-card h5,
        .feature-card h5,
        .faq-card h5,
        .step-card h5 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .service-card p,
        .feature-card p,
        .faq-card p,
        .step-card p {
            color: var(--muted);
            line-height: 1.85;
            margin-bottom: 0;
        }

        .price-card {
            overflow: hidden;
            position: relative;
        }

        .price-card .card-body {
            padding: 30px;
        }

        .price-card.featured {
            border: 1.5px solid #bfd7ff;
            box-shadow: 0 28px 60px rgba(79, 134, 247, .20);
        }

        .price-card.featured::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--blue-500), var(--yellow-400));
        }

        .price-type-label {
            display: inline-block;
            padding: 9px 15px;
            border-radius: 999px;
            font-size: .84rem;
            font-weight: 800;
            color: var(--text-dark);
            background: linear-gradient(135deg, #eef5ff, #fff8d8);
        }

        .price-name {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-top: 18px;
            margin-bottom: 12px;
        }

        .price-amount {
            font-size: 2.1rem;
            font-weight: 800;
            color: var(--blue-600);
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .old-price {
            color: #93a8c3;
            text-decoration: line-through;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .price-desc {
            color: var(--muted);
            margin: 14px 0 18px;
            line-height: 1.8;
            min-height: 58px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0 0 24px;
        }

        .feature-list li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 11px;
            color: #607389;
            line-height: 1.8;
        }

        .feature-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            top: 0;
            font-weight: 800;
            color: var(--blue-600);
        }

        .template-card {
            overflow: hidden;
        }

        .template-preview {
            height: 250px;
            background-size: cover;
            background-position: center;
            background-color: #f3f8ff;
            position: relative;
        }

        .template-preview::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(36, 79, 194, .14), rgba(255, 255, 255, 0));
        }

        .template-card .card-body {
            padding: 24px;
        }

        .template-card h5 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .template-card p {
            color: var(--muted);
            line-height: 1.8;
            min-height: 54px;
        }

        .step-card {
            padding: 28px 24px;
        }

        .step-number {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--blue-500), var(--yellow-400));
            box-shadow: 0 12px 24px rgba(79, 134, 247, .18);
            margin-bottom: 16px;
        }

        .faq-card {
            background: linear-gradient(180deg, #fff 0%, #f9fbff 100%);
        }

        .cta-section {
            background: linear-gradient(135deg, #eef6ff 0%, #fff9db 100%);
        }

        .cta-card {
            padding: 48px 34px;
            text-align: center;
            background: rgba(255, 255, 255, .84);
            backdrop-filter: blur(8px);
        }

        .cta-card h2 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 16px;
        }

        .cta-card p {
            max-width: 820px;
            margin: 0 auto 24px;
            color: var(--muted);
            line-height: 1.9;
        }

        .footer {
            background: linear-gradient(135deg, var(--blue-700) 0%, var(--blue-500) 60%, var(--yellow-400) 100%);
            color: rgba(255, 255, 255, .94);
            padding: 36px 0;
        }

        .footer strong,
        .footer a {
            color: #fff;
        }

        .text-muted-custom {
            color: var(--muted);
        }

        @media (max-width: 991.98px) {
            .section {
                padding: 75px 0;
            }

            .hero {
                padding: 95px 0 70px;
            }

            .hero h1 {
                font-size: clamp(2.2rem, 8vw, 3.4rem);
            }

            .brand-card,
            .service-card,
            .feature-card,
            .faq-card,
            .step-card {
                padding: 24px;
            }

            .template-preview {
                height: 220px;
            }

            .price-desc,
            .template-card p {
                min-height: auto;
            }
        }

        @media (max-width: 575.98px) {

            .hero-card-top,
            .hero-card-body {
                padding-left: 20px;
                padding-right: 20px;
            }

            .mini-grid {
                gap: 10px;
            }

            .cta-card {
                padding: 36px 22px;
            }
        }
    </style> -->

    <style>
        :root {
            --blue-50: #f4f8ff;
            --blue-100: #e8f0ff;
            --blue-200: #cfe0ff;
            --blue-300: #aac7ff;
            --blue-400: #7ca8ff;
            --blue-500: #4d83f6;
            --blue-600: #2f68e3;
            --blue-700: #224fb8;

            --pink-50: #fff4fa;
            --pink-100: #ffe3f1;
            --pink-200: #ffcde5;
            --pink-300: #f9a8d4;
            --pink-400: #f472b6;
            --pink-500: #ec4899;
            --pink-600: #db2777;

            --yellow-50: #fffdf4;
            --yellow-100: #fff8d9;
            --yellow-200: #fde68a;
            --yellow-300: #fcd34d;
            --yellow-400: #fbbf24;
            --yellow-500: #f59e0b;

            --white: #ffffff;
            --soft: #f8fbff;
            --soft-2: #fffaf4;
            --text: #455468;
            --text-dark: #24406f;
            --muted: #6f7c91;
            --line: #e2eaff;

            --shadow-sm: 0 10px 25px rgba(77, 131, 246, .08);
            --shadow-md: 0 18px 40px rgba(77, 131, 246, .12);
            --shadow-lg: 0 28px 70px rgba(77, 131, 246, .16);
            --radius: 24px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(180deg, #fcfdff 0%, #f8fbff 40%, #fffaf7 100%);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background: rgba(255, 255, 255, .88) !important;
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(226, 234, 255, .95) !important;
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--text-dark) !important;
            letter-spacing: .2px;
        }

        .nav-link {
            color: #5f7088 !important;
            font-weight: 700;
            transition: .2s ease;
        }

        .nav-link:hover {
            color: var(--pink-500) !important;
        }

        .btn {
            border-radius: 16px;
            padding: .9rem 1.25rem;
            font-weight: 700;
            transition: .25s ease;
        }

        .btn-main {
            color: #fff;
            border: none;
            background: linear-gradient(135deg, var(--blue-500) 0%, var(--pink-500) 60%, var(--yellow-400) 100%);
            box-shadow: 0 14px 30px rgba(236, 72, 153, .18);
        }

        .btn-main:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(77, 131, 246, .24);
            background: linear-gradient(135deg, var(--blue-600) 0%, var(--pink-600) 62%, var(--yellow-500) 100%);
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
            border-color: #f3c8df;
            transform: translateY(-2px);
        }

        .btn-outline-soft {
            background: transparent;
            color: var(--blue-700);
            border: 1.5px solid #d4e2ff;
        }

        .btn-outline-soft:hover {
            background: linear-gradient(135deg, #f6f9ff, #fff6fb);
            color: var(--pink-600);
            border-color: #f3bfd9;
        }

        .section {
            padding: 95px 0;
            position: relative;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 14px;
            letter-spacing: -.02em;
        }

        .section-subtitle {
            max-width: 760px;
            margin: 0 auto;
            color: var(--muted);
            line-height: 1.9;
        }

        .hero {
            position: relative;
            overflow: hidden;
            padding: 115px 0 90px;
            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, .42), transparent 28%),
                radial-gradient(circle at bottom right, rgba(255, 255, 255, .22), transparent 28%),
                linear-gradient(135deg, #e7f0ff 0%, #d8e7ff 24%, #ffdff0 62%, #fff0af 100%);
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .25);
            top: -120px;
            right: -100px;
            filter: blur(10px);
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .18);
            bottom: -100px;
            left: -60px;
            filter: blur(12px);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, .74);
            color: var(--pink-600);
            border: 1px solid rgba(255, 255, 255, .82);
            padding: 10px 18px;
            border-radius: 999px;
            font-size: .92rem;
            font-weight: 800;
            box-shadow: var(--shadow-sm);
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: clamp(2.6rem, 5vw, 4.7rem);
            font-weight: 800;
            line-height: 1.05;
            color: #233f70;
            letter-spacing: -.04em;
            margin-bottom: 18px;
        }

        .hero p {
            font-size: 1.05rem;
            line-height: 1.95;
            color: #5d6e85;
            max-width: 680px;
            margin-bottom: 0;
        }

        .hero-actions {
            margin-top: 30px;
        }

        .hero-points {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 26px;
        }

        .hero-point {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            background: rgba(255, 255, 255, .68);
            border: 1px solid rgba(255, 255, 255, .82);
            border-radius: 999px;
            font-size: .9rem;
            color: var(--blue-700);
            font-weight: 700;
        }

        .hero-card {
            background: rgba(255, 255, 255, .94);
            border: 1px solid rgba(255, 255, 255, .96);
            border-radius: 30px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        .hero-card-top {
            padding: 28px 28px 18px;
            background: linear-gradient(135deg, #f6f9ff, #fff7fb, #fffdf4);
            border-bottom: 1px solid #e8efff;
        }

        .hero-card-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .hero-card-text {
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 0;
        }

        .hero-card-body {
            padding: 22px 28px 28px;
        }

        .mini-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            margin-bottom: 18px;
        }

        .mini-box {
            padding: 16px;
            border-radius: 18px;
            background: linear-gradient(135deg, #f7faff, #fff6fb, #fffdf4);
            border: 1px solid #e6edff;
            text-align: center;
        }

        .mini-box span {
            display: inline-flex;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--blue-500), var(--pink-500), var(--yellow-400));
            color: #fff;
            font-size: .95rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .mini-box h6 {
            margin-bottom: 6px;
            font-size: 1rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .mini-box small {
            color: var(--muted);
        }

        .stats-wrap {
            margin-top: 36px;
        }

        .stats-card {
            padding: 20px;
            border-radius: 22px;
            background: rgba(255, 255, 255, .32);
            border: 1px solid rgba(255, 255, 255, .58);
            box-shadow: var(--shadow-sm);
            height: 100%;
        }

        .stats-card h4 {
            margin-bottom: 6px;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .stats-card p {
            margin-bottom: 0;
            color: #607188;
            font-size: .95rem;
        }

        .section-light {
            background: linear-gradient(180deg, #f8fbff 0%, #fffaf5 100%);
        }

        .section-mysimple {
            background: linear-gradient(180deg, #f3f8ff 0%, #ffffff 65%, #fff9fc 100%);
        }

        .section-jastip {
            background: linear-gradient(180deg, #fffdf5 0%, #ffffff 70%, #f7faff 100%);
        }

        .pill-label {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 999px;
            font-size: .85rem;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .pill-mysimple {
            background: #eaf1ff;
            color: var(--blue-700);
        }

        .pill-jastip {
            background: #fff3c8;
            color: #a16207;
        }

        .brand-card,
        .service-card,
        .feature-card,
        .price-card,
        .template-card,
        .step-card,
        .faq-card,
        .cta-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 28px;
            box-shadow: var(--shadow-md);
            transition: .28s ease;
            height: 100%;
        }

        .brand-card:hover,
        .service-card:hover,
        .feature-card:hover,
        .price-card:hover,
        .template-card:hover,
        .step-card:hover,
        .faq-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 28px 60px rgba(77, 131, 246, .18);
        }

        .brand-card {
            padding: 34px;
            position: relative;
            overflow: hidden;
        }

        .brand-card.mysimple {
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, .46), transparent 30%),
                linear-gradient(135deg, #f2f7ff 0%, #e8f0ff 60%, #fff7fb 100%);
        }

        .brand-card.jastip {
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, .46), transparent 30%),
                linear-gradient(135deg, #fffef5 0%, #fff7d9 58%, #f4f8ff 100%);
        }

        .brand-icon {
            width: 72px;
            height: 72px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 18px;
            box-shadow: var(--shadow-sm);
        }

        .brand-icon.mysimple {
            background: linear-gradient(135deg, var(--blue-500), var(--pink-500));
        }

        .brand-icon.jastip {
            background: linear-gradient(135deg, var(--yellow-400), var(--blue-500));
        }

        .brand-card h3 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 14px;
        }

        .brand-card p {
            color: #62738a;
            line-height: 1.9;
            margin-bottom: 22px;
        }

        .tag-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }

        .tag-pill {
            padding: 9px 14px;
            border-radius: 999px;
            font-size: .83rem;
            font-weight: 700;
            background: #fff;
            border: 1px solid #e2eaff;
            color: #66788f;
        }

        .service-card,
        .feature-card,
        .faq-card {
            padding: 28px;
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
        .feature-card h5,
        .faq-card h5,
        .step-card h5 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .service-card p,
        .feature-card p,
        .faq-card p,
        .step-card p {
            color: var(--muted);
            line-height: 1.85;
            margin-bottom: 0;
        }

        .price-card {
            overflow: hidden;
            position: relative;
        }

        .price-card .card-body {
            padding: 30px;
        }

        .price-card.featured {
            border: 1.5px solid #d7e4ff;
            box-shadow: 0 28px 60px rgba(77, 131, 246, .20);
        }

        .price-card.featured::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--blue-500), var(--pink-500), var(--yellow-400));
        }

        .price-type-label {
            display: inline-block;
            padding: 9px 15px;
            border-radius: 999px;
            font-size: .84rem;
            font-weight: 800;
            color: var(--text-dark);
            background: linear-gradient(135deg, #eef4ff, #fff4fb, #fff8dc);
        }

        .price-name {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-top: 18px;
            margin-bottom: 12px;
        }

        .price-amount {
            font-size: 2.1rem;
            font-weight: 800;
            color: var(--blue-600);
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .old-price {
            color: #9daec3;
            text-decoration: line-through;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .price-desc {
            color: var(--muted);
            margin: 14px 0 18px;
            line-height: 1.8;
            min-height: 58px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0 0 24px;
        }

        .feature-list li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 11px;
            color: #63758b;
            line-height: 1.8;
        }

        .feature-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            top: 0;
            font-weight: 800;
            color: var(--pink-500);
        }

        .template-card {
            overflow: hidden;
        }

        .template-preview {
            height: 250px;
            background-size: cover;
            background-position: center;
            background-color: #f3f8ff;
            position: relative;
        }

        .template-preview::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(77, 131, 246, .12), rgba(236, 72, 153, .06), rgba(255, 255, 255, 0));
        }

        .template-card .card-body {
            padding: 24px;
        }

        .template-card h5 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .template-card p {
            color: var(--muted);
            line-height: 1.8;
            min-height: 54px;
        }

        .step-card {
            padding: 28px 24px;
        }

        .step-number {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--blue-500), var(--pink-500), var(--yellow-400));
            box-shadow: 0 12px 24px rgba(77, 131, 246, .18);
            margin-bottom: 16px;
        }

        .faq-card {
            background: linear-gradient(180deg, #fff 0%, #f9fbff 100%);
        }

        .cta-section {
            background: linear-gradient(135deg, #edf4ff 0%, #fff3fb 58%, #fff8d8 100%);
        }

        .cta-card {
            padding: 48px 34px;
            text-align: center;
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(8px);
        }

        .cta-card h2 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 16px;
        }

        .cta-card p {
            max-width: 820px;
            margin: 0 auto 24px;
            color: var(--muted);
            line-height: 1.9;
        }

        .footer {
            background: linear-gradient(135deg, var(--blue-700) 0%, var(--blue-500) 45%, var(--pink-500) 78%, var(--yellow-400) 100%);
            color: rgba(255, 255, 255, .95);
            padding: 36px 0;
        }

        .footer strong,
        .footer a {
            color: #fff;
        }

        .text-muted-custom {
            color: var(--muted);
        }

        @media (max-width: 991.98px) {
            .section {
                padding: 75px 0;
            }

            .hero {
                padding: 95px 0 70px;
            }

            .hero h1 {
                font-size: clamp(2.2rem, 8vw, 3.4rem);
            }

            .brand-card,
            .service-card,
            .feature-card,
            .faq-card,
            .step-card {
                padding: 24px;
            }

            .template-preview {
                height: 220px;
            }

            .price-desc,
            .template-card p {
                min-height: auto;
            }
        }

        @media (max-width: 575.98px) {

            .hero-card-top,
            .hero-card-body {
                padding-left: 20px;
                padding-right: 20px;
            }

            .mini-grid {
                gap: 10px;
            }

            .cta-card {
                padding: 36px 22px;
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
                    <li class="nav-item"><a class="nav-link" href="#brand-kami">Brand Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#mysimple">MySimple</a></li>
                    <li class="nav-item"><a class="nav-link" href="#jastipinaja">JastipinAja</a></li>
                    <li class="nav-item"><a class="nav-link" href="#harga">Paket</a></li>
                    <li class="nav-item"><a class="nav-link" href="#template">Katalog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cara-order">Cara Order</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item ms-lg-2">
                        <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20bertanya%20tentang%20layanan%20<?= rawurlencode($brand_name); ?>" class="btn btn-main">
                            Chat WhatsApp
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container position-relative">
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-7">
                    <div class="hero-badge">✨ Cute, modern, dan dua layanan dalam satu tempat</div>

                    <h1>
                        Satu Tempat untuk
                        <br>Gift Cantik & Jasa Titip Praktis
                    </h1>

                    <p>
                        <strong>MySimple</strong> hadir untuk kebutuhan undangan digital, greeting card, bouquet, hampers, dan creative gift yang estetik.
                        Sementara <strong>JastipinAja</strong> siap membantu titip beli skincare, makanan, hadiah, dan berbagai kebutuhan lainnya dengan proses yang simpel, cepat, dan nyaman.
                    </p>

                    <div class="d-flex flex-wrap gap-3 hero-actions">
                        <a href="#brand-kami" class="btn btn-main btn-lg">Jelajahi Layanan</a>
                        <a href="#cara-order" class="btn btn-soft btn-lg">Lihat Cara Order</a>
                    </div>

                    <div class="hero-points">
                        <div class="hero-point">💖 Gift & Undangan</div>
                        <div class="hero-point">🛍️ Jasa Titip Fleksibel</div>
                        <div class="hero-point">📲 Order Mudah via WhatsApp</div>
                    </div>

                    <div class="row g-3 stats-wrap">
                        <div class="col-sm-4">
                            <div class="stats-card">
                                <h4>2 Brand</h4>
                                <p>Dua usaha tampil jelas dalam satu halaman</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stats-card">
                                <h4>Simple</h4>
                                <p>Alur order mudah dan tidak membingungkan</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stats-card">
                                <h4>Flexible</h4>
                                <p>Bisa gift, undangan, atau titip beli</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hero-card">
                        <div class="hero-card-top">
                            <div class="hero-card-title">Flow Layanan Kami</div>
                            <p class="hero-card-text">
                                Prosesnya ringkas, jelas, dan enak untuk customer baru. Tinggal chat, pilih, proses, lalu selesai.
                            </p>
                        </div>

                        <div class="hero-card-body">
                            <div class="mini-grid">
                                <div class="mini-box">
                                    <span>1</span>
                                    <h6>Chat Kami</h6>
                                    <small>Hubungi via WhatsApp</small>
                                </div>
                                <div class="mini-box">
                                    <span>2</span>
                                    <h6>Pilih Layanan</h6>
                                    <small>MySimple / JastipinAja</small>
                                </div>
                                <div class="mini-box">
                                    <span>3</span>
                                    <h6>Kami Proses</h6>
                                    <small>Disesuaikan kebutuhan</small>
                                </div>
                                <div class="mini-box">
                                    <span>4</span>
                                    <h6>Pesanan Siap</h6>
                                    <small>Siap dibagikan / dikirim</small>
                                </div>
                            </div>

                            <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20konsultasi%20tentang%20MySimple%20dan%20JastipinAja"
                                class="btn btn-main w-100">
                                Konsultasi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="brand-kami" class="section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Dua Brand, Satu Experience yang Menarik</h2>
                <p class="section-subtitle">
                    Dalam satu homepage, customer bisa langsung memahami dua layanan utama Anda tanpa terasa bercampur.
                    MySimple tampil manis untuk momen spesial, sedangkan JastipinAja tampil praktis untuk kebutuhan titip beli.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="brand-card mysimple">
                        <div class="brand-icon mysimple">MS</div>
                        <span class="pill-label pill-mysimple">MySimple</span>
                        <h3>Creative Gift for Special Moments</h3>
                        <p>
                            MySimple adalah ruang untuk menghadirkan hadiah dan momen yang lebih berkesan.
                            Mulai dari undangan digital, greeting card, bouquet, hampers, gift box, hingga berbagai kebutuhan custom yang dibuat lebih cantik, rapi, dan estetik.
                        </p>

                        <div class="tag-list">
                            <span class="tag-pill">Undangan Digital</span>
                            <span class="tag-pill">Greeting Card</span>
                            <span class="tag-pill">Bouquet</span>
                            <span class="tag-pill">Gift Box</span>
                            <span class="tag-pill">Hampers</span>
                            <span class="tag-pill">Custom Gift</span>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <a href="#mysimple" class="btn btn-main">Lihat MySimple</a>
                            <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20order%20layanan%20MySimple" class="btn btn-outline-soft">Order MySimple</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="brand-card jastip">
                        <div class="brand-icon jastip">JA</div>
                        <span class="pill-label pill-jastip">JastipinAja</span>
                        <h3>Titip Beli Apa Aja, Lebih Praktis</h3>
                        <p>
                            JastipinAja membantu customer membeli berbagai kebutuhan dengan cara yang mudah dan tidak ribet.
                            Cocok untuk skincare, makanan, beauty item, gift, atau barang request lainnya yang ingin dibelikan dengan proses yang jelas.
                        </p>

                        <div class="tag-list">
                            <span class="tag-pill">Skincare</span>
                            <span class="tag-pill">Snack & Makanan</span>
                            <span class="tag-pill">Beauty Product</span>
                            <span class="tag-pill">Gift Item</span>
                            <span class="tag-pill">Titip Barang</span>
                            <span class="tag-pill">Request Fleksibel</span>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <a href="#jastipinaja" class="btn btn-main">Lihat JastipinAja</a>
                            <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20titip%20belanja%20di%20JastipinAja" class="btn btn-outline-soft">Titip Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="mysimple" class="section section-mysimple">
        <div class="container">
            <div class="text-center mb-5">
                <span class="pill-label pill-mysimple">MySimple</span>
                <h2 class="section-title">Untuk Undangan, Gift, dan Momen Spesial</h2>
                <p class="section-subtitle">
                    Dibuat untuk customer yang ingin sesuatu yang manis, cantik, rapi, dan berkesan.
                    Cocok untuk berbagai kebutuhan personal maupun hadiah spesial.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-badge">01</div>
                        <h5>Undangan Digital</h5>
                        <p>Desain undangan yang modern, estetik, dan siap dibagikan melalui link untuk berbagai acara spesial.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-badge">02</div>
                        <h5>Greeting Card</h5>
                        <p>Kartu ucapan yang manis dan personal untuk ulang tahun, ucapan terima kasih, dan momen spesial lainnya.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-badge">03</div>
                        <h5>Bouquet & Gift</h5>
                        <p>Berbagai bouquet, hadiah, money bouquet, dan gift spesial yang tampil cantik dan lebih berkesan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-badge">04</div>
                        <h5>Custom Kreasi</h5>
                        <p>Gift, hampers, dan kreasi custom yang bisa disesuaikan dengan tema, kebutuhan, dan request customer.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="jastipinaja" class="section section-jastip">
        <div class="container">
            <div class="text-center mb-5">
                <span class="pill-label pill-jastip">JastipinAja</span>
                <h2 class="section-title">Untuk Jasa Titip yang Mudah dan Fleksibel</h2>
                <p class="section-subtitle">
                    Cocok untuk customer yang ingin titip beli tanpa repot.
                    Semua dibuat lebih sederhana supaya prosesnya nyaman dari awal sampai selesai.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-badge">01</div>
                        <h5>Skincare & Beauty</h5>
                        <p>Bantu titip beli skincare, make up, body care, dan produk kecantikan lainnya dengan proses praktis.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-badge">02</div>
                        <h5>Makanan & Snack</h5>
                        <p>Titip beli makanan, snack, oleh-oleh, atau produk favorit yang ingin dibelikan dengan lebih mudah.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-badge">03</div>
                        <h5>Barang Titipan</h5>
                        <p>Request berbagai barang lain sesuai kebutuhan customer selama memungkinkan untuk dibelikan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="icon-badge">04</div>
                        <h5>Request Fleksibel</h5>
                        <p>Bukan hanya satu kategori, JastipinAja dibuat untuk berbagai kebutuhan titip beli yang lebih praktis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kenapa-kami" class="section section-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Kenapa Memilih Kami</h2>
                <p class="section-subtitle">
                    Kami menggabungkan sisi kreatif dan sisi praktis dalam satu tempat,
                    jadi customer bisa memilih layanan sesuai kebutuhannya dengan pengalaman yang tetap nyaman.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="icon-badge">01</div>
                        <h5>Dua Layanan Sekaligus</h5>
                        <p>Satu tempat untuk creative gift dari MySimple dan jasa titip fleksibel dari JastipinAja.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="icon-badge">02</div>
                        <h5>Order Lebih Mudah</h5>
                        <p>Customer cukup chat WhatsApp untuk konsultasi, tanya harga, atau langsung melakukan pemesanan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="icon-badge">03</div>
                        <h5>Desain Menarik</h5>
                        <p>Tampilan yang manis, modern, dan profesional membantu brand terlihat lebih meyakinkan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="icon-badge">04</div>
                        <h5>Fleksibel & Siap Pakai</h5>
                        <p>Bisa dipakai untuk dua usaha sekaligus dan tetap membaca data paket serta katalog dari backend.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="harga" class="section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Paket Harga</h2>
                <p class="section-subtitle">
                    Bagian ini tetap membaca data langsung dari backend, sehingga Anda tetap bisa mengelola paket untuk MySimple,
                    JastipinAja, maupun kategori lain dari sistem admin.
                </p>
            </div>

            <?php foreach ($product_types as $type): ?>
                <?php $items = isset($package_groups[$type->code]) ? $package_groups[$type->code] : array(); ?>
                <?php if (!empty($items)): ?>
                    <div class="mb-5">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-2">
                            <div>
                                <span class="price-type-label"><?= html_escape($type->name); ?></span>
                                <h3 class="fw-bold mt-3 mb-1" style="color:var(--text-dark);"><?= html_escape($type->name); ?></h3>
                                <p class="text-muted mb-0"><?= html_escape($type->description); ?></p>
                            </div>
                        </div>

                        <div class="row g-4">
                            <?php foreach ($items as $p): ?>
                                <div class="col-lg-4">
                                    <div class="card price-card <?= $p->is_featured ? 'featured' : ''; ?>">
                                        <div class="card-body">
                                            <?php if ($p->is_featured): ?>
                                                <div class="mb-3">
                                                    <span class="price-type-label">Paket Unggulan</span>
                                                </div>
                                            <?php endif; ?>

                                            <div class="price-name"><?= html_escape($p->name); ?></div>

                                            <div class="price-amount">
                                                Rp<?= number_format((float)$p->price, 0, ',', '.'); ?>
                                            </div>

                                            <?php if (!empty($p->old_price)): ?>
                                                <div class="old-price">
                                                    Rp<?= number_format((float)$p->old_price, 0, ',', '.'); ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="price-desc">
                                                <?= nl2br(html_escape($p->description)); ?>
                                            </div>

                                            <ul class="feature-list">
                                                <?php foreach (preg_split('/\r\n|\r|\n/', trim((string)$p->features)) as $f): ?>
                                                    <?php if (trim($f) !== ''): ?>
                                                        <li><?= html_escape(trim($f)); ?></li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </ul>

                                            <a class="btn btn-main w-100"
                                                href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo saya ingin order paket ' . $p->name); ?>">
                                                <?= html_escape($p->button_text ?: 'Pilih Paket'); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="template" class="section section-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Katalog / Template Pilihan</h2>
                <p class="section-subtitle">
                    Tetap terhubung ke backend, sehingga katalog aktif bisa terus berubah sesuai data yang Anda atur di admin panel.
                </p>
            </div>

            <?php foreach ($product_types as $type): ?>
                <?php $items = isset($template_groups[$type->code]) ? $template_groups[$type->code] : array(); ?>
                <?php if (!empty($items)): ?>
                    <div class="mb-5">
                        <div class="mb-4">
                            <h3 class="fw-bold mb-1" style="color:var(--text-dark);"><?= html_escape($type->name); ?></h3>
                            <p class="text-muted mb-0">Berikut data aktif untuk kategori ini.</p>
                        </div>

                        <div class="row g-4">
                            <?php foreach ($items as $t): ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card template-card">
                                        <div class="template-preview" style="background-image:url('<?= html_escape($t->thumbnail); ?>')"></div>
                                        <div class="card-body">
                                            <h5><?= html_escape($t->name); ?></h5>
                                            <p><?= html_escape($t->description); ?></p>

                                            <div class="d-flex flex-wrap gap-2">
                                                <?php if (!empty($t->demo_url)): ?>
                                                    <a href="<?= html_escape($t->demo_url); ?>" target="_blank" class="btn btn-outline-soft btn-sm">
                                                        Preview
                                                    </a>
                                                <?php endif; ?>

                                                <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo saya tertarik dengan ' . $t->name); ?>"
                                                    class="btn btn-main btn-sm">
                                                    Tanya / Order
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="cara-order" class="section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Cara Order</h2>
                <p class="section-subtitle">
                    Tidak perlu bingung. Customer cukup mengikuti langkah sederhana berikut untuk order di MySimple maupun JastipinAja.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h5>Hubungi Kami</h5>
                        <p>Chat WhatsApp untuk bertanya, konsultasi, atau langsung melakukan pemesanan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h5>Pilih Layanan</h5>
                        <p>Pilih apakah ingin order creative gift dari MySimple atau titip beli lewat JastipinAja.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h5>Proses Pesanan</h5>
                        <p>Pesanan akan diproses sesuai detail kebutuhan, request, dan jenis layanan yang dipilih.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-number">4</div>
                        <h5>Selesai</h5>
                        <p>Pesanan siap dibagikan, dipublikasikan, atau diteruskan ke tahap pengiriman.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="section section-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Pertanyaan Umum</h2>
                <p class="section-subtitle">
                    Beberapa pertanyaan yang sering ditanyakan customer tentang layanan MySimple dan JastipinAja.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="faq-card">
                        <h5>Apakah MySimple hanya untuk undangan digital?</h5>
                        <p>Tidak. MySimple juga bisa digunakan untuk greeting card, bouquet, hampers, gift box, dan berbagai creative gift lainnya.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="faq-card">
                        <h5>Apakah JastipinAja hanya untuk skincare?</h5>
                        <p>Tidak. Selain skincare, JastipinAja juga bisa membantu titip beli makanan, gift, dan berbagai barang request lainnya.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="faq-card">
                        <h5>Apakah order dilakukan via WhatsApp?</h5>
                        <p>Ya. Seluruh proses konsultasi dan pemesanan dibuat lebih mudah melalui WhatsApp agar cepat dan praktis.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="faq-card">
                        <h5>Apakah data paket dan katalog selalu update?</h5>
                        <p>Ya. Bagian paket dan katalog tetap membaca data langsung dari backend, sehingga menyesuaikan data aktif di sistem.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="faq-card">
                        <h5>Apakah customer bisa request custom?</h5>
                        <p>Bisa. Untuk MySimple bisa request gift atau kreasi tertentu, sedangkan untuk JastipinAja bisa request barang sesuai kebutuhan.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="faq-card">
                        <h5>Apakah homepage ini cocok untuk dua usaha sekaligus?</h5>
                        <p>Sangat cocok. Layout ini memang dibuat supaya dua brand tetap punya identitas sendiri, tetapi tetap terlihat menyatu dan profesional.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section cta-section">
        <div class="container">
            <div class="cta-card">
                <h2>Siap Order di MySimple atau JastipinAja?</h2>
                <p>
                    Satu halaman ini dirancang agar dua usaha Anda tampil cantik, jelas, dan tetap mudah dipahami customer.
                    Cocok untuk brand yang ingin terlihat manis, modern, dan tetap nyaman untuk jualan.
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="<?= site_url('admin/login'); ?>" class="btn btn-soft">Masuk Admin</a>
                    <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20konsultasi%20tentang%20MySimple%20dan%20JastipinAja" class="btn btn-main">
                        Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row g-3 align-items-center">
                <div class="col-md-7">
                    <strong><?= html_escape($brand_name); ?></strong><br>
                    <small>
                        MySimple untuk creative gift, undangan, greeting card, bouquet, dan hampers.
                        JastipinAja untuk jasa titip skincare, makanan, dan berbagai kebutuhan lainnya.
                    </small>
                </div>
                <div class="col-md-5 text-md-end">
                    <small>
                        © <?= date('Y'); ?> <?= html_escape($brand_name); ?>. All rights reserved.
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>