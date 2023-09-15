<?php

namespace App\HealthChecks;

use Illuminate\Support\Facades\Http;
use UKFast\HealthCheck\HealthCheck as CoreHealthCheck;

class PingHealthCheck extends CoreHealthCheck
{
    public $name = '';
    public $domain = '';

    public function status()
    {
        $response = Http::get($this->domain);

        if ($response->successful()) {
            return $this->okay();
        } else {
            return $this->problem("Failed to connect to $this->domain");
        }
    }
}
