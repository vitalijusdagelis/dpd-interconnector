<?php

declare(strict_types=1);

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

class DeleteShipmentRequest extends Request implements RequestInterface
{
    public function __construct(
        Authentication $authentication,
        private readonly array $trackingNumbers
    ) {
        parent::__construct($authentication);
    }

    #[\Override]
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
