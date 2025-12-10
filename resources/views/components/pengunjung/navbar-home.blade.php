<!-- Spacer to push content after fixed navbar -->
<div class="h-[60px] w-full"></div>

<div id="navbar" class="bg-white fixed left-0 top-0 w-full z-50 font-dm-sans light shadow">
  <div
    class="w-full h-1 bg-gradient-to-r 
    from-purple-[#9BA4B5] 
    via-purple-[#394867] 
    to-purple-[#F1F6F9]">
  </div>

  <nav class="relative px-4 md:px-10 flex items-center h-[60px]">

    <!-- Left: Logo -->
    <a href="/" class="flex items-center gap-3 min-w-fit z-20">
      <img src="{{ asset('img/logo.png') }}" alt="logo"
        class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg shadow-md bg-gradient-to-tr from-purple-100 to-purple-300 p-1">
      <span
        class="font-poppins font-bold text-[17px] leading-5 text-purple-800 hidden sm:inline-block">
        PERPUSTAKAAN<br>
        <span class="font-medium text-[13px] text-purple-500 block -mt-0.5">USTAD SUKIRMAN <span
            class="text-purple-400">DESA WONOSARI</span></span>
      </span>
    </a>

    <!-- Center: Menu utama Desktop (benar-benar di tengah)-->
    <div
      class="hidden md:flex absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 gap-8 items-center text-[16px] h-full z-10">
      <a class="transition-all duration-300 font-bold py-2 px-2 hover:text-purple-600"
        href="/">HOME</a>
      <a class="transition-all duration-300 font-bold py-2 px-2 hover:text-purple-600"
        href="/profil">PROFIL</a>
      <a class="transition-all duration-300 font-bold py-2 px-2 hover:text-purple-600"
        href="/koleksi-buku">KOLEKSI BUKU</a>
    </div>

    <!-- Right: Tombol Theme & Login -->
    <div class="flex items-center gap-3 md:gap-5 ml-auto z-20">
      <button id="btn-theme" onclick="setTheme()"
        class="hidden sm:flex px-4 py-2 rounded-lg bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 text-white font-semibold shadow-md hover:from-purple-600 hover:to-purple-800 transition-colors duration-300">
        <i class="fa-solid fa-moon mr-2"></i>
        <span class="hidden sm:inline">Theme</span>
      </button>
      <div>
        <button id="btn-login"
          class="px-4 py-2 rounded-lg bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 text-white font-semibold shadow-md hover:from-purple-600 hover:to-purple-800 transition-colors duration-300 flex items-center gap-1">
          <i class="fa-solid fa-sign-in-alt mr-2"></i>
          <span class=" xs:inline">Login</span>
        </button>
        <div id="login-modal"
          class="fixed inset-0 z-[9999] flex items-center justify-center bg-[rgb(0,0,0,0.5)] bg-opacity-40 backdrop-blur-sm hidden">
          <div class="relative w-fit">
            <x-admin.login />
          </div>
        </div>
      </div>
      <!-- Hamburger menu mobile -->
      <button id="hamburger-btn"
        class="md:hidden ml-2 flex items-center justify-center p-2 text-purple-700 hover:bg-purple-100 rounded transition focus:outline-none"
        aria-label="Buka menu" aria-expanded="false">
        <svg class="block h-8 w-8" id="hamburger-icon" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg class="hidden h-8 w-8" id="close-icon" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Menu Mobile: offcanvas -->
    <div id="mobile-menu"
      class="fixed top-0 left-0 w-full h-full z-[999] bg-white bg-opacity-95 backdrop-blur-xl transform -translate-x-full transition-transform duration-300 md:hidden flex flex-col"
      aria-modal="true" tabindex="-1">
      <div class="flex items-center justify-between px-6 py-5 border-b border-purple-100 shadow-sm">
        <a href="/" class="flex items-center gap-3 min-w-fit">
          <img src="img/logo.png" alt="logo" class="w-10 h-10 object-contain">
        </a>
        <button id="close-mobile-menu"
          class="rounded p-2 text-purple-700 hover:bg-purple-100 transition focus:outline-none"
          aria-label="Tutup menu">
          <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-col gap-2 px-8 pt-8 text-base font-medium">
        <a href="/" class="py-3 text-purple-900 hover:text-purple-700 transition">Home</a>
        <a href="/profil" class="py-3 text-purple-900 hover:text-purple-700 transition">Profil</a>
        <a href="/koleksi-buku"
          class="py-3 text-purple-900 hover:text-purple-700 transition">Koleksi Buku</a>
        <button id="mobile-theme"
          class="mt-3 px-4 py-2 rounded-lg bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 text-white font-semibold shadow">
          <i class="fa-solid fa-moon mr-2"></i>Theme
        </button>
        <button id="mobile-login"
          class="mt-3 px-4 py-2 rounded-lg bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 text-white font-semibold shadow">
          <i class="fa-solid fa-sign-in-alt mr-2"></i>Login
        </button>
      </div>
    </div>
  </nav>

  <script>
    // Navbar Mobile
    document.addEventListener('DOMContentLoaded', function() {
      const hamburgerBtn = document.getElementById('hamburger-btn');
      const mobileMenu = document.getElementById('mobile-menu');
      const closeMobileMenu = document.getElementById('close-mobile-menu');
      const hamburgerIcon = document.getElementById('hamburger-icon');
      const closeIcon = document.getElementById('close-icon');

      function openMobileMenu() {
        mobileMenu.classList.remove('-translate-x-full');
        mobileMenu.classList.add('translate-x-0');
        hamburgerIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
        // Accessibility
        hamburgerBtn.setAttribute('aria-expanded', 'true');
        document.body.classList.add('overflow-hidden');
      }

      function closeMenu() {
        mobileMenu.classList.remove('translate-x-0');
        mobileMenu.classList.add('-translate-x-full');
        hamburgerIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
        hamburgerBtn.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('overflow-hidden');
      }

      hamburgerBtn.addEventListener('click', openMobileMenu);
      if (closeMobileMenu) {
        closeMobileMenu.addEventListener('click', closeMenu);
      }
      // Close on overlay click
      mobileMenu.addEventListener('click', function(e) {
        if (e.target === mobileMenu) {
          closeMenu();
        }
      });
      // Close on ESC
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeMenu();
      });
      // Move focus to mobile menu on open for better accessibility

      // Mobile theme button
      const mobileTheme = document.getElementById('mobile-theme');
      if (mobileTheme) {
        mobileTheme.onclick = function() {
          setTheme();
        };
      }
      // Mobile login button
      const mobileLogin = document.getElementById('mobile-login');
      if (mobileLogin) {
        mobileLogin.onclick = function() {
          document.getElementById('login-modal').classList.remove('hidden');
          closeMenu();
        };
      }
    });

    // Login Modal on desktop
    document.addEventListener('DOMContentLoaded', function() {
      const btnLogin = document.getElementById('btn-login');
      const loginModal = document.getElementById('login-modal');
      if (btnLogin) {
        btnLogin.addEventListener('click', function() {
          loginModal.classList.remove('hidden');
        });
      }
      // Close modal when clicking the overlay
      loginModal.addEventListener('click', function(e) {
        if (e.target === loginModal) {
          loginModal.classList.add('hidden');
        }
      });
      // ESC also closes modal
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          if (!loginModal.classList.contains('hidden')) {
            loginModal.classList.add('hidden');
          }
        }
      });
    });
  </script>
</div>
<!-- End navbar -->
