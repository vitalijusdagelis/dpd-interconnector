<?php

namespace DPD\Interconnector;

class Authentication
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

    public function __construct(string $username, string $password, string $country = 'EE')
    {
        $this->username = $username;
        $this->password = $password;
        $this->country = $country;
    }

    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'password' => $this->password
        ];
    }

    public function getEndpointUrl(): string
    {
        switch ($this->country) {
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