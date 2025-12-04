<div class="w-full">
  {{-- Title --}}
  <div class="text-[16px] font-semibold mb-4"><i class="fa-solid fa-chart-line"></i> Analitik</div>

  <div class="flex flex-col w-full space-y-[30px] max-w-[1690.7px] mx-auto">
    {{-- Section A --}}
    <section class="w-full flex gap-[27px]">
      {{-- Box Judul Buku --}}
      <div
        class="flex w-full items-center bg-white rounded-[14px] p-[20px] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
        <div class="flex flex-col gap-[14px] font-bold">
          <div>Judul Buku</div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#FF0000] w-10 h-10 flex justify-center items-center text-white rounded-[4px]">
              <i class="fa-solid fa-book"></i>
            </div>
            <div>5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Jumlah Salinan --}}
      <div
        class="flex w-full items-center bg-white rounded-[14px] p-[20px] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
        <div class="flex flex-col gap-[14px] font-bold">
          <div>Jumlah Salinan</div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#45CE4B] w-10 h-10 flex justify-center items-center text-white rounded-[4px]">
              <i class="fa-solid fa-copy"></i>
            </div>
            <div>5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Pemustaka --}}
      <div
        class="flex w-full items-center bg-white rounded-[14px] p-[20px] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
        <div class="flex flex-col gap-[14px] font-bold">
          <div>Pemustaka</div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#F07C29] w-10 h-10 flex justify-center items-center text-white rounded-[4px]">
              <i class="fa-solid fa-user"></i>
            </div>
            <div>5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Dipinjam --}}
      <div
        class="flex w-full items-center bg-white rounded-[14px] p-[20px] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
        <div class="flex flex-col gap-[14px] font-bold">
          <div>Buku Dipinjam</div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#00AEFF] w-10 h-10 flex justify-center items-center text-white rounded-[4px]">
              <i class="fa-solid fa-book-open-reader"></i>
            </div>
            <div>5.000</div>
          </div>
        </div>
      </div>
    </section>

    {{-- Section B --}}
    <section class="grid grid-cols-4 gap-[27px] grid-rows-3 w-full h-180 font-semibold">
      {{-- Box Trend Peminjaman --}}
      <div
        class="flex flex-col items-center w-full col-span-2 row-span-2 justify-center bg-white rounded-[14px] p-[20px] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
        <div>Trend Peminjaman Buku</div>
        <canvas id="trend-peminjaman"></canvas>
      </div>

      {{-- Box Tren Pertumbuhan --}}
      <div
        class="flex flex-col w-full col-span-2 row-span-1 items-center justify-center bg-white rounded-[14px] p-[20px] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
        <div>Trend Pertumbuhan Pemustaka</div>
        <canvas id="trend-pertumbuhan-pemustaka"></canvas>
      </div>

      {{-- Box Top Pemustaka --}}
      <div
        class="flex flex-col gap-[24px] w-full col-span-2 row-span-1 items-center bg-white rounded-[14px] p-[20px] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
        <div>Top Pemustaka</div>
        <div id="box-top-pemustaka" class="flex gap-[16px]">
          <img class="w-[62px] h-[62px] bg-gray-300 rounded-full">
          <img class="w-[62px] h-[62px] bg-gray-300 rounded-full">
          <img class="w-[62px] h-[62px] bg-gray-300 rounded-full">
          <img class="w-[62px] h-[62px] bg-gray-300 rounded-full">
          <img class="w-[62px] h-[62px] bg-gray-300 rounded-full">
        </div>
      </div>

      {{-- Box Buku Favorite --}}
      <div
        class="flex gap-4 w-full col-span-4 row-span-1 items-center flex-col bg-white rounded-[14px] p-[20px] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]">
        <div>Buku Favorite</div>
        <div id="box-buku-favorit" class="flex gap-4 font-light">
          <div class="flex flex-col gap-1 items-center">
            <img class="w-[75px] h-[100px] bg-gray-300 rounded">
            <div>Judul</div>
          </div>
          <div class="flex flex-col gap-1 items-center">
            <img class="w-[75px] h-[100px] bg-gray-300 rounded">
            <div>Judul</div>
          </div>
          <div class="flex flex-col gap-1 items-center">
            <img class="w-[75px] h-[100px] bg-gray-300 rounded">
            <div>Judul</div>
          </div>
          <div class="flex flex-col gap-1 items-center">
            <img class="w-[75px] h-[100px] bg-gray-300 rounded">
            <div>Judul</div>
          </div>
          <div class="flex flex-col gap-1 items-center">
            <img class="w-[75px] h-[100px] bg-gray-300 rounded">
            <div>Judul</div>
          </div>
          <div class="flex flex-col gap-1 items-center">
            <img class="w-[75px] h-[100px] bg-gray-300 rounded">
            <div>Judul</div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
