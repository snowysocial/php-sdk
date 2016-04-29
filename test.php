<?php
include 'vendor/autoload.php';

$authObj = new \SnowySocial\Auth('a', 'a');
$endpoint = new \SnowySocial\EndPoints\ContentSchedule([32], 'text', 0);
$response = (new \SnowySocial\SnowySocial($authObj))->request($endpoint);

var_dump($response);die;
