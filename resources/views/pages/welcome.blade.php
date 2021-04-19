<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Frontpage laravel 7</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/business-frontpage.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Laravel 7</a>
      <img src="{{ asset('images/laravel-academy-logo.png')}}" width="40" height="40" class="d-inline-block align-top" alt="">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ Route('halamanUtama')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ Route('login')}}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="bg-primary py-3 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <img class="d-inline" src="{{ asset('images/gambar.png')}}" alt="logoInformatika" height="200" width="200">
          <img class="ml-4" src="{{ asset('images/informatika.png')}}" alt="logoInformatika" height="300" width="300">
          <h1 class="display-4 text-white mb-2">Application Files Storages</h1>
          <p class="lead mb-5 text-white-50">Aplikasi ini dibuat tanggal 28 Agustus 2020. Aplikasi ini dipergunakan untuk melakukan share file secara online. Semua data dan file dapat diakses secara mudah untuk diolah</p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2>Start With Laravel 7</h2>
        <hr>
        <p>Semua fitur yang ada di <i>Application Files Storages</i> berguna untuk menyimpan file yang akan diakses oleh semua Mahasiswa. Ada beberapa extension yang ada di sini, yaitu <i>Word</i>,<i>Excel</i>,<i>Pdf</i>,<i>Power Point</i></p>
        <p>Ada beberapa dosen yang memiliki akses untuk mengelola Aplikasi ini. Silahkan hubungi dosen dari Fakultas Ilmu Pendidikan , Untuk mengetahui File apa yang akan anda cari. Semua file ini memiliki keterangan berdasarkan extensi file dan dosen yang memiliki file tersebut.</p>
        <a class="btn btn-primary btn-lg" href="#">Call to Action &raquo;</a>
      </div>
      <div class="col-md-4 mb-5">
        <h2>Contact Us</h2>
        <hr>
        <address>
          <strong>Fakultas Ilmu Pendidikan</strong>
          <br>211287 Univeritas Pendidikan Indonesia
          <br>Jalan SetiaBudi 12
          <br>
        </address>
        <address>
         <center> <img src="{{ asset('images/gambar.png')}}" height="100" widht="100"alt=""></center>
         <br><hr>
          <a href="#">Univeritas Pendidikan Indonesia</a><br>
          <a href="mailto:#">fip@gmail.com</a>
        </address>
      </div>
    </div>
  
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <center><p class="m-0 text-center text-white d-inline">Copyright &copy; Application Files Storages 2020</p>
      <small><img src="{{('images/laravel-academy-logo.png')}}" widht="40" height="40" alt=""></small>
      </center>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('js/jquery.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>