<?php

namespace App\HealthChecks\SoftFocus;

use App\HealthChecks\ArchivedHealthCheck;

class VirtuallySoldStagingHealthCheck extends ArchivedHealthCheck
{
    public $name = 'virtually-sold-staging';
    public $domain = "https://staging.virtuallysold.io/api/ping";
}
