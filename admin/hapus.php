<?php
include("../proses.php");
$db = new Connect_db();

if (isset($_GET['id'])) {
    $id_to_delete = $_GET['id'];

    $connection = $db->getConnection(); // Ambil koneksi dari objek

    $query_delete = "DELETE FROM admin WHERE id = $id_to_delete";
    $result = mysqli_query($connection, $query_delete);

    if ($result) {
        // Penghapusan berhasil, arahkan kembali ke halaman sebelumnya
        header("Location: kelolaadmin.php");
        exit();
    } else {
        echo "Gagal menghapus data.";
        // Tindakan lain jika penghapusan gagal
    }
}
?>
