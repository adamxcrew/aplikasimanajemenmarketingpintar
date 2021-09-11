<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> 

    <div class="row">
        <div class="col-lg">

            <form action="<?= base_url('pelanggan/store'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-body">
                        <input type="hidden" name="id" value="<?= $editData->id_pelanggan ?>">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $editData->nama ?>" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?= $editData->alamat ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Kelurahan</label>
                            <input type="text" class="form-control" id="kel" name="kel" placeholder="Kelurahan" value="<?= $editData->kelurahan ?>">
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" class="form-control" id="kec" name="kec" placeholder="Kecamatan" value="<?= $editData->kecamatan ?>">
                        </div>
                        <div class="form-group">
                            <label>Kabupaten</label>
                            <input type="text" class="form-control" id="kab" name="kab" placeholder="Kab/Kota" value="<?= $editData->kabupaten ?>">
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" value="<?= $editData->provinsi ?>">
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="number" class="form-control" value="<?= $editData->no_telepon ?>" id="no_telp" name="no_telp" placeholder="Nomor Telepon">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $editData->email ?>" placeholder="Email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="edit">Simpan perubahan</button>
                    </div>
            </form>
            
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

        </div>
    </div>
</div>