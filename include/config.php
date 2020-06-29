<?php
#configuration file

$urlsubfolder = 'http://photofun.websarthe.com/testsubfolder/';

#export
/*
this prefix will output an image named : mywebsite-filter-15454.jpg or mywebsite-filter-9454.gif
*/
$yourbrand = 'Your website';

#export
/*
this prefix will output an image named : mywebsite-filter-15454.jpg or mywebsite-filter-9454.gif
*/
$thumbprefix = 'mywebsite';

#twitter sharing text
/*
when sharing on twitter, you enter both a url & a text, by default the text is the name of the website but you can change it to whatever you want
*/
$twittertext = 'mywebsite';


#upload 
/*
outputdirectory is the folder where the images are uploaded and imagequality is the quality used when one uploads a jpg file.
*/ 
$outputdirectory = 'uploads'; 
$imagequality = 100;

/*
Image size is the maximum width or height of the resized image when uploaded but we advise you not to change this value unless your server can handle large images.
*/
$imagesize = 900;
?>