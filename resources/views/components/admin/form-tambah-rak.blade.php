<form method="POST" action="{{ route('tambah-rak') }}"
  class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md form-tambah-rak">
  @csrf
  <h2 class="text-xl font-bold mb-6 text-purple-700 flex items-center gap-2">
    <i class="fa-solid fa-layer-group"></i> Tambah Rak
  </h2>
  <div class="mb-6">
    <label for="no_rak" class="block text-sm font-medium text-gray-700 mb-2">Nama Rak</label>
    <input type="text" id="no_rak" name="no_rak" required
      class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-700 focus:outline-none transition"
      placeholder="Masukkan lokasi rak">
  </div>
  <div class="flex items-center gap-4">
    <button type="submit"
      class="bg-purple-700 hover:bg-purple-800 text-white font-semibold py-2 px-6 rounded-lg transition w-full">
      Simpan
    </button>
    <button type="button"
      onclick="document.querySelector('.form-tambah-rak').classList.add('hidden')"
      class="bg-gray-700 hover:bg-gray-800 text-gray-100 font-semibold py-2 px-6 rounded-lg transition w-full">
      Batal
    </button>
  </div>
</form>
