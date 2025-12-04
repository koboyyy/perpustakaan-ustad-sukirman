<div id="login-form-container"
  class="bg-white rounded-2xl shadow-lg w-[720px] mx-auto my-8 text-[15px] overflow-hidden">
  <div
    class="py-5 w-full text-center bg-gradient-to-r from-[#7b2ff2] to-[#f357a8] text-white text-[20px] font-bold tracking-wide">
    Login
  </div>
  <form action="" method="post" class="p-7 space-y-6">
    {{-- Pilih Login Sebagai --}}
    <div class="flex flex-col gap-2">
      <label for="role" class="font-semibold text-gray-700">Login Sebagai</label>
      <div class="flex gap-4">
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="radio" name="role" value="admin" class="accent-purple-600" checked>
          <span class="text-gray-700">Admin</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="radio" name="role" value="pengunjung" class="accent-amber-500">
          <span class="text-gray-700">Pengunjung</span>
        </label>
      </div>
    </div>

    <div class="flex flex-col gap-2">
      <label for="name"
        class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Nama
        Pengguna:</label>
      <input type="text" id="name" name="name" autocomplete="username"
        placeholder="Masukkan nama pengguna"
        class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        required>
    </div>

    <div class="flex flex-col gap-2">
      <label for="password"
        class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Password:</label>
      <input type="password" id="password" name="password" autocomplete="current-password"
        placeholder="Masukkan password"
        class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        required>
    </div>

    <div class="flex items-center justify-between">
      <div class="flex items-center gap-2">
        <input type="checkbox" name="ingat-saya" id="ingat-saya" class="accent-purple-600 rounded">
        <label for="ingat-saya" class="text-gray-600 cursor-pointer select-none">Ingat Saya</label>
      </div>
      <a href="#" class="text-[13px] text-purple-600 hover:underline font-medium">Lupa
        Password?</a>
    </div>

    <button type="submit"
      class="w-full h-11 bg-gradient-to-r from-[#9370FF] to-[#FD5CAB] text-white font-bold text-[16px] rounded-lg shadow hover:scale-[1.03] transition-all duration-150">
      Masuk
    </button>
  </form>
  <div class="bg-gray-100 p-4 text-center text-[13px] text-gray-500 border-t">
    Belum punya akun?
    <a href="#" onclick="showRegistrasiForm(event)"
      class="text-purple-600 hover:underline font-semibold" id="btn-daftar">Daftar</a>
  </div>
</div>

<div id="registrasi-form-container" class="hidden">
  <x-registrasi />
</div>

<script>
  function showRegistrasiForm(e) {
    e.preventDefault();
    document.getElementById('login-form-container').classList.add('hidden');
    document.getElementById('registrasi-form-container').classList.remove('hidden');
  }
</script>
