<?php

declare(strict_types=1);

namespace spec\DPD\Interconnector;

use PhpSpec\ObjectBehavior;
use DPD\Interconnector\Client;

class ClientSpec extends ObjectBehavior
{
    public function let(\GuzzleHttp\Client $client): void
    {
        $this->beConstructedWith($client);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Client::class);
    }
}
