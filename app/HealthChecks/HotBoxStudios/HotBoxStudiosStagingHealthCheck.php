<?php

namespace App\HealthChecks\HotBoxStudios;

use UKFast\HealthCheck\HealthCheck;

class HotBoxStudiosStagingHealthCheck extends HealthCheck
{
    public $name = 'hotbox-staging';
    public $domain = "https://hotbox.james-ball.co.uk";

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
