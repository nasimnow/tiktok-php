<?php
require_once ('php_image_magician.php');
require_once("spaces.php");

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS')
{

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

}

$store_locally = true; /* change to false if you don't want to host videos locally */

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0;$i < $length;$i++)
    {
        $randomString .= $characters[rand(0, $charactersLength - 1) ];
    }
    return $randomString;
}

function downloadVideo($video_url, $type = "video", $video_name, $geturl = false)
{
    $my_space = Spaces("UAT4XP74G5KN63HKRKN5", "6CqnIOKef6Pt3Yc04TKDbeBbmZ6UA6YSFXhIjvc5WMQ")->space("saav", "sgp1");
    $ch = curl_init();
    $headers = array(
        'Range: bytes=0-',

    );
    $options = array(
        CURLOPT_URL => $video_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_FOLLOWLOCATION => true,
        CURLINFO_HEADER_OUT => true,
        CURLOPT_USERAGENT => 'okhttp',
        CURLOPT_ENCODING => "utf-8",
        CURLOPT_AUTOREFERER => true,
        CURLOPT_COOKIEJAR => 'cookie.txt',
        CURLOPT_COOKIEFILE => 'cookie.txt',
        CURLOPT_REFERER => 'https://www.tiktok.com/',
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_MAXREDIRS => 10,
    );
    curl_setopt_array($ch, $options);
    if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4'))
    {
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    }
    $data = curl_exec($ch);
    
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($geturl === true)
    {
        return curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    }
    curl_close($ch);

    if ($type == "video")
    {
        $my_space->upload($data, "vidfy/temp/fdfd.mp4","public","video/mp4");
    }
    if ($type == "image")
    {
                $my_space->upload($data, "vidfy/temp/fdfd.jpeg","public","image/jpeg");
    }
    
    
    return $filename;
}

if (isset($_GET['url']) && !empty($_GET['url']))
{
    if ($_SERVER['HTTP_REFERER'] != "")
    {
        $url = $_GET['url'];
        $name = downloadVideo($url);
        exit();
    }
    else
    {
        echo "";
        exit();
    }
}

function getContent($url, $geturl = false)
{
    $ch = curl_init();
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36',
        CURLOPT_ENCODING => "utf-8",
        CURLOPT_AUTOREFERER => false,
        CURLOPT_COOKIEJAR => 'cookie.txt',
        CURLOPT_COOKIEFILE => 'cookie.txt',
        CURLOPT_REFERER => 'https://www.tiktok.com/',
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_MAXREDIRS => 10,
    );
    curl_setopt_array($ch, $options);
    if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4'))
    {
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    }
    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($geturl === true)
    {
        return curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    }
    curl_close($ch);
    return strval($data);
}

function getKey($playable)
{
    $ch = curl_init();
    $headers = ['Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9', 'Accept-Encoding: gzip, deflate, br', 'Accept-Language: en-US,en;q=0.9', 'Range: bytes=0-200000'];

    $options = array(
        CURLOPT_URL => $playable,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',
        CURLOPT_ENCODING => "utf-8",
        CURLOPT_AUTOREFERER => false,
        CURLOPT_COOKIEJAR => 'cookie.txt',
        CURLOPT_COOKIEFILE => 'cookie.txt',
        CURLOPT_REFERER => 'https://www.tiktok.com/',
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_MAXREDIRS => 10,
    );
    curl_setopt_array($ch, $options);
    if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4'))
    {
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    }
    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $tmp = explode("vid:", $data);
    if (count($tmp) > 1)
    {
        $key = trim(explode("%", $tmp[1]) [0]);
    }
    else
    {
        $key = "";
    }
    return $key;
}

if (isset($_GET['link']) && !empty($_GET['link']))
{
    
        

    $url = trim($_GET['link']);
    $resp = getContent($url);

    $check = explode('"downloadAddr":"', $resp);
    //$coverDynamic = explode('"dynamicCover":"', $resp);
    $coverNormal = explode('"cover":"', $resp);

    if (count($check) > 1)
    {
        $contentURLRaw = explode("\"", $check[1]) [0];
        
        $contentURL = str_replace("\\u0026", "&", $contentURLRaw);

        //$coverDynamic = explode("\"", $coverDynamic[1]) [0];
        //$coverDynamic = str_replace("\\u0026", "&", $coverDynamic);
        $coverNormal = explode("\"", $coverNormal[1]) [0];
        $coverNormal = str_replace("\\u0026", "&", $coverNormal);

        //$thumb = explode("\"", explode('og:image" content="', $resp) [1]) [0];

        $username = explode('/', explode('"$pageUrl":"/@', $resp) [1]) [0];
        //$create_time = explode(',', explode('"createTime":', $resp) [1]) [0];
        //$dt = new DateTime("@$create_time");
        //$create_time = $dt->format("d M Y H:i:s A");
        //$videoKey = getKey($contentURL);
        $file_name = generateRandomString();
       // $video_url = "https://tiktofy.wecollab.club/new/getFile.php?u={$contentURL}&t=streaming&f=v";
        downloadVideo($contentURL, "video", $file_name);
        downloadVideo($coverNormal, "image", $file_name);
        //$cleanVideo = "https://api2-16-h2.musical.ly/aweme/v1/play/?video_id=$videoKey&vr_type=0&is_play_url=1&source=PackSourceEnum_PUBLISH&media_type=4";
        //$cleanVideo = getContent($cleanVideo, true);
        //$linkVid = downloadVideo($contentURL, true);
        $response = array(
            'status' => true,
            'video_id' => $file_name,
            'username' => $username,
            'video_url' => $contentURL,

        );
        echo json_encode($response);
        http_response_code(200);
    }
    else
    {
        $response = array(
            'status' => false
        );
        echo json_encode($response);
        http_response_code(500);
    }

}
?>
