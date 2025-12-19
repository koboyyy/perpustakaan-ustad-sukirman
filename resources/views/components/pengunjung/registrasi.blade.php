 @vite('resources/css/app.css')
 <div class="grid grid-cols-2 h-[100vh]">
   <div class="bg-pink-400 w-full h-full flex justify-center">
     <img src="" alt="">
   </div>

   <div class="flex justify-center items-center">
     <div class="bg-white rounded-2xl w-[720px] mx-auto my-8 text-[15px] overflow-hidden">
       <div
         class="py-5 w-full text-center bg-to-r from-[#7b2ff2] to-[#f357a8] text-black text-[20px] font-bold tracking-wide">
         Registrasi
       </div>
       <form action="{{ route('register') }}" method="post" class="p-7 space-y-6">
         @csrf

         <!-- Nama Lengkap -->
         <div class="flex flex-col gap-2">
           <label for="nama_lengkap"
             class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Nama
             Lengkap:</label>
           <input type="text" id="nama_lengkap" name="nama_lengkap"
             placeholder="Masukkan nama lengkap"
             class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
             value="{{ old('nama_lengkap') }}" required>
           @error('nama_lengkap')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <!-- Email -->
         <div class="flex flex-col gap-2">
           <label for="email"
             class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Email:</label>
           <input type="email" id="email" name="email" autocomplete="email"
             placeholder="Masukkan email"
             class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
             value="{{ old('email') }}" required>
           @error('email')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <!-- Username -->
         <div class="flex flex-col gap-2">
           <label for="username"
             class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Username:</label>
           <input type="text" id="username" name="username" autocomplete="username"
             placeholder="Masukkan username"
             class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
             value="{{ old('username') }}" required>
           @error('username')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <!-- Password -->
         <div class="flex flex-col gap-2">
           <label for="password"
             class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Password:</label>
           <input type="password" id="password" name="password" autocomplete="new-password"
             placeholder="Buat password"
             class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
             required>
           @error('password')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <!-- Konfirmasi Password -->
         <div class="flex flex-col gap-2">
           <label for="password_confirmation"
             class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Konfirmasi
             Password:</label>
           <input type="password" id="password_confirmation" name="password_confirmation"
             autocomplete="new-password" placeholder="Ulangi password"
             class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
             required>
           @error('password_confirmation')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <!-- Tanggal Lahir -->
         <div class="flex flex-col gap-2">
           <label for="tanggal_lahir"
             class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Tanggal
             Lahir:</label>
           <input type="date" id="tanggal_lahir" name="tanggal_lahir"
             placeholder="Masukkan tanggal lahir"
             class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
             value="{{ old('tanggal_lahir') }}" required>
           @error('tanggal_lahir')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <!-- Nomor HP -->
         <div class="flex flex-col gap-2">
           <label for="no_hp"
             class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Nomor
             HP:</label>
           <input type="tel" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP"
             class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
             pattern="[0-9]{10,15}" value="{{ old('no_hp') }}" required>
           @error('no_hp')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <!-- Alamat -->
         <div class="flex flex-col gap-2">
           <label for="alamat"
             class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Alamat:</label>
           <textarea id="alamat" name="alamat" placeholder="Masukkan alamat lengkap"
             class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
             rows="3" required>{{ old('alamat') }}</textarea>
           @error('alamat')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <!-- Provinsi -->
         <div class="flex flex-col gap-2">
           <label for="provinsi"
             class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Provinsi:</label>
           <input type="text" id="provinsi" name="provinsi" placeholder="Masukkan provinsi"
             class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
             value="{{ old('provinsi') }}" required>
           @error('provinsi')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <!-- Kabupaten -->
         <div class="flex flex-col gap-2">
           <label for="kabupaten"
             class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Kabupaten:</label>
           <input type="text" id="kabupaten" name="kabupaten"
             placeholder="Masukkan kabupaten"
             class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
             value="{{ old('kabupaten') }}" required>
           @error('kabupaten')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <!-- Kota -->
         <div class="flex flex-col gap-2">
           <label for="kota"
             class="font-semibold text-gray-700 after:content-['*'] after:text-red-500 after:ml-1">Kota:</label>
           <input type="text" id="kota" name="kota" placeholder="Masukkan kota"
             class="border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition rounded-lg px-3 py-2 outline-none w-full shadow-sm"
             value="{{ old('kota') }}" required>
           @error('kota')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <div class="flex items-center gap-2">
           <input type="checkbox" name="setuju_syarat" id="setuju_syarat"
             class="accent-purple-600 rounded" required
             {{ old('setuju_syarat') ? 'checked' : '' }}>
           <label for="setuju_syarat" class="text-gray-600 cursor-pointer select-none">Saya setuju
             dengan
             <a href="#" class="text-purple-600 hover:underline font-semibold">syarat &
               ketentuan</a></label>
           @error('setuju_syarat')
             <span class="text-red-500 text-[13px]">{{ $message }}</span>
           @enderror
         </div>

         <button type="submit"
           class="w-full h-11 bg-gradient-to-r from-[#9370FF] to-[#FD5CAB] text-white font-bold text-[16px] rounded-lg shadow hover:scale-[1.03] transition-all duration-150">
           Daftar
         </button>
       </form>
       <div class="bg-gray-100 p-4 text-center text-[13px] text-gray-500">
         Sudah punya akun? <a href="{{ route('viewLogin') }}"
           class="text-purple-600 hover:underline font-semibold"
           id="btn-login-registrasi">Login</a>
       </div>
     </div>
   </div>
 </div>
