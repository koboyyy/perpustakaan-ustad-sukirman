<div
  class="bg-linear-to-br from-[#EEF3F7] via-[#B0C4D9]/60 to-[#9BA4B5]/40 py-10 sm:py-14 md:py-16 relative overflow-hidden">
  <!-- Dekorasi Bulat, menyatu tema -->
  <div
    class="absolute left-0 -top-16 w-52 h-52 sm:w-72 sm:h-72 bg-[#9BA4B5] opacity-20 rounded-full blur-3xl z-0">
  </div>
  <div
    class="absolute right-0 bottom-0 w-56 h-56 sm:w-80 sm:h-80 bg-[#638ECB] opacity-15 rounded-full blur-3xl z-0">
  </div>

  <div class="max-w-7xl mx-auto relative z-10 px-3 sm:px-4 md:px-8">
    <x-pengunjung.sub-title title="Buku Terbaru"
      subtitle="Koleksi buku terbaru yang tersedia di perpustakaan kami." color="[#394867]" />

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8 md:gap-10 xl:gap-14">
      @php
        // Ambil 3 buku terbaru
        $bukuTerbaru = $dataBuku->sortByDesc('created_at')->take(3);
      @endphp
      @foreach ($bukuTerbaru as $buku)
        <div
          class="bg-white/90 backdrop-blur-md rounded-2xl xs:rounded-3xl shadow-xl border-b-4 border-[#638ECB] dark:border-[#9BA4B5] px-3 xs:px-5 sm:px-7 py-6 flex flex-col items-center group hover:scale-[1.02] hover:shadow-[0_8px_48px_0_rgba(99,142,203,0.12)] transition-all duration-300 cursor-pointer">
          <div class="relative w-full flex justify-center">
            @if ($buku->cover)
              <img src="{{ asset('storage/' . $buku->cover) }}"
                alt="Cover Buku {{ $buku->judul_buku }}"
                class="w-[130px] xs:w-[150px] sm:w-[170px] md:w-[200px] h-[180px] xs:h-[200px] sm:h-[240px] md:h-[280px] object-cover rounded-lg xs:rounded-xl mb-4 xs:mb-5 shadow-md group-hover:ring-4 group-hover:ring-[#9BA4B5]/40 transition-all duration-300" />
            @else
              <img src="{{ asset('img/default-cover.jpg') }}" alt="No Cover"
                class="w-[130px] xs:w-[150px] sm:w-[170px] md:w-[200px] h-[180px] xs:h-[200px] sm:h-[240px] md:h-[280px] object-cover rounded-lg xs:rounded-xl mb-4 xs:mb-5 shadow-md group-hover:ring-4 group-hover:ring-[#9BA4B5]/40 transition-all duration-300" />
            @endif
            <span
              class="absolute -top-3 xs:-top-4 left-1/2 -translate-x-1/2 bg-linear-to-r from-[#394867] to-[#638ECB] text-white px-2 xs:px-3 py-0.5 xs:py-1 rounded-full text-xs font-bold drop-shadow-lg shadow-lg">Baru!</span>
          </div>
          <div
            class="font-bold text-base xs:text-lg sm:text-xl text-[#394867] mb-1 text-center group-hover:text-[#638ECB] transition-colors duration-300">
            {{ $buku->judul_buku }}</div>
          <div
            class="text-[#638ECB] font-medium text-xs xs:text-sm sm:text-[15px] mb-1 text-center">
            {{ $buku->penulis ?? ($buku->pengarang ?? '-') }}
          </div>
          <div class="text-xs text-[#9BA4B5] mb-2 xs:mb-3 italic text-center">
            @if (isset($buku->kategori) && isset($buku->kategori->nama_kategori))
              {{ $buku->kategori->nama_kategori }}
            @else
              -
            @endif
          </div>
          <div
            class="px-3 py-[2px] xs:px-4 xs:py-[4px] bg-[#EEF3F7] text-[#394867] rounded-full font-semibold text-xs xs:text-sm shadow text-center w-min whitespace-nowrap">
            {{ $buku->tahun_terbit ?? '-' }}</div>
        </div>
      @endforeach
    </div>
    <div class="flex justify-center mt-8 sm:mt-10 md:mt-12">
      <a href="/koleksi-buku"
        class="inline-block font-semibold bg-linear-to-r from-[#394867] to-[#638ECB] text-white px-6 xs:px-8 py-2 xs:py-3 rounded-full shadow hover:scale-105 hover:from-[#212A3E] hover:to-[#394867] transition-all duration-300 text-base xs:text-lg">
        Lihat Semua Buku
        <i class="fa-solid fa-arrow-right ml-2"></i>
      </a>
    </div>
  </div>
</div>
<!--
Catatan:
- Mengubah width dan height gambar dengan class utilitas CSS bertingkat untuk proporsi responsif.
- Grid adaptif: 1 kolom di mobile, 2 kolom di sm, 3 kolom di md+.
- Padding, margin, rounded, font-size menggunakan utilitas responsif seperti px-3, xs:px-5, sm:px-7 dll.
- Semua isi card (gambar, teks) rapi di center & responsif.
- Background bulat tetap proporsional untuk layar kecil.
-->
