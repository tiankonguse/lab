 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "tiankonguse 的女朋友";
	require BASE_INC . 'head.inc.php';
	?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">

</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>

<body>
	<header>
		<div class="title" style="margin-top: 5px;">
			<a href="<?php echo MAIN_DOMAIN; ?>">tiankonguse 的女朋友</a>
		</div>
	</header>
	<iframe src="<?php echo MAIN_DOMAIN; ?>girlfriend/index.html"
		style="height: 550px; width: 100%;"></iframe>

</body>
</html>

