const links = document.querySelectorAll('.sidebar__link');
const sections = document.querySelectorAll('.section');
const pageTitle = document.getElementById('pageTitle');

const titles = {
  dashboard: 'Dashboard',
  books: 'Books',
  blogs: 'Blog Posts',
  about: 'About',
  newsletter: 'Newsletter'
};

function goTo(name) {
  links.forEach(l => l.classList.toggle('active', l.dataset.section === name));
  sections.forEach(s => s.classList.toggle('active', s.id === 'sec-' + name));
  pageTitle.textContent = titles[name] || name;
}

links.forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault();
    goTo(link.dataset.section);
  });
});

// Modal
const overlay = document.getElementById('modalOverlay');
const modalTitle = document.getElementById('modalTitle');
const modalBody = document.getElementById('modalBody');

const bookForm = `
  <div class="form-group">
    <label>Title</label>
    <input type="text" placeholder="Book title" />
  </div>
  <div class="form-group">
    <label>Genre</label>
    <input type="text" placeholder="e.g. Psychological Horror" />
  </div>
  <div class="form-row">
    <div class="form-group">
      <label>Pages</label>
      <input type="number" placeholder="412" />
    </div>
    <div class="form-group">
      <label>Status</label>
      <select>
        <option>Published</option>
        <option>Upcoming</option>
        <option>Draft</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea rows="4" placeholder="Book description..."></textarea>
  </div>
  <div class="form-group">
    <label>Cover Image (filename)</label>
    <input type="text" placeholder="cover.jpg" />
  </div>
  <div class="modal__footer">
    <button class="btn-cancel" onclick="closeModal()">Cancel</button>
    <button class="btn-add" onclick="closeModal()">Save Book</button>
  </div>
`;

const blogForm = `
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" placeholder="Post title" />
  </div>
  <div class="form-row">
    <div class="form-group">
      <label>Tag</label>
      <select>
        <option>Craft</option>
        <option>Reading List</option>
        <option>Behind the Book</option>
        <option>Essay</option>
      </select>
    </div>
    <div class="form-group">
      <label>Date</label>
      <input type="date" />
    </div>
  </div>
  <div class="form-group">
    <label>External Link (Blogspot URL)</label>
    <input type="url" placeholder="https://cpreardon.blogspot.com/..." />
  </div>
  <div class="form-group">
    <label>Excerpt</label>
    <textarea rows="4" placeholder="Short description..."></textarea>
  </div>
  <div class="form-group">
    <label>Image (filename)</label>
    <input type="text" placeholder="image.png" />
  </div>
  <div class="modal__footer">
    <button class="btn-cancel" onclick="closeModal()">Cancel</button>
    <button class="btn-add" onclick="closeModal()">Save Post</button>
  </div>
`;

function openModal(type) {
  modalTitle.textContent = type === 'book' ? 'Add Book' : 'New Post';
  modalBody.innerHTML = type === 'book' ? bookForm : blogForm;
  overlay.classList.add('open');
}
function closeModal() {
  overlay.classList.remove('open');
}
overlay.addEventListener('click', e => { if (e.target === overlay) closeModal(); });

// Save feedback
document.getElementById('saveAbout').addEventListener('click', function() {
  this.textContent = 'Saved ✓';
  setTimeout(() => this.textContent = 'Save Changes', 2000);
});
document.getElementById('saveNewsletter').addEventListener('click', function() {
  this.textContent = 'Saved ✓';
  setTimeout(() => this.textContent = 'Save Changes', 2000);
});
