<div
  class="w-full lg:w-[69px] h-fit lg:h-[calc(100vh-69px)] py-2 lg:pt-3 flex justify-center items-center lg:items-start   bg-[#212A3E] to-purple-200/80 shadow-lg fixed bottom-0 left-0 right-0 lg:sticky lg:top-[69px] z-20">
  <nav
    class="flex lg:flex-col lg:justify-start flex-row justify-center items-center font-semibold relative w-full gap-2">
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
  </nav>

</div>

@once
  @push('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
  @endpush
@endonce
