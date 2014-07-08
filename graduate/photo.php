<!DOCTYPE html>
<html lang="zh-cn" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>毕业了</title>
        <meta name="description" content="A Collection of Page Transitions with CSS Animations" />
        <meta name="keywords" content="page transition, css animation, website, effect, css3, jquery" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="./img/logo.png"> 
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <link rel="stylesheet" type="text/css" href="css/animations.css" />
        <link rel="stylesheet" href="css/init.css">

    </head>
    <body>	
        <div id="pt-main" class="pt-perspective">
<?php
$imgList = array();
$imgList[] = "http://tiankonguse.com/lab/cloudLink/baidupan.php?url=/1915453531/2205629362.jpg";
$imgList[] = "http://tiankonguse.com/lab/cloudLink/baidupan.php?url=/1915453531/3738890519.png";
$imgList[] = "http://tiankonguse.com/lab/cloudLink/baidupan.php?url=/1915453531/3024072450.jpg";
$imgList[] = "http://tiankonguse.com/lab/cloudLink/baidupan.php?url=/1915453531/3028145814.jpg";
$imgList[] = "http://tiankonguse.com/lab/cloudLink/baidupan.php?url=/1915453531/3030346479.jpg";
$imgList[] = "http://tiankonguse.com/lab/cloudLink/baidupan.php?url=/1915453531/3032693177.jpg";
$imgList[] = "http://tiankonguse.com/lab/cloudLink/baidupan.php?url=/1915453531/3034603034.jpg";
$imgList[] = "http://tiankonguse.com/lab/cloudLink/baidupan.php?url=/1915453531/3036554272.jpg";
$imgList[] = "http://tiankonguse.com/lab/cloudLink/baidupan.php?url=/1915453531/3038240923.jpg";
$imgList[] = "http://tiankonguse.com/lab/cloudLink/baidupan.php?url=/1915453531/3039902098.jpg";
$l = count($imgList);

for($i=0;$i<$l;$i++){
    echo "<div class=\"pt-page\"><img alt=\"loading\" src=\"{$imgList[$i]}\" /></div>\n";
}
?>
        </div>
    <div class="menu">
        <div class="menu-item left">
            <a href="wall.php" target="_blank">毕业墙</a>
        </div>
        <div class="menu-item right">
            <a href="./" target="_blank">毕业签名</a>
        </div>
    </div>

    <div class="footer-banner" style="position:absolute;bottom:-5px;width: 100%; text-align: center;margin: 0px;">
<!-- footer -->
    <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-2326969899478823" data-ad-slot="5074793995"></ins>
    </div>

        <div class="pt-message">
            <p>亲，你的浏览器不支持 CSS 动画，请使用 Chrome,Firefox,Safari 等浏览器浏览.</p>
        </div>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/pagetransitions.js"></script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </body>
</html>
