<?php

namespace ShoppingAPI\Listener;

use SDKBuilder\Event\PreProcessRequestEvent;
use ShoppingAPI\Exception\ValidationException;

class ValidateRequestListener
{
    public function onPreProcess(PreProcessRequestEvent $event)
    {
        $request = $event->getRequest();

        $dynamicStorage = $request->getDynamicStorage();
        $queryKeywords = $request->getSpecialParameters()->getParameter('keywords')->getValue();

        if ($dynamicStorage->isDynamicInRequest('ProductID') and $queryKeywords !== null) {
            throw new ValidationException('QueryKeywords and ProductId cannot be used together');
        }
    }
}