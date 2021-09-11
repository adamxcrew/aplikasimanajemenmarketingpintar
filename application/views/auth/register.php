    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun M-Mart</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="phone" name="phone" placeholder="Nomor Telepon" value="<?= set_value('phone'); ?>">
                                    <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Kata Sandi">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Kata Sandi">
                                       
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar Akun
                                </button>
                                <hr>
                                <button type="submit" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Daftar Dengan Google
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Lupa Kata Sandi?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Sudah Punya Akun ? Masuk Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>