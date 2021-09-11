<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-10">
                <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        </div>
        <div class="col-lg-2" align="pull-right">
            <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary">Tambah Data</a>
        </div>
    </div>
    <?= $this->session->flashdata('message') ?>
    <div class="row">
        <div class="col-lg">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <table class="table table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php if (!empty($jenis)) : ?>
                                    <?php foreach ($jenis as $jenis) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?> </th>
                                                <td><?= $jenis->nama ?></td>
                                                <td><?= number_format($jenis->harga) ?></td>
                                                <td>
                                                    <a href="#" data-jenis="<?= $jenis->id ?>" class="btn btn-info btn-sm jenisedit-btn">Edit</a>
                                                    <a onclick="return confirm('Yakin ingin menghapus?')" href="<?= base_url('admin/delete_jenis/') . $jenis->id ?>" class="btn btn-warning btn-sm">Hapus</a></td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p>Belum ditemukan data</p>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah  Jenis & Harga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/store_jenis') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label>Nama Jenis</label>
                <input type="text" name="jenis" class="form-control">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editJenisModal" tabindex="-1" role="dialog" aria-labelledby="editJenisModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editJenisModalLabel">Tambah  Jenis & Harga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/save_jenis') ?>" method="POST">
        <input type="hidden" name="id" id="IdJenis">
          <div class="modal-body">
            <div class="form-group">
                <label>Nama Jenis</label>
                <input type="text" name="jenis" id="FieldJenis" class="form-control">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" id="FieldHarga" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>