<?php 
include("../proses.php");
// Cek Status Login
if (!isset($_SESSION["login"])) {
  header("Location: ../pages/login.php");
  exit;
}
// End Of Cek Status Login
$id = $_SESSION["login"];
$db = new Connect_db();
$result = $db->db_From_Id("SELECT * FROM user WHERE id = '$id'");

// Upload Pesanan
if (isset($_POST["pesan"])) {
  $id_tiket = $_POST["id_tiket"];
  $order_id = $_POST["order_id"];
  $email = $_POST["email"];
  $catatan = $_POST["catatan"];
  $rek_pengirim = $_POST["rek_pengirim"];
  $namarek_pengirim = $_POST["namarek_pengirim"];
  $bank_pengirim = $_POST["bank_pengirim"];
  $jenis_pesanan = $_POST["jenis_pesanan"];
  $bank_penerima = $_POST["bank_penerima"];
  $total_pembayaran = $_POST["total_pembayaran"];
  $waktu_pesanan = $_POST["waktu_pesanan"];
  $status = $_POST["status"];
  $link_status = $_POST["link_status"];
  $warna_status = $_POST["warna_status"];
  $bukti_transfer = $db->upload_Gambar($_FILES["gambar"]);
  
  $db->set_Pesanan($id_tiket, $order_id, $email, $catatan, $rek_pengirim, $namarek_pengirim, $bank_pengirim, $jenis_pesanan, $bank_penerima, $total_pembayaran, $waktu_pesanan,$bukti_transfer, $status, $link_status, $warna_status);
}
// End Of Upload Pesanan

// id tiket acak
$id_tiket_acak = mt_rand(00000,99999);
// end of id tiket acak
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/order.css">
  <title>Order</title>
</head>
<body>
  <div class="form-style-10">
    <h1>Place Order<span>Please fill in your information completely</span></h1>
    <form action="" method="post" enctype="multipart/form-data">

      <!-- BAGIAN 1 -->
        <div class="section"><span>1</span>Ordering Information</div>
        <div class="inner-wrap">
            <?php foreach ($result as $data_form): ?>
            <!-- GENERATE ORDER ID MENGGUNAKAN USERNAME + ID ACAK -->
            <input type="hidden" name="id_tiket" value="<?php echo $data_form["username"]?>|<?php echo $id_tiket_acak?>" readonly/></label>  
            
            <!-- GENERATE USERNAME MENGGUNAKAN USERNAME TERDAFTAR DI DATABASE -->
            <label>Username <input type="text" name="order_id" value="<?php echo $data_form["username"]?>" readonly/></label>
            
            <!-- GENERATE WA / EMAIL SESUAI YANG TERDAFTAR DI DATABASE -->
            <label>Whatsapp / Email <input type="text" name="email" value="<?php echo $data_form["no_wa"]?> / <?php echo $data_form["email"]?>" readonly /></label>
            <?php endforeach ?>
            
            <!-- CATATAN -->
            <label>Note <textarea name="catatan" autocomplete="off"></textarea></label>
        </div>
      <!-- END OF BAGIAN 1 -->

      <!-- BAGIAN 2 -->
        <div class="section"><span>2</span>Sender Information</div>
        
        <div class="inner-wrap">
            <!-- NO REKENING PENGIRIM -->
            <label>Account Number <input required type="text" name="rek_pengirim" autocomplete="off" /></label>
            
            <!-- NAMA REKENING PENGIRIM -->
            <label>Account Name<input type="text" required name="namarek_pengirim" autocomplete="off" /></label>
            
            <!-- JENIS BANK PENGIRIM -->
            <label>Sending Bank <select name="bank_pengirim">
              <option value="" >Select the bank you use!</option>
              <option value="BCA">BCA</option>
              <option value="MANDIRI">MANDIRI</option>
              <option value="BNI">BNI</option>
              <option value="BRI">BRI</option>
              <option value="DANA">DANA</option>
              <option value="OVO">OVO</option>
              <option value="...">Other...</option>
            </select></label>
            
        </div>
      <!-- END OF BAGIAN 2 -->

      <!-- BAGIAN 3 -->
        <div class="section"><span>3</span>Payment Information</div>
        
        <div class="inner-wrap">

            <!-- JENIS PESANAN -->
            <label>Types of goods <select name="jenis_pesanan" id="list-pesanan" onchange="getSelectValue();">
              <option value="0">Select Your Order</option>
              <option value="GURLS CLUB CONCERT VOL. 1" >GURLS CLUB CONCERT VOL. 1</option>
              <option value="GURLS CLUB NEW YEAR PARTY">GURLS CLUB NEW YEAR PARTY</option>
                
            
            </select></label>
            <!-- END OF JENIS PESANAN -->

            <!-- NILAI SESUAI PESANAN YANG DIPILIH -->
            <script>
              function getSelectValue(){
                var selectedValue = document.getElementById("list-pesanan").value;
                var total = 0;
                if (selectedValue == "GURLS CLUB CONCERT VOL. 1") {
                  total = 100000;
                }
                var hasil = document.getElementById("total-biaya");
                // BUAT ELEMENT BARU KEDALAM ID total-biaya
                hasil.innerHTML = "<label>Total Pembayaran <input readonly type='text' name='total_pembayaran' value='" + total + "'/></label>"
              
              }
            </script>
            <!-- END OF NILAI SESUAI PESANAN YANG DIPILIH -->
            
            <!-- JENIS BANK TUJUAN -->
            <label>Bank Type <select id="list-bank" onchange="getSelectBank();">
              <option value="" >Select Destination Bank</option>
              <option value="BCA">BCA</option>
              <option value="MANDIRI">MANDIRI</option>
              <option value="BNI">BNI</option>
              <option value="BRI">BRI</option>
              <option value="DANA">DANA</option>
              <option value="OVO">OVO</option>
              <option value="...">Other...</option>
            </select></label>
            <!-- END OF JENIS BANK TUJUAN -->

            <!-- NILAI SESUAI JENIS BANK TUJUAN -->
            <script>
              function getSelectBank(){
                var selectedValue = document.getElementById("list-bank").value;
                var hasil = document.getElementById("rek-tujuan");
                var no_rekening = "null";
                if (selectedValue == "BCA") {
                  no_rekening = "BCA 7819201223 A/N LANGIT SENJA"
                }else if(selectedValue == "MANDIRI"){
                  no_rekening = "MANDIRI 8910782211 A/N LANGIT SENJA";
                }else if(selectedValue == "BNI"){
                  no_rekening = "BRI 891101012333 A/N LANGIT SENJA";
                }else if(selectedValue == "BRI"){
                  no_rekening = "BRI 8126649102 A/N LANGIT SENJA";
                }else if(selectedValue == "DANA"){
                  no_rekening = "DANA A/N LANGIT SENJA 085910221101";
                }else if(selectedValue == "OVO"){
                  no_rekening = "OVO A/N LANGIT SENJA 08672191222";
                }else{
                  no_rekening = "NOT AVAILABLE";
                }
                // BUAT ELEMENT BARU KEDALAM ID rek-tujuan
                hasil.innerHTML = "<label>No Rek Tujuan <input readonly type='text' name='bank_penerima' value='" + no_rekening + "'/></label>"
              }
            </script>
            <!-- END OF NILAI SESUAI JENIS BANK TUJUAN -->

            <!-- NEW KOLOM NO REK TUJUAN -->
            <div id="rek-tujuan"></div>
            <!-- NEW KOLOM TOTAL BIAYA PEMBAYARAN -->
            <div id="total-biaya"></div>

            <!-- AUTO GENERATE STATUS PESANAN, WAKTU PESANAN, LINK STATUS, WARNA STATUS -->
            <input type="hidden" name='status' value='pending'>
            <input type="hidden" name="waktu_pesanan" value="<?php echo date('l, d-m-Y | H:i:s a');?>" /></label>
            <input type="hidden" name="link_status" value="#">
            <input type="hidden" name="warna_status" value="warning">

            <!-- UPLOAD BUKTI TRANSFER -->
            <label>Evidence of transfer<input type="file" name="gambar"></label>  
          </div>
            <!-- END OF BAGIAN 3 -->  

            <!-- TOMBOL KIRIM -->
          <div class="button-section">
            <input type="submit" name="pesan" value="Send" />
          </div>
    </form>
    </div> 
</body>
</html>