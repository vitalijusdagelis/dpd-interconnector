<?php

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

class ManifestRequest implements RequestInterface
{
    public function __construct(Authentication $authentication, \DateTime $date)
    {
        $this->authentication = $authentication;
        $this->date = $date;
    }

    public function toArray(): array
    {
        return array_merge(
            $this->authentication->toArray(), 
            ['date' => $this->date->format("Y-m-d")]
        );
    }

    public function getCountry(): string
    {
        return $this->authentication->country;
    }
}