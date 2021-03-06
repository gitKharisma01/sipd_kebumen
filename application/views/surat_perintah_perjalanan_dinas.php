<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view("_partials/head.php") ?>
  <title></title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <?php $this->load->view("_partials/header.php") ?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php $this->load->view("_partials/sidebar.php") ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style=" background-image: url('<?php echo base_url('assets')?>/dist/img/regal.png');
    background-repeat: repeat;" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Surat Perintah Perjalanan Dinas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Surat Perintah Perjalanan Dinas</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">

      <div class="row">
        <div class="col-xs-12"> 
          <?php
          if ($this->session->flashdata('message')) {
            ?>
            <br><br>
            <div class="alert alert-success clearfix">
              <div class="noti-info">
                <a href="#"><?=$this->session->flashdata('message')?></a>
              </div>
            </div>
            <?php
          }
          else if ($this->session->flashdata('message_error')){
            ?>
            <br><br>
            <div class="alert alert-danger clearfix">
              <div class="noti-info">
                <a href="#"><?=$this->session->flashdata('message_error')?></a>
              </div>
            </div>
            <?php
            
          }
          ?>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="exampler" class="table table-bordered table-striped " style="width: 100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pegawai Tugas</th>
                    <th>Golongan</th>
                    <th>Nomor SPPD</th>
                    <th>Mata Anggaran</th>
                    <th>Keterangan Lain</th>
                    <th>Status Cetak</th>
                    <th>Action</th>   
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $temp_idPerjalananDinas='';
                  $temp_idPegawaiTugas='';
                  

                  foreach ($surat_perintah_perjalanan_dinas as $data_surat_perintah_perjalanan_dinas) {
                    ?>
                    <tr>
                      <td>
                        <?php echo $no;?>
                      </td>
                      <td> 
                        <?php
                        foreach ($perjalanan_dinas as $data_perjalanan_dinas) {
                          if ($data_surat_perintah_perjalanan_dinas->idPerjalananDinas == $data_perjalanan_dinas->idPerjalananDinas){ 
                            $temp_idPerjalananDinas=$data_surat_perintah_perjalanan_dinas->idPerjalananDinas;
                            $temp_idPegawaiTugas=$data_perjalanan_dinas->idPegawaiTugas;
                            echo $data_perjalanan_dinas->nama_pegawai . '<br>';
                            
                            foreach($pegawai_pengikut as $data_pegawai_pengikut){
                              if ( $data_pegawai_pengikut->idPerjalananDinas == $data_perjalanan_dinas->idPerjalananDinas){
                                echo $data_pegawai_pengikut->nama_pegawai . "<br>";
                                if (!isset($temp_idPegawaiPengikut)) {
                                  $temp_idPegawaiPengikut[0]=$data_pegawai_pengikut->idPegawaiPengikut;
                                }
                                else {
                                  array_push($temp_idPegawaiPengikut, $data_pegawai_pengikut->idPegawaiPengikut);
                                }
                              }
                            }
                            break;
                          }
                        };
                        ?>
                      </td>

                      <td>
                        <?php foreach ($pegawai as $data_pegawai) {
                          if ($data_pegawai->NIP == $temp_idPegawaiTugas) {
                            echo $data_pegawai->nama_golongan . '<br>';
                              //echo count($temp_idPegawaiPengikut);
                            break;
                          }

                        }
                        $cek_loop=0;
                        $count_temp_idPegawaiPengikut=count($temp_idPegawaiPengikut);
                        foreach ($pegawai as $data_pegawai) {
                          if ($cek_loop==$count_temp_idPegawaiPengikut) {
                            break;
                          }
                          for ($temp=0; $temp < $count_temp_idPegawaiPengikut ; $temp++) { 
                            if ($data_pegawai->NIP == $temp_idPegawaiPengikut[$temp]) {
                              echo $data_pegawai->nama_golongan . '<br>';
                              $cek_loop++;;
                            }
                          }
                        }
                        unset($temp_idPegawaiPengikut)
                        ?>
                      </td>
                      <td> <?php echo $data_surat_perintah_perjalanan_dinas->nomor_sppd; ?> </td>
                      <td> 
                        <?php echo $data_surat_perintah_perjalanan_dinas->mata_anggaran;
                        ?>
                      </td>
                      <td> 
                        <?php echo $data_surat_perintah_perjalanan_dinas->keterangan_lain_lain;
                        ?>
                      </td>
                      <td>
                        <div class="btn-group">
                          <?php 

                          if ($data_surat_perintah_perjalanan_dinas->status_cetak=="sudah") {
                            ?>
                            <button type="button" class="btn btn-success"> <?php echo $data_surat_perintah_perjalanan_dinas->status_cetak;?> </button>
                            <?php
                          }
                          else{
                            ?>
                            <button type="button" class="btn btn"> <?php echo $data_surat_perintah_perjalanan_dinas->status_cetak;?></button> 
                            <?php
                          }

                          ?>
                        </button>
                      </div> &nbsp;&nbsp;
                    </td>
                    <td> 
                      <div class="btn-group">
                        <a href="<?php echo base_url('surat_perintah_perjalanan_dinas/cetakSuratPerintahPerjalananDinas/'.$data_surat_perintah_perjalanan_dinas->idSPPD)?>">
                          <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print </button>
                        </a>
                      </div> &nbsp;&nbsp;
                      <div class="btn-group">
                        <a href="#modalEditData<?php echo $data_surat_perintah_perjalanan_dinas->idSPPD?>" data-toggle="modal" class="btn btn-warning btn-sm">
                          <i class="fa fa-edit"></i> Edit
                        </a>
                      </div>&nbsp;&nbsp;
<!--                         <div class="btn-group">
                          <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </button> 
                        </div>&nbsp;&nbsp; -->
                      </td>
                    </tr>
                    <?php 
                    $no++;
                    $temp_idPerjalananDinas='';
                  } ?>
                </tbody>
              </table>

              <?php
              foreach ($surat_perintah_perjalanan_dinas as $data_surat_perintah_perjalanan_dinas) {
                ?>
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditData<?php echo $data_surat_perintah_perjalanan_dinas->idSPPD?>" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Edit Data Surat Perintah Perjalanan Dinas</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" role="form" method="post" action="<?=base_url('surat_perintah_perjalanan_dinas/updateDataSuratPerintahPerjalananDinas/'.$data_surat_perintah_perjalanan_dinas->idSPPD)?>">

                          <div class="form-group">
                            <label class="col-lg-3 col-sm-3 control-label">Nama Pegawai Tugas</label>
                            <div class="col-lg-9">

                              <div class="col-lg-12">
                                <select name="pegawai_tugas[]" id="pegawai_tugas" class="form-control select2 select2-hidden-accessible" multiple="" disabled data-placeholder="" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                  foreach ($perjalanan_dinas as $data_perjalanan_dinas) {
                                    if ($data_surat_perintah_perjalanan_dinas->idPerjalananDinas == $data_perjalanan_dinas->idPerjalananDinas){ 
                                      echo "<option selected> $data_perjalanan_dinas->nama_pegawai</option>";
                                      foreach($pegawai_pengikut as $data_pegawai_pengikut){
                                        if ( $data_pegawai_pengikut->idPerjalananDinas == $data_perjalanan_dinas->idPerjalananDinas){
                                          echo "<option selected> $data_pegawai_pengikut->nama_pegawai</option>";
                                        }
                                      }
                                      break;
                                    }
                                  };
                                  ?>
                                </select>
                              </div>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-3 control-label">Nomor SPPD </label>
                            <div class="col-lg-9">
                              <input type="text" name="nomor_sppd" id="nomor_sppd" class="form-control" placeholder="Nomor SPPD" value="<?php echo $data_surat_perintah_perjalanan_dinas->nomor_sppd?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-3 control-label">Mata Anggaran </label>
                            <div class="col-lg-9">
                              <input type="text" name="mata_anggaran" id="mata_anggaran" class="form-control" placeholder="Mata Anggran" value="<?php echo $data_surat_perintah_perjalanan_dinas->mata_anggaran?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-3 control-label">Keterangan Lain Lain</label>
                            <div class="col-lg-9">
                              <input type="text" name="keterangan_lain_lain" id="keterangan_lain_lain" class="form-control" placeholder="Keterangan Lain Lain" value="<?php echo $data_surat_perintah_perjalanan_dinas->keterangan_lain_lain?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-3 control-label"> Status Cetak</label>
                            <div class="col-lg-9 col-sm-9">
                              <!-- Group of default radios - option 1 -->
                              <?php 
                              if ($data_surat_perintah_perjalanan_dinas->status_cetak=="belum") {
                                ?>
                                <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="status_cetak" value="sudah">
                                  <label class="custom-control-label">Sudah</label>
                                </div>

                                <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample2" checked name="status_cetak" value="belum">
                                  <label class="custom-control-label">Belum</label>
                                </div>
                                <?php
                              } else {
                                ?>
                                <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="status_cetak" checked value="sudah">
                                  <label class="custom-control-label">Sudah</label>
                                </div>

                                <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="status_cetak" value="belum">
                                  <label class="custom-control-label">Belum</label>
                                </div>
                                <?php
                              }
                              ?>

                            </div>
                          </div>
                          <div class="form-group">
                            <div style="padding-left: 60%" class="col-lg-offset-3 col-lg-9">
                              <button type="submit" class="btn btn-primary" name="edit" value="edit">Update</button>
                            </div>
                          </div>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- dashboard hightlight information SPPD -->


  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">  
    </div>
    <strong>Copyright &copy; Kuliah Magang Mahasiswa S1 Informatika UNS  KOMINFO Kebumen 2019</strong>
  </footer>
</div>
<!-- Control Sidebar -->

<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->


    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/')?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/')?>bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/')?>dist/js/adminlte.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('assets/')?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap  -->
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url('assets/')?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url('assets/')?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('assets/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url('assets/')?>bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('assets/')?>dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/')?>dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script >
      $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>

<script>
  $(document).ready(function(){
    $('#exampler').DataTable({
      "scrollX":true,
      "autoWidth":true
    })
  })

  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 2000);
</script>

<script>

  var url = window.location;
// Will only work if string in href matches with location
$('.treeview-menu a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
$('.treeview-menu a').filter(function() {
  return this.href == url;
}).parent().addClass('active');
</script>
</body>
</html>
