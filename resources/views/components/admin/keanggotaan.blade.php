<div class="w-full space-y-4">
  {{-- Title --}}
  <div class="text-[16px] font-semibold text-[#212A3E]"><i class="fa-solid fa-user-group"></i>
    Data Keanggotaan
  </div>

  <div class="flex justify-between flex-wrap gap-4">
    <x-admin.pencarian />

    <x-admin.add-data title="Anggota">
      <x-admin.form-pendaftaran-anggota></x-admin.form-pendaftaran-anggota>
    </x-admin.add-data>
  </div>

  <div
    class="w-full bg-white rounded-2xl overflow-hidden shadow-[0px_4px_4px_0px_rgba(57,72,103,0.15)]">

    {{-- Title --}}
    <div
      class="bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex items-center px-[24px] py-[14px]">
      <div class="text-[14px] font-semibold"><i class="fa-solid fa-user-group"></i> Data Keanggotaan
      </div>
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
        <table class="w-full border border-[#394867]">
          <tr>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">No. Anggota
            </th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Nama</th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Email</th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">No. HP</th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Status</th>
            <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Aksi</th>
          </tr>

          @foreach ($dataAnggota as $anggota)
            <tr id="table-cell">
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $anggota['no_anggota'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $anggota['nama'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $anggota['email'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">{{ $anggota['no_hp'] }}</td>
              <td class="border border-[#9BA4B5] px-2 py-2">
                @if ($anggota['status'] === 'Aktif')
                  <span class="bg-[#394867] text-white px-2 py-1 rounded text-sm">Aktif</span>
                @else
                  <span class="bg-[#9BA4B5] text-white px-2 py-1 rounded text-sm">Tidak Aktif</span>
                @endif
              </td>
              <td class="border border-[#9BA4B5] px-2 py-2">
                <div class="flex justify-center gap-2">
                  <button
                    class="bg-[#394867] hover:bg-[#212A3E] text-white px-3 py-1 rounded">Edit</button>
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
