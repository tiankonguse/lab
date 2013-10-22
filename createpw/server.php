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

function create_pw() {
    $server_ip = "127.0.0.1";
    $port = 8888;
    
    $length = intval ( $_POST ["length"] );
    $number = intval ( $_POST ["number"] ) == 1 ? 1 : 0;
    $bigAlphabet = intval ( $_POST ["bigAlphabet"] ) == 1 ? 1 : 0;
    $smallAlphabet = intval ( $_POST ["smallAlphabet"] ) == 1 ? 1 : 0;
    $other = intval ( $_POST ["other"] ) == 1 ? 1 : 0;
    
    if ($length < 6) {
        $length = 6;
    }
    if ($length > 31) {
        $length = 31;
    }
    
    $state = $length << 4 | $number << 3 | $bigAlphabet << 2 | $smallAlphabet << 1 | $other;
    
    $inBuf = "".$state;
    
    $sock = @socket_create ( AF_INET, SOCK_DGRAM, 0 );
    
    $outBuf = "";
    
    if (! $sock) {
        $outBuf .= "socket create failure<br/>";
        return output ( OUTPUT_SUCCESS, $outBuf);
    }
    
    if (! @socket_sendto ( $sock, $inBuf, strlen ( $inBuf ), 0, $server_ip, $port )) {
        $outBuf .= "send error<br/>";
        socket_close ( $sock );
        return output ( OUTPUT_SUCCESS, $outBuf);
    }
    
    if (! @socket_recvfrom ( $sock, $outBuf, 256, 0, &$server_ip, &$port )) {
        $outBuf .= "recvieve error!";
        socket_close ( $sock );
        return output ( OUTPUT_SUCCESS, $outBuf);
    }
        
    socket_close ( $sock );
    
    return output ( OUTPUT_SUCCESS, $outBuf );
}

 
 
