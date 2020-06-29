<?php
include ('config.php');

if(isset($_POST))
{

	if(!isset($_FILES['imagefile']) || !is_uploaded_file($_FILES['imagefile']['tmp_name']))
	{
			echo '<div style="padding:50px; color:#fff">Error, cannot use this filetype</div>';
			die; 
	}
	


	$imagefilename 		= str_replace(' ','-',strtolower($_FILES['imagefile']['name'])); 
	$imagetmp	 	= $_FILES['imagefile']['tmp_name']; 
	$imagefiletype	 	= $_FILES['imagefile']['type']; 


	switch(strtolower($imagefiletype))
	{
		case 'image/png':
			$CreatedImage =  imagecreatefrompng($_FILES['imagefile']['tmp_name']);
			break;
		case 'image/gif':
			$CreatedImage =  imagecreatefromgif($_FILES['imagefile']['tmp_name']);
			break;			
		case 'image/jpeg':
		case 'image/pjpeg':
			$CreatedImage = imagecreatefromjpeg($_FILES['imagefile']['tmp_name']);
			break;
		default:
			echo '<div style="padding:50px; color:#fff">Error, you cannot use this format, only Jpg, png and gif</div>';
			die;
	}
	
	list($originalwidth,$originalheight)=getimagesize($imagetmp);	
	$extension=pathinfo($imagefilename, PATHINFO_EXTENSION);
	$random = rand(0, 9999999999); 
	$name = $random.'.'.$extension;
	$savefile = '../'.$outputdirectory.'/'.$name;
	
	
	if(resizeImage($originalwidth,$originalheight,$imagesize,$savefile,$CreatedImage,$imagequality,$imagefiletype))
	{
		echo '<div class="shadow"><img id="res" src="'.$outputdirectory.'/'.$name.'" style="display:none"></div>';
		?>
		<script>
		var imagename ='<?php echo $name; ?>';
		</script>
		<?php
	}
	else
	{
		die('Error'); 
	}
}



function resizeImage($originalwidth,$originalheight,$maximumsize,$DestFolder,$baseimage,$imagequality,$imagefiletype)
{

	if($originalwidth <= 0 || $originalheight <= 0) 
	{
		return false;
	}
	
	$generalscale = min($maximumsize/$originalwidth, $maximumsize/$originalheight); 
	$modwidth = ceil($generalscale*$originalwidth);
	$modheight = ceil($generalscale*$originalheight);
	$finalimage = imagecreatetruecolor($modwidth, $modheight);
	
	if(imagecopyresampled($finalimage, $baseimage,0, 0, 0, 0, $modwidth, $modheight, $originalwidth, $originalheight))
	{
		switch(strtolower($imagefiletype))
		{
			case 'image/png':
				imagepng($finalimage,$DestFolder);
				break;
			case 'image/gif':
				imagegif($finalimage,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($finalimage,$DestFolder,$imagequality);
				break;
			default:
				return false;
		}

	if(is_resource($finalimage)) {imagedestroy($finalimage);} 
	return true;
	}

}
