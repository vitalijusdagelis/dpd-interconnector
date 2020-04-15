<?php

namespace spec\DPD\Interconnector\Request;

use PhpSpec\ObjectBehavior;
use DPD\Interconnector\Request\ShipmentRequest;
use DPD\Interconnector\Authentication;


class ShipmentRequestSpec extends ObjectBehavior
{
    private $name = 'name';
    private $name2 = 'name2';
    private $street = 'street';
    private $city = 'city';
    private $country = 'country';
    private $postalCode = '00000';
    private $numberOfParcels = 1;
    private $phone = '+37067000000';
    private $orderNumber = 'ORD12345';
    private $remark = 'remark';
    private $codAmount = 79.0;
    private $parcelShopId = 'EE91011';

    public function let(Authentication $auth)
    {
        $auth->toArray()->willReturn(['username' => 'username', 'password' => 'password']);

        $this->beConstructedWith($auth, $this->name, $this->street, $this->city, $this->country, $this->postalCode, $this->numberOfParcels, $this->phone, $this->orderNumber, $this->remark, $this->codAmount, null, $this->name2);
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
            'name2' => $this->name2,
            'street' => $this->street,
            'city' => $this->city,
            'country' => $this->country,
            'pcode' => $this->postalCode,
            'num_of_parcel' => $this->numberOfParcels,
            'phone' => $this->phone,
            'idm_sms_number' => $this->phone,
            'order_number' => $this->orderNumber,
            'remark' => $this->remark,
            'cod_amount' => $this->codAmount,
            'parcel_type' => 'D-B2C-COD'
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
            'name2' => null,
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

    public function it_should_return_correct_endpoint_url(Authentication $auth)
    {
        $auth->getEndpointUrl()->willReturn(Authentication::LT_PRODUCTION_ENDPOINT_URL);
        $this->getEndpointUrl()->shouldReturn(Authentication::LT_PRODUCTION_ENDPOINT_URL);
    }

    public function it_should_convert_to_array_for_parcel_shop(Authentication $auth)
    {
        $auth->toArray()->willReturn(['username' => 'username', 'password' => 'password']);

        $this->beConstructedWith($auth, $this->name, $this->street, $this->city, $this->country, $this->postalCode, $this->numberOfParcels, $this->phone, $this->orderNumber, $this->remark, 0.0, $this->parcelShopId);

        $expectedArray = [
            'username' => 'username',
            'password' => 'password',
            'name1' => $this->name,
            'name2' => null,
            'street' => $this->street,
            'city' => $this->city,
            'country' => $this->country,
            'pcode' => $this->postalCode,
            'num_of_parcel' => $this->numberOfParcels,
            'phone' => $this->phone,
            'idm_sms_number' => $this->phone,
            'order_number' => $this->orderNumber,
            'remark' => $this->remark,
            'parcelshop_id' => $this->parcelShopId,
            'parcel_type' => 'PS'
        ];

        $this->toArray()->shouldReturn($expectedArray);
    }

    public function it_should_convert_to_array_for_parcel_shop_with_cod(Authentication $auth)
    {
        $auth->toArray()->willReturn(['username' => 'username', 'password' => 'password']);

        $this->beConstructedWith($auth, $this->name, $this->street, $this->city, $this->country, $this->postalCode, $this->numberOfParcels, $this->phone, $this->orderNumber, $this->remark, $this->codAmount, $this->parcelShopId);

        $expectedArray = [
            'username' => 'username',
            'password' => 'password',
            'name1' => $this->name,
            'name2' => null,
            'street' => $this->street,
            'city' => $this->city,
            'country' => $this->country,
            'pcode' => $this->postalCode,
            'num_of_parcel' => $this->numberOfParcels,
            'phone' => $this->phone,
            'idm_sms_number' => $this->phone,
            'order_number' => $this->orderNumber,
            'remark' => $this->remark,
            'parcelshop_id' => $this->parcelShopId,
            'cod_amount' => $this->codAmount,
            'parcel_type' => 'PS-COD'
        ];

        $this->toArray()->shouldReturn($expectedArray);
    }
}