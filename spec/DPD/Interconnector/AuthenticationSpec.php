<?php

namespace spec\DPD\Interconnector;

use PhpSpec\ObjectBehavior;
use DPD\Interconnector\Authentication;

class AuthenticationSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('username', 'password');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Authentication::class);
    }

    public function it_should_generate_array()
    {
        $this->toArray()->shouldReturn([
            'username' => 'username',
            'password' => 'password'
        ]);
    }
}