<?php

declare(strict_types=1);

namespace DPD\Interconnector\Request;

use DPD\Interconnector\Authentication;

class ShipmentRequest extends Request implements RequestInterface
{
    public function __construct(
        Authentication $auth,
        private readonly string $name,
        private readonly string $street,
        private readonly string $city,
        private readonly string $country,
        private readonly string $postalCode,
        private readonly int $numberOfParcels,
        private readonly string $phone,
        private readonly string $orderNumber,
        private readonly string $remark,
        private readonly float $codAmount = 0.0,
        private readonly ?string $parcelShopId = null,
        private readonly ?string $name2 = null
    ) {
        parent::__construct($auth);
    }

    #[\Override]
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

        if ($this->codAmount !== 0.0) {
            $parcelType .= '-COD';
            $request['cod_amount'] = $this->codAmount;
        }

        $request['parcel_type'] = $parcelType;

        return $request;
    }
}
