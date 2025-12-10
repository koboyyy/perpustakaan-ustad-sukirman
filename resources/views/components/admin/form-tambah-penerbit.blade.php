<form method="POST" action="#" class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
  <h2 class="text-xl font-bold mb-6 text-purple-700 flex items-center gap-2">
    <i class="fa-solid fa-building"></i> Tambah Penerbit
  </h2>
  <div class="mb-6">
    <label for="nama_penerbit" class="block text-sm font-medium text-gray-700 mb-2">Nama
      Penerbit</label>
    <input type="text" id="nama_penerbit" name="nama_penerbit" required
      class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none transition"
      placeholder="Masukkan nama penerbit">
  </div>
  <div class="flex items-center gap-4">
    <button type="submit"
      class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-6 rounded-lg transition w-full">
      Simpan
    </button>
    <button type="button" onclick="document.querySelector('.form-data').classList.add('hidden')"
      class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-6 rounded-lg transition w-full">
      Batal
    </button>
  </div>
</form>
