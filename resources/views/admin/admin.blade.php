<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Colin Reardon — Admin Panel</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English:ital@0;1&family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- ===== admin.css ka pura content yahan inline kar diya gaya hai ===== -->
  <style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;1,400&family=Inter:wght@300;400;500;600&family=Cinzel+Decorative:wght@400;700&display=swap');

:root {
  --ink:        #0d0d0d;
  --ink-2:      #111111;
  --ink-3:      #1a1a1a;
  --ink-4:      #222222;
  --ash:        #444444;
  --ash-2:      #666666;
  --ash-3:      #888888;
  --fog:        #b0b0b0;
  --mist:       #cccccc;
  --paper:      #e8e4dc;
  --white:      #f5f2ec;
  --pure:       #fafaf9;
  --glow:       rgba(245,242,236,0.05);
  --glow-strong:rgba(245,242,236,0.10);
  --font-serif: 'Playfair Display', 'Georgia', serif;
  --font-ui:    'Inter', 'Helvetica Neue', sans-serif;
  --sidebar-w:  240px;
  --topbar-h:   58px;
  --ease:       cubic-bezier(0.25, 0.46, 0.45, 0.94);
  --glass-border: rgba(255,255,255,0.07);
  --radius:     6px;
  --red:        #9a4a4a;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

html { font-size: 14px; -webkit-font-smoothing: antialiased; }

body {
  background: var(--ink);
  color: var(--fog);
  font-family: var(--font-ui);
  display: flex;
  min-height: 100vh;
  letter-spacing: 0.01em;
  line-height: 1.5;
}

/* ═══════════════════════════════
   SIDEBAR
═══════════════════════════════ */
.sidebar {
  width: var(--sidebar-w);
  flex-shrink: 0;
  background: var(--ink-2);
  border-right: 1px solid var(--glass-border);
  display: flex;
  flex-direction: column;
  position: fixed;
  top: 0; left: 0;
  height: 100vh;
  z-index: 100;
}

.sidebar__logo {
  font-family: var(--font-serif);
  font-size: 22px;
  font-weight: 400;
  color: var(--white);
  padding: 26px 22px 20px;
  border-bottom: 1px solid var(--glass-border);
  line-height: 1.25;
  letter-spacing: 0.01em;
}
.sidebar__logo em {
  font-style: italic;
  color: var(--paper);
}
.sidebar__logo span {
  display: block;
  font-family: var(--font-ui);
  font-size: 10px;
  font-weight: 500;
  letter-spacing: 3.5px;
  text-transform: uppercase;
  color: var(--ash-2);
  margin-top: 5px;
}

.sidebar__nav {
  flex: 1;
  padding: 12px 0;
  display: flex;
  flex-direction: column;
  gap: 1px;
}

.sidebar__link {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 22px;
  color: var(--ash-3);
  text-decoration: none;
  font-size: 13px;
  font-weight: 400;
  letter-spacing: 0.2px;
  border-left: 2px solid transparent;
  transition: all 0.15s var(--ease);
}
.sidebar__link svg {
  width: 15px;
  height: 15px;
  stroke: currentColor;
  fill: none;
  stroke-width: 1.6;
  flex-shrink: 0;
  opacity: 0.8;
}
.sidebar__link:hover {
  color: var(--paper);
  background: var(--glow);
}
.sidebar__link.active {
  color: var(--white);
  background: var(--glow-strong);
  border-left-color: var(--paper);
  font-weight: 500;
}
.sidebar__link.active svg { opacity: 1; }

.sidebar__footer {
  padding: 16px 22px;
  border-top: 1px solid var(--glass-border);
}
.sidebar__user {
  display: flex;
  align-items: center;
  gap: 10px;
}
.sidebar__avatar {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: var(--ash);
  color: var(--white);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 500;
  flex-shrink: 0;
  border: 1px solid rgba(255,255,255,0.12);
  letter-spacing: 0.5px;
}
.sidebar__user p {
  font-size: 13px;
  font-weight: 500;
  color: var(--white);
  line-height: 1.3;
}
.sidebar__user span {
  font-size: 11px;
  color: var(--ash-2);
  letter-spacing: 0.3px;
}

/* ═══════════════════════════════
   MAIN
═══════════════════════════════ */
.main {
  margin-left: var(--sidebar-w);
  flex: 1;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

/* TOPBAR */
.topbar {
  height: var(--topbar-h);
  background: var(--ink-2);
  border-bottom: 1px solid var(--glass-border);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 28px;
  position: sticky;
  top: 0;
  z-index: 50;
}
.topbar__title {
  font-family: 'Cinzel Decorative', serif;
  font-size: 17px;
  font-weight: 400;
  color: var(--white);
  letter-spacing: 0.06em;
}
.topbar__preview {
  font-family: var(--font-ui);
  font-size: 11px;
  font-weight: 500;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  color: var(--ash-2);
  text-decoration: none;
  border: 1px solid var(--glass-border);
  padding: 6px 14px;
  border-radius: var(--radius);
  transition: all 0.15s;
}
.topbar__preview:hover {
  color: var(--paper);
  border-color: rgba(255,255,255,0.18);
  background: var(--glow);
}

/* CONTENT */
.content {
  flex: 1;
  padding: 28px 30px;
  overflow-y: auto;
}

/* ═══════════════════════════════
   SCROLLBAR
═══════════════════════════════ */
::-webkit-scrollbar { width: 4px; height: 4px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: var(--ash); border-radius: 2px; }

/* ═══════════════════════════════
   SECTION VISIBILITY
═══════════════════════════════ */
.section { display: none; }
.section.active { display: block; }

.blog-view { display: none; }
.blog-view.active { display: block; }

/* ═══════════════════════════════
   BLOG — SHARED
═══════════════════════════════ */
.b-alert {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 11px 15px;
  border-radius: var(--radius);
  font-size: 13px;
  font-weight: 500;
  margin-bottom: 20px;
}
.b-alert--success {
  background: rgba(90,154,114,0.10);
  border: 1px solid rgba(90,154,114,0.22);
  color: #6abf8a;
}
.b-alert--error {
  background: rgba(154,74,74,0.10);
  border: 1px solid rgba(154,74,74,0.22);
  color: #cf7a7a;
}

.b-stats {
  font-size: 12px;
  color: var(--ash-2);
  margin-bottom: 14px;
}
.b-stats strong { color: var(--fog); font-weight: 500; }

/* ═══════════════════════════════
   BLOG — TABLE CELLS
═══════════════════════════════ */
.col-num { color: var(--ash-2); font-size: 12px; width: 40px; }

.b-thumb {
  width: 48px;
  height: 48px;
  object-fit: cover;
  border-radius: 4px;
  border: 1px solid var(--glass-border);
  display: block;
}

.b-cell-heading {
  font-size: 13px;
  font-weight: 500;
  color: var(--fog);
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  max-width: 220px;
}

.b-cell-para {
  font-size: 12px;
  color: var(--ash-2);
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  max-width: 260px;
  line-height: 1.5;
}

.b-link-badge {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  font-size: 11px;
  font-weight: 500;
  padding: 3px 9px;
  border-radius: 20px;
  background: rgba(201,195,184,0.06);
  color: var(--ash-3);
  text-decoration: none;
  border: 1px solid var(--glass-border);
  transition: color 0.15s;
  white-space: nowrap;
}
.b-link-badge:hover { color: var(--paper); }

.b-date { color: var(--ash-2); font-size: 12px; white-space: nowrap; }

.b-empty {
  text-align: center;
  padding: 60px 20px;
  color: var(--ash-2);
}
.b-empty svg { opacity: 0.12; margin: 0 auto 14px; display: block; }
.b-empty p { font-size: 13px; margin-bottom: 16px; }

.b-pagination {
  display: flex;
  justify-content: center;
  margin-top: 24px;
}

/* hide columns on narrow viewports */
@media (max-width: 900px) { .hide-sm { display: none; } }

/* ═══════════════════════════════
   BLOG — FORM VIEWS
═══════════════════════════════ */
.b-back-btn {
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: transparent;
  border: 1px solid var(--glass-border);
  border-radius: 4px;
  color: var(--ash-3);
  cursor: pointer;
  transition: all 0.15s;
  flex-shrink: 0;
}
.b-back-btn:hover { color: var(--paper); border-color: rgba(255,255,255,0.18); background: var(--glow); }

.b-form-wrap {
  background: var(--ink-3);
  border: 1px solid var(--glass-border);
  border-radius: var(--radius);
  padding: 26px 28px;
  display: flex;
  flex-direction: column;
  gap: 0;
}

.b-form-wrap .form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
  margin-bottom: 18px;
}

.b-form-wrap label {
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 1.8px;
  text-transform: uppercase;
  color: var(--ash-2);
}

.b-form-wrap input[type="text"],
.b-form-wrap input[type="url"],
.b-form-wrap textarea {
  font-family: var(--font-ui);
  font-size: 13px;
  color: var(--fog);
  background: var(--ink-4);
  border: 1px solid rgba(255,255,255,0.07);
  border-radius: 4px;
  padding: 9px 12px;
  outline: none;
  transition: border-color 0.15s, color 0.15s;
  resize: vertical;
  line-height: 1.5;
  width: 100%;
}
.b-form-wrap textarea { height: 140px; }
.b-form-wrap input:focus,
.b-form-wrap textarea:focus {
  border-color: rgba(245,242,236,0.25);
  color: var(--paper);
}
.b-form-wrap input.is-invalid,
.b-form-wrap textarea.is-invalid {
  border-color: var(--red) !important;
}

.field-error {
  font-size: 12px;
  color: #cf7a7a;
  margin-top: 2px;
}

.b-optional {
  font-weight: 400;
  text-transform: none;
  letter-spacing: 0;
  font-size: 11px;
  color: var(--ash);
}

.b-file-label {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 13px;
  background: var(--ink-4);
  border: 1px dashed rgba(255,255,255,0.12);
  color: var(--ash-3);
  border-radius: 4px;
  cursor: pointer;
  font-size: 12px;
  transition: border-color 0.15s, color 0.15s;
}
.b-file-label:hover { border-color: var(--ash-2); color: var(--paper); }
.b-file-label svg { flex-shrink: 0; opacity: 0.5; }
.b-file-label.is-invalid { border-color: var(--red) !important; }

.b-img-preview {
  width: 100%;
  max-height: 200px;
  object-fit: cover;
  border-radius: 4px;
  border: 1px solid var(--glass-border);
  display: block;
}

.b-btn-row {
  display: flex;
  gap: 10px;
  margin-top: 6px;
  justify-content: flex-end;
}
.b-btn-cancel {
  font-family: var(--font-ui);
  font-size: 11px;
  font-weight: 500;
  background: transparent;
  border: 1px solid var(--glass-border);
  color: var(--ash-2);
  padding: 8px 18px;
  border-radius: 4px;
  cursor: pointer;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: all 0.15s;
}
.b-btn-cancel:hover { color: var(--paper); border-color: rgba(255,255,255,0.18); }

/* ═══════════════════════════════
   DELETE MODAL
═══════════════════════════════ */
.modal-overlay {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.72);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 500;
}
.modal-overlay.open { display: flex; }

.modal {
  background: var(--ink-2);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 8px;
  width: 400px;
  max-width: 94vw;
}
.modal__head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 22px;
  border-bottom: 1px solid var(--glass-border);
}
.modal__head h2 {
  font-family: var(--font-serif);
  font-size: 17px;
  font-weight: 400;
  color: var(--white);
}
.modal__close {
  background: transparent; border: none;
  color: var(--ash-2); font-size: 14px;
  cursor: pointer; padding: 4px 8px;
  transition: color 0.15s; line-height: 1;
}
.modal__close:hover { color: var(--white); }
.modal__body { padding: 20px 22px; }
.modal__footer { display: flex; gap: 10px; }

.btn-cancel-modal {
  flex: 1; padding: 10px;
  background: transparent;
  border: 1px solid var(--glass-border);
  color: var(--ash-2); border-radius: 4px;
  cursor: pointer; font-family: var(--font-ui);
  font-size: 12px; font-weight: 500;
  text-transform: uppercase; letter-spacing: 0.8px;
  transition: all 0.15s;
}
.btn-cancel-modal:hover { color: var(--paper); border-color: rgba(255,255,255,0.18); }

.btn-del-confirm {
  flex: 1; padding: 10px;
  background: rgba(154,74,74,0.18);
  border: 1px solid rgba(154,74,74,0.35);
  color: #cf7a7a; border-radius: 4px;
  cursor: pointer; font-family: var(--font-ui);
  font-size: 12px; font-weight: 600;
  text-transform: uppercase; letter-spacing: 0.8px;
  transition: all 0.15s;
}
.btn-del-confirm:hover { background: rgba(154,74,74,0.28); color: #e09090; }

/* ═══════════════════════════════
   TABLE (shared for all sections)
═══════════════════════════════ */
.section__bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
}
.section__heading {
  font-family: var(--font-serif);
  font-size: 22px;
  font-weight: 400;
  color: var(--white);
  letter-spacing: 0.02em;
}

.btn-add {
  font-family: var(--font-ui);
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  background: var(--paper);
  color: var(--ink);
  border: none;
  padding: 8px 18px;
  border-radius: 4px;
  cursor: pointer;
  transition: background 0.15s;
}
.btn-add:hover { background: var(--white); }

.table-wrap {
  background: var(--ink-3);
  border: 1px solid var(--glass-border);
  border-radius: var(--radius);
  overflow-x: auto;
}
.table {
  width: 100%;
  border-collapse: collapse;
}
.table th {
  font-family: var(--font-ui);
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--ash-2);
  padding: 12px 16px;
  text-align: left;
  border-bottom: 1px solid var(--glass-border);
  white-space: nowrap;
}
.table td {
  padding: 12px 16px;
  font-size: 13px;
  color: var(--fog);
  border-bottom: 1px solid rgba(255,255,255,0.03);
  vertical-align: middle;
  line-height: 1.4;
}
.table tr:last-child td { border-bottom: none; }
.table tbody tr:hover td { background: var(--glow); }

.actions { display: flex; gap: 6px; align-items: center; }
.act-btn {
  font-family: var(--font-ui);
  font-size: 11px;
  font-weight: 500;
  letter-spacing: 0.4px;
  padding: 5px 12px;
  border-radius: 4px;
  cursor: pointer;
  border: 1px solid var(--glass-border);
  background: transparent;
  transition: all 0.15s;
  white-space: nowrap;
}
.act-btn--edit { color: var(--fog); }
.act-btn--edit:hover { color: var(--paper); background: var(--glow); }
.act-btn--del  { color: var(--red); border-color: rgba(154,74,74,0.28); }
.act-btn--del:hover { background: rgba(154,74,74,0.10); }
  </style>

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
