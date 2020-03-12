<?php

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

class DeleteShipmentRequest implements RequestInterface
{
    private $authentication;

    private $trackingNumbers = [];

    public function __construct(Authentication $authentication, array $trackingNumbers)
    {
        $this->authentication = $authentication;
        $this->trackingNumbers = $trackingNumbers;
    }

    public function toArray(): array
    {
        return array_merge(
            $this->authentication->toArray(),
            ['parcels' => $this->getTrackingNumbers()]
        );
    }

    public function getTrackingNumbers(): string
    {
        return implode('|', $this->trackingNumbers);
    }

    public function getCountry(): string
    {
        return $this->authentication->country;
    }
}