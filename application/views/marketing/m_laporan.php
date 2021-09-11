<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?= $this->session->flashdata('message') ?>
    <div class="card">
        <div class="card-body">
            <p>Silahkan masukan tenggang waktu :</p>

            <form action="<?= base_url('marketing/report') ?>" method="post">
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
                        <button type="submit" name="export" class="btn btn-info btn-small">Ekspor ke PDF</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->