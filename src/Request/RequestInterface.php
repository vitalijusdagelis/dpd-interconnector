<?php

namespace DPD\Interconnector\Request;

interface RequestInterface
{
    public function toArray(): array;
    public function getCountry(): string;
}