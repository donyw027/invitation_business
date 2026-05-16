<?php
$title = $project->title ?: 'Exclusive Event Invitation';
$subtitle = $project->subtitle ?: 'You Are Invited';
$coverText = $project->cover_text ?: 'Dengan penuh hormat, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara spesial ini.';
$message = $project->message_body ?: ($project->description ?: 'Kehadiran Anda akan menjadi kehormatan bagi kami dan menjadikan acara ini semakin berkesan.');
$hero = !empty($project->hero_image) ? asset_or_url($project->hero_image) : '';
$eventDate = !empty($project->event_date) ? $project->event_date : '';
$eventTime = !empty($project->event_time) ? $project->event_time : '';
$locationName = !empty($project->location_name) ? $project->location_name : '';
$locationAddress = !empty($project->location_address) ? $project->location_address : '';
$mapEmbed = !empty($project->map_embed) ? $project->map_embed : '';
$hasMusic = !empty($project->music_url);
$hasRsvp = !empty($project->rsvp_enabled);
$hasWish = !empty($project->wish_enabled);
$guestDisplay = !empty($guest_name) ? $guest_name : 'Special Guest';
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= html_escape($title); ?></title>
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">

    <meta name="theme-color" content="#090b13">

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --dark: #090b13;
            --navy: #10182b;
            --navy2: #16223a;
            --gold: #d6b36a;
            --gold2: #f1d891;
            --white: #ffffff;
            --soft: #f5f0e6;
            --muted: #aeb5c4;
            --line: rgba(214, 179, 106, .25);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
            color: var(--white);
            background:
                radial-gradient(circle at 12% 5%, rgba(214, 179, 106, .18), transparent 28%),
                radial-gradient(circle at 88% 12%, rgba(72, 98, 160, .20), transparent 30%),
                linear-gradient(180deg, #070912 0%, #10182b 44%, #090b13 100%);
        }

        .font-lux {
            font-family: 'Cormorant Garamond', serif;
        }

        .page {
            min-height: 100vh;
            position: relative;
        }

        .page:before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            opacity: .28;
            background-image:
                linear-gradient(rgba(214, 179, 106, .06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(214, 179, 106, .06) 1px, transparent 1px);
            background-size: 46px 46px;
        }

        .container {
            width: min(1140px, 92%);
            margin: auto;
            position: relative;
            z-index: 3;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 58px 0;
        }

        .hero:before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(9, 11, 19, .96) 0%, rgba(9, 11, 19, .74) 42%, rgba(9, 11, 19, .2) 100%),
                url('<?= $hero; ?>') center right/cover no-repeat;
            opacity: <?= $hero ? '1' : '.35'; ?>;
        }

        .hero:after {
            content: "";
            position: absolute;
            width: 720px;
            height: 720px;
            border: 1px solid rgba(214, 179, 106, .2);
            border-radius: 50%;
            right: -250px;
            top: 50%;
            transform: translateY(-50%);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.06fr .94fr;
            gap: 44px;
            align-items: center;
        }

        .hero-copy {
            position: relative;
            z-index: 4;
        }

        .kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 18px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .06);
            border: 1px solid var(--line);
            color: var(--gold2);
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .15em;
            text-transform: uppercase;
            backdrop-filter: blur(12px);
            margin-bottom: 24px;
        }

        .title {
            font-size: clamp(52px, 8vw, 112px);
            line-height: .88;
            margin: 0 0 24px;
            color: #fff;
            max-width: 780px;
            text-shadow: 0 22px 60px rgba(0, 0, 0, .36);
        }

        .cover {
            max-width: 640px;
            color: rgba(255, 255, 255, .72);
            font-size: 19px;
            line-height: 1.9;
            margin: 0 0 30px;
        }

        .guest-card {
            width: min(520px, 100%);
            background: linear-gradient(135deg, rgba(255, 255, 255, .12), rgba(255, 255, 255, .04));
            border: 1px solid var(--line);
            border-radius: 32px;
            padding: 26px 28px;
            backdrop-filter: blur(18px);
            box-shadow: 0 26px 80px rgba(0, 0, 0, .22);
        }

        .label {
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--gold2);
        }

        .guest-name {
            font-size: 34px;
            line-height: 1;
            margin: 8px 0 0;
            color: #fff;
        }

        .action-row {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 30px;
        }

        .btn-main,
        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 25px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 900;
        }

        .btn-main {
            background: linear-gradient(135deg, var(--gold), #9f7935);
            color: #080a12;
            box-shadow: 0 18px 42px rgba(214, 179, 106, .28);
        }

        .btn-ghost {
            color: #fff;
            border: 1px solid rgba(255, 255, 255, .18);
            background: rgba(255, 255, 255, .06);
            backdrop-filter: blur(10px);
        }

        .hero-panel {
            position: relative;
            z-index: 4;
        }

        .event-ticket {
            background: rgba(8, 11, 19, .76);
            border: 1px solid var(--line);
            border-radius: 40px;
            padding: 26px;
            box-shadow: 0 34px 100px rgba(0, 0, 0, .38);
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
        }

        .event-ticket:before {
            content: "";
            position: absolute;
            inset: 18px;
            border: 1px solid rgba(214, 179, 106, .18);
            border-radius: 30px;
            pointer-events: none;
        }

        .ticket-top {
            min-height: 280px;
            border-radius: 28px;
            background:
                linear-gradient(135deg, rgba(214, 179, 106, .18), rgba(255, 255, 255, .02)),
                <?= $hero ? "url('" . $hero . "') center/cover no-repeat" : "linear-gradient(135deg,#16223a,#090b13)" ?>;
            position: relative;
            overflow: hidden;
        }

        .ticket-top:after {
            content: "Photo";
            position: absolute;
            right: 22px;
            top: 22px;
            border: 1px solid rgba(214, 179, 106, .45);
            color: var(--gold2);
            border-radius: 999px;
            padding: 8px 13px;
            font-weight: 900;
            letter-spacing: .18em;
            font-size: 11px;
            background: rgba(0, 0, 0, .25);
        }

        .ticket-body {
            padding: 26px 10px 8px;
            position: relative;
            z-index: 2;
        }

        .ticket-title {
            font-size: 38px;
            line-height: 1;
            margin: 0 0 16px;
            color: var(--gold2);
        }

        .ticket-list {
            display: grid;
            gap: 14px;
        }

        .ticket-item {
            display: grid;
            grid-template-columns: 42px 1fr;
            gap: 12px;
            align-items: start;
            padding: 14px;
            border-radius: 20px;
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .08);
        }

        .ticket-icon {
            width: 42px;
            height: 42px;
            border-radius: 16px;
            background: rgba(214, 179, 106, .12);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold2);
            font-size: 21px;
        }

        .ticket-label {
            color: var(--muted);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .12em;
            margin-bottom: 4px;
        }

        .ticket-value {
            color: #fff;
            line-height: 1.55;
            font-weight: 700;
        }

        .section {
            padding: 94px 0;
            position: relative;
        }

        .section-head {
            text-align: center;
            max-width: 780px;
            margin: 0 auto 48px;
        }

        .section-kicker {
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--gold2);
            margin-bottom: 12px;
        }

        .section-title {
            font-size: clamp(40px, 6vw, 76px);
            line-height: .92;
            margin: 0;
            color: #fff;
        }

        .message-card {
            max-width: 920px;
            margin: auto;
            padding: 48px;
            border-radius: 42px;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, .1), rgba(255, 255, 255, .035));
            border: 1px solid var(--line);
            box-shadow: 0 30px 100px rgba(0, 0, 0, .25);
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
        }

        .message-card:before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: rgba(214, 179, 106, .12);
            right: -90px;
            top: -90px;
        }

        .message {
            position: relative;
            z-index: 2;
            color: rgba(255, 255, 255, .76);
            font-size: 20px;
            line-height: 2;
            text-align: center;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .info-card {
            padding: 30px 26px;
            border-radius: 34px;
            background: rgba(255, 255, 255, .07);
            border: 1px solid rgba(214, 179, 106, .2);
            box-shadow: 0 22px 70px rgba(0, 0, 0, .2);
            backdrop-filter: blur(18px);
            min-height: 210px;
        }

        .info-icon {
            width: 60px;
            height: 60px;
            border-radius: 22px;
            background: linear-gradient(135deg, rgba(214, 179, 106, .25), rgba(214, 179, 106, .08));
            color: var(--gold2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
            margin-bottom: 20px;
        }

        .info-title {
            font-size: 24px;
            line-height: 1;
            color: #fff;
            margin-bottom: 10px;
        }

        .info-text {
            color: rgba(255, 255, 255, .68);
            line-height: 1.75;
        }

        .map-shell {
            padding: 16px;
            border-radius: 40px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, .06);
            box-shadow: 0 30px 100px rgba(0, 0, 0, .25);
            backdrop-filter: blur(18px);
        }

        .map-shell iframe {
            width: 100%;
            min-height: 420px;
            border: 0;
            border-radius: 28px;
            display: block;
        }

        .rsvp-card {
            display: grid;
            grid-template-columns: .85fr 1.15fr;
            overflow: hidden;
            border-radius: 44px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, .07);
            box-shadow: 0 30px 100px rgba(0, 0, 0, .26);
        }

        .rsvp-side {
            padding: 48px;
            background: linear-gradient(135deg, #d6b36a, #8f6d2f);
            color: #0a0c14;
        }

        .rsvp-side h2 {
            font-size: clamp(36px, 5vw, 64px);
            line-height: .95;
            margin: 0 0 18px;
        }

        .rsvp-body {
            padding: 48px;
            color: rgba(255, 255, 255, .75);
            line-height: 1.9;
            font-size: 18px;
        }

        .closing {
            text-align: center;
            padding: 62px 30px;
            border-radius: 46px;
            background:
                radial-gradient(circle at 18% 20%, rgba(214, 179, 106, .2), transparent 26%),
                linear-gradient(135deg, #141d32, #070912);
            border: 1px solid var(--line);
            box-shadow: 0 36px 100px rgba(0, 0, 0, .26);
        }

        .closing h2 {
            font-size: clamp(40px, 6vw, 76px);
            line-height: .9;
            margin: 0 0 18px;
        }

        .closing p {
            max-width: 720px;
            margin: 0 auto;
            color: rgba(255, 255, 255, .7);
            font-size: 18px;
            line-height: 1.9;
        }

        .music-btn {
            position: fixed;
            right: 22px;
            bottom: 22px;
            width: 62px;
            height: 62px;
            border: 0;
            border-radius: 50%;
            z-index: 90;
            background: linear-gradient(135deg, var(--gold), #9f7935);
            color: #0a0c14;
            font-size: 21px;
            cursor: pointer;
            box-shadow: 0 18px 45px rgba(214, 179, 106, .35);
        }

        .float {
            position: absolute;
            pointer-events: none;
            color: rgba(214, 179, 106, .35);
            animation: floaty 5.5s ease-in-out infinite;
            font-size: 34px;
            z-index: 1;
        }

        .f1 {
            top: 11%;
            left: 5%
        }

        .f2 {
            bottom: 15%;
            left: 8%;
            animation-delay: 1.2s
        }

        .f3 {
            top: 18%;
            right: 6%;
            animation-delay: 2s
        }

        @keyframes floaty {

            0%,
            100% {
                transform: translateY(0) rotate(0)
            }

            50% {
                transform: translateY(-18px) rotate(8deg)
            }
        }

        @media(max-width:920px) {
            .hero {
                min-height: auto;
                padding: 44px 0;
            }

            .hero:before {
                background:
                    linear-gradient(180deg, rgba(9, 11, 19, .96), rgba(9, 11, 19, .76)),
                    url('<?= $hero; ?>') center/cover no-repeat;
            }

            .hero-grid {
                grid-template-columns: 1fr;
            }

            .hero-copy {
                text-align: center;
            }

            .cover {
                margin-left: auto;
                margin-right: auto;
                font-size: 17px;
            }

            .guest-card {
                margin-left: auto;
                margin-right: auto;
            }

            .action-row {
                justify-content: center;
            }

            .ticket-top {
                min-height: 220px;
            }

            .section {
                padding: 66px 0;
            }

            .message-card {
                padding: 32px 24px;
            }

            .message {
                text-align: left;
                font-size: 17px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .rsvp-card {
                grid-template-columns: 1fr;
            }

            .rsvp-side,
            .rsvp-body {
                padding: 34px 26px;
                text-align: center;
            }

            .map-shell iframe {
                min-height: 330px;
            }
        }
    </style>
</head>

<body>

    <div class="page">

        <?php if ($hasMusic): ?>
            <audio id="bgMusic" loop>
                <source src="<?= asset_or_url($project->music_url); ?>">
            </audio>
            <button class="music-btn" id="musicBtn" type="button">♫</button>
        <?php endif; ?>

        <section class="hero">
            <div class="float f1">✦</div>
            <div class="float f2">◆</div>
            <div class="float f3">✧</div>

            <div class="container">
                <div class="hero-grid">

                    <div class="hero-copy">
                        <div class="kicker">
                            <?= html_escape($subtitle); ?>
                        </div>

                        <h1 class="title font-lux">
                            <?= html_escape($title); ?>
                        </h1>

                        <p class="cover">
                            <?= html_escape($coverText); ?>
                        </p>

                        <div class="guest-card">
                            <div class="label">Invited Guest</div>
                            <div class="guest-name font-lux">
                                <?= html_escape($guestDisplay); ?>
                            </div>
                        </div>

                        <div class="action-row">
                            <a href="#detail" class="btn-main">View Event Detail</a>
                            <?php if ($mapEmbed): ?>
                                <a href="#location" class="btn-ghost">Open Location</a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="hero-panel">
                        <div class="event-ticket">

                            <div class="ticket-top"></div>

                            <div class="ticket-body">
                                <h2 class="ticket-title font-lux">Event Pass</h2>

                                <div class="ticket-list">

                                    <div class="ticket-item">
                                        <div class="ticket-icon">📅</div>
                                        <div>
                                            <div class="ticket-label">Date</div>
                                            <div class="ticket-value">
                                                <?= $eventDate ? html_escape(date('d F Y', strtotime($eventDate))) : 'To be announced'; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ticket-item">
                                        <div class="ticket-icon">⏰</div>
                                        <div>
                                            <div class="ticket-label">Time</div>
                                            <div class="ticket-value">
                                                <?= $eventTime ? html_escape($eventTime) : 'See invitation detail'; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ticket-item">
                                        <div class="ticket-icon">📍</div>
                                        <div>
                                            <div class="ticket-label">Venue</div>
                                            <div class="ticket-value">
                                                <?= html_escape($locationName ?: 'Event Venue'); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">

                <div class="section-head">
                    <div class="section-kicker">Invitation Message</div>
                    <h2 class="section-title font-lux">A Special Invitation</h2>
                </div>

                <div class="message-card">
                    <div class="message">
                        <?= nl2br(html_escape($message)); ?>
                    </div>
                </div>

            </div>
        </section>

        <section class="section" id="detail">
            <div class="container">

                <div class="section-head">
                    <div class="section-kicker">Event Information</div>
                    <h2 class="section-title font-lux">Date, Time & Venue</h2>
                </div>

                <div class="detail-grid">

                    <div class="info-card">
                        <div class="info-icon">📅</div>
                        <div class="info-title font-lux">Date</div>
                        <div class="info-text">
                            <?= $eventDate ? html_escape(date('d F Y', strtotime($eventDate))) : 'To be announced'; ?>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">⏰</div>
                        <div class="info-title font-lux">Time</div>
                        <div class="info-text">
                            <?= $eventTime ? html_escape($eventTime) : 'See invitation detail'; ?>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">📍</div>
                        <div class="info-title font-lux"><?= html_escape($locationName ?: 'Venue'); ?></div>
                        <div class="info-text">
                            <?= $locationAddress ? nl2br(html_escape($locationAddress)) : 'Address will be shared soon.'; ?>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <?php if ($mapEmbed): ?>
            <section class="section" id="location" style="padding-top:0">
                <div class="container">

                    <div class="section-head">
                        <div class="section-kicker">Location</div>
                        <h2 class="section-title font-lux">Event Location</h2>
                    </div>

                    <div class="map-shell">
                        <?= $mapEmbed; ?>
                    </div>

                </div>
            </section>
        <?php endif; ?>

        <?php if ($hasRsvp || $hasWish): ?>
            <section class="section" style="padding-top:0">
                <div class="container">

                    <div class="rsvp-card">
                        <div class="rsvp-side">
                            <div class="label" style="color:#10182b">Guest Response</div>
                            <h2 class="font-lux">Your presence means a lot.</h2>
                        </div>

                        <div class="rsvp-body">
                            <?php if ($hasRsvp): ?>
                                <p>
                                    Dengan hormat, kami mengundang Anda untuk hadir dan menjadi bagian dari momen penuh makna ini.


                                </p>
                            <?php endif; ?>

                            <?php if ($hasWish): ?>
                                <p>
                                    Semoga momen ini membawa kebaikan, ketenangan, dan kebersamaan bagi kita semua.
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </section>
        <?php endif; ?>

        <section class="section" style="padding-top:0">
            <div class="container">
                <div class="closing">
                    <h2 class="font-lux">Thank You</h2>
                    <p>
                        Merupakan kehormatan bagi kami apabila Anda berkenan hadir dan menjadi bagian dari momen spesial ini.
                    </p>
                </div>
            </div>
        </section>

    </div>

    <script>
        const musicBtn = document.getElementById('musicBtn');
        const bgMusic = document.getElementById('bgMusic');

        if (musicBtn && bgMusic) {
            let playing = false;

            function playMusic() {
                bgMusic.play().then(function() {
                    playing = true;
                    musicBtn.innerHTML = '❚❚';
                }).catch(function() {});
            }

            musicBtn.addEventListener('click', function() {
                if (!playing) {
                    playMusic();
                } else {
                    bgMusic.pause();
                    playing = false;
                    musicBtn.innerHTML = '♫';
                }
            });

            document.addEventListener('click', function() {
                if (!playing) playMusic();
            }, {
                once: true
            });
        }
    </script>

</body>

</html>