<x-admin.dashboard>
  {{-- MODAL DETAIL PENGEMBALIAN --}}
  <div id="modal-detail-pengembalian"
    class="w-full h-screen z-9999 bg-black/10 fixed top-0 left-0 flex justify-center items-center hidden">
    <div
      class="bg-white mx-2 min-h-[300px] rounded-2xl z-100 p-5 text-center relative  max-h-[800px] overflow-auto">

      <div id="modal-detail-konten">
        {{-- Konten detail pengembalian di-load di sini --}}
      </div>

      {{-- tombol close --}}
      <button id="btn-close-detail-pengembalian"
        class="absolute top-3 right-3 text-gray-600 hover:text-red-500 focus:outline-none"
        title="Tutup">
        <i class="fa-solid fa-xmark fa-lg"></i>
      </button>
    </div>
  </div>

  <div class="col-span-6 row-span-6 relative flex min-w-1/2 flex-col gap-2 w-full">
    <div class="flex items-center gap-2 text-[#394867]">
      <i class="fa-solid fa-list"></i> Daftar Pengembalian
    </div>

    @if ($dataPengembalian->isEmpty())
      <div class="text-gray-400 py-4 text-center">Belum Ada Pengembalian</div>
    @endif

    <div class="w-full space-y-4">
      @foreach ($dataPengembalian as $index => $pengembalian)
        <div
          class="w-full bg-white flex justify-between items-center font-medium border border-black/10 rounded-3xl px-4 py-3">
          <div class="flex items-center">
            <span
              class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-[#394867]/10 mr-3">
              <i class="fa-solid fa-book-bookmark text-[#394867]"></i>
            </span>
            <div class="font-semibold flex flex-col text-xm">
              <div>
                {{ $pengembalian->peminjaman->anggota->nama_lengkap ?? '-' }}
              </div>
              <div class="font-medium">{{ $pengembalian->tanggal_kembali ?? '-' }}</div>
            </div>
          </div>

          {{-- Buku --}}
          <div class="">
            <span class="font-semibold">Buku Dipinjam:</span>
            <ul class="list-disc pl-6">
              @if (
                  !empty($pengembalian->peminjaman) &&
                      !empty($pengembalian->peminjaman->detail_peminjaman) &&
                      count($pengembalian->peminjaman->detail_peminjaman))
                @foreach ($pengembalian->peminjaman->detail_peminjaman as $detail)
                  <li>
                    {{ $detail->buku->judul_buku ?? '-' }}
                  </li>
                @endforeach
              @else
                <li>-</li>
              @endif
            </ul>
          </div>
        </div>
    </div>
    @endforeach
  </div>

  </div>

  {{-- Script Pengembalian --}}
  <script>
    const modalDetailPengembalian = document.getElementById('modal-detail-pengembalian');
    const modalDetailKonten = document.getElementById('modal-detail-konten');
    const btnCloseDetailPengembalian = document.getElementById('btn-close-detail-pengembalian');

    document.addEventListener('DOMContentLoaded', function() {
      // Detail Pengembalian
      document.body.addEventListener('click', function(e) {
        if (e.target.closest('.btn-detail-pengembalian')) {
          const button = e.target.closest('.btn-detail-pengembalian');
          const pengembalianId = button.getAttribute('data-id');
          modalDetailPengembalian.classList.remove('hidden');
          modalDetailKonten.innerHTML =
            '<div class="flex justify-center items-center text-[#394867] py-10">Memuat detail...</div>';

          // ENDPOINT untuk mengambil detail pengembalian
          fetch(`/admin/pengembalian/detail/${pengembalianId}`)
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

      modalDetailPengembalian.addEventListener('click', function(e) {
        if (e.target === modalDetailPengembalian) {
          modalDetailPengembalian.classList.add('hidden');
        }
      });

      btnCloseDetailPengembalian.addEventListener('click', function() {
        modalDetailPengembalian.classList.add('hidden');
      });
    });
  </script>

</x-admin.dashboard>
