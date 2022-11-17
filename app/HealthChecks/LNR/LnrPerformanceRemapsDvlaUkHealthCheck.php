<?php

namespace App\HealthChecks\LNR;

use UKFast\HealthCheck\HealthCheck;

class LnrPerformanceRemapsDvlaUkHealthCheck extends HealthCheck
{
    public $name = "lnr-performance-remaps-dvla-uk";
    public $domain = "https://lnrperformanceremaps.co.uk/dvla/ping";

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
