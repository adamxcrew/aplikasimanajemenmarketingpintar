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

                            <table class="table table-striped" id="dataTable">
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
                                                <!-- =================TERMIN 1================ -->
                                                <?php if (empty($term['bukti_termin1'])) : ?>
                                                    <td>-</td>
                                                <?php else : ?>
                                                    <td>
                                                        <a href="<?= base_url('marketing/print_reminder/').$term['id_termin'] ?>" target="_blank" class="badge badge-success">
                                                            <i class="fas fa-print"> cetak</i>
                                                        </a>
                                                        <hr>
                                                        <p style="font-size: 10px">Dibayar pada : <?= $term['termin1_created'] ?></p>
                                                    </td>
                                                <?php endif; ?>
                                                <!-- =================TERMIN 2================ -->
                                                <?php if (empty($term['bukti_termin2'])) : ?>
                                                    <td>-</td>
                                                <?php else : ?>
                                                    <td>
                                                        <a href="<?= base_url('marketing/print_reminder/').$term['id_termin'] ?>" target="_blank" class="badge badge-success">
                                                            <i class="fas fa-print"> cetak</i>
                                                        </a>
                                                        <hr>
                                                        <p style="font-size: 10px">Dibayar pada : <?= $term['termin2_created'] ?></p>
                                                    </td>
                                                <?php endif; ?>
                                                <!-- =================TERMIN 3================ -->
                                                <?php if (empty($term['bukti_termin3'])) : ?>
                                                    <td>-</td>
                                                <?php else : ?>
                                                    <td>
                                                        <a href="<?= base_url('marketing/print_reminder/').$term['id_termin'] ?>" target="_blank" class="badge badge-success">
                                                            <i class="fas fa-print"> cetak</i>
                                                        </a>
                                                        <hr>
                                                        <p style="font-size: 10px">Dibayar pada : <?= $term['termin3_created'] ?></p>
                                                    </td>
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