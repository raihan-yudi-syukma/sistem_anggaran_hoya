<?php
include('../../conf/koneksi.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate the input data
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $id_item = mysqli_real_escape_string($koneksi, $_POST['id_item']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);

    // Create the update query
    $query = "UPDATE item SET 
			id_item = '$id_item', 
			nama = '$nama'
			WHERE id = '$id'";

    // Execute the query
    if (mysqli_query($koneksi, $query)) {
        // Redirect to the appropriate page after success
        header('Location: ../index.php?page=item');
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
