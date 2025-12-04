<div class="w-full mb-100 lg:mb-0">
  {{-- Title --}}
  <div class="text-[16px] font-semibold mb-4 text-[#6835BB]"><i class="fa-solid fa-chart-line"></i>
    Analitik
  </div>

  <style>
    .analitik-animated-box {
      transition: box-shadow 0.3s cubic-bezier(.4, 0, .2, 1), transform 0.3s cubic-bezier(.4, 0, .2, 1);
      background: #fff !important;
      box-shadow: 0 6px 24px 0 rgba(103, 53, 187, 0.14), 0 1.5px 8px 0 rgba(80, 32, 204, 0.11);
      will-change: transform, box-shadow;
    }

    .analitik-animated-box:hover {
      box-shadow: 0 14px 40px -8px rgba(103, 53, 187, 0.22), 0 6px 30px 0 rgba(80, 32, 204, 0.15);
      transform: translateY(-4px) scale(1.025);
      z-index: 2;
    }
  </style>

  <div class="flex flex-col w-full space-y-[30px] max-w-[1690.7px] mx-auto">
    {{-- Section A --}}
    <section class="w-full flex gap-[27px] flex-wrap lg:flex-nowrap">
      {{-- Box Judul Buku --}}
      <div
        class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="flex items-center gap-2 text-[#6835BB]">
            <i class="fa-solid fa-book"></i> Judul Buku
          </div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#6835BB] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-book"></i>
            </div>
            <div class="text-[#2D224C]">5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Jumlah Salinan --}}
      <div
        class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="flex items-center gap-2 text-[#A07FFB]">
            <i class="fa-solid fa-copy"></i> Jumlah Salinan
          </div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#A07FFB] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-copy"></i>
            </div>
            <div class="text-[#2D224C]">5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Pemustaka --}}
      <div
        class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="flex items-center gap-2 text-[#22c55e]">
            <i class="fa-solid fa-user"></i> Pemustaka
          </div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#22c55e] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-user"></i>
            </div>
            <div class="text-[#2D224C]">5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Dipinjam --}}
      <div
        class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="flex items-center gap-2 text-[#F87171]">
            <i class="fa-solid fa-book-open-reader"></i> Buku Dipinjam
          </div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#F87171] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-book-open-reader"></i>
            </div>
            <div class="text-[#2D224C]">5.000</div>
          </div>
        </div>
      </div>
    </section>

    {{-- Section B --}}
    <section
      class="lg:grid grid-cols-6 gap-[27px] grid-rows-6 flex flex-wrap w-full h-180 font-semibold">
      {{-- Box Trend Peminjaman --}}
      <div
        class="analitik-animated-box relative flex flex-col items-center w-full col-span-2 row-span-3 justify-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="relative z-10 w-full rounded-[10px] flex flex-col items-center">
          <div class="flex items-center gap-2 text-[#1E429F]">
            <i class="fa-solid fa-chart-area"></i> Trend Peminjaman Buku
          </div>
          <canvas id="trend-peminjaman"></canvas>
        </div>
      </div>

      <div
        class="analitik-animated-box relative flex flex-col items-center w-full col-span-2 row-span-3 justify-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="relative z-10 w-full rounded-[10px] flex flex-col items-center">
          <div class="flex items-center gap-2 text-[#059669]">
            <i class="fa-solid fa-chart-line"></i> Trend Pertumbuhan Pemustaka
          </div>
          <canvas id="trend-pertumbuhan-pemustaka"></canvas>
        </div>
      </div>

      {{-- Box Analitik Baru: Distribusi Kategori Buku --}}
      <div
        class="analitik-animated-box relative flex gap-6 w-full col-span-2 row-span-3 items-center flex-col rounded-[18px] p-[32px] bg-gradient-to-tr from-purple-50 via-white to-purple-100 shadow border border-purple-200">
        <div class="relative z-10 w-full rounded-[14px] flex flex-col items-center gap-4">
          <div
            class="text-[18px] font-extrabold tracking-wide text-[#6344af] flex items-center gap-2">
            <i class="fa-solid fa-chart-pie text-purple-400"></i>
            Distribusi Kategori Buku
          </div>
          <div class="text-[#5c5470] text-[15px] text-center max-w-[670px]">
            <canvas id="pie-distribusi-kategori-buku" width="220" height="120"></canvas>
          </div>
        </div>
      </div>

      {{-- Box Buku Favorite --}}
      <div
        class="analitik-animated-box relative flex gap-6 w-full col-span-4 row-span-3 items-center flex-col rounded-[18px] p-[32px] bg-gradient-to-tr from-purple-100 via-purple-50 to-white shadow-lg overflow-hidden border border-purple-200">
        <div class="relative z-10 w-full rounded-[14px] flex flex-col items-center gap-6">
          <div
            class="text-[18px] font-extrabold tracking-wide text-[#6D28D9] flex items-center gap-2">
            <i class="fa-solid fa-star text-yellow-400 animate-bounce"></i>
            Buku Favorite
          </div>
          <div id="box-buku-favorit"
            class="flex gap-6 font-normal overflow-x-auto justify-center w-full py-2">
            @for ($i = 1; $i <= 6; $i++)
              <div
                class="flex flex-col gap-2 items-center shrink-0 group p-2 transition-transform duration-300 hover:-translate-y-2">
                <div class="relative">
                  <img
                    class="w-[85px] h-[110px] bg-gradient-to-br from-[#EBC7FD] via-[#F2EFFE] to-[#C7D2FE] border-2 border-purple-200 rounded-lg shadow-xl object-cover transition duration-300 group-hover:border-purple-500 group-hover:shadow-2xl">
                  <span
                    class="absolute -top-2 -right-2 bg-yellow-100 text-yellow-700 text-[11px] px-2 py-1 rounded-full shadow-md font-bold group-hover:bg-yellow-300">Top
                    {{ $i }}</span>
                </div>
                <div
                  class="flex items-center gap-1 text-[#4B405B] font-semibold text-[14px] text-center truncate max-w-[80px] group-hover:text-purple-700">
                  <i class="fa-solid fa-book text-[#A07FFB]"></i> Judul Buku Favorit
                  {{ $i }}
                </div>
              </div>
            @endfor
          </div>
        </div>
      </div>

      {{-- Box Top Pemustaka --}}
      <div
        class="analitik-animated-box relative flex min-w-1/2 flex-col gap-6 w-full items-center rounded-[18px] p-[28px] overflow-hidden col-span-2 row-span-3 bg-gradient-to-br from-[#F6EDFF] via-white to-[#E8E6F3] shadow-lg border border-purple-100">
        <div class="relative z-10 w-full rounded-[14px] flex flex-col gap-6 items-center">
          <div
            class="text-[#6835BB] text-[18px] font-extrabold tracking-wide flex items-center gap-2 mb-2">
            <i class="fa-solid fa-crown text-yellow-400 animate-bounce"></i>
            Top Pemustaka
          </div>
          <div id="box-top-pemustaka" class="flex gap-[20px] justify-center">
            <div class="flex flex-col items-center gap-2">
              <div class="relative">
                <img
                  class="w-[70px] h-[70px] bg-gradient-to-tr from-[#E8E6F3] via-[#F2EFFE] to-[#C7D2FE] rounded-full shadow-xl border-4 border-white object-cover">
                <span
                  class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-gradient-to-r from-purple-50 via-purple-100 to-purple-200 px-3 py-1 text-xs text-[#6835BB] font-bold rounded-full shadow border border-purple-300 animate-pulse">#1</span>
              </div>
              <span class="flex items-center gap-1 text-[14px] text-[#4B405B] font-bold">
                <i class="fa-solid fa-user text-[#6835BB]"></i> Nama 1
              </span>
            </div>
            <div class="flex flex-col items-center gap-2">
              <div class="relative">
                <img
                  class="w-[65px] h-[65px] bg-gradient-to-tr from-[#F0E9FF] via-[#E8E6F3] to-[#C7D2FE] rounded-full shadow-md border-4 border-white object-cover opacity-90">
                <span
                  class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-purple-100 px-3 py-1 text-xs text-[#6835BB] font-semibold rounded-full shadow border border-purple-200">#2</span>
              </div>
              <span class="flex items-center gap-1 text-[13px] text-[#6344af] font-semibold">
                <i class="fa-solid fa-user text-[#6344af]"></i> Nama 2
              </span>
            </div>
            <div class="flex flex-col items-center gap-2">
              <div class="relative">
                <img
                  class="w-[60px] h-[60px] bg-gradient-to-tr from-[#F6EDFF] via-[#EEF3FC] to-[#D1C2F2] rounded-full shadow border-4 border-white object-cover opacity-80">
                <span
                  class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-[#E8E6F3] px-3 py-1 text-xs text-[#6835BB] font-medium rounded-full shadow border border-purple-100">#3</span>
              </div>
              <span class="flex items-center gap-1 text-[12px] text-[#6D28D9]">
                <i class="fa-solid fa-user text-[#6D28D9]"></i> Nama 3
              </span>
            </div>
          </div>
        </div>
      </div>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Pie Chart Distribusi Kategori Buku
          const pieKategori = document.getElementById('pie-distribusi-kategori-buku');
          if (pieKategori) {
            // Ganti dari pie menjadi doughnut supaya bulat tengahnya kosong
            new Chart(pieKategori, {
              type: 'doughnut',
              data: {
                labels: [
                  // Menambahkan icon dan warna jika dibutuhkan di legend/label saat custom legend di Chart.js
                  'Fiksi', 'Non-Fiksi', 'Sains', 'Sejarah', 'Biografi', 'Lainnya'
                ],
                datasets: [{
                  data: [35, 20, 15, 10, 8, 12],
                  backgroundColor: [
                    'oklch(78% 0.21 280)', // Fiksi
                    'oklch(85% 0.13 40)', // Non-Fiksi
                    'oklch(78% 0.20 180)', // Sains
                    'oklch(92% 0.22 90)', // Sejarah
                    'oklch(72% 0.18 320)', // Biografi
                    'oklch(83% 0.17 200)' // Lainnya
                  ],
                  borderWidth: 1,
                }]
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
                        weight: 'bold'
                      }
                    }
                  },
                  title: {
                    display: false,
                  }
                }
              }
            });
          }
        });
      </script>
    </section>
  </div>
</div>
