<?php

namespace SnowySocial;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;
use SnowySocial\EndPoints\EndPointInterface;
use SnowySocial\Exceptions\InvalidApiToken;

/**
 * Class ApiClient
 *
 * @package \SnowySocial
 */
class ApiClient
{
    const API_URL = 'http://snowysocial.app/api';

    const HTTP_POST = 'post';

    const HTTP_GET = 'get';

    /**
     * @var Client
     */
    private $client;

    public function request(Auth $auth, EndPointInterface $endpoint)
    {
        $requestData = $endpoint->requestData();

        $body = null;
        if ($requestData['http_method'] === self::HTTP_POST) {
            $body = $requestData['data'];
        }

        try {
            return $this->getClient()->request(
                $requestData['http_method'],
                self::API_URL . $requestData['endpoint'],
                [
                    'form_params' => $body,
                    'headers' => [
                        'client-key' => $auth->getKey(),
                        'client-secret' => $auth->getSecret()
                    ]
                ]
            )->getBody()->getContents();
        } catch (ClientException $e) {
            $error = json_decode($e->getResponse()->getBody()->getContents(), true);
            if (isset($error['error']['message']) && $error['error']['message'] == 'Invalid API Credentials') {
                throw new InvalidApiToken;
            }
        }
    }

    public function getClient()
    {
        if (!$this->client) {
            $this->client == new Client();
        }

        return new Client();
    }
}
