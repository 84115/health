<?php

namespace App\HealthChecks\SoftFocus;

use App\HealthChecks\ArchivedHealthCheck;

class VirtuallySoldHealthCheck extends ArchivedHealthCheck
{
    public $name = 'virtually-sold-production';
    public $domain = "https://app.virtuallysold.io/api/ping";
}
