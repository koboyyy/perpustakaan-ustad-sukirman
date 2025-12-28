<div class="container mx-auto">
  <x-pengunjung.sub-title title="FAQ"
    subtitle="Dapatkan Jawaban Dari Pertanyaan Yang Sering Di Ajukan Tentang Perpustakaan Usatadz Sukirman"></x-pengunjung.sub-title>

  <div class="space-y-4 px-4">
    <x-pengunjung.jawaban-pertannya-faq pertanyaan="Berapa lama batas waktu peminjaman?"
      jawaban="Batas waktu peminjaman adalah 7 hari (sesuai kebijakan perpustakaan)." />

    <x-pengunjung.jawaban-pertannya-faq
      pertanyaan="Apakah ada denda jika terlambat mengembalikan buku?"
      jawaban="Tidak, saat ini tidak ada denda untuk keterlambatan pengembalian buku." />

    <x-pengunjung.jawaban-pertannya-faq
      pertanyaan="Siapa yang bisa dihubungi jika mengalami kendala?"
      jawaban="Silakan hubungi admin atau petugas perpustakaan untuk bantuan lebih lanjut." />

    <x-pengunjung.jawaban-pertannya-faq pertanyaan="Apakah saya bisa memesan buku terlebih dahulu?"
      jawaban="Saat ini layanan pemesanan buku belum tersedia. Peminjaman dilakukan secara langsung di perpustakaan." />

    <x-pengunjung.jawaban-pertannya-faq pertanyaan="Apa manfaat menggunakan website perpustakaan?"
      jawaban="Pengguna dapat mencari buku lebih cepat, melihat status pinjaman, dan mendapatkan informasi perpustakaan secara mudah." />

    <x-pengunjung.jawaban-pertannya-faq
      pertanyaan="Apakah ada batas jumlah buku yang bisa dipinjam?"
      jawaban="Ya, pengguna dibatasi maksimal 2 buku dalam satu periode peminjaman." />

    <x-pengunjung.jawaban-pertannya-faq pertanyaan="Apakah website ini gratis digunakan?"
      jawaban="Ya, website perpustakaan gratis untuk seluruh pengguna." />

    <x-pengunjung.jawaban-pertannya-faq pertanyaan="Bagaimana cara mengunjungi perpustakaan?"
      jawaban="Pengunjung dapat langsung mengunjungi Perpustakaan Ustadz Sukirman Desa Wonosari pada alamat Jl. HR. Soebrantas, Wonosari, Kec. Bengkalis, Kabupaten Bengkalis, Riau 28711 atau mengunjungi Website Perpustakaan Ustadz Sukirman pada alamat ...." />
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const card = document.querySelectorAll('.card');

    card.forEach(element => {
      element.addEventListener('click', function(e) {
        const jawab = element.querySelector('.jawaban');

        if (jawab) {
          // Toggle tampil/sembunyikan jawaban
          jawab.classList.toggle('hidden');
          // Temukan tombol, lalu toggle SVG + atau -
          const btn = element.querySelector('.btn-show');
          if (btn) {
            // Periksa apakah jawaban sekarang tersembunyi
            if (jawab.classList.contains('hidden')) {
              // Icon +
              btn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6 text-[rgb(255,109,31)] transition-transform duration-300" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke="currentColor" stroke-width="2" d="M12 6v12m6-6H6" />
                </svg>
              `;
            } else {
              // Icon -
              btn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6 text-[rgb(255,109,31)] transition-transform duration-300" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke="currentColor" stroke-width="2" d="M6 12h12" />
                </svg>
              `;
            }
          }
        }
      });
    });
  });
</script>
