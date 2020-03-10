<?php

namespace DPD\Interconnector;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;
use DPD\Interconnector\Request\LabelsRequest;
use DPD\Interconnector\Request\ManifestRequest;
use DPD\Interconnector\Request\ShipmentRequest;

class Client extends GuzzleClient
{
    /**
     * test endpoint for Estonia
     */
    const EE_TEST_ENDPOINT_URL = 'https://ee.integration.dpd.eo.pl/ws-mapper-rest/';

    /**
     * production endpoint for Estonia
     */
    const EE_PRODUCTION_ENDPOINT_URL = 'https://integration.dpd.ee:8443/ws-mapper-rest/';

    /**
     * test endpoint for Latvia
     */
    const LV_TEST_ENDPOINT_URL = 'https://lv.integration.dpd.eo.pl/ws-mapper-rest/';

    /**
     * production endpoint for Latvia
     */
    const LV_PRODUCTION_ENDPOINT_URL = 'https://integration.dpd.lv:8443/ws-mapper-rest/';

    /**
     * test endpoint for Lithuania
     */
    const LT_TEST_ENDPOINT_URL = 'https://lt.integration.dpd.eo.pl/ws-mapper-rest/';

    /**
     * production endpoint for Lithuania
     */
    const LT_PRODUCTION_ENDPOINT_URL = 'https://integracijos.dpd.lt/ws-mapper-rest/';

    public function createShipment(ShipmentRequest $shipment): ResponseInterface
    {
        return $this->request(
            'POST',
            $this->getEndpointUrl($shipment->getCountry()) . '/createShipment_',
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
            $this->getEndpointUrl($request->getCountry()) . '/parcelPrint_',
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
            $this->getEndpointUrl($request->getCountry()) . '/parcelManifestPrint_',
            [
                'form_params' => $request->toArray(),
                'verify' => false
            ]
        );
    }

    private function getEndpointUrl(string $country)
    {
        switch ($country) {
            case 'LT':
                return self::LT_PRODUCTION_ENDPOINT_URL;
            case 'LV':
                return self::LV_PRODUCTION_ENDPOINT_URL;
            case 'EE':
            default:
                return self::EE_PRODUCTION_ENDPOINT_URL;
        }
    }
}