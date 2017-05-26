# Chat Package

This package provide Chat Client integration for Objective PHP applications.

## Installation

Chat Package needs **PHP 7.0** or up to run correctly.

You will have to integrate it to your Objective PHP project with `composer require fei/chat-package`.


## Integration

As shown below, the Chat Package must be plugged in the application initialization method.

The Chat Package create a Chat Client service that will be consumed by the application's middlewares.

```php
<?php

use ObjectivePHP\Application\AbstractApplication;
use Fei\Service\Chat\Package\ChatPackage;

class Application extends AbstractApplication
{
    public function init()
    {
        /** @var AbstractApplication $this */

        // Define some application steps
        $this->addSteps('bootstrap', 'init', 'auth', 'route', 'rendering');
        
        // Initializations...

        // Plugging the Chat Package in the bootstrap step
        $this->getStep('bootstrap')
        ->plug(ChatPackage::class);

        // Another initializations...
    }
}
```
### Application configuration

Create a file in your configuration directory and put your Chat configuration as below:

```php
<?php
use Fei\Service\Chat\Package\Config\ChatBaseUrl;

return [
    (new ChatBaseUrl())->setBaseUrl('http://chat.dev:8181'),
];
```

In the previous example you need to set this configuration:

* `ChatBaseUrl` : represent the URL where the API can be contacted in order to send the chats

Please check out `chat-client` documentation for more information about how to use this client.