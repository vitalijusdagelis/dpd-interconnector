<?php

declare(strict_types=1);

namespace DPD\Interconnector;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use DPD\Interconnector\Request\LabelsRequest;
use DPD\Interconnector\Request\ManifestRequest;
use DPD\Interconnector\Request\ShipmentRequest;
use DPD\Interconnector\Request\DeleteShipmentRequest;
use DPD\Interconnector\Request\ParcelShopSearchRequest;

readonly class Client
{
    public function __construct(private GuzzleClient $client)
    {
    }

    /**
     * @throws GuzzleException
     */
    public function createShipment(ShipmentRequest $request): ResponseInterface
    {
        return $this->client->request(
            'POST',
            $request->getEndpointUrl() . 'createShipment_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }

    /**
     * @throws GuzzleException
     */
    public function getLabels(LabelsRequest $request): ResponseInterface
    {
        return $this->client->request(
            'POST',
            $request->getEndpointUrl() . 'parcelPrint_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }

    /**
     * @throws GuzzleException
     */
    public function getManifest(ManifestRequest $request): ResponseInterface
    {
        return $this->client->request(
            'POST',
            $request->getEndpointUrl() . 'parcelManifestPrint_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }

    /**
     * @throws GuzzleException
     */
    public function removeShipment(DeleteShipmentRequest $request): ResponseInterface
    {
        return $this->client->request(
            'POST',
            $request->getEndpointUrl() . 'parcelDelete_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }

    /**
     * @throws GuzzleException
     */
    public function findParcelShop(ParcelShopSearchRequest $request): ResponseInterface
    {
        return $this->client->request(
            'POST',
            $request->getEndpointUrl() . 'parcelShopSearch_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }
}
