<div class="w-full space-y-4">
  {{-- icon dan judul --}}
  <div class="text-[16px] font-semibold text-[#394867]">
    <i class="fa-solid fa-book"></i> Data-data Buku
  </div>

  {{-- field pencarian dan tambah buku --}}
  <div class="flex justify-between flex-wrap gap-4">
    <x-admin.pencarian />
    <x-admin.add-data>
      <x-admin.form-tambah-buku></x-admin.form-tambah-buku>
    </x-admin.add-data>
  </div>

  {{-- Modal Edit Buku --}}
  <div id="editModal"
    class="fixed inset-0 z-[9999] bg-black/40 flex items-center justify-center hidden">
    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-lg relative">
      <button id="closeEditModal"
        class="absolute top-3 right-4 text-gray-400 hover:text-gray-900 text-lg" type="button">
        <i class="fa-solid fa-xmark"></i>
      </button>
      <div class="px-6 py-4 border-b font-bold text-[#394867] flex items-center gap-2">
        <i class="fa-solid fa-pen-to-square"></i> Edit Data Buku
      </div>
      <div class="px-6 py-6" id="editModalForm">
        {{-- Form edit akan di-load via AJAX --}}
        <div class="flex justify-center items-center text-[#394867] py-10">
          Memuat formulir...
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Detail Buku --}}
  <div id="detailModal"
    class="fixed inset-0 z-50 bg-black/40 flex items-center justify-center max-h-screen overflow-auto hidden">
    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-lg relative">
      <button id="closeDetailModal"
        class="absolute top-3 right-4 text-gray-400 hover:text-gray-900 text-lg" type="button">
        <i class="fa-solid fa-xmark"></i>
      </button>
      <div class="px-6 py-4 border-b font-bold text-[#394867] flex items-center gap-2">
        <i class="fa-solid fa-circle-info"></i> Detail Buku
      </div>
      <div class="px-6 py-6" id="detailModalContent">
        {{-- Detail buku akan di-load via AJAX --}}
        <div class="flex justify-center items-center text-[#394867] py-10">
          Memuat detail...
        </div>
      </div>
    </div>
  </div>

  {{-- kotak konten --}}
  <div class="bg-white rounded-2xl shadow-[0px_4px_4px_0px_rgba(57,72,103,0.15)] overflow-hidden">
    {{-- Header dengan title --}}
    <div
      class="bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex items-center px-[24px] py-[14px]">
      <div class="text-[14px] font-semibold"><i class="fa-solid fa-book"></i> Data Buku</div>
    </div>

    <div class="w-full p-[24px] space-y-4">
      {{-- Jumlah Data Yang Di Tampilkan --}}
      <div class="text-[10px] flex gap-4 items-center font-light text-[#212A3E]">
        <div>Show</div>
        <form id="show-entries-form" method="GET" action="/hasPages" class="inline">
          <select name="perPage" id="show-entries"
            class="py-[8px] px-[14px] border border-[#9BA4B5] rounded text-[#212A3E] focus:border-[#394867] focus:ring-[#394867]"
            onchange="document.getElementById('show-entries-form').submit()">
            <option value="10" {{ request('perPage', 10) == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
          </select>
        </form>
        <div>entries</div>
      </div>

      {{-- Tabel Buku hanya menampilkan 5 kolom utama --}}
      <div class="overflow-auto">
        <table class="w-full border border-[#394867] text-[13px]">
          <thead>
            <tr class="bg-[#F1F6F9]">
              <th class="border border-[#394867] px-3 py-2 text-[#212A3E] font-semibold">No</th>
              <th class="border border-[#394867] px-3 py-2 text-[#212A3E] font-semibold">Cover</th>
              <th class="border border-[#394867] px-3 py-2 text-[#212A3E] font-semibold">Judul</th>
              <th class="border border-[#394867] px-3 py-2 text-[#212A3E] font-semibold">Pengarang
              </th>
              <th class="border border-[#394867] px-3 py-2 text-[#212A3E] font-semibold">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($dataBuku as $index => $buku)
              <tr class="hover:bg-[#F1F6F9]/50 transition">
                <td class="border border-[#9BA4B5] px-3 py-2 text-center">
                  {{ ($dataBuku->currentPage() - 1) * $dataBuku->perPage() + $loop->iteration }}
                </td>
                <td class="border border-[#9BA4B5] px-3 py-2 text-center">
                  @if (isset($buku['gambar']) && $buku['gambar'])
                    <img src="{{ asset('storage/buku/' . $buku['gambar']) }}"
                      alt="Cover {{ $buku['judul'] ?? '-' }}"
                      class="w-12 h-16 object-cover rounded shadow mx-auto">
                  @else
                    <img src="{{ asset('images/no-cover.png') }}" alt="No Cover"
                      class="w-12 h-16 object-contain opacity-70 rounded shadow mx-auto">
                  @endif
                </td>
                <td class="border border-[#9BA4B5] px-3 py-2">
                  <div class="truncate max-w-[180px]" title="{{ $buku['judul'] ?? '-' }}">
                    {{ $buku['judul'] ?? '-' }}
                  </div>
                </td>
                <td class="border border-[#9BA4B5] px-3 py-2">
                  <div class="truncate max-w-[140px]" title="{{ $buku['pengarang'] ?? '-' }}">
                    {{ $buku['pengarang'] ?? '-' }}
                  </div>
                </td>
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
                    <form action="{{ url('/admin/buku/' . $buku['id']) }}" method="POST"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data buku ini?');"
                      style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition"
                        title="Hapus Data">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center py-10 text-[#9BA4B5]">Tidak ada data buku.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      {{-- PAGINATION --}}
      {{-- <div class="pt-6">
        @if ($dataBuku->hasPages())
          <div class="flex justify-between items-center flex-wrap gap-2 text-xs">
            <div class="text-[#394867]">
              Menampilkan {{ $dataBuku->firstItem() }} - {{ $dataBuku->lastItem() }}
              dari {{ $dataBuku->total() }} data
            </div>
            <div class="ml-auto">
              {{ $dataBuku->withQueryString()->links('vendor.pagination.tailwind') }}
            </div>
          </div>
        @endif
      </div> --}}
    </div>
  </div>

  @vite('resources/js/table.js')

  {{-- Script untuk handle edit modal & detail modal --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Handle show/hide edit modal
      const editModal = document.getElementById('editModal');
      const closeEditModal = document.getElementById('closeEditModal');
      const editModalForm = document.getElementById('editModalForm');

      // Handle show/hide detail modal
      const detailModal = document.getElementById('detailModal');
      const closeDetailModal = document.getElementById('closeDetailModal');
      const detailModalContent = document.getElementById('detailModalContent');

      // Event delegation for dynamically created buttons
      document.body.addEventListener('click', function(e) {
        // Edit
        if (e.target.closest('.editBukuBtn')) {
          const button = e.target.closest('.editBukuBtn');
          const bukuId = button.getAttribute('data-id');

          editModal.classList.remove('hidden');
          editModalForm.innerHTML =
            '<div class="flex justify-center items-center text-[#394867] py-10">Memuat formulir...</div>';

          // ===================================
          // Mendapatkan form edit buku via AJAX
          // ===================================
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

          // Mendapatkan detail buku via AJAX (route & implementasi Laravel/controller diperlukan!)
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
      });

      closeEditModal?.addEventListener('click', function() {
        editModal.classList.add('hidden');
      });
      closeDetailModal?.addEventListener('click', function() {
        detailModal.classList.add('hidden');
      });

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
    });
  </script>
</div>
