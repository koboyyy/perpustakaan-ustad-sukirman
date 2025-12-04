{{-- Rekomendasi Buku --}}
<section class="mt-15 container mx-auto">

  <x-pengunjung::sub-title title="Rekomendasi Buku" subtitle="Temukan Bacaan Favorit Anda" />

  <div class="flex justify-center items-center mb-5">

    {{-- <div>
      <h3 class="font-dm-sans font-semibold text-2xl">Rekomendasi Buku</h3>
      <p class="font-inter">Temukan inspirasi bacaan mu</p>
    </div> --}}

    <div class="flex gap-2 h-fit text-white font-light">
      <button class="px-3 py-1 rounded-md bg-purple-700">Rekomendasi</button>
      <button class="px-3 py-1 rounded-md bg-purple-700">Sains</button>
      <button class="px-3 py-1 rounded-md bg-purple-700">Novel</button>
      <button class="px-3 py-1 rounded-md bg-purple-700">Komik</button>
      <button class="px-3 py-1 rounded-md bg-purple-700">Sosial</button>
    </div>
  </div>

  <div class="flex gap-4 overflow-auto h-70" style="scrollbar-width: none">

    @for ($i = 1; $i < 10; $i++)
      <div
        class="bg-black rounded-t-[16px] items-end flex justify-center relative overflow-hidden shrink-0">
        <img class="book w-full h-full object-cover z-0" src="" alt="clean code">

        <div
          class="absolute bottom-6 left-1/2 -translate-x-1/2 z-1 text-white text-center text-[10px]">
          <p class="py-1 px-2 rounded-md bg-[#638ECB]">Kategori</p>
          <h3 class="font-bold text-xl">Judul</h3>
          <p><i>Pengarang</i></p>
        </div>
      </div>
    @endfor

  </div>
</section>
