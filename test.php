 	<?php
		// set_time_limit(1);
		session_start ();
		var_dump("begin");
		if (isset ( $_POST ["state"] )){
			echo $code = $_POST ["state"];
		}
		var_dump("end");
// 		echo create_pw ();
		?>


		
	<?php
	function create_pw() {
		$server_ip = "127.0.0.1";
		$port = 8888;
		
		$state = 0;
		
		$inBuf = "" . $state;
		
		$outBuf = "";
		
		if (! ($sock = socket_create ( AF_INET, SOCK_DGRAM, SOL_TCP ))) {
			$outBuf .= "socket create failure<br/>";
			return output ( OUTPUT_SUCCESS, $outBuf );
		}
		
		if (! socket_sendto ( $sock, $inBuf, strlen ( $inBuf ), 0, $server_ip, $port )) {
			$outBuf .= "send error<br/>";
			socket_close ( $sock );
			return output ( OUTPUT_SUCCESS, $outBuf );
		}
		
		if (! socket_recvfrom ( $sock, $outBuf, 256, 0, &$server_ip, &$port )) {
			$outBuf .= "recvieve error!";
			socket_close ( $sock );
			return output ( OUTPUT_SUCCESS, $outBuf );
		}
		
		socket_close ( $sock );
		
		return output ( OUTPUT_SUCCESS, $outBuf );
	}
	function output($id, $message) {
		$ret = array (
				'code' => $id,
				'message' => $message 
		);
		return $ret;
	}
	?>
	