 <?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
$title = "放大图片";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<link href="<?php echo MAIN_DOMAIN;?>/zoomImg/zoomImg.css"
	rel="stylesheet">
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>
<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>">tiankonguse 的实验室 </a>
		</div>
	</header>

	<section>
		<div class="container">
			<h3>放大图片</h3>
			<div>
				<div id="magnifier">
					<img src="<?php echo DOMAIN_IMG;?>logo.png" id="img" />
					<div id="Browser" style="display: none;"></div>
				</div>
				<div id="mag" style="display: none;">
					<img id="magnifierImg" />
				</div>

				<div id="k"></div>
			</div>
		</div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
	<script src="<?php echo MAIN_DOMAIN;?>/zoomImg/zoomImg.js"></script>
	<script type="text/javascript">
        /*
           cont : null,  //装载原始图像的div
           bor:null      //浏览框
           img : null,   //放大的图像
           mag : null,   //放大框
           scale : 4   //比例值,设置的值越大放大越大,但是这里有个问题就是如果不可以整除时,会产生些很小的白边,目前不知道如何解决
         */
        var magnifier= new Magnifier({
        	cont:$("#magnifier"),
        	bor:$("#Browser"),
        	img:$("#magnifierImg"),
        	mag:$("#mag"),
        	scale:3,
          imgHttp:null
        });
        </script>

</body>
</html>
