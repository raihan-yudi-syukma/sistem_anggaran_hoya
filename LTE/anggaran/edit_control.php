<?php
include('../../conf/koneksi.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate the input data
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $no_anggaran = mysqli_real_escape_string($koneksi, $_POST['no_anggaran']);
    $tgl_anggaran = mysqli_real_escape_string($koneksi, $_POST['tgl_anggaran']);
    $id_item = mysqli_real_escape_string($koneksi, $_POST['id_item']);
    $nominal = mysqli_real_escape_string($koneksi, $_POST['nominal']);

    // Create the update query
    $query = "UPDATE anggaran SET 
			no_anggaran = '$no_anggaran',
			tgl_anggaran = '$tgl_anggaran',
			id_item = '$id_item',
			nominal = '$nominal'
			WHERE id = '$id'";

    // Execute the query
    if (mysqli_query($koneksi, $query)) {
        // Redirect to the appropriate page after success
        header('Location: ../index.php?page=anggaran');
        exit();
    } else {
        // Handle error
        echo "Error updating record: " . mysqli_error($koneksi);
    }
} else {
    // Handle invalid request method
    echo "Invalid request.";
}
?>
