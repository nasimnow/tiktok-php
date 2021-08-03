<?php

require_once("spaces.php");



$my_space = Spaces("UAT4XP74G5KN63HKRKN5", "6CqnIOKef6Pt3Yc04TKDbeBbmZ6UA6YSFXhIjvc5WMQ")->space("saav", "sgp1");

//Upload a local stored file.
$my_space->upload("hi boys", "vidfy/temp/hi.txt", "public");

?>