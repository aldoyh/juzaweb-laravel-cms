@php
$translations = [
'en' => [
'pageTitle' => 'Anew — New Tab',
'metaDescription' => 'Born clean. A browser start page married to a personal dashboard.',
'skipLink' => 'Skip to search',
'titleAria' => 'Anew start',
'greetingM' => 'Good morning',
'greetingA' => 'Good afternoon',
'greetingE' => 'Good evening',
'greetingN' => 'Still up',
'subline' => 'born clean, soft, ready to begin.',
'searchLabel' => 'Search or jot a thought',
'searchPlaceholder' => 'Search or jot a thought — press Enter',
'searchPlaceholderCompact' => 'Search or jot a thought',
'quickLabel' => 'Quick',
'todayLabel' => 'Today',
'breathe' => 'breathe',
'tiles' => [
['k' => 'Mail', 'd' => '3 new'],
['k' => 'Tasks', 'd' => '2 left'],
['k' => 'Notes', 'd' => '1 draft'],
['k' => 'Drive', 'd' => '12 files'],
['k' => 'Calendar', 'd' => '2 today'],
['k' => 'Read', 'd' => 'saved'],
],
'todayItems' => [
['t' => 'Morning page', 'm' => '9:00 AM — 10 min'],
['t' => 'Walk, no phone', 'm' => 'Stretch the new tab'],
['t' => 'Ship one small thing', 'm' => 'Keep it soft'],
],
'pauseMotion' => 'Pause background motion',
'playMotion' => 'Play background motion',
'backToTop' => 'Anew — back to top',
'footerBlurb' => 'A new tab should feel like a newborn — no noise, no history, just a soft place to start. Search, pick
one thing, begin.',
'contactUs' => 'Today',
'quote' => 'You are new here. Again.',
'copyright' => 'Born today. Anew. © 2026',
'emailUs' => 'Start with:',
'switchLanguage' => 'Switch language',
'ctaButton' => 'Search',
'ctaSuccess' => 'Beginning',
],
'ar' => [
'pageTitle' => 'أنو — تبويب جديد',
'metaDescription' => 'مولودة نقية. صفحة بداية متصفح متزوجة بلوحة شخصية.',
'skipLink' => 'انتقل إلى البحث',
'titleAria' => 'أنو — بدايتك',
'greetingM' => 'صباح الخير',
'greetingA' => 'مساء الخير',
'greetingE' => 'مساء الخير',
'greetingN' => 'ما زلت مستيقظا',
'subline' => 'مولودة نقية، ناعمة، جاهزة للبداية.',
'searchLabel' => 'ابحث أو دوّن فكرة',
'searchPlaceholder' => 'ابحث أو دوّن فكرة — اضغط Enter',
'searchPlaceholderCompact' => 'ابحث أو دوّن',
'quickLabel' => 'سريع',
'todayLabel' => 'اليوم',
'breathe' => 'تنفس',
'tiles' => [
['k' => 'البريد', 'd' => '3 جديدة'],
['k' => 'المهام', 'd' => '2 متبقية'],
['k' => 'الملاحظات', 'd' => 'مسودة'],
['k' => 'الملفات', 'd' => '12 ملفا'],
['k' => 'التقويم', 'd' => '2 اليوم'],
['k' => 'القراءة', 'd' => 'محفوظة'],
],
'todayItems' => [
['t' => 'صفحة الصباح', 'm' => '9:00 ص — 10 دقائق'],
['t' => 'تمش بدون هاتف', 'm' => 'مدد التبويب'],
['t' => 'أنجز شيئا صغيرا', 'm' => 'أبقه ناعما'],
],
'pauseMotion' => 'إيقاف حركة الخلفية',
'playMotion' => 'تشغيل حركة الخلفية',
'backToTop' => 'أنو — العودة للأعلى',
'footerBlurb' => 'يجب أن تشعر صفحة البداية كمولود جديد — بلا ضوضاء، بلا سجل، مجرد مكان ناعم للبدء.',
'contactUs' => 'اليوم',
'quote' => 'أنت جديد هنا. مجددا.',
'copyright' => 'مولودة اليوم. أنو. © 2026',
'emailUs' => 'ابدأ بـ:',
'switchLanguage' => 'تغيير اللغة',
'ctaButton' => 'ابحث',
'ctaSuccess' => 'يبدأ',
],
];
$currentLocale = ($locale ?? app()->getLocale()) === 'ar' ? 'ar' : 'en';
$currentDirection = $direction ?? ($currentLocale === 'ar' ? 'rtl' : 'ltr');
$t = $translations[$currentLocale];
@endphp
<!DOCTYPE html>
<html lang="{{ $currentLocale }}" dir="{{ $currentDirection }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="dark">
    <meta name="theme-color" content="#000000">
    <title>{{ $t['pageTitle'] }}</title>
    <meta name="description" content="{{ $t['metaDescription'] }}">
    <link rel="icon" href="data:image/svg+xml,[STRIPPED]">
    <style>
        :root {
            --bg: #050507;
            --fg: #fafaf9;
            --muted: #9f9fa9;
            --muted2: #6b6b76;
            --card: #101012;
            --card2: #151519;
            --line: rgba(255, 255, 255, .08);
            --line2: rgba(255, 255, 255, .14);
            --accent: #fff;
            --radius: 28px;
            --radius-sm: 16px;
            --max: 1080px;
            --u: clamp(14px, 1.15vw, 17px);
            --v: clamp(40px, 8vw, 96px);
        }

        * {
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth;
            background: var(--bg)
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--fg);
            font-family: ui-sans-system, -apple-system, BlinkMacSystemFont, "SF Pro Display", Inter, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            letter-spacing: -.02em;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden
        }

        a {
            color: inherit;
            text-decoration: none
        }

        button {
            font: inherit
        }

        .skip {
            position: absolute;
            inset-inline-start: 16px;
            top: -100px;
            z-index: 10;
            padding: 10px 14px;
            border-radius: 999px;
            background: #fff;
            color: #000
        }

        .skip:focus {
            top: 16px
        }

        .canvas {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none
        }

        .canvas__glow {
            position: absolute;
            inset: -20%;
            background:
                radial-gradient(45% 60% at 20% 20%, rgba(255, 255, 255, .12), transparent 60%),
                radial-gradient(35% 50% at 80% 30%, rgba(200, 200, 255, .10), transparent 60%),
                radial-gradient(50% 70% at 50% 100%, rgba(255, 255, 255, .06), transparent 60%);
            filter: blur(20px)
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: .6;
            mix-blend-mode: screen
        }

        .blob--1 {
            width: 42vw;
            height: 42vw;
            left: -6vw;
            top: -8vw;
            background: radial-gradient(circle at 30% 30%, #fff, #a8a8b8 60%, transparent 70%);
            animation: drift1 22s ease-in-out infinite
        }

        .blob--2 {
            width: 38vw;
            height: 38vw;
            right: -8vw;
            top: 10vw;
            background: radial-gradient(circle at 50% 50%, #d8d8e8, #6a6a80 65%, transparent 72%);
            animation: drift2 26s ease-in-out infinite
        }

        .blob--3 {
            width: 60vw;
            height: 60vw;
            left: 18vw;
            bottom: -24vw;
            background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, .18), transparent 60%);
            animation: drift3 30s ease-in-out infinite
        }

        @keyframes drift1 {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1)
            }

            50% {
                transform: translate3d(2vw, 1.5vw, 0) scale(1.08)
            }
        }

        @keyframes drift2 {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1)
            }

            50% {
                transform: translate3d(-1.5vw, 1vw, 0) scale(1.05)
            }
        }

        @keyframes drift3 {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1)
            }

            50% {
                transform: translate3d(0, -1.5vw, 0) scale(1.02)
            }
        }

        @media(prefers-reduced-motion:reduce) {
            .blob {
                animation: none !important
            }
        }

        .page {
            position: relative;
            z-index: 1;
            min-height: 100dvh;
            display: flex;
            flex-direction: column
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 3;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px var(--v);
            backdrop-filter: blur(14px);
            background: linear-gradient(to bottom, rgba(5, 5, 7, .8), rgba(5, 5, 7, 0));
            border-bottom: 1px solid transparent
        }

        .topbar__left,
        .topbar__right {
            display: flex;
            gap: 10px;
            align-items: center
        }

        .icon-btn {
            width: 36px;
            height: 36px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, .04);
            display: grid;
            place-items: center;
            cursor: pointer;
            transition: .2s
        }

        .icon-btn:hover {
            background: rgba(255, 255, 255, .08);
            border-color: var(--line2)
        }

        .icon-btn svg {
            width: 16px;
            height: 16px;
            stroke: var(--fg);
            fill: none;
            stroke-width: 1.5
        }

        .lang {
            padding: 0 14px;
            height: 36px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, .04);
            color: var(--fg);
            cursor: pointer;
            font-size: 13px;
            letter-spacing: .02em
        }

        .lang:hover {
            background: rgba(255, 255, 255, .08)
        }

        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: clamp(16px, 3vw, 32px) var(--v) var(--v)
        }

        .anew {
            width: 100%;
            max-width: var(--max);
            border-radius: var(--radius);
            background: linear-gradient(180deg, rgba(255, 255, 255, .06), rgba(255, 255, 255, .02));
            border: 1px solid var(--line);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(22px);
            box-shadow: 0 20px 80px rgba(0, 0, 0, .6), inset 0 1px 0 rgba(255, 255, 255, .08)
        }

        .anew::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(135deg, rgba(255, 255, 255, .18), rgba(255, 255, 255, .02) 40%, rgba(255, 255, 255, .06));
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none
        }

        .anew__inner {
            position: relative;
            padding: clamp(22px, 3.2vw, 40px);
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            gap: clamp(20px, 2.5vw, 32px)
        }

        @media(max-width:900px) {
            .anew__inner {
                grid-template-columns: 1fr
            }
        }

        .clock {
            display: flex;
            flex-direction: column;
            gap: 18px
        }

        .clock__time {
            font-size: clamp(54px, 7.2vw, 84px);
            line-height: .9;
            letter-spacing: -.06em;
            font-weight: 650;
            font-variant-numeric: tabular-nums
        }

        .clock__meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            height: 30px;
            padding: 0 12px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, .04);
            font-size: 12.5px;
            letter-spacing: .02em;
            color: var(--muted)
        }

        .pill b {
            color: var(--fg);
            font-weight: 600
        }

        .pill--live::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(255, 255, 255, .14);
            animation: pulse 2s infinite
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, .22)
            }

            100% {
                box-shadow: 0 0 0 8px rgba(255, 255, 255, 0)
            }
        }

        .h1 {
            font-size: clamp(28px, 3vw, 36px);
            line-height: 1.05;
            letter-spacing: -.04em;
            margin: 0;
            font-weight: 600
        }

        .h1 span {
            color: var(--muted);
            font-weight: 400
        }

        .lede {
            color: var(--muted);
            font-size: var(--u);
            line-height: 1.6;
            max-width: 34ch;
            margin: 0
        }

        .search {
            margin-top: 6px
        }

        .search__label {
            position: absolute;
            width: 1px;
            height: 1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0)
        }

        .search__shell {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 6px 6px 18px;
            border-radius: 999px;
            background: #0c0c0e;
            border: 1px solid var(--line2);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .06), 0 8px 24px rgba(0, 0, 0, .35);
            transition: .2s
        }

        .search__shell:focus-within {
            border-color: rgba(255, 255, 255, .28);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .08), 0 0 0 4px rgba(255, 255, 255, .08)
        }

        .search__input {
            flex: 1;
            background: transparent;
            border: 0;
            outline: 0;
            color: var(--fg);
            font-size: clamp(14px, 1.2vw, 16px);
            height: 44px;
            min-width: 0
        }

        .search__input::placeholder {
            color: var(--muted2)
        }

        .search__btn {
            height: 44px;
            padding: 0 20px;
            border-radius: 999px;
            border: 0;
            background: #fff;
            color: #000;
            font-weight: 600;
            letter-spacing: -.01em;
            cursor: pointer;
            transition: .2s;
            white-space: nowrap
        }

        .search__btn:hover {
            transform: translateY(-1px)
        }

        .search__btn:active {
            transform: translateY(0)
        }

        .quick {
            margin-top: 22px
        }

        .quick__head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px
        }

        .quick__label {
            font-size: 11px;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--muted2)
        }

        .quick__action {
            font-size: 12.5px;
            color: var(--muted);
            cursor: pointer
        }

        .quick__action:hover {
            color: var(--fg)
        }

        .tiles {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px
        }

        @media(max-width:560px) {
            .tiles {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        .tile {
            border-radius: 18px;
            background: rgba(255, 255, 255, .035);
            border: 1px solid var(--line);
            padding: 14px 14px 12px;
            min-height: 84px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: .2s;
            cursor: pointer;
            position: relative;
            overflow: hidden
        }

        .tile:hover {
            background: rgba(255, 255, 255, .06);
            border-color: var(--line2);
            transform: translateY(-1px)
        }

        .tile__k {
            font-size: 13.5px;
            font-weight: 550;
            letter-spacing: -.02em
        }

        .tile__d {
            font-size: 12px;
            color: var(--muted);
            margin-top: 6px
        }

        .tile__dot {
            position: absolute;
            top: 12px;
            inset-inline-end: 12px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 1px solid var(--line);
            display: grid;
            place-items: center;
            font-size: 10px;
            color: var(--muted2)
        }

        .right {
            display: flex;
            flex-direction: column;
            gap: 14px
        }

        .card {
            background: rgba(0, 0, 0, .28);
            border: 1px solid var(--line);
            border-radius: 22px;
            padding: 18px
        }

        .card__head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px
        }

        .card__title {
            font-size: 12px;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--muted2)
        }

        .card__breathe {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 1px solid var(--line);
            display: grid;
            place-items: center;
            font-size: 10px;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--muted);
            animation: breathe 4s ease-in-out infinite
        }

        @keyframes breathe {

            0%,
            100% {
                transform: scale(1);
                opacity: .8
            }

            50% {
                transform: scale(1.08);
                opacity: 1
            }
        }

        .list {
            display: flex;
            flex-direction: column
        }

        .row {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 12px 0;
            border-top: 1px solid var(--line)
        }

        .row:first-child {
            border-top: 0;
            padding-top: 0
        }

        .row:last-child {
            padding-bottom: 0
        }

        .row__check {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid var(--line2);
            display: grid;
            place-items: center;
            flex: 0 0 20px;
            margin-top: 1px
        }

        .row__check svg {
            width: 10px;
            height: 10px;
            stroke: #fff;
            fill: none;
            stroke-width: 1.6
        }

        .row__t {
            font-size: 13.5px;
            font-weight: 500;
            line-height: 1.3
        }

        .row__m {
            font-size: 12px;
            color: var(--muted);
            margin-top: 3px
        }

        .mini {
            border-radius: 22px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .06), rgba(255, 255, 255, .015));
            border: 1px solid var(--line);
            padding: 18px;
            position: relative;
            overflow: hidden
        }

        .mini__q {
            font-size: 13.5px;
            line-height: 1.55;
            color: var(--muted);
            font-style: italic;
            max-width: 26ch
        }

        .mini__q b {
            color: var(--fg);
            font-style: normal
        }

        .mini__foot {
            margin-top: 16px;
            display: flex;
            gap: 8px
        }

        .dot {
            height: 26px;
            padding: 0 10px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: rgba(255, 255, 255, .03);
            font-size: 11.5px;
            color: var(--muted);
            display: inline-flex;
            align-items: center
        }

        .footer {
            padding: 28px var(--v);
            border-top: 1px solid var(--line);
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 24px;
            max-width: var(--max);
            width: 100%;
            margin: 0 auto
        }

        @media(max-width:800px) {
            .footer {
                grid-template-columns: 1fr
            }
        }

        .footer__blurb {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
            max-width: 48ch
        }

        .footer__meta {
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: flex-start
        }

        .footer__links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap
        }

        .footer__links a {
            font-size: 12.5px;
            color: var(--muted);
            border: 1px solid var(--line);
            padding: 6px 10px;
            border-radius: 999px
        }

        .footer__links a:hover {
            color: var(--fg);
            border-color: var(--line2)
        }

        .copy {
            font-size: 11.5px;
            color: var(--muted2);
            letter-spacing: .02em
        }

        .sr {
            position: absolute;
            width: 1px;
            height: 1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0)
        }
    </style>
</head>

<body>
    <a class="skip" href="#search">{{ $t['skipLink'] }}</a>
    <div class="canvas" aria-hidden="true">
        <div class="canvas__glow"></div>
        <div class="blob blob--1"></div>
        <div class="blob blob--2"></div>
        <div class="blob blob--3"></div>
    </div>

    <div class="page">
        <div class="topbar">
            <div class="topbar__left">
                <button class="icon-btn" id="motionToggle" type="button" aria-pressed="false"
                    aria-label="{{ $t['pauseMotion'] }}">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M10 7.5v9M14 7.5v9M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" />
                    </svg>
                </button>
                <div class="pill pill--live"><b>Anew</b> {{ $t['breathe'] }}</div>
            </div>
            <div class="topbar__right">
                <div class="pill" id="datePill">—</div>
                <button class="lang" id="langSwitch" type="button" aria-label="{{ $t['switchLanguage'] }}">{{
                    $currentLocale === 'ar' ? 'EN' : 'العربية' }}</button>
            </div>
        </div>

        <main class="main">
            <section class="anew" aria-labelledby="anewTitle">
                <div class="anew__inner">
                    <div class="clock">
                        <div class="clock__time" id="clockTime">00:00</div>
                        <div class="clock__meta">
                            <div class="pill" id="greetingPill"></div>
                            <div class="pill" id="sublinePill">{{ $t['subline'] }}</div>
                        </div>

                        <h1 class="h1" id="anewTitle"><span id="greetingText"></span> <span style="color:var(--fg)">{{
                                $currentLocale === 'ar' ? 'هنا' : 'you’re here' }}</span></h1>
                        <p class="lede">{{ $t['footerBlurb'] }}</p>

                        <div class="search" id="search">
                            <label class="search__label" for="searchInput">{{ $t['searchLabel'] }}</label>
                            <form class="search__shell" id="searchForm" autocomplete="off" role="search"
                                aria-label="{{ $t['searchLabel'] }}">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <circle cx="11" cy="11" r="6" stroke="rgba(255,255,255,.5)" stroke-width="1.5" />
                                    <path d="M16 16l3.5 3.5" stroke="rgba(255,255,255,.5)" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                                <input class="search__input" id="searchInput" type="text"
                                    placeholder="{{ $t['searchPlaceholder'] }}" spellcheck="false" />
                                <button class="search__btn" type="submit">{{ $t['ctaButton'] }}</button>
                            </form>
                        </div>

                        <div class="quick">
                            <div class="quick__head">
                                <div class="quick__label">{{ $t['quickLabel'] }}</div>
                                <div class="quick__action" id="shuffleQuick">{{ $currentLocale === 'ar' ? 'تحديث' :
                                    'shuffle' }}</div>
                            </div>
                            <div class="tiles" id="tiles">
                                @foreach($t['tiles'] as $i => $tile)
                                <a class="tile" href="#" data-k="{{ $tile['k'] }}">
                                    <div>
                                        <div class="tile__k">{{ $tile['k'] }}</div>
                                        <div class="tile__d">{{ $tile['d'] }}</div>
                                    </div>
                                    <div class="tile__dot">{{ $i+1 }}</div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="right">
                        <div class="card">
                            <div class="card__head">
                                <div class="card__title">{{ $t['todayLabel'] }}</div>
                                <div class="card__breathe">{{ $t['breathe'] }}</div>
                            </div>
                            <div class="list">
                                @foreach($t['todayItems'] as $row)
                                <div class="row">
                                    <div class="row__check"><svg viewBox="0 0 12 12">
                                            <path d="M2.5 6l2 2 5-5" />
                                        </svg></div>
                                    <div>
                                        <div class="row__t">{{ $row['t'] }}</div>
                                        <div class="row__m">{{ $row['m'] }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mini">
                            <div class="mini__q"><b>{{ $t['quote'] }}</b><br>{{ $t['footerBlurb'] }}</div>
                            <div class="mini__foot">
                                <span class="dot">{{ $t['emailUs'] }} soft start</span>
                                <span class="dot">⌘ K</span>
                            </div>
                        </div>

                        <div class="card" style="background:rgba(255,255,255,.04)">
                            <div class="card__head">
                                <div class="card__title">{{ $t['contactUs'] }}</div>
                                <div class="pill" id="miniTime">—</div>
                            </div>
                            <div style="display:flex;gap:8px;flex-wrap:wrap">
                                <span class="dot" style="background:#fff;color:#000;border-color:#fff">new tab →
                                    dashboard</span>
                                <span class="dot">born clean</span>
                                <span class="dot">no history</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="footer">
                <div class="footer__blurb">{{ $t['footerBlurb'] }}</div>
                <div class="footer__meta">
                    <div class="footer__links">
                        <a href="#" id="backToTop">{{ $t['backToTop'] }}</a>
                        <a href="#" onclick="localStorage.clear();location.reload();return false;">reset</a>
                    </div>
                    <div class="copy">{{ $t['copyright'] }}</div>
                </div>
            </footer>
        </main>
    </div>

    <script>
        const I18N = @json($translations);
        const LOCALE = "{{ $currentLocale }}";
        const t = I18N[LOCALE];

        const timeEl = document.getElementById('clockTime');
        const datePill = document.getElementById('datePill');
        const miniTime = document.getElementById('miniTime');
        const greetingPill = document.getElementById('greetingPill');
        const greetingText = document.getElementById('greetingText');
        const motionToggle = document.getElementById('motionToggle');
        const blobs = document.querySelectorAll('.blob');
        const searchForm = document.getElementById('searchForm');
        const searchInput = document.getElementById('searchInput');

        function fmtDate(d) {
            try {
                return new Intl.DateTimeFormat(LOCALE === 'ar' ? 'ar-EG' : 'en-GB', { weekday: 'long', day: 'numeric', month: 'long' }).format(d);
            } catch (e) { return d.toDateString(); }
        }
        function tick() {
            const now = new Date();
            const hh = String(now.getHours()).padStart(2, '0');
            const mm = String(now.getMinutes()).padStart(2, '0');
            timeEl.textContent = hh + ':' + mm;
            datePill.textContent = fmtDate(now);
            miniTime.textContent = hh + ':' + mm;
            const h = now.getHours();
            let gKey = 'greetingM', gShort = t.greetingM;
            if (h >= 12 && h < 17) { gKey = 'greetingA'; gShort = t.greetingA; }
            else if (h >= 17 && h < 23) { gKey = 'greetingE'; gShort = t.greetingE; }
            else if (h >= 23 || h < 5) { gKey = 'greetingN'; gShort = t.greetingN; }
            greetingPill.textContent = gShort;
            greetingText.textContent = gShort + (LOCALE === 'ar' ? '،' : ' —');
        }
        tick(); setInterval(tick, 1000 * 15);

        let motionPaused = localStorage.getItem('anew_motion') === '1';
        function applyMotion() {
            blobs.forEach(b => b.style.animationPlayState = motionPaused ? 'paused' : 'running');
            motionToggle.setAttribute('aria-pressed', String(motionPaused));
            motionToggle.setAttribute('aria-label', motionPaused ? t.playMotion : t.pauseMotion);
            motionToggle.style.opacity = motionPaused ? '.6' : '1';
        }
        applyMotion();
        motionToggle.addEventListener('click', () => {
            motionPaused = !motionPaused;
            localStorage.setItem('anew_motion', motionPaused ? '1' : '0');
            applyMotion();
        });

        document.getElementById('langSwitch').addEventListener('click', () => {
            const next = LOCALE === 'ar' ? 'en' : 'ar';
            const url = new URL(window.location.href);
            url.searchParams.set('locale', next);
            window.location.href = url.toString();
        });

        searchForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const q = searchInput.value.trim();
            if (!q) { searchInput.focus(); return; }
            const btn = searchForm.querySelector('.search__btn');
            btn.textContent = t.ctaSuccess;
            setTimeout(() => {
                const isUrl = /^https?:\/\//i.test(q) || (q.includes('.') && !q.includes(' '));
                if (isUrl) {
                    const href = q.startsWith('http') ? q : 'https://' + q;
                    window.location.href = href;
                } else {
                    window.location.href = 'https://www.google.com/search?q=' + encodeURIComponent(q);
                }
            }, 220);
        });

        document.addEventListener('keydown', (e) => {
            if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') { e.preventDefault(); searchInput.focus(); searchInput.select(); }
        });
        document.getElementById('backToTop').addEventListener('click', (e) => { e.preventDefault(); window.scrollTo({ top: 0, behavior: 'smooth' }); });

        document.getElementById('shuffleQuick').addEventListener('click', () => {
            const tiles = document.getElementById('tiles');
            const arr = Array.from(tiles.children);
            for (let i = arr.length - 1; i > 0; i--) { const j = Math.floor(Math.random() * (i + 1));[arr[i], arr[j]] = [arr[j], arr[i]]; }
            arr.forEach(n => tiles.appendChild(n));
        });

        let mx = 0, my = 0;
        window.addEventListener('pointermove', (e) => {
            if (motionPaused) return;
            mx = (e.clientX / window.innerWidth - .5);
            my = (e.clientY / window.innerHeight - .5);
            document.querySelector('.blob--1').style.transform = `translate3d(${mx * 2}vw, ${my * 1.5}vw, 0)`;
            document.querySelector('.blob--2').style.transform = `translate3d(${mx * -1.5}vw, ${my * 1}vw, 0)`;
        }, { passive: true });
    </script>
</body>

</html>