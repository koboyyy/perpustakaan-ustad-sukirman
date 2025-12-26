<div
  class="bg-linear-to-br from-[#212A3E] via-[#394867] to-[#9BA4B5] py-16 md:py-24 relative overflow-hidden rounded-t-[px]">
  {{-- Dekorasi background --}}
  <div
    class="absolute left-0 top-10 w-40 h-40 sm:w-60 sm:h-60 bg-[#638ECB] opacity-10 rounded-full blur-3xl z-0">
  </div>
  <div
    class="absolute right-0 bottom-0 w-56 h-56 sm:w-96 sm:h-96 bg-[#EEF3F7] opacity-10 rounded-full blur-3xl z-0">
  </div>

  {{-- Title --}}
  <x-pengunjung::sub-title title="Layanan Kami" subtitle="Layanan Kunjungan" color="white" />

  <div
    class="w-full flex flex-col gap-5 sm:gap-8 md:flex-row items-center justify-center text-lg sm:text-2xl max-w-7xl mx-auto z-10 relative px-4 sm:px-10 md:px-20">
    {{-- CARD 1 --}}
    <div
      class="w-full sm:w-auto grow basis-0 min-w-0 flex-1 bg-white/80 backdrop-blur-md rounded-3xl shadow-lg border-b-4 border-[#638ECB] dark:border-[#9BA4B5] p-5 sm:p-7 flex flex-col items-center group transition-all duration-300 hover:-translate-y-3 hover:scale-105 hover:shadow-[0_8px_48px_0_rgba(75,110,182,0.18)] cursor-pointer">
      <div
        class="text-3xl sm:text-5xl w-16 h-16 sm:w-20 sm:h-20 flex justify-center items-center rounded-2xl mb-2 sm:mb-3 group-hover:bg-gradient-to-tr group-hover:from-[#394867] group-hover:to-[#638ECB] group-hover:text-white bg-[#F1F6F9] text-[#394867] shadow-inner transition-all duration-300">
        <i class="fa-solid fa-building-circle-arrow-right"></i>
      </div>
      <div class="font-semibold text-base sm:text-xl text-[#212A3E] group-hover:text-[#638ECB]">
        Sirkulasi</div>
      <div class="mt-2 text-xs sm:text-sm text-gray-500 text-center">Peminjaman dan pengembalian
        koleksi secara mudah & cepat.</div>
    </div>
    {{-- CARD 2 --}}
    <div
      class="w-full sm:w-auto grow basis-0 min-w-0 flex-1 bg-white/80 backdrop-blur-md rounded-3xl shadow-lg border-b-4 border-[#638ECB] dark:border-[#9BA4B5] p-5 sm:p-7 flex flex-col items-center group transition-all duration-300 hover:-translate-y-3 hover:scale-105 hover:shadow-[0_8px_48px_0_rgba(75,110,182,0.18)] cursor-pointer">
      <div
        class="text-3xl sm:text-5xl w-16 h-16 sm:w-20 sm:h-20 flex justify-center items-center rounded-2xl mb-2 sm:mb-3 group-hover:bg-gradient-to-tr group-hover:from-[#394867] group-hover:to-[#638ECB] group-hover:text-white bg-[#F1F6F9] text-[#394867] shadow-inner transition-all duration-300">
        <i class="fa-solid fa-asterisk"></i>
      </div>
      <div class="font-semibold text-base sm:text-xl text-[#212A3E] group-hover:text-[#638ECB]">
        Referensi</div>
      <div class="mt-2 text-xs sm:text-sm text-gray-500 text-center">Sumber referensi koleksi untuk
        kebutuhan belajar dan riset.</div>
    </div>
    {{-- CARD 3 --}}
    <div
      class="w-full sm:w-auto grow basis-0 min-w-0 flex-1 bg-white/80 backdrop-blur-md rounded-3xl shadow-lg border-b-4 border-[#638ECB] dark:border-[#9BA4B5] p-5 sm:p-7 flex flex-col items-center group transition-all duration-300 hover:-translate-y-3 hover:scale-105 hover:shadow-[0_8px_48px_0_rgba(75,110,182,0.18)] cursor-pointer">
      <div
        class="text-3xl sm:text-5xl w-16 h-16 sm:w-20 sm:h-20 flex justify-center items-center rounded-2xl mb-2 sm:mb-3 group-hover:bg-gradient-to-tr group-hover:from-[#394867] group-hover:to-[#638ECB] group-hover:text-white bg-[#F1F6F9] text-[#394867] shadow-inner transition-all duration-300">
        <i class="fa-solid fa-book-atlas"></i>
      </div>
      <div class="font-semibold text-base sm:text-xl text-[#212A3E] group-hover:text-[#638ECB]">
        Literasi
        Informasi</div>
      <div class="mt-2 text-xs sm:text-sm text-gray-500 text-center">Pelatihan literasi & bimbingan
        akses
        informasi terkini.</div>
    </div>
    {{-- CARD 4 --}}
    <div
      class="w-full sm:w-auto grow basis-0 min-w-0 flex-1 bg-white/80 backdrop-blur-md rounded-3xl shadow-lg border-b-4 border-[#638ECB] dark:border-[#9BA4B5] p-5 sm:p-7 flex flex-col items-center group transition-all duration-300 hover:-translate-y-3 hover:scale-105 hover:shadow-[0_8px_48px_0_rgba(75,110,182,0.18)] cursor-pointer">
      <div
        class="text-3xl sm:text-5xl w-16 h-16 sm:w-20 sm:h-20 flex justify-center items-center rounded-2xl mb-2 sm:mb-3 group-hover:bg-linear-to-tr group-hover:from-[#394867] group-hover:to-[#638ECB] group-hover:text-white bg-[#F1F6F9] text-[#394867] shadow-inner transition-all duration-300">
        <i class="fa-solid fa-puzzle-piece"></i>
      </div>
      <div class="font-semibold text-base sm:text-xl text-[#212A3E] group-hover:text-[#638ECB]">
        Ekstensi</div>
      <div class="mt-2 text-xs sm:text-sm text-gray-500 text-center">Layanan ekstensi & pengembangan
        minat baca masyarakat.</div>
    </div>
  </div>
</div>
{{-- Responsive layout for very small screens --}}
<style>
  @media (max-width: 399px) {

    .text-base,
    .sm\:text-xl {
      font-size: 1rem !important;
    }

    .text-xs,
    .sm\:text-sm {
      font-size: 0.80rem !important;
    }

    .w-16,
    .sm\:w-20 {
      width: 3.5rem !important;
    }

    .h-16,
    .sm\:h-20 {
      height: 3.5rem !important;
    }

    .p-5,
    .sm\:p-7 {
      padding: 1.25rem !important;
    }
  }
</style>
