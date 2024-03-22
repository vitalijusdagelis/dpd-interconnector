<?php

declare(strict_types=1);

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

class LabelsRequest extends Request implements RequestInterface
{
    private array $printInfo;

    public function __construct(
        Authentication $authentication,
        private readonly array $trackingNumbers,
        string $printType,
        string $printFormat
    ) {
        parent::__construct($authentication);

        $this->printInfo = [
            'type' => $printType,
            'format' => $printFormat
        ];
    }

    #[\Override]
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
