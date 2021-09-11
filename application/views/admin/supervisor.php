<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        </div>
        <div class="col-lg-1" align="right">
            <a href="<?= base_url('admin/supervisor') ?>" class="btn btn-outline-primary">Active</a>
        </div>
        <div class="col-lg-1" align="right">
            <a href="<?= base_url('admin/blocked_spv') ?>" class="btn btn-outline-secondary">Blocked</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMarketer">Tambah SPV</a>

                            <?= $this->session->flashdata('message'); ?>

                            <table class="table table-striped table-responsive" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>

                                        <th scope="col">Nama</th>
                                        <th scope="col">No Telepon</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Tanggal gabung</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php if (!empty($supervisors)) : ?>
                                        <?php foreach ($supervisors as $supervisor) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?> </th>
                                                <td><?= $supervisor['name']; ?></td>
                                                <td><?= $supervisor['phone']; ?></td>
                                                <td><?= $supervisor['email']; ?></td>
                                                <td><?= date('d F Y', $supervisor['date_created']); ?></td>
                                                <td>
                                                    <?php if ($supervisor['is_active'] == 1) : ?>
                                                        <a href="<?= base_url('admin/block_spv?id=') . $supervisor['id'] ?>"><span class="badge badge-warning" onclick="return confirm('Yakin ingin memblokir?')">Blokir</span></a>
                                                    <?php else : ?>
                                                        <a href="<?= base_url('admin/unblock_spv?id=') . $supervisor['id'] ?>"><span class="badge badge-success" onclick="return confirm('Yakin ingin membuka blokir?')">Unblock</span></a>
                                                    <?php endif ?>
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

                <div class="modal fade" id="newMarketer" tabindex="-1" role="dialog" aria-labelledby="newMarketer" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newMarketer">Tambah SPV</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/createSupervisor'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telepon" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
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