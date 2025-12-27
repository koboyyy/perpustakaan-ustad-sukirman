{{-- MODAL DETAIL PEMINJAMAN --}}
<div id="modal-detail-peminjaman"
  class="w-full h-screen z-9999 bg-black/10 fixed top-0 left-0 flex justify-center items-center hidden">
  <div
    class="bg-white mx-2 min-h-[300px] rounded-2xl z-100 p-5 text-center relative  max-h-[800px] overflow-auto">

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

<div class="col-span-6 row-span-6 relative flex min-w-1/2 flex-col gap-2 w-full">

  <div class="flex items-center gap-2 text-[#394867]">
    <i class="fa-solid fa-list"></i> Daftar Peminjaman
  </div>

  @foreach ($dataPeminjaman as $index => $peminjaman)
    <div
      class="w-full bg-white flex justify-between items-center font-medium border border-black/10 rounded-3xl px-4 py-3">
      <div class="flex items-center">
        <span
          class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-[#394867]/10 mr-3">
          <i class="fa-solid fa-book-bookmark text-[#394867]"></i>
        </span>
        <div class="font-semibold flex flex-col text-xm">
          <div>
            {{ $peminjaman->anggota ? $peminjaman->anggota->nama_lengkap : ' Tidak di kenali ' }}
          </div>

          <div class="font-medium">{{ $peminjaman->tanggal_pinjam }}
          </div>
        </div>
      </div>

      <div class="flex gap-1 items-center">
        <div>
          <button
            class="bg-[#394867] text-white px-3 py-1 rounded hover:bg-[#212A3E] transition duration-150 font-semibold flex items-center gap-1 h-fit btn-ubah-status"
            title="Ubah Status" type="button" data-id="{{ $peminjaman->id }}">
            <i class="fa-solid fa-arrows-rotate"></i>
          </button>
        </div>

        <div>
          <button
            class="text-[#394867] px-3 py-1 rounded hover:bg-[#212A3E] transition duration-150 font-semibold flex items-center gap-1 h-fit btn-detail-peminjaman"
            title="Detail Peminjaman" type="button" data-id="{{ $peminjaman->id }}">
            >
          </button>
        </div>
      </div>

    </div>
  @endforeach

  {{ $dataPeminjaman->links() }}
</div>

{{-- Script Peminjaman --}}
<script>
  const modalDetailPeminjaman = document.getElementById('modal-detail-peminjaman');
  const modalDetailKonten = document.getElementById('modal-detail-konten');
  const btnCloseDetailPeminjaman = document.getElementById('btn-close-detail-peminjaman');

  document.addEventListener('DOMContentLoaded', function() {
    // Detail Peminjaman
    document.body.addEventListener('click', function(e) {
      console.log(e.target.closest('.btn-detail-peminjaman'))
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

      if (e.target.closest('.btn-ubah-status')) {
        const button = e.target.closest('.btn-ubah-status');
        const bukuId = button.getAttribute('data-id');

        fetch(`/admin/peminjaman/update-status/${bukuId}`)
          .then(response => response.json())
          .then(data => {
            if (data.success === true && data.status) {
              // Tampilkan alert, lalu reload halaman
              alert('Status berhasil diubah menjadi: ' + data.status);
              location.reload();
            }
          })
          .catch(() => {
            console.log('data gagal')
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
