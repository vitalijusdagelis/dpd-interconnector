<?php

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

abstract class Request implements RequestInterface
{
    protected $authentication;

    public function __construct(Authentication $auth)
    {
        $this->authentication = $auth;
    }

    public function getEndpointUrl(): string
    {
        return $this->authentication->getEndpointUrl();
    }
}
