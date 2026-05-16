<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title ?? ($project->title ?? 'Wedding Invitation')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#4f3f34">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ivory: #fffaf1;
            --paper: #fff6e8;
            --deep: #3f342a;
            --deep-soft: #695648;
            --gold: #b9925d;
            --gold-soft: #ead9bd;
            --sage: #7a876d;
            --line: rgba(185, 146, 93, .28);
            --white: #ffffff;
            --shadow: 0 24px 70px rgba(57, 43, 31, .13);
            --radius-xl: 34px;
            --radius-lg: 24px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            color: var(--deep);
            background:
                radial-gradient(circle at 10% 0%, rgba(234, 217, 189, .7), transparent 30%),
                radial-gradient(circle at 90% 8%, rgba(122, 135, 109, .18), transparent 26%),
                linear-gradient(180deg, #fffaf1 0%, #f7efe2 55%, #fffaf1 100%);
            font-family: "Inter", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        .sacred-shell {
            position: relative;
            min-height: 100vh;
        }

        .grain {
            position: fixed;
            inset: 0;
            pointer-events: none;
            opacity: .5;
            z-index: 0;
            background-image:
                linear-gradient(rgba(63, 52, 42, .03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(63, 52, 42, .03) 1px, transparent 1px);
            background-size: 44px 44px;
        }

        .section {
            position: relative;
            z-index: 1;
            padding: 94px 0;
        }

        .section-soft {
            padding: 72px 0;
        }

        .container-narrow {
            max-width: 1040px;
        }

        .kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            letter-spacing: .2em;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 700;
            color: var(--gold);
            margin-bottom: 18px;
        }

        .kicker::before,
        .kicker::after {
            content: "";
            width: 28px;
            height: 1px;
            background: var(--line);
        }

        .serif {
            font-family: "Cormorant Garamond", Georgia, serif;
        }

        .section-title {
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: clamp(36px, 5vw, 64px);
            line-height: .96;
            font-weight: 700;
            color: var(--deep);
            margin-bottom: 18px;
        }

        .section-subtitle {
            color: var(--deep-soft);
            line-height: 1.85;
            max-width: 760px;
            margin: 0 auto;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 44px 0 80px;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 760px;
            height: 760px;
            border: 1px solid rgba(185, 146, 93, .18);
            border-radius: 50%;
            top: -240px;
            left: 50%;
            transform: translateX(-50%);
            z-index: -1;
        }

        .hero-card {
            position: relative;
            background: rgba(255, 250, 241, .82);
            border: 1px solid rgba(185, 146, 93, .28);
            border-radius: 44px;
            box-shadow: var(--shadow);
            overflow: hidden;
            backdrop-filter: blur(18px);
        }

        .hero-visual {
            min-height: 620px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .hero-visual::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(180deg, rgba(63, 52, 42, .08), rgba(63, 52, 42, .64)),
                radial-gradient(circle at center, transparent 0%, rgba(0, 0, 0, .28) 100%);
        }

        .hero-content {
            position: absolute;
            inset: 0;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            text-align: center;
            padding: 56px 28px;
            color: #fff8ee;
        }

        .hero-cover {
            display: inline-block;
            padding: 10px 18px;
            border: 1px solid rgba(255,255,255,.35);
            border-radius: 999px;
            background: rgba(255,255,255,.12);
            backdrop-filter: blur(10px);
            margin-bottom: 22px;
            font-size: 13px;
            color: rgba(255,248,238,.9);
        }

        .hero-title {
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: clamp(54px, 9vw, 108px);
            line-height: .82;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 15px 45px rgba(0,0,0,.35);
        }

        .hero-subtitle {
            max-width: 680px;
            margin: 26px auto 0;
            line-height: 1.85;
            color: rgba(255,248,238,.88);
        }

        .hero-date-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 28px;
            padding: 14px 18px;
            border-radius: 18px;
            background: rgba(255, 250, 241, .94);
            color: var(--deep);
            box-shadow: 0 16px 44px rgba(0,0,0,.16);
            font-weight: 700;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn-sacred {
            border: 0;
            border-radius: 999px;
            padding: 14px 24px;
            background: var(--deep);
            color: #fff8ee;
            font-weight: 700;
            box-shadow: 0 16px 40px rgba(63, 52, 42, .22);
            transition: .25s ease;
        }

        .btn-sacred:hover {
            transform: translateY(-2px);
            color: #fff8ee;
            background: #2f261f;
        }

        .btn-outline-sacred {
            border: 1px solid rgba(255,255,255,.45);
            border-radius: 999px;
            padding: 14px 24px;
            background: rgba(255,255,255,.12);
            color: #fff8ee;
            font-weight: 700;
            backdrop-filter: blur(10px);
            transition: .25s ease;
        }

        .btn-outline-sacred:hover {
            background: rgba(255,255,255,.22);
            color: #fff8ee;
        }

        .preview-badge {
            position: fixed;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 20;
            background: #fff3cd;
            border: 1px solid #ffe69c;
            color: #8a6400;
            padding: 10px 16px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        .intro-card {
            border-radius: var(--radius-xl);
            background: rgba(255,255,255,.68);
            border: 1px solid rgba(185, 146, 93, .24);
            box-shadow: var(--shadow);
            padding: clamp(28px, 5vw, 54px);
            position: relative;
            overflow: hidden;
        }

        .intro-card::before {
            content: "❦";
            position: absolute;
            top: 8px;
            right: 26px;
            font-size: 92px;
            color: rgba(185, 146, 93, .13);
            font-family: Georgia, serif;
        }

        .message-quote {
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: clamp(24px, 3vw, 36px);
            line-height: 1.35;
            color: var(--deep);
            margin: 0;
        }

        .countdown-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
            margin-top: 34px;
        }

        .countdown-item {
            background: #fffdf8;
            border: 1px solid var(--line);
            border-radius: 22px;
            padding: 22px 12px;
            box-shadow: 0 14px 30px rgba(57, 43, 31, .06);
        }

        .countdown-value {
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: clamp(34px, 5vw, 54px);
            font-weight: 700;
            color: var(--gold);
            line-height: 1;
        }

        .countdown-label {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--deep-soft);
            margin-top: 8px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .detail-tile,
        .content-card {
            background: rgba(255,255,255,.72);
            border: 1px solid rgba(185, 146, 93, .25);
            border-radius: var(--radius-lg);
            box-shadow: 0 18px 50px rgba(57, 43, 31, .08);
        }

        .detail-tile {
            padding: 26px 22px;
            text-align: center;
            min-height: 178px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .detail-icon {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            margin: 0 auto 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            background: #fff8ec;
            border: 1px solid var(--line);
            font-size: 24px;
        }

        .detail-label {
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 6px;
        }

        .detail-value {
            font-size: 17px;
            font-weight: 800;
            color: var(--deep);
            line-height: 1.5;
        }

        .content-card {
            padding: 30px;
        }

        .map-frame {
            height: 360px;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid var(--line);
            background: #efe2d2;
        }

        .map-frame iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .gallery-masonry {
            columns: 3 260px;
            column-gap: 18px;
        }

        .gallery-item {
            break-inside: avoid;
            margin-bottom: 18px;
            border-radius: 28px;
            overflow: hidden;
            background: #fff;
            border: 1px solid rgba(185, 146, 93, .24);
            box-shadow: 0 18px 45px rgba(57, 43, 31, .09);
        }

        .gallery-item img {
            width: 100%;
            display: block;
            object-fit: cover;
        }

        .gallery-caption {
            padding: 14px 16px;
            font-size: 13px;
            color: var(--deep-soft);
            background: #fffdf8;
        }

        .gift-box {
            display: flex;
            gap: 18px;
            align-items: flex-start;
        }

        .gift-icon {
            min-width: 56px;
            width: 56px;
            height: 56px;
            border-radius: 18px;
            background: #fff8ec;
            border: 1px solid var(--line);
            color: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .form-control,
        .form-select {
            border-radius: 16px;
            border: 1px solid rgba(185, 146, 93, .32);
            padding: 13px 15px;
            background-color: rgba(255,255,255,.86);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 .2rem rgba(185, 146, 93, .16);
        }

        .btn-send {
            border: 0;
            border-radius: 999px;
            padding: 14px 26px;
            background: var(--gold);
            color: #fff;
            font-weight: 800;
            box-shadow: 0 14px 34px rgba(185, 146, 93, .22);
        }

        .wish-card {
            height: 100%;
            background: #fffdf8;
            border: 1px solid rgba(185, 146, 93, .24);
            border-radius: 24px;
            padding: 22px;
            box-shadow: 0 16px 38px rgba(57, 43, 31, .07);
        }

        .wish-name {
            font-weight: 800;
            color: var(--gold);
            margin-bottom: 8px;
        }

        .share-copy {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .share-copy input {
            flex: 1 1 260px;
        }

        .footer-prayer {
            border-radius: 34px;
            background: var(--deep);
            color: #fff8ee;
            padding: clamp(34px, 5vw, 58px);
            box-shadow: var(--shadow);
        }

        .footer-prayer h2 {
            font-family: "Cormorant Garamond", Georgia, serif;
            font-size: clamp(36px, 5vw, 58px);
            margin-bottom: 12px;
        }

        .music-player {
            position: fixed;
            right: 18px;
            bottom: 18px;
            z-index: 30;
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 250, 241, .9);
            border: 1px solid rgba(185, 146, 93, .35);
            border-radius: 999px;
            padding: 9px 11px;
            box-shadow: 0 18px 42px rgba(57, 43, 31, .18);
            backdrop-filter: blur(14px);
        }

        .music-btn {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            border: 0;
            background: var(--deep);
            color: #fff8ee;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .music-text {
            font-size: 12px;
            line-height: 1.2;
            color: var(--deep-soft);
            padding-right: 8px;
            min-width: 82px;
        }

        .music-text strong {
            display: block;
            color: var(--deep);
        }

        @media (max-width: 991px) {
            .hero-visual {
                min-height: 700px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .countdown-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .section {
                padding: 74px 0;
            }
        }

        @media (max-width: 575px) {
            .hero {
                padding: 22px 0 54px;
            }

            .hero-card {
                border-radius: 30px;
            }

            .hero-visual {
                min-height: 680px;
            }

            .hero-content {
                padding: 40px 18px;
            }

            .hero-date-pill {
                border-radius: 20px;
            }

            .content-card {
                padding: 22px;
            }

            .map-frame {
                height: 300px;
            }

            .music-player {
                right: 12px;
                bottom: 12px;
            }

            .music-text {
                display: none;
            }
        }
    </style>
</head>

<body>
<?php
$eventDateFormatted = !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : '';
$eventDateISO = !empty($project->event_date) ? date('Y-m-d', strtotime($project->event_date)) : '';
$eventTime = $project->event_time ?? '';
$musicUrl = !empty($project->music_url) ? $project->music_url : '';
$coverImageRaw = !empty($project->cover_image) ? $project->cover_image : (!empty($project->hero_image) ? $project->hero_image : '');
$coverImage = !empty($coverImageRaw) ? asset_or_url($coverImageRaw) : 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1600&auto=format&fit=crop';
$guestNameSafe = !empty($guest_name) ? $guest_name : '';
$mapUrl = '';
if (!empty($project->location_name) || !empty($project->location_address)) {
    $mapQuery = trim(($project->location_name ?? '') . ' ' . ($project->location_address ?? ''));
    $mapUrl = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($mapQuery);
}
$mapEmbed = !empty($project->map_embed) ? trim($project->map_embed) : '';
?>

<div class="sacred-shell">
    <div class="grain"></div>

    <?php if (!empty($is_preview)): ?>
        <div class="preview-badge">Preview Mode</div>
    <?php endif; ?>

    <section class="hero">
        <div class="container container-narrow">
            <div class="hero-card">
                <div class="hero-visual" style="background-image: url('<?= html_escape($coverImage); ?>');">
                    <div class="hero-content">
                        <div class="hero-cover">
                            <?= html_escape($project->cover_text ?? 'Kepada Yth. Bapak/Ibu/Saudara/i'); ?>
                            <?php if (!empty($guestNameSafe)): ?>
                                <br><strong><?= html_escape($guestNameSafe); ?></strong>
                            <?php endif; ?>
                        </div>

                        <div class="kicker text-white-50">Wedding Invitation</div>
                        <h1 class="hero-title"><?= html_escape($project->title ?? 'The Wedding'); ?></h1>

                        <?php if (!empty($project->subtitle)): ?>
                            <p class="hero-subtitle"><?= nl2br(html_escape($project->subtitle)); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($eventDateFormatted) || !empty($eventTime)): ?>
                            <div class="hero-date-pill">
                                <?php if (!empty($eventDateFormatted)): ?>
                                    <span><i class="bi bi-calendar-heart me-2"></i><?= html_escape($eventDateFormatted); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($eventTime)): ?>
                                    <span><i class="bi bi-clock me-2"></i><?= html_escape($eventTime); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="hero-actions">
                            <a href="#detail-acara" class="btn-sacred">Buka Undangan</a>
                            <?php if (!empty($project->rsvp_enabled)): ?>
                                <a href="#rsvp" class="btn-outline-sacred">Konfirmasi Kehadiran</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container container-narrow">
            <div class="intro-card text-center">
                <span class="kicker">With Grace & Blessing</span>
                <h2 class="section-title"><?= html_escape($project->message_title ?? 'Assalamu’alaikum Warahmatullahi Wabarakatuh'); ?></h2>
                <?php if (!empty($project->message_body)): ?>
                    <p class="message-quote">“<?= nl2br(html_escape($project->message_body)); ?>”</p>
                <?php else: ?>
                    <p class="section-subtitle">Dengan memohon rahmat dan ridho Tuhan Yang Maha Esa, kami bermaksud menyelenggarakan acara pernikahan kami.</p>
                <?php endif; ?>

                <?php if (!empty($eventDateISO)): ?>
                    <div class="countdown-grid" id="countdown" data-date="<?= html_escape($eventDateISO); ?>">
                        <div class="countdown-item">
                            <div class="countdown-value" id="cdDays">0</div>
                            <div class="countdown-label">Hari</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-value" id="cdHours">0</div>
                            <div class="countdown-label">Jam</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-value" id="cdMinutes">0</div>
                            <div class="countdown-label">Menit</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-value" id="cdSeconds">0</div>
                            <div class="countdown-label">Detik</div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="section" id="detail-acara">
        <div class="container container-narrow">
            <div class="text-center mb-5">
                <span class="kicker">Sacred Moment</span>
                <h2 class="section-title">Detail Acara</h2>
                <p class="section-subtitle">Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu.</p>
            </div>

            <div class="detail-grid mb-4">
                <div class="detail-tile">
                    <div class="detail-icon"><i class="bi bi-calendar-event"></i></div>
                    <div class="detail-label">Tanggal</div>
                    <div class="detail-value"><?= !empty($eventDateFormatted) ? html_escape($eventDateFormatted) : '-'; ?></div>
                </div>
                <div class="detail-tile">
                    <div class="detail-icon"><i class="bi bi-clock-history"></i></div>
                    <div class="detail-label">Waktu</div>
                    <div class="detail-value"><?= !empty($eventTime) ? html_escape($eventTime) : '-'; ?></div>
                </div>
                <div class="detail-tile">
                    <div class="detail-icon"><i class="bi bi-geo-alt"></i></div>
                    <div class="detail-label">Tempat</div>
                    <div class="detail-value"><?= !empty($project->location_name) ? html_escape($project->location_name) : '-'; ?></div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="content-card h-100">
                        <span class="kicker">Venue</span>
                        <h3 class="serif fs-1 fw-bold mb-3"><?= html_escape($project->location_name ?? 'Lokasi Acara'); ?></h3>
                        <?php if (!empty($project->location_address)): ?>
                            <p class="section-subtitle mx-0"><?= nl2br(html_escape($project->location_address)); ?></p>
                        <?php endif; ?>

                        <div class="share-copy mt-4">
                            <?php if (!empty($mapUrl)): ?>
                                <a class="btn-sacred" href="<?= html_escape($mapUrl); ?>" target="_blank">
                                    <i class="bi bi-map me-2"></i>Buka Google Maps
                                </a>
                            <?php endif; ?>
                            <button type="button" class="btn-send" onclick="copyInviteLink()">
                                <i class="bi bi-link-45deg me-2"></i>Salin Link
                            </button>
                        </div>

                        <input type="text" id="inviteLink" class="form-control mt-3" value="<?= html_escape(current_url()); ?>" readonly>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="content-card h-100">
                        <span class="kicker">Location Map</span>
                        <div class="map-frame">
                            <?php if (!empty($mapEmbed)): ?>
                                <?php if (stripos($mapEmbed, '<iframe') !== false): ?>
                                    <?= $mapEmbed; ?>
                                <?php else: ?>
                                    <iframe src="<?= html_escape($mapEmbed); ?>" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="d-flex align-items-center justify-content-center h-100 text-center p-4 text-muted">Map belum tersedia.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (!empty($project->gift_enabled)): ?>
                <div class="content-card mt-4">
                    <div class="gift-box">
                        <div class="gift-icon"><i class="bi bi-gift"></i></div>
                        <div>
                            <span class="kicker">Wedding Gift</span>
                            <h3 class="serif fs-2 fw-bold mb-2">Tanda Kasih</h3>
                            <p class="section-subtitle mx-0 mb-0"><?= !empty($project->gift_info) ? nl2br(html_escape($project->gift_info)) : 'Informasi gift belum tersedia.'; ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if (!empty($galleries)): ?>
        <section class="section" id="gallery">
            <div class="container container-narrow">
                <div class="text-center mb-5">
                    <span class="kicker">Our Gallery</span>
                    <h2 class="section-title">Momen Bahagia</h2>
                    <p class="section-subtitle">Rangkaian cerita sederhana yang menjadi bagian dari perjalanan menuju hari penuh doa dan restu.</p>
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

    <?php if (!empty($project->rsvp_enabled)): ?>
        <section class="section" id="rsvp">
            <div class="container container-narrow">
                <div class="text-center mb-5">
                    <span class="kicker">RSVP</span>
                    <h2 class="section-title">Konfirmasi Kehadiran</h2>
                    <p class="section-subtitle">Mohon bantu konfirmasi kehadiran Anda agar kami dapat mempersiapkan acara dengan lebih baik.</p>
                </div>

                <div class="content-card">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                    <?php endif; ?>

                    <form method="post" action="<?= site_url('rsvp/store'); ?>" class="row g-3">
                        <input type="hidden" name="project_id" value="<?= html_escape($project->id ?? ''); ?>">
                        <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">

                        <div class="col-md-4">
                            <label class="form-label">Nama</label>
                            <input name="guest_name" class="form-control" value="<?= html_escape($guestNameSafe); ?>" placeholder="Nama lengkap" required>
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
                            <button class="btn-send">Kirim RSVP</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($project->wish_enabled)): ?>
        <section class="section section-soft" id="wishes">
            <div class="container container-narrow">
                <div class="text-center mb-5">
                    <span class="kicker">Best Wishes</span>
                    <h2 class="section-title">Ucapan & Doa</h2>
                    <p class="section-subtitle">Tuliskan doa dan ucapan terbaik Anda untuk mengiringi langkah kami.</p>
                </div>

                <div class="content-card mb-4">
                    <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
                        <input type="hidden" name="project_id" value="<?= html_escape($project->id ?? ''); ?>">
                        <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">

                        <div class="col-md-4">
                            <label class="form-label">Nama</label>
                            <input name="guest_name" class="form-control" value="<?= html_escape($guestNameSafe); ?>" placeholder="Nama" required>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Ucapan</label>
                            <input name="message" class="form-control" placeholder="Tulis ucapan terbaik Anda" required>
                        </div>
                        <div class="col-12 pt-2">
                            <button class="btn-send">Kirim Ucapan</button>
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

    <section class="section section-soft">
        <div class="container container-narrow">
            <div class="footer-prayer text-center">
                <h2>Terima Kasih</h2>
                <p class="mb-0">Atas kehadiran, doa, dan restu Bapak/Ibu/Saudara/i, kami mengucapkan terima kasih yang sebesar-besarnya.</p>
            </div>
        </div>
    </section>

    <?php if (!empty($musicUrl)): ?>
        <audio id="bgMusic" loop playsinline>
            <source src="<?= html_escape($musicUrl); ?>">
        </audio>

        <div class="music-player">
            <button type="button" class="music-btn" id="musicToggle" aria-label="Toggle music">
                <i class="bi bi-play-fill" id="musicIcon"></i>
            </button>
            <div class="music-text">
                <strong id="musicStatus">Music Off</strong>
                tap to play
            </div>
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
        const icon = document.getElementById('musicIcon');
        const status = document.getElementById('musicStatus');

        if (!audio || !btn) return;

        function setState(isPlaying) {
            if (icon) icon.className = isPlaying ? 'bi bi-pause-fill' : 'bi bi-play-fill';
            if (status) status.textContent = isPlaying ? 'Music On' : 'Music Off';
        }

        function playMusic() {
            audio.play().then(function() {
                setState(true);
            }).catch(function() {
                setState(false);
            });
        }

        btn.addEventListener('click', function() {
            if (audio.paused) {
                playMusic();
            } else {
                audio.pause();
                setState(false);
            }
        });

        document.addEventListener('click', function initAudio() {
            if (audio.paused) playMusic();
            document.removeEventListener('click', initAudio);
        }, { once: true });

        window.addEventListener('load', function() {
            playMusic();
        });
    })();
</script>
</body>
</html>
