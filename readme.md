# DPD Interconnector API integration

PHP wrapper for courier DPD Interconnector API integration. 

[![Build Status](https://travis-ci.org/nebijokit/dpd-interconnector.svg?branch=master)](https://travis-ci.org/nebijokit/dpd-interconnector)
[![Maintainability](https://api.codeclimate.com/v1/badges/2422a11cff6021595306/maintainability)](https://codeclimate.com/github/nebijokit/dpd-interconnector/maintainability)
[![Total Downloads](https://img.shields.io/packagist/dt/nebijokit/dpd-interconnector.svg)](https://packagist.org/packages/nebijokit/dpd-interconnector)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nebijokit/dpd-interconnector/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nebijokit/dpd-interconnector/?branch=master)
[![SymfonyInsight](https://insight.symfony.com/projects/019f31b7-8a56-47c5-b2c4-7a1e722471d3/mini.svg)](https://insight.symfony.com/projects/019f31b7-8a56-47c5-b2c4-7a1e722471d3)

Official DPD [documentation](ftp://ftp.dpd.ee/Integratsioon/Interconnector_dokumentatsioon.pdf).

Services which are implemented:
- Create Shipment
- Get Labels
- Close Manifest
- Remove Shipment

# Todo

- add Tracking service
- allow to define which API endpoint to use. Pass GuzzleHttp/Client as a parameter to Client constructor
- use Money value object to represent COD;
- decouple Guzzle/Http from Client & test services;
- use print type, print format & service codes as constants;
- add validation (Symfony/Constraint) for Requests data;
- move _parcel_type_ to Enum;
