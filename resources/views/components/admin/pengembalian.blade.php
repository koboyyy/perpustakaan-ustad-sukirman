<div class="bg-white rounded-2xl shadow-lg w-full max-w-[600px] mx-auto text-[14px] overflow-hidden">
  <div
    class="bg-gradient-to-r from-purple-600 via-purple-500 to-purple-400 text-white w-full flex items-center px-[24px] py-[14px]">
    <div class="text-[16px] font-semibold">Formulir Pengembalian Buku</div>
  </div>
  <form action="" method="post" class="p-7 space-y-6">
    {{-- Data Anggota --}}
    <div class="flex flex-col gap-1">
      <label for="id_anggota"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">ID/Nama
        Anggota:</label>
      <input type="text" id="id_anggota" name="id_anggota"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        placeholder="Masukkan ID atau nama anggota" required>
    </div>

    {{-- Data Buku --}}
    <div class="flex flex-col gap-1">
      <label for="kode_buku"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">
        Kode/Judul Buku:
      </label>
      <input type="text" id="kode_buku" name="kode_buku"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        placeholder="Ketik kode/judul buku dipinjam (bisa lebih dari satu, pisahkan koma)" required>
      <span class="text-xs text-purple-500 mt-1">Pisahkan dengan koma jika mengembalikan lebih dari
        satu buku.</span>
    </div>

    {{-- Tanggal Pinjam --}}
    <div class="flex flex-col gap-1">
      <label for="tanggal_pinjam"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">
        Tanggal Pinjam:
      </label>
      <input type="date" id="tanggal_pinjam" name="tanggal_pinjam"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        required>
    </div>

    {{-- Tanggal Kembali --}}
    <div class="flex flex-col gap-1">
      <label for="tanggal_kembali"
        class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">
        Tanggal Pengembalian:
      </label>
      <input type="date" id="tanggal_kembali" name="tanggal_kembali"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        required>
    </div>

    {{-- Denda --}}
    <div class="flex flex-col gap-1">
      <label for="denda" class="text-[14px]">
        Denda (jika ada):
      </label>
      <input type="number" min="0" id="denda" name="denda"
        class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
        placeholder="Masukkan nominal denda">
      <span class="text-xs text-purple-500 mt-1">Isi 0 jika tidak ada denda.</span>
    </div>

    {{-- Catatan --}}
    <div class="flex flex-col gap-1">
      <label for="catatan" class="text-[14px]">Catatan (opsional):</label>
      <textarea id="catatan" name="catatan" rows="3"
        class="w-full border border-purple-300 rounded px-3 py-2 resize-none focus:border-purple-700 focus:ring-purple-600"></textarea>
    </div>

    {{-- Tombol Simpan --}}
    <div>
      <button type="submit"
        class="w-full bg-purple-600 text-white py-3 font-semibold rounded hover:bg-purple-700 transition-colors">
        Simpan Pengembalian
      </button>
    </div>
  </form>
</div>
