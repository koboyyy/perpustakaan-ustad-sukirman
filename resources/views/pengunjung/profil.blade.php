<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>perpustakaan ustad sukirman</title>
  <script src="https://kit.fontawesome.com/23275395bd.js" crossorigin="anonymous"></script>
  @vite('resources/css/app.css')
</head>

<body>
  <div class="container mt-20 mx-auto">
    <x-pengunjung::navbar-home></x-pengunjung::navbar-home>

    <div class="flex gap-10">
      <div class="space-y-10">
        <x-pengunjung::sejarah></x-pengunjung::sejarah>
        <x-pengunjung::strutur-organisasi></x-pengunjung::strutur-organisasi>
      </div>

      <x-pengunjung::visi-misi></x-pengunjung::visi-misi>
    </div>

  </div>

  <x-pengunjung::footer></x-pengunjung::footer>
</body>

</html>
