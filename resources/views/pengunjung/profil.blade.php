<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Perpustakaan Ustad Sukirman</title>
  <script src="https://kit.fontawesome.com/23275395bd.js" crossorigin="anonymous"></script>
  @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-[#f6edff] via-white to-[#ede9fe] min-h-screen flex flex-col">
  <div class="w-full relative z-30">
    <x-pengunjung::navbar-home></x-pengunjung::navbar-home>
  </div>
  <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-8 items-start w-full">
      <div class="flex-1 flex flex-col gap-10 max-w-2xl mx-auto w-full">
        <x-pengunjung::sejarah></x-pengunjung::sejarah>
        <x-pengunjung::strutur-organisasi></x-pengunjung::strutur-organisasi>
      </div>
      <div class="flex-1 w-full max-w-xl mx-auto">
        <x-pengunjung::visi-misi></x-pengunjung::visi-misi>
      </div>
    </div>
  </main>

  <footer class="w-full mt-auto z-20">
    <x-pengunjung::footer></x-pengunjung::footer>
  </footer>
</body>

</html>
