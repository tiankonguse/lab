<?php
/** 
* @file class.qqhttp.php
* qq邮箱登陆获取类
* @author wc<cao8222@gmail.com>
* @date 2009-04-27
 */

class QQHttp {

    var $cookie = '';

    function __cunstrut() {
    }

    function makeForm() {
        $form = array(
            'url' => "http://mail.qq.com/cgi-bin/loginpage",
        );
        $data = $this->curlFunc($form);
        preg_match('/name="ts"\svalue="(\d+)"/',$data['html'], $tspre);
        $ts = $tspre[1];
        preg_match('/action="http:\/\/(m\d+)\.mail\.qq\.com/',$data['html'], $server);
        $server_no = $server[1];

        /*  login.html 载入 */
        $html = file_get_contents(dirname(__FILE__).'/login.htm');
        $html = str_replace('{_ts_}',$ts, $html);
        $html = str_replace('{_server_no_}',$server_no, $html);
        return $html;
    }

    function curlFunc($array)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $array['url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if( isset($array['header']) && $array['header'] ) {
            curl_setopt($ch, CURLOPT_HEADER, 1);
        }
        if(isset($array['httpheader'])) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $array['httpheader']);
        }
        if(isset($array['referer'])) {
            curl_setopt($ch, CURLOPT_REFERER, $array['referer']);
        }
        if( isset($array['post']) ) {
            curl_setopt($ch, CURLOPT_POST, 1 );
            curl_setopt($ch, CURLOPT_POSTFIELDS, $array['post']);
        }
        if( isset($array['cookie']) ){
            curl_setopt($ch, CURLOPT_COOKIE, $array['cookie']);
        }
        $r['erro'] = curl_error($ch);
        $r['errno'] = curl_errno($ch);
        $r['html'] = curl_exec($ch);
        $r['http_code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $r;
    }

    /** 
     * 获取验证码图片和cookie
     * @param Null
     * 
     * @return array('img'=>String, 'cookie'=>String)
     */
    function getVFCode () 
    {
        $t = 'http://m127.mail.qq.com/cgi-bin/getverifyimage?aid=23000101&0.8881121444410955';
        $t = 'ttp://mail.qq.com/cgi-bin/getinvestigate?t=loginpage&stat=verifyimg&verifyuser=49450402';
        $vfcode = array(
            'header' => true,
            'cookie' => false,
            'url'=>'http://'.$_GET['server_no'].'.mail.qq.com/cgi-bin/getverifyimage?aid='.$_GET['aid'].'&'.@$_GET['t'],
        );
        //var_dump($vfcode);

        $r = $this->curlFunc($vfcode);
        if ($r['http_code'] != 200 ) return false;
        $data = split("\n", $r['html']);
        //var_dump($data);exit;
        preg_match('/verifyimagesession=([^;]+);/',$data[7], $temp);
        $cookie = trim($temp[1]);
        $img = $data[11];
        return  array('img'=>$img,'cookie'=>$cookie, 'data'=>$data);
    }

    /** 
     * 登陆qq邮箱
     * 
     * @param $cookie getvfcode中生成的cookie
     * 
     * @return array(
     *   sid=>String , //用户认证的唯一标示
     *   login => Boolean, //true 登陆成功 ，false 登陆失败
     *   server_no => String // 服务器编号
     *   active => Boolean //true 已开通 ，false 未开通 邮箱
     *   cookie => String // 获取数据cookie
     *
     * );
     */
    function login($cookie) 
    {
        /* 生成参数字符串 */
        $post = array();
        foreach($_POST as $k => $v) {
            $post[] = $k.'='.urlencode($v);
        }
        $poststr = implode('&',$post);
        $r['server_no'] = $_GET['server_no'];

        $login = array(
            'url'=>'http://'.$r['server_no'].'.mail.qq.com/cgi-bin/login?sid=0,2,zh_CN',
            'header' => true,
            'cookie' => 'verifyimagesession='.$cookie,
            'referer' => 'http://mail.qq.com/cgi-bin/loginpage',
            'httpheader'=>array(
                "Host: " . $r['server_no'] . '.mail.qq.com',
                "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.0.9) Gecko/2009040821 Firefox/3.0.9 FirePHP/0.2.4",
                "Content-Type: application/x-www-form-urlencoded",
            ),
            'post' => $poststr ,
        );
        $data = $this->curlFunc($login);
        $data['html'] = iconv("gb2312", "UTF-8", $data['html']);
        if ($data['http_code'] != 200) {
            $this->error($data);
            return false;
        }

       // var_dump(str_replace('script','',$data));exit;
        /* 测试数据 */
        //$data['html'] =file_get_contents('./r.txt');
        $r['uin'] = $_POST['uin'];
        /* 登陆错误的判断 */
        if (preg_match('|errtype=(\d)|', $data['html'], $temp_err)) {
            $r['login'] = false;
            if ($temp_err[1] == 1) {
                $r['msg'] = '账号和密码错误';
            } elseif ($temp_err[1] == 2) {
                $r['msg'] = '验证码错误';
            }
            return $r;
        }
        /* 登陆成功 */
        preg_match('|urlHead="([^"]+)"|i',$data['html'],$temp_url);
        $urlhead = $temp_url[1];
        if (preg_match('|frame_html\?sid=([^"]+)"|i',$data['html'],$temp_sid) ) {
            $r['sid'] = $temp_sid[1];
            $r['active'] = true;
        } elseif (preg_match('|autoactivation\?sid=([^&]+)?&|i',$data['html'],$temp_sid) ) {
            $r['sid'] = $temp_sid[1];
            $r['active'] = false;
        }
        /* 登录后cookie的获取 ，在后续操作中用到 */
        if (preg_match_all('|Set-Cookie:([^=]+=[^;]+)|i', $data['html'], $new_cookies) ) {
            $cookiestr = implode('; ', $new_cookies[1]);
            $cookiestr .= '; verifyimagesession='.$cookie;
        }

        $r['login'] = true;
        $r['cookie'] = $cookiestr;
        return $r;
    }

    function openEmail($param) 
    {
        $openEmail = array(
            'url'=>'http://'.$param['server_no'].'.mail.qq.com/cgi-bin/autoactivation?actmode=6&sid='.$param['sid'],
            'header' => true,
            'cookie' => $param['cookie'],
            'referer' => 'http://'.$param['server_no'].'mail.qq.com/cgi-bin/autoactivation?sid='.$param['sid'].'&action=reg_activate&actmode=6', 
            'httpheader'=>array(
                "Host: " . $param['server_no'] . '.mail.qq.com',
                'Accept-Charset: gb2312,utf-8;q=0.7,*;q=0.7',
                "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.0.9) Gecko/2009040821 Firefox/3.0.9 FirePHP/0.2.4",
            ),
        );

        $data =  $this->curlFunc($openEmail);
        if (preg_match('|Set-Cookie:qqmail_activated=0|i', $data['html'])) {
            $param['active'] = true;
            $param['cookie'] = $param['cookie'] .'; qqmail_activated=0; qqmail_alias=';
        }
        return $param;
    }

    /** 
     * 
     * 获取friends数据 
     * 
     * @param $param = array(
     *   sid=>String , //用户认证的唯一标示
     *   login => Boolean, //true 登陆成功 ，false 登陆失败
     *   server_no => String // 服务器编号
     *   active => Boolean //true 已开通 ，false 未开通 邮箱
     *   cookie => String // 获取数据cookie
     *
     * );
     * @return Array(
     *   key=>value, // key:qq号，value: nickname
     * );
     */
    function getFriends($param)
    {

        $friend = array(
            'url'=>'http://'.$param['server_no'].'.mail.qq.com/cgi-bin/addr_listall?type=user&&category=all&sid='.$param['sid'],
            'header' => true,
            'cookie' => $param['cookie'],
            'referer' => 'http://m151.mail.qq.com/cgi-bin/addr_listall?sid='.$param['sid'].'&sorttype=null&category=common',
            'httpheader'=>array(
                "Host: " . $param['server_no'] . '.mail.qq.com',
                'Accept-Charset:utf-8;q=0.7,*;q=0.7',
                "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.0.9) Gecko/2009040821 Firefox/3.0.9 FirePHP/0.2.4",
            ),
        );
        $r = $this->curlFunc($friend);
        if ($r['http_code'] != 200) {
            $this->error($r);
            return false;
        }
        $data =  $r['html'];
        //$preg = preg_match_all('|<p class="L_n"><span><img class="L_q" name=qqplusimg key="(\d+)"[^>]+/>&nbsp;([^<]+)</span></p>|i', $data, $temp_list);
        $preg = preg_match_all('|<p class="L_n"><span t="1" u="(\d+)" n="([^"]+)" e="([^"]+)">|i', $data, $temp_list);
        if ($preg == 0) return array();
        $list = array_combine($temp_list[1],$temp_list[2]);
        return $list;
    }

    /** 
     * 错误显示
     * 
     * @param $str array
     * 
     * @return 
     */
    function error($str) {
        $str['html'] = str_replace('script','', $str['html']);
        var_dump($str);
        exit;
    }
}

?>
