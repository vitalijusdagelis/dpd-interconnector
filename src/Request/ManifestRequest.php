<?php

declare(strict_types=1);

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

class ManifestRequest extends Request implements RequestInterface
{
    public function __construct(
        Authentication $authentication,
        private readonly \DateTime $date
    ) {
        parent::__construct($authentication);
    }

    #[\Override]
    public function toArray(): array
    {
        return array_merge(
            $this->authentication->toArray(),
            ['date' => $this->date->format("Y-m-d")]
        );
    }
}
