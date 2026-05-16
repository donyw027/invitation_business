<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title ?? ($project->title ?? 'Graduation Invitation')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#172554">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <?php
    $title = $project->title ?? 'Graduation Invitation';
    $subtitle = !empty($project->subtitle) ? $project->subtitle : 'You are warmly invited to celebrate a meaningful graduation moment.';
    $coverText = !empty($project->cover_text) ? $project->cover_text : 'Graduation Celebration';
    $description = !empty($project->description) ? $project->description : 'Dengan penuh rasa syukur, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan memberikan doa terbaik pada momen kelulusan ini.';
    $messageTitle = !empty($project->message_title) ? $project->message_title : 'A New Chapter Begins';
    $messageBody = !empty($project->message_body) ? $project->message_body : 'Setiap langkah, perjuangan, dan doa membawa hari istimewa ini menjadi lebih bermakna. Kehadiran dan doa Anda akan menjadi kebahagiaan tersendiri bagi kami.';
    $graduateName = !empty($project->receiver_name) ? $project->receiver_name : (!empty($project->title) ? $project->title : 'Graduate Name');
    $familyName = !empty($project->sender_name) ? $project->sender_name : 'Keluarga Besar';
    $eventDateFormatted = !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : '';
    $eventDateISO = !empty($project->event_date) ? date('Y-m-d', strtotime($project->event_date)) : '';
    $eventTime = !empty($project->event_time) ? $project->event_time : 'Waktu menyusul';
    $locationName = !empty($project->location_name) ? $project->location_name : '';
    $locationAddress = !empty($project->location_address) ? $project->location_address : '';
    $heroImage = !empty($project->hero_image) ? asset_or_url($project->hero_image) : 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1600&q=85';
    $musicUrl = !empty($project->music_url) ? $project->music_url : '';
    $guestName = !empty($guest_name) ? $guest_name : (!empty($guest->name) ? $guest->name : 'Tamu Undangan');
    $inviteUrl = current_url();
    $mapQuery = trim($locationName . ' ' . $locationAddress);
    $mapUrl = !empty($mapQuery) ? 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($mapQuery) : '';
    ?>

    <style>
        :root{
            --navy:#172554;
            --blue:#1d4ed8;
            --sky:#dbeafe;
            --gold:#f5c76b;
            --cream:#fffaf0;
            --ink:#111827;
            --muted:#64748b;
            --line:rgba(15,23,42,.12);
            --card:rgba(255,255,255,.82);
            --shadow:0 28px 80px rgba(15,23,42,.16);
            --radius:32px;
        }
        *{box-sizing:border-box}
        html{scroll-behavior:smooth}
        body{
            margin:0;
            font-family:'Inter',system-ui,-apple-system,sans-serif;
            color:var(--ink);
            background:
                radial-gradient(circle at 15% 5%, rgba(245,199,107,.32), transparent 28%),
                radial-gradient(circle at 90% 20%, rgba(59,130,246,.24), transparent 32%),
                linear-gradient(180deg,#f8fbff 0%,#ffffff 42%,#eff6ff 100%);
            overflow-x:hidden;
        }
        a{text-decoration:none}
        .container{position:relative;z-index:2}
        .section{padding:90px 0;position:relative}
        .section-sm{padding:64px 0}
        .grad-orb{position:fixed;border-radius:50%;filter:blur(3px);opacity:.55;pointer-events:none;z-index:0}
        .orb-1{width:240px;height:240px;background:#bfdbfe;top:8%;left:-120px}
        .orb-2{width:190px;height:190px;background:#fde68a;bottom:8%;right:-80px}
        .kicker{
            display:inline-flex;align-items:center;gap:9px;
            padding:9px 15px;border-radius:999px;
            background:rgba(255,255,255,.72);border:1px solid rgba(29,78,216,.14);
            color:var(--blue);font-size:12px;font-weight:800;letter-spacing:.16em;text-transform:uppercase;
            box-shadow:0 12px 30px rgba(29,78,216,.08);
        }
        .section-title{
            font-family:'Playfair Display',serif;
            font-weight:800;
            color:var(--navy);
            font-size:clamp(32px,5vw,58px);
            line-height:1.05;
            margin:16px 0 12px;
        }
        .section-subtitle{max-width:760px;margin:0 auto;color:var(--muted);line-height:1.85}
        .hero{
            min-height:100vh;
            display:flex;
            align-items:center;
            position:relative;
            overflow:hidden;
            padding:80px 0 60px;
        }
        .hero:before{
            content:"";
            position:absolute;inset:0;
            background:
                linear-gradient(110deg, rgba(248,251,255,.98) 0%, rgba(248,251,255,.90) 48%, rgba(23,37,84,.32) 100%),
                url('<?= html_escape($heroImage); ?>') center/cover no-repeat;
            z-index:0;
        }
        .hero:after{
            content:"";
            position:absolute;inset:auto 0 0;height:190px;
            background:linear-gradient(180deg,transparent,#f8fbff);
            z-index:1;
        }
        .hero-card{
            max-width:720px;
            background:rgba(255,255,255,.70);
            border:1px solid rgba(255,255,255,.9);
            backdrop-filter:blur(20px);
            border-radius:42px;
            padding:34px;
            box-shadow:var(--shadow);
        }
        .cover-pill{display:inline-flex;gap:8px;align-items:center;padding:10px 15px;border-radius:999px;background:var(--navy);color:#fff;font-weight:700;font-size:13px;margin-bottom:22px}
        .hero-title{
            font-family:'Playfair Display',serif;
            font-size:clamp(44px,7vw,82px);
            line-height:.98;
            color:var(--navy);
            font-weight:800;
            margin:0 0 18px;
        }
        .hero-title span{color:var(--blue)}
        .hero-text{color:#475569;line-height:1.9;font-size:16px;max-width:620px}
        .guest-box{
            margin-top:26px;
            display:inline-flex;
            flex-direction:column;
            gap:4px;
            background:#fff;
            border:1px solid var(--line);
            border-radius:24px;
            padding:15px 20px;
            box-shadow:0 18px 45px rgba(15,23,42,.08);
        }
        .guest-box small{color:var(--muted)}
        .guest-box strong{font-family:'Playfair Display',serif;font-size:24px;color:var(--navy)}
        .cta-row{display:flex;flex-wrap:wrap;gap:12px;margin-top:28px}
        .btn-main,.btn-soft,.btn-send{
            border:0;border-radius:999px;padding:13px 22px;font-weight:800;display:inline-flex;align-items:center;gap:9px
        }
        .btn-main{background:var(--navy);color:white;box-shadow:0 16px 38px rgba(23,37,84,.22)}
        .btn-main:hover{background:#0f172a;color:white}
        .btn-soft{background:#fff;color:var(--navy);border:1px solid var(--line)}
        .btn-send{background:var(--blue);color:white}
        .floating-card{
            background:var(--card);
            border:1px solid rgba(255,255,255,.86);
            backdrop-filter:blur(18px);
            border-radius:var(--radius);
            box-shadow:var(--shadow);
        }
        .profile-card{overflow:hidden}
        .profile-img{width:100%;height:520px;object-fit:cover}
        .profile-caption{padding:26px}
        .profile-caption h3{font-family:'Playfair Display',serif;color:var(--navy);font-size:34px;margin-bottom:5px}
        .message-card{padding:34px;height:100%;display:flex;flex-direction:column;justify-content:center}
        .message-card h3{font-family:'Playfair Display',serif;color:var(--navy);font-size:38px;margin-bottom:18px}
        .message-card p{color:#475569;line-height:1.95}
        .info-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:34px}
        .info-box{
            background:#fff;
            border:1px solid var(--line);
            border-radius:26px;
            padding:24px;
            box-shadow:0 16px 42px rgba(15,23,42,.06);
            height:100%;
        }
        .info-icon{width:50px;height:50px;border-radius:18px;background:var(--sky);color:var(--blue);display:grid;place-items:center;font-size:22px;margin-bottom:18px}
        .info-box h4{font-size:16px;font-weight:900;color:var(--navy);margin-bottom:8px}
        .info-box p{margin:0;color:var(--muted);line-height:1.7}
        .countdown{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-top:30px}
        .cd-item{background:#fff;border:1px solid var(--line);border-radius:24px;padding:20px;text-align:center;box-shadow:0 12px 32px rgba(15,23,42,.06)}
        .cd-number{font-size:34px;font-weight:900;color:var(--blue)}
        .cd-label{font-size:12px;color:var(--muted);font-weight:800;text-transform:uppercase;letter-spacing:.12em}
        .gallery-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
        .gallery-item{height:250px;border-radius:28px;overflow:hidden;box-shadow:0 18px 48px rgba(15,23,42,.13);background:#e5e7eb}
        .gallery-item:nth-child(1),.gallery-item:nth-child(6){grid-column:span 2;height:330px}
        .gallery-item img{width:100%;height:100%;object-fit:cover;transition:.45s ease}
        .gallery-item:hover img{transform:scale(1.07)}
        .map-wrap{overflow:hidden;border-radius:34px;border:1px solid var(--line);box-shadow:var(--shadow);background:#fff}
        .map-frame{width:100%;height:420px;border:0;display:block}
        .map-empty{padding:48px;text-align:center;color:var(--muted)}
        .form-control,.form-select{border-radius:18px;border:1px solid var(--line);padding:13px 16px}
        .form-control:focus,.form-select:focus{border-color:var(--blue);box-shadow:0 0 0 .2rem rgba(29,78,216,.12)}
        .wish-card{background:#fff;border:1px solid var(--line);border-radius:26px;padding:22px;box-shadow:0 14px 40px rgba(15,23,42,.06);height:100%}
        .wish-name{font-weight:900;color:var(--navy);margin-bottom:8px}
        .gift-box{background:linear-gradient(135deg,var(--navy),#1e40af);color:#fff;border-radius:34px;padding:32px;box-shadow:var(--shadow)}
        .gift-box .text-muted{color:rgba(255,255,255,.72)!important}
        .share-box{display:flex;gap:10px}
        .share-box input{background:#fff}
        .footer-soft{font-family:'Playfair Display',serif;font-size:26px;color:var(--navy)}
        .music-player{position:fixed;right:18px;bottom:20px;z-index:50}
        .music-btn{
            width:58px;height:58px;border-radius:50%;border:0;background:linear-gradient(135deg,var(--navy),var(--blue));color:#fff;
            box-shadow:0 20px 45px rgba(29,78,216,.35);font-size:23px;display:grid;place-items:center
        }
        .music-btn.is-playing{animation:pulseMusic 1.8s ease infinite}
        @keyframes pulseMusic{0%,100%{transform:scale(1)}50%{transform:scale(1.08)}}
        @media(max-width:991px){
            .section{padding:72px 0}
            .hero-card{padding:26px}
            .profile-img{height:420px}
            .info-grid{grid-template-columns:1fr}
            .gallery-grid{grid-template-columns:repeat(2,1fr)}
            .gallery-item,.gallery-item:nth-child(1),.gallery-item:nth-child(6){grid-column:span 1;height:230px}
        }
        @media(max-width:575px){
            .hero{padding:64px 0 40px}
            .hero-card{border-radius:30px;padding:22px}
            .hero-title{font-size:44px}
            .cta-row .btn-main,.cta-row .btn-soft{width:100%;justify-content:center}
            .countdown{grid-template-columns:repeat(2,1fr)}
            .gallery-grid{gap:10px}
            .gallery-item,.gallery-item:nth-child(1),.gallery-item:nth-child(6){height:190px;border-radius:22px}
            .map-frame{height:340px}
            .share-box{flex-direction:column}
        }
    </style>
</head>
<body>
<div class="grad-orb orb-1"></div>
<div class="grad-orb orb-2"></div>

<section class="hero">
    <div class="container">
        <div class="hero-card">
            <div class="cover-pill"><i class="bi bi-mortarboard-fill"></i><?= html_escape($coverText); ?></div>
            <h1 class="hero-title">Graduation <span>Day</span></h1>
            <p class="hero-text"><?= nl2br(html_escape($subtitle)); ?></p>
            <div class="guest-box">
                <small>Kepada Yth.</small>
                <strong><?= html_escape($guestName); ?></strong>
            </div>
            <div class="cta-row">
                <a href="#event" class="btn-main"><i class="bi bi-calendar-event"></i> Lihat Detail Acara</a>
                <a href="#wishes" class="btn-soft"><i class="bi bi-chat-heart"></i> Kirim Ucapan</a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-5">
                <div class="floating-card profile-card h-100">
                    <img class="profile-img" src="<?= html_escape($heroImage); ?>" alt="<?= html_escape($graduateName); ?>">
                    <div class="profile-caption">
                        <span class="kicker"><i class="bi bi-stars"></i> The Graduate</span>
                        <h3><?= html_escape($graduateName); ?></h3>
                        <p class="mb-0 text-muted">Dengan rasa syukur dan bahagia, kami mengundang Anda untuk menjadi bagian dari hari istimewa ini.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="floating-card message-card">
                    <span class="kicker"><i class="bi bi-award"></i> Invitation</span>
                    <h3><?= html_escape($messageTitle); ?></h3>
                    <p><?= nl2br(html_escape($description)); ?></p>
                    <p><?= nl2br(html_escape($messageBody)); ?></p>
                    <div class="mt-3">
                        <div class="fw-bold text-uppercase small text-muted">Dengan hormat,</div>
                        <div class="fs-4 fw-bold text-primary"><?= html_escape($familyName); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-sm" id="event">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker"><i class="bi bi-calendar2-check"></i> Event Detail</span>
            <h2 class="section-title">Detail Acara Kelulusan</h2>
            <p class="section-subtitle">Mohon kehadiran dan doa terbaik Anda pada acara berikut.</p>
        </div>

        <div class="info-grid">
            <div class="info-box">
                <div class="info-icon"><i class="bi bi-calendar-heart"></i></div>
                <h4>Tanggal</h4>
                <p><?= !empty($eventDateFormatted) ? html_escape($eventDateFormatted) : 'Tanggal menyusul'; ?></p>
            </div>
            <div class="info-box">
                <div class="info-icon"><i class="bi bi-clock"></i></div>
                <h4>Waktu</h4>
                <p><?= html_escape($eventTime); ?></p>
            </div>
            <div class="info-box">
                <div class="info-icon"><i class="bi bi-geo-alt"></i></div>
                <h4>Lokasi</h4>
                <p><?= !empty($locationName) ? html_escape($locationName) : 'Lokasi menyusul'; ?></p>
            </div>
        </div>

        <?php if (!empty($eventDateISO)): ?>
        <div class="countdown" id="countdown" data-date="<?= html_escape($eventDateISO); ?>">
            <div class="cd-item"><div class="cd-number" id="cdDays">0</div><div class="cd-label">Hari</div></div>
            <div class="cd-item"><div class="cd-number" id="cdHours">0</div><div class="cd-label">Jam</div></div>
            <div class="cd-item"><div class="cd-number" id="cdMinutes">0</div><div class="cd-label">Menit</div></div>
            <div class="cd-item"><div class="cd-number" id="cdSeconds">0</div><div class="cd-label">Detik</div></div>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php if (!empty($galleries)): ?>
<section class="section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker"><i class="bi bi-images"></i> Gallery</span>
            <h2 class="section-title">Graduation Memories</h2>
            <p class="section-subtitle">Beberapa momen yang menjadi bagian dari perjalanan penuh cerita.</p>
        </div>
        <div class="gallery-grid">
            <?php foreach ($galleries as $gallery): ?>
                <?php $img = !empty($gallery->image) ? asset_or_url($gallery->image) : (!empty($gallery->photo) ? asset_or_url($gallery->photo) : ''); ?>
                <?php if (!empty($img)): ?>
                    <div class="gallery-item"><img src="<?= html_escape($img); ?>" alt="Graduation gallery"></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section section-sm">
    <div class="container">
        <div class="text-center mb-5">
            <span class="kicker"><i class="bi bi-map"></i> Location</span>
            <h2 class="section-title">Lokasi Acara</h2>
            <p class="section-subtitle"><?= !empty($locationAddress) ? html_escape($locationAddress) : 'Alamat acara akan diinformasikan kemudian.'; ?></p>
        </div>
        <div class="map-wrap">
            <?php if (!empty($project->map_embed)): ?>
                <?= $project->map_embed; ?>
            <?php elseif (!empty($mapUrl)): ?>
                <iframe class="map-frame" loading="lazy" allowfullscreen src="https://maps.google.com/maps?q=<?= rawurlencode($mapQuery); ?>&output=embed"></iframe>
            <?php else: ?>
                <div class="map-empty"><i class="bi bi-geo-alt fs-1 d-block mb-3"></i>Maps belum tersedia.</div>
            <?php endif; ?>
        </div>
        <?php if (!empty($mapUrl)): ?>
            <div class="text-center mt-4">
                <a href="<?= html_escape($mapUrl); ?>" target="_blank" class="btn-main"><i class="bi bi-map"></i> Buka Google Maps</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php if (!empty($project->gift_info)): ?>
<section class="section section-sm">
    <div class="container">
        <div class="gift-box">
            <div class="row g-4 align-items-center">
                <div class="col-lg-4">
                    <span class="kicker bg-white"><i class="bi bi-gift"></i> Gift</span>
                    <h2 class="section-title text-white mb-0">Tanda Kasih</h2>
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
        <div class="text-center mb-5">
            <span class="kicker"><i class="bi bi-envelope-check"></i> RSVP</span>
            <h2 class="section-title">Konfirmasi Kehadiran</h2>
            <p class="section-subtitle">Bantu kami mempersiapkan acara dengan mengisi konfirmasi kehadiran.</p>
        </div>
        <div class="floating-card p-4 p-md-5">
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
        <div class="text-center mb-5">
            <span class="kicker"><i class="bi bi-chat-heart"></i> Best Wishes</span>
            <h2 class="section-title">Ucapan & Doa</h2>
            <p class="section-subtitle">Tuliskan ucapan terbaik untuk momen kelulusan ini.</p>
        </div>
        <div class="floating-card p-4 p-md-5 mb-4">
            <form method="post" action="<?= site_url('wish/store'); ?>" class="row g-3">
                <input type="hidden" name="project_id" value="<?= html_escape($project->id); ?>">
                <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">
                <div class="col-md-4"><label class="form-label">Nama</label><input name="guest_name" class="form-control" value="<?= html_escape($guestName); ?>" placeholder="Nama" required></div>
                <div class="col-md-8"><label class="form-label">Ucapan</label><input name="message" class="form-control" placeholder="Tulis ucapan terbaik Anda" required></div>
                <div class="col-12 pt-2"><button class="btn-send"><i class="bi bi-send-heart"></i> Kirim Ucapan</button></div>
            </form>
        </div>
        <div class="row g-4">
            <?php if (!empty($wishes)): ?>
                <?php foreach ($wishes as $wish): ?>
                    <div class="col-md-6"><div class="wish-card"><div class="wish-name"><?= html_escape($wish->guest_name); ?></div><div><?= nl2br(html_escape($wish->message)); ?></div></div></div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12"><div class="text-center text-muted">Belum ada ucapan.</div></div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section section-sm">
    <div class="container">
        <div class="floating-card p-4 p-md-5 text-center">
            <span class="kicker"><i class="bi bi-share"></i> Share</span>
            <h2 class="section-title">Bagikan Undangan</h2>
            <p class="section-subtitle mb-4">Kirim link undangan graduation ini kepada keluarga dan sahabat.</p>
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
