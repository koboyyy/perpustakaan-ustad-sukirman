<div class="font-bold flex flex-col items-center w-full px-2 sm:px-6">

  <x-pengunjung.sub-title title="Kelebihan Situs Web"
    subtitle="Berikut ini adalah kelebihan dari situs web perpustakaan ustadz sukirman"></x-pengunjung.sub-title>

  <div class="container max-w-6xl mx-auto w-full">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
      {{-- Card 1 --}}
      <div
        class="bg-white rounded-2xl border border-[rgb(57,72,103,0.2)] flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-0 w-full min-w-0">
        <div
          class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-[rgb(255,109,31)] flex items-center justify-center text-3xl sm:text-4xl text-[rgb(241,241,241)] shrink-0">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="text-xs sm:text-base">Mempermudah Pencarian Buku</div>
      </div>
      {{-- Card 2 --}}
      <div
        class="bg-white rounded-2xl border border-[rgb(57,72,103,0.2)] flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-100 w-full min-w-0">
        <div
          class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-[rgb(255,109,31)] flex items-center justify-center text-3xl sm:text-4xl text-[rgb(241,241,241)] shrink-0">
          <i class="fa-solid fa-book-open"></i>
        </div>
        <div class="text-xs sm:text-base">Informasi Perpustakaan Perpustakaan Yang Lengkap</div>
      </div>
      {{-- Card 3 --}}
      <div
        class="bg-white rounded-2xl border border-[rgb(57,72,103,0.2)] flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-200 w-full min-w-0">
        <div
          class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-[rgb(255,109,31)] flex items-center justify-center text-3xl sm:text-4xl text-[rgb(241,241,241)] shrink-0">
          <i class="fa-solid fa-database"></i>
        </div>
        <div class="text-xs sm:text-base">Efisiensi Pengelolaan Data</div>
      </div>
      {{-- Card 4 --}}
      <div
        class="bg-white rounded-2xl border border-[rgb(57,72,103,0.2)] flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-300 w-full min-w-0">
        <div
          class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-[rgb(255,109,31)] flex items-center justify-center text-3xl sm:text-4xl text-[rgb(241,241,241)] shrink-0">
          <i class="fa-solid fa-leaf"></i>
        </div>
        <div class="text-xs sm:text-base">Menghemat Penggunaan Kertas</div>
      </div>
      {{-- Card 5 --}}
      <div
        class="bg-white rounded-2xl border border-[rgb(57,72,103,0.2)] flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-400 w-full min-w-0">
        <div
          class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-[rgb(255,109,31)] flex items-center justify-center text-3xl sm:text-4xl text-[rgb(241,241,241)] shrink-0">
          <i class="fa-solid fa-chart-line"></i>
        </div>
        <div class="text-xs sm:text-base">Meningkatkan Kualitas Pelayanan</div>
      </div>
      {{-- Card 6 --}}
      <div
        class="bg-white rounded-2xl border border-[rgb(57,72,103,0.2)] flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-500 w-full min-w-0">
        <div
          class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-[rgb(255,109,31)] flex items-center justify-center text-3xl sm:text-4xl text-[rgb(241,241,241)] shrink-0">
          <i class="fa-solid fa-display"></i>
        </div>
        <div class="text-xs sm:text-base">Responsif Disain</div>
      </div>
    </div>
  </div>

  {{-- Tambahkan keyframes kalau belum ada di Tailwind config --}}
  <style>
    @keyframes fade-up {
      0% {
        opacity: 0;
        transform: translateY(30px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fade-up {
      animation: fade-up 0.7s cubic-bezier(.43, 1.15, .57, .99) both;
    }

    .animate-delay-0 {
      animation-delay: 0s;
    }

    .animate-delay-100 {
      animation-delay: 0.1s;
    }

    .animate-delay-200 {
      animation-delay: 0.2s;
    }

    .animate-delay-300 {
      animation-delay: 0.3s;
    }

    .animate-delay-400 {
      animation-delay: 0.4s;
    }

    .animate-delay-500 {
      animation-delay: 0.5s;
    }

    /* Responsive Font and Container */
    @media (max-width: 640px) {
      .container {
        padding-left: 0.25rem;
        padding-right: 0.25rem;
      }

      .grid>div>div:last-child {
        font-size: 0.85rem;
      }
    }

    @media (max-width: 480px) {
      .container {
        padding-left: 0rem;
        padding-right: 0rem;
      }

      .grid {
        gap: 0.7rem !important;
      }

      .grid>div>div:last-child {
        font-size: 0.75rem;
      }
    }
  </style>
</div>
