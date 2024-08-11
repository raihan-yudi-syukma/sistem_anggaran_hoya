<?php
include('../../conf/koneksi.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate the input data
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $level = mysqli_real_escape_string($koneksi, $_POST['level']);

    // Create the update query
    $query = "UPDATE user SET 
			username = '$username',
            nama = '$nama',
            jenis_kelamin = '$jenis_kelamin',
            level = '$level'
			WHERE id = '$id'";

    // Execute the query
    if (mysqli_query($koneksi, $query)) {
        // Redirect to the appropriate page after success
        header('Location: ../index.php?page=user');
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
