<?php
header ("Content-type: image/jpeg");
$img = $_GET['img'];
$percent = $_GET['percent'];
$constrain = $_GET['constrain'];

$cw = $_GET['w'];
$ch = $_GET['h'];

$w = $_GET['w'];
$h = $_GET['h'];

// get image size of img
$x = @getimagesize($img);
// image width
$sw = $x[0];
// image height
$sh = $x[1];

$w = ($x[0]<=$w) ? $x[0] : $w;
$h = ($x[1]<=$h) ? $x[1] : $h;

if ($percent > 0) {
	// calculate resized height and width if percent is defined
	$percent = $percent * 0.01;
	$w = $sw * $percent;
	$h = $sh * $percent;
} else {
	if (isset ($w) AND !isset ($h)) {
		// autocompute height if only width is set
		$h = (100 / ($sw / $w)) * .01;
		$h = @round ($sh * $h);
	} elseif (isset ($h) AND !isset ($w)) {
		// autocompute width if only height is set
		$w = (100 / ($sh / $h)) * .01;
		$w = @round ($sw * $w);
	} elseif (isset ($h) AND isset ($w) AND isset ($constrain)) {
		// get the smaller resulting image dimension if both height
		// and width are set and $constrain is also set
		$hx = (100 / ($sw / $w)) * .01;
		$hx = @round ($sh * $hx);

		$wx = (100 / ($sh / $h)) * .01;
		$wx = @round ($sw * $wx);

		if ($hx < $h) {
			$h = (100 / ($sw / $w)) * .01;
			$h = @round ($sh * $h);
		} else {
			$w = (100 / ($sh / $h)) * .01;
			$w = @round ($sw * $w);
		}
	}
}

/* * cal Margin * */
$mw = $cw - $w;
$mh = $ch - $h;

$mw = ($mw>0) ? ($mw)/2 : 0;
$mh = ($mh>0) ? ($mh)/2 : 0;

$im = @ImageCreateFromJPEG ($img) or // Read JPEG Image
$im = @ImageCreateFromPNG ($img) or // or PNG Image
$im = @ImageCreateFromGIF ($img) or // or GIF Image
$im = false; // If image is not JPEG, PNG, or GIF

if (!$im) {
	// We get errors from PHP's ImageCreate functions...
	// So let's echo back the contents of the actual image.
	readfile ($img);
} else {
	// Create the resized image destination
	$thumb = @ImageCreateTrueColor ($cw, $ch);
	$bgc = imagecolorallocate($thumb, 255, 255, 255);
	imagefilledrectangle ($thumb, 0, 0, $cw, $ch, $bgc);
	// Copy from image source, resize it, and paste to image destination
	@ImageCopyResampled ($thumb, $im, $mw, $mh, 0, 0, $w, $h, $sw, $sh);
	// Output resized image
	@ImageJPEG ($thumb);
}
?>
