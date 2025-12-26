{{-- bar navigasi --}}
<div id="navbar"
  class="bg-white w-full h-[60px] px-3 rounded-full flex justify-evenly items-center">
  <a class="transition-all duration-300 font-bold py-2 px-2 hover:text-[#394867] rounded-full grow justify-center flex {{ request()->is('/') ? 'active' : '' }}"
    href="{{ route('home') }}">Home</a>
  <a class="transition-all duration-300 font-bold py-2 px-2 hover:text-[#394867] rounded-full grow justify-center flex {{ request()->is('profil') ? 'active' : '' }}"
    href="/profil">Profil</a>
  @guest
    <a class="transition-all duration-300 font-bold py-2 px-2 hover:text-[#394867] rounded-full grow justify-center flex {{ request()->is('login') ? 'active' : '' }}"
      href="/login">Koleksi Buku</a>
  @endguest
  @auth
    <a class="transition-all duration-300 font-bold py-2 px-2 hover:text-[#394867] rounded-full grow justify-center flex {{ request()->is('koleksi-buku') ? 'active' : '' }}"
      href="/koleksi-buku">Koleksi Buku</a>
  @endauth
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
