<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="container-login100" style="background-image: url('assets/images/bg-02.jpg');">
        <div class="container">


            <!-- Outer Row -->
            <div class="row justify-content-center">


                <div class="col-xl-8 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block" style="background-image: url('assets/images/bg-05.png');"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-6"> Masuk Aplikasi MSmart</h1>
                                            <h5 class="h5 text-gray-900 mb-3">
                                                <font color="blue" face="Century Gothic">Sistem Manajemen Marketing RITMALL</font>
                                            </h5>
                                        </div>

                                        <?= $this->session->flashdata('message'); ?>

                                        <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                            <div class="form-group">

                                                <input type="text" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukan Email" value="<?= set_value('email'); ?>">

                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class=" form-group">
                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Kata Sandi">
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                                                </div>
                                            </div>
                                            <div class="container-login100-form-btn m-t-32">
                                                <button class="login100-form-btn">
                                                    Masuk
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div id="dropDownSelect1"></div>

        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="assets/js/main.js"></script>

</body>

</html>