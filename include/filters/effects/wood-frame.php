<?php
$dst = @imagecreatetruecolor(457, 342);
imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
$src_width = imagesx($src_img);
$src_height = imagesy($src_img); 
$dst_width = 457;
$dst_height = 342;
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
$im = @imagecreatetruecolor(544, 586); 
imagecopy ($im,$dst,50,110,0,0,544,586); 
$png = "../props/7_2.png"; 
$effect = imagecreatefrompng($png); 
/*for debug
imagecopymerge ($im,$effect,0,0,0,0,544,586,50); 
*/
imagecopyresampled ($im,$effect,0,0,0,0,544,586,544,586); 
?>