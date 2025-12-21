<x-pengunjung.layout-pengunjung title="Koleksi Buku">
  <section class="container mx-auto font-dm-sans">
    {{-- Hero --}}
    <div class="py-16 px-2 md:px-0 mb-10 relative z-10">
      <div class="mx-auto max-w-3xl text-center">
        <h1
          class="text-4xl sm:text-5xl xl:text-6xl font-extrabold bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] bg-clip-text text-transparent leading-tight drop-shadow-xl mb-4 tracking-tight">
          Daftar Lengkap Buku Digital <br>
          <span class="text-[#394867]">Perpustakaan Ustad Sukirman</span>
        </h1>
        <p class="text-lg sm:text-xl text-[#212A3E]/90 font-medium mb-0 mt-2">
          Jelajahi koleksi buku terbaik yang ada di
          <span class="font-semibold text-[#394867]">Perpustakaan Digital Ustad Sukirman</span>.
        </p>
      </div>
    </div>

    {{-- Main Content --}}
    <div class="flex gap-5 flex-col md:flex-row">
      {{-- Kategori --}}
      <aside
        class="w-full md:w-80 mb-6 md:mb-0 rounded-2xl bg-gradient-to-br from-[#F1F6F9] via-[#9BA4B5] to-[#394867]/60 shadow-lg p-6">
        <div
          class="font-bold text-[#212A3E] text-[18px] mb-4 tracking-wide flex items-center gap-2">
          <i class="fa-solid fa-layer-group text-[#394867]"></i>
          KATEGORI
        </div>
        <div id="kategori" class="flex flex-col gap-2">
          {{-- Content Dinamis --}}
          @if (isset($kategori) && count($kategori) > 0)
            @foreach ($kategori as $kat)
              <a href="{{ route('pengunjung.koleksiBuku', ['kategori' => $kat->id]) }}"
                class="px-3 py-2 rounded-lg hover:bg-[#212A3E]/10 cursor-pointer transition
                        {{ request('kategori') == $kat->id ? 'bg-[#394867]/20 font-bold text-[#394867]' : 'text-[#212A3E]' }}">
                {{ $kat->nama }}
              </a>
            @endforeach
          @else
            <span class="text-[#9BA4B5] italic">Belum ada kategori</span>
          @endif
        </div>
      </aside>

      {{-- Koleksi Buku --}}
      <div class="w-full">
        {{-- Navbar --}}
        <div class="flex flex-col justify-between w-full items-start mb-7 relative">
          {{-- Pencarian --}}
          <div class="flex gap-7 items-center w-full">
            <form action="#" method="GET"
              class="flex w-full bg-white rounded-3xl shadow-full p-1 pl-4 backdrop-blur-sm ring-1 ring-[#9BA4B5]/50 focus-within:ring-2 focus-within:ring-[#394867] transition"
              autocomplete="off">
              {{-- Input --}}
              <input type="text" name="pencarian" placeholder="Cari buku..." id="pencarian"
                autocomplete="off" value="{{ request('pencarian') }}"
                class="bg-transparent flex-1 py-3 px-2 text-[#212A3E] placeholder-[#9BA4B5] focus:outline-none text-md rounded-l-3xl" />
              <button
                class="bg-gradient-to-tr from-[#394867] to-[#212A3E] text-white font-semibold px-6 py-2 rounded-3xl shadow hover:from-[#212A3E] hover:to-[#394867] transition-all"
                type="submit">
                <i class="fa-solid fa-magnifying-glass mr-2"></i>Cari
              </button>
            </form>
          </div>

          {{-- Hasil Pencarian --}}
          <div id="hasil"
            class="bg-white z-[1000] border border-2 rounded-2xl w-full absolute top-[70px] p-0 hidden">
            <ul id="list-hasil" class="divide-y divide-gray-200"></ul>
          </div>
        </div>

        {{-- Koleksi Buku --}}
        @php
          // Ambil filter berdasarkan request kategori dan pencarian
          $filteredBuku = collect($dataBuku);

          $requestKategori = request('kategori');
          $requestPencarian = request('pencarian');

          if ($requestKategori) {
              $filteredBuku = $filteredBuku->where('id_kategori', $requestKategori);
          }
          if ($requestPencarian) {
              $filteredBuku = $filteredBuku->filter(function ($item) use ($requestPencarian) {
                  return stripos($item['judul'], $requestPencarian) !== false ||
                      stripos($item['penerbit'] ?? '', $requestPencarian) !== false;
              });
          }
        @endphp

        @if ($filteredBuku->count() > 0)
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
            @foreach ($filteredBuku as $db)
              <div
                class="w-full rounded-2xl overflow-hidden flex gap-4 bg-white shadow hover:shadow-lg transition">
                <div
                  class="bg-gradient-to-br from-[#9BA4B5] via-[#F1F6F9] to-[#394867]/40 h-[250px] w-[200px] rounded-xl overflow-hidden flex-shrink-0 flex justify-center items-center">
                  @if (isset($db['gambar']) && $db['gambar'])
                    <img class="buku w-full h-full object-cover"
                      src="{{ asset('storage/buku/' . $db['gambar']) }}"
                      alt="Cover {{ $db['judul'] }}">
                  @else
                    <img class="buku w-full h-full object-contain opacity-70"
                      src="{{ asset('images/no-cover.png') }}" alt="No Cover">
                  @endif
                </div>
                <div class="mt-3 flex flex-col justify-between py-1">
                  <div>
                    <div class="text-lg font-semibold truncate text-[#394867]">
                      {{ $db['judul'] ?? '-' }}</div>
                    <div class="text-base italic text-[#212A3E]/80 truncate">
                      {{ $db['penerbit'] ?? '-' }}</div>
                    <div class="text-sm text-[#9BA4B5] truncate">{{ $db['penerbit'] ?? '-' }}</div>
                    <div class="text-sm text-[#9BA4B5] truncate">{{ $db['tahun_terbit'] ?? '-' }}
                    </div>
                    <div class="text-sm text-[#9BA4B5] truncate">Eksemplar:
                      {{ $db['eksemplar'] ?? '0' }}</div>
                  </div>
                  {{-- <a href="{{ route('pengunjung.detailBuku', ['id' => $db['id']]) }}"
                    class="mt-4 bg-gradient-to-tr from-[#394867] to-[#212A3E] text-white px-3 py-2 rounded-lg text-sm font-semibold text-center hover:from-[#212A3E] hover:to-[#394867] transition">
                    Lihat Detail
                  </a> --}}
                </div>
              </div>
            @endforeach
          </div>
        @else
          <div class="w-full py-12 text-center text-[#9BA4B5] font-semibold text-xl">
            Tidak ada buku yang ditemukan.
          </div>
        @endif
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  {{-- 
    Penambahan fitur:
    - Auto complete: bila user tekan ArrowDown/ArrowUp, list suggestion bisa dinavigasi
    - Tekan Enter pada salah satu suggestion, input dikopi ke kotak pencarian & suggestion tertutup
    - Klik pada suggestion, juga set input
    - Fitur tetap auto hidden saat blur/klick di luar
  --}}
  <script>
    let activeSuggestionIndex = -1; // -1 artinya tidak ada yang aktif
    let suggestionData = [];

    function showSuggestionBox() {
      $('#hasil').removeClass('hidden').addClass('block');
    }

    function hideSuggestionBox() {
      $('#hasil').removeClass('block').addClass('hidden');
      activeSuggestionIndex = -1;
    }

    function updateActiveSuggestion() {
      // Highlight suggestion yang aktif, clear yang lain
      $('#list-hasil li').removeClass('bg-[#9BA4B5]/20').removeClass('font-bold');
      if (activeSuggestionIndex >= 0) {
        $('#list-hasil li').eq(activeSuggestionIndex)
          .addClass('bg-[#9BA4B5]/20').addClass('font-bold');
      }
    }

    // Ketika user ketik (keyup)
    $('#pencarian').on('keyup', function(e) {
      // Untuk handling Arrow dan Enter, pakai keydown handler, di sini hanya handle fetch
      if (['ArrowUp', 'ArrowDown', 'Enter', 'Escape'].includes(e.key)) {
        return;
      }

      var keyword = $(this).val();
      if (keyword.length > 0) {
        $.get('/live-search', {
          keyword: keyword
        }, function(data) {
          let hasilBox = $('#hasil');
          let listHasil = $('#list-hasil');
          listHasil.empty();

          suggestionData = data || [];
          activeSuggestionIndex = -1;

          if (suggestionData.length > 0) {
            showSuggestionBox();
            // Tampilkan 10 hasil buku
            suggestionData.forEach(function(item, idx) {
              listHasil.append(
                `<li class="py-2 px-3 hover:bg-[#9BA4B5]/10 cursor-pointer text-[#212A3E]" data-idx="${idx}" data-judul="${item.judul_buku}">
                  <span class="font-semibold">${item.judul_buku}</span>
                </li>`
              );
            });
          } else {
            hideSuggestionBox();
          }
        });
      } else {
        hideSuggestionBox();
        $('#list-hasil').empty();
      }
    });

    // Arrow navigation dan enter support (keydown supaya tidak trigger inputan browser default)
    $('#pencarian').on('keydown', function(e) {
      let listEls = $('#list-hasil li');
      if (!listEls.length) return;

      if (e.key === 'ArrowDown') {
        e.preventDefault();
        if (activeSuggestionIndex < listEls.length - 1) {
          activeSuggestionIndex++;
          updateActiveSuggestion();
          // Scroll ke elemen yang aktif jika di luar view
          let $active = listEls.eq(activeSuggestionIndex);
          let $parent = $('#list-hasil');
          let activeTop = $active.position().top;
          let activeBottom = activeTop + $active.outerHeight();
          let parentScroll = $parent.scrollTop();
          if (activeBottom > $parent.height()) {
            $parent.scrollTop(parentScroll + (activeBottom - $parent.height()));
          } else if (activeTop < 0) {
            $parent.scrollTop(parentScroll + activeTop);
          }
        }
      } else if (e.key === 'ArrowUp') {
        e.preventDefault();
        if (activeSuggestionIndex > 0) {
          activeSuggestionIndex--;
          updateActiveSuggestion();
          let $active = listEls.eq(activeSuggestionIndex);
          let $parent = $('#list-hasil');
          let activeTop = $active.position().top;
          let parentScroll = $parent.scrollTop();
          if (activeTop < 0) {
            $parent.scrollTop(parentScroll + activeTop);
          }
        }
      } else if (e.key === 'Enter') {
        if (activeSuggestionIndex >= 0 && activeSuggestionIndex < suggestionData.length) {
          e.preventDefault();
          let selected = suggestionData[activeSuggestionIndex];
          $('#pencarian').val(selected.judul_buku);
          hideSuggestionBox();
        }
      } else if (e.key === 'Escape') {
        hideSuggestionBox();
      }
    });

    // Klik pada suggestion
    $('#list-hasil').on('click', 'li', function(e) {
      let judul = $(this).data('judul');
      $('#pencarian').val(judul);
      hideSuggestionBox();
      $('#pencarian').focus();
    });

    // Hover mouse mengubah highlight aktif
    $('#list-hasil').on('mousemove', 'li', function() {
      activeSuggestionIndex = parseInt($(this).attr('data-idx'));
      updateActiveSuggestion();
    });

    // Opsi: Tutup box saat klik di luar pencarian
    $(document).on('mousedown', function(e) {
      if (!$(e.target).closest('#pencarian, #hasil').length) {
        hideSuggestionBox();
      }
    });

    // Opsi: Saat input blur, simpan sebentar supaya klik pada list bisa terproses
    $('#pencarian').on('blur', function() {
      setTimeout(hideSuggestionBox, 150);
    });
  </script>

</x-pengunjung.layout-pengunjung>
