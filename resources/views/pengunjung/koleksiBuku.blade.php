<x-pengunjung.layout-pengunjung title="Koleksi Buku">
  @auth

    {{-- Hero --}}
    <div class="py-16 px-5 md:px-0 md:mb-5 relative z-10 overflow-hidden">

      <div class="absolute inset-0 b z-10 bg-[rgb(57,72,103,0.7)]">

      </div>
      <img src="{{ asset('img/library3.jpg') }}" alt=""
        class="object-cover object-center absolute inset-0">

      <div class="mx-auto max-w-3xl text-center z-30 relative">
        <h1 class="text-2xl md:text-4xl sm:text-5xl xl:text-6xl font-extrabold"
          style="color: rgb(251,251,251); background-clip: text;">
          Daftar Lengkap Buku <br>
          <span style="color: rgb(251,251,251);">Perpustakaan Ustadz Sukirman</span>
        </h1>
        <p class="sm:text-xl font-medium mb-0 mt-2" style="color: rgb(251,251,251);">
          Jelajahi koleksi buku terbaik yang tersedia di
          <span class="font-semibold" style="color: rgb(251,251,251);">Perpustakaan Digital Ustadz
            Sukirman</span>.
        </p>
      </div>
    </div>

    <section class="container mx-auto font-dm-sans px-2 md:px-0">
      {{-- Pencarian --}}
      <div class="flex flex-col justify-between md:w-1/2 items-start mb-10 mx-auto relative px-4">
        {{-- Field Pencarian --}}
        <div class="flex gap-7 items-center w-full">
          <form action="{{ route('pencarian') }}" method="GET"
            class="bg-white w-full h-10 md:h-15 px-[7px] items-center rounded-full flex border border-black/5"
            autocomplete="off">
            {{-- Input --}}
            <input type="text" name="pencarian" placeholder="Cari buku..." id="pencarian"
              autocomplete="off" value="{{ request('pencarian') }}"
              class="w-full h-full flex items-center px-7 outline-0 md:text-xl" />
            {{-- Tombol --}}
            <button
              class="w-7 h-7 md:w-12 md:h-12 rounded-full bg-black shadow-[0px_2px_5px_1px_rgb(0,0,0,0.6)] text-white flex items-center justify-center shrink-0"
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

      {{-- Main Content --}}
      <div class="flex gap-5 flex-col md:flex-row mb-10 px-4">

        {{-- List Kategori --}}
        <aside class="w-full md:w-80 rounded-2xl shadow p-6 bg-white">
          <div class="font-bold text-[18px] mb-4 tracking-wide flex items-center gap-2">
            <i class="fa-solid fa-layer-group"></i>
            KATEGORI
          </div>
          <div id="kategori" class="flex md:flex-col gap-2 flex-wrap">

            @php
              // Ambil nama kategori dari URL /koleksi-buku/kategori/{slug} jika ada
              $kategoriAktif = request()->routeIs('kategoriBuku') ? request()->route('slug') : null;
            @endphp

            <a href="/koleksi-buku"
              class="rounded-md px-3 border border-black/10 hover:bg-[#F1F6F9] {{ is_null($kategoriAktif) ? 'bg-[rgb(255,109,31)] text-white font-bold' : '' }}">
              Semua buku
            </a>
            {{-- Content Dinamis --}}
            @foreach ($dataKategori as $kategori)
              <a href="{{ route('kategoriBuku', ['slug' => $kategori->nama_kategori]) }}"
                class="rounded-md px-3 border border-black/10 hover:bg-[#F1F6F9] {{ $kategoriAktif === $kategori->nama_kategori ? 'bg-[rgb(255,109,31)] text-white font-bold' : '' }}">
                {{ $kategori->nama_kategori }}
              </a>
            @endforeach
          </div>
        </aside>

        {{-- Koleksi Buku --}}
        <div class="w-full">

          @if ($dataBuku->count() > 0)
            <div
              class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 2xl:grid-cols-6 gap-2 md:gap-4 w-full">
              @foreach ($dataBuku as $buku)
                <div
                  class="w-full rounded-xl overflow-hidden shadow hover:shadow-lg transition group p-1.5 bg-white
                  sm:p-2 md:rounded-2xl">
                  {{-- Cover Buku --}}
                  <div class="rounded-lg md:rounded-xl overflow-hidden relative aspect-3/4">
                    {{-- Label kategori --}}
                    <div
                      class="absolute top-2 right-2 bg-[#3170ad] px-2 py-0.5 rounded-full text-xs md:text-sm lg:text-base transition-all duration-300 z-50 group-hover:opacity-25">
                      <div class="text-[rgb(251,251,251)]">
                        {{ $buku->kategori->nama_kategori }}
                      </div>
                    </div>

                    {{-- Cover buku --}}
                    @if ($buku->cover)
                      <img
                        class="buku w-full h-full object-cover object-center opacity-100 transition-transform duration-300 group-hover:scale-105"
                        src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->judul_buku }}">
                    @else
                      <img
                        class="buku w-full h-full object-cover object-center opacity-100 transition-transform duration-300 group-hover:scale-105"
                        src="{{ asset('img/default-cover.jpg') }}" alt="No Cover">
                    @endif
                  </div>

                  {{-- Title --}}
                  <div
                    class="flex items-center justify-between gap-2 px-1.5 py-2 md:px-2 md:py-2 flex-wrap">
                    <div class="flex flex-col gap-0.5 min-w-0">
                      <div
                        class="text-xs md:text-sm lg:text-base font-semibold text-[#212A3E] mb-0.5 truncate"
                        title="{{ $buku->judul_buku }}">
                        {{ $buku->judul_buku }}
                      </div>
                      <div
                        class="text-[10px] md:text-xs lg:text-sm text-[#394867] truncate leading-tight"
                        title="{{ $buku->penerbit->nama_penerbit ?? '' }}">
                        {{ $buku->penerbit->nama_penerbit ?? ' ' }}
                      </div>
                    </div>

                    {{-- Tombol --}}
                    <a href="{{ route('detail-buku', ['id' => $buku->id]) }}"
                      class="border border-black/10 rounded-2xl px-5 py-1 text-[10px] md:text-xs lg:text-sm transition whitespace-nowrap hover:bg-[#394867] hover:text-white mt-auto">
                      Detail Buku
                    </a>
                  </div>
                </div>
              @endforeach
            </div>

            <div class="mt-5">
              {{ $dataBuku->links() }}
            </div>
          @else
            <div class="w-full py-12 text-center text-[#9BA4B5] font-semibold text-xl">
              Tidak ada buku yang ditemukan.
            </div>
          @endif
        </div>
      </div>
    </section>

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
  @endauth

</x-pengunjung.layout-pengunjung>
