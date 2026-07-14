<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Colin Reardon — Biography</title>
  <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English:ital@0;1&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Barlow+Condensed:wght@400;600;700;900&display=swap" rel="stylesheet">
  <style>
    :root {
      --ink:       #0d0d0d;
      --ink-2:     #181818;
      --ink-3:     #222222;
      --ash:       #444444;
      --ash-2:     #666666;
      --ash-3:     #888888;
      --mist:      #cccccc;
      --white:     #f5f2ec;
      --pure:      #fafaf9;
      --font-serif:'IM Fell English','Libre Baskerville',Georgia,serif;
      --font-body: 'Libre Baskerville',Georgia,serif;
      --font-ui:   'Barlow Condensed','Helvetica Neue',sans-serif;
      --nav-h:     68px;
      --ease:      cubic-bezier(0.25,0.46,0.45,0.94);
      --radius-sm: 4px;
      --glass-border: rgba(255,255,255,0.08);
      --glass-blur:   blur(20px);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }

    body {
      background: var(--ink);
      color: var(--mist);
      font-family: var(--font-body);
      font-size: 1.05rem;
      line-height: 1.8;
      overflow-x: hidden;
    }

    /* grain overlay */
    body::after {
      content: '';
      position: fixed; inset: 0; pointer-events: none; z-index: 9999;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
      opacity: 0.03;
    }

    a { color: inherit; text-decoration: none; }
    ul { list-style: none; }
    .container { width: 92%; max-width: 860px; margin: 0 auto; }

    /* ── NAV ── */
    .nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
      display: flex; align-items: center; justify-content: space-between;
      padding: 0 5%; height: var(--nav-h);
      transition: background 0.4s, border-color 0.4s, box-shadow 0.4s;
      border-bottom: 1px solid transparent;
    }
    .nav--scrolled {
      background: rgba(13,13,13,0.90);
      backdrop-filter: var(--glass-blur);
      -webkit-backdrop-filter: var(--glass-blur);
      border-color: var(--glass-border);
      box-shadow: 0 8px 32px rgba(0,0,0,0.4);
    }
    .nav__logo { font-family: var(--font-serif); font-size: 1.15rem; color: var(--white); letter-spacing: 0.04em; }
    .nav__logo em { font-style: italic; color: var(--mist); }
    .nav__back {
      font-family: var(--font-ui); font-size: 0.72rem; font-weight: 700;
      letter-spacing: 0.18em; text-transform: uppercase; color: var(--ash-3);
      display: flex; align-items: center; gap: 0.5rem;
      transition: color 0.3s;
    }
    .nav__back:hover { color: var(--white); }

    /* ── PAGE WRAPPER ── */
    .page {
      padding-top: var(--nav-h);
    }

    /* ── HERO IMAGE BLOCK ── */
    .bio-image-block {
      position: relative;
      background: var(--ink-2);
      overflow: hidden;
    }

    /* dot grid bg */
    .bio-image-block::before {
      content: '';
      position: absolute; inset: 0;
      background-image: radial-gradient(circle, rgba(255,255,255,0.022) 1px, transparent 1px);
      background-size: 30px 30px;
      pointer-events: none;
    }

    /* scan line */
    .bio-image-block__scan {
      position: absolute; top: 0; left: 0; right: 0; height: 1px;
      background: linear-gradient(to right, transparent, rgba(245,242,236,0.15), transparent);
      animation: scanDown 9s linear infinite; z-index: 2;
    }
    @keyframes scanDown {
      from { top: 0; opacity: 0; }
      5% { opacity: 1; } 95% { opacity: 1; }
      to { top: 100%; opacity: 0; }
    }

    .bio-image-block__inner {
      position: relative; z-index: 3;
      padding: 5rem 5% 4rem;
      display: flex; flex-direction: column; align-items: center; gap: 2.5rem;
    }

    /* eyebrow label */
    .bio-image-block__eyebrow {
      font-family: var(--font-ui); font-size: 0.68rem; font-weight: 700;
      letter-spacing: 0.3em; text-transform: uppercase; color: var(--ash-3);
      display: flex; align-items: center; gap: 1rem;
      animation: riseIn 0.9s ease both 0.2s;
    }
    .bio-image-block__eyebrow::before,
    .bio-image-block__eyebrow::after {
      content: ''; width: 50px; height: 1px; background: rgba(255,255,255,0.12);
    }

    /* portrait */
    .bio-portrait {
      position: relative;
      width: min(280px, 72vw);
      animation: riseIn 1s ease both 0.4s;
    }

    /* corner brackets */
    .bio-portrait::before,
    .bio-portrait::after {
      content: ''; position: absolute;
      width: 22px; height: 22px;
    }
    .bio-portrait::before {
      top: -8px; right: -8px;
      border-top: 1px solid rgba(255,255,255,0.35);
      border-right: 1px solid rgba(255,255,255,0.35);
    }
    .bio-portrait::after {
      bottom: -8px; left: -8px;
      border-bottom: 1px solid rgba(255,255,255,0.35);
      border-left: 1px solid rgba(255,255,255,0.35);
    }

    .bio-portrait__img {
      width: 100%;
      aspect-ratio: 3 / 4;
      object-fit: cover;
      display: block;
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: var(--radius-sm);
      filter: grayscale(20%) contrast(1.06);
      transition: filter 0.5s;
    }
    .bio-portrait__img:hover { filter: grayscale(0%) contrast(1); }

    /* gradient overlay on bottom of photo */
    .bio-portrait__overlay {
      position: absolute; inset: 0;
      background: linear-gradient(to top, rgba(13,13,13,0.6) 0%, transparent 55%);
      border-radius: var(--radius-sm);
      pointer-events: none;
    }

    /* name + role inside photo bottom */
    .bio-portrait__caption {
      position: absolute; bottom: 1.2rem; left: 1.2rem; right: 1.2rem; z-index: 2;
    }
    .bio-portrait__name {
      display: block; font-family: var(--font-serif);
      font-size: 1.05rem; color: var(--white); margin-bottom: 0.2rem;
    }
    .bio-portrait__role {
      display: block; font-family: var(--font-ui); font-size: 0.6rem; font-weight: 700;
      letter-spacing: 0.22em; text-transform: uppercase;
      color: rgba(255,255,255,0.45);
    }

    /* title under image */
    .bio-image-block__title {
      font-family: var(--font-serif);
      font-size: clamp(2.2rem, 6vw, 3.6rem);
      font-weight: 400; line-height: 1.0; letter-spacing: -0.01em;
      color: var(--white); text-align: center;
      animation: riseIn 1s ease both 0.6s;
    }
    .bio-image-block__title em { font-style: italic; color: var(--mist); display: block; }

    /* thin divider */
    .bio-divider {
      width: 60px; height: 1px;
      background: linear-gradient(to right, transparent, rgba(255,255,255,0.35), transparent);
      animation: riseIn 1s ease both 0.75s;
    }

    @keyframes riseIn {
      from { opacity: 0; transform: translateY(18px); }
      to   { opacity: 1; transform: none; }
    }

    /* ── BIOGRAPHY TEXT ── */
    .bio-text {
      padding: 5rem 0 7rem;
      background: var(--ink);
      position: relative;
    }
    .bio-text::before {
      content: '';
      position: absolute; top: 0; left: 0; right: 0; height: 1px;
      background: linear-gradient(to right, transparent, rgba(255,255,255,0.08), transparent);
    }

    .bio-text__label {
      font-family: var(--font-ui); font-size: 0.65rem; font-weight: 700;
      letter-spacing: 0.28em; text-transform: uppercase; color: var(--ash);
      margin-bottom: 2.5rem; display: block;
      padding-left: 1.5rem;
      border-left: 1px solid rgba(255,255,255,0.15);
    }

    .bio-text__body { display: flex; flex-direction: column; gap: 1.5rem; }

    .bio-text__body h3 {
      font-family: var(--font-serif);
      font-size: 1.4rem; font-weight: 400;
      color: var(--white); line-height: 1.25;
      margin-top: 1rem;
      position: relative; padding-left: 1.2rem;
    }
    .bio-text__body h3::before {
      content: '';
      position: absolute; left: 0; top: 0.2em; bottom: 0.2em;
      width: 2px; background: rgba(255,255,255,0.18);
    }

    .bio-text__body p {
      color: var(--ash-3);
      font-size: 1rem;
      line-height: 1.95;
    }
    .bio-text__body em { color: var(--mist); font-style: italic; }
    .bio-text__body strong { color: var(--white); font-weight: 700; }

    /* pull quote */
    .bio-pullquote {
      border-left: 1px solid rgba(255,255,255,0.18);
      padding: 0.5rem 0 0.5rem 1.8rem;
      margin: 0.5rem 0;
    }
    .bio-pullquote p {
      font-family: var(--font-serif); font-style: italic;
      font-size: 1.15rem !important;
      color: var(--mist) !important;
      line-height: 1.6 !important;
      margin-bottom: 0.6rem;
    }
    .bio-pullquote cite {
      font-family: var(--font-ui); font-size: 0.62rem; font-weight: 700;
      letter-spacing: 0.15em; text-transform: uppercase;
      color: var(--ash); font-style: normal;
    }

    /* stats strip */
    .bio-stats {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      border: 1px solid rgba(255,255,255,0.07);
      border-radius: var(--radius-sm);
      overflow: hidden;
      margin: 1rem 0;
    }
    @media (min-width: 600px) { .bio-stats { grid-template-columns: repeat(4, 1fr); } }

    .bio-stat {
      padding: 1.4rem 1rem; text-align: center;
      border-right: 1px solid rgba(255,255,255,0.06);
      border-bottom: 1px solid rgba(255,255,255,0.06);
      background: rgba(255,255,255,0.02);
      transition: background 0.3s;
    }
    .bio-stat:hover { background: rgba(255,255,255,0.05); }
    .bio-stat:nth-child(2n)  { border-right: none; }
    @media (min-width: 600px) {
      .bio-stat:nth-child(2n)  { border-right: 1px solid rgba(255,255,255,0.06); }
      .bio-stat:last-child     { border-right: none; }
    }
    .bio-stat__num   { display: block; font-family: var(--font-ui); font-size: 2.2rem; font-weight: 900; color: var(--white); line-height: 1; margin-bottom: 0.3rem; }
    .bio-stat__label { font-family: var(--font-ui); font-size: 0.6rem; font-weight: 700; letter-spacing: 0.18em; text-transform: uppercase; color: var(--ash); }

    /* back link */
    .bio-back {
      display: inline-flex; align-items: center; gap: 0.6rem;
      font-family: var(--font-ui); font-size: 0.7rem; font-weight: 700;
      letter-spacing: 0.18em; text-transform: uppercase;
      color: var(--ash-3); margin-top: 2rem;
      transition: color 0.3s;
    }
    .bio-back:hover { color: var(--white); }

    /* ── FOOTER ── */
    .footer {
      background: var(--ink); border-top: 1px solid rgba(255,255,255,0.06);
      padding: 2rem 5%;
      display: flex; flex-direction: column; align-items: center;
      gap: 0.6rem; text-align: center;
    }
    .footer p { font-family: var(--font-ui); font-size: 0.68rem; letter-spacing: 0.05em; color: var(--ash); }

    /* scrollbar */
    ::-webkit-scrollbar { width: 5px; }
    ::-webkit-scrollbar-track { background: var(--ink); }
    ::-webkit-scrollbar-thumb { background: var(--ash-2); border-radius: 2px; }
    ::selection { background: rgba(245,242,236,0.2); color: var(--white); }
  </style>
</head>
<body>

  <!-- NAV -->
  <nav class="nav" id="nav">
    <div class="nav__logo">Colin <em>Reardon</em></div>
    <a href="{{ route('index') }}" class="nav__back">← Back to Home</a>
  </nav>

  <div class="page">

    <!-- IMAGE BLOCK -->
    <div class="bio-image-block">
      <div class="bio-image-block__scan"></div>
      <div class="bio-image-block__inner">

        <p class="bio-image-block__eyebrow">Full Biography</p>

        <div class="bio-portrait">
          <img

            
            src="{{ asset('biopic/bIO_PIC.jpeg') }}"
            alt="Colin Reardon"
            class="bio-portrait__img"
          />
          <div class="bio-portrait__overlay"></div>
          <div class="bio-portrait__caption">
            <span class="bio-portrait__name">Colin Reardon</span>
            <span class="bio-portrait__role">Horror Author · Since 2009</span>
          </div>
        </div>

        <h1 class="bio-image-block__title">
          A Mind Built
          <em>for Darkness</em>
        </h1>

        <div class="bio-divider"></div>

      </div>
    </div>

    <!-- BIOGRAPHY TEXT -->
    <section class="bio-text">
      <div class="container">

        <span class="bio-text__label">The Full Story</span>

        <div class="bio-text__body">

          <p>Colin Reardon grew up in a house where all the clocks had stopped. That's not a metaphor. The estate on the edge of the Somerset moors had no working timepieces, and as a child, he learned to measure the hours by the quality of light seeping beneath the cellar door. His father was an architect who believed that empty rooms had opinions. His mother read folklore with the same devotion other parents reserved for scripture.</p>

          <p>That childhood — eerie, isolated, and saturated with the kind of quiet that <em>makes you listen for things</em> — forged a writer obsessed with the margins of human experience: the moment before terror fully arrives, the space between sleep and waking, the texture of a fear you cannot name.</p>

          <p>He did not have many friends. He had books. He had the moors. He had the particular silence of a house that had decided to stop counting time.</p>

          <h3>The Education</h3>

          <p>At eighteen, Reardon left Somerset for Edinburgh, where he studied English Literature with a focus on the Gothic tradition. His tutors remember him as a <strong>brilliant and troubling student</strong> — one who turned in a dissertation comparing the supernatural machinery of Sheridan Le Fanu to the mechanisms of modern psychiatric diagnosis. It earned a distinction. It also made his supervisor lose sleep.</p>

          <p>It was in Edinburgh that he encountered the writers who would shape him: Shirley Jackson's precision, Arthur Machen's deep-country dread, and the strange, airless terror of <em>Thomas Ligotti</em>, who convinced Reardon that horror was philosophy with sharper teeth.</p>

          <div class="bio-pullquote">
            <p>"Reardon is the heir to the throne of dread — a writer who makes darkness feel like home."</p>
            <cite>— The New York Times Book Review</cite>
          </div>

          <h3>The First Words in Print</h3>

          <p>His first published story, <em>The Sound Beneath the Floor</em>, appeared in Black Static in 2003. It is a short, quiet story about a woman who begins to hear breathing through the heating vents of her flat. It is, to this day, one of the most shared stories in the magazine's history. Several readers wrote to say they had their own vents checked.</p>

          <p>That story established what would become the Reardon signature: dread rooted not in the extraordinary but in the <em>ordinary made wrong</em>. A floor. A sound. A certainty that something is listening.</p>

          <h3>The Novel Career</h3>

          <p>His debut, <em>The Cold House</em> (2009), arrived without a vast publicity apparatus but with a momentum that felt almost supernaturally inevitable. Word spread through the horror community the way rumours spread through old houses — quietly, in the walls, until suddenly everyone knew. By the end of its first year, it had sold 80,000 copies and been translated into nine languages.</p>

          <p>He has since published thirteen more novels. <em>What the Water Keeps</em> (2013) won the Bram Stoker Award and permanently altered how critics discussed coastal horror. <em>The Hollow Season</em> (2017) was his first New York Times bestseller. <em>The Cartography of Screaming</em> (2020) was described by a colleague as "the book that will follow you home." His latest, <em>Where Shadows Learn Your Name</em> (2025), is already being called his masterpiece.</p>

          <!-- stats -->
          <!-- <div class="bio-stats">
            <div class="bio-stat">
              <span class="bio-stat__num">14</span>
              <span class="bio-stat__label">Novels</span>
            </div>
            <div class="bio-stat">
              <span class="bio-stat__num">3×</span>
              <span class="bio-stat__label">NYT Bestseller</span>
            </div>
            <div class="bio-stat">
              <span class="bio-stat__num">19</span>
              <span class="bio-stat__label">Translations</span>
            </div>
            <div class="bio-stat">
              <span class="bio-stat__num">40K+</span>
              <span class="bio-stat__label">Readers</span>
            </div>
          </div> -->

          <!-- <h3>Where He Lives and How He Works</h3>

          <p>Reardon does not maintain a permanent address in any public sense. He has been photographed in Galway, Lisbon, rural Japan, and a small town in Northern Finland that does not appear on most maps. He writes in the mornings, longhand first, in notebooks he buys from the same small stationer in Somerset that supplied his father.</p>

          <p>He does not outline his novels. He begins with an image — <em>always an image</em> — and follows it into the dark until he finds what it means. This process, he has said, is identical to what happens to his characters. The difference is that he can put down the pen. Or so he claims.</p> -->

          <h3>What He Believes About Horror</h3>

          <p>In a 2022 lecture at the Hay Festival, Reardon argued that horror is the only genre <em>honest enough</em> to acknowledge that existence is frightening — that the body fails, that consciousness is fragile, that other minds are opaque, and that the universe operates without regard for our comfort. Other genres offer the reader a way through. Horror offers the reader the truth.</p>

          <p>He was met with a standing ovation and one walkout. He considers this the correct ratio.</p>

          <a   href="{{ route('index') }}"  class="bio-back">← Return to Home</a>

        </div>
      </div>
    </section>

  </div>

  <!-- FOOTER -->
  <footer class="footer">
    <p>© 2025 Colin Reardon. All rights reserved. All nightmares are original.</p>
  </footer>

  <script>
    const nav = document.getElementById('nav');
    window.addEventListener('scroll', () => {
      nav.classList.toggle('nav--scrolled', window.scrollY > 60);
    });
  </script>
</body>
</html>