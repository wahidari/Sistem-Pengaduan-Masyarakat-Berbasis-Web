<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Lihat Pengaduan | Dispendukcapil Bangkalan</title>
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Main Styles CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="shadow">
        <nav class="navbar navbar-fixed navbar-inverse form-shadow">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home">
                        <img alt="Brand" src="images/bangkalan.png">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="home">HOME</a></li>
                        <li><a href="lapor">LAPOR</a></li>
                        <li class="active"><a href="lihat">LIHAT PENGADUAN</a></li>
                        <li><a href="cara">CARA</a></li>
                        <li class="dropdown">
                            <a href="profildinas" class="dropdown-toggle" data-toggle="dropdown">PROFIL DINAS <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="profildinas">Profil Dinas</a></li>
                                <li class="divider"></li>
                                <li><a href="profildinas">Visi dan Misi</a></li>
                                <li class="divider"></li>
                                <li><a href="profildinas">Struktur Organisasi</a></li>
                                <li class="divider"></li>
                                <li><a href="profildinas">Motto / Maklumat Pelayanan</a></li>
                            </ul>
                        </li>
                        <li><a href="faq">FAQ</a></li>
                        <li><a href="">BANTUAN</a></li>
                        <li><a href="kontak">KONTAK</a></li>
                    </ul>
                    <!-- <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">LOGIN</a></li>
                        <li><a href="#">REGISTER</a></li>
                    </ul>  -->
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav><!-- /.nav -->


        <!-- content -->
        <div class="main-content">
            <h3>Lihat Pengaduan</h3>
            <hr/>
            <div class="row">
                <div class="col-md-6 card-shadow form-custom">
                    <form class="form-horizontal" role="form" method="post" action="index.php">
                        <div class="form-group">
                            <label for="nomor" class="col-sm-4 control-label">Nomor Pengaduan</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-exclamation-sign"></span></div>
                                    <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukkan Nomor Pengaduan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <input id="submit" name="submit" type="submit" value="Lihat Pengaduan" class="btn btn-primary form-shadow">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6"></div>
            </div>

            <br>
            <h3>Hasil Pencarian</h3>

            <div class="row">
                <div class="col-md-8">
                    <div class="panel-body card-shadow">
                        <h4>Laporan</h4>
                        <hr class="hr-laporan">
                        <a class="media-left" href="#"><img class="img-circle img-sm" src="images/avatar1.png"></a>
                        <div class="media-body">
                            <div>
                                <a href="#" class="btn-link">Wahid Ari</a>
                                <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - 11 min ago</p>
                            </div>
                            <div class="isi-laporan">
                                <p class="text-justify">consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                    erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                                    nisl ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                            <hr>

                            <!-- Comments -->
                            <div>
                                <h4>Tindak Lanjut Laporan</h4>
                                <hr class="hr-laporan">
                                <div class="media-block comment">
                                    <a class="media-left" href="#"><img class="img-circle img-sm" src="images/avatar2.png"></a>
                                    <div class="media-body">
                                        <div>
                                            <a href="#" class="btn-link">Admin</a>
                                            <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - 7 min ago</p>
                                        </div>
                                        <p class="text-justify">Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                                            nisl ut aliquip ex ea commodo consequat.
                                        </p>
                                    </div>
                                </div>
                                <!-- comment -->
                            </div>
                            <!-- media body -->
                        </div>
                        <!-- panel body -->
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- <div class="panel-body card-shadow detail-laporan">
                        <h4 class="text-center">Keterangan</h4>
                        <div class="col-sm-5">
                            <p>Nomor Pengaduan</p>
                            <p>Nama</p>
                            <p>Email</p>
                            <p>Telpon</p>
                            <p>Tanggal</p>
                            <p>Desa</p>
                            <p>Kecamatan</p>
                            <p>Tujuan</p>
                        </div>
                        <div class="col-sm-7">
                            <p>12345</p>
                            <p>Wahid Ari</p>
                            <p>wahiid.ari@gmail.com</p>
                            <p>087850866665</p>
                            <p>Tanggal</p>
                            <p>Mlajah</p>
                            <p>Mlajah</p>
                            <p>Pemanfaatan Data Dan Informasi</p>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- /.main content -->
        </div>


        <hr>

        <!-- Footer -->
        <div class="footer footer-bottom text-center">
            <div class="row">
                <div class="col-md-4 mb-5 mb-lg-0">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <i class="fa fa-top fa-map-marker"></i>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="text-uppercase mb-4">Kantor</h4>
                        </li>
                    </ul>
                    <p class="mb-0">
                        Jalan Soekarno-Hatta No 50
                        <br>Bangkalan, Jawa Timur
                    </p>
                </div>
                <div class="col-md-4 mb-5 mb-lg-0">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <i class="fa fa-top fa-rss"></i>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="text-uppercase mb-4">Sosial Media</h4>
                        </li>
                    </ul>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://www.facebook.com/dispendukcapilbkl/">
                                <i class="fa fa-fw fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://twitter.com/disdukcapilbkl">
                                <i class="fa fa-fw fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <i class="fa fa-top fa-envelope-o"></i>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="text-uppercase mb-4">Kontak</h4>
                        </li>
                    </ul>
                    <p class="mb-0">
                        031-3095331 <br>
                        dispendukcapil@bangkalankab.go.id <br>
                        dispendukcapil.bangkalan@gmail.com
                    </p>
                </div>
            </div>
        </div>
        <!-- /footer -->

        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>V-1.0 | Copyright &copy; Dispendukcapil Bangkalan 2018</small>
            </div>
        </div>


    <!-- shadow -->
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.js"></script>

</body>

</html>
