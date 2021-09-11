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

                            <table class=" table table-hover table-responsive" id="dataTable">
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
                                                <td><?= $term['harga']; ?></td>
                                                <td><?= $term['termin1']; ?></td>
                                                <td><?= $term['termin2']; ?></td>
                                                <td><?= $term['termin3']; ?></td>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
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