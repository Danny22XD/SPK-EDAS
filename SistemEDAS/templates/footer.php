    </div> <!-- .content -->
  </div> <!-- .flex-grow-1 -->
</div> <!-- .d-flex -->

<!-- Alert Konfirmasi SweetAlert2 -->
 <script>
document.querySelectorAll('.btn-hapus').forEach(button => {
  button.addEventListener('click', function () {
    const id = this.getAttribute('data-id');
    const nama = this.getAttribute('data-nama');

    Swal.fire({
      title: 'Yakin ingin menghapus?',
      text: "Data alternatif '" + nama + "' akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "hapus_alternatif.php?id=" + id;
      }
    });
  });
});
</script>

<!-- Alert Hapus SweetAlert2 -->
<?php if (isset($_GET['status']) && $_GET['status'] == 'deleted'): ?>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data alternatif berhasil dihapus.',
    timer: 2000,
    showConfirmButton: false,
    toast: true,
    position: 'top-end'
  });
</script>
<?php endif; ?>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
