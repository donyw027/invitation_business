<?php
$title = $project->title ?? 'Greeting Sunny Bunny';
$subtitle = $project->subtitle ?? 'A cheerful bunny message';
$coverText = $project->cover_text ?? 'Sebuah ucapan cerah yang dibawa oleh kelinci kecil untuk seseorang yang spesial.';
$message = $project->message_body ?? 'Semoga harimu terasa ringan, cerah, dan penuh hal-hal manis yang membuatmu tersenyum.';
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


    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --cream: #fff7df;
            --sun: #ffd86b;
            --peach: #ffb48a;
            --coral: #ff7f76;
            --green: #8fbf8f;
            --mint: #eaffea;
            --brown: #6b4a31;
            --brown-soft: #9a7657;
            --white: #fff;
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
                radial-gradient(circle at 12% 8%, rgba(255, 216, 107, .8), transparent 26%),
                radial-gradient(circle at 88% 14%, rgba(255, 180, 138, .48), transparent 26%),
                radial-gradient(circle at 18% 88%, rgba(143, 191, 143, .35), transparent 28%),
                linear-gradient(180deg, #fffaf0 0%, #fff3dc 52%, #ffe7d3 100%);
        }

        .font-bunny {
            font-family: 'Baloo 2', cursive;
        }

        .page {
            position: relative;
            min-height: 100vh;
        }

        .page:before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            opacity: .25;
            background-image:
                radial-gradient(circle, rgba(107, 74, 49, .18) 1.5px, transparent 2px);
            background-size: 28px 28px;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            padding: 54px 0;
            overflow: hidden;
        }

        .container {
            width: min(1120px, 92%);
            margin: auto;
            position: relative;
            z-index: 2;
        }

        .story-card {
            background: rgba(255, 255, 255, .72);
            border: 3px solid rgba(255, 255, 255, .85);
            border-radius: 48px;
            padding: 30px;
            box-shadow: 0 35px 100px rgba(107, 74, 49, .14);
            backdrop-filter: blur(14px);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 36px;
            align-items: center;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--mint);
            color: var(--green);
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 900;
            box-shadow: 0 12px 28px rgba(143, 191, 143, .18);
            margin-bottom: 18px;
        }

        .title {
            font-size: clamp(48px, 7.8vw, 98px);
            line-height: .9;
            margin: 0 0 18px;
            color: var(--coral);
            text-shadow: 6px 6px 0 rgba(255, 216, 107, .45);
        }

        .cover {
            font-size: 20px;
            line-height: 1.85;
            color: var(--brown-soft);
            max-width: 600px;
            margin: 0 0 26px;
        }

        .name-pill {
            display: inline-grid;
            grid-template-columns: auto 1fr;
            gap: 14px;
            align-items: center;
            background: #fff;
            border-radius: 28px;
            padding: 16px 22px;
            box-shadow: 0 18px 48px rgba(107, 74, 49, .1);
        }

        .bunny-face {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            background: linear-gradient(135deg, #fff, #ffe2d1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
        }

        .label {
            font-size: 11px;
            font-weight: 900;
            letter-spacing: .15em;
            text-transform: uppercase;
            color: var(--brown-soft);
        }

        .receiver {
            font-size: 32px;
            line-height: 1;
            margin: 3px 0 0;
            color: var(--brown);
        }

        .open-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 28px;
            padding: 15px 28px;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--coral), var(--peach));
            color: #fff;
            text-decoration: none;
            font-weight: 900;
            box-shadow: 0 18px 40px rgba(255, 127, 118, .26);
        }

        .visual-panel {
            position: relative;
            min-height: 560px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sun {
            position: absolute;
            top: 8%;
            right: 10%;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: var(--sun);
            box-shadow: 0 0 0 18px rgba(255, 216, 107, .25), 0 0 60px rgba(255, 216, 107, .5);
            animation: pulseSun 4s ease-in-out infinite;
        }

        .photo-book {
            position: relative;
            width: min(430px, 92%);
            background: #fff;
            padding: 18px;
            border-radius: 38px 38px 90px 38px;
            box-shadow: 0 35px 90px rgba(107, 74, 49, .18);
            transform: rotate(2deg);
            z-index: 2;
        }

        .photo-book:before {
            content: "";
            position: absolute;
            left: 22px;
            right: 22px;
            bottom: 22px;
            height: 32px;
            background: repeating-linear-gradient(90deg, #ffd86b 0 14px, #ffb48a 14px 28px);
            border-radius: 18px;
            opacity: .9;
        }

        .photo-book img {
            width: 100%;
            height: 440px;
            object-fit: cover;
            border-radius: 28px;
            display: block;
            background: var(--cream);
        }

        .bunny-sticker {
            position: absolute;
            left: -36px;
            bottom: 55px;
            width: 126px;
            height: 126px;
            border-radius: 42% 42% 48% 48%;
            background: #fff7f3;
            border: 8px solid #fff;
            box-shadow: 0 20px 50px rgba(107, 74, 49, .16);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 62px;
            z-index: 4;
            animation: bunnyHop 3.2s ease-in-out infinite;
        }

        .carrot {
            position: absolute;
            right: -8px;
            top: 42%;
            background: #fff;
            border-radius: 24px;
            padding: 12px 16px;
            font-size: 36px;
            box-shadow: 0 18px 42px rgba(107, 74, 49, .12);
            transform: rotate(12deg);
            z-index: 4;
        }

        .section {
            padding: 88px 0;
            position: relative;
        }

        .message-wrap {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            align-items: center;
        }

        .message-deco {
            background: linear-gradient(160deg, var(--green), #b8d99b);
            border-radius: 50px;
            min-height: 430px;
            padding: 38px;
            color: #fff;
            box-shadow: 0 28px 80px rgba(143, 191, 143, .25);
            position: relative;
            overflow: hidden;
        }

        .message-deco:before {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .18);
            right: -70px;
            bottom: -70px;
        }

        .message-deco h2 {
            font-size: clamp(38px, 5vw, 66px);
            line-height: .96;
            margin: 0 0 16px;
        }

        .deco-animal {
            position: absolute;
            right: 36px;
            bottom: 28px;
            font-size: 96px;
        }

        .message-card {
            background: #fff;
            border-radius: 50px;
            padding: 42px;
            box-shadow: 0 30px 90px rgba(107, 74, 49, .12);
            position: relative;
            overflow: hidden;
        }

        .message-card:before {
            content: "🐰";
            position: absolute;
            right: 20px;
            top: 16px;
            font-size: 110px;
            opacity: .06;
        }

        .message-title {
            font-size: clamp(36px, 5vw, 64px);
            line-height: 1;
            margin: 0 0 20px;
            color: var(--coral);
        }

        .message {
            font-size: 20px;
            line-height: 1.95;
            color: var(--brown-soft);
        }

        .signature {
            margin-top: 30px;
            padding-top: 22px;
            border-top: 2px dashed rgba(255, 127, 118, .28);
        }

        .closing {
            background: #fff;
            border-radius: 52px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            box-shadow: 0 30px 90px rgba(107, 74, 49, .14);
        }

        .closing-text {
            padding: 52px;
            background: linear-gradient(135deg, #ffd86b, #ffb48a);
        }

        .closing-text h2 {
            font-size: clamp(36px, 5vw, 64px);
            line-height: 1;
            margin: 0 0 16px;
            color: var(--brown);
        }

        .closing-visual {
            min-height: 330px;
            display: flex;
            align-items: center;
            justify-content: center;
            background:
                radial-gradient(circle at 30% 25%, #fff 0 22px, transparent 23px),
                radial-gradient(circle at 70% 35%, #fff 0 16px, transparent 17px),
                radial-gradient(circle at 45% 70%, #fff 0 26px, transparent 27px),
                var(--mint);
            font-size: 124px;
        }

        .cta {
            display: inline-block;
            background: var(--brown);
            color: #fff7df;
            padding: 14px 26px;
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
            background: linear-gradient(135deg, var(--coral), var(--peach));
            color: #fff;
            font-size: 21px;
            cursor: pointer;
            box-shadow: 0 18px 45px rgba(255, 127, 118, .36);
        }

        .float {
            position: absolute;
            pointer-events: none;
            animation: floaty 5s ease-in-out infinite;
            z-index: 1;
        }

        .f1 {
            top: 9%;
            left: 8%;
            font-size: 38px
        }

        .f2 {
            bottom: 14%;
            left: 6%;
            font-size: 32px;
            animation-delay: 1s
        }

        .f3 {
            top: 17%;
            right: 5%;
            font-size: 34px;
            animation-delay: 2s
        }

        @keyframes bunnyHop {

            0%,
            100% {
                transform: translateY(0) rotate(-4deg)
            }

            50% {
                transform: translateY(-18px) rotate(4deg)
            }
        }

        @keyframes pulseSun {

            0%,
            100% {
                transform: scale(1)
            }

            50% {
                transform: scale(1.06)
            }
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

        @media(max-width:900px) {
            .hero {
                min-height: auto;
                padding: 46px 0 34px;
            }

            .story-card {
                padding: 22px;
                border-radius: 38px;
            }

            .hero-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .cover {
                margin-left: auto;
                margin-right: auto;
                font-size: 17px;
            }

            .name-pill {
                grid-template-columns: 1fr;
                justify-items: center;
            }

            .visual-panel {
                min-height: auto;
                padding: 30px 0 10px;
            }

            .photo-book {
                transform: none;
            }

            .photo-book img {
                height: 330px;
            }

            .sun {
                width: 110px;
                height: 110px;
                top: 0;
                right: 2%;
            }

            .bunny-sticker {
                width: 96px;
                height: 96px;
                left: -8px;
                bottom: 35px;
                font-size: 48px;
            }

            .message-wrap {
                grid-template-columns: 1fr;
            }

            .message-deco {
                min-height: 260px;
                text-align: center;
            }

            .deco-animal {
                position: relative;
                right: auto;
                bottom: auto;
                margin-top: 18px;
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
                padding: 38px 24px;
                text-align: center;
            }

            .closing-visual {
                min-height: 220px;
                font-size: 96px;
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

            <div class="float f1">🥕</div>
            <div class="float f2">🌼</div>
            <div class="float f3">✨</div>

            <div class="container">

                <div class="story-card">

                    <div class="hero-grid">

                        <div>
                            <div class="badge">
                                🐰 <?= html_escape($subtitle); ?>
                            </div>

                            <h1 class="title font-bunny">
                                <?= html_escape($title); ?>
                            </h1>

                            <p class="cover">
                                <?= html_escape($coverText); ?>
                            </p>

                            <div class="name-pill">
                                <div class="bunny-face">🐰</div>

                                <div>
                                    <div class="label">Special For</div>
                                    <h2 class="receiver font-bunny">
                                        <?= html_escape($receiver); ?>
                                    </h2>
                                    <div style="font-weight:900;color:var(--brown-soft)">
                                        From <?= html_escape($sender); ?>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <a href="#message" class="open-btn">
                                Buka Pesan Ceria 🐰
                            </a>
                        </div>

                        <div class="visual-panel">

                            <div class="sun"></div>

                            <div class="photo-book">
                                <?php if ($hero): ?>
                                    <img src="<?= $hero; ?>" alt="<?= html_escape($title); ?>">
                                <?php endif; ?>
                            </div>

                            <div class="bunny-sticker">🐰</div>
                            <div class="carrot">🥕</div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <section class="section" id="message">

            <div class="container">

                <div class="message-wrap">

                    <div class="message-deco">
                        <div>
                            <div class="label" style="color:#fff">Sunny Bunny Note</div>

                            <h2 class="font-bunny">
                                A bright little message just for you.
                            </h2>

                            <p style="font-size:18px;line-height:1.8;max-width:420px">
                                Pesan kecil ini datang dengan suasana cerah, hangat, dan penuh senyum.
                            </p>
                        </div>

                        <div class="deco-animal">🐰🌼</div>
                    </div>

                    <div class="message-card">
                        <div class="label">Personal Message</div>

                        <h2 class="message-title font-bunny">
                            Dear <?= html_escape($receiver); ?>
                        </h2>

                        <div class="message">
                            <?= nl2br(html_escape($message)); ?>
                        </div>

                        <div class="signature">
                            <div style="font-weight:900;color:var(--brown-soft)">
                                With sunny wishes,
                            </div>

                            <h3 class="font-bunny" style="font-size:38px;margin:4px 0 0;color:var(--brown)">
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
                        <div class="label">Happy Little Ending</div>

                        <h2 class="font-bunny">
                            Keep hopping toward happy days.
                        </h2>

                        <p style="font-size:18px;line-height:1.8;color:var(--brown);max-width:560px">
                            Semoga kartu ini membawa sedikit cahaya, banyak senyum, dan rasa hangat untuk harimu.
                        </p>

                        <!-- <a href="<?= site_url(); ?>" class="cta">
                    Buat Greeting Card Juga
                </a> -->
                    </div>

                    <div class="closing-visual">
                        🐰☀️
                    </div>

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