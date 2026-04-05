<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#5db7a0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bg: #f4fff9;
            --bg-soft: #ecfbf5;
            --mint: #5db7a0;
            --mint-dark: #3b8f7a;
            --teal: #6dcfbe;
            --gold: #f2c66d;
            --peach: #ffd8bf;
            --card: rgba(255,255,255,.92);
            --text: #35534b;
            --muted: #68857e;
            --line: #d8efe7;
            --shadow: 0 20px 50px rgba(71, 133, 116, .14);
            --radius-xl: 34px;
            --radius-lg: 26px;
            --radius-md: 18px;
        }

        html { scroll-behavior: smooth; }

        body {
            background:
                radial-gradient(circle at top left, rgba(255,255,255,.95), transparent 35%),
                linear-gradient(180deg, #f8fffc 0%, #eefcf6 48%, #f8fff8 100%);
            color: var(--text);
            font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
        }

        .section { padding: 90px 0; position: relative; }
        .section-sm { padding: 68px 0; }

        .kicker {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(93,183,160,.12);
            border: 1px solid rgba(93,183,160,.22);
            color: var(--mint-dark);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .section-title {
            font-size: clamp(30px, 4vw, 48px);
            line-height: 1.08;
            font-weight: 900;
            color: #29584c;
            margin: 14px 0 10px;
        }

        .section-subtitle {
            max-width: 760px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 16px;
        }

        .hero-khitan {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 60px 0;
        }

        .hero-khitan::before,
        .hero-khitan::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(6px);
        }

        .hero-khitan::before {
            width: 360px;
            height: 360px;
            background: rgba(109,207,190,.18);
            top: -110px;
            left: -90px;
        }

        .hero-khitan::after {
            width: 340px;
            height: 340px;
            background: rgba(242,198,109,.18);
            right: -80px;
            bottom: -90px;
        }

        .floating-icon {
            position: absolute;
            z-index: 1;
            font-size: clamp(20px, 3vw, 34px);
            opacity: .75;
            animation: floaty 5s ease-in-out infinite;
            pointer-events: none;
        }

        .icon-1 { top: 12%; left: 8%; }
        .icon-2 { top: 18%; right: 10%; animation-delay: .8s; }
        .icon-3 { bottom: 18%; left: 9%; animation-delay: 1.2s; }
        .icon-4 { bottom: 13%; right: 12%; animation-delay: .4s; }
        .icon-5 { top: 44%; right: 5%; animation-delay: 1.7s; }

        @keyframes floaty {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(5deg); }
        }

        .hero-card {
            position: relative;
            z-index: 2;
            background: var(--card);
            border: 1px solid rgba(255,255,255,.95);
            border-radius: 38px;
            padding: 28px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(12px);
        }

        .hero-photo-wrap {
            position: relative;
            margin-bottom: 24px;
        }

        .hero-photo {
            width: min(100%, 420px);
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 34px;
            display: block;
            margin: 0 auto;
            border: 8px solid rgba(255,255,255,.8);
            box-shadow: 0 18px 40px rgba(55, 111, 95, .16);
        }

        .badge-float {
            position: absolute;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            border-radius: 999px;
            padding: 10px 14px;
            box-shadow: 0 10px 24px rgba(71,133,116,.14);
            font-size: 13px;
            font-weight: 700;
            color: #4f6f67;
        }

        .badge-top { top: 14px; left: 50%; transform: translateX(-50%); }
        .badge-left { left: -8px; bottom: 17%; }
        .badge-right { right: -8px; bottom: 11%; }

        .hero-cover {
            font-size: 13px;
            color: var(--mint-dark);
            font-weight: 800;
            letter-spacing: .1em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .hero-title {
            font-size: clamp(24px, 3.5vw, 38px);
            line-height: 1.12;
            font-weight: 800;
            color: #40695f;
            margin-bottom: 8px;
        }

        .hero-name {
            font-size: clamp(38px, 6vw, 74px);
            line-height: 1.02;
            font-weight: 900;
            color: #28574b;
            margin-bottom: 10px;
        }

        .hero-subtitle {
            font-size: clamp(16px, 2vw, 21px);
            color: var(--muted);
            margin-bottom: 18px;
        }

        .pill-date {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
            background: linear-gradient(135deg, rgba(93,183,160,.12), rgba(242,198,109,.16));
            border: 1px solid rgba(93,183,160,.18);
            border-radius: 999px;
            padding: 12px 18px;
            font-weight: 700;
            color: #47675f;
        }

        .message-box {
            margin-top: 18px;
            background: linear-gradient(135deg, rgba(255,255,255,.96), rgba(244,255,249,.96));
            border: 1px solid #dff1ea;
            border-radius: 24px;
            padding: 18px;
            color: #5d766f;
            box-shadow: 0 10px 24px rgba(71,133,116,.08);
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            margin-top: 22px;
        }

        .btn-main,
        .btn-soft,
        .btn-copy,
        .btn-send,
        .btn-map {
            border-radius: 999px;
            padding: 12px 22px;
            font-weight: 700;
        }

        .btn-main {
            background: var(--mint);
            border: none;
            color: #fff;
            box-shadow: 0 12px 24px rgba(93,183,160,.24);
        }

        .btn-main:hover { background: var(--mint-dark); color: #fff; }

        .btn-soft {
            background: #fff;
            color: var(--mint-dark);
            border: 1px solid #d6efe7;
        }

        .btn-soft:hover { background: #f6fffb; color: var(--mint-dark); }

        .card-soft {
            border: 1px solid var(--line);
            border-radius: var(--radius-xl);
            background: rgba(255,255,255,.96);
            box-shadow: var(--shadow);
            overflow: hidden;
            height: 100%;
        }

        .card-soft .card-body { padding: 30px; }

        .tile {
            background: linear-gradient(180deg, #fff 0%, #f7fefb 100%);
            border: 1px solid var(--line);
            border-radius: 24px;
            padding: 22px;
            box-shadow: 0 10px 24px rgba(71,133,116,.06);
            height: 100%;
        }

        .tile-icon {
            width: 54px;
            height: 54px;
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(93,183,160,.14), rgba(242,198,109,.22));
            color: var(--mint-dark);
            font-size: 24px;
            margin-bottom: 14px;
        }

        .mini-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .14em;
            color: var(--muted);
            font-weight: 800;
            margin-bottom: 8px;
        }

        .big-value {
            font-size: 24px;
            line-height: 1.24;
            font-weight: 800;
            color: #2e5d51;
        }

        .countdown-wrap {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-top: 28px;
        }

        .countdown-item {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 24px;
            text-align: center;
            padding: 18px 12px;
            box-shadow: 0 10px 24px rgba(71,133,116,.06);
        }

        .countdown-value {
            font-size: 30px;
            font-weight: 900;
            color: var(--mint-dark);
            line-height: 1;
        }

        .countdown-label {
            font-size: 12px;
            color: var(--muted);
            margin-top: 8px;
            text-transform: uppercase;
            letter-spacing: .12em;
            font-weight: 700;
        }

        .dua-box {
            background: linear-gradient(135deg, #fff, #f7fefb);
            border: 1px solid var(--line);
            border-radius: 30px;
            padding: 32px;
            box-shadow: var(--shadow);
        }

        .dua-mark {
            font-size: 44px;
            color: var(--gold);
            line-height: 1;
        }

        .family-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(93,183,160,.10);
            border: 1px solid rgba(93,183,160,.18);
            color: #43685f;
            border-radius: 999px;
            padding: 10px 14px;
            font-size: 13px;
            font-weight: 700;
        }

        .gallery-card {
            border-radius: 26px;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--line);
            box-shadow: var(--shadow);
            height: 100%;
        }

        .gallery-card img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            display: block;
        }

        .gallery-card .caption {
            padding: 14px 18px 18px;
            color: var(--muted);
            font-size: 14px;
        }

        .share-box {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 24px;
            padding: 18px;
        }

        .form-control,
        .form-select {
            min-height: 50px;
            border-radius: 14px;
            border: 1px solid #dcefe8;
            padding-left: 14px;
            padding-right: 14px;
        }

        textarea.form-control {
            min-height: 120px;
            padding-top: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #7dc9b5;
            box-shadow: 0 0 0 .25rem rgba(93,183,160,.12);
        }

        .wish-card {
            border: 1px solid var(--line);
            border-radius: 24px;
            background: #fff;
            padding: 20px;
            height: 100%;
            box-shadow: 0 10px 24px rgba(71,133,116,.05);
        }

        .wish-name {
            font-weight: 800;
            color: #2f5e52;
        }

        .music-player {
            position: fixed;
            right: 18px;
            bottom: 18px;
            z-index: 99;
        }

        .music-btn {
            width: 58px;
            height: 58px;
            border: none;
            border-radius: 50%;
            background: var(--mint);
            color: #fff;
            box-shadow: 0 12px 24px rgba(93,183,160,.28);
            font-size: 20px;
        }

        .music-btn:hover { background: var(--mint-dark); }

        .footer-soft {
            color: var(--muted);
            font-size: 14px;
        }

        .preview-alert { position: relative; z-index: 3; }

        @media (max-width: 991.98px) {
            .hero-khitan { min-height: auto; }
            .countdown-wrap { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .gallery-card img { height: 260px; }
        }

        @media (max-width: 575.98px) {
            .section { padding: 72px 0; }
            .hero-card { padding: 22px 18px; border-radius: 28px; }
            .badge-left, .badge-right { position: static; display: inline-flex; margin-top: 12px; }
            .hero-photo-wrap { text-align: center; }
            .countdown-wrap { gap: 12px; }
            .countdown-item { padding: 16px 8px; }
            .countdown-value { font-size: 26px; }
            .gallery-card img { height: 220px; }
        }
    </style>
</head>
<body>

<?php
$eventDateFormatted = !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : '';
$eventDateISO = !empty($project->event_date) ? date('Y-m-d', strtotime($project->event_date)) : '';
$musicUrl = !empty($project->music_url) ? $project->music_url : '';
$mapUrl = '';
if (!empty($project->location_name) || !empty($project->location_address)) {
    $mapQuery = trim(($project->location_name ?? '') . ' ' . ($project->location_address ?? ''));
    $mapUrl = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($mapQuery);
}
$childName = !empty($project->receiver_name) ? $project->receiver_name : $project->title;
?>

<section class="hero-khitan text-center">
    <div class="floating-icon icon-1">🌙</div>
    <div class="floating-icon icon-2">✨</div>
    <div class="floating-icon icon-3">🕌</div>
    <div class="floating-icon icon-4">🎉</div>
    <div class="floating-icon icon-5">🤍</div>

    <div class="container position-relative">
        <?php if ($is_preview): ?>
            <div class="alert alert-warning preview-alert">Preview mode</div>
        <?php endif; ?>

        <div class="row justify-content-center align-items-center g-4">
            <div class="col-lg-6">
                <div class="hero-card text-center text-lg-start">
                    <div class="hero-cover">
                        <?= html_escape($project->cover_text ?: 'Undangan Tasyakuran Khitan'); ?>
                        <?php if (!empty($guest_name)): ?>
                            <br><span class="fw-bold"><?= html_escape($guest_name); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="kicker">Tasyakuran Khitan</div>
                    <h1 class="hero-title mt-3">Kami Mengundang Anda Untuk Hadir di Acara Khitanan</h1>
                    <div class="hero-name"><?= html_escape($childName); ?></div>
                    <p class="hero-subtitle"><?= html_escape($project->subtitle ?: 'Menjadi momen penuh syukur, doa baik, dan kebahagiaan bersama keluarga tercinta.'); ?></p>

                    <?php if (!empty($project->event_date)): ?>
                        <div class="pill-date">
                            <span><i class="bi bi-calendar-event me-1"></i><?= $eventDateFormatted; ?></span>
                            <?php if (!empty($project->event_time)): ?>
                                <span>•</span>
                                <span><i class="bi bi-clock me-1"></i><?= html_escape($project->event_time); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($project->message_body)): ?>
                        <div class="message-box">
                            <?= nl2br(html_escape($project->message_body)); ?>
                        </div>
                    <?php endif; ?>

                    <div class="hero-actions">
                        <a href="#detail-acara" class="btn btn-main">Lihat Detail Acara</a>
                        <?php if ($project->rsvp_enabled): ?>
                            <a href="#rsvp" class="btn btn-soft">Konfirmasi Kehadiran</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="hero-card text-center">
                    <div class="hero-photo-wrap">
                        <img src="<?= asset_or_url($project->hero_image); ?>" alt="<?= html_escape($childName); ?>" class="hero-photo">
                        <div class="badge-float badge-top"><i class="bi bi-stars"></i> Hari Bahagia</div>
                        <div class="badge-float badge-left"><i class="bi bi-heart"></i> Penuh Doa</div>
                        <div class="badge-float badge-right"><i class="bi bi-balloon-heart"></i> Ceria</div>
                    </div>
                    <div class="family-chip"><i class="bi bi-people-fill"></i> Bersama keluarga besar tercinta</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-sm text-center">
    <div class="container">
        <span class="kicker">Menuju Hari Acara</span>
        <h2 class="section-title">Hitung Mundur Acara</h2>
        <p class="section-subtitle">Semoga langkah kecil ini menjadi awal perjalanan yang penuh keberkahan, kebaikan, dan kebahagiaan.</p>

        <?php if (!empty($project->event_date)): ?>
            <div class="countdown-wrap" id="countdown" data-date="<?= $eventDateISO; ?>">
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
</section>

<section class="section" id="detail-acara">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker">Informasi Acara</span>
            <h2 class="section-title">Detail Tasyakuran</h2>
            <p class="section-subtitle">Dengan penuh rasa syukur, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan memberikan doa terbaik.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="tile">
                    <div class="tile-icon"><i class="bi bi-calendar2-heart"></i></div>
                    <div class="mini-label">Tanggal</div>
                    <div class="big-value"><?= !empty($project->event_date) ? $eventDateFormatted : '-'; ?></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="tile">
                    <div class="tile-icon"><i class="bi bi-clock-history"></i></div>
                    <div class="mini-label">Waktu</div>
                    <div class="big-value"><?= !empty($project->event_time) ? html_escape($project->event_time) : '-'; ?></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="tile">
                    <div class="tile-icon"><i class="bi bi-geo-alt"></i></div>
                    <div class="mini-label">Lokasi</div>
                    <div class="big-value"><?= !empty($project->location_name) ? html_escape($project->location_name) : '-'; ?></div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1">
            <div class="col-lg-7">
                <div class="card-soft">
                    <div class="card-body">
                        <span class="kicker">Lokasi Acara</span>
                        <h3 class="mt-3 mb-3" style="color:#2f5d52; font-weight:800;">Tempat Tasyakuran</h3>
                        <p class="mb-2 fs-5 fw-semibold"><?= html_escape($project->location_name ?: '-'); ?></p>
                        <p class="text-muted mb-4"><?= !empty($project->location_address) ? nl2br(html_escape($project->location_address)) : '-'; ?></p>

                        <div class="d-flex flex-wrap gap-2">
                            <?php if (!empty($mapUrl)): ?>
                                <a href="<?= $mapUrl; ?>" target="_blank" class="btn btn-main btn-map"><i class="bi bi-map me-1"></i>Buka Maps</a>
                            <?php endif; ?>
                            <a href="#share-link" class="btn btn-soft btn-map">Bagikan Undangan</a>
                        </div>

                        <?php if (!empty($project->map_embed)): ?>
                            <div class="mt-4 ratio ratio-16x9 rounded-4 overflow-hidden border">
                                <?php
                                $mapEmbed = trim($project->map_embed);
                                if (stripos($mapEmbed, '<iframe') !== false) {
                                    echo $mapEmbed;
                                } else {
                                    echo '<iframe src="' . html_escape($mapEmbed) . '" style="border:0;width:100%;height:100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="dua-box h-100 d-flex flex-column justify-content-center">
                    <div class="dua-mark">﴾</div>
                    <div class="fs-5 mb-3" style="line-height:1.85; color:#55706a;">
                        <?= !empty($project->description)
                            ? nl2br(html_escape($project->description))
                            : 'Mohon doa restu agar ananda tumbuh menjadi anak yang sholeh, sehat, berbakti kepada orang tua, dan bermanfaat bagi sesama.'; ?>
                    </div>
                    <div class="family-chip mt-2"><i class="bi bi-heart-fill"></i> Kehadiran dan doa Anda adalah kebahagiaan bagi kami</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-sm">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-6">
                <div class="card-soft">
                    <div class="card-body text-center text-lg-start">
                        <span class="kicker">Keluarga</span>
                        <h3 class="mt-3 mb-3" style="color:#2f5d52; font-weight:800;">Turut Mengundang</h3>
                        <p class="text-muted mb-4">Kami sekeluarga mengucapkan terima kasih atas doa dan kehadiran Bapak/Ibu/Saudara/i.</p>
                        <div class="d-flex flex-column gap-2">
                            <?php if (!empty($project->sender_name)): ?>
                                <div class="family-chip"><i class="bi bi-person-heart"></i> <?= html_escape($project->sender_name); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($project->receiver_name)): ?>
                                <div class="family-chip"><i class="bi bi-star-fill"></i> Ananda: <?= html_escape($project->receiver_name); ?></div>
                            <?php endif; ?>
                            <?php if (empty($project->sender_name) && empty($project->receiver_name)): ?>
                                <div class="family-chip"><i class="bi bi-people-fill"></i> Keluarga Besar</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($project->gift_enabled): ?>
                <div class="col-lg-6" id="share-link">
                    <div class="card-soft">
                        <div class="card-body">
                            <span class="kicker">Tanda Kasih</span>
                            <h3 class="mt-3 mb-3" style="color:#2f5d52; font-weight:800;">Gift Info</h3>
                            <div class="share-box">
                                <?= nl2br(html_escape($project->gift_info)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-lg-6" id="share-link">
                    <div class="card-soft">
                        <div class="card-body">
                            <span class="kicker">Bagikan</span>
                            <h3 class="mt-3 mb-3" style="color:#2f5d52; font-weight:800;">Share Undangan</h3>
                            <p class="text-muted">Link undangan ini siap dibagikan ke keluarga dan kerabat.</p>
                            <div class="share-box">
                                <label class="form-label fw-semibold">Link Undangan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="inviteLink" value="<?= current_url(); ?>" readonly>
                                    <button class="btn btn-outline-secondary btn-copy" type="button" onclick="copyInviteLink()">Copy</button>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <a class="btn btn-main" target="_blank" href="https://wa.me/?text=<?= rawurlencode('Undangan acara khitan: ' . current_url()); ?>">
                                    <i class="bi bi-whatsapp me-1"></i>Share WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (!empty($galleries)): ?>
<section class="section" id="gallery">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker">Galeri</span>
            <h2 class="section-title">Momen Ceria</h2>
            <p class="section-subtitle">Potret manis yang melengkapi momen spesial ananda.</p>
        </div>

        <div class="row g-4">
            <?php foreach ($galleries as $g): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card">
                        <img src="<?= asset_or_url($g->image_path); ?>" alt="<?= html_escape($g->caption ?: 'Gallery'); ?>">
                        <?php if (!empty($g->caption)): ?>
                            <div class="caption"><?= html_escape($g->caption); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($project->rsvp_enabled): ?>
<section class="section" id="rsvp">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker">Konfirmasi</span>
            <h2 class="section-title">Konfirmasi Kehadiran</h2>
            <p class="section-subtitle">Mohon bantu isi konfirmasi kehadiran agar persiapan acara kami semakin nyaman.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="card-soft">
                    <div class="card-body">
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                        <?php endif; ?>

                        <form method="post" action="<?= site_url('rsvp/store'); ?>" class="row g-3">
                            <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                            <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">

                            <div class="col-md-4">
                                <label class="form-label">Nama</label>
                                <input name="guest_name" class="form-control" value="<?= html_escape($guest_name); ?>" placeholder="Nama lengkap" required>
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
                                <button class="btn btn-main btn-send">Kirim RSVP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($project->wish_enabled): ?>
<section class="section section-sm" id="wishes">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker">Ucapan</span>
            <h2 class="section-title">Doa & Ucapan Baik</h2>
            <p class="section-subtitle">Tinggalkan doa dan ucapan terbaik untuk ananda dan keluarga.</p>
        </div>

        <div class="card-soft mb-4">
            <div class="card-body">
                <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
                    <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                    <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">

                    <div class="col-md-4">
                        <label class="form-label">Nama</label>
                        <input name="guest_name" class="form-control" value="<?= html_escape($guest_name); ?>" placeholder="Nama" required>
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Ucapan</label>
                        <input name="message" class="form-control" placeholder="Tulis doa dan ucapan terbaik" required>
                    </div>

                    <div class="col-12 pt-2">
                        <button class="btn btn-main btn-send">Kirim Ucapan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($wishes as $wish): ?>
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

<section class="section-sm">
    <div class="container text-center">
        <div class="footer-soft">Terima kasih atas perhatian, doa, dan kehadiran Anda di momen spesial kami.</div>
    </div>
</section>

<?php if (!empty($musicUrl)): ?>
    <audio id="bgMusic" loop playsinline preload="auto">
        <source src="<?= html_escape($musicUrl); ?>">
        Browser Anda tidak mendukung audio.
    </audio>

    <div class="music-player">
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

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            daysEl.textContent = days;
            hoursEl.textContent = hours;
            minutesEl.textContent = minutes;
            secondsEl.textContent = seconds;
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    })();

    (function() {
        const audio = document.getElementById('bgMusic');
        const btn = document.getElementById('musicToggle');
        if (!audio || !btn) return;

        let started = false;

        async function playMusic() {
            try {
                await audio.play();
                started = true;
                btn.innerHTML = '<i class="bi bi-pause-fill"></i>';
            } catch (e) {}
        }

        function pauseMusic() {
            audio.pause();
            btn.innerHTML = '<i class="bi bi-music-note-beamed"></i>';
        }

        btn.addEventListener('click', function() {
            if (audio.paused) {
                playMusic();
            } else {
                pauseMusic();
            }
        });

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
