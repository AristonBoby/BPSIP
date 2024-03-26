<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- Theme style -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" />
  @livewireStyles
</head>

<body class="sidebar-collapse layout-top-nav" style="height: auto;">
  <div class="wrapper">
    <div class="card">
      <div class="card-body">
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="#" class="navbar-brand">
          <img src="images/R.png" alt="AdminLTE Logo"  class="brand-image img-circle elevation-2" style="opacity: .9">
        </a>
        <label class="brand-text text-sm font-weight-light"><b>Badan Standarisasi Instrumen Pertanian<br>Kalimantan Timur</b></label>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-3 ml-5" id="navbarCollapse">
          <ul class="navbar-nav">
            <li class="nav-item"></li>
            <li class="nav-item"><a href="index3.html" class="nav-link">Beranda</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Jenis Pelayanan</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Pendaftaraan Pemeriksaan</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Ganti Password</a></li>
          </ul>
        </div>    
      </div> 
    </nav>  
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
      </ol>
    <div class="carousel-inner">
      <div class="carousel-item">
        <img class="d-block w-100" src="https://placehold.it/900x500/39CCCC/ffffff&amp;text=I+Love+Bootstrap" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://placehold.it/900x500/3c8dbc/ffffff&amp;text=I+Love+Bootstrap" alt="Second slide">
      </div>
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://placehold.it/900x500/f39c12/ffffff&amp;text=I+Love+Bootstrap" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-custom-icon" aria-hidden="true">
        <i class="fas fa-chevron-left"></i>
      </span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-custom-icon" aria-hidden="true">
        <i class="fas fa-chevron-right"></i>
      </span>
      <span class="sr-only">Next</span>
    </a>
  </div> 
</div>
<div class="card">
  <div class="card-body row">
    <div class="col-lg-4 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>
          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>  
      </div>
    </div>
    <div class="col-lg-4 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>
          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>  
      </div>
    </div>
    <div class="col-lg-4 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>
          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>  
      </div>
    </div>
  </div>
</div>
</div>
</body>
@livewireScripts
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../../dist/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
</html>
