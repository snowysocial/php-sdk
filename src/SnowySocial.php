<?php

namespace SnowySocial;

use SnowySocial\EndPoints\EndPointInterface;

/**
 * Class SnowySocial
 *
 * @package \SnowySocial
 */
class SnowySocial
{
    /**
     * @var \SnowySocial\Auth
     */
    private $auth;

    /**
     * SnowySocial constructor.
     *
     * @param \SnowySocial\Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param \SnowySocial\EndPoints\EndPointInterface $endpoint
     *
     * @return mixed
     */
    public function request(EndPointInterface $endpoint)
    {
        return (new ApiClient)->request($this->auth, $endpoint);
    }
}
