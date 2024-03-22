<?php

declare(strict_types=1);

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

abstract class Request implements RequestInterface
{
    public function __construct(protected Authentication $authentication)
    {
    }

    #[\Override]
    public function getEndpointUrl(): string
    {
        return $this->authentication->getEndpointUrl();
    }
}
