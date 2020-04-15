<?php

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;


class ShipmentRequest extends Request implements RequestInterface
{
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
    private $parcelShopId;
    private $name2;

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
        float $codAmount = 0.0,
        ?string $parcelShopId = null,
        string $name2 = null
    ) {
        parent::__construct($auth);

        $this->name = $name;
        $this->name2 = $name2;
        $this->street = $street;
        $this->city = $city;
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->numberOfParcels = $numberOfParcels;
        $this->phone = $phone;
        $this->orderNumber = $orderNumber;
        $this->remark = $remark;
        $this->codAmount = $codAmount;
        $this->parcelShopId = $parcelShopId;
    }

    public function toArray(): array
    {
        $request = array_merge(
            $this->authentication->toArray(),
            [
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
                'remark' => $this->remark
            ]
        );

        $parcelType = 'D-B2C';
        if ($this->parcelShopId) {
            $request['parcelshop_id'] = $this->parcelShopId;
            $parcelType = 'PS';
        }

        if ($this->codAmount) {
            $parcelType .= '-COD';
            $request['cod_amount'] = $this->codAmount;
        }

        $request['parcel_type'] = $parcelType;

        return $request;
    }
}