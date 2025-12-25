const trendPeminjaman = document.getElementById('trend-peminjaman');
const trendPertumbuhanPemustaka = document.getElementById('trend-pertumbuhan-pemustaka');

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


  const pieKategori = document.getElementById('pie-distribusi-kategori-buku');

  document.addEventListener('DOMContentLoaded', function() {
    // Pie Chart Distribusi Kategori Buku

    if (pieKategori) {
      // Ganti dari pie menjadi doughnut supaya bulat tengahnya kosong
      new Chart(pieKategori, {
        type: 'doughnut',
        data: {
          labels: {!! json_encode($sumBukuPerKategori->pluck('nama_kategori')->toArray()) !!},
          datasets: [{
            data: {!! json_encode($sumBukuPerKategori->pluck('total_buku')->toArray()) !!},
            backgroundColor: [
              '#394867', // Fiksi - dark theme primary
              '#9BA4B5', // Non-Fiksi - secondary/light border
              '#212A3E', // Sains - strong accent/dark navy
              '#F1F6F9', // Sejarah - light bg
              '#B0C4D9', // Biografi - gradient/soft blue
              '#D9E4EC', // Lainnya - very light gradient
            ],
            borderWidth: 1,
          }],
        },
        options: {
          responsive: true,
          cutout: '60%', // supaya terlihat bolong di tengah
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                color: '#6835BB',
                font: {
                  weight: 'bold',
                },
              },
            },
            title: {
              display: false,
            },
          },
        },
      });
    }
  });
