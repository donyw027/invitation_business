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

    <style>
        :root{
            --primary:#111827;
            --secondary:#334155;
            --soft:#f8fafc;
            --soft-2:#f1f5f9;
            --muted:#64748b;
            --line:#e2e8f0;
            --accent:#0f172a;
            --rose:#fff1f2;
            --rose-border:#fecdd3;
            --rose-text:#9f1239;
            --amber:#fffbeb;
            --amber-border:#fde68a;
            --amber-text:#92400e;
            --card-shadow:0 18px 45px rgba(15,23,42,.08);
            --card-shadow-hover:0 22px 55px rgba(15,23,42,.14);
        }

        html{
            scroll-behavior:smooth;
        }

        body{
            font-family:'Plus Jakarta Sans',sans-serif;
            color:var(--accent);
            background:#ffffff;
        }

        a{
            text-decoration:none;
        }

        .navbar{
            backdrop-filter:saturate(180%) blur(14px);
            background:rgba(255,255,255,.94)!important;
        }

        .navbar-brand{
            font-weight:800;
            letter-spacing:.2px;
        }

        .nav-link{
            font-weight:600;
            color:#334155!important;
        }

        .btn{
            border-radius:14px;
            font-weight:700;
            padding:.85rem 1.2rem;
        }

        .btn-dark{
            background:#0f172a;
            border-color:#0f172a;
        }

        .btn-dark:hover{
            background:#020617;
            border-color:#020617;
        }

        .btn-outline-dark:hover{
            background:#0f172a;
            border-color:#0f172a;
        }

        .btn-soft{
            background:#fff;
            color:#0f172a;
            border:1px solid rgba(255,255,255,.4);
        }

        .btn-soft:hover{
            background:#f8fafc;
            color:#0f172a;
        }

        .section{
            padding:90px 0;
        }

        .section-title{
            margin-bottom:18px;
            font-size:2rem;
            font-weight:800;
            color:#0f172a;
        }

        .section-subtitle{
            color:var(--muted);
            max-width:760px;
            margin:0 auto;
            line-height:1.8;
        }

        .hero{
            position:relative;
            overflow:hidden;
            background:
                radial-gradient(circle at top left, rgba(255,255,255,.10), transparent 30%),
                radial-gradient(circle at bottom right, rgba(255,255,255,.08), transparent 25%),
                linear-gradient(135deg,#0f172a 0%, #1e293b 45%, #334155 100%);
            color:#fff;
            padding:110px 0 90px;
        }

        .hero::before{
            content:"";
            position:absolute;
            inset:0;
            background:linear-gradient(to bottom, rgba(255,255,255,.02), rgba(255,255,255,0));
            pointer-events:none;
        }

        .hero-badge{
            display:inline-flex;
            align-items:center;
            gap:8px;
            background:rgba(255,255,255,.12);
            border:1px solid rgba(255,255,255,.18);
            color:#fff;
            padding:10px 16px;
            border-radius:999px;
            font-size:.9rem;
            font-weight:600;
            margin-bottom:22px;
        }

        .hero h1{
            font-size:clamp(2.4rem,5vw,4.25rem);
            font-weight:800;
            line-height:1.08;
            letter-spacing:-.03em;
        }

        .hero p{
            color:rgba(255,255,255,.82);
            font-size:1.05rem;
            max-width:680px;
            line-height:1.9;
        }

        .hero-card{
            background:rgba(255,255,255,.96);
            color:#0f172a;
            border:none;
            border-radius:24px;
            box-shadow:0 25px 80px rgba(2,6,23,.28);
        }

        .hero-card .mini-box{
            background:#f8fafc;
            border:1px solid #e2e8f0;
            border-radius:18px;
            padding:14px;
            text-align:center;
        }

        .hero-card .mini-box h6{
            margin-bottom:6px;
            font-weight:800;
            font-size:1rem;
        }

        .stats-row{
            margin-top:28px;
        }

        .stats-box{
            background:rgba(255,255,255,.08);
            border:1px solid rgba(255,255,255,.10);
            border-radius:20px;
            padding:18px 20px;
            height:100%;
        }

        .stats-box h4{
            margin-bottom:4px;
            font-weight:800;
        }

        .stats-box p{
            margin:0;
            color:rgba(255,255,255,.72);
            font-size:.92rem;
        }

        .feature-card,
        .price-card,
        .template-card,
        .faq-card,
        .cta-box,
        .brand-card,
        .service-card,
        .how-step{
            border:1px solid var(--line);
            border-radius:24px;
            box-shadow:var(--card-shadow);
            transition:.25s ease;
            background:#fff;
        }

        .feature-card:hover,
        .price-card:hover,
        .template-card:hover,
        .faq-card:hover,
        .brand-card:hover,
        .service-card:hover,
        .how-step:hover{
            transform:translateY(-4px);
            box-shadow:var(--card-shadow-hover);
        }

        .feature-card,
        .faq-card,
        .service-card{
            padding:28px;
            height:100%;
        }

        .brand-card{
            padding:34px;
            height:100%;
            position:relative;
            overflow:hidden;
        }

        .brand-card.mysimple{
            background:linear-gradient(135deg,#fff7f9 0%, #fff1f2 100%);
            border-color:#fecdd3;
        }

        .brand-card.jastip{
            background:linear-gradient(135deg,#fffdf5 0%, #fffbeb 100%);
            border-color:#fde68a;
        }

        .brand-badge{
            display:inline-block;
            padding:8px 14px;
            border-radius:999px;
            font-size:.84rem;
            font-weight:700;
            margin-bottom:16px;
        }

        .brand-badge.mysimple{
            background:#ffe4e6;
            color:#9f1239;
        }

        .brand-badge.jastip{
            background:#fef3c7;
            color:#92400e;
        }

        .brand-card h3{
            font-size:1.9rem;
            font-weight:800;
            margin-bottom:14px;
        }

        .brand-card p{
            color:#475569;
            line-height:1.8;
            margin-bottom:20px;
        }

        .tag-list{
            display:flex;
            flex-wrap:wrap;
            gap:10px;
            margin-bottom:22px;
        }

        .tag-pill{
            display:inline-flex;
            align-items:center;
            padding:8px 12px;
            border-radius:999px;
            font-size:.82rem;
            font-weight:700;
            background:#fff;
            border:1px solid #e2e8f0;
            color:#334155;
        }

        .feature-card .icon-box,
        .service-card .icon-box{
            width:58px;
            height:58px;
            border-radius:18px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:linear-gradient(135deg,#0f172a,#334155);
            color:#fff;
            font-size:1.25rem;
            font-weight:800;
            margin-bottom:18px;
        }

        .feature-card h5,
        .service-card h5{
            font-weight:800;
            margin-bottom:10px;
        }

        .feature-card p,
        .service-card p{
            color:var(--muted);
            margin-bottom:0;
            line-height:1.8;
        }

        .section-alt{
            background:var(--soft);
        }

        .mysimple-zone{
            background:linear-gradient(180deg,#fff7f9 0%, #ffffff 100%);
        }

        .jastip-zone{
            background:linear-gradient(180deg,#fffdf5 0%, #ffffff 100%);
        }

        .zone-label{
            display:inline-block;
            padding:8px 14px;
            border-radius:999px;
            font-size:.84rem;
            font-weight:700;
            margin-bottom:14px;
        }

        .zone-label.mysimple{
            background:#ffe4e6;
            color:#9f1239;
        }

        .zone-label.jastip{
            background:#fef3c7;
            color:#92400e;
        }

        .price-card{
            overflow:hidden;
            height:100%;
        }

        .price-card .card-body{
            padding:30px;
        }

        .price-card.featured{
            border:1.5px solid #0f172a;
            position:relative;
        }

        .price-card.featured::before{
            content:"";
            position:absolute;
            inset:0 0 auto 0;
            height:5px;
            background:linear-gradient(90deg,#111827,#475569);
        }

        .price-type-label{
            display:inline-block;
            padding:8px 14px;
            background:#eef2ff;
            color:#1e293b;
            border-radius:999px;
            font-size:.84rem;
            font-weight:700;
        }

        .price-name{
            font-size:1.35rem;
            font-weight:800;
            margin-top:18px;
            margin-bottom:12px;
        }

        .price-amount{
            font-size:2rem;
            font-weight:800;
            color:#0f172a;
            line-height:1.1;
            margin-bottom:6px;
        }

        .old-price{
            color:#94a3b8;
            text-decoration:line-through;
            font-weight:600;
        }

        .price-desc{
            color:var(--muted);
            margin:16px 0 18px;
            min-height:52px;
            line-height:1.8;
        }

        .feature-list{
            list-style:none;
            padding:0;
            margin:0 0 22px;
        }

        .feature-list li{
            position:relative;
            padding-left:26px;
            margin-bottom:10px;
            color:#334155;
            line-height:1.7;
        }

        .feature-list li::before{
            content:"✓";
            position:absolute;
            left:0;
            top:0;
            color:#0f172a;
            font-weight:800;
        }

        .template-card{
            overflow:hidden;
            height:100%;
        }

        .template-preview{
            height:240px;
            background-size:cover;
            background-position:center;
            background-color:#e5e7eb;
            position:relative;
        }

        .template-preview::after{
            content:"";
            position:absolute;
            inset:0;
            background:linear-gradient(to top, rgba(15,23,42,.18), rgba(15,23,42,0));
        }

        .template-card .card-body{
            padding:24px;
        }

        .template-card h5{
            font-weight:800;
            margin-bottom:10px;
        }

        .template-card p{
            color:var(--muted);
            min-height:48px;
            line-height:1.8;
        }

        .how-step{
            position:relative;
            padding:28px 24px;
            height:100%;
            box-shadow:0 10px 30px rgba(15,23,42,.05);
        }

        .how-number{
            width:48px;
            height:48px;
            border-radius:50%;
            background:#0f172a;
            color:#fff;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:800;
            margin-bottom:16px;
        }

        .how-step h5{
            font-weight:800;
            margin-bottom:10px;
        }

        .how-step p{
            color:var(--muted);
            margin-bottom:0;
            line-height:1.8;
        }

        .faq-card{
            padding:24px;
            height:100%;
        }

        .faq-card h5{
            font-weight:800;
            font-size:1.05rem;
            margin-bottom:10px;
        }

        .faq-card p{
            color:var(--muted);
            margin-bottom:0;
            line-height:1.8;
        }

        .cta-section{
            background:linear-gradient(135deg,#f8fafc,#eef2f7);
        }

        .cta-box{
            padding:42px;
        }

        .footer{
            background:#0f172a;
            color:rgba(255,255,255,.8);
            padding:34px 0;
        }

        .footer a{
            color:#fff;
        }

        .text-muted-custom{
            color:var(--muted);
        }

        .bg-soft{
            background:var(--soft);
        }

        .divider-title{
            display:flex;
            align-items:center;
            gap:16px;
            margin-bottom:18px;
        }

        .divider-title::before,
        .divider-title::after{
            content:"";
            flex:1;
            height:1px;
            background:#e2e8f0;
        }

        @media (max-width: 991.98px){
            .hero{
                padding:90px 0 70px;
            }

            .section{
                padding:75px 0;
            }

            .template-preview{
                height:220px;
            }

            .price-desc,
            .template-card p{
                min-height:auto;
            }

            .brand-card{
                padding:26px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg border-bottom sticky-top">
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
                    <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20bertanya%20tentang%20layanan%20<?= rawurlencode($brand_name); ?>" class="btn btn-dark">
                        Chat WhatsApp
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container position-relative">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <div class="hero-badge">✨ Dua layanan dalam satu tempat</div>
                <h1>MySimple & JastipinAja untuk Momen Spesial dan Kebutuhan Sehari-hari</h1>
                <p class="mt-3">
                    Kami menghadirkan dua layanan utama dalam satu brand experience.
                    <strong>MySimple</strong> fokus pada undangan digital, greeting card, bouquet, hampers, dan creative gift.
                    Sedangkan <strong>JastipinAja</strong> hadir untuk membantu jasa titip skincare, makanan, gift, dan berbagai barang lainnya dengan proses yang praktis dan mudah.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="#brand-kami" class="btn btn-light btn-lg">Jelajahi Layanan</a>
                    <a href="#cara-order" class="btn btn-soft btn-lg">Cara Order</a>
                </div>

                <div class="row g-3 stats-row">
                    <div class="col-sm-4">
                        <div class="stats-box">
                            <h4>2 Brand</h4>
                            <p>Creative gift & jasa titip</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stats-box">
                            <h4>Mudah</h4>
                            <p>Order cepat via WhatsApp</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stats-box">
                            <h4>Fleksibel</h4>
                            <p>Banyak pilihan layanan</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card hero-card p-4 p-lg-4">
                    <div class="card-body p-0">
                        <h4 class="fw-bold mb-3">Flow Layanan</h4>
                        <p class="text-muted-custom mb-4">
                            Satu tempat untuk creative gift dan jasa titip dengan proses yang simpel dan jelas.
                        </p>

                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <div class="mini-box">
                                    <h6>1. Chat</h6>
                                    <small class="text-muted">Hubungi via WA</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mini-box">
                                    <h6>2. Pilih</h6>
                                    <small class="text-muted">Pilih layanan</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mini-box">
                                    <h6>3. Proses</h6>
                                    <small class="text-muted">Kami bantu siapkan</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mini-box">
                                    <h6>4. Selesai</h6>
                                    <small class="text-muted">Siap dibagikan / dikirim</small>
                                </div>
                            </div>
                        </div>

                        <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20konsultasi%20tentang%20MySimple%20dan%20JastipinAja"
                           class="btn btn-dark w-100">
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
            <h2 class="section-title">Dua Brand, Dua Solusi Utama</h2>
            <p class="section-subtitle">
                Dalam satu halaman ini, customer bisa langsung mengenal dua layanan utama kami.
                MySimple cocok untuk kebutuhan gift dan momen spesial, sedangkan JastipinAja cocok untuk kebutuhan titip beli yang praktis.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="brand-card mysimple h-100">
                    <span class="brand-badge mysimple">MySimple</span>
                    <h3>Creative Gift for Special Moments</h3>
                    <p>
                        MySimple adalah layanan untuk berbagai kebutuhan momen spesial seperti undangan digital,
                        greeting card, bouquet ulang tahun, hampers, gift box, hingga berbagai kreasi gift yang bisa dibuat
                        lebih cantik, lebih estetik, dan lebih berkesan.
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
                        <a href="#mysimple" class="btn btn-dark">Lihat MySimple</a>
                        <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20order%20layanan%20MySimple" class="btn btn-outline-dark">Order MySimple</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="brand-card jastip h-100">
                    <span class="brand-badge jastip">JastipinAja</span>
                    <h3>Titip Beli Apa Aja, Lebih Gampang</h3>
                    <p>
                        JastipinAja adalah layanan jasa titip untuk membantu pembelian berbagai kebutuhan seperti skincare,
                        makanan, gift, produk harian, hingga request barang lainnya. Cocok untuk customer yang ingin proses cepat,
                        simpel, dan tidak ribet.
                    </p>
                    <div class="tag-list">
                        <span class="tag-pill">Skincare</span>
                        <span class="tag-pill">Snack & Makanan</span>
                        <span class="tag-pill">Titip Barang</span>
                        <span class="tag-pill">Beauty Product</span>
                        <span class="tag-pill">Gift Item</span>
                        <span class="tag-pill">Request Barang</span>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#jastipinaja" class="btn btn-dark">Lihat JastipinAja</a>
                        <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20titip%20belanja%20di%20JastipinAja" class="btn btn-outline-dark">Titip Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="mysimple" class="section mysimple-zone">
    <div class="container">
        <div class="text-center mb-5">
            <span class="zone-label mysimple">MySimple</span>
            <h2 class="section-title">Untuk Undangan, Gift, dan Momen Spesial</h2>
            <p class="section-subtitle">
                MySimple hadir untuk membantu Anda menyiapkan berbagai kebutuhan spesial dengan tampilan yang manis,
                rapi, estetik, dan mudah dipesan.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <div class="icon-box">01</div>
                    <h5>Undangan Digital</h5>
                    <p>Undangan digital yang modern, elegan, dan siap dibagikan melalui link untuk berbagai acara spesial.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <div class="icon-box">02</div>
                    <h5>Greeting Card</h5>
                    <p>Kartu ucapan dengan desain manis dan personal untuk ulang tahun, ucapan terima kasih, atau momen spesial lainnya.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <div class="icon-box">03</div>
                    <h5>Bouquet & Gift</h5>
                    <p>Berbagai pilihan bouquet, money bouquet, dan hadiah spesial yang tampil cantik dan berkesan.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <div class="icon-box">04</div>
                    <h5>Custom Kreasi</h5>
                    <p>Custom gift, hampers, dan kreasi khusus yang bisa disesuaikan dengan kebutuhan dan tema customer.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="jastipinaja" class="section jastip-zone">
    <div class="container">
        <div class="text-center mb-5">
            <span class="zone-label jastip">JastipinAja</span>
            <h2 class="section-title">Untuk Jasa Titip yang Praktis dan Fleksibel</h2>
            <p class="section-subtitle">
                JastipinAja dibuat untuk customer yang ingin titip beli barang tanpa ribet.
                Cocok untuk kebutuhan personal, hadiah, maupun barang request lainnya.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <div class="icon-box">01</div>
                    <h5>Skincare & Beauty</h5>
                    <p>Bantu titip beli skincare, make up, body care, dan berbagai produk kecantikan lainnya.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <div class="icon-box">02</div>
                    <h5>Makanan & Snack</h5>
                    <p>Titip beli makanan, snack, oleh-oleh, atau produk favorit yang ingin dibelikan dengan mudah.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <div class="icon-box">03</div>
                    <h5>Barang Titipan</h5>
                    <p>Customer bisa request berbagai barang lain sesuai kebutuhan selama masih memungkinkan untuk dibelikan.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-card">
                    <div class="icon-box">04</div>
                    <h5>Request Fleksibel</h5>
                    <p>Bukan cuma satu kategori, JastipinAja bisa bantu titip beli berbagai kebutuhan dengan proses yang jelas.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="kenapa-kami" class="section section-alt">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Kenapa Memilih Kami</h2>
            <p class="section-subtitle">
                Kami menggabungkan kreativitas dan kemudahan layanan dalam satu tempat,
                sehingga customer bisa memilih layanan gift maupun jasa titip dengan proses yang sederhana.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="icon-box">01</div>
                    <h5>Dua Layanan Sekaligus</h5>
                    <p>Satu tempat untuk creative gift melalui MySimple dan jasa titip praktis melalui JastipinAja.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="icon-box">02</div>
                    <h5>Mudah Dipesan</h5>
                    <p>Customer cukup order melalui WhatsApp dengan proses yang simpel, cepat, dan tidak membingungkan.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="icon-box">03</div>
                    <h5>Fleksibel</h5>
                    <p>Tersedia pilihan layanan untuk momen spesial maupun kebutuhan titip beli sehari-hari.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="icon-box">04</div>
                    <h5>Praktis & Siap Pakai</h5>
                    <p>Mulai dari undangan yang siap dibagikan hingga barang titipan yang siap diproses dengan jelas.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="harga" class="section bg-soft">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Paket Harga</h2>
            <p class="section-subtitle">
                Bagian ini tetap membaca data langsung dari backend. Bisa dipakai untuk paket MySimple, JastipinAja,
                atau kategori lain sesuai pengaturan product type yang ada di sistem Anda.
            </p>
        </div>

        <?php foreach ($product_types as $type): ?>
            <?php $items = isset($package_groups[$type->code]) ? $package_groups[$type->code] : array(); ?>
            <?php if (!empty($items)): ?>
                <div class="mb-5">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-2">
                        <div>
                            <span class="price-type-label"><?= html_escape($type->name); ?></span>
                            <h3 class="fw-bold mt-2 mb-1"><?= html_escape($type->name); ?></h3>
                            <p class="text-muted mb-0"><?= html_escape($type->description); ?></p>
                        </div>
                    </div>

                    <div class="row g-4">
                        <?php foreach ($items as $p): ?>
                            <div class="col-lg-4">
                                <div class="card price-card <?= $p->is_featured ? 'featured' : ''; ?>">
                                    <div class="card-body">
                                        <?php if ($p->is_featured): ?>
                                            <div class="badge text-bg-dark mb-3 px-3 py-2 rounded-pill">Paket Unggulan</div>
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

                                        <a class="btn btn-dark w-100"
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

<section id="template" class="section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Katalog / Template Pilihan</h2>
            <p class="section-subtitle">
                Bagian ini juga tetap membaca data aktif dari backend. Bisa digunakan untuk template undangan,
                katalog gift, maupun kategori tampilan lain sesuai kebutuhan bisnis Anda.
            </p>
        </div>

        <?php foreach ($product_types as $type): ?>
            <?php $items = isset($template_groups[$type->code]) ? $template_groups[$type->code] : array(); ?>
            <?php if (!empty($items)): ?>
                <div class="mb-5">
                    <div class="mb-4">
                        <h3 class="fw-bold mb-1"><?= html_escape($type->name); ?></h3>
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
                                                <a href="<?= html_escape($t->demo_url); ?>" target="_blank" class="btn btn-outline-dark btn-sm">
                                                    Preview
                                                </a>
                                            <?php endif; ?>

                                            <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=<?= rawurlencode('Halo saya tertarik dengan ' . $t->name); ?>"
                                               class="btn btn-dark btn-sm">
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

<section id="cara-order" class="section bg-soft">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Cara Order</h2>
            <p class="section-subtitle">
                Tidak perlu bingung, customer cukup mengikuti alur sederhana di bawah ini untuk order MySimple maupun JastipinAja.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="how-step">
                    <div class="how-number">1</div>
                    <h5>Hubungi Kami</h5>
                    <p>Chat WhatsApp untuk konsultasi, tanya layanan, atau langsung melakukan pemesanan.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="how-step">
                    <div class="how-number">2</div>
                    <h5>Pilih Layanan</h5>
                    <p>Pilih apakah ingin order creative gift dari MySimple atau titip beli melalui JastipinAja.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="how-step">
                    <div class="how-number">3</div>
                    <h5>Proses Pesanan</h5>
                    <p>Detail order akan kami proses sesuai kebutuhan, baik untuk desain gift maupun barang titipan.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="how-step">
                    <div class="how-number">4</div>
                    <h5>Selesai</h5>
                    <p>Pesanan siap dibagikan, dipublikasikan, atau diteruskan ke tahap pengiriman sesuai jenis layanan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="faq" class="section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Pertanyaan Umum</h2>
            <p class="section-subtitle">
                Beberapa pertanyaan yang sering ditanyakan customer tentang MySimple dan JastipinAja.
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
                    <p>Ya, seluruh proses konsultasi dan pemesanan dilakukan dengan mudah melalui WhatsApp agar lebih cepat dan praktis.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="faq-card">
                    <h5>Apakah data paket dan katalog selalu update?</h5>
                    <p>Ya, bagian paket dan katalog pada halaman ini membaca data langsung dari backend sehingga selalu mengikuti data aktif di sistem.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="faq-card">
                    <h5>Apakah customer bisa request kebutuhan custom?</h5>
                    <p>Bisa. Untuk MySimple bisa request gift atau kreasi tertentu, sedangkan untuk JastipinAja bisa request barang sesuai kebutuhan.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="faq-card">
                    <h5>Apakah homepage ini bisa dipakai untuk dua usaha sekaligus?</h5>
                    <p>Bisa sekali. Desain ini memang dibuat agar dua brand tetap tampil jelas dalam satu halaman tanpa membingungkan customer.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <div class="cta-box text-center">
            <h2 class="fw-bold mb-3">Siap Order di MySimple atau JastipinAja?</h2>
            <p class="text-muted mb-4">
                Satu halaman ini dirancang agar dua usaha Anda bisa tampil bersama dengan jelas:
                MySimple untuk creative gift dan momen spesial, JastipinAja untuk jasa titip yang praktis.
                Semua tetap bisa dikelola dari backend agar mudah diatur untuk bisnis Anda.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="<?= site_url('admin/login'); ?>" class="btn btn-outline-dark">Masuk Admin</a>
                <a href="https://wa.me/<?= html_escape($wa_number); ?>?text=Halo%20saya%20ingin%20konsultasi%20tentang%20MySimple%20dan%20JastipinAja" class="btn btn-dark">
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