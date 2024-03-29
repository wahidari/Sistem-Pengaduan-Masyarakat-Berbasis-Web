<!-- # @Author: Wahid Ari <wahidari>
# @Date:   8 January, 5:05
# @Copyright: (c) wahidari 2017 -->
<?php
    // database
    require_once("database.php");
    // global var
    global $nomor, $foundreply;
    // hapus laporan berdasarkan id laporan
    if (isset($_POST['Hapus'])) {
        $id_hapus = $_POST['id_laporan'];
        // hapus semua tanggapan dari laporan yang akan dihapus
        $statement = $db->query("DELETE FROM `tanggapan` WHERE `tanggapan`.`id_laporan` = $id_hapus");
        // hapus laporan
        $statement = $db->query("DELETE FROM `laporan` WHERE `laporan`.`id` = $id_hapus");
    }
    // tanggapi laporan
    if (isset($_POST['Balas'])) {
        // get max id_tanggapan from table tanggapan
        $statement = $db->query("SELECT id_tanggapan FROM `tanggapan` ORDER BY id_tanggapan DESC LIMIT 1");
        foreach ($statement as $key ) {
            $max_id = $key['id_tanggapan']+1;
        }
        // insert tabel tanggapan
        $id_laporan = $_POST['id_laporan'];
        $isi_tanggapan = $_POST['isi_tanggapan'];
        $admin = "admin";
        $sql = "INSERT INTO `tanggapan` (`id_tanggapan`, `id_laporan`, `admin`, `isi_tanggapan`, `tanggal_tanggapan`) VALUES (:id_tanggapan, :id_laporan, :admin, :isi_tanggapan, CURRENT_TIMESTAMP)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id_tanggapan', $max_id);
        $stmt->bindValue(':id_laporan', $id_laporan);
        $stmt->bindValue(':admin', $admin);
        $stmt->bindValue(':isi_tanggapan', htmlspecialchars($isi_tanggapan));
        $stmt->execute();
        // jika ada tanggapan, update status laporan menjadi ditanggapi
        $statement = $db->query("UPDATE `laporan` SET `status` = 'Ditanggapi' WHERE `laporan`.`id` = $id_laporan");
        // kembali ke page tables
        header("Location: tables");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Table - Pengaduan Dispenduk Bangkalan</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index">Dispenduk Bangkalan</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav sidebar-menu" id="exampleAccordion">
                <li class="sidebar-profile nav-item" data-toggle="tooltip" data-placement="right" title="Admin">
                    <div class="profile-main">
                        <p class="image">
                            <img alt="image" src="images/avatar1.png" width="80">
                            <span class="status"><i class="fa fa-circle text-success"></i></span>
                        </p>
                        <p>
                            <span class="">Admin</span><br>
                            <span class="user" style="font-family: monospace;">Super Admin</span>
                        </p>
                    </div>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="index">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="charts">
                        <i class="fa fa-fw fa-area-chart"></i>
                        <span class="nav-link-text">Charts</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="tables">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Tables</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Export">
                    <a class="nav-link" href="export">
                        <i class="fa fa-fw fa-print"></i>
                        <span class="nav-link-text">Export</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Components</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="cards">Cards</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Login">
                    <a class="nav-link" href="login">
                        <i class="fa fa-fw fa-link"></i>
                        <span class="nav-link-text">Login</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-envelope"></i>
                        <span class="d-lg-none">Messages
                            <span class="badge badge-pill badge-primary">12 New</span>
                        </span>
                        <span class="indicator text-primary d-none d-lg-block">
                            <i class="fa fa-fw fa-circle"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">New Messages:</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>David Miller</strong>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small" href="#">View all messages</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="d-lg-none">Alerts
                            <span class="badge badge-pill badge-warning">6 New</span>
                        </span>
                        <span class="indicator text-warning d-none d-lg-block">
                            <i class="fa fa-fw fa-circle"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">New Alerts:</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <span class="text-success">
                                <strong>
                                    <i class="fa fa-long-arrow-up fa-fw"></i>Status Update
                                </strong>
                            </span>
                            <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small" href="#">View all alerts</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Body -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <!-- DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Laporan Masuk
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telpon</th>
                                    <th>Isi Laporan</th>
                                    <th>Tanggal</th>
                                    <th class="sorting_asc_disabled sorting_desc_disabled">Status</th>
                                    <th class="th-no-border sorting_asc_disabled sorting_desc_disabled"></th>
                                    <th class="th-no-border sorting_asc_disabled sorting_desc_disabled" style="text-align:right">Aksi</th>
                                    <th class="sorting_asc_disabled sorting_desc_disabled"></th>
                                </tr>
                            </thead>
                            <tbody>

<?php
// Ambil semua record dari tabel laporan
    $statement = $db->query("SELECT * FROM `laporan` ORDER BY id DESC");
    foreach ($statement as $key ) {
        $mysqldate = $key['tanggal'];
        $phpdate = strtotime($mysqldate);
        $tanggal = date( 'd/m/Y', $phpdate);
?>
                                <tr>
                                    <td><?php echo $key['nama']; ?></td>
                                    <td><?php echo $key['email']; ?></td>
                                    <td><?php echo $key['telpon']; ?></td>
                                    <td><?php echo $key['isi']; ?></td>
                                    <td><?php echo $tanggal; ?></td>
                                    <td><?php echo $key['status']; ?></td>
                                    <td class="td-no-border">
                                        <button type="button" class="btn btn-primary btn-sm btn-custom card-shadow-2" data-toggle="modal" data-target="#ModalDetail<?php echo $key['id']; ?>">
                                            Detail
                                        </button>
                                    </td>
                                    <td class="td-no-border">
                                        <button type="button" class="btn btn-primary-custom btn-sm btn-custom card-shadow-2" data-toggle="modal" data-target="#ModalBalas<?php echo $key['id']; ?>">
                                            Balas
                                        </button>
                                    </td>
                                    <td class="td-no-border">
                                        <button type="button" class="btn btn-danger btn-sm btn-custom card-shadow-2" data-toggle="modal" data-target="#ModalHapus<?php echo $key['id']; ?>">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
<?php
    }
?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        <!-- /.container-fluid-->

        <!-- Isi masing2 modal, detail, balas dan hapus -->
        <?php
            $statement = $db->query("SELECT * FROM laporan, divisi WHERE laporan.tujuan = divisi.id_divisi ORDER BY laporan.id DESC");
            foreach ($statement as $key ) {
                // cek apakah laporan sudah ditanggapi atau belum
                $nomor = $key['id'];
                $stat = $db->query("SELECT * FROM `tanggapan` WHERE id_laporan = $nomor");
                if ($stat->rowCount() > 0) {
                    // jika laporan sudah ditanggapi, maka tampilkan tanggapan di modal detail laporan
                    $foundreply = true;
                }
        ?>

        <!--Modal Detail-->
        <div class="modal fade" id="ModalDetail<?php echo $key['id']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg " role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title text-center">Detail Laporan</h5>
                    </div>
                    <div class="modal-body">
                        <p class="custom"><b>Nama :</b></p>
                        <p class="custom"><?php echo $key['nama']; ?></p>
                        <hr class="custom">
                        <p class="custom"><b>Email :</b></p>
                        <p class="custom"><?php echo $key['email']; ?></p>
                        <hr class="custom">
                        <p class="custom"><b>Telpon :</b></p>
                        <p class="custom"><?php echo $key['telpon']; ?></p>
                        <hr class="custom">
                        <p class="custom"><b>Alamat :</b></p>
                        <p class="custom"><?php echo $key['alamat']; ?></p>
                        <hr class="custom">
                        <p class="custom"><b>Tujuan :</b></p>
                        <p class="custom"><?php echo $key['nama_divisi']; ?></p>
                        <hr class="custom">
                        <p class="custom"><b>Isi Laporan :</b></p>
                        <p class="custom"><?php echo $key['isi']; ?></p>
                        <hr class="custom">
                        <p class="custom"><b>Tanggal :</b></p>
                        <p class="custom"><?php echo $key['tanggal']; ?></p>
                        <?php
                            // tampilkan tanggapan jika sudah ada tanggapan
                            if($foundreply) {
                                foreach ($stat as $keyy) {
                                ?>
                                <hr class="custom">
                                <p class="custom"><b>Tanggapan :</b></p>
                                <p class="custom"><?php echo $keyy['isi_tanggapan']; ?></p>
                                <?php
                                }
                            }
                         ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-close btn-sm card-shadow-2" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal Hapus-->

        <!-- Modal Balas -->
        <div class="modal fade" id="ModalBalas<?php echo $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Balas Laporan</h5>
                    </div>
                    <div class="modal-body">
                        <form  method="post">
                            <div class="form-group">
                                <p><b>Nama Pelapor:</b></p>
                                <?php echo $key['nama']; ?>
                                <hr>
                            </div>
                            <div class="form-group">
                                <p><b>Isi Laporan :</b></p>
                                <p>"<?php echo $key['isi']; ?>"</p>
                                <hr>
                            </div>
                            <div class="form-group">
                                <p><b>Tanggapan :</b></p>
                                <textarea class="form-control" name="isi_tanggapan" placeholder="Isi Tanggapan" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id_laporan" value="<?php echo $key['id']; ?>">
                                <input type="submit" class="btn btn-primary-custom card-shadow-2 btn-sm" name="Balas" value="Balas">
                                <button type="button" class="btn btn-close btn-sm card-shadow-2" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Balas -->

        <!--Modal Hapus-->
        <div class="modal fade" id="ModalHapus<?php echo $key['id']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm " role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title text-center">Hapus Laporan</h5>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Hapus Pengaduan</p>
                        <p class="text-center">Dari <b><?php echo $key['nama']; ?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <form method="post">
                            <input type="hidden" name="id_laporan" value="<?php echo $key['id']; ?>">
                            <input type="submit" class="btn btn-danger btn-sm card-shadow-2" name="Hapus" value="Hapus">
                            <button type="button" class="btn btn-close btn-sm card-shadow-2" data-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal Hapus-->
        <?php
            }
        ?>

        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Dispenduk Bangkalan 2018</small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.js"></script>
        <!-- Custom scripts for this page-->
        <script src="js/sb-admin-datatables.js"></script>
    </div>
    <!-- /.content-wrapper-->
</body>

</html>
