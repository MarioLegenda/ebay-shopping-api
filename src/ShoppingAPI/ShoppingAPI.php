<?php

namespace ShoppingAPI;

use SDKBuilder\AbstractSDK;

class ShoppingAPI extends AbstractSDK
{
    private $response;

    public function getResponse()
    {
        return $this->getResponseBody();
    }
}