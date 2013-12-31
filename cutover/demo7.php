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
				function getLi(pre, name) {
					var ul = pre.getElementsByTagName(name)[0];
					return ul.getElementsByTagName('li');
				}
				var box = document.getElementById("box"),
					imgPre = box.getElementsByTagName("ul")[0],
					imgs = getLi(box, "ul"),
					imgPoints = getLi(box, "ol"),
					imgNum = imgs.length,
					nowIndexFix = 0,
					nowIndex = 0,
					timer = null,
					iHeight = imgs[0].offsetHeight,
					iWidth = imgs[0].offsetWidth;

				for(var i=0;i<imgNum;i++){
					imgs[i].style.left = i*iWidth + 'px';
				}
				
				for(var i=0;i<imgNum;i++){
					imgPoints[i].index = i;
					imgPoints[i].onmouseover = function(){
						imgPoints[nowIndex].className = '';
						this.className = 'active';
						nowIndexFix = nowIndex = this.index;
						startMove(imgPre,{left : - nowIndexFix * iWidth});
					};
				}
				
				imgPre.onmouseover = function(){
					clearInterval(timer);
				};
				imgPre.onmouseout = function(){
					timer = setInterval(toRun,2000);
				};
				
				timer = setInterval(toRun,2000);
				
				function toRun(){
					if(nowIndexFix == imgNum-1){
						nowIndexFix = 0;
					}
					else{
						nowIndexFix++;
					}
					imgPoints[nowIndex].className = '';
					nowIndex++;	
					imgPoints[nowIndexFix].className = 'active';
					startMove(imgPre,{left : - nowIndexFix * iWidth},function(){
						if(nowIndexFix == 0){
							nowIndex = 0;
						}
					});
					
				}
			}));
	</script>
</body>
</html>

