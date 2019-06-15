<?php

use think\Db;
use think\facade\Session;

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * ajax数据返回
 * @param  $message 消息
 * @param  $resData 具体数据
 * @param  $result 0成功1失败
 * @param  $url 跳转地址
 * @return jsonRPCClient
 * @author zrx
 */
function AjaxJson($message, $result = 0, $reData = '', $url = '')
{
    header('Content-Type:application/json; charset=utf-8');
    if ($reData == '') {
        $result = 1;
    }
    $value = array('message' => $message, 'resData' => $reData, 'result' => $result, 'url' => $url);
    exit(json_encode($value));
    //转为json格式
}

//检测登录账号格式（英文、数字、下划线4-20位字符）(?!_)(?!.*?_$)(?!\d+$)
function check_username($username)
{
    $search = '/^[A-Za-z0-9]{4,20}$/u';
    if (preg_match($search, $username)) {
        return true;
    } else {
        return false;
    }
}

//检测登录密码格式（英文、数字、下划线6-20位字符）(?!_)(?!.*?_$)(?!\d+$)
function check_password($password)
{
    $search = '/^[A-Za-z0-9]{6,20}$/u';
    if (preg_match($search, $password)) {
        return true;
    } else {
        return false;
    }
}

//检测手机格式正确
function check_phone($phone)
{
    $search = '/^0?1[3|4|5|6|7|8][0-9]\d{8}$/';
    if (preg_match($search, $phone)) {
        return true;
    } else {
        return false;
    }
}

//检测身份证格式正确性
function check_idcard($card)
{
    $id = strtoupper($card);
    $regx = "/(^\d{15}$)|(^\d{17}([0-9]|X)$)/";
    $arr_split = array();
    if (!preg_match($regx, $id)) {
        return FALSE;
    }
    if (15 == strlen($id))//检查15位
    {
        $regx = "/^(\d{6})+(\d{2})+(\d{2})+(\d{2})+(\d{3})$/";

        @preg_match($regx, $id, $arr_split);
        //检查生日日期是否正确
        $dtm_birth = "19" . $arr_split[2] . '/' . $arr_split[3] . '/' . $arr_split[4];
        if (!strtotime($dtm_birth)) {
            return FALSE;
        } else {
            return TRUE;
        }
    } else//检查18位
    {
        $regx = "/^(\d{6})+(\d{4})+(\d{2})+(\d{2})+(\d{3})([0-9]|X)$/";
        @preg_match($regx, $id, $arr_split);
        $dtm_birth = $arr_split[2] . '/' . $arr_split[3] . '/' . $arr_split[4];
        if (!strtotime($dtm_birth))//检查生日日期是否正确
        {
            return FALSE;
        } else {
            //检验18位身份证的校验码是否正确。
            //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
            $arr_int = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            $arr_ch = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
            $sign = 0;
            for ($i = 0; $i < 17; $i++) {
                $b = (int)$id{$i};
                $w = $arr_int[$i];
                $sign += $b * $w;
            }
            $n = $sign % 11;
            $val_num = $arr_ch[$n];
            if ($val_num != substr($id, 17, 1)) {
                return FALSE;
            }//phpfensi.com
            else {
                return TRUE;
            }
        }
    }

}

/**
 * @param $arr
 * @param $key_name
 * @return array
 * 将数据库中查出的列表以指定的 id 作为数组的键名
 */
function convert_arr_key($arr, $key_name)
{
    $arr2 = array();
    foreach ($arr as $key => $val) {
        $arr2[$val[$key_name]] = $val;
    }
    return $arr2;
}

//生成下载excel
function downloadExcel($strTable, $filename)
{
    header("Content-type: application/vnd.ms-excel");
    header("Content-Type: application/force-download");
    header("Content-Disposition: attachment; filename=" . $filename . "_" . date('Y-m-d') . ".xls");
    header('Expires:0');
    header('Pragma:public');
    echo '<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><style>br {mso-data-placement:same-cell;}</style>' . $strTable . '</html>';
}

function downloadCsv($strTable, $filename)
{
    header("Content-type: application/vnd.ms-excel");
    header("Content-Type: application/force-download");
    header("Content-Disposition: attachment; filename=" . $filename . "_" . date('Y-m-d') . ".csv");
    header('Expires:0');
    header('Pragma:public');
    ob_end_flush();
}

//导出word
function downloadWord($filename, $wordData)
{
    header("Content-Type: application/doc");
    header("Content-Type: application/force-download");
    header("Content-Disposition: attachment; filename=" . $filename . "_" . date('Y-m-d') . ".doc");
    header('Expires:0');
    header('Pragma:public');
    echo '<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />' . $wordData . '</html>';
}

/**
 * 发送请求获取数据
 * @param url 发送地址
 */
function getJson($url)
{
    $oCurl = curl_init();
    if (stripos($url, "https://") !== FALSE) {
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($oCurl, CURLOPT_SSLVERSION, 1);
        //CURL_SSLVERSION_TLSv1
    }
    curl_setopt($oCurl, CURLOPT_TIMEOUT, 1);

    curl_setopt($oCurl, CURLOPT_URL, $url);
    curl_setopt($oCurl, CURLOPT_HEADER, 0);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
    $json = curl_exec($oCurl);
    $arr = json_decode($json, true);
    curl_close($oCurl);
    return json_decode($json, true);
}

/**
 * 根据中心经纬度和半径画圆圈得出的最大最小经纬度
 * @param lon 经度
 * @param lat 纬度
 * @param raidus 半径距离单位米
 */
function getAround($lon, $lat, $raidus)
{
    $pai = 3.14159265;
    $degree = (24901 * 1609) / 360.0;
    $dpmLat = 1 / $degree;
    $radiusLat = $dpmLat * $raidus;
    $minLat = $lat - $radiusLat;
    $maxLat = $lat + $radiusLat;
    $mpdLng = $degree * cos($lat * ($pai / 180));
    $dpmLng = 1 / $mpdLng;
    $radiusLng = $dpmLng * $raidus;
    $minLng = $lon - $radiusLng;
    $maxLng = $lon + $radiusLng;
    return array($minLng, $maxLng, $minLat, $maxLat);
}

/**
 * 求两个已知经纬度之间的距离,单位为米
 *
 * @param lng1 $ ,lng2 经度
 * @param lat1 $ ,lat2 纬度
 * @return float 距离，单位米
 * @author www.Alixixi.com
 */
function getdistance($lng1, $lat1, $lng2, $lat2)
{
    // 将角度转为狐度
    $radLat1 = deg2rad($lat1);
    //deg2rad()函数将角度转换为弧度
    $radLat2 = deg2rad($lat2);
    $radLng1 = deg2rad($lng1);
    $radLng2 = deg2rad($lng2);
    $a = $radLat1 - $radLat2;
    $b = $radLng1 - $radLng2;
    $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2))) * 6378.137 * 1000;
    return intval($s);
}

/**
 * 二维数组排序
 * $key SORT_ASC,SORT_DESC
 */
function array_to_sort($arr, $field, $key)
{

    $sort = array('direction' => $key, //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
        'field' => $field, //排序字段
    );
    $arrSort = array();
    foreach ($arr AS $uniqid => $row) {
        foreach ($row AS $key => $value) {
            $arrSort[$key][$uniqid] = $value;
        }
    }
    if ($sort['direction']) {
        array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arr);
        return $arr;
    }
}

//根据开始月份和结束月份获取所有月数组
function monthList($start, $end)
{
    //转为时间戳
    $start = strtotime($start . '-01');
    $end = strtotime($end . '-01');
    $i = 0;
    $d = array();
    while ($start <= $end) {
        //这里累加每个月的的总秒数 计算公式：上一月1号的时间戳秒数减去当前月的时间戳秒数
        $d[$i] = trim(date('Y-m', $start), ' ');
        $start += strtotime('+1 month', $start) - $start;
        $i++;
    }
    return $d;
}

// 返回执行日期所在周的第一天(周一)日期
function firstOfWeek($times)
{
    $number = date("w", $times);
    //当时是周几
    $number = $number == 0 ? 7 : $number;
    //如遇周末,将0换成7
    $diff_day = $number - 1;
    //求到周一差几天
    return date("Y-m-d", $times - ($diff_day * 60 * 60 * 24));
}

function scerweima($url = '', $outUrl)
{
    require_once '../vendor/phpqrcode/phpqrcode.php';
    $value = $url;
    //二维码内容
    $errorCorrectionLevel = 'L';
    //容错级别
    $matrixPointSize = 5;
    //生成图片大小

    //生成二维码图片
    $filename = time() . '.png';

    QRcode::png($value, $outUrl . $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    $QR = $outUrl . $filename;
    //已经生成的原始二维码图片文件

    $QR = imagecreatefromstring(file_get_contents($QR));

    //输出图片
    imagepng($QR, $outUrl . $filename);
    imagedestroy($QR);
    return $filename;
}

/**
 * 模拟tab产生空格代码生成器生成页面表格
 * @param int $step
 * @param string $string
 * @param int $size
 * @return string
 */
function tab($step = 1, $string = ' ', $size = 4)
{
    return str_repeat($string, $size * $step);
}

/**
 * Notes: 数组相同项求和
 * User: lxy
 * Date: 2018/11/8
 */
function sameSum($arr)
{

    $item = array();
    foreach ($arr as $k2 => $v2) {
        if (!isset($item[$v2['param_id']])) {
            $item[$v2['param_id']] = $v2;
        } else {
            $item[$v2['param_id']]['value'] += $v2['value'];
        }
    }
    return array_values($item);
}

/**
 * Notes: 生成token
 * User: czg
 * Date: 2018/12/6
 */
function buildRandStr($n)
{
    $chars = array(
        "A", "B", "C", "D", "E", "F", "G",
        "H", "I", "J", "K", "L", "M", "N",
        "O", "P", "Q", "R", "S", "T",
        "U", "V", "W", "X", "Y", "Z"
    );
    $charsLen = count($chars) - 1;
    shuffle($chars);
    $output = "";
    for ($i = 0; $i < $n; $i++) {
        $output .= $chars[mt_rand(0, $charsLen)];
    }
    return $output;
}

/**
 * 获取指定日期段内每一天的日期
 * @param  Date $startdate 开始日期
 * @param  Date $enddate 结束日期
 * @return Array
 */
function getDateFromRange($startdate, $enddate)
{

    $stimestamp = strtotime($startdate);
    $etimestamp = strtotime($enddate);

    // 计算日期段内有多少天
    $days = ($etimestamp - $stimestamp) / 86400 + 1;

    // 保存每天日期
    $date = array();

    for ($i = 0; $i < $days; $i++) {
        $date[] = date('Y-m-d', $stimestamp + (86400 * $i));
    }

    return $date;
}

/**
 * 获取本周所有日期
 */
function get_week($time = '', $format = 'Y-m-d')
{
    $time = $time != '' ? $time : time();
    //获取当前周几
    $week = date('w', $time);
    $date = [];
    for ($i = 0; $i <= 6; $i++) {
        $date[$i] = date($format, strtotime('+' . $i - $week . ' days', $time));
    }
    return $date;
}

function base64EncodeImage($image_file)
{
    $base64_image = '';
    $image_info = getimagesize($image_file);
    $image_data = fread(fopen($image_file, 'r'), filesize($image_file));
    $base64_image = chunk_split(base64_encode($image_data));
    return $base64_image;
}

function myTrim($str)
{
    $search = array(" ", " ", "\n", "\r", "\t");
    $replace = array("", "", "", "");
    return str_replace($search, $replace, $str);
}

function returnMessage($status = 0, $message, $reData = '')
{
    header('Content-Type:application/json; charset=utf-8');
    if ($reData === '') {
//        $status = 1;
        $reData = null;
    }
    $value = array(
        'message' => $message,
        'data' => $reData,
        'status' => $status,
        'time' => date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME'])
    );
    return (json_encode($value));//转为json格式
}

function httpGet($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);
    $res = curl_exec($curl);
    curl_close($curl);
    return json_decode($res, true);
}

