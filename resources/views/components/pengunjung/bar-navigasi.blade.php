{{-- bar navigasi --}}
<div id="navbar"
  class="bg-white w-full h-[60px] px-3 rounded-full flex items-center border border-black/10 max-w-300 mx-auto mt-4 shadow-lg">

  {{-- Logo kiri --}}
  <div class="flex items-center z-10 flex-1">
    <div
      class="flex items-center w-11 h-11 rounded-full shadow justify-center border border-black/10">
      <a href="{{ route('home') }}" class="flex items-center gap-2 justify-center">
        <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-8 h-8">
      </a>
    </div>
  </div>

  {{-- Link pusat flex-1 center --}}
  <div class="flex-1 flex justify-center items-center">
    <div class="flex gap-2 items-center">
      <a class="transition-all duration-300 font-bold py-2 px-4 hover:text-[#394867] rounded-full {{ request()->is('/') ? 'active' : '' }}"
        href="{{ route('home') }}">Home</a>
      <a class="transition-all duration-300 font-bold py-2 px-4 hover:text-[#394867] rounded-full {{ request()->is('profil') ? 'active' : '' }}"
        href="/profil">Profil</a>
      @guest
        <a class="transition-all duration-300 font-bold py-2 px-4 hover:text-[#394867] rounded-full {{ request()->is('login') ? 'active' : '' }}"
          href="/login">Koleksi Buku</a>
      @endguest
      @auth
        <a class="transition-all duration-300 font-bold py-2 px-4 hover:text-[#394867] rounded-full {{ request()->is('koleksi-buku') ? 'active' : '' }}"
          href="/koleksi-buku">Koleksi Buku</a>
      @endauth
    </div>
  </div>

  {{-- Tombol kanan --}}
  <div class="flex items-center gap-2 shrink-0 z-10 flex-1 justify-end">
    @guest
      <a id="btn-login" href="{{ route('login') }}"
        class="px-3 py-1.5 rounded-full bg-[#394867] text-[#F1F6F9] font-semibold shadow hover:bg-[#212A3E] transition-colors duration-300 flex items-center gap-1 text-sm">
        <i class="fa-solid fa-sign-in-alt mr-1"></i>
        Login
      </a>
    @endguest

    @can('admin')
      <form method="get" action="{{ route('analitik') }}" class="inline-block">
        @csrf
        <button type="submit"
          class="px-3 py-1.5 rounded-full bg-[#394867] text-[#F1F6F9] font-semibold shadow hover:bg-[#212A3E] transition-colors duration-300 flex items-center gap-1 text-sm">
          <i class="fa-solid fa-chart-line mr-1"></i>
          Dashboard Admin
        </button>
      </form>
    @endcan

    @auth
      <form method="POST" action="{{ route('logout') }}" class="inline-block">
        @csrf
        <button type="submit"
          class="px-3 py-1.5 rounded-full bg-[#394867] text-[#F1F6F9] font-semibold shadow hover:bg-[#212A3E] transition-colors duration-300 flex items-center gap-1 text-sm">
          <i class="fa-solid fa-sign-out-alt mr-1"></i>
          Logout
        </button>
      </form>
    @endauth
  </div>

</div>

<style>
  #navbar a {
    transition: all 300ms ease;
  }

  .active {
    background: black;
    color: white;
  }
</style>
