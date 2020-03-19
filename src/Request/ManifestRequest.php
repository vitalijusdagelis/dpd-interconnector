<?php

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

class ManifestRequest extends Request implements RequestInterface
{
    private $date;

    public function __construct(Authentication $authentication, \DateTime $date)
    {
        parent::__construct($authentication);

        $this->date = $date;
    }

    public function toArray(): array
    {
        return array_merge(
            $this->authentication->toArray(), 
            ['date' => $this->date->format("Y-m-d")]
        );
    }
}