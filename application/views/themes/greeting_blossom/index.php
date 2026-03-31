<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ff7aa8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <?php
    $receiver = $guest_name ?: ($project->receiver_name ?: $project->title ?: 'Someone Special');
    $sender = $project->sender_name ?: 'Someone Special';
    $messageTitle = $project->message_title ?: ($project->title ?: 'A Special Greeting');
    $messageBody = $project->message_body ?: ($project->description ?: 'Ada pesan manis untukmu.');
    $subtitle = $project->subtitle ?: 'Ada sesuatu yang manis dan spesial buat kamu hari ini ✨';
    $coverText = $project->cover_text ?: 'Sebuah kartu kecil dengan banyak rasa sayang di dalamnya.';
    $description = $project->description ?: 'A little note made especially for you.';
    $coverImage = asset_or_url($project->hero_image, '');
    $musicUrl = !empty($project->music_url) ? asset_or_url($project->music_url) : '';
    $shareUrl = function_exists('project_url') ? project_url($project) : current_url();

    $memoryDate = !empty($project->event_date) ? date('d F Y', strtotime($project->event_date)) : '';
    $memoryTime = !empty($project->event_time) ? $project->event_time : '';
    $memoryPlace = !empty($project->location_name) ? $project->location_name : '';
    $memoryAddress = !empty($project->location_address) ? $project->location_address : '';
    $hasMemory = !empty($memoryDate) || !empty($memoryTime) || !empty($memoryPlace) || !empty($memoryAddress);
    ?>

    <style>
        :root {
            --bg1: #fff8fb;
            --bg2: #fff3d7;
            --pink: #ff79aa;
            --pink-dark: #f04b8d;
            --pink-soft: #ffe5ef;
            --yellow: #ffd86d;
            --purple: #8b6cf7;
            --purple-soft: #efe8ff;
            --text: #564b62;
            --muted: #8d8096;
            --white: #ffffff;
            --shadow: 0 24px 55px rgba(114, 83, 134, .16);
            --radius-xl: 34px;
            --radius-lg: 26px;
            --radius-md: 20px;
        }

        * {
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
            color: var(--text);
            overflow-x: hidden;
            background:
                radial-gradient(circle at 12% 15%, rgba(255, 121, 170, .18), transparent 24%),
                radial-gradient(circle at 85% 18%, rgba(255, 216, 109, .20), transparent 24%),
                radial-gradient(circle at 82% 86%, rgba(139, 108, 247, .10), transparent 22%),
                linear-gradient(135deg, var(--bg1), var(--bg2));
        }

        .float,
        .petal {
            position: fixed;
            pointer-events: none;
            z-index: 0;
        }

        .float {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            filter: blur(8px);
            opacity: .35;
            animation: floaty 8s ease-in-out infinite;
        }

        .f1 {
            left: 4%;
            top: 8%;
            background: #ffb3cf
        }

        .f2 {
            right: 5%;
            top: 14%;
            background: #ffe088;
            animation-delay: 1s
        }

        .f3 {
            left: 8%;
            bottom: 8%;
            background: #d6cbff;
            animation-delay: 2s
        }

        .petal {
            font-size: 20px;
            opacity: .55;
            animation: fall linear infinite;
        }

        .p1 {
            left: 8%;
            top: -10%;
            animation-duration: 10s
        }

        .p2 {
            left: 28%;
            top: -8%;
            animation-duration: 12s;
            animation-delay: 1.2s
        }

        .p3 {
            left: 50%;
            top: -12%;
            animation-duration: 11s;
            animation-delay: .6s
        }

        .p4 {
            left: 74%;
            top: -7%;
            animation-duration: 13s;
            animation-delay: 2s
        }

        .p5 {
            left: 90%;
            top: -10%;
            animation-duration: 9s;
            animation-delay: 1.5s
        }

        @keyframes floaty {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-15px)
            }
        }

        @keyframes fall {
            0% {
                transform: translateY(-20px) rotate(0deg)
            }

            100% {
                transform: translateY(120vh) translateX(22px) rotate(280deg)
            }
        }

        .wrap {
            max-width: 1140px;
            margin: 0 auto;
            padding: 26px 16px 44px;
            position: relative;
            z-index: 2;
        }

        .preview-alert {
            max-width: 960px;
            margin: 0 auto 16px;
            background: #fff7d7;
            border: 1px solid #ffe28a;
            color: #8b6200;
            padding: 12px 16px;
            border-radius: 16px;
            font-weight: 700;
        }

        .hero {
            text-align: center;
            margin-bottom: 22px;
        }

        .kicker {
            display: inline-flex;
            gap: 8px;
            align-items: center;
            background: rgba(255, 255, 255, .78);
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, .92);
            box-shadow: 0 10px 22px rgba(255, 121, 170, .12);
            font-size: 13px;
            font-weight: 800;
            color: #d9467d;
        }

        .hero h1 {
            margin: 16px 0 8px;
            font-size: clamp(30px, 5vw, 58px);
            line-height: 1.06;
            font-weight: 800;
        }

        .hero p {
            max-width: 720px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.75;
        }

        .layout {
            display: grid;
            grid-template-columns: 1.02fr .98fr;
            gap: 22px;
            align-items: start;
        }

        .card-shell {
            background: rgba(255, 255, 255, .74);
            border: 1px solid rgba(255, 255, 255, .94);
            box-shadow: var(--shadow);
            backdrop-filter: blur(16px);
            border-radius: 32px;
            overflow: hidden;
            position: relative;
        }

        .scene {
            min-height: 760px;
            padding: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .side {
            padding: 18px;
        }

        .phone {
            width: min(395px, 100%);
            background: #fff;
            border-radius: 36px;
            border: 8px solid #fff6fb;
            box-shadow: 0 26px 60px rgba(90, 66, 110, .18);
            overflow: hidden;
            position: relative;
        }

        .phone-top {
            padding: 14px 16px 0;
            display: flex;
            justify-content: center;
        }

        .notch {
            width: 132px;
            height: 24px;
            border-radius: 999px;
            background: #2f2937;
        }

        .screen {
            min-height: 670px;
            padding: 18px 18px 22px;
            background:
                radial-gradient(circle at top right, rgba(255, 216, 109, .34), transparent 28%),
                radial-gradient(circle at top left, rgba(255, 121, 170, .18), transparent 24%),
                linear-gradient(180deg, #fffdf6, #fff8fb 45%, #fff8ef 100%);
            position: relative;
            overflow: hidden;
        }

        .cloud {
            position: absolute;
            border-radius: 999px;
            background: rgba(255, 255, 255, .92);
        }

        .c1 {
            width: 92px;
            height: 28px;
            top: 54px;
            left: 18px
        }

        .c2 {
            width: 78px;
            height: 24px;
            top: 86px;
            right: 18px
        }

        .c1:before,
        .c1:after,
        .c2:before,
        .c2:after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: inherit;
        }

        .c1:before {
            width: 36px;
            height: 36px;
            left: 10px;
            top: -14px
        }

        .c1:after {
            width: 42px;
            height: 42px;
            left: 34px;
            top: -20px
        }

        .c2:before {
            width: 28px;
            height: 28px;
            left: 8px;
            top: -11px
        }

        .c2:after {
            width: 36px;
            height: 36px;
            left: 28px;
            top: -16px
        }

        .sun {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 35%, #fff8d1, #ffd55b 68%);
            position: absolute;
            top: 42px;
            right: 26px;
            box-shadow: 0 0 0 10px rgba(255, 213, 91, .16);
            animation: bounce 3.5s ease-in-out infinite;
        }

        .star {
            position: absolute;
            font-size: 14px;
            opacity: .8;
            animation: twinkle 2.4s ease-in-out infinite;
        }

        .s1 {
            top: 40px;
            left: 34px
        }

        .s2 {
            top: 104px;
            left: 92px;
            animation-delay: .8s
        }

        .s3 {
            top: 132px;
            right: 92px;
            animation-delay: 1.2s
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-8px)
            }
        }

        @keyframes twinkle {

            0%,
            100% {
                opacity: .35;
                transform: scale(.9)
            }

            50% {
                opacity: 1;
                transform: scale(1.15)
            }
        }

        .cover {
            margin-top: 108px;
            background: rgba(255, 255, 255, .80);
            border: 1px solid rgba(255, 255, 255, .96);
            border-radius: 30px;
            box-shadow: 0 18px 40px rgba(255, 121, 170, .12);
            padding: 18px;
            text-align: center;
            position: relative;
            z-index: 2;
            transition: transform .8s cubic-bezier(.2, .8, .2, 1), opacity .5s ease;
        }

        .cover-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fff4c9;
            color: #9a6a00;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .mascot-wrap {
            position: relative;
            height: 180px;
            margin-bottom: 10px;
        }

        .bear {
            width: 150px;
            height: 134px;
            position: absolute;
            left: 50%;
            top: 10px;
            transform: translateX(-50%);
        }

        .ear,
        .face,
        .hand,
        .blush {
            position: absolute
        }

        .ear {
            width: 42px;
            height: 42px;
            background: #9f774d;
            border-radius: 50%;
            top: 6px;
        }

        .ear.left {
            left: 18px
        }

        .ear.right {
            right: 18px
        }

        .ear:after {
            content: '';
            position: absolute;
            inset: 10px;
            background: #f6c9ba;
            border-radius: 50%;
        }

        .face {
            width: 120px;
            height: 106px;
            background: #b98c5b;
            border-radius: 46% 46% 42% 42%;
            left: 15px;
            top: 20px;
        }

        .face:before,
        .face:after {
            content: '';
            position: absolute;
            width: 8px;
            height: 12px;
            background: #3c2f3f;
            border-radius: 50%;
            top: 34px;
        }

        .face:before {
            left: 34px
        }

        .face:after {
            right: 34px
        }

        .snout {
            position: absolute;
            width: 54px;
            height: 38px;
            background: #f8dec9;
            border-radius: 50%;
            left: 33px;
            top: 42px;
        }

        .snout:before {
            content: '';
            position: absolute;
            width: 12px;
            height: 9px;
            background: #3c2f3f;
            border-radius: 50% 50% 60% 60%;
            left: 21px;
            top: 8px;
        }

        .snout:after {
            content: '';
            position: absolute;
            width: 18px;
            height: 8px;
            border-bottom: 3px solid #3c2f3f;
            border-radius: 0 0 20px 20px;
            left: 18px;
            top: 16px;
        }

        .blush {
            width: 16px;
            height: 10px;
            background: #ff8fb7;
            opacity: .55;
            border-radius: 50%;
            top: 56px;
        }

        .blush.left {
            left: 18px
        }

        .blush.right {
            right: 18px
        }

        .hand {
            width: 34px;
            height: 46px;
            background: #b98c5b;
            border-radius: 20px;
            top: 82px;
        }

        .hand.left {
            left: 8px;
            transform: rotate(20deg)
        }

        .hand.right {
            right: 8px;
            transform: rotate(-20deg)
        }

        .bouquet {
            position: absolute;
            left: 50%;
            bottom: 4px;
            transform: translateX(-50%);
            width: 92px;
            height: 78px;
        }

        .flower {
            position: absolute;
            font-size: 24px;
            animation: wiggle 3s ease-in-out infinite;
        }

        .fl1 {
            left: 0;
            top: 12px
        }

        .fl2 {
            left: 28px;
            top: 0;
            animation-delay: .6s
        }

        .fl3 {
            right: 0;
            top: 14px;
            animation-delay: 1.1s
        }

        .wrap-stem {
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            font-size: 30px;
        }

        @keyframes wiggle {

            0%,
            100% {
                transform: rotate(0)
            }

            50% {
                transform: rotate(8deg)
            }
        }

        .title-script {
            font-family: 'Pacifico', cursive;
            font-size: 34px;
            color: var(--pink-dark);
            line-height: 1.2;
            margin: 8px 0 4px;
        }

        .cover-text {
            margin: 0 auto 14px;
            max-width: 280px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .open-btn,
        .soft-btn {
            appearance: none;
            border: 0;
            cursor: pointer;
            border-radius: 18px;
            padding: 14px 16px;
            font-family: inherit;
            font-weight: 800;
            font-size: 15px;
            transition: .25s ease;
        }

        .open-btn {
            background: linear-gradient(135deg, var(--pink), var(--pink-dark));
            color: #fff;
            box-shadow: 0 16px 30px rgba(255, 79, 147, .22);
        }

        .soft-btn.primary {
            background: linear-gradient(135deg, #ffd76a, #ffb84d);
            color: #6b4d00;
        }

        .soft-btn.secondary {
            background: #fff0f6;
            color: #d9467d;
        }

        .soft-btn.whatsapp {
            background: #25D366;
            color: #fff;
        }

        .open-btn:hover,
        .soft-btn:hover {
            transform: translateY(-2px);
        }

        .letter {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 18px;
            background: #fff;
            border-radius: 28px 28px 24px 24px;
            box-shadow: 0 20px 40px rgba(107, 79, 128, .14);
            padding: 18px 18px 16px;
            min-height: 440px;
            transform: translateY(120%);
            transition: transform .9s cubic-bezier(.2, .8, .2, 1);
            z-index: 3;
            overflow: hidden;
            border: 1px solid #fff1f6;
        }

        .letter:before {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 10px;
            background: linear-gradient(90deg, #ffd76a, #ff73a8, #8b6cf7);
        }

        .opened .cover {
            transform: translateY(-36px) scale(.96);
            opacity: 0;
            pointer-events: none;
        }

        .opened .letter {
            transform: translateY(0);
        }

        .letter-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: 4px;
            margin-bottom: 14px;
        }

        .mini-badge {
            background: #fff3c8;
            color: #a16c00;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
        }

        .bubble {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: #fff0f6;
            display: grid;
            place-items: center;
            font-size: 20px;
        }

        .for-name {
            font-family: 'Pacifico', cursive;
            font-size: 32px;
            color: #7c5cf0;
            line-height: 1.15;
            margin: 4px 0 6px;
        }

        .subtitle {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 12px;
        }

        .msg {
            background: #fff9fc;
            border: 1px dashed #ffd3e4;
            border-radius: 20px;
            padding: 16px;
            font-size: 15px;
            line-height: 1.9;
            color: #5a4f69;
            white-space: pre-line;
        }

        .sign {
            margin-top: 14px;
            padding-top: 12px;
            border-top: 1px dashed #ebdff7;
            color: #7d7390;
            font-size: 14px;
        }

        .sign strong {
            color: #413550
        }

        .bottom-bar {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
            margin-top: 14px;
        }

        .music-note {
            position: absolute;
            font-size: 18px;
            opacity: 0;
            z-index: 4;
            pointer-events: none;
        }

        .opened .music-note {
            animation: musicFloat 2.5s ease-in-out infinite;
        }

        .m1 {
            right: 42px;
            bottom: 170px
        }

        .m2 {
            right: 68px;
            bottom: 138px;
            animation-delay: .8s
        }

        @keyframes musicFloat {

            0%,
            100% {
                opacity: 0;
                transform: translateY(6px)
            }

            35% {
                opacity: 1
            }

            60% {
                opacity: .8
            }

            100% {
                opacity: 0;
                transform: translateY(-32px)
            }
        }

        .box {
            background: rgba(255, 255, 255, .78);
            border: 1px solid rgba(255, 255, 255, .95);
            border-radius: 26px;
            padding: 18px;
            box-shadow: 0 12px 30px rgba(255, 121, 170, .08);
            margin-bottom: 14px;
        }

        .box h3 {
            margin: 0 0 8px;
            font-size: 22px;
        }

        .box p {
            margin: 0;
            color: var(--muted);
            line-height: 1.75;
            font-size: 14px;
        }

        .facts {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 14px;
        }

        .fact {
            background: #fff;
            border: 1px solid #fff1f6;
            border-radius: 22px;
            padding: 14px;
            box-shadow: 0 10px 24px rgba(139, 108, 247, .06);
        }

        .fact .label {
            font-size: 12px;
            font-weight: 800;
            color: #d9467d;
            text-transform: uppercase;
            letter-spacing: .04em;
            margin-bottom: 5px;
        }

        .fact .value {
            font-size: 15px;
            font-weight: 800;
            line-height: 1.5;
        }

        .memory-card {
            background: linear-gradient(135deg, #fff 0%, #fff6fb 100%);
            border: 1px solid #f3dce8;
            border-radius: 26px;
            padding: 18px;
            box-shadow: 0 12px 28px rgba(139, 108, 247, .06);
        }

        .memory-head {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .memory-icon {
            width: 46px;
            height: 46px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: #fff0f6;
            color: #d9467d;
            font-size: 20px;
        }

        .memory-title {
            font-size: 20px;
            font-weight: 800;
            margin: 0;
        }

        .memory-sub {
            color: var(--muted);
            font-size: 13px;
            margin: 2px 0 0;
        }

        .memory-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 14px;
        }

        .polaroid {
            background: #fff;
            border-radius: 22px;
            padding: 12px 12px 18px;
            box-shadow: 0 18px 32px rgba(255, 121, 170, .10);
            border: 1px solid #fff1f6;
        }

        .polaroid img {
            width: 100%;
            border-radius: 16px;
            display: block;
            aspect-ratio: 4/4.2;
            object-fit: cover;
        }

        .polaroid-caption {
            text-align: center;
            margin-top: 10px;
            color: #8b7e94;
            font-size: 13px;
            font-weight: 700;
        }

        .helper {
            text-align: center;
            color: var(--muted);
            font-size: 13px;
            margin-top: 10px;
        }

        audio {
            display: none
        }

        @media (max-width:960px) {
            .layout {
                grid-template-columns: 1fr
            }

            .scene {
                min-height: auto
            }

            .phone {
                margin-inline: auto
            }
        }

        @media (max-width:520px) {
            .wrap {
                padding: 18px 12px 28px
            }

            .scene,
            .side {
                padding: 14px
            }

            .phone {
                border-width: 6px;
                border-radius: 30px
            }

            .screen {
                min-height: 630px;
                padding: 14px 14px 18px
            }

            .cover {
                margin-top: 104px;
                padding: 16px
            }

            .title-script {
                font-size: 30px
            }

            .for-name {
                font-size: 28px
            }

            .bottom-bar,
            .facts,
            .memory-grid {
                grid-template-columns: 1fr
            }
        }
    </style>
</head>

<body>
    <div class="float f1"></div>
    <div class="float f2"></div>
    <div class="float f3"></div>
    <div class="petal p1">🌸</div>
    <div class="petal p2">🌼</div>
    <div class="petal p3">💮</div>
    <div class="petal p4">🌸</div>
    <div class="petal p5">🌼</div>

    <div class="wrap">
        <?php if ($is_preview): ?>
            <div class="preview-alert">Preview mode aktif. Publish project agar greeting card bisa dibuka public.</div>
        <?php endif; ?>

        <div class="hero">
            <span class="kicker">🌸 Greeting Card Animation • Memory Blossom</span>
            <h1><?= html_escape($project->title ?: $messageTitle); ?></h1>
            <p><?= html_escape($subtitle); ?></p>
        </div>

        <div class="layout">
            <div class="card-shell scene">
                <div class="phone">
                    <div class="phone-top">
                        <div class="notch"></div>
                    </div>

                    <div class="screen" id="screenCard">
                        <div class="cloud c1"></div>
                        <div class="cloud c2"></div>
                        <div class="sun"></div>
                        <div class="star s1">✨</div>
                        <div class="star s2">⭐</div>
                        <div class="star s3">✨</div>

                        <div class="cover" id="coverPanel">
                            <div class="cover-chip">🎀 Special Delivery for <?= html_escape($receiver); ?></div>

                            <div class="mascot-wrap">
                                <div class="bear">
                                    <div class="ear left"></div>
                                    <div class="ear right"></div>
                                    <div class="face">
                                        <div class="snout"></div>
                                        <div class="blush left"></div>
                                        <div class="blush right"></div>
                                    </div>
                                    <div class="hand left"></div>
                                    <div class="hand right"></div>
                                    <div class="bouquet">
                                        <div class="flower fl1">🌸</div>
                                        <div class="flower fl2">🌼</div>
                                        <div class="flower fl3">🌷</div>
                                        <div class="wrap-stem">💐</div>
                                    </div>
                                </div>
                            </div>

                            <div class="title-script">Hi <?= html_escape($receiver); ?>!</div>
                            <p class="cover-text"><?= html_escape($coverText); ?></p>
                            <button type="button" class="open-btn" id="openBtn">Tap to Open 💌</button>
                        </div>

                        <div class="letter" id="letterPanel">
                            <div class="letter-head">
                                <span class="mini-badge"><?= html_escape($messageTitle); ?></span>
                                <div class="bubble">🧁</div>
                            </div>

                            <div class="for-name"><?= html_escape($receiver); ?></div>
                            <div class="subtitle"><?= html_escape($description); ?></div>
                            <div class="msg"><?= nl2br(html_escape($messageBody)); ?></div>
                            <div class="sign">With lots of love from <strong><?= html_escape($sender); ?></strong> 💖</div>

                            <div class="bottom-bar">
                                <button type="button" class="soft-btn primary" id="replayBtn">Buka Lagi</button>
                                <button type="button" class="soft-btn secondary" id="musicBtn"><?= $musicUrl ? 'Play Music' : 'No Music'; ?></button>
                                <a class="soft-btn whatsapp" target="_blank" href="https://wa.me/?text=<?= rawurlencode('Hi ' . $receiver . ', aku kirim greeting card spesial ini buat kamu 💌 ' . $shareUrl); ?>" style="text-decoration:none;text-align:center;">Share WA</a>
                            </div>
                        </div>

                        <div class="music-note m1">🎵</div>
                        <div class="music-note m2">🎶</div>
                    </div>
                </div>
            </div>

            <div class="card-shell side">
                <div>
                    <div class="box">
                        <h3>Special for <?= html_escape($receiver); ?> 💌</h3>
                        <p>
                            Tema ini fokus ke greeting personal yang manis dan interaktif.
                            Jadi bukan sekadar kartu, tapi terasa seperti pengalaman kecil yang spesial.
                        </p>

                        <div class="facts">
                            <div class="fact">
                                <div class="label">Tema</div>
                                <div class="value">Memory Blossom</div>
                            </div>
                            <div class="fact">
                                <div class="label">Judul</div>
                                <div class="value"><?= html_escape($project->title ?: $messageTitle); ?></div>
                            </div>
                            <div class="fact">
                                <div class="label">From</div>
                                <div class="value"><?= html_escape($sender); ?></div>
                            </div>
                            <div class="fact">
                                <div class="label">To</div>
                                <div class="value"><?= html_escape($receiver); ?></div>
                            </div>
                        </div>
                    </div>

                    <?php if ($coverImage): ?>
                        <div class="box">
                            <h3>Memory Photo 🌷</h3>
                            <p>Hero image dari project dipakai sebagai foto kenangan agar greeting terasa lebih personal.</p>

                            <div class="polaroid" style="margin-top:12px;">
                                <img src="<?= $coverImage; ?>" alt="memory photo">
                                <div class="polaroid-caption">A sweet little memory</div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($hasMemory): ?>
                        <div class="memory-card">
                            <div class="memory-head">
                                <div class="memory-icon"><i class="bi bi-stars"></i></div>
                                <div>
                                    <h3 class="memory-title">Little Memory</h3>
                                    <p class="memory-sub">Beberapa detail kecil yang bikin greeting ini terasa lebih bermakna.</p>
                                </div>
                            </div>

                            <div class="memory-grid">
                                <?php if ($memoryDate): ?>
                                    <div class="fact">
                                        <div class="label">Special Date</div>
                                        <div class="value"><?= html_escape($memoryDate); ?></div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($memoryTime): ?>
                                    <div class="fact">
                                        <div class="label">Special Time</div>
                                        <div class="value"><?= html_escape($memoryTime); ?></div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($memoryPlace): ?>
                                    <div class="fact">
                                        <div class="label">Special Place</div>
                                        <div class="value"><?= html_escape($memoryPlace); ?></div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($memoryAddress): ?>
                                    <div class="fact">
                                        <div class="label">Little Note Place</div>
                                        <div class="value"><?= nl2br(html_escape($memoryAddress)); ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="helper">
                    Made with love for your special greeting card ✨
                </div>
            </div>
        </div>
    </div>

    <?php if ($musicUrl): ?>
        <audio id="bgMusic" loop>
            <source src="<?= $musicUrl; ?>" type="audio/mpeg">
        </audio>
    <?php endif; ?>

    <script>
        (function() {
            const screen = document.getElementById('screenCard');
            const openBtn = document.getElementById('openBtn');
            const replayBtn = document.getElementById('replayBtn');
            const musicBtn = document.getElementById('musicBtn');
            const audio = document.getElementById('bgMusic');
            let musicStarted = false;

            function openCard() {
                screen.classList.add('opened');
                if (audio && !musicStarted) {
                    audio.play().then(() => {
                        musicStarted = true;
                        if (musicBtn) musicBtn.textContent = 'Pause Music';
                    }).catch(() => {});
                }
            }

            function replayCard() {
                screen.classList.remove('opened');
                setTimeout(() => screen.classList.add('opened'), 260);
            }

            function toggleMusic() {
                if (!audio) return;
                if (audio.paused) {
                    audio.play().then(() => {
                        musicStarted = true;
                        musicBtn.textContent = 'Pause Music';
                    }).catch(() => {
                        alert('Klik lagi jika browser masih menahan autoplay audio.');
                    });
                } else {
                    audio.pause();
                    musicBtn.textContent = 'Play Music';
                }
            }

            if (openBtn) openBtn.addEventListener('click', openCard);
            if (replayBtn) replayBtn.addEventListener('click', replayCard);
            if (musicBtn && audio) musicBtn.addEventListener('click', toggleMusic);
        })();
    </script>
</body>

</html>