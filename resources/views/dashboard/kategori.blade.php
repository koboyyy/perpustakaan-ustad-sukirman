<x-admin.dashboard>

  <div class="space-y-5">

    <x-admin.form-tambah-kategori />

    {{-- kotak konten --}}
    <div class="bg-white rounded-2xl shadow-[0px_4px_4px_0px_rgba(57,72,103,0.15)] overflow-hidden">

      {{-- Modal Konfirmasi Hapus --}}
      <div id="hapusModal"
        class="fixed inset-0 z-9999 bg-black/40 flex items-center justify-center hidden">
        <div
          class="bg-white w-full max-w-sm rounded-2xl shadow-lg relative flex flex-col px-6 py-8 animate-fade-in">
          <button id="closeHapusModal"
            class="absolute top-3 right-4 text-gray-400 hover:text-gray-900 text-lg" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <div class="flex flex-col items-center gap-3">
            <div class="rounded-full bg-red-100 text-red-700 p-4 shadow text-3xl mb-2">
              <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div class="text-[18px] font-semibold text-[#394867] mb-2 text-center">Konfirmasi
              Hapus
              Kategori</div>
            <div class="text-[#6B7280] text-center mb-5">Apakah Anda yakin ingin menghapus kategori
              ini?
              Proses ini tidak bisa dibatalkan.</div>
            <div class="flex gap-3 items-center justify-center w-full">
              <button type="button" id="batalHapusBtn"
                class="bg-[#F1F6F9] hover:bg-[#E9EDF3] text-[#394867] font-semibold px-5 py-2 rounded-lg transition">Batal</button>
              <button type="button" id="konfirmasiHapusBtn"
                class="bg-red-700 hover:bg-red-600 text-white font-semibold px-5 py-2 rounded-lg transition flex items-center gap-2">
                <span id="hapusBtnIcon"><i class="fa-solid fa-trash"></i></span>
                <span id="hapusBtnText">Hapus</span>
                <span id="hapusBtnLoader" class="hidden animate-spin"><i
                    class="fa-solid fa-spinner"></i></span>
              </button>
            </div>
          </div>
        </div>
      </div>

      {{-- Modal/Snackbar Success --}}
      <div id="hapusSuccessSnackbar"
        class="fixed left-1/2 -translate-x-1/2 bottom-8 z-9999 bg-green-500 text-white px-5 py-3 rounded-lg flex items-center gap-2 shadow-lg hidden animate-bounce-in">
        <i class="fa-solid fa-check-circle text-2xl"></i>
        <span>Kategori berhasil dihapus!</span>
      </div>

      {{-- Header kotak dan title --}}
      <div
        class="bg-linear-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex items-center px-[24px] py-[14px]">
        <div class="text-[14px] font-semibold"><i class="fa-solid fa-list"></i> Data Kategori</div>
      </div>

      <div class="w-full p-[24px] space-y-4">
        {{-- Tabel Kategori --}}
        <div class="overflow-auto">
          <div>
            <table class="w-full border border-[#394867] text-[13px]" id="tabel-kategori-admin">

              {{-- Judul Kolom --}}
              <thead>
                <tr class="bg-[#F1F6F9]">
                  <th class="border border-[#394867] px-2 py-0 text-[#212A3E] font-semibold w-10">
                    No
                  </th>
                  <th class="border border-[#394867] px-4 py-2 text-[#212A3E] font-semibold w-60">
                    Nama Kategori
                  </th>
                  <th class="border border-[#394867] px-3 py-2 text-[#212A3E] font-semibold w-24">
                    <i class="fa-solid fa-gear"></i> Aksi
                  </th>
                </tr>
              </thead>

              {{-- Data Tabel --}}
              <tbody id="tabel-kategori-body-admin">
                @forelse ($dataKategori as $index => $kategori)
                  <tr class="hover:bg-[#F1F6F9]/50 transition">
                    <td class="border border-[#9BA4B5] px-3 py-2 text-center nomor-kategori-td">
                      <!-- nomor akan diisi oleh JS -->
                    </td>

                    {{-- Nama Kategori --}}
                    <td class="border border-[#9BA4B5] px-3 py-2">
                      <div class="truncate max-w-[140px]"
                        title="{{ $kategori->nama_kategori ?? '-' }}">
                        {{ $kategori->nama_kategori ?? '-' }}
                      </div>
                    </td>

                    {{-- Aksi --}}
                    <td class="border border-[#9BA4B5] px-3 py-2">
                      <div class="flex justify-center gap-2">
                        {{-- Hapus --}}
                        <button type="button"
                          class="bg-red-700 hover:bg-red-600 text-white px-3 py-1 rounded transition hapusKategoriBtn"
                          data-id="{{ $kategori->id }}"
                          data-route="{{ url('/admin/kategori/' . $kategori->id) }}"
                          title="Hapus Data">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr id="no-data-kategori-admin">
                    <td colspan="3" class="text-center py-10 text-[#9BA4B5]">Tidak ada data
                      kategori.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin.dashboard>

<script>
  // --- Hapus Kategori Modal & Fungsi ---
  const hapusModal = document.getElementById('hapusModal');
  const closeHapusModal = document.getElementById('closeHapusModal');
  const batalHapusBtn = document.getElementById('batalHapusBtn');
  const konfirmasiHapusBtn = document.getElementById('konfirmasiHapusBtn');
  const hapusBtnLoader = document.getElementById('hapusBtnLoader');
  const hapusBtnText = document.getElementById('hapusBtnText');
  const hapusSuccessSnackbar = document.getElementById('hapusSuccessSnackbar');
  let kategoriHapusFormAction = '';
  let kategoriHapusRow = null;

  // Event delegation untuk tombol hapus Kategori
  document.body.addEventListener('click', function(e) {
    if (e.target.closest('.hapusKategoriBtn')) {
      const btn = e.target.closest('.hapusKategoriBtn');
      kategoriHapusFormAction = btn.getAttribute('data-route');
      kategoriHapusRow = btn.closest('tr');
      if (hapusModal) {
        hapusModal.classList.remove('hidden');
      }
    }
  });

  function resetHapusModalBtn() {
    if (hapusBtnLoader && hapusBtnText && konfirmasiHapusBtn) {
      hapusBtnLoader.classList.add('hidden');
      hapusBtnText.classList.remove('hidden');
      konfirmasiHapusBtn.disabled = false;
    }
  }

  if (closeHapusModal) {
    closeHapusModal.addEventListener('click', function() {
      if (hapusModal) {
        hapusModal.classList.add('hidden');
      }
      resetHapusModalBtn();
    });
  }
  if (batalHapusBtn) {
    batalHapusBtn.addEventListener('click', function() {
      if (hapusModal) {
        hapusModal.classList.add('hidden');
      }
      resetHapusModalBtn();
    });
  }

  if (konfirmasiHapusBtn) {
    konfirmasiHapusBtn.addEventListener('click', function() {
      if (!kategoriHapusFormAction || !kategoriHapusRow) return;
      konfirmasiHapusBtn.disabled = true;
      if (hapusBtnText) hapusBtnText.classList.add('hidden');
      if (hapusBtnLoader) hapusBtnLoader.classList.remove('hidden');

      fetch(kategoriHapusFormAction, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
          },
          body: new URLSearchParams({
            _method: 'DELETE',
          }),
        })
        .then(response => {
          if (!response.ok) throw new Error();
          return response.json ? response.json() : {};
        })
        .then(() => {
          // Animasi fade out row
          if (kategoriHapusRow) kategoriHapusRow.classList.add('animate-fade-out');
          setTimeout(() => {
            if (kategoriHapusRow) kategoriHapusRow.remove();
            if (hapusSuccessSnackbar) hapusSuccessSnackbar.classList.remove('hidden');
            // Hide modal
            if (hapusModal) hapusModal.classList.add('hidden');
            resetHapusModalBtn();

            setTimeout(() => {
              if (hapusSuccessSnackbar) hapusSuccessSnackbar.classList.add('hidden');
            }, 1700);

            // Jika tabel kosong tampilkan pesan
            const table = document.getElementById('tabel-kategori-admin');
            const tbody = table ? table.querySelector('tbody') : null;
            const visibleRows = tbody ?
              Array.from(tbody.querySelectorAll('tr')).filter(
                row => row.offsetParent !== null && row.id !== 'no-data-kategori-admin'
              ) : [];

            // Update nomor setelah hapus
            updateNomorKategoriTable();

            if (tbody && visibleRows.length === 0) {
              let noRow = document.getElementById('no-data-kategori-admin');
              if (!noRow) {
                noRow = document.createElement('tr');
                noRow.id = 'no-data-kategori-admin';
                let td = document.createElement('td');
                td.colSpan = 3;
                td.className = 'text-center py-10 text-[#9BA4B5]';
                td.innerText = 'Tidak ada data kategori.';
                noRow.appendChild(td);
                tbody.appendChild(noRow);
              } else {
                noRow.style.display = '';
              }
            }
          }, 400);
        })
        .catch(() => {
          resetHapusModalBtn();
          if (konfirmasiHapusBtn) {
            konfirmasiHapusBtn.classList.add('shake');
            setTimeout(() => konfirmasiHapusBtn.classList.remove('shake'), 650);
          }
        });
    });
  }

  // Fungsi update nomor pada tabel Kategori setelah hapus
  function updateNomorKategoriTable() {
    const tbody = document.getElementById('tabel-kategori-body-admin');
    if (!tbody) return;
    const rows = Array.from(tbody.querySelectorAll('tr')).filter(
      row => row.offsetParent !== null && row.id !== 'no-data-kategori-admin'
    );
    rows.forEach((row, idx) => {
      let firstCell = row.querySelector('.nomor-kategori-td');
      if (firstCell) {
        firstCell.textContent = idx + 1;
      }
    });
  }

  // CSS Animasi (Tambahkan jika belum ada)
  (function appendKategoriStyle() {
    if (document.getElementById('kategori-style-fade')) return;
    const styleFade = document.createElement('style');
    styleFade.id = 'kategori-style-fade';
    styleFade.innerHTML = `
      @keyframes fadeOutRow { from {opacity:1; transform: scale(1);} to {opacity:0; transform: scale(0.95);} }
      .animate-fade-out { animation: fadeOutRow 0.4s forwards; }
      @keyframes shakeX { 8%,41% {transform:translateX(-8px)} 25%,58%{transform:translateX(6px)} 75%{transform:translateX(-4px)} 92%{transform:translateX(2px)} 100%{transform:translateX(0)} }
      .shake { animation: shakeX .65s; }
    `;
    document.head.appendChild(styleFade);
  })();

  // Update nomor kategori saat halaman dimuat (biar tidak kosong nomor)
  document.addEventListener('DOMContentLoaded', function() {
    updateNomorKategoriTable();
  });
</script>
