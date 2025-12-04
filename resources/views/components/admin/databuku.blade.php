<div class="w-full space-y-4">
  {{-- Title --}}
  <div class="text-[16px] font-semibold text-purple-700"><i class="fa-solid fa-book"></i>
    Data-data Buku</div>

  <div class="flex justify-between flex-wrap gap-4">
    <x-admin.pencarian />
    <x-admin.add-data type="Anggota" />
  </div>

  <div
    class="w-full bg-white rounded-2xl shadow-[0px_4px_4px_0px_rgba(103,53,187,0.15)] overflow-hidden">

    {{-- Title --}}
    <div
      class="bg-gradient-to-r from-purple-600 via-purple-500 to-purple-400 text-white w-full flex items-center px-[24px] py-[14px]">
      <div class="text-[14px] font-semibold"><i class="fa-solid fa-book"></i> Data Buku</div>
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
        <table class="w-full border border-purple-500 overflow-scroll">
          <tr>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">Judul</th>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">Pengarang
            </th>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">Penerbit
            </th>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">Tahun</th>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">ISBN</th>
            <th class="border border-purple-500 px-2 py-2 bg-purple-50 text-purple-800">Aksi</th>
          </tr>

          <tr>
            <td class="border border-purple-200 px-2 py-2">Laskar Pelangi</td>
            <td class="border border-purple-200 px-2 py-2">Andrea Hirata</td>
            <td class="border border-purple-200 px-2 py-2">Bentang Pustaka</td>
            <td class="border border-purple-200 px-2 py-2">2005</td>
            <td class="border border-purple-200 px-2 py-2">9789791227204</td>
            <td class="border border-purple-200 px-2 py-2">
              <div class="flex justify-center gap-2">
                <button
                  class="bg-purple-300 hover:bg-purple-400 text-purple-900 px-3 py-1 rounded">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td class="border border-purple-200 px-2 py-2">Negeri 5 Menara</td>
            <td class="border border-purple-200 px-2 py-2">Ahmad Fuadi</td>
            <td class="border border-purple-200 px-2 py-2">Gramedia</td>
            <td class="border border-purple-200 px-2 py-2">2009</td>
            <td class="border border-purple-200 px-2 py-2">9789792221972</td>
            <td class="border border-purple-200 px-2 py-2">
              <div class="flex justify-center gap-2">
                <button
                  class="bg-purple-300 hover:bg-purple-400 text-purple-900 px-3 py-1 rounded">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td class="border border-purple-200 px-2 py-2">Bumi Manusia</td>
            <td class="border border-purple-200 px-2 py-2">Pramoedya Ananta Toer</td>
            <td class="border border-purple-200 px-2 py-2">Lentera Dipantara</td>
            <td class="border border-purple-200 px-2 py-2">1980</td>
            <td class="border border-purple-200 px-2 py-2">9789799731238</td>
            <td class="border border-purple-200 px-2 py-2">
              <div class="flex justify-center gap-2">
                <button
                  class="bg-purple-300 hover:bg-purple-400 text-purple-900 px-3 py-1 rounded">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td class="border border-purple-200 px-2 py-2">Dilan: Dia adalah Dilanku Tahun 1990</td>
            <td class="border border-purple-200 px-2 py-2">Pidi Baiq</td>
            <td class="border border-purple-200 px-2 py-2">Pastel Books</td>
            <td class="border border-purple-200 px-2 py-2">2014</td>
            <td class="border border-purple-200 px-2 py-2">9786027870412</td>
            <td class="border border-purple-200 px-2 py-2">
              <div class="flex justify-center gap-2">
                <button
                  class="bg-purple-300 hover:bg-purple-400 text-purple-900 px-3 py-1 rounded">Delete</button>
              </div>
            </td>
          </tr>
          <tr>
            <td class="border border-purple-200 px-2 py-2">Ayat-ayat Cinta</td>
            <td class="border border-purple-200 px-2 py-2">Habiburrahman El Shirazy</td>
            <td class="border border-purple-200 px-2 py-2">Republika</td>
            <td class="border border-purple-200 px-2 py-2">2004</td>
            <td class="border border-purple-200 px-2 py-2">9789791101862</td>
            <td class="border border-purple-200 px-2 py-2">
              <div class="flex justify-center gap-2">
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
