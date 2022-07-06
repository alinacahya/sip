<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                    
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="../assets/img/logo.png" alt="logo" width="100">
                                        <h5 class="h5 text-gray-900">Sistem Informasi Perpustakaan Kejaksaan Negeri Cilacap</h5><br>
                                    </div>

                                    <?php echo $this->session->flashdata('pesan') ?>
                                    <form method="post" action="<?php echo base_url('auth/login') ?>" class="user" >
                                        <div class="form-group">
                                            <input id="username" type="text" class="form-control form-control-user" name="username" tabindex="1" autofocus  placeholder="Masukan Username">
                                        <?php echo form_error('username', '<div class="text-small text-danger">','</div>') ?>
                                        </div>
                                        <div class="form-group">
                                             <input id="password" type="password" class="form-control form-control-user" name="password" tabindex="2"  placeholder="Masukan Password">
                                             <?php echo form_error('password', '<div class="text-small text-danger">','</div>') ?>
                                        </div>
                                        
                                       <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
                      Login
                    </button>
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('register'); ?>">Belum Punya Akun? Silahkan Daftar!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</html>