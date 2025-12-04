<div class="space-y-1 mb-10">
  <div class="text-3xl font-bold text-center {{ isset($color) ? 'text-' . $color : 'black' }}">
    {{ $title ?? '' }}</div>
  <div
    class="text-purple-600 dark:text-purple-400 font-semibold text-center text-2xl mt-2 max-w-300 mx-auto">
    {{ $subtitle ?? '' }}</div>
</div>
