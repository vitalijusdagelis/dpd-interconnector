<?php

namespace DPD\Interconnector;

class Authentication
{
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
}