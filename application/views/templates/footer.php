<!-- Footer -->
<footer class="sticky-footer bg-light">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Web Manajemen Marketing <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Modal Ubah Profil -->
<div class="modal fade" id="ubahProfilModal" tabindex="-1" role="dialog" aria-labelledby="ubahProfilModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahProfilModalLabel">Ubah Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('pengaturan/ubahProfil') ?>">
          <div class="modal-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $this->session->userdata('name') ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $this->session->userdata('email') ?>">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah Password -->
<div class="modal fade" id="ubahPasswordModal" tabindex="-1" role="dialog" aria-labelledby="ubahPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahPasswordModalLabel">Ubah Kata Sandi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('pengaturan/ubahpassword') ?>">
      <div class="modal-body">
        <div class="form-group">
            <label>Kata Sandi Lama</label>
            <input type="password" name="old_pw" class="form-control">
        </div>
        <hr>
        <div class="form-group">
            <label>Kata Sandi Baru</label>
            <input type="password" name="new_pw" class="form-control">
        </div>
        <div class="form-group">
            <label>Konfirmasi Kata Sandi</label>
            <input type="password" name="confirm_pw" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-info">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar Aplikasi M-Mart</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah Anda Yakin Ingin Keluar Dari Aplikasi ? </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('vendor/sbadmin2/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('vendor/sbadmin2/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  
    $(function(){
      $('#js-jenisweb').on('change', function(e){
        var val = e.target.value;
        var urls = '<?= base_url("marketing/getHarga") ?>';
          $.ajax({
            url: urls,
            data:{id:val},
            success:function(data){
              var json = JSON.parse(data);
              $('#harga').val(json.harga);
              $('#formatted').empty();
              $('#formatted').append(json.formatted);
            }
          })
      })
    })

    $(function(){
      $('.jenisedit-btn').on('click', function(){
        var idJenis = $(this).data('jenis');
        var urls = '<?= base_url("admin/getDataJenis") ?>';
        $.ajax({
          url: urls,
          data:{id:idJenis},
          success:function(response){
            var json = JSON.parse(response);
            $('#IdJenis').val(json.id)
            $('#FieldJenis').val(json.nama)
            $('#FieldHarga').val(json.harga)
            $('#editJenisModal').modal('show');
          }
        })
      })
    })

  });
</script>

</body>

</html>