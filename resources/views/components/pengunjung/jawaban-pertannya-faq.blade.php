    <div
      class="p-4 sm:p-5 bg-[#F1F6F9] space-y-2 rounded-xl shadow duration-500 transition-all card w-full max-w-[700px] text-[#383d47] hover:cursor-pointer mx-auto">
      <div class="flex justify-between items-center gap-2 w-full">
        <div
          class="font-semibold text-base xs:text-lg sm:text-xl flex items-center gap-2 wrap-break-words max-w-full text-[#383d47]">
          {{ $pertanyaan }}
        </div>
        <button
          class="rounded-full bg-[#394867] p-1.5 sm:p-2 transition hover:bg-[#9BA4B5] focus:outline-none btn-show shrink-0 hover:cursor-pointer"
          style="line-height: 1;">
          <svg xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5 sm:h-6 sm:w-6 text-[rgb(255,109,31)] transition-transform duration-300"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke="currentColor" stroke-width="2" d="M12 6v12m6-6H6" />
          </svg>
        </button>
      </div>

      <div class="text-base xs:text-lg sm:text-xl jawaban hidden wrap-break-words max-w-full">
        {{ $jawaban }}
      </div>
    </div>
