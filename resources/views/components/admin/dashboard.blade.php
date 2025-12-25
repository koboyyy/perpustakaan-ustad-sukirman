<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan Ustad Sukirman | Dashboard Admin</title>

  @vite('resources/css/app.css')

  <!-- Font Awesome CDN -->
  <script src="https://kit.fontawesome.com/23275395bd.js" crossorigin="anonymous"></script>

</head>

<body class="bg-[#F1F6F9] font-poppins text-[16px]">
  {{-- HEADER --}}
  <x-admin.header />

  <section class="flex flex-col lg:flex-row min-h-screen">
    {{-- SIDEBAR --}}
    <x-admin.sidebar class="w-full lg:w-auto" />

    {{-- MAIN --}}
    <main class="w-full flex-1 flex flex-col">
      <div
        class="flex-1 w-full px-4 py-6 min-h-[calc(100vh-88px)] sm:px-6 sm:py-8 md:px-8 md:py-10 lg:px-[24px] lg:py-[30px]">
        {{ $slot ?? '' }}
      </div>

      {{-- FOOTER --}}
      <footer class="text-[#212A3E] text-xs sm:text-sm bg-[#F1F6F9] text-center px-2 py-2">
        <div>&copy; Perpustakaan Ustad Sukirman 2025</div>
      </footer>
      <div class="h-[64px] w-full lg:hidden block"></div>
    </main>
  </section>
</body>

</html>
