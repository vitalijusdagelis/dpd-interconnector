<?php

namespace spec\DPD\Interconnector\Request;

use PhpSpec\ObjectBehavior;
use DPD\Interconnector\Request\ShipmentRequest;
use DPD\Interconnector\Authentication;


class ShipmentRequestSpec extends ObjectBehavior
{
    private $name = 'name';
    private $street = 'street';
    private $city = 'city';
    private $country = 'country';
    private $postalCode = '00000';
    private $numberOfParcels = 1;
    private $phone = '+37067000000';
    private $orderNumber = 'ORD12345';
    private $remark = 'remark';
    private $codAmount = 79.0;

    public function let(Authentication $auth)
    {
        $auth->toArray()->willReturn(['username' => 'username', 'password' => 'password']);

        $this->beConstructedWith($auth, $this->name, $this->street, $this->city, $this->country, $this->postalCode, $this->numberOfParcels, $this->phone, $this->orderNumber, $this->remark, $this->codAmount);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ShipmentRequest::class);
    }

    public function it_should_convert_to_array_with_cod()
    {
        $expectedArray = [
            'username' => 'username',
            'password' => 'password',
            'name1' => $this->name,
            'street' => $this->street,
            'city' => $this->city,
            'country' => $this->country,
            'pcode' => $this->postalCode,
            'num_of_parcel' => $this->numberOfParcels,
            'phone' => $this->phone,
            'idm_sms_number' => $this->phone,
            'order_number' => $this->orderNumber,
            'remark' => $this->remark,
            'parcel_type' => 'D-B2C-COD',
            'cod_amount' => $this->codAmount
        ];

        $this->toArray()->shouldReturn($expectedArray);
    }

    public function it_should_convert_to_array_without_cod(Authentication $auth)
    {
        $auth->toArray()->willReturn(['username' => 'username', 'password' => 'password']);

        $this->beConstructedWith($auth, $this->name, $this->street, $this->city, $this->country, $this->postalCode, $this->numberOfParcels, $this->phone, $this->orderNumber, $this->remark);

        $expectedArray = [
            'username' => 'username',
            'password' => 'password',
            'name1' => $this->name,
            'street' => $this->street,
            'city' => $this->city,
            'country' => $this->country,
            'pcode' => $this->postalCode,
            'num_of_parcel' => $this->numberOfParcels,
            'phone' => $this->phone,
            'idm_sms_number' => $this->phone,
            'order_number' => $this->orderNumber,
            'remark' => $this->remark,
            'parcel_type' => 'D-B2C'
        ];

        $this->toArray()->shouldReturn($expectedArray);   
    }
}