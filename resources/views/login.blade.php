 @vite('resources/css/app.css')

 <div class="p-15 bg-blue-700 h-screen">
   <div class="grid grid-cols-2  bg-white rounded-[100px] overflow-hidden p-5 h-full w-full">
     <div class="flex justify-center items-center">
       <div id="login-form-container" class="w-[500px] mx-auto my-8 text-[15px]">
         <div class="py-5 w-full text-center text-[20px] font-bold tracking-wide">
           Login
         </div>

         <form method="POST" action="{{ route('login') }}" class="p-7 space-y-3">
           @csrf

           <div class="flex flex-col gap-2">
             <input type="text" id="name" name="username" autocomplete="username"
               placeholder="Masukkan nama pengguna"
               class="border border-[#9BA4B5] focus:border-[#394867] focus:ring-2 focus:ring-[#9BA4B5] transition rounded-[50px] px-3 py-3 outline-none w-full shadow-sm text-[#212A3E]"
               value="{{ old('username') }}" required>
             @error('username')
               <span class="text-red-500 text-[13px]">{{ $message }}</span>
             @enderror
           </div>

           <div class="flex flex-col gap-2">
             <input type="password" id="password" name="password" autocomplete="current-password"
               placeholder="Masukkan password"
               class="border border-[#9BA4B5] focus:border-[#394867] focus:ring-2 focus:ring-[#9BA4B5] transition rounded-[50px] px-3 py-3 outline-none w-full shadow-sm text-[#212A3E]"
               required>
             @error('password')
               <span class="text-red-500 text-[13px]">{{ $message }}</span>
             @enderror
           </div>

           <div class="flex items-center justify-end">
             <a href="{{ route('password.request') }}"
               class="text-[13px] text-[#394867] hover:underline font-medium">Lupa
               Password?</a>
           </div>

           <button type="submit"
             class="w-full h-12 bg-[#212A3E] text-white font-bold text-[16px] rounded-[50px] shadow hover:bg-[#394867] transition-all duration-150">
             Masuk
           </button>

         </form>

         <div class="p-4 text-center text-[13px] text-[#9BA4B5]">
           Belum punya akun?
           <a href="{{ route('viewRegister') }}"
             class="text-[#394867] hover:underline font-semibold" id="btn-daftar">Daftar</a>
         </div>
       </div>
     </div>

     <div class="bg-pink-400 w-full h-full flex justify-center rounded-[80px] overflow-hidden">
       <img src="/img/wallpaper.jpg" alt="" class="object-cover w-full">
     </div>

   </div>
 </div>
