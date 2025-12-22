<div>
  {{-- title --}}
  <div class="font-semibold text-2xl">Detail Peminjaman</div>

  {{-- konten --}}
  <div class="text-left mt-6">
    <div class="mb-3">
      <span class="font-semibold">Nama Peminjam:</span>
      <span id="modal-nama-peminjam">
        {{ $detailPeminjaman->anggota->nama_lengkap ?? '-' }}
      </span>
    </div>
    <div class="mb-3">
      <span class="font-semibold">Tanggal Pinjam:</span>
      <span id="modal-tanggal-pinjam">
        {{ $detailPeminjaman->tanggal_pinjam ?? '-' }}
      </span>
    </div>
    <div class="mb-3">
      <span class="font-semibold">Tanggal Kembali:</span>
      <span id="modal-tanggal-kembali">
        {{ $detailPeminjaman->created_at->format('Y-m-d') ?? '-' }}
      </span>
    </div>

    <div class="mb-3">
      <span class="font-semibold">Denda:</span>
      <span id="modal-denda">
        @php
          $today = \Carbon\Carbon::now()->format('Y-m-d');

          $jatuh_tempo = $detailPeminjaman->created_at->addDays(7);
          $denda = 0;
          if (\Carbon\Carbon::now()->greaterThan($jatuh_tempo)) {
              $hari_terlambat = \Carbon\Carbon::now()->diffInDays($jatuh_tempo);
              $denda = $hari_terlambat * 1000;
          }

          echo 'Rp. ' . $denda;
        @endphp
      </span>
    </div>
    <div class="mb-3">
      <span class="font-semibold">Buku Dipinjam:</span>
      <ul id="modal-buku-dipinjam" class="list-disc pl-6">
        @if (!empty($detailPeminjaman->detail_peminjaman) && count($detailPeminjaman->detail_peminjaman))
          @foreach ($detailPeminjaman->detail_peminjaman as $detail)
            <li>
              {{ $detail->judul_buku ?? (isset($detail->buku) ? $detail->buku->judul_buku : '-') }}
            </li>
          @endforeach
        @else
          <li>-</li>
        @endif
      </ul>
    </div>
    <div class="mb-3">
      <span class="font-semibold">Status:</span>
      <span id="modal-status">
        {{ ucfirst($detailPeminjaman->status ?? '-') }}
      </span>
    </div>
    <div class="mb-3">
      <span class="font-semibold">Admin:</span>
      <span id="modal-admin">
        {{ $detailPeminjaman->admin_nama ?? '-' }}
      </span>
    </div>
  </div>
</div>
