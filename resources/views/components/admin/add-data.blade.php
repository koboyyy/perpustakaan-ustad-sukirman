@props([
    'type' => 'Data', // default jika tidak dikirim
])

<div class="flex items-center rounded-xl shadow-md overflow-hidden group w-fit">
  <button
    class="flex items-center group bg-purple-500 h-12 text-white font-semibold transition-all duration-200 hover:bg-purple-600 focus:outline-none px-0 text-[14px]"
    type="button" onclick="showForm()">
    <div
      class="bg-purple-600 w-12 h-12 flex justify-center items-center text-white text-lg transition-all duration-200 group-hover:bg-purple-700">
      <i class="fa-solid fa-plus"></i>
    </div>
    <span class="px-4 flex items-center justify-center">
      Tambah {{ $type }}
    </span>
  </button>

  @if ($type === 'Anggota')
    <div
      class="form-data fixed left-0 overflow-auto  p-5 top-0 w-full h-full bg-[rgba(0,0,0,0.2)] backdrop-blur-sm z-[1000] flex justify-center hidden">
      <div class="relative max-w-[1280px] h-fit rounded-2xl text-black text-start mt-20 z-[9999]">
        <x-admin.form-pendaftaran-anggota />
      </div>
    </div>
  @elseif ($type === 'Buku')
    <div
      class="form-data fixed left-0 top-0 w-full h-full bg-[rgba(0,0,0,0.2)] backdrop-blur-sm z-[1000] flex justify-center items-center hidden">
      <div class="grow p-5 h-fit rounded-2xl text-black text-start z-[9999]">
        <x-admin.form-tambah-buku />
      </div>
    </div>
  @endif

  <script>
    function showForm() {
      const formData = document.querySelector('.form-data');
      if (formData) {
        formData.classList.toggle('hidden');
      }
    }
  </script>
</div>
