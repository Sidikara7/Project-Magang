<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT</title>
</head>
<body>
 
	<center>
 
		<h2>LAPORAN</h2>
 
	</center>
 
    <?php
include("../proses.php");
$db = new Connect_db();
if (!isset($_SESSION["login_admin"])) {
    header("Location: loginadmin.php");
    exit;
}
$id_nama = $_SESSION["login_admin"];
$result_data = $db->db_From_Id("SELECT * FROM admin WHERE id = '$id_nama'");
$result_table = $db->db_From_Id("SELECT * FROM user_order WHERE status = 'Telah Digunakan'");
?>
 
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Jenis Pesanan</th>
                                            <th>ID Tiket</th>
                                            <th>Username</th>

                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result_table as $data) : ?>
                                            <tr>
                                                <td><?php echo $data["jenis_pesanan"] ?></td>
                                                <td><?php echo $data["id_tiket"] ?></td>
                                                <td><?php echo $data["order_id"] ?></td>
                                                <td><?php echo $data["total_pembayaran"] ?></td>
                                                <td><?php echo $data["status"] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>