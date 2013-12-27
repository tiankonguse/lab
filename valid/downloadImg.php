<?php
/**
 * 抓取远程图片
 *
 * @param string $url 远程图片路径
 * @param string $filename 本地存储文件名
 */
function grabImage($url, $filename = '') {
	if($url == '') {
		return false; //如果 $url 为空则返回 false;
	}
	$ext_name = strrchr($url, '.'); //获取图片的扩展名
	if($ext_name != '.gif' && $ext_name != '.jpg' && $ext_name != '.bmp' && $ext_name != '.png') {
		return false; //格式不在允许的范围
	}
	if($filename == '') {
		$filename = time().$ext_name; //以时间戳另起名
	}
	//开始捕获
	ob_start();
	readfile($url);
	$img_data = ob_get_contents();
	ob_end_clean();
	$size = strlen($img_data);
	$local_file = fopen($filename , 'a');
	fwrite($local_file, $img_data);
	fclose($local_file);
	return $filename;
}

/**
 * 下载远程图片
 * @param string $url 图片的绝对url
 * @param string $filepath 文件的完整路径（包括目录，不包括后缀名,例如/www/images/test） ，此函数会自动根据图片url和http头信息确定图片的后缀名
 * @return mixed 下载成功返回一个描述图片信息的数组，下载失败则返回false
 */
function downloadImage($url, $filepath) {
	//服务器返回的头信息
	$responseHeaders = array();
	//原始图片名
	$originalfilename = '';
	//图片的后缀名
	$ext = '';
	$ch = curl_init($url);
	//设置curl_exec返回的值包含Http头
	curl_setopt($ch, CURLOPT_HEADER, 1);
	//设置curl_exec返回的值包含Http内容
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//设置抓取跳转（http 301，302）后的页面
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	//设置最多的HTTP重定向的数量
	curl_setopt($ch, CURLOPT_MAXREDIRS, 2);

	//服务器返回的数据（包括http头信息和内容）
	$html = curl_exec($ch);
	//获取此次抓取的相关信息
	$httpinfo = curl_getinfo($ch);
	curl_close($ch);
	
	if ($html !== false) {
		//分离response的header和body，由于服务器可能使用了302跳转，所以此处需要将字符串分离为 2+跳转次数 个子串
		$httpArr = explode("\r\n\r\n", $html, 2 + $httpinfo['redirect_count']);
		//倒数第二段是服务器最后一次response的http头
		$header = $httpArr[count($httpArr) - 2];
		//倒数第一段是服务器最后一次response的内容
		$body = $httpArr[count($httpArr) - 1];
		$header.="\r\n";

		//获取最后一次response的header信息
		preg_match_all('/([a-z0-9-_]+):\s*([^\r\n]+)\r\n/i', $header, $matches);
		if (!empty($matches) && count($matches) == 3 && !empty($matches[1]) && !empty($matches[1])) {
			for ($i = 0; $i < count($matches[1]); $i++) {
				if (array_key_exists($i, $matches[2])) {
					$responseHeaders[$matches[1][$i]] = $matches[2][$i];
				}
			}
		}
		//获取图片后缀名
		if (0 < preg_match('{(?:[^\/\\\\]+)\.(jpg|jpeg|gif|png|bmp)$}i', $url, $matches)) {
			$originalfilename = $matches[0];
			$ext = $matches[1];
		} else {
			if (array_key_exists('Content-Type', $responseHeaders)) {
				if (0 < preg_match('{image/(\w+)}i', $responseHeaders['Content-Type'], $extmatches)) {
					$ext = $extmatches[1];
				}
			}
		}

		//保存文件
		if (!empty($ext)) {
			$filepath .= ".$ext";

			$local_file = fopen($filepath, 'w');
			if (false !== $local_file) {
				if (false !== fwrite($local_file, $body)) {
					fclose($local_file);
					$sizeinfo = getimagesize($filepath);
					return array('filepath' => realpath($filepath), 'width' => $sizeinfo[0], 'height' => $sizeinfo[1], 'orginalfilename' => $originalfilename, 'filename' => pathinfo($filepath, PATHINFO_BASENAME));
				}
			}
		}
	}
	return false;
}
