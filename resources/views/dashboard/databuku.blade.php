<x-admin.dashboard>

  <div class="w-full flex gap-4">
    {{-- FORM TAMBAH BUKU --}}
    <x-admin.form-tambah-buku :dataBuku="$dataBuku" :dataAnggota="$dataAnggota" :dataPengarang="$dataPengarang"
      :dataKategori="$dataKategori" :dataRak="$dataRak" :dataSumber="$dataSumber" :dataPenerbit="$dataPenerbit" />

    <div class="w-full space space-y-4">
      {{-- icon dan judul --}}
      <div class="text-[16px] font-semibold text-[#394867]">
        <i class="fa-solid fa-book"></i> Data-data Buku
      </div>

      {{-- Kolom Pencarian --}}
      <div class="mb-2 relative">
        <input type="text" id="pencarian-admin" autocomplete="off"
          placeholder="Cari judul/penerbit/rak..."
          class="w-full border border-[#394867] px-4 py-2 rounded-lg focus:border-[#212A3E] focus:ring-2 focus:ring-[#394867] text-sm text-[#212A3E] transition" />
        <div id="hasil-admin"
          class="absolute top-full left-0 w-full bg-white text-[#212A3E] rounded shadow-lg max-h-[220px] overflow-auto hidden z-20 border border-[#394867] border-t-0"
          style="min-width: 210px;">
          <ul id="list-hasil-admin" class="divide-y divide-[#F1F6F9]"></ul>
        </div>
      </div>

      {{-- Modal Konfirmasi Hapus --}}
      <div id="hapusModal"
        class="fixed inset-0 z-[9999] bg-black/40 flex items-center justify-center hidden">
        <div
          class="bg-white w-full max-w-sm rounded-2xl shadow-lg relative flex flex-col px-6 py-8 animate-fade-in">
          <button id="closeHapusModal"
            class="absolute top-3 right-4 text-gray-400 hover:text-gray-900 text-lg" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <div class="flex flex-col items-center gap-3">
            <div class="rounded-full bg-red-100 text-red-600 p-4 shadow text-3xl mb-2">
              <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div class="text-[18px] font-semibold text-[#394867] mb-2 text-center">Konfirmasi Hapus
              Buku</div>
            <div class="text-[#6B7280] text-center mb-5">Apakah Anda yakin ingin menghapus buku ini?
              Proses ini tidak bisa dibatalkan.</div>
            <div class="flex gap-3 items-center justify-center w-full">
              <button type="button" id="batalHapusBtn"
                class="bg-[#F1F6F9] hover:bg-[#E9EDF3] text-[#394867] font-semibold px-5 py-2 rounded-lg transition">Batal</button>
              <button type="button" id="konfirmasiHapusBtn"
                class="bg-red-500 hover:bg-red-600 text-white font-semibold px-5 py-2 rounded-lg transition flex items-center gap-2">
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
        class="fixed left-1/2 -translate-x-1/2 bottom-8 z-[9999] bg-green-500 text-white px-5 py-3 rounded-lg flex items-center gap-2 shadow-lg hidden animate-bounce-in">
        <i class="fa-solid fa-check-circle text-2xl"></i>
        <span>Buku berhasil dihapus!</span>
      </div>

      {{-- Modal Edit Buku --}}
      <div id="editModal"
        class="fixed inset-0 z-[9999] bg-black/40 flex items-center justify-center hidden">
        <div
          class="bg-white w-full max-w-2xl max-h-[96vh] my-6 rounded-2xl shadow-lg relative flex flex-col"
          style="max-height: 96vh;">
          <button id="closeEditModal"
            class="absolute top-3 right-4 text-gray-400 hover:text-gray-900 text-lg" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <div class="px-6 py-4 border-b font-bold text-[#394867] flex items-center gap-2">
            <i class="fa-solid fa-pen-to-square"></i> Edit Data Buku
          </div>
          <div class="px-6 py-6 overflow-auto" id="editModalForm" style="max-height: 70vh;">
            {{-- Form edit akan di-load via AJAX --}}
            <div class="flex justify-center items-center text-[#394867] py-10">
              Memuat formulir...
            </div>
          </div>
        </div>
      </div>

      {{-- Modal Detail Buku --}}
      <div id="detailModal"
        class="fixed inset-0 z-50 bg-black/40 flex items-center justify-center overflow-auto hidden"
        style="padding-top: 3vh; padding-bottom: 3vh;">
        <div class="bg-white w-full max-w-2xl rounded-2xl shadow-lg relative my-8"
          style="max-height: 94vh; display: flex; flex-direction: column;">
          <button id="closeDetailModal"
            class="absolute top-3 right-4 text-gray-400 hover:text-gray-900 text-lg" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <div class="px-6 py-4 border-b font-bold text-[#394867] flex items-center gap-2">
            <i class="fa-solid fa-circle-info"></i> Detail Buku
          </div>
          <div class="px-6 py-6 overflow-auto" id="detailModalContent" style="max-height: 70vh;">
            {{-- Detail buku akan di-load via AJAX --}}
            <div class="flex justify-center items-center text-[#394867] py-10">
              Memuat detail...
            </div>
          </div>
        </div>
      </div>

      {{-- kotak konten --}}
      <div
        class="bg-white rounded-2xl shadow-[0px_4px_4px_0px_rgba(57,72,103,0.15)] overflow-hidden">
        {{-- Header kotak dan title --}}
        <div
          class="bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex items-center px-[24px] py-[14px]">
          <div class="text-[14px] font-semibold"><i class="fa-solid fa-book"></i> Data Buku</div>
        </div>

        <div class="w-full p-[24px] space-y-4">
          {{-- Pilihan jumlah buku yang ingin di tampilkan --}}
          <div class="text-[10px] flex gap-4 items-center font-light text-[#212A3E]">
            <div>Show</div>

            <form id="show-entries-form" method="GET" action="/hasPages" class="inline">

              <select name="perPage" id="show-entries"
                class="py-[8px] px-[14px] border border-[#9BA4B5] rounded text-[#212A3E] focus:border-[#394867] focus:ring-[#394867]"
                onchange="document.getElementById('show-entries-form').submit()">
                <option value="10" {{ request('perPage', 10) == 10 ? 'selected' : '' }}>10
                </option>
                <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100
                </option>
              </select>

            </form>

            <div>entries</div>
          </div>

          {{-- Tabel Buku --}}
          <div class="overflow-auto">
            <table class="w-full border border-[#394867] text-[13px]" id="tabel-buku-admin">

              {{-- Judul Kolom --}}
              <thead>
                <tr class="bg-[#F1F6F9]">
                  <th class="border border-[#394867] px-2 py-0 text-[#212A3E] font-semibold w-10">No
                  </th>
                  <th class="border border-[#394867] px-4 py-2 text-[#212A3E] font-semibold w-60">
                    Judul
                  </th>
                  <th class="border border-[#394867] px-3 py-2 text-[#212A3E] font-semibold w-44">
                    Penerbit</th>
                  <th class="border border-[#394867] px-3 py-2 text-[#212A3E] font-semibold w-44">
                    Rak</th>
                  <th class="border border-[#394867] px-3 py-2 text-[#212A3E] font-semibold w-44">
                    Stok</th>

                  <th class="border border-[#394867] px-2 py-1 text-[#212A3E] font-semibold w-24">
                    Aksi
                  </th>
                </tr>
              </thead>

              {{-- Data Tabel --}}
              <tbody id="tabel-buku-body-admin">

                {{-- Kode nomor akan di-handle lewat JS setelah render dan tiap penghapusan --}}
                @forelse ($dataBukuDetail as $index => $buku)
                  <tr class="hover:bg-[#F1F6F9]/50 transition">

                    <td class="border border-[#9BA4B5] px-3 py-2 text-center nomor-buku-td">
                      <!-- nomor akan diisi oleh JS -->
                    </td>

                    {{-- Judul Buku --}}
                    <td class="border border-[#9BA4B5] px-3 py-2 flex gap-2 items-center">
                      <div>
                        @if (isset($buku['gambar']) && $buku['gambar'])
                          <img src="{{ asset('storage/buku/' . $buku['gambar']) }}"
                            alt="Cover {{ $buku['judul'] ?? '-' }}"
                            class="w-12 h-16 object-cover rounded shadow">
                        @else
                          <img src="{{ asset('images/no-cover.png') }}" alt="No Cover"
                            class="w-12 h-16 object-contain opacity-70 rounded shadow mx-auto">
                        @endif
                      </div>

                      <div class="truncate max-w-[180px] flex flex-col gap-2"
                        title="{{ $buku['judul'] ?? '-' }}">
                        <div class="font-semibold">{{ $buku['judul'] ?? '-' }}</div>
                        <div class="italic">{{ $buku['tahun_terbit'] }}</div>
                      </div>
                    </td>

                    {{-- Penerbit --}}
                    <td class="border border-[#9BA4B5] px-3 py-2">
                      <div class="truncate max-w-[140px]" title="{{ $buku['penerbit'] ?? '-' }}">
                        {{ $buku['penerbit'] ?? '-' }}
                      </div>
                    </td>

                    {{-- Rak --}}
                    <td class="border border-[#9BA4B5] px-3 py-2 w-fit">
                      <div class="truncate text-center font-semibold"
                        title="{{ $buku['rak'] ?? '-' }}">
                        {{ $buku['rak'] ?? '-' }}
                      </div>
                    </td>

                    {{-- Ketersediaan --}}
                    <td class="border border-[#9BA4B5] px-3 py-2 w-fit">
                      <div class="truncate text-center"
                        title="{{ $buku['eksemplar'] > 0 ? 'Tersedia' : 'Habis' }}">
                        @if (isset($buku['eksemplar']) && $buku['eksemplar'] > 0)
                          <span class="text-green-600 font-semibold">
                            Tersedia ({{ $buku['eksemplar'] }})
                          </span>
                        @else
                          <span class="text-red-500 font-semibold">
                            Habis
                          </span>
                        @endif
                      </div>
                    </td>

                    {{-- Aksi --}}
                    <td class="border border-[#9BA4B5] px-3 py-2">
                      <div class="flex justify-center gap-2">
                        {{-- Detail --}}
                        <button type="button"
                          class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded transition detailBukuBtn"
                          data-id="{{ $buku['id'] }}" title="Lihat Detail">
                          <i class="fa-solid fa-circle-info"></i>
                        </button>
                        {{-- Edit --}}
                        <button type="button"
                          class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition editBukuBtn"
                          data-id="{{ $buku['id'] }}" title="Edit Data">
                          <i class="fa-solid fa-pen"></i>
                        </button>
                        {{-- Hapus --}}
                        <button type="button"
                          class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition hapusBukuBtn"
                          data-id="{{ $buku['id'] }}"
                          data-route="{{ url('/admin/buku/' . $buku['id']) }}"
                          title="Hapus Data">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center py-10 text-[#9BA4B5]">Tidak ada data
                      buku.
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    @vite('resources/js/table.js')

    {{-- Script untuk handle pencarian, edit modal & detail modal --}}
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Utility: urutkan ulang nomor pada kolom buku
        function updateNomorBukuTable() {
          const tableBody = document.getElementById('tabel-buku-body-admin');
          let no = 1;
          Array.from(tableBody.querySelectorAll('tr')).forEach(tr => {
            if (
              tr.id === 'no-data-buku-admin' ||
              tr.style.display === 'none'
            ) return;
            const tdNo = tr.querySelector('.nomor-buku-td');
            if (tdNo) tdNo.textContent = no++;
          });
        }

        // Panggil updateNomorBukuTable setiap render awal
        updateNomorBukuTable();

        // ---- Search/autocomplete Buku Admin ----
        let debounceTimerAdmin;
        let hasilAdmin = document.getElementById('hasil-admin');
        let pencarianAdmin = document.getElementById('pencarian-admin');
        let listHasilAdmin = document.getElementById('list-hasil-admin');
        let aktifIdxAdmin = -1;

        function getAllBukuData() {
          const rows = document.querySelectorAll('#tabel-buku-body-admin tr');
          let data = [];
          rows.forEach((row, idx) => {
            const judul = row.querySelector('td:nth-child(2) .font-semibold')?.textContent
              .trim() || '';
            const tahun_terbit = row.querySelector('td:nth-child(2) .italic')?.textContent
              .trim() || '';
            const penerbit = row.querySelector('td:nth-child(3) > div')?.textContent.trim() ||
              '';
            const rak = row.querySelector('td:nth-child(4) > div')?.textContent.trim() || '';
            data.push({
              id: idx + 1,
              judul,
              tahun_terbit,
              penerbit,
              rak,
              html: row.innerHTML,
              rowElm: row
            });
          });
          return data;
        }
        let dataBukuCache = getAllBukuData();

        function showSuggestionBox() {
          hasilAdmin.classList.remove('hidden');
        }

        function hideSuggestionBox() {
          hasilAdmin.classList.add('hidden');
          aktifIdxAdmin = -1;
        }

        function updateActiveSuggestion() {
          Array.from(listHasilAdmin.children).forEach((li, idx) => {
            li.classList.toggle('bg-[#F1F6F9]', idx === aktifIdxAdmin);
          });
        }

        pencarianAdmin.addEventListener('input', function() {
          const keyword = this.value.trim().toLowerCase();

          clearTimeout(debounceTimerAdmin);

          if (keyword.length === 0) {
            hideSuggestionBox();
            listHasilAdmin.innerHTML = '';
            filterTableBuku('');
            updateNomorBukuTable(); // update nomor saat pencarian dihapus
            return;
          }

          debounceTimerAdmin = setTimeout(() => {
            let results = dataBukuCache.filter(buku =>
              buku.judul.toLowerCase().includes(keyword) ||
              buku.penerbit.toLowerCase().includes(keyword) ||
              buku.rak.toLowerCase().includes(keyword)
            );
            listHasilAdmin.innerHTML = '';
            if (results.length > 0) {
              results.slice(0, 8).forEach((buku, idx) => {
                let li = document.createElement('li');
                li.className =
                  "px-4 py-2 cursor-pointer hover:bg-[#F1F6F9] text-[13px] transition flex flex-col";
                li.textContent = buku.judul + (buku.tahun_terbit ? ' (' + buku
                  .tahun_terbit + ')' : '');
                li.setAttribute('data-judul', buku.judul);
                li.setAttribute('data-idx', idx);
                li.title = buku.judul + (buku.tahun_terbit ? ' (' + buku.tahun_terbit +
                  ')' : '');
                listHasilAdmin.appendChild(li);
              });
              aktifIdxAdmin = -1;
              showSuggestionBox();
            } else {
              let li = document.createElement('li');
              li.textContent = 'Tidak ditemukan...';
              li.className = "text-[#9BA4B5] italic px-4 py-2";
              listHasilAdmin.appendChild(li);
              aktifIdxAdmin = -1;
              showSuggestionBox();
            }

            filterTableBuku(keyword);
            updateNomorBukuTable(); // update nomor saat filter berubah
          }, 120);
        });

        pencarianAdmin.addEventListener('keydown', function(e) {
          const items = listHasilAdmin.children.length;
          if (hasilAdmin.classList.contains('hidden')) return;

          if (e.key === 'ArrowDown') {
            if (items > 0) {
              aktifIdxAdmin = (aktifIdxAdmin + 1) % items;
              updateActiveSuggestion();
            }
            e.preventDefault();
          } else if (e.key === 'ArrowUp') {
            if (items > 0) {
              aktifIdxAdmin = (aktifIdxAdmin - 1 + items) % items;
              updateActiveSuggestion();
            }
            e.preventDefault();
          } else if (e.key === 'Enter') {
            if (aktifIdxAdmin >= 0 && items > 0) {
              let selected = listHasilAdmin.children[aktifIdxAdmin];
              if (selected && selected.dataset && selected.dataset.judul) {
                pencarianAdmin.value = selected.dataset.judul;
                filterTableBuku(selected.dataset.judul.toLowerCase());
                updateNomorBukuTable();
                hideSuggestionBox();
              }
              e.preventDefault();
            } else if (pencarianAdmin.value.trim()) {
              filterTableBuku(pencarianAdmin.value.trim().toLowerCase());
              updateNomorBukuTable();
              hideSuggestionBox();
            }
          } else if (e.key === 'Escape') {
            hideSuggestionBox();
          }
        });

        listHasilAdmin.addEventListener('click', function(e) {
          let target = e.target.closest('li');
          if (target && target.dataset && target.dataset.judul) {
            pencarianAdmin.value = target.dataset.judul;
            filterTableBuku(target.dataset.judul.toLowerCase());
            updateNomorBukuTable();
            hideSuggestionBox();
            pencarianAdmin.focus();
          }
        });

        listHasilAdmin.addEventListener('mousemove', function(e) {
          let target = e.target.closest('li');
          if (target && target.dataset && typeof target.dataset.idx !== 'undefined') {
            aktifIdxAdmin = parseInt(target.dataset.idx);
            updateActiveSuggestion();
          }
        });

        document.addEventListener('mousedown', function(e) {
          if (!pencarianAdmin.contains(e.target) && !hasilAdmin.contains(e.target)) {
            hideSuggestionBox();
          }
        });

        pencarianAdmin.addEventListener('blur', function() {
          setTimeout(hideSuggestionBox, 150);
        });

        function filterTableBuku(keyword) {
          const table = document.getElementById('tabel-buku-admin');
          const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
          keyword = (keyword || '').toLowerCase();
          let adaData = false;
          let isAllHidden = true;
          for (let row of rows) {
            if (row.id && row.id === 'no-data-buku-admin') continue;
            let judul = row.querySelector('td:nth-child(2) .font-semibold')?.textContent
              .toLowerCase() || '';
            let penerbit = row.querySelector('td:nth-child(3) > div')?.textContent.toLowerCase() ||
              '';
            let rak = row.querySelector('td:nth-child(4) > div')?.textContent.toLowerCase() || '';
            let cocok = keyword.length === 0 || judul.includes(keyword) || penerbit.includes(
              keyword) || rak.includes(keyword);
            row.style.display = cocok ? '' : 'none';
            if (cocok) adaData = true;
            if (row.style.display !== 'none') isAllHidden = false;
          }
          let tableBody = document.getElementById('tabel-buku-body-admin');
          let noRow = document.getElementById('no-data-buku-admin');
          if (!adaData) {
            if (!noRow) {
              noRow = document.createElement('tr');
              noRow.id = 'no-data-buku-admin';
              let td = document.createElement('td');
              td.colSpan = 5;
              td.className = "text-center py-10 text-[#9BA4B5]";
              td.innerText = 'Tidak ada data buku.';
              noRow.appendChild(td);
              tableBody.appendChild(noRow);
            } else {
              noRow.style.display = '';
            }
          } else {
            if (noRow) noRow.style.display = 'none';
          }
          updateNomorBukuTable(); // update nomor ketika filter berubah
        }

        pencarianAdmin.addEventListener('input', function() {
          if (!this.value.trim()) {
            filterTableBuku('');
            updateNomorBukuTable();
          }
        });

        // --- Modal Edit & Detail Buku ---
        const editModal = document.getElementById('editModal');
        const closeEditModal = document.getElementById('closeEditModal');
        const editModalForm = document.getElementById('editModalForm');

        const detailModal = document.getElementById('detailModal');
        const closeDetailModal = document.getElementById('closeDetailModal');
        const detailModalContent = document.getElementById('detailModalContent');

        // --- Modal Hapus Buku ---
        const hapusModal = document.getElementById('hapusModal');
        const closeHapusModal = document.getElementById('closeHapusModal');
        const batalHapusBtn = document.getElementById('batalHapusBtn');
        const konfirmasiHapusBtn = document.getElementById('konfirmasiHapusBtn');
        const hapusBtnLoader = document.getElementById('hapusBtnLoader');
        const hapusBtnText = document.getElementById('hapusBtnText');
        const hapusSuccessSnackbar = document.getElementById('hapusSuccessSnackbar');
        let bukuHapusFormAction = '';
        let bukuHapusRow = null;

        // Event delegation untuk tombol edit, detail, hapus
        document.body.addEventListener('click', function(e) {
          // Edit
          if (e.target.closest('.editBukuBtn')) {
            const button = e.target.closest('.editBukuBtn');
            const bukuId = button.getAttribute('data-id');

            editModal.classList.remove('hidden');
            editModalForm.innerHTML =
              '<div class="flex justify-center items-center text-[#394867] py-10">Memuat formulir...</div>';

            fetch(`/admin/buku/${bukuId}/edit`)
              .then(response => response.text())
              .then(html => {
                editModalForm.innerHTML = html;
              })
              .catch(() => {
                editModalForm.innerHTML =
                  '<div class="text-red-500 py-10 text-center">Gagal memuat data.</div>';
              });
          }

          // Detail
          if (e.target.closest('.detailBukuBtn')) {
            const button = e.target.closest('.detailBukuBtn');
            const bukuId = button.getAttribute('data-id');
            detailModal.classList.remove('hidden');
            detailModalContent.innerHTML =
              '<div class="flex justify-center items-center text-[#394867] py-10">Memuat detail...</div>';

            fetch(`/admin/buku/${bukuId}`)
              .then(response => response.text())
              .then(html => {
                detailModalContent.innerHTML = html;
              })
              .catch(() => {
                detailModalContent.innerHTML =
                  '<div class="text-red-500 py-10 text-center">Gagal memuat detail.</div>';
              });
          }

          // Hapus
          if (e.target.closest('.hapusBukuBtn')) {
            const btn = e.target.closest('.hapusBukuBtn');
            bukuHapusFormAction = btn.getAttribute('data-route');
            // Simpan TR row supaya bisa remove
            bukuHapusRow = btn.closest('tr');
            hapusModal.classList.remove('hidden');
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
            hapusModal.classList.add('hidden');
            resetHapusModalBtn();
          });
        }
        if (batalHapusBtn) {
          batalHapusBtn.addEventListener('click', function() {
            hapusModal.classList.add('hidden');
            resetHapusModalBtn();
          });
        }

        if (konfirmasiHapusBtn) {
          konfirmasiHapusBtn.addEventListener('click', function() {
            if (!bukuHapusFormAction || !bukuHapusRow) return;
            konfirmasiHapusBtn.disabled = true;
            hapusBtnText.classList.add('hidden');
            hapusBtnLoader.classList.remove('hidden');

            fetch(bukuHapusFormAction, {
                method: 'POST',
                headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
                  'X-Requested-With': 'XMLHttpRequest',
                  'Accept': 'application/json',
                },
                body: new URLSearchParams({
                  _method: 'DELETE'
                }),
              })
              .then(response => {
                if (!response.ok) throw new Error();
                return response.json ? response.json() : {};
              })
              .then(() => {
                // Animasi fade out row
                bukuHapusRow.classList.add('animate-fade-out');
                setTimeout(() => {
                  bukuHapusRow.remove();
                  // Tampilkan snackbar success
                  hapusSuccessSnackbar.classList.remove('hidden');
                  // Hide modal
                  hapusModal.classList.add('hidden');
                  resetHapusModalBtn();

                  setTimeout(() => {
                    hapusSuccessSnackbar.classList.add('hidden');
                  }, 1700);

                  // Jika tabel kosong tampilkan pesan
                  const table = document.getElementById('tabel-buku-admin');
                  const tbody = table.querySelector('tbody');
                  const visibleRows = Array.from(tbody.querySelectorAll('tr')).filter(
                    row => row.offsetParent !== null && row.id !== 'no-data-buku-admin');
                  // update nomor setelah hapus
                  updateNomorBukuTable();

                  if (visibleRows.length === 0) {
                    let noRow = document.getElementById('no-data-buku-admin');
                    if (!noRow) {
                      noRow = document.createElement('tr');
                      noRow.id = "no-data-buku-admin";
                      let td = document.createElement('td');
                      td.colSpan = 5;
                      td.className = "text-center py-10 text-[#9BA4B5]";
                      td.innerText = "Tidak ada data buku.";
                      noRow.appendChild(td);
                      tbody.appendChild(noRow);
                    } else {
                      noRow.style.display = '';
                    }
                  }
                }, 400); // sesuai animasi
              })
              .catch(() => {
                resetHapusModalBtn();
                konfirmasiHapusBtn.classList.add('shake'); // animasi gagal
                setTimeout(() => konfirmasiHapusBtn.classList.remove('shake'), 650);
              });
          });
        }

        // Optional: Tutup modal jika klik di luar konten
        editModal.addEventListener('click', function(e) {
          if (e.target === editModal) {
            editModal.classList.add('hidden');
          }
        });
        detailModal.addEventListener('click', function(e) {
          if (e.target === detailModal) {
            detailModal.classList.add('hidden');
          }
        });
        hapusModal.addEventListener('click', function(e) {
          if (e.target === hapusModal) {
            hapusModal.classList.add('hidden');
            resetHapusModalBtn();
          }
        });

        closeEditModal?.addEventListener('click', function() {
          editModal.classList.add('hidden');
        });
        closeDetailModal?.addEventListener('click', function() {
          detailModal.classList.add('hidden');
        });

        // CSS Animasi (Tambahkan jika belum ada)
        const styleFade = document.createElement('style');
        styleFade.innerHTML = `
        @keyframes fadeOutRow { from {opacity:1; transform: scale(1);} to {opacity:0; transform: scale(0.95);} }
        .animate-fade-out { animation: fadeOutRow 0.4s forwards; }
        @keyframes fadeInModal { from{opacity:0;transform:scale(0.97);} to{opacity:1;transform:scale(1);} }
        .animate-fade-in { animation: fadeInModal .25s;}
        @keyframes bounceIn { 0%{opacity:0;transform:translateY(30px);} 52%{opacity:1;transform:translateY(-6px);} 75%{transform:translateY(3px);} 100%{transform:translateY(0);} }
        .animate-bounce-in { animation: bounceIn .7s; }
        @keyframes shakeX { 8%,41% {transform:translateX(-8px)} 25%,58%{transform:translateX(6px)} 75%{transform:translateX(-4px)} 92%{transform:translateX(2px)} 100%{transform:translateX(0)} }
        .shake { animation: shakeX .65s; }
      `;
        document.head.appendChild(styleFade);

      });
    </script>
  </div>

</x-admin.dashboard>
