<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#5c6f66">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bg: #f7f5f0;
            --bg-soft: #eef3ef;
            --card: #ffffff;
            --primary: #5c6f66;
            --primary-dark: #42524b;
            --accent: #c9b37e;
            --text: #33413b;
            --muted: #6e7c76;
            --line: #dfe7e1;
            --shadow: 0 18px 42px rgba(37, 49, 43, .08);
            --radius-xl: 28px;
            --radius-lg: 22px;
            --radius-md: 16px;
        }

        html { scroll-behavior: smooth; }

        body {
            background: linear-gradient(180deg, #f7f5f0 0%, #edf3ef 100%);
            color: var(--text);
            font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
        }

        .section { padding: 88px 0; position: relative; }
        .section-sm { padding: 64px 0; }

        .section-title {
            font-size: clamp(28px, 4vw, 42px);
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 12px;
        }

        .section-subtitle {
            color: var(--muted);
            max-width: 760px;
            margin: 0 auto;
            line-height: 1.8;
        }

        .kicker {
            display: inline-block;
            font-size: 12px;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--primary);
            background: #edf3ef;
            border: 1px solid #d8e4dd;
            padding: 8px 14px;
            border-radius: 999px;
            margin-bottom: 14px;
            font-weight: 700;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            color: #fff;
            background:
                linear-gradient(rgba(45, 55, 50, .55), rgba(45, 55, 50, .72)),
                url('<?= asset_or_url($project->hero_image); ?>') center/cover no-repeat;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(255,255,255,.12), transparent 25%),
                radial-gradient(circle at bottom right, rgba(201,179,126,.18), transparent 26%);
            pointer-events: none;
        }

        .hero-card {
            position: relative;
            z-index: 2;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.18);
            backdrop-filter: blur(10px);
            border-radius: 34px;
            padding: 32px;
            box-shadow: 0 18px 40px rgba(0,0,0,.12);
        }

        .hero-cover {
            font-size: 14px;
            letter-spacing: .08em;
            text-transform: uppercase;
            opacity: .95;
            margin-bottom: 14px;
        }

        .hero-title {
            font-size: clamp(34px, 6vw, 68px);
            line-height: 1.08;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .hero-subtitle {
            font-size: clamp(16px, 2vw, 22px);
            opacity: .96;
            margin-bottom: 18px;
        }

        .hero-date {
            font-size: 17px;
            font-weight: 600;
            margin-bottom: 22px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
        }

        .btn-main {
            background: var(--accent);
            color: #2f352f;
            border: none;
            border-radius: 999px;
            padding: 12px 22px;
            font-weight: 700;
            box-shadow: 0 10px 22px rgba(201,179,126,.24);
        }

        .btn-main:hover { background: #bca368; color: #2f352f; }

        .btn-soft {
            background: rgba(255,255,255,.14);
            color: #fff;
            border: 1px solid rgba(255,255,255,.26);
            border-radius: 999px;
            padding: 12px 22px;
            font-weight: 600;
            backdrop-filter: blur(6px);
        }

        .btn-soft:hover { background: rgba(255,255,255,.22); color: #fff; }

        .scroll-hint {
            position: absolute;
            left: 50%;
            bottom: 24px;
            transform: translateX(-50%);
            z-index: 2;
            color: #fff;
            font-size: 13px;
            opacity: .9;
        }

        .serene-note {
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.20);
            backdrop-filter: blur(8px);
            border-radius: 18px;
            padding: 15px 18px;
            margin-top: 18px;
            display: inline-block;
            line-height: 1.8;
        }

        .ornament {
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201,179,126,.18), transparent 65%);
            filter: blur(6px);
            pointer-events: none;
        }

        .ornament.top-right { top: -60px; right: -30px; }
        .ornament.bottom-left { bottom: -70px; left: -40px; }

        .card-serene {
            border: none;
            border-radius: var(--radius-xl);
            background: var(--card);
            box-shadow: var(--shadow);
            overflow: hidden;
            height: 100%;
        }

        .card-serene .card-body { padding: 28px; }

        .info-tile {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(37,49,43,.04);
            height: 100%;
        }

        .info-icon {
            width: 52px;
            height: 52px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: #eef3ef;
            color: var(--primary);
            font-size: 22px;
            margin-bottom: 14px;
        }

        .mini-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .15em;
            color: var(--muted);
            margin-bottom: 8px;
            font-weight: 700;
        }

        .big-value {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-dark);
            line-height: 1.4;
        }

        .quote-box {
            border-radius: 28px;
            background: linear-gradient(135deg, #fff 0%, #f4f6f2 100%);
            border: 1px solid var(--line);
            padding: 34px;
            box-shadow: var(--shadow);
        }

        .quote-mark {
            font-size: 48px;
            line-height: 1;
            color: var(--accent);
        }

        .timeline-text {
            white-space: pre-line;
            color: var(--text);
            line-height: 1.9;
        }

        .gallery-card {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow);
            background: #fff;
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
            padding: 20px;
        }

        .form-control, .form-select {
            min-height: 50px;
            border-radius: 14px;
            border: 1px solid #d7e1db;
            padding-left: 14px;
            padding-right: 14px;
        }

        textarea.form-control {
            min-height: 120px;
            padding-top: 14px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #8ba094;
            box-shadow: 0 0 0 .25rem rgba(92,111,102,.12);
        }

        .btn-send {
            background: var(--primary-dark);
            color: #fff;
            border: none;
            border-radius: 999px;
            padding: 12px 22px;
            font-weight: 600;
        }

        .btn-send:hover { background: #33413b; color: #fff; }

        .wish-card {
            border: 1px solid var(--line);
            border-radius: 22px;
            background: #fff;
            padding: 20px;
            height: 100%;
            box-shadow: 0 8px 20px rgba(37,49,43,.04);
        }

        .wish-name {
            font-weight: 700;
            color: var(--primary-dark);
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
            background: var(--primary);
            color: #fff;
            box-shadow: 0 12px 24px rgba(92,111,102,.28);
            font-size: 20px;
        }

        .music-btn:hover { background: var(--primary-dark); }

        .floating-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            color: var(--primary-dark);
            border: 1px solid var(--line);
            border-radius: 999px;
            padding: 10px 14px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(37,49,43,.06);
        }

        .footer-soft {
            color: var(--muted);
            font-size: 14px;
        }

        .btn-map, .btn-copy {
            border-radius: 999px;
            padding: 10px 18px;
            font-weight: 600;
        }

        .preview-alert { position: relative; z-index: 3; }

        @media (max-width: 991.98px) {
            .hero { min-height: auto; padding: 110px 0 80px; }
            .gallery-card img { height: 260px; }
        }

        @media (max-width: 575.98px) {
            .hero-card { padding: 22px 18px; border-radius: 24px; }
            .section { padding: 72px 0; }
            .gallery-card img { height: 220px; }
        }
    </style>
</head>
<body>

<?php
$eventDateFormatted = !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : '';
$musicUrl = !empty($project->music_url) ? $project->music_url : '';
$mapUrl = '';
if (!empty($project->location_name) || !empty($project->location_address)) {
    $mapQuery = trim(($project->location_name ?? '') . ' ' . ($project->location_address ?? ''));
    $mapUrl = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($mapQuery);
}
?>

<section class="hero text-center">
    <div class="ornament top-right"></div>
    <div class="ornament bottom-left"></div>

    <div class="container position-relative">
        <?php if ($is_preview): ?>
            <div class="alert alert-warning preview-alert">Preview mode</div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="hero-card">
                    <div class="hero-cover">
                        <?= html_escape($project->cover_text ?: 'Assalamu\'alaikum Warahmatullahi Wabarakatuh'); ?>
                        <?php if (!empty($guest_name)): ?>
                            <br><span class="fw-bold"><?= html_escape($guest_name); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="kicker">Undangan Tahlil & Doa Bersama</div>
                    <h1 class="hero-title"><?= html_escape($project->title); ?></h1>
                    <p class="hero-subtitle"><?= html_escape($project->subtitle ?: 'Dengan memohon rahmat Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara tahlil dan doa bersama.'); ?></p>

                    <?php if (!empty($project->event_date)): ?>
                        <div class="hero-date">
                            <i class="bi bi-calendar3 me-2"></i><?= $eventDateFormatted; ?>
                            <?php if (!empty($project->event_time)): ?>
                                <span class="mx-2">•</span>
                                <i class="bi bi-clock me-2"></i><?= html_escape($project->event_time); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="hero-actions">
                        <a href="#detail-acara" class="btn btn-main">Lihat Detail Acara</a>
                        <a href="#doa-ucapan" class="btn btn-soft">Kirim Doa</a>
                    </div>

                    <div class="serene-note mt-4">
                        <?= nl2br(html_escape($project->message_body ?: 'Merupakan suatu kehormatan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan bersama-sama memanjatkan doa.')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-hint">
        <i class="bi bi-chevron-double-down"></i> Scroll untuk membuka undangan
    </div>
</section>

<section class="section section-sm">
    <div class="container text-center">
        <span class="kicker">Doa Bersama</span>
        <h2 class="section-title mb-3"><?= html_escape($project->title); ?></h2>
        <p class="section-subtitle">
            Semoga Allah SWT menerima amal ibadah, melimpahkan rahmat, dan memberikan ketenangan bagi keluarga yang ditinggalkan.
        </p>
    </div>
</section>

<section class="section" id="detail-acara">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker">Informasi Acara</span>
            <h2 class="section-title">Detail Tahlil</h2>
            <p class="section-subtitle">Berikut informasi waktu dan lokasi acara yang dapat Anda simpan.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="info-tile">
                    <div class="info-icon"><i class="bi bi-calendar-event"></i></div>
                    <div class="mini-label">Tanggal</div>
                    <div class="big-value"><?= !empty($project->event_date) ? $eventDateFormatted : '-'; ?></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info-tile">
                    <div class="info-icon"><i class="bi bi-clock-history"></i></div>
                    <div class="mini-label">Waktu</div>
                    <div class="big-value"><?= !empty($project->event_time) ? html_escape($project->event_time) : '-'; ?></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info-tile">
                    <div class="info-icon"><i class="bi bi-geo-alt"></i></div>
                    <div class="mini-label">Lokasi</div>
                    <div class="big-value"><?= !empty($project->location_name) ? html_escape($project->location_name) : '-'; ?></div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1">
            <div class="col-lg-7">
                <div class="card-serene">
                    <div class="card-body">
                        <span class="kicker">Tempat Acara</span>
                        <h3 class="mb-3" style="color:var(--primary-dark);">Lokasi Tahlil</h3>
                        <p class="mb-2 fs-5 fw-semibold"><?= html_escape($project->location_name ?: '-'); ?></p>
                        <p class="text-muted mb-4"><?= nl2br(html_escape($project->location_address ?: '-')); ?></p>

                        <div class="d-flex flex-wrap gap-2">
                            <?php if (!empty($mapUrl)): ?>
                                <a href="<?= $mapUrl; ?>" target="_blank" class="btn btn-main btn-map">
                                    <i class="bi bi-map me-1"></i>Buka Maps
                                </a>
                            <?php endif; ?>
                            <a href="#share-link" class="btn btn-outline-secondary btn-map">Bagikan Undangan</a>
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
                <div class="quote-box h-100 d-flex flex-column justify-content-center">
                    <div class="quote-mark">“</div>
                    <div class="fs-5 mb-3" style="line-height:1.9;">
                        <?= !empty($project->description)
                            ? nl2br(html_escape($project->description))
                            : 'Semoga kebersamaan dalam doa ini menjadi jalan turunnya rahmat, ampunan, dan ketenangan hati bagi kita semua.'; ?>
                    </div>
                    <div class="floating-badge mt-2">
                        <i class="bi bi-moon-stars-fill"></i>
                        Mohon doa terbaik dari Bapak/Ibu/Saudara/i
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-sm" id="share-link">
    <div class="container">
        <div class="row g-4 align-items-stretch justify-content-center">
            <div class="col-lg-7">
                <div class="card-serene">
                    <div class="card-body">
                        <span class="kicker">Share</span>
                        <h3 class="mb-3" style="color:var(--primary-dark);">Bagikan Undangan</h3>
                        <p class="text-muted">Link undangan ini sudah siap dibagikan kepada keluarga dan kerabat.</p>

                        <div class="share-box">
                            <label class="form-label fw-semibold">Link Undangan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inviteLink" value="<?= current_url(); ?>" readonly>
                                <button class="btn btn-outline-secondary btn-copy" type="button" onclick="copyInviteLink()">Copy</button>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <a class="btn btn-main" target="_blank" href="https://wa.me/?text=<?= rawurlencode('Undangan tahlil dan doa bersama: ' . current_url()); ?>">
                                <i class="bi bi-whatsapp me-1"></i>Share WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($galleries)): ?>
<section class="section" id="gallery">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker">Kenangan</span>
            <h2 class="section-title">Galeri</h2>
            <p class="section-subtitle">Dokumentasi atau foto kenangan yang ingin dibagikan kepada keluarga dan sahabat.</p>
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

<?php if ($project->wish_enabled): ?>
<section class="section section-sm" id="doa-ucapan">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker">Doa & Ucapan</span>
            <h2 class="section-title">Kirim Doa</h2>
            <p class="section-subtitle">Silakan tuliskan doa, ucapan, atau pesan penguatan untuk keluarga.</p>
        </div>

        <div class="card-serene mb-4">
            <div class="card-body">
                <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
                    <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                    <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">

                    <div class="col-md-4">
                        <label class="form-label">Nama</label>
                        <input name="guest_name" class="form-control" value="<?= html_escape($guest_name); ?>" placeholder="Nama" required>
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Doa / Ucapan</label>
                        <input name="message" class="form-control" placeholder="Tuliskan doa atau ucapan" required>
                    </div>

                    <div class="col-12 pt-2">
                        <button class="btn btn-send">Kirim Doa</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($wishes as $wish): ?>
                <div class="col-md-6">
                    <div class="wish-card">
                        <div class="wish-name"><?= html_escape($wish->guest_name); ?></div>
                        <div class="text-muted small mb-2">Keluarga / Kerabat</div>
                        <div><?= nl2br(html_escape($wish->message)); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if (empty($wishes)): ?>
                <div class="col-12">
                    <div class="text-center text-muted">Belum ada doa atau ucapan.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section section-sm">
    <div class="container text-center">
        <div class="footer-soft">
            Jazakumullahu khairan atas doa, perhatian, dan kehadiran Bapak/Ibu/Saudara/i.
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
        alert('Link undangan berhasil disalin.');
    }

    (function() {
        const audio = document.getElementById('bgMusic');
        const btn = document.getElementById('musicToggle');
        if (!audio || !btn) return;

        let started = false;

        function playMusic() {
            audio.play().then(() => {
                started = true;
                btn.innerHTML = '<i class="bi bi-pause-fill"></i>';
            }).catch(() => {});
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
        });
    })();
</script>
</body>
</html>
