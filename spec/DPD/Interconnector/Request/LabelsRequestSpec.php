<?php

declare(strict_types=1);

namespace spec\DPD\Interconnector\Request;

use PhpSpec\ObjectBehavior;
use DPD\Interconnector\Request\LabelsRequest;
use DPD\Interconnector\Authentication;

class LabelsRequestSpec extends ObjectBehavior
{
    public function let(Authentication $auth): void
    {
        $this->beConstructedWith($auth, [], 'pdf', 'A6');
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(LabelsRequest::class);
    }

    public function it_should_convert_to_array(Authentication $auth): void
    {
        $auth->toArray()->willReturn(['username' => 'username', 'password' => 'password']);
        $trackingNumbers = ['05607100582823', '05607100582824'];
        $printType = 'pdf';
        $printFormat = 'A6';

        $this->beConstructedWith($auth, $trackingNumbers, $printType, $printFormat);

        $expectedArray = [
            'username' => 'username',
            'password' => 'password',
            'parcels' => implode('|', $trackingNumbers),
            'printType' => $printType,
            'printFormat' => $printFormat
        ];

        $this->toArray()->shouldReturn($expectedArray);
    }

    public function it_should_return_correct_endpoint_url(Authentication $auth): void
    {
        $auth->getEndpointUrl()->willReturn(Authentication::LT_PRODUCTION_ENDPOINT_URL);
        $this->getEndpointUrl()->shouldReturn(Authentication::LT_PRODUCTION_ENDPOINT_URL);
    }
}
