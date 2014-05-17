jQuery(document).ready(function() {
	var begin = false;
	var $button = jQuery(".create-pw-button");
	var $outter = jQuery(".create-pw-load-outter");
	var $info = jQuery(".create-pw-info");

	var action = MAIN_DOMAIN + "createpw/server.php";
	var data = {};

	var $length = jQuery("#create-pw-length");
	var $number = jQuery("#create-pw-char-number");
	var $bigAlphabet = jQuery("#create-pw-char-bigAlphabet");
	var $smallAlphabet = jQuery("#create-pw-char-smallAlphabet");
	var $other = jQuery("#create-pw-char-other");

	$button.bind("click", function(e) {
		$outter.removeClass("hide");
		data.state = "create_pw";
		data.length = $length.val();
		data.number = $number[0].checked ? 1 : 0;
		data.bigAlphabet = $bigAlphabet[0].checked ? 1 : 0;
		data.smallAlphabet = $smallAlphabet[0].checked ? 1 : 0;
		data.other = $other[0].checked ? 1 : 0;
		jQuery.post(action, data, function(d) {
			$info.html(d.message);
			setTimeout((function() {
				$outter.addClass("hide");
			}), 300);
		}, "json");
	});
});
