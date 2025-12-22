<x-admin.dashboard>
  <div class="w-full mb-100 lg:mb-0">
    {{-- Title --}}
    <div class="text-[16px] font-semibold mb-4 text-[#212A3E]">
      <i class="fa-solid fa-chart-line"></i>
      Analitik
    </div>

    <style>
      .analitik-animated-box {
        transition: box-shadow 0.3s cubic-bezier(.4, 0, .2, 1), transform 0.3s cubic-bezier(.4, 0, .2, 1);
        background: #fff !important;
        box-shadow: 0 6px 24px 0 rgba(33, 42, 62, 0.10), 0 1.5px 8px 0 rgba(36, 55, 99, 0.10);
        will-change: transform, box-shadow;
      }

      .analitik-animated-box:hover {
        box-shadow: 0 14px 40px -8px rgba(33, 42, 62, 0.16), 0 6px 30px 0 rgba(60, 56, 74, 0.13);
        transform: translateY(-4px) scale(1.025);
        z-index: 2;
      }
    </style>

    {{-- MODAL DETAIL PEMINJAMAN --}}
    <div id="modal-detail-peminjaman"
      class="w-full h-screen z-100 bg-black/10 fixed top-0 left-0 flex justify-center items-center hidden">
      <div
        class="bg-white min-w-[500px] min-h-[300px] rounded-2xl z-100 p-5 text-center relative  max-h-[800px] overflow-auto">

        <div id="modal-detail-konten">
          {{-- Konten Di Load Di sini --}}
        </div>

        {{-- tombol close --}}
        <button id="btn-close-detail-peminjaman"
          class="absolute top-3 right-3 text-gray-600 hover:text-red-500 focus:outline-none"
          title="Tutup">
          <i class="fa-solid fa-xmark fa-lg"></i>
        </button>
      </div>

    </div>

    <div class="flex flex-col w-full space-y-[30px] max-w-[1690.7px] mx-auto">
      {{-- Section A --}}
      <section class="w-full flex gap-[27px] flex-wrap lg:flex-nowrap">
        {{-- Box Total Judul Buku --}}
        <div
          class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
          <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
            <div class="flex items-center gap-2 text-[#394867]">
              <i class="fa-solid fa-book"></i> Total Judul Buku
            </div>
            <div class="flex gap-[14px] items-center">
              <div
                class="bg-[#394867] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
                <i class="fa-solid fa-book"></i>
              </div>
              <div class="text-[#394867]">{{ $dataBuku->count() }}</div>
            </div>
          </div>
        </div>

        {{-- Box Total Buku --}}
        <div
          class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
          <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
            <div class="flex items-center gap-2 text-[#394867]">
              <i class="fa-solid fa-copy"></i> Total Buku
            </div>
            <div class="flex gap-[14px] items-center">
              <div
                class="bg-[#394867] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
                <i class="fa-solid fa-copy"></i>
              </div>
              <div class="text-[#394867]">{{ $dataBuku->sum('eksemplar') }}</div>
            </div>
          </div>
        </div>

        {{-- Box Total Peminjaman --}}
        <div
          class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
          <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
            <div class="flex items-center gap-2 text-[#394867]">
              <i class="fa-solid fa-user"></i> Total Peminjaman
            </div>
            <div class="flex gap-[14px] items-center">
              <div
                class="bg-[#394867] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
                <i class="fa-solid fa-user"></i>
              </div>
              <div class="text-[#394867]">{{ $dataPeminjaman->count() }}</div>
            </div>
          </div>
        </div>

        {{-- Box Total Pengembalian --}}
        <div
          class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
          <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
            <div class="flex items-center gap-2 text-[#394867]">
              <i class="fa-solid fa-book-open-reader"></i> Total Pengembalian
            </div>
            <div class="flex gap-[14px] items-center">
              <div
                class="bg-[#394867] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
                <i class="fa-solid fa-book-open-reader"></i>
              </div>
              <div class="text-[#394867]">{{ $dataPengembalian->count() }}</div>
            </div>
          </div>
        </div>
      </section>

      {{-- Section B --}}
      <section
        class="lg:grid grid-cols-9 gap-[27px] grid-rows-6 flex flex-wrap w-full h-180 font-semibold">

        {{-- Box Distribusi Kategori --}}
        <div
          class="analitik-animated-box relative flex flex-col items-center w-full col-span-3 row-span-6 justify-center rounded-[14px] p-[30px] overflow-hidden">
          <div class="z-10 w-full rounded-[10px] flex flex-col items-center h-full overflow-auto">
            <div class="flex items-center flex-col">
              <div class="flex items-center gap-2 text-[#394867]">
                <i class="fa-solid fa-chart-pie"></i> Distribusi Kategori
              </div>

              <div class="px-20 py-5">
                <canvas id="pie-distribusi-kategori-buku"></canvas>
              </div>
            </div>

            <div class="flex items-center flex-col h-full gap-2">
              <div class="flex items-center gap-2 text-[#394867]">
                <i class="fa-solid fa-chart-pie"></i> Trend Peminjaman
              </div>

              <div class="h-[250px]">
                <canvas id="trend-peminjaman"></canvas>
              </div>
            </div>
          </div>
        </div>

        {{-- List Peminjaman --}}
        <div
          class="col-span-6 row-span-6 analitik-animated-box relative flex min-w-1/2 flex-col gap-6 w-full items-center rounded-[18px] p-[28px] overflow-auto bg-gradient-to-br from-[#F1F6F9] via-[#D6E4F0] to-[#9BA4B5] shadow-lg border border-[#D6E4F0]">
          <div class="flex items-center gap-2 text-[#394867]">
            <i class="fa-solid fa-list"></i> Daftar Peminjaman
          </div>

          @foreach ($dataPeminjaman as $index => $peminjaman)
            <div class="w-full py-1 flex justify-between border-b-[1px] font-medium">
              <div>
                <div class="font-semibold flex">
                  <div>
                    {{ $peminjaman->anggota->nama_lengkap }}
                  </div>

                  <div class="border-l-1 ml-2 pl-2">
                    <div class="font-medium">{{ $peminjaman->detail_peminjaman->count() }} Buku
                    </div>
                  </div>
                </div>
                <div class="font-light">status : <span
                    class="italic">{{ $peminjaman->status }}</span>
                </div>
              </div>

              <div>
                <button
                  class="bg-[#394867] text-white px-3 py-1 rounded hover:bg-[#212A3E] transition duration-150 font-semibold flex items-center gap-1 h-fit btn-detail-peminjaman"
                  title="Detail Peminjaman" type="button" data-id="{{ $peminjaman->id }}">
                  <i class="fa-solid fa-circle-info"></i>
                  Detail
                </button>
              </div>

            </div>
          @endforeach
        </div>

        {{-- Box Detail Denda --}}
        {{-- <div
          class="analitik-animated-box relative flex flex-col items-center w-full col-span-3 row-span-3 justify-center rounded-[14px] p-[30px] overflow-hidden">
          <div class="relative z-10 w-full rounded-[10px] flex flex-col items-center h-full">
            <div class="flex items-center gap-2 text-[#394867]">
              <i class="fa-solid fa-money-bill-wave"></i> Detail Denda
            </div>
            <div>

            </div>
          </div>
        </div> --}}

        {{-- Box Trend Peminjaman  Per Bulan --}}
        {{-- <div
          class="analitik-animated-box relative flex flex-col items-center w-full col-span-3 row-span-3 justify-center rounded-[14px] p-[30px] overflow-hidden">
          <div class="relative z-10 w-full rounded-[10px] flex flex-col items-center h-full">
            <div class="flex items-center gap-2 text-[#394867]">
              <i class="fa-solid fa-chart-area"></i> Trend Peminjaman
            </div>
            <canvas id="trend-peminjaman"></canvas>
          </div>
        </div> --}}

      </section>
    </div>

    @vite('resources/js/analitik.js')

  </div>

</x-admin.dashboard>

<script>
  const modalDetailPeminjaman = document.getElementById('modal-detail-peminjaman');
  const modalDetailKonten = document.getElementById('modal-detail-konten');
  const btnCloseDetailPeminjaman = document.getElementById('btn-close-detail-peminjaman');

  document.addEventListener('DOMContentLoaded', function() {
    // Detail Peminjaman
    document.body.addEventListener('click', function(e) {
      if (e.target.closest('.btn-detail-peminjaman')) {
        const button = e.target.closest('.btn-detail-peminjaman');
        const bukuId = button.getAttribute('data-id');
        modalDetailPeminjaman.classList.remove('hidden');
        modalDetailKonten.innerHTML =
          '<div class="flex justify-center items-center text-[#394867] py-10">Memuat detail...</div>';

        fetch(`/admin/peminjaman/${bukuId}`)
          .then(response => response.text())
          .then(html => {
            modalDetailKonten.innerHTML = html;
          })
          .catch(() => {
            modalDetailKonten.innerHTML =
              '<div class="text-red-500 py-10 text-center">Gagal memuat detail.</div>';
          });
      }
    });

    // Tutup modal jika klik di luar konten
    modalDetailPeminjaman.addEventListener('click', function(e) {
      if (e.target === modalDetailPeminjaman) {
        modalDetailPeminjaman.classList.add('hidden');
      }
    });

    // Fungsi Tombol Close
    btnCloseDetailPeminjaman.addEventListener('click', function() {
      modalDetailPeminjaman.classList.add('hidden');
    });
  });
</script>

<script>
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
</script>
