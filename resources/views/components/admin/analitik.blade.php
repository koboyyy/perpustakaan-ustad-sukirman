<div class="w-full mb-100 lg:mb-0">
  {{-- Title --}}
  <div class="text-[16px] font-semibold mb-4 text-[#212A3E]">
    <i class="fa-solid fa-chart-line"></i>
    Analitik
  </div>

  <style>
    .analitik-animated-box {
      transition: box-shadow 0.3s cubic-bezier(.4, 0, .2, 1), transform 0.3s cubic-bezier(.4, 0, .2, 1);
      background: #fff !important;
      box-shadow: 0 6px 24px 0 rgba(33, 42, 62, 0.10), 0 1.5px 8px 0 rgba(36, 55, 99, 0.10);
      will-change: transform, box-shadow;
      f
    }

    .analitik-animated-box:hover {
      box-shadow: 0 14px 40px -8px rgba(33, 42, 62, 0.16), 0 6px 30px 0 rgba(60, 56, 74, 0.13);
      transform: translateY(-4px) scale(1.025);
      z-index: 2;
    }
  </style>

  <div class="flex flex-col w-full space-y-[30px] max-w-[1690.7px] mx-auto">
    {{-- Section A --}}
    <section class="w-full flex gap-[27px] flex-wrap lg:flex-nowrap">
      {{-- Box Judul Buku --}}
      <div
        class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="flex items-center gap-2 text-[#394867]">
            <i class="fa-solid fa-book"></i> Judul Buku
          </div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#394867] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-book"></i>
            </div>
            <div class="text-[#394867]">5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Jumlah Salinan --}}
      <div
        class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="flex items-center gap-2 text-[#394867]">
            <i class="fa-solid fa-copy"></i> Jumlah Salinan
          </div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#394867] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-copy"></i>
            </div>
            <div class="text-[#394867]">5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Pemustaka --}}
      <div
        class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="flex items-center gap-2 text-[#394867]">
            <i class="fa-solid fa-user"></i> Pemustaka
          </div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#394867] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-user"></i>
            </div>
            <div class="text-[#394867]">5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Dipinjam --}}
      <div
        class="analitik-animated-box relative flex w-full items-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="flex items-center gap-2 text-[#394867]">
            <i class="fa-solid fa-book-open-reader"></i> Buku Dipinjam
          </div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#394867] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-book-open-reader"></i>
            </div>
            <div class="text-[#394867]">5.000</div>
          </div>
        </div>
      </div>
    </section>

    {{-- Section B --}}
    <section
      class="lg:grid grid-cols-6 gap-[27px] grid-rows-6 flex flex-wrap w-full h-180 font-semibold">
      {{-- Box Trend Peminjaman --}}
      <div
        class="analitik-animated-box relative flex flex-col items-center w-full col-span-2 row-span-3 justify-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="relative z-10 w-full rounded-[10px] flex flex-col items-center">
          <div class="flex items-center gap-2 text-[#394867]">
            <i class="fa-solid fa-chart-area"></i> Trend Peminjaman Buku
          </div>
          <canvas id="trend-peminjaman"></canvas>
        </div>
      </div>

      <div
        class="analitik-animated-box relative flex flex-col items-center w-full col-span-2 row-span-3 justify-center rounded-[14px] p-[20px] overflow-hidden">
        <div class="relative z-10 w-full rounded-[10px] flex flex-col items-center">
          <div class="flex items-center gap-2 text-[#212A3E]">
            <i class="fa-solid fa-chart-line"></i> Trend Pertumbuhan Pemustaka
          </div>
          <canvas id="trend-pertumbuhan-pemustaka"></canvas>
        </div>
      </div>

      {{-- Box Analitik Baru: Distribusi Kategori Buku --}}
      <div
        class="analitik-animated-box relative flex gap-6 w-full col-span-2 row-span-3 items-center flex-col rounded-[18px] p-[32px] bg-gradient-to-tr from-[#F1F6F9] via-white to-[#9BA4B5] shadow border border-[#D6E4F0]">
        <div class="relative z-10 w-full rounded-[14px] flex flex-col items-center gap-4">
          <div
            class="text-[18px] font-extrabold tracking-wide text-[#212A3E] flex items-center gap-2">
            <i class="fa-solid fa-chart-pie text-[#394867]"></i>
            Distribusi Kategori Buku
          </div>
          <div class="text-[#394867] text-[15px] text-center max-w-[670px]">
            <canvas id="pie-distribusi-kategori-buku" width="220" height="120"></canvas>
          </div>
        </div>
      </div>

      {{-- Box Buku Favorite --}}
      <div
        class="analitik-animated-box relative flex gap-6 w-full col-span-4 row-span-3 items-center flex-col rounded-[18px] p-[32px] bg-gradient-to-tr from-[#F1F6F9] via-[#9BA4B5] to-white shadow-lg overflow-hidden border border-[#D6E4F0]">
        <div class="relative z-10 w-full rounded-[14px] flex flex-col items-center gap-6">
          <div
            class="text-[18px] font-extrabold tracking-wide text-[#394867] flex items-center gap-2">
            <i class="fa-solid fa-star text-[#F6C23E] animate-bounce"></i>
            Buku Favorite
          </div>
          <div id="box-buku-favorit"
            class="flex gap-6 font-normal overflow-x-auto justify-center w-full py-2">
            @for ($i = 1; $i <= 6; $i++)
              <div
                class="flex flex-col gap-2 items-center shrink-0 group p-2 transition-transform duration-300 hover:-translate-y-2">
                <div class="relative">
                  <img
                    class="w-[85px] h-[110px] bg-gradient-to-br from-[#D6E4F0] via-[#F1F6F9] to-[#9BA4B5] border-2 border-[#D6E4F0] rounded-lg shadow-xl object-cover transition duration-300 group-hover:border-[#394867] group-hover:shadow-2xl">
                  <span
                    class="absolute -top-2 -right-2 bg-[#F6C23E] text-[#212A3E] text-[11px] px-2 py-1 rounded-full shadow-md font-bold group-hover:bg-[#FFD700]">Top
                    {{ $i }}</span>
                </div>
                <div
                  class="flex items-center gap-1 text-[#212A3E] font-semibold text-[14px] text-center truncate max-w-[80px] group-hover:text-[#394867]">
                  <i class="fa-solid fa-book text-[#394867]"></i> Judul Buku Favorit
                  {{ $i }}
                </div>
              </div>
            @endfor
          </div>
        </div>
      </div>

      {{-- Box Top Pemustaka --}}
      <div
        class="analitik-animated-box relative flex min-w-1/2 flex-col gap-6 w-full items-center rounded-[18px] p-[28px] overflow-hidden col-span-2 row-span-3 bg-gradient-to-br from-[#F1F6F9] via-[#D6E4F0] to-[#9BA4B5] shadow-lg border border-[#D6E4F0]">
        <div class="relative z-10 w-full rounded-[14px] flex flex-col gap-6 items-center">
          <div
            class="text-[#212A3E] text-[18px] font-extrabold tracking-wide flex items-center gap-2 mb-2">
            <i class="fa-solid fa-crown text-[#F6C23E] animate-bounce"></i>
            Top Pemustaka
          </div>
          <div id="box-top-pemustaka" class="flex gap-[20px] justify-center">
            <div class="flex flex-col items-center gap-2">
              <div class="relative">
                <img
                  class="w-[70px] h-[70px] bg-gradient-to-tr from-[#9BA4B5] via-[#F1F6F9] to-[#D6E4F0] rounded-full shadow-xl border-4 border-white object-cover">
                <span
                  class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-gradient-to-r from-[#F1F6F9] via-[#D6E4F0] to-[#9BA4B5] px-3 py-1 text-xs text-[#212A3E] font-bold rounded-full shadow border border-[#9BA4B5] animate-pulse">#1</span>
              </div>
              <span class="flex items-center gap-1 text-[14px] text-[#212A3E] font-bold">
                <i class="fa-solid fa-user text-[#394867]"></i> Nama 1
              </span>
            </div>
            <div class="flex flex-col items-center gap-2">
              <div class="relative">
                <img
                  class="w-[65px] h-[65px] bg-gradient-to-tr from-[#F1F6F9] via-[#9BA4B5] to-[#D6E4F0] rounded-full shadow-md border-4 border-white object-cover opacity-90">
                <span
                  class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-[#D6E4F0] px-3 py-1 text-xs text-[#212A3E] font-semibold rounded-full shadow border border-[#394867]">#2</span>
              </div>
              <span class="flex items-center gap-1 text-[13px] text-[#394867] font-semibold">
                <i class="fa-solid fa-user text-[#394867]"></i> Nama 2
              </span>
            </div>
            <div class="flex flex-col items-center gap-2">
              <div class="relative">
                <img
                  class="w-[60px] h-[60px] bg-gradient-to-tr from-[#F1F6F9] via-[#D6E4F0] to-[#9BA4B5] rounded-full shadow border-4 border-white object-cover opacity-80">
                <span
                  class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-[#F1F6F9] px-3 py-1 text-xs text-[#394867] font-medium rounded-full shadow border border-[#D6E4F0]">#3</span>
              </div>
              <span class="flex items-center gap-1 text-[12px] text-[#9BA4B5]">
                <i class="fa-solid fa-user text-[#9BA4B5]"></i> Nama 3
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @vite('resources/js/analitik.js')
</div>
