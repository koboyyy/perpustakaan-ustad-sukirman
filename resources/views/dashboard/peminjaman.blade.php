<x-admin.dashboard>
  <div class="flex gap-5">

    <x-admin.form-peminjaman></x-admin.form-peminjaman>

    <div class="flex flex-col gap-5 w-full">
      {{-- Pencarian --}}
      <form action="#" class="w-full z-9999">
        <label for="pencarian-peminjaman" class="mb-4">Pencarian Peminajaman</label>
        <div class="relative">
          <div class="flex w-full h-11 border rounded-xl overflow-hidden">
            <input type="text" id="pencarian-peminjaman" name="pencarian-peminjaman"
              placeholder="Cari nama peminjam.." class="w-full outline-0 px-4" autocomplete="off">
            <button class="hover:bg-black w-11 h-11 transition duration-300 group">
              <i class="fa-solid fa-magnifying-glass group-hover:text-white"></i>
            </button>
          </div>

          <div id="kotak-saran"
            class="absolute top-full left-0 w-full bg-white border-black/30 hidden">
            {{-- Konten Dinamis --}}
          </div>
        </div>
      </form>
      <x-admin.list-peminjaman :dataPeminjaman="$dataPeminjaman"></x-admin.list-peminjaman>
    </div>
  </div>
</x-admin.dashboard>

{{-- Script Pencarian Peminjaman --}}
<script>
  // Pencarian Peminjaman (Live Search)
  const pencarianPeminjaman = document.getElementById('pencarian-peminjaman');
  const kotakSaran = document.getElementById('kotak-saran');

  let searchResults = [];
  let activeSuggestionIndex = -1;

  pencarianPeminjaman.addEventListener('input', function(e) {
    const keyword = pencarianPeminjaman.value.trim();
    kotakSaran.innerHTML = '';
    activeSuggestionIndex = -1;
    searchResults = [];

    if (keyword.length > 0) {
      kotakSaran.classList.remove('hidden');
      fetch(`/live-search-peminjaman?keyword=${encodeURIComponent(keyword)}`)
        .then(response => response.json())
        .then(data => {
          searchResults = data;
          if (Array.isArray(data) && data.length > 0) {
            data.forEach((peminjaman, idx) => {
              const div = document.createElement('div');
              div.className = 'cursor-pointer py-2 hover:bg-[#F1F6F9] px-4';
              div.innerHTML = `
                <div class="flex flex-col gap-1">
                  <span class="font-semibold">${peminjaman.anggota?.nama_lengkap ?? ''}</span>
                  <span class="text-xs text-gray-500">Status: <span class="italic">${peminjaman.status ?? '-'}</span></span>
                  <span class="text-xs text-gray-500">${peminjaman.detail_peminjaman?.length ?? 0} Buku Dipinjam</span>
                </div>
              `;
              div.addEventListener('mousedown', function(ev) {
                pencarianPeminjaman.value = peminjaman.anggota?.nama_lengkap ?? '';
                kotakSaran.innerHTML = '';
                kotakSaran.classList.add('hidden');
                // TODO: Optionally trigger search/filter here
              });
              kotakSaran.appendChild(div);
            });
          } else {
            const div = document.createElement('div');
            div.className = 'py-1 px-2 text-gray-400';
            div.textContent = 'Tidak ditemukan peminjaman';
            kotakSaran.appendChild(div);
          }
        })
        .catch(() => {
          const div = document.createElement('div');
          div.className = 'py-1 px-2 text-gray-400';
          div.textContent = 'Gagal memuat data peminjaman';
          kotakSaran.appendChild(div);
        });
    } else {
      kotakSaran.classList.add('hidden');
    }
  });

  // Navigasi Keyboard pada Live Search Peminjaman
  pencarianPeminjaman.addEventListener('keydown', function(e) {
    const suggestions = kotakSaran.querySelectorAll('div.cursor-pointer');
    if (!suggestions.length || ['Tab'].includes(e.key)) return;

    if (e.key === 'ArrowDown') {
      e.preventDefault();
      if (activeSuggestionIndex < suggestions.length - 1) {
        activeSuggestionIndex++;
      } else {
        activeSuggestionIndex = 0;
      }
      suggestions.forEach((el, i) => {
        if (i === activeSuggestionIndex) {
          el.classList.add('bg-[#9BA4B5]/20', 'font-bold');
        } else {
          el.classList.remove('bg-[#9BA4B5]/20', 'font-bold');
        }
      });
      suggestions[activeSuggestionIndex].scrollIntoView({
        block: 'nearest'
      });
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      if (activeSuggestionIndex > 0) {
        activeSuggestionIndex--;
      } else {
        activeSuggestionIndex = suggestions.length - 1;
      }
      suggestions.forEach((el, i) => {
        if (i === activeSuggestionIndex) {
          el.classList.add('bg-[#9BA4B5]/20', 'font-bold');
        } else {
          el.classList.remove('bg-[#9BA4B5]/20', 'font-bold');
        }
      });
      suggestions[activeSuggestionIndex].scrollIntoView({
        block: 'nearest'
      });
    } else if (e.key === 'Enter') {
      if (activeSuggestionIndex >= 0 && activeSuggestionIndex < suggestions.length) {
        e.preventDefault();
        suggestions[activeSuggestionIndex].dispatchEvent(new Event('mousedown'));
        kotakSaran.classList.add('hidden');
      }
    } else if (e.key === 'Escape') {
      kotakSaran.innerHTML = '';
      kotakSaran.classList.add('hidden');
      activeSuggestionIndex = -1;
    }
  });

  // Close saran jika klik di luar input atau suggestions
  document.addEventListener('mousedown', function(e) {
    if (!pencarianPeminjaman.contains(e.target) && !kotakSaran.contains(e.target)) {
      kotakSaran.classList.add('hidden');
    }
  });
</script>
