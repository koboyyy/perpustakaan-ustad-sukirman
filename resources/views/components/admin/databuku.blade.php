<div class="w-full space-y-4">
  {{-- Title --}}
  <div class="text-[16px] font-semibold text-[#394867]"><i class="fa-solid fa-book"></i>
    Data-data Buku</div>

  <div class="flex justify-between flex-wrap gap-4">
    <x-admin.pencarian />

    {{-- <div class="flex gap-4">
      <x-admin.add-data title="Pengarang">
        <x-admin.form-tambah-pengarang />
      </x-admin.add-data>
      <x-admin.add-data title="Penerbit">
        <x-admin.form-tambah-penerbit />
      </x-admin.add-data>
      <x-admin.add-data title="Rak">
        <x-admin.form-tambah-rak></x-admin.form-tambah-rak>
      </x-admin.add-data>
      <x-admin.add-data title="Buku">
        <x-admin.form-tambah-buku />
      </x-admin.add-data>
    </div> --}}

    <x-admin.add-data>
      <x-admin.form-tambah-buku></x-admin.form-tambah-buku>
    </x-admin.add-data>
  </div>

  <div
    class="w-full bg-white rounded-2xl shadow-[0px_4px_4px_0px_rgba(57,72,103,0.15)] overflow-hidden">

    {{-- Title --}}
    <div
      class="bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex items-center px-[24px] py-[14px]">
      <div class="text-[14px] font-semibold"><i class="fa-solid fa-book"></i> Data Buku</div>
    </div>

    <div class="w-full p-[24px] space-y-4">

      {{-- Jumlah Data Yang Di Tampilkan --}}
      <div class="text-[10px] flex gap-4 items-center font-light text-[#212A3E]">
        <div>Show</div>
        <select name="show-entries" id="show-entries"
          class="py-[8px] px-[14px] border border-[#9BA4B5] rounded text-[#212A3E] focus:border-[#394867] focus:ring-[#394867]">
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
        <div>entries</div>
      </div>

      {{-- Table --}}
      <div class="overflow-auto">
        <table class="w-full border border-[#394867] overflow-scroll">
          <tr>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Judul</th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Pengarang
            </th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Penerbit
            </th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Tahun Terbit
            </th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Rak</th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Eksemplar
            </th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Sumber</th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Tanggal
              Terima</th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Aksi</th>
          </tr>

          @foreach ($dataBuku as $buku)
            <tr>
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $buku['judul'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $buku['pengarang'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $buku['penerbit'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $buku['tahunTerbit'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $buku['rak'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $buku['eksemplar'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $buku['sumber'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $buku['tanggalTerima'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">
                <div class="flex justify-center gap-2">
                  <button
                    class="bg-[#9BA4B5] hover:bg-[#394867] text-[#212A3E] px-3 py-1 rounded">Delete</button>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    </div>

  </div>

  @vite('resources/js/table.js')
</div>
