    <div class="p-5 bg-blue-100 space-y-2 rounded-xl shadow duration-500 transition-all card">
      <div class="flex justify-between items-center">
        <div class="font-semibold text-xl flex items-center gap-2">
          {{ $pertanyaan }}
        </div>

        <button
          class="rounded-full bg-blue-400 p-2 transition hover:bg-blue-300 focus:outline-none btn-show">
          <svg xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 text-white transition-transform duration-300" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke="currentColor" stroke-width="2" d="M12 6v12m6-6H6" />
          </svg>
        </button>
      </div>

      <div class="text-xl jawaban hidden">
        {{ $jawaban }}
      </div>
    </div>
