@props(['active' => 'analitik'])

<div
  class="w-[300px] h-[calc(100vh-64px)] px-[24px] py-[30px] bg-gradient-to-b from-purple-600 via-purple-400 to-purple-200 opacity-[0.9] shadow-[2px_0px_4px_0px_rgba(0,0,0,0.08)] sticky top-[64px]">
  <div class="flex flex-col gap-[10px] font-semibold h-full">

    {{-- Dashboard Menu --}}
    <a href="?menu=analitik"
      class="flex items-center gap-2 px-[20px] py-[10px] rounded-[5px] transition-all duration-200
              {{ $active === 'analitik' ? 'bg-[#ebe9e99d]' : 'hover:bg-[#ebe9e950]' }}">
      <i class="fa-solid fa-chart-line"></i> Analitik
    </a>

    {{-- Data Buku Menu --}}
    <a href="?menu=databuku"
      class="flex items-center gap-2 px-[20px] py-[10px] rounded-[5px] transition-all duration-200
              {{ $active === 'databuku' ? 'bg-[#ebe9e99d]' : 'hover:bg-[#ebe9e950]' }}">
      <i class="fa-solid fa-book"></i> Data Buku
    </a>

    {{-- Keanggotaan Menu --}}
    <a href="?menu=keanggotaan"
      class="flex items-center gap-2 px-[20px] py-[10px] rounded-[5px] transition-all duration-200
              {{ $active === 'keanggotaan' ? 'bg-[#ebe9e99d]' : 'hover:bg-[#ebe9e950]' }}">
      <i class="fa-solid fa-user-group"></i> Keanggotaan
    </a>

    <div class="flex-1"></div>
  </div>
</div>
