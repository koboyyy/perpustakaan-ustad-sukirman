<header class="w-full h-[500px] relative overflow-hidden">
  <!-- Background Gambar dan Dekorasi -->
  <div class="absolute inset-0 w-full h-full z-0">
    <img class="w-full h-full object-cover absolute inset-0 brightness-85 opacity-30"
      src="img/perpustakaan2.webp" alt="Perpustakaan" loading="lazy">
    <!-- Overlay gradasi tema -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#9BA4B5] via-[#394867] to-[#F1F6F9]">
    </div>
    <!-- Efek Blur Bulat -->
    <div class="absolute -top-12 -left-20 w-72 h-72 bg-purple-400 opacity-30 rounded-full blur-3xl">
    </div>
    <div
      class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-purple-200 opacity-25 rounded-full blur-[120px]">
    </div>
  </div>

  <!-- Content Header -->
  <div
    class="relative z-10 flex flex-col items-start xl:items-center justify-center h-full px-8 xl:px-0 max-w-5xl mx-auto space-y-7">
    <div
      class="flex items-center gap-4 bg-white/20 py-2 px-6 rounded-full shadow-lg backdrop-blur-lg mb-1">
      <svg class="w-6 h-6 text-purple-700" fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M10 2C6.13 2 2.99 5.13 2.99 9c0 3.4 3.31 7.23 6.14 9.59.53.46 1.31.46 1.84 0C13.7 16.23 16.99 12.4 16.99 9c0-3.87-3.13-7-7-7zm0 10.5A2.5 2.5 0 1 1 10 7a2.5 2.5 0 0 1 0 5.5z" />
      </svg>
      <span class="font-semibold text-purple-900 text-base tracking-wide">Selamat Datang</span>
    </div>
    <h1
      class="font-poppins font-extrabold leading-tight text-3xl sm:text-4xl xl:text-5xl text-white drop-shadow-xl text-shadow-lg text-left xl:text-center">
      PERPUSTAKAAN<br>
      <span
        class="bg-gradient-to-r from-purple-300 via-purple-100 to-purple-500 bg-clip-text text-transparent">
        USTAD SUKIRMAN
      </span>
      <br>
      <span
        class="text-xl sm:text-2xl font-semibold text-purple-200 tracking-widest xl:text-center block mt-2">
        DESA WONOSARI
      </span>
    </h1>
    <p class="max-w-2xl text-white/80 text-md sm:text-lg xl:text-center drop-shadow-lg">
      Temukan koleksi buku favorit, referensi ilmu terbaik, dan layanan pustaka digital <span
        class="text-purple-100 font-semibold">untuk semua warga</span>.
    </p>

    <!-- Search Bar -->
    <form action="/"
      class="w-full max-w-lg flex gap-2 bg-white/30 rounded-3xl shadow-2xl p-1 pl-4 backdrop-blur-sm ring-1 ring-purple-200/50 focus-within:ring-2 focus-within:ring-purple-400 transition xl:mx-auto">
      <input
        class="bg-transparent flex-1 py-2 px-2 text-purple-800 placeholder-purple-400 focus:outline-none text-md rounded-l-3xl"
        type="text" placeholder="Cari Buku..." aria-label="Cari Buku">
      <button type="submit"
        class="bg-gradient-to-tr from-purple-700 to-purple-500 text-white font-semibold px-6 py-2 rounded-3xl shadow hover:from-purple-800 hover:to-purple-600 transition-all">
        <i class="fa-solid fa-search mr-2"></i>Cari
      </button>
    </form>
  </div>
</header>
