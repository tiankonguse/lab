<?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "发短信";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>

<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>AKeyToSend/">给tiankonguse发短信 </a>
			<div class="sub-title ">
				<a href="<?php echo MAIN_DOMAIN; ?>AKeyToSend/anonymousMSG.php">给指定的人发短信
				</a>
			</div>
		</div>
	</header>

	<section>
		<div class="container">
			<form class="form-horizontal" action="control.php?state=1"
				method="post">
				<div class="control-group">
					<label class="control-label">username</label>
					<div class="controls">
						<div class="input-prepend">
							<input class="span4" name="username" type="text"
								placeholder="username" tabindex="1">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="text">context</label>
					<div class="controls">
						<div class="input-prepend">
							<textarea name="context" placeholder="context" class="span4"
								tabindex="2"
								style="max-width: 500px; min-width: 500px; min-height: 100px;"></textarea>
						</div>

					</div>
				</div>
				<div class="control-group">
					<label class="control-label">verify code</label>
					<div class="controls">
						<div class="input-prepend">
							<input class="span3" name="verifyCode" type="text"
								placeholder="verifyCode" tabindex="3">
						</div>
						<img class="handcursor" alt="刷新"
							src="<?php echo DOMAIN_RECORD;?>inc/verifyCode.php"
							onclick="this.src=this.src;"
							style="display: inline-block; margin-bottom: 0px; vertical-align: middle;" />
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-large btn-info" tabindex="4">send</button>
					</div>
				</div>
			</form>
		</div>


	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
		<?php  require BASE_INC . 'footer.inc.php'; ?>
	</footer>
	<script>
    (function(){
        $("form").submit(function(){
            var I = this;
            if(this.username.value == "" || this.context.value == "" || this.verifyCode.value == ""){
                showMessage("You have not completed the form");
            }else{
                $.post(I.action,{
                    username:I.username.value,
                    context:I.context.value,
                    verifyCode:I.verifyCode.value
                },function(d){
                	showMessage(d.message);
                	if(d.code == 0){
                		setTimeout(function(){window.location.reload();},3000);
                    }
                },"json");
            }
            return false;
        });
    })();
	</script>
</body>
</html>

