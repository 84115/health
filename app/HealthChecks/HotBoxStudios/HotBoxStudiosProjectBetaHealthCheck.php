<?php

namespace App\HealthChecks\HotBoxStudios;

use App\HealthChecks\PingHealthCheck;

class HotBoxStudiosProjectBetaHealthCheck extends PingHealthCheck
{
    public $name = 'hotbox-project-beta';
    public $domain = "https://hotbox.james-ball.co.uk";
}
