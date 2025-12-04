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

<body class="light font-dm-sans">
  {{-- <section id="navbar"
    class="text-[16px] font-bold h-20 flex items-center justify-between gap-10 px-[50px] light">

    <div class="flex gap-10 items-center">

      <img src="img/logo.png" alt="logo" class="w-12">

      <a href="/">BERANDA</a>
      <a href="/koleksi-buku" class="select">KOLEKSI BUKU</a>
      <a href="/about">ABOUT</a>
    </div>

    <button id="btn-theme" onclick="setTheme()">White Mode</button>
  </section> --}}

  <x-pengunjung::navbar-home></x-pengunjung::navbar-home>

  <section class="container mx-auto">
    {{-- Hero --}}
    <div class="py-15">
      <div class="text-[70px] font-medium w-200 leading-[75px] mb-5">
        Daftar lengkap buku digital dari perpustakaan Ustad Sukirman
      </div>
      <div class="text-[20px] leading-[29px]">
        Jelajahi koleksi buku yang ada di perpustakaan digital Ustad Sukirman.
      </div>
    </div>

    {{-- Main Content --}}
    <div class="flex gap-5">
      {{-- Kategori --}}
      <div class="text-[16px] w-80">
        <div class="font-semibold mb-4">KATEGORI</div>
        <div id="kategori" class="flex flex-col"></div>
      </div>

      {{-- Koleksi Buku --}}
      <div class="w-full">
        {{-- Navbar --}}
        <div class="flex justify-between w-full items-start mb-7">
          {{-- Tab
          <div class="flex gap-7 font-semibold items-center">
            <a href="" class="select">SEMUA</a>
            <a href="">BEBAS</a>
            <a href="">PREMIUM</a>
          </div> --}}

          {{-- Pencarian --}}
          <div class="flex gap-7 items-center w-full">
            <form action="" class="flex w-full">
              <input type="text" name="pencarian" placeholder="Cari buku.." id="pencarian"
                class="light py-[14px] pl-[20px] pr-[50px] w-full" />
              <button class="bg-[#485872] py-[10px] px-[19px] text-white"><i
                  class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </div>
        </div>

        {{-- Koleksi Buku --}}
        <div class="grid grid-cols-6 gap-4 w-full">
          @for ($index = 0; $index < 20; $index++)
            <div class="w-full">
              <div
                class="bg-gradient-to-br from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% h-[250px] w-full">
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
