@php
  // When this view is requested via AJAX (search typing / pagination clicks),
  // we only output the inner content block — not the full HTML page.
  $isAjax = request()->ajax();
@endphp

@if($isAjax)

  {{-- ===================== AJAX PARTIAL (content only) ===================== --}}
  @if($subscribers->total() > 0)
    <div class="stats-bar">
      Showing <span>{{ $subscribers->firstItem() }}–{{ $subscribers->lastItem() }}</span>
      of <span>{{ $subscribers->total() }}</span> subscribers
    </div>
  @endif

  {{-- Desktop Table --}}
  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th class="col-num">#</th>
          <th class="col-avatar"></th>
          <th class="col-name">Name</th>
          <th class="col-email">Email</th>
          <th class="col-date">Subscribed</th>
          <th class="col-actions">Action</th>
        </tr>
      </thead>
      <tbody>
        @if($subscribers->count() > 0)
          @foreach($subscribers as $index => $subscriber)
            <tr>
              <td class="col-num">{{ $subscribers->firstItem() + $index }}</td>
              <td class="col-avatar">
                <div class="sub-avatar">{{ strtoupper(substr($subscriber->name, 0, 1)) }}</div>
              </td>
              <td class="col-name">
                <div class="cell-name">{{ $subscriber->name }}</div>
              </td>
              <td class="col-email">
                <div class="cell-email">{{ $subscriber->email }}</div>
              </td>
              <td class="col-date">{{ $subscriber->created_at->format('M d, Y') }}</td>
              <td class="col-actions">
                <button class="btn-delete" onclick="openDeleteModal({{ $subscriber->id }}, '{{ addslashes($subscriber->name) }}')">
                  <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6m5 0V4a1 1 0 011-1h2a1 1 0 011 1v2"/></svg>
                  Delete
                </button>
              </td>
            </tr>
          @endforeach
        @else
          <tr class="empty-row">
            <td colspan="6">
              <svg width="50" height="50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              <h2>No subscribers found</h2>
              <p>Try a different search term, or check back later.</p>
            </td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>

  {{-- Mobile Card List --}}
  <div class="card-list">
    @if($subscribers->count() > 0)
      @foreach($subscribers as $index => $subscriber)
        <div class="sub-card">
          <div class="card-avatar">{{ strtoupper(substr($subscriber->name, 0, 1)) }}</div>
          <div class="card-body">
            <div class="card-num">#{{ $subscribers->firstItem() + $index }}</div>
            <div class="card-name">{{ $subscriber->name }}</div>
            <div class="card-email">{{ $subscriber->email }}</div>
            <div class="card-date">{{ $subscriber->created_at->format('M d, Y') }}</div>
            <button class="btn-delete" onclick="openDeleteModal({{ $subscriber->id }}, '{{ addslashes($subscriber->name) }}')">
              <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6m5 0V4a1 1 0 011-1h2a1 1 0 011 1v2"/></svg>
              Delete
            </button>
          </div>
        </div>
      @endforeach
    @else
      <div class="empty-card">
        <svg width="50" height="50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        <h2>No subscribers found</h2>
        <p>Try a different search term, or check back later.</p>
      </div>
    @endif
  </div>

  {{-- Pagination (manual links, AJAX-driven via data-page) --}}
  @if($subscribers->hasPages())
    <div class="pagination-wrap">
      <nav class="pg-nav">
        @if($subscribers->onFirstPage())
          <span class="pg-btn pg-disabled">&laquo;</span>
        @else
          <a href="#" class="pg-btn pg-link" data-page="{{ $subscribers->currentPage() - 1 }}">&laquo;</a>
        @endif

        @for($p = 1; $p <= $subscribers->lastPage(); $p++)
          @if($p == $subscribers->currentPage())
            <span class="pg-btn pg-active">{{ $p }}</span>
          @else
            <a href="#" class="pg-btn pg-link" data-page="{{ $p }}">{{ $p }}</a>
          @endif
        @endfor

        @if($subscribers->hasMorePages())
          <a href="#" class="pg-btn pg-link" data-page="{{ $subscribers->currentPage() + 1 }}">&raquo;</a>
        @else
          <span class="pg-btn pg-disabled">&raquo;</span>
        @endif
      </nav>
    </div>
  @endif

@else
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Newsletter Subscribers</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cinzel+Decorative:wght@400;700&display=swap" rel="stylesheet">

<style>
:root {
  --ink:        #0d0d0d;
  --ink-2:      #181818;
  --ink-4:      #2e2e2e;
  --ink-6:      #3d3d3d;
  --paper:      #e8e4dc;
  --white:      #f5f2ec;
  --ash-3:      #888;
  --ash-5:      #aaa;
  --error:      #ff6b6b;
  --error-bg:   rgba(255, 107, 107, 0.08);
  --success:    #6fcf97;
  --success-bg: rgba(111, 207, 151, 0.1);
}

*, *::before, *::after { box-sizing: border-box; }

body {
  margin: 0;
  font-family: 'Inter', Arial, sans-serif;
  background: var(--ink);
  color: var(--white);
  font-size: 15px;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
}

/* Topbar */
header.topbar {
  height: 58px;
  background: #111111;
  border-bottom: 1px solid rgba(255,255,255,0.07);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 28px;
  position: sticky;
  top: 0;
  z-index: 50;
  gap: 0;
}
.topbar__title {
  font-family: 'Cinzel Decorative', serif;
  font-size: 17px;
  font-weight: 400;
  color: var(--white);
  letter-spacing: 0.06em;
  margin: 0;
  white-space: nowrap;
}
.topbar__right {
  display: flex;
  align-items: center;
  gap: 10px;
}
.topbar__preview {
  font-family: 'Inter', sans-serif;
  font-size: 11px;
  font-weight: 500;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  color: #666666;
  text-decoration: none;
  border: 1px solid rgba(255,255,255,0.07);
  padding: 6px 14px;
  border-radius: 6px;
  transition: all 0.15s;
  white-space: nowrap;
}
.topbar__preview:hover {
  color: var(--paper);
  border-color: rgba(255,255,255,0.18);
  background: rgba(245,242,236,0.05);
}

/* Alert */
.alert-wrap {
  width: 92%;
  max-width: 1200px;
  margin: 28px auto 0;
}
.alert {
  padding: 12px 16px;
  border-radius: 8px;
  font-size: 0.875rem;
  font-weight: 500;
  display: flex;
  align-items: center;
  gap: 8px;
}
.alert-success {
  background: var(--success-bg);
  border: 1px solid rgba(111, 207, 151, 0.25);
  color: var(--success);
}

/* Page wrap */
.page-wrap {
  width: 92%;
  max-width: 1200px;
  margin: 28px auto 60px;
}

/* Search bar */
.search-bar {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 18px;
  flex-wrap: wrap;
}
.search-input-wrap {
  position: relative;
  flex: 1;
  max-width: 360px;
  min-width: 200px;
}
.search-input-wrap svg {
  position: absolute;
  left: 13px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--ash-3);
  pointer-events: none;
}
#searchInput {
  width: 100%;
  background: var(--ink-2);
  border: 1px solid var(--ink-4);
  border-radius: 8px;
  padding: 10px 14px 10px 38px;
  color: var(--white);
  font-family: 'Inter', Arial, sans-serif;
  font-size: 0.875rem;
  outline: none;
  transition: border-color 0.15s;
}
#searchInput:focus { border-color: var(--ash-5); }
#searchInput::placeholder { color: var(--ash-3); }

.search-clear {
  display: none;
  background: transparent;
  border: 1px solid var(--ink-4);
  color: var(--ash-3);
  border-radius: 8px;
  padding: 10px 14px;
  font-size: 0.8rem;
  cursor: pointer;
  font-family: 'Inter', Arial, sans-serif;
  white-space: nowrap;
  transition: border-color 0.15s, color 0.15s;
}
.search-clear:hover { border-color: var(--ash-5); color: var(--white); }
.search-clear.active { display: inline-block; }

.search-spinner {
  display: none;
  width: 16px; height: 16px;
  border: 2px solid var(--ink-4);
  border-top-color: var(--ash-5);
  border-radius: 50%;
  animation: spin 0.6s linear infinite;
}
.search-spinner.active { display: inline-block; }
@keyframes spin { to { transform: rotate(360deg); } }

/* Add Subscriber button */
.btn-add {
  margin-left: auto;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: var(--white);
  color: var(--ink);
  border: 1px solid var(--white);
  border-radius: 8px;
  padding: 10px 16px;
  font-family: 'Inter', Arial, sans-serif;
  font-size: 0.8125rem;
  font-weight: 600;
  text-decoration: none;
  white-space: nowrap;
  cursor: pointer;
  transition: opacity 0.15s;
}
.btn-add:hover { opacity: 0.88; }

/* Stats bar */
.stats-bar {
  font-size: 0.8125rem;
  color: var(--ash-3);
  margin-bottom: 16px;
}
.stats-bar span { color: var(--white); font-weight: 500; }

/* Table wrapper */
.table-wrap {
  background: var(--ink-2);
  border: 1px solid var(--ink-4);
  border-radius: 12px;
  overflow: hidden;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

table {
  width: 100%;
  border-collapse: collapse;
  min-width: 480px;
}

thead {
  background: var(--ink);
  border-bottom: 1px solid var(--ink-4);
}

thead th {
  padding: 13px 16px;
  text-align: left;
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: var(--ash-3);
  white-space: nowrap;
}

tbody tr {
  border-bottom: 1px solid var(--ink-4);
  transition: background 0.15s;
}
tbody tr:last-child { border-bottom: none; }
tbody tr:hover { background: rgba(255,255,255,0.02); }

tbody td {
  padding: 14px 16px;
  vertical-align: middle;
  font-size: 0.875rem;
  color: var(--white);
}

.col-num { width: 48px; color: var(--ash-3); font-size: 0.8rem; font-weight: 500; }

/* Avatar */
.col-avatar { width: 56px; }
.sub-avatar {
  width: 42px; height: 42px;
  border-radius: 50%;
  background: var(--ink-4);
  border: 1px solid rgba(255,255,255,0.08);
  display: flex; align-items: center; justify-content: center;
  font-family: 'Cinzel Decorative', serif;
  font-size: 15px;
  color: var(--white);
  flex-shrink: 0;
}

.col-name { min-width: 160px; }
.cell-name { font-weight: 600; font-size: 0.9rem; color: var(--white); }

.col-email { min-width: 200px; }
.cell-email { color: var(--ash-3); font-size: 0.8375rem; }

.col-date { width: 110px; white-space: nowrap; color: var(--ash-3); font-size: 0.8rem; }

.col-actions { width: 100px; }

.btn-delete {
  padding: 7px 14px;
  background: transparent;
  color: var(--error);
  border: 1px solid rgba(255, 107, 107, 0.2);
  border-radius: 7px;
  font-family: 'Inter', Arial, sans-serif;
  font-size: 0.775rem;
  font-weight: 500;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 5px;
  transition: border-color 0.15s, background 0.15s;
  white-space: nowrap;
}
.btn-delete:hover {
  background: rgba(255, 107, 107, 0.08);
  border-color: var(--error);
}

/* Empty state */
.empty-row td {
  text-align: center;
  padding: 70px 20px;
  color: var(--ash-3);
}
.empty-row svg { opacity: 0.15; display: block; margin: 0 auto 14px; }
.empty-row h2 { font-size: 1rem; font-weight: 500; color: var(--ash-3); margin: 0 0 6px; }
.empty-row p { font-size: 0.85rem; margin: 0; }

.empty-card {
  text-align: center; padding: 60px 20px; color: var(--ash-3);
}
.empty-card svg { opacity: 0.15; display: block; margin: 0 auto 14px; }
.empty-card h2 { font-size: 1rem; font-weight: 500; color: var(--ash-3); margin: 0 0 6px; }
.empty-card p { font-size: 0.85rem; margin: 0; }

/* Pagination */
.pagination-wrap { margin-top: 22px; display: flex; justify-content: center; }
.pg-nav { display: flex; gap: 6px; flex-wrap: wrap; justify-content: center; }
.pg-btn {
  min-width: 36px;
  height: 36px;
  padding: 0 10px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  border-radius: 7px;
  font-size: 0.8125rem;
  font-weight: 500;
  text-decoration: none;
  color: var(--ash-3);
  border: 1px solid var(--ink-4);
  background: var(--ink-2);
  transition: border-color 0.15s, color 0.15s, background 0.15s;
}
.pg-link:hover { color: var(--white); border-color: var(--ash-5); }
.pg-active { background: var(--white); color: var(--ink); border-color: var(--white); }
.pg-disabled { opacity: 0.35; cursor: default; }

/* Delete modal */
.modal-backdrop {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.7);
  z-index: 100;
  align-items: center;
  justify-content: center;
  padding: 16px;
}
.modal-backdrop.active { display: flex; }
.modal {
  background: var(--ink-2);
  border: 1px solid var(--ink-4);
  border-radius: 14px;
  padding: 28px 28px 24px;
  width: 100%;
  max-width: 380px;
  text-align: center;
}
.modal-icon {
  width: 48px; height: 48px;
  background: var(--error-bg);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 16px;
}
.modal h2 { margin: 0 0 8px; font-size: 1rem; font-weight: 600; color: var(--white); }
.modal p  { margin: 0 0 22px; font-size: 0.875rem; color: var(--ash-3); }
.modal-sub-name {
  color: var(--white);
  font-weight: 500;
  margin: 0 0 8px;
  font-size: 0.875rem;
}
.modal-actions { display: flex; gap: 10px; }
.modal-cancel {
  flex: 1; padding: 11px;
  background: transparent;
  border: 1px solid var(--ink-4);
  color: var(--ash-3);
  border-radius: 8px; cursor: pointer;
  font-family: 'Inter', Arial, sans-serif; font-size: 0.9rem;
  transition: border-color 0.15s, color 0.15s;
}
.modal-cancel:hover { border-color: var(--ash-3); color: var(--white); }
.modal-confirm {
  flex: 1; padding: 11px;
  background: var(--error); border: none; color: white;
  border-radius: 8px; cursor: pointer;
  font-family: 'Inter', Arial, sans-serif; font-size: 0.9rem; font-weight: 600;
  transition: opacity 0.15s;
}
.modal-confirm:hover { opacity: 0.88; }
.modal-confirm:disabled { opacity: 0.6; cursor: not-allowed; }

/* Toast */
.toast {
  position: fixed;
  bottom: 24px;
  left: 50%;
  transform: translateX(-50%) translateY(20px);
  background: var(--ink-2);
  border: 1px solid var(--success);
  color: var(--success);
  padding: 12px 20px;
  border-radius: 8px;
  font-size: 0.875rem;
  font-weight: 500;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.25s, transform 0.25s;
  z-index: 200;
  display: flex;
  align-items: center;
  gap: 8px;
}
.toast.active { opacity: 1; transform: translateX(-50%) translateY(0); }
.toast.error-toast { border-color: var(--error); color: var(--error); }

/* Mobile card layout */
@media (max-width: 640px) {
  header.topbar { padding: 0 16px; height: 52px; }
  .topbar__title { font-size: 13px; }
  .page-wrap { width: 100%; padding: 0 12px; margin-top: 20px; }
  .table-wrap { display: none; }
  .card-list { display: flex; flex-direction: column; gap: 10px; }
  .search-bar { flex-direction: column; align-items: stretch; }
  .search-input-wrap { max-width: none; }
  .search-clear { width: 100%; text-align: center; }
  .btn-add { margin-left: 0; width: 100%; justify-content: center; order: -1; }

  .sub-card {
    background: var(--ink-2);
    border: 1px solid var(--ink-4);
    border-radius: 12px;
    padding: 14px;
    display: flex;
    gap: 12px;
    align-items: flex-start;
  }
  .sub-card .card-avatar {
    width: 44px; height: 44px;
    border-radius: 50%;
    background: var(--ink-4);
    border: 1px solid rgba(255,255,255,0.08);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Cinzel Decorative', serif;
    font-size: 14px; color: var(--white); flex-shrink: 0;
  }
  .sub-card .card-body { flex: 1; min-width: 0; }
  .sub-card .card-num { font-size: 0.72rem; color: var(--ash-3); font-weight: 500; margin-bottom: 3px; }
  .sub-card .card-name { font-size: 0.9rem; font-weight: 600; color: var(--white); margin: 0 0 3px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
  .sub-card .card-email { font-size: 0.78rem; color: var(--ash-3); margin-bottom: 4px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
  .sub-card .card-date { font-size: 0.75rem; color: var(--ash-3); margin-bottom: 10px; }
  .sub-card .btn-delete { width: 100%; justify-content: center; padding: 8px; }

  .modal { padding: 22px 18px 20px; }
  .modal-actions { flex-direction: column; }
}

@media (min-width: 641px) {
  .card-list { display: none; }
}

@media (max-width: 400px) {
  .topbar__preview { padding: 6px 10px; font-size: 10px; }
}
</style>
</head>
<body>

<!-- Topbar -->
<header class="topbar">
  <h1 class="topbar__title">Newsletter Subscribers</h1>
  <div class="topbar__right">
    <a href="{{ route('dashboard') }}" class="topbar__preview">View Dashboard →</a>
  </div>
</header>

@if(session('success'))
  <div class="alert-wrap">
    <div class="alert alert-success">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
      {{ session('success') }}
    </div>
  </div>
@endif

<div class="page-wrap">

  {{-- Search Bar --}}
  <div class="search-bar">
    <div class="search-input-wrap">
      <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="M21 21l-4.35-4.35"/></svg>
      <input type="text" id="searchInput" placeholder="Search by name or email..." autocomplete="off">
    </div>
    <div class="search-spinner" id="searchSpinner"></div>
    <button type="button" class="search-clear" id="searchClear" onclick="clearSearch()">Clear</button>
    <a href="{{ route('newsletter.create') }}" class="btn-add">
      <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14"/></svg>
      Add NewsLetter
    </a>
  </div>

  <div id="subscriberContent">

    @if($subscribers->total() > 0)
      <div class="stats-bar">
        Showing <span>{{ $subscribers->firstItem() }}–{{ $subscribers->lastItem() }}</span>
        of <span>{{ $subscribers->total() }}</span> subscribers
      </div>
    @endif

    {{-- Desktop Table --}}
    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th class="col-num">#</th>
            <th class="col-avatar"></th>
            <th class="col-name">Name</th>
            <th class="col-email">Email</th>
            <th class="col-date">Subscribed</th>
            <th class="col-actions">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($subscribers->count() > 0)
            @foreach($subscribers as $index => $subscriber)
              <tr>
                <td class="col-num">{{ $subscribers->firstItem() + $index }}</td>
                <td class="col-avatar">
                  <div class="sub-avatar">{{ strtoupper(substr($subscriber->name, 0, 1)) }}</div>
                </td>
                <td class="col-name">
                  <div class="cell-name">{{ $subscriber->name }}</div>
                </td>
                <td class="col-email">
                  <div class="cell-email">{{ $subscriber->email }}</div>
                </td>
                <td class="col-date">{{ $subscriber->created_at->format('M d, Y') }}</td>
                <td class="col-actions">
                  <button class="btn-delete" onclick="openDeleteModal({{ $subscriber->id }}, '{{ addslashes($subscriber->name) }}')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6m5 0V4a1 1 0 011-1h2a1 1 0 011 1v2"/></svg>
                    Delete
                  </button>
                </td>
              </tr>
            @endforeach
          @else
            <tr class="empty-row">
              <td colspan="6">
                <svg width="50" height="50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <h2>No subscribers yet</h2>
                <p>When someone subscribes to the newsletter, they will appear here.</p>
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>

    {{-- Mobile Card List --}}
    <div class="card-list">
      @if($subscribers->count() > 0)
        @foreach($subscribers as $index => $subscriber)
          <div class="sub-card">
            <div class="card-avatar">{{ strtoupper(substr($subscriber->name, 0, 1)) }}</div>
            <div class="card-body">
              <div class="card-num">#{{ $subscribers->firstItem() + $index }}</div>
              <div class="card-name">{{ $subscriber->name }}</div>
              <div class="card-email">{{ $subscriber->email }}</div>
              <div class="card-date">{{ $subscriber->created_at->format('M d, Y') }}</div>
              <button class="btn-delete" onclick="openDeleteModal({{ $subscriber->id }}, '{{ addslashes($subscriber->name) }}')">
                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6m5 0V4a1 1 0 011-1h2a1 1 0 011 1v2"/></svg>
                Delete
              </button>
            </div>
          </div>
        @endforeach
      @else
        <div class="empty-card">
          <svg width="50" height="50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          <h2>No subscribers yet</h2>
          <p>When someone subscribes to the newsletter, they will appear here.</p>
        </div>
      @endif
    </div>

    {{-- Pagination --}}
    @if($subscribers->hasPages())
      <div class="pagination-wrap">
        <nav class="pg-nav">
          @if($subscribers->onFirstPage())
            <span class="pg-btn pg-disabled">&laquo;</span>
          @else
            <a href="#" class="pg-btn pg-link" data-page="{{ $subscribers->currentPage() - 1 }}">&laquo;</a>
          @endif

          @for($p = 1; $p <= $subscribers->lastPage(); $p++)
            @if($p == $subscribers->currentPage())
              <span class="pg-btn pg-active">{{ $p }}</span>
            @else
              <a href="#" class="pg-btn pg-link" data-page="{{ $p }}">{{ $p }}</a>
            @endif
          @endfor

          @if($subscribers->hasMorePages())
            <a href="#" class="pg-btn pg-link" data-page="{{ $subscribers->currentPage() + 1 }}">&raquo;</a>
          @else
            <span class="pg-btn pg-disabled">&raquo;</span>
          @endif
        </nav>
      </div>
    @endif

  </div>

</div>

{{-- Delete Modal --}}
<div class="modal-backdrop" id="deleteModal">
  <div class="modal">
    <div class="modal-icon">
      <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#ff6b6b" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6m5 0V4a1 1 0 011-1h2a1 1 0 011 1v2"/></svg>
    </div>
    <h2>Remove this Subscriber?</h2>
    <p class="modal-sub-name" id="modal-sub-name"></p>
    <p>This action cannot be undone. They will be permanently removed from the mailing list.</p>
    <div class="modal-actions">
      <button class="modal-cancel" onclick="closeDeleteModal()">Cancel</button>
      <button class="modal-confirm" id="modal-confirm-btn">Yes, Delete</button>
    </div>
  </div>
</div>

{{-- Toast --}}
<div class="toast" id="toast"></div>

<script>
const csrfToken    = '{{ csrf_token() }}';
const baseUrl      = '{{ route("newsletter.index") }}';
const contentBox   = document.getElementById('subscriberContent');
const searchInput  = document.getElementById('searchInput');
const searchClear  = document.getElementById('searchClear');
const searchSpinner = document.getElementById('searchSpinner');

let searchTimer = null;
let currentDeleteId = null;

function loadSubscribers(url) {
  searchSpinner.classList.add('active');
  fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
    .then(res => res.text())
    .then(html => {
      contentBox.innerHTML = html;
      bindPaginationLinks();
      searchSpinner.classList.remove('active');
    })
    .catch(() => {
      searchSpinner.classList.remove('active');
      showToast('Something went wrong while loading subscribers.', true);
    });
}

function buildUrl(page = 1) {
  const params = new URLSearchParams();
  if (searchInput.value.trim() !== '') params.set('search', searchInput.value.trim());
  if (page > 1) params.set('page', page);
  const qs = params.toString();
  return baseUrl + (qs ? '?' + qs : '');
}

searchInput.addEventListener('input', function() {
  clearTimeout(searchTimer);
  searchClear.classList.toggle('active', this.value.trim() !== '');
  searchTimer = setTimeout(() => loadSubscribers(buildUrl(1)), 400);
});

function clearSearch() {
  searchInput.value = '';
  searchClear.classList.remove('active');
  loadSubscribers(buildUrl(1));
  searchInput.focus();
}

function bindPaginationLinks() {
  document.querySelectorAll('.pg-link').forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      loadSubscribers(buildUrl(this.dataset.page));
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  });
}
bindPaginationLinks();

function openDeleteModal(id, name) {
  currentDeleteId = id;
  document.getElementById('modal-sub-name').textContent = '"' + name + '"';
  document.getElementById('deleteModal').classList.add('active');
}
function closeDeleteModal() {
  document.getElementById('deleteModal').classList.remove('active');
  currentDeleteId = null;
}
document.getElementById('deleteModal').addEventListener('click', function(e) {
  if (e.target === this) closeDeleteModal();
});

document.getElementById('modal-confirm-btn').addEventListener('click', function() {
  if (!currentDeleteId) return;
  const btn = this;
  btn.disabled = true;
  btn.textContent = 'Deleting...';

  fetch(`/newsletter/${currentDeleteId}`, {
    method: 'POST',
    headers: {
      'X-Requested-With': 'XMLHttpRequest',
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': csrfToken
    },
    body: JSON.stringify({ _method: 'DELETE' })
  })
  .then(res => res.json())
  .then(data => {
    closeDeleteModal();
    btn.disabled = false;
    btn.textContent = 'Yes, Delete';
    if (data.success) {
      showToast(data.message || 'Subscriber deleted successfully.');
      loadSubscribers(buildUrl(1));
    } else {
      showToast('Failed to delete subscriber.', true);
    }
  })
  .catch(() => {
    closeDeleteModal();
    btn.disabled = false;
    btn.textContent = 'Yes, Delete';
    showToast('Failed to delete subscriber.', true);
  });
});

function showToast(message, isError = false) {
  const toast = document.getElementById('toast');
  toast.textContent = message;
  toast.classList.toggle('error-toast', isError);
  toast.classList.add('active');
  setTimeout(() => toast.classList.remove('active'), 2500);
}
</script>

</body>
</html>
@endif