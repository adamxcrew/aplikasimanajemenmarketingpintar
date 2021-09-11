<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        </div>
        <div class="col-lg-4" align="right">
            <a href="<?=  base_url('marketing/report_harian') ?>"  target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Laporan (hari ini)</a>
        </div>
    </div>

  <?= $this->session->flashdata('message') ?>

  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan Termin selesai (Bulan ini)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($amount) ?></div>
              <hr>

              <a href="<?= base_url('marketing/laporanku'); ?>" class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">Lihat Detail</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pelanggan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahPelanggan ?></div>
              <hr>
              <a href="<?= base_url('marketing/pelanggan'); ?>" class="text-xs font-weight-bold text-success text-uppercase mb-1 ">Lihat Detail</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Termin selesai</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $selesai ?></div>
                  <hr>
                  <a href="<?= base_url('marketing/termin'); ?>" class="text-xs font-weight-bold text-danger text-uppercase mb-1 ">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->

  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->