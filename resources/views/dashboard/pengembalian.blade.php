<x-admin.dashboard>
  <div class="relative flex min-w-1/2 flex-col gap-2 w-full">
    <div class="flex items-center gap-2 text-[#394867] mb-3">
      <i class="fa-solid fa-list"></i> Daftar Pengembalian
    </div>

    @if ($dataPengembalian->isEmpty())
      <div class="text-gray-400 py-4 text-center">Belum Ada Pengembalian</div>
    @endif
  </div>

  <div class="w-full">
    @foreach ($dataPengembalian as $index => $pengembalian)
      <div
        class="w-full bg-white flex justify-between items-center font-medium border border-black/10 rounded-3xl px-4 py-3 mb-2">
        <div class="flex items-center">
          <span
            class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-[#394867]/10 mr-3">
            <i class="fa-solid fa-book-bookmark text-[#394867]"></i>
          </span>
          <div class="font-semibold flex flex-col text-xm">
            <div>
              {{ $pengembalian->peminjaman->anggota->nama_lengkap ?? '-' }}
            </div>
            <div class="font-medium">{{ $pengembalian->tanggal_kembali ?? '-' }}</div>
          </div>
        </div>

        {{-- Buku --}}
        <div class="">
          <span class="font-semibold">Buku Dipinjam:</span>
          <ul class="list-disc pl-6">
            @if (
                !empty($pengembalian->peminjaman) &&
                    !empty($pengembalian->peminjaman->detail_peminjaman) &&
                    count($pengembalian->peminjaman->detail_peminjaman))
              @foreach ($pengembalian->peminjaman->detail_peminjaman as $detail)
                <li>
                  {{ $detail->buku->judul_buku ?? '-' }}
                </li>
              @endforeach
            @else
              <li>-</li>
            @endif
          </ul>
        </div>
      </div>
    @endforeach
  </div>
</x-admin.dashboard>
