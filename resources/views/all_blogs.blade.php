<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>All Posts — Colin Reardon</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=IM+Fell+English:ital@0;1&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Barlow+Condensed:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

<style>
:root {
  --ink:        #0d0d0d;
  --ink-2:      #181818;
  --ink-3:      #222222;
  --ink-4:      #2e2e2e;
  --ash:        #444444;
  --ash-2:      #666666;
  --ash-3:      #888888;
  --fog:        #aaaaaa;
  --mist:       #cccccc;
  --paper:      #e8e4dc;
  --white:      #f5f2ec;
  --pure:       #fafaf9;
  --font-serif: 'IM Fell English', 'Libre Baskerville', Georgia, serif;
  --font-body:  'Libre Baskerville', Georgia, serif;
  --font-ui:    'Barlow Condensed', 'Helvetica Neue', sans-serif;
  --nav-h:      68px;
  --ease:       cubic-bezier(0.25, 0.46, 0.45, 0.94);
  --radius-sm:  4px;
  --radius:     8px;
  --glass-bg:   rgba(255,255,255,0.03);
  --glass-border: rgba(255,255,255,0.08);
  --glass-blur: blur(20px);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }

body {
  background: var(--ink);
  color: var(--mist);
  font-family: var(--font-body);
  font-size: 1.05rem;
  line-height: 1.75;
  overflow-x: hidden;
}
body::after {
  content: ''; position: fixed; inset: 0; pointer-events: none; z-index: 9999;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.03;
}

a { color: inherit; text-decoration: none; }
ul { list-style: none; }
.container { width: 92%; max-width: 1180px; margin: 0 auto; }

/* ── FADE IN ── */
.fade-in { opacity: 0; transform: translateY(28px); transition: opacity 0.8s ease, transform 0.8s ease; }
.fade-in.visible { opacity: 1; transform: none; }

/* ── NAV ── */
.nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 5%; height: var(--nav-h);
  transition: background 0.4s var(--ease), border-color 0.4s var(--ease), box-shadow 0.4s;
  border-bottom: 1px solid transparent;
}
.nav--scrolled {
  background: rgba(13,13,13,0.88);
  backdrop-filter: var(--glass-blur);
  border-color: var(--glass-border);
  box-shadow: 0 8px 32px rgba(0,0,0,0.4), inset 0 1px 0 rgba(255,255,255,0.05);
}
.nav__logo { font-family: var(--font-serif); font-size: 1.15rem; color: var(--white); letter-spacing: 0.04em; }
.nav__logo em { font-style: italic; color: var(--mist); }
.nav__links {
  display: none; flex-direction: column;
  position: absolute; top: var(--nav-h); left: 0; right: 0;
  background: rgba(13,13,13,0.98); backdrop-filter: var(--glass-blur);
  padding: 2rem 5%; gap: 1.5rem; border-bottom: 1px solid var(--glass-border);
}
.nav__links--open { display: flex; }
.nav__links a {
  font-family: var(--font-ui); font-size: 0.75rem; font-weight: 600;
  letter-spacing: 0.18em; text-transform: uppercase; color: var(--ash-3);
  transition: color 0.3s; position: relative;
}
.nav__links a::after {
  content: ''; position: absolute; bottom: -2px; left: 0;
  width: 0; height: 1px; background: var(--white); transition: width 0.3s var(--ease);
}
.nav__links a:hover, .nav__links a.active { color: var(--white); }
.nav__links a:hover::after { width: 100%; }
.nav__cta {
  border: 1px solid rgba(255,255,255,0.25) !important;
  padding: 0.35rem 1rem; color: var(--white) !important; border-radius: var(--radius-sm);
}
.nav__cta:hover { background: var(--white) !important; color: var(--ink) !important; }
.nav__cta::after { display: none !important; }
.nav__toggle {
  background: none; border: none; cursor: pointer;
  display: flex; flex-direction: column; gap: 5px; padding: 6px;
}
.nav__toggle span { display: block; width: 22px; height: 1px; background: var(--mist); transition: 0.35s var(--ease); transform-origin: center; }
.nav__toggle--open span:nth-child(1) { transform: translateY(6px) rotate(45deg); }
.nav__toggle--open span:nth-child(2) { opacity: 0; }
.nav__toggle--open span:nth-child(3) { transform: translateY(-6px) rotate(-45deg); }
@media (min-width: 768px) {
  .nav__links { display: flex; flex-direction: row; position: static; background: none; padding: 0; align-items: center; gap: 2.5rem; border: none; }
  .nav__toggle { display: none; }
}

/* ── PAGE HEADER ── */
.page-header {
  position: relative;
  padding: calc(var(--nav-h) + 5rem) 5% 5rem;
  text-align: center;
  overflow: hidden;
  background: var(--ink);
}
.page-header__bg {
  position: absolute; inset: 0;
  background-image: radial-gradient(circle, rgba(255,255,255,0.018) 1px, transparent 1px);
  background-size: 32px 32px;
}
.page-header__bg::after {
  content: ''; position: absolute; inset: 0;
  background: radial-gradient(ellipse 80% 80% at 50% 50%, transparent 20%, var(--ink) 100%);
}
.page-header__scan {
  position: absolute; top: 0; left: 0; right: 0; height: 1px;
  background: linear-gradient(to right, transparent, rgba(245,242,236,0.12), transparent);
  animation: scanDown 10s linear infinite; z-index: 2;
}
@keyframes scanDown {
  from { top: 0; opacity: 0; } 5% { opacity: 1; } 95% { opacity: 1; } to { top: 100%; opacity: 0; }
}
.page-header__content { position: relative; z-index: 3; }
.page-header__eyebrow {
  font-family: var(--font-ui); font-size: 0.65rem; font-weight: 700;
  letter-spacing: 0.32em; text-transform: uppercase; color: var(--ash-3);
  margin-bottom: 1.2rem;
  display: flex; align-items: center; justify-content: center; gap: 1rem;
}
.page-header__eyebrow::before,
.page-header__eyebrow::after {
  content: ''; flex: 1; max-width: 50px; height: 1px;
  background: rgba(255,255,255,0.15);
}
.page-header__title {
  font-family: var(--font-serif);
  font-size: clamp(2.4rem, 7vw, 5rem);
  font-weight: 400; color: var(--white); line-height: 1.0;
  margin-bottom: 1.2rem;
}
.page-header__title em { font-style: italic; color: var(--mist); }
.page-header__divider {
  width: 50px; height: 1px; margin: 1.5rem auto;
  background: linear-gradient(to right, transparent, rgba(255,255,255,0.35), transparent);
}
.page-header__sub {
  font-size: 1rem; color: var(--ash-3); max-width: 480px; margin: 0 auto;
}
.page-header__count {
  display: inline-block; margin-top: 1.5rem;
  font-family: var(--font-ui); font-size: 0.65rem; font-weight: 700;
  letter-spacing: 0.22em; text-transform: uppercase;
  color: var(--ash); padding: 0.4rem 1rem;
  border: 1px solid rgba(255,255,255,0.08); border-radius: var(--radius-sm);
  background: var(--glass-bg);
}
.page-header__bg-word {
  position: absolute; bottom: -0.1em; left: 50%;
  transform: translateX(-50%);
  font-family: var(--font-ui); font-size: clamp(6rem, 20vw, 14rem);
  font-weight: 900; color: transparent;
  -webkit-text-stroke: 1px rgba(255,255,255,0.025);
  pointer-events: none; user-select: none;
  white-space: nowrap; z-index: 1;
}

/* ── BACK LINK ── */
.back-wrap {
  width: 92%; max-width: 1180px; margin: 2rem auto 0;
  border-top: 1px solid rgba(255,255,255,0.06);
  padding-top: 2rem;
}
.back-link {
  display: inline-flex; align-items: center; gap: 0.6rem;
  font-family: var(--font-ui); font-size: 0.68rem; font-weight: 700;
  letter-spacing: 0.2em; text-transform: uppercase;
  color: var(--ash-3); transition: color 0.3s;
}
.back-link:hover { color: var(--white); }
.back-link__arrow { transition: transform 0.3s var(--ease); }
.back-link:hover .back-link__arrow { transform: translateX(-4px); }

/* ── ALL POSTS GRID ── */
.all-blogs {
  padding: 3rem 0 8rem;
  background: var(--ink);
}
.blogs__grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 1.5rem;
  margin-bottom: 5rem;
}
@media (min-width: 640px)  { .blogs__grid { grid-template-columns: repeat(2, 1fr); } }
@media (min-width: 1024px) { .blogs__grid { grid-template-columns: repeat(3, 1fr); } }

/* ── Blog Card ── */
.blog-card {
  display: flex; flex-direction: column;
  background: var(--ink-2);
  border: 1px solid rgba(255,255,255,0.06);
  border-radius: var(--radius);
  overflow: hidden;
  transition: transform 0.35s var(--ease), box-shadow 0.35s, border-color 0.35s;
}
.blog-card:hover {
  transform: translateY(-4px);
  border-color: rgba(255,255,255,0.14);
  box-shadow: 0 16px 48px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.04);
}

.blog-card__image {
  width: 100%; aspect-ratio: 16/9;
  overflow: hidden; position: relative; background: var(--ink-3); flex-shrink: 0;
}
.blog-card__image img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  filter: grayscale(30%) brightness(0.85);
  transition: transform 0.5s var(--ease), filter 0.5s;
}
.blog-card:hover .blog-card__image img { transform: scale(1.04); filter: grayscale(0%) brightness(0.95); }

.blog-img-placeholder {
  width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;
  background: repeating-linear-gradient(-45deg, var(--ink-2) 0px, var(--ink-2) 10px, var(--ink-3) 10px, var(--ink-3) 20px);
  position: relative;
}
.blog-img-placeholder__text {
  font-family: var(--font-ui); font-size: 0.6rem; font-weight: 700;
  letter-spacing: 0.3em; text-transform: uppercase; color: rgba(255,255,255,0.1);
  position: relative; z-index: 1;
}
.blog-img-placeholder::after {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(13,13,13,0.6), transparent);
}

.blog-card__body { padding: 1.8rem; flex: 1; display: flex; flex-direction: column; }
.blog-card__meta { display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; }
.blog-card__tag {
  font-family: var(--font-ui); font-size: 0.58rem; font-weight: 700;
  letter-spacing: 0.18em; text-transform: uppercase; color: var(--ash-3);
  border: 1px solid rgba(255,255,255,0.1); padding: 0.2rem 0.55rem;
  border-radius: var(--radius-sm); background: var(--glass-bg);
}
.blog-card__date { font-family: var(--font-ui); font-size: 0.65rem; letter-spacing: 0.08em; color: var(--ash); }

.blog-card__title {
  font-family: var(--font-serif); font-size: 1.3rem; font-weight: 400;
  color: var(--white); line-height: 1.3; margin-bottom: 0.8rem;
  transition: color 0.3s;
  display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.blog-card:hover .blog-card__title { color: var(--pure); }

.blog-card__excerpt {
  font-size: 0.9rem; color: var(--ash-2); line-height: 1.75; flex: 1; margin-bottom: 1.5rem;
  display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;
}

.blog-card__footer {
  display: flex; align-items: center; justify-content: space-between;
  padding-top: 1.2rem; border-top: 1px solid rgba(255,255,255,0.06);
}
.blog-card__author { display: flex; align-items: center; gap: 0.7rem; }
.blog-card__author-avatar {
  width: 28px; height: 28px; border-radius: 50%; overflow: hidden;
  border: 1px solid rgba(255,255,255,0.12); background: var(--ink-3); flex-shrink: 0;
}
.blog-card__author-avatar img { width: 100%; height: 100%; object-fit: cover; display: block; filter: grayscale(40%); }
.blog-card__author-name { font-family: var(--font-ui); font-size: 0.68rem; font-weight: 600; letter-spacing: 0.06em; color: var(--ash-3); }

.blog-card__read {
  font-family: var(--font-ui); font-size: 0.65rem; font-weight: 700;
  letter-spacing: 0.14em; text-transform: uppercase; color: var(--mist);
  transition: color 0.3s, letter-spacing 0.3s;
  display: flex; align-items: center; gap: 0.4rem;
}
.blog-card__read:hover { color: var(--white); letter-spacing: 0.18em; }

/* ── EMPTY STATE ── */
.empty-state {
  text-align: center; padding: 7rem 2rem;
  grid-column: 1 / -1;
}
.empty-state__ornament {
  font-family: var(--font-ui); font-size: 0.55rem; font-weight: 700;
  letter-spacing: 1em; color: var(--ash); margin-bottom: 1.5rem;
}
.empty-state__title {
  font-family: var(--font-serif);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  color: var(--white); font-weight: 400; margin-bottom: 1rem;
}
.empty-state__sub { color: var(--ash-3); font-size: 0.95rem; }

/* ── FOOTER STRIP ── */
.footer-strip {
  background: var(--ink);
  border-top: 1px solid rgba(255,255,255,0.06);
  padding: 2.5rem 5%;
  display: flex; flex-direction: column; gap: 1rem;
  align-items: center; text-align: center;
}
@media (min-width: 768px) {
  .footer-strip { flex-direction: row; justify-content: space-between; }
}
.footer-strip p {
  font-family: var(--font-ui); font-size: 0.68rem;
  letter-spacing: 0.05em; color: var(--ash);
}
.footer-strip__social { display: flex; gap: 12px; }
.footer-strip__social a { color: var(--ash-2); font-size: 0.95rem; transition: color 0.3s; }
.footer-strip__social a:hover { color: var(--white); }
</style>
</head>
<body>

<!-- NAV -->
<nav class="nav" id="nav">
  <a href="/" class="nav__logo">Colin <em>Reardon</em></a>
  <button class="nav__toggle" id="navToggle" aria-label="Toggle menu">
    <span></span><span></span><span></span>
  </button>
  <ul class="nav__links" id="navLinks">
    <li><a href="/#books">Books</a></li>
    <li><a href="/blogs" class="active">Blog</a></li>
    <li><a href="/#about">About</a></li>
    <li><a href="/#newsletter">Newsletter</a></li>
    <li><a href="{{ route('login') }}" class="nav__cta">Login</a></li>
  </ul>
</nav>

<!-- PAGE HEADER -->
<div class="page-header">
  <div class="page-header__bg"></div>
  <div class="page-header__scan"></div>
  <div class="page-header__bg-word" aria-hidden="true">JOURNAL</div>

  <div class="page-header__content">
    <p class="page-header__eyebrow">The Journal</p>
    <h1 class="page-header__title">All Dispatches<br><em>from the Dark</em></h1>
    <div class="page-header__divider"></div>
    <p class="page-header__sub">Craft essays, reading lists, and glimpses into the process behind the dread.</p>
    <span class="page-header__count">{{ $blogs->count() }} Posts Published</span>
  </div>
</div>

<!-- BACK LINK -->
<div class="back-wrap">
  <a href="/" class="back-link">
    <span class="back-link__arrow">←</span>
    Back to Home
  </a>
</div>

<!-- ALL BLOGS -->
<section class="all-blogs">
  <div class="container">
    <div class="blogs__grid">

      @forelse($blogs as $blog)
        <article class="blog-card fade-in">
          <div class="blog-card__image">
            @if($blog->image)
              <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->heading }}" loading="lazy">
            @else
              <div class="blog-img-placeholder">
                <span class="blog-img-placeholder__text">No Image</span>
              </div>
            @endif
          </div>
          <div class="blog-card__body">
            <div class="blog-card__meta">
              <span class="blog-card__tag">Essay</span>
              <span class="blog-card__date">{{ $blog->created_at->format('M d, Y') }}</span>
            </div>
            <h3 class="blog-card__title">{{ $blog->heading }}</h3>
            <p class="blog-card__excerpt">{{ $blog->paragraph }}</p>
            <div class="blog-card__footer">
              <div class="blog-card__author">
                <div class="blog-card__author-avatar">
                  <img src="web_954c70062f.avif" alt="Colin Reardon">
                </div>
                <span class="blog-card__author-name">Colin Reardon</span>
              </div>
              @if($blog->link)
                <a href="{{ $blog->link }}" target="_blank" class="blog-card__read">Read →</a>
              @else
                <span class="blog-card__read" style="opacity:0.4;">Read →</span>
              @endif
            </div>
          </div>
        </article>
      @empty
        <div class="empty-state">
          <p class="empty-state__ornament">— ✦ —</p>
          <h2 class="empty-state__title">The Dark Is Quiet<br><em>For Now</em></h2>
          <p class="empty-state__sub">No dispatches have been sent yet. Return soon.</p>
        </div>
      @endforelse

    </div>
  </div>
</section>

<!-- FOOTER STRIP -->
<footer class="footer-strip">
  <p>© 2025 Colin Reardon. All nightmares are original.</p>
  <div class="footer-strip__social">
    <a href="#" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
    <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
    <a href="#" aria-label="Goodreads"><i class="fa-brands fa-goodreads"></i></a>
  </div>
</footer>

<script>
  const nav = document.getElementById('nav');
  window.addEventListener('scroll', () => { nav.classList.toggle('nav--scrolled', window.scrollY > 60); });
  document.getElementById('navToggle').addEventListener('click', function () {
    document.getElementById('navLinks').classList.toggle('nav__links--open');
    this.classList.toggle('nav__toggle--open');
  });
  const observer = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.06 });
  document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
</script>
</body>
</html>