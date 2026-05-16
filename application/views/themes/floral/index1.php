<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title ?? ($project->title ?? 'Wedding Invitation')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6f8f72">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --cream: #fffaf0;
            --sage: #6f8f72;
            --sage-dark: #3f6548;
            --sage-soft: #eaf1e5;
            --gold: #c59b5b;
            --peach: #f6ded2;
            --ink: #263529;
            --muted: #75806f;
            --line: rgba(111, 143, 114, .18);
            --card: rgba(255, 255, 255, .82);
            --shadow: 0 24px 70px rgba(63, 101, 72, .14);
            --radius-xl: 34px;
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
            color: var(--ink);
            font-family: "Inter", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background:
                radial-gradient(circle at 12% 7%, rgba(246, 222, 210, .95), transparent 28%),
                radial-gradient(circle at 90% 6%, rgba(234, 241, 229, .95), transparent 30%),
                linear-gradient(180deg, #fffaf0 0%, #f8f3e7 42%, #fffaf0 100%);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        .section {
            position: relative;
            padding: 82px 0;
        }

        .container-narrow {
            max-width: 1040px;
        }

        .serif {
            font-family: "Cormorant Garamond", Georgia, serif;
        }

        .floral-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .68);
            color: var(--sage-dark);
            border: 1px solid var(--line);
            font-size: 12px;
            letter-spacing: .18em;
            text-transform: uppercase;
            font-weight: 700;
        }

        .hero {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 72px 0 48px;
            position: relative;
            overflow: hidden;
        }

        .hero::before,
        .hero::after {
            content: "";
            position: absolute;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            filter: blur(4px);
            opacity: .75;
            pointer-events: none;
        }

        .hero::before {
            background: radial-gradient(circle, rgba(111, 143, 114, .22), transparent 66%);
            left: -150px;
            top: 10%;
        }

        .hero::after {
            background: radial-gradient(circle, rgba(197, 155, 91, .25), transparent 66%);
            right: -170px;
            bottom: 4%;
        }

        .hero-frame {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1.03fr .97fr;
            gap: 28px;
            align-items: stretch;
        }

        .hero-copy {
            min-height: 620px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, .55);
            backdrop-filter: blur(18px);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            padding: clamp(28px, 6vw, 62px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .hero-copy::before {
            content: "✦";
            position: absolute;
            top: 24px;
            right: 30px;
            color: rgba(197, 155, 91, .65);
            font-size: 42px;
        }

        .cover-text {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.8;
            margin: 22px 0 10px;
        }

        .guest-name {
            color: var(--sage-dark);
            font-weight: 700;
            font-size: 17px;
        }

        .hero-title {
            font-size: clamp(52px, 9vw, 94px);
            line-height: .88;
            color: var(--sage-dark);
            margin: 24px 0 20px;
            letter-spacing: -.045em;
        }

        .hero-subtitle {
            color: var(--muted);
            font-size: 17px;
            line-height: 1.9;
            max-width: 520px;
        }

        .hero-action {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-floral {
            border: none;
            border-radius: 999px;
            background: var(--sage-dark);
            color: white;
            padding: 13px 20px;
            font-weight: 700;
            box-shadow: 0 15px 34px rgba(63, 101, 72, .22);
            transition: .25s ease;
        }

        .btn-floral:hover {
            transform: translateY(-2px);
            background: var(--sage);
            color: white;
        }

        .btn-ghost {
            border: 1px solid var(--line);
            border-radius: 999px;
            background: rgba(255, 255, 255, .6);
            color: var(--sage-dark);
            padding: 13px 20px;
            font-weight: 700;
            transition: .25s ease;
        }

        .btn-ghost:hover {
            transform: translateY(-2px);
            border-color: rgba(63, 101, 72, .4);
            color: var(--sage-dark);
            background: white;
        }

        .hero-visual {
            min-height: 620px;
            border-radius: var(--radius-xl);
            overflow: hidden;
            position: relative;
            box-shadow: var(--shadow);
        }

        .hero-visual img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .hero-visual::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 35%, rgba(38, 53, 41, .62) 100%);
        }

        .date-card {
            position: absolute;
            left: 26px;
            right: 26px;
            bottom: 26px;
            z-index: 3;
            background: rgba(255, 250, 240, .84);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .65);
            border-radius: 26px;
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            color: var(--sage-dark);
        }

        .date-card small {
            display: block;
            color: var(--muted);
            font-size: 11px;
            letter-spacing: .14em;
            text-transform: uppercase;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .date-card strong {
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: 25px;
            line-height: 1.05;
        }

        .preview-alert {
            position: relative;
            z-index: 3;
            max-width: 1040px;
            margin: 0 auto 18px;
            border-radius: 16px;
        }

        .section-head {
            text-align: center;
            max-width: 720px;
            margin: 0 auto 44px;
        }

        .section-title {
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: clamp(42px, 6vw, 66px);
            line-height: .98;
            color: var(--sage-dark);
            margin: 16px 0 12px;
            letter-spacing: -.03em;
        }

        .section-subtitle {
            color: var(--muted);
            line-height: 1.85;
            font-size: 16px;
            margin: 0;
        }

        .glass-block {
            background: var(--card);
            border: 1px solid rgba(255, 255, 255, .72);
            box-shadow: var(--shadow);
            border-radius: var(--radius-xl);
            overflow: hidden;
        }

        .story-grid {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 0;
            align-items: stretch;
        }

        .story-image {
            min-height: 460px;
            background: var(--sage-soft);
        }

        .story-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .story-content {
            padding: clamp(28px, 5vw, 58px);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .story-text {
            color: var(--muted);
            line-height: 2;
            white-space: pre-line;
            font-size: 16px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .info-card {
            background: rgba(255, 255, 255, .72);
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            padding: 26px;
            height: 100%;
            box-shadow: 0 18px 42px rgba(63, 101, 72, .08);
        }

        .info-icon {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: var(--sage-soft);
            color: var(--sage-dark);
            display: grid;
            place-items: center;
            font-size: 23px;
            margin-bottom: 18px;
        }

        .info-label {
            color: var(--muted);
            font-size: 12px;
            letter-spacing: .16em;
            text-transform: uppercase;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .info-value {
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: 28px;
            color: var(--sage-dark);
            line-height: 1.1;
            margin: 0;
        }

        .countdown-wrap {
            border-radius: var(--radius-xl);
            background: linear-gradient(135deg, var(--sage-dark), var(--sage));
            color: white;
            padding: clamp(28px, 5vw, 44px);
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
        }

        .countdown-wrap::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .12);
            right: -90px;
            top: -110px;
        }

        .count-grid {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .count-item {
            text-align: center;
            background: rgba(255, 255, 255, .13);
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 22px;
            padding: 18px 10px;
        }

        .count-number {
            display: block;
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: clamp(38px, 5vw, 60px);
            line-height: .9;
            font-weight: 700;
        }

        .count-label {
            display: block;
            margin-top: 8px;
            font-size: 12px;
            letter-spacing: .14em;
            text-transform: uppercase;
            opacity: .85;
            font-weight: 800;
        }

        .map-frame {
            width: 100%;
            min-height: 420px;
            overflow: hidden;
            border-radius: var(--radius-lg);
            background: var(--sage-soft);
            border: 1px solid var(--line);
        }

        .map-frame iframe {
            width: 100%;
            height: 420px;
            display: block;
            border: 0;
        }

        .gallery-masonry {
            columns: 3 260px;
            column-gap: 18px;
        }

        .gallery-item {
            display: inline-block;
            width: 100%;
            break-inside: avoid;
            margin: 0 0 18px;
            border-radius: 28px;
            overflow: hidden;
            background: white;
            border: 1px solid rgba(255, 255, 255, .8);
            box-shadow: 0 18px 42px rgba(63, 101, 72, .09);
        }

        .gallery-item img {
            width: 100%;
            display: block;
            object-fit: cover;
        }

        .gallery-caption {
            padding: 14px 18px 18px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .gift-box,
        .share-box,
        .wish-card {
            background: rgba(255, 255, 255, .7);
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            padding: 22px;
        }

        .gift-content {
            white-space: pre-line;
            color: var(--muted);
            line-height: 1.9;
        }

        .form-control,
        .form-select {
            border-radius: 16px;
            border-color: rgba(111, 143, 114, .25);
            padding: 12px 14px;
            background-color: rgba(255, 255, 255, .78);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--sage);
            box-shadow: 0 0 0 .2rem rgba(111, 143, 114, .13);
        }

        .footer-note {
            border-radius: var(--radius-xl);
            padding: 34px;
            background: rgba(255, 255, 255, .68);
            border: 1px solid rgba(255, 255, 255, .7);
            box-shadow: var(--shadow);
            color: var(--muted);
            line-height: 1.8;
        }

        .music-player {
            position: fixed;
            right: 20px;
            bottom: 22px;
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .music-label {
            background: rgba(255, 255, 255, .86);
            border: 1px solid var(--line);
            color: var(--sage-dark);
            box-shadow: 0 16px 38px rgba(63, 101, 72, .13);
            border-radius: 999px;
            padding: 10px 14px;
            font-size: 12px;
            font-weight: 800;
            backdrop-filter: blur(12px);
        }

        .music-btn {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            border: 0;
            background: var(--sage-dark);
            color: white;
            display: grid;
            place-items: center;
            font-size: 25px;
            box-shadow: 0 18px 42px rgba(63, 101, 72, .28);
        }

        .music-btn.is-playing {
            animation: pulseMusic 1.6s ease-in-out infinite;
        }

        @keyframes pulseMusic {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.07);
            }
        }

        @media (max-width: 991.98px) {
            .hero-frame,
            .story-grid {
                grid-template-columns: 1fr;
            }

            .hero-copy,
            .hero-visual {
                min-height: auto;
            }

            .hero-visual {
                height: 560px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 64px 0;
            }
        }

        @media (max-width: 575.98px) {
            .hero {
                padding: 24px 0 42px;
            }

            .hero-copy {
                padding: 28px 22px;
                border-radius: 28px;
            }

            .hero-visual {
                height: 430px;
                border-radius: 28px;
            }

            .date-card {
                left: 16px;
                right: 16px;
                bottom: 16px;
                grid-template-columns: 1fr;
            }

            .count-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .music-label {
                display: none;
            }
        }
    </style>
</head>

<body>
    <?php
    $eventDateFormatted = !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : '';
    $eventDateISO = !empty($project->event_date) ? date('Y-m-d', strtotime($project->event_date)) : '';
    $eventTime = !empty($project->event_time) ? $project->event_time : '';
    $musicUrl = !empty($project->music_url) ? $project->music_url : '';
    $heroImage = !empty($project->hero_image) ? asset_or_url($project->hero_image) : 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1400&auto=format&fit=crop';
    $mapUrl = '';
    $mapQuery = trim(($project->location_name ?? '') . ' ' . ($project->location_address ?? ''));
    if ($mapQuery !== '') {
        $mapUrl = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($mapQuery);
    }

    $mapEmbedRaw = '';
    if (!empty($project->map_embed)) {
        $mapEmbedRaw = html_entity_decode(trim($project->map_embed), ENT_QUOTES, 'UTF-8');
    }

    $mapIframeSrc = '';
    if ($mapEmbedRaw !== '') {
        if (stripos($mapEmbedRaw, '<iframe') !== false) {
            if (preg_match('/src="([^"]+)"/i', $mapEmbedRaw, $match) || preg_match("/src='([^']+)'/i", $mapEmbedRaw, $match)) {
                $mapIframeSrc = $match[1];
            }
        } else {
            $mapIframeSrc = $mapEmbedRaw;
        }

        if ($mapIframeSrc !== '' && stripos($mapIframeSrc, 'google.com/maps') === false && stripos($mapIframeSrc, 'maps.google') === false) {
            $mapIframeSrc = '';
        }
    }
    ?>

    <section class="hero">
        <div class="container container-narrow">
            <?php if (!empty($is_preview)): ?>
                <div class="alert alert-warning preview-alert">Preview mode</div>
            <?php endif; ?>

            <div class="hero-frame">
                <div class="hero-copy">
                    <div>
                        <span class="floral-chip"><i class="bi bi-flower2"></i> Floral Wedding</span>

                        <?php if (!empty($project->cover_text) || !empty($guest_name)): ?>
                            <div class="cover-text">
                                <?= !empty($project->cover_text) ? nl2br(html_escape($project->cover_text)) : 'Kepada Yth.'; ?>
                                <?php if (!empty($guest_name)): ?>
                                    <br><span class="guest-name"><?= html_escape($guest_name); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <h1 class="hero-title serif"><?= html_escape($project->title ?? 'Wedding Invitation'); ?></h1>

                        <?php if (!empty($project->subtitle)): ?>
                            <p class="hero-subtitle"><?= nl2br(html_escape($project->subtitle)); ?></p>
                        <?php endif; ?>

                        <div class="hero-action">
                            <a href="#detail-acara" class="btn btn-floral"><i class="bi bi-calendar-heart me-1"></i> Detail Acara</a>
                            <?php if (!empty($project->rsvp_enabled)): ?>
                                <a href="#rsvp" class="btn btn-ghost"><i class="bi bi-send-heart me-1"></i> RSVP</a>
                            <?php endif; ?>
                            <?php if (!empty($mapUrl)): ?>
                                <a href="<?= html_escape($mapUrl); ?>" target="_blank" class="btn btn-ghost"><i class="bi bi-geo-alt me-1"></i> Buka Maps</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="hero-visual">
                    <img src="<?= html_escape($heroImage); ?>" alt="<?= html_escape($project->title ?? 'Wedding Invitation'); ?>">
                    <div class="date-card">
                        <div>
                            <small>Tanggal</small>
                            <strong><?= html_escape($eventDateFormatted ?: 'Save The Date'); ?></strong>
                        </div>
                        <div>
                            <small>Waktu</small>
                            <strong><?= html_escape($eventTime ?: 'With Love'); ?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($project->description)): ?>
        <section class="section pt-0">
            <div class="container container-narrow">
                <div class="glass-block story-grid">
                    <div class="story-image">
                        <img src="<?= html_escape($heroImage); ?>" alt="<?= html_escape($project->title ?? 'Wedding Story'); ?>">
                    </div>
                    <div class="story-content">
                        <span class="floral-chip"><i class="bi bi-heart"></i> Our Story</span>
                        <h2 class="section-title">Menuju Hari Bahagia</h2>
                        <div class="story-text"><?= nl2br(html_escape($project->description)); ?></div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="section" id="detail-acara">
        <div class="container container-narrow">
            <div class="section-head">
                <span class="floral-chip"><i class="bi bi-calendar2-heart"></i> Detail</span>
                <h2 class="section-title">Detail Acara</h2>
                <p class="section-subtitle">Dengan penuh rasa syukur, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan memberikan doa restu.</p>
            </div>

            <div class="info-grid">
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-calendar-heart"></i></div>
                    <div class="info-label">Tanggal</div>
                    <p class="info-value"><?= html_escape($eventDateFormatted ?: '-'); ?></p>
                </div>

                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-clock-history"></i></div>
                    <div class="info-label">Waktu</div>
                    <p class="info-value"><?= html_escape($eventTime ?: '-'); ?></p>
                </div>

                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-geo-alt"></i></div>
                    <div class="info-label">Tempat</div>
                    <p class="info-value"><?= html_escape($project->location_name ?? '-'); ?></p>
                </div>
            </div>

            <?php if (!empty($eventDateISO)): ?>
                <div class="countdown-wrap mt-4" id="countdown" data-date="<?= html_escape($eventDateISO); ?>">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-4">
                            <span class="floral-chip" style="background:rgba(255,255,255,.16);color:white;border-color:rgba(255,255,255,.22);"><i class="bi bi-hourglass-split"></i> Countdown</span>
                            <h3 class="serif mt-3 mb-0" style="font-size:42px;line-height:1;">Counting the days</h3>
                        </div>
                        <div class="col-lg-8">
                            <div class="count-grid">
                                <div class="count-item"><span class="count-number" id="cdDays">0</span><span class="count-label">Hari</span></div>
                                <div class="count-item"><span class="count-number" id="cdHours">0</span><span class="count-label">Jam</span></div>
                                <div class="count-item"><span class="count-number" id="cdMinutes">0</span><span class="count-label">Menit</span></div>
                                <div class="count-item"><span class="count-number" id="cdSeconds">0</span><span class="count-label">Detik</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if (!empty($project->location_address) || !empty($mapIframeSrc)): ?>
        <section class="section pt-0" id="lokasi">
            <div class="container container-narrow">
                <div class="row g-4 align-items-stretch">
                    <div class="col-lg-5">
                        <div class="glass-block p-4 p-lg-5 h-100">
                            <span class="floral-chip"><i class="bi bi-pin-map"></i> Location</span>
                            <h2 class="section-title">Lokasi Acara</h2>
                            <?php if (!empty($project->location_name)): ?>
                                <h4 class="serif mb-3" style="font-size:32px;color:var(--sage-dark);"><?= html_escape($project->location_name); ?></h4>
                            <?php endif; ?>
                            <?php if (!empty($project->location_address)): ?>
                                <p class="section-subtitle mb-4"><?= nl2br(html_escape($project->location_address)); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($mapUrl)): ?>
                                <a class="btn btn-floral" target="_blank" href="<?= html_escape($mapUrl); ?>"><i class="bi bi-map me-1"></i> Buka Google Maps</a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if (!empty($mapIframeSrc)): ?>
                        <div class="col-lg-7">
                            <div class="map-frame">
                                <iframe
                                    src="<?= html_escape($mapIframeSrc); ?>"
                                    allowfullscreen
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($galleries)): ?>
        <section class="section" id="gallery">
            <div class="container container-narrow">
                <div class="section-head">
                    <span class="floral-chip"><i class="bi bi-images"></i> Gallery</span>
                    <h2 class="section-title">Momen Indah</h2>
                    <p class="section-subtitle">Kumpulan potret terbaik yang menjadi bagian dari cerita bahagia kami.</p>
                </div>

                <div class="gallery-masonry">
                    <?php foreach ($galleries as $g): ?>
                        <div class="gallery-item">
                            <img src="<?= asset_or_url($g->image_path); ?>" alt="<?= html_escape(!empty($g->caption) ? $g->caption : 'Gallery'); ?>">
                            <?php if (!empty($g->caption)): ?>
                                <div class="gallery-caption"><?= html_escape($g->caption); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="section pt-0" id="share-link">
        <div class="container container-narrow">
            <div class="row g-4">
                <div class="<?= !empty($project->gift_enabled) ? 'col-lg-6' : 'col-lg-12'; ?>">
                    <div class="glass-block p-4 p-lg-5 h-100">
                        <span class="floral-chip"><i class="bi bi-share"></i> Share</span>
                        <h2 class="section-title" style="font-size:46px;">Bagikan Undangan</h2>
                        <p class="section-subtitle mb-4">Link undangan ini siap dibagikan kepada keluarga dan sahabat tercinta.</p>

                        <div class="share-box">
                            <label class="form-label fw-semibold">Link Undangan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inviteLink" value="<?= current_url(); ?>" readonly>
                                <button class="btn btn-ghost" type="button" onclick="copyInviteLink()">Copy</button>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <a class="btn btn-floral" target="_blank" href="https://wa.me/?text=<?= rawurlencode('Undangan kami: ' . current_url()); ?>">
                                <i class="bi bi-whatsapp me-1"></i> Share WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <?php if (!empty($project->gift_enabled)): ?>
                    <div class="col-lg-6">
                        <div class="glass-block p-4 p-lg-5 h-100">
                            <span class="floral-chip"><i class="bi bi-gift"></i> Gift</span>
                            <h2 class="section-title" style="font-size:46px;">Gift Info</h2>
                            <p class="section-subtitle mb-4">Bagi yang ingin mengirimkan tanda kasih untuk hari bahagia kami.</p>
                            <div class="gift-box">
                                <div class="gift-content"><?= nl2br(html_escape($project->gift_info ?? '')); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if (!empty($project->rsvp_enabled)): ?>
        <section class="section" id="rsvp">
            <div class="container container-narrow">
                <div class="section-head">
                    <span class="floral-chip"><i class="bi bi-send-heart"></i> RSVP</span>
                    <h2 class="section-title">Konfirmasi Kehadiran</h2>
                    <p class="section-subtitle">Mohon bantu konfirmasi kehadiran Anda agar persiapan acara kami semakin baik.</p>
                </div>

                <div class="glass-block p-4 p-lg-5">
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
                            <button class="btn btn-floral"><i class="bi bi-send me-1"></i> Kirim RSVP</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($project->wish_enabled)): ?>
        <section class="section" id="wishes">
            <div class="container container-narrow">
                <div class="section-head">
                    <span class="floral-chip"><i class="bi bi-chat-heart"></i> Best Wishes</span>
                    <h2 class="section-title">Kirim Ucapan</h2>
                    <p class="section-subtitle">Tuliskan doa dan ucapan terbaik Anda untuk hari bahagia kami.</p>
                </div>

                <div class="glass-block p-4 p-lg-5 mb-4">
                    <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
                        <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                        <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">
                        <div class="col-md-4">
                            <label class="form-label">Nama</label>
                            <input name="guest_name" class="form-control" value="<?= html_escape($guest_name ?? ''); ?>" placeholder="Nama" required>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Ucapan</label>
                            <input name="message" class="form-control" placeholder="Tulis ucapan terbaik" required>
                        </div>
                        <div class="col-12 pt-2">
                            <button class="btn btn-floral"><i class="bi bi-heart me-1"></i> Kirim Ucapan</button>
                        </div>
                    </form>
                </div>

                <div class="row g-4">
                    <?php if (!empty($wishes)): ?>
                        <?php foreach ($wishes as $wish): ?>
                            <div class="col-md-6">
                                <div class="wish-card h-100">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="info-icon mb-0" style="width:44px;height:44px;font-size:18px;"><i class="bi bi-person-heart"></i></div>
                                        <strong><?= html_escape($wish->guest_name ?? 'Tamu'); ?></strong>
                                    </div>
                                    <div class="section-subtitle"><?= nl2br(html_escape($wish->message ?? '')); ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="text-muted text-center">Belum ada ucapan.</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="section pt-0">
        <div class="container container-narrow text-center">
            <div class="footer-note">
                Terima kasih atas doa, cinta, dan kehadiran Anda di hari istimewa kami.
            </div>
        </div>
    </section>

    <?php if (!empty($musicUrl)): ?>
        <audio id="bgMusic" loop preload="auto" playsinline>
            <source src="<?= html_escape($musicUrl); ?>">
        </audio>

        <div class="music-player">
            <div class="music-label" id="musicLabel">Music Off</div>
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

            function setState(isPlaying) {
                btn.classList.toggle('is-playing', isPlaying);
                btn.innerHTML = isPlaying ? '<i class="bi bi-pause-fill"></i>' : '<i class="bi bi-music-note-beamed"></i>';
                if (label) label.textContent = isPlaying ? 'Music On' : 'Music Off';
            }

            function playMusic() {
                audio.play().then(function() {
                    setState(true);
                }).catch(function() {
                    setState(false);
                });
            }

            function pauseMusic() {
                audio.pause();
                setState(false);
            }

            btn.addEventListener('click', function() {
                if (audio.paused) {
                    playMusic();
                } else {
                    pauseMusic();
                }
            });

            window.addEventListener('load', function() {
                playMusic();
            });

            document.addEventListener('click', function initOnce() {
                if (audio.paused) {
                    playMusic();
                }
                document.removeEventListener('click', initOnce);
            }, { once: true });
        })();
    </script>
</body>

</html>
