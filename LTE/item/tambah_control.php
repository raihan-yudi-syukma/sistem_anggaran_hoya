<?php
session_start(); // Mulai session jika belum dimulai
include('../../conf/koneksi.php');
	
// Proses simpan data jika form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id_item = $_POST['id_item'];
	$nama_item = $_POST['nama_item'];

	$insertStmt = $koneksi->prepare("INSERT INTO item VALUES ('', ?, ?)");
	$insertStmt->bind_param("ss", $id_item, $nama_item);
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