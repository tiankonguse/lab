<?
$format = "number <---> protocol\n<br />";
$format = "%6s <---> %s\n<br />";
for($number = 0; $number < 255; $number ++) {
	if (getprotobynumber ( $number ))
		
		printf ( $format, " $number", getprotobynumber ( $number ) );
}
?>