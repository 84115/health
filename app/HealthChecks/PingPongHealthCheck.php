<?php

namespace App\HealthChecks;

use Illuminate\Support\Str;
use UKFast\HealthCheck\HealthCheck as CoreHealthCheck;

class PingPongHealthCheck extends CoreHealthCheck
{
    public $name = '';
    public $domain = '';

    public function status()
    {
        $ch = curl_init($this->domain);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);

        $response = curl_exec($ch);

        curl_close($ch);

        $info = curl_getinfo($ch);

        if ($info['http_code'] === 200 && Str::contains($response, 'pong')) {
            return $this->okay();
        } else {
            return $this->problem("Failed to connect to $this->domain");
        }
    }
}
