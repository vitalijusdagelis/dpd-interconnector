<?php

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;


class ShipmentRequest implements RequestInterface
{
    private $authentication;
    private $name;
    private $street;
    private $city;
    private $country;
    private $postalCode;
    private $numberOfParcels;
    private $phone;
    private $orderNumber;
    private $remark;
    private $codAmount;

    public function __construct(
        Authentication $auth,
        string $name,
        string $street, 
        string $city,
        string $country,
        string $postalCode,
        int $numberOfParcels,
        string $phone,
        string $orderNumber,
        string $remark,
        float $codAmount = 0.0
    ) {
        $this->authentication = $auth;
        $this->name = $name;
        $this->street = $street;
        $this->city = $city;
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->numberOfParcels = $numberOfParcels;
        $this->phone = $phone;
        $this->orderNumber = $orderNumber;
        $this->remark = $remark;
        $this->codAmount = $codAmount;
    }

    public function toArray(): array
    {
        $request = array_merge(
            $this->authentication->toArray(),
            [
                'name1' => $this->name,
                'street' => $this->street,
                'city' => $this->city,
                'country' => $this->country,
                'pcode' => $this->postalCode,
                'num_of_parcel' => $this->numberOfParcels,
                'phone' => $this->phone,
                'idm_sms_number' => $this->phone,
                'order_number' => $this->orderNumber,
                'remark' => $this->remark
            ]
        );

        if ($this->codAmount) {
            $request['parcel_type'] = 'D-B2C-COD';
            $request['cod_amount'] = $this->codAmount;
        } else {
            $request['parcel_type'] = 'D-B2C';
        }

        return $request;
    }

    public function getCountry(): string
    {
        return $this->authentication->country;
    }
}