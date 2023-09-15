<?php

namespace App\HealthChecks;

use UKFast\HealthCheck\HealthCheck as CoreHealthCheck;

class ArchivedHealthCheck extends CoreHealthCheck
{
    public function status()
    {
        return $this->okay();
    }
}
