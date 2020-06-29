<?php 
//width of the PNG layer
$canvaswidth = 700;
//height  of the PNG layer
$canvasheight = 525;

//desired max width and max height of the uploaded image
$dst = @imagecreatetruecolor(586, 319);
imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
$src_width = imagesx($src_img);
$src_height = imagesy($src_img); 
$dst_width = 586;
$dst_height = 319;
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
//delete the following if you do not want a rotation
$dst = imagerotate($dst, 180, 0);
//position of the resized uploaded image, 0 is the left position and 200 the top position
imagecopy ($im,$dst,0,200,0,0,$canvaswidth,$canvasheight); 
//url of the PNG layer
$png = "../props/12.png"; 
$effect = imagecreatefrompng($png); 

/*for debug
//uncomment the following and comment the next imagecopyresampled to see the transparency and edit the position easily
//imagecopymerge ($im,$effect,0,0,0,0,$canvaswidth,$canvasheight,50); 
*/
imagecopyresampled ($im,$effect,0,0,0,0,$canvaswidth,$canvasheight,$canvaswidth,$canvasheight); 

?>