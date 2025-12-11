<div id="login-form-container"
  class="bg-white rounded-2xl shadow-lg w-[720px] mx-auto my-8 text-[15px] overflow-hidden border border-[#9BA4B5]">
  <div class="py-5 w-full text-center bg-[#394867] text-white text-[20px] font-bold tracking-wide">
    Login
  </div>
  <form method="POST" action="{{ route('login') }}" class="p-7 space-y-6">
    @csrf
    {{-- Pilih Login Sebagai --}}
    <div class="flex flex-col gap-2">
      <label for="role" class="font-semibold text-[#394867]">Login Sebagai</label>
      <div class="flex gap-4">
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="radio" name="role" value="admin" class="accent-[#394867]"
            {{ old('role', 'admin') == 'admin' ? 'checked' : '' }}>
          <span class="text-[#212A3E]">Admin</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="radio" name="role" value="pengunjung" class="accent-[#9BA4B5]"
            {{ old('role') == 'pengunjung' ? 'checked' : '' }}>
          <span class="text-[#212A3E]">Pengunjung</span>
        </label>
      </div>
    </div>

    <div class="flex flex-col gap-2">
      <label for="name"
        class="font-semibold text-[#394867] after:content-['*'] after:text-red-500 after:ml-1">Nama
        Pengguna:</label>
      <input type="text" id="name" name="name" autocomplete="username"
        placeholder="Masukkan nama pengguna"
        class="border border-[#9BA4B5] focus:border-[#394867] focus:ring-2 focus:ring-[#9BA4B5] transition rounded-lg px-3 py-2 outline-none w-full shadow-sm text-[#212A3E]"
        value="{{ old('name') }}" required>
      @error('name')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <div class="flex flex-col gap-2">
      <label for="password"
        class="font-semibold text-[#394867] after:content-['*'] after:text-red-500 after:ml-1">Password:</label>
      <input type="password" id="password" name="password" autocomplete="current-password"
        placeholder="Masukkan password"
        class="border border-[#9BA4B5] focus:border-[#394867] focus:ring-2 focus:ring-[#9BA4B5] transition rounded-lg px-3 py-2 outline-none w-full shadow-sm text-[#212A3E]"
        required>
      @error('password')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <div class="flex items-center justify-between">
      <div class="flex items-center gap-2">
        <input type="checkbox" name="remember" id="ingat-saya" class="accent-[#394867] rounded"
          {{ old('remember') ? 'checked' : '' }}>
        <label for="ingat-saya" class="text-[#212A3E] cursor-pointer select-none">Ingat Saya</label>
      </div>
      <a href="{{ route('password.request') }}"
        class="text-[13px] text-[#394867] hover:underline font-medium">Lupa
        Password?</a>
    </div>

    <button type="submit"
      class="w-full h-11 bg-[#212A3E] text-white font-bold text-[16px] rounded-lg shadow hover:bg-[#394867] transition-all duration-150">
      Masuk
    </button>
  </form>
  <div class="bg-[#F1F6F9] p-4 text-center text-[13px] text-[#9BA4B5] border-t border-[#9BA4B5]">
    Belum punya akun?
    <a href="#" onclick="showRegistrasiForm(event)"
      class="text-[#394867] hover:underline font-semibold" id="btn-daftar">Daftar</a>
  </div>
</div>

<div id="registrasi-form-container" class="hidden">
  <x-pengunjung.registrasi />
</div>

<script>
  function showRegistrasiForm(e) {
    e.preventDefault();
    document.getElementById('login-form-container').classList.add('hidden');
    document.getElementById('registrasi-form-container').classList.remove('hidden');
  }
</script>
