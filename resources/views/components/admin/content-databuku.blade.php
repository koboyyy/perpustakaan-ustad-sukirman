<div class="w-full">
  {{-- Title --}}
  <div class="text-[16px] font-semibold mb-4"><i class="fa-solid fa-book"></i> Data-data Buku</div>

  <div class="w-full bg-white rounded-2xl overflow-hidden shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">

    {{-- Title --}}
    <div
      class="bg-gradient-to-r from-purple-600 via-purple-400 to-purple-200 opacity-[0.9] text-black w-full flex items-center px-[24px] py-[14px]">
      <div class="text-[14px] font-semibold">Data Buku</div>
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

      <nav class="flex justify-between">
        {{-- Tambah Buku --}}
        <x-add-data></x-add-data>

        <x-pencarian></x-pencarian>
      </nav>

      {{-- Table --}}
      <table class="w-full border border-gray-400">
        <tr>
          <th class="border border-gray-400 px-2 py-2">Judul</th>
          <th class="border border-gray-400 px-2 py-2">Pengarang</th>
          <th class="border border-gray-400 px-2 py-2">Penerbit</th>
          <th class="border border-gray-400 px-2 py-2">Tahun</th>
          <th class="border border-gray-400 px-2 py-2">ISBN</th>
          <th class="border border-gray-400 px-2 py-2">Delete</th>
        </tr>

        <tr>
          <td class="border border-gray-300 px-2 py-2">Laskar Pelangi</td>
          <td class="border border-gray-300 px-2 py-2">Andrea Hirata</td>
          <td class="border border-gray-300 px-2 py-2">Bentang Pustaka</td>
          <td class="border border-gray-300 px-2 py-2">2005</td>
          <td class="border border-gray-300 px-2 py-2">9789791227204</td>
          <td class="border border-gray-300 px-2 py-2">
            <div class="flex justify-center">
              <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
          </td>
        </tr>
        <tr>
          <td class="border border-gray-300 px-2 py-2">Negeri 5 Menara</td>
          <td class="border border-gray-300 px-2 py-2">Ahmad Fuadi</td>
          <td class="border border-gray-300 px-2 py-2">Gramedia</td>
          <td class="border border-gray-300 px-2 py-2">2009</td>
          <td class="border border-gray-300 px-2 py-2">9789792221972</td>
          <td class="border border-gray-300 px-2 py-2">
            <div class="flex justify-center">
              <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
          </td>
        </tr>
        <tr>
          <td class="border border-gray-300 px-2 py-2">Bumi Manusia</td>
          <td class="border border-gray-300 px-2 py-2">Pramoedya Ananta Toer</td>
          <td class="border border-gray-300 px-2 py-2">Lentera Dipantara</td>
          <td class="border border-gray-300 px-2 py-2">1980</td>
          <td class="border border-gray-300 px-2 py-2">9789799731238</td>
          <td class="border border-gray-300 px-2 py-2">
            <div class="flex justify-center">
              <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
          </td>
        </tr>
        <tr>
          <td class="border border-gray-300 px-2 py-2">Dilan: Dia adalah Dilanku Tahun 1990</td>
          <td class="border border-gray-300 px-2 py-2">Pidi Baiq</td>
          <td class="border border-gray-300 px-2 py-2">Pastel Books</td>
          <td class="border border-gray-300 px-2 py-2">2014</td>
          <td class="border border-gray-300 px-2 py-2">9786027870412</td>
          <td class="border border-gray-300 px-2 py-2">
            <div class="flex justify-center">
              <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
          </td>
        </tr>
        <tr>
          <td class="border border-gray-300 px-2 py-2">Ayat-ayat Cinta</td>
          <td class="border border-gray-300 px-2 py-2">Habiburrahman El Shirazy</td>
          <td class="border border-gray-300 px-2 py-2">Republika</td>
          <td class="border border-gray-300 px-2 py-2">2004</td>
          <td class="border border-gray-300 px-2 py-2">9789791101862</td>
          <td class="border border-gray-300 px-2 py-2">
            <div class="flex justify-center">
              <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
          </td>
        </tr>
      </table>

    </div>

  </div>
</div>
