<div class="w-full space-y-4">
  {{-- Title --}}
  <div class="text-[16px] font-semibold text-purple-700"><i class="fa-solid fa-user-group"></i>
    Data Keanggotaan
  </div>

  <div class="flex justify-between flex-wrap gap-4">
    <x-admin.pencarian />
    <x-admin.add-data type="Anggota" />
    {{-- Pencarian --}}
  </div>

  <div
    class="w-full bg-white rounded-2xl overflow-hidden shadow-[0px_4px_4px_0px_rgba(103,53,187,0.15)]">

    {{-- Title --}}
    <div
      class="bg-gradient-to-r from-purple-600 via-purple-500 to-purple-400 text-white w-full flex items-center px-[24px] py-[14px]">
      <div class="text-[14px] font-semibold"><i class="fa-solid fa-user-group"></i> Data Keanggotaan
      </div>
    </div>

    <div class="w-full p-[24px] space-y-4">

      {{-- Jumlah Data Yang Di Tampilkan --}}
      <div class="text-[10px] flex gap-4 items-center font-light text-purple-700">
        <div>Show</div>
        <select name="show-entries" id="show-entries"
          class="py-[8px] px-[14px] border border-purple-300 rounded text-purple-800 focus:border-purple-700 focus:ring-purple-600">
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
        <div>entries</div>
      </div>

      {{-- Table --}}
      <div class="overflow-auto">
        <table class="w-full border border-purple-500">
          <tr>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">No. Anggota
            </th>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">Nama</th>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">Email</th>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">No. HP</th>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">Status</th>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">Aksi</th>
          </tr>

          <tr>
            <td class="border border-purple-200 px-2 py-2">A001</td>
            <td class="border border-purple-200 px-2 py-2">Ahmad Rizki</td>
            <td class="border border-purple-200 px-2 py-2">ahmad@email.com</td>
            <td class="border border-purple-200 px-2 py-2">081234567890</td>
            <td class="border border-purple-200 px-2 py-2">
              <span class="bg-purple-600 text-white px-2 py-1 rounded text-sm">Aktif</span>
            </td>
            <td class="border border-purple-200 px-2 py-2">
              <div class="flex justify-center gap-2">
                <button
                  class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 rounded">Edit</button>
                <button
                  class="bg-purple-300 hover:bg-purple-400 text-purple-900 px-3 py-1 rounded">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td class="border border-purple-200 px-2 py-2">A002</td>
            <td class="border border-purple-200 px-2 py-2">Siti Nurhaliza</td>
            <td class="border border-purple-200 px-2 py-2">siti@email.com</td>
            <td class="border border-purple-200 px-2 py-2">082345678901</td>
            <td class="border border-purple-200 px-2 py-2">
              <span class="bg-purple-600 text-white px-2 py-1 rounded text-sm">Aktif</span>
            </td>
            <td class="border border-purple-200 px-2 py-2">
              <div class="flex justify-center gap-2">
                <button
                  class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 rounded">Edit</button>
                <button
                  class="bg-purple-300 hover:bg-purple-400 text-purple-900 px-3 py-1 rounded">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td class="border border-purple-200 px-2 py-2">A003</td>
            <td class="border border-purple-200 px-2 py-2">Budi Santoso</td>
            <td class="border border-purple-200 px-2 py-2">budi@email.com</td>
            <td class="border border-purple-200 px-2 py-2">083456789012</td>
            <td class="border border-purple-200 px-2 py-2">
              <span class="bg-purple-300 text-purple-900 px-2 py-1 rounded text-sm">Pending</span>
            </td>
            <td class="border border-purple-200 px-2 py-2">
              <div class="flex justify-center gap-2">
                <button
                  class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 rounded">Edit</button>
                <button
                  class="bg-purple-300 hover:bg-purple-400 text-purple-900 px-3 py-1 rounded">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td class="border border-purple-200 px-2 py-2">A004</td>
            <td class="border border-purple-200 px-2 py-2">Dewi Lestari</td>
            <td class="border border-purple-200 px-2 py-2">dewi@email.com</td>
            <td class="border border-purple-200 px-2 py-2">084567890123</td>
            <td class="border border-purple-200 px-2 py-2">
              <span class="bg-purple-600 text-white px-2 py-1 rounded text-sm">Aktif</span>
            </td>
            <td class="border border-purple-200 px-2 py-2">
              <div class="flex justify-center gap-2">
                <button
                  class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 rounded">Edit</button>
                <button
                  class="bg-purple-300 hover:bg-purple-400 text-purple-900 px-3 py-1 rounded">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td class="border border-purple-200 px-2 py-2">A005</td>
            <td class="border border-purple-200 px-2 py-2">Rudi Hermawan</td>
            <td class="border border-purple-200 px-2 py-2">rudi@email.com</td>
            <td class="border border-purple-200 px-2 py-2">085678901234</td>
            <td class="border border-purple-200 px-2 py-2">
              <span class="bg-purple-400 text-white px-2 py-1 rounded text-sm">Non-Aktif</span>
            </td>
            <td class="border border-purple-200 px-2 py-2">
              <div class="flex justify-center gap-2">
                <button
                  class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 rounded">Edit</button>
                <button
                  class="bg-purple-300 hover:bg-purple-400 text-purple-900 px-3 py-1 rounded">Delete</button>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
