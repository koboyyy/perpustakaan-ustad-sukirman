<div
  class="relative container mx-auto flex bg-[rgb(251,251,251)] rounded-2xl xl:rounded-[100px] overflow-hidden p-5 h-full w-full z-9999">
  <div class="w-full flex justify-center items-center">
    <div id="login-form-container" class="w-full mx-auto my-8 text-[15px] px-4 lg:px-10">

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

      <form method="POST" action="{{ route('login') }}" class="p-7 space-y-3 max-w-132 mx-auto">
        @csrf

        <style>
          /* Pastikan input tetap background putih saat auto-complete pada Chrome/Webkit */
          input:-webkit-autofill,
          input:-webkit-autofill:focus,
          input:-webkit-autofill:hover,
          input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 1000px #fff inset !important;
            box-shadow: 0 0 0 1000px #fff inset !important;
            -webkit-text-fill-color: #212A3E !important;
          }
        </style>

        <div class="flex flex-col gap-2">
          <input type="text" id="email/username" name="email/username"
            placeholder="Masukkan email/username" autocomplete="username email"
            class="border border-black/10 focus:border-[#394867] focus:ring-2 focus:ring-[#9BA4B5] transition rounded-[50px] px-3 py-3 outline-none w-full shadow-sm text-[#212A3E] bg-white"
            required>
          @error('email/username')
            <span class="text-red-500 text-[13px]">{{ $message }}</span>
          @enderror
        </div>

        <div class="flex flex-col gap-2">
          <input type="password" id="password" name="password" placeholder="Masukkan password"
            autocomplete="current-password"
            class="border border-black/10 focus:border-[#394867] focus:ring-2 focus:ring-[#9BA4B5] transition rounded-[50px] px-3 py-3 outline-none w-full shadow-sm text-[#212A3E] bg-white"
            required>
          @error('password')
            <span class="text-red-500 text-[13px]">{{ $message }}</span>
          @enderror
        </div>

        <button type="submit"
          class="w-full h-12 bg-[rgb(255,109,31)] hover:bg-[#3170ad] text-white font-bold text-[16px] rounded-[50px] shadow transition-all duration-150">
          Masuk
        </button>
      </form>

      <div class="p-4 text-center text-[13px] text-[#9BA4B5]">
        Belum punya akun?
        <a href="{{ route('registrasi') }}" class="text-blue-400 hover:underline font-semibold"
          id="btn-daftar">Daftar</a>
      </div>
    </div>
  </div>

  <div class="w-full h-full justify-center rounded-[80px] overflow-hidden hidden xl:block relative">
    <div class="bg-[#21324b]/50 absolute inset-0"></div>
    <img src="/img/library1.jpg" alt="" class="object-center w-full h-full object-cover">
  </div>

</div>
