@props([
    'title' => 'Data', // default jika tidak dikirim
])

<div class="flex items-center rounded-xl shadow-md overflow-hidden group w-fit">
  <button
    class="flex items-center group bg-[#394867] h-12 text-white font-semibold transition-all duration-200 hover:bg-[#212A3E] focus:outline-none px-0 text-[14px]"
    type="button" onclick="showForm()">
    <div
      class="bg-[#212A3E] w-12 h-12 flex justify-center items-center text-white text-lg transition-all duration-200 group-hover:bg-[#9BA4B5]">
      <i class="fa-solid fa-plus"></i>
    </div>
    <span class="px-4 flex items-center justify-center">
      Tambah {{ $title }}
    </span>
  </button>

  <div id="form"
    class="fixed left-0 top-0 w-full h-full bg-[rgba(0,0,0,0.2)] backdrop-blur-sm z-[1000] flex justify-center hidden items-center">
    {{ $slot }}
  </div>

  <script>
    function showForm() {
      const formData = document.querySelector('#form');
      if (formData) {
        formData.classList.toggle('hidden');
      }
    }
  </script>
</div>
