<?php

namespace spec\DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;
use PhpSpec\ObjectBehavior;

class ParcelShopSearchRequestSpec extends ObjectBehavior
{
    private $username = 'username';
    private $password = 'password';

    public function let()
    {
        $auth = new Authentication($this->username, $this->password);
        $this->beConstructedWith($auth);
    }

    public function it_should_transform_to_array()
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