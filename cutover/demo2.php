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
<style>
#box ul li {
	display: none;
	filter: alpha(opacity = 0);
	opacity: 0;
}
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
			<a href="<?php echo MAIN_DOMAIN; ?>cutover/">图片切换</a>
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
				<ol class="clearfix">
					<?php 
					for ($i=1;$i<=$len;$i++){
						if($i == 1){
							echo "<li class=\"active\">$i</li>";
						}else{
							echo "<li>$i</li>";
						}

					}
					?>
				</ol>
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
				function getLi(pre, name){
					var ul =  pre.getElementsByTagName(name)[0];
					return ul.getElementsByTagName('li');
				}
				var box = document.getElementById("box");
				var imgs = getLi(box, "ul");
				var imgPoints = getLi(box, "ol");
				var imgNum = imgs.length;

				var nowIndex = 0;

				for ( var i = 0; i < imgNum; i++) {
					imgPoints[i].index = i;
					imgPoints[i].onmouseover = function() {
						if(this.index == nowIndex){
							return;
						}
						
						imgPoints[nowIndex].className = '';
						imgs[nowIndex].style.display = 'none';
						imgs[nowIndex].style.filter = 'alpha(opacity=0)';
						imgs[nowIndex].style.opacity = 0;
						
						this.className = 'active';
						imgs[this.index].style.display = 'block';
						startMove(imgs[this.index], {
							opacity : 100
						});
						nowIndex = this.index;
					};
				}
			}));
					

	</script>
</body>
</html>

