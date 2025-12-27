@php
  // Gunakan title prop, atau default 'Menu'
  $menuTitle = $attributes->get('title') ?? 'Menu';
@endphp
<a {{ $attributes }}
  class="relative flex flex-col items-center justify-center gap-1 rounded-xl transition-all duration-200 min-w-8 min-h-8 max-w-12 max-h-12 shrink-0
            {{ $active ? 'bg-[rgb(255,109,31)] text-[rgb(251,251,251)] bg-opacity-70 shadow-md' : 'text-white hover:bg-[rgb(255,255,255)] hover:bg-opacity-40 hover:text-[#212A3E]' }}"
  style="box-sizing:border-box; width:64px; height:64px;">

  {{ $slot }}

  <span
    class="
      pointer-events-none 
      absolute left-full top-0.5
      ml-3 px-3 py-2 rounded-xl bg-[#212A3E] text-white text-[13px] font-semibold shadow-xl border border-[#394867]
      opacity-0 translate-x-4
      transition-all duration-200
      z-50
      whitespace-nowrap
      lg:block hidden
    "
    style="white-space: nowrap; filter: drop-shadow(0 2px 8px rgba(33,42,62,0.10));">
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
