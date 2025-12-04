@props([
    'type' => 'Data', // default jika tidak dikirim
])

<div class="flex items-center rounded-xl shadow-md overflow-hidden group w-fit">
  <div
    class="bg-purple-600 w-12 h-12 flex justify-center items-center text-white text-xl transition-all duration-200 group-hover:bg-purple-700">
    <i class="fa-solid fa-plus"></i>
  </div>
  <button
    class="bg-purple-500 h-12 text-white font-semibold text-base transition-all duration-200 hover:bg-purple-600 focus:outline-none px-4 flex items-center justify-center"
    type="button">
    Tambah {{ $type }}
  </button>
</div>
