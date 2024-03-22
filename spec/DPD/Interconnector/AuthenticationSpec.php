<?php

declare(strict_types=1);

namespace spec\DPD\Interconnector;

use PhpSpec\ObjectBehavior;
use DPD\Interconnector\Authentication;

class AuthenticationSpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedWith('username', 'password');
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Authentication::class);
    }

    public function it_should_generate_array(): void
    {
        $this->toArray()->shouldReturn([
            'username' => 'username',
            'password' => 'password'
        ]);
    }

    public function it_should_return_default_endpoint_url(): void
    {
        $this->getEndpointUrl()->shouldReturn(Authentication::EE_PRODUCTION_ENDPOINT_URL);
    }

    public function it_should_return_correct_lt_endpoint_url(): void
    {
        $this->beConstructedWith('username', 'password', 'LT');

        $this->getEndpointUrl()->shouldReturn(Authentication::LT_PRODUCTION_ENDPOINT_URL);
    }

    public function it_should_return_correct_lv_endpoint_url(): void
    {
        $this->beConstructedWith('username', 'password', 'LV');

        $this->getEndpointUrl()->shouldReturn(Authentication::LV_PRODUCTION_ENDPOINT_URL);
    }

    public function it_should_return_correct_ee_endpoint_url(): void
    {
        $this->beConstructedWith('username', 'password', 'EE');

        $this->getEndpointUrl()->shouldReturn(Authentication::EE_PRODUCTION_ENDPOINT_URL);
    }
}
