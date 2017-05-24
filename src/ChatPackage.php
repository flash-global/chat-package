<?php

namespace Fei\Service\Chat\Package;

use Fei\ApiClient\AbstractApiClient;
use Fei\ApiClient\Transport\BasicTransport;
use Fei\Service\Chat\Client\Chat;
use Fei\Service\Chat\Package\Config\ChatBaseUrl;
use ObjectivePHP\Application\ApplicationInterface;
use ObjectivePHP\ServicesFactory\ServiceReference;

/**
 * Class ChatPackage
 * @package Fei\Service\Chat\Package
 */
class ChatPackage
{
    const DEFAULT_IDENTIFIER = 'chat.client';

    /** @var string */
    protected $identifier;

    /**
     * ChatPackage constructor.
     * @param string $serviceIdentifier
     */
    public function __construct(string $serviceIdentifier = self::DEFAULT_IDENTIFIER)
    {
        $this->identifier = $serviceIdentifier;
    }

    /**
     * @param ApplicationInterface $app
     * @throws \Exception
     */
    public function __invoke(ApplicationInterface $app)
    {
        $config = $app->getConfig();

        if (!$config->has(ChatBaseUrl::class)) {
            throw new \Exception('Parameter Base URL for Chat Package does not exist');
        }

        $baseUrl = $config->get(ChatBaseUrl::class);

        $app->getServicesFactory()->registerService([
            'id' => 'transport.basic',
            'class' => BasicTransport::class,
            'params' => [$baseUrl],
        ]);

        $setters = [
            'setTransport' => [new ServiceReference('transport.basic')],
        ];

        $app->getServicesFactory()->registerService(
            [
                'id' => $this->identifier,
                'class' => Chat::class,
                'params' => [[AbstractApiClient::OPTION_BASEURL => $baseUrl]],
                'setters' => $setters
            ]
        );
    }
}
