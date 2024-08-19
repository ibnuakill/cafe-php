<?php
include('koneksi.php');

$id_menu = $_GET['id_menu'];

$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


  <title>Form Edit Menu</title>
</head>

<body>

  <!-- Form Registrasi -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN EDIT MENU</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="edit.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="menu1">Nama Menu</label>
          <input type="hidden" name="id_menu" value="<?php echo $result[0]['id_menu'] ?>">
          <input type="text" class="form-control" id="menu1" name="nama_menu" value="<?php echo $result[0]['nama_menu'] ?>">
        </div>
        <div class="form-group">
          <label for="#">Jenis Menu</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="jenis_menu" value="Makanan" <?php echo $result[0]['jenis_menu'] == 'Makanan' ? 'checked' : ''; ?>>Makanan
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="jenis_menu" value="Minuman" <?php echo $result[0]['jenis_menu'] == 'Minuman' ? 'checked' : ''; ?>>Minuman
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="stok1">Stok</label>
          <input type="text" class="form-control" id="stok1" name="stok" value="<?php echo $result[0]['stok'] ?>">
        </div>
        <div class="form-group">
          <label for="harga1">Harga Menu</label>
          <input type="text" class="form-control" id="harga1" name="harga" value="<?php echo $result[0]['harga'] ?>">
        </div>
        <div class="form-group">
          <label for="gambar">Foto Menu</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar" required>
        </div><br>
        <button type="submit" class="btn btn-primary" name="edit">Edit</button>
        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
      </form>
    </div>
  </div>
  <!-- Akhir Form Registrasi -->

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "username", "password", "database_name");

    // Mengambil data dari form
    $id_menu = $_POST['id_menu'];
    $nama_menu = $_POST['nama_menu'];
    $jenis_menu = $_POST['jenis_menu'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Menangani gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
      // Tentukan folder penyimpanan gambar
      $target_dir = "image/";
      $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

      // Periksa apakah gambar sebelumnya ada di database
      $query = "SELECT gambar FROM menu WHERE id_menu = $id_menu";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      $old_image = $row['gambar'];

      // Hapus gambar lama dari folder jika ada
      if (!empty($old_image) && file_exists($target_dir . $old_image)) {
        unlink($target_dir . $old_image);
      }

      // Pindahkan file gambar baru ke folder tujuan
      if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $gambar = basename($_FILES["gambar"]["name"]);
      } else {
        echo "Error saat mengunggah gambar.";
      }
    } else {
      // Jika tidak ada gambar yang diunggah, simpan gambar lama
      $gambar = $old_image;
    }

    // Update data di database
    $query = "UPDATE menu SET nama_menu='$nama_menu', jenis_menu='$jenis_menu', stok='$stok', harga='$harga', gambar='$gambar' WHERE id_menu=$id_menu";
    if (mysqli_query($conn, $query)) {
      echo "Data berhasil diupdate.";
    } else {
      echo "Error: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
  }
  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
</body>

</html>