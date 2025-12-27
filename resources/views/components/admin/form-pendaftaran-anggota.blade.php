<div class="w-full max-w-150 bg-white rounded-2xl p-6">

  @if (session('success'))
    <div class="bg-green-400 p-5 rounded-2xl text-white mb-4">
      {{ session('success') }}
    </div>
  @endif

  @if ($errors->any())
    <div class="bg-red-400 p-5 rounded-2xl text-white mb-4">
      <ul class="list-disc pl-5 text-[14px]">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Title --}}
  <div class="font-semibold text-md mb-2 flex items-center gap-2">
    <i class="fa-solid fa-user-plus text-[#394867]"></i>
    Tambah Anggota
  </div>

  {{-- Formulir --}}
  <form action="{{ route('tambah-anggota') }}" method="post" class="space-y-4">
    @csrf
    <!-- Nama Lengkap -->
    <div class="flex flex-col gap-2">
      <label for="nama_lengkap"
        class="font-light text-sm text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Nama
        Lengkap:</label>
      <input type="text" id="nama_lengkap" name="nama_lengkap"
        placeholder="Masukkan nama lengkap"
        class="border border-gray-300 focus:border-[1px] focus:border-[rgb(255,109,31)] focus:ring-1 focus:ring-[rgb(255,109,31)] transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        value="{{ old('nama_lengkap') }}" required>
      @error('nama_lengkap')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <!-- Email -->
    <div class="flex flex-col gap-2">
      <label for="email"
        class="font-light text-sm text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Email:</label>
      <input type="email" id="email" name="email" autocomplete="email"
        placeholder="Masukkan email"
        class="border border-gray-300 focus:border-[1px] focus:border-[rgb(255,109,31)] focus:ring-1 focus:ring-[rgb(255,109,31)] transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        value="{{ old('email') }}" required>
      @error('email')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <!-- Username -->
    <div class="flex flex-col gap-2">
      <label for="username"
        class="font-light text-sm text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Username:</label>
      <input type="text" id="username" name="username" autocomplete="username"
        placeholder="Masukkan username"
        class="border border-gray-300 focus:border-[1px] focus:border-[rgb(255,109,31)] focus:ring-1 focus:ring-[rgb(255,109,31)] transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        value="{{ old('username') }}" required>
      @error('username')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <!-- Password -->
    <div class="flex flex-col gap-2">
      <label for="password"
        class="font-light text-sm text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Password:</label>
      <input type="password" id="password" name="password" autocomplete="new-password"
        placeholder="Buat password"
        class="border border-gray-300 focus:border-[1px] focus:border-[rgb(255,109,31)] focus:ring-1 focus:ring-[rgb(255,109,31)] transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        required>
      @error('password')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <!-- Konfirmasi Password -->
    <div class="flex flex-col gap-2">
      <label for="password_confirmation"
        class="font-light text-sm text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Konfirmasi
        Password:</label>
      <input type="password" id="password_confirmation" name="password_confirmation"
        autocomplete="new-password" placeholder="Ulangi password"
        class="border border-gray-300 focus:border-[1px] focus:border-[rgb(255,109,31)] focus:ring-1 focus:ring-[rgb(255,109,31)] transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        required>
      @error('password_confirmation')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <!-- Tanggal Lahir -->
    <div class="flex flex-col gap-2">
      <label for="tanggal_lahir"
        class="font-light text-sm text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Tanggal
        Lahir:</label>
      <input type="date" id="tanggal_lahir" name="tanggal_lahir"
        placeholder="Masukkan tanggal lahir"
        class="border border-gray-300 focus:border-[1px] focus:border-[rgb(255,109,31)] focus:ring-1 focus:ring-[rgb(255,109,31)] transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        value="{{ old('tanggal_lahir') }}" required>
      @error('tanggal_lahir')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <!-- NIK -->
    <div class="flex flex-col gap-2">
      <label for="nik"
        class="font-light text-sm text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">NIK:</label>
      <input type="number" id="nik" name="nik" placeholder="Masukkan NIK"
        class="border border-gray-300 focus:border-[1px] focus:border-[rgb(255,109,31)] focus:ring-1 focus:ring-[rgb(255,109,31)] transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        pattern="[0-9]{10,15}" value="{{ old('nik') }}" required>
      @error('nik')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <!-- Nomor HP -->
    <div class="flex flex-col gap-2">
      <label for="no_hp"
        class="font-light text-sm text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Nomor
        HP:</label>
      <input type="tel" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP"
        class="border border-gray-300 focus:border-[1px] focus:border-[rgb(255,109,31)] focus:ring-1 focus:ring-[rgb(255,109,31)] transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        pattern="[0-9]{10,15}" value="{{ old('no_hp') }}" required>
      @error('no_hp')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <!-- Alamat -->
    <div class="flex flex-col gap-2">
      <label for="alamat"
        class="font-light text-sm text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Alamat:</label>
      <textarea id="alamat" name="alamat" placeholder="Masukkan alamat lengkap"
        class="border border-gray-300 focus:border-[1px] focus:border-[rgb(255,109,31)] focus:ring-1 focus:ring-[rgb(255,109,31)] transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
        rows="3" required>{{ old('alamat') }}</textarea>
      @error('alamat')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <div class="flex items-center gap-2">
      <input type="checkbox" name="setuju_syarat" id="setuju_syarat"
        class="accent-purple-600 rounded" required {{ old('setuju_syarat') ? 'checked' : '' }}>
      <label for="setuju_syarat"
        class="text-sm font-light text-gray-600 cursor-pointer select-none">Saya setuju
        dengan
        <a href="#" class="text-blue-400 hover:underline font-semibold">syarat &
          ketentuan</a></label>
      @error('setuju_syarat')
        <span class="text-red-500 text-[13px]">{{ $message }}</span>
      @enderror
    </div>

    <button type="submit"
      class="w-full h-11 bg-[rgb(255,109,31)] text-white font-bold text-[16px] rounded-lg shadow hover:scale-[1.03] transition-all duration-150">
      Tambah Anggota
    </button>
  </form>

</div>
