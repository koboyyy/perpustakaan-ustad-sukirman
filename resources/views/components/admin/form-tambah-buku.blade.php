<div class="w-full h-fit max-w-xl mx-auto bg-white rounded-2xl shadow-lg relative overflow-auto">
  {{-- Title --}}
  <div
    class="bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex items-center px-6 py-4">
    <div class="text-lg font-semibold">Form Tambah Buku</div>
  </div>

  {{-- Success/Failure Message --}}
  @if (session('success'))
    <div
      class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mx-6"
      role="alert" id="success-message">
      <span class="block sm:inline">{{ session('success') }}</span>
      <button type="button"
        onclick="document.getElementById('success-message').style.display='none';"
        class="absolute top-1 right-2 text-green-700 hover:text-green-900 text-xl font-bold leading-none focus:outline-none"
        aria-label="close">&times;</button>
    </div>
    <script>
      // Script for automatic fade-out after 3s
      document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
          var msg = document.getElementById('success-message');
          if (msg) {
            msg.style.transition = "opacity 0.5s";
            msg.style.opacity = 0;
            setTimeout(function() {
              msg.style.display = "none";
            }, 500);
          }
        }, 3000);
      });
    </script>
  @endif

  @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 mx-6"
      role="alert" id="error-message">
      <span class="block sm:inline">{{ session('error') }}</span>
      <button type="button"
        onclick="document.getElementById('error-message').style.display='none';"
        class="absolute top-1 right-2 text-red-700 hover:text-red-900 text-xl font-bold leading-none focus:outline-none"
        aria-label="close">&times;</button>
    </div>
  @endif

  {{-- Batasan Form & Penjelasan --}}
  <div class="mx-6 mt-4 mb-1 ">
    <ul class="text-sm text-gray-600 list-disc pl-5 space-y-0.5">
      <li>Field bertanda <span class="text-[#394867]">*</span> wajib diisi.</li>
      <li>Ukuran file cover maksimal 2MB, format jpg/jpeg/png.</li>
      <li>Judul buku harus unik.</li>
      <li>Tahun terbit mulai dari 1950 hingga tahun sekarang.</li>
      <li>Jumlah eksemplar minimal 1.</li>
      <li>Jika upload cover gagal atau format salah, buku tidak akan disimpan.</li>
    </ul>
  </div>

  {{-- Form --}}
  <form action="{{ route('tambahBuku') }}" method="POST" enctype="multipart/form-data"
    class="px-6 py-6 ">
    @csrf
    <div class="w-full flex flex-col md:flex-row gap-6">

      {{-- Cover Preview & Upload --}}
      <div class="flex flex-col w-fit mb-6">
        <div
          class="w-40 h-56 bg-gray-100 rounded-lg mb-2 flex items-center justify-center overflow-hidden border border-[#9BA4B5]">
          <img id="coverPreview"
            src="{{ old('cover') ? asset('storage/' . old('cover')) : 'https://fakeimg.pl/200x280/?text=No+Cover' }}"
            alt="Preview Cover" class="object-cover w-full h-full"
            onerror="this.onerror=bg-amber-200null; this.src='https://fakeimg.pl/200x280/?text=No+Cover';" />
        </div>
        <div class="flex flex-col gap-1 w-full max-w-md">
          <label for="cover" class="text-[14px]">Upload Cover:</label>
          <input type="file" id="cover" name="cover" accept="image/*"
            class="w-full border border-[#9BA4B5] rounded px-2 py-1 focus:border-[#394867] focus:ring-[#394867] bg-white @error('cover') border-red-500 @enderror"
            onchange="previewImage(event)" />
          <span class="text-xs text-[#394867] mt-1">Format gambar: jpg, jpeg, atau png. Maks
            2MB.</span>
          @error('cover')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
      </div>

      {{-- Form Fields --}}
      <div class="space-y-4 w-full max-w-md mx-auto">

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
            @foreach ($dataKategori as $kategori)
              <option value="{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</option>
            @endforeach
          </select>
          @error('kategori')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>

        {{-- Pengarang --}}
        <div class="flex flex-col gap-1">
          <label for="pengarang"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Pengarang:</label>
          <select name="pengarang" id="pengarang"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('tahun_terbit') border-red-500 @enderror"
            required>
            @foreach ($dataPengarang as $pengarang)
              <option value="{{ $pengarang->nama_pengarang }}">{{ $pengarang->nama_pengarang }}
              </option>
            @endforeach
          </select>
          @error('pengarang')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>

        {{-- Penerbit --}}
        <div class="flex flex-col gap-1">
          <label for="penerbit"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Penerbit:</label>
          <select name="penerbit" id="penerbit"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('tahun_terbit') border-red-500 @enderror"
            required>
            @foreach ($dataPenerbit as $penerbit)
              <option value="{{ $penerbit->nama_penerbit }}">{{ $penerbit->nama_penerbit }}
              </option>
            @endforeach
          </select>
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
          <select name="sumber" id="sumber"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('tahun_terbit') border-red-500 @enderror"
            required>
            @foreach ($dataSumber as $sumber)
              <option value="{{ $sumber->nama_sumber }}">{{ $sumber->nama_sumber }}
              </option>
            @endforeach
          </select>
          @error('sumber')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>

        {{-- Rak --}}
        <div class="flex flex-col gap-1">
          <label for="rak"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Rak:</label>
          <select name="sumber" id="sumber"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('tahun_terbit') border-red-500 @enderror"
            required>
            @foreach ($dataRak as $rak)
              <option value="{{ $rak->no_rak }}">{{ $rak->no_rak }}
              </option>
            @endforeach
          </select>
          @error('rak')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>

        {{-- Tanggal Terima --}}
        <div class="flex flex-col gap-1">
          <label for="tanggal_terima" class="text-[14px]">Tanggal Terima:</label>
          <input type="date" id="tanggal_terima" name="tanggal_terima"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('tanggal_terima') border-red-500 @enderror"
            value="{{ old('tanggal_terima') }}" />
          @error('tanggal_terima')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>

        {{-- Sinopsis --}}
        <div class="flex flex-col gap-1">
          <label for="sinopsis" class="text-[14px]">Sinopsis:</label>
          <textarea id="sinopsis" name="sinopsis"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867] @error('sinopsis') border-red-500 @enderror">{{ old('sinopsis') }}</textarea>
          @error('sinopsis')
            <span class="text-red-500 text-xs">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>

    {{-- Button --}}
    <div class="w-full mt-8">
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
