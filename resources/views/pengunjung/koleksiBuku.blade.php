<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="/vite.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Koleksi Buku</title>
  <script src="https://kit.fontawesome.com/23275395bd.js" crossorigin="anonymous"></script>
  @vite('resources/css/app.css')

</head>

<body class="light font-dm-sans bg-gradient-to-br from-[#f6edff] via-white to-[#ede9fe]">
  <x-pengunjung::navbar-home></x-pengunjung::navbar-home>

  <section class="container mx-auto">
    {{-- Hero --}}
    <div class="py-16 px-2 md:px-0 mb-10 relative z-10">
      <div class="mx-auto max-w-3xl text-center">
        <h1
          class="font-poppins text-4xl sm:text-5xl xl:text-6xl font-extrabold bg-gradient-to-r from-purple-700 via-purple-500 to-purple-700 bg-clip-text text-transparent leading-tight drop-shadow-xl mb-4 tracking-tight">
          Daftar Lengkap Buku Digital <br>
          <span class="text-purple-400">Perpustakaan Ustad Sukirman</span>
        </h1>
        <p class="text-lg sm:text-xl text-purple-900/80 font-medium mb-0 mt-2">
          Jelajahi koleksi buku terbaik yang ada di <span
            class="font-semibold text-purple-700">Perpustakaan Digital Ustad Sukirman</span>.
        </p>
      </div>
    </div>

    {{-- Main Content --}}
    <div class="flex gap-5">
      {{-- Kategori --}}
      <div
        class="w-80 rounded-2xl bg-gradient-to-br from-purple-100 via-purple-50 to-purple-200 shadow-lg p-6">
        <div
          class="font-bold text-purple-800 text-[18px] mb-4 tracking-wide flex items-center gap-2">
          <i class="fa-solid fa-layer-group text-purple-500"></i>
          KATEGORI
        </div>
        <div id="kategori" class="flex flex-col gap-2">
          {{-- Kategori list dinamis diisi JS --}}
          {{-- contoh struktur kategori-item
          <button class="kategori-item text-left px-4 py-2 rounded-lg bg-white/60 hover:bg-purple-200 hover:text-purple-900 text-purple-700 font-medium transition shadow-sm ring-1 ring-purple-200/40 focus:ring-2 focus:outline-none">Novel</button>
          --}}
        </div>
      </div>

      {{-- Koleksi Buku --}}
      <div class="w-full">
        {{-- Navbar --}}
        <div class="flex justify-between w-full items-start mb-7">

          {{-- Pencarian --}}
          <div class="flex gap-7 items-center w-full">
            <form action=""
              class="flex w-full bg-white/30 rounded-3xl shadow-lg p-1 pl-4 backdrop-blur-sm ring-1 ring-purple-200/50 focus-within:ring-2 focus-within:ring-purple-400 transition">
              <input type="text" name="pencarian" placeholder="Cari buku..." id="pencarian"
                class="bg-transparent flex-1 py-3 px-2 text-purple-800 placeholder-purple-400 focus:outline-none text-md rounded-l-3xl" />
              <button
                class="bg-gradient-to-tr from-purple-700 to-purple-500 text-white font-semibold px-6 py-2 rounded-3xl shadow hover:from-purple-800 hover:to-purple-600 transition-all">
                <i class="fa-solid fa-magnifying-glass mr-2"></i>Cari
              </button>
            </form>
          </div>
        </div>

        {{-- Koleksi Buku --}}
        <div class="grid grid-cols-6 gap-4 w-full">
          @for ($index = 0; $index < 20; $index++)
            <div class="w-full rounded-2xl overflow-hidden">
              <div
                class="bg-gradient-to-br from-purple-300 via-purple-100 to-purple-200 h-[250px] w-full">
                <img class="buku w-full h-full" alt="buku">
              </div>

              <div class="mt-3">
                <div class="text-lg font-semibold truncate">Judul</div>
                <div class="text-base italic text-gray-600 truncate">Pengarang</div>
                <div class="text-sm text-gray-500 truncate">Penerbit</div>
                <div class="text-sm text-gray-500 truncate">Tahun Terbit</div>
                <div class="text-sm text-gray-500 truncate">Eksemplar</div>
              </div>
            </div>
          @endfor
        </div>
      </div>
    </div>
  </section>

  {{-- Footer --}}
  <x-pengunjung::footer></x-pengunjung::footer>

  @vite('resources/js/koleksiBuku.js')
</body>

</html>
