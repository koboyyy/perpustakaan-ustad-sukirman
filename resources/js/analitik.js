const trendPeminjaman = document.getElementById('trend-peminjaman');
const trendPertumbuhanPemustaka = document.getElementById('trend-pertumbuhan-pemustaka');
const srcRandomImg = 'https://picsum.photos/600/700';
const bukuFavorit = document.querySelectorAll('#box-buku-favorit div img');
const topPemustaka = document.querySelectorAll('#box-top-pemustaka img');

if (trendPeminjaman) {
  new Chart(trendPeminjaman, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      datasets: [
        {
          label: 'Trend Peminjaman',
          data: [12, 19, 8, 15, 22, 18],
          borderWidth: 1,
          backgroundColor: '#394867',
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

bukuFavorit.forEach(async img => {
  const respon = await fetch(srcRandomImg);
  const data = await respon.url;

  try {
    img.src = data;
  } catch (err) {
    console.log('error: ' + err);
  }
});

topPemustaka.forEach(async img => {
  const respon = await fetch(srcRandomImg);
  const data = await respon.url;

  try {
    img.src = data;
  } catch (err) {
    console.log('error: ' + err);
  }
});

document.addEventListener('DOMContentLoaded', function () {
  // Pie Chart Distribusi Kategori Buku
  const pieKategori = document.getElementById('pie-distribusi-kategori-buku');
  if (pieKategori) {
    // Ganti dari pie menjadi doughnut supaya bulat tengahnya kosong
    new Chart(pieKategori, {
      type: 'doughnut',
      data: {
        labels: [
          // Menambahkan icon dan warna jika dibutuhkan di legend/label saat custom legend di Chart.js
          'Fiksi',
          'Non-Fiksi',
          'Sains',
          'Sejarah',
          'Biografi',
          'Lainnya',
        ],
        datasets: [
          {
            data: [35, 20, 15, 10, 8, 12],
            backgroundColor: [
              '#394867', // Fiksi - dark theme primary
              '#9BA4B5', // Non-Fiksi - secondary/light border
              '#212A3E', // Sains - strong accent/dark navy
              '#F1F6F9', // Sejarah - light bg
              '#B0C4D9', // Biografi - gradient/soft blue
              '#D9E4EC', // Lainnya - very light gradient
            ],
            borderWidth: 1,
          },
        ],
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
