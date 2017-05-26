<?php
namespace Fei\Service\Chat\Package\Config;

use ObjectivePHP\Config\SingleValueDirective;

/**
 * Class ChatParam
 * @package ObjectivePHP\Package\Chat\Config
 */
class ChatBaseUrl extends SingleValueDirective
{
    public function __construct(string $value = '')
    {
        parent::__construct($value);
    }

    /**
     * Set the Base Url used by the client
     *
     * @param string $baseUrl
     *
     * @return ChatBaseUrl
     */
    public function setBaseUrl(string $baseUrl) : self
    {
        $this->value = $baseUrl;

        return $this;
    }
}
