<div class="w-full">
  {{-- Title --}}
  <div class="text-[16px] font-semibold mb-4"><i class="fa-solid fa-user-group"></i> Data Keanggotaan</div>

  <div class="w-full bg-white rounded-2xl overflow-hidden shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">

    {{-- Title --}}
    <div
      class="bg-gradient-to-r [background-image:linear-gradient(90deg,#FDEB71_0%,#F8D800_32%)] text-black w-full flex items-center px-[24px] py-[14px]">
      <div class="text-[14px] font-semibold"><i class="fa-solid fa-user-group"></i> Data Keanggotaan</div>
    </div>

    <div class="w-full p-[24px] space-y-4">

      {{-- Jumlah Data Yang Di Tampilkan --}}
      <div class="text[10px] flex gap-4 items-center font-light">
        <div>Show</div>
        <select name="show-entries" id="show-entries" class="py-[8px] px-[14px] border rounded">
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
        <div>entries</div>
      </div>

      <div class="flex justify-between">
        <x-add-data></x-add-data>

        {{-- Pencarian --}}
        <x-pencarian></x-pencarian>
      </div>

      {{-- Table --}}
      <table class="w-full border border-gray-400">
        <tr>
          <th class="border border-gray-400 px-2 py-2">No. Anggota</th>
          <th class="border border-gray-400 px-2 py-2">Nama</th>
          <th class="border border-gray-400 px-2 py-2">Email</th>
          <th class="border border-gray-400 px-2 py-2">No. HP</th>
          <th class="border border-gray-400 px-2 py-2">Status</th>
          <th class="border border-gray-400 px-2 py-2">Aksi</th>
        </tr>

        <tr>
          <td class="border border-gray-300 px-2 py-2">A001</td>
          <td class="border border-gray-300 px-2 py-2">Ahmad Rizki</td>
          <td class="border border-gray-300 px-2 py-2">ahmad@email.com</td>
          <td class="border border-gray-300 px-2 py-2">081234567890</td>
          <td class="border border-gray-300 px-2 py-2">
            <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">Aktif</span>
          </td>
          <td class="border border-gray-300 px-2 py-2">
            <div class="flex justify-center gap-2">
              <button class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
              <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
          </td>
        </tr>
        <tr>
          <td class="border border-gray-300 px-2 py-2">A002</td>
          <td class="border border-gray-300 px-2 py-2">Siti Nurhaliza</td>
          <td class="border border-gray-300 px-2 py-2">siti@email.com</td>
          <td class="border border-gray-300 px-2 py-2">082345678901</td>
          <td class="border border-gray-300 px-2 py-2">
            <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">Aktif</span>
          </td>
          <td class="border border-gray-300 px-2 py-2">
            <div class="flex justify-center gap-2">
              <button class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
              <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
          </td>
        </tr>
        <tr>
          <td class="border border-gray-300 px-2 py-2">A003</td>
          <td class="border border-gray-300 px-2 py-2">Budi Santoso</td>
          <td class="border border-gray-300 px-2 py-2">budi@email.com</td>
          <td class="border border-gray-300 px-2 py-2">083456789012</td>
          <td class="border border-gray-300 px-2 py-2">
            <span class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Pending</span>
          </td>
          <td class="border border-gray-300 px-2 py-2">
            <div class="flex justify-center gap-2">
              <button class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
              <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
          </td>
        </tr>
        <tr>
          <td class="border border-gray-300 px-2 py-2">A004</td>
          <td class="border border-gray-300 px-2 py-2">Dewi Lestari</td>
          <td class="border border-gray-300 px-2 py-2">dewi@email.com</td>
          <td class="border border-gray-300 px-2 py-2">084567890123</td>
          <td class="border border-gray-300 px-2 py-2">
            <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">Aktif</span>
          </td>
          <td class="border border-gray-300 px-2 py-2">
            <div class="flex justify-center gap-2">
              <button class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
              <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
          </td>
        </tr>
        <tr>
          <td class="border border-gray-300 px-2 py-2">A005</td>
          <td class="border border-gray-300 px-2 py-2">Rudi Hermawan</td>
          <td class="border border-gray-300 px-2 py-2">rudi@email.com</td>
          <td class="border border-gray-300 px-2 py-2">085678901234</td>
          <td class="border border-gray-300 px-2 py-2">
            <span class="bg-red-500 text-white px-2 py-1 rounded text-sm">Non-Aktif</span>
          </td>
          <td class="border border-gray-300 px-2 py-2">
            <div class="flex justify-center gap-2">
              <button class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
              <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>

