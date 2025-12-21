<form id="formEditBuku" action="{{ route('admin.buku.update', $buku->id) }}" method="POST"
  enctype="multipart/form-data" class="space-y-6 px-2 py-2">

  @csrf
  @method('PUT')

  <h3 class="text-xl font-bold text-center mb-3 text-[#394867]">Edit Data Buku</h3>

  <div class="mb-4 rounded bg-blue-50 border border-blue-200 px-3 py-2 text-sm text-blue-800">
    Formulir ini digunakan untuk mengedit data buku pada perpustakaan. Silakan lengkapi data sesuai
    dengan perubahan yang diinginkan, lalu klik <b>"Simpan Perubahan"</b> di bawah untuk memperbarui
    data buku. Semua kolom dengan tanda wajib harus diisi.
  </div>

  <!-- Judul Buku -->
  <div>
    <label for="judul" class="block text-sm font-semibold mb-1 text-[#394867]">Judul Buku</label>
    <input type="text" id="judul" name="judul" class="w-full border px-3 py-2 rounded"
      value="{{ old('judul', $buku->judul_buku ?? ($buku->judul ?? '')) }}" required>
  </div>

  <!-- Pengarang -->
  <div>
    <label for="pengarang" class="block text-sm font-semibold mb-1 text-[#394867]">Pengarang</label>
    <input type="text" id="pengarang" name="pengarang" class="w-full border px-3 py-2 rounded"
      value="{{ old(
          'pengarang',
          isset($buku->detail_pengarang) && count($buku->detail_pengarang)
              ? implode(
                  ', ',
                  $buku->detail_pengarang->map(function ($dp) {
                          return isset($dp->pengarang) ? $dp->pengarang->nama_pengarang : null;
                      })->filter()->all(),
              )
              : '',
      ) }}"
      required>
    <p class="text-xs text-gray-400 mt-1">Pisahkan dengan koma jika lebih dari satu nama pengarang.
    </p>
  </div>

  <!-- Penerbit -->
  <div>
    <label for="penerbit" class="block text-sm font-semibold mb-1 text-[#394867]">Penerbit</label>
    <input type="text" id="penerbit" name="penerbit" class="w-full border px-3 py-2 rounded"
      value="{{ old('penerbit', $buku->penerbit->nama_penerbit ?? ($buku->penerbit ?? '')) }}"
      required>
  </div>

  <!-- Tahun Terbit -->
  <div>
    <label for="tahun_terbit" class="block text-sm font-semibold mb-1 text-[#394867]">Tahun
      Terbit</label>
    <input type="number" id="tahun_terbit" name="tahun_terbit"
      class="w-full border px-3 py-2 rounded"
      value="{{ old('tahun_terbit', $buku->tahun_terbit ?? '') }}" min="1950"
      max="{{ date('Y') }}" required>
  </div>

  <!-- Eksemplar -->
  <div>
    <label for="eksemplar" class="block text-sm font-semibold mb-1 text-[#394867]">Jumlah
      Eksemplar</label>
    <input type="number" id="eksemplar" name="eksemplar" class="w-full border px-3 py-2 rounded"
      value="{{ old('eksemplar', $buku->eksemplar ?? '') }}" min="1" required>
  </div>

  <!-- Rak -->
  <div>
    <label for="rak" class="block text-sm font-semibold mb-1 text-[#394867]">Lokasi Rak</label>
    <input type="text" id="rak" name="rak" class="w-full border px-3 py-2 rounded"
      value="{{ old('rak', $buku->rak->no_rak ?? ($buku->rak ?? '')) }}">
  </div>

  <!-- Sumber -->
  <div>
    <label for="sumber" class="block text-sm font-semibold mb-1 text-[#394867]">Sumber
      Buku</label>
    <input type="text" id="sumber" name="sumber" class="w-full border px-3 py-2 rounded"
      value="{{ old('sumber', $buku->sumber->nama_sumber ?? ($buku->sumber ?? '')) }}" required>
  </div>

  <!-- Kategori -->
  <div>
    <label for="kategori" class="block text-sm font-semibold mb-1 text-[#394867]">Kategori</label>
    <input type="text" id="kategori" name="kategori" class="w-full border px-3 py-2 rounded"
      value="{{ old('kategori', $buku->kategori->nama_kategori ?? ($buku->kategori ?? '')) }}"
      required>
  </div>

  <!-- Tanggal Terima -->
  <div>
    <label for="tanggal_terima" class="block text-sm font-semibold mb-1 text-[#394867]">Tanggal
      Terima</label>
    <input type="date" id="tanggal_terima" name="tanggal_terima"
      class="w-full border px-3 py-2 rounded"
      value="{{ old('tanggal_terima', $buku->tanggal_terima ?? '') }}">
  </div>

  <!-- Sinopsis -->
  <div>
    <label for="sinopsis" class="block text-sm font-semibold mb-1 text-[#394867]">Sinopsis</label>
    <textarea id="sinopsis" name="sinopsis" class="w-full border px-3 py-2 rounded" rows="3">{{ old('sinopsis', $buku->sinopsis ?? '') }}</textarea>
  </div>

  <!-- Cover Buku -->
  <div>
    <label for="cover" class="block text-sm font-semibold mb-1 text-[#394867]">Cover Buku</label>
    @if (!empty($buku->cover))
      <div class="mb-2">
        <img src="{{ asset('storage/buku/' . $buku->cover) }}" alt="cover buku"
          class="w-28 rounded shadow border mb-1">
        <p class="text-xs">File saat ini: <span class="italic">{{ $buku->cover }}</span></p>
      </div>
    @endif
    <input type="file" id="cover" name="cover"
      class="w-full border px-3 py-2 rounded text-[#394867]" accept="image/*">
    <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengubah cover.</p>
  </div>

  <div class="flex gap-2 justify-end mt-4">
    <button type="submit"
      class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold transition">
      Simpan Perubahan
    </button>
  </div>
</form>
