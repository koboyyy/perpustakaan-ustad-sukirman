<x-admin.dashboard>

  <div class="w-full flex gap-4 relative">

    @if (session()->has('error-edit'))
      <div class="bg-pink-300 p-5 text-2xl font-bold">
        {{ session('error-edit') }}
      </div>
    @endif

    {{-- FORM TAMBAH BUKU --}}
    <x-admin.form-tambah-buku :dataBuku="$dataBuku" :dataAnggota="$dataAnggota" :dataKategori="$dataKategori"
      :dataRak="$dataRak" :dataSumber="$dataSumber" :dataPenerbit="$dataPenerbit" />

    <div class="w-full space space-y-4">

      <!-- Tombol Tambah Penerbit -->
      <button
        class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-6 rounded-lg transition"
        onclick="document.querySelector('.form-tambah-penerbit').classList.remove('hidden')"
        type="button">
        <i class="fa-solid fa-building mr-2"></i> Tambah Penerbit
      </button>

      <!-- Tombol Tambah Rak -->
      <button
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition ml-2"
        onclick="document.querySelector('.form-tambah-rak').classList.remove('hidden')"
        type="button">
        <i class="fa-solid fa-layer-group mr-2"></i> Tambah Rak
      </button>

      <!-- Tombol Tambah Kategori -->
      <button
        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg transition ml-2"
        onclick="document.querySelector('.form-data').classList.remove('hidden')" type="button">
        <i class="fa-solid fa-tags mr-2"></i> Tambah Kategori
      </button>

      <!-- Tombol Tambah Sumber -->
      <button
        class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 px-6 rounded-lg transition ml-2"
        onclick="document.querySelector('.form-tambah-sumber').classList.remove('hidden')"
        type="button">
        <i class="fa-solid fa-gift mr-2"></i> Tambah Sumber
      </button>

      <!-- Modal Tambah Penerbit -->
      <div
        class="flex fixed top-0 left-0 w-full h-screen justify-center items-center form-tambah-penerbit hidden">
        <!-- overlay -->
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="z-9999 w-full flex justify-center">
          <x-admin.form-tambah-penerbit />
        </div>
      </div>

      <!-- Modal Tambah Rak -->
      <div
        class="flex fixed top-0 left-0 w-full h-screen justify-center items-center form-tambah-rak hidden">
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="z-9999 w-full flex justify-center">
          <x-admin.form-tambah-rak />
        </div>
      </div>

      <!-- Modal Tambah Sumber -->
      <div
        class="flex fixed top-0 left-0 w-full h-screen justify-center items-center form-tambah-sumber hidden">
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="z-9999 w-full flex justify-center">
          <x-admin.form-tambah-sumber />
        </div>
      </div>

      <!-- Modal Tambah Kategori -->
      <div
        class="flex fixed top-0 left-0 w-full h-screen justify-center items-center form-data hidden">
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="z-9999 w-full flex justify-center">
          <x-admin.form-tambah-kategori />
        </div>
      </div>

      {{-- icon dan judul --}}
      <div class="text-[16px] font-semibold text-[#394867]">
        <i class="fa-solid fa-book"></i> Data-data Buku
      </div>

      {{-- Pencarian --}}
      <div class="flex flex-col justify-between w-full items-start mb-7 mx-auto relative">
        {{-- Field Pencarian --}}
        <div class="flex gap-3 items-center w-full">
          <form action="{{ route('pencarian-dashboard-buku') }}" method="GET"
            class="w-full h-12 flex items-center rounded-lg shadow border border-[#9BA4B5] bg-white px-1"
            autocomplete="off">
            {{-- Input --}}
            <input type="text" name="pencarian" placeholder="Cari buku..." id="pencarian"
              autocomplete="off" value="{{ request('pencarian') }}"
              class="w-full h-full px-4 outline-none text-base text-[#212A3E] bg-transparent" />
            {{-- Tombol --}}
            <button
              class="w-10 h-10 rounded-lg bg-[#394867] hover:bg-[#212A3E] flex items-center justify-center transition-colors text-white"
              type="submit">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
        </div>

        {{-- Hasil Pencarian --}}
        <div id="kotak-saran"
          class="bg-white z-50 border border-[#9BA4B5] shadow rounded-xl w-full absolute top-14 py-2 hidden">
          {{-- Konten Dinamis --}}
        </div>
      </div>

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
            <div class="rounded-full bg-red-100 text-red-600 p-4 shadow text-3xl mb-2">
              <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div class="text-[18px] font-semibold text-[#394867] mb-2 text-center">Konfirmasi
              Hapus
              Buku</div>
            <div class="text-[#6B7280] text-center mb-5">Apakah Anda yakin ingin menghapus buku
              ini?
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
        class="fixed left-1/2 -translate-x-1/2 bottom-8 z-9999 bg-green-500 text-white px-5 py-3 rounded-lg flex items-center gap-2 shadow-lg hidden animate-bounce-in">
        <i class="fa-solid fa-check-circle text-2xl"></i>
        <span>Buku berhasil dihapus!</span>
      </div>

      {{-- Modal Edit Buku --}}
      <div id="editModal"
        class="fixed inset-0 z-9999 bg-black/40 flex items-center justify-center hidden">
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
            class="absolute top-3 right-4 text-gray-400 hover:text-gray-900 text-lg"
            type="button">
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
          class="bg-linear-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex items-center px-[24px] py-[14px]">
          <div class="text-[14px] font-semibold"><i class="fa-solid fa-book"></i> Data Buku
          </div>
        </div>

        <div class="w-full p-[24px] space-y-4">
          {{-- Tabel Buku --}}
          <div class="overflow-auto">
            <table class="w-full border border-[#394867] text-[13px]" id="tabel-buku-admin">

              {{-- Judul Kolom --}}
              <thead>
                <tr class="bg-[#F1F6F9]">
                  <th class="border border-[#394867] px-2 py-0 text-[#212A3E] font-semibold w-10">
                    No
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
                    <i class="fa-solid fa-gear"></i> Aksi
                  </th>
                </tr>
              </thead>

              {{-- Data Tabel --}}
              <tbody id="tabel-buku-body-admin">
                @forelse ($dataBuku as $index => $buku)
                  <tr class="hover:bg-[#F1F6F9]/50 transition">
                    <td class="border border-[#9BA4B5] px-3 py-2 text-center nomor-buku-td">
                      <!-- nomor akan diisi oleh JS -->
                    </td>
                    {{-- Judul Buku --}}
                    <td class="border border-[#9BA4B5] px-3 py-2 flex gap-2 items-center">
                      <div>
                        @if ($buku->cover)
                          <img src="{{ asset('storage/' . $buku->cover) }}"
                            alt="Cover {{ $buku->judul ?? '-' }}"
                            class="w-12 h-16 object-cover rounded shadow">
                        @else
                          <img src="{{ asset('images/no-cover.png') }}" alt="No Cover"
                            class="w-12 h-16 object-contain opacity-70 rounded shadow mx-auto">
                        @endif
                      </div>
                      <div class="truncate max-w-[180px] flex flex-col gap-2"
                        title="{{ $buku->judul ?? '-' }}">
                        <div class="font-semibold">{{ $buku->judul_buku ?? '-' }}</div>
                        <div class="italic">{{ $buku->tahun_terbit }}</div>
                      </div>
                    </td>
                    {{-- Penerbit --}}
                    <td class="border border-[#9BA4B5] px-3 py-2">
                      <div class="truncate max-w-[140px]"
                        title="{{ $buku->penerbit->nama_penerbit ?? '-' }}">
                        {{ $buku->penerbit->nama_penerbit ?? '-' }}
                      </div>
                    </td>
                    {{-- Rak --}}
                    <td class="border border-[#9BA4B5] px-3 py-2 w-fit">
                      <div class="truncate text-center font-semibold"
                        title="{{ $buku->rak->no_rak ?? '-' }}">
                        {{ $buku->rak->no_rak ?? '-' }}
                      </div>
                    </td>
                    {{-- Ketersediaan --}}
                    <td class="border border-[#9BA4B5] px-3 py-2 w-fit">
                      <div class="truncate text-center"
                        title="{{ $buku->eksemplar > 0 ? 'Tersedia' : 'Habis' }}">
                        @if (isset($buku->eksemplar) && $buku->eksemplar > 0)
                          <span class="text-green-600 font-semibold">
                            Tersedia ({{ $buku->eksemplar }})
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
                          data-id="{{ $buku->id }}" title="Lihat Detail">
                          <i class="fa-solid fa-circle-info"></i>
                        </button>
                        {{-- Edit --}}
                        <button type="button"
                          class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition editBukuBtn"
                          data-id="{{ $buku->id }}" title="Edit Data">
                          <i class="fa-solid fa-pen"></i>
                        </button>
                        {{-- Hapus --}}
                        <button type="button"
                          class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition hapusBukuBtn"
                          data-id="{{ $buku->id }}"
                          data-route="{{ url('/admin/buku/' . $buku->id) }}" title="Hapus Data">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center py-10 text-[#9BA4B5]">Tidak ada data
                      buku.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            <div class="mt-5">
              {{ $dataBuku->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>

    @vite('resources/js/table.js')
  </div>

</x-admin.dashboard>

{{-- Fitur Pencarian --}}
<script>
  let activeSuggestionIndex = -1;
  let suggestionData = [];

  function showSuggestionBox() {
    const hasil = document.getElementById('kotak-saran');
    hasil.classList.remove('hidden');
    hasil.classList.add('block');
  }

  function hideSuggestionBox() {
    const hasil = document.getElementById('kotak-saran');
    hasil.classList.remove('block');
    hasil.classList.add('hidden');
    activeSuggestionIndex = -1;
  }

  function updateActiveSuggestion() {
    // Highlight suggestion yang aktif, clear yang lain
    const listEls = document.querySelectorAll('#kotak-saran div');
    listEls.forEach((div, idx) => {
      div.classList.remove('bg-[#9BA4B5]/20', 'font-bold');
      if (idx === activeSuggestionIndex) {
        div.classList.add('bg-[#9BA4B5]/20', 'font-bold');
      }
    });
  }

  // Bugfix: Pakai 'input' event untuk fetch saran/jalankan pencarian, bukan 'keydown'
  document.getElementById('pencarian').addEventListener('input', function(e) {
    var keyword = this.value;
    const kotakSaran = document.getElementById('kotak-saran');

    if (keyword.length > 0) {
      fetch(`/live-search-buku?keyword=${encodeURIComponent(keyword)}`)
        .then(response => response.json())
        .then(data => {
          kotakSaran.innerHTML = '';
          suggestionData = data || [];
          activeSuggestionIndex = -1;

          if (suggestionData.length > 0) {
            showSuggestionBox();
            suggestionData.forEach(function(item, idx) {
              const div = document.createElement('div');
              div.className =
                'py-3 px-9 hover:bg-[#9BA4B5]/10 cursor-pointer text-[#212A3E]';
              div.setAttribute('data-idx', idx);
              div.setAttribute('data-judul', item.judul_buku);
              div.innerHTML = `<span class="font-semibold">${item.judul_buku}</span>`;
              kotakSaran.appendChild(div);
            });
            updateActiveSuggestion();
          } else {
            hideSuggestionBox();
          }
        })
        .catch(() => {
          kotakSaran.innerHTML = '';
          hideSuggestionBox();
        });
    } else {
      hideSuggestionBox();
      kotakSaran.innerHTML = '';
    }
  });

  // Arrow navigation dan enter support
  document.getElementById('pencarian').addEventListener('keydown', function(e) {
    const listEls = Array.from(document.querySelectorAll('#kotak-saran div'));
    if (!listEls.length) return;

    if (e.key === 'ArrowDown') {
      e.preventDefault();
      if (activeSuggestionIndex < listEls.length - 1) {
        activeSuggestionIndex++;
        updateActiveSuggestion();
        // Scroll ke elemen yang aktif jika di luar view
        const active = listEls[activeSuggestionIndex];
        const parent = document.getElementById('kotak-saran');
        const activeTop = active.offsetTop;
        const activeBottom = activeTop + active.offsetHeight;
        const parentScroll = parent.scrollTop;
        if (activeBottom > parent.clientHeight + parentScroll) {
          parent.scrollTop = parentScroll + (activeBottom - parent.clientHeight);
        } else if (activeTop < parentScroll) {
          parent.scrollTop = activeTop;
        }
      }
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      if (activeSuggestionIndex > 0) {
        activeSuggestionIndex--;
        updateActiveSuggestion();
        const active = listEls[activeSuggestionIndex];
        const parent = document.getElementById('kotak-saran');
        const activeTop = active.offsetTop;
        const parentScroll = parent.scrollTop;
        if (activeTop < parentScroll) {
          parent.scrollTop = activeTop;
        }
      }
    } else if (e.key === 'Enter') {
      if (activeSuggestionIndex >= 0 && activeSuggestionIndex < suggestionData.length) {
        e.preventDefault();
        const selected = suggestionData[activeSuggestionIndex];
        document.getElementById('pencarian').value = selected.judul_buku;
        hideSuggestionBox();
      }
    } else if (e.key === 'Escape') {
      hideSuggestionBox();
    }
  });

  // Click pada suggestion (event delegation)
  document.getElementById('kotak-saran').addEventListener('mousedown', function(e) {
    let target = e.target;
    while (target && target !== this && !target.hasAttribute('data-idx')) {
      target = target.parentElement;
    }
    if (target && target.hasAttribute('data-judul')) {
      let judul = target.getAttribute('data-judul');
      document.getElementById('pencarian').value = judul;
      hideSuggestionBox();
      document.getElementById('pencarian').focus();
      e.preventDefault();
    }
  });

  // Hover mouse mengubah highlight aktif
  document.getElementById('kotak-saran').addEventListener('mousemove', function(e) {
    let target = e.target;
    while (target && target !== this && !target.hasAttribute('data-idx')) {
      target = target.parentElement;
    }
    if (target && target.hasAttribute('data-idx')) {
      activeSuggestionIndex = parseInt(target.getAttribute('data-idx'), 10);
      updateActiveSuggestion();
    }
  });

  // Opsi: Tutup box saat klik di luar pencarian
  document.addEventListener('mousedown', function(e) {
    const pencarian = document.getElementById('pencarian');
    const kotakSaran = document.getElementById('kotak-saran');
    if (!pencarian.contains(e.target) && !kotakSaran.contains(e.target)) {
      hideSuggestionBox();
    }
  });

  // Opsi: Saat input blur, simpan sebentar supaya klik pada list bisa terproses
  document.getElementById('pencarian').addEventListener('blur', function() {
    setTimeout(hideSuggestionBox, 150);
  });
</script>
