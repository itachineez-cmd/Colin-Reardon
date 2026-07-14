<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>All Blogs</title>
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

/* ── Topbar (matches admin layout) ── */
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
  flex-wrap: nowrap;
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
.btn-new {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  padding: 7px 16px;
  background: var(--paper);
  color: var(--ink);
  border-radius: 4px;
  font-family: 'Inter', Arial, sans-serif;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
  transition: background 0.15s;
  white-space: nowrap;
}
.btn-new:hover { background: var(--white); }

/* ── Alert ── */
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

/* ── Page wrap ── */
.page-wrap {
  width: 92%;
  max-width: 1200px;
  margin: 28px auto 60px;
}

/* ── Stats bar ── */
.stats-bar {
  font-size: 0.8125rem;
  color: var(--ash-3);
  margin-bottom: 16px;
}
.stats-bar span { color: var(--white); font-weight: 500; }

/* ── Table wrapper ── */
.table-wrap {
  background: var(--ink-2);
  border: 1px solid var(--ink-4);
  border-radius: 12px;
  overflow: hidden;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

/* ── Table ── */
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

/* ── # column ── */
.col-num {
  width: 48px;
  color: var(--ash-3);
  font-size: 0.8rem;
  font-weight: 500;
}

/* ── Image thumbnail ── */
.col-img { width: 72px; }
.thumb {
  width: 52px;
  height: 52px;
  object-fit: cover;
  border-radius: 7px;
  border: 1px solid var(--ink-4);
  display: block;
}

/* ── Heading ── */
.col-heading { min-width: 160px; max-width: 220px; }
.cell-heading {
  font-weight: 600;
  font-size: 0.9rem;
  color: var(--white);
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* ── Paragraph ── */
.col-para { min-width: 180px; }
.cell-para {
  color: var(--ash-3);
  font-size: 0.8375rem;
  line-height: 1.5;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* ── Link ── */
.col-link { width: 90px; }
.link-badge {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  font-size: 0.75rem;
  font-weight: 500;
  padding: 3px 10px;
  border-radius: 20px;
  background: rgba(201, 195, 184, 0.08);
  color: var(--ash-5);
  text-decoration: none;
  border: 1px solid var(--ink-4);
  transition: color 0.15s;
  white-space: nowrap;
}
.link-badge:hover { color: var(--white); }
.no-link { color: var(--ink-6); font-size: 0.8rem; }

/* ── Date ── */
.col-date { width: 110px; white-space: nowrap; color: var(--ash-3); font-size: 0.8rem; }

/* ── Actions ── */
.col-actions { width: 130px; }
.action-btns {
  display: flex;
  gap: 7px;
}

.btn-edit {
  flex: 1;
  padding: 7px 10px;
  background: transparent;
  color: var(--ash-3);
  border: 1px solid var(--ink-4);
  border-radius: 7px;
  font-family: 'Inter', Arial, sans-serif;
  font-size: 0.775rem;
  font-weight: 500;
  text-decoration: none;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;
  transition: border-color 0.15s, color 0.15s;
  white-space: nowrap;
}
.btn-edit:hover { border-color: var(--ash-3); color: var(--white); }

.btn-delete {
  flex: 1;
  padding: 7px 10px;
  background: transparent;
  color: var(--error);
  border: 1px solid rgba(255, 107, 107, 0.2);
  border-radius: 7px;
  font-family: 'Inter', Arial, sans-serif;
  font-size: 0.775rem;
  font-weight: 500;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;
  transition: border-color 0.15s, background 0.15s;
  white-space: nowrap;
}
.btn-delete:hover {
  background: rgba(255, 107, 107, 0.08);
  border-color: var(--error);
}

/* ── Empty state ── */
.empty-row td {
  text-align: center;
  padding: 70px 20px;
  color: var(--ash-3);
}
.empty-row svg { opacity: 0.15; display: block; margin: 0 auto 14px; }
.empty-row h2 { font-size: 1rem; font-weight: 500; color: var(--ash-3); margin: 0 0 6px; }
.empty-row p { font-size: 0.85rem; margin: 0 0 18px; }
.empty-row a {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 9px 18px;
  background: var(--paper);
  color: var(--ink);
  border-radius: 8px;
  font-size: 0.875rem;
  font-weight: 600;
  text-decoration: none;
}

/* ── Pagination ── */
.pagination-wrap {
  display: flex;
  justify-content: center;
  margin-top: 28px;
  flex-wrap: wrap;
}
.pagination-wrap nav { display: flex; align-items: center; gap: 4px; }
.pagination-wrap nav svg { display: none; }
.pagination-wrap .pagination {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
  gap: 4px;
  flex-wrap: wrap;
  justify-content: center;
}
.pagination-wrap .page-item .page-link {
  display: flex;
  align-items: center;
  justify-content: center;
  min-width: 36px;
  height: 36px;
  padding: 0 10px;
  background: var(--ink-2);
  border: 1px solid var(--ink-4);
  color: var(--ash-3);
  border-radius: 7px;
  font-family: 'Inter', Arial, sans-serif;
  font-size: 0.875rem;
  text-decoration: none;
  transition: border-color 0.15s, color 0.15s;
}
.pagination-wrap .page-item .page-link:hover { border-color: var(--ash-3); color: var(--white); }
.pagination-wrap .page-item.active .page-link {
  background: var(--paper);
  border-color: var(--paper);
  color: var(--ink);
  font-weight: 600;
}
.pagination-wrap .page-item.disabled .page-link { opacity: 0.3; cursor: not-allowed; }

/* ── Delete modal ── */
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

/* ── Mobile card layout ── */
@media (max-width: 640px) {
  header.topbar { padding: 0 16px; height: 52px; }
  .topbar__title { font-size: 13px; }

  .page-wrap { width: 100%; padding: 0 12px; margin-top: 20px; }

  /* Hide table entirely on mobile */
  .table-wrap { display: none; }

  /* Card grid */
  .card-list { display: flex; flex-direction: column; gap: 10px; }

  .blog-card {
    background: var(--ink-2);
    border: 1px solid var(--ink-4);
    border-radius: 12px;
    padding: 14px;
    display: flex;
    gap: 12px;
    align-items: flex-start;
  }
  .blog-card .card-thumb {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid var(--ink-4);
    flex-shrink: 0;
  }
  .blog-card .card-body { flex: 1; min-width: 0; }
  .blog-card .card-num {
    font-size: 0.72rem;
    color: var(--ash-3);
    font-weight: 500;
    margin-bottom: 3px;
  }
  .blog-card .card-title {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--white);
    margin: 0 0 4px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .blog-card .card-date {
    font-size: 0.75rem;
    color: var(--ash-3);
    margin-bottom: 10px;
  }
  .blog-card .card-actions {
    display: flex;
    gap: 8px;
  }
  .blog-card .btn-edit,
  .blog-card .btn-delete {
    flex: 1;
    padding: 8px 10px;
    font-size: 0.8rem;
  }

  /* Empty state on mobile */
  .empty-card {
    text-align: center;
    padding: 60px 20px;
    color: var(--ash-3);
  }
  .empty-card svg { opacity: 0.15; display: block; margin: 0 auto 14px; }
  .empty-card h2 { font-size: 1rem; font-weight: 500; color: var(--ash-3); margin: 0 0 6px; }
  .empty-card p { font-size: 0.85rem; margin: 0 0 18px; }
  .empty-card a {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 18px;
    background: var(--paper);
    color: var(--ink);
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 600;
    text-decoration: none;
  }

  .modal { padding: 22px 18px 20px; }
  .modal-actions { flex-direction: column; }
}

/* ── Tablet ── */
@media (min-width: 641px) {
  .card-list { display: none; }
  .empty-card { display: none; }
}

@media (min-width: 641px) and (max-width: 900px) {
  .col-para { display: none; }
  .col-link { display: none; }
}
</style>
</head>

<body>

<header class="topbar">
  <h1 class="topbar__title">Blog Posts</h1>
  <div class="topbar__right">
    <a href="{{ route('blogs.create') }}" class="btn-new">
      <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/></svg>
      New Post
    </a>
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

  @if($blogs->total() > 0)
    <div class="stats-bar">
      Total <span>{{ $blogs->total() }}</span> blogs — Page <span>{{ $blogs->currentPage() }}</span> of <span>{{ $blogs->lastPage() }}</span>
    </div>
  @endif

  {{-- ── Desktop / Tablet Table ── --}}
  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th class="col-num">#</th>
          <th class="col-img">Image</th>
          <th class="col-heading">Title</th>
          <th class="col-para">Excerpt</th>
          <th class="col-link">Link</th>
          <th class="col-date">Date</th>
          <th class="col-actions">Actions</th>
        </tr>
      </thead>
      <tbody>

        @if($blogs->count() > 0)
          @foreach($blogs as $index => $blog)
            <tr>

              {{-- # --}}
              <td class="col-num">
                {{ ($blogs->currentPage() - 1) * $blogs->perPage() + $loop->iteration }}
              </td>

              {{-- Image --}}
              <td class="col-img">
                <img src="{{ $blog->image }}" alt="{{ $blog->heading }}" class="thumb">
              </td>

              {{-- Heading --}}
              <td class="col-heading">
                <div class="cell-heading">{{ $blog->heading }}</div>
              </td>

              {{-- Paragraph --}}
              <td class="col-para">
                <div class="cell-para">{{ $blog->paragraph }}</div>
              </td>

              {{-- Link --}}
              <td class="col-link">
                @if($blog->link)
                  <a href="{{ $blog->link }}" target="_blank" class="link-badge">
                    <svg width="10" height="10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    View
                  </a>
                @else
                  <span class="no-link">—</span>
                @endif
              </td>

              {{-- Date --}}
              <td class="col-date">{{ $blog->created_at->format('M d, Y') }}</td>

              {{-- Actions --}}
              <td class="col-actions">
                <div class="action-btns">
                  <a href="{{ route('blogs.edit', $blog->id) }}" class="btn-edit">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Edit
                  </a>
                  <button
                    class="btn-delete"
                    onclick="openDeleteModal({{ $blog->id }}, '{{ addslashes($blog->heading) }}')"
                  >
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6m5 0V4a1 1 0 011-1h2a1 1 0 011 1v2"/></svg>
                    Delete
                  </button>
                </div>
              </td>

            </tr>
          @endforeach

        @else
          <tr class="empty-row">
            <td colspan="7">
              <svg width="50" height="50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
              <h2>No blogs found</h2>
              <p>Write your first blog post and it will appear here.</p>
              <a href="{{ route('blogs.create') }}">
                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/></svg>
                Create Blog
              </a>
            </td>
          </tr>
        @endif

      </tbody>
    </table>
  </div>

  {{-- ── Mobile Card List ── --}}
  <div class="card-list">
    @if($blogs->count() > 0)
      @foreach($blogs as $blog)
        <div class="blog-card">
          <img src="{{ $blog->image }}" alt="{{ $blog->heading }}" class="card-thumb">
          <div class="card-body">
            <div class="card-num">#{{ ($blogs->currentPage() - 1) * $blogs->perPage() + $loop->iteration }}</div>
            <div class="card-title">{{ $blog->heading }}</div>
            <div class="card-date">{{ $blog->created_at->format('M d, Y') }}</div>
            <div class="card-actions">
              <a href="{{ route('blogs.edit', $blog->id) }}" class="btn-edit">
                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Edit
              </a>
              <button
                class="btn-delete"
                onclick="openDeleteModal({{ $blog->id }}, '{{ addslashes($blog->heading) }}')"
              >
                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6m5 0V4a1 1 0 011-1h2a1 1 0 011 1v2"/></svg>
                Delete
              </button>
            </div>
          </div>
        </div>
      @endforeach
    @else
      <div class="empty-card">
        <svg width="50" height="50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        <h2>No blogs found</h2>
        <p>Write your first blog post and it will appear here.</p>
        <a href="{{ route('blogs.create') }}">
          <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/></svg>
          Create Blog
        </a>
      </div>
    @endif
  </div>

  {{-- Pagination --}}
  @if($blogs->hasPages())
    <div class="pagination-wrap">
      {{ $blogs->links() }}
    </div>
  @endif

</div>

{{-- Delete confirmation modal --}}
<div class="modal-backdrop" id="deleteModal">
  <div class="modal">
    <div class="modal-icon">
      <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#ff6b6b" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6m5 0V4a1 1 0 011-1h2a1 1 0 011 1v2"/></svg>
    </div>
    <h2>Delete this Blog?</h2>
    <p id="modal-blog-name" style="color: var(--white); font-weight:500;"></p>
    <p>This action cannot be undone. The image will also be permanently removed.</p>
    <div class="modal-actions">
      <button class="modal-cancel" onclick="closeDeleteModal()">Cancel</button>
      <button class="modal-confirm" id="modal-confirm-btn">Yes, Delete</button>
    </div>
  </div>
</div>

{{-- Hidden delete form --}}
<form id="deleteForm" method="POST" style="display:none;">
  @csrf
  @method('DELETE')
</form>

<script>
function openDeleteModal(id, heading) {
  document.getElementById('modal-blog-name').textContent = '"' + heading + '"';
  document.getElementById('modal-confirm-btn').onclick = function() {
    const form = document.getElementById('deleteForm');
    form.action = '/blogs/' + id;
    form.submit();
  };
  document.getElementById('deleteModal').classList.add('active');
}
function closeDeleteModal() {
  document.getElementById('deleteModal').classList.remove('active');
}
document.getElementById('deleteModal').addEventListener('click', function(e) {
  if (e.target === this) closeDeleteModal();
});
</script>

</body>
</html>
