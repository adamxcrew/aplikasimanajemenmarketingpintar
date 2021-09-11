<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?> [<?= $nama ?>]</h1>
    <p>Filter Pendapatan : </p>
    <form action="<?= base_url('supervisor/detail_pendapatan/').$this->uri->segment('3') ?>" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3">
                    <input type="date" class="form-control" name="awal" required>
                </div>
                <div class="ml-2 mr-2 mt-2">
                    <p>Sampai</p>
                </div>
                <div class="col-lg-3 mb-2">
                    <input type="date" class="form-control" name="akhir" value="<?= date('Y-m-d'); ?>" required>
                </div>
                <div class="col-lg-2">
                    <button type="submit" name="filter" class="btn btn-primary btn-small">Lihat</button>
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
                            <table class="table table-striped table-responsive" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" >ID Termin</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Komisi Termin 1</th>
                                        <th scope="col">Komisi Termin 2</th>
                                        <th scope="col">Komisi Termin 3</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $total = 0;
                                    foreach ($pendapatan as $pend) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?> </th>
                                            <td><?= $pend['id_termin'] ?></td>
                                            <td><?= $pend['pelanggan_name']; ?></td>
                                            <td><?= $pend['website']; ?></td>
                                            <td><?= number_format($pend['harga']) ?></td>
                                            <td><?= date('d F Y', strtotime($pend['created_at'])) ?></td>
                                            <td><?= $pend['pendapatan_termin1']; ?></td>
                                            <td><?= $pend['pendapatan_termin2']; ?></td>
                                            <td><?= $pend['pendapatan_termin3']; ?></td>
                                            <td><?= $pend['total_pendapatan'] ?></td>
                                            <?php $total += $pend['total_pendapatan'] ?>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="9" align="right"><b>Total Pendapatan </b></td>
                                        <td><?= number_format($total, 2) ?></td>
                                    </tr>
                                </tfoot>

                            </table>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
