<section class="sidebar" >
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img style=" max-width: 70px "  src="<?php echo base_url('assets/dist/img/kebumen.png')?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>DINAS KOMINFO</p>
      <p> Kab KEBUMEN </p>
    </div>
  </div>
  <!-- search form -->

  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li>
      <a href="<?php echo base_url('dashboard/index')?>">
        <i class="fa fa-dashboard"></i> 
        <span>Dashboard</span></a>
      </li>

      <li class="treeview menu">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Data Utama</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('pegawai/index')?>"><i class="fa fa-circle-o"></i> Pegawai </a></li>
          <li><a href="<?php echo base_url('golongan/index')?>"><i class="fa fa-circle-o"></i> Golongan Pegawai </a></li>
          <li><a href="<?php echo base_url('transportasi/index')?>"><i class="fa fa-circle-o"></i> Transportasi </a></li>
          <li class="treeview menu">
            <a href="#">
              <i class="fa fa-money"></i> <span>Biaya</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('biaya_harian/index')?>"><i class="fa fa-circle-o"></i> Biaya harian </a></li>
              <li><a href="<?php echo base_url('biaya_penginapan/index')?>"><i class="fa fa-circle-o"></i> Biaya penginapan </a></li>
              <li><a href="<?php echo base_url('biaya_transportasi_mobil/index')?>"><i class="fa fa-circle-o"></i> Biaya transportasi mobil </a></li>
              <li><a href="<?php echo base_url('biaya_transportasi_lain/index')?>"><i class="fa fa-circle-o"></i> Biaya transportasi lain </a></li>

            </ul>
          </li>
        </ul>
      </li>


      <li class="treeview menu">
        <a href="#">
          <i class="fa fa-book"></i> <span>Data Surat</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('perjalanan_dinas/index')?>"><i class="fa fa-circle-o"></i> Perjalanan Dinas </a></li>
          <li><a href="<?php echo base_url('surat_tugas/index')?>"><i class="fa fa-circle-o"></i> Surat Tugas </a></li>
          <li><a href="<?php echo base_url('surat_perintah_perjalanan_dinas/index')?>"> <i class="fa fa-circle-o"></i> Surat Perintah Perjalanan <br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dinas ( SPPD )</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url('biaya_perjalanan_pegawai/index')?>">
          <i class="fa fa-exchange"></i>  <span> Biaya Perjalanan pegawai </span></a>
        </li>
<!--        <li>
          <a href="<?php echo base_url('contoh_select2/index')?>">
            <i class="fa fa-folder"></i>Contoh select 2_Elen</a>
          </li>  -->
        <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
    <script>
      var url = window.location;
// Will only work if string in href matches with location
$('.sidebar-menu a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
$('.sidebar-menu a').filter(function() {
  return this.href == url;
}).parent().addClass('active');
</script>