<x-pengunjung.layout-pengunjung title="halaman detail buku">
  <div class="container mx-auto mb-20 text-[clamp(13px,2.5vw,18px)] px-5">
    {{-- Cover dan judul, pengarang, penerbit --}}
    <div class="w-full h-100 flex justify-center gap-20 100 translate-y-25 relative">

      {{-- Tombol Kembali --}}
      <div class="absolute left-0 -top-15 -translate-y-1/2 hidden md:inline-block">
        <a href="/koleksi-buku"
          class="flex items-center text-[#394867] hover:text-[#638ECB] transition-colors group">
          <i
            class="fa-solid fa-angle-left mr-2 text-[clamp(20px,4vw,32px)] group-hover:text-[#638ECB]"></i>
          <span
            class="font-semibold group-hover:underline text-[clamp(15px,2.5vw,20px)]">Kembali</span>
        </a>
      </div>

      {{-- Cover --}}
      <div class="">
        <div class="bg-pink-100 w-75 h-full shadow-[-15px_20px_20px_0px_rgb(0,0,0,0.3)]">
          <img src="{{ asset('storage/' . $dataBuku->cover) }}" alt=""
            class="object-cover w-full h-full">
        </div>
      </div>

      {{-- Judul, Pengarang, Penerbit --}}
      <div class="border-b border-black/10 md:flex flex-col justify-between w-1/3 hidden relative">
        <div class="space-y-5">
          <div class="font-semibold text-[clamp(22px,5vw,48px)]">
            {{ $dataBuku->judul_buku }}
          </div>

          <div class="text-[clamp(16px,3vw,28px)] font-semibold">
            {{ $dataBuku->pengarang }}
          </div>

          <div class="text-[clamp(14px,2vw,20px)]">
            {{ $dataBuku->penerbit->nama_penerbit ?? ' - ' }}
          </div>
        </div>

        <div
          class="rounded-full px-5 py-2 font-semibold text-[clamp(15px,2.5vw,20px)] text-green-500 shadow-inner absolute bottom-5 ">
          Tersedia
        </div>
      </div>
    </div>

    {{-- Detail --}}
    <div
      class="container bg-white shadow px-4 md:px-35 pt-40 md:pt-45 pb-20 flex gap-10 md:gap-35 rounded-2xl flex-col lg:flex-row">

      <div class="font-semibold text-[clamp(22px,5vw,48px)] md:hidden">
        {{ $dataBuku->judul_buku }}
      </div>

      <div
        class="rounded-full px-5 py-2 font-semibold text-[clamp(15px,2.5vw,20px)] text-green-500 shadow-inner w-fit md:hidden">
        Tersedia
      </div>

      <div class="w-full md:space-y-5">
        <div class="font-semibold text-[clamp(16px,2vw,24px)]">Sinopsis</div>
        <div>
          {{ $dataBuku->sinopsis }}
        </div>
      </div>

      <div class="w-full space-y-7">
        <div class="flex justify-between">
          <div class="space-y-5">
            <div class="font-semibold text-[clamp(16px,2vw,22px)]">Pengarang</div>
            <div>
              {{ $dataBuku->pengarang ? $dataBuku->pengarang : '-' }}
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-[clamp(16px,2vw,22px)]">Penerbit</div>
              <div>
                {{ $dataBuku->penerbit && $dataBuku->penerbit->nama_penerbit ? $dataBuku->penerbit->nama_penerbit : '-' }}
              </div>
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-[clamp(16px,2vw,22px)]">Tahun Terbit</div>
              <div>
                {{ $dataBuku->tahun_terbit ? $dataBuku->tahun_terbit : '-' }}
              </div>
            </div>
          </div>

          <div class="space-y-5">
            <div class="space-y-5">
              <div class="font-semibold text-[clamp(16px,2vw,22px)]">Lokasi Rak</div>
              <div>
                {{ $dataBuku->rak && $dataBuku->rak->no_rak ? $dataBuku->rak->no_rak : '-' }}
              </div>
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-[clamp(16px,2vw,22px)]">Kategori</div>
              <div>
                {{ $dataBuku->kategori && $dataBuku->kategori->nama_kategori ? $dataBuku->kategori->nama_kategori : '-' }}
              </div>
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-[clamp(16px,2vw,22px)]">Jumlah Salinan</div>
              <div>
                {{ $dataBuku->eksemplar ? $dataBuku->eksemplar : '-' }}
              </div>
            </div>
          </div>
        </div>

        {{-- Tombol Kembali --}}
        <div class="md:hidden">
          <a href="/koleksi-buku"
            class="flex items-center text-[#394867] hover:text-[#638ECB] transition-colors group">
            <i
              class="fa-solid fa-angle-left mr-2 text-[clamp(20px,4vw,32px)] group-hover:text-[#638ECB]"></i>
            <span
              class="font-semibold group-hover:underline text-[clamp(15px,2.5vw,20px)]">Kembali</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</x-pengunjung.layout-pengunjung>
