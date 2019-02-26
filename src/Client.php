<?php

namespace DPD\Interconnector;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;
use DPD\Interconnector\Request\LabelsRequest;
use DPD\Interconnector\Request\ShipmentRequest;

class Client extends GuzzleClient
{
    const ENDPOINT_URL = 'https://ee.integration.dpd.eo.pl/';

    public function createShipment(ShipmentRequest $shipment): ResponseInterface
    {
        return $this->request(
            'POST',
            self::ENDPOINT_URL . '/ws-mapper-rest/createShipment_',
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
            self::ENDPOINT_URL . '/ws-mapper-rest/parcelPrint_',
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
            self::ENDPOINT_URL . '/ws-mapper-rest/parcelManifestPrint_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }
}