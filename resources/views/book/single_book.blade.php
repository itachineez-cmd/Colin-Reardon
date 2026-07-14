<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>{{ $book->book_name }} — Colin Reardon</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=IM+Fell+English:ital@0;1&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Barlow+Condensed:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<style>
:root {
  --ink:#0d0d0d; --ink-2:#161616; --ink-3:#1f1f1f;
  --ash:#444444; --ash-2:#666666; --ash-3:#8a8a8a;
  --mist:#cfcbc2; --white:#f5f2ec; --pure:#fafaf9;
  --amazon:#ff9900; --amazon-2:#ffb84d; --amazon-dark:#cc7a00;
  --font-serif:'IM Fell English','Libre Baskerville',Georgia,serif;
  --font-body:'Libre Baskerville',Georgia,serif;
  --font-ui:'Barlow Condensed','Helvetica Neue',sans-serif;
  --ease:cubic-bezier(.25,.46,.45,.94);
  --radius-sm:4px; --radius:8px;
  --glass-bg:rgba(255,255,255,.03); --glass-border:rgba(255,255,255,.08);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{background:var(--ink);color:var(--mist);font-family:var(--font-body);font-size:1.05rem;line-height:1.75;overflow-x:hidden}
body::after{content:'';position:fixed;inset:0;pointer-events:none;z-index:9999;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity:.035}
a{color:inherit;text-decoration:none}
.container{width:92%;max-width:1180px;margin:0 auto}
::selection{background:rgba(255,153,0,.25);color:var(--white)}
::-webkit-scrollbar{width:5px}
::-webkit-scrollbar-track{background:var(--ink)}
::-webkit-scrollbar-thumb{background:var(--ash-2);border-radius:2px}

.fade-in{opacity:0;transform:translateY(24px);transition:opacity .8s ease,transform .8s ease}
.fade-in.visible{opacity:1;transform:none}

/* TOP BAR */
.topbar{position:sticky;top:0;z-index:500;padding:1.2rem 5%;
  background:rgba(13,13,13,.85);backdrop-filter:blur(16px);
  border-bottom:1px solid rgba(255,255,255,.06);transition:padding .3s var(--ease)}
.topbar__inner{display:flex;align-items:center;justify-content:space-between}
.topbar__back{font-family:var(--font-ui);font-size:.72rem;font-weight:700;letter-spacing:.16em;text-transform:uppercase;
  color:var(--ash-3);display:inline-flex;align-items:center;gap:.5rem;transition:color .3s,gap .3s}
.topbar__back:hover{color:var(--white);gap:.75rem}
.topbar__logo{font-family:var(--font-serif);font-size:1.05rem;color:var(--white);letter-spacing:.03em}
.topbar__logo em{font-style:italic;color:var(--mist)}

/* HERO */
.book-hero{position:relative;padding:4.5rem 0 5.5rem;overflow:hidden}
.book-hero::before{content:'';position:absolute;inset:0;
  background-image:radial-gradient(circle,rgba(255,255,255,.025) 1px,transparent 1px);
  background-size:32px 32px;pointer-events:none}
.book-hero__word{position:absolute;bottom:-.1em;left:50%;transform:translateX(-50%);
  font-family:var(--font-ui);font-size:clamp(8rem,22vw,16rem);font-weight:900;letter-spacing:-.04em;
  color:transparent;-webkit-text-stroke:1px rgba(255,255,255,.03);pointer-events:none;user-select:none;z-index:1}

.bh__grid{position:relative;z-index:2;display:grid;grid-template-columns:1fr;gap:3.5rem;align-items:start}
@media (min-width:900px){.bh__grid{grid-template-columns:380px 1fr;gap:5rem}}

.bh__cover-stage{perspective:1200px}
.bh__cover-frame{position:relative;max-width:340px;margin:0 auto;border-radius:var(--radius-sm);
  overflow:hidden;background:linear-gradient(160deg,#1a1a1a,#0a0a0a);
  border:1px solid rgba(255,255,255,.1);box-shadow:0 30px 70px rgba(0,0,0,.6);
  transform-style:preserve-3d;transition:transform .25s var(--ease),box-shadow .25s var(--ease)}
.bh__cover-frame img{width:100%;aspect-ratio:3/4;object-fit:cover;display:block;
  filter:grayscale(15%) brightness(.92) contrast(1.05)}
.bh__cover-frame::after{content:'';position:absolute;top:0;right:0;width:46px;height:46px;
  background:linear-gradient(135deg,transparent 50%,var(--ink) 50%);box-shadow:-2px 2px 8px rgba(0,0,0,.4)}
.bh__badge{position:absolute;bottom:1rem;left:1rem;font-family:var(--font-ui);font-size:.6rem;font-weight:700;
  letter-spacing:.2em;text-transform:uppercase;color:var(--white);background:rgba(13,13,13,.7);
  border:1px solid rgba(255,255,255,.2);padding:.35rem .75rem;backdrop-filter:blur(6px);border-radius:var(--radius-sm)}

.bh__info{position:relative}
.bh__genre{font-family:var(--font-ui);font-size:.68rem;font-weight:700;letter-spacing:.28em;
  text-transform:uppercase;color:var(--ash-3);margin-bottom:1rem;display:flex;align-items:center;gap:.6rem}
.bh__genre::before{content:'';width:20px;height:1px;background:rgba(255,255,255,.3)}
.bh__title{font-family:var(--font-serif);font-weight:400;font-size:clamp(2.4rem,5.5vw,4rem);
  color:var(--white);line-height:1.05;margin-bottom:1.4rem}
.bh__title em{font-style:italic;color:var(--mist)}
.bh__divider{width:60px;height:1px;background:linear-gradient(to right,rgba(255,255,255,.5),transparent);margin-bottom:1.6rem}
.bh__excerpt{color:var(--ash-3);font-size:1.02rem;line-height:1.85;max-width:620px;margin-bottom:2.4rem}

.bh__meta{display:flex;flex-wrap:wrap;border:1px solid rgba(255,255,255,.08);border-radius:var(--radius-sm);
  overflow:hidden;margin-bottom:2.4rem;max-width:480px}
.bh__meta-item{flex:1;min-width:120px;padding:1.1rem 1.4rem;border-right:1px solid rgba(255,255,255,.06);background:var(--glass-bg)}
.bh__meta-item:last-child{border-right:none}
.bh__meta-item .num{display:block;font-family:var(--font-serif);font-size:1.3rem;color:var(--white);margin-bottom:.2rem}
.bh__meta-item .label{font-family:var(--font-ui);font-size:.6rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--ash)}

/* BUY NOW — amazon yellow (primary) */
.bh__actions{display:flex;flex-wrap:wrap;align-items:center;gap:1rem;margin-bottom:.9rem}
.btn-amazon{display:inline-flex;align-items:center;gap:.9rem;font-family:var(--font-ui);font-size:.85rem;font-weight:700;
  letter-spacing:.08em;text-transform:uppercase;color:#231a00;
  background:linear-gradient(180deg,var(--amazon-2) 0%,var(--amazon) 100%);
  border:1px solid var(--amazon-dark);padding:1rem 2.2rem;border-radius:999px;
  box-shadow:0 10px 30px rgba(255,153,0,.25),inset 0 1px 0 rgba(255,255,255,.5);
  transition:transform .3s var(--ease),box-shadow .3s var(--ease),filter .3s;position:relative}
.btn-amazon i{font-size:1.3rem}
.btn-amazon:hover{transform:translateY(-3px);box-shadow:0 16px 40px rgba(255,153,0,.4),inset 0 1px 0 rgba(255,255,255,.6);filter:brightness(1.05)}
.btn-amazon__arrow{transition:transform .3s var(--ease)}
.btn-amazon:hover .btn-amazon__arrow{transform:translateX(4px)}
.bh__buy-note{display:block;margin-top:.9rem;font-family:var(--font-ui);font-size:.68rem;letter-spacing:.08em;color:var(--ash)}

/* Secondary / optional links — Goodreads, IngramSpark */
.bh__secondary-links{display:flex;flex-wrap:wrap;gap:.7rem}
.btn-secondary{display:inline-flex;align-items:center;gap:.6rem;font-family:var(--font-ui);font-size:.7rem;font-weight:700;
  letter-spacing:.1em;text-transform:uppercase;color:var(--mist);background:var(--glass-bg);
  border:1px solid var(--glass-border);padding:.7rem 1.3rem;border-radius:999px;transition:.3s var(--ease)}
.btn-secondary:hover{color:var(--white);border-color:rgba(255,255,255,.3);background:rgba(255,255,255,.06)}
.btn-secondary i{font-size:.85rem}

/* sticky buy bar */
.sticky-buy{position:fixed;left:0;right:0;bottom:-100px;z-index:600;
  background:rgba(13,13,13,.92);backdrop-filter:blur(16px);
  border-top:1px solid rgba(255,255,255,.1);padding:.9rem 5%;
  transition:bottom .4s var(--ease);box-shadow:0 -10px 30px rgba(0,0,0,.4)}
.sticky-buy.show{bottom:0}
.sticky-buy__inner{max-width:1180px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;gap:1rem;flex-wrap:wrap}
.sticky-buy__title{font-family:var(--font-serif);font-size:1.05rem;color:var(--white)}
.sticky-buy__title span{display:block;font-family:var(--font-ui);font-size:.62rem;letter-spacing:.18em;text-transform:uppercase;color:var(--ash-3);margin-bottom:.2rem}
.btn-amazon--sm{padding:.65rem 1.5rem;font-size:.72rem;border-radius:999px}

/* PRAISE */
.praise-strip{background:var(--white);padding:3.2rem 5%;position:relative;overflow:hidden}
.praise-strip::before{content:'\201C';position:absolute;top:-1rem;left:5%;font-family:var(--font-serif);
  font-size:10rem;color:rgba(0,0,0,.05);line-height:1;pointer-events:none}
.praise-strip__inner{max-width:760px;margin:0 auto;text-align:center;position:relative;z-index:1}
.praise-strip p{font-family:var(--font-serif);font-style:italic;font-size:clamp(1.1rem,2.3vw,1.4rem);
  color:var(--ink);line-height:1.5;margin-bottom:1rem}
.praise-strip cite{font-family:var(--font-ui);font-size:.66rem;font-weight:700;letter-spacing:.2em;
  text-transform:uppercase;color:var(--ash-2);font-style:normal}

/* SYNOPSIS */
.synopsis{padding:6rem 0;background:var(--ink-2)}
.synopsis__grid{display:grid;grid-template-columns:1fr;gap:3rem}
@media (min-width:900px){.synopsis__grid{grid-template-columns:2fr 1fr;gap:5rem}}
.synopsis__label{font-family:var(--font-ui);font-size:.68rem;font-weight:700;letter-spacing:.28em;
  text-transform:uppercase;color:var(--ash-3);margin-bottom:.8rem}
.synopsis__title{font-family:var(--font-serif);font-size:clamp(1.8rem,3.5vw,2.4rem);color:var(--white);margin-bottom:1.6rem}
.synopsis__body p{color:var(--ash-3);margin-bottom:1.2rem;line-height:1.85}
.synopsis__body p:first-child::first-letter{font-family:var(--font-serif);font-size:3.6rem;color:var(--white);
  float:left;line-height:.8;margin:.1em .12em 0 0}

.warning-card{border:1px dashed rgba(255,255,255,.2);border-radius:var(--radius-sm);padding:2rem;
  background:var(--glass-bg);align-self:start}
.warning-card__label{display:flex;align-items:center;gap:.6rem;font-family:var(--font-ui);font-size:.65rem;
  font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--white);margin-bottom:1rem}
.warning-card__label i{color:var(--amazon)}
.warning-card p{font-size:.88rem;color:var(--ash-3);line-height:1.75}

/* RELATED */
.related{padding:6rem 0;background:var(--ink)}
.related__header{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:3rem;flex-wrap:wrap;gap:1rem}
.related__title{font-family:var(--font-serif);font-size:clamp(1.7rem,3.5vw,2.4rem);color:var(--white)}
.related__grid{display:grid;grid-template-columns:1fr;gap:1.5rem}
@media (min-width:640px){.related__grid{grid-template-columns:repeat(3,1fr)}}
.related-card{background:var(--ink-3);border:1px solid rgba(255,255,255,.06);border-radius:var(--radius);
  overflow:hidden;transition:transform .35s var(--ease),border-color .35s}
.related-card:hover{transform:translateY(-4px);border-color:rgba(255,255,255,.15)}
.related-card__img{aspect-ratio:3/4;overflow:hidden}
.related-card__img img{width:100%;height:100%;object-fit:cover;display:block;
  filter:grayscale(20%) brightness(.9);transition:transform .5s var(--ease),filter .5s}
.related-card:hover .related-card__img img{transform:scale(1.04);filter:grayscale(0%) brightness(1)}
.related-card__body{padding:1.2rem 1.3rem}
.related-card__title{font-family:var(--font-serif);font-size:1.05rem;color:var(--white);margin-bottom:.5rem}
.related-card__link{font-family:var(--font-ui);font-size:.65rem;font-weight:700;letter-spacing:.14em;
  text-transform:uppercase;color:var(--mist)}
.related-card__link:hover{color:var(--white)}

/* FOOTER */
.footer{background:var(--ink);border-top:1px solid rgba(255,255,255,.06);padding:3rem 5% 6rem;text-align:center}
.footer p{font-family:var(--font-ui);font-size:.68rem;letter-spacing:.05em;color:var(--ash)}
</style>
</head>
<body>

<header class="topbar">
  <div class="container topbar__inner">
    <a href="{{ route('index') }}" class="topbar__back"><i class="fa-solid fa-arrow-left"></i> Back to Collection</a>
    <a href="{{ url('/') }}" class="topbar__logo">Colin <em>Reardon</em></a>
  </div>
</header>

<section class="book-hero">
  <div class="book-hero__word" aria-hidden="true">DREAD</div>
  <div class="container bh__grid">

    <div class="bh__cover-stage">
      <div class="bh__cover-frame" id="tiltCover">
        <img src="{{ asset('storage/' . $book->book_image) }}" alt="{{ $book->book_name }}">
        <div class="bh__badge">New Release</div>
      </div>
    </div>

    <div class="bh__info fade-in">
      <p class="bh__genre">Psychological Horror</p>
      <h1 class="bh__title">{{ $book->book_name }}</h1>
      <div class="bh__divider"></div>
      <p class="bh__excerpt">{{ Str::limit($book->book_detail, 320) }}</p>

      <div class="bh__meta">
        <div class="bh__meta-item">
          <span class="num">{{ $book->book_pages }}</span>
          <span class="label">Pages</span>
        </div>
        <div class="bh__meta-item">
          <span class="num">{{ $book->created_at?->format('Y') ?? '—' }}</span>
          <span class="label">Published</span>
        </div>
        <div class="bh__meta-item">
          <span class="num">Hardcover</span>
          <span class="label">Format</span>
        </div>
      </div>

      <div class="bh__actions">
        <a href="{{ $book->amazon_link ?? '#' }}" target="_blank" rel="noopener" class="btn-amazon" id="buyBtn">
          <i class="fa-brands fa-amazon"></i>
          <span>Buy Now on Amazon</span>
          <span class="btn-amazon__arrow">→</span>
        </a>
      </div>

      {{-- Optional links: only rendered if present in the database --}}
      @if($book->goodreads_link || $book->ingramspark_link)
        <div class="bh__secondary-links">
          @if($book->goodreads_link)
            <a href="{{ $book->goodreads_link }}" target="_blank" rel="noopener" class="btn-secondary">
              <i class="fa-brands fa-goodreads"></i> Goodreads
            </a>
          @endif
          @if($book->ingramspark_link)
            <a href="{{ $book->ingramspark_link }}" target="_blank" rel="noopener" class="btn-secondary">
              <i class="fa-solid fa-book"></i> IngramSpark
            </a>
          @endif
        </div>
      @endif

      <span class="bh__buy-note">Ships worldwide · Available in Hardcover, Paperback &amp; Kindle</span>
    </div>

  </div>
</section>

<div class="praise-strip fade-in">
  <div class="praise-strip__inner">
    <p>"Reardon writes fear the way others write love — patiently, and without mercy."</p>
    <cite>— The New York Times Book Review</cite>
  </div>
</div>

<section class="synopsis">
  <div class="container synopsis__grid">
    <div class="fade-in">
      <p class="synopsis__label">Synopsis</p>
      <h2 class="synopsis__title">What Waits Inside</h2>
      <div class="synopsis__body">
        <p>{!! nl2br(e($book->book_detail)) !!}</p>
      </div>
    </div>

    <aside class="warning-card fade-in">
      <p class="warning-card__label"><i class="fa-solid fa-triangle-exclamation"></i> Reader's Warning</p>
      <p>This novel contains scenes of psychological distress, isolation, and imagery some readers may find disturbing. Best read with the lights on — and the doors locked.</p>
    </aside>
  </div>
</section>

@if($relatedBooks->count())
<section class="related">
  <div class="container">
    <div class="related__header fade-in">
      <h2 class="related__title">More from the Abyss</h2>
      <a href="{{ route('blogs.indexx') }}" class="topbar__back">View All Titles →</a>
    </div>
    <div class="related__grid">
      @foreach($relatedBooks as $rb)
        <article class="related-card fade-in">
          <div class="related-card__img">
            
            <img src="{{ asset('storage/' . $rb->book_image) }}" alt="{{ $rb->book_name }}">
          </div>
          <div class="related-card__body">
            <h3 class="related-card__title">{{ $rb->book_name }}</h3>
            <a href="{{ route('blogs.show', $rb->id) }}" class="related-card__link">Read more →</a>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
@endif

<footer class="footer">
  <p>© {{ date('Y') }} Colin Reardon. All rights reserved. All nightmares are original.</p>
</footer>

<div class="sticky-buy" id="stickyBuy">
  <div class="sticky-buy__inner">
    <p class="sticky-buy__title"><span>{{ $book->book_name }}</span>Colin Reardon</p>
    <a href="{{ $book->amazon_link ?? '#' }}" target="_blank" rel="noopener" class="btn-amazon btn-amazon--sm">
      <i class="fa-brands fa-amazon"></i>
      <span>Buy Now</span>
    </a>
  </div>
</div>

<script>
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.08 });
document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

const cover = document.getElementById('tiltCover');
cover.addEventListener('mousemove', (e) => {
  const r = cover.getBoundingClientRect();
  const x = (e.clientX - r.left) / r.width - 0.5;
  const y = (e.clientY - r.top) / r.height - 0.5;
  cover.style.transform = `rotateY(${x * 14}deg) rotateX(${-y * 14}deg) scale(1.03)`;
});
cover.addEventListener('mouseleave', () => {
  cover.style.transform = 'rotateY(0) rotateX(0) scale(1)';
});

const buyBtn = document.getElementById('buyBtn');
const stickyBuy = document.getElementById('stickyBuy');
window.addEventListener('scroll', () => {
  const rect = buyBtn.getBoundingClientRect();
  const past = rect.bottom < 0;
  stickyBuy.classList.toggle('show', past);
});
</script>
</body>
</html>