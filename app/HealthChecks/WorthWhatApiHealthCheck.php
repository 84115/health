<?php

namespace App\HealthChecks;

use UKFast\HealthCheck\HealthCheck;

class WorthWhatApiHealthCheck extends HealthCheck
{
    public $name = 'worth-what-api';
    public $domain = "http://app.worthwhat.com/api/ping";

    public function status()
    {
        $curlInit = curl_init($this->domain);

        curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlInit, CURLOPT_HEADER, true);
        curl_setopt($curlInit, CURLOPT_NOBODY, true);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curlInit);

        curl_close($curlInit);

        if ($response) {
            return $this->okay();
        } else {
            return $this->problem("Failed to connect to $this->domain");
        }
    }
}
