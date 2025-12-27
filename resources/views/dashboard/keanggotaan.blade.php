<x-admin.dashboard>

  <div class="w-full space-y-10 flex gap-5 flex-col md:flex-row">

    {{-- Modal Konfirmasi Hapus --}}
    <div id="hapusModal"
      class="fixed inset-0 z-9999 bg-black/40 flex items-center justify-center hidden">
      <div
        class="bg-white w-full max-w-sm rounded-2xl shadow-lg relative flex flex-col px-6 py-8 animate-fade-in">
        <button id="closeHapusModal"
          class="absolute top-3 right-4 text-gray-400 hover:text-gray-900 text-lg" type="button">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="flex flex-col items-center gap-3">
          <div class="rounded-full bg-red-100 text-red-600 p-4 shadow text-3xl mb-2">
            <i class="fa-solid fa-triangle-exclamation"></i>
          </div>
          <div class="text-[18px] font-semibold text-[#394867] mb-2 text-center">Konfirmasi Hapus
            Anggota</div>
          <div class="text-[#6B7280] text-center mb-5">Apakah Anda yakin ingin menghapus anggota
            ini?
            Proses ini tidak bisa dibatalkan.</div>
          <div class="flex gap-3 items-center justify-center w-full">
            <button type="button" id="batalHapusBtn"
              class="bg-[#F1F6F9] hover:bg-[#E9EDF3] text-[#394867] font-semibold px-5 py-2 rounded-lg transition">Batal</button>
            <button type="button" id="konfirmasiHapusBtn"
              class="bg-red-500 hover:bg-red-600 text-white font-semibold px-5 py-2 rounded-lg transition flex items-center gap-2">
              <span id="hapusBtnIcon"><i class="fa-solid fa-trash"></i></span>
              <span id="hapusBtnText">Hapus</span>
              <span id="hapusBtnLoader" class="hidden animate-spin"><i
                  class="fa-solid fa-spinner"></i></span>
            </button>
          </div>
        </div>
      </div>
    </div>

    {{-- Modal/Snackbar Success --}}
    <div id="hapusSuccessSnackbar"
      class="fixed left-1/2 -translate-x-1/2 bottom-8 z-9999 bg-green-500 text-white px-5 py-3 rounded-lg flex items-center gap-2 shadow-lg hidden animate-bounce-in">
      <i class="fa-solid fa-check-circle text-2xl"></i>
      <span>Anggota berhasil dihapus!</span>
    </div>

    {{-- Modal Detail Anggota --}}
    <div id="detailAnggotaModal"
      class="fixed inset-0 z-9999 bg-black/40 flex items-center justify-center hidden">
      <div
        class="bg-white w-full max-w-md rounded-2xl shadow-lg relative flex flex-col px-8 py-10 animate-fade-in">
        <button id="closeDetailAnggotaModal"
          class="absolute top-3 right-4 text-gray-400 hover:text-gray-900 text-lg" type="button">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="flex flex-col gap-3 items-center">
          <div class="rounded-full bg-blue-100 text-blue-600 p-4 shadow text-3xl mb-2">
            <i class="fa-solid fa-user"></i>
          </div>
          <div class="text-[18px] font-semibold text-[#394867] mb-2 text-center">
            Detail Anggota
          </div>
          <div id="detailAnggotaContent" class="w-full">
            <div class="flex flex-col gap-2">
              <div>
                <span class="text-[#6B7280]">Nama Lengkap:</span>
                <span class="font-medium text-[#394867]" id="anggotaDetailNama">-</span>
              </div>
              <div>
                <span class="text-[#6B7280]">Email:</span>
                <span class="font-medium text-[#394867]" id="anggotaDetailEmail">-</span>
              </div>
              <div>
                <span class="text-[#6B7280]">No. HP:</span>
                <span class="font-medium text-[#394867]" id="anggotaDetailNoHP">-</span>
              </div>
              <div>
                <span class="text-[#6B7280]">Tanggal Daftar:</span>
                <span class="font-medium text-[#394867]" id="anggotaDetailTanggal">-</span>
              </div>
            </div>
            <div id="anggotaDetailError" class="text-red-500 text-center mt-2 hidden">
              Data anggota tidak ditemukan.
            </div>
          </div>
        </div>
      </div>
    </div>

    <x-admin.form-pendaftaran-anggota></x-admin.form-pendaftaran-anggota>

    <div class="w-full">
      {{-- Title --}}
      <div class="text-[16px] font-semibold text-[#212A3E]"><i class="fa-solid fa-user-group"></i>
        Data Keanggotaan
      </div>

      <div
        class="w-full bg-white rounded-t-2xl overflow-hidden shadow-[0px_4px_4px_0px_rgba(57,72,103,0.15)]">
        {{-- Title --}}
        <div
          class="bg-gradient-to-r from-[#212A3E] via-[#394867] to-[#9BA4B5] text-white w-full flex items-center px-[24px] py-[14px]">
          <div class="text-[14px] font-semibold"><i class="fa-solid fa-user-group"></i> Data
            Keanggotaan
          </div>
        </div>

        <div class="w-full p-[24px] space-y-4">

          {{-- Table --}}
          <div class="overflow-auto">
            <table id="tabel-anggota" class="w-full border border-[#394867] ">
              <tr class="rounded-top-2xl">
                <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">No</th>
                <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Nama</th>
                <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Email</th>
                <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">No. HP
                </th>
                <th class="border border-[#394867] px-2 py-2 bg-[#F1F6F9] text-[#212A3E]">Aksi</th>
              </tr>

              @foreach ($dataAnggota as $anggota)
                <tr>
                  <td class="border border-[#9BA4B5] px-2 py-2 text-center nomor-data"></td>
                  <td class="border border-[#9BA4B5] px-2 py-2">{{ $anggota->nama_lengkap }}</td>
                  <td class="border border-[#9BA4B5] px-2 py-2">{{ $anggota->email }}</td>
                  <td class="border border-[#9BA4B5] px-2 py-2">{{ $anggota->no_hp }}</td>
                  <td class="border border-[#9BA4B5] px-2 py-2">
                    <div class="flex justify-center gap-2">
                      {{-- Detail --}}
                      <button type="button"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition detailAnggotaBtn"
                        data-id="{{ $anggota->id }}" title="Lihat Detail">
                        <i class="fa-solid fa-eye"></i>
                      </button>

                      {{-- Hapus --}}
                      {{-- <button type="button"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition hapusAnggotaBtn"
                        data-id="{{ $anggota->id }}"
                        data-route="{{ url('/admin/anggota/' . $anggota->id) }}" title="Hapus Data">
                        <i class="fa-solid fa-trash"></i>
                      </button> --}}
                    </div>
                  </td>
                </tr>
              @endforeach

            </table>

            <div class="mt-5">
              {{ $dataAnggota->links() }}
            </div>
          </div>

        </div>
      </div>
    </div>

    @vite('resources/js/table.js')
  </div>

</x-admin.dashboard>

{{-- Script Hapus Anggota --}}
<script>
  function updateNomorAnggotaTable() {
    const table = document.getElementById('tabel-anggota');
    let no = 1;
    Array.from(table.querySelectorAll('tr')).forEach(tr => {
      const tdNo = tr.querySelector('.nomor-data');
      if (tdNo) tdNo.textContent = no++;
    });
  }

  updateNomorAnggotaTable();

  // --- Modal Hapus Data Anggota ---
  const hapusModal = document.getElementById('hapusModal');
  const closeHapusModal = document.getElementById('closeHapusModal');
  const batalHapusBtn = document.getElementById('batalHapusBtn');
  const konfirmasiHapusBtn = document.getElementById('konfirmasiHapusBtn');
  const hapusBtnLoader = document.getElementById('hapusBtnLoader');
  const hapusBtnText = document.getElementById('hapusBtnText');
  const hapusSuccessSnackbar = document.getElementById('hapusSuccessSnackbar');

  let hapusFormAction = '';
  let hapusRow = null;

  document.body.addEventListener('click', function(e) {
    // Hapus anggota
    if (e.target.closest('.hapusAnggotaBtn')) {
      const btn = e.target.closest('.hapusAnggotaBtn');
      hapusFormAction = btn.getAttribute('data-route');
      hapusRow = btn.closest('tr');
      hapusModal.classList.remove('hidden');
      hapusBtnText.classList.remove('hidden');
      hapusBtnLoader.classList.add('hidden');
      konfirmasiHapusBtn.disabled = false;
    }
  });

  if (closeHapusModal) {
    closeHapusModal.addEventListener('click', function() {
      hapusModal.classList.add('hidden');
    });
  }
  if (batalHapusBtn) {
    batalHapusBtn.addEventListener('click', function() {
      hapusModal.classList.add('hidden');
    });
  }

  if (konfirmasiHapusBtn) {
    konfirmasiHapusBtn.addEventListener('click', function() {
      if (!hapusFormAction || !hapusRow) return;
      konfirmasiHapusBtn.disabled = true;
      hapusBtnText.classList.add('hidden');
      hapusBtnLoader.classList.remove('hidden');

      // Kode berikut digunakan untuk menghapus data anggota dari tabel secara asynchronous/melalui AJAX.
      // Penjelasan langkah-per-langkah:
      // 1. fetch() dipanggil ke URL (hapusFormAction) yang merupakan endpoint penghapusan/DELETE anggota.
      // 2. Metode yang digunakan adalah POST, tapi pada body dikirim _method: 'DELETE' agar Laravel memprosesnya sebagai DELETE (standar Laravel).
      // 3. Header 'X-CSRF-TOKEN' berisi token CSRF untuk keamanan permintaan (agar request valid & tidak rentan CSRF).
      // 4. Setelah fetch, .then(res => {...}) dipakai untuk menangani respon.
      //    - Jika respon gagal (!res.ok), maka error dilempar ke catch().
      //    - Jika sukses, baris anggota langsung dihapus (hapusRow.remove()), modal hapus ditutup, dan nomor urut pada tabel diperbarui.
      //    - Selain itu, snackbar notifikasi sukses (hapusSuccessSnackbar) ditampilkan sementara, lalu disembunyikan setelah 1.8 detik.
      // 5. Jika error, tombol dan loader direset ke semula dan alert "Gagal menghapus data" ditampilkan.

      fetch(hapusFormAction, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest',
          },
          body: new URLSearchParams({
            _method: 'DELETE'
          }),
        })
        .then(async res => {
          if (!res.ok) {
            let errorMsg = 'Unknown error';
            try {
              const data = await res.json();
              errorMsg = data.message || JSON.stringify(data);
            } catch (err) {
              try {
                const text = await res.text();
                errorMsg = text;
              } catch (e2) {}
            }
            throw new Error(errorMsg);
          }
          // Jika berhasil, baris anggota dihapus dari DOM/tabel, modal ditutup, nomor tabel diupdate,
          // dan snackbar notifikasi sukses ditampilkan sementara.
          hapusRow.remove();
          hapusModal.classList.add('hidden');
          updateNomorAnggotaTable();

          if (hapusSuccessSnackbar) {
            hapusSuccessSnackbar.classList.remove('hidden');
            setTimeout(() => {
              hapusSuccessSnackbar.classList.add('hidden');
            }, 1800);
          }
        })
        .catch((e) => {
          // Jika gagal: tombol "hapus" diaktifkan kembali, loader disembunyikan, dan alert error ditampilkan.
          konfirmasiHapusBtn.disabled = false;
          hapusBtnText.classList.remove('hidden');
          hapusBtnLoader.classList.add('hidden');
          alert('Gagal menghapus data. Error: ' + (e && e.message ? e.message : e));
        });
    });
  }
</script>

{{-- Script Detail Anggota --}}
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const detailAnggotaModal = document.getElementById("detailAnggotaModal");
    const closeDetailAnggotaModal = document.getElementById("closeDetailAnggotaModal");
    const anggotaDetailNama = document.getElementById("anggotaDetailNama");
    const anggotaDetailEmail = document.getElementById("anggotaDetailEmail");
    const anggotaDetailNoHP = document.getElementById("anggotaDetailNoHP");
    const anggotaDetailTanggal = document.getElementById("anggotaDetailTanggal");
    const anggotaDetailError = document.getElementById("anggotaDetailError");

    // Delegasi tombol detail - pastikan setiap baris ada tombol .detailAnggotaBtn dengan data-id
    document.body.addEventListener("click", async function(e) {
      if (e.target.closest('.detailAnggotaBtn')) {
        const id = e.target.closest('.detailAnggotaBtn').getAttribute('data-id');
        anggotaDetailError.classList.add("hidden");
        anggotaDetailNama.textContent = "-";
        anggotaDetailEmail.textContent = "-";
        anggotaDetailNoHP.textContent = "-";
        anggotaDetailTanggal.textContent = "-";

        detailAnggotaModal.classList.remove("hidden");

        try {
          // Fetch detail anggota by id
          const res = await fetch(`/admin/anggota/${id}`);
          if (!res.ok) throw new Error();
          const data = await res.json();
          if (!data.success || !data.data) throw new Error();

          const anggota = data.data;
          anggotaDetailNama.textContent = anggota.nama_lengkap ?? "-";
          anggotaDetailEmail.textContent = anggota.email ?? "-";
          anggotaDetailNoHP.textContent = anggota.no_hp ?? "-";
          // Format tanggal daftar jika ada
          if (anggota.created_at) {
            const tgl = new Date(anggota.created_at);
            anggotaDetailTanggal.textContent = tgl.toLocaleDateString('id-ID', {
              year: 'numeric',
              month: 'long',
              day: 'numeric',
            });
          } else {
            anggotaDetailTanggal.textContent = "-";
          }
        } catch (err) {
          anggotaDetailError.classList.remove("hidden");
        }
      }
    });

    // Tutup modal detail anggota
    closeDetailAnggotaModal.addEventListener("click", function() {
      detailAnggotaModal.classList.add("hidden");
    });

    detailAnggotaModal.addEventListener("click", function(e) {
      if (e.target === detailAnggotaModal) {
        detailAnggotaModal.classList.add("hidden");
      }
    });
  });
</script>
