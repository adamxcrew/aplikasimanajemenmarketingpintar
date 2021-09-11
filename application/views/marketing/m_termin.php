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
                            <?= $this->session->flashdata('massage'); ?>

                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#inputpembayaranModal">Input Pembayaran</a>

                            <table class="table table-striped table-responsive" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Marketer</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Termin 1</th>
                                        <th scope="col">Termin 2</th>
                                        <th scope="col">Termin 3</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php if (!empty($termin)) : ?>
                                        <?php foreach ($termin as $term) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?> </th>
                                                <td><?= $term['pelanggan_name']; ?></td>
                                                <td><?= $term['marketer_name']; ?></td>
                                                <td><?= $term['website']; ?></td>
                                                <td><?= number_format($term['harga']) ?></td>
                                                <td><?= number_format($term['termin1']); ?></td>
                                                <td><?= number_format($term['termin2']); ?></td>
                                                <td><?= number_format($term['termin3']); ?></td>
                                                <?php $accept = $term['is_accept'] ?>

                                                <?php if ($accept == 0) : ?>
                                                    <td><span class="badge badge-danger">DITOLAK</span></td>
                                                <?php elseif ($accept == 1) : ?>
                                                    <td><span class="badge badge-success">DITERIMA</span></td>
                                                <?php else : ?>
                                                    <td><span class="badge badge-info">MENUNGGU</span></td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                            <div class="col-auto">
                            </div>

                        </div>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Modal -->

                <!-- Modal -->
                <div class="modal fade" id="inputpembayaranModal" tabindex="-1" role="dialog" aria-labelledby="inputpembayaranModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="inputpembayaranModalLabel">Input Order Pembayaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('marketing/createTermin'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="form-group mb-3">
                                                <label for="inputGroupSelect01">Nama Pelanggan</label>
                                            <select name="pelanggan" class="custom-select" id="inputGroupSelect01">
                                                <option selected>--- Pilih ---</option>
                                                <?php foreach ($pelanggan as $plg) : ?>
                                                    <option value="<?= $plg['id_pelanggan'] ?>"><?= $plg['nama'] ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                                <label for="inputGroupSelect02">Jenis Website</label>
                                            <select name="jenis_web" id="js-jenisweb" class="custom-select" id="inputGroupSelect02">
                                                <option selected>--- Pilih ---</option>
                                                <?php foreach ($jenis as $js) : ?>
                                                    <option value="<?= $js['id'] ?>"><?= $js['nama'] ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="number" class="form-control" id="harga" name="harga" placeholder="00,-" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" readonly>
                                                <p style="font-size: 12px; margin-left: 10px;">Rp. <span id="formatted">00,-</span></p>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Website</label>
                                                <input type="text" autocomplete="off" class="form-control" id="website" name="website" placeholder="cth: www.tyket.org" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>