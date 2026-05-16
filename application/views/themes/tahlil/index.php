<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title ?? ($project->title ?? 'Undangan Tahlil')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#12352f">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <?php
    $title = !empty($project->title) ? $project->title : 'Undangan Tahlil';
    $subtitle = !empty($project->subtitle) ? $project->subtitle : 'Tahlil & Doa Bersama';
    $coverText = !empty($project->cover_text) ? $project->cover_text : 'Dengan penuh hormat kami mengundang Bapak/Ibu/Saudara/i';
    $description = !empty($project->description) ? $project->description : 'Dalam rangka mengenang dan mendoakan almarhum/almarhumah, kami mengharap kehadiran Bapak/Ibu/Saudara/i dalam acara tahlil dan doa bersama.';
    $messageTitle = !empty($project->message_title) ? $project->message_title : 'Mohon Doa & Kehadiran';
    $messageBody = !empty($project->message_body) ? $project->message_body : 'Semoga doa yang dipanjatkan menjadi keberkahan, ketenangan, dan amal kebaikan bagi almarhum/almarhumah serta keluarga yang ditinggalkan diberikan kesabaran dan keikhlasan.';
    $deceasedName = !empty($project->receiver_name) ? $project->receiver_name : (!empty($project->title) ? $project->title : 'Almarhum/Almarhumah');
    $familyName = !empty($project->sender_name) ? $project->sender_name : 'Keluarga Besar';
    $eventDateFormatted = !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : '';
    $eventDateISO = !empty($project->event_date) ? date('Y-m-d', strtotime($project->event_date)) : '';
    $eventTime = !empty($project->event_time) ? $project->event_time : 'Waktu menyusul';
    $locationName = !empty($project->location_name) ? $project->location_name : '';
    $locationAddress = !empty($project->location_address) ? $project->location_address : '';
    $heroImage = !empty($project->hero_image) ? asset_or_url($project->hero_image) : 'https://images.unsplash.com/photo-1519817650390-64a93db51149?auto=format&fit=crop&w=1600&q=85';
    $musicUrl = !empty($project->music_url) ? $project->music_url : '';
    $guestName = !empty($guest_name) ? $guest_name : (!empty($guest->name) ? $guest->name : 'Tamu Undangan');
    $inviteUrl = current_url();
    $mapQuery = trim($locationName . ' ' . $locationAddress);
    $mapUrl = !empty($mapQuery) ? 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($mapQuery) : '';
    ?>

    <style>
        :root{
            --deep:#0f2f2a;
            --deep2:#123c34;
            --green:#1f5f4e;
            --gold:#c9a75d;
            --gold2:#ecd89a;
            --cream:#f8f3e7;
            --paper:#fffdf7;
            --muted:#6d6a62;
            --line:rgba(31,95,78,.16);
            --shadow:0 28px 80px rgba(15,47,42,.16);
        }
        *{box-sizing:border-box}
        body{
            margin:0;
            font-family:'Inter',sans-serif;
            color:#22312d;
            background:
                radial-gradient(circle at 10% 5%, rgba(201,167,93,.18), transparent 34%),
                radial-gradient(circle at 90% 10%, rgba(31,95,78,.12), transparent 30%),
                linear-gradient(180deg,#fbf7ee 0%,#f4efe3 100%);
            overflow-x:hidden;
        }
        a{text-decoration:none}
        .page{
            position:relative;
            min-height:100vh;
        }
        .ornament-bg{
            position:fixed;
            inset:0;
            pointer-events:none;
            opacity:.08;
            background-image:
                linear-gradient(30deg, transparent 35%, var(--green) 35%, var(--green) 36%, transparent 36%),
                linear-gradient(150deg, transparent 35%, var(--green) 35%, var(--green) 36%, transparent 36%);
            background-size:90px 90px;
            z-index:0;
        }
        .topbar{
            position:fixed;
            top:18px;
            left:50%;
            transform:translateX(-50%);
            width:min(1120px,calc(100% - 32px));
            z-index:20;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:16px;
            padding:12px 16px;
            border:1px solid rgba(255,255,255,.42);
            border-radius:999px;
            background:rgba(255,253,247,.75);
            backdrop-filter:blur(16px);
            box-shadow:0 18px 50px rgba(15,47,42,.09);
        }
        .brand-mini{
            display:flex;
            align-items:center;
            gap:10px;
            color:var(--deep);
            font-weight:900;
            letter-spacing:.08em;
            text-transform:uppercase;
            font-size:12px;
        }
        .brand-mini span{
            width:34px;
            height:34px;
            display:grid;
            place-items:center;
            border-radius:50%;
            background:linear-gradient(135deg,var(--deep),var(--green));
            color:#fff;
        }
        .nav-mini{
            display:flex;
            align-items:center;
            gap:8px;
            flex-wrap:wrap;
            justify-content:flex-end;
        }
        .nav-mini a{
            color:#42514d;
            font-size:12px;
            font-weight:800;
            padding:9px 12px;
            border-radius:999px;
        }
        .nav-mini a:hover{background:rgba(31,95,78,.09);color:var(--deep)}
        .hero{
            position:relative;
            z-index:1;
            min-height:100vh;
            display:flex;
            align-items:center;
            padding:118px 0 70px;
        }
        .hero-card{
            border-radius:42px;
            overflow:hidden;
            background:var(--paper);
            box-shadow:var(--shadow);
            border:1px solid rgba(31,95,78,.12);
        }
        .hero-content{
            min-height:650px;
            padding:54px 54px;
            display:flex;
            flex-direction:column;
            justify-content:center;
            position:relative;
            background:
                radial-gradient(circle at top left, rgba(236,216,154,.28), transparent 30%),
                linear-gradient(180deg,#fffdf8,#fbf3e4);
        }
        .bismillah{
            font-family:'Amiri',serif;
            color:var(--gold);
            font-size:32px;
            line-height:1;
            margin-bottom:18px;
        }
        .kicker{
            display:inline-flex;
            align-items:center;
            gap:9px;
            color:var(--green);
            background:rgba(31,95,78,.08);
            border:1px solid rgba(31,95,78,.12);
            padding:9px 14px;
            border-radius:999px;
            font-size:12px;
            font-weight:900;
            letter-spacing:.13em;
            text-transform:uppercase;
            width:max-content;
            margin-bottom:20px;
        }
        .hero-title{
            font-family:'Cormorant Garamond',serif;
            font-size:72px;
            line-height:.92;
            color:var(--deep);
            font-weight:700;
            letter-spacing:-.04em;
            margin:0 0 18px;
        }
        .deceased{
            font-family:'Cormorant Garamond',serif;
            font-size:42px;
            color:var(--gold);
            font-weight:700;
            margin-bottom:18px;
        }
        .hero-desc{
            color:var(--muted);
            font-size:16px;
            line-height:1.9;
            max-width:560px;
        }
        .guest-pill{
            display:inline-flex;
            align-items:center;
            gap:10px;
            margin-top:26px;
            width:max-content;
            max-width:100%;
            border-radius:999px;
            padding:12px 16px;
            background:#fff;
            border:1px solid var(--line);
            color:var(--deep);
            font-weight:800;
            box-shadow:0 14px 35px rgba(15,47,42,.08);
        }
        .hero-visual{
            position:relative;
            min-height:650px;
            height:100%;
            background:var(--deep);
        }
        .hero-visual img{
            width:100%;
            height:100%;
            min-height:650px;
            object-fit:cover;
            opacity:.78;
            filter:saturate(.9) contrast(.98);
        }
        .visual-overlay{
            position:absolute;
            inset:0;
            background:
                linear-gradient(180deg,rgba(15,47,42,.02),rgba(15,47,42,.82)),
                radial-gradient(circle at center,transparent 20%,rgba(15,47,42,.35) 100%);
        }
        .visual-caption{
            position:absolute;
            left:34px;
            right:34px;
            bottom:34px;
            padding:26px;
            border-radius:30px;
            background:rgba(255,253,247,.13);
            border:1px solid rgba(255,255,255,.25);
            backdrop-filter:blur(14px);
            color:#fff;
        }
        .visual-caption h2{
            font-family:'Cormorant Garamond',serif;
            font-size:38px;
            line-height:1;
            margin:0 0 10px;
        }
        .visual-caption p{
            margin:0;
            color:rgba(255,255,255,.78);
            line-height:1.7;
        }
        .section{
            position:relative;
            z-index:1;
            padding:88px 0;
        }
        .section-sm{padding:62px 0}
        .section-head{
            margin-bottom:34px;
        }
        .section-title{
            font-family:'Cormorant Garamond',serif;
            font-size:50px;
            line-height:1;
            color:var(--deep);
            font-weight:700;
            letter-spacing:-.03em;
            margin:12px 0 12px;
        }
        .section-subtitle{
            color:var(--muted);
            line-height:1.8;
            max-width:740px;
            margin:0 auto;
        }
        .card-soft{
            height:100%;
            background:rgba(255,253,247,.82);
            border:1px solid var(--line);
            border-radius:34px;
            padding:32px;
            box-shadow:0 24px 70px rgba(15,47,42,.09);
        }
        .icon-round{
            width:56px;
            height:56px;
            display:grid;
            place-items:center;
            border-radius:50%;
            background:linear-gradient(135deg,var(--deep),var(--green));
            color:#fff;
            font-size:22px;
            margin-bottom:18px;
            box-shadow:0 16px 34px rgba(31,95,78,.2);
        }
        .info-label{
            color:var(--gold);
            font-weight:900;
            text-transform:uppercase;
            letter-spacing:.14em;
            font-size:12px;
            margin-bottom:8px;
        }
        .info-value{
            color:var(--deep);
            font-weight:900;
            font-size:22px;
            margin:0;
        }
        .message-panel{
            background:linear-gradient(135deg,var(--deep),var(--deep2));
            color:#fff;
            border-radius:42px;
            padding:46px;
            box-shadow:var(--shadow);
            position:relative;
            overflow:hidden;
        }
        .message-panel:before{
            content:'';
            position:absolute;
            right:-80px;
            top:-80px;
            width:260px;
            height:260px;
            border-radius:50%;
            border:1px solid rgba(236,216,154,.28);
        }
        .message-panel .section-title{color:#fff}
        .message-panel p{color:rgba(255,255,255,.78);line-height:1.9}
        .countdown-grid{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:16px;
        }
        .count-item{
            background:#fffdf7;
            border:1px solid var(--line);
            border-radius:28px;
            padding:24px 12px;
            text-align:center;
            box-shadow:0 18px 45px rgba(15,47,42,.08);
        }
        .cd-number{
            display:block;
            color:var(--deep);
            font-weight:900;
            font-size:38px;
            line-height:1;
        }
        .cd-label{
            display:block;
            color:var(--muted);
            font-size:12px;
            font-weight:900;
            text-transform:uppercase;
            letter-spacing:.12em;
            margin-top:10px;
        }
        .gallery-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:18px;
        }
        .gallery-item{
            aspect-ratio:1/1;
            border-radius:26px;
            overflow:hidden;
            background:#e8e1d3;
            border:1px solid rgba(236,216,154,.34);
            box-shadow:0 20px 46px rgba(15,47,42,.12);
            position:relative;
        }
        .gallery-item::after{
            content:'';
            position:absolute;
            inset:0;
            background:linear-gradient(180deg,transparent 55%,rgba(15,47,42,.18));
            pointer-events:none;
        }
        .gallery-item img{
            width:100%;
            height:100%;
            object-fit:cover;
            transition:.45s ease;
        }
        .gallery-item:hover img{transform:scale(1.06)}
        .map-shell{
            overflow:hidden;
            border-radius:42px;
            background:#fffdf7;
            border:1px solid var(--line);
            box-shadow:var(--shadow);
        }
        .map-info{
            padding:38px;
            height:100%;
            background:
                radial-gradient(circle at top right, rgba(236,216,154,.22), transparent 34%),
                #fffdf7;
        }
        .map-frame-wrap{
            height:100%;
            min-height:430px;
            background:#e8e1d3;
        }
        .map-frame-wrap iframe{
            width:100%!important;
            height:100%!important;
            min-height:430px!important;
            display:block;
            border:0!important;
        }
        .map-empty{
            height:100%;
            min-height:430px;
            display:grid;
            place-items:center;
            text-align:center;
            color:var(--muted);
            padding:30px;
        }
        .btn-main,.btn-send{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            border:0;
            border-radius:999px;
            padding:14px 22px;
            background:linear-gradient(135deg,var(--deep),var(--green));
            color:#fff;
            font-weight:900;
            box-shadow:0 16px 34px rgba(31,95,78,.2);
        }
        .btn-main:hover,.btn-send:hover{color:#fff;transform:translateY(-1px)}
        .btn-outline-soft{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            border-radius:999px;
            padding:13px 20px;
            border:1px solid var(--line);
            color:var(--deep);
            font-weight:900;
            background:#fffdf7;
        }
        .form-control,.form-select{
            border-radius:18px;
            border:1px solid var(--line);
            padding:13px 16px;
            background:#fffdf7;
        }
        .form-control:focus,.form-select:focus{
            border-color:var(--green);
            box-shadow:0 0 0 .2rem rgba(31,95,78,.12);
        }
        .wish-card{
            background:#fffdf7;
            border:1px solid var(--line);
            border-radius:28px;
            padding:24px;
            box-shadow:0 18px 48px rgba(15,47,42,.07);
            height:100%;
        }
        .wish-name{
            color:var(--deep);
            font-weight:900;
            margin-bottom:8px;
        }
        .gift-box{
            border-radius:42px;
            padding:40px;
            background:linear-gradient(135deg,#173f37,#0f2f2a);
            color:#fff;
            box-shadow:var(--shadow);
        }
        .gift-box .text-muted{color:rgba(255,255,255,.72)!important}
        .share-box{
            display:flex;
            gap:10px;
        }
        .footer-soft{
            font-family:'Cormorant Garamond',serif;
            font-size:32px;
            color:var(--deep);
            font-weight:700;
        }
        .music-player{
            position:fixed;
            right:20px;
            bottom:22px;
            z-index:50;
        }
        .music-btn{
            width:62px;
            height:62px;
            border-radius:50%;
            border:0;
            background:linear-gradient(135deg,var(--deep),var(--green));
            color:#fff;
            display:grid;
            place-items:center;
            font-size:25px;
            box-shadow:0 18px 45px rgba(15,47,42,.26);
        }
        .music-btn.is-playing{
            background:linear-gradient(135deg,var(--gold),#d8bd78);
            color:var(--deep);
        }
        @media(max-width:991px){
            .topbar{position:absolute;border-radius:28px;align-items:flex-start}
            .nav-mini{display:none}
            .hero{padding-top:100px}
            .hero-content,.hero-visual,.hero-visual img{min-height:auto}
            .hero-content{padding:42px 28px}
            .hero-title{font-size:52px}
            .deceased{font-size:34px}
            .visual-caption{left:22px;right:22px;bottom:22px}
            .section{padding:64px 0}
            .section-title{font-size:40px}
            .gallery-grid{
                grid-template-columns:repeat(2,1fr);
            }
        }
        @media(max-width:575px){
            .hero-card{border-radius:30px}
            .hero-title{font-size:42px}
            .deceased{font-size:28px}
            .countdown-grid{grid-template-columns:repeat(2,1fr)}
            .gallery-grid{
                grid-template-columns:repeat(2,1fr);
                gap:12px;
            }
            .gallery-item{
                border-radius:20px;
            }
            .share-box{flex-direction:column}
            .message-panel,.gift-box,.card-soft{padding:28px;border-radius:30px}
            .map-info{padding:28px}
        }
    </style>
</head>
<body>
<div class="page">
    <div class="ornament-bg"></div>

    <header class="topbar">
        <div class="brand-mini"><span>﷽</span> Tahlil & Doa</div>
        <nav class="nav-mini">
            <a href="#detail">Detail</a>
            <a href="#gallery">Galeri</a>
            <a href="#location">Lokasi</a>
            <a href="#wishes">Doa</a>
        </nav>
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-card">
                <div class="row g-0 align-items-stretch">
                    <div class="col-lg-7">
                        <div class="hero-content">
                            <div class="bismillah">بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ</div>
                            <div class="kicker"><i class="bi bi-moon-stars"></i> <?= html_escape($subtitle); ?></div>
                            <h1 class="hero-title"><?= html_escape($title); ?></h1>
                            <div class="deceased"><?= html_escape($deceasedName); ?></div>
                            <p class="hero-desc"><?= nl2br(html_escape($coverText)); ?></p>
                            <p class="hero-desc"><?= nl2br(html_escape($description)); ?></p>
                            <div class="guest-pill"><i class="bi bi-person-heart"></i> Kepada Yth. <?= html_escape($guestName); ?></div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero-visual">
                            <img src="<?= html_escape($heroImage); ?>" alt="<?= html_escape($title); ?>">
                            <div class="visual-overlay"></div>
                            <div class="visual-caption">
                                <h2>Doa Terbaik</h2>
                                <p>Kehadiran serta doa Bapak/Ibu/Saudara/i menjadi bentuk kasih dan penghormatan yang sangat berarti bagi keluarga.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-sm" id="detail">
        <div class="container">
            <div class="section-head text-center">
                <span class="kicker"><i class="bi bi-calendar2-heart"></i> Detail Acara</span>
                <h2 class="section-title">Waktu & Tempat Tahlil</h2>
                <p class="section-subtitle">Dengan memohon ridho Allah SWT, kami mengharapkan kehadiran Bapak/Ibu/Saudara/i pada acara berikut.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card-soft">
                        <div class="icon-round"><i class="bi bi-calendar-event"></i></div>
                        <div class="info-label">Tanggal</div>
                        <p class="info-value"><?= !empty($eventDateFormatted) ? html_escape($eventDateFormatted) : 'Tanggal menyusul'; ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-soft">
                        <div class="icon-round"><i class="bi bi-clock"></i></div>
                        <div class="info-label">Waktu</div>
                        <p class="info-value"><?= html_escape($eventTime); ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-soft">
                        <div class="icon-round"><i class="bi bi-geo-alt"></i></div>
                        <div class="info-label">Tempat</div>
                        <p class="info-value"><?= !empty($locationName) ? html_escape($locationName) : 'Lokasi menyusul'; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($eventDateISO)): ?>
    <section class="section section-sm">
        <div class="container">
            <div class="section-head text-center">
                <span class="kicker"><i class="bi bi-hourglass-split"></i> Countdown</span>
                <h2 class="section-title">Menuju Acara</h2>
            </div>
            <div class="countdown-grid" id="countdown" data-date="<?= html_escape($eventDateISO); ?>">
                <div class="count-item"><span class="cd-number" id="cdDays">0</span><span class="cd-label">Hari</span></div>
                <div class="count-item"><span class="cd-number" id="cdHours">0</span><span class="cd-label">Jam</span></div>
                <div class="count-item"><span class="cd-number" id="cdMinutes">0</span><span class="cd-label">Menit</span></div>
                <div class="count-item"><span class="cd-number" id="cdSeconds">0</span><span class="cd-label">Detik</span></div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="section section-sm">
        <div class="container">
            <div class="message-panel">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-5">
                        <span class="kicker"><i class="bi bi-stars"></i> Pengantar Doa</span>
                        <h2 class="section-title"><?= html_escape($messageTitle); ?></h2>
                    </div>
                    <div class="col-lg-7">
                        <p class="mb-0"><?= nl2br(html_escape($messageBody)); ?></p>
                        <p class="mt-4 mb-0">Hormat kami,<br><strong><?= html_escape($familyName); ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($galleries)): ?>
    <section class="section" id="gallery">
        <div class="container">
            <div class="section-head text-center">
                <span class="kicker"><i class="bi bi-images"></i> Galeri Kenangan</span>
                <h2 class="section-title">Kenangan Keluarga</h2>
                <p class="section-subtitle">Beberapa dokumentasi dan kenangan yang menjadi bagian dari doa serta kebersamaan keluarga.</p>
            </div>
            <div class="gallery-grid">
                <?php foreach ($galleries as $gallery): ?>
                    <?php
                        $galleryImage = '';
                        if (!empty($gallery->image_path)) {
                            $galleryImage = $gallery->image_path;
                        } elseif (!empty($gallery->image)) {
                            $galleryImage = $gallery->image;
                        } elseif (!empty($gallery->photo)) {
                            $galleryImage = $gallery->photo;
                        } elseif (!empty($gallery->foto)) {
                            $galleryImage = $gallery->foto;
                        } elseif (!empty($gallery->file_path)) {
                            $galleryImage = $gallery->file_path;
                        }
                        $img = !empty($galleryImage) ? asset_or_url($galleryImage) : '';
                    ?>
                    <?php if (!empty($img)): ?>
                        <div class="gallery-item"><img src="<?= html_escape($img); ?>" alt="Gallery tahlil"></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="section section-sm" id="location">
        <div class="container">
            <div class="map-shell">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <div class="map-info">
                            <span class="kicker"><i class="bi bi-map"></i> Lokasi</span>
                            <h2 class="section-title">Alamat Acara</h2>
                            <p class="section-subtitle text-start mx-0"><?= !empty($locationAddress) ? html_escape($locationAddress) : 'Alamat acara akan diinformasikan kemudian.'; ?></p>
                            <?php if (!empty($mapUrl)): ?>
                                <a class="btn-main mt-4" href="<?= html_escape($mapUrl); ?>" target="_blank"><i class="bi bi-geo-alt-fill"></i> Buka Google Maps</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="map-frame-wrap">
                            <?php if (!empty($project->map_embed)): ?>
                                <?= $project->map_embed; ?>
                            <?php elseif (!empty($mapUrl)): ?>
                                <iframe loading="lazy" allowfullscreen src="https://maps.google.com/maps?q=<?= rawurlencode($mapQuery); ?>&output=embed"></iframe>
                            <?php else: ?>
                                <div class="map-empty"><div><i class="bi bi-geo-alt fs-1 d-block mb-3"></i>Maps belum tersedia.</div></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($project->gift_enabled) && !empty($project->gift_info)): ?>
    <section class="section section-sm">
        <div class="container">
            <div class="gift-box">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-4">
                        <span class="kicker"><i class="bi bi-gift"></i> Kirim Tanda Kasih</span>
                        <h2 class="section-title text-white mb-0">Gift Info</h2>
                    </div>
                    <div class="col-lg-8">
                        <p class="mb-0 text-muted"><?= nl2br(html_escape($project->gift_info)); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if (!empty($project->rsvp_enabled)): ?>
    <section class="section section-sm" id="rsvp">
        <div class="container">
            <div class="section-head text-center">
                <span class="kicker"><i class="bi bi-envelope-check"></i> RSVP</span>
                <h2 class="section-title">Konfirmasi Kehadiran</h2>
                <p class="section-subtitle">Mohon berkenan mengisi konfirmasi kehadiran agar keluarga dapat mempersiapkan acara dengan baik.</p>
            </div>
            <div class="card-soft">
                <form method="post" action="<?= site_url('rsvp/store'); ?>" class="row g-3">
                    <input type="hidden" name="project_id" value="<?= html_escape($project->id); ?>">
                    <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">
                    <div class="col-md-5"><label class="form-label">Nama</label><input name="guest_name" class="form-control" value="<?= html_escape($guestName); ?>" required></div>
                    <div class="col-md-4"><label class="form-label">Kehadiran</label><select name="status" class="form-select" required><option value="hadir">Hadir</option><option value="tidak_hadir">Tidak Hadir</option><option value="ragu">Masih Ragu</option></select></div>
                    <div class="col-md-3"><label class="form-label">Jumlah Tamu</label><input type="number" name="guest_count" min="1" class="form-control" value="1"></div>
                    <div class="col-12"><label class="form-label">Catatan</label><textarea name="note" class="form-control" rows="3" placeholder="Catatan tambahan"></textarea></div>
                    <div class="col-12"><button class="btn-send"><i class="bi bi-send"></i> Kirim RSVP</button></div>
                </form>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if (!empty($project->wish_enabled) || isset($wishes)): ?>
    <section class="section section-sm" id="wishes">
        <div class="container">
            <div class="section-head text-center">
                <span class="kicker"><i class="bi bi-chat-heart"></i> Doa & Ucapan</span>
                <h2 class="section-title">Kirim Doa</h2>
                <p class="section-subtitle">Tuliskan doa terbaik untuk almarhum/almarhumah dan keluarga yang ditinggalkan.</p>
            </div>
            <div class="card-soft mb-4">
                <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
                    <input type="hidden" name="project_id" value="<?= html_escape($project->id); ?>">
                    <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">
                    <div class="col-md-4"><label class="form-label">Nama</label><input name="guest_name" class="form-control" value="<?= html_escape($guestName); ?>" placeholder="Nama" required></div>
                    <div class="col-md-8"><label class="form-label">Doa / Ucapan</label><input name="message" class="form-control" placeholder="Tulis doa terbaik Anda" required></div>
                    <div class="col-12 pt-2"><button class="btn-send"><i class="bi bi-send-heart"></i> Kirim Doa</button></div>
                </form>
            </div>
            <div class="row g-4">
                <?php if (!empty($wishes)): ?>
                    <?php foreach ($wishes as $wish): ?>
                        <div class="col-md-6"><div class="wish-card"><div class="wish-name"><?= html_escape($wish->guest_name); ?></div><div><?= nl2br(html_escape($wish->message)); ?></div></div></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12"><div class="text-center text-muted">Belum ada doa.</div></div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="section section-sm">
        <div class="container">
            <div class="card-soft text-center">
                <span class="kicker"><i class="bi bi-share"></i> Share</span>
                <h2 class="section-title">Bagikan Undangan</h2>
                <p class="section-subtitle mb-4">Kirim link undangan tahlil ini kepada keluarga dan kerabat.</p>
                <div class="share-box">
                    <input id="inviteLink" class="form-control" value="<?= html_escape($inviteUrl); ?>" readonly>
                    <button class="btn-main" type="button" onclick="copyInviteLink()"><i class="bi bi-clipboard-check"></i> Salin Link</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-sm">
        <div class="container text-center">
            <div class="footer-soft">Terima kasih atas perhatian, doa, dan kehadiran Anda.</div>
        </div>
    </section>
</div>

<?php if (!empty($musicUrl)): ?>
<audio id="bgMusic" loop autoplay playsinline preload="auto">
    <source src="<?= html_escape($musicUrl); ?>">
</audio>
<div class="music-player">
    <button type="button" class="music-btn" id="musicToggle" aria-label="Toggle music"><i class="bi bi-music-note-beamed"></i></button>
</div>
<?php endif; ?>

<script>
function copyInviteLink(){
    const el=document.getElementById('inviteLink');
    if(!el)return;
    el.select();
    el.setSelectionRange(0,99999);
    document.execCommand('copy');
    alert('Link undangan berhasil disalin.');
}
(function(){
    const wrap=document.getElementById('countdown');
    if(!wrap)return;
    const targetDate=wrap.getAttribute('data-date');
    if(!targetDate)return;
    const daysEl=document.getElementById('cdDays');
    const hoursEl=document.getElementById('cdHours');
    const minutesEl=document.getElementById('cdMinutes');
    const secondsEl=document.getElementById('cdSeconds');
    function updateCountdown(){
        const target=new Date(targetDate+'T00:00:00').getTime();
        const now=new Date().getTime();
        const distance=target-now;
        if(distance<=0){
            daysEl.textContent='0';hoursEl.textContent='0';minutesEl.textContent='0';secondsEl.textContent='0';return;
        }
        daysEl.textContent=Math.floor(distance/(1000*60*60*24));
        hoursEl.textContent=Math.floor((distance%(1000*60*60*24))/(1000*60*60));
        minutesEl.textContent=Math.floor((distance%(1000*60*60))/(1000*60));
        secondsEl.textContent=Math.floor((distance%(1000*60))/1000);
    }
    updateCountdown();
    setInterval(updateCountdown,1000);
})();
(function(){
    const audio=document.getElementById('bgMusic');
    const btn=document.getElementById('musicToggle');
    if(!audio||!btn)return;
    function setPlayingUI(){
        btn.classList.add('is-playing');
        btn.innerHTML='<i class="bi bi-pause-fill"></i>';
    }
    function setPausedUI(){
        btn.classList.remove('is-playing');
        btn.innerHTML='<i class="bi bi-music-note-beamed"></i>';
    }
    function playMusic(){
        audio.play().then(setPlayingUI).catch(setPausedUI);
    }
    function pauseMusic(){
        audio.pause();
        setPausedUI();
    }
    btn.addEventListener('click',function(){
        if(audio.paused){playMusic();}else{pauseMusic();}
    });
    playMusic();
    document.addEventListener('click',function initOnce(){
        if(audio.paused){playMusic();}
        document.removeEventListener('click',initOnce);
    });
})();
</script>
</body>
</html>
