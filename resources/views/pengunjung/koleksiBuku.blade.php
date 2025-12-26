<x-pengunjung.layout-pengunjung title="Koleksi Buku">
  {{-- @guest
    <div class="flex justify-center items-center min-h-[150px]">
      <div
        class="bg-yellow-50 border border-yellow-100 rounded-md px-6 py-4 text-center text-yellow-700 text-base max-w-md mx-auto flex items-center justify-center gap-3">
        <i class="fa-regular fa-smile text-lg"></i>
        <span>
          Untuk melihat koleksi buku, silakan <span class="font-semibold text-purple-700">login /
            registrasi</span> terlebih dahulu.
        </span>
      </div>
    </div>

    <div class="h-200">
      <x-form-login></x-form-login>
    </div>

  @endguest --}}
  <x-pengunjung.bar-navigasi></x-pengunjung.bar-navigasi>

  @auth
    <section class="container mx-auto font-dm-sans">
      {{-- Hero --}}
      <div class="py-16 px-2 md:px-0 mb-2 relative z-10">
        <div class="mx-auto max-w-3xl text-center">
          <h1
            class="text-4xl sm:text-5xl xl:text-6xl font-extrabold bg-linear-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] bg-clip-text text-transparent leading-tight drop-shadow-xl mb-4 tracking-tight">
            Daftar Lengkap Buku Digital <br>
            <span class="text-[#394867]">Perpustakaan Ustad Sukirman</span>
          </h1>
          <p class="text-lg sm:text-xl text-[#212A3E]/90 font-medium mb-0 mt-2">
            Jelajahi koleksi buku terbaik yang ada di
            <span class="font-semibold text-[#394867]">Perpustakaan Digital Ustad Sukirman</span>.
          </p>
        </div>
      </div>

      {{-- Pencarian --}}
      <div class="flex flex-col justify-between w-1/2 items-start mb-10 mx-auto relative">
        {{-- Field Pencarian --}}
        <div class="flex gap-7 items-center w-full">
          <form action="{{ route('pencarian') }}" method="GET"
            class="bg-white w-full h-15 px-[7px] items-center rounded-full flex border border-black/5"
            autocomplete="off">
            {{-- Input --}}
            <input type="text" name="pencarian" placeholder="Cari buku..." id="pencarian"
              autocomplete="off" value="{{ request('pencarian') }}"
              class="w-full h-full flex items-center px-7 outline-0 text-xl" />
            {{-- Tombol --}}
            <button
              class="w-12 h-12 rounded-full bg-black shadow-[0px_2px_5px_1px_rgb(0,0,0,0.6)] text-white flex items-center justify-center shrink-0"
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

      <div class="w-full py-1 flex justify-between mb-5">
        <div>Jumlah buku: {{ $dataBuku->count() }}</div>
      </div>

      {{-- Main Content --}}
      <div class="flex gap-5 flex-col md:flex-row mb-10">

        {{-- List Kategori --}}
        <aside class="w-full md:w-80 h-fit rounded-md shadow p-6 bg-white">
          <div
            class="font-bold text-[#212A3E] text-[18px] mb-4 tracking-wide flex items-center gap-2">
            <i class="fa-solid fa-layer-group text-[#394867]"></i>
            KATEGORI
          </div>
          <div id="kategori" class="flex flex-col gap-2">
            {{-- Content Dinamis --}}
            @foreach ($dataKategori as $kategori)
              <a href="{{ route('kategoriBuku', ['slug' => $kategori->nama_kategori]) }}">
                {{ $kategori->nama_kategori }}
              </a>
            @endforeach
          </div>
        </aside>

        {{-- Koleksi Buku --}}
        <div class="w-full">

          @if ($dataBuku->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-6 gap-4 w-full">
              @foreach ($dataBuku as $buku)
                <a href="{{ route('detail-buku', ['id' => $buku->id]) }}" style="display: block;"
                  class="w-full rounded-2xl overflow-hidden shadow hover:shadow-lg transition relative group">
                  {{-- Cover Buku --}}
                  <div
                    class="w-full h-full bg-linear-to-br from-[#9BA4B5] via-[#F1F6F9] to-[#394867]/40
                  rounded-xl overflow-hidden shrink-0 flex justify-center items-center min-h-65">
                    @if ($buku->cover)
                      <img
                        class="buku w-full h-full object-cover object-center opacity-70 transition-transform duration-300 group-hover:scale-110"
                        src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->judul_buku }}">
                    @else
                      <img
                        class="buku w-full h-full object-cover object-center opacity-70 transition-transform duration-300 group-hover:scale-110"
                        src="{{ asset('img/default-cover.jpg') }}" alt="No Cover">
                    @endif
                  </div>
                  {{-- Label Kategori, Judul dan Pengarang --}}
                  <div
                    class="absolute top-0 left-0 w-full h-full bg-black/10 hover:bg-transparent text-white transition-all duration-300">
                    <div class="flex flex-col items-center justify-end h-full p-4">
                      <div class="text-sm font-light bg-blue-400/20 py px-2 rounded-md truncate">
                        {{ $buku->kategori->nama_kategori }}
                      </div>
                      <div class="font-bold text-base wrap-break-words text-center w-full">
                        {{ $buku->judul_buku }}
                      </div>
                      <div class="text-xs truncate italic">
                        {{ $buku->penerbit->nama_penerbit ?? ' ' }}
                      </div>
                    </div>
                  </div>
                </a>
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
