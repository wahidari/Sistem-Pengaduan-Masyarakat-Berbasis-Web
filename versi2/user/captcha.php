<?php
# @Author: Wahid Ari <wahidari>
# @Date:   8 January, 5:05
# @Copyright: (c) wahidari 2017
?>
<?php
session_start();
// file untuk generate captcha
//mengashilkan bilangan acak 5 digit
$bilangan = rand(10000, 99999);

//mendaftarkan variabel di dalam sesion
$_SESSION["bilangan"] = $bilangan;

//membuat gambar captcha
$gambar = imagecreatetruecolor(65,30);
$background = imagecolorallocate ($gambar, 244,67,54);
$foreground = imagecolorallocate ($gambar, 255,255,255);
imagefill ($gambar, 0,0,$background);
imagestring ($gambar,10,10,6,$bilangan, $foreground);

//menentukan header
header("cache-control: no-cache, must-revalidate");
header ("content-type: image/png");
imagepng($gambar);
imagedestroy ($gambar);
?>
