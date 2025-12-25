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
        <div class="font-light">status : <span class="italic">{{ $peminjaman->status }}</span>
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

{{-- Script Peminjaman --}}
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
