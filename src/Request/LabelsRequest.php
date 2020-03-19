<?php

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

class LabelsRequest extends Request implements RequestInterface
{
    private $trackingNumbers = [];

    private $printInfo = [];

    public function __construct(Authentication $authentication, array $trackingNumbers, string $printType, string $printFormat)
    {
        parent::__construct($authentication);

        $this->trackingNumbers = $trackingNumbers;
        $this->printInfo = [
            'type' => $printType,
            'format' => $printFormat
        ];
    }

    public function toArray(): array
    {
        return array_merge(
            $this->authentication->toArray(),
            ['parcels' => $this->getTrackingNumbers(), 'printType' => $this->printInfo['type'], 'printFormat' => $this->printInfo['format']]
        );
    }

    public function getTrackingNumbers(): string
    {
        return implode('|', $this->trackingNumbers);
    }
}
