<?php
session_start();

// Fungsi untuk mengenerate kode captcha acak
function generateCaptchaCode($length = 6)
{
    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $code = "";
    for ($i = 0; $i < $length; $i++) {
        $code .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $code;
}

// Membuat kode captcha baru
$captchaCode = generateCaptchaCode();

// Menyimpan kode captcha ke dalam session
$_SESSION['captcha_code'] = $captchaCode;

// Membuat gambar captcha menggunakan GD Library
$imageWidth = 120;
$imageHeight = 40;
$image = imagecreate($imageWidth, $imageHeight);
$backgroundColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);
imagestring($image, 5, 25, 12, $captchaCode, $textColor);
header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
?>