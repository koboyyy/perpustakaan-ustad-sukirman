<header class="w-full relative p-3 fles flex justify-between">

  <div class="w-full p-5 px-10">
    {{-- bar navigasi --}}
    <x-pengunjung.bar-navigasi></x-pengunjung.bar-navigasi>

    {{-- Title --}}
    <div class="text-6xl font-semibold mt-20">
      Selamat Datang di Perpustakaan Ustadz Sukirman Desa Wonosari
    </div>

    <!-- Search Bar -->
    @auth
      <div class="container mx-auto mt-5">
        {{-- Pencarian --}}
        <div class="flex flex-col w-2/3 justify-between items-start mb-10 relative ">
          {{-- Field Pencarian --}}
          <div class="flex gap-7 items-center w-full">
            <form action="{{ route('pencarian') }}" method="GET"
              class="w-full h-15 px-[7px] items-center rounded-full shadow-[2px_8px_15px_2px_rgb(0,0,0,0.1)] flex border border-black/5 bg-white"
              autocomplete="off">
              {{-- Input --}}
              <input type="text" name="pencarian" placeholder="Cari buku..." id="pencarian"
                autocomplete="off" value="{{ request('pencarian') }}"
                class="w-full h-full flex items-center px-7 outline-0 text-xl" />
              {{-- Tombol --}}
              <button
                class="w-12 h-12 shrink-0 rounded-full bg-black shadow-[0px_2px_5px_1px_rgb(0,0,0,0.4)] text-white flex items-center justify-center"
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

    <div class="w-50 mt-25">
      <div>
        <i class="fa-solid fa-book-open text-2xl text-[#394867] mr-2"></i>
      </div>
      Perpustakaan Ustadz Sukirman berasal dari nama SUKIRMAN yang pertama sekali merintis lahan di
      Wonosari. Nama ini memudahkan masyarakat mengingat perpustakaan desa Wonosari. Perpustakaan
      Ustadz Sukirman diresmikan oleh Bupati Bengkalis pada tanggal 17 Desember 2019.
    </div>

    <div class="flex items-center justify-between w-full mt-4">
      <!-- 3 Plus Icons Right -->
      <div class="flex gap-1 ml-auto">
        <i class="fa-solid fa-plus text-[#FFD600] text-xl"></i>
        <i class="fa-solid fa-plus text-[#FFD600] text-xl"></i>
        <i class="fa-solid fa-plus text-[#FFD600] text-xl"></i>
      </div>
      <div class="flex-1"></div>
      <!-- 2 Plus Icons Left -->
      <div class="flex gap-1">
        <i class="fa-solid fa-plus text-[#FFD600] text-xl"></i>
        <i class="fa-solid fa-plus text-[#FFD600] text-xl"></i>
      </div>

    </div>
  </div>

  <div class="w-fit relative">
    {{-- Bingkai Banner --}}
    <div id="bingkai-foto-banner" class="relative w-[1150px] h-[1000px] bg-amber-300">
      <img src="/img/one-piece.jpeg" alt=""
        class="w-full h-full object-cover brightness-50">
    </div>
    {{-- Style Bingkai Banner --}}
    <style>
      #bingkai-foto-banner {
        clip-path: path("M 0,20 A 20,20 0,0,1 20,0 L 853,0 A 20,20 0,0,1 873,20 L 873,60 A 20,20 0,0,0 893,80 L 1130,80 A 20,20 0,0,1 1150,100 L 1150,980 A 20,20 0,0,1 1130,1000 L 20,1000 A 20,20 0,0,1 0,980 L 0,840 A 20,20 0,0,1 20,820 L 388,820 A 20,20 0,0,0 408,800 L 408,520 A 20,20 0,0,0 388,500 L 20,500 A 20,20 0,0,1 0,480 L 0,20 Z");
      }
    </style>

    {{-- Profil dan Tombol --}}
    <div
      class="pl-4 pb-4 w-[275px] h-[80px]  absolute right-0 top-0 text-black z-9999 flex gap-4 items-center">
      <button id="toggle-theme"
        class="bg-white text-[#212A3E] rounded-full w-[50px] h-[50px] flex items-center justify-center shadow transition-colors duration-300 shrink-0">
        <span id="theme-icon">
          <i class="fa-solid fa-sun text-2xl"></i>
        </span>
      </button>
      <script>
        // Simple theme toggle (demo only, replace with real theme logic as needed)
        document.addEventListener('DOMContentLoaded', function() {
          const btn = document.getElementById('toggle-theme');
          const icon = document.getElementById('theme-icon');
          let dark = false;
          btn.addEventListener('click', function() {
            dark = !dark;
            if (dark) {
              document.documentElement.classList.add('dark');
              icon.innerHTML = `<i class="fa-solid fa-moon text-2xl"></i>`;
            } else {
              document.documentElement.classList.remove('dark');
              icon.innerHTML = `<i class="fa-solid fa-sun text-2xl"></i>`;
            }
          });
        });
      </script>
      <div
        class="bg-white w-full h-[60px] rounded-full flex items-center text-xl font-semibold p-3 shadow">
        @auth
          <form method="POST" action="{{ route('logout') }}" class="w-full h-full">
            @csrf
            <button type="submit"
              class="w-full h-full rounded-full flex items-center justify-center hover:bg-[#F1F6F9] transition">
              <i class="fa-solid fa-sign-out-alt mr-2"></i>
              Logout
            </button>
          </form>
        @else
          <a href="{{ route('login') }}"
            class="w-full h-full rounded-full flex items-center justify-center hover:bg-[#F1F6F9] transition">
            <i class="fa-solid fa-sign-in-alt mr-2"></i>
            Login
          </a>
        @endauth
      </div>
    </div>

    <div
      class="w-180 h-[280px] absolute top-[520px] -left-83 rounded-2xl flex flex-col overflow-hidden">

      <div class="flex overflow-hidden gap-4 h-full" id="carousel-buku"
        style="scroll-behavior: smooth;">
        @foreach ($dataBuku->take(10) as $buku)
          <div
            class="w-[200px] h-full bg-amber-600 rounded-2xl shrink-0 overflow-hidden flex items-center justify-center">
            @if ($buku->cover)
              <img src="{{ asset('storage/' . $buku->cover) }}" alt="cover buku"
                class="w-full h-full object-cover" />
            @else
              <div
                class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-lg">
                Tidak ada gambar
              </div>
            @endif
          </div>
        @endforeach
      </div>
      <script>
        // Animasi Scroll Otomatis untuk Carousel Buku
        document.addEventListener('DOMContentLoaded', function() {
          const carousel = document.getElementById('carousel-buku');
          const cardWidth = 200 + 16; // width + gap. 16px = gap-4 (tailwind)
          let scrollTo = 0;
          let maxScroll = carousel.scrollWidth - carousel.clientWidth;

          function autoScroll() {
            if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 1) {
              carousel.scrollLeft = 0;
              scrollTo = 0;
            } else {
              scrollTo = carousel.scrollLeft + cardWidth;
              carousel.scrollTo({
                left: scrollTo,
                behavior: 'smooth'
              });
            }
          }

          let interval = setInterval(autoScroll, 2500);

          // Pause animasi saat hover
          carousel.addEventListener('mouseenter', () => clearInterval(interval));
          carousel.addEventListener('mouseleave', () => {
            interval = setInterval(autoScroll, 2500);
          });
        });
      </script>
    </div>
  </div>
</header>

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
