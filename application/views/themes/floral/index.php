<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#d98ca8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bg: #fdf9fb;
            --bg-soft: #fff5f9;
            --pink: #f6dbe7;
            --pink-strong: #d98ca8;
            --pink-dark: #b96d8b;
            --lav: #f3eff8;
            --card: #ffffff;
            --line: #f0dbe5;
            --text: #4b3550;
            --muted: #8d7487;
            --shadow: 0 18px 42px rgba(140, 92, 122, .10);
            --radius-xl: 30px;
            --radius-lg: 24px;
            --radius-md: 18px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(246, 219, 231, .8), transparent 24%),
                radial-gradient(circle at bottom right, rgba(243, 239, 248, .9), transparent 28%),
                var(--bg);
            color: var(--text);
            font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
        }

        .section {
            padding: 72px 0;
            position: relative;
        }

        .hero {
            padding: 110px 0 90px;
            background:
                linear-gradient(135deg, rgba(248, 215, 229, .95), rgba(243, 239, 248, .96));
            position: relative;
            overflow: hidden;
        }

        .hero::before,
        .hero::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            filter: blur(8px);
            pointer-events: none;
        }

        .hero::before {
            width: 260px;
            height: 260px;
            background: rgba(255, 255, 255, .45);
            top: -70px;
            right: -50px;
        }

        .hero::after {
            width: 240px;
            height: 240px;
            background: rgba(245, 198, 218, .35);
            bottom: -80px;
            left: -50px;
        }

        .hero-box,
        .block {
            border-radius: var(--radius-xl);
            background: rgba(255, 255, 255, .92);
            box-shadow: var(--shadow);
            border: 1px solid rgba(240, 219, 229, .85);
            position: relative;
            overflow: hidden;
        }

        .hero-box::before,
        .block::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(255, 255, 255, .18), transparent 26%);
            pointer-events: none;
        }

        .floral-badge {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: #fff;
            color: var(--pink-dark);
            border: 1px solid #f1d5e2;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .16em;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .hero-title {
            font-size: clamp(36px, 6vw, 62px);
            font-weight: 800;
            line-height: 1.08;
            color: var(--text);
            margin-bottom: 12px;
        }

        .hero-subtitle {
            font-size: clamp(16px, 2vw, 22px);
            color: var(--muted);
            margin-bottom: 0;
        }

        .hero-cover {
            color: var(--pink-dark);
            font-size: 14px;
            letter-spacing: .08em;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .flower-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin: 22px 0;
            color: var(--pink-dark);
        }

        .flower-divider::before,
        .flower-divider::after {
            content: "";
            width: 70px;
            height: 1px;
            background: linear-gradient(90deg, transparent, #dfb7c7, transparent);
        }

        .quick-info {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-top: 26px;
        }

        .quick-card {
            border-radius: 22px;
            background: #fff;
            border: 1px solid var(--line);
            padding: 18px 16px;
            box-shadow: 0 10px 24px rgba(140, 92, 122, .05);
            height: 100%;
        }

        .quick-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #faedf3;
            color: var(--pink-dark);
            font-size: 20px;
            margin-bottom: 10px;
        }

        .quick-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .12em;
            color: var(--muted);
            font-weight: 700;
            margin-bottom: 6px;
        }

        .quick-value {
            font-size: 18px;
            font-weight: 700;
            color: var(--text);
            line-height: 1.4;
        }

        .section-title {
            font-size: clamp(28px, 4vw, 42px);
            font-weight: 800;
            margin-bottom: 10px;
            color: var(--text);
        }

        .section-subtitle {
            color: var(--muted);
            max-width: 760px;
            margin: 0 auto;
        }

        .img-cover {
            width: 100%;
            height: 100%;
            min-height: 360px;
            object-fit: cover;
            border-radius: 28px;
            box-shadow: var(--shadow);
            border: 1px solid #f0dbe5;
            background: #fff;
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
            border-radius: 22px;
            text-align: center;
            padding: 18px 10px;
            box-shadow: 0 10px 24px rgba(140, 92, 122, .05);
        }

        .countdown-value {
            font-size: 30px;
            font-weight: 800;
            color: var(--pink-dark);
            line-height: 1;
        }

        .countdown-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .10em;
            color: var(--muted);
            margin-top: 8px;
        }

        .soft-btn {
            border-radius: 999px;
            padding: 11px 20px;
            font-weight: 600;
        }

        .btn-floral {
            background: var(--pink-strong);
            color: #fff;
            border: none;
            box-shadow: 0 12px 24px rgba(185, 109, 139, .18);
        }

        .btn-floral:hover {
            background: var(--pink-dark);
            color: #fff;
        }

        .btn-outline-floral {
            border: 1px solid #deb4c6;
            color: var(--pink-dark);
            background: #fff;
        }

        .btn-outline-floral:hover {
            background: #fff3f8;
            color: var(--pink-dark);
        }

        .info-list p:last-child {
            margin-bottom: 0;
        }

        .map-frame iframe {
            width: 100%;
            height: 100%;
            min-height: 320px;
            border: 0;
            border-radius: 24px;
        }

        .quote-box {
            border-radius: 28px;
            padding: 32px;
            background: linear-gradient(135deg, #fff 0%, #fff7fb 100%);
            border: 1px solid var(--line);
            box-shadow: var(--shadow);
            height: 100%;
        }

        .quote-mark {
            font-size: 48px;
            line-height: 1;
            color: #e1b8c8;
        }

        .gallery-card {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            background: #fff;
            box-shadow: var(--shadow);
            height: 100%;
        }

        .gallery-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            display: block;
        }

        .gallery-caption {
            padding: 14px 18px 18px;
            color: var(--muted);
            font-size: 14px;
        }

        .gift-box,
        .share-box {
            border-radius: 22px;
            background: #fff;
            border: 1px solid var(--line);
            padding: 20px;
        }

        .form-control,
        .form-select {
            min-height: 50px;
            border-radius: 14px;
            border: 1px solid #ead5df;
            padding-left: 14px;
            padding-right: 14px;
        }

        textarea.form-control {
            min-height: 120px;
            padding-top: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #d99ab4;
            box-shadow: 0 0 0 .25rem rgba(217, 140, 168, .12);
        }

        .wish-card {
            border-radius: 22px;
            background: #fff;
            border: 1px solid var(--line);
            padding: 20px;
            box-shadow: 0 10px 24px rgba(140, 92, 122, .05);
            height: 100%;
        }

        .wish-name {
            font-weight: 700;
            color: var(--pink-dark);
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
            background: var(--pink-strong);
            color: #fff;
            box-shadow: 0 14px 26px rgba(185, 109, 139, .25);
            font-size: 20px;
        }

        .music-btn:hover {
            background: var(--pink-dark);
        }

        .footer-note {
            color: var(--muted);
            font-size: 14px;
        }

        @media (max-width: 991.98px) {

            .quick-info,
            .countdown-wrap {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .img-cover {
                min-height: 280px;
            }

            .gallery-card img {
                height: 240px;
            }
        }

        @media (max-width: 575.98px) {
            .hero {
                padding: 90px 0 70px;
            }

            .quick-info,
            .countdown-wrap {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .hero-box,
            .block,
            .quote-box {
                border-radius: 24px;
            }

            .gallery-card img {
                height: 210px;
            }
        }
    </style>
</head>

<body>

    <?php
    $eventDateFormatted = !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : '-';
    $eventDateISO = !empty($project->event_date) ? date('Y-m-d', strtotime($project->event_date)) : '';
    $musicUrl = !empty($project->music_url) ? $project->music_url : '';
    $mapUrl = '';

    if (!empty($project->location_name) || !empty($project->location_address)) {
        $mapQuery = trim(($project->location_name ?? '') . ' ' . ($project->location_address ?? ''));
        $mapUrl = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($mapQuery);
    }
    ?>

    <section class="hero">
        <div class="container">
            <?php if ($is_preview): ?>
                <div class="alert alert-warning">Preview mode</div>
            <?php endif; ?>

            <div class="hero-box p-4 p-lg-5 text-center">
                <?php if (!empty($project->cover_text)): ?>
                    <div class="hero-cover">
                        <?= html_escape($project->cover_text); ?>
                        <?php if (!empty($guest_name)): ?>
                            <br><span class="fw-bold"><?= html_escape($guest_name); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="floral-badge">Floral Wedding Invitation</div>
                <h1 class="hero-title"><?= html_escape($project->title); ?></h1>
                <p class="hero-subtitle"><?= html_escape($project->subtitle); ?></p>

                <div class="flower-divider">
                    <i class="bi bi-flower1"></i>
                </div>

                <div class="d-flex flex-wrap gap-2 justify-content-center">
                    <a href="#detail-acara" class="btn btn-floral soft-btn">Lihat Detail Acara</a>
                    <?php if ($project->rsvp_enabled): ?>
                        <a href="#rsvp" class="btn btn-outline-floral soft-btn">Konfirmasi Kehadiran</a>
                    <?php endif; ?>
                </div>

                <?php if (!empty($project->event_date) || !empty($project->event_time)): ?>
                    <div class="quick-info">
                        <div class="quick-card">
                            <div class="quick-icon"><i class="bi bi-calendar-heart"></i></div>
                            <div class="quick-label">Tanggal</div>
                            <div class="quick-value"><?= $eventDateFormatted; ?></div>
                        </div>
                        <div class="quick-card">
                            <div class="quick-icon"><i class="bi bi-clock"></i></div>
                            <div class="quick-label">Waktu</div>
                            <div class="quick-value"><?= !empty($project->event_time) ? html_escape($project->event_time) : '-'; ?></div>
                        </div>
                        <div class="quick-card">
                            <div class="quick-icon"><i class="bi bi-geo-alt"></i></div>
                            <div class="quick-label">Lokasi</div>
                            <div class="quick-value"><?= !empty($project->location_name) ? html_escape($project->location_name) : '-'; ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if (!empty($project->event_date)): ?>
        <section class="section pt-5">
            <div class="container text-center">
                <div class="floral-badge">Save The Date</div>
                <h2 class="section-title">Menuju Hari Bahagia</h2>
                <p class="section-subtitle">Simpan tanggalnya dan nantikan momen istimewa ini bersama kami.</p>

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
            </div>
        </section>
    <?php endif; ?>

    <section class="section" id="detail-acara">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <img src="<?= asset_or_url($project->hero_image); ?>" class="img-cover" alt="<?= html_escape($project->title); ?>">
                </div>

                <div class="col-lg-6">
                    <div class="block p-4 p-lg-5 h-100">
                        <div class="floral-badge">Event Info</div>
                        <h2 class="section-title mb-3">Informasi Acara</h2>

                        <div class="info-list">
                            <p class="mb-2"><strong>Tanggal:</strong> <?= $eventDateFormatted; ?></p>
                            <p class="mb-2"><strong>Waktu:</strong> <?= !empty($project->event_time) ? html_escape($project->event_time) : '-'; ?></p>
                            <p class="mb-2"><strong>Lokasi:</strong> <?= !empty($project->location_name) ? html_escape($project->location_name) : '-'; ?></p>
                            <p class="mb-0"><strong>Alamat:</strong><br><?= nl2br(html_escape($project->location_address)); ?></p>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <?php if (!empty($mapUrl)): ?>
                                <a href="<?= $mapUrl; ?>" target="_blank" class="btn btn-floral soft-btn">
                                    <i class="bi bi-map me-1"></i>Buka Maps
                                </a>
                            <?php endif; ?>
                            <a href="#share-link" class="btn btn-outline-floral soft-btn">Bagikan Undangan</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (!empty($project->description) || !empty($project->map_embed)): ?>
                <div class="row g-4 mt-2">
                    <?php if (!empty($project->description)): ?>
                        <div class="col-lg-5">
                            <div class="quote-box">
                                <div class="quote-mark">“</div>
                                <div style="line-height:1.8; white-space:pre-line;"><?= html_escape($project->description); ?></div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($project->map_embed)): ?>
                        <div class="col-lg-7">
                            <div class="block p-3 p-lg-4 h-100">
                                <div class="floral-badge">Map</div>
                                <h3 class="mb-3">Lokasi Acara</h3>
                                <div class="map-frame">
                                    <?php
                                    $mapEmbed = trim($project->map_embed);
                                    if (stripos($mapEmbed, '<iframe') !== false) {
                                        echo $mapEmbed;
                                    } else {
                                        echo '<iframe src="' . html_escape($mapEmbed) . '" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if (!empty($galleries)): ?>
        <section class="section">
            <div class="container">
                <div class="text-center mb-5">
                    <div class="floral-badge">Gallery</div>
                    <h2 class="section-title">Momen Indah</h2>
                    <p class="section-subtitle">Kumpulan potret terbaik untuk melengkapi undangan floral ini.</p>
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

    <section class="section pt-0" id="share-link">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="block p-4 h-100">
                        <div class="floral-badge">Share</div>
                        <h3 class="mb-3">Bagikan Undangan</h3>
                        <p class="text-muted">Link undangan ini siap dibagikan kepada keluarga dan sahabat tercinta.</p>

                        <div class="share-box">
                            <label class="form-label fw-semibold">Link Undangan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inviteLink" value="<?= current_url(); ?>" readonly>
                                <button class="btn btn-outline-secondary" type="button" onclick="copyInviteLink()">Copy</button>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <a class="btn btn-floral soft-btn" target="_blank" href="https://wa.me/?text=<?= rawurlencode('Undangan kami: ' . current_url()); ?>">
                                <i class="bi bi-whatsapp me-1"></i>Share WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <?php if ($project->gift_enabled): ?>
                    <div class="col-lg-6">
                        <div class="block p-4 h-100">
                            <div class="floral-badge">Gift</div>
                            <h3 class="mb-3">Gift Info</h3>
                            <p class="text-muted">Bagi yang ingin mengirimkan tanda kasih untuk hari bahagia kami.</p>

                            <div class="gift-box" style="white-space:pre-line;"><?= html_escape($project->gift_info); ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if ($project->rsvp_enabled): ?>
        <section class="section" id="rsvp">
            <div class="container">
                <div class="text-center mb-5">
                    <div class="floral-badge">RSVP</div>
                    <h2 class="section-title">Konfirmasi Kehadiran</h2>
                    <p class="section-subtitle">Mohon bantu konfirmasi kehadiran Anda agar persiapan acara kami semakin baik.</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="block p-4 p-lg-5">
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
                                    <button class="btn btn-floral soft-btn">Kirim RSVP</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($project->wish_enabled): ?>
        <section class="section" id="wishes">
            <div class="container">
                <div class="text-center mb-5">
                    <div class="floral-badge">Best Wishes</div>
                    <h2 class="section-title">Kirim Ucapan</h2>
                    <p class="section-subtitle">Tuliskan doa dan ucapan terbaik Anda untuk hari bahagia kami.</p>
                </div>

                <div class="block p-4 p-lg-5 mb-4">
                    <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
                        <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                        <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">
                        <div class="col-md-4">
                            <label class="form-label">Nama</label>
                            <input name="guest_name" class="form-control" value="<?= html_escape($guest_name); ?>" placeholder="Nama" required>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Ucapan</label>
                            <input name="message" class="form-control" placeholder="Tulis ucapan terbaik" required>
                        </div>
                        <div class="col-12 pt-2">
                            <button class="btn btn-floral soft-btn">Kirim Ucapan</button>
                        </div>
                    </form>
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
                            <div class="text-muted text-center">Belum ada ucapan.</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="section pt-0">
        <div class="container text-center">
            <div class="footer-note">
                Terima kasih atas doa dan kehadiran Anda di hari istimewa kami.
            </div>
        </div>
    </section>

    <?php if (!empty($musicUrl)): ?>
        <audio id="bgMusic" loop>
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
                if (!started) {
                    playMusic();
                }
                document.removeEventListener('click', initMusicOnce);
            });
        })();
    </script>
</body>

</html>