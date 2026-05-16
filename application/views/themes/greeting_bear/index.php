<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($project->title ?: 'Greeting Bear'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <?php
    $title = $project->title ?: 'Greeting Bear';
    $subtitle = $project->subtitle ?: 'A little bear brings a sweet message';
    $coverText = $project->cover_text ?: 'Sebuah ucapan kecil yang dikirim dengan penuh kehangatan.';
    $receiver = $guest_name ?: ($project->receiver_name ?: 'Someone Special');
    $sender = $project->sender_name ?: 'Your Friend';
    $message = $project->message_body ?: 'Semoga harimu dipenuhi senyum, bahagia, dan hal-hal baik yang datang tanpa henti.';
    $hero = !empty($project->hero_image) ? asset_or_url($project->hero_image) : '';
    $hasMusic = !empty($project->music_url);
    ?>

    <style>
        :root {
            --cream: #fff5df;
            --pink: #ff8fb3;
            --pink-dark: #e65386;
            --brown: #7a4b2b;
            --soft-brown: #b98256;
            --white: #ffffff;
            --muted: #9a7358;
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
            color: var(--brown);
            background:
                radial-gradient(circle at 12% 10%, rgba(255, 183, 207, .65), transparent 28%),
                radial-gradient(circle at 88% 18%, rgba(255, 221, 142, .7), transparent 26%),
                linear-gradient(180deg, #fff9eb 0%, #fff2f7 55%, #ffe8f1 100%);
            overflow-x: hidden;
        }

        .font-cute {
            font-family: 'Baloo 2', cursive
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            padding: 46px 0;
            overflow: hidden;
        }

        .container {
            width: min(1120px, 92%);
            margin: auto;
            position: relative;
            z-index: 2;
        }

        .grid {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 46px;
            align-items: center;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            color: var(--pink-dark);
            padding: 10px 16px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 900;
            box-shadow: 0 14px 35px rgba(230, 83, 134, .15);
            margin-bottom: 18px;
        }

        .title {
            font-size: clamp(48px, 8vw, 92px);
            line-height: .9;
            color: var(--pink-dark);
            margin: 0 0 18px;
            text-shadow: 0 12px 0 rgba(255, 255, 255, .9);
        }

        .cover {
            font-size: 20px;
            line-height: 1.8;
            max-width: 620px;
            color: var(--muted);
            margin: 0 0 26px;
        }

        .mini-card {
            display: inline-block;
            background: rgba(255, 255, 255, .85);
            border: 4px solid rgba(255, 255, 255, .8);
            border-radius: 32px;
            padding: 22px 26px;
            box-shadow: 0 22px 60px rgba(122, 75, 43, .14);
        }

        .mini-label {
            font-size: 12px;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--soft-brown);
            font-weight: 900;
        }

        .receiver {
            font-size: 34px;
            margin: 2px 0 0;
            color: var(--brown);
        }

        .btn-open {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 24px;
            padding: 15px 26px;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--pink), var(--pink-dark));
            color: #fff;
            font-weight: 900;
            text-decoration: none;
            box-shadow: 0 18px 42px rgba(230, 83, 134, .32);
        }

        .bear-stage {
            position: relative;
            min-height: 520px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bear-card {
            position: relative;
            width: min(420px, 100%);
            min-height: 480px;
            background: #fff;
            border-radius: 42px;
            padding: 24px;
            box-shadow: 0 35px 90px rgba(122, 75, 43, .18);
            transform: rotate(2deg);
        }

        .photo {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 30px;
            background: #ffe3ed;
            display: block;
        }

        .bear-emoji {
            font-size: 118px;
            text-align: center;
            animation: bounce 2.4s ease-in-out infinite;
            margin-top: 18px;
        }

        .bear-note {
            background: #fff7df;
            border-radius: 28px;
            padding: 18px;
            text-align: center;
            font-weight: 800;
            color: var(--soft-brown);
        }

        .section {
            padding: 82px 0;
        }

        .message-box {
            background: #fff;
            border-radius: 42px;
            padding: 42px;
            box-shadow: 0 28px 80px rgba(122, 75, 43, .12);
            max-width: 880px;
            margin: auto;
            position: relative;
            overflow: hidden;
        }

        .message-box:before {
            content: "🐾";
            position: absolute;
            right: 26px;
            top: 20px;
            font-size: 74px;
            opacity: .08;
        }

        .section-title {
            font-size: clamp(36px, 5vw, 64px);
            line-height: 1;
            margin: 0 0 20px;
            color: var(--pink-dark);
        }

        .message {
            font-size: 20px;
            line-height: 1.9;
            color: var(--muted);
        }

        .from {
            margin-top: 28px;
            padding-top: 22px;
            border-top: 2px dashed #ffd2df;
        }

        .closing {
            text-align: center;
            background: linear-gradient(135deg, #ff8fb3, #ffc35c);
            color: #fff;
            border-radius: 42px;
            padding: 46px 26px;
            box-shadow: 0 28px 70px rgba(230, 83, 134, .24);
        }

        .closing h2 {
            font-size: clamp(34px, 5vw, 58px);
            margin: 0 0 12px;
        }

        .floating {
            position: absolute;
            pointer-events: none;
            animation: floaty 5s ease-in-out infinite;
            opacity: .78;
        }

        .f1 {
            top: 13%;
            left: 7%;
            font-size: 36px
        }

        .f2 {
            bottom: 16%;
            left: 10%;
            font-size: 30px;
            animation-delay: 1s
        }

        .f3 {
            top: 16%;
            right: 7%;
            font-size: 34px;
            animation-delay: 1.6s
        }

        .f4 {
            bottom: 18%;
            right: 9%;
            font-size: 32px;
            animation-delay: 2.2s
        }

        .music-btn {
            position: fixed;
            right: 22px;
            bottom: 22px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 0;
            z-index: 30;
            color: #fff;
            font-size: 20px;
            background: linear-gradient(135deg, var(--pink), var(--pink-dark));
            box-shadow: 0 18px 45px rgba(230, 83, 134, .42);
            cursor: pointer;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0) rotate(-2deg)
            }

            50% {
                transform: translateY(-16px) rotate(2deg)
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

        @media(max-width:850px) {
            .hero {
                min-height: auto;
                padding: 60px 0 34px;
                text-align: center;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .cover {
                margin-left: auto;
                margin-right: auto;
                font-size: 17px;
            }

            .bear-stage {
                min-height: auto;
            }

            .bear-card {
                transform: none;
                min-height: auto;
            }

            .photo {
                height: 220px;
            }

            .section {
                padding: 58px 0;
            }

            .message-box {
                padding: 30px 24px;
            }

            .message {
                font-size: 17px;
            }
        }
    </style>
</head>

<body>

    <?php if (!empty($is_preview)): ?>
        <div style="position:fixed;top:14px;left:50%;transform:translateX(-50%);z-index:50;background:#fff3cd;color:#7a4b2b;padding:10px 18px;border-radius:999px;font-weight:900;box-shadow:0 12px 35px rgba(0,0,0,.12)">
            Preview Mode
        </div>
    <?php endif; ?>

    <?php if ($hasMusic): ?>
        <audio id="bgMusic" loop>
            <source src="<?= asset_or_url($project->music_url); ?>">
        </audio>
        <button class="music-btn" id="musicBtn" type="button">♫</button>
    <?php endif; ?>

    <section class="hero">
        <div class="floating f1">🍯</div>
        <div class="floating f2">🌸</div>
        <div class="floating f3">💌</div>
        <div class="floating f4">🐾</div>

        <div class="container">
            <div class="grid">
                <div>
                    <div class="badge">🐻 <?= html_escape($subtitle); ?></div>
                    <h1 class="title font-cute"><?= html_escape($title); ?></h1>
                    <p class="cover"><?= html_escape($coverText); ?></p>

                    <div class="mini-card">
                        <div class="mini-label">Special For</div>
                        <h2 class="receiver font-cute"><?= html_escape($receiver); ?></h2>
                        <div style="color:var(--muted);font-weight:800">From <?= html_escape($sender); ?></div>
                    </div>

                    <br>
                    <a href="#message" class="btn-open">Buka Pesan Manis 💌</a>
                </div>

                <div class="bear-stage">
                    <div class="bear-card">
                        <?php if ($hero): ?>
                            <img class="photo" src="<?= $hero; ?>" alt="<?= html_escape($title); ?>">
                        <?php endif; ?>

                        <div class="bear-emoji">🐻💐</div>

                        <div class="bear-note">
                            Ada pesan kecil yang dibawa khusus untuk <?= html_escape($receiver); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="message">
        <div class="container">
            <div class="message-box">
                <div class="mini-label">Personal Message</div>
                <h2 class="section-title font-cute">Dear <?= html_escape($receiver); ?></h2>

                <div class="message">
                    <?= nl2br(html_escape($message)); ?>
                </div>

                <div class="from">
                    <div style="color:var(--muted);font-weight:800">With warm wishes,</div>
                    <h3 class="font-cute" style="font-size:34px;margin:4px 0 0;color:var(--brown)">
                        <?= html_escape($sender); ?>
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <section class="section" style="padding-top:0">
        <div class="container">
            <div class="closing">
                <h2 class="font-cute">Big Bear Hug For You 🐻</h2>
                <p style="font-size:18px;margin:0 auto 24px;max-width:620px;line-height:1.8">
                    Semoga kartu kecil ini membawa senyum hangat dan membuat hari kamu terasa lebih manis.
                </p>
                <!-- <a href="<?= site_url(); ?>" style="display:inline-block;background:#fff;color:var(--pink-dark);padding:14px 24px;border-radius:999px;text-decoration:none;font-weight:900">
                    Buat Greeting Card Juga
                </a> -->
            </div>
        </div>
    </section>

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