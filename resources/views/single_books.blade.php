<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $book->book_name }} — Colin Reardon</title>
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

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
html{scroll-behavior:smooth;}
body{
  background:var(--ink);color:var(--mist);
  font-family:var(--font-body);font-size:1.05rem;
  line-height:1.75;overflow-x:hidden;
}
body::after{
  content:'';position:fixed;inset:0;pointer-events:none;z-index:9999;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity:0.03;
}
a{color:inherit;text-decoration:none;}
ul{list-style:none;}
.container{width:92%;max-width:1180px;margin:0 auto;}
.fade-in{opacity:0;transform:translateY(28px);transition:opacity 0.8s ease,transform 0.8s ease;}
.fade-in.visible{opacity:1;transform:none;}

/* ── NAV ── */
.nav{
  position:fixed;top:0;left:0;right:0;z-index:1000;
  display:flex;align-items:center;justify-content:space-between;
  padding:0 5%;height:var(--nav-h);
  transition:background 0.4s var(--ease),border-color 0.4s var(--ease),box-shadow 0.4s;
  border-bottom:1px solid transparent;
}
.nav--scrolled{
  background:rgba(13,13,13,0.9);
  backdrop-filter:var(--glass-blur);
  border-color:var(--glass-border);
  box-shadow:0 8px 32px rgba(0,0,0,0.4),inset 0 1px 0 rgba(255,255,255,0.05);
}
.nav__logo{font-family:var(--font-serif);font-size:1.15rem;color:var(--white);letter-spacing:0.04em;}
.nav__logo em{font-style:italic;color:var(--mist);}
.nav__links{
  display:none;flex-direction:column;
  position:absolute;top:var(--nav-h);left:0;right:0;
  background:rgba(13,13,13,0.98);backdrop-filter:var(--glass-blur);
  padding:2rem 5%;gap:1.5rem;border-bottom:1px solid var(--glass-border);
}
.nav__links--open{display:flex;}
.nav__links a{
  font-family:var(--font-ui);font-size:0.75rem;font-weight:600;
  letter-spacing:0.18em;text-transform:uppercase;color:var(--ash-3);
  transition:color 0.3s;position:relative;
}
.nav__links a::after{
  content:'';position:absolute;bottom:-2px;left:0;
  width:0;height:1px;background:var(--white);transition:width 0.3s var(--ease);
}
.nav__links a:hover{color:var(--white);}
.nav__links a:hover::after{width:100%;}
.nav__cta{
  border:1px solid rgba(255,255,255,0.25)!important;
  padding:0.35rem 1rem;color:var(--white)!important;border-radius:var(--radius-sm);
}
.nav__cta:hover{background:var(--white)!important;color:var(--ink)!important;}
.nav__cta::after{display:none!important;}
.nav__toggle{
  background:none;border:none;cursor:pointer;
  display:flex;flex-direction:column;gap:5px;padding:6px;
}
.nav__toggle span{display:block;width:22px;height:1px;background:var(--mist);transition:0.35s var(--ease);transform-origin:center;}
.nav__toggle--open span:nth-child(1){transform:translateY(6px) rotate(45deg);}
.nav__toggle--open span:nth-child(2){opacity:0;}
.nav__toggle--open span:nth-child(3){transform:translateY(-6px) rotate(-45deg);}
@media(min-width:768px){
  .nav__links{display:flex;flex-direction:row;position:static;background:none;padding:0;align-items:center;gap:2.5rem;border:none;}
  .nav__toggle{display:none;}
}

/* ── CINEMATIC HERO BANNER ── */
.book-banner{
  position:relative;
  min-height:92vh;
  display:flex;align-items:flex-end;
  overflow:hidden;
  background:var(--ink);
}
.book-banner__bg-img{
  position:absolute;inset:0;
  background-size:cover;background-position:center top;
  filter:grayscale(60%) brightness(0.25);
  transform:scale(1.06);
  transition:transform 8s ease;
}
.book-banner__bg-img.loaded{transform:scale(1);}
.book-banner__overlay{
  position:absolute;inset:0;
  background:linear-gradient(
    to bottom,
    rgba(13,13,13,0.3) 0%,
    rgba(13,13,13,0.1) 30%,
    rgba(13,13,13,0.7) 65%,
    rgba(13,13,13,1) 100%
  );
}
.book-banner__scan{
  position:absolute;top:0;left:0;right:0;height:1px;
  background:linear-gradient(to right,transparent,rgba(245,242,236,0.1),transparent);
  animation:scanDown 10s linear infinite;z-index:2;
}
@keyframes scanDown{
  from{top:0;opacity:0;}5%{opacity:1;}95%{opacity:1;}to{top:100%;opacity:0;}
}
.book-banner__grid-dots{
  position:absolute;inset:0;z-index:1;
  background-image:radial-gradient(circle,rgba(255,255,255,0.015) 1px,transparent 1px);
  background-size:32px 32px;
}
.book-banner__content{
  position:relative;z-index:3;
  width:92%;max-width:1180px;margin:0 auto;
  padding-bottom:5rem;
  padding-top:calc(var(--nav-h) + 3rem);
  display:flex;flex-direction:column;gap:4rem;
  align-items:flex-start;
}
@media(min-width:900px){
  .book-banner__content{flex-direction:row;align-items:flex-end;gap:5rem;}
}

/* Cover */
.banner-cover{
  flex-shrink:0;
  width:min(240px,60vw);
  position:relative;
}
@media(min-width:900px){width:min(280px,30vw);}
.banner-cover::before,.banner-cover::after{
  content:'';position:absolute;width:20px;height:20px;
}
.banner-cover::before{top:-8px;right:-8px;border-top:1px solid rgba(255,255,255,0.35);border-right:1px solid rgba(255,255,255,0.35);}
.banner-cover::after{bottom:-8px;left:-8px;border-bottom:1px solid rgba(255,255,255,0.35);border-left:1px solid rgba(255,255,255,0.35);}
.banner-cover__img{
  width:100%;aspect-ratio:3/4;
  object-fit:cover;display:block;
  border:1px solid rgba(255,255,255,0.12);
  border-radius:var(--radius-sm);
  box-shadow:0 40px 100px rgba(0,0,0,0.8),0 8px 24px rgba(0,0,0,0.5);
  filter:grayscale(10%) brightness(0.92);
  transition:filter 0.5s var(--ease);
}
.banner-cover__img:hover{filter:grayscale(0%) brightness(1);}
.banner-cover__badge{
  position:absolute;top:1rem;left:1rem;
  background:var(--white);color:var(--ink);
  font-family:var(--font-ui);font-size:0.58rem;font-weight:700;
  letter-spacing:0.14em;text-transform:uppercase;
  padding:0.28rem 0.65rem;border-radius:var(--radius-sm);
  box-shadow:0 2px 12px rgba(0,0,0,0.5);
}

/* Banner text */
.banner-text{flex:1;}
.banner-text__eyebrow{
  font-family:var(--font-ui);font-size:0.65rem;font-weight:700;
  letter-spacing:0.32em;text-transform:uppercase;color:var(--ash-3);
  margin-bottom:1rem;
  display:flex;align-items:center;gap:1rem;
}
.banner-text__eyebrow::after{
  content:'';flex:1;max-width:60px;height:1px;
  background:rgba(255,255,255,0.15);
}
.banner-text__title{
  font-family:var(--font-serif);
  font-size:clamp(2.6rem,7vw,5rem);
  font-weight:400;color:var(--white);
  line-height:1.0;margin-bottom:0.6rem;
}
.banner-text__title em{font-style:italic;color:var(--mist);}
.banner-text__author{
  font-family:var(--font-ui);font-size:0.72rem;font-weight:600;
  letter-spacing:0.22em;text-transform:uppercase;color:var(--ash);
  margin-bottom:1.8rem;
}
.banner-text__divider{
  width:50px;height:1px;margin-bottom:1.8rem;
  background:linear-gradient(to right,rgba(255,255,255,0.4),transparent);
}
.banner-text__excerpt{
  font-size:1rem;color:var(--ash-3);
  line-height:1.85;max-width:500px;margin-bottom:2rem;
}
.banner-text__excerpt em{color:var(--mist);font-style:italic;}

/* Meta pills */
.banner-meta{
  display:flex;flex-wrap:wrap;gap:0.6rem;margin-bottom:2.2rem;
}
.banner-meta__pill{
  font-family:var(--font-ui);font-size:0.62rem;font-weight:700;
  letter-spacing:0.14em;text-transform:uppercase;color:var(--ash-3);
  border:1px solid rgba(255,255,255,0.1);
  padding:0.3rem 0.8rem;border-radius:20px;
  background:var(--glass-bg);
  display:flex;align-items:center;gap:0.4rem;
}

/* CTA row */
.banner-cta{display:flex;flex-wrap:wrap;gap:0.8rem;}
.cta-btn{
  display:inline-flex;align-items:center;gap:0.6rem;
  font-family:var(--font-ui);font-size:0.7rem;font-weight:700;
  letter-spacing:0.16em;text-transform:uppercase;
  padding:0.85rem 1.5rem;border-radius:var(--radius-sm);
  transition:all 0.3s var(--ease);cursor:pointer;border:none;
  white-space:nowrap;
}
.cta-btn i{font-size:1rem;}
.cta-btn--amazon{background:var(--white);color:var(--ink);}
.cta-btn--amazon:hover{background:var(--pure);transform:translateY(-2px);box-shadow:0 8px 24px rgba(245,242,236,0.2);}
.cta-btn--ghost{background:transparent;color:var(--mist);border:1px solid rgba(255,255,255,0.2);}
.cta-btn--ghost:hover{border-color:rgba(255,255,255,0.4);color:var(--white);background:rgba(255,255,255,0.05);transform:translateY(-2px);}
.cta-btn--goodreads:hover{border-color:#c59d5f;color:#c59d5f;}
.cta-btn--ingramspark:hover{border-color:#6fb4e0;color:#6fb4e0;}

/* ── BREADCRUMB ── */
.breadcrumb-bar{
  position:absolute;top:calc(var(--nav-h) + 1.5rem);left:0;right:0;z-index:4;
}
.breadcrumb-bar .container{
  display:flex;align-items:center;gap:0.6rem;
  font-family:var(--font-ui);font-size:0.65rem;font-weight:700;
  letter-spacing:0.18em;text-transform:uppercase;color:var(--ash-3);
}
.breadcrumb-bar a{color:var(--ash-3);transition:color 0.3s;}
.breadcrumb-bar a:hover{color:var(--white);}
.breadcrumb-bar .sep{color:var(--ash);}

/* ── DETAIL BODY ── */
.book-body{
  padding:6rem 0;
  background:var(--ink-2);
  position:relative;
}
.book-body::before{
  content:'';position:absolute;top:0;left:0;right:0;height:1px;
  background:linear-gradient(to right,transparent,rgba(255,255,255,0.08),transparent);
}

.book-body__layout{
  display:flex;flex-direction:column;gap:4rem;
}
@media(min-width:900px){
  .book-body__layout{flex-direction:row;gap:5rem;align-items:flex-start;}
}

/* Main content */
.book-body__main{flex:1;}
.section-eyebrow{
  font-family:var(--font-ui);font-size:0.65rem;font-weight:700;
  letter-spacing:0.28em;text-transform:uppercase;color:var(--ash-3);
  margin-bottom:1.5rem;
  display:flex;align-items:center;gap:1rem;
}
.section-eyebrow::after{
  content:'';flex:1;height:1px;
  background:rgba(255,255,255,0.08);
}
.book-body__text{
  font-size:1.05rem;color:var(--ash-3);line-height:1.9;
}
.book-body__text p{margin-bottom:1.4rem;}
.book-body__text p:last-child{margin-bottom:0;}
.book-body__text em{color:var(--mist);font-style:italic;}

/* Quote pull */
.pull-quote{
  margin:2.5rem 0;
  padding:1.5rem 2rem;
  border-left:2px solid rgba(255,255,255,0.15);
  background:var(--glass-bg);
  border-radius:0 var(--radius-sm) var(--radius-sm) 0;
}
.pull-quote p{
  font-family:var(--font-serif);font-style:italic;
  font-size:1.15rem;color:var(--mist);line-height:1.6;
  margin:0 0 0.5rem;
}
.pull-quote cite{
  font-family:var(--font-ui);font-size:0.65rem;font-weight:700;
  letter-spacing:0.18em;text-transform:uppercase;color:var(--ash);
  font-style:normal;
}

/* Sidebar */
.book-body__sidebar{
  width:100%;
}
@media(min-width:900px){width:300px;flex-shrink:0;position:sticky;top:calc(var(--nav-h) + 2rem);}

.side-card{
  background:var(--ink-3);
  border:1px solid rgba(255,255,255,0.07);
  border-radius:var(--radius);
  overflow:hidden;
  margin-bottom:1.2rem;
}
.side-card__head{
  padding:0.9rem 1.2rem;
  border-bottom:1px solid rgba(255,255,255,0.06);
  font-family:var(--font-ui);font-size:0.62rem;font-weight:700;
  letter-spacing:0.2em;text-transform:uppercase;color:var(--ash);
}
.side-card__body{padding:1rem 1.2rem;}

.detail-row{
  display:flex;justify-content:space-between;align-items:center;
  padding:0.6rem 0;
  border-bottom:1px solid rgba(255,255,255,0.04);
  font-family:var(--font-ui);font-size:0.82rem;
}
.detail-row:last-child{border-bottom:none;}
.detail-row__label{color:var(--ash-3);}
.detail-row__value{color:var(--white);font-weight:600;}

.side-links{display:flex;flex-direction:column;gap:0.55rem;}
.side-link{
  display:flex;align-items:center;justify-content:space-between;
  padding:0.8rem 1rem;
  background:var(--glass-bg);
  border:1px solid rgba(255,255,255,0.07);
  border-radius:var(--radius-sm);
  font-family:var(--font-ui);font-size:0.72rem;font-weight:700;
  letter-spacing:0.1em;text-transform:uppercase;color:var(--mist);
  transition:all 0.3s var(--ease);
}
.side-link:hover{
  border-color:rgba(255,255,255,0.2);color:var(--white);
  background:rgba(255,255,255,0.05);transform:translateX(4px);
}
.side-link--amazon:hover{border-color:#f0a93c;color:#f0a93c;}
.side-link--goodreads:hover{border-color:#c59d5f;color:#c59d5f;}
.side-link--ingramspark:hover{border-color:#6fb4e0;color:#6fb4e0;}
.side-link__left{display:flex;align-items:center;gap:0.7rem;}
.side-link i{font-size:1rem;}

/* ── QUOTE BAND ── */
.quote-band{
  background:var(--white);
  padding:4rem 5%;
  position:relative;overflow:hidden;
}
.quote-band::before{
  content:'\201C';
  position:absolute;top:-1.5rem;left:4%;
  font-family:var(--font-serif);font-size:14rem;
  color:rgba(0,0,0,0.04);line-height:1;pointer-events:none;
}
.quote-band__inner{max-width:760px;margin:0 auto;text-align:center;position:relative;z-index:1;}
.quote-band__text{
  font-family:var(--font-serif);font-style:italic;
  font-size:clamp(1.15rem,2.5vw,1.5rem);
  color:var(--ink);line-height:1.55;margin-bottom:1.2rem;
}
.quote-band__cite{
  font-family:var(--font-ui);font-size:0.68rem;font-weight:700;
  letter-spacing:0.2em;text-transform:uppercase;color:var(--ash-2);
}

/* ── FOOTER ── */
.footer{
  background:var(--ink);
  border-top:1px solid rgba(255,255,255,0.06);
  padding:4.5rem 0 0;
}
.footer__container{
  display:flex;flex-direction:column;gap:3rem;margin-bottom:3rem;
}
@media(min-width:768px){
  .footer__container{flex-direction:row;justify-content:space-between;}
  .footer__brand{max-width:220px;}
}
.footer__logo{font-family:var(--font-serif);font-size:1.3rem;color:var(--white);margin-bottom:0.5rem;}
.footer__tagline{
  font-family:var(--font-ui);font-size:0.68rem;font-weight:700;
  letter-spacing:0.15em;text-transform:uppercase;color:var(--ash);margin-bottom:1.5rem;
}
.footer__social{display:flex;gap:12px;}
.footer__social-link{
  width:34px;height:34px;
  display:flex;align-items:center;justify-content:center;
  border:1px solid rgba(255,255,255,0.1);
  color:var(--ash-2);font-size:0.95rem;
  transition:0.3s;border-radius:var(--radius-sm);
  background:var(--glass-bg);
}
.footer__social-link:hover{border-color:rgba(255,255,255,0.3);color:var(--white);background:rgba(255,255,255,0.06);transform:translateY(-3px);}
.footer__nav{display:grid;grid-template-columns:repeat(3,1fr);gap:2rem;}
.footer__nav-group h3{
  font-family:var(--font-ui);font-size:0.62rem;font-weight:700;
  letter-spacing:0.22em;text-transform:uppercase;color:var(--ash);margin-bottom:1.2rem;
}
.footer__nav-group a{
  display:block;font-family:var(--font-ui);font-size:0.82rem;
  color:var(--ash-2);margin-bottom:0.7rem;transition:color 0.3s;
}
.footer__nav-group a:hover{color:var(--white);}
.footer__bottom{
  border-top:1px solid rgba(255,255,255,0.06);
  padding:1.5rem 5%;
  display:flex;flex-direction:column;gap:0.8rem;
  align-items:center;text-align:center;
}
@media(min-width:768px){.footer__bottom{flex-direction:row;justify-content:space-between;}}
.footer__bottom p{font-family:var(--font-ui);font-size:0.68rem;letter-spacing:0.05em;color:var(--ash);}
.footer__legal{display:flex;gap:1.5rem;}
.footer__legal a{font-family:var(--font-ui);font-size:0.68rem;color:var(--ash);transition:color 0.3s;}
.footer__legal a:hover{color:var(--mist);}

::-webkit-scrollbar{width:5px;}
::-webkit-scrollbar-track{background:var(--ink);}
::-webkit-scrollbar-thumb{background:var(--ash-2);border-radius:2px;}
::selection{background:rgba(245,242,236,0.2);color:var(--white);}
</style>
</head>
<body>

<!-- NAV -->
<nav class="nav" id="nav">
  <a href="{{ route('index') }}" class="nav__logo">Colin <em>Reardon</em></a>
  <button class="nav__toggle" id="navToggle" aria-label="Toggle menu">
    <span></span><span></span><span></span>
  </button>
  <ul class="nav__links" id="navLinks">
    <li><a href="{{ route('index') }}#books">Books</a></li>
    <li><a href="{{ route('index') }}#blogs">Blog</a></li>
    <li><a href="{{ route('index') }}#about">About</a></li>
    <li><a href="{{ route('index') }}#newsletter">Newsletter</a></li>
    <li><a href="{{ route('login') }}" class="nav__cta">Login</a></li>
  </ul>
</nav>

<!-- CINEMATIC HERO BANNER -->
<section class="book-banner">

  <!-- Blurred book cover as bg -->
  <div class="book-banner__bg-img" id="bannerBg"
    style="background-image: url('{{ asset('storage/' . $book->book_image) }}');">
  </div>
  <div class="book-banner__overlay"></div>
  <div class="book-banner__scan"></div>
  <div class="book-banner__grid-dots"></div>

  <!-- Breadcrumb -->
  <div class="breadcrumb-bar">
    <div class="container">
      <a href="{{ route('index') }}">Home</a>
      <span class="sep">/</span>
      <a href="{{ route('index') }}#books">Books</a>
      <span class="sep">/</span>
      <span>{{ $book->book_name }}</span>
    </div>
  </div>

  <div class="book-banner__content fade-in">

    <!-- Cover -->
    <div class="banner-cover">
      <img
        src="{{ asset('storage/' . $book->book_image) }}"
        alt="{{ $book->book_name }}"
        class="banner-cover__img"
      >
      <span class="banner-cover__badge">New</span>
    </div>

    <!-- Text -->
    <div class="banner-text">
      <p class="banner-text__eyebrow">Psychological Horror</p>
      <h1 class="banner-text__title">{{ $book->book_name }}</h1>
      <p class="banner-text__author">By Colin Reardon</p>
      <div class="banner-text__divider"></div>
      <p class="banner-text__excerpt">{{ Str::limit($book->book_detail, 200) }}</p>

      <div class="banner-meta">
        <span class="banner-meta__pill">
          <i class="fa-solid fa-book"></i>
          {{ $book->book_pages }} Pages
        </span>
        <span class="banner-meta__pill">
          <i class="fa-solid fa-skull"></i>
          Horror
        </span>
        <span class="banner-meta__pill">
          <i class="fa-solid fa-feather"></i>
          Colin Reardon
        </span>
      </div>

      <div class="banner-cta">
        @if($book->amazon_link)
          <a href="{{ $book->amazon_link }}" target="_blank" class="cta-btn cta-btn--amazon">
            <i class="fa-brands fa-amazon"></i> Buy on Amazon
          </a>
        @endif
        @if($book->goodreads_link)
          <a href="{{ $book->goodreads_link }}" target="_blank" class="cta-btn cta-btn--ghost cta-btn--goodreads">
            <i class="fa-brands fa-goodreads"></i> Goodreads
          </a>
        @endif
        @if($book->ingram_link)
          <a href="{{ $book->ingram_link }}" target="_blank" class="cta-btn cta-btn--ghost cta-btn--ingramspark">
            <i class="fa-solid fa-book-open"></i> IngramSpark
          </a>
        @endif
      </div>
    </div>

  </div>
</section>

<!-- REVIEW QUOTE BAND -->
<div class="quote-band">
  <div class="quote-band__inner">
    <p class="quote-band__text">"Reardon is the heir to the throne of dread — a writer who makes darkness feel like home."</p>
    <span class="quote-band__cite">— The New York Times Book Review</span>
  </div>
</div>

<!-- BOOK DETAIL BODY -->
<section class="book-body">
  <div class="container">
    <div class="book-body__layout fade-in">

      <!-- Main -->
      <div class="book-body__main">
        <p class="section-eyebrow">About the Book</p>
        <div class="book-body__text">
          <p>{{ $book->book_detail }}</p>
        </div>

        <div class="pull-quote" style="margin-top:3rem;">
          <p>"The scariest book I have read in a decade. Reardon earns every chill through character, atmosphere, and an almost unbearable patience."</p>
          <cite>— The Guardian</cite>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="book-body__sidebar">

        <!-- Details -->
        <div class="side-card">
          <div class="side-card__head">Book Details</div>
          <div class="side-card__body">
            <div class="detail-row">
              <span class="detail-row__label">Title</span>
              <span class="detail-row__value">{{ $book->book_name }}</span>
            </div>
            <div class="detail-row">
              <span class="detail-row__label">Author</span>
              <span class="detail-row__value">Colin Reardon</span>
            </div>
            <div class="detail-row">
              <span class="detail-row__label">Pages</span>
              <span class="detail-row__value">{{ $book->book_pages }}</span>
            </div>
            <div class="detail-row">
              <span class="detail-row__label">Genre</span>
              <span class="detail-row__value">Psychological Horror</span>
            </div>
            <div class="detail-row">
              <span class="detail-row__label">Published</span>
              <span class="detail-row__value">{{ $book->created_at->format('M d, Y') }}</span>
            </div>
          </div>
        </div>

        <!-- Buy links -->
        <div class="side-card">
          <div class="side-card__head">Get This Book</div>
          <div class="side-card__body">
            <div class="side-links">
              @if($book->amazon_link)
                <a href="{{ $book->amazon_link }}" target="_blank" class="side-link side-link--amazon">
                  <span class="side-link__left"><i class="fa-brands fa-amazon"></i> Amazon</span>
                  <span>→</span>
                </a>
              @endif
              @if($book->goodreads_link)
                <a href="{{ $book->goodreads_link }}" target="_blank" class="side-link side-link--goodreads">
                  <span class="side-link__left"><i class="fa-brands fa-goodreads"></i> Goodreads</span>
                  <span>→</span>
                </a>
              @endif
              @if($book->ingram_link)
                <a href="{{ $book->ingram_link }}" target="_blank" class="side-link side-link--ingramspark">
                  <span class="side-link__left"><i class="fa-solid fa-book-open"></i> IngramSpark</span>
                  <span>→</span>
                </a>
              @endif
            </div>
          </div>
        </div>

        <!-- Back -->
        <a href="{{ route('index') }}#books" style="
          display:inline-flex;align-items:center;gap:0.6rem;
          font-family:var(--font-ui);font-size:0.65rem;font-weight:700;
          letter-spacing:0.2em;text-transform:uppercase;
          color:var(--ash-3);transition:color 0.3s;margin-top:0.5rem;
        " onmouseover="this.style.color='var(--white)'" onmouseout="this.style.color='var(--ash-3)'">
          <i class="fa-solid fa-arrow-left"></i> Back to All Books
        </a>

      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="footer">
  <div class="container footer__container">
    <div class="footer__brand">
      <p class="footer__logo">Colin Reardon</p>
      <p class="footer__tagline">Writing terror since 2009.</p>
      <div class="footer__social">
        <a href="#" class="footer__social-link" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="#" class="footer__social-link" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" class="footer__social-link" aria-label="Goodreads"><i class="fa-brands fa-goodreads"></i></a>
      </div>
    </div>
    <nav class="footer__nav">
      <div class="footer__nav-group">
        <h3>Books</h3>
        <a href="{{ route('index') }}#books">All Titles</a>
        <a href="{{ route('index') }}#books">New Releases</a>
      </div>
      <div class="footer__nav-group">
        <h3>Author</h3>
        <a href="{{ route('index') }}#about">About</a>
        <a href="#">Contact</a>
      </div>
      <div class="footer__nav-group">
        <h3>More</h3>
        <a href="{{ route('index') }}#newsletter">Newsletter</a>
        <a href="{{ route('index') }}#blogs">Blog</a>
      </div>
    </nav>
  </div>
  <div class="footer__bottom">
    <p>© 2025 Colin Reardon. All rights reserved. All nightmares are original.</p>
    <div class="footer__legal">
      <a href="#">Privacy</a>
      <a href="#">Terms</a>
    </div>
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

  // Background image slow zoom on load
  const bg = document.getElementById('bannerBg');
  if (bg) setTimeout(() => bg.classList.add('loaded'), 100);
</script>
</body>
</html>