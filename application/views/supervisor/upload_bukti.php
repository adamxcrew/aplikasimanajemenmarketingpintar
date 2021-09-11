<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-4">

            <form action="<?= base_url('supervisor/do_uploadBuktiTermin') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_termin" value="<?= $terminId ?>">
                <input type="hidden" name="termin" value="<?= $termin ?>">
                <div class="form-group">
                    <label>Pilih gambar :</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            </form>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

