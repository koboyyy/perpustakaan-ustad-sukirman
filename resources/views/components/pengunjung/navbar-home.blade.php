<div class="h-22 w-full">
</div>

<div id="navbar" class="bg-white fixed left-0 top-0 w-full z-1000 font-dm-sans light">
  <div
    class="w-full h-2 bg-gradient-to-r 
    from-purple-400 
    via-purple-600 
    to-purple-800">
  </div>

  <nav class="px-10  flex justify-between items-center ">
    <div class="w-100  flex gap-10 items-center">
      <img src="img/logo.png" alt="logo" class="w-12">
    </div>

    <nav class=" h-20 text-[16px] flex items-center gap-7 md:flex">
      <div class="relative group">
        <a class="transition-all duration-400 block font-bold " href="/">HOME</a>
      </div>

      <div class="relative group">
        <a class="transition-all duration-400 block font-bold" href="/profil">PROFIL
          {{-- <i class="fa-solid fa-chevron-down inline text-xs ml-1"></i> --}}
        </a>
        {{-- <div id="dropdown-menu"
          class="absolute left-0 top-[110%] rounded-md w-56 flex flex-col gap-1 bg-white dark:bg-gray-800 px-4 py-3 shadow-lg opacity-0 pointer-events-none -translate-y-2 transition-all duration-300 group-hover:opacity-100 group-hover:pointer-events-auto group-hover:translate-y-0">
          <a class="rounded-md px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-black dark:text-white"
            href="/profil#tim">Tentang
            Perpustakaan</a>
          <a class="rounded-md px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-black dark:text-white"
            href="/profil#tim">Visi &
            Misi</a>
          <a class="rounded-md px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-black dark:text-white"
            href="/profil#struktur">Struktur Organisasi</a>
        </div> --}}
      </div>

      <div class="relative group">
        <a class="transition-all duration-400 block font-bold" href="/koleksi-buku">KOLEKSI
          BUKU</a>
      </div>
    </nav>

    <div class="w-100  flex gap-5 items-center justify-end">
      <button id="btn-theme" onclick="setTheme()"
        class="px-4 py-2 rounded-lg bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 text-white font-semibold shadow-md hover:from-purple-600 hover:to-purple-800 transition-colors duration-300">
        <i class="fa-solid fa-moon mr-2"></i>Theme
      </button>

      <div>
        <button id="btn-login"
          class="px-4 py-2 rounded-lg bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 text-white font-semibold shadow-md hover:from-purple-600 hover:to-purple-800 transition-colors duration-300">
          <i class="fa-solid fa-sign-in-alt mr-2"></i>Login
        </button>

        <div id="login-modal"
          class="fixed inset-0 z-[9999] flex items-center justify-center bg-[rgb(0,0,0,0.5)] bg-opacity-40 hidden">
          <div class="relative w-fit">
            <x-admin.login />
          </div>
        </div>

        <script>
          document.addEventListener('DOMContentLoaded', function() {
            const btnLogin = document.getElementById('btn-login');
            const loginModal = document.getElementById('login-modal');

            btnLogin.addEventListener('click', function() {
              loginModal.classList.remove('hidden');
            });

            // Close modal when clicking the overlay (outside the form)
            loginModal.addEventListener('click', function(e) {
              if (e.target === loginModal) {
                loginModal.classList.add('hidden');
              }
            });
          });
        </script>
      </div>
    </div>

    <!-- Tombol nav garis tiga -->
    <div class="md:hidden">
      <button onclick="showMobileNav()" id="hamburger-btn"
        class="text-white hover:text-blue-200 focus:outline-none focus:text-blue-200">
        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path id="hamburger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
          <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    {{-- Mobile Home --}}
    <div id="mobile-menu" class="md:hidden hidden bg-blue-700">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <a href="#"
          class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md text-base font-medium transition duration-300">Beranda</a>
        <a href="#"
          class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md text-base font-medium transition duration-300">Tentang</a>
        <a href="#"
          class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md text-base font-medium transition duration-300">Layanan</a>
        <a href="#"
          class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md text-base font-medium transition duration-300">Kontak</a>
      </div>
    </div>
  </nav>
</div>
