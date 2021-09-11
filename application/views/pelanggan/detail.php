<!-- Begin Page Content -->
<div class="container-fluid">
    <style>
        .hitamin{
            font-weight: bold;
        }
    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="no-gutters align-items-center">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <p class="hitamin">Nama :</p>
                            <?= $detail->nama ?>
                          </li>
                          <li class="list-group-item">
                              <p class="hitamin">Alamat :</p>
                              <?= $detail->alamat ?>
                          </li>
                          <li class="list-group-item">
                              <p class="hitamin">Provinsi :</p>
                              <?= $detail->provinsi ?>
                          </li>
                          <li class="list-group-item">
                              <p class="hitamin">Kab/Kota :</p>
                              <?= $detail->kabupaten ?>
                          </li>
                          <li class="list-group-item">
                              <p class="hitamin">Kecamatan</p>
                              <?= $detail->kecamatan ?>
                          </li>
                          <li class="list-group-item">
                              <p class="hitamin">Kelurahan</p>
                              <?= $detail->kelurahan ?>
                          </li>
                          <div class="row">
                              <div class="col">
                                   <li class="list-group-item">
                                      <p class="hitamin">No Telepon</p>
                                      <?= $detail->no_telepon ?>
                                  </li>
                              </div>
                              <div class="col">
                                  <li class="list-group-item">
                                      <p class="hitamin">Email</p>
                                      <?= $detail->email ?>
                                  </li>
                              </div>
                          </div>

                          <?php if($this->session->userdata('role_id') == 1) : ?>
                                <div>
                                  <li class="list-group-item">
                                      <p class="hitamin">Nama Marketing</p>
                                      <?= $detail->marketer_name ?>
                                  </li>
                                  <li class="list-group-item">
                                      <p class="hitamin">Nama Supervisor</p>
                                      <?= $detail->supervisor_name ?>
                                  </li>
                              </div>

                            <?php endif ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>