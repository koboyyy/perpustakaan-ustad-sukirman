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
          Jelajahi koleksi buku terbaik yang ada di <span
            class="font-semibold text-[#394867]">Perpustakaan Digital Ustad Sukirman</span>.
        </p>
      </div>
    </div>

    {{-- Main Content --}}
    <div class="flex gap-5">
      {{-- Kategori --}}
      <div
        class="w-80 rounded-2xl bg-gradient-to-br from-[#F1F6F9] via-[#9BA4B5] to-[#394867]/60 shadow-lg p-6">
        <div
          class="font-bold text-[#212A3E] text-[18px] mb-4 tracking-wide flex items-center gap-2">
          <i class="fa-solid fa-layer-group text-[#394867]"></i>
          KATEGORI
        </div>
        <div id="kategori" class="flex flex-col gap-2">
          {{-- Content Dinamis --}}
        </div>
      </div>

      {{-- Koleksi Buku --}}
      <div class="w-full">
        {{-- Navbar --}}
        <div class="flex justify-between w-full items-start mb-7">

          {{-- Pencarian --}}
          <div class="flex gap-7 items-center w-full">
            <form action=""
              class="flex w-full bg-white rounded-3xl shadow-full p-1 pl-4 backdrop-blur-sm ring-1 ring-[#9BA4B5]/50 focus-within:ring-2 focus-within:ring-[#394867] transition">
              <input type="text" name="pencarian" placeholder="Cari buku..." id="pencarian"
                class="bg-transparent flex-1 py-3 px-2 text-[#212A3E] placeholder-[#9BA4B5] focus:outline-none text-md rounded-l-3xl" />
              <button
                class="bg-gradient-to-tr from-[#394867] to-[#212A3E] text-white font-semibold px-6 py-2 rounded-3xl shadow hover:from-[#212A3E] hover:to-[#394867] transition-all">
                <i class="fa-solid fa-magnifying-glass mr-2"></i>Cari
              </button>
            </form>
          </div>
        </div>

        {{-- Koleksi Buku --}}
        <div class="grid grid-cols-2 gap-4 w-full">
          @for ($index = 0; $index < 10; $index++)
            <div class="bg-white p-4 rounded-3xl w-full shadow-lg">
              <div class="w-full rounded-2xl overflow-hidden flex gap-4">
                <div
                  class="bg-gradient-to-br from-[#9BA4B5] via-[#F1F6F9] to-[#394867]/40 h-[250px] w-[200px] rounded-xl overflow-hidden">
                  <img class="buku w-full h-full" alt="buku">
                </div>

                <div class="mt-3">
                  <div class="text-lg font-semibold truncate text-[#394867]">Judul</div>
                  <div class="text-base italic text-[#212A3E]/80 truncate">Pengarang</div>
                  <div class="text-sm text-[#9BA4B5] truncate">Penerbit</div>
                  <div class="text-sm text-[#9BA4B5] truncate">Tahun Terbit</div>
                  <div class="text-sm text-[#9BA4B5] truncate">Eksemplar</div>
                </div>
              </div>
            </div>
          @endfor
        </div>
      </div>
    </div>
  </section>
</x-pengunjung.layout-pengunjung>
