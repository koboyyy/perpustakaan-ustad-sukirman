const tableCell = document.querySelectorAll('tr td');

// Menambahkan efek hover pada baris tabel agar background berubah warna
document.querySelectorAll('tr').forEach(row => {
  row.addEventListener('mouseenter', function () {
    this.classList.add('bg-purple-100'); // Tailwind theme highlight
  });
  row.addEventListener('mouseleave', function () {
    this.classList.remove('bg-purple-100');
  });
});
