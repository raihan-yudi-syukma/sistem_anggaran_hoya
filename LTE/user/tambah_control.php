<?php
session_start(); // Mulai session jika belum dimulai
include('../../conf/koneksi.php');
	
// Proses simpan data jika form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$level = $_POST['level'];

	$insertStmt = $koneksi->prepare("INSERT INTO user VALUES ('', ?, ?, ?, ?, ?)");
	$insertStmt->bind_param("sssss", $username, $password, $nama, $jenis_kelamin, $level);
	$insertStmt->execute();

	// Simpan data ke database.
	if (mysqli_affected_rows($koneksi) === 1) {
		// Simpan URL sebelumnya di session
		$_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];
		// Redirect ke halaman sebelumnya setelah berhasil menyimpan
		header('Location: ' . $_SESSION['previous_page']);
		exit;
	} else {
		// Jika terjadi error
		echo 'Error: ' . mysqli_error($koneksi);
	}
}
?>