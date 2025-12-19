{{-- Rekomendasi Buku --}}
@php
  // Daftar kategori
  $categories = [
      ['label' => 'Rekomendasi', 'value' => 'rekomendasi'],
      ['label' => 'Sains', 'value' => 'sains'],
      ['label' => 'Novel', 'value' => 'novel'],
      ['label' => 'Komik', 'value' => 'komik'],
      ['label' => 'Sosial', 'value' => 'sosial'],
  ];

  // Ambil kategori aktif dari query string (atau default ke 'rekomendasi')
  $activeCategory = request()->query('kategori', 'rekomendasi');

  $activeBooks = collect($books)->when(
      $activeCategory && $activeCategory !== 'semua',
      fn($query) => $query->filter(
          fn($b) => isset($b['kategori']) &&
              strtolower($b['kategori']) === strtolower($activeCategory),
      ),
  );
@endphp

<div class="container mx-auto">
  <x-pengunjung::sub-title title="Rekomendasi Buku" subtitle="Temukan Bacaan Favorit Anda" />

  {{-- Kategori Selector --}}
  <div class="flex justify-center items-center mb-8">
    <div class="flex flex-wrap justify-center gap-3 h-fit font-medium">
      @foreach ($categories as $category)
        <a href="?kategori={{ $category['value'] }}"
          class="
            px-4 py-2 rounded-lg 
            {{ $activeCategory === $category['value']
                ? 'bg-gradient-to-r from-[#394867] via-[#638ECB] to-[#212A3E] text-white ring-2 ring-[#9BA4B5]/40 hover:ring-4 focus:ring-4 shadow-md hover:scale-105'
                : 'bg-white text-[#394867] border border-[#9BA4B5]/30 hover:border-[#9BA4B5]/60 shadow-md hover:bg-[#F1F6F9] font-semibold' }}
            transition-transform tracking-wide focus:outline-none transition
          ">
          {{ $category['label'] }}
        </a>
      @endforeach
    </div>
  </div>

  {{-- Card Buku --}}
  <div id="rekomendasi-cards-wrapper"
    class="grid grid-cols-2 gap-0 lg:flex lg:gap-2 justify-center py-1 px-5 lg:px-0 scrollbar-hide"
    style="scrollbar-width: none;">

    @if (count($activeBooks) > 0)
      @foreach ($activeBooks as $book)
        <div
          class="rekomendasi-card max-w-[200px] lg:min-w-[200px] max-h-[370px] relative flex flex-col rounded-2xl shadow-lg bg-gradient-to-br from-[#EEF3F7]/90 to-white transition-transform hover:-translate-y-2 hover:shadow-2xl duration-200 border border-[#9BA4B5]/30 group">

          <div class="overflow-hidden rounded-t-2xl h-[270px] flex items-stretch bg-[#D6E1F0]">
            <img
              class="buku w-full h-full object-cover object-top transition-transform duration-300 group-hover:scale-105 z-0"
              style="transition: filter 300ms, opacity 300ms;"
              src="{{ $book['img'] ?: 'https://placehold.co/200x270' }}">
          </div>

          <div class="absolute top-3 left-3 z-10">
            <span
              class="inline-block py-1 px-3 rounded-full bg-gradient-to-r from-[#394867] to-[#638ECB] text-white text-[11px] shadow font-semibold tracking-wide">
              {{ $book['kategori'] }}
            </span>
          </div>

          <div class="flex flex-col px-4 py-4 items-center text-center flex-1 justify-end">
            <h3 class="font-poppins font-bold text-lg text-[#394867] mb-1 truncate">
              {{ $book['judul'] }}</h3>
            <p class="text-[13px] text-[#9BA4B5] italic mb-2 truncate">{{ $book['pengarang'] }}</p>
            <button
              class="mt-auto px-3 py-1 rounded-full bg-gradient-to-r from-[#394867] to-[#638ECB] text-[13px] text-white shadow hover:from-[#212A3E] hover:to-[#394867] transition font-semibold tracking-wide">
              Lihat Detail
            </button>
          </div>
        </div>
      @endforeach
    @else
      <div class="col-span-2 w-full text-center py-10 text-[#9BA4B5]">Tidak ada buku di kategori
        ini.</div>
    @endif
  </div>
</div>
