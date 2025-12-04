<div>
  <div
    class="w-full bg-white rounded-2xl overflow-hidden shadow-[0px_4px_4px_0px_rgba(103,53,187,0.15)]">

    {{-- Title --}}
    <div
      class="bg-gradient-to-r from-purple-600 via-purple-500 to-purple-400 text-white w-full flex justify-between items-center px-[24px] py-[14px]">
      <div class="text-lg font-semibold">Formulir Pendaftaran Anggota</div>
      {{-- <div class="flex items-center gap-2">
        <span class="text-[12px]">Bahasa / Language</span>
        <select
          class="bg-purple-700 text-white text-[12px] px-3 py-1 rounded focus:border-purple-900 focus:ring-purple-600">
          <option value="id">Indonesia</option>
          <option value="en">English</option>
        </select>
      </div> --}}
      <button onclick="showForm()"
        class="absolute top-[16px] right-5 text-gray-500 hover:text-purple-900 text-2xl focus:outline-none z-50"
        type="button" aria-label="Tutup">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <div class="w-full p-[24px]">
      <form action="" class="flex gap-5 flex-wrap lg:flex-nowrap">
        <div class="space-y-4 lg:max-w-1/2 ">
          {{-- NIK/NO.KTP --}}
          <div class="flex flex-col gap-1">
            <label for="nik/noktp"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">NIK/NO.
              KTP:</label>
            <input type="text" id="nik/noktp" name="nik/ktp"
              class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
          </div>

          {{-- Nama Lengkap --}}
          <div class="flex flex-col gap-1">
            <label for="nama-lengkap"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Nama
              Lengkap:</label>
            <input type="text" id="nama-lengkap" name="nama-lengkap"
              class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
          </div>

          {{-- Tempat / Tanggal Lahir --}}
          <div class="flex flex-col gap-1">
            <label for="tempat/tanggalLahir"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Tempat /
              Tanggal
              Lahir :</label>
            <div class="flex items-center gap-2 flex-wrap">
              <input type="text" id="tempat/tanggalLahir" name="tempat/tanggalLahir"
                placeholder="Tempat"
                class="w-[120px] border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
              <span class="text-purple-800">/</span>
              <input type="text" placeholder="DD"
                class="w-[60px] border border-purple-300 rounded px-3 py-2 text-center focus:border-purple-700 focus:ring-purple-600">
              <span class="text-purple-800">-</span>
              <input type="text" placeholder="MM"
                class="w-[60px] border border-purple-300 rounded px-3 py-2 text-center focus:border-purple-700 focus:ring-purple-600">
              <span class="text-purple-800">-</span>
              <input type="text" placeholder="YYYY"
                class="w-[80px] border border-purple-300 rounded px-3 py-2 text-center focus:border-purple-700 focus:ring-purple-600">
            </div>
          </div>

          {{-- Alamat Section --}}
          <div class="grid grid-cols-2 gap-4">
            {{-- Alamat Tinggal Sesuai Identitas --}}
            <div class="flex flex-col gap-1 border border-purple-300 rounded p-4 bg-purple-50/30">
              <label for="alamat"
                class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Tempat
                Sesuai
                KTP :</label>
              <textarea name="alamat" id="alamat" rows="4"
                class="w-full border border-purple-300 rounded px-3 py-2 resize-none focus:border-purple-700 focus:ring-purple-600"></textarea>
              <div class="grid grid-cols-3 gap-2 mt-2">
                <input type="text" placeholder="RT/RW"
                  class="border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
                <input type="text" placeholder="Kelurahan"
                  class="border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
                <input type="text" placeholder="Kecamatan"
                  class="border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
              </div>
            </div>

            {{-- Alamat Tinggal Saat Ini --}}
            <div class="flex flex-col gap-1 border border-purple-300 rounded p-4 bg-purple-50/30">
              <label for="alamatSaatIni"
                class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Alamat Saat
                Ini
                :</label>
              <div class="flex items-center gap-2 text-[12px] text-purple-700">
                <input type="checkbox" id="sama-alamat" class="accent-purple-600">
                <label for="sama-alamat">Centang apabila sama dengan alamat KTP</label>
              </div>
              <textarea name="alamatSaatIni" id="alamatSaatIni" rows="4"
                class="w-full border border-purple-300 rounded px-3 py-2 resize-none focus:border-purple-700 focus:ring-purple-600"></textarea>
              <div class="grid grid-cols-3 gap-2 mt-2">
                <input type="text" placeholder="RT/RW"
                  class="border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
                <input type="text" placeholder="Kelurahan"
                  class="border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
                <input type="text" placeholder="Kecamatan"
                  class="border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
              </div>
            </div>
          </div>
        </div>

        {{-- Grid 2 Kolom untuk field lainnya --}}
        <div class="grid grid-cols-2 gap-4 grow h-fit">
          {{-- No. HP --}}
          <div class="flex flex-col gap-1">
            <label for="no-hp"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">No. HP
              :</label>
            <input type="text" id="no-hp" name="no-hp"
              class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
          </div>

          {{-- Nama Institusi --}}
          <div class="flex flex-col gap-1">
            <label for="institusi"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Nama
              Institusi
              :</label>
            <input type="text" id="institusi" name="institusi"
              class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
          </div>

          {{-- No. Telepon Rumah --}}
          <div class="flex flex-col gap-1">
            <label for="no-telepon-rumah"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">No. Telpon
              Rumah
              :</label>
            <input type="text" id="no-telepon-rumah" name="no-telepon-rumah"
              class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
          </div>

          {{-- Alamat Institusi --}}
          <div class="flex flex-col gap-1">
            <label for="alamat-institusi"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Alamat
              Institusi :</label>
            <input type="text" id="alamat-institusi" name="alamat-institusi"
              class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
          </div>

          {{-- Jenis Anggota --}}
          <div class="flex flex-col gap-1">
            <label for="jenis-anggota"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Jenis
              Anggota
              :</label>
            <input type="text" id="jenis-anggota" name="jenis-anggota"
              class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
          </div>

          {{-- Pendidikan Terakhir --}}
          <div class="flex flex-col gap-1">
            <label for="pendidikan-terakhir"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Pendidikan
              Terakhir :</label>
            <input type="text" id="pendidikan-terakhir" name="pendidikan-terakhir"
              class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
          </div>

          {{-- Pekerjaan --}}
          <div class="flex flex-col gap-1">
            <label for="pekerjaan"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Pekerjaan
              :</label>
            <input type="text" id="pekerjaan" name="pekerjaan"
              class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
          </div>

          {{-- Status Perkawinan --}}
          <div class="flex flex-col gap-1">
            <label for="status-perkawinan"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Status
              Perkawinan :</label>
            <input type="text" id="status-perkawinan" name="status-perkawinan"
              class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600">
          </div>

          {{-- Foto Profil --}}
          <div class="flex flex-col gap-1">
            <label for="foto-profil"
              class="text-[14px] after:content-['*'] after:text-purple-600 after:ml-1">Pas Foto
              :</label>
            <input type="file" id="foto-profil" name="foto-profil"
              class="w-full border border-purple-300 rounded px-3 py-2 focus:border-purple-700 focus:ring-purple-600"
              accept="image/*">
            <span class="text-[12px] text-purple-600 mt-1">* Keterangan: Upload pas foto terbaru
              dalam format JPG/PNG, maksimal 2MB.</span>
          </div>
        </div>

      </form>
    </div>

    {{-- Footer Pernyataan --}}
    <div class="bg-purple-50 px-[24px] py-[16px] border-t border-purple-200">
      <p class="text-[14px] text-purple-800">Saya menyatakan data yang diisi benar dan dapat di
        pertanggungjawabkan, serta saya setuju dengan peraturan di perpustakaan Ustad Sukirman</p>
    </div>

    {{-- Tombol Simpan --}}
    <button type="submit"
      class="w-full bg-purple-600 text-white py-3 font-semibold hover:bg-purple-700 transition-colors">
      Simpan
    </button>

  </div>
</div>
