<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Polaroid Pull-Up Greeting</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg1: #fff8ef;
            --bg2: #ffe9f2;
            --bg3: #fff5c7;
            --text: #2d2433;
            --muted: #7b7084;
            --line: #f2d9e6;
            --card: #ffffff;
            --shadow: 0 24px 60px rgba(75, 53, 86, .15);
            --pink: #ff79aa;
            --pink-2: #ff5f98;
            --yellow: #ffd85c;
            --peach: #ffb88c;
            --lav: #baa0ff;
            --radius-xl: 32px;
            --radius-lg: 24px;
            --radius-md: 18px;
        }

        * {
            box-sizing: border-box
        }

        html,
        body {
            margin: 0;
            padding: 0
        }

        body {
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 10% 15%, rgba(255, 121, 170, .18), transparent 20%),
                radial-gradient(circle at 88% 12%, rgba(255, 216, 92, .24), transparent 20%),
                radial-gradient(circle at 80% 82%, rgba(186, 160, 255, .16), transparent 24%),
                linear-gradient(135deg, var(--bg1), var(--bg2) 48%, var(--bg3));
            overflow-x: hidden;
            position: relative;
        }

        .float-blob,
        .float-icon {
            position: fixed;
            pointer-events: none;
            z-index: 0
        }

        .float-blob {
            border-radius: 999px;
            filter: blur(8px);
            opacity: .4;
            animation: blobFloat 8s ease-in-out infinite
        }

        .b1 {
            width: 180px;
            height: 180px;
            background: rgba(255, 121, 170, .2);
            left: 2%;
            top: 6%
        }

        .b2 {
            width: 220px;
            height: 220px;
            background: rgba(255, 216, 92, .18);
            right: 2%;
            top: 16%;
            animation-delay: 1.2s
        }

        .b3 {
            width: 200px;
            height: 200px;
            background: rgba(186, 160, 255, .18);
            left: 8%;
            bottom: 4%;
            animation-delay: 2s
        }

        @keyframes blobFloat {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-16px)
            }
        }

        .float-icon {
            font-size: 20px;
            opacity: .4;
            animation: upDrift linear infinite
        }

        .i1 {
            left: 8%;
            bottom: -40px;
            animation-duration: 12s
        }

        .i2 {
            left: 22%;
            bottom: -55px;
            animation-duration: 10s;
            animation-delay: 1.2s
        }

        .i3 {
            left: 48%;
            bottom: -40px;
            animation-duration: 13s;
            animation-delay: .8s
        }

        .i4 {
            left: 74%;
            bottom: -48px;
            animation-duration: 11s;
            animation-delay: 1.7s
        }

        .i5 {
            left: 90%;
            bottom: -52px;
            animation-duration: 9.5s;
            animation-delay: 2.2s
        }

        @keyframes upDrift {
            0% {
                transform: translateY(0) scale(.9);
                opacity: 0
            }

            12% {
                opacity: .45
            }

            100% {
                transform: translateY(-120vh) translateX(10px) scale(1.15);
                opacity: 0
            }
        }

        .page {
            max-width: 1180px;
            margin: 0 auto;
            padding: 28px 18px 40px;
            position: relative;
            z-index: 2;
        }

        .hero {
            text-align: center;
            margin-bottom: 22px;
            animation: fadeUp .8s ease both;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(255, 255, 255, .95);
            padding: 10px 16px;
            border-radius: 999px;
            box-shadow: 0 12px 28px rgba(255, 121, 170, .12);
            font-size: 13px;
            font-weight: 800;
            color: #d9487d;
        }

        .hero h1 {
            margin: 16px 0 8px;
            font-size: clamp(32px, 5vw, 60px);
            line-height: 1.03;
            font-weight: 800;
            letter-spacing: -.03em;
        }

        .hero p {
            max-width: 760px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.8;
        }

        .layout {
            display: grid;
            grid-template-columns: 1.06fr .94fr;
            gap: 24px;
            align-items: stretch;
        }

        .glass {
            background: rgba(255, 255, 255, .72);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, .92);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
        }

        .scene {
            min-height: 760px;
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .desk {
            width: min(560px, 100%);
            position: relative;
            padding: 30px 26px 34px;
            border-radius: 34px;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, .55), rgba(255, 255, 255, .36)),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, .15) 0 26px, rgba(255, 255, 255, .08) 26px 52px);
            border: 1px solid rgba(255, 255, 255, .85);
            box-shadow: 0 20px 40px rgba(95, 73, 111, .09);
            overflow: hidden;
        }

        .desk::before {
            content: '';
            position: absolute;
            inset: auto -40px -70px -40px;
            height: 150px;
            background: radial-gradient(ellipse at center, rgba(255, 216, 92, .18), transparent 65%);
            pointer-events: none;
        }

        .paper-stars span {
            position: absolute;
            font-size: 18px;
            opacity: .8;
            animation: twinkle 2.8s ease-in-out infinite;
        }

        .paper-stars span:nth-child(1) {
            left: 26px;
            top: 22px
        }

        .paper-stars span:nth-child(2) {
            right: 38px;
            top: 40px;
            animation-delay: .8s
        }

        .paper-stars span:nth-child(3) {
            left: 82px;
            bottom: 120px;
            animation-delay: 1.6s
        }

        .paper-stars span:nth-child(4) {
            right: 92px;
            bottom: 140px;
            animation-delay: 1.2s
        }

        @keyframes twinkle {

            0%,
            100% {
                opacity: .35;
                transform: scale(.88)
            }

            50% {
                opacity: 1;
                transform: scale(1.15)
            }
        }

        .camera-wrap {
            position: relative;
            width: 100%;
            height: 280px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            margin-bottom: 24px;
        }

        .camera {
            width: min(430px, 100%);
            height: 220px;
            position: relative;
            border-radius: 34px;
            background: linear-gradient(180deg, #fffefb, #fff4f9 70%, #fff0da);
            border: 1px solid #fff7fb;
            box-shadow: 0 26px 40px rgba(80, 56, 88, .16);
            overflow: hidden;
        }

        .camera::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(255, 216, 92, .2), transparent 32%),
                radial-gradient(circle at bottom right, rgba(255, 121, 170, .18), transparent 28%);
            pointer-events: none;
        }

        .camera-top {
            position: absolute;
            left: 24px;
            right: 24px;
            top: 20px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .flash {
            width: 88px;
            height: 34px;
            border-radius: 16px;
            background: #fff6c9;
            border: 1px solid #fbeaa6;
            box-shadow: inset 0 0 0 6px rgba(255, 255, 255, .45);
        }

        .brand {
            font-size: 13px;
            font-weight: 800;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: #8f7f57;
        }

        .lens-area {
            position: absolute;
            left: 0;
            right: 0;
            top: 62px;
            height: 116px;
            display: grid;
            place-items: center;
        }

        .lens {
            width: 124px;
            height: 124px;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 35%, #fffaf0, #c8b2ff 15%, #7e5f9f 42%, #3c294f 76%, #23182c 100%);
            border: 10px solid #f6effc;
            box-shadow: 0 0 0 10px #fff, 0 18px 28px rgba(78, 56, 96, .14);
            position: relative;
        }

        .lens::before {
            content: '';
            position: absolute;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .72);
            top: 18px;
            left: 24px;
            filter: blur(1px);
        }

        .tiny-lens {
            position: absolute;
            right: 34px;
            top: 86px;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #ffd85c;
            border: 5px solid #fff;
            box-shadow: 0 6px 12px rgba(0, 0, 0, .08);
        }

        .slot {
            position: absolute;
            left: 50%;
            bottom: 16px;
            transform: translateX(-50%);
            width: 68%;
            height: 22px;
            border-radius: 999px;
            background: #efe2ea;
            box-shadow: inset 0 5px 8px rgba(70, 52, 86, .08);
        }

        .pull-tab {
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 190px;
            height: 42px;
            border-radius: 18px 18px 10px 10px;
            background: #fff;
            display: grid;
            place-items: center;
            box-shadow: 0 -6px 16px rgba(0, 0, 0, .04);
            font-size: 13px;
            font-weight: 800;
            color: #8d7b8e;
            border: 1px solid #f2e8f0;
            letter-spacing: .02em;
        }

        .polaroid-stage {
            position: absolute;
            left: 50%;
            bottom: 32px;
            transform: translateX(-50%);
            width: 300px;
            height: 370px;
            pointer-events: none;
        }

        .polaroid {
            position: absolute;
            left: 50%;
            bottom: -248px;
            transform: translateX(-50%) rotate(-4deg);
            width: 280px;
            background: #fff;
            padding: 16px 16px 74px;
            border-radius: 20px 20px 28px 28px;
            box-shadow: 0 28px 36px rgba(75, 53, 86, .18);
            transition: bottom 1.1s cubic-bezier(.2, .8, .2, 1), transform 1.1s cubic-bezier(.2, .8, .2, 1);
            border: 1px solid #fff8fb;
            pointer-events: auto;
        }

        .polaroid-photo {
            aspect-ratio: 1/1;
            border-radius: 18px;
            overflow: hidden;
            position: relative;
            background:
                radial-gradient(circle at top right, rgba(255, 216, 92, .35), transparent 28%),
                linear-gradient(180deg, #fff7cd 0%, #fff9ef 34%, #ffeef6 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-scene {
            position: absolute;
            inset: 0;
            overflow: hidden
        }

        .cloud {
            position: absolute;
            background: rgba(255, 255, 255, .9);
            border-radius: 999px
        }

        .cloud.c1 {
            width: 84px;
            height: 24px;
            left: 28px;
            top: 38px
        }

        .cloud.c1::before,
        .cloud.c1::after,
        .cloud.c2::before,
        .cloud.c2::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: inherit
        }

        .cloud.c1::before {
            width: 30px;
            height: 30px;
            left: 10px;
            top: -12px
        }

        .cloud.c1::after {
            width: 36px;
            height: 36px;
            left: 32px;
            top: -16px
        }

        .cloud.c2 {
            width: 74px;
            height: 22px;
            right: 24px;
            top: 54px
        }

        .cloud.c2::before {
            width: 26px;
            height: 26px;
            left: 10px;
            top: -10px
        }

        .cloud.c2::after {
            width: 32px;
            height: 32px;
            left: 30px;
            top: -14px
        }

        .sun {
            position: absolute;
            right: 34px;
            top: 24px;
            width: 62px;
            height: 62px;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 35%, #fff8d6, #ffd85c 70%);
            box-shadow: 0 0 0 8px rgba(255, 216, 92, .16)
        }

        .hill {
            position: absolute;
            left: -10%;
            right: -10%;
            bottom: -10px;
            height: 120px;
            border-radius: 50% 50% 0 0;
            background: linear-gradient(180deg, #b7e49f, #83c47c)
        }

        .hill.h2 {
            bottom: -28px;
            height: 108px;
            background: linear-gradient(180deg, #9fdb84, #62b86c)
        }

        .flower {
            position: absolute;
            font-size: 26px;
            animation: sway 3s ease-in-out infinite
        }

        .flower.f1 {
            left: 42px;
            bottom: 64px
        }

        .flower.f2 {
            left: 96px;
            bottom: 78px;
            animation-delay: .6s
        }

        .flower.f3 {
            right: 54px;
            bottom: 70px;
            animation-delay: 1.2s
        }

        .flower.f4 {
            right: 108px;
            bottom: 58px;
            animation-delay: .8s
        }

        @keyframes sway {

            0%,
            100% {
                transform: rotate(0)
            }

            50% {
                transform: rotate(7deg)
            }
        }

        .rabbit {
            position: absolute;
            left: 50%;
            bottom: 40px;
            transform: translateX(-50%);
            width: 134px;
            height: 150px;
        }

        .ear {
            position: absolute;
            width: 34px;
            height: 88px;
            background: #fff;
            border-radius: 20px;
            top: 0
        }

        .ear.left {
            left: 24px;
            transform: rotate(-8deg)
        }

        .ear.right {
            right: 24px;
            transform: rotate(8deg)
        }

        .ear::after {
            content: '';
            position: absolute;
            left: 8px;
            right: 8px;
            top: 14px;
            bottom: 14px;
            background: #ffdbe7;
            border-radius: 20px
        }

        .head {
            position: absolute;
            left: 17px;
            right: 17px;
            top: 48px;
            height: 78px;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 8px 14px rgba(0, 0, 0, .06)
        }

        .head::before,
        .head::after {
            content: '';
            position: absolute;
            width: 8px;
            height: 10px;
            background: #43333f;
            border-radius: 50%;
            top: 24px
        }

        .head::before {
            left: 30px
        }

        .head::after {
            right: 30px
        }

        .nose {
            position: absolute;
            left: 50%;
            top: 34px;
            transform: translateX(-50%);
            width: 16px;
            height: 12px;
            background: #ff98b7;
            border-radius: 50% 50% 60% 60%
        }

        .mouth {
            position: absolute;
            left: 50%;
            top: 46px;
            transform: translateX(-50%);
            width: 22px;
            height: 10px;
            border-bottom: 3px solid #43333f;
            border-radius: 0 0 20px 20px
        }

        .blush {
            position: absolute;
            width: 16px;
            height: 10px;
            background: #ffb6ce;
            opacity: .55;
            border-radius: 50%;
            top: 36px
        }

        .blush.left {
            left: 18px
        }

        .blush.right {
            right: 18px
        }

        .body {
            position: absolute;
            left: 28px;
            right: 28px;
            bottom: 0;
            height: 64px;
            background: #fff;
            border-radius: 40px 40px 26px 26px
        }

        .caption {
            position: absolute;
            left: 16px;
            right: 16px;
            bottom: 18px;
            text-align: center;
            font-family: 'DM Serif Display', serif;
            font-size: 25px;
            color: #7a5c25;
            line-height: 1.1;
        }

        .tape {
            position: absolute;
            width: 84px;
            height: 28px;
            background: rgba(255, 246, 216, .88);
            border-radius: 10px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .05);
            top: -10px;
            border: 1px solid rgba(255, 255, 255, .8)
        }

        .tape.left {
            left: 18px;
            transform: rotate(-10deg)
        }

        .tape.right {
            right: 18px;
            transform: rotate(10deg)
        }

        .opened .polaroid {
            bottom: 24px;
            transform: translateX(-50%) rotate(0deg)
        }

        .controls {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 6px;
        }

        .btn {
            appearance: none;
            border: 0;
            cursor: pointer;
            border-radius: 18px;
            padding: 14px 16px;
            font-weight: 800;
            font-size: 14px;
            transition: .25s ease;
        }

        .btn.primary {
            background: linear-gradient(135deg, var(--pink), var(--pink-2));
            color: #fff;
            box-shadow: 0 16px 28px rgba(255, 95, 152, .22)
        }

        .btn.secondary {
            background: #fff6cb;
            color: #946d00
        }

        .btn.ghost {
            background: #fff;
            border: 1px solid #f0deea;
            color: #7b7084
        }

        .btn:hover {
            transform: translateY(-2px)
        }

        .hint-pill {
            margin-top: 14px;
            display: flex;
            justify-content: center;
        }

        .hint-pill span {
            background: rgba(255, 255, 255, .86);
            border: 1px solid rgba(255, 255, 255, .95);
            padding: 10px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            color: #8d7b8e;
            box-shadow: 0 10px 24px rgba(255, 121, 170, .08)
        }

        .details {
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .panel {
            background: rgba(255, 255, 255, .78);
            border: 1px solid rgba(255, 255, 255, .95);
            border-radius: 28px;
            padding: 18px;
            box-shadow: 0 12px 28px rgba(98, 76, 115, .08);
            margin-bottom: 14px;
        }

        .panel h3 {
            margin: 0 0 8px;
            font-size: 24px;
            line-height: 1.15
        }

        .panel p {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.75
        }

        .spec-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 14px
        }

        .spec {
            background: #fff;
            border: 1px solid #f5e7ef;
            border-radius: 22px;
            padding: 14px;
            box-shadow: 0 10px 24px rgba(0, 0, 0, .03)
        }

        .spec .label {
            font-size: 12px;
            font-weight: 800;
            color: #d9487d;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-bottom: 4px
        }

        .spec .value {
            font-size: 15px;
            font-weight: 800
        }

        .message-card {
            background: #fff;
            border: 1px solid #f3e1eb;
            border-radius: 28px;
            padding: 20px;
        }

        .mini-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 999px;
            background: #fff5cb;
            color: #9a6f00;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 12px
        }

        .receiver {
            font-family: 'DM Serif Display', serif;
            font-size: 34px;
            line-height: 1.1;
            color: #634d77;
            margin: 0 0 8px
        }

        .sub {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 14px
        }

        .message {
            background: #fff9fc;
            border: 1px dashed #f5d6e4;
            border-radius: 22px;
            padding: 16px;
            color: #56485d;
            font-size: 15px;
            line-height: 1.9;
            white-space: pre-line;
        }

        .sign {
            margin-top: 14px;
            padding-top: 12px;
            border-top: 1px dashed #ebdeee;
            color: #7e7488;
            font-size: 14px
        }

        .sign strong {
            color: #3c3148
        }

        .footer-note {
            text-align: center;
            margin-top: 18px;
            color: var(--muted);
            font-size: 13px
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        audio {
            display: none
        }

        @media (max-width:980px) {
            .layout {
                grid-template-columns: 1fr
            }

            .scene {
                min-height: auto
            }
        }

        @media (max-width:560px) {
            .page {
                padding: 16px 12px 28px
            }

            .scene,
            .details {
                padding: 14px
            }

            .desk {
                padding: 18px 14px 24px
            }

            .camera-wrap {
                height: 250px
            }

            .camera {
                height: 196px;
                border-radius: 28px
            }

            .polaroid-stage {
                width: 264px;
                height: 330px
            }

            .polaroid {
                width: 250px;
                padding: 14px 14px 66px
            }

            .caption {
                font-size: 22px
            }

            .controls {
                grid-template-columns: 1fr
            }

            .receiver {
                font-size: 30px
            }
        }
    </style>
</head>

<body>
    <div class="float-blob b1"></div>
    <div class="float-blob b2"></div>
    <div class="float-blob b3"></div>
    <div class="float-icon i1">💖</div>
    <div class="float-icon i2">✨</div>
    <div class="float-icon i3">🌸</div>
    <div class="float-icon i4">💛</div>
    <div class="float-icon i5">📷</div>

    <div class="page">
        <div class="hero">
            <span class="hero-badge">📸 Premium Interactive Theme • Polaroid Pull-Up</span>
            <h1>Tarik momen manis, lalu biarkan kartunya muncul perlahan</h1>
            <p>
                Ini konsep customer view yang interaktif, lucu, dan terasa premium. Customer tidak langsung lihat pesannya,
                tapi harus menekan kamera dulu agar foto polaroid keluar dan surat ucapan terbuka dengan cantik.
            </p>
        </div>

        <div class="layout">
            <div class="glass scene">
                <div class="desk" id="desk">
                    <div class="paper-stars">
                        <span>✨</span>
                        <span>💛</span>
                        <span>🌸</span>
                        <span>💖</span>
                    </div>

                    <div class="camera-wrap">
                        <div class="camera" id="cameraCard">
                            <div class="camera-top">
                                <div class="flash"></div>
                                <div class="brand">Sunny Snap</div>
                            </div>
                            <div class="lens-area">
                                <div class="lens"></div>
                            </div>
                            <div class="tiny-lens"></div>
                            <div class="slot"></div>
                            <div class="pull-tab">Tap kamera untuk keluarkan polaroid</div>
                        </div>

                        <div class="polaroid-stage">
                            <div class="polaroid" id="polaroidCard">
                                <div class="tape left"></div>
                                <div class="tape right"></div>
                                <div class="polaroid-photo">
                                    <div class="photo-scene">
                                        <div class="sun"></div>
                                        <div class="cloud c1"></div>
                                        <div class="cloud c2"></div>
                                        <div class="hill"></div>
                                        <div class="hill h2"></div>
                                        <div class="flower f1">🌼</div>
                                        <div class="flower f2">🌸</div>
                                        <div class="flower f3">🌷</div>
                                        <div class="flower f4">🌼</div>
                                        <div class="rabbit">
                                            <div class="ear left"></div>
                                            <div class="ear right"></div>
                                            <div class="head">
                                                <div class="blush left"></div>
                                                <div class="blush right"></div>
                                                <div class="nose"></div>
                                                <div class="mouth"></div>
                                            </div>
                                            <div class="body"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="caption" id="polaroidCaption">Bella's Sweet Day</div>
                            </div>
                        </div>
                    </div>

                    <div class="controls">
                        <button class="btn primary" id="openBtn">Keluarkan Polaroid</button>
                        <button class="btn secondary" id="musicBtn">Play Music</button>
                        <button class="btn ghost" id="replayBtn">Ulangi Lagi</button>
                        <button class="btn ghost" id="waBtn">Share WhatsApp</button>
                    </div>

                    <div class="hint-pill">
                        <span>Interaksi ini cocok buat customer karena terasa seperti buka memory card yang manis 📸</span>
                    </div>
                </div>
            </div>

            <div class="glass details">
                <div>
                    <div class="panel">
                        <h3>Kenapa model ini premium?</h3>
                        <p>
                            Karena feel-nya bukan sekadar greeting biasa. Ada momen menunggu, ada aksi kecil saat menekan kamera,
                            ada polaroid yang keluar perlahan, lalu pesan tampil seperti kartu kenangan. Ini terasa lebih niat, lebih estetik,
                            dan sangat cocok untuk customer yang suka tampilan manis tapi tetap clean.
                        </p>
                        <div class="spec-grid">
                            <div class="spec">
                                <div class="label">Interaction</div>
                                <div class="value">Tap kamera</div>
                            </div>
                            <div class="spec">
                                <div class="label">Mood</div>
                                <div class="value">Cute Premium</div>
                            </div>
                            <div class="spec">
                                <div class="label">Best For</div>
                                <div class="value">Birthday / Sweet Note</div>
                            </div>
                            <div class="spec">
                                <div class="label">Visual Style</div>
                                <div class="value">Polaroid Memory</div>
                            </div>
                        </div>
                    </div>

                    <div class="message-card">
                        <div class="mini-chip">💌 Letter Preview</div>
                        <div class="receiver" id="receiverName">Bella</div>
                        <div class="sub">Ada ucapan hangat yang muncul setelah foto kecil ini keluar dari kamera ✨</div>
                        <div class="message" id="messageText">Happy sweet day, Bella 💖

                            Semoga semua hal baik datang pelan-pelan tapi pasti ke hidup kamu. Semoga setiap langkahmu dipenuhi keberanian, hati yang tenang, dan orang-orang yang tulus sayang sama kamu.

                            Jangan lupa, kamu berharga banget, dan kamu pantas menerima banyak kebahagiaan yang indah.</div>
                        <div class="sign">With lots of love from <strong id="senderName">Doni</strong></div>
                    </div>
                </div>

                <div class="footer-note">Nama theme yang saya rekomendasikan untuk sistem kamu: <strong>Polaroid Pull-Up</strong></div>
            </div>
        </div>
    </div>

    <audio id="bgMusic" loop>
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
    </audio>

    <script>
        const desk = document.getElementById('desk');
        const openBtn = document.getElementById('openBtn');
        const replayBtn = document.getElementById('replayBtn');
        const musicBtn = document.getElementById('musicBtn');
        const waBtn = document.getElementById('waBtn');
        const audio = document.getElementById('bgMusic');
        let musicStarted = false;

        function openCard() {
            desk.classList.add('opened');
            if (!musicStarted) {
                audio.play().then(() => {
                    musicStarted = true;
                    musicBtn.textContent = 'Pause Music';
                }).catch(() => {
                    musicBtn.textContent = 'Play Music';
                });
            }
        }

        function replayCard() {
            desk.classList.remove('opened');
            setTimeout(() => desk.classList.add('opened'), 280);
        }

        function toggleMusic() {
            if (audio.paused) {
                audio.play().then(() => {
                    musicStarted = true;
                    musicBtn.textContent = 'Pause Music';
                }).catch(() => {
                    alert('Klik lagi jika browser masih menahan autoplay.');
                });
            } else {
                audio.pause();
                musicBtn.textContent = 'Play Music';
            }
        }

        function shareWhatsApp() {
            const text = encodeURIComponent('Lihat greeting card lucu ini 📸💖 ' + window.location.href);
            window.open('https://wa.me/?text=' + text, '_blank');
        }

        document.getElementById('cameraCard').addEventListener('click', openCard);
        openBtn.addEventListener('click', openCard);
        replayBtn.addEventListener('click', replayCard);
        musicBtn.addEventListener('click', toggleMusic);
        waBtn.addEventListener('click', shareWhatsApp);
    </script>
</body>

</html>