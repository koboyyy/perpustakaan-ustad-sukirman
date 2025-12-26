 <div class="font-bold items-center">

   <x-pengunjung.sub-title title="Kelebihan Situs Web"
     subtitle="Berikut ini adalah kelebihan dari situs web perpustakaan ustadz sukirman"></x-pengunjung.sub-title>

   <div class="container grid grid-cols-3 gap-5 mx-auto">
     {{-- Card 1 --}}
     <div
       class="bg-white rounded-2xl border border-amber-100 flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-0">
       <div
         class="w-20 h-20 rounded-2xl bg-amber-200 flex items-center justify-center text-4xl text-amber-600">
         <i class="fa-solid fa-magnifying-glass"></i>
       </div>
       <div>Mempermudah Pencarian Buku</div>
     </div>

     {{-- Card 2 --}}
     <div
       class="bg-white rounded-2xl border border-amber-100 flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-100">
       <div
         class="w-20 h-20 rounded-2xl bg-amber-200 flex items-center justify-center text-4xl text-amber-600">
         <i class="fa-solid fa-book-open"></i>
       </div>
       <div>Informasi Perpustakaan Perpustakaan Yang Lengkap</div>
     </div>

     {{-- Card 3 --}}
     <div
       class="bg-white rounded-2xl border border-amber-100 flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-200">
       <div
         class="w-20 h-20 rounded-2xl bg-amber-200 flex items-center justify-center text-4xl text-amber-600">
         <i class="fa-solid fa-database"></i>
       </div>
       <div>Efisiensi Pengelolaan Data</div>
     </div>

     {{-- Card 4 --}}
     <div
       class="bg-white rounded-2xl border border-amber-100 flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-300">
       <div
         class="w-20 h-20 rounded-2xl bg-amber-200 flex items-center justify-center text-4xl text-amber-600">
         <i class="fa-solid fa-leaf"></i>
       </div>
       <div>Menghemat Penggunaan Kertas</div>
     </div>

     {{-- Card 5 --}}
     <div
       class="bg-white rounded-2xl border border-amber-100 flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-400">
       <div
         class="w-20 h-20 rounded-2xl bg-amber-200 flex items-center justify-center text-4xl text-amber-600">
         <i class="fa-solid fa-chart-line"></i>
       </div>
       <div>Meningkatkan Kualitas Pelayanan</div>
     </div>

     {{-- Card 6 --}}
     <div
       class="bg-white rounded-2xl border border-amber-100 flex p-4 items-center gap-4 transition-transform duration-300 hover:scale-105 hover:shadow-lg animate-fade-up animate-delay-500">
       <div
         class="w-20 h-20 rounded-2xl bg-amber-200 flex items-center justify-center text-4xl text-amber-600">
         <i class="fa-solid fa-display"></i>
       </div>
       <div>Responsif Disain</div>
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
   </style>
 </div>
