<x-pengunjung.layout-pengunjung title="Homepage">
  {{-- Hero --}}
  <x-pengunjung.header-home></x-pengunjung.header-home>

  {{-- Konten Utama --}}
  <div class="space-y-40 py-20">
    {{-- <x-pengunjung.rekomendasi-buku :books="$books" /> --}}

    <x-pengunjung.box-layanan></x-pengunjung.box-layanan>

    <x-pengunjung.kelebihan-web></x-pengunjung.kelebihan-web>

    <x-pengunjung.jam-oprasioanl></x-pengunjung.jam-oprasioanl>

    <x-pengunjung.buku-terbaru></x-pengunjung.buku-terbaru>

    <x-pengunjung.faq></x-pengunjung.faq>

  </div>
</x-pengunjung.layout-pengunjung>
