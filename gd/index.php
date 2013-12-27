<?php


//Retrieve information about the currently installed GD library
//Parameter: void
$info = gd_info();
//var_dump($info);

$img = "IMG_20131222_184829.jpg";

//Get the size of an image
//Parameter: string $filename [, array &$imageinfo ]
//$size_info1 = getimagesize ( $img);
//var_dump($size_info1);

// Get the size of an image from a string
// but I test it, error.
// I find it is support at PHP 5 >= 5.4.0.
//$data = file_get_contents($img);
//$size_info2 = getimagesizefromstring($data);
//var_dump($size_info2);

//Get file extension for image type
//var_dump(image_type_to_extension(IMAGETYPE_PNG));

// Get Mime-Type for image-type returned by getimagesize, exif_read_data, exif_thumbnail, exif_imagetype
var_dump(image_type_to_mime_type(IMAGETYPE_PNG));


//image2wbmp — Output image to browser or file
//imageaffine — Return an image containing the affine tramsformed src image, using an optional clipping area



var_dump("next");
?>