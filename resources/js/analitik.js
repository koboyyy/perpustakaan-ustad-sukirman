const trendPeminjaman = document.getElementById('trend-peminjaman');
const trendPertumbuhanPemustaka = document.getElementById('trend-pertumbuhan-pemustaka');
const srcRandomImg = 'https://picsum.photos/600/700';
const bukuFavorit = document.querySelectorAll('#box-buku-favorit div img');
const topPemustaka = document.querySelectorAll('#box-top-pemustaka img');
const pieKategori = document.getElementById('pie-distribusi-kategori-buku');

// Penjelasan:
// - Menjadikan maintainAspectRatio: false agar chart 100% mengikuti parent container, sehingga tidak overflow jika container-nya punya height terbatas atau responsif.
// - Disarankan: Atur container div di Blade/Laravel-nya punya height explicit, misal style="height:350px;" atau class CSS tertentu.
// - Menambahkan resize handler agar font dan lainnya responsif.
// - BarPercentage / CategoryPercentage di Chart.js langsung tidak cukup untuk mengontrol overflow jika parent-nya tidak kasih height.
// - Chart tidak akan overflow jika parent container sudah benar didefinisikan height-nya.
// - Pastikan di analitik.blade.php, element <canvas id="trend-peminjaman"> berada di dalam div yang height-nya eksplisit (via tailwind/inline/CSS).

if (trendPeminjaman) {
  // Fungsi untuk render chart sesuai besar layar
  function resizeTrendPeminjamanChart() {
    let width = window.innerWidth;
    let chartOptions = {
      responsive: true,
      maintainAspectRatio: false, // => wajib agar chart menyesuaikan height container!
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            font: {
              size: width < 600 ? 10 : width < 900 ? 12 : 14,
            },
          },
        },
        x: {
          ticks: {
            font: {
              size: width < 600 ? 10 : width < 900 ? 12 : 14,
            },
          },
        },
      },
      plugins: {
        legend: {
          labels: {
            font: {
              size: width < 600 ? 10 : width < 900 ? 12 : 14,
            },
          },
        },
        tooltip: {
          bodyFont: {
            size: width < 600 ? 10 : width < 900 ? 12 : 14,
          },
        },
      },
    };

    // Destroy instance sebelumnya setiap resize agar tidak duplikat
    if (window.trendPeminjamanChart) {
      window.trendPeminjamanChart.destroy();
    }
    window.trendPeminjamanChart = new Chart(trendPeminjaman, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [
          {
            label: 'Trend Peminjaman',
            data: [12, 19, 8, 15, 22, 18],
            borderWidth: 1,
            backgroundColor: width < 600 ? '#607fbc' : '#394867',
            barPercentage: width < 600 ? 0.6 : 0.5,
            categoryPercentage: width < 600 ? 0.8 : 0.5,
            borderRadius: width < 600 ? 4 : 6, // sudah diperbaiki, tanpa typo
          },
        ],
      },
      options: chartOptions,
    });
  }

  // Inisialisasi dan update saat window resize
  resizeTrendPeminjamanChart();
  window.addEventListener('resize', () => {
    resizeTrendPeminjamanChart();
  });
}

/*
!= Penyebab batang melewati container:
  1. Parent container/canvas tidak dikasih height secara eksplisit. Chart.js (dengan maintainAspectRatio: false) akan memenuhi seluruh tinggi container. Tetapi jika container tidak punya height jelas, canvas jadi besar (default attr height=150 px dari Chart.js bisa meluber).
  2. Solusi: 
    - Pastikan element pembungkus chart (div / section) yang membungkus <canvas id="trend-peminjaman"> diberi height eksplisit. 
    - Contoh:
        <div style="height:350px">
          <canvas id="trend-peminjaman"></canvas>
        </div>
      atau dengan Tailwind: 
        <div class="h-[350px]">
          <canvas id="trend-peminjaman"></canvas>
        </div>
  3. BarPercentage terlalu kecil/besar tidak berpengaruh pada overflow secara vertikal — yang penting container chart punya tinggi eksplisit!
*/

if (trendPertumbuhanPemustaka) {
  new Chart(trendPertumbuhanPemustaka, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      datasets: [
        {
          label: 'Trend Pertumbuhan',
          data: [50, 65, 80, 95, 110, 130],
          borderWidth: 2,
          borderColor: '#394867',
          tension: 0.3,
        },
      ],
    },
    options: {
      responsive: true,
      // maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}
