<?php
$title = !empty($project->title) ? $project->title : 'Undangan Doa Bersama';
$subtitle = !empty($project->subtitle) ? $project->subtitle : 'Gathering in Prayer, Peace, and Blessing';
$coverText = !empty($project->cover_text) ? $project->cover_text : 'Dengan penuh hormat kami mengundang Bapak/Ibu/Saudara/i';
$description = !empty($project->description) ? $project->description : 'Mari hadir dalam suasana yang penuh keteduhan untuk bersama-sama memanjatkan doa, harapan baik, dan rasa syukur.';
$messageTitle = !empty($project->message_title) ? $project->message_title : 'Doa & Harapan';
$messageBody = !empty($project->message_body) ? $project->message_body : 'Semoga acara ini membawa kedamaian, kekuatan, dan kebaikan bagi semua yang hadir.';
$receiverName = !empty($project->receiver_name) ? $project->receiver_name : '';
$senderName = !empty($project->sender_name) ? $project->sender_name : 'Keluarga / Panitia';
$eventDateFormatted = !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : 'Tanggal menyusul';
$eventDateISO = !empty($project->event_date) ? date('Y-m-d', strtotime($project->event_date)) : '';
$eventTime = !empty($project->event_time) ? $project->event_time : 'Waktu menyusul';
$locationName = !empty($project->location_name) ? $project->location_name : 'Lokasi acara';
$locationAddress = !empty($project->location_address) ? $project->location_address : '';
$musicUrl = !empty($project->music_url) ? $project->music_url : '';
$guestName = !empty($guest_name) ? $guest_name : (!empty($guest->name) ? $guest->name : 'Tamu Undangan');
$inviteUrl = current_url();
$mapEmbed = !empty($project->map_embed) ? $project->map_embed : '';
$giftInfo = !empty($project->gift_info) ? $project->gift_info : '';
$giftEnabled = !empty($project->gift_enabled) || !empty($giftInfo);
$mapQuery = trim($locationName . ' ' . $locationAddress);
$mapUrl = !empty($mapQuery) ? 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($mapQuery) : '';

$imgUrl = function($path) {
    if (empty($path)) {
        return '';
    }
    if (preg_match('/^https?:\/\//i', $path)) {
        return $path;
    }
    if (function_exists('asset_or_url')) {
        return asset_or_url($path);
    }
    return base_url($path);
};

$heroImage = !empty($project->hero_image) ? $imgUrl($project->hero_image) : (!empty($project->cover_image) ? $imgUrl($project->cover_image) : 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1600&q=85');

$galleryItems = [];
if (!empty($galleries)) {
    foreach ($galleries as $g) {
        $raw = $g->image_path ?? $g->image ?? $g->photo ?? $g->foto ?? '';
        if (!empty($raw)) {
            $galleryItems[] = $imgUrl($raw);
        }
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title ?? $title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#2f3d46">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{
            --ink:#26323a;
            --muted:#6e7a80;
            --line:rgba(38,50,58,.12);
            --cream:#f7f2e9;
            --paper:#fffdf8;
            --mist:#dfe9e9;
            --sage:#778f83;
            --deep:#2f4a48;
            --gold:#c5a768;
            --shadow:0 28px 80px rgba(38,50,58,.14);
        }
        *{box-sizing:border-box}
        html{scroll-behavior:smooth}
        body{
            margin:0;
            font-family:'Manrope',sans-serif;
            color:var(--ink);
            background:
                radial-gradient(circle at top left,rgba(197,167,104,.22),transparent 32%),
                radial-gradient(circle at 90% 15%,rgba(119,143,131,.22),transparent 30%),
                linear-gradient(180deg,#f9f5ed 0%,#eef3f2 55%,#f9f5ed 100%);
            overflow-x:hidden;
        }
        a{text-decoration:none}
        .soft-orb{
            position:fixed;
            width:420px;
            height:420px;
            border-radius:999px;
            filter:blur(12px);
            opacity:.18;
            pointer-events:none;
            z-index:0;
        }
        .orb-one{background:#c5a768;left:-180px;top:120px}
        .orb-two{background:#778f83;right:-170px;bottom:80px}
        .page{position:relative;z-index:1}
        .container-wide{width:min(1180px,calc(100% - 32px));margin:0 auto}
        .hero{
            min-height:100vh;
            display:grid;
            align-items:center;
            padding:72px 0;
        }
        .hero-grid{
            display:grid;
            grid-template-columns:1.02fr .98fr;
            gap:34px;
            align-items:center;
        }
        .hero-copy{
            background:rgba(255,253,248,.72);
            border:1px solid rgba(255,255,255,.76);
            backdrop-filter:blur(20px);
            border-radius:38px;
            padding:48px;
            box-shadow:var(--shadow);
            position:relative;
            overflow:hidden;
        }
        .hero-copy:before{
            content:'';
            position:absolute;
            inset:18px;
            border:1px solid rgba(197,167,104,.28);
            border-radius:30px;
            pointer-events:none;
        }
        .kicker{
            display:inline-flex;
            align-items:center;
            gap:8px;
            padding:8px 14px;
            border-radius:999px;
            background:rgba(119,143,131,.12);
            color:var(--deep);
            font-size:12px;
            font-weight:800;
            letter-spacing:.13em;
            text-transform:uppercase;
            margin-bottom:22px;
        }
        .hero-title{
            font-family:'Playfair Display',serif;
            font-size:clamp(44px,6vw,82px);
            line-height:.98;
            margin:0 0 18px;
            color:#243138;
        }
        .hero-subtitle{
            font-size:18px;
            line-height:1.9;
            color:var(--muted);
            max-width:650px;
            margin-bottom:26px;
        }
        .guest-pill{
            display:inline-flex;
            align-items:center;
            gap:10px;
            padding:12px 18px;
            border-radius:999px;
            background:#fff;
            border:1px solid var(--line);
            font-weight:800;
            margin-bottom:24px;
        }
        .hero-actions{display:flex;flex-wrap:wrap;gap:12px;position:relative;z-index:2}
        .btn-main,.btn-soft{
            border:0;
            border-radius:999px;
            padding:14px 20px;
            font-weight:800;
            display:inline-flex;
            align-items:center;
            gap:9px;
            transition:.25s ease;
        }
        .btn-main{
            background:linear-gradient(135deg,var(--deep),#536f68);
            color:#fff;
            box-shadow:0 18px 38px rgba(47,74,72,.22);
        }
        .btn-soft{
            background:#fff;
            color:var(--deep);
            border:1px solid var(--line);
        }
        .btn-main:hover,.btn-soft:hover{transform:translateY(-2px)}
        .hero-visual{
            position:relative;
            min-height:620px;
        }
        .photo-frame{
            position:absolute;
            inset:0;
            border-radius:42px;
            overflow:hidden;
            box-shadow:var(--shadow);
            border:12px solid rgba(255,253,248,.86);
            background:#fff;
        }
        .photo-frame img{
            width:100%;
            height:100%;
            object-fit:cover;
            filter:saturate(.92) contrast(.98);
        }
        .photo-frame:after{
            content:'';
            position:absolute;
            inset:0;
            background:linear-gradient(180deg,rgba(15,20,22,.08),rgba(15,20,22,.34));
        }
        .event-stamp{
            position:absolute;
            left:-22px;
            bottom:34px;
            width:min(360px,80%);
            background:rgba(255,253,248,.92);
            backdrop-filter:blur(14px);
            border:1px solid rgba(255,255,255,.7);
            border-radius:28px;
            padding:24px;
            box-shadow:0 24px 60px rgba(38,50,58,.18);
        }
        .event-stamp small{
            display:block;
            color:var(--muted);
            font-weight:800;
            text-transform:uppercase;
            letter-spacing:.12em;
            margin-bottom:8px;
            font-size:11px;
        }
        .event-stamp strong{
            display:block;
            font-family:'Playfair Display',serif;
            font-size:30px;
            line-height:1.1;
        }
        .section{padding:84px 0}
        .section-sm{padding:54px 0}
        .section-head{
            text-align:center;
            max-width:760px;
            margin:0 auto 38px;
        }
        .section-title{
            font-family:'Playfair Display',serif;
            font-size:clamp(34px,4vw,58px);
            line-height:1.05;
            margin:12px 0 14px;
            color:#26323a;
        }
        .section-subtitle{
            color:var(--muted);
            line-height:1.9;
            font-size:16px;
            margin:0;
        }
        .card-soft{
            background:rgba(255,253,248,.82);
            border:1px solid rgba(255,255,255,.72);
            backdrop-filter:blur(18px);
            border-radius:34px;
            box-shadow:var(--shadow);
        }
        .message-card{
            padding:42px;
            display:grid;
            grid-template-columns:.85fr 1.15fr;
            gap:32px;
            align-items:center;
        }
        .message-badge{
            min-height:260px;
            border-radius:30px;
            background:
                linear-gradient(135deg,rgba(47,74,72,.92),rgba(119,143,131,.9)),
                url('<?= html_escape($heroImage); ?>') center/cover;
            color:#fff;
            display:flex;
            align-items:end;
            padding:28px;
            position:relative;
            overflow:hidden;
        }
        .message-badge:before{
            content:'✦';
            position:absolute;
            top:20px;
            right:26px;
            font-size:42px;
            color:rgba(255,255,255,.55);
        }
        .message-badge h3{
            font-family:'Playfair Display',serif;
            font-size:34px;
            margin:0;
            line-height:1.05;
        }
        .message-content h4{
            font-size:13px;
            text-transform:uppercase;
            letter-spacing:.16em;
            color:var(--gold);
            font-weight:900;
            margin-bottom:14px;
        }
        .message-content p{
            color:var(--muted);
            line-height:2;
            margin:0;
            white-space:pre-line;
        }
        .detail-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:18px;
        }
        .detail-card{
            padding:28px;
            border-radius:28px;
            background:#fffdf8;
            border:1px solid var(--line);
            min-height:190px;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }
        .detail-icon{
            width:52px;
            height:52px;
            border-radius:18px;
            background:rgba(119,143,131,.12);
            color:var(--deep);
            display:grid;
            place-items:center;
            font-size:24px;
            margin-bottom:22px;
        }
        .detail-card span{
            color:var(--muted);
            font-size:13px;
            font-weight:800;
            text-transform:uppercase;
            letter-spacing:.12em;
        }
        .detail-card strong{
            display:block;
            font-size:22px;
            line-height:1.25;
            margin-top:8px;
        }
        .countdown{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:14px;
            margin-top:24px;
        }
        .count-item{
            background:#fff;
            border:1px solid var(--line);
            border-radius:24px;
            padding:22px 12px;
            text-align:center;
        }
        .count-item strong{
            display:block;
            font-size:34px;
            color:var(--deep);
            line-height:1;
        }
        .count-item span{
            display:block;
            color:var(--muted);
            font-size:12px;
            font-weight:800;
            text-transform:uppercase;
            letter-spacing:.12em;
            margin-top:8px;
        }
        .gallery-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:16px;
        }
        .gallery-item{
            aspect-ratio:1/1;
            overflow:hidden;
            border-radius:26px;
            background:#fff;
            box-shadow:0 18px 42px rgba(38,50,58,.09);
            border:1px solid rgba(255,255,255,.78);
        }
        .gallery-item img{
            width:100%;
            height:100%;
            object-fit:cover;
            transition:.45s ease;
        }
        .gallery-item:hover img{transform:scale(1.07)}
        .map-grid{
            display:grid;
            grid-template-columns:.85fr 1.15fr;
            gap:22px;
            align-items:stretch;
        }
        .map-info{
            padding:34px;
        }
        .map-info h3{
            font-family:'Playfair Display',serif;
            font-size:38px;
            margin-bottom:18px;
        }
        .map-info p{
            color:var(--muted);
            line-height:1.9;
        }
        .map-frame{
            min-height:420px;
            border-radius:34px;
            overflow:hidden;
            background:#dce4e2;
        }
        .map-frame iframe{
            width:100%;
            height:100%;
            min-height:420px;
            border:0;
            display:block;
        }
        .map-placeholder{
            min-height:420px;
            display:grid;
            place-items:center;
            text-align:center;
            padding:30px;
            color:var(--muted);
        }
        .wish-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:16px;
        }
        .wish-card{
            background:#fff;
            border:1px solid var(--line);
            border-radius:26px;
            padding:22px;
        }
        .wish-name{
            font-weight:900;
            color:var(--deep);
            margin-bottom:8px;
        }
        .gift-box{
            padding:32px;
            border-radius:30px;
            background:linear-gradient(135deg,rgba(197,167,104,.14),rgba(119,143,131,.12));
            border:1px solid rgba(197,167,104,.28);
            color:var(--ink);
            white-space:pre-line;
            line-height:1.9;
        }
        .share-box{
            display:flex;
            gap:10px;
            max-width:780px;
            margin:0 auto;
        }
        .share-box input{
            min-height:54px;
            border-radius:999px;
            border:1px solid var(--line);
            padding:0 20px;
            background:#fff;
        }
        .footer-soft{
            text-align:center;
            color:var(--muted);
            padding:28px;
        }
        .music-player{
            position:fixed;
            right:22px;
            bottom:22px;
            z-index:50;
        }
        .music-btn{
            width:58px;
            height:58px;
            border-radius:999px;
            border:0;
            color:#fff;
            background:linear-gradient(135deg,var(--deep),var(--sage));
            display:grid;
            place-items:center;
            font-size:24px;
            box-shadow:0 18px 40px rgba(47,74,72,.28);
        }
        .music-btn.is-playing{
            animation:pulse 1.8s infinite;
        }
        @keyframes pulse{
            0%,100%{transform:scale(1)}
            50%{transform:scale(1.06)}
        }
        @media(max-width:991px){
            .hero{padding:32px 0 58px}
            .hero-grid,.message-card,.map-grid{grid-template-columns:1fr}
            .hero-copy{padding:34px 26px}
            .hero-visual{min-height:520px}
            .event-stamp{left:18px;right:18px;width:auto}
            .detail-grid{grid-template-columns:1fr}
        }
        @media(max-width:768px){
            .section{padding:64px 0}
            .gallery-grid{grid-template-columns:repeat(2,1fr);gap:12px}
            .countdown{grid-template-columns:repeat(2,1fr)}
            .wish-grid{grid-template-columns:1fr}
            .share-box{flex-direction:column}
            .hero-title{font-size:42px}
        }
    </style>
</head>
<body>
<div class="soft-orb orb-one"></div>
<div class="soft-orb orb-two"></div>

<div class="page">
    <header class="hero">
        <div class="container-wide">
            <div class="hero-grid">
                <div class="hero-copy">
                    <div class="kicker"><i class="bi bi-stars"></i> <?= html_escape($subtitle); ?></div>
                    <div class="guest-pill"><i class="bi bi-person-heart"></i> Kepada <?= html_escape($guestName); ?></div>
                    <h1 class="hero-title"><?= html_escape($title); ?></h1>
                    <p class="hero-subtitle"><?= nl2br(html_escape($coverText)); ?></p>
                    <div class="hero-actions">
                        <a href="#detail" class="btn-main"><i class="bi bi-calendar-heart"></i> Detail Acara</a>
                        <a href="#location" class="btn-soft"><i class="bi bi-geo-alt"></i> Lokasi</a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="photo-frame">
                        <img src="<?= html_escape($heroImage); ?>" alt="<?= html_escape($title); ?>">
                    </div>
                    <div class="event-stamp">
                        <small><?= html_escape($eventDateFormatted); ?></small>
                        <strong><?= html_escape($eventTime); ?></strong>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="section-sm">
        <div class="container-wide">
            <div class="card-soft message-card">
                <div class="message-badge">
                    <h3><?= html_escape($messageTitle); ?></h3>
                </div>
                <div class="message-content">
                    <h4>Invitation Message</h4>
                    <p><?= nl2br(html_escape($description)); ?></p>
                    <?php if (!empty($messageBody)): ?>
                        <hr style="border-color:rgba(38,50,58,.12);margin:24px 0">
                        <p><?= nl2br(html_escape($messageBody)); ?></p>
                    <?php endif; ?>
                    <div class="mt-4 fw-bold">Hormat kami,<br><?= html_escape($senderName); ?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="detail">
        <div class="container-wide">
            <div class="section-head">
                <div class="kicker"><i class="bi bi-calendar2-check"></i> Event Detail</div>
                <h2 class="section-title">Waktu & Tempat Acara</h2>
                <p class="section-subtitle">Detail acara yang dapat disesuaikan dari data project.</p>
            </div>
            <div class="detail-grid">
                <div class="detail-card">
                    <div>
                        <div class="detail-icon"><i class="bi bi-calendar-event"></i></div>
                        <span>Tanggal</span>
                        <strong><?= html_escape($eventDateFormatted); ?></strong>
                    </div>
                </div>
                <div class="detail-card">
                    <div>
                        <div class="detail-icon"><i class="bi bi-clock"></i></div>
                        <span>Waktu</span>
                        <strong><?= html_escape($eventTime); ?></strong>
                    </div>
                </div>
                <div class="detail-card">
                    <div>
                        <div class="detail-icon"><i class="bi bi-pin-map"></i></div>
                        <span>Tempat</span>
                        <strong><?= html_escape($locationName); ?></strong>
                    </div>
                </div>
            </div>

            <?php if (!empty($eventDateISO)): ?>
                <div class="countdown" id="countdown" data-date="<?= html_escape($eventDateISO); ?>">
                    <div class="count-item"><strong id="cdDays">0</strong><span>Hari</span></div>
                    <div class="count-item"><strong id="cdHours">0</strong><span>Jam</span></div>
                    <div class="count-item"><strong id="cdMinutes">0</strong><span>Menit</span></div>
                    <div class="count-item"><strong id="cdSeconds">0</strong><span>Detik</span></div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if (!empty($galleryItems)): ?>
        <section class="section" id="gallery">
            <div class="container-wide">
                <div class="section-head">
                    <div class="kicker"><i class="bi bi-images"></i> Gallery</div>
                    <h2 class="section-title">Galeri Acara</h2>
                    <p class="section-subtitle">Kumpulan foto yang ditampilkan dari data gallery project.</p>
                </div>
                <div class="gallery-grid">
                    <?php foreach ($galleryItems as $img): ?>
                        <div class="gallery-item">
                            <img src="<?= html_escape($img); ?>" alt="Gallery">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="section" id="location">
        <div class="container-wide">
            <div class="card-soft map-grid">
                <div class="map-info">
                    <div class="kicker"><i class="bi bi-geo-alt"></i> Location</div>
                    <h3><?= html_escape($locationName); ?></h3>
                    <?php if (!empty($locationAddress)): ?>
                        <p><?= nl2br(html_escape($locationAddress)); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($mapUrl)): ?>
                        <a href="<?= html_escape($mapUrl); ?>" target="_blank" class="btn-main mt-3"><i class="bi bi-map"></i> Buka Google Maps</a>
                    <?php endif; ?>
                </div>
                <div class="map-frame">
                    <?php if (!empty($mapEmbed)): ?>
                        <?= $mapEmbed; ?>
                    <?php else: ?>
                        <div class="map-placeholder">
                            <div>
                                <i class="bi bi-map fs-1"></i>
                                <p class="mt-3 mb-0">Embed maps belum tersedia.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php if ($giftEnabled): ?>
        <section class="section-sm">
            <div class="container-wide">
                <div class="section-head">
                    <div class="kicker"><i class="bi bi-gift"></i> Gift Info</div>
                    <h2 class="section-title">Informasi Tambahan</h2>
                </div>
                <div class="gift-box"><?= nl2br(html_escape($giftInfo)); ?></div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($wishes)): ?>
        <section class="section-sm">
            <div class="container-wide">
                <div class="section-head">
                    <div class="kicker"><i class="bi bi-chat-heart"></i> Wishes</div>
                    <h2 class="section-title">Ucapan & Doa</h2>
                </div>
                <div class="wish-grid">
                    <?php foreach ($wishes as $wish): ?>
                        <div class="wish-card">
                            <div class="wish-name"><?= html_escape($wish->guest_name ?? $wish->name ?? 'Tamu'); ?></div>
                            <div><?= nl2br(html_escape($wish->message ?? $wish->wish ?? '')); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="section-sm">
        <div class="container-wide">
            <div class="card-soft p-4 p-md-5 text-center">
                <div class="kicker"><i class="bi bi-share"></i> Share</div>
                <h2 class="section-title">Bagikan Undangan</h2>
                <p class="section-subtitle mb-4">Salin link undangan untuk dibagikan kepada keluarga, sahabat, atau tamu undangan.</p>
                <div class="share-box">
                    <input id="inviteLink" class="form-control" value="<?= html_escape($inviteUrl); ?>" readonly>
                    <button class="btn-main" type="button" onclick="copyInviteLink()"><i class="bi bi-clipboard-check"></i> Salin Link</button>
                </div>
            </div>
        </div>
    </section>

    <footer class="section-sm">
        <div class="container-wide">
            <div class="footer-soft">Terima kasih atas perhatian, doa, dan kehadiran Anda.</div>
        </div>
    </footer>
</div>

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
            daysEl.textContent='0';
            hoursEl.textContent='0';
            minutesEl.textContent='0';
            secondsEl.textContent='0';
            return;
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
