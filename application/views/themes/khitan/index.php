<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title ?? ($project->title ?? 'Undangan Khitan')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0f766e">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --deep: #0f3d3e;
            --teal: #0f766e;
            --mint: #9ee6d6;
            --soft: #eefcf7;
            --cream: #fffaf0;
            --gold: #d6a84f;
            --orange: #ffb37a;
            --text: #203736;
            --muted: #6c8580;
            --card: rgba(255,255,255,.88);
            --line: rgba(15,118,110,.16);
            --shadow: 0 24px 70px rgba(15,61,62,.14);
            --radius: 34px;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            color: var(--text);
            font-family: "Plus Jakarta Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at top left, rgba(158,230,214,.55), transparent 32%),
                radial-gradient(circle at 90% 12%, rgba(255,179,122,.28), transparent 24%),
                linear-gradient(180deg, #f8fffb 0%, #edf9f2 44%, #fffaf0 100%);
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            opacity: .18;
            background-image:
                linear-gradient(30deg, rgba(15,118,110,.13) 12%, transparent 12.5%, transparent 87%, rgba(15,118,110,.13) 87.5%, rgba(15,118,110,.13)),
                linear-gradient(150deg, rgba(15,118,110,.13) 12%, transparent 12.5%, transparent 87%, rgba(15,118,110,.13) 87.5%, rgba(15,118,110,.13));
            background-size: 42px 72px;
            z-index: 0;
        }

        a { text-decoration: none; }

        .page-wrap { position: relative; z-index: 1; }

        .section {
            padding: 96px 0;
            position: relative;
        }

        .section-soft {
            padding: 74px 0;
        }

        .kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 16px;
            border-radius: 999px;
            background: rgba(15,118,110,.09);
            border: 1px solid rgba(15,118,110,.16);
            color: var(--teal);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .section-title {
            margin: 16px 0 10px;
            font-family: "Amiri", serif;
            font-size: clamp(34px, 5vw, 62px);
            line-height: .98;
            font-weight: 700;
            color: var(--deep);
        }

        .section-subtitle {
            max-width: 760px;
            margin: 0 auto;
            color: var(--muted);
            line-height: 1.85;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 64px 0 76px;
            overflow: hidden;
        }

        .ornament {
            position: absolute;
            pointer-events: none;
            z-index: 0;
            opacity: .9;
            filter: drop-shadow(0 12px 24px rgba(15,61,62,.08));
        }

        .ornament.one {
            top: 8%;
            left: 6%;
            font-size: clamp(32px, 5vw, 62px);
            animation: floaty 5.5s ease-in-out infinite;
        }

        .ornament.two {
            top: 18%;
            right: 7%;
            font-size: clamp(28px, 4vw, 52px);
            animation: floaty 6s ease-in-out infinite .7s;
        }

        .ornament.three {
            bottom: 10%;
            left: 10%;
            font-size: clamp(26px, 4vw, 50px);
            animation: floaty 6.4s ease-in-out infinite 1s;
        }

        @keyframes floaty {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-16px) rotate(5deg); }
        }

        .hero-panel {
            position: relative;
            z-index: 2;
            background: linear-gradient(135deg, rgba(255,255,255,.92), rgba(255,250,240,.86));
            border: 1px solid rgba(255,255,255,.9);
            border-radius: 44px;
            padding: clamp(28px, 5vw, 58px);
            box-shadow: var(--shadow);
            backdrop-filter: blur(22px);
            overflow: hidden;
        }

        .hero-panel::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            right: -80px;
            top: -80px;
            border-radius: 50%;
            background: rgba(214,168,79,.14);
            pointer-events: none;
        }

        .bismillah {
            font-family: "Amiri", serif;
            font-size: clamp(34px, 6vw, 68px);
            color: var(--teal);
            line-height: 1;
            margin-bottom: 12px;
        }

        .cover-label {
            display: inline-block;
            margin-bottom: 18px;
            color: var(--gold);
            font-weight: 800;
            letter-spacing: .14em;
            text-transform: uppercase;
            font-size: 12px;
        }

        .hero-title {
            font-family: "Amiri", serif;
            font-size: clamp(44px, 8vw, 92px);
            font-weight: 700;
            line-height: .9;
            color: var(--deep);
            margin-bottom: 18px;
        }

        .child-name {
            color: var(--teal);
        }

        .hero-desc {
            color: var(--muted);
            line-height: 1.9;
            font-size: 16px;
            max-width: 660px;
            margin-bottom: 28px;
        }

        .guest-card {
            display: inline-flex;
            flex-direction: column;
            gap: 4px;
            padding: 14px 18px;
            background: rgba(15,118,110,.08);
            border: 1px solid rgba(15,118,110,.14);
            border-radius: 22px;
            margin-bottom: 24px;
        }

        .guest-card span {
            color: var(--muted);
            font-size: 12px;
        }

        .guest-card strong {
            color: var(--deep);
            font-size: 16px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-main {
            border: 0;
            border-radius: 999px;
            padding: 14px 22px;
            background: linear-gradient(135deg, var(--teal), #0f9f8f);
            color: #fff;
            font-weight: 800;
            box-shadow: 0 16px 34px rgba(15,118,110,.25);
        }

        .btn-main:hover {
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-soft {
            border: 1px solid rgba(15,118,110,.18);
            border-radius: 999px;
            padding: 14px 22px;
            background: rgba(255,255,255,.72);
            color: var(--teal);
            font-weight: 800;
        }

        .hero-visual {
            position: relative;
            z-index: 2;
        }

        .photo-frame {
            position: relative;
            border-radius: 40px;
            padding: 12px;
            background: #fff;
            box-shadow: var(--shadow);
            transform: rotate(2deg);
        }

        .photo-frame img {
            width: 100%;
            height: 520px;
            object-fit: cover;
            border-radius: 30px;
            display: block;
        }

        .photo-badge {
            position: absolute;
            left: 26px;
            bottom: 26px;
            right: 26px;
            background: rgba(255,255,255,.84);
            border: 1px solid rgba(255,255,255,.9);
            border-radius: 24px;
            padding: 16px;
            backdrop-filter: blur(14px);
        }

        .photo-badge small {
            color: var(--muted);
            display: block;
            margin-bottom: 4px;
        }

        .photo-badge strong {
            color: var(--deep);
            font-size: 20px;
        }

        .countdown-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-top: 34px;
        }

        .count-item,
        .info-card,
        .card-soft,
        .wish-card,
        .gallery-card {
            background: var(--card);
            border: 1px solid rgba(255,255,255,.84);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            backdrop-filter: blur(18px);
        }

        .count-item {
            padding: 22px 12px;
            text-align: center;
        }

        .count-number {
            display: block;
            color: var(--deep);
            font-size: clamp(28px, 4vw, 44px);
            font-weight: 900;
            line-height: 1;
        }

        .count-label {
            margin-top: 6px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .12em;
        }

        .info-card {
            height: 100%;
            padding: 30px;
        }

        .info-icon {
            width: 58px;
            height: 58px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 26px;
            background: linear-gradient(135deg, var(--teal), var(--mint));
            margin-bottom: 18px;
        }

        .info-title {
            font-weight: 900;
            color: var(--deep);
            font-size: 20px;
            margin-bottom: 8px;
        }

        .info-text {
            color: var(--muted);
            line-height: 1.75;
        }

        .story-card {
            padding: clamp(28px, 5vw, 52px);
            border-radius: 42px;
            background:
                linear-gradient(135deg, rgba(15,118,110,.9), rgba(15,61,62,.95)),
                radial-gradient(circle at top right, rgba(214,168,79,.3), transparent 30%);
            color: #fff;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .story-card::before {
            content: "﴿";
            position: absolute;
            top: -34px;
            right: 28px;
            font-family: "Amiri", serif;
            font-size: 150px;
            color: rgba(255,255,255,.09);
            line-height: 1;
        }

        .story-card h2 {
            font-family: "Amiri", serif;
            font-size: clamp(36px, 5vw, 62px);
            line-height: 1;
            margin-bottom: 18px;
        }

        .story-card p {
            color: rgba(255,255,255,.82);
            line-height: 1.95;
            margin-bottom: 0;
        }

        .family-box {
            padding: 28px;
            border-radius: 34px;
            background: rgba(255,255,255,.92);
            box-shadow: var(--shadow);
            height: 100%;
        }

        .family-chip {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 13px 15px;
            border-radius: 18px;
            background: rgba(15,118,110,.08);
            color: var(--deep);
            font-weight: 800;
            margin-top: 10px;
        }

        .map-frame {
            overflow: hidden;
            border-radius: 34px;
            border: 10px solid rgba(255,255,255,.84);
            box-shadow: var(--shadow);
            min-height: 360px;
            background: rgba(15,118,110,.08);
        }

        .map-frame iframe {
            width: 100%;
            height: 420px;
            border: 0;
            display: block;
        }

        .gallery-card {
            overflow: hidden;
            border-radius: 32px;
        }

        .gallery-card img {
            width: 100%;
            height: 310px;
            object-fit: cover;
            display: block;
            transition: .35s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.04);
        }

        .gallery-caption {
            padding: 14px 18px;
            color: var(--muted);
            font-size: 14px;
        }

        .form-card {
            padding: clamp(22px, 4vw, 34px);
        }

        .form-control,
        .form-select {
            border: 1px solid rgba(15,118,110,.16);
            border-radius: 18px;
            padding: 13px 15px;
            background-color: rgba(255,255,255,.86);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 .2rem rgba(15,118,110,.12);
        }

        .wish-card {
            padding: 22px;
            height: 100%;
        }

        .wish-name {
            color: var(--deep);
            font-weight: 900;
            margin-bottom: 6px;
        }

        .share-box {
            padding: 18px;
            border-radius: 24px;
            background: rgba(15,118,110,.07);
            border: 1px dashed rgba(15,118,110,.22);
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
            display: none;
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(255,255,255,.9);
            color: var(--deep);
            box-shadow: 0 12px 26px rgba(15,61,62,.14);
            font-size: 12px;
            font-weight: 800;
        }

        .music-btn {
            width: 60px;
            height: 60px;
            border: 0;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--teal), var(--gold));
            color: #fff;
            font-size: 23px;
            box-shadow: 0 16px 34px rgba(15,118,110,.28);
        }

        .footer-note {
            color: var(--muted);
            line-height: 1.8;
        }

        .preview-alert {
            position: relative;
            z-index: 5;
            border-radius: 18px;
        }

        @media (min-width: 992px) {
            .music-label { display: inline-block; }
        }

        @media (max-width: 991.98px) {
            .hero {
                min-height: auto;
                padding-top: 46px;
            }

            .photo-frame {
                transform: rotate(0);
            }

            .photo-frame img {
                height: 390px;
            }

            .countdown-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 575.98px) {
            .section { padding: 76px 0; }
            .section-soft { padding: 58px 0; }
            .hero-panel { border-radius: 32px; }
            .hero-actions .btn-main,
            .hero-actions .btn-soft {
                width: 100%;
                text-align: center;
                justify-content: center;
            }
            .photo-frame img { height: 320px; }
            .gallery-card img { height: 235px; }
            .map-frame iframe { height: 340px; }
        }
    </style>
</head>

<body>
<?php
$eventDateFormatted = !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : '';
$eventDateISO = !empty($project->event_date) ? date('Y-m-d', strtotime($project->event_date)) : '';
$eventTime = !empty($project->event_time) ? $project->event_time : 'Waktu menyusul';
$musicUrl = !empty($project->music_url) ? $project->music_url : '';
$childName = !empty($project->receiver_name) ? $project->receiver_name : (!empty($project->title) ? $project->title : 'Ananda');
$hostName = !empty($project->sender_name) ? $project->sender_name : 'Keluarga Besar';
$coverText = !empty($project->cover_text) ? $project->cover_text : 'Undangan Tasyakuran Khitan';
$subtitle = !empty($project->subtitle) ? $project->subtitle : 'Dengan penuh rasa syukur, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan memberikan doa terbaik.';
$messageBody = !empty($project->message_body) ? $project->message_body : 'Merupakan kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu kepada ananda.';
$description = !empty($project->description) ? $project->description : 'Semoga ananda tumbuh menjadi anak yang sholeh, sehat, berbakti kepada orang tua, serta membawa kebaikan bagi keluarga dan sesama.';
$heroImage = !empty($project->hero_image) ? asset_or_url($project->hero_image) : 'https://images.unsplash.com/photo-1604881988758-f76ad2f7aac1?q=80&w=1200&auto=format&fit=crop';
$mapEmbed = !empty($project->map_embed) ? $project->map_embed : '';
$mapUrl = '';
if (!empty($project->location_name) || !empty($project->location_address)) {
    $mapQuery = trim(($project->location_name ?? '') . ' ' . ($project->location_address ?? ''));
    $mapUrl = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($mapQuery);
}
$inviteUrl = current_url();
?>

<div class="page-wrap">
    <section class="hero">
        <div class="ornament one">🌙</div>
        <div class="ornament two">🕌</div>
        <div class="ornament three">✨</div>

        <div class="container">
            <?php if (!empty($is_preview)): ?>
                <div class="alert alert-warning preview-alert mb-4">Preview mode</div>
            <?php endif; ?>

            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="hero-panel">
                        <div class="bismillah">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</div>
                        <div class="cover-label"><?= html_escape($coverText); ?></div>

                        <?php if (!empty($guest_name)): ?>
                            <div class="guest-card">
                                <span>Kepada Yth.</span>
                                <strong><?= html_escape($guest_name); ?></strong>
                            </div>
                        <?php endif; ?>

                        <h1 class="hero-title">
                            Tasyakuran Khitan<br>
                            <span class="child-name"><?= html_escape($childName); ?></span>
                        </h1>

                        <p class="hero-desc"><?= nl2br(html_escape($subtitle)); ?></p>

                        <div class="hero-actions">
                            <a href="#detail" class="btn btn-main">
                                <i class="bi bi-calendar-heart me-1"></i> Detail Acara
                            </a>
                            <?php if (!empty($mapUrl)): ?>
                                <a href="<?= html_escape($mapUrl); ?>" target="_blank" class="btn btn-soft">
                                    <i class="bi bi-geo-alt me-1"></i> Buka Maps
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($project->rsvp_enabled)): ?>
                                <a href="#rsvp" class="btn btn-soft">
                                    <i class="bi bi-check2-circle me-1"></i> RSVP
                                </a>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($eventDateISO)): ?>
                            <div class="countdown-grid" id="countdown" data-date="<?= html_escape($eventDateISO); ?>">
                                <div class="count-item">
                                    <span class="count-number" id="cdDays">0</span>
                                    <div class="count-label">Hari</div>
                                </div>
                                <div class="count-item">
                                    <span class="count-number" id="cdHours">0</span>
                                    <div class="count-label">Jam</div>
                                </div>
                                <div class="count-item">
                                    <span class="count-number" id="cdMinutes">0</span>
                                    <div class="count-label">Menit</div>
                                </div>
                                <div class="count-item">
                                    <span class="count-number" id="cdSeconds">0</span>
                                    <div class="count-label">Detik</div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hero-visual">
                        <div class="photo-frame">
                            <img src="<?= html_escape($heroImage); ?>" alt="<?= html_escape($childName); ?>">
                            <div class="photo-badge">
                                <small>Dengan penuh syukur</small>
                                <strong><?= html_escape($hostName); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="detail">
        <div class="container">
            <div class="text-center mb-5">
                <span class="kicker"><i class="bi bi-stars"></i> Detail Acara</span>
                <h2 class="section-title">Waktu & Tempat</h2>
                <p class="section-subtitle"><?= nl2br(html_escape($messageBody)); ?></p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="info-icon"><i class="bi bi-calendar2-heart"></i></div>
                        <div class="info-title">Tanggal</div>
                        <div class="info-text"><?= html_escape($eventDateFormatted ?: 'Tanggal menyusul'); ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="info-icon"><i class="bi bi-clock-history"></i></div>
                        <div class="info-title">Waktu</div>
                        <div class="info-text"><?= html_escape($eventTime); ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="info-icon"><i class="bi bi-geo-alt"></i></div>
                        <div class="info-title"><?= html_escape($project->location_name ?: 'Lokasi Acara'); ?></div>
                        <div class="info-text"><?= nl2br(html_escape($project->location_address ?: 'Alamat acara akan diinformasikan.')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-soft">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-7">
                    <div class="story-card h-100">
                        <h2>Doa Untuk Ananda</h2>
                        <p><?= nl2br(html_escape($description)); ?></p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="family-box">
                        <span class="kicker"><i class="bi bi-people"></i> Keluarga</span>
                        <h3 class="mt-3 mb-3 fw-bold" style="color:var(--deep);">Turut Mengundang</h3>
                        <p class="text-muted mb-4">Kami sekeluarga mengucapkan terima kasih atas doa dan kehadiran Bapak/Ibu/Saudara/i.</p>

                        <?php if (!empty($project->sender_name)): ?>
                            <div class="family-chip"><i class="bi bi-person-heart"></i> <?= html_escape($project->sender_name); ?></div>
                        <?php endif; ?>

                        <?php if (!empty($project->receiver_name)): ?>
                            <div class="family-chip"><i class="bi bi-star-fill"></i> Ananda: <?= html_escape($project->receiver_name); ?></div>
                        <?php endif; ?>

                        <?php if (empty($project->sender_name) && empty($project->receiver_name)): ?>
                            <div class="family-chip"><i class="bi bi-people-fill"></i> Keluarga Besar</div>
                        <?php endif; ?>

                        <div class="share-box mt-4">
                            <label class="form-label fw-bold">Link Undangan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inviteLink" value="<?= html_escape($inviteUrl); ?>" readonly>
                                <button class="btn btn-main" type="button" onclick="copyInviteLink()">Copy</button>
                            </div>
                            <a class="btn btn-soft mt-3 w-100" target="_blank" href="https://wa.me/?text=<?= rawurlencode('Undangan tasyakuran khitan: ' . $inviteUrl); ?>">
                                <i class="bi bi-whatsapp me-1"></i> Share WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <?php if (!empty($project->gift_enabled)): ?>
                    <div class="col-12">
                        <div class="family-box">
                            <span class="kicker"><i class="bi bi-gift"></i> Tanda Kasih</span>
                            <h3 class="mt-3 mb-3 fw-bold" style="color:var(--deep);">Gift Info</h3>
                            <div class="share-box">
                                <?= nl2br(html_escape($project->gift_info ?: 'Informasi tanda kasih belum tersedia.')); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="section" id="maps">
        <div class="container">
            <div class="text-center mb-5">
                <span class="kicker"><i class="bi bi-map"></i> Maps</span>
                <h2 class="section-title">Lokasi Acara</h2>
                <p class="section-subtitle"><?= nl2br(html_escape($project->location_address ?: 'Silakan gunakan tombol maps untuk menuju lokasi acara.')); ?></p>
            </div>

            <div class="map-frame">
                <?php if (!empty($mapEmbed)): ?>
                    <?= $mapEmbed; ?>
                <?php else: ?>
                    <div class="d-flex align-items-center justify-content-center text-center h-100 p-5" style="min-height:360px;">
                        <div>
                            <div class="display-5 mb-3">📍</div>
                            <h4 class="fw-bold" style="color:var(--deep);"><?= html_escape($project->location_name ?: 'Lokasi Acara'); ?></h4>
                            <p class="text-muted mb-4"><?= nl2br(html_escape($project->location_address ?: 'Alamat acara belum tersedia.')); ?></p>
                            <?php if (!empty($mapUrl)): ?>
                                <a href="<?= html_escape($mapUrl); ?>" target="_blank" class="btn btn-main">Buka Google Maps</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (!empty($mapUrl)): ?>
                <div class="text-center mt-4">
                    <a href="<?= html_escape($mapUrl); ?>" target="_blank" class="btn btn-main">
                        <i class="bi bi-geo-alt-fill me-1"></i> Buka Lokasi di Google Maps
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if (!empty($galleries)): ?>
        <section class="section" id="gallery">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="kicker"><i class="bi bi-images"></i> Galeri</span>
                    <h2 class="section-title">Momen Ceria</h2>
                    <p class="section-subtitle">Potret manis yang melengkapi momen spesial ananda.</p>
                </div>

                <div class="row g-4">
                    <?php foreach ($galleries as $g): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="gallery-card">
                                <img src="<?= asset_or_url($g->image_path); ?>" alt="<?= html_escape($g->caption ?: 'Gallery'); ?>">
                                <?php if (!empty($g->caption)): ?>
                                    <div class="gallery-caption"><?= html_escape($g->caption); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($project->rsvp_enabled)): ?>
        <section class="section" id="rsvp">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="kicker"><i class="bi bi-check2-square"></i> Konfirmasi</span>
                    <h2 class="section-title">Konfirmasi Kehadiran</h2>
                    <p class="section-subtitle">Mohon bantu isi konfirmasi kehadiran agar persiapan acara kami semakin nyaman.</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card-soft form-card">
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                            <?php endif; ?>

                            <form method="post" action="<?= site_url('rsvp/store'); ?>" class="row g-3">
                                <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                                <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">

                                <div class="col-md-4">
                                    <label class="form-label">Nama</label>
                                    <input name="guest_name" class="form-control" value="<?= html_escape($guest_name ?? ''); ?>" placeholder="Nama lengkap" required>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Status Kehadiran</label>
                                    <select name="attendance_status" class="form-select">
                                        <option value="Hadir">Hadir</option>
                                        <option value="Tidak Hadir">Tidak Hadir</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label">Jumlah Tamu</label>
                                    <input type="number" name="guest_total" class="form-control" value="1" min="1">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Catatan</label>
                                    <input name="note" class="form-control" placeholder="Contoh: hadir 2 orang">
                                </div>

                                <div class="col-12 pt-2">
                                    <button class="btn btn-main">Kirim RSVP</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($project->wish_enabled)): ?>
        <section class="section" id="wishes">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="kicker"><i class="bi bi-chat-heart"></i> Ucapan</span>
                    <h2 class="section-title">Doa & Ucapan Baik</h2>
                    <p class="section-subtitle">Tinggalkan doa dan ucapan terbaik untuk ananda dan keluarga.</p>
                </div>

                <div class="card-soft form-card mb-4">
                    <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
                        <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                        <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">

                        <div class="col-md-4">
                            <label class="form-label">Nama</label>
                            <input name="guest_name" class="form-control" value="<?= html_escape($guest_name ?? ''); ?>" placeholder="Nama" required>
                        </div>

                        <div class="col-md-8">
                            <label class="form-label">Ucapan</label>
                            <input name="message" class="form-control" placeholder="Tulis doa dan ucapan terbaik" required>
                        </div>

                        <div class="col-12 pt-2">
                            <button class="btn btn-main">Kirim Ucapan</button>
                        </div>
                    </form>
                </div>

                <div class="row g-4">
                    <?php foreach (($wishes ?? []) as $wish): ?>
                        <div class="col-md-6">
                            <div class="wish-card">
                                <div class="wish-name"><?= html_escape($wish->guest_name); ?></div>
                                <div class="text-muted small mb-2">Tamu undangan</div>
                                <div><?= nl2br(html_escape($wish->message)); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if (empty($wishes)): ?>
                        <div class="col-12">
                            <div class="text-center text-muted">Belum ada ucapan.</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="section-soft">
        <div class="container text-center">
            <div class="footer-note">Terima kasih atas perhatian, doa, dan kehadiran Anda di momen spesial kami.</div>
        </div>
    </section>
</div>

<?php if (!empty($musicUrl)): ?>
    <audio id="bgMusic" loop playsinline preload="auto">
        <source src="<?= html_escape($musicUrl); ?>">
    </audio>

    <div class="music-player">
        <div class="music-label" id="musicLabel">Music off</div>
        <button type="button" class="music-btn" id="musicToggle" aria-label="Toggle music">
            <i class="bi bi-music-note-beamed"></i>
        </button>
    </div>
<?php endif; ?>

<script>
    function copyInviteLink() {
        const el = document.getElementById('inviteLink');
        if (!el) return;
        el.select();
        el.setSelectionRange(0, 99999);
        document.execCommand('copy');
        alert('Link undangan berhasil disalin.');
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

        let started = false;

        function setIcon(isPlaying) {
            btn.innerHTML = isPlaying ? '<i class="bi bi-pause-fill"></i>' : '<i class="bi bi-music-note-beamed"></i>';
            if (label) label.textContent = isPlaying ? 'Music on' : 'Music off';
        }

        async function playMusic() {
            try {
                await audio.play();
                started = true;
                setIcon(true);
            } catch (e) {
                setIcon(false);
            }
        }

        function pauseMusic() {
            audio.pause();
            setIcon(false);
        }

        btn.addEventListener('click', function() {
            if (audio.paused) {
                playMusic();
            } else {
                pauseMusic();
            }
        });

        playMusic();

        document.addEventListener('click', function initMusicOnce() {
            if (!started) playMusic();
            document.removeEventListener('click', initMusicOnce);
        });

        document.addEventListener('touchstart', function initMusicTouchOnce() {
            if (!started) playMusic();
            document.removeEventListener('touchstart', initMusicTouchOnce);
        }, { once: true });
    })();
</script>
</body>
</html>
