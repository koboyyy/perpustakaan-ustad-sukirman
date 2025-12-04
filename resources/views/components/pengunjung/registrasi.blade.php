<div class="bg-white rounded-2xl shadow-lg w-[720px] mx-auto my-8 text-[15px] overflow-hidden">
  <div
    class="py-5 w-full text-center bg-gradient-to-r from-[#7b2ff2] to-[#f357a8] text-white text-[20px] font-bold tracking-wide">
    Registrasi
  </div>
  <form action="" method="post" class="p-7 space-y-6">
    {{-- Pilih Register Sebagai --}}
    <div class="flex flex-col gap-2">
      <label for="role" class="font-semibold text-gray-700">Daftar Sebagai</label>
      <div class="flex gap-4">
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="radio" name="role" value="pengunjung" class="accent-amber-500" checked>
          <span class="text-gray-700">Pengunjung</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="radio" name="role" value="admin" class="accent-purple-600">
          <span class="text-gray-700">Admin</span>
        </label>
      </div>
    </div>

    <div class="flex flex-col gap-2">
      <label for="nama"
        class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Nama
        Lengkap:</label>
      <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap"
        class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        required>
    </div>

    <div class="flex flex-col gap-2">
      <label for="email"
        class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Email:</label>
      <input type="email" id="email" name="email" autocomplete="email"
        placeholder="Masukkan email"
        class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        required>
    </div>

    <div class="flex flex-col gap-2">
      <label for="username"
        class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Username:</label>
      <input type="text" id="username" name="username" autocomplete="username"
        placeholder="Masukkan username"
        class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        required>
    </div>

    <div class="flex flex-col gap-2">
      <label for="password"
        class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Password:</label>
      <input type="password" id="password" name="password" autocomplete="new-password"
        placeholder="Buat password"
        class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        required>
    </div>

    <div class="flex flex-col gap-2">
      <label for="password_confirmation"
        class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Konfirmasi
        Password:</label>
      <input type="password" id="password_confirmation" name="password_confirmation"
        autocomplete="new-password" placeholder="Ulangi password"
        class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        required>
    </div>

    <div class="flex items-center gap-2">
      <input type="checkbox" name="setuju_syarat" id="setuju_syarat"
        class="accent-purple-600 rounded" required>
      <label for="setuju_syarat" class="text-gray-600 cursor-pointer select-none">Saya setuju dengan
        <a href="#" class="text-purple-600 hover:underline font-semibold">syarat &
          ketentuan</a></label>
    </div>

    <button type="submit"
      class="w-full h-11 bg-gradient-to-r from-[#9370FF] to-[#FD5CAB] text-white font-bold text-[16px] rounded-lg shadow hover:scale-[1.03] transition-all duration-150">
      Daftar
    </button>
  </form>
  <div class="bg-gray-100 p-4 text-center text-[13px] text-gray-500 border-t">
    Sudah punya akun? <a href="#" class="text-purple-600 hover:underline font-semibold"
      id="btn-login-registrasi" onclick="showLoginForm(event)">Login</a>
  </div>
</div>
<script>
  function showLoginForm(e) {
    e.preventDefault();
    if (document.getElementById('login-form-container') && document.getElementById(
        'registrasi-form-container')) {
      document.getElementById('login-form-container').classList.remove('hidden');
      document.getElementById('registrasi-form-container').classList.add('hidden');
    }
  }
</script>
