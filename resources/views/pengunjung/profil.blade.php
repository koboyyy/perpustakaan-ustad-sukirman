<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>perpustakaan ustad sukirman</title>
  @vite('resources/css/app.css')
</head>

<body>
  <div class="container mt-20 mx-auto">
    <x-pengunjung::navbar-home></x-pengunjung::navbar-home>

    <x-pengunjung::sejarah></x-pengunjung::sejarah>

    <x-pengunjung::visi-misi></x-pengunjung::visi-misi>

    <x-pengunjung::strutur-organisasi></x-pengunjung::strutur-organisasi>
  </div>

  <x-pengunjung::footer></x-pengunjung::footer>
</body>

</html>
