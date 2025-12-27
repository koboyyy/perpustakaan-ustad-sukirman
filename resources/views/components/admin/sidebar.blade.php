<div
  class="w-full lg:w-[69px] h-fit lg:h-[calc(100vh-69px)] py-2 lg:pt-3 flex justify-start lg:justify-center items-center lg:items-start bg-[#212A3E] to-purple-200/80 shadow-lg fixed bottom-0 left-0 right-0 lg:sticky lg:top-[69px] z-9999 overflow-scroll [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
  <nav
    class="flex lg:flex-col lg:justify-start flex-row items-center font-semibold relative gap-2 px-2 mx-auto">
    <x-admin.nav-link-admin href="/dashboard/analitik" :active="collect(request()->segments())->last() === 'analitik'" title="Analitik">
      <i class="fa-solid fa-chart-line text-xm"></i>
    </x-admin.nav-link-admin>

    <x-admin.nav-link-admin href="/dashboard/buku" :active="collect(request()->segments())->last() === 'buku'" title="Buku">
      <i class="fa-solid fa-book text-xl"></i>
    </x-admin.nav-link-admin>

    <x-admin.nav-link-admin href="/dashboard/keanggotaan" :active="collect(request()->segments())->last() === 'keanggotaan'" title="Anggota">
      <i class="fa-solid fa-user-group text-xl"></i>
    </x-admin.nav-link-admin>

    <x-admin.nav-link-admin href="/dashboard/peminjaman" :active="collect(request()->segments())->last() === 'peminjaman'" title="Peminjaman">
      <i class="fa-solid fa-arrow-right-arrow-left text-xl"></i>
    </x-admin.nav-link-admin>

    <x-admin.nav-link-admin href="/dashboard/pengembalian" :active="collect(request()->segments())->last() === 'pengembalian'" title="Pengembalian">
      <i class="fa-solid fa-arrow-rotate-left text-xl"></i>
    </x-admin.nav-link-admin>

    {{-- Tambahan: Penerbit --}}
    <x-admin.nav-link-admin href="/dashboard/penerbit" :active="collect(request()->segments())->last() === 'penerbit'" title="Penerbit">
      <i class="fa-solid fa-building text-xl"></i>
    </x-admin.nav-link-admin>

    {{-- Tambahan: Rak --}}
    <x-admin.nav-link-admin href="/dashboard/rak" :active="collect(request()->segments())->last() === 'rak'" title="Rak">
      <i class="fa-solid fa-layer-group text-xl"></i>
    </x-admin.nav-link-admin>

    {{-- Tambahan: Sumber --}}
    <x-admin.nav-link-admin href="/dashboard/sumber" :active="collect(request()->segments())->last() === 'sumber'" title="Sumber">
      <i class="fa-solid fa-hand-holding-usd text-xl"></i>
    </x-admin.nav-link-admin>

    {{-- Tambahan: Kategori --}}
    <x-admin.nav-link-admin href="/dashboard/kategori" :active="collect(request()->segments())->last() === 'kategori'" title="Kategori">
      <i class="fa-solid fa-tags text-xl"></i>
    </x-admin.nav-link-admin>
  </nav>
</div>

@once
  @push('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
  @endpush
@endonce
