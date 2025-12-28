<div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6 ">

  <div class="text-lg font-semibold mb-4 text-[#394867]">
    <i class="fa-solid fa-clipboard-list mr-2"></i>
    Formulir Peminjaman Buku
  </div>

  @if (session('success'))
    <div
      class="relative px-4 py-3 mb-4 rounded-xl bg-green-100 border border-green-400 text-green-800 flex items-center"
      role="alert" id="success-message">
      <i class="fa-solid fa-check-circle mr-2 text-green-600 text-xl"></i>
      <span class="block">{{ session('success') }}</span>
      <button type="button" onclick="this.parentElement.style.display='none'"
        class="absolute top-2 right-3 text-green-900 hover:text-green-600 font-bold text-xl focus:outline-none"
        aria-label="close">&times;</button>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
          var msg = document.getElementById('success-message');
          if (msg) {
            msg.style.transition = "opacity 0.5s";
            msg.style.opacity = 0;
            setTimeout(function() {
              msg.style.display = "none";
            }, 500);
          }
        }, 3000);
      });
    </script>
  @endif

  @if ($errors->any())
    <div class="relative px-4 py-3 mb-4 rounded-xl bg-red-100 border border-red-400 text-red-800"
      role="alert" id="error-message">
      <div class="flex items-start gap-2">
        <i class="fa-solid fa-circle-exclamation text-red-600 text-xl mt-1"></i>
        <div class="list-disc pl-1 text-[14px]">
          @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
          @endforeach
        </div>
      </div>
      <button type="button" onclick="this.parentElement.style.display='none'"
        class="absolute top-2 right-3 text-red-900 hover:text-red-600 font-bold text-xl focus:outline-none"
        aria-label="close">&times;</button>
    </div>
  @endif

  <form action="{{ route('store_peminjaman') }}" method="POST" class="space-y-4">
    @csrf
    {{-- Informasi Anggota --}}
    <div class="relative">
      <label for="nama_lengkap" class="block mb-1 text-sm">Nama Anggota/Username
        <span class="font-bold" style="color: rgb(255,109,31);">*</span>
      </label>
      <input type="text" id="nama_lengkap" name="nama_lengkap" required autocomplete="off"
        autocapitalize="off" spellcheck="false"
        class="w-full border border-black/10 rounded px-2 py-1 focus:outline-none" readonly
        onfocus="this.removeAttribute('readonly');">

      <div id="sugestion-anggota"
        class="border hidden absolute top-full left-0 w-full bg-white z-50">
        {{-- Saran Nama Anggota --}}
      </div>
    </div>

    <div>
      <label for="id_anggota" class="block mb-1 text-sm">ID Anggota
        <span class="font-bold" style="color: rgb(255,109,31);">*</span>
      </label>
      <input type="text" id="id_anggota" name="id_anggota" required
        class="w-full border border-black/10 rounded px-2 py-1 bg-gray-100 cursor-not-allowed focus:outline-none"
        placeholder="" readonly>
    </div>

    <div class="flex w-full gap-3">
      {{-- Informasi Buku 1 --}}
      <div class="grow">
        <div>Buku Satu</div>
        <div class="relative">
          <label for="judul_buku" class="block mb-1 text-sm">Judul Buku
            <span class="font-bold" style="color: rgb(255,109,31);">*</span>
          </label>
          <input type="text" id="judul_buku" name="judul_buku" required
            class="w-full border border-black/10 rounded px-2 py-1 focus:outline-none"
            placeholder="Judul buku, pisahkan dengan koma jika lebih dari satu" autocomplete="off"
            autocapitalize="off" spellcheck="false">

          <div id="sugestion-buku" class="border hidden absolute top-full left-0 w-full bg-white">
            {{-- Saran Buku --}}
          </div>
        </div>

        <div>
          <label for="id_buku" class="block mb-1 text-sm">ID Buku
            <span class="font-bold" style="color: rgb(255,109,31);">*</span>
          </label>
          <input type="text" id="id_buku" name="id_buku" required
            class="w-full border border-black/10 rounded px-2 py-1 bg-gray-100 cursor-not-allowed focus:outline-none"
            placeholder="" readonly>
        </div>

        <div>
          <label for="pengarang" class="block mb-1 text-sm">Pengarang
            <span class="font-bold" style="color: rgb(255,109,31);">*</span>
          </label>
          <input type="text" id="pengarang" name="pengarang" required
            class="w-full border border-black/10 rounded px-2 py-1 bg-gray-100 cursor-not-allowed focus:outline-none"
            placeholder="" readonly>
        </div>

        <div>
          <label for="penerbit" class="block mb-1 text-sm">Penerbit
            <span class="font-bold" style="color: rgb(255,109,31);">*</span>
          </label>
          <input type="text" id="penerbit" name="penerbit" required
            class="w-full border border-black/10 rounded px-2 py-1 bg-gray-100 cursor-not-allowed focus:outline-none"
            placeholder="" readonly>
        </div>

        <div>
          <label for="tahun_terbit" class="block mb-1 text-sm">Tahun Terbit
            <span class="font-bold" style="color: rgb(255,109,31);">*</span>
          </label>
          <input type="text" id="tahun_terbit" name="tahun_terbit" required
            class="w-full border border-black/10 rounded px-2 py-1 bg-gray-100 cursor-not-allowed focus:outline-none"
            placeholder="" readonly>
        </div>
      </div>

      {{-- Informasi Buku 2 --}}
      <div class="grow">
        <div>Buku Dua</div>
        <div class="relative">
          <label for="judul_buku_2" class="block mb-1 text-sm">Judul Buku
            <span class="font-bold" style="color: rgb(255,109,31);">*</span>
          </label>
          <input type="text" id="judul_buku_2" name="judul_buku_2"
            class="w-full border border-black/10 rounded px-2 py-1 focus:outline-none"
            placeholder="Judul buku, pisahkan dengan koma jika lebih dari satu" autocomplete="off"
            autocapitalize="off" spellcheck="false">

          <div id="sugestion-buku-2"
            class="border hidden absolute top-full left-0 w-full bg-white">
            {{-- Saran Buku --}}
          </div>
        </div>

        <div>
          <label for="id_buku_2" class="block mb-1 text-sm">ID Buku
            <span class="font-bold" style="color: rgb(255,109,31);">*</span>
          </label>
          <input type="text" id="id_buku_2" name="id_buku_2" required
            class="w-full border border-black/10 rounded px-2 py-1 bg-gray-100 cursor-not-allowed focus:outline-none"
            placeholder="" readonly>
        </div>

        <div>
          <label for="pengarang_2" class="block mb-1 text-sm">Pengarang
            <span class="font-bold" style="color: rgb(255,109,31);">*</span>
          </label>
          <input type="text" id="pengarang_2" name="pengarang_2" required
            class="w-full border border-black/10 rounded px-2 py-1 bg-gray-100 cursor-not-allowed focus:outline-none"
            placeholder="" readonly>
        </div>

        <div>
          <label for="penerbit" class="block mb-1 text-sm">Penerbit
            <span class="font-bold" style="color: rgb(255,109,31);">*</span>
          </label>
          <input type="text" id="penerbit_2" name="penerbit_2" required
            class="w-full border border-black/10 rounded px-2 py-1 bg-gray-100 cursor-not-allowed focus:outline-none"
            placeholder="" readonly>
        </div>

        <div>
          <label for="tahun_terbit_2" class="block mb-1 text-sm">Tahun Terbit
            <span class="font-bold" style="color: rgb(255,109,31);">*</span>
          </label>
          <input type="text" id="tahun_terbit_2" name="tahun_terbit_2" required
            class="w-full border border-black/10 rounded px-2 py-1 bg-gray-100 cursor-not-allowed focus:outline-none"
            placeholder="" readonly>
        </div>
      </div>
    </div>

    {{-- Tanggal Pinjam --}}
    <div>
      <label for="tanggal_peminjaman" class="block mb-1 text-sm">Tanggal Peminjaman
        <span class="font-bold" style="color: rgb(255,109,31);">*</span>
      </label>
      <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" required
        class="w-full border border-black/10 rounded px-2 py-1 focus:outline-none">
    </div>

    {{-- Catatan --}}
    <div>
      <label for="catatan_2" class="block mb-1 text-sm">Catatan (opsional)</label>
      <textarea id="catatan_2" name="catatan_2" rows="2"
        class="w-full border border-black/10 rounded px-2 py-1 focus:outline-none"></textarea>
    </div>
    {{-- Tombol Simpan --}}
    <button type="submit"
      class="w-full bg-[#394867] text-white py-2 rounded hover:bg-[#212A3E] transition">Simpan</button>
  </form>

</div>

{{-- Script Sugestion Anggota --}}
<script>
  const fieldAnggota = document.getElementById('nama_lengkap');
  const fieldIdAnggota = document.getElementById('id_anggota')
  const sugestionAnggota = document.getElementById('sugestion-anggota')

  // Fungsi Live Search
  fieldAnggota.addEventListener('keyup', function(e) {
    if (['ArrowUp', 'ArrowDown', 'Enter', 'Escape'].includes(e.key)) {
      return;
    }

    sugestionAnggota.innerHTML = '';

    const keyword = fieldAnggota.value.trim();

    if (keyword.length > 0) {
      sugestionAnggota.classList.remove('hidden');
      fetch(`/live-search-anggota?keyword=${encodeURIComponent(keyword)}`)
        .then(response => response.json())
        .then(data => {
          if (Array.isArray(data) && data.length > 0) {
            sugestionAnggota.classList.remove('hidden')
            data.forEach(anggota => {
              const div = document.createElement('div');
              div.className = 'cursor-pointer py-2 hover:bg-[#F1F6F9] px-4';
              div.textContent =
                `${anggota.nama_lengkap ?? ''} (${anggota.username ?? ''}) - ID: ${anggota.id ?? ''}`;
              div.onclick = function() {
                fieldAnggota.value = anggota.nama_lengkap;
                fieldIdAnggota.value = anggota.id;
                sugestionAnggota.innerHTML = '';
                sugestionAnggota.classList.add(
                  'hidden'); // Tutup kotak sugesti setelah dipilih
              };
              sugestionAnggota.appendChild(div);
            });
          } else {
            const div = document.createElement('div');
            div.className = 'py-1 px-2 text-gray-400';
            div.textContent = 'Tidak ditemukan anggota';
            sugestionAnggota.appendChild(div);
          }
        })
        .catch(() => {
          const div = document.createElement('div');
          div.className = 'py-1 px-2 text-gray-400';
          div.textContent = 'Gagal memuat data anggota';
          sugestionAnggota.appendChild(div);
        });
    } else {
      sugestionAnggota.classList.add('hidden')
    }
  });

  // Navigasi Saran Menggunakan Keyboard
  fieldAnggota.addEventListener('keydown', function(e) {
    const listEls = sugestionAnggota.querySelectorAll('div.cursor-pointer');
    if (!listEls.length) return;

    // Cari index aktif saat ini
    let activeIndex = Array.from(listEls).findIndex(el => el.classList.contains(
      'bg-[#9BA4B5]/20'));

    if (e.key === 'ArrowDown') {
      e.preventDefault();
      if (activeIndex < listEls.length - 1) {
        activeIndex++;
      } else {
        activeIndex = 0; // kalau di akhir, kembali ke awal (looping)
      }
      listEls.forEach(el => {
        el.classList.remove('bg-[#9BA4B5]/20', 'font-bold');
      });
      listEls[activeIndex].classList.add('bg-[#9BA4B5]/20', 'font-bold');
      // scroll jika perlu
      const $active = listEls[activeIndex];
      const $parent = sugestionAnggota;
      const activeTop = $active.offsetTop;
      const activeBottom = activeTop + $active.offsetHeight;
      const parentScroll = $parent.scrollTop;
      if (activeBottom > $parent.clientHeight + parentScroll) {
        $parent.scrollTop = parentScroll + (activeBottom - (parentScroll + $parent
          .clientHeight));
      } else if (activeTop < parentScroll) {
        $parent.scrollTop = activeTop;
      }
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      if (activeIndex > 0) {
        activeIndex--;
      } else {
        activeIndex = listEls.length - 1; // kalau di awal, ke akhir (looping)
      }
      listEls.forEach(el => {
        el.classList.remove('bg-[#9BA4B5]/20', 'font-bold');
      });
      listEls[activeIndex].classList.add('bg-[#9BA4B5]/20', 'font-bold');
      // scroll jika perlu
      const $active = listEls[activeIndex];
      const $parent = sugestionAnggota;
      const activeTop = $active.offsetTop;
      const activeBottom = activeTop + $active.offsetHeight;
      const parentScroll = $parent.scrollTop;
      if (activeTop < parentScroll) {
        $parent.scrollTop = activeTop;
      } else if (activeBottom > $parent.clientHeight + parentScroll) {
        $parent.scrollTop = parentScroll + (activeBottom - (parentScroll + $parent
          .clientHeight));
      }
    } else if (e.key === 'Enter') {
      sugestionAnggota.classList.add('hidden')
      e.preventDefault();
      if (activeIndex >= 0 && activeIndex < listEls.length) {
        listEls[activeIndex].click();
      }
    } else if (e.key === 'Escape') {
      sugestionAnggota.classList.add('hidden');
      sugestionAnggota.innerHTML = '';
    }
  });

  // Tambah fungsi: klik di luar input dan sugestion box, tutup sugestion box
  document.addEventListener('click', function(event) {
    // Untuk anggota
    if (
      !fieldAnggota.contains(event.target) &&
      !sugestionAnggota.contains(event.target)
    ) {
      sugestionAnggota.classList.add('hidden');
      sugestionAnggota.innerHTML = '';
    }
    // Untuk buku 1
    if (
      typeof fieldBuku !== 'undefined' &&
      typeof sugestionBuku !== 'undefined' &&
      !fieldBuku.contains(event.target) &&
      !sugestionBuku.contains(event.target)
    ) {
      sugestionBuku.classList.add('hidden');
      sugestionBuku.innerHTML = '';
    }
    // Untuk buku 2
    if (
      typeof fieldBukuDua !== 'undefined' &&
      typeof sugestionBukuDua !== 'undefined' &&
      !fieldBukuDua.contains(event.target) &&
      !sugestionBukuDua.contains(event.target)
    ) {
      sugestionBukuDua.classList.add('hidden');
      sugestionBukuDua.innerHTML = '';
    }
  });
</script>

{{-- Script Sugestion Buku 1 --}}
<script>
  const fieldBuku = document.getElementById('judul_buku');
  const fieldIdBuku = document.getElementById('id_buku');
  const sugestionBuku = document.getElementById('sugestion-buku')
  const fieldPengarang = document.getElementById('pengarang')
  const fieldPenerbit = document.getElementById('penerbit')
  const fieldTahunTerbit = document.getElementById('tahun_terbit')

  // Fungsi Live Search
  fieldBuku.addEventListener('keyup', function(e) {
    if (['ArrowUp', 'ArrowDown', 'Enter', 'Escape'].includes(e.key)) {
      return;
    }

    sugestionBuku.innerHTML = '';

    const keyword = fieldBuku.value.trim();

    if (keyword.length > 0) {
      sugestionBuku.classList.remove('hidden');
      fetch(`/live-search-buku?keyword=${encodeURIComponent(keyword)}`)
        .then(response => response.json())
        .then(data => {
          if (Array.isArray(data) && data.length > 0) {
            sugestionBuku.classList.remove('hidden')
            data.forEach(buku => {
              console.log(buku)
              const div = document.createElement('div');
              div.className = 'cursor-pointer py-2 hover:bg-[#F1F6F9] px-4';
              div.textContent =
                `${buku.judul_buku ?? ''} (${buku.pengarang ?? ''}) - ID: ${buku.tahun_terbit ?? ''}`;
              div.onclick = function() {
                fieldBuku.value = buku.judul_buku;
                fieldIdBuku.value = buku.id;
                fieldPengarang.value = buku.pengarang;
                fieldPenerbit.value = buku.penerbit.nama_penerbit;
                fieldTahunTerbit.value = buku.tahun_terbit;
                sugestionBuku.innerHTML = '';
                sugestionBuku.classList.add(
                  'hidden'); // Tutup kotak sugesti setelah dipilih
              };
              sugestionBuku.appendChild(div);
            });
          } else {
            const div = document.createElement('div');
            div.className = 'py-1 px-2 text-gray-400';
            div.textContent = 'Buku tidak di temukan';
            sugestionBuku.appendChild(div);
          }
        })
        .catch(() => {
          const div = document.createElement('div');
          div.className = 'py-1 px-2 text-gray-400';
          div.textContent = 'Gagal memuat data buku';
          sugestionBuku.appendChild(div);
        });
    } else {
      sugestionBuku.classList.add('hidden')
    }
  });

  // Navigasi Saran Menggunakan Keyboard
  fieldBuku.addEventListener('keydown', function(e) {
    const listEls = sugestionBuku.querySelectorAll('div.cursor-pointer');
    if (!listEls.length) return;

    // Cari index aktif saat ini
    let activeIndex = Array.from(listEls).findIndex(el => el.classList.contains(
      'bg-[#9BA4B5]/20'));

    if (e.key === 'ArrowDown') {
      e.preventDefault();
      if (activeIndex < listEls.length - 1) {
        activeIndex++;
      } else {
        activeIndex = 0; // kalau di akhir, kembali ke awal (looping)
      }
      listEls.forEach(el => {
        el.classList.remove('bg-[#9BA4B5]/20', 'font-bold');
      });
      listEls[activeIndex].classList.add('bg-[#9BA4B5]/20', 'font-bold');
      // scroll jika perlu
      const $active = listEls[activeIndex];
      const $parent = sugestionBuku;
      const activeTop = $active.offsetTop;
      const activeBottom = activeTop + $active.offsetHeight;
      const parentScroll = $parent.scrollTop;
      if (activeBottom > $parent.clientHeight + parentScroll) {
        $parent.scrollTop = parentScroll + (activeBottom - (parentScroll + $parent
          .clientHeight));
      } else if (activeTop < parentScroll) {
        $parent.scrollTop = activeTop;
      }
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      if (activeIndex > 0) {
        activeIndex--;
      } else {
        activeIndex = listEls.length - 1; // kalau di awal, ke akhir (looping)
      }
      listEls.forEach(el => {
        el.classList.remove('bg-[#9BA4B5]/20', 'font-bold');
      });
      listEls[activeIndex].classList.add('bg-[#9BA4B5]/20', 'font-bold');
      // scroll jika perlu
      const $active = listEls[activeIndex];
      const $parent = sugestionBuku;
      const activeTop = $active.offsetTop;
      const activeBottom = activeTop + $active.offsetHeight;
      const parentScroll = $parent.scrollTop;
      if (activeTop < parentScroll) {
        $parent.scrollTop = activeTop;
      } else if (activeBottom > $parent.clientHeight + parentScroll) {
        $parent.scrollTop = parentScroll + (activeBottom - (parentScroll + $parent
          .clientHeight));
      }
    } else if (e.key === 'Enter') {
      sugestionBuku.classList.add('hidden')
      e.preventDefault();
      if (activeIndex >= 0 && activeIndex < listEls.length) {
        listEls[activeIndex].click();
      }
    } else if (e.key === 'Escape') {
      sugestionBuku.classList.add('hidden');
      sugestionBuku.innerHTML = '';
    }
  });
</script>

{{-- Script Sugestion Buku 2 --}}
<script>
  // Untuk Buku Dua

  const fieldBukuDua = document.getElementById('judul_buku_2');
  const fieldIdBukuDua = document.getElementById('id_buku_2')
  const sugestionBukuDua = document.getElementById('sugestion-buku-2');
  const fieldPengarangDua = document.getElementById('pengarang_2');
  const fieldPenerbitDua = document.getElementById('penerbit_2');
  const fieldTahunTerbitDua = document.getElementById('tahun_terbit_2');

  // Fungsi Live Search untuk Buku Dua
  fieldBukuDua.addEventListener('keyup', function(e) {
    if (['ArrowUp', 'ArrowDown', 'Enter', 'Escape'].includes(e.key)) {
      return;
    }

    sugestionBukuDua.innerHTML = '';

    const keyword = fieldBukuDua.value.trim();

    if (keyword.length > 0) {
      sugestionBukuDua.classList.remove('hidden');
      fetch(`/live-search-buku?keyword=${encodeURIComponent(keyword)}`)
        .then(response => response.json())
        .then(data => {
          if (Array.isArray(data) && data.length > 0) {
            sugestionBukuDua.classList.remove('hidden');
            data.forEach(buku => {
              const div = document.createElement('div');
              div.className = 'cursor-pointer py-2 hover:bg-[#F1F6F9] px-4';
              div.textContent =
                `${buku.judul_buku ?? ''} (${buku.pengarang ?? ''}) - ID: ${buku.tahun_terbit ?? ''}`;

              // Tidak perlu menutup di sini, karena penutupan akan dilakukan di event click global
              div.onclick = function() {
                fieldBukuDua.value = buku.judul_buku;
                fieldIdBukuDua.value = buku.id;
                fieldPengarangDua.value = buku.pengarang;
                fieldPenerbitDua.value = buku.penerbit.nama_penerbit;
                fieldTahunTerbitDua.value = buku.tahun_terbit;
              };
              sugestionBukuDua.appendChild(div);
            });
          } else {
            const div = document.createElement('div');
            div.className = 'py-1 px-2 text-gray-400';
            div.textContent = 'Buku tidak di temukan';
            sugestionBukuDua.appendChild(div);
          }
        })
        .catch(() => {
          const div = document.createElement('div');
          div.className = 'py-1 px-2 text-gray-400';
          div.textContent = 'Gagal memuat data buku';
          sugestionBukuDua.appendChild(div);
        });
    } else {
      sugestionBukuDua.classList.add('hidden');
    }
  });

  // Navigasi Saran Menggunakan Keyboard untuk Buku Dua
  fieldBukuDua.addEventListener('keydown', function(e) {
    const listEls = sugestionBukuDua.querySelectorAll('div.cursor-pointer');
    if (!listEls.length) return;

    // Cari index aktif saat ini
    let activeIndex = Array.from(listEls).findIndex(el => el.classList.contains(
      'bg-[#9BA4B5]/20'));

    if (e.key === 'ArrowDown') {
      e.preventDefault();
      if (activeIndex < listEls.length - 1) {
        activeIndex++;
      } else {
        activeIndex = 0; // looping ke awal
      }
      listEls.forEach(el => {
        el.classList.remove('bg-[#9BA4B5]/20', 'font-bold');
      });
      listEls[activeIndex].classList.add('bg-[#9BA4B5]/20', 'font-bold');
      // scroll jika perlu
      const $active = listEls[activeIndex];
      const $parent = sugestionBukuDua;
      const activeTop = $active.offsetTop;
      const activeBottom = activeTop + $active.offsetHeight;
      const parentScroll = $parent.scrollTop;
      if (activeBottom > $parent.clientHeight + parentScroll) {
        $parent.scrollTop = parentScroll + (activeBottom - (parentScroll + $parent
          .clientHeight));
      } else if (activeTop < parentScroll) {
        $parent.scrollTop = activeTop;
      }
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      if (activeIndex > 0) {
        activeIndex--;
      } else {
        activeIndex = listEls.length - 1; // looping ke akhir
      }
      listEls.forEach(el => {
        el.classList.remove('bg-[#9BA4B5]/20', 'font-bold');
      });
      listEls[activeIndex].classList.add('bg-[#9BA4B5]/20', 'font-bold');
      // scroll jika perlu
      const $active = listEls[activeIndex];
      const $parent = sugestionBukuDua;
      const activeTop = $active.offsetTop;
      const activeBottom = activeTop + $active.offsetHeight;
      const parentScroll = $parent.scrollTop;
      if (activeTop < parentScroll) {
        $parent.scrollTop = activeTop;
      } else if (activeBottom > $parent.clientHeight + parentScroll) {
        $parent.scrollTop = parentScroll + (activeBottom - (parentScroll + $parent
          .clientHeight));
      }
    } else if (e.key === 'Enter') {
      sugestionBukuDua.classList.add('hidden');
      e.preventDefault();
      if (activeIndex >= 0 && activeIndex < listEls.length) {
        listEls[activeIndex].click();
        sugestionBukuDua.classList.add('hidden'); // Pastikan tertutup juga di keyboard enter
      }
    } else if (e.key === 'Escape') {
      sugestionBukuDua.classList.add('hidden');
      sugestionBukuDua.innerHTML = '';
    }
  });

  // Jika klik pada kotak saran (bukan di luar), tutup kotak saran
  sugestionBukuDua.addEventListener('click', function(e) {
    // Tutup kotak saran apapun yang diklik di dalam box (div saran)
    sugestionBukuDua.classList.add('hidden');
    sugestionBukuDua.innerHTML = '';
  });

  // Jika klik di luar input maupun saran, tutup kotak saran (tidak mengganggu klik pada saran)
  document.addEventListener('click', function(event) {
    // Pastikan klik bukan pada input atau kotak saran itu sendiri
    if (
      !fieldBukuDua.contains(event.target) &&
      !sugestionBukuDua.contains(event.target)
    ) {
      sugestionBukuDua.classList.add('hidden');
    }
  });
</script>
</script>
<!-- Outline dan border focus berwarna rgb(255,109,31) -->
<style>
  input:focus,
  textarea:focus {
    outline: 1.5px solid rgb(255, 109, 31);
    outline-offset: 1px;
    border-color: rgb(255, 109, 31) !important;
    box-shadow: none !important;
  }

  input[type="date"]:focus {
    outline: 1.5px solid rgb(255, 109, 31);
    outline-offset: 1px;
    border-color: rgb(255, 109, 31) !important;
    box-shadow: none !important;
  }
</style>
<!-- End outline tipis dan border focus -->
</script>
</script>
</script>
