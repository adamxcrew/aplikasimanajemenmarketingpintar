<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pendapatan</h1>
    <p>Filter :</p>
    <form action="<?= base_url('admin/pendapatan_marketing') ?>" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3">
                    <input type="date" class="form-control" name="awal" required>
                </div>
                <div class="ml-2 mr-2 mt-2">
                    <p>Sampai</p>
                </div>

                <div class="col-lg-3 mb-2">
                    <input type="date" class="form-control" name="akhir" value="<?= date('Y-m-d') ?>" required>
                </div>
                <div class="col-lg-2">
                    <button type="submit" name="filter" class="btn btn-info btn-small">Lihat</button>
                </div>
            </div>
        </div>
    </form>
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
                                        <th scope="col">Nama Marketing</th>
                                        <th scope="col">Nama Supervisor</th>
                                        <th scope="col">Total Pendapatan Marketing</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php if (!empty($pendapatan)) : ?>
                                        <?php $total = 0;
                                        foreach ($pendapatan as $pend) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?> </th>
                                                <td><?= $pend['marketer_name']; ?></td>
                                                <td><?= $pend['spv_name']; ?></td>
                                                <td><?= number_format($pend['pendapatan'], 2) ?></td>
                                                <td><a href="<?= base_url('admin/detail_pendapatan/').$pend['id_marketer'] ?>" class="btn btn-info btn-sm">Detail</a></td>
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