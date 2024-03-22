<?php

declare(strict_types=1);

namespace spec\DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;
use PhpSpec\ObjectBehavior;

class ParcelShopSearchRequestSpec extends ObjectBehavior
{
    private string $username = 'username';
    private string $password = 'password';

    public function let(): void
    {
        $auth = new Authentication($this->username, $this->password);
        $this->beConstructedWith($auth);
    }

    public function it_should_transform_to_array(): void
    {
        $auth = new Authentication($this->username, $this->password);
        $fetchGsPUDOpoint = false;
        $countryCode = 'LT';
        $postCode = '09601';
        $street = 'Konstitucijos pr. 3';
        $city = 'Vilnius';

        $this->beConstructedWith($auth, $fetchGsPUDOpoint, $countryCode, $postCode, $street, $city);

        $expectedArray = [
            'username' => $this->username,
            'password' => $this->password,
            'id' => null,
            'company' => null,
            'street' => $street,
            'city' => $city,
            'country' => $countryCode,
            'pcode' => $postCode,
            'fetchGsPUDOpoint' => (int)$fetchGsPUDOpoint,
            'retrieveOpeningHours' => 0
        ];

        $this->toArray()->shouldReturn($expectedArray);
    }
}
