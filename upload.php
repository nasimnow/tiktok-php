<?php

require_once("spaces.php");

$file_name = $_GET['file_name'];
$file_location = $_GET['file_location'];

$my_space = Spaces("UAT4XP74G5KN63HKRKN5", "6CqnIOKef6Pt3Yc04TKDbeBbmZ6UA6YSFXhIjvc5WMQ")->space("saav", "sgp1");

//Upload a local stored file.
$my_space->uploadFile("../user_videos/{$file_location}.mp4", "vidfy/videos/{$file_name}.mp4", "public");
$my_space->uploadFile("../user_videos/{$file_location}.jpg", "vidfy/images/{$file_name}.jpg", "public");

?>