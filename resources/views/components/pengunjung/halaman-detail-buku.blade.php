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
          <img src="" alt="">
        </div>
      </div>

      {{-- Judul, Pengarang, Penerbit --}}
      <div class="border-b border-black/10 py-6 flex flex-col justify-between w-1/3">
        <div class="space-y-5">
          <div class="font-semibold text-5xl">
            {{ $dataBuku->judul_buku }}
          </div>

          <div class="text-2xl font-semibold">
            @php
              $pengarangStr = '';
              if (
                  !empty($dataBuku->detail_pengarang) &&
                  is_iterable($dataBuku->detail_pengarang) &&
                  count($dataBuku->detail_pengarang)
              ) {
                  $names = [];
                  foreach ($dataBuku->detail_pengarang as $detail) {
                      if (
                          isset($detail->pengarang) &&
                          isset($detail->pengarang->nama_pengarang) &&
                          $detail->pengarang->nama_pengarang
                      ) {
                          $names[] = $detail->pengarang->nama_pengarang;
                      }
                  }
                  if (count($names)) {
                      $pengarangStr = implode(', ', $names);
                  }
              }
              if (
                  !$pengarangStr &&
                  !empty($dataBuku->pengarang) &&
                  is_string($dataBuku->pengarang)
              ) {
                  $pengarangStr = $dataBuku->pengarang;
              }
              if (!$pengarangStr && !empty($dataBuku->nama_pengarang)) {
                  $pengarangStr = $dataBuku->nama_pengarang;
              }
            @endphp
            @if ($pengarangStr)
              {{ $pengarangStr }}
            @else
              <span class="text-red-500 italic">--</span>
            @endif
          </div>

          <div class="text-xl">
            {{ $dataBuku->penerbit->nama_penerbit }}
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
              @php
                $pengarangStr = '';
                // Kenapa data pengarang bisa tidak ada?
                // - Relasi detail_pengarang kosong (belum diisikan di DB)
                // - Setiap elemen detail_pengarang tidak punya pengarang/nama_pengarang
                // - Field pengarang (string) di tabel buku kosong
                // - Field lama nama_pengarang juga kosong
                if (
                    !empty($dataBuku->detail_pengarang) &&
                    is_iterable($dataBuku->detail_pengarang) &&
                    count($dataBuku->detail_pengarang)
                ) {
                    $names = [];
                    foreach ($dataBuku->detail_pengarang as $detail) {
                        if (
                            isset($detail->pengarang) &&
                            isset($detail->pengarang->nama_pengarang) &&
                            $detail->pengarang->nama_pengarang
                        ) {
                            $names[] = $detail->pengarang->nama_pengarang;
                        }
                    }
                    if (count($names)) {
                        $pengarangStr = implode(', ', $names);
                    }
                }
                if (
                    !$pengarangStr &&
                    !empty($dataBuku->pengarang) &&
                    is_string($dataBuku->pengarang)
                ) {
                    $pengarangStr = $dataBuku->pengarang;
                }
                if (!$pengarangStr && !empty($dataBuku->nama_pengarang)) {
                    $pengarangStr = $dataBuku->nama_pengarang;
                }
              @endphp
              @if ($pengarangStr)
                {{ $pengarangStr }}
              @else
                <span class="text-red-500 italic">Tidak ada data pengarang</span>
              @endif
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-xl">Penerbit</div>
              <div>
                {{ $dataBuku->penerbit->nama_penerbit }}
              </div>
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-xl">Tahun Terbit</div>
              <div>
                {{ $dataBuku->tahun_terbit }}
              </div>
            </div>
          </div>

          <div class="space-y-5">
            <div class="space-y-5">
              <div class="font-semibold text-xl">Lokasi Rak</div>
              <div>
                {{ $dataBuku->rak->no_rak }}
              </div>
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-xl">Kategori</div>
              <div>
                {{ $dataBuku->kategori->nama_kategori }}
              </div>
            </div>

            <div class="space-y-5">
              <div class="font-semibold text-xl">Jumlah Salinan</div>
              <div>
                {{ $dataBuku->eksemplar }}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</x-pengunjung.layout-pengunjung>
