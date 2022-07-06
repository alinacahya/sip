
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-book-reader"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PERPUSTAKAAN KEJARI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('welcome') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/data_buku') ?>">
                   <i class="fas fa-search"></i>
                    <span>Cari Buku</span></a>
            </li>
            <?php if($this->session->userdata('username')) {?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/data_pinjam') ?>">
                   <i class="fas fa-upload"></i>
                    <span>Data Peminjaman</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/pengembalian') ?>">
                   <i class="fas fa-download"></i>
                    <span>Data Pengembalian</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/detail_user') ?>">
                   <i class="fas fa-user"></i>
                    <span>Data Anggota</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/kalender') ?>">
                   <i class="fas fa-calendar"></i>
                    <span>Kalender</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('auth/logout')?>">
                <i class="fas fa-power-off"></i>
                 <span>Logout</span></a></li>
            <?php } else {?>
             <li class="nav-item">
                <i class="fas fa-right-from-bracket"></i>
                <a class="nav-link" href="<?php echo base_url('auth/login')?>">Login</a>
            </li>
            <?php } ?>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <?php echo form_open('user/data_buku/search') ?>
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control bg-light border-2 small" placeholder="Cari Judul Buku" aria-label="Search" aria-describedby="basic-addon2" >
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-warning border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                    </ul>
                        <!-- untuk control login, logout -->

                       <ul class="nav navbar-nav navbar-right">
                            <?php if($this->session->userdata('username')) { ?>
                                <li><div>Selamat Datang <?php echo $this->session->userdata('username') ?></div></li>

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <li class="ml-2"><?php echo anchor('auth/logout', 'Logout')  ?></li>
                            <?php } else { ?>
                                <li><?php echo anchor('auth/login', 'Login'); ?></li>
                            <?php } ?>
                             
                    </ul>

                </nav>
        <!-- End of Topbar -->