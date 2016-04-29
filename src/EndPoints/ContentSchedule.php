<?php

namespace SnowySocial\EndPoints;

use SnowySocial\ApiClient;

/**
 * Class ContentSchedule
 *
 * @package \SnowySocial\EndPoints
 */
class ContentSchedule implements EndPointInterface
{
    /**
     * @var array
     */
    private $socialAccountIds;
    /**
     * @var string
     */
    private $content;
    /**
     * @var string
     */
    private $sendTime;

    /**
     * @param array $socialAccountIds
     * @param string $content
     * @param string $sendTime
     */
    public function __construct(array $socialAccountIds, $content, $sendTime)
    {
        $this->socialAccountIds = $socialAccountIds;
        $this->content = $content;
        $this->sendTime = $sendTime;
    }

    /**
     * @return array
     */
    public function requestData()
    {
        return [
            'endpoint' => '/content/schedule',
            'data' => [
                'content'         => $this->content,
                'social_accounts' => $this->socialAccountIds,
                'datetime'        => $this->sendTime,
            ],
            'http_method' => ApiClient::HTTP_POST
        ];
    }
}
