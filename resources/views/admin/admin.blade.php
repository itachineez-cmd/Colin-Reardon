<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Colin Reardon — Admin Panel</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English:ital@0;1&family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="">

  <!-- ===== Responsive-only additions (koi purani styling override nahi hoti) ===== -->
  <style>
    /* Hamburger button - default hidden on desktop */
    .sidebar__toggle {
      display: none;
    }

    @media (max-width: 991px) {
      .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        transform: translateX(-100%);
        transition: transform 0.3s ease;
        z-index: 1000;
      }

      .sidebar.sidebar--open {
        transform: translateX(0);
      }

      .main {
        margin-left: 0 !important;
        width: 100% !important;
      }

      .sidebar__toggle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border: none;
        background: transparent;
        cursor: pointer;
        margin-right: 10px;
      }

      .sidebar__toggle svg {
        width: 24px;
        height: 24px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
      }

      .topbar__left {
        display: flex;
        align-items: center;
      }
    }

    @media (max-width: 576px) {
      .topbar__title {
        font-size: 1.1rem;
      }

      .topbar__preview {
        font-size: 0.85rem;
      }

      .content {
        padding: 12px !important;
      }
    }

    /* ===== Logout button styling ===== */
    .sidebar__footer {
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .sidebar__logout-form {
      width: 100%;
    }

    .sidebar__logout {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      padding: 10px 14px;
      border-radius: 10px;
      border: 1px solid rgba(220, 53, 69, 0.35);
      background: rgba(220, 53, 69, 0.08);
      color: #dc3545;
      font-family: 'Barlow Condensed', sans-serif;
      font-size: 0.95rem;
      font-weight: 500;
      letter-spacing: 0.03em;
      cursor: pointer;
      transition: background 0.2s ease, color 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
    }

    .sidebar__logout svg {
      width: 17px;
      height: 17px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2;
      flex-shrink: 0;
    }

    .sidebar__logout:hover {
      background: #dc3545;
      color: #fff;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(220, 53, 69, 0.25);
    }

    .sidebar__logout:active {
      transform: translateY(0);
      box-shadow: none;
    }
  </style>
</head>
<body>

  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar__logo">
      Colin <em>Reardon</em>
      <span>Admin</span>
    </div>
    <nav class="sidebar__nav">
      <a href="" class="sidebar__link active" data-section="dashboard">
        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
        Dashboard
      </a>
      <a href="{{ route('books.index') }}" class="sidebar__link" data-section="books">
        <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
        Books
      </a>
      <a href="{{ route('blogs.index') }}" class="sidebar__link" data-section="blogs">
        <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
        Blog Posts
      </a>
      <a href="#" class="sidebar__link" data-section="about">
        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        About
      </a>
      <a href="{{ route('admin.profile.edit') }}" class="sidebar__link" data-section="admin">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
        Admin
      </a>
        
      <a href="{{ route('newsletter.index') }}" class="sidebar__link" data-section="newsletter">
        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        NewsLetters
      </a>
      <!-- <a href="{{ route('newsletter.create') }}" class="sidebar__link" data-section="newsletter">
        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        Newslettercreates
      </a> -->
       
     
    </nav>
    <div class="sidebar__footer">
      <!-- Logout button -->
      <form method="POST" action="" class="sidebar__logout-form">
        @csrf
        <button type="submit" class="sidebar__logout">
          <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
          Logout
        </button>
      </form>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="main">

    <!-- TOPBAR -->
    <header class="topbar">
      <div class="topbar__left">
        <!-- Mobile hamburger toggle -->
        <button class="sidebar__toggle" id="sidebarToggle" aria-label="Toggle menu">
          <svg viewBox="0 0 24 24"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
        <h1 class="topbar__title" id="pageTitle">Dashboard</h1>
      </div>
      <div class="topbar__right">
        <a href="{{ route('index') }}" class="topbar__preview">View Site →</a>
      </div>
    </header>

    <!-- CONTENT AREA — apna content yahan add karo -->
    <div class="content" id="mainContent">

    </div>

  </div><!-- /main -->

  <!-- Responsive-only JS: sirf sidebar toggle ke liye -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var toggleBtn = document.getElementById('sidebarToggle');
      var sidebar = document.getElementById('sidebar');

      if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', function () {
          sidebar.classList.toggle('sidebar--open');
        });

        document.addEventListener('click', function (e) {
          if (window.innerWidth <= 991 &&
              sidebar.classList.contains('sidebar--open') &&
              !sidebar.contains(e.target) &&
              e.target !== toggleBtn &&
              !toggleBtn.contains(e.target)) {
            sidebar.classList.remove('sidebar--open');
          }
        });
      }
    });
  </script>

</body>
</html>
