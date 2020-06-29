<?php 
include ('config.php');

if (!isset($_GET['fx'])) { 
die("fx");
} 
else 
{ 
$fx = htmlspecialchars($_GET['fx'], ENT_QUOTES); 
}

if (!isset($_GET['imagename'])) 
{ 
die("name");
} 
else 
{ 
$url = '../'.$outputdirectory.'/'.$_GET['imagename'];
}




$cleanname = htmlspecialchars($_GET['imagename'], ENT_QUOTES);
$outputfile = $thumbprefix.'-'.$fx.'-'.$cleanname;

$firstlayer = rand(546,8784).'a'.rand(9788,68464);
$secondlayer = rand(546,8784).'b'.rand(9788,68464);
$output = rand(546,8784).'c'.rand(9788,68464);

$type = getimagesize($url);
switch($type['mime'])
	{
		case 'image/png':
			$src_img = imagecreatefrompng($url);
			include('filters/'.$_GET['type'].'/'.$fx.'.php');
		/*watermark*/
			/*$stamp = imagecreatefrompng('../assets/images/watermark.png');			
			$marge_right = 10;
			$marge_bottom = 10;
			$sx = imagesx($stamp);
			$sy = imagesy($stamp);
			imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
		    */
		/*watermark*/
			imagepng($im, '../output/'.$outputfile.'');
imagedestroy($im);
			echo '<div class="shadow"><img id="res" src="output/'.$outputfile.'?'.rand(1,3000).'"></div>';
			echo '<div class="save"><a href="output/'.$outputfile.'" target="_blank"><img src="assets/images/save.png"></a></div>';
			$imgurl = $urlsubfolder.'output/'.$outputfile.'';
//echo '<div class="socialholder"><div class="social"><a href="http://www.facebook.com/sharer.php?u='.$imgurl.'"  target="_blank" class="social-button" style="background:#495fbd;">
//<img src="assets/images/facebook.gif" alt="Share on Facebook"></a></div><div class="social"><a href="http://twitter.com/share?url='.$imgurl.'&text='.$twittertext.'"  target="_blank" class="social-button" style="background:#495fbd;"><img src="assets/images/twitter.gif" alt="Share on Twitter"></a></div><div class="social"><a href="https://plus.google.com/share?url='.$imgurl.'" class="social-button"  target="_blank" style="background:#495fbd;"><img src="assets/images/google.gif" alt="Share on Google+1"></a></div></div>';
			break;
			
			
			
		case 'image/gif':
			$src_img = imagecreatefromgif($url);
			include('filters/'.$_GET['type'].'/'.$fx.'.php');
			/*watermark*/
			/*$stamp = imagecreatefrompng('../assets/images/watermark.png');			
			$marge_right = 10;
			$marge_bottom = 10;
			$sx = imagesx($stamp);
			$sy = imagesy($stamp);
			imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
			*/
			/*watermark*/
			imagegif($im, '../output/'.$outputfile.'');
imagedestroy($im);
			echo '<div class="shadow"><img id="res" src="output/'.$outputfile.'?'.rand(1,3000).'"></div>';
			echo '<div class="save"><a href="output/'.$outputfile.'" target="_blank"><img src="assets/images/save.png"></a></div>';
			$imgurl = $urlsubfolder.'output/'.$outputfile.'';
//echo '<div class="socialholder"><div class="social"><a href="http://www.facebook.com/sharer.php?u='.$imgurl.'"  target="_blank" class="social-button" style="background:#495fbd;">
//<img src="assets/images/facebook.gif" alt="Share on Facebook"></a></div><div class="social"><a href="http://twitter.com/share?url='.$imgurl.'&text='.$twittertext.'"  target="_blank" class="social-button" style="background:#495fbd;"><img src="assets/images/twitter.gif" alt="Share on Twitter"></a></div><div class="social"><a href="https://plus.google.com/share?url='.$imgurl.'" class="social-button"  target="_blank" style="background:#495fbd;"><img src="assets/images/google.gif" alt="Share on Google+1"></a></div></div>';
			break;		




			
		case 'image/jpeg':
		case 'image/pjpeg':
		$src_img = imagecreatefromjpeg($url);	
		include('filters/'.$_GET['type'].'/'.$fx.'.php');
		/*watermark*/
			/*$stamp = imagecreatefrompng('../assets/images/watermark.png');			
			$marge_right = 10;
			$marge_bottom = 10;
			$sx = imagesx($stamp);
			$sy = imagesy($stamp);
			imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
		   */
		/*watermark*/
		imagejpeg($im, '../output/'.$outputfile.'', $imagequality);
		imagedestroy($im);		
			echo '<div class="shadow"><img id="res" src="output/'.$outputfile.'?'.rand(1,3000).'"></div>';			
			echo '<div class="save"><a href="output/'.$outputfile.'" target="_blank"><img src="assets/images/save.png"></a></div>';
$imgurl = $urlsubfolder.'output/'.$outputfile.'';
//echo '<div class="socialholder"><div class="social"><a href="http://www.facebook.com/sharer.php?u='.$imgurl.'"  target="_blank" class="social-button" style="background:#495fbd;">
//<img src="assets/images/facebook.gif" alt="Share on Facebook"></a></div><div class="social"><a href="http://twitter.com/share?url='.$imgurl.'&text='.$twittertext.'"  target="_blank" class="social-button" style="background:#495fbd;"><img src="assets/images/twitter.gif" alt="Share on Twitter"></a></div><div class="social"><a href="https://plus.google.com/share?url='.$imgurl.'" class="social-button"  target="_blank" style="background:#495fbd;"><img src="assets/images/google.gif" alt="Share on Google+1"></a></div></div>';
			break;
		default:
		echo '<div style="padding:50px">Error, cannot use this filetype</div>';
			die;
	}
?>