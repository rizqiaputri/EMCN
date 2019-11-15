<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EMCN</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('assets/') ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('assets/') ?>/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/') ?>/css/startmin.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="<?php echo base_url('assets/') ?>/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url('assets/') ?>/css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('assets/') ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        
        <!-- jQuery -->
        <script src="<?php echo base_url('assets/') ?>/js/jquery.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="<?php echo base_url('assets/') ?>/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url('assets/') ?>/js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('assets/') ?>/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url('assets/') ?>/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('assets/') ?>/js/startmin.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">EMCN</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Test Admin <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url()."/BerandaController/Logout"?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>    
                                        <a href="#">Bahan <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo site_url('/BahanController') ?>">Lihat Bahan</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('/BahanController/tambahData') ?>">Tambah Bahan</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>    
                                        <a href="#">Pakaian <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo site_url('/ProdukController') ?>">Lihat Pakaian</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('/ProdukController/tambahData') ?>">Tambah Pakaian</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>    
                                        <a href="#">Akun <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo site_url('/AkunController') ?>">Lihat Akun</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('/AkunController/tambahData') ?>">Tambah Akun</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>    
                                        <a href="#">BOM <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo site_url('/BomController/FLihatBom') ?>">Lihat BOM</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('/BomController/FTambahBom') ?>">Tambah BOM</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fax fa-fw"></i> Transaksi<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>    
                                        <a href="#">Pesanan <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo site_url('/PesananController/lihatPesanan') ?>">Lihat Pesanan</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('/PesananController/index') ?>">Tambah Pesanan</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>    
                                        <a href="#">Pembelian <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo site_url('/PembelianController/lihatData') ?>">Lihat Pembelian</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('/PembelianController/index') ?>">Tambah Pembelian</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>    
                                        <a href="#">Produksi <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#">Lihat Produksi</a>
                                            </li>
                                            <li>
                                                <a href="#">Tambah Produksi</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-file-text fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#">Jurnal</a>
                                    </li>
                                    <li>
                                        <a href="#">Buku Besar</a>
                                    </li>
                                    <li>
                                        <a href="#">Harga Pokok Produksi</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php $this->load->view($content); ?>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

    </body>
</html>