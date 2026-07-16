<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Colin Reardon — Author of Dark Fiction</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
/>
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
      --accent:     #f5f2ec;
      --glow:       rgba(245,242,236,0.06);
      --glow-strong:rgba(245,242,236,0.12);
      --font-serif: 'IM Fell English', 'Libre Baskerville', Georgia, serif;
      --font-body:  'Libre Baskerville', Georgia, serif;
      --font-ui:    'Barlow Condensed', 'Helvetica Neue', sans-serif;
      --nav-h:      68px;
      --ease:       cubic-bezier(0.25, 0.46, 0.45, 0.94);
      --ease-bounce: cubic-bezier(0.34, 1.56, 0.64, 1);
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
      content: '';
      position: fixed; inset: 0;
      pointer-events: none;
      z-index: 9999;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
      opacity: 0.03;
    }

    a { color: inherit; text-decoration: none; }
    ul { list-style: none; }
    .container { width: 92%; max-width: 1180px; margin: 0 auto; }

    .visually-hidden {
      position: absolute; width: 1px; height: 1px;
      overflow: hidden; clip: rect(0,0,0,0); white-space: nowrap;
    }

    /* ── FADE IN ── */
    .fade-in { opacity: 0; transform: translateY(28px); transition: opacity 0.8s ease, transform 0.8s ease; }
    .fade-in.visible { opacity: 1; transform: none; }

    /* ── GLOW LINE ── */
    .glow-line {
      display: block; width: 60px; height: 1px;
      background: linear-gradient(to right, transparent, rgba(245,242,236,0.5), transparent);
      margin: 0 auto 2rem;
    }

    /* ─────────────────── NAV ─────────────────── */
    .nav {
      position: fixed; top: 0; left: 0; right: 0;
      z-index: 1000;
      display: flex; align-items: center; justify-content: space-between;
      padding: 0 5%; height: var(--nav-h);
      transition: background 0.4s var(--ease), border-color 0.4s var(--ease), box-shadow 0.4s;
      border-bottom: 1px solid transparent;
    }
    .nav--scrolled {
      background: rgba(13,13,13,0.88);
      backdrop-filter: var(--glass-blur);
      -webkit-backdrop-filter: var(--glass-blur);
      border-color: var(--glass-border);
      box-shadow: 0 8px 32px rgba(0,0,0,0.4), inset 0 1px 0 rgba(255,255,255,0.05);
    }

    .nav__logo {
      font-family: var(--font-serif);
      font-size: 1.15rem;
      font-weight: 400;
      color: var(--white);
      letter-spacing: 0.04em;
      position: relative;
    }
    .nav__logo em { font-style: italic; color: var(--mist); }

    .nav__links {
      display: none; flex-direction: column;
      position: absolute; top: var(--nav-h); left: 0; right: 0;
      background: rgba(13,13,13,0.98);
      backdrop-filter: var(--glass-blur);
      padding: 2rem 5%; gap: 1.5rem;
      border-bottom: 1px solid var(--glass-border);
    }
    .nav__links--open { display: flex; }
    .nav__links a {
      font-family: var(--font-ui);
      font-size: 0.75rem; font-weight: 600;
      letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--ash-3);
      transition: color 0.3s, letter-spacing 0.3s;
      position: relative;
    }
    .nav__links a::after {
      content: '';
      position: absolute; bottom: -2px; left: 0;
      width: 0; height: 1px;
      background: var(--white);
      transition: width 0.3s var(--ease);
    }
    .nav__links a:hover { color: var(--white); }
    .nav__links a:hover::after { width: 100%; }
    .nav__cta {
      border: 1px solid rgba(255,255,255,0.25) !important;
      padding: 0.35rem 1rem;
      color: var(--white) !important;
      border-radius: var(--radius-sm);
    }
    .nav__cta:hover { background: var(--white) !important; color: var(--ink) !important; }
    .nav__cta::after { display: none !important; }

    .nav__toggle {
      background: none; border: none; cursor: pointer;
      display: flex; flex-direction: column; gap: 5px; padding: 6px;
    }
    .nav__toggle span {
      display: block; width: 22px; height: 1px; background: var(--mist);
      transition: 0.35s var(--ease); transform-origin: center;
    }
    .nav__toggle--open span:nth-child(1) { transform: translateY(6px) rotate(45deg); }
    .nav__toggle--open span:nth-child(2) { opacity: 0; }
    .nav__toggle--open span:nth-child(3) { transform: translateY(-6px) rotate(-45deg); }

    @media (min-width: 768px) {
      .nav__links {
        display: flex; flex-direction: row; position: static;
        background: none; padding: 0; align-items: center;
        gap: 2.5rem; border: none;
      }
      .nav__toggle { display: none; }
    }

    /* ─────────────────── BUTTONS ─────────────────── */
    .btn {
      display: inline-flex; align-items: center; gap: 0.7rem;
      font-family: var(--font-ui);
      font-size: 0.72rem; font-weight: 700;
      letter-spacing: 0.2em; text-transform: uppercase;
      padding: 0.9rem 2rem; cursor: pointer; border: none;
      transition: 0.35s var(--ease); white-space: nowrap;
      border-radius: var(--radius-sm);
      position: relative; overflow: hidden;
    }
    .btn::before {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, transparent 60%);
      opacity: 0; transition: opacity 0.3s;
    }
    .btn:hover::before { opacity: 1; }

    .btn--primary {
      background: var(--white); color: var(--ink);
      box-shadow: 0 4px 20px rgba(245,242,236,0.1);
    }
    .btn--primary:hover {
      background: var(--pure);
      transform: translateY(-2px);
      box-shadow: 0 8px 32px rgba(245,242,236,0.2);
    }
    .btn--ghost {
      background: var(--glass-bg); color: var(--mist);
      border: 1px solid var(--glass-border);
      backdrop-filter: blur(10px);
    }
    .btn--ghost:hover { border-color: rgba(255,255,255,0.3); color: var(--white); background: rgba(255,255,255,0.06); }
    .btn--outline {
      background: transparent; color: var(--mist);
      border: 1px solid rgba(255,255,255,0.2);
    }
    .btn--outline:hover { background: var(--white); color: var(--ink); border-color: var(--white); }
    .btn--dark {
      background: var(--ink); color: var(--white);
      border: 1px solid rgba(255,255,255,0.15);
    }
    .btn--dark:hover { background: var(--ink-3); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.4); }
    .btn__arrow { transition: transform 0.3s var(--ease); }
    .btn:hover .btn__arrow { transform: translateX(4px); }

    /* ─────────────────── SECTION HEADER ─────────────────── */
    .section-header { text-align: center; margin-bottom: 4rem; }
    .section-header--left { text-align: left; }
    .section-header__label {
      display: inline-block;
      font-family: var(--font-ui); font-size: 0.68rem; font-weight: 700;
      letter-spacing: 0.28em; text-transform: uppercase;
      color: var(--ash-3); margin-bottom: 0.8rem;
      position: relative; padding: 0 1.2rem;
    }
    .section-header__label::before,
    .section-header__label::after {
      content: '';
      position: absolute; top: 50%;
      width: 24px; height: 1px;
      background: rgba(255,255,255,0.2);
    }
    .section-header__label::before { right: 100%; margin-right: -1rem; }
    .section-header__label::after { left: 100%; margin-left: -1rem; }
    .section-header--left .section-header__label::before,
    .section-header--left .section-header__label::after { display: none; }

    .section-header__title {
      font-family: var(--font-serif);
      font-size: clamp(2rem, 5vw, 3.2rem);
      font-weight: 400; color: var(--white);
      line-height: 1.1; margin-bottom: 1rem;
    }
    .section-header__sub {
      font-size: 1rem; color: var(--ash-3);
      max-width: 500px; margin: 0 auto;
    }

    /* ─────────────────── HERO ─────────────────── */
    .hero {
      position: relative; min-height: 100svh;
      display: flex; align-items: center; justify-content: center;
      overflow: hidden; padding: var(--nav-h) 5% 4rem;
      background: var(--ink);
    }

    .hero__bg {
      position: absolute; inset: 0;
      background-image: radial-gradient(circle, rgba(255,255,255,0.025) 1px, transparent 1px);
      background-size: 32px 32px;
    }
    .hero__bg::after {
      content: '';
      position: absolute; inset: 0;
      background: radial-gradient(ellipse 70% 70% at 50% 50%, transparent 30%, var(--ink) 100%);
    }

    /* Futuristic scanning line */
    .hero__scan {
      position: absolute; top: 0; left: 0; right: 0;
      height: 1px;
      background: linear-gradient(to right, transparent, rgba(245,242,236,0.15), transparent);
      animation: scanDown 8s linear infinite;
      z-index: 2;
    }
    @keyframes scanDown {
      from { top: 0; opacity: 0; }
      5% { opacity: 1; }
      95% { opacity: 1; }
      to { top: 100%; opacity: 0; }
    }

    .hero__rule {
      position: absolute;
      left: 0; right: 0; height: 1px;
      background: rgba(255,255,255,0.05);
    }
    .hero__rule--top { top: calc(var(--nav-h) + 3rem); }
    .hero__rule--bottom { bottom: 5rem; }

    .hero__number {
      position: absolute;
      top: calc(var(--nav-h) + 1.2rem);
      right: 5%;
      font-family: var(--font-ui);
      font-size: 0.6rem; font-weight: 700;
      letter-spacing: 0.25em; text-transform: uppercase;
      color: var(--ash);
    }

    .hero__content {
      position: relative; z-index: 10;
      max-width: 860px; text-align: center;
    }

    .hero__eyebrow {
      font-family: var(--font-ui); font-size: 0.68rem; font-weight: 700;
      letter-spacing: 0.3em; text-transform: uppercase;
      color: var(--ash-3); margin-bottom: 2rem;
      animation: riseIn 1s ease both 0.2s;
      display: flex; align-items: center; justify-content: center; gap: 1rem;
    }
    .hero__eyebrow::before,
    .hero__eyebrow::after {
      content: '';
      flex: 1; max-width: 60px; height: 1px;
      background: rgba(255,255,255,0.15);
    }

    .hero__title {
      font-family: var(--font-serif);
      font-size: clamp(3rem, 9vw, 7rem);
      font-weight: 400; line-height: 0.95;
      letter-spacing: -0.01em; color: var(--white);
      margin-bottom: 2rem;
    }
    .hero__title-line { display: block; animation: riseIn 1s ease both; }
    .hero__title-line:nth-child(1) { animation-delay: 0.35s; }
    .hero__title-line:nth-child(2) {
      animation-delay: 0.55s;
      font-style: italic; color: var(--mist);
    }

    .hero__divider {
      width: 60px; height: 1px;
      background: linear-gradient(to right, transparent, rgba(255,255,255,0.4), transparent);
      margin: 0 auto 2rem;
      animation: riseIn 1s ease both 0.75s;
    }

    .hero__subtitle {
      font-size: clamp(0.95rem, 2vw, 1.1rem);
      color: var(--ash-3); max-width: 540px; margin: 0 auto 3rem;
      animation: riseIn 1s ease both 0.9s;
    }
    .hero__subtitle em { color: var(--mist); font-style: italic; }

    .hero__actions {
      display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center;
      animation: riseIn 1s ease both 1.1s;
    }

    .hero__bg-word {
      position: absolute; bottom: -0.15em; left: 50%;
      transform: translateX(-50%);
      font-family: var(--font-ui);
      font-size: clamp(10rem, 28vw, 20rem);
      font-weight: 900; letter-spacing: -0.04em;
      color: transparent;
      -webkit-text-stroke: 1px rgba(255,255,255,0.035);
      pointer-events: none; user-select: none;
      white-space: nowrap; z-index: 1;
    }

    .hero__scroll {
      position: absolute; bottom: 2.5rem; left: 50%;
      transform: translateX(-50%);
      display: flex; flex-direction: column; align-items: center; gap: 0.6rem;
      z-index: 10;
      animation: riseIn 1.5s ease both 1.5s;
    }
    .hero__scroll-text {
      font-family: var(--font-ui); font-size: 0.58rem; font-weight: 700;
      letter-spacing: 0.25em; text-transform: uppercase; color: var(--ash);
    }
    .hero__scroll-line {
      width: 1px; height: 44px;
      background: linear-gradient(to bottom, rgba(255,255,255,0.3), transparent);
      animation: scrollPulse 2.2s ease-in-out infinite;
    }

    @keyframes riseIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: none; }
    }
    @keyframes scrollPulse {
      0%,100% { opacity: 0.4; }
      50% { opacity: 1; }
    }

    /* ─────────────────── QUOTE BAND ─────────────────── */
    .quote-band {
      background: var(--white);
      padding: 3.5rem 5%;
      position: relative; overflow: hidden;
    }
    .quote-band::before {
      content: '\201C';
      position: absolute; top: -1rem; left: 5%;
      font-family: var(--font-serif); font-size: 12rem;
      color: rgba(0,0,0,0.05); line-height: 1;
      pointer-events: none;
    }
    .quote-band__inner { max-width: 780px; margin: 0 auto; text-align: center; position: relative; z-index: 1; }
    .quote-band__quote p {
      font-family: var(--font-serif);
      font-style: italic;
      font-size: clamp(1.15rem, 2.5vw, 1.5rem);
      color: var(--ink); line-height: 1.5; margin-bottom: 1.2rem;
    }
    .quote-band__quote cite {
      font-family: var(--font-ui); font-size: 0.68rem; font-weight: 700;
      letter-spacing: 0.2em; text-transform: uppercase;
      color: var(--ash-2); font-style: normal;
    }

    /* ─────────────────── BOOKS ─────────────────── */
    .books { padding: 7rem 0; background: var(--ink); }

    .books__grid {
      display: grid; grid-template-columns: 1fr; gap: 1px;
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.06);
      margin-bottom: 4rem;
      border-radius: var(--radius);
      overflow: hidden;
    }

    @media (min-width: 640px) { .books__grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 1024px) { .books__grid { grid-template-columns: repeat(3, 1fr); } }

    .book-card {
      background: var(--ink-2);
      display: flex; flex-direction: column;
      transition: background 0.35s var(--ease), transform 0.35s var(--ease);
      position: relative;
    }
    .book-card:hover { background: var(--ink-3); }

    .book-card__cover {
      width: 100%; aspect-ratio: 3/4;
      position: relative; overflow: hidden;
      border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    /* Book cover image */
    .book-card__cover-img {
      width: 100%; height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.5s var(--ease), filter 0.5s;
      filter: grayscale(20%) brightness(0.9);
    }
    .book-card:hover .book-card__cover-img {
      transform: scale(1.04);
      filter: grayscale(0%) brightness(1);
    }

    /* Fallback cover art when no image */
    .cover-art {
      width: 100%; height: 100%;
      display: flex; flex-direction: column;
      justify-content: space-between;
      padding: 1.8rem 1.5rem;
      position: absolute; inset: 0;
      overflow: hidden;
      pointer-events: none;
    }
    .cover-art--overlay {
      background: linear-gradient(to top, rgba(13,13,13,0.95) 0%, rgba(13,13,13,0.3) 60%, transparent 100%);
      position: absolute; inset: 0;
      display: flex; flex-direction: column;
      justify-content: flex-end;
      padding: 1.5rem;
      z-index: 2;
      opacity: 0;
      transition: opacity 0.4s var(--ease);
    }
    .book-card:hover .cover-art--overlay { opacity: 1; }

    .cover-art--fallback {
      position: absolute; inset: 0;
    }
    .cover-art--1 { background: linear-gradient(160deg, #1a1a1a 0%, #0d0d0d 100%); }
    .cover-art--2 { background: linear-gradient(160deg, #111 0%, #0a0a0a 100%); }
    .cover-art--3 { background: linear-gradient(200deg, #161616 0%, #0a0a0a 100%); }
    .cover-art--4 { background: linear-gradient(140deg, #131313 0%, #0d0d0d 100%); }
    .cover-art--5 { background: linear-gradient(170deg, #191919 0%, #0a0a0a 100%); }
    .cover-art--6 { background: linear-gradient(150deg, #141414 0%, #0b0b0b 100%); }

    .cover-art--fallback::before {
      content: '';
      position: absolute; inset: 0;
      background: repeating-linear-gradient(
        0deg,
        transparent 0px,
        transparent 3px,
        rgba(255,255,255,0.012) 3px,
        rgba(255,255,255,0.012) 4px
      );
      pointer-events: none;
    }

    .cover-art__number {
      font-family: var(--font-ui); font-size: 0.6rem; font-weight: 700;
      letter-spacing: 0.25em; color: rgba(255,255,255,0.2);
      position: relative; z-index: 2;
    }

    .cover-art__title {
      font-family: var(--font-serif);
      font-size: clamp(1.8rem, 4vw, 2.2rem);
      font-weight: 400; color: var(--white);
      line-height: 1.1; position: relative; z-index: 2;
      text-shadow: 0 2px 30px rgba(0,0,0,0.8);
    }

    .cover-art__bottom {
      display: flex; justify-content: space-between; align-items: flex-end;
      position: relative; z-index: 2;
    }

    .cover-art__author {
      font-family: var(--font-ui); font-size: 0.62rem; font-weight: 600;
      letter-spacing: 0.18em; text-transform: uppercase;
      color: rgba(255,255,255,0.35);
    }

    .cover-shape {
      position: absolute; z-index: 1;
    }
    .shape--1 {
      bottom: 0; right: 0; width: 60%; height: 60%;
      border-top: 1px solid rgba(255,255,255,0.07);
      border-left: 1px solid rgba(255,255,255,0.07);
    }
    .shape--2 {
      top: 50%; left: 50%; transform: translate(-50%, -50%);
      width: 80%; height: 80%;
      border-radius: 50%;
      border: 1px solid rgba(255,255,255,0.06);
    }
    .shape--3 {
      bottom: 20%; left: 10%; right: 10%; height: 1px;
      background: rgba(255,255,255,0.08);
    }
    .shape--4 {
      top: 30%; right: 0; width: 40%; height: 40%;
      border-left: 1px solid rgba(255,255,255,0.08);
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }
    .shape--5 {
      bottom: 0; left: 0; right: 0; height: 1px;
      background: linear-gradient(to right, transparent, rgba(255,255,255,0.15), transparent);
    }
    .shape--6 {
      top: 15%; left: 15%; right: 15%; bottom: 15%;
      border: 1px solid rgba(255,255,255,0.05);
    }

    .book-card__badge {
      position: absolute; top: 1.2rem; right: 1.2rem; z-index: 10;
      background: var(--white); color: var(--ink);
      font-family: var(--font-ui); font-size: 0.58rem; font-weight: 700;
      letter-spacing: 0.14em; text-transform: uppercase;
      padding: 0.28rem 0.6rem;
      border-radius: var(--radius-sm);
      box-shadow: 0 2px 12px rgba(0,0,0,0.4);
    }

    .book-card__info {
      padding: 1.6rem; flex: 1;
      display: flex; flex-direction: column;
    }

    .book-card__genre {
      font-family: var(--font-ui); font-size: 0.62rem; font-weight: 700;
      letter-spacing: 0.22em; text-transform: uppercase;
      color: var(--ash); margin-bottom: 0.5rem;
    }

    .book-card__title {
      font-family: var(--font-serif);
      font-size: 1.25rem; font-weight: 400;
      color: var(--white); line-height: 1.25; margin-bottom: 0.9rem;
    }

    .book-card__desc {
      font-size: 0.88rem; color: var(--ash-2);
      line-height: 1.7; flex: 1; margin-bottom: 1.5rem;
    }

    .book-card__footer {
      display: flex; align-items: center; justify-content: space-between;
      padding-top: 1rem;
      border-top: 1px solid rgba(255,255,255,0.06);
    }

    .book-card__pages {
      font-family: var(--font-ui); font-size: 0.65rem; font-weight: 600;
      letter-spacing: 0.12em; color: var(--ash);
    }

    .book-card__link {
      font-family: var(--font-ui); font-size: 0.68rem; font-weight: 700;
      letter-spacing: 0.14em; text-transform: uppercase;
      color: var(--mist);
      transition: color 0.3s, letter-spacing 0.3s;
    }
    .book-card__link:hover { color: var(--white); letter-spacing: 0.2em; }

    .books__view-all { text-align: center; }

    /* ─────────────────── AWARDS STRIP ─────────────────── */
    .awards-strip {
      background: var(--white);
      padding: 1.6rem 5%;
      border-top: 1px solid rgba(0,0,0,0.12);
    }
    .awards-strip__inner {
      display: flex; flex-wrap: wrap;
      align-items: center; justify-content: center; gap: 1.5rem 3rem;
    }
    .awards-strip__item {
      display: flex; align-items: center; gap: 0.6rem;
      font-family: var(--font-ui); font-size: 0.7rem; font-weight: 700;
      letter-spacing: 0.12em; text-transform: uppercase; color: var(--ash-2);
      white-space: nowrap;
    }
    .award-icon { color: var(--ink); font-size: 0.6rem; }
    .awards-strip__divider {
      color: var(--mist); font-size: 0.4rem; display: none;
    }
    @media (min-width: 768px) { .awards-strip__divider { display: block; } }

    /* ─────────────────── ABOUT ─────────────────── */
    .about {
      position: relative; padding: 8rem 0;
      background: var(--ink-2); overflow: hidden;
    }
    .about__bg-text {
      position: absolute; top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      font-family: var(--font-ui); font-weight: 900;
      font-size: clamp(6rem, 20vw, 16rem);
      color: transparent;
      -webkit-text-stroke: 1px rgba(255,255,255,0.025);
      white-space: nowrap; pointer-events: none; user-select: none;
      letter-spacing: 0.05em;
    }

    .about__container {
      display: flex; flex-direction: column; gap: 4rem;
      position: relative; z-index: 2;
    }

    @media (min-width: 900px) {
      .about__container { flex-direction: row; align-items: flex-start; gap: 6rem; }
    }

    .about__portrait { display: flex; flex-direction: column; align-items: center; gap: 1.5rem; }

    .about__portrait-wrap {
      position: relative; width: min(260px, 80vw);
    }

    .about__portrait-img {
      width: 100%; aspect-ratio: 3/4;
      overflow: hidden;
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: var(--radius-sm);
      position: relative;
    }

    /* Author actual image */
    .about__portrait-img img {
      width: 100%; height: 100%;
      object-fit: cover;
      display: block;
      filter: grayscale(30%) contrast(1.05);
      transition: filter 0.4s var(--ease);
    }
    .about__portrait-img img:hover {
      filter: grayscale(0%) contrast(1);
    }

    /* Fallback portrait art */
    .portrait-art {
      width: 100%; height: 100%;
      background: #111;
      position: absolute; inset: 0;
      z-index: -1;
    }
    .portrait-art__lines {
      position: absolute; inset: 0;
      background: repeating-linear-gradient(
        -45deg,
        transparent 0px,
        transparent 4px,
        rgba(255,255,255,0.025) 4px,
        rgba(255,255,255,0.025) 5px
      );
    }
    .portrait-art__figure {
      position: absolute; bottom: 0; left: 50%;
      transform: translateX(-50%);
      width: 70%; height: 80%;
      background: linear-gradient(to top,
        rgba(255,255,255,0.06) 0%,
        rgba(255,255,255,0.04) 40%,
        transparent 80%
      );
      clip-path: polygon(20% 0%, 80% 0%, 95% 100%, 5% 100%);
    }
    .portrait-art__vignette {
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse 100% 100% at 50% 0%, rgba(255,255,255,0.08) 0%, transparent 50%),
        linear-gradient(to bottom, rgba(0,0,0,0.5) 0%, transparent 40%, rgba(0,0,0,0.7) 100%);
    }
    .portrait-art__initials {
      position: absolute; bottom: 1.5rem; left: 50%;
      transform: translateX(-50%);
      font-family: var(--font-serif); font-size: 3rem; font-weight: 400;
      color: rgba(255,255,255,0.15); letter-spacing: 0.2em;
    }

    /* Glass overlay on portrait */
    .about__portrait-img::after {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(
        to bottom,
        rgba(13,13,13,0) 50%,
        rgba(13,13,13,0.6) 100%
      );
      pointer-events: none;
      z-index: 1;
    }

    .about__portrait-wrap::before,
    .about__portrait-wrap::after {
      content: ''; position: absolute;
      width: 20px; height: 20px;
    }
    .about__portrait-wrap::before {
      top: -8px; right: -8px;
      border-top: 1px solid rgba(255,255,255,0.3);
      border-right: 1px solid rgba(255,255,255,0.3);
    }
    .about__portrait-wrap::after {
      bottom: -8px; left: -8px;
      border-bottom: 1px solid rgba(255,255,255,0.3);
      border-left: 1px solid rgba(255,255,255,0.3);
    }

    .about__portrait-caption { text-align: center; }
    .about__portrait-name {
      display: block; font-family: var(--font-serif);
      font-size: 1.1rem; color: var(--white); margin-bottom: 0.3rem;
    }
    .about__portrait-role {
      display: block; font-family: var(--font-ui);
      font-size: 0.65rem; font-weight: 700;
      letter-spacing: 0.2em; text-transform: uppercase; color: var(--ash);
    }

    .about__bio p {
      margin-bottom: 1.3rem; color: var(--ash-3); line-height: 1.85;
    }
    .about__bio em { color: var(--mist); }

    .about__stats {
      display: grid; grid-template-columns: repeat(2, 1fr);
      gap: 0; margin: 2.5rem 0;
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: var(--radius-sm);
      overflow: hidden;
    }
    @media (min-width: 900px) {
      .about__stats { grid-template-columns: repeat(4, 1fr); }
    }

    .about__stat {
      padding: 1.5rem; text-align: center;
      border-right: 1px solid rgba(255,255,255,0.06);
      border-bottom: 1px solid rgba(255,255,255,0.06);
      background: var(--glass-bg);
      transition: background 0.3s;
    }
    .about__stat:hover { background: rgba(255,255,255,0.06); }
    .about__stat:nth-child(2n) { border-right: none; }
    @media (min-width: 900px) {
      .about__stat:nth-child(2n) { border-right: 1px solid rgba(255,255,255,0.06); }
      .about__stat:last-child { border-right: none; }
    }

    .about__stat-num {
      display: block; font-family: var(--font-ui);
      font-size: 2.4rem; font-weight: 900; color: var(--white);
      line-height: 1; margin-bottom: 0.4rem;
    }
    .about__stat-label {
      font-family: var(--font-ui); font-size: 0.62rem; font-weight: 700;
      letter-spacing: 0.2em; text-transform: uppercase; color: var(--ash);
    }

    /* ─────────────────── BLOGS ─────────────────── */
    .blogs {
      padding: 7rem 0;
      background: var(--ink);
      position: relative; overflow: hidden;
    }
    .blogs::before {
      content: '';
      position: absolute; top: 0; left: 0; right: 0; height: 1px;
      background: linear-gradient(to right, transparent, rgba(255,255,255,0.1), transparent);
    }

    .blogs__grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
      margin-bottom: 4rem;
    }
    @media (min-width: 768px) {
      .blogs__grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 1024px) {
      .blogs__grid { grid-template-columns: repeat(3, 1fr); }
      .blog-card--featured { grid-column: span 2; }
    }

    .blog-card {
      display: flex; flex-direction: column;
      background: var(--ink-2);
      border: 1px solid rgba(255,255,255,0.06);
      border-radius: var(--radius);
      overflow: hidden;
      transition: transform 0.35s var(--ease), box-shadow 0.35s, border-color 0.35s;
      position: relative;
    }
    .blog-card:hover {
      transform: translateY(-4px);
      border-color: rgba(255,255,255,0.12);
      box-shadow: 0 16px 48px rgba(0,0,0,0.4), 0 0 0 1px rgba(255,255,255,0.04);
    }

    .blog-card__image {
      width: 100%;
      aspect-ratio: 16/9;
      overflow: hidden;
      position: relative;
      background: var(--ink-3);
      flex-shrink: 0;
    }
    .blog-card--featured .blog-card__image {
      aspect-ratio: 21/9;
    }

    .blog-card__image img {
      width: 100%; height: 100%;
      object-fit: cover; display: block;
      filter: grayscale(30%) brightness(0.85);
      transition: transform 0.5s var(--ease), filter 0.5s;
    }
    .blog-card:hover .blog-card__image img {
      transform: scale(1.04);
      filter: grayscale(0%) brightness(0.95);
    }

    /* Blog image placeholder */
    .blog-img-placeholder {
      width: 100%; height: 100%;
      display: flex; align-items: center; justify-content: center;
      background: repeating-linear-gradient(
        -45deg,
        var(--ink-2) 0px,
        var(--ink-2) 10px,
        var(--ink-3) 10px,
        var(--ink-3) 20px
      );
      position: relative;
    }
    .blog-img-placeholder__text {
      font-family: var(--font-ui); font-size: 0.6rem; font-weight: 700;
      letter-spacing: 0.3em; text-transform: uppercase;
      color: rgba(255,255,255,0.1);
      position: relative; z-index: 1;
    }
    .blog-img-placeholder::after {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(13,13,13,0.6), transparent);
    }

    .blog-card__body {
      padding: 1.8rem; flex: 1;
      display: flex; flex-direction: column;
    }

    .blog-card__meta {
      display: flex; align-items: center; gap: 1rem;
      margin-bottom: 1rem;
    }

    .blog-card__tag {
      font-family: var(--font-ui); font-size: 0.58rem; font-weight: 700;
      letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--ash-3);
      border: 1px solid rgba(255,255,255,0.1);
      padding: 0.2rem 0.55rem;
      border-radius: var(--radius-sm);
      background: var(--glass-bg);
    }

    .blog-card__date {
      font-family: var(--font-ui); font-size: 0.65rem;
      letter-spacing: 0.08em; color: var(--ash);
    }

    .blog-card__title {
      font-family: var(--font-serif);
      font-size: 1.3rem; font-weight: 400;
      color: var(--white); line-height: 1.3;
      margin-bottom: 0.8rem;
      transition: color 0.3s;
    }
    .blog-card--featured .blog-card__title { font-size: 1.65rem; }
    .blog-card:hover .blog-card__title { color: var(--pure); }

    .blog-card__excerpt {
      font-size: 0.9rem; color: var(--ash-2);
      line-height: 1.75; flex: 1; margin-bottom: 1.5rem;
    }

    .blog-card__footer {
      display: flex; align-items: center; justify-content: space-between;
      padding-top: 1.2rem;
      border-top: 1px solid rgba(255,255,255,0.06);
    }

    .blog-card__author {
      display: flex; align-items: center; gap: 0.7rem;
    }
    .blog-card__author-avatar {
      width: 28px; height: 28px; border-radius: 50%;
      overflow: hidden;
      border: 1px solid rgba(255,255,255,0.12);
      background: var(--ink-3);
      flex-shrink: 0;
    }
    .blog-card__author-avatar img {
      width: 100%; height: 100%; object-fit: cover; display: block;
      filter: grayscale(40%);
    }
    .blog-card__author-name {
      font-family: var(--font-ui); font-size: 0.68rem; font-weight: 600;
      letter-spacing: 0.06em; color: var(--ash-3);
    }

    .blog-card__read {
      font-family: var(--font-ui); font-size: 0.65rem; font-weight: 700;
      letter-spacing: 0.14em; text-transform: uppercase;
      color: var(--mist);
      transition: color 0.3s, letter-spacing 0.3s;
      display: flex; align-items: center; gap: 0.4rem;
    }
    .blog-card__read:hover { color: var(--white); letter-spacing: 0.18em; }

    .blogs__view-all { text-align: center; }

    /* ─────────────────── NEWSLETTER ─────────────────── */
    .newsletter {
      position: relative; padding: 8rem 0;
      background: var(--white); text-align: center; overflow: hidden;
    }

    .newsletter::before {
      content: '';
      position: absolute; inset: 0;
      background-image: radial-gradient(circle, rgba(0,0,0,0.035) 1px, transparent 1px);
      background-size: 24px 24px;
      pointer-events: none;
    }

    .newsletter__container { position: relative; z-index: 2; }

    .newsletter__ornament {
      font-family: var(--font-ui); font-size: 0.55rem; font-weight: 700;
      letter-spacing: 1em; color: var(--mist); margin-bottom: 1.2rem;
    }

    .newsletter__label {
      display: inline-block;
      font-family: var(--font-ui); font-size: 0.68rem; font-weight: 700;
      letter-spacing: 0.28em; text-transform: uppercase;
      color: var(--ash-2); margin-bottom: 0.8rem;
    }

    .newsletter__title {
      font-family: var(--font-serif);
      font-size: clamp(2.2rem, 5vw, 3.8rem);
      font-weight: 400; color: var(--ink);
      line-height: 1.1; margin: 0.8rem 0 1.5rem;
    }
    .newsletter__title em { font-style: italic; }

    .newsletter__sub {
      max-width: 520px; margin: 0 auto 3rem;
      color: var(--ash-2); font-size: 1rem;
    }

    .newsletter__fields {
      display: flex; flex-direction: column; gap: 0.7rem;
      max-width: 540px; margin: 0 auto;
    }

    .newsletter__field input {
      width: 100%; padding: 0.9rem 1.2rem;
      background: rgba(0,0,0,0.04);
      border: 1px solid rgba(0,0,0,0.15);
      color: var(--ink); font-family: var(--font-body);
      font-size: 1rem; outline: none;
      transition: border-color 0.3s, box-shadow 0.3s;
      border-radius: var(--radius-sm);
    }
    .newsletter__field input::placeholder { color: var(--mist); }
    .newsletter__field input:focus {
      border-color: var(--ink);
      box-shadow: 0 0 0 3px rgba(13,13,13,0.08);
    }

    .btn--submit-nl { width: 100%; justify-content: center; }

    .newsletter__privacy {
      margin-top: 1rem; font-family: var(--font-ui);
      font-size: 0.65rem; letter-spacing: 0.05em; color: var(--mist);
    }

    .newsletter__success {
      display: none; flex-direction: column; align-items: center; gap: 1rem; padding: 2rem;
    }
    .newsletter__success.visible { display: flex; }
    .newsletter__success p {
      font-family: var(--font-serif); font-style: italic;
      font-size: 1.3rem; color: var(--ink-3);
    }

    @media (min-width: 620px) {
      .newsletter__fields { flex-direction: row; }
      .newsletter__field { flex: 1; }
      .btn--submit-nl { width: auto; }
    }

    /* ─────────────────── FOOTER ─────────────────── */
    .footer {
      background: var(--ink);
      border-top: 1px solid rgba(255,255,255,0.06);
      padding: 4.5rem 0 0;
    }
    .footer__container {
      display: flex; flex-direction: column; gap: 3rem; margin-bottom: 3rem;
    }
    @media (min-width: 768px) {
      .footer__container { flex-direction: row; justify-content: space-between; }
      .footer__brand { max-width: 220px; }
    }

    .footer__logo {
      font-family: var(--font-serif); font-size: 1.3rem;
      color: var(--white); margin-bottom: 0.5rem;
    }
    .footer__tagline {
      font-family: var(--font-ui); font-size: 0.68rem; font-weight: 700;
      letter-spacing: 0.15em; text-transform: uppercase;
      color: var(--ash); margin-bottom: 1.5rem;
    }
    .footer__social { display: flex; gap: 0.8rem; }
    .footer__social-link {
      width: 34px; height: 34px;
      display: flex; align-items: center; justify-content: center;
      border: 1px solid rgba(255,255,255,0.1);
      font-size: 0.75rem; color: var(--ash-2);
      transition: 0.3s;
      border-radius: var(--radius-sm);
      background: var(--glass-bg);
    }
    .footer__social-link:hover {
      border-color: rgba(255,255,255,0.3);
      color: var(--white);
      background: rgba(255,255,255,0.06);
    }

    .footer__nav { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; }
    .footer__nav-group h3 {
      font-family: var(--font-ui); font-size: 0.62rem; font-weight: 700;
      letter-spacing: 0.22em; text-transform: uppercase;
      color: var(--ash); margin-bottom: 1.2rem;
    }
    .footer__nav-group a {
      display: block; font-family: var(--font-ui); font-size: 0.82rem;
      color: var(--ash-2); margin-bottom: 0.7rem; transition: color 0.3s;
    }
    .footer__nav-group a:hover { color: var(--white); }

    .footer__bottom {
      border-top: 1px solid rgba(255,255,255,0.06);
      padding: 1.5rem 5%;
      display: flex; flex-direction: column; gap: 0.8rem;
      align-items: center; text-align: center;
    }
    @media (min-width: 768px) {
      .footer__bottom { flex-direction: row; justify-content: space-between; }
    }
    .footer__bottom p {
      font-family: var(--font-ui); font-size: 0.68rem;
      letter-spacing: 0.05em; color: var(--ash);
    }
    .footer__legal { display: flex; gap: 1.5rem; }
    .footer__legal a {
      font-family: var(--font-ui); font-size: 0.68rem; color: var(--ash);
      transition: color 0.3s;
    }
    .footer__legal a:hover { color: var(--mist); }

    /* ─────────────────── SCROLLBAR ─────────────────── */
    ::-webkit-scrollbar { width: 5px; }
    ::-webkit-scrollbar-track { background: var(--ink); }
    ::-webkit-scrollbar-thumb { background: var(--ash-2); border-radius: 2px; }
    ::-webkit-scrollbar-thumb:hover { background: var(--mist); }
    ::selection { background: rgba(245,242,236,0.2); color: var(--white); }

 .upcoming-placeholder {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #111, #000);
  color: #aaa;
  font-family: var(--font-ui);
  font-size: 0.8rem;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  border: 2px dashed rgba(255,255,255,0.15);
}

.books__grid {
  gap: 2rem;
  background: transparent;
  border: none;
}

.book-card {
  border-radius: var(--radius);
  border: 1px solid rgba(255,255,255,0.06);
}
.footer__social {
  display: flex;
  gap: 15px;
}

.footer__social-link {
  color: white;
  font-size: 22px;
  transition: 0.3s;
}

.footer__social-link:hover {
  color: #c59d5f;
  transform: translateY(-3px);
}

/* ─────────────────── LOGO (responsive, enlarged) ─────────────────── */
.nav__logo {
  display: flex;
  align-items: center;
  max-width: 65%;
  flex-shrink: 0;
}
.nav__logo-img {
  height: 48px;
  width: auto;
  max-width: 100%;
  object-fit: contain;
  display: block;
}
@media (min-width: 480px) {
  .nav__logo-img { height: 56px; }
}
@media (min-width: 768px) {
  .nav__logo {
    max-width: none;
  }
  .nav__logo-img { height: 64px; }
}
/* nav bar grows a bit to comfortably fit the bigger logo */
.nav {
  height: 84px;
}
:root {
  --nav-h: 84px;
}

/* ─────────────────── BOOKS: 2-item center layout (desktop only) ─────────────────── */
@media (min-width: 1024px) {
  .book-card--last-of-two { grid-column: 3; }
}

  </style>
</head>
<body>

  <!-- ═══ NAV ═══ -->
  <nav class="nav" id="nav">
   <a href="#home" class="nav__logo">
  <img src="{{ asset('logo/Colin_Reardon.png') }}" alt="Colin Reardon" class="nav__logo-img">
</a>
    <button class="nav__toggle" id="navToggle" aria-label="Toggle menu">
      <span></span><span></span><span></span>
    </button>
    <ul class="nav__links" id="navLinks">
      <li><a href="#books">Books</a></li>
      <li><a href="#blogs">Blog</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#newsletter">Newsletter</a></li>
      <li><a href="{{ route('login') }}" class="nav__cta">login</a></li>
    </ul>
  </nav>

  <!-- ═══ HERO ═══ -->
  <section class="hero" id="home">
    <div class="hero__bg"></div>
    <div class="hero__scan"></div>
    <div class="hero__rule hero__rule--top"></div>
    <div class="hero__rule hero__rule--bottom"></div>
    <div class="hero__number">Vol. XIV — 2025</div>

    <div class="hero__content">
      <p class="hero__eyebrow">New Release — 2025</p>
      <h1 class="hero__title">
        <span class="hero__title-line">Where Shadows</span>
        <span class="hero__title-line">Learn Your Name</span>
      </h1>
      <div class="hero__divider"></div>
      <p class="hero__subtitle">
        From condemned asylums to ink-black seas — Colin Reardon writes horror that doesn't just frighten you. It <em>stays</em>.
      </p>
      <div class="hero__actions">
        <a href="#books" class="btn btn--primary">
          <span class="btn__text">Explore the Darkness</span>
          <span class="btn__arrow">→</span>
        </a>
        <a href="#about" class="btn btn--ghost">Meet the Author</a>
      </div>
    </div>

    <div class="hero__bg-word" aria-hidden="true">FEAR</div>

    <div class="hero__scroll">
      <span class="hero__scroll-text">Scroll</span>
      <div class="hero__scroll-line"></div>
    </div>
  </section>

  <!-- ═══ QUOTE BAND ═══ -->
  <div class="quote-band">
    <div class="quote-band__inner">
      <blockquote class="quote-band__quote">
        <p>"Reardon is the heir to the throne of dread — a writer who makes darkness feel like home."</p>
        <cite>— The New York Times Book Review</cite>
      </blockquote>
    </div>
  </div>

  <!-- ═══ BOOKS ═══ -->
  <section class="books" id="books">
    <div class="container">
      <header class="section-header">
        <span class="section-header__label">The Collection</span>
        <h2 class="section-header__title">Tales From the Abyss</h2>
        <p class="section-header__sub">Each book is a door. Once opened, you cannot un-see what waits on the other side.</p>
      </header>

      @php
        $bookCount = $books->count();
      @endphp

      <div class="books__grid">

        @forelse ($books as $book)
          <article class="book-card book-card--featured @if($bookCount === 2 && $loop->last) book-card--last-of-two @endif">
            <div class="book-card__cover">
              <img
                class="book-card__cover-img"
                src="{{ asset('storage/' . $book->book_image) }}"
                alt="{{ $book->book_name }}"
                loading="lazy"
              />
              <div class="cover-art cover-art--overlay">
                <span class="cover-art__author">Colin Reardon</span>
              </div>
              <div class="book-card__badge">New</div>
            </div>
            <div class="book-card__info">
              <p class="book-card__genre">Psychological Horror</p>
              <h3 class="book-card__title">{{ $book->book_name }}</h3>
              <p class="book-card__desc">{{ Str::limit($book->book_detail, 150) }}</p>
              <div class="book-card__footer">
                <span class="book-card__pages">{{ $book->book_pages }} pages</span>
              <a href="{{ route('blogs.show', $book->id) }}" class="book-card__link">Read more →</a>
              </div>
            </div>
          </article>
        @empty
          <article class="book-card book-card--featured">
            <div class="book-card__cover">
              <div class="upcoming-placeholder">
                <h1>Coming Soon</h1>
              </div>
              <div class="cover-art cover-art--overlay">
                <span class="cover-art__author">Colin Reardon</span>
              </div>
              <div class="book-card__badge">New</div>
            </div>
            <div class="book-card__info">
              <p class="book-card__genre">Psychological Horror</p>
              <h3 class="book-card__title">Upcoming Title</h3>
              <p class="book-card__desc">Stay tuned for the next chapter of dread.</p>
              <div class="book-card__footer">
                <span class="book-card__pages">—</span>
                <a href="#" class="book-card__link">Read more →</a>
              </div>
            </div>
          </article>
        @endforelse

      </div>

      <div class="books__view-all">
        <a href="{{ route('total.book') }}" class="btn btn--outline">View All Titles</a>   
      </div>
    </div>
  </section>

  <!-- ═══ AWARDS ═══ -->
  <div class="awards-strip">
    <div class="awards-strip__inner">
      <div class="awards-strip__item">
        <span class="award-icon">◈</span>
        <span>Bram Stoker Award Winner</span>
      </div>
      <div class="awards-strip__divider">—</div>
      <div class="awards-strip__item">
        <span class="award-icon">◈</span>
        <span>3× New York Times Bestseller</span>
      </div>
      <div class="awards-strip__divider">—</div>
      <div class="awards-strip__item">
        <span class="award-icon">◈</span>
        <span>Shirley Jackson Award Finalist</span>
      </div>
      <div class="awards-strip__divider">—</div>
      <div class="awards-strip__item">
        <span class="award-icon">◈</span>
        <span>International Horror Guild Award</span>
      </div>
    </div>
  </div>

  <!-- ═══ ABOUT ═══ -->
  <section class="about" id="about">
    <div class="about__bg-text" aria-hidden="true">REARDON</div>
    <div class="container about__container">
      <div class="about__portrait">
        <div class="about__portrait-wrap">
          <div class="about__portrait-img">
            <img src="{{ asset('biopic/bIO_PIC.jpeg') }}" alt="Colin Reardon — Author portrait">
            <div class="portrait-art" aria-hidden="true">
              <div class="portrait-art__lines"></div>
              <div class="portrait-art__figure"></div>
              <div class="portrait-art__vignette"></div>
              <div class="portrait-art__initials">CR</div>
            </div>
          </div>
        </div>
        <div class="about__portrait-caption">
          <span class="about__portrait-name">Colin Reardon</span>
          <span class="about__portrait-role">Horror Author · Since 2009</span>
        </div>
      </div>

      <div class="about__content">
        <header class="section-header section-header--left">
          <span class="section-header__label">The Author</span>
          <h2 class="section-header__title">A Mind Built<br>for Darkness</h2>
        </header>
        <div class="about__bio">
          <p>Colin Reardon grew up in a house where all the clocks had stopped. That's not a metaphor. The estate on the edge of the Somerset moors had no working timepieces, and as a child, he learned to measure the hours by the quality of light seeping beneath the cellar door.</p>
          <p>That childhood — eerie, isolated, and saturated with the kind of quiet that makes you listen for things — forged a writer obsessed with the margins of the human experience: the moment before terror fully arrives, the space between sleep and waking, the texture of a fear you cannot name.</p>
          <p>Since his debut novel <em>The Cold House</em> (2009), Reardon has published fourteen novels, two short story collections, and a single poem that was promptly banned from a literary journal in four countries. He lives wherever he isn't expected.</p>
        </div>
      
        <a href="{{ route('biography') }}" class="btn btn--primary">Full Biography</a>
      </div>
    </div>
  </section>

  <!-- ═══ BLOGS ═══ -->
  <section class="blogs" id="blogs">
    <div class="container">
      <header class="section-header">
        <span class="section-header__label">The Journal</span>
        <h2 class="section-header__title">Dispatches from<br><em>the Dark</em></h2>
        <p class="section-header__sub">Craft essays, reading lists, and glimpses into the process behind the dread.</p>
      </header>

      <div class="blogs__grid">

        @forelse ($blogs as $index => $blog)
          <article class="blog-card @if($index === 0) blog-card--featured @endif">
            <div class="blog-card__image">
              <img
                src="{{ $blog->image }}"
                alt="{{ $blog->heading }}"
                loading="lazy"
              />
            </div>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <span class="blog-card__tag">{{ $index === 0 ? 'Craft' : 'Essay' }}</span>
                <span class="blog-card__date">{{ $blog->created_at->format('M d, Y') }}</span>
              </div>
              <h3 class="blog-card__title">{{ $blog->heading }}</h3>
              <p class="blog-card__excerpt">{{ Str::limit($blog->paragraph, $index === 0 ? 250 : 150) }}</p>
              <div class="blog-card__footer">
                <div class="blog-card__author">
                  <div class="blog-card__author-avatar">
                    <img
                      src="{{ asset('biopic/bIO_PIC.jpeg') }}"
                      alt="Colin Reardon"
                    />
                  </div>
                  <span class="blog-card__author-name">Colin Reardon</span>
                </div>
                <a href="{{ $blog->link ?? '#' }}" class="blog-card__read">Read →</a>
              </div>
            </div>
          </article>
        @empty
          <article class="blog-card blog-card--featured">
            <div class="blog-card__image">
              <div class="blog-img-placeholder">
                <span class="blog-img-placeholder__text">Coming Soon</span>
              </div>
            </div>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <span class="blog-card__tag">Craft</span>
                <span class="blog-card__date">{{ now()->format('M d, Y') }}</span>
              </div>
              <h3 class="blog-card__title">New Dispatches Coming Soon</h3>
              <p class="blog-card__excerpt">Stay tuned — new essays and stories from the dark are on their way.</p>
              <div class="blog-card__footer">
                <div class="blog-card__author">
                  <div class="blog-card__author-avatar">
                    <img src="{{ asset('biopic/bIO_PIC.jpeg') }}" alt="Colin Reardon" />
                  </div>
                  <span class="blog-card__author-name">Colin Reardon</span>
                </div>
                <a href="{{ $blog->link ?? '#' }}" class="blog-card__read">Read →</a>
              </div>
            </div>
          </article>
        @endforelse

      </div>

      <div class="blogs__view-all">
        <a href="https://cpreardon.blogspot.com/search?updated-max=2026-07-03T02:32:00-07:00&max-results=5" class="btn btn--outline">All Posts</a>
      </div>
    </div>
  </section>

  <!-- ═══ NEWSLETTER ═══ -->
  <section class="newsletter" id="newsletter">
    <div class="container newsletter__container">
      <div class="newsletter__ornament" aria-hidden="true">— ✦ —</div>
      <span class="newsletter__label">The Inner Circle</span>
      <h2 class="newsletter__title">Some Secrets<br>Are Worth <em>Knowing</em></h2>
      <p class="newsletter__sub">Join 40,000 readers who receive early chapters, exclusive short stories, and first access to new releases. No spam. Only shadows.</p>

      @if (session('success'))
        <p style="color:#2e7d32; font-family: var(--font-ui); font-size: 0.8rem; letter-spacing: 0.1em; margin-bottom: 1rem;">
          {{ session('success') }}
        </p>
      @endif

      <form class="newsletter__fields"
            id="newsletterForm"
            action="{{ route('newsletter.store') }}"
            method="POST"
            novalidate>

        @csrf

        <div class="newsletter__field">
          <label for="nl-name" class="visually-hidden">Your name</label>
          <input type="text"
                 id="nl-name"
                 name="name"
                 placeholder="Your name"
                 autocomplete="given-name"
                 required />
        </div>

        <div class="newsletter__field">
          <label for="nl-email" class="visually-hidden">Your email</label>
          <input type="email"
                 id="nl-email"
                 name="email"
                 placeholder="Your email address"
                 autocomplete="email"
                 required />
        </div>

        <button type="submit" class="btn btn--dark btn--submit-nl">
          <span>Enter the Circle</span>
          <span class="btn__arrow">→</span>
        </button>
      </form>

      <p class="newsletter__privacy" id="newsletterPrivacy" style="margin-top:1.2rem;">Your soul is safe with us. Unsubscribe at any time.</p>

      <div class="newsletter__success" id="newsletterSuccess" aria-live="polite">
        <p id="newsletterMsg">"Welcome to the darkness. Check your inbox for a gift."</p>
      </div>
    </div>
  </section>

  <!-- ═══ FOOTER ═══ -->
  <footer class="footer">
    <div class="container footer__container">
      <div class="footer__brand">
        <p class="footer__logo">Colin Reardon</p>
        <p class="footer__tagline">Writing terror since 2009.</p>
     <div class="footer__social">
  <a href="#" class="footer__social-link" aria-label="Twitter">
    <i class="fa-brands fa-x-twitter"></i>
  </a>

  <a href="#" class="footer__social-link" aria-label="Instagram">
    <i class="fa-brands fa-instagram"></i>
  </a>
   <a href="#" class="footer__social-link" aria-label="Facebook">
    <i class="fa-brands fa-facebook"></i>
  </a>

  <a href="#" class="footer__social-link" aria-label="Goodreads">
    <i class="fa-brands fa-goodreads"></i>
  </a>
</div>
      </div>
      <nav class="footer__nav" aria-label="Footer navigation">
        <div class="footer__nav-group">
          <h3>Books</h3>
          <a href="#">All Titles</a>
          <a href="#">New Releases</a>
   
         
        </div>
        <div class="footer__nav-group">
          <h3>Author</h3>
         
          <a href="#">Contact</a>
        </div>
        <div class="footer__nav-group">
          <h3>More</h3>
          <a href="#">Newsletter</a>
          <a href="#">Blog</a>
          
         
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
    window.addEventListener('scroll', () => {
      nav.classList.toggle('nav--scrolled', window.scrollY > 60);
    });

    document.getElementById('navToggle').addEventListener('click', function () {
      document.getElementById('navLinks').classList.toggle('nav__links--open');
      this.classList.toggle('nav__toggle--open');
    });

    document.querySelectorAll('a[href^="#"]').forEach(a => {
      a.addEventListener('click', e => {
        const target = document.querySelector(a.getAttribute('href'));
        if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); }
        document.getElementById('navLinks').classList.remove('nav__links--open');
        document.getElementById('navToggle').classList.remove('nav__toggle--open');
      });
    });

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
    }, { threshold: 0.06 });
    document.querySelectorAll('.book-card, .blog-card, .about__container, .newsletter__container').forEach(el => {
      el.classList.add('fade-in');
      observer.observe(el);
    });

    // ── NEWSLETTER FORM (AJAX SUBMIT) ──
    const nlForm = document.getElementById('newsletterForm');
    nlForm.addEventListener('submit', function (e) {
      e.preventDefault();

      const form = e.target;
      const formData = new FormData(form);
      const submitBtn = form.querySelector('.btn--submit-nl');
      const msgEl = document.getElementById('newsletterMsg');
      submitBtn.disabled = true;

      fetch(form.action, {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
      })
      .then(async response => {
        const data = await response.json().catch(() => ({}));
        if (!response.ok) {
          throw new Error(data.message || 'Failed');
        }
        return data;
      })
      .then(() => {
        form.style.display = 'none';
        document.getElementById('newsletterPrivacy').style.display = 'none';
        msgEl.textContent = '"Welcome to the darkness. Check your inbox for a gift."';
        document.getElementById('newsletterSuccess').classList.add('visible');
      })
      .catch(err => {
        submitBtn.disabled = false;
        alert(err.message || 'Something went wrong, please try again.');
      });
    });
  </script>
</body>
</html>
