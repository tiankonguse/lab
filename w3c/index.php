<?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "w3c 文档";
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
            <a href="<?php echo MAIN_DOMAIN; ?>">tiankonguse &amp; vincent 的实验室 </a>
        </div>
    </header>
    <section>
        <div class="container">
            <h3><?php echo $title;?></h3>
            <div>

            </div>
        </div>
    </section>

    <script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
    <footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
    <script src="<?php echo DOMAIN_JS;?>main.js"></script>
</body>
</html>
