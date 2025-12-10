<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Perpustakaan Ustad Sukirman</title>
  @vite('resources/css/app.css')

  {{-- Font Awesome CDN --}}
  <script src="https://kit.fontawesome.com/23275395bd.js" crossorigin="anonymous"></script>

  {{-- CDN Chart js --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-[#F1F6F9] font-poppins text-[16px]">

  <x-admin::header></x-admin::header>

  {{-- Container --}}
  <section class="flex flex-col lg:flex-row">

    <x-admin::sidebar class="w-full lg:w-auto" :active="$menu"></x-admin::sidebar>

    {{-- Main Konten --}}
    <div class="w-full">
      <div
        class="w-full px-4 py-6 min-h-[calc(100vh-88px)] sm:px-6 sm:py-8 md:px-8 md:py-10 lg:px-[24px] lg:py-[30px]">

        {{-- Tampilkan komponen sesuai menu yang dipilih --}}
        @if ($menu === 'analitik')
          <x-admin::analitik></x-admin::analitik>
        @elseif($menu === 'databuku')
          <x-admin::databuku :dataBuku="$dataBuku"></x-admin::databuku>
        @elseif($menu === 'keanggotaan')
          <x-admin::keanggotaan :dataAnggota="$dataAnggota"></x-admin::keanggotaan>
        @elseif ($menu === 'peminjaman')
          <x-admin::peminjaman></x-admin::peminjaman>
        @elseif ($menu === 'pengembalian')
          <x-admin::pengembalian></x-admin::pengembalian>
        @else
          <x-admin::analitik></x-admin::analitik>
        @endif

      </div>

      <div class="text-[#212A3E] text-xs sm:text-sm bg-[#F1F6F9] text-center px-2 py-2">
        <div>@Perpustakaan Ustad Sukirman 2025</div>
      </div>

      <div class="h-[64px] w-full lg:hidden block"></div>
    </div>
  </section>

  @vite('resources/js/dashboard.js')
</body>

</html>
