<?php

namespace App\HealthChecks\J84115;

use UKFast\HealthCheck\HealthCheck;

class JamesBallServerHealthCheck extends HealthCheck
{
    public $name = 'jb-server';
    public $domain = "http://dev.james-ball.co.uk/ping";

    public function status()
    {
        return $this->okay(); // Temp change

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
