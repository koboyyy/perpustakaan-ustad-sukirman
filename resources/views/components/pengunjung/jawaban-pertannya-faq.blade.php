    <div
      class="p-4 sm:p-5 bg-blue-100 space-y-2 rounded-xl shadow duration-500 transition-all card w-full max-w-full">
      <div class="flex justify-between items-center gap-2 w-full">
        <div
          class="font-semibold text-base xs:text-lg sm:text-xl flex items-center gap-2 break-words max-w-full">
          {{ $pertanyaan }}
        </div>
        <button
          class="rounded-full bg-blue-400 p-1.5 sm:p-2 transition hover:bg-blue-300 focus:outline-none btn-show flex-shrink-0"
          style="line-height: 1;">
          <svg xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5 sm:h-6 sm:w-6 text-white transition-transform duration-300" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke="currentColor" stroke-width="2" d="M12 6v12m6-6H6" />
          </svg>
        </button>
      </div>

      <div class="text-base xs:text-lg sm:text-xl jawaban hidden break-words max-w-full">
        {{ $jawaban }}
      </div>
    </div>
