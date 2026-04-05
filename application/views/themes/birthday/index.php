<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ff8fb1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bg-1: #fff9d8;
            --bg-2: #ffe8f1;
            --bg-3: #dff4ff;
            --card: rgba(255, 255, 255, .92);
            --white: #ffffff;
            --pink: #ff7fa5;
            --pink-dark: #e05a86;
            --yellow: #ffd966;
            --sky: #77c9ff;
            --purple: #8f7cf7;
            --text: #5a4c59;
            --muted: #8f7d8c;
            --line: #ffe0eb;
            --shadow: 0 20px 50px rgba(255, 127, 165, .16);
            --radius-xl: 34px;
            --radius-lg: 26px;
            --radius-md: 20px;
        }

        html { scroll-behavior: smooth; }

        body {
            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, .95), transparent 35%),
                linear-gradient(135deg, var(--bg-1) 0%, var(--bg-2) 52%, var(--bg-3) 100%);
            color: var(--text);
            font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
        }

        .section { padding: 86px 0; position: relative; }
        .section-sm { padding: 68px 0; }

        .kicker {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 999px;
            background: rgba(255,255,255,.7);
            border: 1px solid rgba(255,255,255,.95);
            color: var(--pink-dark);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .16em;
            text-transform: uppercase;
            box-shadow: 0 8px 20px rgba(255,127,165,.10);
        }

        .section-title {
            font-size: clamp(30px, 4vw, 48px);
            line-height: 1.08;
            font-weight: 900;
            color: #5a3d66;
            margin: 14px 0 10px;
        }

        .section-subtitle {
            max-width: 760px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 16px;
        }

        .hero-birthday {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 60px 0;
        }

        .hero-birthday::before,
        .hero-birthday::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            filter: blur(6px);
            pointer-events: none;
        }

        .hero-birthday::before {
            width: 320px;
            height: 320px;
            background: rgba(255, 217, 102, .32);
            top: -80px;
            left: -90px;
        }

        .hero-birthday::after {
            width: 360px;
            height: 360px;
            background: rgba(119, 201, 255, .22);
            bottom: -100px;
            right: -90px;
        }

        .floating-shape {
            position: absolute;
            font-size: clamp(24px, 3vw, 42px);
            opacity: .85;
            animation: floaty 4.8s ease-in-out infinite;
            pointer-events: none;
            z-index: 1;
        }

        .shape-1 { top: 10%; left: 8%; }
        .shape-2 { top: 14%; right: 10%; animation-delay: .9s; }
        .shape-3 { bottom: 18%; left: 9%; animation-delay: 1.3s; }
        .shape-4 { bottom: 14%; right: 12%; animation-delay: .5s; }
        .shape-5 { top: 42%; right: 6%; animation-delay: 1.7s; }

        @keyframes floaty {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(4deg); }
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
            margin-bottom: 22px;
        }

        .hero-photo {
            width: min(100%, 430px);
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 34px;
            display: block;
            margin: 0 auto;
            box-shadow: 0 18px 40px rgba(145, 89, 117, .16);
            border: 8px solid rgba(255,255,255,.75);
        }

        .sticker {
            position: absolute;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            border-radius: 999px;
            padding: 10px 14px;
            box-shadow: 0 10px 24px rgba(255,127,165,.18);
            font-size: 13px;
            font-weight: 700;
            color: #6b5775;
        }

        .sticker-top { top: 14px; left: 50%; transform: translateX(-50%); }
        .sticker-left { left: -8px; bottom: 16%; }
        .sticker-right { right: -8px; bottom: 10%; }

        .cover-mini {
            font-size: 13px;
            color: var(--pink-dark);
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .birthday-title {
            font-size: clamp(38px, 6.4vw, 78px);
            line-height: 1.02;
            font-weight: 900;
            color: #5b3d67;
            margin-bottom: 10px;
        }

        .birthday-name {
            font-size: clamp(28px, 4vw, 44px);
            font-weight: 800;
            color: var(--pink-dark);
            margin-bottom: 8px;
        }

        .hero-subtitle {
            font-size: clamp(16px, 2vw, 21px);
            color: var(--muted);
            margin-bottom: 18px;
        }

        .bubble-note {
            background: linear-gradient(135deg, rgba(255,255,255,.96), rgba(255,244,249,.96));
            border: 1px solid #ffe3ed;
            border-radius: 24px;
            padding: 18px 18px;
            color: #6c5b6b;
            box-shadow: 0 10px 24px rgba(255,127,165,.08);
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            margin-top: 22px;
        }

        .btn-main, .btn-soft, .btn-send, .btn-copy {
            border-radius: 999px;
            font-weight: 700;
            padding: 12px 22px;
            border: none;
        }

        .btn-main {
            background: linear-gradient(135deg, var(--pink), #ff9db9);
            color: #fff;
            box-shadow: 0 14px 26px rgba(255,127,165,.22);
        }

        .btn-main:hover { background: linear-gradient(135deg, var(--pink-dark), #f17ca1); color: #fff; }

        .btn-soft {
            background: #fff;
            color: #745b7a;
            border: 1px solid #ffd6e4;
            box-shadow: 0 10px 22px rgba(255,127,165,.08);
        }

        .btn-soft:hover { background: #fff3f8; color: #745b7a; }

        .card-cute {
            background: rgba(255,255,255,.92);
            border: 1px solid rgba(255,255,255,.96);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            overflow: hidden;
            height: 100%;
        }

        .card-cute .card-body { padding: 28px; }

        .fact-box {
            background: linear-gradient(135deg, rgba(255,255,255,.96), rgba(255,250,252,.96));
            border: 1px solid #ffe2eb;
            border-radius: 24px;
            padding: 22px;
            box-shadow: 0 10px 24px rgba(255,127,165,.08);
            height: 100%;
            text-align: center;
        }

        .fact-icon {
            width: 60px;
            height: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: linear-gradient(135deg, #fff5ba, #ffd7e7);
            color: #704d6a;
            font-size: 26px;
            margin-bottom: 14px;
        }

        .mini-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .14em;
            font-weight: 800;
            color: var(--muted);
            margin-bottom: 8px;
        }

        .big-value {
            font-size: 24px;
            line-height: 1.25;
            font-weight: 800;
            color: #5c4567;
        }

        .countdown-wrap {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
            margin-top: 26px;
        }

        .countdown-item {
            background: rgba(255,255,255,.93);
            border: 1px solid #ffe0ea;
            border-radius: 22px;
            text-align: center;
            padding: 18px 10px;
            box-shadow: 0 8px 20px rgba(255,127,165,.07);
        }

        .countdown-value {
            font-size: 30px;
            line-height: 1;
            font-weight: 900;
            color: var(--pink-dark);
        }

        .countdown-label {
            font-size: 12px;
            font-weight: 700;
            color: var(--muted);
            margin-top: 8px;
            text-transform: uppercase;
            letter-spacing: .10em;
        }

        .gallery-card {
            background: rgba(255,255,255,.95);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--shadow);
            height: 100%;
            border: 1px solid rgba(255,255,255,.96);
            transform: rotate(-1deg);
        }

        .gallery-card.alt { transform: rotate(1deg); }

        .gallery-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            display: block;
        }

        .gallery-caption {
            padding: 16px 18px 20px;
            color: #745f73;
            font-weight: 600;
        }

        .letter-box {
            background: linear-gradient(135deg, #fffefb, #fff4f8);
            border-radius: 30px;
            border: 1px solid #ffe2ec;
            padding: 30px;
            box-shadow: var(--shadow);
        }

        .letter-box .lead { color: #654f68; line-height: 1.9; }

        .form-control, .form-select {
            min-height: 52px;
            border-radius: 16px;
            border: 1px solid #ffd8e5;
            padding-left: 14px;
            padding-right: 14px;
            background: rgba(255,255,255,.96);
        }

        textarea.form-control {
            min-height: 120px;
            padding-top: 14px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #ff9fbd;
            box-shadow: 0 0 0 .22rem rgba(255,127,165,.14);
        }

        .wish-card {
            background: rgba(255,255,255,.95);
            border: 1px solid #ffe1eb;
            border-radius: 24px;
            padding: 20px;
            box-shadow: 0 10px 24px rgba(255,127,165,.08);
            height: 100%;
        }

        .wish-name {
            font-weight: 800;
            color: #6a4f74;
            margin-bottom: 4px;
        }

        .share-box {
            background: rgba(255,255,255,.92);
            border: 1px solid #ffe2eb;
            border-radius: 24px;
            padding: 20px;
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
            background: linear-gradient(135deg, var(--pink), #ffb3c9);
            color: #fff;
            box-shadow: 0 14px 28px rgba(255,127,165,.25);
            font-size: 22px;
        }

        .music-btn:hover { background: linear-gradient(135deg, var(--pink-dark), #ef8dae); }

        .footer-soft {
            color: #7e6a7c;
            font-size: 14px;
        }

        .preview-alert {
            position: relative;
            z-index: 3;
            border-radius: 16px;
        }

        @media (max-width: 991.98px) {
            .hero-birthday { min-height: auto; padding: 100px 0 74px; }
            .countdown-wrap { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .sticker-left, .sticker-right { position: static; transform: none; margin: 10px auto 0; justify-content: center; }
            .gallery-card img { height: 260px; }
        }

        @media (max-width: 575.98px) {
            .section { padding: 72px 0; }
            .hero-card { padding: 20px; border-radius: 28px; }
            .hero-photo { border-radius: 26px; }
            .birthday-title { font-size: 40px; }
            .birthday-name { font-size: 28px; }
            .countdown-item { padding: 16px 8px; }
            .countdown-value { font-size: 26px; }
            .gallery-card img { height: 220px; }
            .letter-box, .card-cute .card-body { padding: 22px; }
        }
    </style>
</head>
<body>
<?php
    $eventDateFormatted = !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : '';
    $eventDateISO = !empty($project->event_date) ? date('Y-m-d', strtotime($project->event_date)) : '';
    $musicUrl = !empty($project->music_url) ? $project->music_url : '';
    $displayName = !empty($project->receiver_name) ? $project->receiver_name : $project->title;
    $senderName = !empty($project->sender_name) ? $project->sender_name : 'Seseorang yang sayang kamu';
    $heroImage = !empty($project->hero_image) ? asset_or_url($project->hero_image) : 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=1200&q=80';
?>

<section class="hero-birthday text-center">
    <div class="floating-shape shape-1">🎈</div>
    <div class="floating-shape shape-2">✨</div>
    <div class="floating-shape shape-3">🎂</div>
    <div class="floating-shape shape-4">💛</div>
    <div class="floating-shape shape-5">🧁</div>

    <div class="container position-relative">
        <?php if ($is_preview): ?>
            <div class="alert alert-warning preview-alert">Preview mode</div>
        <?php endif; ?>

        <div class="row justify-content-center align-items-center g-4">
            <div class="col-xl-5 col-lg-6">
                <div class="hero-card">
                    <div class="hero-photo-wrap">
                        <img src="<?= $heroImage; ?>" alt="<?= html_escape($displayName); ?>" class="hero-photo">
                        <div class="sticker sticker-top">🎉 Birthday Vibes Only</div>
                        <div class="sticker sticker-left">💌 For <?= html_escape($displayName); ?></div>
                        <div class="sticker sticker-right">🌈 Make a wish</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="hero-card text-center text-lg-start">
                    <div class="cover-mini">
                        <?= !empty($project->cover_text) ? html_escape($project->cover_text) : 'A cute birthday page'; ?>
                    </div>
                    <span class="kicker">Cute Birthday Card</span>
                    <h1 class="birthday-title">Happy Birthday</h1>
                    <div class="birthday-name"><?= html_escape($displayName); ?> 🥳</div>
                    <p class="hero-subtitle">
                        <?= !empty($project->subtitle) ? html_escape($project->subtitle) : 'Hari spesial buat orang spesial yang bikin dunia jadi lebih cerah.'; ?>
                    </p>

                    <?php if (!empty($project->message_body)): ?>
                        <div class="bubble-note mt-3">
                            <?= nl2br(html_escape($project->message_body)); ?>
                        </div>
                    <?php endif; ?>

                    <div class="hero-actions">
                        <a href="#birthday-detail" class="btn btn-main">Lihat Ucapan</a>
                        <a href="#wishes" class="btn btn-soft">Tulis Wish</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-sm text-center">
    <div class="container">
        <span class="kicker">Count The Happy Moments</span>
        <h2 class="section-title">Hari Spesial Sudah Dekat 🎁</h2>
        <p class="section-subtitle">
            Halaman ini dibuat khusus untuk merayakan senyum, tawa, dan semua hal manis tentang <?= html_escape($displayName); ?>.
        </p>

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

<section class="section" id="birthday-detail">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker">Sweet Detail</span>
            <h2 class="section-title">Little Things About This Day</h2>
            <p class="section-subtitle">Versi ulang tahun yang lebih lucu, ringan, dan cocok buat greeting card atau birthday invitation.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="fact-box">
                    <div class="fact-icon"><i class="bi bi-calendar-heart"></i></div>
                    <div class="mini-label">Tanggal</div>
                    <div class="big-value"><?= !empty($project->event_date) ? $eventDateFormatted : 'Hari ini penuh kebahagiaan'; ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-box">
                    <div class="fact-icon"><i class="bi bi-balloon-heart"></i></div>
                    <div class="mini-label">Untuk</div>
                    <div class="big-value"><?= html_escape($displayName); ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-box">
                    <div class="fact-icon"><i class="bi bi-stars"></i></div>
                    <div class="mini-label">Dari</div>
                    <div class="big-value"><?= html_escape($senderName); ?></div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1 align-items-stretch">
            <div class="col-lg-7">
                <div class="letter-box h-100">
                    <span class="kicker">Birthday Note</span>
                    <h3 class="mt-3 mb-3" style="color:#5a3f65;font-weight:800;">Pesan Manis Buat <?= html_escape($displayName); ?></h3>
                    <div class="lead mb-0">
                        <?= !empty($project->description)
                            ? nl2br(html_escape($project->description))
                            : 'Semoga harimu dipenuhi tawa, kejutan lucu, kue terenak, hadiah terbaik, dan orang-orang yang bikin hati hangat. Tetap jadi versi paling manis dari dirimu ya.'; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card-cute h-100">
                    <div class="card-body d-flex flex-column justify-content-center text-center">
                        <span class="kicker">Cute Reminder</span>
                        <h3 class="mt-3 mb-3" style="color:#5a3f65;font-weight:800;">Make a Wish ✨</h3>
                        <p class="mb-3" style="color:#786677;line-height:1.9;">
                            Jangan lupa senyum dulu, tiup lilinnya, lalu bikin satu wish yang paling kamu pengen. Siapa tahu tahun ini banyak hal indah datang barengan.
                        </p>
                        <div class="bubble-note">
                            “<?= !empty($project->message_title) ? html_escape($project->message_title) : 'Happy moments, soft hearts, and cute memories only.'; ?>”
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($galleries)): ?>
<section class="section section-sm" id="gallery">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker">Memories</span>
            <h2 class="section-title">Cute Memory Wall</h2>
            <p class="section-subtitle">Tempat buat foto-foto manis, kenangan lucu, atau momen favorit yang bikin senyum-senyum sendiri.</p>
        </div>

        <div class="row g-4">
            <?php $galleryIndex = 0; foreach ($galleries as $g): $galleryIndex++; ?>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card <?= $galleryIndex % 2 === 0 ? 'alt' : ''; ?>">
                        <img src="<?= asset_or_url($g->image_path); ?>" alt="<?= html_escape($g->caption ?: 'Memory'); ?>">
                        <div class="gallery-caption">
                            <?= !empty($g->caption) ? html_escape($g->caption) : 'Happy little memory 📸'; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section section-sm" id="share-link">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-6">
                <div class="card-cute h-100">
                    <div class="card-body">
                        <span class="kicker">Share</span>
                        <h3 class="mt-3 mb-3" style="color:#5a3f65;font-weight:800;">Bagikan Halaman Manis Ini</h3>
                        <p class="text-muted">Kalau mau dikirim ke orang spesial, tinggal copy link halaman ini ya.</p>
                        <div class="share-box mt-3">
                            <label class="form-label fw-semibold">Link Birthday Page</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inviteLink" value="<?= current_url(); ?>" readonly>
                                <button class="btn btn-soft btn-copy" type="button" onclick="copyInviteLink()">Copy</button>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <a class="btn btn-main" target="_blank" href="https://wa.me/?text=<?= rawurlencode('Lihat birthday page ini: ' . current_url()); ?>">
                                <i class="bi bi-whatsapp me-1"></i>Share WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card-cute h-100">
                    <div class="card-body d-flex flex-column justify-content-center text-center">
                        <span class="kicker">Special Line</span>
                        <h3 class="mt-3 mb-3" style="color:#5a3f65;font-weight:800;">A Page Full of Smiles</h3>
                        <p class="mb-0" style="color:#786677;line-height:1.9;">
                            Dibikin pakai nuansa pastel, balon, kue, dan vibes ceria biar cocok untuk ulang tahun, sweet greeting, atau surprise card yang lebih playful.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($project->wish_enabled): ?>
<section class="section" id="wishes">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker">Wish Corner</span>
            <h2 class="section-title">Tulis Ucapan Manis</h2>
            <p class="section-subtitle">Boleh tulis ucapan lucu, doa baik, atau pesan singkat yang bikin hari ini makin spesial.</p>
        </div>

        <div class="card-cute mb-4">
            <div class="card-body">
                <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
                    <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                    <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">

                    <div class="col-md-4">
                        <label class="form-label">Nama</label>
                        <input name="guest_name" class="form-control" value="<?= html_escape($guest_name); ?>" placeholder="Nama kamu" required>
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Ucapan</label>
                        <input name="message" class="form-control" placeholder="Contoh: semoga makin bahagia dan makin banyak hal baik yaa" required>
                    </div>

                    <div class="col-12 pt-2">
                        <button class="btn btn-main">Kirim Ucapan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($wishes as $wish): ?>
                <div class="col-md-6">
                    <div class="wish-card">
                        <div class="wish-name"><?= html_escape($wish->guest_name); ?></div>
                        <div class="text-muted small mb-2">Birthday wishes</div>
                        <div><?= nl2br(html_escape($wish->message)); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if (empty($wishes)): ?>
                <div class="col-12">
                    <div class="text-center text-muted">Belum ada ucapan, jadi yang pertama yuk 🎉</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section section-sm">
    <div class="container text-center">
        <div class="footer-soft">
            Dibuat dengan penuh warna, tawa, dan sedikit taburan confetti untuk hari spesial ini ✨
        </div>
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

        function initMusicOnce() {
            if (!started) playMusic();
            document.removeEventListener('click', initMusicOnce);
            document.removeEventListener('touchstart', initMusicOnce);
        }

        document.addEventListener('click', initMusicOnce, { passive: true });
        document.addEventListener('touchstart', initMusicOnce, { passive: true });
    })();
</script>
</body>
</html>
