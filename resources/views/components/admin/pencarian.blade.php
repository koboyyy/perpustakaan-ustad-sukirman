<div>
  <form action=""
    class="flex items-center gap-0 transition-all duration-300 group shadow-lg rounded-lg overflow-hidden">
    <input type="text" id="pencarian" name="pencarian"
      class="h-10 px-4 w-64 border-none focus:ring-2 focus:ring-purple-400 outline-none bg-gray-100 text-gray-700 transition-all duration-300"
      placeholder="Cari judul, pengarang, ISBN..." autocomplete="off">
    <button type="submit"
      class="h-10 w-12 bg-gradient-to-r from-purple-600 to-purple-400 flex items-center justify-center text-white transition-all duration-200 hover:from-purple-700 hover:to-purple-500 focus:outline-none"
      aria-label="Cari">
      <i class="fa-solid fa-magnifying-glass text-lg"></i>
    </button>
  </form>
  <div id="search-suggestion"
    class="bg-white shadow-md rounded-b-lg absolute mt-1 w-64 z-50 hidden">
    <!-- Suggestion Items here (optional for enhancement)-->
  </div>
  <script>
    // Optional: animasi shadow, efek interaktif
    const searchInput = document.getElementById('pencarian');
    const form = searchInput.closest('form');
    searchInput.addEventListener('focus', () => {
      form.classList.add('ring-2', 'ring-purple-400');
    });
    searchInput.addEventListener('blur', () => {
      form.classList.remove('ring-2', 'ring-purple-400');
    });
  </script>
</div>
