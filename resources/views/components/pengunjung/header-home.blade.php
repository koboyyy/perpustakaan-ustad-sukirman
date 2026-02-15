<header class="w-full relative p-3 fles flex justify-between">

  {{-- latar belakang gambar untuk layar ponsel --}}
  <div class="absolute inset-0 lg:hidden">
    <img src="/img/library2.jpg" alt="" class="w-full h-full object-cover brightness-50">
  </div>

  {{-- latar belakang gambar untuk layar large --}}
  <div class="absolute inset-0 hidden lg:block 2xl:hidden p-3">
    <img src="/img/library2.jpg" alt=""
      class="w-full h-full object-cover brightness-50 rounded-2xl">
  </div>

  {{-- Gambar Slider lg --}}
  <div
    class="w-130 lg:w-180 xl:w-220 h-[220px] lg:h-[250px] absolute bottom-14 right-12 lg:right-3 2xl:hidden rounded-2xl md:rounded-none md:rounded-l-2xl md:flex flex-col overflow-hidden hidden">
    <div class="flex overflow-hidden gap-4 h-full" id="carousel-buku"
      style="scroll-behavior: smooth;">
      @foreach ($dataBuku->take(10) as $buku)
        <div
          class="w-[150px] lg:w-[180px] h-full bg-amber-600 rounded-2xl shrink-0 overflow-hidden flex items-center justify-center">
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

  {{-- Dekorasi + --}}
  <div class="absolute bottom-12 left-13 flex items-center justify-between w-2/5 mt-4">
    <!-- 3 Plus Icons Right -->
    <div class="flex gap-1 ml-auto">
      <i class="fa-solid fa-plus text-xl"></i>
      <i class="fa-solid fa-plus text-xl"></i>
      <i class="fa-solid fa-plus text-xl"></i>
    </div>
    <div class="flex-1"></div>
    <!-- 2 Plus Icons Left -->
    <div class="flex gap-1">
      <i class="fa-solid fa-plus text-xl"></i>
      <i class="fa-solid fa-plus text-xl"></i>
    </div>
  </div>

  {{-- Main --}}
  <div class="p-5 px-10 z-10 text-[rgb(251,251,251)] 2xl:text-black space-y-10">

    {{-- Title --}}
    <div
      class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-semibold mt-10 md:mt-16 lg:mt-20 xl:mb-14">
      Selamat Datang di Perpustakaan Ustadz Sukirman Desa Wonosari
    </div>

    <!-- Search Bar -->
    @auth
      <div class="container text-black">
        {{-- Pencarian --}}
        <div class="flex flex-col w-full sm:w-2/3 2xl:w-9/10 justify-between items-start relative ">
          {{-- Field Pencarian --}}
          <div class="flex gap-3 sm:gap-7 items-center w-full">
            <form action="{{ route('pencarian') }}" method="GET"
              class="w-full h-11 sm:h-15 px-2 sm:px-[7px] items-center rounded-full flex border border-black/10 bg-white"
              autocomplete="off">
              {{-- Input --}}
              <input type="text" name="pencarian" placeholder="Cari buku..." id="pencarian"
                autocomplete="off" value="{{ request('pencarian') }}"
                class="w-full h-full flex items-center px-3 sm:px-7 outline-0 text-base sm:text-xl" />
              {{-- Tombol --}}
              <button
                class="w-7 h-7 sm:w-12 sm:h-12 shrink-0 rounded-full bg-black shadow-[0px_2px_5px_1px_rgb(0,0,0,0.4)] text-white flex items-center justify-center hover:cursor-pointer"
                type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </form>
          </div>

          {{-- Hasil Pencarian --}}
          <div id="kotak-saran"
            class="bg-white z-1000 border border-black/5 shadow rounded-3xl w-full absolute top-14 sm:top-17 py-3 hidden">
            {{-- Konten Dinamis --}}
          </div>
        </div>
      </div>
    @endauth

    {{-- Deskripsi --}}
    <div class="w-50 xl:w-70 xl:mt-15 xl:mb-20">
      <div>
        <i class="fa-solid fa-book-open text-2xl mr-2"></i>
      </div>
      Perpustakaan Ustadz Sukirman berasal dari nama SUKIRMAN yang pertama sekali merintis lahan di
      Wonosari. Nama ini memudahkan masyarakat mengingat perpustakaan desa Wonosari. Perpustakaan
      Ustadz Sukirman diresmikan oleh Bupati Bengkalis pada tanggal 17 Desember 2019.
    </div>

  </div>

  {{-- Bingkai gambar background --}}
  <div class="relative">
    {{-- Bingkai Banner --}}
    <div id="bingkai-foto-banner" class="relative bg-blue-200 hidden 2xl:block">
      <img src="/img/library2.jpg" alt="" class="w-full h-full object-cover brightness-50">
    </div>
    {{-- Style & Responsive Bingkai Banner --}}
    <style>
      /* Bingkai ukuran besar, height diubah jadi 810px */
      #bingkai-foto-banner {
        width: 1000px;
        height: 810px;
        clip-path: path("M 0,15 A 15,15 0,0,1 15,0 L 832,0 A 15,15 0,0,1 847,15 L 847,45 A 15,15 0,0,0 862,60 L 985,60 A 15,15 0,0,1 1000,75 L 1000,795 A 15,15 0,0,1 985,810 L 15,810 A 15,15 0,0,1 0,795 L 0,770 A 15,15 0,0,1 15,755 L 420,755 A 15,15 0,0,0 435,740 L 435,520 A 15,15 0,0,0 420,505 L 15,505 A 15,15 0,0,1 0,490 L 0,15 Z");
      }
    </style>

    {{-- Gambar Slider --}}
    <div id="gambar-slider"
      class="w-150 h-[225px] absolute bottom-17 right-145 rounded-2xl 2xl:flex flex-col overflow-hidden hidden">

      <div class="flex overflow-hidden gap-4 h-full" id="carousel-buku-2"
        style="scroll-behavior: smooth;">
        @foreach ($dataBuku->take(10) as $buku)
          <div
            class="w-[180px] h-full bg-amber-600 rounded-2xl shrink-0 overflow-hidden flex items-center justify-center">
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
      <style>
        /* Gambar Slider Responsive: width dan translate-x berubah untuk 2xl, 3xl, dst */
        @media (min-width: 1536px) {

          /* 2xl breakpoint (Tailwind default) */
          #gambar-slider {
            width: 600px;
          }
        }

        @media (min-width: 1800px) {

          /* custom 3xl */
          #gambar-slider {
            width: 820px;
          }
        }

        @media (min-width: 2100px) {

          /* custom 4xl */
          #gambar-slider {
            width: 950px;
          }
        }

        /* Default (2xl kebawah) silakan tetap menggunakan utility dari Tailwind */
      </style>
      <script>
        // Animasi Scroll Otomatis untuk Carousel Buku
        document.addEventListener('DOMContentLoaded', function() {
          const carousel = document.getElementById('carousel-buku-2');
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
