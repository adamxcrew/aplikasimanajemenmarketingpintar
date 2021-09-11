<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        </div>
        <div class="col-lg-4" align="right">
            <a href="<?=  base_url('admin/report_harian') ?>"  target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Laporan (hari ini)</a>
        </div>
    </div>

  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan Termin Selesai (Bulan Ini)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($amount) ?></div>

            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Supervisor</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $spv ?></div>
              <hr>
              <a href="<?= base_url('admin/supervisor'); ?>" class="text-xs font-weight-bold text-danger text-uppercase mb-1 ">Lihat Detail</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-cog fa-2x text-gray-300"></i>

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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Marketing</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $marketer ?></div>
              <hr>
              <a href="<?= base_url('admin/marketer'); ?>" class="text-xs font-weight-bold text-success text-uppercase mb-1 ">Lihat Detail</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pelanggan</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $pelanggan ?></div>
                  <hr>
                  <a href="<?= base_url('admin/pelanggan'); ?>" class="text-xs font-weight-bold text-info text-uppercase mb-1 ">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Termin Proses</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $proses ?></div>
              <hr>
              <a href="<?= base_url('admin/datatermin'); ?>" class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">Lihat Detail</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-sticky-note fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Termin Di Tolak</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ditolak ?></div>
              <hr>
              <a href="<?= base_url('admin/ditolak'); ?>" class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">Lihat Detail</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-times-circle fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Termin Selesai</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $termin ?></div>
              <hr>
              <a href="<?= base_url('admin/selesai'); ?>" class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">Lihat Detail</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-check-circle fa-2x text-gray-300"></i>
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