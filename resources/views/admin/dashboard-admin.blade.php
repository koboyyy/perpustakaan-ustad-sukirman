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

@php
  $menu = request()->query('menu', 'analitik');
@endphp

<body class="bg-[rgb(249,249,249)] font-poppins text-[16px]">

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
          <x-admin::databuku></x-admin::databuku>
        @elseif($menu === 'keanggotaan')
          <x-admin::keanggotaan></x-admin::keanggotaan>
        @else
          <x-admin::analitik></x-admin::analitik>
        @endif

      </div>

      <div class="text-[#34344A] text-xs sm:text-sm bg-white text-center px-2 py-2">
        <div>@Perpustakaan Ustad Sukirman 2025</div>
      </div>

      {{-- <x-pengunjung::footer></x-pengunjung::footer> --}}

      <div class="h-[64px] w-full block"></div>
    </div>
  </section>

  {{-- Script untuk Chart.js (hanya load jika menu analitik) --}}
  @if ($menu === 'analitik')
    <script>
      const trendPeminjaman = document.getElementById('trend-peminjaman');
      const trendPertumbuhanPemustaka = document.getElementById('trend-pertumbuhan-pemustaka')
      const srcRandomImg = 'https://picsum.photos/600/700';
      const bukuFavorit = document.querySelectorAll('#box-buku-favorit div img');
      const topPemustaka = document.querySelectorAll('#box-top-pemustaka img')

      if (trendPeminjaman) {
        new Chart(trendPeminjaman, {
          type: 'bar',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
              label: 'Trend Peminjaman',
              data: [12, 19, 8, 15, 22, 18],
              borderWidth: 1,
              backgroundColor: 'oklch(62.7% 0.265 303.9)'
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      }

      if (trendPertumbuhanPemustaka) {
        new Chart(trendPertumbuhanPemustaka, {
          type: 'line',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
              label: 'Trend Pertumbuhan',
              data: [50, 65, 80, 95, 110, 130],
              borderWidth: 2,
              borderColor: '#45CE4B',
              tension: 0.3
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      }

      bukuFavorit.forEach(async (img, index, srcImg) => {
        const respon = await fetch(srcRandomImg)
        const data = await respon.url;

        try {
          img.src = data;
        } catch (err) {
          console.log('error: ' + err)
        }
      }) m

      topPemustaka.forEach(async (img, index, srcImg) => {
        const respon = await fetch(srcRandomImg)
        const data = await respon.url;

        try {
          img.src = data;
        } catch (err) {
          console.log('error: ' + err)
        }
      })
    </script>
  @endif
</body>

</html>
