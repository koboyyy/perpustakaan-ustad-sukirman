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

  <x-pengunjung::header></x-pengunjung::header>

  {{-- Container --}}
  <section class="flex">

    <x-admin::sidebar :active="$menu"></x-admin::sidebar>

    {{-- Main Konten --}}
    <div class="px-[24px] py-[30px] w-full">
      <div class="w-full min-h-[calc(100vh-88px)]">

        {{-- Tampilkan komponen sesuai menu yang dipilih --}}
        @if ($menu === 'analitik')
          <x-admin::content-analitik></x-admin::content-analitik>
        @elseif($menu === 'databuku')
          <x-admin::content-databuku></x-admin::content-databuku>
        @elseif($menu === 'keanggotaan')
          <x-admin::content-keanggotaan></x-admin::content-keanggotaan>
        @else
          <x-admin::content-analitik></x-admin::content-analitik>
        @endif

      </div>

      <x-pengunjung::footer></x-pengunjung::footer>
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
              backgroundColor: '#F07C29'
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
      })

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
