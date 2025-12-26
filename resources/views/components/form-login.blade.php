<div
  class="relative container mx-auto flex bg-white rounded-[100px] overflow-hidden p-5 h-full w-full z-9999">
  <div class="w-full flex justify-center items-center">
    <div id="login-form-container" class="w-full mx-auto my-8 text-[15px] px-10 md:px-20">

      @if (session()->has('success'))
        <div class="bg-green-100 p-5 rounded-2xl font-semibold">
          {{ session('success') }}
        </div>
      @endif

      @if (session()->has('loginError'))
        <div class="bg-red-100 p-5 rounded-2xl font-semibold">
          {{ session('loginError') }}
        </div>
      @endif

      <div class="py-5 w-full text-center text-[20px] font-bold tracking-wide">
        Login
      </div>

      <form method="POST" action="{{ route('login') }}" class="p-7 space-y-3">
        @csrf

        <div class="flex flex-col gap-2">
          <input type="text" id="email/username" name="email/username"
            placeholder="Masukkan email/username"
            class="border border-[#9BA4B5] focus:border-[#394867] focus:ring-2 focus:ring-[#9BA4B5] transition rounded-[50px] px-3 py-3 outline-none w-full shadow-sm text-[#212A3E]"
            required>
          @error('email/username')
            <span class="text-red-500 text-[13px]">{{ $message }}</span>
          @enderror
        </div>

        <div class="flex flex-col gap-2">
          <input type="password" id="password" name="password" placeholder="Masukkan password"
            class="border border-[#9BA4B5] focus:border-[#394867] focus:ring-2 focus:ring-[#9BA4B5] transition rounded-[50px] px-3 py-3 outline-none w-full shadow-sm text-[#212A3E]"
            required>
          @error('password')
            <span class="text-red-500 text-[13px]">{{ $message }}</span>
          @enderror
        </div>

        <button type="submit"
          class="w-full h-12 bg-[#212A3E] text-white font-bold text-[16px] rounded-[50px] shadow hover:bg-[#394867] transition-all duration-150">
          Masuk
        </button>
      </form>

      <div class="p-4 text-center text-[13px] text-[#9BA4B5]">
        Belum punya akun?
        <a href="{{ route('registrasi') }}" class="text-[#394867] hover:underline font-semibold"
          id="btn-daftar">Daftar</a>
      </div>
    </div>
  </div>

  <div
    class="bg-pink-400 w-full h-full md:flex justify-center rounded-[80px] overflow-hidden hidden">
    <img src="/img/wallpaper.jpg" alt="" class="object-cover w-full">
  </div>

</div>
