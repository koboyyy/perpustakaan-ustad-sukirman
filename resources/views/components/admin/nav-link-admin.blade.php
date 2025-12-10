<a {{ $attributes }}
  class="flex flex-col items-center justify-center gap-1 rounded-xl transition-all duration-200 min-w-8 min-h-8 max-w-12 max-h-12
            {{ $active ? 'bg-white bg-opacity-70 text-[#212A3E] shadow-md' : 'text-white hover:bg-[rgb(255,255,255)] hover:bg-opacity-40 hover:text-[#212A3E]' }}"
  style="box-sizing:border-box; width:64px; height:64px;">

  {{ $slot }}

</a>
