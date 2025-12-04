@props(['active' => 'analitik'])

<div
  class="w-full lg:w-[69px] h-fit lg:h-[calc(100vh-69px)] py-2 lg:pt-3 flex justify-center items-center lg:items-start   bg-purple-600 lg:bg-gradient-to-b from-purple-700 via-purple-500 to-purple-200/80 shadow-lg fixed bottom-0 left-0 right-0 lg:sticky lg:top-[69px] z-20">
  <nav
    class="flex lg:flex-col lg:justify-start flex-row justify-center items-center font-semibold relative w-full gap-2">

    {{-- Dashboard Menu --}}
    <a href="?menu=analitik"
      class="flex flex-col items-center justify-center gap-1 rounded-xl transition-all duration-200 min-w-8 min-h-8 max-w-12 max-h-12
            {{ $active === 'analitik' ? 'bg-white bg-opacity-70 text-purple-700 shadow-md' : 'text-white hover:bg-[rgb(255,255,255)] hover:bg-opacity-40 hover:text-purple-900' }}"
      style="box-sizing:border-box; width:64px; height:64px;">
      <i class="fa-solid fa-chart-line text-xm"></i>
      {{-- <span class="text-xs font-medium mt-1">Analitik</span> --}}
    </a>

    {{-- Data Buku Menu --}}
    <a href="?menu=databuku"
      class="flex flex-col items-center justify-center gap-1 rounded-xl transition-all duration-200 min-w-8 min-h-8 max-w-12 max-h-12
            {{ $active === 'databuku' ? 'bg-white bg-opacity-70 text-purple-700 shadow-md' : 'text-white hover:bg-[rgb(255,255,255)] hover:bg-opacity-40 hover:text-purple-900' }}"
      style="box-sizing:border-box; width:64px; height:64px;">
      <i class="fa-solid fa-book text-xl"></i>
      {{-- <span class="text-xs font-medium mt-1">Buku</span> --}}
    </a>

    {{-- Keanggotaan Menu --}}
    <a href="?menu=keanggotaan"
      class="flex flex-col items-center justify-center gap-1 rounded-xl transition-all duration-200 min-w-8 min-h-8 max-w-12 max-h-12
            {{ $active === 'keanggotaan' ? 'bg-white bg-opacity-70 text-purple-700 shadow-md' : 'text-white hover:bg-[rgb(255,255,255)] hover:bg-opacity-40 hover:text-purple-900' }}"
      style="box-sizing:border-box; width:64px; height:64px;">
      <i class="fa-solid fa-user-group text-xl"></i>
      {{-- <span class="text-xs font-medium mt-1">Anggota</span> --}}
    </a>
  </nav>
</div>
