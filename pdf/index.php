 <?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
if (isset ( $_GET ["url"] )) {
    $url = $_GET ["url"];
} else {
    $url = MAIN_DOMAIN . "tiankonguse_04.pdf";
}

if (isset ( $_GET ["title"] )) {
    $title = $_GET ["title"];
} else {
    $nowUrlArray = explode ( "/", $url );
    $nowUrltLength = count ( $nowUrlArray ) - 1;
    $title = $nowUrlArray [$nowUrltLength];
}

require BASE_INC . 'head.inc.php';
?>
</head>
<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>">tiankonguse &amp; vincent 的实验室 </a>
		</div>
	</header>
	<section>
		<div class="container">
			<h1><?php echo $title;?></h1>
			<a href="<?php echo MAIN_DOMAIN; ?>pdf/viewer.html">firefox版本的pdf阅读器</a>
			<hr size="1" />
			<div style="text-align: center;">
				<a href="<?php echo $url;?>" id="embedURL"></a>
			</div>
		</div>
	</section>
	<script type="text/javascript" src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
     	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
	<script type="text/javascript"
		src="<?php echo DOMAIN_JS;?>jquery.gdocsviewer.js"></script>
	<script type="text/javascript"> 
    /*<![CDATA[*/
    $(document).ready(function() {
    	$('a.embed').gdocsViewer({width: 800, height: 1000});
    	$('#embedURL').gdocsViewer();
    });
    /*]]>*/
    </script>
    
</body>
</html>
