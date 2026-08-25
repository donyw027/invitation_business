<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= html_escape($page_title ?? ($project->title ?? 'Undangan Pernikahan')); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="theme-color" content="#20160f">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">
    <?php
    $heroImage = !empty($project->hero_image) ? asset_or_url($project->hero_image) : 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1800&auto=format&fit=crop';
    ?>
    <meta property="og:image" content="<?= html_escape($heroImage); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Italiana&family=Manrope:wght@400;500;600&family=Noto+Serif+Javanese&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #17110d;
            --paper: #f3ede3;
            --paper2: #e7dccd;
            --sogan: #68472f;
            --gold: #b89152;
            --muted: #746a61;
            --line: rgba(79, 52, 34, .18);
            --night: #120d09
        }

        * {
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth
        }

        body {
            margin: 0;
            background: radial-gradient(circle at 10% 8%, rgba(184, 145, 82, .08), transparent 28%), var(--paper);
            color: var(--ink);
            font-family: Manrope, Arial, sans-serif;
            overflow-x: hidden
        }

        a {
            text-decoration: none;
            color: inherit
        }

        .display {
            font-family: Italiana, serif
        }

        .javanese {
            font-family: 'Noto Serif Javanese', serif
        }

        .shell {
            width: min(1180px, calc(100% - 34px));
            margin: auto
        }

        .section {
            padding: 128px 0;
            position: relative
        }

        .eyebrow {
            font-size: 10px;
            letter-spacing: .27em;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 600
        }

        .title {
            font-family: Italiana, serif;
            font-size: clamp(48px, 7vw, 96px);
            line-height: .94;
            margin: 18px 0 28px
        }

        .lead {
            color: var(--muted);
            line-height: 1.9
        }

        .cover {
            position: fixed;
            inset: 0;
            z-index: 1000;
            background: var(--night);
            display: grid;
            place-items: center;
            transition: .9s
        }

        .cover.hide {
            opacity: 0;
            visibility: hidden;
            pointer-events: none
        }

        .cover-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: .38;
            filter: saturate(.6) sepia(.12);
            animation: zoom 18s alternate infinite
        }

        .cover:after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, transparent 0, rgba(18, 13, 9, .3) 42%, rgba(18, 13, 9, .93) 100%)
        }

        .cover-card {
            position: relative;
            z-index: 2;
            color: #fff;
            text-align: center;
            width: min(760px, calc(100% - 34px));
            padding: 64px 24px;
            border-top: 1px solid rgba(216, 187, 122, .5);
            border-bottom: 1px solid rgba(216, 187, 122, .5)
        }

        .cover-card:before {
            /* content: 'ꦩꦤ꧀ꦠꦺꦤ꧀'; */
            display: block;
            font-family: 'Noto Serif Javanese';
            font-size: 34px;
            color: var(--gold);
            margin-bottom: 25px
        }

        .cover-title {
            font: 400 clamp(58px, 10vw, 128px)/.82 Italiana, serif;
            margin: 15px 0 30px
        }

        .guest {
            font: 400 clamp(28px, 4vw, 48px)/1.1 Italiana, serif;
            margin: 12px 0 25px
        }

        .open-btn,
        .btn-sacred {
            border: 1px solid var(--gold);
            background: transparent;
            color: inherit;
            border-radius: 999px;
            padding: 14px 25px;
            letter-spacing: .14em;
            text-transform: uppercase;
            font-size: 11px;
            transition: .3s
        }

        .open-btn:hover,
        .btn-sacred:hover {
            background: var(--gold);
            color: #17110d
        }

        .hero {
            min-height: 100svh;
            background: var(--night);
            color: #fff;
            position: relative;
            display: grid;
            place-items: center;
            overflow: hidden
        }

        .hero>img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: .52;
            filter: saturate(.65) sepia(.1)
        }

        .hero:after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(18, 13, 9, .2), rgba(18, 13, 9, .9))
        }

        .hero-frame {
            position: relative;
            z-index: 2;
            width: min(960px, calc(100% - 34px));
            text-align: center;
            padding: 110px 20px 60px
        }

        .hero-frame:before,
        .hero-frame:after {
            content: '';
            display: block;
            width: 1px;
            height: 90px;
            background: linear-gradient(transparent, var(--gold));
            margin: 0 auto 28px
        }

        .hero-frame:after {
            margin: 28px auto 0;
            background: linear-gradient(var(--gold), transparent)
        }

        .hero h1 {
            font: 400 clamp(66px, 12vw, 150px)/.8 Italiana, serif;
            margin: 20px 0
        }

        .procession {
            position: relative
        }

        .procession:before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 1px;
            background: linear-gradient(transparent, var(--gold), var(--gold), transparent)
        }

        .process-card {
            width: calc(50% - 48px);
            margin: 0 0 80px;
            padding: 38px;
            background: rgba(255, 255, 255, .6);
            border: 1px solid var(--line);
            position: relative
        }

        .process-card:nth-child(even) {
            margin-left: auto
        }

        .process-card:after {
            content: '';
            position: absolute;
            top: 45px;
            width: 48px;
            height: 1px;
            background: var(--gold)
        }

        .process-card:nth-child(odd):after {
            right: -49px
        }

        .process-card:nth-child(even):after {
            left: -49px
        }

        .process-index {
            font: 400 54px Italiana, serif;
            color: var(--gold)
        }

        .portrait {
            aspect-ratio: 4/5;
            overflow: hidden;
            border-radius: 220px 220px 8px 8px
        }

        .portrait img {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .ceremony-scene {
            min-height: 100svh;
            position: relative;
            display: grid;
            place-items: center;
            overflow: hidden;
            background: var(--night);
            color: #fff
        }

        .ceremony-scene>.ceremony-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: saturate(.42) sepia(.18) contrast(1.08);
            opacity: .34;
            transform: scale(1.03)
        }

        .ceremony-scene:after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(12, 8, 5, .45), rgba(12, 8, 5, .9)), radial-gradient(circle at center, transparent, rgba(12, 8, 5, .48))
        }

        .ceremony-inner {
            position: relative;
            z-index: 2;
            width: min(980px, calc(100% - 34px));
            padding: 110px 20px;
            text-align: center
        }

        .ceremony-kicker {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            font-size: 10px;
            letter-spacing: .34em;
            text-transform: uppercase;
            color: #d7b875
        }

        .ceremony-kicker:before,
        .ceremony-kicker:after {
            content: '';
            width: 80px;
            height: 1px;
            background: linear-gradient(90deg, transparent, #b89152)
        }

        .ceremony-kicker:after {
            background: linear-gradient(90deg, #b89152, transparent)
        }

        .ceremony-date {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: clamp(18px, 5vw, 70px);
            margin: 55px auto 42px
        }

        .ceremony-date .month,
        .ceremony-date .year {
            font: 400 clamp(21px, 3vw, 38px)/1.1 Italiana, serif;
            letter-spacing: .12em;
            text-transform: uppercase
        }

        .ceremony-date .month {
            text-align: right
        }

        .ceremony-date .year {
            text-align: left
        }

        .ceremony-day {
            font: 400 clamp(120px, 24vw, 280px)/.68 Italiana, serif;
            color: #e2c58e;
            text-shadow: 0 10px 60px rgba(184, 145, 82, .16)
        }

        .ceremony-divider {
            width: 1px;
            height: 70px;
            background: linear-gradient(transparent, #b89152, transparent);
            margin: 0 auto 34px
        }

        .ceremony-meta {
            font: 400 clamp(25px, 4vw, 48px)/1.2 Italiana, serif;
            margin-bottom: 10px
        }

        .ceremony-place {
            font-size: 11px;
            letter-spacing: .25em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .64);
            max-width: 680px;
            margin: 0 auto 32px;
            line-height: 1.9
        }

        .ceremony-map {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid #b89152;
            padding: 11px 2px;
            color: #fff;
            font-size: 10px;
            letter-spacing: .2em;
            text-transform: uppercase
        }

        .ceremony-map:hover {
            color: #d7b875
        }

        .dark {
            background: var(--night);
            color: #f4eee5
        }

        .dark .lead {
            color: #b9aea4
        }

        .count-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            border-top: 1px solid rgba(216, 187, 122, .3);
            border-bottom: 1px solid rgba(216, 187, 122, .3)
        }

        .count-box {
            text-align: center;
            padding: 38px 12px
        }

        .count-box b {
            display: block;
            font: 400 clamp(45px, 6vw, 80px) Italiana, serif;
            color: #d7b875
        }

        .count-box span {
            font-size: 10px;
            letter-spacing: .2em;
            text-transform: uppercase
        }

        .story-gallery {
            background: var(--night);
            color: #f4eee5
        }

        .story-gallery .lead {
            color: #b9aea4
        }

        .gallery-chapter {
            min-height: 92svh;
            display: grid;
            grid-template-columns: minmax(0, 1.08fr) minmax(320px, .92fr);
            align-items: stretch;
            border-top: 1px solid rgba(216, 187, 122, .18)
        }

        .gallery-chapter:nth-child(even) {
            grid-template-columns: minmax(320px, .92fr) minmax(0, 1.08fr)
        }

        .gallery-chapter:nth-child(even) .chapter-media {
            order: 2
        }

        .chapter-media {
            position: relative;
            min-height: 720px;
            overflow: hidden
        }

        .chapter-media img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: saturate(.72) contrast(1.03);
            transition: transform 1.4s cubic-bezier(.2, .7, .2, 1)
        }

        .gallery-chapter:hover .chapter-media img {
            transform: scale(1.035)
        }

        .chapter-media:after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 52%, rgba(12, 8, 5, .72))
        }

        .chapter-copy {
            padding: clamp(48px, 8vw, 120px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative
        }

        .chapter-copy:before {
            content: attr(data-number);
            position: absolute;
            right: 8%;
            top: 7%;
            font: 400 clamp(100px, 16vw, 230px)/1 Italiana, serif;
            color: rgba(216, 187, 122, .055)
        }

        .chapter-copy h3 {
            font: 400 clamp(54px, 7vw, 104px)/.9 Italiana, serif;
            margin: 18px 0 28px;
            max-width: 720px
        }

        .chapter-line {
            width: 82px;
            height: 1px;
            background: var(--gold);
            margin: 0 0 30px
        }

        .chapter-caption {
            font: 400 clamp(22px, 2.4vw, 34px)/1.35 Italiana, serif;
            color: #d9c3a0;
            margin-bottom: 20px
        }

        .gallery-after {
            padding-top: 100px
        }

        .gallery-after-head {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 30px;
            margin-bottom: 40px
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px
        }

        .gallery-item {
            margin: 0;
            aspect-ratio: 4/5;
            overflow: hidden;
            position: relative;
            background: #211711
        }

        .gallery-item:nth-child(6n+1),
        .gallery-item:nth-child(6n+5) {
            grid-column: span 2;
            aspect-ratio: 16/10
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .8s cubic-bezier(.2, .7, .2, 1);
            filter: saturate(.78)
        }

        .gallery-item:hover img {
            transform: scale(1.045);
            filter: saturate(1)
        }

        .gallery-caption {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 44px 18px 16px;
            background: linear-gradient(transparent, rgba(18, 13, 9, .88));
            color: #fff;
            font: 400 17px Italiana, serif
        }

        .panel {
            background: rgba(255, 255, 255, .68);
            border: 1px solid var(--line);
            padding: 42px
        }

        .split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px
        }

        .form-control,
        .form-select {
            border: 0;
            border-bottom: 1px solid var(--line);
            border-radius: 0;
            background: transparent;
            padding: 14px 2px;
            box-shadow: none !important
        }

        .map-frame {
            min-height: 450px;
            overflow: hidden
        }

        .map-frame iframe {
            width: 100%;
            height: 450px;
            border: 0
        }

        .wish-card {
            padding: 22px 0;
            border-bottom: 1px solid var(--line)
        }

        .wishes-section {
            background: linear-gradient(135deg, rgba(255, 255, 255, .36), transparent 45%), var(--paper2);
            overflow: hidden
        }

        .wishes-section:before {
            /* content: 'ꦥꦔꦺꦱ꧀ꦠꦸ'; */
            position: absolute;
            right: -35px;
            top: 40px;
            font-family: 'Noto Serif Javanese';
            font-size: clamp(100px, 19vw, 260px);
            color: rgba(104, 71, 47, .035);
            transform: rotate(-7deg)
        }

        .wishes-heading {
            max-width: 760px;
            margin: 0 auto 70px;
            text-align: center
        }

        .wishes-intro {
            font: 400 clamp(20px, 2.5vw, 31px)/1.55 Italiana, serif;
            color: var(--sogan);
            max-width: 680px;
            margin: 0 auto
        }

        .wishes-glyph {
            font-size: 35px;
            color: var(--gold);
            margin-top: 20px
        }

        .wishes-layout {
            display: grid;
            grid-template-columns: minmax(320px, .82fr) minmax(0, 1.18fr);
            gap: 48px;
            align-items: start
        }

        .wish-form-wrap {
            position: sticky;
            top: 35px;
            background: rgba(248, 243, 235, .88);
            border: 1px solid rgba(104, 71, 47, .2);
            padding: 52px;
            box-shadow: 0 25px 80px rgba(57, 37, 23, .11)
        }

        .wish-form-wrap:before,
        .wish-form-wrap:after {
            content: '';
            position: absolute;
            width: 54px;
            height: 54px;
            border-color: var(--gold);
            opacity: .58
        }

        .wish-form-wrap:before {
            left: 13px;
            top: 13px;
            border-left: 1px solid;
            border-top: 1px solid
        }

        .wish-form-wrap:after {
            right: 13px;
            bottom: 13px;
            border-right: 1px solid;
            border-bottom: 1px solid
        }

        .wish-form-ornament {
            text-align: center;
            color: var(--gold);
            font-size: 27px;
            margin-bottom: 18px
        }

        .wish-form-wrap h3 {
            font: 400 clamp(34px, 4vw, 52px)/1.08 Italiana, serif;
            text-align: center;
            margin-bottom: 14px
        }

        .wish-form-wrap>p {
            text-align: center;
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 35px
        }

        .wish-form-wrap label {
            font-size: 10px;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--sogan);
            font-weight: 600
        }

        .wish-form-wrap textarea {
            resize: vertical
        }

        .wish-form-wrap .btn-sacred {
            color: var(--ink);
            width: 100%;
            margin-top: 6px
        }

        .wish-list {
            display: grid;
            gap: 22px
        }

        .wish-list-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--line);
            padding-bottom: 17px;
            margin-bottom: 4px;
            font: 400 28px Italiana, serif
        }

        .wish-list-title i {
            color: var(--gold);
            font-style: normal
        }

        .wish-letter {
            position: relative;
            display: grid;
            grid-template-columns: 64px 1fr;
            gap: 25px;
            padding: 34px 36px;
            background: linear-gradient(145deg, rgba(255, 255, 255, .72), rgba(244, 236, 225, .72));
            border: 1px solid rgba(104, 71, 47, .17);
            box-shadow: 0 16px 42px rgba(57, 37, 23, .07);
            transition: .4s
        }

        .wish-letter:nth-child(even) {
            transform: translateX(13px)
        }

        .wish-letter:hover {
            transform: translateY(-4px);
            box-shadow: 0 22px 55px rgba(57, 37, 23, .12)
        }

        .wish-letter:nth-child(even):hover {
            transform: translateX(13px) translateY(-4px)
        }

        .wish-letter:after {
            /* content: 'ꦥꦔꦺꦱ꧀ꦠꦸ'; */
            position: absolute;
            right: 22px;
            bottom: 7px;
            font-family: 'Noto Serif Javanese';
            font-size: 28px;
            color: rgba(104, 71, 47, .055)
        }

        .wish-seal {
            width: 58px;
            height: 58px;
            border: 1px solid var(--gold);
            border-radius: 50%;
            display: grid;
            place-items: center;
            font: 400 25px Italiana, serif;
            color: var(--sogan);
            box-shadow: inset 0 0 0 6px rgba(184, 145, 82, .07)
        }

        .wish-name {
            font: 400 25px Italiana, serif;
            color: var(--ink);
            margin-bottom: 12px
        }

        .wish-message {
            font: 400 clamp(19px, 2vw, 25px)/1.55 Italiana, serif;
            color: #4f392b
        }

        .wish-signature {
            font-size: 9px;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: var(--gold);
            margin-top: 20px
        }

        .wish-empty {
            text-align: center;
            padding: 60px 30px;
            border: 1px dashed rgba(104, 71, 47, .25);
            color: var(--muted)
        }

        .wish-empty i {
            display: block;
            color: var(--gold);
            font-size: 28px;
            margin-bottom: 13px
        }

        .wish-empty p {
            margin: 0;
            line-height: 1.8
        }

        .music-player {
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 1100
        }

        .music-btn {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            border: 1px solid var(--gold);
            background: var(--night);
            color: #fff
        }

        .music-btn.is-playing {
            animation: spin 7s linear infinite
        }

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: .8s
        }

        .reveal.show {
            opacity: 1;
            transform: none
        }

        .footer {
            text-align: center;
            padding: 90px 20px;
            border-top: 1px solid var(--line)
        }

        @keyframes zoom {
            to {
                transform: scale(1.08)
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg)
            }
        }

        @media(max-width:800px) {
            .section {
                padding: 78px 0
            }

            .procession:before {
                left: 18px
            }

            .process-card,
            .process-card:nth-child(even) {
                width: calc(100% - 44px);
                margin-left: 44px;
                margin-bottom: 34px
            }

            .process-card:after,
            .process-card:nth-child(even):after {
                left: -27px;
                width: 26px
            }

            .split {
                grid-template-columns: 1fr
            }

            .gallery-chapter,
            .gallery-chapter:nth-child(even) {
                grid-template-columns: 1fr;
                min-height: auto
            }

            .gallery-chapter:nth-child(even) .chapter-media {
                order: 0
            }

            .chapter-media {
                min-height: 64svh
            }

            .chapter-copy {
                padding: 60px 24px 76px
            }

            .chapter-copy:before {
                font-size: 130px;
                top: 5%
            }

            .gallery-after {
                padding-top: 72px
            }

            .gallery-after-head {
                display: block
            }

            .gallery-grid {
                grid-template-columns: 1fr 1fr;
                gap: 8px
            }

            .gallery-item,
            .gallery-item:nth-child(6n+1),
            .gallery-item:nth-child(6n+5) {
                grid-column: auto;
                aspect-ratio: 4/5
            }

            .gallery-item:nth-child(5n+1) {
                grid-column: span 2;
                aspect-ratio: 16/10
            }

            .count-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .panel {
                padding: 28px
            }

            .cover-card {
                padding: 42px 16px
            }

            .hero-frame:before,
            .hero-frame:after {
                height: 55px
            }

            .ceremony-date {
                grid-template-columns: 1fr;
                gap: 12px;
                margin: 42px auto 34px
            }

            .ceremony-date .month,
            .ceremony-date .year {
                text-align: center
            }

            .ceremony-day {
                order: -1
            }

            .ceremony-kicker:before,
            .ceremony-kicker:after {
                width: 34px
            }

            .ceremony-inner {
                padding: 84px 12px
            }
        }

        @media(max-width:820px) {
            .wishes-layout {
                grid-template-columns: 1fr
            }

            .wish-form-wrap {
                position: relative;
                top: auto;
                padding: 38px 25px
            }

            .wish-letter,
            .wish-letter:nth-child(even) {
                transform: none;
                padding: 28px 22px;
                grid-template-columns: 50px 1fr;
                gap: 17px
            }

            .wish-letter:nth-child(even):hover {
                transform: translateY(-4px)
            }

            .wish-seal {
                width: 48px;
                height: 48px;
                font-size: 20px
            }

            .wishes-heading {
                margin-bottom: 45px
            }

            .wish-list-title {
                font-size: 23px
            }

            .gift-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 20px;

                padding: 18px 0;

                border-bottom: 1px solid rgba(255, 255, 255, .15);
            }

            .gift-item strong {
                display: block;
                font-size: 15px;
                font-weight: 500;
            }

            .gift-bank {
                font-size: 12px;
                margin-top: 4px;
                opacity: .65;
                letter-spacing: 1px;
            }

            .gift-address {
                margin-top: 35px;
                padding-top: 5px;
            }

            .gift-address p {
                margin: 12px 0 20px;
                line-height: 1.8;
            }

            @media (max-width: 576px) {

                .gift-item {
                    align-items: flex-start;
                    flex-direction: column;
                    gap: 12px;
                }

            }
        }
    </style>
</head>

<body>
    <?php
    $bulanIndonesia = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');
    $eventDateFormatted = '';
    if (!empty($project->event_date)) {
        $eventDateValue = strtotime($project->event_date);
        if ($eventDateValue !== false) {
            $eventDateFormatted = date('d', $eventDateValue) . ' ' . $bulanIndonesia[(int)date('n', $eventDateValue)] . ' ' . date('Y', $eventDateValue);
        }
    }
    $eventDateISO = !empty($project->event_date) ? date('Y-m-d', strtotime($project->event_date)) : '';
    $eventTimeRaw = !empty($project->event_time) ? trim((string)$project->event_time) : '';
    $eventTime = '';
    $eventTimeForCountdown = '00:00:00';
    if ($eventTimeRaw !== '' && preg_match('/^(?:[01]?[0-9]|2[0-3]):[0-5][0-9](?::[0-5][0-9])?$/', $eventTimeRaw)) {
        $eventTime = $eventTimeRaw;
        $eventTimeForCountdown = strlen($eventTimeRaw) === 5 ? $eventTimeRaw . ':00' : $eventTimeRaw;
    }
    $eventTimestamp = 0;
    if (!empty($project->event_date)) {
        $dateOnlyTimestamp = strtotime($project->event_date);
        if ($dateOnlyTimestamp !== false) {
            $normalizedDate = date('Y-m-d', $dateOnlyTimestamp);
            $parsedEventTimestamp = strtotime($normalizedDate . ' ' . $eventTimeForCountdown);
            if ($parsedEventTimestamp !== false) {
                $eventTimestamp = $parsedEventTimestamp * 1000;
            }
        }
    }
    $eventDay = !empty($project->event_date) ? date('d', strtotime($project->event_date)) : '';
    $eventMonth = !empty($project->event_date) ? $bulanIndonesia[(int)date('n', strtotime($project->event_date))] : '';
    $eventYear = !empty($project->event_date) ? date('Y', strtotime($project->event_date)) : '';
    $musicUrl = '';
    if (!empty($project->music_url)) {
        // Semua musik tema ini diambil dari: assets/musik/
        // Kolom database boleh berisi: 1.mp3, assets/musik/1.mp3,
        // assets\musik\1.mp3, atau path lama lainnya. Yang digunakan
        // hanya nama filenya agar URL tidak menjadi ganda.
        $musicValue = trim((string)$project->music_url);
        $musicValue = str_replace('\\', '/', $musicValue);
        $musicFile = basename(parse_url($musicValue, PHP_URL_PATH) ?: $musicValue);
        if ($musicFile !== '' && $musicFile !== '.' && $musicFile !== '..') {
            $musicUrl = base_url('assets/music/' . rawurlencode($musicFile));
        }
    }
    $heroImage = !empty($project->hero_image) ? asset_or_url($project->hero_image) : 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1800&auto=format&fit=crop';
    $urlGuest = isset($_GET['to']) ? trim(urldecode($_GET['to'])) : '';
    $displayGuest = !empty($guest_name) ? $guest_name : ($urlGuest !== '' ? $urlGuest : 'Tamu Undangan');
    $mapQuery = trim(($project->location_name ?? '') . ' ' . ($project->location_address ?? ''));
    $mapUrl = $mapQuery !== '' ? 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($mapQuery) : '';
    ?>
    <div class="cover" id="cover"><img class="cover-bg" src="<?= html_escape($heroImage); ?>" alt="Sampul undangan">
        <div class="cover-card"><span class="eyebrow">Serat Ulem</span>
            <h1 class="cover-title"><?= html_escape($project->title ?? 'Pernikahan Kami'); ?></h1>
            <div class="eyebrow">Katur Dhumateng</div>
            <div class="guest"><?= html_escape($displayGuest); ?></div>
            <!-- <p style="color:rgba(255,255,255,.68);max-width:560px;margin:0 auto 30px">Dengan penuh hormat, kami mengundang Anda menjadi saksi atas janji yang kami sucikan.</p> -->
            <button class="open-btn" id="openInvitation"><i class="bi bi-flower1"></i> Buka Undangan</button>
        </div>
    </div>
    <section class="hero"><img src="<?= html_escape($heroImage); ?>" alt="<?= html_escape($project->title ?? 'Pernikahan'); ?>">
        <div class="hero-frame"><span class="eyebrow" style="font-size: 11pt;color:#d7b875">ومن كل شيء خلقنا زوجين لعلكم تذكرون
                <br> "Dan segala sesuatu Kami ciptakan berpasang-pasangan supaya kamu mengingat kebesaran Allah." <br>
                QS. Adz - dzariyat</span>
            <!-- <h1><?= html_escape($project->title ?? 'Pernikahan Kami'); ?></h1> -->
            <!-- <p style="max-width:620px;margin:28px auto;color:rgba(255,255,255,.72);line-height:1.9"><?= !empty($project->subtitle) ? nl2br(html_escape($project->subtitle)) : 'Dua jiwa berjalan dalam restu, menyatukan janji di hadapan keluarga dan Yang Maha Kuasa.'; ?></p> -->
            <!-- <div><?= html_escape($eventDateFormatted); ?> · <?= html_escape($eventTime); ?></div> -->
        </div>
    </section>

    <?php if (!empty($project->description)): ?><section class="section">
            <div class="shell">
                <div class="procession reveal">

                    <article class="process-card">

                        <div class="process-index"></div>

                        <!-- PEMBUKA -->
                        <div
                            class="lead"
                            style="
            font-size:10pt;
            line-height:1.9;
        ">
                            Dengan penuh rasa syukur, tanpa mengurangi rasa hormat,
                            kami mengundang Bapak/Ibu/Saudara/i untuk hadir serta
                            memberikan doa restu pada pernikahan putra-putri kami.
                        </div>


                        <!-- MEMPELAI WANITA -->
                        <div style="
        text-align:center;
        margin:35px 0 15px;
    ">

                            <div style="
            color:#d7b875;
            font-size:11pt;
            font-weight:500;
            line-height:1.3;
            margin-bottom:10px;
        ">
                                Dhahabah Yuni Pratiwi, S.Kom.
                            </div>

                            <div
                                class="lead"
                                style="
                font-size:10pt;
                line-height:1.7;
            ">
                                Putri kedua dari<br>
                                Bapak Sucipto &amp; Almh. Ibu Lulus Eka Hidayati, S.Pd.
                            </div>

                        </div>


                        <!-- DENGAN -->
                        <div style="
        text-align:center;
        margin:28px 0;
        font-size:11px;
        letter-spacing:3px;
        text-transform:uppercase;
        opacity:.65;
    ">
                            dengan
                        </div>


                        <!-- MEMPELAI PRIA -->
                        <div style="
        text-align:center;
        margin:15px 0 35px;
    ">

                            <div style="
            color:#d7b875;
            font-size:11pt;
            font-weight:500;
            line-height:1.3;
            margin-bottom:10px;
        ">
                                Edo Pradana
                            </div>

                            <div
                                class="lead"
                                style="
                font-size:10pt;
                line-height:1.7;
            ">
                                Putra pertama dari<br>
                                Bapak Suliadi &amp; Almh. Ibu Ninik Rahayu
                            </div>

                        </div>


                        <!-- PENUTUP -->
                        <div
                            class="lead"
                            style="
            font-size:10pt;
            line-height:1.9;
        ">
                            Merupakan suatu kehormatan dan kebahagiaan bagi kami
                            atas kehadiran serta doa restu Bapak/Ibu/Saudara/i.
                        </div>

                    </article>
                    <!-- <article class="process-card">
                        <div class="process-index"> </div><span class="eyebrow"></span>
                        <h2 class="display" style="font-size:clamp(42px,5vw,70px);line-height:1.05;margin:16px 0 24px"></h2>
                        <div class="lead" style="font-size: 10pt;"><?= nl2br(html_escape($project->description)); ?></div>
                    </article> -->
                    <!-- <article class="process-card">
                        <div class="process-index">02</div>
                        <div class="portrait mb-4"><img src="<?= html_escape($heroImage); ?>" alt="Potret pasangan"></div><span class="eyebrow">Pangestu</span>
                        <p class="lead mb-0">Dengan restu keluarga dan doa orang-orang terkasih, kami melangkah menuju kehidupan yang baru.</p>
                    </article> -->
                </div>
            </div>
        </section><?php endif; ?>
    <section class="ceremony-scene" id="detail-acara"><img class="ceremony-bg" src="<?= html_escape($heroImage); ?>" alt="Lokasi acara">
        <div class="ceremony-inner reveal">

            <div class="ceremony-kicker">Hari Bahagia</div>

            <div class="ceremony-date">
                <div class="month">
                    <?= html_escape($eventMonth ?: '-'); ?>
                </div>

                <div class="ceremony-day">
                    <?= html_escape($eventDay ?: '00'); ?>
                </div>

                <div class="year">
                    <?= html_escape($eventYear ?: '-'); ?>
                </div>
            </div>

            <div class="ceremony-divider"></div>


            <!-- AKAD NIKAH -->
            <div style="margin-bottom:25px;">
                <div style="
            font-size:14px;
            font-weight:600;
            letter-spacing:2px;
            color:#fff;
            margin-bottom:7px;
        ">
                    AKAD NIKAH
                </div>

                <div class="ceremony-meta">
                    08.00 WIB
                </div>
            </div>


            <!-- RESEPSI -->
            <div style="margin-bottom:28px;">
                <div style="
            font-size:14px;
            font-weight:600;
            letter-spacing:2px;
            color:#fff;
            margin-bottom:7px;
        ">
                    RESEPSI
                </div>

                <div class="ceremony-meta">
                    <?= html_escape(
                        $eventTime !== ''
                            ? $eventTime
                            : '10.00 WIB - SELESAI'
                    ); ?>
                </div>
            </div>


            <!-- LOKASI -->
            <div class="ceremony-place">

                <strong style="
            display:block;
            color:#fff;
            font-weight:500;
            font-size:13px;
            margin-bottom:8px;
        ">
                    <?= html_escape(
                        $project->location_name ?? '-'
                    ); ?>
                </strong>

                <?= nl2br(
                    html_escape(
                        $project->location_address ?? ''
                    )
                ); ?>

            </div>


            <?php if ($mapUrl): ?>

                <a
                    class="ceremony-map"
                    href="https://maps.app.goo.gl/sWAkPZSnPRxURNN98"
                    target="_blank"
                    rel="noopener">
                    <i class="bi bi-geo-alt"></i>
                    Buka Lokasi
                </a>

            <?php endif; ?>

        </div>
    </section>
    <?php if ($eventTimestamp > 0): ?><section class="section dark">
            <div class="shell reveal"><span class="eyebrow">Menuju Hari Bahagia</span>
                <h2 class="title">Saat Dua Hati<br> Menjadi Satu</h2>
                <div id="countdown" data-timestamp="<?= (int)$eventTimestamp; ?>" class="count-grid">
                    <div class="count-box"><b id="cdDays">00</b><span>Hari</span></div>
                    <div class="count-box"><b id="cdHours">00</b><span>Jam</span></div>
                    <div class="count-box"><b id="cdMinutes">00</b><span>Menit</span></div>
                    <div class="count-box"><b id="cdSeconds">00</b><span>Detik</span></div>
                </div>
            </div>
        </section><?php endif; ?>
    <?php if (!empty($project->location_address) || !empty($project->map_embed)): ?><section class="section">
            <div class="shell split">
                <div class="reveal"><span class="eyebrow">Tempat Berbahagia</span>
                    <h2 class="title">Tempat Berlangsungnya<br> Hari Bahagia</h2>
                    <p class="lead"><?= nl2br(html_escape($project->location_address ?? '')); ?></p>
                </div>
                <div class="map-frame reveal"><?php if (!empty($project->map_embed)) {
                                                    echo html_entity_decode($project->map_embed, ENT_QUOTES, 'UTF-8');
                                                } else { ?><iframe loading="lazy" src="https://maps.google.com/maps?q=<?= rawurlencode($mapQuery); ?>&output=embed"></iframe><?php } ?></div>
            </div>
        </section><?php endif; ?>
    <?php if (!empty($galleries)): ?>
        <?php
        $galleryItems = array_values((array)$galleries);
        $galleryStoryDefaults = array(
            array(
                'eyebrow' => 'Tentang Kita',
                'title' => 'Dalam setiap tatap, ada cerita.',
                'text' => 'Momen sederhana menjadi istimewa ketika dijalani bersama, meninggalkan kenangan yang selalu layak untuk disimpan.'
            ),

            array(
                'eyebrow' => 'Dalam Bingkai',
                'title' => 'Kenangan yang kami abadikan.',
                'text' => 'Sepenggal waktu, senyum, dan kebersamaan yang menjadi bagian indah dari kisah kami.'
            ),

            array(
                'eyebrow' => 'Menuju Selamanya',
                'title' => 'Satu langkah menuju hari bahagia.',
                'text' => 'Dengan cinta dan doa, kami menyambut lembaran baru untuk berjalan bersama dalam kisah yang sama.'
            )
        );
        $galleryStoryCount = min(3, count($galleryItems));
        ?>
        <section class="story-gallery" id="gallery">
            <div class="shell" style="padding-top:110px;padding-bottom:65px">
                <span class="eyebrow">Dalam Bingkai</span>

                <h2 class="title">
                    Kenangan yang Kami<br>
                    Abadikan
                </h2>

                <p class="lead" style="max-width:660px">
                    Sepenggal momen yang kami simpan, menjadi bagian indah dari kisah yang akan selalu kami kenang.
                </p>
            </div>
            <?php for ($i = 0; $i < $galleryStoryCount; $i++): $g = $galleryItems[$i];
                $story = $galleryStoryDefaults[$i]; ?>
                <article class="gallery-chapter reveal">
                    <figure class="chapter-media m-0">
                        <img loading="lazy" src="<?= asset_or_url($g->image_path); ?>" alt="<?= html_escape($g->caption ?? ('Galeri ' . ($i + 1))); ?>">
                    </figure>
                    <div class="chapter-copy" data-number="0<?= $i + 1; ?>">
                        <span class="eyebrow"><?= html_escape($story['eyebrow']); ?></span>
                        <h3><?= html_escape($story['title']); ?></h3>
                        <div class="chapter-line"></div>
                        <?php if (!empty($g->caption)): ?><div class="chapter-caption">“<?= html_escape($g->caption); ?>”</div><?php endif; ?>
                        <p class="lead"><?= html_escape($story['text']); ?></p>
                    </div>
                </article>
            <?php endfor; ?>
            <?php if (count($galleryItems) > 3): ?>
                <div class="shell gallery-after">
                    <div class="gallery-after-head">
                        <div><span class="eyebrow">Kenangan Lainnya</span>
                            <h3 class="display" style="font-size:clamp(48px,7vw,88px);line-height:.95;margin:15px 0 0">Galeri Kenangan</h3>
                        </div>

                    </div>
                    <div class="gallery-grid">
                        <?php for ($i = 3; $i < count($galleryItems); $i++): $g = $galleryItems[$i]; ?>
                            <figure class="gallery-item reveal">
                                <img loading="lazy" src="<?= asset_or_url($g->image_path); ?>" alt="<?= html_escape($g->caption ?? 'Galeri'); ?>">
                                <?php if (!empty($g->caption)): ?><figcaption class="gallery-caption"><?= html_escape($g->caption); ?></figcaption><?php endif; ?>
                            </figure>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div style="height:100px"></div>
        </section>
    <?php endif; ?>
    <section class="section">
        <div class="shell split">
            <!-- <div class="panel reveal"><span class="eyebrow">Bagikan Kebahagiaan</span>
                <h3 class="display mt-3" style="font-size:48px">Bagikan Undangan</h3>
                <p class="lead">Bagikan hari bahagia ini kepada keluarga dan sahabat.</p>
                <div class="input-group mt-4"><input id="inviteLink" class="form-control" value="<?= current_url(); ?>" readonly><button class="btn-sacred" type="button" onclick="copyInviteLink()">Salin</button></div>
            </div> -->
            <?php if (!empty($project->gift_enabled)): ?>

                <div class="panel reveal">

                    <span class="eyebrow">Tanda Kasih</span>

                    <h3 class="display mt-3" style="font-size:48px">
                        Hadiah Pernikahan
                    </h3>

                    <div class="lead">
                        <?= nl2br(html_escape($project->gift_info ?? '')); ?>
                    </div>


                    <!-- TOMBOL BUKA HADIAH -->
                    <div style="margin-top:28px;">

                        <button
                            id="giftToggleButton"
                            class="btn-sacred"
                            type="button"
                            onclick="toggleGiftDetail(this)">
                            <i class="bi bi-gift"></i>
                            <span>Klik di Sini</span>
                        </button>

                    </div>


                    <!-- DETAIL HADIAH -->
                    <div
                        id="giftDetail"
                        style="
            display:none;
            margin-top:30px;
        ">

                        <!-- TRANSFER REKENING -->
                        <div style="
            margin-bottom:10px;
        ">

                            <span class="eyebrow">
                                Transfer Rekening
                            </span>

                        </div>


                        <!-- BRI -->
                        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;
            padding:16px 0;
            border-bottom:1px solid rgba(0,0,0,.10);
        ">

                            <div>

                                <div style="
                    font-size:10px;
                    letter-spacing:1.8px;
                    text-transform:uppercase;
                    opacity:.55;
                    margin-bottom:4px;
                ">
                                    Bank BRI
                                </div>

                                <strong style="
                    font-size:15px;
                    font-weight:500;
                ">
                                    Dhahabah Yuni
                                </strong>

                            </div>


                            <button
                                class="btn-sacred"
                                type="button"
                                style="
                    min-width:120px;
                    text-align:center;
                "
                                onclick="copyGift(
                    '640101011700532',
                    this
                )">
                                <i class="bi bi-copy"></i>
                                <span>Salin</span>
                            </button>

                        </div>


                        <!-- BCA -->
                        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;
            padding:16px 0;
            border-bottom:1px solid rgba(0,0,0,.10);
        ">

                            <div>

                                <div style="
                    font-size:10px;
                    letter-spacing:1.8px;
                    text-transform:uppercase;
                    opacity:.55;
                    margin-bottom:4px;
                ">
                                    Bank BCA
                                </div>

                                <strong style="
                    font-size:15px;
                    font-weight:500;
                ">
                                    Edo Pradana
                                </strong>

                            </div>


                            <button
                                class="btn-sacred"
                                type="button"
                                style="
                    min-width:120px;
                    text-align:center;
                "
                                onclick="copyGift(
                    '7881045871',
                    this
                )">
                                <i class="bi bi-copy"></i>
                                <span>Salin</span>
                            </button>

                        </div>


                        <!-- PENGIRIMAN HADIAH -->
                        <div style="
            margin-top:32px;
        ">

                            <span class="eyebrow">
                                Pengiriman Hadiah
                            </span>


                            <div style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                gap:20px;
                padding:16px 0;
                border-bottom:1px solid rgba(0,0,0,.10);
            ">

                                <div style="
                    font-size:14px;
                    line-height:1.8;
                ">
                                    Dawuhan RT.11 RW.03,<br>
                                    Poncokusumo, Kab. Malang
                                </div>


                                <button
                                    class="btn-sacred"
                                    type="button"
                                    style="
                        min-width:120px;
                        text-align:center;
                    "
                                    onclick="copyGift(
                        'Dawuhan RT.11 RW.03, Poncokusumo, Kab. Malang',
                        this
                    )">
                                    <i class="bi bi-copy"></i>
                                    <span>Salin</span>
                                </button>

                            </div>

                        </div>


                        <!-- PENUTUP -->
                        <div style="
            margin-top:28px;
            font-size:13px;
            line-height:1.8;
            opacity:.75;
        ">
                            Terima kasih atas doa dan tanda kasih yang diberikan.
                            Semoga segala kebaikan senantiasa berbalas keberkahan.
                        </div>

                    </div>

                </div>


                <script>
                    function toggleGiftDetail(button) {

                        const detail =
                            document.getElementById('giftDetail');

                        const text =
                            button.querySelector('span');

                        const icon =
                            button.querySelector('i');


                        if (detail.style.display === 'none') {

                            detail.style.display = 'block';

                            text.innerText = 'Tutup';

                            if (icon) {
                                icon.className = 'bi bi-chevron-up';
                            }

                        } else {

                            detail.style.display = 'none';

                            text.innerText = 'Klik di Sini';

                            if (icon) {
                                icon.className = 'bi bi-gift';
                            }

                        }

                    }


                    function copyGift(value, button) {

                        const span =
                            button.querySelector('span');

                        const original =
                            span.innerText;


                        // Clipboard modern
                        if (
                            navigator.clipboard &&
                            window.isSecureContext
                        ) {

                            navigator.clipboard
                                .writeText(value)
                                .then(function() {

                                    showCopied();

                                });

                        } else {

                            // Fallback untuk browser tertentu / HTTP
                            const textarea =
                                document.createElement('textarea');

                            textarea.value = value;

                            textarea.style.position = 'fixed';
                            textarea.style.opacity = '0';

                            document.body.appendChild(textarea);

                            textarea.focus();
                            textarea.select();

                            document.execCommand('copy');

                            document.body.removeChild(textarea);

                            showCopied();

                        }


                        function showCopied() {

                            span.innerText = 'Tersalin';

                            setTimeout(function() {

                                span.innerText = original;

                            }, 1600);

                        }

                    }
                </script>

            <?php endif; ?>
        </div>
    </section>
    <?php if (!empty($project->rsvp_enabled)): ?><section class="section dark" id="rsvp">
            <div class="shell"><span class="eyebrow">Kehadiran Tamu</span>
                <h2 class="title">Hadirilah Hari Bahagia Kami</h2>
                <div class="panel" style="color:var(--ink)"><?php if ($this->session->flashdata('success')): ?><div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div><?php endif; ?><form method="post" action="<?= site_url('rsvp/store'); ?>" class="row g-4"><input type="hidden" name="project_id" value="<?= $project->id; ?>"><input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">
                        <div class="col-md-4"><label>Nama</label><input name="guest_name" class="form-control" value="<?= html_escape($displayGuest); ?>" required></div>
                        <div class="col-md-3"><label>Kehadiran</label><select name="attendance_status" class="form-select">
                                <option value="Hadir">Hadir</option>
                                <option value="Tidak Hadir">Tidak Hadir</option>
                            </select></div>
                        <div class="col-md-2"><label>Jumlah</label><input type="number" name="guest_total" class="form-control" value="1" min="1"></div>
                        <div class="col-md-3"><label>Catatan</label><input name="note" class="form-control"></div>
                        <div class="col-12"><button class="btn-sacred"><i class="bi bi-send"></i> Kirim Konfirmasi</button></div>
                    </form>
                </div>
            </div>
        </section><?php endif; ?>
    <?php if (!empty($project->wish_enabled)): ?>
        <section class="section wishes-section" id="wishes">
            <div class="shell">
                <div class="wishes-heading reveal">
                    <span class="eyebrow">Doa dan Restu</span>
                    <h2 class="title"> Doa<br>dan Ucapan</h2>
                    <!-- <p class="wishes-intro">“Mugi tansah pinaringan kabegjan, katentreman, lan katresnan ing salaminipun.”</p>
                    <div class="javanese wishes-glyph">ꦥꦔꦺꦱ꧀ꦠꦸ</div> -->
                </div>
                <div class="wishes-layout">
                    <div class="wish-form-wrap reveal">
                        <div class="wish-form-ornament">❦</div>
                        <h3>Kiriman Doa</h3>
                        <p>Doa yang tulus akan menjadi pengiring langkah kami dalam membangun kehidupan bersama.</p>
                        <form method="post" action="<?= site_url('wish/store'); ?>">
                            <input type="hidden" name="project_id" value="<?= $project->id; ?>">
                            <input type="hidden" name="guest_slug" value="<?= !empty($guest) ? html_escape($guest->slug) : ''; ?>">
                            <label>Nama</label>
                            <input name="guest_name" class="form-control mb-4" value="<?= html_escape($displayGuest); ?>" required>
                            <label>Doa dan Ucapan</label>
                            <textarea name="message" class="form-control mb-4" rows="5" placeholder="Tuliskan doa dan ucapan terbaik ..." required></textarea>
                            <button class="btn-sacred"><i class="bi bi-heart"></i> Kirim Doa</button>
                        </form>
                    </div>
                    <div class="wish-list reveal">
                        <div class="wish-list-title"><span>Ucapan dari Para Tamu</span><i>❦</i></div>
                        <?php if (!empty($wishes)): foreach ($wishes as $wish): ?>
                                <?php $wishName = trim((string)($wish->guest_name ?? 'Tamu'));
                                $wishInitial = function_exists('mb_substr') ? mb_substr($wishName, 0, 1, 'UTF-8') : substr($wishName, 0, 1); ?>
                                <article class="wish-letter">
                                    <div class="wish-seal"><?= html_escape(strtoupper($wishInitial)); ?></div>
                                    <div class="wish-letter-body">
                                        <div class="wish-name"><?= html_escape($wishName); ?></div>
                                        <div class="wish-message">“<?= nl2br(html_escape($wish->message ?? '')); ?>”</div>
                                        <div class="wish-signature">Pangestu lan katresnan</div>
                                    </div>
                                </article>
                            <?php endforeach;
                        else: ?>
                            <div class="wish-empty"><i>❦</i>
                                <p>Belum ada ucapan. Jadilah yang pertama menitipkan doa terbaik.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <footer class="footer">
        <div class="shell">

            <span class="eyebrow">
                Dengan Penuh Kasih
            </span>

            <h2 class="display mt-3">
                <?= html_escape(
                    $project->title ?? 'Pernikahan Kami'
                ); ?>
            </h2>

            <p class="lead mx-auto">
                Terima kasih telah menjadi bagian dari perjalanan dan doa kami.
            </p>


            <!-- CREDIT -->
            <div style="
        margin-top:45px;
        padding-top:25px;
        border-top:1px solid rgba(0,0,0,.08);
    ">

                <div style="
            font-size:10px;
            letter-spacing:2px;
            text-transform:uppercase;
            opacity:.55;
            margin-bottom:8px;
        ">
                    Crafted with ♡ by
                </div>

                <div style="
            font-size:16px;
            font-weight:500;
            margin-bottom:16px;
        ">
                    My Simple Gift
                </div>


                <!-- LINK BUTTON -->
                <div style="
            display:flex;
            justify-content:center;
            align-items:center;
            flex-wrap:wrap;
            gap:10px;
        ">

                    <!-- WEBSITE -->
                    <a
                        href="https://mysimplegift.com/"
                        target="_blank"
                        rel="noopener"
                        class="btn-sacred"
                        style="
                    display:inline-flex;
                    align-items:center;
                    gap:7px;
                    text-decoration:none;
                ">
                        <i class="bi bi-globe2"></i>
                        Kunjungi Website
                    </a>


                    <!-- INSTAGRAM -->
                    <a
                        href="https://www.instagram.com/mysimple.gift/"
                        target="_blank"
                        rel="noopener"
                        class="btn-sacred"
                        style="
                    display:inline-flex;
                    align-items:center;
                    gap:7px;
                    text-decoration:none;
                ">
                        <i class="bi bi-instagram"></i>
                        Instagram
                    </a>

                </div>


                <div style="
            margin-top:14px;
            font-size:10px;
            letter-spacing:.7px;
            opacity:.55;
        ">
                    @mysimple.gift
                </div>

            </div>

        </div>
    </footer>
    <?php if ($musicUrl): ?><audio id="bgMusic" loop playsinline preload="auto">
            <source src="<?= html_escape($musicUrl); ?>" type="audio/mpeg">Peramban Anda tidak mendukung pemutar audio.
        </audio>
        <div class="music-player"><button class="music-btn" id="musicToggle" aria-label="Putar atau jeda musik"><i class="bi bi-music-note-beamed"></i></button></div><?php endif; ?>
    <script>
        function copyInviteLink() {
            const e = document.getElementById('inviteLink');
            if (!e) return;
            navigator.clipboard ? navigator.clipboard.writeText(e.value) : document.execCommand('copy');
            alert('Link undangan berhasil disalin.');
        }
        (function() {
            const c = document.getElementById('countdown');
            if (!c) return;
            const t = Number(c.dataset.timestamp || 0);
            if (!Number.isFinite(t) || t <= 0) {
                console.warn('Hitung mundur: tanggal acara tidak valid.');
                return;
            }
            const days = document.getElementById('cdDays');
            const hours = document.getElementById('cdHours');
            const minutes = document.getElementById('cdMinutes');
            const seconds = document.getElementById('cdSeconds');
            let timer = null;

            function setValue(el, value) {
                if (el) el.textContent = String(value).padStart(2, '0');
            }

            function updateCountdown() {
                const distance = t - Date.now();
                if (distance <= 0) {
                    setValue(days, 0);
                    setValue(hours, 0);
                    setValue(minutes, 0);
                    setValue(seconds, 0);
                    c.classList.add('is-finished');
                    if (timer) clearInterval(timer);
                    return;
                }
                setValue(days, Math.floor(distance / 86400000));
                setValue(hours, Math.floor((distance % 86400000) / 3600000));
                setValue(minutes, Math.floor((distance % 3600000) / 60000));
                setValue(seconds, Math.floor((distance % 60000) / 1000));
            }
            updateCountdown();
            timer = setInterval(updateCountdown, 1000);
        })();
        (function() {
            const cover = document.getElementById('cover'),
                open = document.getElementById('openInvitation'),
                audio = document.getElementById('bgMusic'),
                btn = document.getElementById('musicToggle');

            function playing() {
                if (btn) {
                    btn.classList.add('is-playing');
                    btn.innerHTML = '<i class="bi bi-pause-fill"></i>'
                }
            }

            function paused() {
                if (btn) {
                    btn.classList.remove('is-playing');
                    btn.innerHTML = '<i class="bi bi-music-note-beamed"></i>'
                }
            }
            if (open) open.addEventListener('click', () => {
                cover.classList.add('hide');
                document.body.style.overflow = '';
                if (audio) audio.play().then(playing).catch(paused)
            });
            if (btn && audio) btn.addEventListener('click', () => audio.paused ? audio.play().then(playing) : audio.pause());
            if (audio) {
                audio.addEventListener('pause', paused);
                audio.addEventListener('error', () => {
                    paused();
                    console.error('Musik gagal dimuat:', audio.currentSrc || audio.src);
                });
            }
        })();
        const io = new IntersectionObserver(es => es.forEach(e => {
            if (e.isIntersecting) e.target.classList.add('show')
        }), {
            threshold: .12
        });
        document.querySelectorAll('.reveal').forEach(e => io.observe(e));
    </script>
    <script>
        function copyGift(number, button) {

            navigator.clipboard.writeText(number).then(function() {

                const span = button.querySelector('span');

                if (!span) {
                    return;
                }

                const original = span.innerText;

                span.innerText = 'Tersalin';

                setTimeout(function() {
                    span.innerText = original;
                }, 1600);

            });

        }
    </script>
</body>

</html>