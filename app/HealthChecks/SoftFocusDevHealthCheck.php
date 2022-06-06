<?php

namespace App\HealthChecks;

use UKFast\HealthCheck\HealthCheck;

class SoftFocusDevHealthCheck extends HealthCheck
{
    protected $name = 'soft-focus-dev';

    public function status()
    {
        $domain = "http://connells.james-ball.co.uk/api/developments/1";
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
