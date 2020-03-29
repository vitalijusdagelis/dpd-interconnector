<?php

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

class ParcelShopSearchRequest extends Request
{
    private $fetchGsPUDOpoint;
    private $countryCode;
    private $postCode;
    private $street;
    private $city;
    private $id;
    private $company;
    private $retrieveOpeningHours;

    public function __construct(
        Authentication $authentication,
        bool $fetchGsPUDOpoint, 
        string $countryCode, 
        ?string $postCode = null, 
        ?string $street = null,
        ?string $city = null,
        ?string $id = null,
        ?string $company = null,
        bool $retrieveOpeningHours = false
    ) {
        parent::__construct($authentication);

        $this->fetchGsPUDOpoint = $fetchGsPUDOpoint;
        $this->countryCode = $countryCode;
        $this->postCode = $postCode;
        $this->street = $street;
        $this->city = $city;
        $this->id = $id;
        $this->company = $company;
        $this->retrieveOpeningHours = $retrieveOpeningHours;
    }

    public function toArray(): array
    {
        return array_merge(
            $this->authentication->toArray(),
            [
                'id' => $this->id,
                'company' => $this->company,
                'street' => $this->street,
                'city' => $this->city,
                'country' => $this->countryCode,
                'pcode' => $this->postCode,
                'fetchGsPUDOpoint' => (int)$this->fetchGsPUDOpoint,
                'retrieveOpeningHours' => (int)$this->retrieveOpeningHours
            ]
        );
    }
}