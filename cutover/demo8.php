<?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "图片切换";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<link href="<?php echo MAIN_DOMAIN;?>cutover/main.css" rel="stylesheet">
<style>
</style>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>
</head>
<?php 
require ("img.php");

?>

<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>cutover/">图片切换 渐变</a>
		</div>
	</header>

	<section>
		<div class="container">
			<div id="box" class="clearfix">
				<ul>
					<?php 
					$len = count ($imgUrl);
					for ($i=0;$i<$len;$i++){
						if($i == 0){
							echo "<li style=\"display:block; filter:alpha(opacity=100); opacity:1;\" ><img src=\"{$imgUrl[$i]}\" alt=\"\" /></li>";
						}else{
							echo "<li><img src=\"{$imgUrl[$i]}\" alt=\"\" /></li>";
						}

					}
					?>
				</ul>
			</div>
		</div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
		<?php  require BASE_INC . 'footer.inc.php'; ?>
	</footer>
	<script src="<?php echo MAIN_DOMAIN;?>cutover/main.js" async></script>
	<script>
	$(document).ready(
			(function() {
				function getLi(pre, name) {
					var ul = pre.getElementsByTagName(name)[0];
					return ul.getElementsByTagName('li');
				}
				var box = document.getElementById("box"),
					imgs = getLi(box, "ul"),
					imgNum = imgs.length,
					imgWidth = imgs[0].offsetWidth,
					imgPadding = 30,
					imhAllPadding =  imgPadding*imgNum;
					;
	
				for(var i=1;i<imgNum;i++){
					imgs[i].style.left = imgWidth - imhAllPadding + i*imgPadding + 'px';
				}
				
				for(var i=0;i<imgNum;i++){
					imgs[i].index = i;
					imgs[i].onmouseover = function(){
						for(var i=0;i<imgNum;i++){
							if( i <= this.index ){
								startMove( imgs[i] , { left : i*imgPadding } );
							} else{
								startMove( imgs[i] , { left : imgWidth - imhAllPadding + i*imgPadding } );
							}
						}
						
					};
				}
			}));
	</script>
</body>
</html>

