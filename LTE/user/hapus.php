<?php
include('../../conf/koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
    header('location:../index.php?page=user');
}
?>
