<div class="px-0 py-0">
  <div class="flex flex-col md:flex-row gap-6 items-start">
    <div class="w-full md:w-1/3 flex flex-col items-center mb-4 md:mb-0">
      @if ($buku->cover)
        <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku"
          class="object-cover rounded-xl border shadow w-full max-w-[200px] max-h-[290px] mb-2 bg-white"
          style="aspect-ratio: 2/3;" />
      @else
        <div
          class="w-full max-w-[200px] h-[290px] flex items-center justify-center rounded-xl border bg-gray-100 mb-2">
          <span class="text-gray-400 text-sm">Tidak ada cover</span>
        </div>
      @endif
      {{-- Optional, tampilkan nama file cover --}}
      @if ($buku->cover)
        <div class="text-xs text-center mt-1 text-gray-500 font-mono break-all">
          {{ $buku->cover }}
        </div>
      @endif
    </div>
    <div class="w-full md:w-2/3">
      <table class="w-full text-sm table-auto">
        <tbody class="divide-y divide-[#E5EAF3]">
          <tr>
            <td class="font-semibold py-2 w-40 text-[#394867]">Judul Buku</td>
            <td class="py-2 pl-2 text-[#212A3E]">
              @if (!empty($buku->judul_buku))
                {{ $buku->judul_buku }}
              @elseif (!empty($buku->judul))
                {{ $buku->judul }}
              @else
                <span class="text-red-500 italic">Tidak ada data judul!</span>
              @endif
            </td>
          </tr>
          <tr>
            <td class="font-semibold py-2 text-[#394867]">Kategori</td>
            <td class="py-2 pl-2">{{ $buku->kategori?->nama_kategori ?? ($buku->kategori ?? '-') }}
            </td>
          </tr>
          <tr>
            <td class="font-semibold py-2 text-[#394867]">Pengarang</td>
            <td class="py-2 pl-2">
              @if (!empty($buku->pengarang))
                {{ $buku->pengarang }}
              @else
                <span class="text-red-500 italic">Tidak ada data pengarang!</span>
              @endif
            </td>
          </tr>
          <tr>
            <td class="font-semibold py-2 text-[#394867]">Penerbit</td>
            <td class="py-2 pl-2">{{ $buku->penerbit?->nama_penerbit ?? ($buku->penerbit ?? '-') }}
            </td>
          </tr>
          <tr>
            <td class="font-semibold py-2 text-[#394867]">Tahun Terbit</td>
            <td class="py-2 pl-2">
              {{ $buku->tahun_terbit ?? '-' }}
            </td>
          </tr>
          <tr>
            <td class="font-semibold py-2 text-[#394867]">Jumlah Eksemplar</td>
            <td class="py-2 pl-2">{{ $buku->eksemplar ?? '-' }}</td>
          </tr>
          <tr>
            <td class="font-semibold py-2 text-[#394867]">No Rak</td>
            <td class="py-2 pl-2">{{ $buku->rak?->no_rak ?? ($buku->rak ?? '-') }}</td>
          </tr>
          <tr>
            <td class="font-semibold py-2 text-[#394867]">Sumber</td>
            <td class="py-2 pl-2">{{ $buku->sumber?->nama_sumber ?? ($buku->sumber ?? '-') }}</td>
          </tr>
          <tr>
            <td class="font-semibold py-2 text-[#394867]">Tanggal Diterima</td>
            <td class="py-2 pl-2">
              @if ($buku->tanggal_terima)
                {{ \Carbon\Carbon::parse($buku->tanggal_terima)->format('d-m-Y') }}
              @else
                -
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <hr class="my-5 border-[#E5EAF3]">
  <div>
    <span class="font-semibold text-[#394867]">Sinopsis:</span>
    <div
      class="mt-2 pl-1 pr-2 text-sm text-[#212A3E] bg-white rounded shadow-sm border border-[#E5EAF3] py-3 px-4"
      style="white-space: pre-line; min-height:48px">
      {{ !empty($buku->sinopsis) ? $buku->sinopsis : '-' }}
    </div>
  </div>
</div>
