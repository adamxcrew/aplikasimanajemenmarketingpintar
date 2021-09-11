<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('massage'); ?>

            <table class=" table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Nama Marketing</th>
                        <th scope="col">Website</th>
                        <th scope="col">Harga</th>

                        <th scope="col">Action</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php if (!empty($termin)) : ?>
                        <?php foreach ($termin as $plg) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?> </th>
                                <td><?= $plg['pelanggan_name']; ?></td>
                                <td><?= $plg['marketer_name']; ?></td>
                                <td><?= $plg['website']; ?></td>
                                <td><?= $plg['harga']; ?></td>
                                <td>
                                    <a href="<?= base_url('supervisor/accepttermin?id=') . $plg['id_termin']  ?>" class=" badge badge-success" onclick="return confirm('Terima? Klik ok untuk melanjutkan')">Terima</a>
                                    <a href="<?= base_url('supervisor/declinetermin?id=') . $plg['id_termin']  ?>" class=" badge badge-danger" onclick="return confirm('Tolak termin?')">Tolak</a>
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
</div>
<!-- End of Main Content -->