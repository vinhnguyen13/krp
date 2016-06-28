<?php
$image = $_GET['ph'];
//$out =  readfile($image);
//$out =  file_get_contents($image);
//echo $out;
//exit;
$w = $_GET['w'];
getImage_w($image, $w);
function getImage_w($image, $w){
    $ext = strrchr($image, ".");
    if (strtolower($ext) == '.jpg' || strtolower($ext) == '.jpeg'){
        header('Content-type: image/jpeg');

        $src_im_jpg = imagecreatefromjpeg($image);
        $size = getimagesize($image);

        $src_w = $size[0];
        $src_h = $size[1];
        $dst_w = $w;
        $dst_h = round(($dst_w/$src_w)*$src_h);
        $dst_im = imagecreatetruecolor($dst_w,$dst_h);

        imagecopyresampled($dst_im,$src_im_jpg,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);

        imagejpeg($dst_im, NULL, 100);
        
    }
}