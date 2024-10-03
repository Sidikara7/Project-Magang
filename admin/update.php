<?php 
// koneksi database
include ("../proses.php");
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$username = $_POST['username'];
 
// update data ke database
mysqli_query($koneksi,"update admin set username='$username' where id='$id'");
 
// mengalihkan halaman kembali ke index.php

?>