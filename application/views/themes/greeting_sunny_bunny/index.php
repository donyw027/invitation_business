<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= html_escape($project->title ?: 'Sunny Bunny Love'); ?></title>
    <style>
        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: 'Segoe UI', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, .7), transparent 30%),
                radial-gradient(circle at bottom right, rgba(255, 214, 102, .35), transparent 30%),
                linear-gradient(180deg, #fffdf2, #fff3b8, #ffe58f);
            overflow: hidden;
            position: relative;
        }

        .float-heart {
            position: fixed;
            font-size: 22px;
            opacity: .35;
            animation: floatUp linear infinite;
            pointer-events: none;
        }

        .float-heart:nth-child(1) {
            left: 8%;
            bottom: -30px;
            animation-duration: 9s;
        }

        .float-heart:nth-child(2) {
            left: 22%;
            bottom: -40px;
            animation-duration: 11s;
            animation-delay: 1s;
        }

        .float-heart:nth-child(3) {
            left: 48%;
            bottom: -35px;
            animation-duration: 10s;
            animation-delay: 2s;
        }

        .float-heart:nth-child(4) {
            left: 70%;
            bottom: -30px;
            animation-duration: 12s;
            animation-delay: .5s;
        }

        .float-heart:nth-child(5) {
            left: 88%;
            bottom: -45px;
            animation-duration: 9.5s;
            animation-delay: 1.7s;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(0) scale(.8);
                opacity: 0
            }

            15% {
                opacity: .35
            }

            100% {
                transform: translateY(-120vh) scale(1.2);
                opacity: 0
            }
        }

        .wrap {
            width: 100%;
            max-width: 460px;
            position: relative;
            z-index: 2;
        }

        .card {
            background: rgba(255, 255, 255, .78);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 34px;
            box-shadow: 0 22px 55px rgba(140, 110, 20, .18);
            overflow: hidden;
            position: relative;
        }

        .top {
            padding: 28px 24px 14px;
            text-align: center;
            position: relative;
        }

        .badge {
            display: inline-block;
            background: #fff6c7;
            color: #9a7700;
            font-size: 12px;
            font-weight: 700;
            padding: 8px 14px;
            border-radius: 999px;
            margin-bottom: 14px;
            box-shadow: 0 8px 16px rgba(255, 214, 102, .25);
        }

        .bunny-box {
            position: relative;
            height: 180px;
            margin-bottom: 8px;
        }

        .bunny {
            font-size: 100px;
            animation: bunnyBounce 2.8s ease-in-out infinite;
            display: inline-block;
            filter: drop-shadow(0 10px 18px rgba(0, 0, 0, .08));
        }

        @keyframes bunnyBounce {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-10px)
            }
        }

        .spark {
            position: absolute;
            font-size: 24px;
            animation: twinkle 2.5s ease-in-out infinite;
        }

        .spark.s1 {
            left: 70px;
            top: 10px;
        }

        .spark.s2 {
            right: 75px;
            top: 30px;
            animation-delay: .8s;
        }

        .spark.s3 {
            left: 110px;
            bottom: 22px;
            animation-delay: 1.4s;
        }

        .spark.s4 {
            right: 110px;
            bottom: 12px;
            animation-delay: 1.1s;
        }

        @keyframes twinkle {

            0%,
            100% {
                transform: scale(.9);
                opacity: .45
            }

            50% {
                transform: scale(1.2);
                opacity: 1
            }
        }

        .title {
            font-size: 34px;
            font-weight: 800;
            color: #7b5a00;
            margin: 0;
            line-height: 1.15;
        }

        .subtitle {
            margin: 10px 0 0;
            color: #8a7a55;
            font-size: 14px;
            line-height: 1.7;
        }

        .content {
            padding: 12px 24px 26px;
        }

        .to-name {
            text-align: center;
            font-size: 28px;
            font-weight: 800;
            color: #f59f00;
            margin: 6px 0 14px;
        }

        .message-box {
            background: #fffdf5;
            border: 1px dashed #f7d96a;
            border-radius: 24px;
            padding: 18px;
            color: #65573b;
            font-size: 15px;
            line-height: 1.9;
            white-space: pre-line;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .45);
        }

        .sender {
            margin-top: 14px;
            text-align: center;
            font-size: 14px;
            color: #7b6c4d;
        }

        .sender strong {
            color: #4b3f2b;
        }

        .love-row {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 14px;
            font-size: 20px;
        }

        .footer-glow {
            height: 18px;
            background: linear-gradient(90deg, #ffe58f, #ffd43b, #ffe58f);
            opacity: .6;
        }

        @media (max-width:520px) {
            .top {
                padding: 22px 18px 10px
            }

            .content {
                padding: 10px 18px 22px
            }

            .title {
                font-size: 28px
            }

            .to-name {
                font-size: 24px
            }

            .message-box {
                font-size: 14px
            }
        }
    </style>
</head>

<body>

    <div class="float-heart">💛</div>
    <div class="float-heart">💖</div>
    <div class="float-heart">✨</div>
    <div class="float-heart">💛</div>
    <div class="float-heart">💕</div>

    <div class="wrap">
        <div class="card">
            <div class="top">
                <div class="badge"><?= html_escape($project->message_title ?: 'Sunny Bunny Love'); ?></div>

                <div class="bunny-box">
                    <div class="spark s1">✨</div>
                    <div class="spark s2">💛</div>
                    <div class="spark s3">💕</div>
                    <div class="spark s4">✨</div>
                    <div class="bunny">🐰</div>
                </div>

                <h1 class="title"><?= html_escape($project->title ?: 'A Sweet Greeting For You'); ?></h1>
                <p class="subtitle">
                    <?= html_escape($project->cover_text ?: 'A warm little card with bunny magic, soft yellow vibes, and lots of love.'); ?>
                </p>
            </div>

            <div class="content">
                <div class="to-name"><?= html_escape($project->receiver_name ?: 'Someone Special'); ?></div>

                <div class="message-box"><?= nl2br(html_escape($project->message_body ?: 'Wishing you beautiful days, soft smiles, and happy little moments.')); ?></div>

                <div class="sender">
                    With love from <strong><?= html_escape($project->sender_name ?: 'Someone who cares'); ?></strong>
                </div>

                <div class="love-row">
                    <span>💛</span>
                    <span>🐰</span>
                    <span>💕</span>
                </div>
            </div>

            <div class="footer-glow"></div>
        </div>
    </div>

    <?php if (!empty($project->music_url)): ?>
        <audio autoplay loop>
            <source src="<?= html_escape($project->music_url); ?>" type="audio/mpeg">
        </audio>
    <?php endif; ?>

</body>

</html>