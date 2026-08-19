<?php
// inkHack index - Hatsune Miku themed single-file page
// Removed stray echo statements and consolidated HTML/CSS/JS so the container serves a self-contained page.
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Miku Club — inkHack</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
  <style>
    :root{
      --bg:#0b0f17;
      --card:#08101a;
      --muted:#9aa4b2;
      --text:#eff6ff;
      --primary:#00c4d9;
      --accent:#ff66cc;
      --soft:#e8fffb;
      --glass: rgba(255,255,255,0.04);
      --radius:14px;
      --max-w:1100px;
      font-family: "Poppins", "Noto Sans JP", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      background:
        radial-gradient(800px 400px at 10% 10%, rgba(0,196,217,0.06), transparent),
        radial-gradient(600px 300px at 90% 85%, rgba(159,91,255,0.04), transparent),
        var(--bg);
      color:var(--text);
      line-height:1.45;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      padding-bottom:3rem;
    }
    .container{max-width:var(--max-w);margin:0 auto;padding:1rem}
    .site-header{position:sticky;top:0;z-index:40;backdrop-filter: blur(6px);background: linear-gradient(180deg, rgba(11,15,23,0.6), rgba(11,15,23,0.3));border-bottom: 1px solid rgba(255,255,255,0.03);}
    .header-inner{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:.6rem 0}
    .brand{display:flex;align-items:center;gap:.7rem;text-decoration:none;color:inherit}
    .brand-mark{width:44px;height:44px}
    .brand-name{font-weight:700;letter-spacing:.4px}
    .nav{display:flex;align-items:center;gap:1rem}
    .nav-link{color:var(--soft);text-decoration:none;padding:.45rem .65rem;border-radius:8px;font-weight:600}
    .nav-link:hover{background:rgba(255,255,255,0.02);color:var(--primary)}
    .btn{border:0;padding:.6rem .9rem;border-radius:10px;cursor:pointer;font-weight:700}
    .btn-primary{background:linear-gradient(90deg,var(--primary),#47a7ff);color:#021019;box-shadow:0 6px 20px rgba(0,196,217,0.12)}
    .btn-ghost{background:transparent;border:1px solid rgba(255,255,255,0.06);color:var(--soft)}
    .btn-accent{background:linear-gradient(90deg,var(--accent),#ff8ad0);color:#1a0016}
    .menu-toggle{display:none;background:transparent;border:0;color:var(--text);font-size:1.25rem}
    .mobile-menu{position:absolute;right:1rem;top:68px;background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));padding:0.75rem;border-radius:12px;box-shadow:0 14px 40px rgba(2,6,23,0.6);display:flex;flex-direction:column;gap:.5rem}
    .hero{padding:4rem 0 2.5rem;display:flex;align-items:center}
    .hero-inner{display:flex;gap:2rem;align-items:center;flex-wrap:wrap}
    .hero-copy{flex:1;min-width:280px}
    .neon{font-size:clamp(1.8rem,4vw,3rem);margin:0 0 .5rem 0;line-height:1.02;color:var(--soft);text-shadow:0 2px 8px rgba(0,196,217,0.06),0 0 18px rgba(0,196,217,0.12),0 0 36px rgba(159,91,255,0.06);letter-spacing:.6px;font-weight:800}
    .lead{color:var(--muted);max-width:60ch;margin-top:.4rem}
    .hero-ctas{display:flex;gap:.75rem;margin-top:1rem}
    .hero-art{width:320px;flex:0 0 320px}
    audio{width:100%;border-radius:10px;background:var(--card);padding:.2rem}
    .audio-note{font-size:.85rem;color:var(--muted)}
    .features{display:grid;grid-template-columns:1fr;gap:1rem;padding:2rem 0}
    .feature{background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));padding:1.1rem;border-radius:14px;box-shadow:0 10px 30px rgba(2,6,23,0.6)}
    .feature .icon{font-size:1.4rem;margin-bottom:.5rem;color:var(--primary)}
    .gallery h2{margin:.2rem 0 1rem 0}
    .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem}
    .card{background:var(--card);padding:1rem;border-radius:12px;display:flex;flex-direction:column;gap:.6rem;align-items:center;text-align:center}
    .avatar{width:92px;height:92px;border-radius:50%;overflow:hidden}
    .cta-strip{background:linear-gradient(90deg, rgba(0,196,217,0.08), rgba(159,91,255,0.06));color:var(--soft);padding:1.1rem;border-radius:12px;margin:2rem 0}
    .site-footer{padding:2rem 0;color:var(--muted)}
    .modal{display:none;position:fixed;inset:0;background:linear-gradient(180deg, rgba(2,6,23,0.6), rgba(2,6,23,0.75));align-items:center;justify-content:center;padding:1rem}
    .modal-panel{background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));padding:1.25rem;border-radius:12px;max-width:520px;width:100%;box-shadow:0 20px 60px rgba(2,6,23,0.8);position:relative}
    .modal-close{position:absolute;right:.6rem;top:.4rem;border:0;background:transparent;font-size:1.4rem;color:var(--muted)}
    .modal-panel input,.modal-panel textarea{width:100%;padding:.6rem;border-radius:8px;border:1px solid rgba(255,255,255,0.04);background:transparent;color:var(--text);margin-top:.35rem}
    .sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
    @media(min-width:860px){.menu-toggle{display:none}.features{grid-template-columns:repeat(3,1fr)}.grid{grid-template-columns:repeat(3,1fr)}.cta-inner{flex-direction:row;justify-content:space-between;align-items:center}}
    @media(max-width:859px){.menu-toggle{display:block}.nav{display:none}.mobile-menu{left:1rem;right:1rem;top:68px}.hero-inner{flex-direction:column-reverse;gap:1rem}.grid{grid-template-columns:repeat(2,1fr)}}
    @media(max-width:520px){.grid{grid-template-columns:1fr}.hero-art{width:100%}}
  </style>
</head>
<body>
  <header class="site-header" role="banner">
    <div class="container header-inner">
      <a class="brand" href="#" aria-label="Miku Club home">
        <svg class="brand-mark" viewBox="0 0 48 48" aria-hidden="true" focusable="false">
          <defs>
            <linearGradient id="g" x1="0" x2="1">
              <stop offset="0" stop-color="#00c4d9"/>
              <stop offset="1" stop-color="#9f5bff"/>
            </linearGradient>
          </defs>
          <rect x="2" y="2" width="44" height="44" rx="10" fill="url(#g)"></rect>
          <path d="M14 32c6-8 20-8 20-8" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2.6" opacity="0.95"/>
        </svg>
        <span class="brand-name">Miku Club</span>
      </a>

      <nav class="nav" role="navigation" aria-label="Main navigation">
        <a class="nav-link" href="#">Home</a>
        <a class="nav-link" href="#gallery">Gallery</a>
        <a class="nav-link" href="#events">Events</a>
        <button id="signupBtn" class="btn btn-primary">Join</button>
      </nav>

      <button id="menuToggle" class="menu-toggle" aria-label="Open menu" aria-expanded="false">☰</button>
    </div>

    <div id="mobileMenu" class="mobile-menu" hidden>
      <a class="mobile-link" href="#">Home</a>
      <a class="mobile-link" href="#gallery">Gallery</a>
      <a class="mobile-link" href="#events">Events</a>
      <button id="mobileJoin" class="btn btn-primary">Join</button>
    </div>
  </header>

  <main>
    <section class="hero" id="home" role="region" aria-label="Hero">
      <div class="container hero-inner">
        <div class="hero-copy">
          <h1 class="neon">Welcome to Miku Club</h1>
          <p class="lead">A fan-driven space inspired by Hatsune Miku aesthetics — music, art, events, and community. This is a fan site template; replace art and music with your own assets.</p>

          <div class="hero-ctas">
            <button id="heroJoin" class="btn btn-accent">Request Invite</button>
            <a class="btn btn-ghost" href="#events">See Events</a>
          </div>

          <div class="audio-wrap" aria-hidden="false">
            <label for="track" class="sr-only">Music player</label>
            <audio id="track" controls preload="none">
              <source src="sample-track.mp3" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
            <div class="audio-note">Replace sample-track.mp3 with your file (user interaction required to play on most browsers).</div>
          </div>
        </div>

        <div class="hero-art" aria-hidden="true">
          <svg viewBox="0 0 400 300" class="wave" preserveAspectRatio="xMidYMid slice" role="img">
            <defs>
              <linearGradient id="waveGrad" x1="0" x2="1">
                <stop offset="0" stop-color="#00c4d9"/>
                <stop offset="1" stop-color="#9f5bff"/>
              </linearGradient>
              <filter id="glow">
                <feGaussianBlur stdDeviation="8" result="coloredBlur"/>
                <feMerge>
                  <feMergeNode in="coloredBlur"/>
                  <feMergeNode in="SourceGraphic"/>
                </feMerge>
              </feMerge>
            </defs>
            <g filter="url(#glow)" opacity="0.95">
              <path d="M0 200 C 100 120, 300 280, 400 180 L400 300 L0 300 Z" fill="url(#waveGrad)"/>
            </g>
          </svg>
        </div>
      </div>
    </section>

    <section class="features container" id="events" role="region" aria-label="Events and features">
      <div class="feature">
        <div class="icon">♪</div>
        <h3>Music Streams</h3>
        <p>Live performances and curated playlists inspired by vocaloid culture.</p>
      </div>
      <div class="feature">
        <div class="icon">🎨</div>
        <h3>Art & Fanworks</h3>
        <p>Showcase of fan art, remixes, and creative collaborations.</p>
      </div>
      <div class="feature">
        <div class="icon">🤝</div>
        <h3>Community Events</h3>
        <p>Monthly meetups, collabs, contests, and more.</p>
      </div>
    </section>

    <section id="gallery" class="gallery container" role="region" aria-label="Gallery">
      <h2>Gallery</h2>
      <div class="grid">
        <div class="card">
          <div class="avatar" aria-hidden="true">
            <svg viewBox="0 0 100 100"><circle cx="50" cy="50" r="46" fill="url(#g1)"/></svg>
          </div>
          <h4>Vocaloid Mix #1</h4>
        </div>
        <div class="card">
          <div class="avatar" aria-hidden="true">
            <svg viewBox="0 0 100 100"><circle cx="50" cy="50" r="46" fill="url(#g2)"/></svg>
          </div>
          <h4>Fan Poster</h4>
        </div>
        <div class="card">
          <div class="avatar" aria-hidden="true">
            <svg viewBox="0 0 100 100"><circle cx="50" cy="50" r="46" fill="url(#g3)"/></svg>
          </div>
          <h4>Remix Cover</h4>
        </div>
      </div>
    </section>

    <section class="cta-strip">
      <div class="container cta-inner">
        <div>
          <h2>Join Miku Club</h2>
          <p>Get updates on events, releases, and fan projects.</p>
        </div>
        <div>
          <button id="ctaJoin" class="btn btn-accent">Request Invite</button>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer" role="contentinfo">
    <div class="container">
      <p>&copy; <span id="year"></span> Miku Club — Fan site template. Replace content and assets with ones you own or have rights to.</p>
    </div>
  </footer>

  <div id="modal" class="modal" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="modal-panel" role="document">
      <button id="closeModal" class="modal-close" aria-label="Close">×</button>
      <h2>Request an invite</h2>
      <p>Enter your email and a short message.</p>
      <form id="inviteForm">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" required placeholder="you@example.com">
        <label for="msg">Message (optional)</label>
        <textarea id="msg" name="msg" rows="3" placeholder="Tell us why you'd like to join"></textarea>
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Send request</button>
          <button type="button" id="cancel" class="btn btn-ghost">Cancel</button>
        </div>
      </form>
      <p class="muted">We’ll never share your email.</p>
    </div>
  </div>

  <script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const signupBtn = document.getElementById('signupBtn');
    const mobileJoin = document.getElementById('mobileJoin');
    const heroJoin = document.getElementById('heroJoin');
    const ctaJoin = document.getElementById('ctaJoin');
    const modal = document.getElementById('modal');
    const closeModal = document.getElementById('closeModal');
    const cancel = document.getElementById('cancel');
    const yearEl = document.getElementById('year');
    const track = document.getElementById('track');

    yearEl.textContent = new Date().getFullYear();

    function openModal() { modal.style.display = 'flex'; modal.setAttribute('aria-hidden', 'false'); document.getElementById('email').focus(); }
    function closeModalFn() { modal.style.display = 'none'; modal.setAttribute('aria-hidden', 'true'); }

    menuToggle.addEventListener('click', () => { const expanded = menuToggle.getAttribute('aria-expanded') === 'true'; menuToggle.setAttribute('aria-expanded', String(!expanded)); mobileMenu.hidden = !mobileMenu.hidden; });

    [signupBtn, mobileJoin, heroJoin, ctaJoin].forEach(b => b && b.addEventListener('click', (e) => { e.preventDefault(); openModal(); }));

    closeModal.addEventListener('click', closeModalFn);
    cancel.addEventListener('click', closeModalFn);

    window.addEventListener('keydown', (e) => { if (e.key === 'Escape' && modal.getAttribute('aria-hidden') === 'false') closeModalFn(); });
    window.addEventListener('click', (e) => { if (e.target === modal) closeModalFn(); });

    document.getElementById('inviteForm').addEventListener('submit', (e) => { e.preventDefault(); alert('Thanks — invite request sent!'); closeModalFn(); e.target.reset(); });

    if (track) { track.addEventListener('play', () => { document.documentElement.classList.add('playing'); }); track.addEventListener('pause', () => { document.documentElement.classList.remove('playing'); }); }
  </script>
</body>
</html>
