<?php
$title = $project->title ?? 'Cloudy Hug';
$subtitle = $project->subtitle ?? 'Soft dreamy greeting';
$coverText = $project->cover_text ?? 'A warm little cloud carrying sweet wishes.';
$message = $project->message_body ?? 'Semoga semua harimu terasa ringan, hangat, dan dipenuhi hal-hal baik.';
$receiver = $guest_name ?: ($project->receiver_name ?? 'Lovely Person');
$sender = $project->sender_name ?? 'Someone';
$hero = !empty($project->hero_image) ? asset_or_url($project->hero_image) : '';
$hasMusic = !empty($project->music_url);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Comfortaa:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">


    <title><?= html_escape($title); ?></title>

    <style>
        :root {
            --sky: #dff5ff;
            --sky2: #f7fcff;
            --blue: #74b9ff;
            --purple: #a29bfe;
            --soft: #f1fbff;
            --dark: #4d6580;
            --white: #fff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            overflow-x: hidden;
            font-family: 'Quicksand', sans-serif;
            color: var(--dark);
            background:
                radial-gradient(circle at top left, #dff4ff 0%, transparent 30%),
                radial-gradient(circle at bottom right, #efe7ff 0%, transparent 28%),
                linear-gradient(180deg, #f8fdff 0%, #eef9ff 45%, #f8f4ff 100%);
        }

        .font-cloud {
            font-family: 'Comfortaa', cursive;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 50px 0;
        }

        .container {
            width: min(1120px, 92%);
            margin: auto;
            position: relative;
            z-index: 2;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 42px;
            align-items: center;
        }

        .badge {
            display: inline-block;
            background: #fff;
            color: var(--blue);
            padding: 10px 18px;
            border-radius: 999px;
            font-weight: 800;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .06);
            margin-bottom: 18px;
        }

        .title {
            font-size: clamp(54px, 8vw, 102px);
            line-height: .92;
            margin: 0 0 18px;
            color: var(--blue);
        }

        .cover {
            font-size: 20px;
            line-height: 1.9;
            max-width: 580px;
        }

        .card {
            display: inline-block;
            background: rgba(255, 255, 255, .88);
            padding: 24px;
            border-radius: 34px;
            box-shadow: 0 22px 60px rgba(0, 0, 0, .08);
            margin-top: 10px;
        }

        .receiver {
            font-size: 36px;
            margin: 4px 0;
        }

        .btn-open {
            display: inline-block;
            margin-top: 28px;
            padding: 15px 28px;
            border-radius: 999px;
            text-decoration: none;
            color: #fff;
            font-weight: 900;
            background: linear-gradient(135deg, var(--blue), var(--purple));
            box-shadow: 0 18px 42px rgba(116, 185, 255, .28);
        }

        .visual {
            position: relative;
        }

        .photo-wrap {
            background: #fff;
            border-radius: 40px;
            padding: 16px;
            transform: rotate(-3deg);
            box-shadow: 0 35px 80px rgba(0, 0, 0, .1);
        }

        .photo-wrap img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 28px;
        }

        .cloud {
            position: absolute;
            background: #fff;
            border-radius: 999px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
        }

        .c1 {
            width: 130px;
            height: 50px;
            top: -15px;
            left: -30px;
        }

        .c2 {
            width: 90px;
            height: 40px;
            bottom: 30px;
            right: -20px;
        }

        .section {
            padding: 82px 0;
        }

        .message-box {
            max-width: 880px;
            margin: auto;
            background: rgba(255, 255, 255, .9);
            border-radius: 42px;
            padding: 42px;
            box-shadow: 0 28px 70px rgba(0, 0, 0, .08);
            position: relative;
            overflow: hidden;
        }

        .message-box:before {
            content: "☁️";
            position: absolute;
            right: 20px;
            top: 10px;
            font-size: 90px;
            opacity: .08;
        }

        .message-title {
            font-size: clamp(38px, 5vw, 66px);
            margin: 0 0 20px;
            color: var(--purple);
        }

        .message {
            font-size: 20px;
            line-height: 1.95;
        }

        .closing {
            background: linear-gradient(135deg, var(--blue), var(--purple));
            border-radius: 44px;
            padding: 54px 28px;
            text-align: center;
            color: #fff;
            box-shadow: 0 30px 80px rgba(116, 185, 255, .24);
        }

        .music-btn {
            position: fixed;
            right: 22px;
            bottom: 22px;
            width: 60px;
            height: 60px;
            border: none;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--blue), var(--purple));
            color: #fff;
            font-size: 20px;
            z-index: 50;
            cursor: pointer;
        }

        .float {
            position: absolute;
            animation: floaty 5s ease-in-out infinite;
        }

        .f1 {
            top: 12%;
            left: 8%;
            font-size: 34px
        }

        .f2 {
            bottom: 12%;
            left: 10%;
            font-size: 28px;
            animation-delay: 1s
        }

        .f3 {
            top: 18%;
            right: 8%;
            font-size: 30px;
            animation-delay: 2s
        }

        @keyframes floaty {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-20px)
            }
        }

        @media(max-width:860px) {

            .hero {
                min-height: auto;
                text-align: center;
                padding: 70px 0 40px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .cover {
                margin: auto;
                font-size: 17px;
            }

            .photo-wrap {
                transform: none;
            }

            .photo-wrap img {
                height: 330px;
            }

            .message-box {
                padding: 30px 22px;
            }

            .message {
                font-size: 17px;
            }
        }
    </style>
</head>

<body>

    <?php if ($hasMusic): ?>
        <audio id="bgMusic" loop>
            <source src="<?= asset_or_url($project->music_url); ?>">
        </audio>

        <button class="music-btn" id="musicBtn">♫</button>
    <?php endif; ?>

    <section class="hero">

        <div class="float f1">☁️</div>
        <div class="float f2">✨</div>
        <div class="float f3">💙</div>

        <div class="container">

            <div class="grid">

                <div>

                    <div class="badge">
                        Cloudy Hug Greeting
                    </div>

                    <h1 class="title font-cloud">
                        <?= html_escape($title); ?>
                    </h1>

                    <p class="cover">
                        <?= html_escape($coverText); ?>
                    </p>

                    <div class="card">

                        <div style="font-size:12px;font-weight:800;letter-spacing:.15em;color:#8aa2b7">
                            SPECIAL FOR
                        </div>

                        <h2 class="receiver font-cloud">
                            <?= html_escape($receiver); ?>
                        </h2>

                        <div style="font-weight:800;color:#8799aa">
                            from <?= html_escape($sender); ?>
                        </div>

                    </div>

                    <br>

                    <a href="#message" class="btn-open">
                        Open Message ☁️
                    </a>

                </div>

                <div class="visual">

                    <div class="cloud c1"></div>
                    <div class="cloud c2"></div>

                    <div class="photo-wrap">

                        <?php if ($hero): ?>
                            <img src="<?= $hero; ?>" alt="<?= html_escape($title); ?>">
                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="section" id="message">

        <div class="container">

            <div class="message-box">

                <div style="font-size:12px;font-weight:900;letter-spacing:.16em;color:#90a4b8;text-transform:uppercase">
                    Dreamy Message
                </div>

                <h2 class="message-title font-cloud">
                    Hello <?= html_escape($receiver); ?> ☁️
                </h2>

                <div class="message">
                    <?= nl2br(html_escape($message)); ?>
                </div>

                <div style="margin-top:28px;padding-top:22px;border-top:2px dashed #d8ebff">

                    <div style="color:#8aa2b7;font-weight:800">
                        warm wishes,
                    </div>

                    <h3 class="font-cloud" style="font-size:34px;margin:5px 0 0">
                        <?= html_escape($sender); ?>
                    </h3>

                </div>

            </div>

        </div>

    </section>

    <section class="section" style="padding-top:0">

        <div class="container">

            <div class="closing">

                <h2 class="font-cloud" style="font-size:clamp(36px,5vw,60px);margin:0 0 14px">
                    A Soft Hug For You ☁️
                </h2>

                <p style="font-size:18px;line-height:1.8;max-width:650px;margin:auto auto 24px">
                    Semoga semua hari kamu terasa ringan seperti awan dan sehangat pelukan kecil.
                </p>

                <a href="<?= site_url(); ?>" style="display:inline-block;background:#fff;color:var(--blue);padding:14px 26px;border-radius:999px;text-decoration:none;font-weight:900">
                    Create Your Greeting
                </a>

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