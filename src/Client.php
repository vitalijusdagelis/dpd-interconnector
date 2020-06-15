<?php

namespace DPD\Interconnector;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;
use DPD\Interconnector\Request\LabelsRequest;
use DPD\Interconnector\Request\ManifestRequest;
use DPD\Interconnector\Request\ShipmentRequest;
use DPD\Interconnector\Request\DeleteShipmentRequest;
use DPD\Interconnector\Request\ParcelShopSearchRequest;

class Client extends GuzzleClient
{
    public function createShipment(ShipmentRequest $request): ResponseInterface
    {
        return $this->request(
            'POST',
            $request->getEndpointUrl() . 'createShipment_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }

    public function getLabels(LabelsRequest $request): ResponseInterface
    {
        return $this->request(
            'POST',
            $request->getEndpointUrl() . 'parcelPrint_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }

    public function getManifest(ManifestRequest $request): ResponseInterface
    {
        return $this->request(
            'POST',
            $request->getEndpointUrl() . 'parcelManifestPrint_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }

    public function removeShipment(DeleteShipmentRequest $request): ResponseInterface
    {
        return $this->request(
            'POST',
            $request->getEndpointUrl() . 'parcelDelete_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }

    public function findParcelShop(ParcelShopSearchRequest $request): ResponseInterface
    {
        return $this->request(
            'POST',
            $request->getEndpointUrl() . 'parcelShopSearch_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }
}
