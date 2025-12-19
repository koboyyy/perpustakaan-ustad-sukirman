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
        <div class="flex justify-between w-full items-start mb-7">
          {{-- Pencarian --}}
          <div class="flex gap-7 items-center w-full">
            <form action="#" method="GET"
              class="flex w-full bg-white rounded-3xl shadow-full p-1 pl-4 backdrop-blur-sm ring-1 ring-[#9BA4B5]/50 focus-within:ring-2 focus-within:ring-[#394867] transition">
              <input type="text" name="pencarian" placeholder="Cari buku..." id="pencarian"
                value="{{ request('pencarian') }}"
                class="bg-transparent flex-1 py-3 px-2 text-[#212A3E] placeholder-[#9BA4B5] focus:outline-none text-md rounded-l-3xl" />
              <button
                class="bg-gradient-to-tr from-[#394867] to-[#212A3E] text-white font-semibold px-6 py-2 rounded-3xl shadow hover:from-[#212A3E] hover:to-[#394867] transition-all"
                type="submit">
                <i class="fa-solid fa-magnifying-glass mr-2"></i>Cari
              </button>
            </form>
          </div>
        </div>

        {{-- Koleksi Buku --}}
        @if (count($dataBuku) > 0)
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
            @foreach ($dataBuku as $db)
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
                      {{ $db['pengarang'] ?? '-' }}</div>
                    <div class="text-sm text-[#9BA4B5] truncate">{{ $db['penerbit'] ?? '-' }}</div>
                    <div class="text-sm text-[#9BA4B5] truncate">{{ $db['tahunTerbit'] ?? '-' }}
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

        {{-- Pagination --}}
        <div class="mt-8">
          @if (method_exists($dataBuku, 'links'))
            {{ $dataBuku->appends(request()->all())->links() }}
          @endif
        </div>
      </div>
    </div>
  </section>
</x-pengunjung.layout-pengunjung>
