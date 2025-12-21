@php
  // Gunakan title prop, atau default 'Menu'
  $menuTitle = $attributes->get('title') ?? 'Menu';
@endphp
<a {{ $attributes }}
  class="relative flex flex-col items-center justify-center gap-1 rounded-xl transition-all duration-200 min-w-8 min-h-8 max-w-12 max-h-12
            {{ $active ? 'bg-white bg-opacity-70 text-[#212A3E] shadow-md' : 'text-white hover:bg-[rgb(255,255,255)] hover:bg-opacity-40 hover:text-[#212A3E]' }}"
  style="box-sizing:border-box; width:64px; height:64px;">

  {{ $slot }}

  <span
    class="
      pointer-events-none 
      absolute left-full top-1/2 -translate-y-1/2
      ml-2 px-3 py-1 rounded-lg bg-[#212A3E] text-white text-xs font-semibold shadow-lg
      opacity-0 translate-x-2
      transition-all duration-200
      z-[9999]
      whitespace-nowrap
      lg:block hidden
      "
    style="white-space: nowrap;">
    {{ $menuTitle }}
  </span>
  <style>
    a:hover>span,
    a:focus-visible>span {
      opacity: 1 !important;
      translate: 0 0;
    }
  </style>
</a>
