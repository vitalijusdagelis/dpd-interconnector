<?php

namespace DPD\Interconnector;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;
use DPD\Interconnector\Request\LabelsRequest;
use DPD\Interconnector\Request\ManifestRequest;
use DPD\Interconnector\Request\ShipmentRequest;

class Client extends GuzzleClient
{
    public function createShipment(ShipmentRequest $shipment): ResponseInterface
    {
        return $this->request(
            'POST',
            $shipment->getEndpointUrl() . '/createShipment_',
            [
                'form_params' => $shipment->toArray(),
                'verify' => false
            ]
        );
    }

    public function getLabels(LabelsRequest $request): ResponseInterface
    {
        return $this->request(
            'POST',
            $request->getEndpointUrl() . '/parcelPrint_',
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
            $request->getEndpointUrl() . '/parcelManifestPrint_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }
}