<?php

declare(strict_types=1);

namespace spec\DPD\Interconnector\Request;

use PhpSpec\ObjectBehavior;
use DPD\Interconnector\Request\ManifestRequest;
use DPD\Interconnector\Authentication;

class ManifestRequestSpec extends ObjectBehavior
{
    public function let(Authentication $authentication, \DateTime $date): void
    {
        $this->beConstructedWith($authentication, $date);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ManifestRequest::class);
    }

    public function it_should_generate_array(Authentication $authentication): void
    {
        $date = new \DateTime();
        $authentication->toArray()->willReturn(['username' => 'username', 'password' => 'password']);

        $this->beConstructedWith($authentication, $date);

        $this->toArray()->shouldReturn([
            'username' => 'username',
            'password' => 'password',
            'date' => $date->format("Y-m-d")
        ]);
    }

    public function it_should_return_correct_endpoint_url(Authentication $auth): void
    {
        $this->beConstructedWith($auth, new \DateTime());
        $auth->getEndpointUrl()->willReturn(Authentication::LT_PRODUCTION_ENDPOINT_URL);
        $this->getEndpointUrl()->shouldReturn(Authentication::LT_PRODUCTION_ENDPOINT_URL);
    }
}

