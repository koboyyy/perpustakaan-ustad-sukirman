// Menambah efek grayscale pada cover card lain saat salah satu card di-hover
document.addEventListener('DOMContentLoaded', function () {
  const wrapper = document.getElementById('rekomendasi-cards-wrapper');
  if (!wrapper) return;
  const cards = wrapper.querySelectorAll('.rekomendasi-card');

  cards.forEach(card => {
    card.addEventListener('mouseenter', function () {
      cards.forEach(otherCard => {
        if (otherCard !== card) {
          const img = otherCard.querySelector('.book');
          if (img) {
            img.classList.add('grayscale', 'opacity-60');
            // Pastikan juga ada transition!
            img.style.transition = 'filter 300ms, opacity 300ms';
          }
        }
      });
    });
    card.addEventListener('mouseleave', function () {
      cards.forEach(otherCard => {
        const img = otherCard.querySelector('.book');
        if (img) {
          img.classList.remove('grayscale', 'opacity-60');
          img.style.transition = 'filter 300ms, opacity 300ms';
        }
      });
    });
  });
});

// Load random images for book covers
const srcRandomImg = 'https://picsum.photos/600/700';
const imgBuku = document.querySelectorAll('.buku');

imgBuku.forEach(async img => {
  const respon = await fetch(srcRandomImg);
  const data = await respon.url;

  try {
    img.src = data;
  } catch (err) {
    console.log('error: ' + err);
  }
});

// Categories list
function categoriesList() {
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

  kategoris.forEach(kategori => {
    const a = document.createElement('a');
    a.setAttribute('href', '');
    a.innerText = `${kategori}`;
    lKategori.append(a);
  });
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

// Theme switching function for home page
function setTheme() {
  const body = document.body;
  const navbar = document.querySelector('#navbar');
  const btnTheme = document.querySelector('#btn-theme');
  const footer = document.querySelector('footer');
  const dropdownMenu = document.querySelector('#dropdown-menu');

  body.classList.toggle('light');
  body.classList.toggle('dark');

  if (body.classList.contains('dark')) {
    if (navbar) {
      navbar.classList.replace('light', 'dark');
      navbar.classList.replace('bg-white', 'bg-gray-900');
    }
    if (btnTheme) {
      btnTheme.innerHTML = '<i class="fa-solid fa-sun mr-2"></i>Light Mode';
    }
    if (footer) {
      footer.classList.replace('light', 'dark');
      footer.classList.replace('bg-[#34344A]', 'bg-black');
    }
    if (dropdownMenu) {
      dropdownMenu.classList.add('dark:bg-gray-800');
    }
  } else {
    if (navbar) {
      navbar.classList.replace('dark', 'light');
      navbar.classList.replace('bg-gray-900', 'bg-white');
    }
    if (btnTheme) {
      btnTheme.innerHTML = '<i class="fa-solid fa-moon mr-2"></i>Theme';
    }
    if (footer) {
      footer.classList.replace('dark', 'light');
      footer.classList.replace('bg-black', 'bg-[#34344A]');
    }
    if (dropdownMenu) {
      dropdownMenu.classList.remove('dark:bg-gray-800');
    }
  }
}

categoriesList();

// Make setTheme available globally for onclick handler
window.setTheme = setTheme;
