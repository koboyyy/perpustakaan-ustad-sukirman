<div>
  <div
    class="w-full bg-white rounded-2xl overflow-hidden shadow-[0px_4px_4px_0px_rgba(57,72,103,0.15)]">

    {{-- Title --}}
    <div
      class="bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex justify-between items-center px-[24px] py-[14px] relative">
      <div class="text-[16px] font-semibold">Formulir Pendaftaran Anggota</div>
      <button onclick="showForm()"
        class="absolute top-[16px] right-5 text-gray-400 hover:text-[#394867] text-2xl focus:outline-none z-50"
        type="button" aria-label="Tutup">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <div class="w-full p-[24px]">
      <form action="" class="flex flex-col gap-5">
        <div class="space-y-4">
          {{-- NIK --}}
          <div class="flex flex-col gap-1">
            <label for="nik"
              class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1 text-[#394867]">
              NIK:
            </label>
            <input type="text" id="nik" name="nik"
              class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#212A3E] focus:ring-[#394867] text-[#212A3E] placeholder:text-[#9BA4B5]">
          </div>

          {{-- Nama Lengkap --}}
          <div class="flex flex-col gap-1">
            <label for="nama_lengkap"
              class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1 text-[#394867]">
              Nama Lengkap:
            </label>
            <input type="text" id="nama_lengkap" name="nama_lengkap"
              class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#212A3E] focus:ring-[#394867] text-[#212A3E] placeholder:text-[#9BA4B5]">
          </div>

          {{-- Email --}}
          <div class="flex flex-col gap-1">
            <label for="email"
              class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1 text-[#394867]">
              Email:
            </label>
            <input type="email" id="email" name="email"
              class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#212A3E] focus:ring-[#394867] text-[#212A3E] placeholder:text-[#9BA4B5]">
          </div>

          {{-- Password --}}
          <div class="flex flex-col gap-1">
            <label for="password"
              class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1 text-[#394867]">
              Password:
            </label>
            <input type="password" id="password" name="password"
              class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#212A3E] focus:ring-[#394867] text-[#212A3E] placeholder:text-[#9BA4B5]">
          </div>

          {{-- No. HP --}}
          <div class="flex flex-col gap-1">
            <label for="no_hp"
              class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1 text-[#394867]">
              No. HP :
            </label>
            <input type="text" id="no_hp" name="no_hp"
              class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#212A3E] focus:ring-[#394867] text-[#212A3E] placeholder:text-[#9BA4B5]">
          </div>

          {{-- Alamat --}}
          <div class="flex flex-col gap-1">
            <label for="alamat"
              class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1 text-[#394867]">
              Alamat:
            </label>
            <textarea name="alamat" id="alamat" rows="3"
              class="w-full border border-[#9BA4B5] rounded px-3 py-2 resize-none focus:border-[#212A3E] focus:ring-[#394867] text-[#212A3E] placeholder:text-[#9BA4B5]"></textarea>
          </div>

          {{-- Jenis Kelamin --}}
          <div class="flex flex-col gap-1">
            <label for="jenis_kelamin"
              class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1 text-[#394867]">
              Jenis Kelamin:
            </label>
            <select id="jenis_kelamin" name="jenis_kelamin"
              class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#212A3E] focus:ring-[#394867] text-[#212A3E]">
              <option value="">Pilih Jenis Kelamin</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>

          {{-- Tanggal Lahir --}}
          <div class="flex flex-col gap-1">
            <label for="tanggal_lahir"
              class="text-[14px] after:content-['*'] after:text-[#394867] after:ml-1 text-[#394867]">
              Tanggal Lahir:
            </label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
              class="w-full border border-[#9BA4B5] rounded px-3 py-2 focus:border-[#212A3E] focus:ring-[#394867] text-[#212A3E] placeholder:text-[#9BA4B5]">
          </div>
        </div>
      </form>
    </div>

    {{-- Footer Pernyataan --}}
    <div class="bg-[#F1F6F9] px-[24px] py-[16px] border-t border-[#9BA4B5]">
      <p class="text-[14px] text-[#394867]">Saya menyatakan data yang diisi benar dan dapat
        dipertanggungjawabkan, serta saya setuju dengan peraturan di perpustakaan Ustad Sukirman</p>
    </div>

    {{-- Tombol Simpan --}}
    <button type="submit"
      class="w-full bg-[#394867] text-white py-3 font-semibold hover:bg-[#212A3E] transition-colors">
      Simpan
    </button>

  </div>
</div>
