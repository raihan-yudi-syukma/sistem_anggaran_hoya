<?php
session_start(); // Mulai session jika belum dimulai
include('../../conf/koneksi.php');
	
// Proses simpan data jika form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$no_anggaran = $_POST['no_anggaran'];
	$tgl_anggaran = $_POST['tgl_anggaran'];
	$id_item = $_POST['id_item'];
	$nominal = $_POST['nominal'];

	$insertStmt = $koneksi->prepare("INSERT INTO anggaran VALUES ('', ?, ?, ?, ?)");
	$insertStmt->bind_param("ssii", $no_anggaran, $tgl_anggaran, $id_item, $nominal);
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