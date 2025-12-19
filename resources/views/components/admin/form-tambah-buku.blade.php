<div class="w-full max-w-3xl mx-auto bg-white rounded-2xl overflow-hidden shadow-lg relative">
  {{-- Title --}}
  <div
    class="bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex items-center px-6 py-4">
    <div class="text-lg font-semibold">Form Tambah Buku</div>
    <button onclick="showForm()"
      class="absolute top-[16px] right-5 text-gray-500 hover:text-[#212A3E] text-2xl focus:outline-none z-50"
      type="button" aria-label="Tutup">
      <i class="fa-solid fa-xmark"></i>
    </button>
  </div>
  <form action="{{ route('tambahBuku') }}" method="post" enctype="multipart/form-data"
    class="w-full px-6 py-6">
    @csrf
    <div class="flex flex-col md:flex-row gap-8">
      {{-- Cover Preview & Upload --}}
      <div class="flex flex-col items-center md:w-1/3 w-full mb-6 md:mb-0">
        <div
          class="w-40 h-56 bg-gray-100 rounded-lg mb-2 flex items-center justify-center overflow-hidden border border-[#9BA4B5]">
          <img id="coverPreview"
            src="{{ old('cover') ? asset('storage/' . old('cover')) : 'https://fakeimg.pl/200x280/?text=No+Cover' }}"
            alt="Preview Cover" class="object-cover w-full h-full"
            onerror="this.onerror=null; this.src='https://fakeimg.pl/200x280/?text=No+Cover';" />
        </div>
        <div class="flex flex-col gap-1 w-full">
          <label for="cover"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Upload
            Cover:</label>
          <input type="file" id="cover" name="cover" accept="image/*"
            class="w-full border border-[#9BA4B5] rounded px-2 py-1 focus:border-[#394867] focus:ring-[#394867] bg-white @error('cover') border-red-500 @enderror"
            required onchange="previewImage(event)" />
          <span class="text-xs text-[#394867] mt-1">Format gambar: jpg, jpeg, atau png. Maks
            2MB.</span>
          @error('cover')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
      </div>
      {{-- Form Fields --}}
      <div class="flex-1 space-y-4">
        {{-- Judul Buku --}}
        <div class="flex flex-col gap-1">
          <label for="judul"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Judul
            Buku:</label>
          <input type="text" id="judul" name="judul"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('judul') border-red-500 @enderror"
            value="{{ old('judul') }}" required />
          @error('judul')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
        {{-- Kategori --}}
        <div class="flex flex-col gap-1">
          <label for="kategori"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Kategori:</label>
          <select id="kategori" name="kategori"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('kategori') border-red-500 @enderror"
            required>
            <option value="" disabled {{ old('kategori') ? '' : 'selected' }}>
              Pilih kategori
            </option>
            <option value="sains" {{ old('kategori') == 'sains' ? 'selected' : '' }}>Sains</option>
            <option value="komedi" {{ old('kategori') == 'komedi' ? 'selected' : '' }}>Komedi
            </option>
            <option value="novel" {{ old('kategori') == 'novel' ? 'selected' : '' }}>Novel</option>
            <option value="hiburan" {{ old('kategori') == 'hiburan' ? 'selected' : '' }}>Hiburan
            </option>
          </select>
          @error('kategori')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
        {{-- Pengarang --}}
        <div class="flex flex-col gap-1">
          <label for="pengarang"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Pengarang:</label>
          <input type="text" id="pengarang" name="pengarang"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('pengarang') border-red-500 @enderror"
            value="{{ old('pengarang') }}" required />
          @error('pengarang')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
        {{-- Penerbit --}}
        <div class="flex flex-col gap-1">
          <label for="penerbit"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Penerbit:</label>
          <input type="text" id="penerbit" name="penerbit"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('penerbit') border-red-500 @enderror"
            value="{{ old('penerbit') }}" required />
          @error('penerbit')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
        {{-- Tahun Terbit --}}
        <div class="flex flex-col gap-1">
          <label for="tahun_terbit"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Tahun
            Terbit:</label>
          <select id="tahun_terbit" name="tahun_terbit"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('tahun_terbit') border-red-500 @enderror"
            required>
            <option value="" disabled {{ old('tahun_terbit') ? '' : 'selected' }}>Pilih tahun
              terbit</option>
            @php
              $tahun_sekarang = date('Y');
              $tahun_awal = 1950;
            @endphp
            @for ($tahun = $tahun_sekarang; $tahun >= $tahun_awal; $tahun--)
              <option value="{{ $tahun }}"
                {{ old('tahun_terbit') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
            @endfor
          </select>
          @error('tahun_terbit')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
        {{-- Eksemplar --}}
        <div class="flex flex-col gap-1">
          <label for="eksemplar"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Jumlah
            Eksemplar:</label>
          <input type="number" min="1" id="eksemplar" name="eksemplar"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('eksemplar') border-red-500 @enderror"
            value="{{ old('eksemplar') }}" required />
          @error('eksemplar')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
        {{-- Sumber --}}
        <div class="flex flex-col gap-1">
          <label for="sumber"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Sumber:</label>
          <select id="sumber" name="sumber"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] bg-white @error('sumber') border-red-500 @enderror"
            required>
            <option value="" disabled {{ old('sumber') ? '' : 'selected' }}>
              Pilih sumber
            </option>
            <option value="Pembelian" {{ old('sumber') == 'Pembelian' ? 'selected' : '' }}>
              Pembelian</option>
            <option value="Sumbangan" {{ old('sumber') == 'Sumbangan' ? 'selected' : '' }}>
              Sumbangan</option>
            <option value="Hibah" {{ old('sumber') == 'Hibah' ? 'selected' : '' }}>Hibah</option>
            <option value="Lainnya" {{ old('sumber') == 'Lainnya' ? 'selected' : '' }}>Lainnya
            </option>
          </select>
          @error('sumber')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
        {{-- Tanggal Terima --}}
        <div class="flex flex-col gap-1">
          <label for="tanggal_terima"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Tanggal
            Terima:</label>
          <input type="date" id="tanggal_terima" name="tanggal_terima"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('tanggal_terima') border-red-500 @enderror"
            value="{{ old('tanggal_terima') }}" required />
          @error('tanggal_terima')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
        {{-- Sinopsis --}}
        <div class="flex flex-col gap-1">
          <label for="sinopsis"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Sinopsis:</label>
          <textarea id="sinopsis" name="sinopsis"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('sinopsis') border-red-500 @enderror"
            required>{{ old('sinopsis') }}</textarea>
          @error('sinopsis')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    {{-- Button --}}
    <div class="mt-8">
      <button type="submit"
        class="w-full bg-[#394867] text-white py-3 font-semibold rounded hover:bg-[#212A3E] transition-colors">
        Simpan Buku
      </button>
    </div>
  </form>
</div>

<script>
  function previewImage(event) {
    const input = event.target;
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const img = document.getElementById("coverPreview");
        img.src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
