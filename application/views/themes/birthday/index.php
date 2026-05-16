<?php
$pageTitle = !empty($page_title) ? $page_title : (!empty($project->title) ? $project->title : 'Birthday Invitation');
$title = !empty($project->title) ? $project->title : 'Birthday Celebration';
$subtitle = !empty($project->subtitle) ? $project->subtitle : 'A sweet birthday celebration made with love, joy, and beautiful memories.';
$coverText = !empty($project->cover_text) ? $project->cover_text : 'You are invited to a special birthday moment';
$displayName = !empty($project->receiver_name) ? $project->receiver_name : $title;
$senderName = !empty($project->sender_name) ? $project->sender_name : 'Family & Friends';
$messageTitle = !empty($project->message_title) ? $project->message_title : 'Let’s Celebrate Together';
$messageBody = !empty($project->message_body) ? $project->message_body : 'Today is not just about getting older, but about celebrating every beautiful memory, every smile, every challenge, and every dream waiting ahead.';
$description = !empty($project->description) ? $project->description : 'With happiness and warm hearts, we invite you to celebrate this special birthday moment together.';
$heroImage = !empty($project->hero_image) ? asset_or_url($project->hero_image) : 'https://images.unsplash.com/photo-1530103862676-de8c9debad1d?auto=format&fit=crop&w=1400&q=80';
$musicUrl = !empty($project->music_url) ? $project->music_url : '';
$eventDateRaw = !empty($project->event_date) ? $project->event_date : '';
$eventDateISO = !empty($eventDateRaw) ? date('Y-m-d', strtotime($eventDateRaw)) : '';
$eventDateFormatted = !empty($eventDateRaw) ? date('d F Y', strtotime($eventDateRaw)) : 'Tanggal akan diinformasikan';
$eventTime = !empty($project->event_time) ? $project->event_time : 'Waktu akan diinformasikan';
$locationName = !empty($project->location_name) ? $project->location_name : '';
$locationAddress = !empty($project->location_address) ? $project->location_address : '';
$mapEmbed = !empty($project->map_embed) ? $project->map_embed : '';
$galleryItems = !empty($galleries) ? $galleries : [];
$wishEnabled = !empty($project->wish_enabled);
$giftEnabled = !empty($project->gift_enabled) || !empty($project->gift_info);
$giftInfo = !empty($project->gift_info) ? $project->gift_info : '';
$guestName = !empty($guest_name) ? $guest_name : (!empty($guest->name) ? $guest->name : '');
$guestSlug = !empty($guest) && !empty($guest->slug) ? $guest->slug : '';
$mapsQuery = trim($locationName . ' ' . $locationAddress);
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ff7aa8">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --pink: #ff75a6;
            --pink-dark: #e9548b;
            --yellow: #ffd65a;
            --blue: #82d8ff;
            --purple: #a990ff;
            --cream: #fff8e8;
            --text: #503b57;
            --muted: #8d7893;
            --white: #fff;
            --card: rgba(255, 255, 255, .82);
            --line: rgba(255, 255, 255, .72);
            --shadow: 0 24px 70px rgba(255, 117, 166, .18);
            --radius-xl: 36px;
            --radius-lg: 26px;
            --radius-md: 18px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Nunito', system-ui, sans-serif;
            color: var(--text);
            overflow-x: hidden;
            background:
                radial-gradient(circle at 12% 10%, rgba(255, 214, 90, .35), transparent 22%),
                radial-gradient(circle at 88% 12%, rgba(130, 216, 255, .36), transparent 24%),
                radial-gradient(circle at 50% 94%, rgba(169, 144, 255, .22), transparent 26%),
                linear-gradient(135deg, #fff8e8 0%, #ffe5f0 46%, #e7f8ff 100%);
        }

        a {
            text-decoration: none;
        }

        .page-wrap {
            position: relative;
            min-height: 100vh;
        }

        .bg-float {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .float-item {
            position: absolute;
            font-size: 28px;
            opacity: .55;
            animation: drift 9s ease-in-out infinite;
        }

        .float-item:nth-child(1) { left: 8%; top: 12%; animation-delay: .2s; }
        .float-item:nth-child(2) { right: 10%; top: 18%; animation-delay: 1.2s; }
        .float-item:nth-child(3) { left: 12%; bottom: 16%; animation-delay: 2.1s; }
        .float-item:nth-child(4) { right: 18%; bottom: 10%; animation-delay: 3s; }
        .float-item:nth-child(5) { left: 48%; top: 6%; animation-delay: 1.7s; }

        @keyframes drift {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-18px) rotate(8deg); }
        }

        .section {
            position: relative;
            z-index: 2;
            padding: 88px 0;
        }

        .section-sm {
            padding: 68px 0;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 100px 0 80px;
        }

        .glass {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            backdrop-filter: blur(20px);
        }

        .hero-photo-card {
            position: relative;
            padding: 16px 16px 72px;
            background: #fff;
            border-radius: 34px;
            transform: rotate(-2deg);
            box-shadow: 0 34px 80px rgba(80, 59, 87, .16);
            overflow: hidden;
        }

        .hero-photo-card::after {
            content: 'birthday memory';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 24px;
            text-align: center;
            font-family: 'Baloo 2', cursive;
            color: #7a617e;
            font-size: 22px;
            font-weight: 800;
        }

        .hero-photo-card img {
            width: 100%;
            height: min(68vh, 560px);
            object-fit: cover;
            border-radius: 24px;
            display: block;
        }

        .sticker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .78);
            border: 1px solid rgba(255, 255, 255, .9);
            color: var(--pink-dark);
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .12em;
            text-transform: uppercase;
            box-shadow: 0 12px 30px rgba(255, 117, 166, .12);
        }

        .title-main {
            font-family: 'Baloo 2', cursive;
            font-size: clamp(54px, 8vw, 104px);
            line-height: .92;
            font-weight: 800;
            color: #5a3c65;
            margin: 18px 0 4px;
            letter-spacing: -2px;
        }

        .title-name {
            font-family: 'Baloo 2', cursive;
            font-size: clamp(34px, 5vw, 62px);
            line-height: 1;
            font-weight: 800;
            color: var(--pink-dark);
            margin-bottom: 18px;
        }

        .hero-text {
            max-width: 620px;
            color: #725d79;
            line-height: 1.9;
            font-size: 17px;
        }

        .hero-note {
            margin-top: 22px;
            padding: 18px 20px;
            background: rgba(255, 255, 255, .76);
            border: 1px dashed rgba(255, 117, 166, .44);
            border-radius: 24px;
            color: #66516f;
            line-height: 1.85;
        }

        .btn-candy {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            border: 0;
            border-radius: 999px;
            padding: 14px 22px;
            font-weight: 900;
            color: #fff;
            background: linear-gradient(135deg, var(--pink), var(--purple));
            box-shadow: 0 16px 34px rgba(255, 117, 166, .26);
            transition: .25s ease;
        }

        .btn-candy:hover {
            transform: translateY(-2px);
            color: #fff;
        }

        .btn-soft {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            border-radius: 999px;
            padding: 14px 22px;
            font-weight: 900;
            color: #6b4e74;
            background: rgba(255, 255, 255, .76);
            border: 1px solid rgba(255, 255, 255, .9);
            transition: .25s ease;
        }

        .btn-soft:hover {
            transform: translateY(-2px);
            color: #6b4e74;
        }

        .section-head {
            text-align: center;
            max-width: 780px;
            margin: 0 auto 46px;
        }

        .section-title {
            font-family: 'Baloo 2', cursive;
            font-size: clamp(34px, 5vw, 58px);
            font-weight: 800;
            line-height: 1;
            color: #5a3c65;
            margin: 12px 0;
        }

        .section-desc {
            color: var(--muted);
            line-height: 1.85;
            font-size: 16px;
        }

        .info-card {
            height: 100%;
            padding: 28px;
            border-radius: var(--radius-lg);
            background: rgba(255, 255, 255, .78);
            border: 1px solid rgba(255, 255, 255, .9);
            box-shadow: 0 18px 48px rgba(80, 59, 87, .08);
        }

        .info-icon {
            width: 58px;
            height: 58px;
            border-radius: 20px;
            background: linear-gradient(135deg, #fff5b9, #ffd4e5);
            color: var(--pink-dark);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 18px;
        }

        .info-label {
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .12em;
            font-size: 12px;
            font-weight: 900;
        }

        .info-value {
            font-family: 'Baloo 2', cursive;
            font-size: 28px;
            font-weight: 800;
            color: #5a3c65;
            line-height: 1.15;
            margin-top: 6px;
        }

        .countdown-wrap {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            max-width: 860px;
            margin: 34px auto 0;
        }

        .countdown-item {
            text-align: center;
            padding: 22px 14px;
            border-radius: 26px;
            background: rgba(255,255,255,.8);
            border: 1px solid rgba(255,255,255,.9);
            box-shadow: 0 16px 40px rgba(255, 117, 166, .1);
        }

        .countdown-number {
            font-family: 'Baloo 2', cursive;
            font-size: 42px;
            font-weight: 800;
            color: var(--pink-dark);
            line-height: 1;
        }

        .countdown-label {
            color: var(--muted);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .12em;
            font-weight: 900;
            margin-top: 6px;
        }

        .message-card {
            padding: 34px;
            border-radius: var(--radius-xl);
            background:
                radial-gradient(circle at top right, rgba(255, 214, 90, .2), transparent 28%),
                rgba(255,255,255,.82);
            border: 1px solid rgba(255,255,255,.9);
            box-shadow: var(--shadow);
        }

        .message-title {
            font-family: 'Baloo 2', cursive;
            font-size: 34px;
            font-weight: 800;
            color: #5a3c65;
            margin-bottom: 14px;
        }

        .message-body {
            color: #69536f;
            line-height: 2;
            font-size: 16px;
        }

        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 28px;
            background: #fff;
            padding: 12px 12px 52px;
            height: 100%;
            box-shadow: 0 22px 55px rgba(80, 59, 87, .12);
            transform: rotate(-1deg);
            transition: .25s ease;
        }

        .gallery-card.alt {
            transform: rotate(1.2deg);
        }

        .gallery-card:hover {
            transform: translateY(-5px) rotate(0deg);
        }

        .gallery-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 20px;
            display: block;
        }

        .gallery-caption {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 16px;
            text-align: center;
            font-family: 'Baloo 2', cursive;
            color: #6c5274;
            font-weight: 800;
            font-size: 18px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .map-box {
            overflow: hidden;
            border-radius: var(--radius-xl);
            min-height: 420px;
            background: rgba(255,255,255,.8);
            border: 12px solid rgba(255,255,255,.76);
            box-shadow: var(--shadow);
        }

        .map-box iframe {
            width: 100% !important;
            height: 420px !important;
            display: block;
            border: 0 !important;
            border-radius: 24px;
        }

        .wish-card {
            height: 100%;
            padding: 24px;
            border-radius: 26px;
            background: rgba(255,255,255,.82);
            border: 1px solid rgba(255,255,255,.9);
            box-shadow: 0 18px 46px rgba(80,59,87,.08);
        }

        .wish-name {
            font-weight: 900;
            color: var(--pink-dark);
            margin-bottom: 6px;
        }

        .form-control {
            border-radius: 18px;
            border: 1px solid rgba(255, 117, 166, .22);
            padding: 13px 16px;
        }

        .form-control:focus {
            border-color: var(--pink);
            box-shadow: 0 0 0 .2rem rgba(255, 117, 166, .15);
        }

        .share-input {
            border-radius: 22px;
            background: rgba(255,255,255,.82);
            padding: 20px;
            border: 1px solid rgba(255,255,255,.9);
        }

        .music-player {
            position: fixed;
            right: 18px;
            bottom: 18px;
            z-index: 999;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .music-label {
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(255,255,255,.86);
            border: 1px solid rgba(255,255,255,.95);
            color: #5a3c65;
            font-size: 12px;
            font-weight: 900;
            box-shadow: 0 14px 34px rgba(255,117,166,.16);
            backdrop-filter: blur(14px);
        }

        .music-btn {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 0;
            background: linear-gradient(135deg, var(--pink), var(--purple));
            color: #fff;
            font-size: 26px;
            box-shadow: 0 20px 44px rgba(169, 144, 255, .34);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .music-btn::after {
            content: '';
            position: absolute;
            inset: -7px;
            border-radius: 50%;
            border: 2px solid rgba(255,117,166,.28);
            animation: musicPulse 1.7s ease-in-out infinite;
        }

        .music-btn.is-playing::after {
            border-color: rgba(169,144,255,.42);
        }

        @keyframes musicPulse {
            0% { transform: scale(.92); opacity: .7; }
            100% { transform: scale(1.2); opacity: 0; }
        }

        .footer-soft {
            text-align: center;
            color: var(--muted);
            padding: 30px;
            border-radius: 28px;
            background: rgba(255,255,255,.62);
            border: 1px solid rgba(255,255,255,.9);
        }

        @media (max-width: 991.98px) {
            .hero {
                min-height: auto;
                padding-top: 72px;
            }

            .hero-photo-card img {
                height: 420px;
            }

            .countdown-wrap {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 575.98px) {
            .section {
                padding: 68px 0;
            }

            .section-sm {
                padding: 54px 0;
            }

            .hero-photo-card img {
                height: 330px;
            }

            .message-card {
                padding: 24px;
            }

            .gallery-card img {
                height: 230px;
            }

            .music-label {
                display: none;
            }

            .music-btn {
                width: 58px;
                height: 58px;
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="page-wrap">
        <div class="bg-float">
            <div class="float-item">🎂</div>
            <div class="float-item">🎈</div>
            <div class="float-item">✨</div>
            <div class="float-item">🎁</div>
            <div class="float-item">💖</div>
        </div>

        <section class="hero">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="hero-photo-card">
                            <img src="<?= html_escape($heroImage); ?>" alt="<?= html_escape($displayName); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <span class="sticker"><i class="bi bi-stars"></i><?= html_escape($coverText); ?></span>
                        <h1 class="title-main">Happy Birthday</h1>
                        <div class="title-name"><?= html_escape($displayName); ?> 🥳</div>
                        <p class="hero-text"><?= nl2br(html_escape($subtitle)); ?></p>
                        <div class="hero-note"><?= nl2br(html_escape($description)); ?></div>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <a href="#detail" class="btn-candy"><i class="bi bi-calendar-heart"></i>Lihat Detail</a>
                            <?php if (!empty($locationName) || !empty($locationAddress) || !empty($mapEmbed)): ?>
                                <a href="#location" class="btn-soft"><i class="bi bi-geo-alt"></i>Lihat Lokasi</a>
                            <?php endif; ?>
                            <?php if (!empty($galleryItems)): ?>
                                <a href="#gallery" class="btn-soft"><i class="bi bi-images"></i>Lihat Gallery</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-sm" id="detail">
            <div class="container">
                <div class="section-head">
                    <span class="sticker"><i class="bi bi-balloon-heart"></i>Birthday Invitation</span>
                    <h2 class="section-title">Detail Hari Spesial</h2>
                    <p class="section-desc">Datang dan ikut merayakan momen ulang tahun yang penuh warna, tawa, doa baik, dan kenangan manis.</p>
                    <?php if (!empty($eventDateISO)): ?>
                        <div class="countdown-wrap" id="countdown" data-date="<?= html_escape($eventDateISO); ?>">
                            <div class="countdown-item">
                                <div class="countdown-number" id="cdDays">0</div>
                                <div class="countdown-label">Hari</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-number" id="cdHours">0</div>
                                <div class="countdown-label">Jam</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-number" id="cdMinutes">0</div>
                                <div class="countdown-label">Menit</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-number" id="cdSeconds">0</div>
                                <div class="countdown-label">Detik</div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="info-card">
                            <div class="info-icon"><i class="bi bi-calendar2-heart"></i></div>
                            <div class="info-label">Tanggal</div>
                            <div class="info-value"><?= html_escape($eventDateFormatted); ?></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card">
                            <div class="info-icon"><i class="bi bi-clock-history"></i></div>
                            <div class="info-label">Waktu</div>
                            <div class="info-value"><?= html_escape($eventTime); ?></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card">
                            <div class="info-icon"><i class="bi bi-geo-alt"></i></div>
                            <div class="info-label">Tempat</div>
                            <div class="info-value"><?= !empty($locationName) ? html_escape($locationName) : 'Lokasi akan diinformasikan'; ?></div>
                        </div>
                    </div>
                </div>

                <div class="message-card mt-4">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-5">
                            <span class="sticker"><i class="bi bi-envelope-heart"></i>Birthday Message</span>
                            <div class="message-title mt-3"><?= html_escape($messageTitle); ?></div>
                        </div>
                        <div class="col-lg-7">
                            <div class="message-body"><?= nl2br(html_escape($messageBody)); ?></div>
                            <div class="mt-4 fw-bold">With love, <?= html_escape($senderName); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php if (!empty($locationName) || !empty($locationAddress) || !empty($mapEmbed)): ?>
            <section class="section" id="location">
                <div class="container">
                    <div class="section-head">
                        <span class="sticker"><i class="bi bi-map"></i>Birthday Venue</span>
                        <h2 class="section-title">Lokasi Acara</h2>
                        <p class="section-desc">Gunakan maps untuk membantu menemukan lokasi acara dengan lebih mudah.</p>
                    </div>

                    <div class="row g-4 align-items-stretch">
                        <div class="col-lg-5">
                            <div class="info-card">
                                <div class="info-icon"><i class="bi bi-pin-map"></i></div>
                                <div class="info-label">Venue</div>
                                <div class="info-value"><?= !empty($locationName) ? html_escape($locationName) : 'Lokasi Acara'; ?></div>
                                <?php if (!empty($locationAddress)): ?>
                                    <p class="mt-3 mb-4" style="color:#745e7a;line-height:1.9;"><?= nl2br(html_escape($locationAddress)); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($mapsQuery)): ?>
                                    <a class="btn-candy" href="https://www.google.com/maps/search/?api=1&query=<?= rawurlencode($mapsQuery); ?>" target="_blank">
                                        <i class="bi bi-geo-alt"></i>Buka Google Maps
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="map-box">
                                <?php if (!empty($mapEmbed)): ?>
                                    <?= $mapEmbed; ?>
                                <?php else: ?>
                                    <div class="h-100 d-flex align-items-center justify-content-center text-center p-5">
                                        <div>
                                            <div class="info-icon mx-auto"><i class="bi bi-map"></i></div>
                                            <h4 class="fw-black">Map belum tersedia</h4>
                                            <p class="text-muted mb-0">Alamat tetap bisa dibuka melalui tombol Google Maps.</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if (!empty($galleryItems)): ?>
            <section class="section section-sm" id="gallery">
                <div class="container">
                    <div class="section-head">
                        <span class="sticker"><i class="bi bi-images"></i>Memory Gallery</span>
                        <h2 class="section-title">Cute Memory Wall</h2>
                        <p class="section-desc">Semua foto yang diinput dari project tetap ditampilkan di bawah, tanpa dibatasi jumlahnya.</p>
                    </div>

                    <div class="row g-4">
                        <?php $galleryIndex = 0; foreach ($galleryItems as $g): $galleryIndex++; ?>
                            <div class="col-sm-6 col-lg-4">
                                <div class="gallery-card <?= $galleryIndex % 2 === 0 ? 'alt' : ''; ?>">
                                    <img src="<?= asset_or_url($g->image_path); ?>" alt="<?= html_escape(!empty($g->caption) ? $g->caption : 'Birthday Memory'); ?>">
                                    <div class="gallery-caption"><?= !empty($g->caption) ? html_escape($g->caption) : 'Happy little memory 📸'; ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($giftEnabled): ?>
            <section class="section-sm" id="gift">
                <div class="container">
                    <div class="message-card">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-4">
                                <span class="sticker"><i class="bi bi-gift"></i>Gift Info</span>
                                <div class="message-title mt-3">Birthday Gift</div>
                            </div>
                            <div class="col-lg-8">
                                <div class="message-body">
                                    <?= !empty($giftInfo) ? nl2br(html_escape($giftInfo)) : 'Terima kasih atas doa, ucapan, dan hadiah yang diberikan. Kehadiran dan doa baik sudah menjadi hadiah yang sangat berarti.'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <section class="section-sm" id="share">
            <div class="container">
                <div class="row g-4 align-items-stretch">
                    <div class="col-lg-6">
                        <div class="info-card">
                            <span class="sticker"><i class="bi bi-share"></i>Share</span>
                            <div class="info-value mt-3">Bagikan Birthday Page Ini</div>
                            <p class="mt-3" style="color:#745e7a;line-height:1.9;">Kirim halaman ini ke keluarga, teman, atau orang tersayang melalui WhatsApp.</p>
                            <div class="share-input mt-3">
                                <label class="form-label fw-bold">Link Halaman</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="inviteLink" value="<?= current_url(); ?>" readonly>
                                    <button class="btn btn-candy" type="button" onclick="copyInviteLink()">Copy</button>
                                </div>
                            </div>
                            <a class="btn-candy mt-3" href="https://wa.me/?text=<?= rawurlencode('Birthday invitation for ' . $displayName . ': ' . current_url()); ?>" target="_blank">
                                <i class="bi bi-whatsapp"></i>Share WhatsApp
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-card">
                            <span class="sticker"><i class="bi bi-stars"></i>Special Line</span>
                            <div class="info-value mt-3">A Page Full of Smiles</div>
                            <p class="mt-3 mb-0" style="color:#745e7a;line-height:1.95;">
                                Today is not just about getting older, but about celebrating every beautiful memory, every smile, every challenge you have overcome, and every dream waiting ahead. May this special day bring happiness, love, laughter, and endless blessings into your life.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php if ($wishEnabled): ?>
            <section class="section" id="wishes">
                <div class="container">
                    <div class="section-head">
                        <span class="sticker"><i class="bi bi-chat-heart"></i>Wish Corner</span>
                        <h2 class="section-title">Tulis Ucapan Manis</h2>
                        <p class="section-desc">Tulis doa, ucapan, atau pesan lucu untuk membuat hari ini terasa lebih spesial.</p>
                    </div>

                    <div class="message-card mb-4">
                        <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
                            <input type="hidden" name="project_id" value="<?= html_escape($project->id ?? ''); ?>">
                            <input type="hidden" name="guest_slug" value="<?= html_escape($guestSlug); ?>">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Nama</label>
                                <input name="guest_name" class="form-control" value="<?= html_escape($guestName); ?>" placeholder="Nama kamu" required>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label fw-bold">Ucapan</label>
                                <input name="message" class="form-control" placeholder="Semoga makin bahagia dan banyak hal baik yaa" required>
                            </div>
                            <div class="col-12">
                                <button class="btn-candy" type="submit"><i class="bi bi-send-heart"></i>Kirim Ucapan</button>
                            </div>
                        </form>
                    </div>

                    <div class="row g-4">
                        <?php if (!empty($wishes)): ?>
                            <?php foreach ($wishes as $wish): ?>
                                <div class="col-md-6">
                                    <div class="wish-card">
                                        <div class="wish-name"><?= html_escape($wish->guest_name); ?></div>
                                        <div class="small text-muted mb-2">Birthday wishes</div>
                                        <div style="line-height:1.8;"><?= nl2br(html_escape($wish->message)); ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="footer-soft">Belum ada ucapan, jadi yang pertama yuk 🎉</div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <section class="section-sm">
            <div class="container">
                <div class="footer-soft">Dibuat dengan penuh warna, tawa, dan sedikit taburan confetti untuk hari spesial ini ✨</div>
            </div>
        </section>

        <?php if (!empty($musicUrl)): ?>
            <audio id="bgMusic" loop playsinline autoplay preload="auto">
                <source src="<?= html_escape($musicUrl); ?>">
                Browser Anda tidak mendukung audio.
            </audio>

            <div class="music-player">
                <div class="music-label" id="musicLabel">Music on</div>
                <button type="button" class="music-btn" id="musicToggle" aria-label="Toggle music">
                    <i class="bi bi-music-note-beamed"></i>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function copyInviteLink() {
            const el = document.getElementById('inviteLink');
            if (!el) return;
            el.select();
            el.setSelectionRange(0, 99999);
            document.execCommand('copy');
            alert('Link berhasil disalin.');
        }

        (function() {
            const wrap = document.getElementById('countdown');
            if (!wrap) return;

            const targetDate = wrap.getAttribute('data-date');
            if (!targetDate) return;

            const daysEl = document.getElementById('cdDays');
            const hoursEl = document.getElementById('cdHours');
            const minutesEl = document.getElementById('cdMinutes');
            const secondsEl = document.getElementById('cdSeconds');

            function updateCountdown() {
                const target = new Date(targetDate + 'T00:00:00').getTime();
                const now = new Date().getTime();
                const distance = target - now;

                if (distance <= 0) {
                    daysEl.textContent = '0';
                    hoursEl.textContent = '0';
                    minutesEl.textContent = '0';
                    secondsEl.textContent = '0';
                    return;
                }

                daysEl.textContent = Math.floor(distance / (1000 * 60 * 60 * 24));
                hoursEl.textContent = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                minutesEl.textContent = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                secondsEl.textContent = Math.floor((distance % (1000 * 60)) / 1000);
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        })();

        (function() {
            const audio = document.getElementById('bgMusic');
            const btn = document.getElementById('musicToggle');
            const label = document.getElementById('musicLabel');
            if (!audio || !btn) return;

            let userPaused = false;

            function setState(isPlaying) {
                btn.classList.toggle('is-playing', isPlaying);
                btn.innerHTML = isPlaying ? '<i class="bi bi-pause-fill"></i>' : '<i class="bi bi-music-note-beamed"></i>';
                if (label) label.textContent = isPlaying ? 'Music on' : 'Music off';
            }

            async function playMusic() {
                try {
                    audio.volume = 0.72;
                    await audio.play();
                    setState(true);
                } catch (e) {
                    setState(false);
                }
            }

            function pauseMusic() {
                userPaused = true;
                audio.pause();
                setState(false);
            }

            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (audio.paused) {
                    userPaused = false;
                    playMusic();
                } else {
                    pauseMusic();
                }
            });

            function tryAutoplay() {
                if (!userPaused && audio.paused) playMusic();
            }

            window.addEventListener('load', tryAutoplay);
            document.addEventListener('DOMContentLoaded', tryAutoplay);

            ['click', 'touchstart', 'scroll'].forEach(function(evt) {
                document.addEventListener(evt, function initMusicOnce() {
                    tryAutoplay();
                    document.removeEventListener(evt, initMusicOnce);
                }, { passive: true });
            });

            audio.addEventListener('play', function() { setState(true); });
            audio.addEventListener('pause', function() { setState(false); });

            setState(false);
        })();
    </script>
</body>

</html>
