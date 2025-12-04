<div class="relative">
  <form id="search-form" action="" autocomplete="off"
    class="flex items-center gap-0 transition-all duration-300 group shadow-lg rounded-lg overflow-hidden">
    <input type="text" id="pencarian" name="pencarian"
      class="h-10 px-4 w-64 border-none focus:ring-2 focus:ring-purple-400 outline-none bg-gray-100 text-gray-700 transition-all duration-300"
      placeholder="Cari judul, pengarang, ISBN...">
    <button type="submit"
      class="h-10 w-12 bg-gradient-to-r from-purple-600 to-purple-400 flex items-center justify-center text-white transition-all duration-200 hover:from-purple-700 hover:to-purple-500 focus:outline-none"
      aria-label="Cari">
      <i class="fa-solid fa-magnifying-glass text-lg"></i>
    </button>
  </form>
  <div id="search-suggestion"
    class="bg-white shadow-md rounded-b-lg absolute mt-1 w-64 z-50 hidden max-h-64 overflow-y-auto">
    <!-- Suggestions akan ditampilkan di sini -->
  </div>
  <script>
    // Contoh: Daftar data dummy. Ganti nanti dengan data real dari database/API.
    const allItems = [{
        title: "Pemrograman PHP",
        pengarang: "Budi",
        isbn: "9781234567890"
      },
      {
        title: "Belajar Laravel",
        pengarang: "Andi",
        isbn: "9780987654321"
      },
      {
        title: "Dasar JavaScript",
        pengarang: "Siti",
        isbn: "9791122334455"
      },
      {
        title: "Pengantar Python",
        pengarang: "Wati",
        isbn: "9788899001122"
      },
      // ... bisa ditambah
    ];

    const searchInput = document.getElementById('pencarian');
    const suggestionBox = document.getElementById('search-suggestion');
    const form = document.getElementById('search-form');

    // Tampilkan suggestion saat mengetik
    searchInput.addEventListener('input', function() {
      const query = this.value.trim().toLowerCase();
      if (!query) {
        suggestionBox.classList.add('hidden');
        suggestionBox.innerHTML = '';
        return;
      }

      // Filter data (judul, pengarang, isbn)
      const filtered = allItems.filter(item =>
        item.title.toLowerCase().includes(query) ||
        item.pengarang.toLowerCase().includes(query) ||
        item.isbn.includes(query)
      );

      console.log(filtered)

      // Tampilkan saran atau pesan jika tidak ditemukan
      if (filtered.length > 0) {
        suggestionBox.innerHTML = filtered.map(item => `
          <div class="px-4 py-2 cursor-pointer hover:bg-purple-100"
            onclick="document.getElementById('pencarian').value='${item.title}';document.getElementById('search-suggestion').classList.add('hidden');">
            <div class="font-semibold">${item.title}</div>
            <div class="text-xs text-gray-600">Pengarang: ${item.pengarang} | ISBN: ${item.isbn}</div>
          </div>
        `).join('');
      } else {
        suggestionBox.innerHTML =
          `<div class="px-4 py-2 text-purple-500 text-sm">Data tidak ditemukan.</div>`;
      }

      suggestionBox.classList.remove('hidden');
    });

    // Sembunyikan suggestion saat blur, kecuali jika klik pada suggestion
    searchInput.addEventListener('blur', function() {
      setTimeout(() => {
        suggestionBox.classList.add('hidden');
      }, 150); // tunggu jika user klik pada saran
    });

    // Tambahkan animasi ring shadow saat input focus/blur
    searchInput.addEventListener('focus', () => {
      form.classList.add('ring-2', 'ring-purple-400');
      if (searchInput.value.trim()) {
        suggestionBox.classList.remove('hidden');
      }
    });
    searchInput.addEventListener('blur', () => {
      form.classList.remove('ring-2', 'ring-purple-400');
    });

    // Fungsi submit pencarian
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      const value = searchInput.value.trim();
      // Kerangka: Aksi setelah submit, misal redirect, atau filtering tabel utama, dsb
      // alert('Cari: ' + value); // Contoh
      // TODO: Implementasikan pencarian pada tabel utama/data list

      suggestionBox.classList.add('hidden');
    });
  </script>
</div>
