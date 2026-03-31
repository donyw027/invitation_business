<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#b88c7d">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bg: #fffaf6;
            --bg-soft: #f8efe9;
            --card: #ffffff;
            --primary: #9e6f61;
            --primary-dark: #7f5549;
            --accent: #d7b3a6;
            --text: #4a3833;
            --muted: #8b746d;
            --line: #eddcd4;
            --shadow: 0 18px 40px rgba(79, 55, 47, .10);
            --radius-xl: 28px;
            --radius-lg: 22px;
            --radius-md: 16px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: linear-gradient(180deg, #fffaf6 0%, #fff5ef 100%);
            color: var(--text);
            font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
        }

        .section {
            padding: 88px 0;
            position: relative;
        }

        .section-sm {
            padding: 64px 0;
        }

        .section-title {
            font-size: clamp(28px, 4vw, 44px);
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--primary-dark);
        }

        .section-subtitle {
            color: var(--muted);
            max-width: 760px;
            margin: 0 auto;
        }

        .kicker {
            display: inline-block;
            font-size: 12px;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--primary);
            background: #f8e7e0;
            border: 1px solid #efd8cf;
            padding: 8px 12px;
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
                linear-gradient(rgba(54, 34, 28, .38), rgba(54, 34, 28, .55)),
                url('<?= asset_or_url($project->hero_image); ?>') center/cover no-repeat;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, .20), transparent 28%),
                radial-gradient(circle at bottom right, rgba(255, 255, 255, .10), transparent 25%);
            pointer-events: none;
        }

        .hero-card {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .22);
            backdrop-filter: blur(10px);
            border-radius: 32px;
            padding: 28px;
            box-shadow: 0 18px 40px rgba(0, 0, 0, .10);
        }

        .hero-cover {
            font-size: 14px;
            letter-spacing: .08em;
            text-transform: uppercase;
            opacity: .95;
            margin-bottom: 14px;
        }

        .hero-title {
            font-size: clamp(40px, 7vw, 82px);
            line-height: 1.05;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .hero-subtitle {
            font-size: clamp(16px, 2.2vw, 24px);
            opacity: .95;
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
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 999px;
            padding: 12px 22px;
            font-weight: 600;
            box-shadow: 0 10px 20px rgba(126, 85, 73, .18);
        }

        .btn-main:hover {
            background: var(--primary-dark);
            color: #fff;
        }

        .btn-soft {
            background: rgba(255, 255, 255, .16);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, .30);
            border-radius: 999px;
            padding: 12px 22px;
            font-weight: 600;
            backdrop-filter: blur(6px);
        }

        .btn-soft:hover {
            background: rgba(255, 255, 255, .24);
            color: #fff;
        }

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

        .glass-note {
            background: rgba(255, 255, 255, .16);
            border: 1px solid rgba(255, 255, 255, .25);
            backdrop-filter: blur(8px);
            border-radius: 18px;
            padding: 14px 16px;
            margin-top: 18px;
            display: inline-block;
        }

        .ornament {
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(215, 179, 166, .22), transparent 65%);
            filter: blur(4px);
            pointer-events: none;
        }

        .ornament.top-right {
            top: -60px;
            right: -30px;
        }

        .ornament.bottom-left {
            bottom: -70px;
            left: -40px;
        }

        .card-lux {
            border: none;
            border-radius: var(--radius-xl);
            background: var(--card);
            box-shadow: var(--shadow);
            overflow: hidden;
            height: 100%;
        }

        .card-lux .card-body {
            padding: 28px;
        }

        .info-tile {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(79, 55, 47, .04);
            height: 100%;
        }

        .info-icon {
            width: 52px;
            height: 52px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: #f8ebe6;
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
            line-height: 1.25;
        }

        .countdown-wrap {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-top: 24px;
        }

        .countdown-item {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 20px;
            text-align: center;
            padding: 18px 10px;
            box-shadow: 0 8px 20px rgba(79, 55, 47, .04);
        }

        .countdown-value {
            font-size: 30px;
            font-weight: 800;
            color: var(--primary-dark);
            line-height: 1;
        }

        .countdown-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .10em;
            color: var(--muted);
            margin-top: 8px;
        }

        .timeline-text {
            white-space: pre-line;
            color: var(--text);
            line-height: 1.8;
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

        .quote-box {
            border-radius: 28px;
            background: linear-gradient(135deg, #fff 0%, #fdf5f1 100%);
            border: 1px solid var(--line);
            padding: 34px;
            box-shadow: var(--shadow);
        }

        .quote-mark {
            font-size: 48px;
            line-height: 1;
            color: var(--accent);
        }

        .share-box {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 24px;
            padding: 20px;
        }

        .form-control,
        .form-select {
            min-height: 50px;
            border-radius: 14px;
            border: 1px solid #e6d7cf;
            padding-left: 14px;
            padding-right: 14px;
        }

        textarea.form-control {
            min-height: 120px;
            padding-top: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #c89a8a;
            box-shadow: 0 0 0 .25rem rgba(158, 111, 97, .12);
        }

        .btn-send {
            background: #1f1f1f;
            color: #fff;
            border: none;
            border-radius: 999px;
            padding: 12px 22px;
            font-weight: 600;
        }

        .btn-send:hover {
            background: #000;
            color: #fff;
        }

        .wish-card {
            border: 1px solid var(--line);
            border-radius: 22px;
            background: #fff;
            padding: 20px;
            height: 100%;
            box-shadow: 0 8px 20px rgba(79, 55, 47, .04);
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
            box-shadow: 0 12px 24px rgba(126, 85, 73, .28);
            font-size: 20px;
        }

        .music-btn:hover {
            background: var(--primary-dark);
        }

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
            box-shadow: 0 8px 20px rgba(79, 55, 47, .06);
        }

        .footer-soft {
            color: var(--muted);
            font-size: 14px;
        }

        .btn-map,
        .btn-copy {
            border-radius: 999px;
            padding: 10px 18px;
            font-weight: 600;
        }

        .preview-alert {
            position: relative;
            z-index: 3;
        }

        @media (max-width: 991.98px) {
            .hero {
                min-height: auto;
                padding: 110px 0 80px;
            }

            .countdown-wrap {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .gallery-card img {
                height: 260px;
            }
        }

        @media (max-width: 575.98px) {
            .hero-card {
                padding: 22px 18px;
                border-radius: 24px;
            }

            .section {
                padding: 72px 0;
            }

            .countdown-wrap {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .countdown-item {
                padding: 16px 8px;
            }

            .countdown-value {
                font-size: 26px;
            }

            .gallery-card img {
                height: 220px;
            }
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
                            <?= html_escape($project->cover_text); ?>
                            <?php if (!empty($guest_name)): ?>
                                <br>
                                <span class="fw-bold"><?= html_escape($guest_name); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="kicker">Digital Wedding Invitation</div>
                        <h1 class="hero-title"><?= html_escape($project->title); ?></h1>
                        <p class="hero-subtitle"><?= html_escape($project->subtitle); ?></p>

                        <?php if (!empty($project->event_date)): ?>
                            <div class="hero-date">
                                <i class="bi bi-calendar-heart me-2"></i><?= $eventDateFormatted; ?>
                                <?php if (!empty($project->event_time)): ?>
                                    <span class="mx-2">•</span>
                                    <i class="bi bi-clock me-2"></i><?= html_escape($project->event_time); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="hero-actions">
                            <a href="#detail-acara" class="btn btn-main">Lihat Detail Acara</a>
                            <?php if ($project->rsvp_enabled): ?>
                                <a href="#rsvp" class="btn btn-soft">Konfirmasi Kehadiran</a>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($project->message_body)): ?>
                            <div class="glass-note mt-4">
                                “<?= nl2br(html_escape($project->message_body)); ?>”
                            </div>
                        <?php endif; ?>
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
            <span class="kicker">Save The Date</span>
            <h2 class="section-title mb-3"><?= html_escape($project->title); ?></h2>
            <p class="section-subtitle">
                Dengan penuh kebahagiaan, kami mengundang Anda untuk hadir dan memberikan doa terbaik pada momen spesial kami.
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

    <section class="section" id="detail-acara">
        <div class="container">
            <div class="text-center mb-5">
                <span class="kicker">Wedding Detail</span>
                <h2 class="section-title">Detail Acara</h2>
                <p class="section-subtitle">Berikut informasi acara yang dapat Anda simpan dan bagikan.</p>
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
                    <div class="card-lux">
                        <div class="card-body">
                            <span class="kicker">Venue</span>
                            <h3 class="mb-3" style="color:var(--primary-dark);">Lokasi Acara</h3>
                            <p class="mb-2 fs-5 fw-semibold"><?= html_escape($project->location_name); ?></p>
                            <p class="text-muted mb-4"><?= nl2br(html_escape($project->location_address)); ?></p>

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
                        <div class="fs-5 mb-3" style="line-height:1.8;">
                            <?= !empty($project->description) ? nl2br(html_escape($project->description)) : 'Merupakan suatu kehormatan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu.'; ?>
                        </div>
                        <div class="floating-badge mt-2">
                            <i class="bi bi-heart-fill"></i>
                            Kehadiran dan doa restu Anda sangat berarti
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-sm" id="share-link">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6">
                    <div class="card-lux">
                        <div class="card-body">
                            <span class="kicker">Share</span>
                            <h3 class="mb-3" style="color:var(--primary-dark);">Bagikan Undangan</h3>
                            <p class="text-muted">Link undangan ini sudah siap dibagikan ke tamu undangan.</p>

                            <div class="share-box">
                                <label class="form-label fw-semibold">Link Undangan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="inviteLink" value="<?= current_url(); ?>" readonly>
                                    <button class="btn btn-outline-secondary btn-copy" type="button" onclick="copyInviteLink()">Copy</button>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <a class="btn btn-main" target="_blank" href="https://wa.me/?text=<?= rawurlencode('Undangan kami: ' . current_url()); ?>">
                                    <i class="bi bi-whatsapp me-1"></i>Share WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($project->gift_enabled): ?>
                    <div class="col-lg-6">
                        <div class="card-lux">
                            <div class="card-body">
                                <span class="kicker">Wedding Gift</span>
                                <h3 class="mb-3" style="color:var(--primary-dark);">Gift Info</h3>
                                <p class="text-muted mb-3">Bagi keluarga dan sahabat yang ingin mengirimkan tanda kasih.</p>
                                <div class="share-box">
                                    <div class="timeline-text"><?= nl2br(html_escape($project->gift_info)); ?></div>
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
                    <span class="kicker">Gallery</span>
                    <h2 class="section-title">Momen Bahagia</h2>
                    <p class="section-subtitle">Beberapa potret terbaik untuk melengkapi undangan digital ini.</p>
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
                    <span class="kicker">RSVP</span>
                    <h2 class="section-title">Konfirmasi Kehadiran</h2>
                    <p class="section-subtitle">Mohon bantu konfirmasi kehadiran Anda agar persiapan acara kami semakin baik.</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card-lux">
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
                                        <button class="btn btn-send">Kirim RSVP</button>
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
                    <span class="kicker">Best Wishes</span>
                    <h2 class="section-title">Ucapan & Doa</h2>
                    <p class="section-subtitle">Tuliskan doa dan ucapan terbaik Anda untuk hari bahagia kami.</p>
                </div>

                <div class="card-lux mb-4">
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
                                <input name="message" class="form-control" placeholder="Tulis ucapan terbaik Anda" required>
                            </div>

                            <div class="col-12 pt-2">
                                <button class="btn btn-send">Kirim Ucapan</button>
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

    <section class="section section-sm">
        <div class="container text-center">
            <div class="footer-soft">
                Terima kasih atas perhatian, doa, dan kehadiran Anda di hari bahagia kami.
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