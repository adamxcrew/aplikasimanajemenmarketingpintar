<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?= $this->session->flashdata('message'); ?>

                            <?php if ($this->session->userdata('role_id') == 3) : ?>
                                <a href="" class="btn btn-danger mb-3" data-toggle="modal" data-target="#newPelanggan">Input Data Pelanggan</a>
                            <?php endif ?>

                            <table class="table table-striped table-responsive" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>

                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Kota</th>
                                        <th scope="col">No Telepon</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Tanggal Ditambahkan</th>

                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php if (!empty($pelanggan)) : ?>
                                        <?php foreach ($pelanggan as $plg) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?> </th>
                                                <td><?= $plg['nama']; ?></td>
                                                <td><?= $plg['kabupaten']; ?></td>
                                                <td><?= $plg['no_telepon']; ?></td>
                                                <td><?= $plg['email']; ?></td>
                                                <td><?= date('d F Y', strtotime($plg['created_at'])) ?></td>
                                                <td>
                                                    <a href="<?= base_url('pelanggan/detail_pelanggan?pelanggan=') . $plg['id_pelanggan'] ?>" class=" badge badge-warning">Detail</a>
                                                    <a href="<?= base_url('pelanggan/edit?id=') . $plg['id_pelanggan'] ?>" class=" badge badge-success">Ubah</a>
                                                    <a href="<?= base_url('pelanggan/delete?id=') . $plg['id_pelanggan'] ?>" class=" badge badge-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>

                    </div>


                </div>
                <!-- /.container-fluid -->
                    <div class="modal fade" id="newPelanggan" tabindex="-1" role="dialog" aria-labelledby="newPelanggan" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newPelanggan">Pelanggan baru</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('marketing/createPelanggan'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telepon">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                                        </div>
                                </form>
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
</div>