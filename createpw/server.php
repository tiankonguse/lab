<?php
//set_time_limit(1);
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
        echo $json->encode ( create_pw_php () );
        break;
    }
}

function create_pw($length, $number, $bigAlphabet, $smallAlphabet, $other){

    $pnumber = "0123456789";
    $pbigAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $psmallAlphabet = "abcdefghijklmnopqrstuvwxyz";
    $pother = "~!@#$%^&*()_+{}|:\"<>?`-=\';/.,";
    
//    var_dump($length, $number, $bigAlphabet, $smallAlphabet, $other);
    
    $base = $pnumber . $pbigAlphabet . $smallAlphabet . $pother;
    $output = "";
    for($i=0;$i<$length;$i++){
        $output .= $base[rand(0, strlen($base)-1)];
    }
    return $output;
}

function create_pw_php(){
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

    $pw = create_pw($length, $number, $bigAlphabet, $smallAlphabet, $other);

    return output ( OUTPUT_SUCCESS, $pw );
}



//function create_pw() {
//    $server_ip = "127.0.0.1";
//    $port = 8888;
//
//    $length = intval ( $_POST ["length"] );
//    $number = intval ( $_POST ["number"] ) == 1 ? 1 : 0;
//    $bigAlphabet = intval ( $_POST ["bigAlphabet"] ) == 1 ? 1 : 0;
//    $smallAlphabet = intval ( $_POST ["smallAlphabet"] ) == 1 ? 1 : 0;
//    $other = intval ( $_POST ["other"] ) == 1 ? 1 : 0;
//
//    if ($length < 6) {
//        $length = 6;
//    }
//    if ($length > 31) {
//        $length = 31;
//    }
//
//    $state = $length << 4 | $number << 3 | $bigAlphabet << 2 | $smallAlphabet << 1 | $other;
//
//    $inBuf = "".$state;
//
//
//    $outBuf = "";
//
//    if (! ($sock = socket_create ( AF_INET, SOCK_DGRAM, SOL_TCP ))) {
//        $outBuf .= "socket create failure<br/>";
//        return output ( OUTPUT_SUCCESS, $outBuf);
//    }
//    //     socket_set_option($socket,SOL_SOCKET,SO_RCVTIMEO,array("sec"=>1, "usec"=>0 ) );
//    //     socket_set_option($socket,SOL_SOCKET,SO_SNDTIMEO,array("sec"=>1, "usec"=>0 ) );
//
//    if(!($conn=socket_connect($sock, $server_ip,$port))){
//        $outBuf .= "cannot connect server<br/>";
//        return output ( OUTPUT_SUCCESS, $outBuf);
//    }
//
//    if (! socket_sendto ( $sock, $inBuf, strlen ( $inBuf ), 0, $server_ip, $port )) {
//        $outBuf .= "send error<br/>";
//        socket_close ( $sock );
//        return output ( OUTPUT_SUCCESS, $outBuf);
//    }
//
//    if (! socket_recvfrom ( $sock, $outBuf, 256, 0, &$server_ip, &$port )) {
//        $outBuf .= "recvieve error!";
//        socket_close ( $sock );
//        return output ( OUTPUT_SUCCESS, $outBuf);
//    }
//
//    socket_close ( $sock );
//
//    return output ( OUTPUT_SUCCESS, $outBuf );
//}
//
//
//
