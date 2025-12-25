<x-pengunjung.layout-pengunjung title="halaman detail buku">
  <div class="container mx-auto mb-20">
    {{-- Cover dan judul, pengarang, penerbit --}}
    <div class="w-full h-100 flex justify-center gap-20 100 translate-y-25 relative">

      <div class="absolute left-0 top-1/2 -translate-y-1/2">
        <a href="{{ url()->previous() }}"
          class="flex items-center text-[#394867] hover:text-[#638ECB] transition-colors group">
          <i class="fa-solid fa-angle-left mr-2 text-2xl group-hover:text-[#638ECB]"></i>
          <span class="font-semibold group-hover:underline">Kembali</span>
        </a>
      </div>
      {{-- Cover --}}
      <div class="">
        <div class="bg-pink-100 w-75 h-full shadow-[-20px_30px_20px_0px_rgb(0,0,0,0.1)]">
          <img src="{{ asset('storage/' . $dataBuku->cover) }}" alt="">
        </div>
      </div>

      {{-- Judul, Pengarang, Penerbit --}}
      <div class="border-b border-black/10 py-6 flex flex-col justify-between w-1/3">
        <div class="space-y-5">
          <div class="font-semibold text-5xl">
            {{ $dataBuku->judul_buku }}
          </div>

          <div class="text-2xl font-semibold">
            {{ $dataBuku->pengarang }}
          </div>

          <div class="text-xl">
            {{ $dataBuku->penerbit->nama_penerbit ?? ' - ' }}
          </div>
        </div>

        <div class="rounded-full px-5 py-2 font-semibold text-xl text-green-500 shadow-inner">
          Tersedia
        </div>
      </div>
    </div>

    {{-- Detail --}}
    <div class="container bg-white shadow px-35 pt-45 pb-20 flex gap-35 rounded-2xl">
      <div class="w-full space-y-5">
        <div class="font-semibold text-xl">Description</div>
        <div>
          {{ $dataBuku->sinopsis }}
        </div>
      </div>

      <div class="w-full space-y-7">
        <div class="flex justify-between">
          <div class="space-y-5">
            <div class="font-semibold text-xl">Pengarang</div>
            <div>
              {{ $dataBuku->pengarang ? $dataBuku->pengarang : '-' }}
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-xl">Penerbit</div>
              <div>
                {{ $dataBuku->penerbit && $dataBuku->penerbit->nama_penerbit ? $dataBuku->penerbit->nama_penerbit : '-' }}
              </div>
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-xl">Tahun Terbit</div>
              <div>
                {{ $dataBuku->tahun_terbit ? $dataBuku->tahun_terbit : '-' }}
              </div>
            </div>
          </div>

          <div class="space-y-5">
            <div class="space-y-5">
              <div class="font-semibold text-xl">Lokasi Rak</div>
              <div>
                {{ $dataBuku->rak && $dataBuku->rak->no_rak ? $dataBuku->rak->no_rak : '-' }}
              </div>
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-xl">Kategori</div>
              <div>
                {{ $dataBuku->kategori && $dataBuku->kategori->nama_kategori ? $dataBuku->kategori->nama_kategori : '-' }}
              </div>
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-xl">Jumlah Salinan</div>
              <div>
                {{ $dataBuku->eksemplar ? $dataBuku->eksemplar : '-' }}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</x-pengunjung.layout-pengunjung>
