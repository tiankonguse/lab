<?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "侧边菜单";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<link href="<?php echo MAIN_DOMAIN;?>menu/main.css" rel="stylesheet">
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>

<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>menu/">侧边菜单 </a>
		</div>
	</header>

	<ul id="dock">
		<li>菜单
			<ul class="free">
				<li class="header"><a href="#" class="dock-keleyi-com">固定</a><a
					href="#" class="undock">隐藏</a>菜单</li>
			</ul>
		</li>
		<li>分类
			<ul class="free">
				<li class="header"><a href="#" class="dock-keleyi-com">固定</a><a
					href="#" class="undock">隐藏</a>分类</li>
				<li><a href="http://keleyi.com/menu/cms/">CMS</a></li>
			</ul>
		</li>
		<li>推荐
			<ul class="free">
				<li class="header"><a href="#" class="dock-keleyi-com">固定</a><a
					href="#" class="undock">隐藏</a>推荐	</li>
			</ul>
		</li>
	</ul>

	<section>
		<div class="container"></div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
		<?php  require BASE_INC . 'footer.inc.php'; ?>
	</footer>
	<script>
	$(document).ready(
			function() {
				var docked = 0;

				$("#dock li ul").height($(window).height());

				$("#dock .dock-keleyi-com").click(
						function() {
							$(this).parent().parent().addClass("docked")
									.removeClass("free");

							docked += 1;
							var dockH = ($(window).height()) / docked
							var dockT = 0;

							$("#dock li ul.docked").each(function() {
								$(this).height(dockH).css("top", dockT + "px");
								dockT += dockH;
							});
							$(this).parent().find(".undock").show();
							$(this).hide();

						});

				$("#dock .undock").click(
						function() {
							$(this).parent().parent().addClass("free").removeClass(
									"docked").animate({
								left : "-180px"
							}, 200).height($(window).height()).css("top", "0px");

							docked = docked - 1;
							var dockH = ($(window).height()) / docked
							var dockT = 0;

							$("#dock li ul.docked").each(function() {
								$(this).height(dockH).css("top", dockT + "px");
								dockT += dockH;
							});
							$(this).parent().find(".dock-keleyi-com").show();
							$(this).hide();

						});

				$("#dock li").hover(function() {
					$(this).find("ul").animate({
						left : "40px"
					}, 200);
				}, function() {
					$(this).find("ul.free").animate({
						left : "-180px"
					}, 200);
				});
			});

	</script>
</body>
</html>

