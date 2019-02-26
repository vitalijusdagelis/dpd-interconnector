# DPD Interconnector API integration

PHP wrapper for courier DPD Interconnector API integration.

Documentation can be found [here](ftp://ftp.dpd.ee/Integratsioon/Interconnector_dokumentatsioon.pdf).

Services which are implemented:
- Create Shipment
- Get Labels
- Close Manifest

# Todo

- add Tracking service
- use Money value object to represent COD;
- decouple Guzzle/Http from Client & test services;
- move request data to separate objects (Shipment, Label, Manifest)
- use print type, print format & service codes as constants;
- add validation (Symfony/Constraint) for Requests data;
