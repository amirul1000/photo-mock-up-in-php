<?php 
$canvaswidth = 700;
$canvasheight = 525;


$dst = @imagecreatetruecolor(217, 161);
imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
$src_width = imagesx($src_img);
$src_height = imagesy($src_img); 
$dst_width = 217;
$dst_height = 161;
$new_width = $dst_width;
$new_height = round($new_width*($src_height/$src_width));
$new_x = 0;
$new_y = round(($dst_height-$new_height)/2);
$next = $new_height < $dst_height;
if ($next) {
$new_height = $dst_height;
$new_width = round($new_height*($src_width/$src_height));
$new_x = round(($dst_width - $new_width)/2);
$new_y = 0;
}
imagecopyresampled($dst, $src_img , $new_x, $new_y, 0, 0, $new_width, $new_height, $src_width, $src_height);
$im = @imagecreatetruecolor($canvaswidth, $canvasheight); 
$dst = imagerotate($dst,-6, 0);
imagefilter($dst, IMG_FILTER_PIXELATE, 2, true);
imagecopy ($im,$dst,322,113,0,0,$canvaswidth,$canvasheight); 
$png = "../props/19.png"; 
$effect = imagecreatefrompng($png); 

/*for debug
//imagecopymerge ($im,$effect,0,0,0,0,$canvaswidth,$canvasheight,50); 
*/
imagecopyresampled ($im,$effect,0,0,0,0,$canvaswidth,$canvasheight,$canvaswidth,$canvasheight); 
?>