<?php

declare(strict_types=1);

namespace DPD\Interconnector;

class Authentication
{
    /**
     * test endpoint for Estonia
     */
    public const EE_TEST_ENDPOINT_URL = 'https://ee.integration.dpd.eo.pl/ws-mapper-rest/';

    /**
     * production endpoint for Estonia
     */
    public const EE_PRODUCTION_ENDPOINT_URL = 'https://integration.dpd.ee:8443/ws-mapper-rest/';

    /**
     * test endpoint for Latvia
     */
    public const LV_TEST_ENDPOINT_URL = 'https://lv.integration.dpd.eo.pl/ws-mapper-rest/';

    /**
     * production endpoint for Latvia
     */
    public const LV_PRODUCTION_ENDPOINT_URL = 'https://integration.dpd.lv:8443/ws-mapper-rest/';

    /**
     * test endpoint for Lithuania
     */
    public const LT_TEST_ENDPOINT_URL = 'https://lt.integration.dpd.eo.pl/ws-mapper-rest/';

    /**
     * production endpoint for Lithuania
     */
    public const LT_PRODUCTION_ENDPOINT_URL = 'https://integracijos.dpd.lt/ws-mapper-rest/';

    public function __construct(
        private readonly string $username,
        private readonly string $password,
        private readonly string $country = 'EE'
    ) {
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
        $const = $this->country . '_PRODUCTION_ENDPOINT_URL';

        return constant('self::' . $const);
    }
}
