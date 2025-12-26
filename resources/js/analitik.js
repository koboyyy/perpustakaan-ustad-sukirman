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
