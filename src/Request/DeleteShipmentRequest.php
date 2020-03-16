<?php

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

class DeleteShipmentRequest extends Request implements RequestInterface
{
    private $trackingNumbers = [];

    public function __construct(Authentication $authentication, array $trackingNumbers)
    {
        parent::__construct($authentication);

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
}
