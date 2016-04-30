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
     * @var \DateTime
     */
    private $sendTime;
    /**
     * @var null|string
     */
    private $imageUrl;
    /**
     * @var null|string
     */
    private $explicitUrl;

    /**
     * @param array       $socialAccountIds
     * @param string      $content
     * @param \DateTime   $sendTime
     * @param null|string $imageUrl
     * @param null|string $explicitUrl
     */
    public function __construct(
        array $socialAccountIds,
        $content,
        \DateTime $sendTime,
        $imageUrl = null,
        $explicitUrl = null
    ) {
        $this->socialAccountIds = $socialAccountIds;
        $this->content = $content;
        $this->sendTime = $sendTime;
        $this->imageUrl = $imageUrl;
        $this->explicitUrl = $explicitUrl;
    }

    /**
     * @return array
     */
    public function requestData()
    {
        return [
            'endpoint' => '/content/schedule',
            'data' => [
                'content' => $this->content,
                'social_accounts' => $this->socialAccountIds,
                'datetime' => $this->sendTime->format('c'),
                'explicit_url' => $this->explicitUrl,
                'image_url' => $this->imageUrl
            ],
            'http_method' => ApiClient::HTTP_POST
        ];
    }
}
