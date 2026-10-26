@php
    $locale = (app()->getLocale() === 'ar') ? 'ar' : 'en';
    $dir = ($locale === 'ar') ? 'rtl' : 'ltr';
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $dir }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <meta name="theme-color" content="#0f172a">
    <title>{{ __('welcome.page_title') }}</title>
    <meta name="description" content="{{ __('welcome.meta_description') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f4f7ff;
            --bg-strong: #eef4ff;
            --panel: rgba(255,255,255,0.82);
            --panel-strong: rgba(255,255,255,0.96);
            --line: rgba(15, 23, 42, 0.08);
            --text: #0f172a;
            --muted: #475569;
            --primary: #2563eb;
            --primary-strong: #1d4ed8;
            --accent: #f97316;
            --shadow: 0 30px 80px rgba(15,23,42,0.18);
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg: #020817;
                --bg-strong: #0f172a;
                --panel: rgba(15, 23, 42, 0.72);
                --panel-strong: rgba(15, 23, 42, 0.94);
                --line: rgba(148, 163, 184, 0.18);
                --text: #e2e8f0;
                --muted: #cbd5e1;
                --primary: #60a5fa;
                --primary-strong: #93c5fd;
                --accent: #fb923c;
                --shadow: 0 30px 80px rgba(2, 8, 23, 0.72);
            }
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37,99,235,0.18), transparent 30%),
                radial-gradient(circle at bottom right, rgba(249,115,22,0.18), transparent 28%),
                var(--bg);
            color: var(--text);
            min-height: 100vh;
        }
        a { color: inherit; text-decoration: none; }
        .page-shell { max-width: 1180px; margin: 0 auto; padding: 24px 20px 80px; }
        .topbar { display: flex; align-items: center; justify-content: space-between; padding: 18px 0 18px; gap: 16px; }
        .brand { display: inline-flex; align-items: center; gap: 12px; font-weight: 800; letter-spacing: -0.04em; font-size: 1.1rem; }
        .brand-mark { width: 42px; height: 42px; border-radius: 14px; display: inline-grid; place-items: center; background: linear-gradient(135deg, rgba(37,99,235,0.18), rgba(249,115,22,0.22)); border: 1px solid var(--line); }
        .brand-mark::before { content: 'J'; font-size: 1.15rem; color: var(--text); font-weight: 900; }
        .top-actions { display: flex; align-items: center; gap: 12px; }
        .ghost-button, .primary-button, .secondary-button {
            border: 1px solid var(--line); background: var(--panel); color: var(--text); border-radius: 999px; padding: 11px 18px; font-weight: 600; cursor: pointer; transition: transform .2s ease;
        }
        .ghost-button:hover, .primary-button:hover, .secondary-button:hover { transform: translateY(-1px); }
        .primary-button { background: linear-gradient(135deg, var(--primary), var(--primary-strong)); border-color: transparent; color: #fff; box-shadow: 0 12px 30px rgba(37,99,235,0.24); }
        .hero { display: grid; grid-template-columns: 1.12fr 0.88fr; align-items: center; gap: 38px; min-height: 640px; padding: 22px 0 18px; }
        .eyebrow { display: inline-flex; align-items: center; gap: 10px; padding: 8px 14px; border: 1px solid var(--line); border-radius: 999px; background: rgba(148,163,184,0.08); color: var(--muted); font-size: 0.78rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; }
        .eyebrow::before { content: ''; width: 8px; height: 8px; border-radius: 50%; background: linear-gradient(135deg, var(--accent), var(--primary)); }
        h1 { margin: 18px 0 18px; font-size: clamp(3rem, 5vw, 5.2rem); line-height: 0.9; letter-spacing: -0.08em; }
        .headline-accent { display: block; color: var(--primary); }
        .subtitle { max-width: 620px; font-size: clamp(1.02rem, 2vw, 1.2rem); line-height: 1.7; color: var(--muted); }
        .hero-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 28px; }
        .proof-grid { margin-top: 36px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; }
        .proof-card { border: 1px solid var(--line); background: var(--panel); backdrop-filter: blur(12px); border-radius: 22px; padding: 18px 18px 16px; box-shadow: var(--shadow); }
        .proof-card strong { display: block; font-size: 1.6rem; letter-spacing: -0.06em; margin-bottom: 6px; }
        .proof-card span { color: var(--muted); font-size: 0.97rem; }
        .hero-panel { position: relative; }
        .glass-card { position: relative; background: linear-gradient(180deg, rgba(255,255,255,0.12), rgba(255,255,255,0.02)); border: 1px solid var(--line); border-radius: 32px; padding: 24px; box-shadow: var(--shadow); }
        .orb { position: absolute; inset: auto auto 24px -30px; width: 160px; height: 160px; border-radius: 50%; background: rgba(96,165,250,0.12); filter: blur(20px); }
        .mini-shell { padding: 24px; background: var(--panel-strong); border-radius: 24px; border: 1px solid var(--line); }
        .mini-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; color: var(--muted); font-size: 0.9rem; font-weight: 600; }
        .status-dot { width: 10px; height: 10px; border-radius: 50%; background: #22c55e; box-shadow: 0 0 0 5px rgba(34,197,94,0.14); }
        .chart-card { background: linear-gradient(180deg, rgba(37,99,235,0.08), rgba(15,23,42,0.01)); border: 1px solid var(--line); border-radius: 18px; padding: 8px 10px 18px; }
        .bars { display: flex; align-items: end; gap: 10px; height: 170px; padding: 16px 10px 0; }
        .bar { flex: 1; border-radius: 12px 12px 0 0; background: linear-gradient(180deg, rgba(59,130,246,0.92), rgba(37,99,235,0.34)); min-height: 18%; }
        .bar:nth-child(2){height:42%}.bar:nth-child(3){height:63%}.bar:nth-child(4){height:55%}.bar:nth-child(5){height:82%}.bar:nth-child(6){height:92%}.bar:nth-child(7){height:76%}.bar:nth-child(8){height:100%}
        .stats { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-top: 16px; }
        .stat { background: var(--panel); border: 1px solid var(--line); border-radius: 16px; padding: 14px 16px; }
        .stat-label { display: block; color: var(--muted); font-size: 0.74rem; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.08em; }
        .stat-value { font-size: 1.55rem; font-weight: 800; letter-spacing: -0.06em; }
        .waitlist-box { margin-top: 32px; background: var(--panel-strong); border: 1px solid var(--line); border-radius: 28px; padding: 28px; box-shadow: var(--shadow); }
        .waitlist-inner { display: flex; gap: 18px; align-items: center; justify-content: space-between; flex-wrap: wrap; }
        .waitlist-copy { flex: 1 1 340px; min-width: 0; }
        .waitlist-copy h3 { margin: 0 0 8px; font-size: clamp(1.5rem, 3vw, 2.2rem); letter-spacing: -0.06em; }
        .waitlist-copy p { margin: 0; color: var(--muted); line-height: 1.6; }
        .form-shell { flex: 1 1 360px; display: flex; gap: 10px; align-items: center; justify-content: flex-end; }
        form { display: flex; align-items: center; gap: 10px; width: min(100%, 500px); }
        label { display: none; }
        input[type="email"] { width: 100%; border: 1px solid var(--line); background: rgba(148,163,184,0.06); color: var(--text); border-radius: 999px; padding: 16px 18px; font: inherit; outline: none; }
        input[type="email"]::placeholder { color: var(--muted); }
        .message { margin-top: 12px; min-height: 24px; color: var(--muted); font-size: 0.96rem; }
        .message.error { color: #ef4444; }
        .message.success { color: #16a34a; }
        footer { margin-top: 42px; display: flex; align-items: center; justify-content: space-between; gap: 18px; border-top: 1px solid var(--line); padding-top: 24px; color: var(--muted); flex-wrap: wrap; }
        @media (max-width: 880px) { .hero { grid-template-columns: 1fr; min-height: auto; } .proof-grid { grid-template-columns: 1fr; } .topbar { flex-wrap: wrap; } }
        @media (max-width: 620px) { .page-shell { padding-inline: 16px; } .waitlist-inner, .form-shell, form { display: block; } form { width: 100%; } input[type="email"], .primary-button { width: 100%; } .primary-button { margin-top: 10px; } }
    </style>
</head>
<body>
    <div class="page-shell">
        <header class="topbar">
            <div class="brand" aria-label="Juzaweb home"><span class="brand-mark" aria-hidden="true"></span> Juzaweb</div>
            <div class="top-actions">
                <button class="ghost-button" type="button" aria-label="{{ __('welcome.switch_language') }}" onclick="const nextLocale = document.documentElement.lang === 'ar' ? 'en' : 'ar'; document.documentElement.lang = nextLocale; document.documentElement.dir = nextLocale === 'ar' ? 'rtl' : 'ltr'; window.location.href = '?lang=' + nextLocale;">
                    {{ __('welcome.switch_language') }}
                </button>
                <button class="secondary-button" type="button" aria-label="{{ __('welcome.theme_toggle') }}" onclick="document.documentElement.dataset.theme = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';">
                    {{ __('welcome.theme_toggle') }}
                </button>
            </div>
        </header>

        <main>
            <section class="hero" aria-labelledby="welcome-heading">
                <div>
                    <div class="eyebrow">Juzaweb</div>
                    <h1 id="welcome-heading">
                        <span>{{ __('welcome.title_line_1') }}</span>
                        <span class="headline-accent">{{ __('welcome.title_line_2') }}</span>
                    </h1>
                    <p class="subtitle">
                        {{ __('welcome.lead_intro') }}
                    </p>
                    <div class="hero-actions">
                        <a href="#waitlist" class="primary-button">{{ __('welcome.cta') }}</a>
                        <a href="mailto:hello@juzaweb.com" class="ghost-button">{{ __('welcome.contact_us') }}</a>
                    </div>

                    <div class="proof-grid" aria-label="{{ __('welcome.proof_title') }}">
                        <article class="proof-card">
                            <strong>200+</strong>
                            <span>{{ __('welcome.proof_1') }}</span>
                        </article>
                        <article class="proof-card">
                            <strong>24h</strong>
                            <span>{{ __('welcome.proof_2') }}</span>
                        </article>
                        <article class="proof-card">
                            <strong>16+</strong>
                            <span>{{ __('welcome.proof_3') }}</span>
                        </article>
                    </div>
                </div>

                <div class="hero-panel" aria-hidden="true">
                    <div class="orb"></div>
                    <div class="glass-card">
                        <div class="mini-shell">
                            <div class="mini-header">
                                <span>Content overview</span>
                                <span class="status-dot"></span>
                            </div>
                            <div class="chart-card">
                                <div class="bars">
                                    <span class="bar" style="height: 38%;"></span>
                                    <span class="bar" style="height: 48%;"></span>
                                    <span class="bar" style="height: 64%;"></span>
                                    <span class="bar" style="height: 58%;"></span>
                                    <span class="bar" style="height: 84%;"></span>
                                    <span class="bar" style="height: 96%;"></span>
                                    <span class="bar" style="height: 72%;"></span>
                                    <span class="bar" style="height: 100%;"></span>
                                </div>
                            </div>
                            <div class="stats">
                                <div class="stat"><span class="stat-label">Volume</span><span class="stat-value">$2.4M</span></div>
                                <div class="stat"><span class="stat-label">Settled</span><span class="stat-value">97.4%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="waitlist-box" id="waitlist" aria-labelledby="waitlist-heading">
                <div class="waitlist-inner">
                    <div class="waitlist-copy">
                        <h3 id="waitlist-heading">{{ __('welcome.cta') }}</h3>
                        <p>{{ __('welcome.meta_description') }}</p>
                    </div>
                    <div class="form-shell">
                        <form action="#" method="post" novalidate>
                            <label for="waitlist-email">{{ __('welcome.email_label') }}</label>
                            <input id="waitlist-email" name="email" type="email" inputmode="email" autocomplete="email" placeholder="{{ __('welcome.email_placeholder') }}" aria-label="{{ __('welcome.email_label') }}">
                            <button class="primary-button" type="submit">{{ __('welcome.cta') }}</button>
                        </form>
                    </div>
                </div>
                <div class="message" aria-live="polite"></div>
            </section>
        </main>

        <footer>
            <div><strong>Juzaweb</strong> · {{ __('welcome.email_us') }} <a href="mailto:hello@juzaweb.com">hello@juzaweb.com</a></div>
            <div>{{ __('welcome.copyright') }}</div>
        </footer>
    </div>

    <script>
        const mailForm = document.querySelector('form');
        const emailInput = document.getElementById('waitlist-email');
        const status = document.querySelector('.message');

        mailForm?.addEventListener('submit', function (event) {
            event.preventDefault();
            const value = emailInput.value.trim();
            const valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
            status.className = 'message';

            if (!valid) {
                status.classList.add('error');
                status.textContent = '{{ __('welcome.error') }}';
                emailInput.focus();
                return;
            }

            status.classList.add('success');
            status.textContent = '{{ __('welcome.success') }}';
            mailForm.reset();
        });

        const locale = '{{ $locale }}';
        document.documentElement.lang = locale;
        document.documentElement.dir = locale === 'ar' ? 'rtl' : 'ltr';
        document.documentElement.dataset.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    </script>
</body>
</html>
