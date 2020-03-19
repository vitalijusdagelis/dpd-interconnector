<?php

namespace spec\DPD\Interconnector\Request;

use PhpSpec\ObjectBehavior;
use DPD\Interconnector\Request\DeleteShipmentRequest;
use DPD\Interconnector\Authentication;

class DeleteShipmentRequestSpec extends ObjectBehavior
{
    public function let(Authentication $auth)
    {
        $this->beConstructedWith($auth, []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DeleteShipmentRequest::class);
    }

    public function it_should_convert_to_array(Authentication $authentication)
    {
        $authentication->toArray()->willReturn(['username' => 'username', 'password' => 'password']);
        $trackingNumbers = ['05607100582823', '05607100582824'];

        $this->beConstructedWith($authentication, $trackingNumbers);

        $this->toArray()->shouldReturn([
            'username' => 'username',
            'password' => 'password',
            'parcels' => implode('|', $trackingNumbers)
        ]);
    }

    public function it_should_return_correct_endpoint_url(Authentication $auth)
    {
        $auth->getEndpointUrl()->willReturn(Authentication::LT_PRODUCTION_ENDPOINT_URL);
        $this->getEndpointUrl()->shouldReturn(Authentication::LT_PRODUCTION_ENDPOINT_URL);
    }
}
