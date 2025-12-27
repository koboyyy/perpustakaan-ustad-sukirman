<form method="POST" action="{{ route('tambah-kategori') }}"
  class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md form-data">
  @csrf
  <h2 class="text-xl font-bold mb-6 text-green-700 flex items-center gap-2">
    <i class="fa-solid fa-tags"></i> Tambah Kategori
  </h2>
  <div class="mb-6">
    <label for="nama_kategori" class="block text-sm font-medium text-gray-700-700 mb-2">Nama
      Kategori</label>
    <input type="text" id="nama_kategori" name="nama_kategori" required
      class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-700 focus:outline-none transition"
      placeholder="Masukkan nama kategori">
  </div>
  <div class="flex items-center gap-4">
    <button type="submit"
      class="bg-green-700 hover:bg-green-800 text-white font-semibold py-2 px-6 rounded-lg transition w-full">
      Simpan
    </button>
    <button type="button" onclick="document.querySelector('.form-data').classList.add('hidden')"
      class="bg-gray-700 hover:bg-gray-800 text-gray-100 font-semibold py-2 px-6 rounded-lg transition w-full">
      Batal
    </button>
  </div>
</form>
