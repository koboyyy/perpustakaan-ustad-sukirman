// Load random images for book covers
const srcRandomImg = 'https://picsum.photos/600/700';
let srcImg = document.querySelectorAll('.buku');

srcImg.forEach(async img => {
  const respon = await fetch(srcRandomImg);
  const data = await respon.url;

  try {
    img.src = data;
  } catch (err) {
    console.log('error: ' + err);
  }
});

// Categories list
const kategoris = [
  'Semua Kategori',
  'Arsitektur & Property',
  'Seni',
  'Blog & Majalah',
  'Bisnis',
  'Agensi Kreatif',
  'Hiburan',
  'Mode',
  'Makanan & Restoran',
  'Kesehatan & Kecantikan',
  'Halaman Arahan',
  'Toko Online',
  'Lainnya',
  'Presentasi Pribadi',
  'Fotografi',
  'Portofolio',
  'Olahraga',
  'Teknologi',
  'Bepergian',
  'Pernikahan',
];

// Initialize categories
const lKategori = document.getElementById('kategori');
const a = document.querySelectorAll('a');

a.forEach((as, a) => {
  as.classList.add('link-light');
});

kategoris.forEach((kategori, kategoris) => {
  const a = document.createElement('a');
  a.setAttribute('href', '');
  a.innerText = `${kategori}`;
  lKategori.append(a);
});

// Theme switching function
function setTheme() {
  const body = document.body;
  const navbar = document.querySelector('#navbar');
  const btnTheme = document.querySelector('#btn-theme');
  const pencarian = document.querySelector('#pencarian');
  const footer = document.querySelector('footer');

  body.classList.toggle('light');
  body.classList.toggle('dark');

  if (body.classList.contains('dark')) {
    navbar.classList.replace('light', 'dark');
    btnTheme.innerText = 'Light Mode';
    pencarian.classList.replace('light', 'dark');
    footer.classList.replace('light', 'dark');
    a.forEach((as, a) => {
      as.classList.replace('link-light', 'link-dark');
    });
  } else {
    navbar.classList.replace('dark', 'light');
    btnTheme.innerText = 'Dark Mode';
    pencarian.classList.replace('dark', 'light');
    footer.classList.replace('dark', 'light');
    a.forEach((as, a) => {
      as.classList.replace('link-dark', 'link-light');
    });
  }
}

// Show Mobile Nav
function showMobileNav() {
  const mobileMenu = document.querySelector('#mobile-menu');

  if (mobileMenu.classList.contains('hidden')) {
    mobileMenu.classList.replace('hidden', 'block');
  } else {
    mobileMenu.classList.replace('block', 'hidden');
  }
}

// Make setTheme available globally for onclick handler
window.setTheme = setTheme;
