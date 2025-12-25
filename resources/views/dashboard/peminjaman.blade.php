<x-admin.dashboard>
  <div class="flex gap-5">
    <x-admin.form-peminjaman></x-admin.form-peminjaman>
    <x-admin.list-peminjaman :dataPeminjaman="$dataPeminjaman"></x-admin.list-peminjaman>
  </div>
</x-admin.dashboard>
