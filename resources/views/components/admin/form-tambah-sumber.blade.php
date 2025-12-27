<form method="POST" action="{{ route('tambah-sumber') }}"
  class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md form-tambah-sumber">
  @csrf
  <h2 class="text-xl font-bold mb-6 flex items-center gap-2 text-yellow-700">
    <i class="fa-solid fa-building"></i> Tambah Sumber
  </h2>
  <div class="mb-6">
    <label for="nama_sumber" class="block text-sm font-medium text-gray-700 mb-2">Nama
      Sumber</label>
    <input type="text" id="nama_sumber" name="nama_sumber" required
      class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-700 focus:outline-none transition"
      placeholder="Masukkan nama sumber">
  </div>
  <div class="flex items-center gap-4">
    <button type="submit"
      class="bg-yellow-700 hover:bg-yellow-800 text-white font-semibold py-2 px-6 rounded-lg transition w-full">
      Simpan
    </button>
    <button type="button"
      onclick="document.querySelector('.form-tambah-sumber').classList.add('hidden')"
      class="bg-gray-700 hover:bg-gray-800 text-gray-100 font-semibold py-2 px-6 rounded-lg transition w-full">
      Batal
    </button>
  </div>
</form>
