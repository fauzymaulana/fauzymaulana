<?php
include '../connect/koneksi.php';

session_start();

// include './proses/input_jumlah_pasal_per_b.php';

if (!isset($_SESSION['email'])) {
  // header('location:./index.php');
  echo "<script>window.location='../index.php';alert('Anda harus login dulu!');</script>";

  exit;
}

$id = $_SESSION['id'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];

$get_id = $_GET['id'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>ATR/BPN</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- bootstrap 3.0.2 -->
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- font Awesome -->
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Morris chart -->
  <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
  <!-- jvectormap -->
  <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
  <!-- fullCalendar -->
  <link href="../css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
  <!-- Daterange picker -->
  <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

</head>

<body class="skin-black">
  <!-- <?php
        // Data isi select optioon jumlah bab
        $jumlah_bab = array(
          '-- Pilih Jumlah Bab --',
          '1',
          '2',
          '3',
          '4',
          '5',
          '6',
          '7',
          '8',
          '9',
          '10',
          '11',
          '12',
          '13',
          '14',
          '15',
          '16',
          '17',
          '18',
          '19',
          '20',
          '21',
          '22',
          '23',
          '24',
          '25',
          '26',
          '27',
          '28',
          '29',
          '30'
        );

        $opsi_pasal = array('Tidak', 'Ya');
        ?> -->
  <!-- header logo: style can be found in header.less -->
  <header class="header">
    <a href="#" class="logo">
      <!-- Add the class icon to your logo image or logo icon to add the margining -->
      Aplikasi Buku Saku
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-right">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-user"></i>
              <span><?= $_SESSION['nama']; ?> <i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header bg-light-blue">
                <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                <p>
                  <?= $_SESSION['nama']; ?>

                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../proses/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
          </div>
          <div class="pull-left info">
            <p>Hello, <?= $_SESSION['nama']; ?></p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li>
            <a href="../pages/dashboard.php">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="../pages/pengaturan.php">
              <i class="fa fa-cogs"></i><span> Pengaturan</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Pengguna</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="../pages/lihatadmin.php"><i class="fa fa-angle-double-right"></i> Data Pengguna Admin</a></li>
              <!-- <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                                    <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li> -->
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-copy"></i>
              <span>Undang-Undang</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="../pages/empty.php"><i class="fa fa-angle-double-right"></i> Kumpulan Undang-Undang</a></li>
              <li class="active"><a href="../pages/lihat_sk.php"><i class="fa fa-angle-double-right"></i> Pembuatan SK</a></li>
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">

      <!-- Main content -->
      <section class="content">



        <div class="row">
          <div class="col-xs-12">


            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Formulir Atribut Surat Keterangan</h3>
              </div><!-- /.box-header -->

              <div class="box-body">
                <?php
                $get_id = $_GET['id'];
                $result = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE id= '$get_id'");
                while ($dt = mysqli_fetch_array($result)) {
                  $nama_uu = $dt['nama_uu'];
                  $id_nama_uu = $dt['id'];
                }

                // $sql_sk_sk_pra_bab_nama_uu = mysqli_query($con, "SELECT * FROM tb_sk_pra_bab_pasal WHERE nama_uu_bab = '$nama_uu'");
                // $result = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE id= '$get_id'");
                // while ($dt = mysqli_fetch_array($result)) {
                //   $nama_uu = $dt['nama_uu'];
                // }

                $sql_sk_sk_pra_bab_nama_uu = mysqli_query($con, "SELECT * FROM tb_sk_pra_bab_pasal WHERE id= '$get_id'");
                if (mysqli_num_rows($sql_sk_sk_pra_bab_nama_uu) === 0) {
                  $tz = 'Asia/Jakarta';
                  $dt = new DateTime("now", new DateTimeZone($tz));
                  $time = $dt->format('Y-m-d G:i:s');

                  $input_sk = "INSERT INTO tb_sk_pra_bab_pasal(id,nama_uu_bab,kepala_lembaga_instansi,nama_pejabat_lembaga_instansi,lokasi_pengesahan,tanggal_pengesahan,menimbang,mengingat,menetapkan,tanggal_pembuatan) VALUES ('$get_id','$nama_uu', '', '', '', '', '', '', '', '$time')";

                  if (mysqli_query($con, $input_sk)) {
                    $select_sk = mysqli_query($con, "SELECT * FROM tb_sk_pra_bab_pasal WHERE id = '$get_id'");
                    while ($data_skk = mysqli_fetch_array($select_sk)) :
                      echo $data_skk['nama_uu_bab'];
                ?>

                      <form action="../proses/tambah_lihat_sk_bab_pasal.php" method="POST">
                        <div class="form-group row">
                          <span class="col-md-3">Nama Kumpulan UU</span>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="nama_kumpulan_uu" id="nama_kumpulan_uu" readonly value="<?= $data_skk['nama_uu_bab'];?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <span class="col-md-3">Kepala Lembaga Intansi</span>
                          <div class="col-md-8">
                            <input type="text" name="kepala_lembaga_instansi" id="kepala_lembaga_instansi" class="form-control" required>
                          </div>

                        </div>

                        <div class="form-group row">
                          <span class="col-md-3">Nama Pejabat Lembaga Intansi</span>
                          <div class="col-md-8">
                            <input type="text" name="nama_pejabat_lembaga_instansi" id="nama_pejabat_lembaga_instansi" class="form-control" required>
                          </div>

                        </div>

                        <div class="form-group row">
                          <span class="col-md-3">Lokasi Pengesahan</span>
                          <div class="col-md-8">
                            <input type="text" name="lokasi_pengesahan" id="lokasi_pengesahan" class="form-control" required>
                          </div>

                        </div>

                        <div class="form-group row">
                          <span class="col-md-3">Tanggal Pengesahan</span>
                          <div class="col-md-8">
                            <input type="date" name="tanggal_pengesahan" id="tanggal_pengesahan" class="form-control" required>
                          </div>

                        </div>

                        <div class="form-group row">
                          <span class="col-md-3">Menimbang</span>
                          <div class="col-md-8">
                            <textarea class="ckeditor" id="menimbang" name="menimbang" rows="10" cols="80" required></textarea>
                          </div>

                        </div>

                        <div class="form-group row">
                          <span class="col-md-3">Mengingat</span>
                          <div class="col-md-8">
                            <textarea class="ckeditor" id="mengingat" name="mengingat" rows="10" cols="80" required></textarea>
                          </div>

                        </div>

                        <div class="form-group row">
                          <span class="col-md-3">Menetapkan</span>
                          <div class="col-md-8">
                            <textarea class="ckeditor" id="menetapkan" name="menetapkan" rows="10" cols="80" required></textarea>
                          </div>

                        </div>

                        <div class="form-group row">
                          <label class="col-md-3" name="num_bab" id="num_bab"></label>
                          <div class="col-md-9">
                            <input type="submit" name="submit" id="submit" class="col btn btn-primary" value="Simpan">

                          </div>
                        </div>
                      </form>

                    <?php
                    endwhile;
                  }
                } else {
                  while ($data = mysqli_fetch_array($sql_sk_sk_pra_bab_nama_uu)) :
                    $nama_uu_pra_bab = $data['nama_uu_bab'];
                    $id_sk_pra_bab = $data['id'];

                    ?>

                    <hr>

                    <form action="../proses/tambah_lihat_sk_bab_pasal.php" id="form" method="POST">
                      <div class="form-group row">
                        <span class="col-md-3">Nama Kumpulan UU</span>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="nama_kumpulan_uu" id="nama_kumpulan_uu" value="<?= $data['nama_uu_bab']; ?>" required readonly>
                          <!-- <select class="select form-control" id="nama_kumpulan_uu" name="nama_kumpulan_uu" disabled>
                          <option disabled selected><?= $data['nama_uu']; ?></option>
                        </select> -->
                        </div>

                        <!-- <label class="col-md-8"><?= $undang_undang_select_all; ?></label> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Kepala Lembaga Intansi</span>
                        <div class="col-md-8">
                          <input type="text" name="kepala_lembaga_instansi" id="kepala_lembaga_instansi" value="<?= $data['kepala_lembaga_instansi']; ?>" class="form-control" required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Nama Pejabat Lembaga Intansi</span>
                        <div class="col-md-8">
                          <input type="text" name="nama_pejabat_lembaga_instansi" id="nama_pejabat_lembaga_instansi" value="<?= $data['nama_pejabat_lembaga_instansi']; ?>" class="form-control" required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Lokasi Pengesahan</span>
                        <div class="col-md-8">
                          <input type="text" name="lokasi_pengesahan" id="lokasi_pengesahan" class="form-control" value="<?= $data['lokasi_pengesahan']; ?>" required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Tanggal Pengesahan</span>
                        <div class="col-md-8">
                          <input type="date" name="tanggal_pengesahan" id="tanggal_pengesahan" class="form-control" value="<?= $data['tanggal_pengesahan']; ?>" required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Menimbang</span>
                        <div class="col-md-8">
                          <textarea class="ckeditor" id="menimbang" name="menimbang" rows="10" cols="80" required><?= $data['menimbang']; ?></textarea>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Mengingat</span>
                        <div class="col-md-8">
                          <textarea class="ckeditor" id="mengingat" name="mengingat" rows="10" cols="80" required><?= $data['mengingat']; ?></textarea>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Menetapkan</span>
                        <div class="col-md-8">
                          <textarea class="ckeditor" id="menetapkan" name="menetapkan" rows="10" cols="80" required><?= $data['menetapkan']; ?></textarea>
                        </div>
                        <!-- <span class="col-md-8"><?= $title_bab; ?></span> -->
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab"></label>
                        <div class="col-md-9">
                          <input type="submit" name="submit" id="submit" class="col btn btn-primary" value="Simpan">
                          <!-- <input type="text" name="get_jlh_psl" readonly id="get_jlh_psl" value="<?= $input_jumlah_pasal; ?>"> -->
                        </div>
                      </div>
                    </form>

                <?php

                  endwhile;
                }

                // if ($id_nama_uu === $get_id) {


                //   var_dump($id_sk_pra_bab . "\n");
                //   var_dump($get_id . "\n");
                //   
                ?>

                 <?php


                    //   // } elseif ($get_id != $id_sk_pra_bab) {
                    // } elseif (mysqli_num_rows($get_id) == 0) {


                    //   var_dump($id_sk_pra_bab . "\n");
                    //   var_dump($get_id . "\n");
                    //   $input_sk = "INSERT INTO tb_sk_pra_bab_pasal(id,nama_uu_bab,kepala_lembaga_instansi,nama_pejabat_lembaga_instansi,lokasi_pengesahan,tanggal_pengesahan,menimbang,mengingat,menetapkan,tanggal_pembuatan) VALUES ('$get_id','$nama_uu_pra_bab', '', '', '', '', '', '', '', '$time')";
                    //   if (mysqli_query($con, $input_sk)) {
                    //     $sql_sk = mysqli_query($con, "SELECT * FROM tb_sk_pra_bab_pasal WHERE id= '$get_id'");
                    //     while ($data_sk = mysqli_fetch_array($sql_sk)) {
                    //   
                    ?>



               <?php

                    //     }
                    //   }
                    // }


                    
                    ?>
              </div>

              <!--  </form> -->
            </div><!-- /.box body -->
          </div> <!-- /.box -->
        </div>

  </div>
  </section><!-- /.content -->
  </aside><!-- /.right-side -->
  </div><!-- ./wrapper -->


  <!-- jQuery 2.1.1 -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>
  <!-- DATA TABES SCRIPT -->
  <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
  <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
  <!-- AdminLTE App -->
  <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
  <!-- CK Editor -->
  <script src="../js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="../js/plugins/ckeditor/adapters/jquery.js" type="text/javascript"></script>



  <!-- page script -->
  <script type="text/javascript">
    // $(window).on('load',function(){
    //   $('#myModal').modal('show');
    // });


    $(function() {
      $("#example1").dataTable();
      $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
      });
    });

    // event onchange untuk milih jumlah bab dengan select option
    $(document).ready(function() {
      // $('.inp_bab').inp_bab()


      $('#inp_bab').on('change', function() {
        const selectedSelect = $('#inp_bab').val();
        // $('#myModal').modal('show');
        $('#sp').text(selectedSelect);
        $("#asp").val(selectedSelect);
      });

      //   $(document).ready(function() {
      //   $('.inp_pasal').inp_pasal()
      // });
      // var z = "";
      // $('#inp_pasal' + z).on('change', function() {
      //   const po = $('#inp_pasal' + z).val();
      //   $('#asb' + z).val(po);
      //   if (po == true) {
      //     var hsl = document.getElementById("pasal_tampil");
      //     hsl.innerHTML = "<input type='text' id='a' name='a' placeholder='ini pasal'>";
      //   }
      //   if (po == false) {
      //     hsl.innerHTML = "";
      //   }

      // });

    });
  </script>


</body>

</html>