<?php
require_once("spaces.php");

$url = $_GET['url'];
$url = str_replace("\\u0026", "&", $url);

//$my_space = Spaces("UAT4XP74G5KN63HKRKN5", "6CqnIOKef6Pt3Yc04TKDbeBbmZ6UA6YSFXhIjvc5WMQ")->space("saav", "sgp1");

//Upload a local stored file.
downloadVideo("https:\/\/v16-web.tiktok.com\/video\/tos\/useast2a\/tos-useast2a-ve-0068\/15fbafb086324317bf77a649580b1f95\/?a=1988&br=4778&bt=2389&cd=0%7C0%7C1&ch=0&cr=0&cs=0&cv=1&dr=0&ds=3&er=&expire=1627563364&ft=Q9BExEXk_4ka&l=202107290655540101910261365803E487&lr=tiktok_m&mime_type=video_mp4&net=0&pl=0&policy=2&qs=0&rc=M245aWhvZ3U4bjMzZzczM0ApOTtmOzdoaDtnNzM5aTo1ZGczc29gcGdnMXJfLS01MTZzczI2L2FiLWFeLzI0MmJhYV86Yw%3D%3D&signature=177607f365c2ab6331c8713e407f066a&tk=tt_webid_v2&vl=&vr=");

function downloadVideo($video_url, $type = "video", $geturl = false)
{

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
echo $data;
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($geturl === true)
    {
        return curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    }
   
//$my_space->uploadFile($data, "vidfy/videos/aaaaaaa.mp4", "public");
 curl_close($ch);

}

exit();
?>
