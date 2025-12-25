<section class="col-span-7 z-100 sticky top-0">
  <div
    class="bg-white h-[69px] shadow-[0px_4px_4px_0px_rgba(57,72,103,0.08)] w-full flex justify-between items-center pl-[10px] pr-[10px] sm:pl-[19px] sm:pr-[24px] z-1 relative z-100">

    {{-- Logo dan Title --}}
    <div class="flex just gap-[10px] items-center">
      {{-- Logo --}}
      <div class="flex">
        <div class="flex items-center gap-[8px] sm:gap-[16px]">
          <img src="{{ asset('img/logo.png') }}" alt="logo"
            class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg shadow-md bg-gradient-to-tr from-[#D9E4EC] to-[#B0C4D9] p-1">
          <div class="flex flex-col items-start">
            <h1
              class="text-[14px] sm:text-[17px] font-extrabold text-[#394867] leading-none whitespace-nowrap">
              Perpustakaan Ustad Sukirman
            </h1>
            <span
              class="text-[11px] sm:text-[12px] text-start text-[#9BA4B5] font-semibold mt-0.5 py-0.5">Desa
              Wonosari</span>
          </div>
        </div>
      </div>
    </div>

    <div>
      {{-- Logout --}}

      <form method="POST" action="{{ route('logout') }}" class="inline-block">
        @csrf
        <button type="submit"
          class="px-4 py-2 rounded-lg bg-[#394867] text-[#F1F6F9] font-semibold shadow-md hover:bg-[#212A3E] transition-colors duration-300 flex items-center gap-1 ml-3">
          <i class="fa-solid fa-sign-out-alt mr-2"></i>
          <span class="xs:inline">Logout</span>
        </button>
      </form>

      {{-- Dashboard Admin --}}

      <form method="get" action="{{ route('home') }}" class="inline-block">
        @csrf
        <button type="submit"
          class="px-4 py-2 rounded-lg bg-[#394867] text-[#F1F6F9] font-semibold shadow-md hover:bg-[#212A3E] transition-colors duration-300 flex items-center gap-1 ml-3">
          <i class="fa-solid fa-sign-out-alt mr-2"></i>
          <span class="xs:inline">Homepage</span>
        </button>
      </form>
    </div>

    {{-- Hamburger Menu --}}
    <button onclick="showMobileNavDashboard()" id="hamburger-btn"
      class="text-[#212A3E] flex sm:hidden">
      <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path id="hamburger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
        <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
          stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    {{-- mobileNav --}}
    <div id="mobileNav"
      class="fixed inset-0 top-0 left-0 w-full h-full z-50 bg-[#F1F6F9] p-6 flex flex-col gap-8 sm:hidden transition-transform duration-300 translate-x-0"
      style="display: none;">
      {{-- Header --}}
      <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-3">
          <img src="{{ asset('img/logo.png') }}" alt="logo"
            class="w-8 h-8 rounded-lg shadow-md bg-gradient-to-tr from-[#D9E4EC] to-[#B0C4D9] p-1">
          <span class="text-[15px] font-bold text-[#394867]">Perpustakaan</span>
        </div>
        <button onclick="closeMobileNavDashboard()" class="text-[#394867]">
          <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      {{-- Profile Mobile --}}
      <div class="flex items-center gap-4 border-t border-[#D9E4EC] pt-5">
        <div
          class="bg-gradient-to-tr from-[#394867] to-[#9BA4B5] w-[40px] h-[40px] rounded-full flex items-center justify-center shadow-inner">
          <span class="text-white font-bold text-lg">JD</span>
        </div>
        <div>
          <h1 class="text-sm font-bold text-[#394867]">John Doe</h1>
          <p class="text-xs text-[#9BA4B5] font-medium tracking-wide">admin</p>
        </div>
      </div>
    </div>
  </div>

  {{-- Tambahkan fungsi showMobileNavDashboard & closeMobileNavDashboard --}}
  <script>
    function showMobileNavDashboard() {
      const mobileNav = document.getElementById('mobileNav');
      const hamburgerIcon = document.getElementById('hamburger-icon');
      const closeIcon = document.getElementById('close-icon');
      if (mobileNav) {
        mobileNav.style.display = 'flex';
        setTimeout(() => {
          mobileNav.classList.remove('translate-x-full');
          mobileNav.classList.add('translate-x-0');
        }, 10);
        // ganti icon
        if (hamburgerIcon && closeIcon) {
          hamburgerIcon.classList.add('hidden');
          closeIcon.classList.remove('hidden');
        }
        // Optional: prevent body scroll
        document.body.style.overflow = 'hidden';
      }
    }

    function closeMobileNavDashboard() {
      const mobileNav = document.getElementById('mobileNav');
      const hamburgerIcon = document.getElementById('hamburger-icon');
      const closeIcon = document.getElementById('close-icon');
      if (mobileNav) {
        mobileNav.classList.add('translate-x-full');
        mobileNav.classList.remove('translate-x-0');
        setTimeout(() => {
          mobileNav.style.display = 'none';
        }, 300);
        // ganti icon
        if (hamburgerIcon && closeIcon) {
          hamburgerIcon.classList.remove('hidden');
          closeIcon.classList.add('hidden');
        }
        // Optional: restore body scroll
        document.body.style.overflow = '';
      }
    }
    // Escape close
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeMobileNavDashboard();
      }
    });
    // Click outside close (optional, assuming #mobileNav covers screen)

    // Close on screen resize (optional)
    window.addEventListener('resize', function() {
      if (window.innerWidth >= 640) {
        closeMobileNavDashboard();
      }
    });
  </script>
</section>
