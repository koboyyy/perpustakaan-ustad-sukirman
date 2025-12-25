<form action="{{ route('admin.buku.update', $buku->id) }}" method="POST"
  enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <h3 class="text-lg font-semibold mb-4">Edit Buku</h3>

  <div class="mb-3">
    <label class="block mb-1 font-medium">Judul</label>
    <input type="text" name="judul_buku" value="{{ old('judul_buku', $buku->judul_buku ?? '') }}"
      required
      class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:border-[#394867] focus:ring-2 focus:ring-[#394867] transition">

    @error('judul_buku')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3" id="field-pengarang">
    <label class="block mb-1 font-medium">Pengarang</label>
    <input type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang ?? '') }}"
      required
      class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:border-[#394867] focus:ring-2 focus:ring-[#394867] transition">
    @error('pengarang')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 font-medium">Penerbit</label>
    <select name="penerbit" id="penerbit"
      class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:border-[#394867] focus:ring-2 focus:ring-[#394867] transition">
      <option value="#" disabled>--Pilih Penerbit--</option>

      @foreach ($dataPenerbit as $penerbit)
        <option value="{{ $penerbit->id }}">
          {{ $penerbit->nama_penerbit }}</option>
      @endforeach
    </select>
    @error('penerbit')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 font-medium">Tahun Terbit</label>
    <input type="number" name="tahun_terbit"
      value="{{ old('tahun_terbit', $buku->tahun_terbit ?? '') }}" min="1950"
      max="{{ date('Y') }}" required
      class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:border-[#394867] focus:ring-2 focus:ring-[#394867] transition">
    @error('tahun_terbit')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 font-medium">Eksemplar</label>
    <input type="number" name="eksemplar" value="{{ old('eksemplar', $buku->eksemplar ?? '') }}"
      min="1" required
      class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:border-[#394867] focus:ring-2 focus:ring-[#394867] transition">
    @error('eksemplar')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 font-medium">Rak</label>
    <select name="rak" id="rak"
      class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:border-[#394867] focus:ring-2 focus:ring-[#394867] transition">
      <option value="#" disabled>--Pilih Lokasi Rak--</option>

      @foreach ($dataRak as $rak)
        <option value="{{ $rak->id }}">
          {{ $rak->no_rak }}</option>
      @endforeach
    </select>
    @error('rak')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 font-medium">Sumber</label>
    <select name="sumber" id="sumber"
      class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:border-[#394867] focus:ring-2 focus:ring-[#394867] transition">
      <option value="#" disabled>--Pilih Sumber--</option>

      @foreach ($dataSumber as $sumber)
        <option value="{{ $sumber->id }}">
          {{ $sumber->nama_sumber }}</option>
      @endforeach
    </select>
    @error('sumber')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 font-medium">Kategori</label>
    <select name="kategori" id="kategori"
      class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:border-[#394867] focus:ring-2 focus:ring-[#394867] transition">
      <option value="#" disabled>--Pilih Kategori--</option>

      @foreach ($dataKategori as $kategori)
        <option value="{{ $kategori->id }}">
          {{ $kategori->nama_kategori }}</option>
      @endforeach
    </select>
    @error('kategori')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 font-medium">Tanggal Terima</label>
    <input type="date" name="tanggal_terima"
      value="{{ old('tanggal_terima', $buku->tanggal_terima ?? '') }}"
      class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:border-[#394867] focus:ring-2 focus:ring-[#394867] transition">
    @error('tanggal_terima')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 font-medium">Sinopsis</label>
    <textarea name="sinopsis"
      class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:border-[#394867] focus:ring-2 focus:ring-[#394867] transition">{{ old('sinopsis', $buku->sinopsis ?? '') }}</textarea>
    @error('sinopsis')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 font-medium">Cover Buku</label>
    @if (!empty($buku->cover))
      <img src="{{ asset('storage/buku/' . $buku->cover) }}" alt="cover" width="60"
        class="mb-2">
    @endif
    <input type="file" name="cover" accept="image/*"
      class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:border-[#394867] focus:ring-2 focus:ring-[#394867] transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-[#F1F6F9] file:text-[#394867]">
    @error('cover')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
  </div>

  <button type="submit"
    class="mt-4 border border-[#394867] bg-[#394867] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#212A3E] transition duration-150">Simpan</button>
</form>
