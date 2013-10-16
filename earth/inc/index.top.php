<div id="alter"  class="alert alert-block alter-ie" style="display:none">
	<h4>Warning!</h4>
	你的浏览器版本太低，请升级浏览器版本。
	<div id="ie-ver"></div>
</div>
<script>

$(document).ready(function(){
	var Sys = {};
	var ua = navigator.userAgent.toLowerCase();
	if (window.ActiveXObject)Sys.ie = ua.match(/msie ([\d.]+)/)[1];
	if(Sys.ie && Sys.ie<=10.0) {
		$("#alter").css("display","block");
		$("#ie-ver").html("你的ie版本是："+Sys.ie);
	}
});


</script>
<div class="title">
	别人的地球，借来学学
</div>
