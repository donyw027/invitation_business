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
    <meta name="theme-color" content="#fffaf5">

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
            border: 1px solid rgba(31, 41, 55, .08);
            border-radius: 28px;
            padding: 12px;
            box-shadow: 0 18px 50px rgba(31, 41, 55, .07)
        }

        .local-photo-square {
            position: relative;
            aspect-ratio: 1/1;
            border-radius: 22px;
            background: linear-gradient(135deg, #f7dfe4, #fff7ed);
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
            color: #1f2937
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
            color: #6b7280
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
            color: #1f2937;
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
            border: 1px solid rgba(31, 41, 55, .08);
            border-radius: 999px;
            padding: 10px 16px;
            color: #1f2937;
            text-decoration: none;
            font-weight: 800;
            font-size: 14px;
            box-shadow: 0 12px 30px rgba(31, 41, 55, .06)
        }

        .template-preview-frame {
            min-height: 230px;
            border-radius: 24px;
            background: linear-gradient(135deg, #fff7ed, #f7dfe4);
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
            background: linear-gradient(135deg, #fff7ed, #f7dfe4);
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end
        }

        .preview-plain-card.mint {
            background: linear-gradient(135deg, #ecfdf5, #fff7ed)
        }

        .preview-plain-card.dark {
            background: linear-gradient(135deg, #1f2937, #4b5563);
            color: #fff
        }

        .sheet-topbar {
            height: 34px;
            border-radius: 16px 16px 0 0;
            background: #1f2937;
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
            background: #f3f4f6;
            border: 1px solid rgba(31, 41, 55, .08);
            border-top: 0;
            border-radius: 0 0 16px 16px;
            overflow: hidden
        }

        .sheet-grid-preview i {
            height: 26px;
            background: #fff
        }

        .sheet-grid-preview i:nth-child(3n) {
            background: #fff7ed
        }

        .sheet-grid-preview i:nth-child(5n) {
            background: #f7dfe4
        }

        .spreadsheet-card {
            overflow: hidden
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