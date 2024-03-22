<?php

declare(strict_types=1);

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

class ParcelShopSearchRequest extends Request
{
    public function __construct(
        Authentication $authentication,
        private readonly bool $fetchGsPUDOpoint,
        private readonly string $countryCode,
        private readonly ?string $postCode = null,
        private readonly ?string $street = null,
        private readonly ?string $city = null,
        private readonly ?string $id = null,
        private readonly ?string $company = null,
        private readonly bool $retrieveOpeningHours = false
    ) {
        parent::__construct($authentication);
    }

    #[\Override]
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
