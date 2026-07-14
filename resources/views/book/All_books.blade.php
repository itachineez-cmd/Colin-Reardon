<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>All Titles — Colin Reardon</title>
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
button{font-family:inherit;cursor:pointer}
.container{width:92%;max-width:1180px;margin:0 auto}
::selection{background:rgba(255,153,0,.25);color:var(--white)}
::-webkit-scrollbar{width:5px}
::-webkit-scrollbar-track{background:var(--ink)}
::-webkit-scrollbar-thumb{background:var(--ash-2);border-radius:2px}

.fade-in{opacity:0;transform:translateY(24px);transition:opacity .6s ease,transform .6s ease}
.fade-in.visible{opacity:1;transform:none}

/* TOP BAR */
.topbar{position:sticky;top:0;z-index:500;padding:1.2rem 5%;
  background:rgba(13,13,13,.85);backdrop-filter:blur(16px);
  border-bottom:1px solid rgba(255,255,255,.06)}
.topbar__inner{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.6rem}
.topbar__back{font-family:var(--font-ui);font-size:.72rem;font-weight:700;letter-spacing:.16em;text-transform:uppercase;
  color:var(--ash-3);display:inline-flex;align-items:center;gap:.5rem;transition:color .3s,gap .3s}
.topbar__back:hover{color:var(--white);gap:.75rem}
.topbar__logo{font-family:var(--font-serif);font-size:1.05rem;color:var(--white);letter-spacing:.03em}
.topbar__logo em{font-style:italic;color:var(--mist)}

/* PAGE HERO */
.page-hero{position:relative;padding:5rem 0 3.5rem;overflow:hidden;text-align:center}
.page-hero::before{content:'';position:absolute;inset:0;
  background-image:radial-gradient(circle,rgba(255,255,255,.025) 1px,transparent 1px);
  background-size:32px 32px;pointer-events:none}
.page-hero__word{position:absolute;bottom:-.25em;left:50%;transform:translateX(-50%);
  font-family:var(--font-ui);font-size:clamp(4.5rem,20vw,15rem);font-weight:900;letter-spacing:-.04em;
  color:transparent;-webkit-text-stroke:1px rgba(255,255,255,.03);pointer-events:none;user-select:none;z-index:1}
.page-hero__label{position:relative;z-index:2;display:inline-block;font-family:var(--font-ui);font-size:.68rem;
  font-weight:700;letter-spacing:.28em;text-transform:uppercase;color:var(--ash-3);margin-bottom:1rem}
.page-hero__title{position:relative;z-index:2;font-family:var(--font-serif);font-weight:400;
  font-size:clamp(2.1rem,6vw,4.4rem);color:var(--white);line-height:1.05;margin-bottom:1.2rem}
.page-hero__title em{font-style:italic;color:var(--mist)}
.page-hero__sub{position:relative;z-index:2;max-width:520px;margin:0 auto;color:var(--ash-3);font-size:1rem;padding:0 1rem}

.results-count{font-family:var(--font-ui);font-size:.72rem;letter-spacing:.1em;text-transform:uppercase;color:var(--ash)}
.results-count span{color:var(--white)}

/* BOOKS GRID */
.books-listing{padding:4rem 0 6rem}
.books__grid{display:grid;grid-template-columns:1fr;gap:2rem}
@media (min-width:640px){.books__grid{grid-template-columns:repeat(2,1fr)}}
@media (min-width:1024px){.books__grid{grid-template-columns:repeat(3,1fr)}}

.book-card{background:var(--ink-2);display:flex;flex-direction:column;border-radius:var(--radius);
  border:1px solid rgba(255,255,255,.06);overflow:hidden;transition:transform .35s var(--ease),border-color .35s;
  position:relative}
.book-card:hover{transform:translateY(-4px);border-color:rgba(255,255,255,.15)}
.book-card__cover{width:100%;aspect-ratio:3/4;position:relative;overflow:hidden;border-bottom:1px solid rgba(255,255,255,.05)}
.book-card__cover img{width:100%;height:100%;object-fit:cover;display:block;
  filter:grayscale(20%) brightness(.9);transition:transform .5s var(--ease),filter .5s}
.book-card:hover .book-card__cover img{transform:scale(1.04);filter:grayscale(0%) brightness(1)}
.book-card__info{padding:1.5rem;flex:1;display:flex;flex-direction:column}
.book-card__title{font-family:var(--font-serif);font-size:1.2rem;font-weight:400;color:var(--white);
  line-height:1.25;margin-bottom:.8rem}
.book-card__desc{font-size:.85rem;color:var(--ash-2);line-height:1.7;flex:1;margin-bottom:1.3rem}
.book-card__footer{display:flex;align-items:center;justify-content:space-between;padding-top:.9rem;
  border-top:1px solid rgba(255,255,255,.06)}
.book-card__pages{font-family:var(--font-ui);font-size:.63rem;font-weight:600;letter-spacing:.1em;color:var(--ash)}
.book-card__link{font-family:var(--font-ui);font-size:.66rem;font-weight:700;letter-spacing:.12em;
  text-transform:uppercase;color:var(--mist);transition:color .3s,letter-spacing .3s}
.book-card__link:hover{color:var(--white);letter-spacing:.18em}

.empty-state{display:none;text-align:center;padding:4rem 1rem;grid-column:1/-1}
.empty-state.show{display:block}
.empty-state i{font-size:1.8rem;color:var(--ash);margin-bottom:1rem}
.empty-state p{font-family:var(--font-serif);font-style:italic;font-size:1.2rem;color:var(--mist);margin-bottom:.4rem}
.empty-state span{font-family:var(--font-ui);font-size:.75rem;color:var(--ash-3)}

/* LOAD MORE */
.load-more{text-align:center;margin-top:3.5rem}
.btn-outline{display:inline-flex;align-items:center;gap:.7rem;font-family:var(--font-ui);font-size:.72rem;
  font-weight:700;letter-spacing:.2em;text-transform:uppercase;padding:.9rem 2.2rem;background:transparent;
  color:var(--mist);border:1px solid rgba(255,255,255,.2);border-radius:var(--radius-sm);transition:.35s var(--ease)}
.btn-outline:hover{background:var(--white);color:var(--ink);border-color:var(--white)}

/* FOOTER */
.footer{background:var(--ink);border-top:1px solid rgba(255,255,255,.06);padding:3rem 5%;text-align:center}
.footer p{font-family:var(--font-ui);font-size:.68rem;letter-spacing:.05em;color:var(--ash)}

/* RESPONSIVE TWEAKS */
@media (max-width:600px){
  .topbar{padding:1rem 5%}
  .page-hero{padding:3rem 0 2.5rem}
  .books-listing{padding:2.5rem 0 4rem}
  .book-card__info{padding:1.2rem}
}
</style>
</head>
<body>

<header class="topbar">
  <div class="container topbar__inner">
    <a href="{{ url('/') }}" class="topbar__back"><i class="fa-solid fa-arrow-left"></i> Back to Home</a>
    <a href="{{ route('total.book') }}" class="topbar__logo">Colin <em>Reardon</em></a>
  </div>
</header>

<section class="page-hero">
  <div class="page-hero__word" aria-hidden="true">TITLES</div>
  <div class="container">
    <span class="page-hero__label">The Full Collection</span>
    <h1 class="page-hero__title">Every Door <em>Reardon</em><br>Has Opened</h1>
    <p class="page-hero__sub">Fourteen novels. Two collections. One poem best left unread. Choose your descent.</p>
  </div>
</section>

<section class="books-listing">
  <div class="container">
    <p class="results-count" style="margin-bottom:2rem;">Showing <span>{{ $books->count() }}</span> of <span>{{ $totalCount }}</span> titles</p>

    <div class="books__grid">
      @forelse ($books as $book)
        <article class="book-card fade-in visible">
          <div class="book-card__cover">
            <img src="{{ asset('storage/' . $book->book_image) }}" alt="{{ $book->book_name }}" loading="lazy">
          </div>
          <div class="book-card__info">
            <h3 class="book-card__title">{{ $book->book_name }}</h3>
            <p class="book-card__desc">{{ Str::limit($book->book_detail, 130) }}</p>
            <div class="book-card__footer">
              <span class="book-card__pages">{{ $book->book_pages }} pages</span>
              <a href="{{ route('blogs.show', $book->id) }}" class="book-card__link">Read more →</a>
            </div>
          </div>
        </article>
      @empty
        <div class="empty-state show">
          <i class="fa-solid fa-ghost"></i>
          <p>Nothing waits here.</p>
          <span>No books added yet.</span>
        </div>
      @endforelse
    </div>

    @if ($hasMore)
      <div class="load-more">
        <a
          class="btn-outline"
          href="{{ route('total.book', ['show' => $show + 2]) }}"
        >Load More Titles</a>
      </div>
    @endif
  </div>
</section>

<footer class="footer">
  <p>© {{ date('Y') }} Colin Reardon. All rights reserved. All nightmares are original.</p>
</footer>

</body>
</html>