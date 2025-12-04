<div class="w-full max-w-xl mx-auto bg-white rounded-2xl overflow-hidden shadow-lg relative">
  {{-- Title --}}
  <div
    class="bg-gradient-to-r from-purple-600 via-purple-500 to-purple-400 text-white w-full flex items-center px-6 py-4">
    <div class="text-lg font-semibold">Form Tambah Buku</div>
    <button onclick="showForm()"
      class="absolute top-[16px] right-5 text-gray-500 hover:text-purple-900 text-2xl focus:outline-none z-50"
      type="button" aria-label="Tutup">
      <i class="fa-solid fa-xmark"></i>
    </button>
  </div>

  <form action="" class="w-full px-6 py-6 space-y-4">
    {{-- Judul Buku --}}
    <div class="flex flex-col gap-1">
      <label for="judul"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Judul Buku:</label>
      <input type="text" id="judul" name="judul"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        required>
    </div>
    {{-- Pengarang --}}
    <div class="flex flex-col gap-1">
      <label for="pengarang"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Pengarang:</label>
      <input type="text" id="pengarang" name="pengarang"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        required>
    </div>
    {{-- Penerbit --}}
    <div class="flex flex-col gap-1">
      <label for="penerbit"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Penerbit:</label>
      <input type="text" id="penerbit" name="penerbit"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        required>
    </div>
    {{-- Tahun Terbit --}}
    <div class="flex flex-col gap-1">
      <label for="tahun_terbit"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Tahun
        Terbit:</label>
      <input type="number" min="1000" max="9999" maxlength="4" id="tahun_terbit"
        name="tahun_terbit"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        required>
    </div>
    {{-- Eksemplar --}}
    <div class="flex flex-col gap-1">
      <label for="eksemplar"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Jumlah
        Eksemplar:</label>
      <input type="number" min="1" id="eksemplar" name="eksemplar"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        required>
    </div>
    {{-- Sumber --}}
    <div class="flex flex-col gap-1">
      <label for="sumber"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Sumber:</label>
      <input type="text" id="sumber" name="sumber"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        required>
    </div>
    {{-- Tanggal Terima --}}
    <div class="flex flex-col gap-1">
      <label for="tanggal_terima"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Tanggal
        Terima:</label>
      <input type="date" id="tanggal_terima" name="tanggal_terima"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        required>
    </div>

    {{-- Upload Cover --}}
    <div class="flex flex-col gap-1">
      <label for="cover"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Upload
        Cover:</label>
      <input type="file" id="cover" name="cover" accept="image/*"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600 bg-white"
        required>
      <span class="text-xs text-purple-500 mt-1">Format gambar: jpg, jpeg, atau png. Maks
        2MB.</span>
    </div>

    {{-- Button --}}
    <div>
      <button type="submit"
        class="w-full bg-purple-600 text-white py-3 font-semibold rounded hover:bg-purple-700 transition-colors">
        Simpan Buku
      </button>
    </div>
  </form>
</div>
