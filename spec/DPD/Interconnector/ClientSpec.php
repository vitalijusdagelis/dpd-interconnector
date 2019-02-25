<?php

namespace spec\DPD\Interconnector;

use PhpSpec\ObjectBehavior;
use DPD\Interconnector\Client;
use DPD\Interconnector\Request\ManifestRequest;

class ClientSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Client::class);
    }
}