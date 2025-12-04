<div class="w-full mb-100 lg:mb-0">
  {{-- Title --}}
  <div class="text-[16px] font-semibold mb-4 text-[#6835BB]"><i class="fa-solid fa-chart-line"></i>
    Analitik
  </div>

  <div class="flex flex-col w-full space-y-[30px] max-w-[1690.7px] mx-auto">
    {{-- Section A --}}
    <section class="w-full flex gap-[27px] flex-wrap lg:flex-nowrap">
      {{-- Box Judul Buku --}}
      <div
        class="relative flex w-full items-center rounded-[14px] p-[20px] shadow-[0_4px_12px_0_rgba(103,53,187,0.13)] overflow-hidden bg-white">
        <div
          class="absolute inset-0 bg-gradient-to-r from-[#4876F9] via-[#A6C6FD] to-[#EDF5FF] opacity-20 z-0 rounded-[14px]">
        </div>
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="text-[#2D224C]">Judul Buku</div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#6835BB] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-book"></i>
            </div>
            <div class="text-[#2D224C]">5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Jumlah Salinan --}}
      <div
        class="relative flex w-full items-center rounded-[14px] p-[20px] shadow-[0_4px_12px_0_rgba(103,53,187,0.13)] overflow-hidden bg-white">
        <div
          class="absolute inset-0 bg-gradient-to-r from-[#4876F9] via-[#A6C6FD] to-[#EDF5FF] opacity-20 z-0 rounded-[14px]">
        </div>
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="text-[#2D224C]">Jumlah Salinan</div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#6835BB] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-copy"></i>
            </div>
            <div class="text-[#2D224C]">5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Pemustaka --}}
      <div
        class="relative flex w-full items-center rounded-[14px] p-[20px] shadow-[0_4px_12px_0_rgba(103,53,187,0.13)] overflow-hidden bg-white">
        <div
          class="absolute inset-0 bg-gradient-to-r from-[#4876F9] via-[#A6C6FD] to-[#EDF5FF] opacity-20 z-0 rounded-[14px]">
        </div>
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="text-[#2D224C]">Pemustaka</div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#6835BB] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-user"></i>
            </div>
            <div class="text-[#2D224C]">5.000</div>
          </div>
        </div>
      </div>

      {{-- Box Dipinjam --}}
      <div
        class="relative flex w-full items-center rounded-[14px] p-[20px] shadow-[0_4px_12px_0_rgba(103,53,187,0.13)] overflow-hidden bg-white">
        <div
          class="absolute inset-0 bg-gradient-to-r from-[#4876F9] via-[#A6C6FD] to-[#EDF5FF] opacity-20 z-0 rounded-[14px]">
        </div>
        <div class="flex flex-col gap-[14px] font-bold relative z-10 p-0 m-0 rounded-[10px]">
          <div class="text-[#2D224C]">Buku Dipinjam</div>
          <div class="flex gap-[14px] items-center">
            <div
              class="bg-[#6835BB] w-10 h-10 flex justify-center items-center text-white rounded-[6px] shadow-md">
              <i class="fa-solid fa-book-open-reader"></i>
            </div>
            <div class="text-[#2D224C]">5.000</div>
          </div>
        </div>
      </div>
    </section>

    {{-- Section B --}}
    <section
      class="lg:grid grid-cols-4 gap-[27px] grid-rows-3 flex flex-wrap w-full h-180 font-semibold">
      {{-- Box Trend Peminjaman --}}
      <div
        class="relative flex flex-col items-center w-full col-span-2 row-span-2 justify-center rounded-[14px] p-[20px] shadow-[0_4px_12px_0_rgba(103,53,187,0.13)] overflow-hidden bg-white">
        <div
          class="absolute inset-0 bg-gradient-to-br from-[#4876F9] via-[#A6C6FD] to-[#EDF5FF] opacity-25 z-0 rounded-[14px]">
        </div>
        <div class="relative z-10 w-full rounded-[10px] flex flex-col items-center">
          <div class="text-[#2D224C]">Trend Peminjaman Buku</div>
          <canvas id="trend-peminjaman"></canvas>
        </div>
      </div>

      <div class="w-full col-span-2 flex flex-wrap gap-[27px]">
        {{-- Box Tren Pertumbuhan --}}
        <div
          class="min-w-1/2 relative flex grow items-center justify-center rounded-[14px] p-[20px] shadow-[0_4px_12px_0_rgba(103,53,187,0.13)] overflow-hidden bg-white">
          <div
            class="absolute inset-0 bg-gradient-to-br from-[#4876F9] via-[#A6C6FD] to-[#EDF5FF] opacity-25 z-0 rounded-[14px]">
          </div>
          <div>
            <div class="text-[#2D224C]">Trend Pertumbuhan Pemustaka</div>
            <canvas id="trend-pertumbuhan-pemustaka"></canvas>
          </div>
        </div>

        {{-- Box Top Pemustaka --}}
        <div
          class="relative flex flex-col gap-[24px] w-full items-center rounded-[14px] p-[20px] shadow-[0_4px_12px_0_rgba(103,53,187,0.13)] overflow-hidden bg-white">
          <div
            class="absolute inset-0 bg-gradient-to-br from-[#4876F9] via-[#A6C6FD] to-[#EDF5FF] opacity-25 z-0 rounded-[14px]">
          </div>
          <div class="relative z-10 w-full rounded-[10px] flex flex-col gap-[24px] items-center">
            <div class="text-[#2D224C]">Top Pemustaka</div>
            <div id="box-top-pemustaka" class="flex gap-[16px]">
              <img class="w-[62px] h-[62px] bg-[#E8E6F3] rounded-full shadow">
              <img class="w-[62px] h-[62px] bg-[#E8E6F3] rounded-full shadow">
              <img class="w-[62px] h-[62px] bg-[#E8E6F3] rounded-full shadow">
            </div>
          </div>
        </div>
      </div>

      {{-- Box Buku Favorite --}}
      <div
        class="relative flex gap-4 w-full col-span-2 row-span-1 items-center flex-col rounded-[14px] p-[20px] shadow-[0_4px_12px_0_rgba(103,53,187,0.13)] overflow-hidden bg-white">
        <div
          class="absolute inset-0 bg-gradient-to-br from-[#4876F9] via-[#A6C6FD] to-[#EDF5FF] opacity-25 z-0 rounded-[14px]">
        </div>
        <div class="relative z-10 w-full rounded-[10px] flex flex-col items-center gap-4">
          <div class="text-[#2D224C]">Buku Favorite</div>
          <div id="box-buku-favorit" class="flex gap-4 font-light overflow-auto">
            @for ($i = 1; $i <= 6; $i++)
              <div class="flex flex-col gap-1 items-center shrink-0">
                <img class="w-[75px] h-[100px] bg-[#F2EFFE] rounded-lg shadow">
                <div class="text-[#4B405B]">Judul</div>
              </div>
            @endfor
          </div>
        </div>
    </section>
  </div>
</div>
