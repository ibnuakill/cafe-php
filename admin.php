<?php
session_start();
if (!isset($_SESSION['login_user'])) {
  header("location: login.php");
} else {
?>

  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Abz Cafe</title>
  </head>

  <body>

    <!-- Jumbotron -->
    <div class=" jumbotron-fluid text-center">
      <div class="container">
        <h1 class="display-4"><span class="font-weight-bold">ABZ CAFE</span></h1>
        <hr>
        <p class="lead font-weight-bold">Silahkan Pesan Menu Sesuai Keinginan Anda <br>
          Enjoy Your Meal</p>
      </div>
    </div>
    <br>
    <!-- Akhir Jumbotron -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  bg-dark">
      <div class="container">
        <a class="navbar-brand text-white" href="admin.php"><strong>Abz</strong>Cafe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link mr-4" href="admin.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="daftar_menu.php">DAFTAR MENU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="pesanan.php">PESANAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="logout.php">LOGOUT</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Menu -->
    <div class="container">
      <div class="text-center mt-5 mb-(-30)">
        <h5 class="d-inline">Cirebon, West Java</h5>
        <h5 class="d-inline">Buka Jam</h5>
        <h5 class="d-inline"><strong>16:00 - 23:00</strong></h5>
        <h5 class="d-inline" id="localTime"></h5>
      </div>
    </div>

    <div class="row mb-5 mt-5">
      <div class="col-md-6 d-flex justify-content-end align-self-stretch">
        <div class="card bg-dark text-white border-light">
          <img src="images/background/bg10.jpg" class="card-img" alt="Lihat Daftar Menu">
          <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <a href="daftar_menu.php" class="btn btn-primary">LIHAT DAFTAR MENU</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 d-flex justify-content-start align-self-stretch">
        <div class="card bg-dark text-white border-light">
          <img src="images/background/bg14.jpg" class="card-img" alt="Lihat Pesanan">
          <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <a href="pesanan.php" class="btn btn-primary">LIHAT PESANAN</a>
          </div>
        </div>
      </div>
    </div>
    </div>



    <!-- Akhir Menu -->

    <!-- Awal Footer -->
    <?php include('footer.php'); ?>
    <!-- Akhir Footer -->

    <script>
      function updateTime() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');

        const timeString = `${hours}:${minutes}:${seconds}`;
        document.getElementById('localTime').textContent = `Waktu Sekarang: ${timeString}`;
      }

      // Update waktu setiap detik
      setInterval(updateTime, 1000);

      // Inisialisasi waktu saat halaman dimuat
      updateTime();
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>

  </html>
<?php } ?>