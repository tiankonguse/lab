<?php 

ini_set("display_errors",1);
ini_set("error_reporting",E_ALL);

! defined ( "username" ) &&  define('username','13944097701');
! defined ( "password" ) &&  define('password', 0);
! defined ( "OUTPUT_SUCCESS" ) && define('OUTPUT_SUCCESS','0');
! defined ( "OUTPUT_ERROR" ) && define('OUTPUT_ERROR','1');

define('ENTER','http://codeforces.com/enter');
define('HOME','http://codeforces.com');
define('SETTING',"http://codeforces.com/settings/general");


# simple_html_dom document 
# http://simplehtmldom.sourceforge.net/manual.htm
include_once ("simple_html_dom.php");


function post($url, $data = array(), $referer = "", $header = array()){
	$t = time() * 1000;
	$cookie = dirname(__FILE__).'/cookie.txt';

	$curl = curl_init("$url?t=$t&_=$t");
	curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt ($curl, CURLOPT_HTTPHEADER, $header);

	curl_setopt($curl, CURLOPT_AUTOREFERER, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); //是否抓取跳转后的页面 
	curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie);    // 注意这里！
	curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); // 注意这里！保存Cookie
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; U; Android 2.3.6; en-us; Nexus S Build/GRK39F) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1");
	curl_setopt($curl, CURLOPT_REFERER, $referer);
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
	$result = curl_exec($curl);
	curl_close($curl);
	return $result;
}

function getCookie($name){
    $cookie = dirname(__FILE__).'/cookie.txt';
    $lines = file($cookie); 
    foreach($lines as $line){ 
        if($line[0] != '#' && substr_count($line, "\t") == 6) { 
            $tokens = explode("\t", $line);  
            if($tokens[5] == $name){
                return $tokens[6];
            }
        }
    }
    return "";
}


function ca76fd64a80cdc35($str){
    $ret = 0;
    $len = strlen($str);
    
    for($i = 0; $i < $len; $i++){
        $ret = ($ret + ($i + 1) * ($i + 2) * ord($str[$i]) ) % 1009;
        if ($i % 3 === 0) {
            $ret++;
        }
        if ($i % 2 === 0) {
            $ret *= 2;
        }
        if ($i > 0) {
            $ret -= intval( $str[intval($i / 2)] / 2 ) * ($ret % 5);
        }
        while ($ret < 0) {
            $ret += 1009;
        }
        while ($ret >= 1009) {
            $ret -= 1009;
        }
    }
    return intval($ret);
}


    
    
function tta(){
    return ca76fd64a80cdc35(getCookie("39ce7"));
}


function myprint($ret){
    echo "<pre>";
    echo htmlentities($ret);
    echo "</pre>";
}  
    
function getCsrfToken($ret){
    $csrf = "";
    
    $html = str_get_html($ret);

    $meta  = $html->find("meta[name='X-Csrf-Token']", 0);
    
    if($meta != null){
        $csrf = $meta->getAttribute("content");
        if(strlen($csrf) == 32){
            return $csrf ;
        }
    }

    $token = $html->find(".csrf-token", 0);
    if($token != null){
        $csrf = $token->getAttribute("data-csrf");
        if(strlen($csrf) == 32){
            return $csrf ;
        }
    }
    
    return "";    
}
    
    
function login($username, $password){

    $ret = post(ENTER);
    
    $csrf = getCsrfToken($ret);

    $_tta = tta();
    
    $data = array(
			'csrf_token' => $csrf,
			'action' => "enter",
			'_tta' => $_tta,
			'handle' => $username,
			'password' => $password
	);
    

    
    $header = array();
    $header[] = "Content-Type: application/x-www-form-urlencoded";
    
    
    $ret = post(ENTER, $data, ENTER, $header);
    
    
    
    $ret = post(SETTING, array(), HOME);


    //myprint($ret);
    
}

/*
------WebKitFormBoundaryvqP1gmt6BGTL7bHc
Content-Disposition: form-data; name="sourceFile"; filename=""
Content-Type: application/octet-stream

contestId
472

submittedProblemIndex 
A

programTypeId 

1 "GNU C++ 4.7"
5 "Java 6"
23 "Java 7"
36 "Java 8"
13 "Perl 5.12"
6 "PHP 5.3"
7 "Python 2.7"
31 "Python 3.3"
8 "Ruby 2"
34 "JavaScript V8 3"
*/
function submit($contestId, $problem, $lang, $source){
    $submitUrl = "http://codeforces.com/contest/".$contestId."/submit";
    
    $ret = post($submitUrl);
    
    $csrf = getCsrfToken($ret);

    $_tta = tta();
    
    $data = array(
			'csrf_token' => $csrf,
			'action' => "submitSolutionFormSubmitted",
			'_tta' => $_tta,
			'submittedProblemIndex' => $problem,
			'programTypeId' => $lang,
			'contestId' => $contestId,
			'source' => $source
	);
    

    
    $header = array();
    $header[] = "Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryYNYmdyfCkN5wxdOg";
    
    $newSubmitUrl = $submitUrl."?csrf_token=".$csrf;
    $ret = post($newSubmitUrl, $data, $submitUrl, $header);
    
    myprint($ret);
    
    $ret = post("http://codeforces.com/contest/".$contestId."/my", array(), $newSubmitUrl);
    
    myprint($ret);
}



login("tiankonguse", "shen1000");

$source = '#include<cstdio>
#include<cstdlib>
#include<cstring>
#include<iostream>
#include<string>
#include<queue>
#include<map>
#include<cmath>
#include<stack>
#include<algorithm>
#include<functional>
#include<stdarg.h>
using namespace std;
#ifdef __int64
typedef __int64 LL;
#else
typedef long long LL;
#endif

const int debug = 0;
typedef unsigned uint;
typedef unsigned char uchar;

const int N = 400100;
const int OneNumMax = 1<<16;
char str1[N];
char str2[N];

int p1,p2,len,q;
int ans = 0;
int end;
uint* a;
uint* b;
uchar A[8][N];
uchar B[8][N];
int oneNum[OneNumMax];

void bulid(const char * const q, uchar A[32][N]) {
    int l = strlen(q);
    for(int i = 0; i < 8; i++) {
        for(int j = 0; i + j < l; j++) {
            if(q[i+j] == \'1\') {
                A[i][j>>3] |= (1U << (j & 7));
            }
        }
    }
}

inline uint countbits(uint x) {
    return oneNum[x >> 16] + oneNum[x & ((1 << 16) - 1)];
}

int main() {
    int q;
    for(int i = 1; i < OneNumMax; ++i) {
        oneNum[i] = oneNum[i >> 1] + (i & 1);
    }


    memset(A,0,sizeof(A));
    memset(B,0,sizeof(B));

    scanf("%s",str1);
    scanf("%s",str2);
    bulid(str1,A);
    bulid(str2,B);
    scanf("%d",&q);
    while(q--) {
        scanf("%d%d%d",&p1,&p2,&len);

        ans = 0;
        a = (uint*)(A[p1&7] + (p1>>3));
        b = (uint*)(B[p2&7] + (p2>>3));
        end = p1 + len;
        while(len >= 32) {
            ans += countbits(*a++ ^ *b++);
            len -= 32;
        }

        ans += countbits((*a ^ *b) & ((1U << len) - 1));

        printf("%d\n",ans);
    }

    return 0;
}';

submit("472", "A", "a", $source);