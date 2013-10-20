 <?php
session_start ();
require ("../inc/common.php");

$json = new Services_JSON ();

if ((! $conn || ! $result) && $ret) {
    echo $json->encode ( $ret );
} else if (! isset ( $_POST ["state"] )) {
    echo $json->encode ( output ( OUTPUT_ERROR, "非法操作" ) );
} else {
    $code = $_POST ["state"];
    switch ($code) {
        case "create_pw" :
            echo $json->encode ( create_pw () );
            break;
    }
}
// data.length = $length.val();
// data.number = $number.val();
// data.bigAlphabet = $bigAlphabet.val();
// data.smallAlphabet = $smallAlphabet.val();
// data.other = $other.val();
function create_pw() {
    $server_ip = "127.0.0.1";
    $port = 8888;
    
    $length = intval($_POST ["length"]);
    $number = $_POST ["number"];
    $bigAlphabet = $_POST ["bigAlphabet"];
    $smallAlphabet = $_POST ["smallAlphabet"];
    $other = $_POST ["other"];
    
    
    
    return output ( OUTPUT_SUCCESS, "123456 " . $length . " | " .$number." | ".$number." | ".$bigAlphabet." | ".$smallAlphabet." | " .$other );
}

 
 
