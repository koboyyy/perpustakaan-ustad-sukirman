<!-- Spacer for fixed navbar -->
<div class="h-[73px] w-full"></div>

<div id="navbar"
  class="bg-[#F1F6F9] fixed left-0 top-0 w-full z-50 font-sans shadow-sm border-b border-[#E0E8EF]">
  <div class="w-full h-1 bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5]"></div>
  <nav class="relative px-3 md:px-10 flex items-center h-[68px] select-none">

    <!-- Left: Logo -->
    <a href="{{ route('home') }}" class="flex items-center gap-3 min-w-fit z-20">
      <img src="{{ asset('img/logo.png') }}" alt="logo"
        class="w-9 h-9 sm:w-12 sm:h-12 rounded-md shadow p-1 bg-[#fff] border border-[#E0E8EF]">
      <div class="leading-tight">
        <span class="font-poppins font-bold text-[18px] text-[#212A3E]">PERPUSTAKAAN</span>
        <span class="block font-medium text-[12px] text-[#394867]">
          USTAD SUKIRMAN <span class="text-[#9BA4B5]">DESA WONOSARI</span>
        </span>
      </div>
    </a>

    <!-- Center Desktop Menu -->
    <ul
      class="hidden md:flex absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 gap-6 items-center text-[16px] h-full z-10">
      <li>
        <a href="{{ route('home') }}"
          class="transition-colors duration-200 font-bold px-3 py-2 rounded hover:text-[#394867] hover:bg-[#E0E8EF] @if (request()->routeIs('home')) text-[#394867] bg-[#e8eaed] @endif">HOME</a>
      </li>
      <li>
        <a href="/profil"
          class="transition-colors duration-200 font-bold px-3 py-2 rounded hover:text-[#394867] hover:bg-[#E0E8EF] {{ request()->is('profil') ? 'text-[#394867] bg-[#e8eaed]' : '' }}">PROFIL</a>
      </li>
      <li>
        @guest
          <a href="{{ route('login') }}"
            class="transition-colors duration-200 font-bold px-3 py-2 rounded hover:text-[#394867] hover:bg-[#E0E8EF]">KOLEKSI
            BUKU</a>
        @endguest
        @auth
          <a href="/koleksi-buku"
            class="transition-colors duration-200 font-bold px-3 py-2 rounded hover:text-[#394867] hover:bg-[#E0E8EF] {{ request()->is('koleksi-buku') ? 'text-[#394867] bg-[#e8eaed]' : '' }}">KOLEKSI
            BUKU</a>
        @endauth
      </li>
    </ul>

    <!-- Right: Buttons -->
    <div class="flex items-center gap-2 md:gap-4 ml-auto z-20">

      <!-- Theme Toggle Desktop -->
      <button type="button" id="desktop-theme" aria-label="Switch theme"
        class="hidden sm:flex items-center text-[#394867] bg-white hover:bg-[#E0E8EF] border border-[#E0E8EF] rounded-md p-2 shadow transition">
        <i class="fa-solid fa-moon"></i>
      </button>

      @guest
        <a id="btn-login" href="{{ route('login') }}"
          class="px-4 py-2 rounded-md bg-[#394867] text-[#F1F6F9] font-semibold shadow hover:bg-[#21324b] transition flex items-center gap-2">
          <i class="fa-solid fa-right-to-bracket"></i>
          <span>Login</span>
        </a>
      @endguest

      @can('admin')
        <a href="{{ route('analitik') }}"
          class="px-4 py-2 rounded-md bg-[#59A5D8] text-white font-semibold shadow hover:bg-[#3170ad] transition flex items-center gap-2 hidden lg:inline-block">
          <i class="fa-solid fa-gauge"></i>
          <span>Dashboard Admin</span>
        </a>
      @endcan

      @auth
        <form method="POST" action="{{ route('logout') }}" class="lg:inline-block m-0 p-0 hidden">
          @csrf
          <button type="submit"
            class="px-4 py-2 rounded-md bg-[#394867] text-[#F1F6F9] font-semibold shadow hover:bg-[#21324b] transition flex items-center gap-2">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
          </button>
        </form>
      @endauth

      <!-- Hamburger (mobile) -->
      <button id="hamburger-btn"
        class="lg:hidden ml-1 flex items-center justify-center p-2 text-[#394867] hover:bg-[#E0E8EF] rounded transition"
        aria-label="Buka menu" aria-expanded="false" type="button">
        <svg class="block h-7 w-7" id="hamburger-icon" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg class="hidden h-7 w-7" id="close-icon" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu"
      class="fixed top-0 left-0 w-full h-full z-[999] bg-white bg-opacity-98 backdrop-blur-xl transform -translate-x-full transition-transform duration-300 md:hidden flex flex-col"
      aria-modal="true" tabindex="-1" style="display: none;">
      <div class="flex items-center justify-between px-6 py-5 border-b border-[#E0E8EF] shadow-sm">
        <a href="{{ route('home') }}" class="flex items-center gap-3 min-w-fit">
          <img src="{{ asset('img/logo.png') }}" alt="logo"
            class="w-10 h-10 object-contain rounded bg-white border border-[#E0E8EF]">
        </a>
        <button id="close-mobile-menu"
          class="rounded p-2 text-[#394867] hover:bg-[#E0E8EF] transition" aria-label="Tutup menu"
          type="button">
          <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-col gap-2 px-8 pt-8 text-base font-medium">
        <a href="{{ route('home') }}"
          class="py-3 px-2 rounded text-[#212A3E] hover:text-[#394867] hover:bg-[#E0E8EF] transition{{ request()->routeIs('home') ? ' bg-[#e8eaed] text-[#394867]' : '' }}">Home</a>
        <a href="/profil"
          class="py-3 px-2 rounded text-[#212A3E] hover:text-[#394867] hover:bg-[#E0E8EF] transition{{ request()->is('profil') ? ' bg-[#e8eaed] text-[#394867]' : '' }}">Profil</a>
        @guest
          <a href="{{ route('login') }}"
            class="py-3 px-2 rounded text-[#212A3E] hover:text-[#394867] hover:bg-[#E0E8EF] transition">Koleksi
            Buku</a>
        @endguest
        @auth
          <a href="/koleksi-buku"
            class="py-3 px-2 rounded text-[#212A3E] hover:text-[#394867] hover:bg-[#E0E8EF] transition{{ request()->is('koleksi-buku') ? ' bg-[#e8eaed] text-[#394867]' : '' }}">Koleksi
            Buku</a>
        @endauth

        <!-- Theme Toggle Mobile -->
        <button id="mobile-theme"
          class="mt-3 px-4 py-2 rounded-md bg-[#394867] text-[#F1F6F9] font-semibold shadow flex items-center gap-2"
          type="button">
          <i class="fa-solid fa-moon"></i>Theme
        </button>

        @guest
          <a id="mobile-login" href="{{ route('login') }}"
            class="mt-3 px-4 py-2 rounded-md bg-[#394867] text-[#F1F6F9] font-semibold shadow flex items-center gap-2">
            <i class="fa-solid fa-right-to-bracket"></i>Login
          </a>
        @endguest

        @auth
          <form method="POST" action="{{ route('logout') }}" class="mt-3 w-full">
            @csrf
            <button type="submit"
              class="w-full py-3 rounded-md flex items-center justify-center bg-[#E0E8EF] text-[#394867] font-semibold hover:bg-[#d0d5db] transition gap-2">
              <i class="fa-solid fa-right-from-bracket"></i>
              Logout
            </button>
          </form>
        @endauth

        @can('admin')
          <a href="{{ route('analitik') }}"
            class="w-full mt-3 py-3 rounded-md flex items-center justify-center bg-[#59A5D8] text-white font-semibold hover:bg-[#3170ad] transition gap-2">
            <i class="fa-solid fa-gauge"></i>
            Dashboard Admin
          </a>
        @endcan
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
        setTimeout(function() {
          mobileMenu.style.display = "none";
        }, 300);
      }

      hamburgerBtn.addEventListener('click', function() {
        if (mobileMenu.classList.contains('-translate-x-full')) {
          openMobileMenu();
        }
      });
      if (closeMobileMenu) {
        closeMobileMenu.addEventListener('click', closeMenu);
      }
      mobileMenu.addEventListener('click', function(e) {
        if (e.target === mobileMenu) {
          closeMenu();
        }
      });

      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          if (!mobileMenu.classList.contains('-translate-x-full')) {
            closeMenu();
          }
        }
      });

      // Theme toggler (simple demo)
      function updateTheme(mode) {
        document.documentElement.classList.toggle('dark', mode);
      }

      let isDark = false;

      document.getElementById('desktop-theme').addEventListener('click', function() {
        isDark = !isDark;
        updateTheme(isDark);
      });

      const mobileThemeBtn = document.getElementById('mobile-theme');
      if (mobileThemeBtn) {
        mobileThemeBtn.onclick = function() {
          isDark = !isDark;
          updateTheme(isDark);
        }
      }
    });
  </script>
</div>
<!-- End navbar -->
