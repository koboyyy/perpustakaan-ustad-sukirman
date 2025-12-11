{{-- Rekomendasi Buku --}}
<div class="container mx-auto">
  <x-pengunjung::sub-title title="Rekomendasi Buku" subtitle="Temukan Bacaan Favorit Anda" />

  <div class="flex justify-center items-center mb-8">
    <div class="flex flex-wrap justify-center gap-3 h-fit font-medium">
      <button
        class="px-4 py-2 rounded-lg bg-gradient-to-r from-[#394867] via-[#638ECB] to-[#212A3E] shadow-md hover:scale-105 transition-transform tracking-wide ring-2 ring-[#9BA4B5]/40 text-white hover:ring-4 focus:ring-4 focus:outline-none">Rekomendasi</button>
      <button
        class="px-4 py-2 rounded-lg bg-white shadow-md text-[#394867] hover:bg-[#F1F6F9] font-semibold border border-[#9BA4B5]/30 hover:border-[#9BA4B5]/60 transition">Sains</button>
      <button
        class="px-4 py-2 rounded-lg bg-white shadow-md text-[#394867] hover:bg-[#F1F6F9] font-semibold border border-[#9BA4B5]/30 hover:border-[#9BA4B5]/60 transition">Novel</button>
      <button
        class="px-4 py-2 rounded-lg bg-white shadow-md text-[#394867] hover:bg-[#F1F6F9] font-semibold border border-[#9BA4B5]/30 hover:border-[#9BA4B5]/60 transition">Komik</button>
      <button
        class="px-4 py-2 rounded-lg bg-white shadow-md text-[#394867] hover:bg-[#F1F6F9] font-semibold border border-[#9BA4B5]/30 hover:border-[#9BA4B5]/60 transition">Sosial</button>
    </div>
  </div>

  <div id="rekomendasi-cards-wrapper"
    class="grid grid-cols-2 gap-0 lg:flex lg:gap-2 justify-center py-1 px-5 lg:px-0 scrollbar-hide"
    style="scrollbar-width: none;">

    @for ($i = 1; $i < 10; $i++)
      <div
        class="rekomendasi-card max-w-[200px] lg:min-w-[200px] max-h-[370px] relative flex flex-col rounded-2xl shadow-lg bg-gradient-to-br from-[#EEF3F7]/90 to-white transition-transform hover:-translate-y-2 hover:shadow-2xl duration-200 border border-[#9BA4B5]/30 group">

        <div class="overflow-hidden rounded-t-2xl h-[270px] flex items-stretch bg-[#D6E1F0]">
          <img
            class="buku w-full h-full object-cover object-top transition-transform duration-300 group-hover:scale-105 z-0"
            style="transition: filter 300ms, opacity 300ms;" src="">
        </div>

        <div class="absolute top-3 left-3 z-10">
          <span
            class="inline-block py-1 px-3 rounded-full bg-gradient-to-r from-[#394867] to-[#638ECB] text-white text-[11px] shadow font-semibold tracking-wide">Kategori</span>
        </div>

        <div class="flex flex-col px-4 py-4 items-center text-center flex-1 justify-end">
          <h3 class="font-poppins font-bold text-lg text-[#394867] mb-1 truncate">Judul</h3>
          <p class="text-[13px] text-[#9BA4B5] italic mb-2 truncate">Pengarang</p>
          <button
            class="mt-auto px-3 py-1 rounded-full bg-gradient-to-r from-[#394867] to-[#638ECB] text-[13px] text-white shadow hover:from-[#212A3E] hover:to-[#394867] transition font-semibold tracking-wide">Lihat
            Detail</button>
        </div>
      </div>
    @endfor
  </div>
</div>
