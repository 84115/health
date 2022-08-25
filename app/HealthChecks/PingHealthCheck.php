<?php

namespace App\HealthChecks;

use UKFast\HealthCheck\HealthCheck as CoreHealthCheck;

class PingHealthCheck extends CoreHealthCheck
{
    public $name = '';
    public $domain = '';

    public function status()
    {
        $curlInit = curl_init($this->domain);

        curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlInit, CURLOPT_HEADER, true);
        curl_setopt($curlInit, CURLOPT_NOBODY, true);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curlInit);

        curl_close($curlInit);

        $info = curl_getinfo($curlInit);

        if ($info['http_code'] === 200) {
            return $this->okay();
        } else {
            return $this->problem("Failed to connect to $this->domain");
        }
    }
}
