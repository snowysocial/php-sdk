<?php
include 'vendor/autoload.php';

$contentToSend = 'This some link from https://www.snowysocial.co.uk';
$socialAccountId = [30];
$timeToSend = time();

$authObj = new \SnowySocial\Auth('a', 'a');
$endpoint = new \SnowySocial\EndPoints\ContentSchedule(
    $socialAccountId,
    $contentToSend,
    $timeToSend,
    null,
    'https://www.snowysocial.co.uk'
);
$response = (new \SnowySocial\SnowySocial($authObj))->request($endpoint);

var_dump($response);die;
