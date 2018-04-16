<?php

namespace common\helps;

use Yii;

class Tools{

    /*
     * 生成用户唯一标识id
     */
    public static function create_uuid($prefix = ""){    //可以指定前缀
        $str = md5(uniqid(mt_rand(), true));
        $uuid  = substr($str,0,8) . '-';
        $uuid .= substr($str,8,4) . '-';
        $uuid .= substr($str,12,4) . '-';
        $uuid .= substr($str,16,4) . '-';
        $uuid .= substr($str,20,12);
        return strtoupper($prefix . $uuid);
    }

    /**
     * 截取字符串
     * @param String $str 源字符串
     * @param int $len 截取的长度
     * @param String $suffix 拼接的后缀
     * @return string 截取后的字符串
     */
    public static function MySubStr($str, $len, $suffix = "...")
    {
        $rsstr = $str;
        if (mb_strlen($str, 'UTF-8') > $len) {
            $rsstr = mb_substr($str, 0, $len, 'UTF-8') . $suffix;
        }
        return $rsstr;
    }

    /**
     * 删除空格
     * @param $str
     * @return mixed
     */
    public static function trimall($str)
    {
        $qian = array(" ", "　", "\t", "\n", "\r");
        $hou = array("", "", "", "", "");
        return str_replace($qian, $hou, $str);
    }

    /**
     * 验证手机号是否正确
     * @param  string $mobile
     * @return bool
     */
    public static function isValidMobile($mobile)
    {
        return preg_match("/^1[34578]\d{9}$/", trim($mobile));
    }

    /**
     * 验证电子邮件是否正确
     * @param  string $mobile
     * @return bool
     */
    public static function isValidEmail($email)
    {
        return preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", trim($email));
    }

    /**
     * @获取随机字符串
     * @param int $length
     */
    public static function randChar( $length = 6 ) {

        $string = 'abcdefghijklmnopqrstuvwxyz123456789';
        $chars = '';
        for ( $i = 0; $i < $length; $i++ )
        {
            $chars .= $string[ mt_rand(0, strlen($string) - 1) ];
        }
        return $chars;
    }

    /**
     * 模拟curl的get请求
     * @param $uri
     * @return mixed
     */
    public static function curl_get($uri)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);

        $rval = curl_exec($ch);
        curl_close($ch);

        return $rval;
    }

    /**
     * 模拟curl的post请求
     * @param $uri
     * @return mixed
     */
    public static function curl_post($uri, $data = array(), $is_array = false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT,5);
        if($is_array){
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }else{
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $rval = curl_exec($ch);
        // echo curl_error($ch);
        curl_close($ch);

        return $rval;
    }


    /**
     * 加密函数
     * @param string $txt 需要加密的字符串
     * @param string $key 密钥
     * @return string 返回加密结果
     */
    public static function encrypt($txt, $key = ''){
        if (empty($txt)) return $txt;
        if (empty($key)) $key = md5('zhailele');
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_.";
        $ikey ="-x6g6ZWm2G9g_vr0Bo.pOq3kRIxsZ6rm";
        $nh1 = rand(0,64);
        $nh2 = rand(0,64);
        $nh3 = rand(0,64);
        $ch1 = $chars{$nh1};
        $ch2 = $chars{$nh2};
        $ch3 = $chars{$nh3};
        $nhnum = $nh1 + $nh2 + $nh3;
        $knum = 0;$i = 0;
        while(isset($key{$i})) $knum +=ord($key{$i++});
        $mdKey = substr(md5(md5(md5($key.$ch1).$ch2.$ikey).$ch3),$nhnum%8,$knum%8 + 16);
        $txt = base64_encode(time().'_'.$txt);
        $txt = str_replace(array('+','/','='),array('-','_','.'),$txt);
        $tmp = '';
        $j=0;$k = 0;
        $tlen = strlen($txt);
        $klen = strlen($mdKey);
        for ($i=0; $i<$tlen; $i++) {
            $k = $k == $klen ? 0 : $k;
            $j = ($nhnum+strpos($chars,$txt{$i})+ord($mdKey{$k++}))%64;
            $tmp .= $chars{$j};
        }
        $tmplen = strlen($tmp);
        $tmp = substr_replace($tmp,$ch3,$nh2 % ++$tmplen,0);
        $tmp = substr_replace($tmp,$ch2,$nh1 % ++$tmplen,0);
        $tmp = substr_replace($tmp,$ch1,$knum % ++$tmplen,0);
        return $tmp;
    }

    /**
     * 解密函数
     * @param string $txt 需要解密的字符串
     * @param string $key 密匙
     * @return string 字符串类型的返回结果
     */
    public static function decrypt($txt, $key = '', $ttl = 0){
        if (empty($txt)) return $txt;
        if (empty($key)) $key = md5('zhailele');

        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_.";
        $ikey ="-x6g6ZWm2G9g_vr0Bo.pOq3kRIxsZ6rm";
        $knum = 0;$i = 0;
        $tlen = strlen($txt);
        while(isset($key{$i})) $knum +=ord($key{$i++});
        $ch1 = $txt{$knum % $tlen};
        $nh1 = strpos($chars,$ch1);
        $txt = substr_replace($txt,'',$knum % $tlen--,1);
        $ch2 = @$txt{$nh1 % $tlen};
        $nh2 = @strpos($chars,$ch2);
        $txt = @substr_replace($txt,'',$nh1 % $tlen--,1);
        $ch3 = $txt{$nh2 % $tlen};
        $nh3 = @strpos($chars,$ch3);
        $txt = substr_replace($txt,'',$nh2 % $tlen--,1);
        $nhnum = $nh1 + $nh2 + $nh3;
        $mdKey = substr(md5(md5(md5($key.$ch1).$ch2.$ikey).$ch3),$nhnum % 8,$knum % 8 + 16);
        $tmp = '';
        $j=0; $k = 0;
        $tlen = strlen($txt);
        $klen = strlen($mdKey);
        for ($i=0; $i<$tlen; $i++) {
            $k = $k == $klen ? 0 : $k;
            $j = strpos($chars,$txt{$i})-$nhnum - ord($mdKey{$k++});
            while ($j<0) $j+=64;
            $tmp .= $chars{$j};
        }
        $tmp = str_replace(array('-','_','.'),array('+','/','='),$tmp);
        $tmp = trim(base64_decode($tmp));

        if (preg_match("/\d{10}_/s",substr($tmp,0,11))){
            if ($ttl > 0 && (time() - substr($tmp,0,11) > $ttl)){
                $tmp = null;
            }else{
                $tmp = substr($tmp,11);
            }
        }
        return $tmp;
    }

    /**
     * 获取客户端IP地址
     * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
     * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
     * @return mixed
     */
    public static function get_client_ip($type = 0,$adv=false) {
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if($adv){
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos    =   array_search('unknown',$arr);
                if(false !== $pos) unset($arr[$pos]);
                $ip     =   trim($arr[0]);
            }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip     =   $_SERVER['HTTP_CLIENT_IP'];
            }elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip     =   $_SERVER['REMOTE_ADDR'];
            }
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }

    /**
     * 根据报备要求的的间隔时间返回时间
     * @param string $reminder
     * @return false|string
     */
    public static function getReminderTime($reminder = ''){
        if (empty($reminder)){
            return date('Y-m-d H:i:s');
        }
        switch ($reminder) {
            case 'O.5H':
                $contact_time = date('Y-m-d H:i:s', strtotime("+0.5 hour"));
                break;
            case '1H':
                $contact_time = date('Y-m-d H:i:s', strtotime("+1 hour"));
                break;
            case '3H':
                $contact_time = date('Y-m-d H:i:s', strtotime("+3 hour"));
                break;
            case '1D':
                $contact_time = date('Y-m-d H:i:s', strtotime("+1 day"));
                break;
            case '3D':
                $contact_time = date('Y-m-d H:i:s', strtotime("+3 day"));
                break;
            case '1W':
                $contact_time = date('Y-m-d H:i:s', strtotime("+1 week"));
                break;
            default:
                $contact_time = date('Y-m-d H:i:s', strtotime("+1 day"));
                break;
        }
        return $contact_time;
    }

    /**
     * @desc 根据两点间的经纬度计算距离
     * @param float $lat 纬度值
     * @param float $lng 经度值
     */
    public static function getDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6367000;
        $lat1 = ($lat1 * pi()) / 180;
        $lng1 = ($lng1 * pi()) / 180;
        $lat2 = ($lat2 * pi()) / 180;
        $lng2 = ($lng2 * pi()) / 180;
        $calcLongitude = $lng2 - $lng1;
        $calcLatitude = $lat2 - $lat1;
        $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
        $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
        $calculatedDistance = $earthRadius * $stepTwo;
        return round($calculatedDistance, 4);
    }

    public static function buildGeoCodingUrl($output, $addr)
    {
        $ak = Yii::$app->params['baiduMapAk'];
        $sk = Yii::$app->params['baiduMapSk'];
        $uri = '/geocoder/v2/';
        $url = "http://api.map.baidu.com/geocoder/v2/?" . "address=" . urlencode($addr) . "&output=" . $output . "&ak=" . Yii::$app->params['baiduMapAk'];

        $querystring_arrays = array (
            'address' => $addr,
            'output' => $output,
            'ak' => Yii::$app->params['baiduMapAk']
        );

        $sn = static::caculateAKSN($ak, $sk, $uri, $querystring_arrays);

        return $url . "&sn=" . $sn;
    }

    public static function buildGeoCodingUrlWithPos($ak, $sk, $output, $location, $pois = 0)
    {
        $uri = '/geocoder/v2/';
        $url = "http://api.map.baidu.com/geocoder/v2/?". "location=" . urlencode($location) . "&output=" . $output . "&ak=" . $ak;

        $querystring_arrays = array (
            'location' => $location,
            'output' => $output,
            'ak' => $ak
        );

        $sn = static::caculateAKSN($ak, $sk, $uri, $querystring_arrays);

        return $url . "&sn=" . $sn;
    }

    public static function caculateAKSN($ak, $sk, $url, $querystring_arrays, $method = 'GET')
    {
        if ($method === 'POST'){
            ksort($querystring_arrays);
        }

        $querystring = http_build_query($querystring_arrays);

        $ret_hash =  md5(urlencode($url.'?'.$querystring.$sk));

        return $ret_hash;
    }

    //检查目录
    public static function checkmenu($i=null,$j=null){

        $controllerID = Yii::$app->controller->id;
        $actionID = Yii::$app->controller->action->id;

        $menu_arr = [
            '1'=>[
                '1'=>'company-shop',
                '2'=>'company-member',
            ]
        ];
        var_dump($controllerID);var_dump($actionID);die;
        return true;
    }

    //检查电子邮箱
    public static function checkEmail($val = null){
        $email_pattern = "/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";

        if(preg_match($email_pattern, $val)){
            return true;
        }
        return false;
    }

    //检查手机号码
    public static function checkPhone($val = null){
        $phone_pattern = "/^1[34578]{1}\d{9}$/";
        if(preg_match($phone_pattern, $val)){
            return true;
        }
        return false;
    }

    //生成动态验证码
    public static function autoCode(){
        $ychar="0,1,2,3,4,5,6,7,8,9";
        $list=explode(",",$ychar);
        $code = '';
        for($i=0;$i<4;$i++){
            $randnum=rand(0,9);
            $code.=$list[$randnum];
        }
        return $code;
    }
}
?>