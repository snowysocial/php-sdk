<?php

namespace SnowySocial;

/**
 * Class Auth
 *
 * @package \SnowySocial
 */
class Auth
{
    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    private $secret;

    /**
     * Auth constructor.
     *
     * @param $key
     * @param $secret
     */
    public function __construct($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }
}
