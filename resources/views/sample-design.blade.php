@php
    $currentLocale = ($locale ?? app()->getLocale()) === 'ar' ? 'ar' : 'en';
    $currentDirection = $direction ?? ($currentLocale === 'ar' ? 'rtl' : 'ltr');
    $strings = [
        'en' => [
            'pageTitle' => 'Juzaweb — Launch faster',
            'metaDescription' => 'A modern starter landing page for your Juzaweb project with multilingual support, polished UX, and a clean production-ready presentation.',
            'skipLink' => 'Skip to the call to action',
            'brand' => 'Juzaweb',
            'eyebrow' => 'Ready to scale',
            'titleLine1' => 'Build your',
            'titleLine2' => 'next digital product',
            'subtitle' => 'Launch faster with a flexible Laravel CMS foundation, smart workflows, multilingual frontends, and a polished customer experience from day one.',
            'primaryCta' => 'Get started',
            'secondaryCta' => 'See the docs',
            'proofLabel' => 'Why teams choose Juzaweb',
            'proofItem1' => 'Flexible CMS foundations',
            'proofItem2' => 'Performance-first setup',
            'proofItem3' => 'Multilingual-ready UX',
            'emailLabel' => 'Email address',
            'emailPlaceholder' => 'Enter your email',
            'ctaButton' => 'Request access',
            'statusError' => 'Enter a valid email address to continue.',
            'statusSuccess' => 'Thanks — we will be in touch soon.',
            'footerText' => 'Designed for product teams, agencies, and modern web projects.',
            'switchLanguage' => 'العربية',
            'toggleTheme' => 'Toggle theme',
        ],
        'ar' => [
            'pageTitle' => 'Juzaweb — ابدأ بسرعة',
            'metaDescription' => 'صفحة هبوط حديثة لمشروع Juzaweb مع دعم متعدد اللغات، تجربة مستخدم أنيقة، وتصميم جاهز للإنتاج.',
            'skipLink' => 'تجاوز إلى زر الدعوة',
            'brand' => 'Juzaweb',
            'eyebrow' => 'جاهز للتوسع',
            'titleLine1' => 'ابنِ',
            'titleLine2' => 'منتجك الرقمي التالي',
            'subtitle' => 'ابدأ بسرعة باستخدام أساس تشغيلي مرن مبني على Laravel CMS، وسير عمل ذكي، واجهات متعددة اللغات، وتجربة مستخدم احترافية منذ البداية.',
            'primaryCta' => 'ابدأ الآن',
            'secondaryCta' => 'عرض الوثائق',
            'proofLabel' => 'لماذا يختار الفرق Juzaweb',
            'proofItem1' => 'أساس مرن لإدارة المحتوى',
            'proofItem2' => 'تهيئة موجهة للأداء',
            'proofItem3' => 'واجهة جاهزة للغات المتعددة',
            'emailLabel' => 'البريد الإلكتروني',
            'emailPlaceholder' => 'أدخل بريدك الإلكتروني',
            'ctaButton' => 'طلب الوصول',
            'statusError' => 'يرجى إدخال بريد إلكتروني صحيح للمتابعة.',
            'statusSuccess' => 'شكرًا — سنعاود التواصل معك قريبًا.',
            'footerText' => 'مصمم للفرق الرقمية، الوكالات، والمشاريع الإلكترونية الحديثة.',
            'switchLanguage' => 'English',
            'toggleTheme' => 'تبديل السمة',
        ],
    ];
    $t = $strings[$currentLocale];
@endphp
<!DOCTYPE html>
<html lang="{{ $currentLocale }}" dir="{{ $currentDirection }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="dark light">
    <meta name="theme-color" content="#071120">
    <title>{{ $t['pageTitle'] }}</title>
    <meta name="description" content="{{ $t['metaDescription'] }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #071120;
            --bg-alt: #0d1b2d;
            --panel: rgba(14, 21, 33, 0.8);
            --line: rgba(148, 163, 184, 0.2);
            --text: #edf3ff;
            --muted: #a7b7d4;
            --primary: #80a2ff;
            --primary-strong: #6d8fff;
            --accent: #7fe7cf;
            --shadow: 0 30px 70px rgba(1, 7, 20, 0.65);
        }

        html[data-theme="light"] {
            --bg: #eef4ff;
            --bg-alt: #f7faff;
            --panel: rgba(255, 255, 255, 0.82);
            --line: rgba(15, 23, 42, 0.1);
            --text: #0d1728;
            --muted: #52637d;
            --primary: #295dff;
            --primary-strong: #2047cc;
            --accent: #10b981;
            --shadow: 0 24px 60px rgba(26, 42, 64, 0.12);
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(128,162,255,0.2), transparent 28%),
                radial-gradient(circle at bottom right, rgba(127,231,207,0.18), transparent 30%),
                var(--bg);
            color: var(--text);
        }
        a { text-decoration: none; color: inherit; }
        button, input { font: inherit; }
        .shell { max-width: 1180px; margin: 0 auto; padding: 22px 20px 60px; }
        .topbar {
            display: flex; justify-content: space-between; align-items: center; gap: 16px;
            padding-bottom: 24px;
        }
        .brand {
            display: inline-flex; align-items: center; gap: 12px; font-weight: 800; letter-spacing: -0.06em;
        }
        .brand-mark {
            width: 38px; height: 38px; border-radius: 12px; display: grid; place-items: center;
            background: linear-gradient(135deg, var(--primary), var(--accent)); color: #08101d; font-size: 0.85rem;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.45);
        }
        .top-actions {
            display: flex; align-items: center; gap: 10px;
        }
        .button {
            border: 1px solid var(--line); background: rgba(255,255,255,0.02); color: var(--text);
            border-radius: 999px; padding: 10px 15px; font-weight: 600; cursor: pointer;
        }
        .button.primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-strong));
            color: #08101d; border-color: transparent; box-shadow: var(--shadow);
        }
        .hero {
            display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 30px; align-items: center; min-height: 680px;
        }
        .eyebrow {
            display: inline-flex; align-items: center; gap: 10px; padding: 8px 12px; border-radius: 999px; border: 1px solid var(--line);
            background: rgba(128,162,255,0.08); color: var(--muted); letter-spacing: 0.12em; text-transform: uppercase; font-size: 0.7rem; font-weight: 700;
        }
        .eyebrow::before {
            content: ''; width: 8px; height: 8px; border-radius: 50%; background: linear-gradient(135deg, var(--accent), var(--primary));
        }
        h1 {
            margin: 20px 0 18px; font-size: clamp(3rem, 5vw, 5.2rem); line-height: 0.92; letter-spacing: -0.08em;
        }
        h1 .accent {
            display: block; color: var(--primary);
        }
        .subtitle {
            max-width: 620px; color: var(--muted); font-size: clamp(1.02rem, 2vw, 1.2rem); line-height: 1.7;
        }
        .actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 24px; }
        .stats {
            display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; margin-top: 32px;
        }
        .stat {
            padding: 18px 18px 14px; border-radius: 18px; background: rgba(255,255,255,0.02); border: 1px solid var(--line);
            box-shadow: var(--shadow);
        }
        .stat strong { display: block; font-size: clamp(1.5rem, 2vw, 2rem); letter-spacing: -0.05em; margin-bottom: 8px; }
        .stat span { color: var(--muted); }
        .visual {
            display: flex; justify-content: center; align-items: center; position: relative; min-height: 520px;
        }
        .panel {
            position: relative; width: min(92%, 480px); padding: 20px; border-radius: 32px; border: 1px solid var(--line);
            background: linear-gradient(180deg, rgba(255,255,255,0.04), rgba(255,255,255,0.01)); box-shadow: var(--shadow);
        }
        .panel::before {
            content: ''; position: absolute; inset: auto auto 56% -26px; width: 180px; height: 180px; border-radius: 50%;
            background: rgba(128,162,255,0.2); filter: blur(18px); pointer-events: none;
        }
        .fake-top {
            display: flex; justify-content: space-between; align-items: center; padding: 8px 8px 18px; color: var(--muted); font-size: 0.8rem;
        }
        .dots { display: flex; gap: 8px; }
        .dot { width: 10px; height: 10px; border-radius: 50%; }
        .dot:nth-child(1){ background:#ff7f7f; } .dot:nth-child(2){ background:#ffd77a; } .dot:nth-child(3){ background:#70e7a6; }
        .chart { padding: 18px 16px 10px; border: 1px solid var(--line); border-radius: 18px; background: rgba(13, 27, 45, 0.35); }
        .bars { display: flex; align-items: end; gap: 10px; height: 180px; }
        .bars span { flex: 1; display: block; border-radius: 12px 12px 0 0; background: linear-gradient(180deg, var(--primary), rgba(128,162,255,0.25)); }
        .bars span:nth-child(1){ height: 31%; } .bars span:nth-child(2){ height: 47%; } .bars span:nth-child(3){ height: 68%; } .bars span:nth-child(4){ height: 60%; } .bars span:nth-child(5){ height: 86%; } .bars span:nth-child(6){ height: 96%; } .bars span:nth-child(7){ height: 72%; }
        .mini-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; margin-top: 14px; }
        .mini-card { padding: 14px 16px; border-radius: 16px; border: 1px solid var(--line); background: rgba(255,255,255,0.02); }
        .mini-card small { display: block; color: var(--muted); text-transform: uppercase; letter-spacing: 0.12em; margin-bottom: 8px; }
        .mini-card strong { font-size: 1.8rem; letter-spacing: -0.08em; }
        .cta {
            margin-top: 36px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 18px; border: 1px solid var(--line);
            border-radius: 26px; background: rgba(255,255,255,0.02); padding: 22px; box-shadow: var(--shadow);
        }
        .cta h2 { margin: 0 0 8px; font-size: clamp(1.8rem, 2.4vw, 2.9rem); letter-spacing: -0.06em; }
        .cta p { margin: 0; color: var(--muted); line-height: 1.7; }
        .mail-form {
            display: flex; align-items: center; gap: 10px; border: 1px solid var(--line); border-radius: 999px; background: rgba(9, 15, 24, 0.36); padding: 6px;
            min-width: min(100%, 420px);
        }
        .mail-form input {
            flex: 1; min-width: 0; border: 0; background: transparent; color: var(--text); padding: 0 16px; outline: none;
        }
        .mail-form input::placeholder { color: var(--muted); }
        .mail-form button { border: 0; border-radius: 999px; background: linear-gradient(135deg, var(--primary), var(--primary-strong)); color: #08101d; font-weight: 700; padding: 12px 18px; cursor: pointer; }
        .status {
            min-height: 20px; margin-top: 10px; font-size: 0.9rem; color: var(--muted);
        }
        .status.error { color: #ff8c9e; }
        .status.success { color: #7fe7cf; }
        footer {
            display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap; color: var(--muted); padding-top: 30px;
        }
        @media (max-width: 920px) {
            .hero { grid-template-columns: 1fr; min-height: auto; }
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (max-width: 620px) {
            .topbar { flex-direction: column; align-items: flex-start; }
            .top-actions { width: 100%; justify-content: flex-start; }
            .stats { grid-template-columns: 1fr; }
            .mail-form { flex-direction: column; align-items: stretch; border-radius: 22px; }
            .mail-form input, .mail-form button { width: 100%; }
            .mail-form button { border-radius: 14px; }
        }
    </style>
</head>
<body>
    <div class="shell">
        <header class="topbar">
            <div class="brand" aria-label="{{ $t['brand'] }}">
                <span class="brand-mark" aria-hidden="true">J</span>
                <span>{{ $t['brand'] }}</span>
            </div>
            <div class="top-actions">
                <button class="button" type="button" data-theme-toggle>{{ $t['toggleTheme'] }}</button>
                <button class="button" type="button" onclick="const next = document.documentElement.lang === 'ar' ? 'en' : 'ar'; window.location.href = '?lang=' + next;">{{ $t['switchLanguage'] }}</button>
            </div>
        </header>

        <main>
            <section class="hero">
                <div>
                    <div class="eyebrow">{{ $t['eyebrow'] }}</div>
                    <h1>
                        <span>{{ $t['titleLine1'] }}</span>
                        <span class="accent">{{ $t['titleLine2'] }}</span>
                    </h1>
                    <p class="subtitle">{{ $t['subtitle'] }}</p>
                    <div class="actions">
                        <a href="#cta" class="button primary">{{ $t['primaryCta'] }}</a>
                        <a href="https://juzaweb.com" class="button">{{ $t['secondaryCta'] }}</a>
                    </div>
                    <div class="stats" aria-label="Key metrics">
                        <div class="stat"><strong>120+</strong><span>{{ $t['proofItem1'] }}</span></div>
                        <div class="stat"><strong>4.9/5</strong><span>{{ $t['proofItem2'] }}</span></div>
                        <div class="stat"><strong>24/7</strong><span>{{ $t['proofItem3'] }}</span></div>
                    </div>
                </div>

                <div class="visual" aria-hidden="true">
                    <div class="panel">
                        <div class="fake-top">
                            <div class="dots"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>
                            <span>dashboard</span>
                        </div>
                        <div class="chart">
                            <div class="bars">
                                <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                            </div>
                        </div>
                        <div class="mini-grid">
                            <div class="mini-card"><small>traffic</small><strong>92k</strong></div>
                            <div class="mini-card"><small>growth</small><strong>+38%</strong></div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cta" id="cta">
                <div>
                    <h2>{{ $t['proofLabel'] }}</h2>
                    <p>{{ $t['footerText'] }}</p>
                </div>
                <div>
                    <form class="mail-form" action="#" method="post" novalidate>
                        <label class="sr-only" for="email" style="position:absolute;left:-9999px;">{{ $t['emailLabel'] }}</label>
                        <input id="email" type="email" name="email" placeholder="{{ $t['emailPlaceholder'] }}" aria-label="{{ $t['emailLabel'] }}">
                        <button type="submit">{{ $t['ctaButton'] }}</button>
                    </form>
                    <div class="status" aria-live="polite"></div>
                </div>
            </section>
        </main>

        <footer>
            <div>{{ $t['brand'] }}</div>
            <div>{{ $t['footerText'] }}</div>
        </footer>
    </div>

    <script>
        const preferredTheme = localStorage.getItem('sample-theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        document.documentElement.dataset.theme = preferredTheme;

        document.querySelector('[data-theme-toggle]')?.addEventListener('click', function () {
            const next = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
            document.documentElement.dataset.theme = next;
            localStorage.setItem('sample-theme', next);
        });

        document.querySelector('.mail-form')?.addEventListener('submit', function (event) {
            event.preventDefault();
            const email = document.getElementById('email');
            const status = document.querySelector('.status');
            const value = (email.value || '').trim();
            const valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);

            status.className = 'status';
            if (!valid) {
                status.classList.add('error');
                status.textContent = '{{ $t['statusError'] }}';
                email.focus();
                return;
            }

            status.classList.add('success');
            status.textContent = '{{ $t['statusSuccess'] }}';
            this.reset();
        });
    </script>
</body>
</html>
