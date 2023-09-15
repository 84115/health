<?php

namespace App\HealthChecks\SoftFocus;

use App\HealthChecks\ArchivedHealthCheck;

class VirtuallySoldDevHealthCheck extends ArchivedHealthCheck
{
    public $name = 'virtually-sold-dev';
    public $domain = "http://connells.james-ball.co.uk/api/ping";
}
