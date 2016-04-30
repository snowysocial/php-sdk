<?php
include 'vendor/autoload.php';

$contentToSend = 'This some link from https://www.snowysocial.co.uk';
$socialAccountId = [32, 40];
$timeToSend = time();

$authObj = new \SnowySocial\Auth('a', 'a');
$endpoint = new \SnowySocial\EndPoints\ContentSchedule(
    $socialAccountId,
    $contentToSend,
    new DateTime('now')
);
$response = (new \SnowySocial\SnowySocial($authObj))->request($endpoint);

var_dump($response);die;
