<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Layout</title>

  @vite('resources/css/app.css')

  <script src="https://kit.fontawesome.com/23275395bd.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
</head>

<body class="light bg-gradient-to-br from-[#f6edff] via-white to-[#ede9fe]">
  <x-pengunjung::navbar-home></x-pengunjung::navbar-home>

  {{ $slot }}

  <x-pengunjung.footer></x-pengunjung.footer>

  @vite('resources/js/pengunjung.js')
</body>

</html>
