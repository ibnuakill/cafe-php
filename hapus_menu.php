<?php

include('koneksi.php');

$id_menu = $_GET['id_menu'];

$hapus = mysqli_query($koneksi, "DELETE FROM produk WHERE id_menu='$id_menu'");

if ($hapus)
	header('location: daftar_menu.php');
else
	echo "Hapus data gagal";

?><?php
	include('koneksi.php');

	if (isset($_GET['id_menu'])) {
		$id_menu = $_GET['id_menu'];

		// Ambil nama file gambar dari database
		$query = mysqli_query($koneksi, "SELECT gambar FROM produk WHERE id_menu = $id_menu");
		$result = mysqli_fetch_assoc($query);
		$gambar = $result['gambar'];

		// Hapus file gambar dari folder upload
		$target_file = "upload/" . $gambar;
		if (file_exists($target_file)) {
			unlink($target_file); // Hapus file
		}

		// Hapus data dari database
		$query = "DELETE FROM produk WHERE id_menu = $id_menu";
		if (mysqli_query($koneksi, $query)) {
			echo "<script>alert('Menu berhasil dihapus');window.location='daftar_menu.php';</script>";
		} else {
			echo "Error: " . mysqli_error($koneksi);
		}
	}
	?>
 