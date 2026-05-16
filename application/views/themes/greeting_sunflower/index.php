<?php
$title = $project->title ?? 'Greeting Sunflower';
$subtitle = $project->subtitle ?? 'A warm little sunshine message';
$coverText = $project->cover_text ?? 'Sebuah ucapan hangat seperti matahari pagi untuk seseorang yang spesial.';
$message = $project->message_body ?? 'Semoga harimu selalu cerah, penuh senyum, dan dipenuhi hal-hal baik yang tumbuh seperti bunga matahari.';
$receiver = $guest_name ?: ($project->receiver_name ?? 'Someone Special');
$sender = $project->sender_name ?? 'Someone';
$hero = !empty($project->hero_image) ? asset_or_url($project->hero_image) : '';
$hasMusic = !empty($project->music_url);
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= html_escape($title); ?></title>
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">


    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --sun: #ffd45a;
            --sun-soft: #fff4c7;
            --cream: #fffaf0;
            --brown: #6b3f1f;
            --brown-soft: #9b6b3f;
            --orange: #f7a629;
            --leaf: #8aa247;
            --white: #ffffff;
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
            font-family: 'Nunito', sans-serif;
            color: var(--brown);
            background:
                radial-gradient(circle at 8% 12%, rgba(255, 212, 90, .75), transparent 28%),
                radial-gradient(circle at 90% 6%, rgba(247, 166, 41, .28), transparent 26%),
                linear-gradient(180deg, #fff8dc 0%, #fffaf0 42%, #ffe9a8 100%);
        }

        .font-display {
            font-family: 'DM Serif Display', serif;
        }

        .sunflower-page {
            position: relative;
            min-height: 100vh;
        }

        .sunflower-page:before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            opacity: .35;
            background-image:
                radial-gradient(circle at 20px 20px, rgba(107, 63, 31, .12) 2px, transparent 2px);
            background-size: 34px 34px;
        }

        .hero {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 110px 1fr 1.02fr;
            position: relative;
        }

        .side-ribbon {
            background: linear-gradient(180deg, var(--brown), #8b5628);
            color: var(--sun);
            display: flex;
            align-items: center;
            justify-content: center;
            writing-mode: vertical-rl;
            text-orientation: mixed;
            letter-spacing: .25em;
            font-weight: 900;
            font-size: 13px;
            text-transform: uppercase;
        }

        .hero-content {
            display: flex;
            align-items: center;
            padding: 60px 44px;
            position: relative;
            z-index: 2;
        }

        .hero-inner {
            max-width: 680px;
        }

        .kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, .82);
            border: 2px solid rgba(107, 63, 31, .12);
            color: var(--brown);
            padding: 11px 18px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 900;
            box-shadow: 0 12px 30px rgba(107, 63, 31, .08);
            margin-bottom: 20px;
        }

        .title {
            font-size: clamp(52px, 8vw, 108px);
            line-height: .86;
            margin: 0 0 22px;
            color: var(--brown);
            text-shadow: 8px 8px 0 rgba(255, 212, 90, .45);
        }

        .cover {
            font-size: 20px;
            line-height: 1.85;
            color: var(--brown-soft);
            max-width: 590px;
            margin: 0 0 28px;
        }

        .name-ticket {
            background: rgba(255, 255, 255, .9);
            border: 2px solid rgba(107, 63, 31, .12);
            border-radius: 34px;
            padding: 24px 28px;
            display: inline-block;
            box-shadow: 0 24px 70px rgba(107, 63, 31, .13);
            position: relative;
        }

        .name-ticket:before {
            content: "🌻";
            position: absolute;
            right: -18px;
            top: -22px;
            font-size: 42px;
            transform: rotate(12deg);
        }

        .label {
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--brown-soft);
        }

        .receiver {
            font-size: 38px;
            margin: 6px 0 2px;
            color: var(--brown);
        }

        .open-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 28px;
            background: linear-gradient(135deg, var(--brown), #8a5527);
            color: #fff8dc;
            padding: 15px 28px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 900;
            box-shadow: 0 18px 40px rgba(107, 63, 31, .28);
        }

        .hero-visual {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 42px;
            overflow: hidden;
        }

        .sun-circle {
            position: absolute;
            width: 620px;
            height: 620px;
            border-radius: 50%;
            background: radial-gradient(circle, var(--sun) 0%, #ffc83e 52%, rgba(255, 200, 62, 0) 70%);
            right: -150px;
            top: 50%;
            transform: translateY(-50%);
            opacity: .85;
        }

        .photo-stack {
            position: relative;
            width: min(450px, 92%);
            z-index: 2;
        }

        .photo-frame {
            background: #fff;
            border: 14px solid #fff;
            border-bottom-width: 58px;
            border-radius: 16px;
            box-shadow: 0 36px 90px rgba(107, 63, 31, .22);
            transform: rotate(-4deg);
            position: relative;
        }

        .photo-frame:after {
            content: "sunshine memory";
            position: absolute;
            bottom: -42px;
            left: 0;
            width: 100%;
            text-align: center;
            color: var(--brown-soft);
            font-weight: 900;
            font-size: 14px;
        }

        .photo-frame img {
            display: block;
            width: 100%;
            height: 520px;
            object-fit: cover;
            border-radius: 8px;
            background: var(--sun-soft);
        }

        .sunflower-badge {
            position: absolute;
            right: -36px;
            bottom: 38px;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: #fff6c7;
            border: 8px solid var(--sun);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 58px;
            box-shadow: 0 18px 45px rgba(107, 63, 31, .18);
            z-index: 4;
            animation: bloom 4s ease-in-out infinite;
        }

        .section {
            padding: 92px 0;
            position: relative;
        }

        .container {
            width: min(1060px, 92%);
            margin: auto;
            position: relative;
            z-index: 2;
        }

        .message-layout {
            display: grid;
            grid-template-columns: .75fr 1.25fr;
            gap: 34px;
            align-items: stretch;
        }

        .message-side {
            background: linear-gradient(180deg, var(--brown), #8c5628);
            border-radius: 42px;
            color: var(--sun-soft);
            padding: 36px;
            box-shadow: 0 26px 70px rgba(107, 63, 31, .22);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 440px;
        }

        .message-side h2 {
            font-size: 48px;
            line-height: .95;
            margin: 0;
        }

        .message-card {
            background: rgba(255, 255, 255, .92);
            border: 2px solid rgba(107, 63, 31, .1);
            border-radius: 42px;
            padding: 42px;
            box-shadow: 0 28px 80px rgba(107, 63, 31, .12);
            position: relative;
            overflow: hidden;
        }

        .message-card:before {
            content: "🌻";
            position: absolute;
            right: 22px;
            top: 16px;
            font-size: 110px;
            opacity: .09;
        }

        .message-title {
            font-size: clamp(36px, 5vw, 66px);
            line-height: 1;
            margin: 0 0 22px;
            color: var(--orange);
        }

        .message {
            font-size: 20px;
            line-height: 1.95;
            color: var(--brown-soft);
        }

        .signature {
            margin-top: 30px;
            padding-top: 22px;
            border-top: 2px dashed rgba(107, 63, 31, .22);
        }

        .closing {
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            border-radius: 46px;
            background: #fff;
            box-shadow: 0 30px 90px rgba(107, 63, 31, .16);
        }

        .closing-text {
            padding: 50px;
            background: linear-gradient(135deg, #ffd45a, #f7a629);
        }

        .closing-text h2 {
            font-size: clamp(36px, 5vw, 64px);
            line-height: 1;
            margin: 0 0 16px;
            color: var(--brown);
        }

        .closing-pattern {
            min-height: 340px;
            background:
                radial-gradient(circle at 50% 50%, #6b3f1f 0 8px, transparent 9px),
                radial-gradient(circle at 50% 50%, #ffd45a 0 54px, transparent 55px),
                radial-gradient(circle at 15% 18%, #f7a629 0 45px, transparent 46px),
                radial-gradient(circle at 82% 24%, #8aa247 0 38px, transparent 39px),
                radial-gradient(circle at 30% 78%, #9b6b3f 0 42px, transparent 43px),
                #fff8dc;
            background-size: 120px 120px, 220px 220px, 160px 160px, 150px 150px, 170px 170px, auto;
        }

        .cta-btn {
            display: inline-block;
            background: var(--brown);
            color: #fff8dc;
            padding: 14px 24px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 900;
        }

        .music-btn {
            position: fixed;
            right: 22px;
            bottom: 22px;
            width: 62px;
            height: 62px;
            border-radius: 50%;
            border: 0;
            z-index: 50;
            color: #fff8dc;
            background: linear-gradient(135deg, var(--brown), #8a5527);
            font-size: 21px;
            cursor: pointer;
            box-shadow: 0 18px 45px rgba(107, 63, 31, .35);
        }

        .float {
            position: absolute;
            pointer-events: none;
            animation: floaty 5s ease-in-out infinite;
            z-index: 1;
        }

        .f1 {
            top: 12%;
            left: 16%;
            font-size: 38px
        }

        .f2 {
            bottom: 13%;
            left: 20%;
            font-size: 30px;
            animation-delay: 1.2s
        }

        .f3 {
            top: 18%;
            right: 10%;
            font-size: 34px;
            animation-delay: 2s
        }

        @keyframes floaty {

            0%,
            100% {
                transform: translateY(0) rotate(0)
            }

            50% {
                transform: translateY(-18px) rotate(7deg)
            }
        }

        @keyframes bloom {

            0%,
            100% {
                transform: rotate(0) scale(1)
            }

            50% {
                transform: rotate(8deg) scale(1.06)
            }
        }

        @media(max-width:900px) {
            .hero {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .side-ribbon {
                writing-mode: horizontal-tb;
                padding: 14px;
            }

            .hero-content {
                text-align: center;
                justify-content: center;
                padding: 54px 22px 30px;
            }

            .cover {
                margin-left: auto;
                margin-right: auto;
                font-size: 17px;
            }

            .hero-visual {
                min-height: auto;
                padding: 20px 22px 58px;
            }

            .photo-frame {
                transform: none;
            }

            .photo-frame img {
                height: 340px;
            }

            .sunflower-badge {
                width: 96px;
                height: 96px;
                right: -12px;
                font-size: 42px;
            }

            .message-layout {
                grid-template-columns: 1fr;
            }

            .message-side {
                min-height: auto;
                text-align: center;
            }

            .message-card {
                padding: 30px 24px;
            }

            .message {
                font-size: 17px;
            }

            .closing {
                grid-template-columns: 1fr;
            }

            .closing-text {
                padding: 36px 24px;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <div class="sunflower-page">

        <?php if ($hasMusic): ?>
            <audio id="bgMusic" loop>
                <source src="<?= asset_or_url($project->music_url); ?>">
            </audio>
            <button class="music-btn" id="musicBtn" type="button">♫</button>
        <?php endif; ?>

        <section class="hero">

            <div class="side-ribbon">
                <!-- Greeting Sunflower -->
            </div>

            <div class="hero-content">
                <div class="hero-inner">
                    <div class="kicker">
                        🌻 <?= html_escape($subtitle); ?>
                    </div>

                    <h1 class="title font-display">
                        <?= html_escape($title); ?>
                    </h1>

                    <p class="cover">
                        <?= html_escape($coverText); ?>
                    </p>

                    <div class="name-ticket">
                        <div class="label">Special For</div>
                        <h2 class="receiver font-display">
                            <?= html_escape($receiver); ?>
                        </h2>
                        <div style="font-weight:900;color:var(--brown-soft)">
                            From <?= html_escape($sender); ?>
                        </div>
                    </div>

                    <br>

                    <a href="#message" class="open-btn">
                        Buka Pesan Hangat 🌻
                    </a>
                </div>
            </div>

            <div class="hero-visual">
                <div class="float f1">🌻</div>
                <div class="float f2">🍯</div>
                <div class="float f3">✨</div>

                <div class="sun-circle"></div>

                <div class="photo-stack">
                    <div class="photo-frame">
                        <?php if ($hero): ?>
                            <img src="<?= $hero; ?>" alt="<?= html_escape($title); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="sunflower-badge">🌻</div>
                </div>
            </div>

        </section>

        <section class="section" id="message">
            <div class="container">

                <div class="message-layout">

                    <div class="message-side">
                        <div>
                            <div class="label" style="color:#ffeaa0">Sunshine Note</div>
                            <h2 class="font-display">
                                Warm words for a bright soul.
                            </h2>
                        </div>

                        <div style="font-size:54px;line-height:1">
                            🌻✨
                        </div>
                    </div>

                    <div class="message-card">
                        <div class="label">Personal Message</div>

                        <h2 class="message-title font-display">
                            Dear <?= html_escape($receiver); ?>
                        </h2>

                        <div class="message">
                            <?= nl2br(html_escape($message)); ?>
                        </div>

                        <div class="signature">
                            <div style="font-weight:900;color:var(--brown-soft)">
                                With warm wishes,
                            </div>

                            <h3 class="font-display" style="font-size:38px;margin:4px 0 0;color:var(--brown)">
                                <?= html_escape($sender); ?>
                            </h3>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section class="section" style="padding-top:0">
            <div class="container">

                <div class="closing">

                    <div class="closing-text">
                        <div class="label">Little Sunshine</div>

                        <h2 class="font-display">
                            Keep blooming beautifully.
                        </h2>

                        <p style="font-size:18px;line-height:1.8;color:var(--brown);max-width:520px">
                            Semoga kartu kecil ini membawa rasa hangat, senyum manis, dan energi positif untuk harimu.
                        </p>

                        <!-- <a href="<?= site_url(); ?>" class="cta-btn">
                            Buat Greeting Card Juga
                        </a> -->
                    </div>

                    <div class="closing-pattern"></div>

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