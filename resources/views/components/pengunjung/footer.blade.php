<footer
  class="relative bg-gradient-to-tr from-purple-800 via-purple-900 to-purple-950 py-16 px-6 sm:px-12 mt-32 text-white overflow-hidden z-10">
  <!-- Bulatan dekoratif background -->
  <div class="absolute left-0 -top-20 w-72 h-72 bg-purple-300 opacity-20 rounded-full blur-3xl z-0">
  </div>
  <div
    class="absolute right-0 bottom-0 w-80 h-80 bg-purple-500 opacity-15 rounded-full blur-3xl z-0">
  </div>
  <!-- Konten utama footer -->
  <div
    class="relative z-10 max-w-7xl mx-auto flex flex-col md:flex-row gap-12 md:gap-16 justify-between">
    <!-- Kolom 1: About -->
    <div class="flex-1 min-w-[250px]">
      <h3 class="text-white font-bold text-lg mb-2 tracking-wide">Tentang Kami</h3>
      <p class="text-purple-100/80 leading-relaxed text-sm mb-6 max-w-md">
        Perpustakaan Ustadz Sukirman berasal dari nama SUKIRMAN yang pertama sekali merintis lahan
        di Wonosari. Nama ini memudahkan masyarakat mengingat perpustakaan desa Wonosari.
        Perpustakaan Ustadz Sukirman diresmikan oleh Bupati Bengkalis pada tanggal 17 Desember 2019.
      </p>
      <div class="mt-6 flex items-center gap-3">
        <a href="https://wa.me/6282288005937" target="_blank"
          class="hover:scale-110 transition-transform text-green-400">
          <i class="fa-brands fa-whatsapp text-2xl"></i>
        </a>
        <a href="#" class="hover:scale-110 transition-transform text-sky-400">
          <i class="fa-solid fa-envelope text-2xl"></i>
        </a>
        <a href="#" class="hover:scale-110 transition-transform text-blue-300">
          <i class="fa-brands fa-facebook text-2xl"></i>
        </a>
      </div>
    </div>
    <!-- Kolom 2: Maps -->
    <div class="flex-1 min-w-[230px]">
      <h3 class="font-bold text-white text-lg mb-2 tracking-wide">Lokasi</h3>
      <div class="rounded-xl overflow-hidden shadow-lg ring-2 ring-purple-800/20 max-w-xs">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d380.2894586105551!2d102.12372729131343!3d1.4804873043814126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1763688132188!5m2!1sid!2sid"
          width="260" height="180" style="border:0" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="mt-2 text-xs text-purple-200">Wonosari, Bengkalis, Riau</div>
    </div>
    <!-- Kolom 3: Jam & Kontak -->
    <div class="flex-1 min-w-[240px] flex flex-col gap-7">
      <div>
        <h3 class="font-bold text-white text-lg mb-2 tracking-wide">Jam Operasional</h3>
        <div class="text-sm text-purple-100/90">
          <x-pengunjung::jam-oprasional />
        </div>
      </div>
      <div>
        <h3 class="font-bold text-white text-lg mb-2 tracking-wide">Kontak</h3>
        <ul class="text-purple-100/90 text-sm space-y-3">
          <li>
            <span class="block font-semibold">KURNIAWATI, A.Md</span>
            <span class="block text-xs text-purple-300">KETUA PERPUSTAKAAN</span>
            <span class="flex items-center gap-2 mt-1">
              <i class="fa-brands fa-whatsapp text-lg text-green-400"></i>
              <a href="https://wa.me/6282288005937" class="hover:underline">0822-8800-5937</a>
            </span>
          </li>
          <li>
            <span class="block font-semibold">SAKINAH</span>
            <span class="block text-xs text-purple-300">LAYANAN TEKNIS</span>
            <span class="flex items-center gap-2 mt-1">
              <i class="fa-brands fa-whatsapp text-lg text-green-400"></i>
              <a href="https://wa.me/6282285612561" class="hover:underline">0822-8561-2561</a>
            </span>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Footer Bawah -->
  <div
    class="mt-12 border-t border-purple-900/60 pt-6 text-xs text-center text-purple-200 tracking-wider z-10 relative">
    &copy; {{ date('Y') }} Perpustakaan Desa Wonosari. All rights reserved.
  </div>
</footer>
