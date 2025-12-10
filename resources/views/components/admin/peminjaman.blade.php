<div>
  <div
    class="w-full bg-white rounded-2xl overflow-hidden shadow-[0px_4px_4px_0px_rgba(57,72,103,0.15)]">

    {{-- Judul --}}
    <div
      class="bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex items-center px-[24px] py-[14px]">
      <div class="text-[16px] font-semibold">Formulir Peminjaman Buku</div>
    </div>

    <div class="w-full p-[24px]">
      <form action="" method="POST" class="space-y-6">
        {{-- Informasi Anggota --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="flex flex-col gap-1">
            <label for="id_anggota"
              class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">ID/Nama
              Anggota:</label>
            <input type="text" id="id_anggota" name="id_anggota"
              class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867]"
              required>
          </div>
          <div class="flex flex-col gap-1">
            <label for="tanggal_pinjam"
              class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Tanggal
              Pinjam:</label>
            <input type="date" id="tanggal_pinjam" name="tanggal_pinjam"
              class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867]"
              required>
          </div>
          <div class="flex flex-col gap-1">
            <label for="tanggal_kembali"
              class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Tanggal
              Kembali:</label>
            <input type="date" id="tanggal_kembali" name="tanggal_kembali"
              class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867]"
              required>
          </div>
        </div>

        {{-- Informasi Buku --}}
        <div class="flex flex-col gap-1">
          <label for="data_buku"
            class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1">Judul Buku
            (bisa lebih dari satu):</label>
          <input type="text" id="data_buku" name="data_buku"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#394867] focus:ring-[#394867]"
            placeholder="Ketik judul dan tekan enter untuk tambah judul lain" required>
          <span class="text-xs text-[#394867] mt-1">Jika ingin pinjam lebih dari satu buku,
            pisahkan dengan koma (,).</span>
        </div>

        {{-- Catatan --}}
        <div class="flex flex-col gap-1">
          <label for="catatan" class="text-[14px]">Catatan (opsional):</label>
          <textarea id="catatan" name="catatan" rows="3"
            class="w-full border border-[#9BA4B5] rounded px-3 py-2 resize-none focus:border-[#394867] focus:ring-[#394867]"></textarea>
        </div>

        {{-- Tombol Simpan --}}
        <div>
          <button type="submit"
            class="w-full bg-[#394867] text-white py-3 font-semibold hover:bg-[#212A3E] transition-colors rounded">
            Simpan Peminjaman
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
