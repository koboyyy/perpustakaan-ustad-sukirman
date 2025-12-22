<div class="relative w-full">
  {{-- Pencarian Anggota --}}
  <div class="flex gap-7 items-center w-full">
    <form action="#" method="GET"
      class="flex w-full bg-white rounded-3xl shadow-full p-1 pl-4 backdrop-blur-sm ring-1 ring-[#9BA4B5]/50 focus-within:ring-2 focus-within:ring-[#394867] transition"
      autocomplete="off" onsubmit="return false;">
      {{-- Input --}}
      <input type="text" name="pencarian" placeholder="Cari anggota..." id="pencarian-anggota"
        autocomplete="off" value="{{ request('pencarian') }}"
        class="bg-transparent flex-1 py-3 px-2 text-[#212A3E] placeholder-[#9BA4B5] focus:outline-none text-md rounded-l-3xl" />
      <button
        class="bg-gradient-to-tr from-[#394867] to-[#212A3E] text-white font-semibold px-6 py-2 rounded-3xl shadow hover:from-[#212A3E] hover:to-[#394867] transition-all"
        type="button" id="btn-cari-anggota">
        <i class="fa-solid fa-magnifying-glass mr-2"></i>Cari
      </button>
    </form>
  </div>

  {{-- Hasil Pencarian --}}
  <div id="hasil-anggota"
    class="bg-white z-[1000] border border-2 rounded-2xl w-full absolute top-[70px] p-0 hidden">
    <ul id="list-hasil-anggota" class="divide-y divide-gray-200 max-h-64 overflow-y-auto"></ul>
  </div>
</div>

<script src="https://code.jquery.com/jquery-
{{-- 
  Perbaikan fitur autocomplete pencarian anggota: 
  - Navigasi ArrowDown/Up selalu terlihat benar,
  - Enter & klik pada item terpilih pasti mengisi input dengan benar,
  - Tombol "Cari" juga trigger pencarian (bukan submit form biasa),
  - Bug index/hightlighting hilang,
  - Scroll ke item aktif benar.
--}}3.6.0.min.js"></script>
<script>
  let activeAnggotaIndex = -1;
  let anggotaSuggestionData = [];

  function showAnggotaSuggestionBox() {
    $('#hasil-anggota').removeClass('hidden').addClass('block');
  }

  function hideAnggotaSuggestionBox() {
    $('#hasil-anggota').removeClass('block').addClass('hidden');
    activeAnggotaIndex = -1;
  }

  function updateActiveAnggotaSuggestion() {
    const $lis = $('#list-hasil-anggota li');
    $lis.removeClass('bg-[#9BA4B5]/20 font-bold');
    if (activeAnggotaIndex >= 0 && activeAnggotaIndex < $lis.length) {
      $lis.eq(activeAnggotaIndex)
        .addClass('bg-[#9BA4B5]/20 font-bold');
    }
  }

  function renderAnggotaSuggestions(data) {
    const listHasil = $('#list-hasil-anggota');
    listHasil.empty();
    anggotaSuggestionData = data;
    activeAnggotaIndex = -1;

    if (anggotaSuggestionData.length === 0) {
      hideAnggotaSuggestionBox();
      return;
    }

    showAnggotaSuggestionBox();
    anggotaSuggestionData.forEach(function(item, idx) {
      // field nama_lengkap & email_anggota dari backend (lihat controller)
      let namaAnggota = item.nama_lengkap ?? item.nama ?? '';
      let noInduk = item.nik ?? '';
      let email = item.email_anggota ?? item.email ?? '';
      let id = item.id ?? '';
      listHasil.append(
        `<li class="py-2 px-3 hover:bg-[#9BA4B5]/10 cursor-pointer text-[#212A3E]" 
           data-idx="${idx}" data-nama="${namaAnggota}" data-id="${id}">
        <span class="font-semibold">${namaAnggota}</span>
        <span class="block text-xs text-[#394867]/60">${(noInduk ? noInduk : '')}${email ? ' &mdash; ' + email : ''}</span>
      </li>`
      );
    });
  }

  function fetchAnggotaSuggestion(keyword) {
    if (keyword.length === 0) {
      anggotaSuggestionData = [];
      $('#list-hasil-anggota').empty();
      hideAnggotaSuggestionBox();
      return;
    }
    $.get('/live-search-anggota', {
      keyword: keyword
    }, function(data) {
      // PASTIKAN selalu array
      let arr = [];
      if (Array.isArray(data)) arr = data;
      else if (typeof data === 'object' && data !== null && data.data && Array.isArray(data
          .data)) arr = data.data;
      renderAnggotaSuggestions(arr);
    }).fail(function() {
      anggotaSuggestionData = [];
      $('#list-hasil-anggota').empty();
      hideAnggotaSuggestionBox();
    });
  }

  // Trigger search on input
  $('#pencarian-anggota').on('input', function() {
    const val = $(this).val();
    fetchAnggotaSuggestion(val);
  });

  // Trigger search on button click
  $('#btn-cari-anggota').on('click', function() {
    const val = $('#pencarian-anggota').val();
    fetchAnggotaSuggestion(val);
    $('#pencarian-anggota').focus();
  });

  // NAVIGATION: Arrow up/down & enter
  $('#pencarian-anggota').on('keydown', function(e) {
    const $lis = $('#list-hasil-anggota li');
    const len = $lis.length;
    if (!len) return;

    if (e.key === 'ArrowDown') {
      e.preventDefault();
      activeAnggotaIndex = (activeAnggotaIndex + 1) % len;
      updateActiveAnggotaSuggestion();

      // SCROLL ke highlight aktif
      let $active = $lis.eq(activeAnggotaIndex);
      let parent = $('#list-hasil-anggota');
      let offsetTop = $active.position().top;
      let scroll = parent.scrollTop();
      let liHeight = $active.outerHeight();
      let boxHeight = parent.innerHeight();
      if (offsetTop + liHeight > boxHeight) {
        parent.scrollTop(scroll + offsetTop + liHeight - boxHeight);
      } else if (offsetTop < 0) {
        parent.scrollTop(scroll + offsetTop);
      }
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      if (activeAnggotaIndex <= 0) activeAnggotaIndex = len - 1;
      else activeAnggotaIndex--;
      updateActiveAnggotaSuggestion();

      let $active = $lis.eq(activeAnggotaIndex);
      let parent = $('#list-hasil-anggota');
      let offsetTop = $active.position().top;
      let scroll = parent.scrollTop();
      if (offsetTop < 0) {
        parent.scrollTop(scroll + offsetTop);
      } else if (offsetTop + $active.outerHeight() > parent.innerHeight()) {
        parent.scrollTop(scroll + offsetTop + $active.outerHeight() - parent.innerHeight());
      }
    } else if (e.key === 'Enter') {
      if (activeAnggotaIndex >= 0 && activeAnggotaIndex < anggotaSuggestionData.length) {
        e.preventDefault();
        let selected = anggotaSuggestionData[activeAnggotaIndex];
        let namaAnggota = selected.nama_lengkap ?? selected.nama ?? '';
        $('#pencarian-anggota').val(namaAnggota);
        hideAnggotaSuggestionBox();
      }
    } else if (e.key === 'Escape') {
      hideAnggotaSuggestionBox();
    }
  });

  // Mouse hover - highlight
  $('#list-hasil-anggota').on('mousemove', 'li', function() {
    activeAnggotaIndex = parseInt($(this).attr('data-idx'));
    updateActiveAnggotaSuggestion();
  });

  $('#list-hasil-anggota').on('mouseleave', function() {
    activeAnggotaIndex = -1;
    updateActiveAnggotaSuggestion();
  });

  // Klik pada suggestion
  $('#list-hasil-anggota').on('mousedown', 'li', function(e) {
    // pakai mousedown, bukan click agar sebelum blur
    let nama = $(this).data('nama');
    $('#pencarian-anggota').val(nama);
    hideAnggotaSuggestionBox();
    setTimeout(function() {
      $('#pencarian-anggota').focus();
    }, 0);
  });

  // Tutup list jika klik di luar
  $(document).on('mousedown', function(e) {
    if (!$(e.target).closest('#pencarian-anggota, #hasil-anggota').length) {
      hideAnggotaSuggestionBox();
    }
  });

  // Blur input: delayed, supaya klik pada li tetap masuk
  $('#pencarian-anggota').on('blur', function() {
    setTimeout(hideAnggotaSuggestionBox, 120);
  });
</script>
