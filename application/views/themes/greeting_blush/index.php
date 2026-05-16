<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <?php
    $hero = !empty($project->hero_image) ? asset_or_url($project->hero_image) : base_url('assets/img/default-cover.jpg');
    $receiver = $guest_name ?: ($project->receiver_name ?: $project->title);
    $sender = $project->sender_name ?: 'Seseorang yang spesial';
    $title = $project->title ?: 'Blush Wishes';
    $subtitle = $project->message_title ?: ($project->subtitle ?: 'A Special Message For You');
    $coverText = $project->cover_text ?: 'Sebuah pesan manis untuk seseorang yang istimewa.';
    $message = $project->message_body ?: ($project->description ?: 'Semoga hari ini membawa bahagia, doa baik, dan kenangan indah yang selalu tersimpan di hati.');
    $hasMusic = !empty($project->music_url);
    ?>

    <style>
        :root {
            --dark: #301722;
            --muted: #8d6070;
            --accent: #ec5f86;
            --accent2: #ffb4c8;
            --soft: #fff0f5;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            min-height: 100vh;
            color: var(--dark);
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(255, 188, 210, .8), transparent 34%),
                radial-gradient(circle at bottom right, rgba(255, 219, 229, .9), transparent 32%),
                linear-gradient(180deg, #fff8fb 0%, #ffffff 46%, #fff1f6 100%);
            overflow-x: hidden;
        }

        .font-serif {
            font-family: 'Playfair Display', serif
        }

        .preview-alert {
            position: fixed;
            top: 16px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 99;
            border: 0;
            border-radius: 999px;
            padding: 10px 18px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .12);
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            padding: 42px 0;
            overflow: hidden;
        }

        .hero:before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(255, 248, 251, .95), rgba(255, 248, 251, .76), rgba(255, 248, 251, .45)),
                url('<?= $hero; ?>') center right/cover no-repeat;
        }

        .hero:after {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            right: -130px;
            bottom: -130px;
            border-radius: 50%;
            background: rgba(236, 95, 134, .16);
        }

        .hero-inner {
            position: relative;
            z-index: 2;
        }

        .badge-soft {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 16px;
            border-radius: 999px;
            background: #fff;
            color: var(--accent);
            font-weight: 800;
            font-size: 12px;
            letter-spacing: .12em;
            text-transform: uppercase;
            box-shadow: 0 12px 30px rgba(236, 95, 134, .15);
        }

        .hero-title {
            font-size: clamp(48px, 8vw, 96px);
            line-height: .92;
            color: var(--accent);
            text-shadow: 0 12px 35px rgba(236, 95, 134, .18);
        }

        .hero-text {
            max-width: 580px;
            color: var(--muted);
            font-size: 18px;
            line-height: 1.85;
        }

        .photo-card {
            position: relative;
            padding: 14px;
            background: #fff;
            border-radius: 34px;
            transform: rotate(2deg);
            box-shadow: 0 35px 80px rgba(48, 23, 34, .16);
        }

        .photo-card img {
            width: 100%;
            height: 470px;
            object-fit: cover;
            border-radius: 24px;
        }

        .message-card {
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .85);
            border-radius: 36px;
            padding: 36px;
            box-shadow: 0 25px 75px rgba(48, 23, 34, .1);
        }

        .btn-main {
            border: 0;
            border-radius: 999px;
            padding: 14px 26px;
            background: linear-gradient(135deg, var(--accent), #c93d68);
            color: #fff;
            font-weight: 800;
            box-shadow: 0 16px 36px rgba(236, 95, 134, .34);
        }

        .btn-main:hover {
            color: #fff
        }

        .section {
            padding: 84px 0;
        }

        .section-title {
            font-size: clamp(34px, 5vw, 60px);
            line-height: 1;
        }

        .quote-mark {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 22px;
            background: var(--soft);
            color: var(--accent);
            font-size: 26px;
            margin-bottom: 20px;
        }

        .closing-box {
            border-radius: 38px;
            padding: 52px 26px;
            background: linear-gradient(135deg, #ec5f86, #ff9eb8);
            color: #fff;
            box-shadow: 0 28px 80px rgba(236, 95, 134, .3);
        }

        .music-btn {
            position: fixed;
            right: 22px;
            bottom: 22px;
            width: 58px;
            height: 58px;
            border-radius: 50%;
            border: 0;
            z-index: 90;
            background: linear-gradient(135deg, var(--accent), #b9345e);
            color: #fff;
            box-shadow: 0 18px 45px rgba(236, 95, 134, .42);
        }

        .floating-heart {
            position: absolute;
            color: rgba(236, 95, 134, .22);
            animation: floaty 5s ease-in-out infinite;
        }

        .heart-1 {
            top: 16%;
            left: 7%;
            font-size: 32px
        }

        .heart-2 {
            top: 68%;
            left: 11%;
            font-size: 22px;
            animation-delay: 1s
        }

        .heart-3 {
            top: 22%;
            right: 8%;
            font-size: 28px;
            animation-delay: 1.7s
        }

        @keyframes floaty {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-18px)
            }
        }

        @media(max-width:768px) {
            .hero {
                text-align: center;
                min-height: auto;
                padding: 74px 0 48px;
            }

            .hero:before {
                background:
                    linear-gradient(180deg, rgba(255, 248, 251, .96), rgba(255, 248, 251, .86)),
                    url('<?= $hero; ?>') center/cover no-repeat;
            }

            .hero-text {
                font-size: 16px;
                margin-left: auto;
                margin-right: auto;
            }

            .photo-card {
                transform: none;
                margin-top: 24px;
            }

            .photo-card img {
                height: 360px;
            }

            .section {
                padding: 62px 0;
            }

            .message-card {
                padding: 26px;
            }
        }
    </style>
</head>

<body>

    <?php if ($is_preview): ?>
        <div class="alert alert-warning preview-alert mb-0">
            <i class="fa-solid fa-eye me-2"></i> Preview Mode
        </div>
    <?php endif; ?>

    <?php if ($hasMusic): ?>
        <audio id="bgMusic" loop>
            <source src="<?= asset_or_url($project->music_url); ?>">
        </audio>
        <button class="music-btn" id="musicBtn" type="button">
            <i class="fa-solid fa-music"></i>
        </button>
    <?php endif; ?>

    <section class="hero">
        <i class="fa-solid fa-heart floating-heart heart-1"></i>
        <i class="fa-solid fa-heart floating-heart heart-2"></i>
        <i class="fa-solid fa-heart floating-heart heart-3"></i>

        <div class="container hero-inner">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="badge-soft mb-4">
                        <i class="fa-solid fa-envelope-open-heart"></i>
                        <?= html_escape($subtitle); ?>
                    </div>

                    <h1 class="hero-title font-serif mb-4">
                        <?= html_escape($title); ?>
                    </h1>

                    <p class="hero-text mb-4">
                        <?= html_escape($coverText); ?>
                    </p>

                    <div class="message-card d-inline-block text-start">
                        <div class="small text-uppercase fw-bold text-muted mb-2">Special For</div>
                        <h2 class="font-serif fw-bold mb-2"><?= html_escape($receiver); ?></h2>
                        <div class="text-muted">
                            From <?= html_escape($sender); ?>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="#message" class="btn btn-main">
                            <i class="fa-solid fa-heart me-2"></i>Buka Pesan
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="photo-card">
                        <img src="<?= $hero; ?>" alt="<?= html_escape($title); ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="message">
        <div class="container">
            <div class="message-card mx-auto" style="max-width:860px">
                <div class="quote-mark">
                    <i class="fa-solid fa-quote-left"></i>
                </div>

                <div class="text-uppercase small fw-bold text-muted mb-2">Personal Message</div>

                <h2 class="section-title font-serif mb-4">
                    Untuk <?= html_escape($receiver); ?>
                </h2>

                <p class="lead text-muted mb-4" style="line-height:1.9">
                    <?= nl2br(html_escape($message)); ?>
                </p>

                <div class="pt-4 border-top">
                    <span class="text-muted">With love,</span>
                    <h4 class="font-serif fw-bold mt-1 mb-0"><?= html_escape($sender); ?></h4>
                </div>
            </div>
        </div>
    </section>

    <section class="section pt-0">
        <div class="container">
            <div class="closing-box text-center">
                <div class="small text-uppercase fw-bold mb-2" style="letter-spacing:.14em">
                    Thank You
                </div>

                <h2 class="font-serif fw-bold mb-3">
                    Semoga pesan ini menjadi kenangan manis
                </h2>

                <p class="mb-4 opacity-75">
                    Terima kasih sudah membuka kartu ucapan digital ini.
                </p>

                <!-- <a href="<?= site_url(); ?>" class="btn btn-light rounded-pill px-4 py-3 fw-bold">
                    Buat Kartu Juga
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
                    musicBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
                }).catch(function() {});
            }

            musicBtn.addEventListener('click', function() {
                if (!playing) {
                    playMusic();
                } else {
                    bgMusic.pause();
                    playing = false;
                    musicBtn.innerHTML = '<i class="fa-solid fa-music"></i>';
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