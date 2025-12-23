<x-pengunjung.layout-pengunjung title="Koleksi Buku">
  <section class="container mx-auto font-dm-sans">
    {{-- Hero --}}
    <div class="py-16 px-2 md:px-0 mb-10 relative z-10">
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

    {{-- Main Content --}}
    <div class="flex gap-5 flex-col md:flex-row mb-10">
      {{-- List Kategori --}}
      <aside
        class="w-full md:w-80 mb-6 md:mb-0 rounded-2xl bg-linear-to-br from-[#F1F6F9] via-[#9BA4B5] to-[#394867]/60 shadow-lg p-6">
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
        {{-- Pencarian --}}
        <div class="flex flex-col justify-between w-full items-start mb-7 relative">
          {{-- Field Pencarian --}}
          <div class="flex gap-7 items-center w-full">
            <form action="{{ route('pencarian') }}" method="GET"
              class="w-full h-12 rounded-full shadow-[2px_8px_15px_2px_rgb(0,0,0,0.1)] flex"
              autocomplete="off">
              {{-- Input --}}
              <input type="text" name="pencarian" placeholder="Cari buku..." id="pencarian"
                autocomplete="off" value="{{ request('pencarian') }}"
                class="w-full h-full flex items-center px-7 outline-0" />
              <button
                class="w-12 h-12 rounded-full bg-black shadow-[0px_2px_5px_1px_rgb(0,0,0,0.4)] text-white flex items-center justify-center"
                type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </form>
          </div>

          {{-- Hasil Pencarian --}}
          <div id="hasil"
            class="bg-white z-1000 border rounded-2xl w-full absolute top-[70px] p-0 hidden">
            <ul id="list-hasil" class="divide-y divide-gray-200"></ul>
          </div>
        </div>

        @if ($dataBuku->count() > 0)
          <div class="grid grid-cols-1 md:grid-cols-4 gap-4 w-full">
            @foreach ($dataBuku as $buku)
              <a href="{{ route('detail-buku', ['id' => $buku->id]) }}" style="display: block;"
                class="w-full rounded-2xl overflow-hidden shadow hover:shadow-lg transition relative group">
                {{-- Cover Buku --}}
                <div
                  class="w-full h-full bg-linear-to-br from-[#9BA4B5] via-[#F1F6F9] to-[#394867]/40
                  rounded-xl overflow-hidden shrink-0 flex justify-center items-center min-h-100">
                  @if (!empty($buku->cover))
                    <img
                      class="buku w-full h-full object-cover object-center opacity-70 transition-transform duration-300 group-hover:scale-110"
                      src="{{ asset('storage/buku/' . $buku->cover) }}"
                      alt="{{ $buku->judul_buku }}">
                  @else
                    <img
                      class="buku w-full h-full object-cover object-center opacity-70 transition-transform duration-300 group-hover:scale-110"
                      src="{{ asset('images/no-cover.png') }}" alt="No Cover">
                  @endif
                </div>
                {{-- Label Kategori, Judul dan Pengarang --}}
                <div
                  class="absolute top-0 left-0 w-full h-full bg-black/10 hover:bg-transparent text-white transition-all duration-300">
                  <div class="flex flex-col items-center justify-end h-full p-4">
                    <div class="text-lg font-light bg-blue-400/20 py px-2 rounded-md truncate">
                      {{ $buku->kategori->nama_kategori }}
                    </div>
                    <div class="font-bold text-2xl wrap-break-words text-center w-full">
                      {{ $buku->judul_buku }}
                    </div>
                    <div class="text-sm truncate italic">
                      {{ $buku->penerbit->nama_penerbit }}
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
