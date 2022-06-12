<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?? "" ;?></title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('dashboard');?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Restaurant</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('dashboard');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <?php $this->load->view('template/menu'); ?>

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
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Restaurant</span>
                <img class="img-profile rounded-circle" src="<?=base_url('assets/');?>img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h2>Data Detail Pesanan</h2>
       <div class="card-header py-3 border-bottom-warning">
            <form action="<?=base_url()?>index.php/Pemesanan/insertdata" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <h2 align="center"><img src="<?=base_url()?>assets/picture/<?=$data->foto?>" alt="foto" style ="width: 200px; border: 1px; "></h2>

            <div class="form-group">
              <!-- <label class="control-label">Kode Menu</label> -->
              <input type="hidden" name="id_menu" value="<?=$data->id?>" class="form-control" readonly required>
            </div>

            <div class="form-group">
              <label class="control-label">Nama Menu</label>
              <input type="text" name="" value="<?=$data->nama_menu?>" class="form-control" readonly required>
            </div>
            <div class="form-group">
              <label class="control-label">Harga Menu</label>
              <input type="text" name="" value="<?=$data->harga_menu?>" class="form-control" readonly required>
            </div>

         <!--    <div class="form-group">
              <label class="control-label" >Status </label>
            <select class="form-control" name="status_menu" readonly required>
                  <?php foreach($status as $row):?>
                            <option value="<?php echo $row->status_menu;?>"><?php echo $row->nama_menu;?></option>

                  <?php endforeach;?>
            </select>
          </div>   -->
            <div class="form-group">
              <label class="control-label">Kode Menu </label>
            <select class="form-control" name="id_menu"  required>
                  <?php foreach($status as $row):?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->kode_menu;?></option>

                  <?php endforeach;?>
            </select>
          </div>
            <div class="form-group">
              <label class="control-label">Jenis Kategori Minuman</label>
            <select class="form-control" name="id_minuman"  required>
                  <?php foreach($menuminuman as $row):?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->jenis_kategori;?></option>

                  <?php endforeach;?>
            </select>
          </div>
          <div class="form-group">
              <label class="control-label">Jenis Kategori Makanan</label>
            <select class="form-control" name="id_makanan" required>
                  <?php foreach($menumakanan as $row):?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->jenis_kategori;?></option>

                  <?php endforeach;?>
            </select>
          </div>
            <div class="form-group">
              <label class="control-label">Tanggal pemesanan</label>
              <input type="date" name="tanggal_pemesan" class="form-control" required>
            </div>

            <div class="form-group">
              <label class="control-label">Kode Pemesanan</label>
              <input type="text" name="kode_pemesanan"  class="form-control" required>
            </div>  
             <div class="form-group">
              <label class="control-label">Nama Pembeli</label>
              <input type="text" name="nama_pembeli"  class="form-control" required>
            </div>
             <div class="form-group">
              <label class="control-label">No Hp</label>
              <input type="text" name="no_hp"  class="form-control" required >
            </div>
            <div class="form-group">
              <label class="control-label">Status Order</label>
              <input type="text" name="status_order"  class="form-control" required=>
            </div>
            <div class="form-group">
              <label class="control-label">Jumlah Pemesanan</label>
              <input type="number" name="jumlah_pemesanan" class="form-control" required>
            </div>
            
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>

        <?php $this->load->view('template/footer'); ?>
