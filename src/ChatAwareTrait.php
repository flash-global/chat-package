<?php
namespace Fei\Service\Chat\Package;

use Fei\Service\Chat\Client\Chat;

/**
 * Class ChatAwareTrait
 *
 * @package Fei\Service\Chat\Package
 */
trait ChatAwareTrait
{
    /**
     * @Inject(service="chat.client")
     * @var  Chat
     */
    protected $chat;

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     * @return ChatAwareTrait
     */
    public function setChat(Chat $chat)
    {
        $this->chat = $chat;
        return $this;
    }
}
