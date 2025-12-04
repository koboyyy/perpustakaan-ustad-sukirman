<section class="col-span-7 z-100 sticky top-0">
  <div
    class="bg-white h-[64px] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.08)] w-full flex justify-between items-center px-[24px] z-1 relative z-100">

    <div class="flex gap-[10px]">
      {{-- Hamburger Menu --}}
      <button onclick="showMobileNav()" id="hamburger-btn" class="text-black hidden">
        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path id="hamburger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
          <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      {{-- Logo --}}
      <div class="flex items-center gap-[10px]">
        <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-10 h-10">
        <h1 class="text-sm font-bold">Perpustakaan Ustad Sukirman</h1>
      </div>
    </div>

    {{-- profil --}}
    <div class="flex items-center gap-[10px]">
      {{-- Foto --}}
      <div class="bg-black w-[40px] h-[40px] rounded-full"></div>
      {{-- Name --}}
      <div>
        <h1 class="text-sm font-bold">John Doe</h1>
        <p class="text-sm text-gray-500">admin</p>
      </div>
    </div>
  </div>
</section>
