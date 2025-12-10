<div
  class="w-full lg:w-[69px] h-fit lg:h-[calc(100vh-69px)] py-2 lg:pt-3 flex justify-center items-center lg:items-start   bg-[#212A3E] to-purple-200/80 shadow-lg fixed bottom-0 left-0 right-0 lg:sticky lg:top-[69px] z-20">
  <nav
    class="flex lg:flex-col lg:justify-start flex-row justify-center items-center font-semibold relative w-full gap-2">
    <x-admin.nav-link-admin href="?menu=analitik" :active="request()->query('menu') === 'analitik'">
      <i class="fa-solid fa-chart-line text-xm"></i>
      {{-- <span class="text-xs font-medium mt-1">Analitik</span> --}}
    </x-admin.nav-link-admin>

    <x-admin.nav-link-admin href="?menu=databuku" :active="request()->query('menu') === 'databuku'">
      <i class="fa-solid fa-book text-xl"></i>
      {{-- <span class="text-xs font-medium mt-1">Buku</span> --}}
    </x-admin.nav-link-admin>

    <x-admin.nav-link-admin href="?menu=keanggotaan" :active="request()->query('menu') === 'keanggotaan'">
      <i class="fa-solid fa-user-group text-xl"></i>
      {{-- <span class="text-xs font-medium mt-1">Anggota</span> --}}
    </x-admin.nav-link-admin>

    <x-admin.nav-link-admin href="?menu=peminjaman" :active="request()->query('menu') === 'peminjaman'">
      <i class="fa-solid fa-arrow-right-arrow-left text-xl"></i>
      {{-- <span class="text-xs font-medium mt-1">Peminjaman</span> --}}
    </x-admin.nav-link-admin>

    <x-admin.nav-link-admin href="?menu=pengembalian" :active="request()->query('menu') === 'pengembalian'">
      <i class="fa-solid fa-rotate-left text-xl"></i>
      {{-- <span class="text-xs font-medium mt-1">Pengembalian</span> --}}
    </x-admin.nav-link-admin>
  </nav>

</div>

@once
  @push('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
  @endpush
@endonce
