<x-admin.dashboard>

  <div class="space-y-5">

    <x-admin.form-tambah-sumber />

    {{-- kotak konten --}}
    <div class="bg-white rounded-2xl shadow-[0px_4px_4px_0px_rgba(57,72,103,0.15)] overflow-hidden">
      {{-- Header kotak dan title --}}
      <div
        class="bg-linear-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex items-center px-[24px] py-[14px]">
        <div class="text-[14px] font-semibold"><i class="fa-solid fa-faucet"></i> Data Sumber</div>
      </div>

      <div class="w-full p-[24px] space-y-4">
        {{-- Tabel Sumber --}}
        <div class="overflow-auto">
          <div>

            <table class="w-full border border-[#394867] text-[13px]" id="tabel-sumber-admin">

              {{-- Judul Kolom --}}
              <thead>
                <tr class="bg-[#F1F6F9]">
                  <th class="border border-[#394867] px-2 py-0 text-[#212A3E] font-semibold w-10">
                    No
                  </th>
                  <th class="border border-[#394867] px-4 py-2 text-[#212A3E] font-semibold w-60">
                    Nama Sumber
                  </th>
                  <th class="border border-[#394867] px-3 py-2 text-[#212A3E] font-semibold w-24">
                    <i class="fa-solid fa-gear"></i> Aksi
                  </th>
                </tr>
              </thead>

              {{-- Data Tabel --}}
              <tbody id="tabel-sumber-body-admin">
                @forelse ($dataSumber as $index => $sumber)
                  <tr class="hover:bg-[#F1F6F9]/50 transition">
                    <td class="border border-[#9BA4B5] px-3 py-2 text-center nomor-sumber-td">
                      <!-- nomor akan diisi oleh JS -->
                    </td>

                    {{-- Nama Sumber --}}
                    <td class="border border-[#9BA4B5] px-3 py-2">
                      <div class="truncate max-w-[140px]" title="{{ $sumber->nama_sumber ?? '-' }}">
                        {{ $sumber->nama_sumber ?? '-' }}
                      </div>
                    </td>

                    {{-- Aksi --}}
                    <td class="border border-[#9BA4B5] px-3 py-2">
                      <div class="flex justify-center gap-2">
                        {{-- Edit --}}
                        <button type="button"
                          class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition editSumberBtn"
                          data-id="{{ $sumber->id }}" title="Edit Data">
                          <i class="fa-solid fa-pen"></i>
                        </button>
                        {{-- Hapus --}}
                        <button type="button"
                          class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition hapusSumberBtn"
                          data-id="{{ $sumber->id }}"
                          data-route="{{ url('/admin/sumber/' . $sumber->id) }}" title="Hapus Data">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3" class="text-center py-10 text-[#9BA4B5]">Tidak ada data
                      sumber.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin.dashboard>
