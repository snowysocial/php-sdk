<?php
include 'vendor/autoload.php';

$contentToSend = 'This some really awesome link https://www.snowysocial.co.uk';
$socialAccountId = [32, 42];
$timeToSend = time();

$authObj = new \SnowySocial\Auth('a', 'a');
$endpoint = new \SnowySocial\EndPoints\ContentSchedule($socialAccountId, $contentToSend, $timeToSend);
$response = (new \SnowySocial\SnowySocial($authObj))->request($endpoint);

var_dump($response);die;
