{{-- Rekomendasi Buku --}}
<section class="container mx-auto">

  <x-pengunjung::sub-title title="Rekomendasi Buku" subtitle="Temukan Bacaan Favorit Anda" />

  <div class="flex justify-center items-center mb-8">
    <div class="flex flex-wrap justify-center gap-3 h-fit font-medium">
      <button
        class="px-4 py-2 rounded-lg bg-gradient-to-r from-purple-600 via-purple-700 to-purple-800 shadow-md hover:scale-105 transition-transform tracking-wide ring-2 ring-purple-200/40 text-white hover:ring-4 focus:ring-4 focus:outline-none">Rekomendasi</button>
      <button
        class="px-4 py-2 rounded-lg bg-white shadow-md text-purple-700 hover:bg-purple-100 font-semibold border border-purple-100 hover:border-purple-300 transition">Sains</button>
      <button
        class="px-4 py-2 rounded-lg bg-white shadow-md text-purple-700 hover:bg-purple-100 font-semibold border border-purple-100 hover:border-purple-300 transition">Novel</button>
      <button
        class="px-4 py-2 rounded-lg bg-white shadow-md text-purple-700 hover:bg-purple-100 font-semibold border border-purple-100 hover:border-purple-300 transition">Komik</button>
      <button
        class="px-4 py-2 rounded-lg bg-white shadow-md text-purple-700 hover:bg-purple-100 font-semibold border border-purple-100 hover:border-purple-300 transition">Sosial</button>
    </div>
  </div>

  <div id="rekomendasi-cards-wrapper"
    class="grid grid-cols-2 gap-2 lg:flex lg:gap-6 flex-wrap justify-center py-1 px-5 scrollbar-hide"
    style="scrollbar-width: none;">

    @for ($i = 1; $i < 10; $i++)
      <div
        class="rekomendasi-card max-w-[250px] lg:min-w-[250px] relative flex flex-col rounded-2xl shadow-lg bg-gradient-to-br from-purple-50/80 to-white transition-transform hover:-translate-y-2 hover:shadow-2xl duration-200 border border-purple-100 group">

        <div class="overflow-hidden rounded-t-2xl h-[270px] flex items-stretch bg-purple-100">
          <img
            class="book w-full h-full object-cover object-top transition-transform duration-300 group-hover:scale-105 z-0"
            style="transition: filter 300ms, opacity 300ms;" src="">
        </div>

        <div class="absolute top-3 left-3 z-10">
          <span
            class="inline-block py-1 px-3 rounded-full bg-gradient-to-r from-[#638ECB] to-[#9b7aff] text-white text-[11px] shadow font-semibold tracking-wide">Kategori</span>
        </div>

        <div class="flex flex-col px-4 py-4 items-center text-center flex-1 justify-end">
          <h3 class="font-poppins font-bold text-lg text-purple-800 mb-1 truncate">Judul</h3>
          <p class="text-[13px] text-gray-500 italic mb-2 truncate">Pengarang</p>
          <button
            class="mt-auto px-3 py-1 rounded-full bg-gradient-to-r from-[#7b2ff2] to-[#f357a8] text-[13px] text-white shadow hover:from-[#6d20e3] hover:to-[#d43c7b] transition font-semibold tracking-wide">Lihat
            Detail</button>
        </div>
      </div>
    @endfor

  </div>

  <style>
    /* Pastikan transisi filter & opacity diutamakan agar class Tailwind tidak bentrok */
    .book {
      transition: filter 300ms, opacity 300ms;
    }
  </style>

  <script>
    // Menambah efek grayscale pada cover card lain saat salah satu card di-hover
    document.addEventListener('DOMContentLoaded', function() {
      const wrapper = document.getElementById('rekomendasi-cards-wrapper');
      if (!wrapper) return;
      const cards = wrapper.querySelectorAll('.rekomendasi-card');

      cards.forEach((card) => {
        card.addEventListener('mouseenter', function() {
          cards.forEach((otherCard) => {
            if (otherCard !== card) {
              const img = otherCard.querySelector('.book');
              if (img) {
                img.classList.add('grayscale', 'opacity-60');
                // Pastikan juga ada transition!
                img.style.transition = 'filter 300ms, opacity 300ms';
              }
            }
          });
        });
        card.addEventListener('mouseleave', function() {
          cards.forEach((otherCard) => {
            const img = otherCard.querySelector('.book');
            if (img) {
              img.classList.remove('grayscale', 'opacity-60');
              img.style.transition = 'filter 300ms, opacity 300ms';
            }
          });
        });
      });
    });
  </script>
</section>
