<?php

namespace App\HealthChecks;

use UKFast\HealthCheck\HealthCheck;

class JamesBallCoUkHealthCheck extends HealthCheck
{
    protected $name = 'nitrous-networks';

    public function status()
    {
        $domain = "https://james-ball.co.uk";
        $curlInit = curl_init($domain);

        curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlInit, CURLOPT_HEADER, true);
        curl_setopt($curlInit, CURLOPT_NOBODY, true);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curlInit);

        curl_close($curlInit);

        if ($response) {
            return $this->okay();
        } else {
            return $this->problem("Failed to connect to $domain");
        }
    }
}
