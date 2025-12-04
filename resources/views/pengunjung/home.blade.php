<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda</title>
  @vite('resources/css/app.css')

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <style>
    .group-box:hover .box {
      background-color: pink;
    }

    .group-box .box:hover {
      background-color: pink;
    }
  </style>

  <script src="https://kit.fontawesome.com/23275395bd.js" crossorigin="anonymous"></script>
</head>

<body class="light">

  {{-- Header --}}
  <section>
    <x-pengunjung::navbar-home></x-pengunjung::navbar-home>

    <x-pengunjung::header-home></x-pengunjung::header-home>
  </section>

  <x-pengunjung::rekomendasi-buku></x-pengunjung::rekomendasi-buku>

  <x-pengunjung::box-layanan></x-pengunjung::box-layanan>

  <x-pengunjung::visi-misi></x-pengunjung::visi-misi>

  <x-pengunjung::buku-terbaru></x-pengunjung::buku-terbaru>

  <x-pengunjung::footer></x-pengunjung::footer>

  <script>
    const srcRandomImg = 'https://picsum.photos/600/700';
    let srcImg = document.querySelectorAll('.book');

    srcImg.forEach(async (img, index, srcImg) => {
      const respon = await fetch(srcRandomImg);
      const data = await respon.url;

      try {
        console.log(data);
        if (index > 1) {
          img.src = data;
        }
      } catch (err) {
        console.log('error: ' + err);
      }
    });

    // Theme switching function for home page
    function setTheme() {
      const body = document.body;
      const navbar = document.querySelector('#navbar');
      const btnTheme = document.querySelector('#btn-theme');
      const footer = document.querySelector('footer');
      const dropdownMenu = document.querySelector('#dropdown-menu');

      body.classList.toggle('light');
      body.classList.toggle('dark');

      if (body.classList.contains('dark')) {
        if (navbar) {
          navbar.classList.replace('light', 'dark');
          navbar.classList.replace('bg-white', 'bg-gray-900');
        }
        if (btnTheme) {
          btnTheme.innerHTML = '<i class="fa-solid fa-sun mr-2"></i>Light Mode';
        }
        if (footer) {
          footer.classList.replace('light', 'dark');
          footer.classList.replace('bg-[#34344A]', 'bg-black');
        }
        if (dropdownMenu) {
          dropdownMenu.classList.add('dark:bg-gray-800');
        }
      } else {
        if (navbar) {
          navbar.classList.replace('dark', 'light');
          navbar.classList.replace('bg-gray-900', 'bg-white');
        }
        if (btnTheme) {
          btnTheme.innerHTML = '<i class="fa-solid fa-moon mr-2"></i>Theme';
        }
        if (footer) {
          footer.classList.replace('dark', 'light');
          footer.classList.replace('bg-black', 'bg-[#34344A]');
        }
        if (dropdownMenu) {
          dropdownMenu.classList.remove('dark:bg-gray-800');
        }
      }
    }

    // Make setTheme available globally for onclick handler
    window.setTheme = setTheme;
  </script>

  @vite('resources/js/koleksiBuku.js')
</body>

</html>
