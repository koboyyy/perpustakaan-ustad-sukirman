<!-- Spacer for fixed navbar -->

<div class="h-[60px] w-full"></div>

<div id="navbar" class="bg-[#F1F6F9] fixed left-0 top-0 w-full z-50 font-dm-sans shadow">
  <div class="w-full h-1 bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5]"></div>

  <nav class="relative px-4 md:px-10 flex items-center h-[60px]">

    <!-- Left: Logo -->
    <a href="{{ route('home') }}" class="flex items-center gap-3 min-w-fit z-20">
      <img src="{{ asset('img/logo.png') }}" alt="logo"
        class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg shadow-md p-1">
      <span
        class="font-poppins font-bold text-[17px] leading-5 text-[#212A3E] hidden sm:inline-block">
        PERPUSTAKAAN<br>
        <span class="font-medium text-[13px] text-[#394867] block -mt-0.5">
          USTAD SUKIRMAN <span class="text-[#9BA4B5]">DESA WONOSARI</span>
        </span>
      </span>
    </a>

    <!-- Center: Menu utama Desktop -->
    <div
      class="hidden md:flex absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 gap-8 items-center text-[16px] h-full z-10">
      <a class="transition-all duration-300 font-bold py-2 px-2 hover:text-[#394867]"
        href="{{ route('home') }}">HOME</a>
      <a class="transition-all duration-300 font-bold py-2 px-2 hover:text-[#394867]"
        href="/profil">PROFIL</a>
      <a class="transition-all duration-300 font-bold py-2 px-2 hover:text-[#394867]"
        href="/koleksi-buku">KOLEKSI BUKU</a>
    </div>

    <!-- Right: Tombol Theme & Login -->
    <div class="flex items-center gap-3 md:gap-5 ml-auto z-20">
      {{-- Ganti Tema --}}
      {{-- <button id="btn-theme" onclick="setTheme()"
        class="hidden sm:flex px-4 py-2 rounded-lg bg-[#394867] text-[#F1F6F9] font-semibold shadow-md hover:bg-[#212A3E] transition-colors duration-300 items-center"
        type="button">
        <i class="fa-solid fa-moon mr-2"></i>
        <span class="hidden sm:inline">Theme</span>
      </button> --}}

      {{-- login --}}
      @guest
        <div>
          <a id="btn-login" href="{{ route('login') }}"
            class="px-4 py-2 rounded-lg bg-[#394867] text-[#F1F6F9] font-semibold shadow-md hover:bg-[#212A3E] transition-colors duration-300 flex items-center gap-1">
            <i class="fa-solid fa-sign-in-alt mr-2"></i>
            <span class="xs:inline">Login</span>
          </a>
        </div>
      @endguest

      {{-- Logout --}}
      @auth
        <form method="POST" action="{{ route('logout') }}" class="inline-block">
          @csrf
          <button type="submit"
            class="px-4 py-2 rounded-lg bg-[#394867] text-[#F1F6F9] font-semibold shadow-md hover:bg-[#212A3E] transition-colors duration-300 flex items-center gap-1 ml-3">
            <i class="fa-solid fa-sign-out-alt mr-2"></i>
            <span class="xs:inline">Logout</span>
          </button>
        </form>
      @endauth

      {{-- @auth
        <form method="POST" action="{{ route('home') }}" class="inline-block">
          @csrf
          <button type="submit"
            class="px-4 py-2 rounded-lg bg-[#394867] text-[#F1F6F9] font-semibold shadow-md hover:bg-[#212A3E] transition-colors duration-300 flex items-center gap-1 ml-3">
            <i class="fa-solid fa-sign-out-alt mr-2"></i>
            <span class="xs:inline">Dashboard</span>
          </button>
        </form>
      @endauth --}}
      <!-- Hamburger menu mobile -->
      <button id="hamburger-btn"
        class="md:hidden ml-2 flex items-center justify-center p-2 text-[#394867] hover:bg-[#F1F6F9] rounded transition focus:outline-none"
        aria-label="Buka menu" aria-expanded="false" type="button">
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
      aria-modal="true" tabindex="-1" style="display: none;">
      <div class="flex items-center justify-between px-6 py-5 border-b border-[#9BA4B5] shadow-sm">
        <a href="{{ route('home') }}" class="flex items-center gap-3 min-w-fit">
          <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-10 h-10 object-contain">
        </a>
        <button id="close-mobile-menu"
          class="rounded p-2 text-[#394867] hover:bg-[#F1F6F9] transition focus:outline-none"
          aria-label="Tutup menu" type="button">
          <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-col gap-2 px-8 pt-8 text-base font-medium">
        <a href="{{ route('home') }}"
          class="py-3 text-[#212A3E] hover:text-[#394867] transition">Home</a>
        <a href="/profil" class="py-3 text-[#212A3E] hover:text-[#394867] transition">Profil</a>
        <a href="/koleksi-buku" class="py-3 text-[#212A3E] hover:text-[#394867] transition">Koleksi
          Buku</a>
        <button id="mobile-theme"
          class="mt-3 px-4 py-2 rounded-lg bg-[#394867] text-[#F1F6F9] font-semibold shadow"
          type="button">
          <i class="fa-solid fa-moon mr-2"></i>Theme
        </button>
        @guest
          <a id="mobile-login" href="{{ route('login') }}"
            class="mt-3 px-4 py-2 rounded-lg bg-[#394867] text-[#F1F6F9] font-semibold shadow flex items-center gap-1">
            <i class="fa-solid fa-sign-in-alt mr-2"></i>Login
          </a>
        @endguest
      </div>
    </div>
  </nav>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const hamburgerBtn = document.getElementById('hamburger-btn');
      const mobileMenu = document.getElementById('mobile-menu');
      const closeMobileMenu = document.getElementById('close-mobile-menu');
      const hamburgerIcon = document.getElementById('hamburger-icon');
      const closeIcon = document.getElementById('close-icon');

      // Show/Hide mobile menu
      function openMobileMenu() {
        mobileMenu.classList.remove('-translate-x-full');
        mobileMenu.classList.add('translate-x-0');
        hamburgerIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
        hamburgerBtn.setAttribute('aria-expanded', 'true');
        document.body.classList.add('overflow-hidden');
        mobileMenu.style.display = "flex";
      }

      function closeMenu() {
        mobileMenu.classList.remove('translate-x-0');
        mobileMenu.classList.add('-translate-x-full');
        hamburgerIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
        hamburgerBtn.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('overflow-hidden');
        // Hide after transition
        setTimeout(function() {
          mobileMenu.style.display = "none";
        }, 300);
      }

      hamburgerBtn.addEventListener('click', function() {
        // Only open if not already open
        if (mobileMenu.classList.contains('-translate-x-full')) {
          openMobileMenu();
        }
      });
      if (closeMobileMenu) {
        closeMobileMenu.addEventListener('click', closeMenu);
      }

      // Overlay click to close
      mobileMenu.addEventListener('click', function(e) {
        if (e.target === mobileMenu) {
          closeMenu();
        }
      });

      // Escape key to close
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          if (!mobileMenu.classList.contains('-translate-x-full')) {
            closeMenu();
          }
        }
      });

      // Theme button in mobile menu
      const mobileTheme = document.getElementById('mobile-theme');
      if (mobileTheme) {
        mobileTheme.onclick = function() {
          setTheme();
        };
      }
    });
  </script>
</div>
<!-- End navbar -->
