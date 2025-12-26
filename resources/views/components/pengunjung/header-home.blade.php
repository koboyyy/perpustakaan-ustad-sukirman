<header class="w-full h-[500px] relative overflow-hidden">
  <!-- Background Gambar dan Dekorasi -->
  <div class="absolute inset-0 w-full h-full z-0">
    <img class="w-full h-full object-cover absolute inset-0 brightness-85 opacity-30"
      src="img/perpustakaan2.webp" alt="Perpustakaan" loading="lazy">

    <!-- Overlay gradasi tema (disesuaikan warna utama: biru dan abu-abu) -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#212A3E] via-[#394867] to-[#9BA4B5]"></div>

    <!-- Efek Blur Bulat -->
    <div class="absolute -top-12 -left-20 w-72 h-72 bg-[#9BA4B5] opacity-30 rounded-full blur-3xl">
    </div>
    <div
      class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-[#F1F6F9] opacity-25 rounded-full blur-[120px]">
    </div>
  </div>

  <!-- Content Header -->
  <div
    class="relative z-10 flex flex-col items-start xl:items-center justify-center h-full px-8 xl:px-0 max-w-5xl mx-auto space-y-7">
    <div
      class="flex items-center gap-4 bg-white/30 py-2 px-6 rounded-full shadow-lg backdrop-blur-lg mb-1">
      <svg class="w-6 h-6 text-[#394867]" fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M10 2C6.13 2 2.99 5.13 2.99 9c0 3.4 3.31 7.23 6.14 9.59.53.46 1.31.46 1.84 0C13.7 16.23 16.99 12.4 16.99 9c0-3.87-3.13-7-7-7zm0 10.5A2.5 2.5 0 1 1 10 7a2.5 2.5 0 0 1 0 5.5z" />
      </svg>
      <span class="font-semibold text-[#394867] text-base tracking-wide">Selamat Datang</span>
    </div>
    <h1
      class="font-poppins font-extrabold leading-tight text-3xl sm:text-4xl xl:text-5xl text-[#212A3E] drop-shadow-xl text-shadow-lg text-left xl:text-center">
      PERPUSTAKAAN<br>
      <span
        class="bg-gradient-to-r from-[#9BA4B5] via-[#F1F6F9] to-[#394867] bg-clip-text text-transparent">
        USTAD SUKIRMAN
      </span>
      <br>
      <span
        class="text-xl sm:text-2xl font-semibold text-[#394867] tracking-widest xl:text-center block mt-2">
        DESA WONOSARI
      </span>
    </h1>
    <p class="max-w-2xl text-[#212A3E]/80 text-md sm:text-lg xl:text-center drop-shadow-lg">
      Temukan koleksi buku favorit, referensi ilmu terbaik, dan layanan pustaka digital <span
        class="text-[#394867] font-semibold">untuk semua warga</span>.
    </p>

  </div>
</header>

<!-- Search Bar -->
@auth
  <div class="container mx-auto">
    {{-- Pencarian --}}
    <div class="flex flex-col justify-between w-1/2 items-start mb-10 mx-auto relative -top-7">
      {{-- Field Pencarian --}}
      <div class="flex gap-7 items-center w-full">
        <form action="{{ route('pencarian') }}" method="GET"
          class="w-full h-15 px-[7px] items-center rounded-full shadow-[2px_8px_15px_2px_rgb(0,0,0,0.2)] flex border border-black/5 bg-white"
          autocomplete="off">
          {{-- Input --}}
          <input type="text" name="pencarian" placeholder="Cari buku..." id="pencarian"
            autocomplete="off" value="{{ request('pencarian') }}"
            class="w-full h-full flex items-center px-7 outline-0 text-xl" />
          {{-- Tombol --}}
          <button
            class="w-12 h-12 rounded-full bg-black shadow-[0px_2px_5px_1px_rgb(0,0,0,0.6)] text-white flex items-center justify-center"
            type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>

      {{-- Hasil Pencarian --}}
      <div id="kotak-saran"
        class="bg-white z-1000 border border-black/5 shadow rounded-3xl w-full absolute top-17 py-3 hidden">
        {{-- Konten Dinamis --}}
      </div>
    </div>
  </div>
@endauth

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
  document.getElementById('kotak-saran').addEventListener('click', function(e) {
    let target = e.target;
    while (target && target !== this && !target.hasAttribute('data-idx')) {
      target = target.parentElement;
    }
    if (target && target.hasAttribute('data-judul')) {
      let judul = target.getAttribute('data-judul');
      const inputPencarian = document.getElementById('pencarian')
      inputPencarian.value = judul;
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
