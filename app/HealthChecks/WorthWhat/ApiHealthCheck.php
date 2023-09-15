<?php

namespace App\HealthChecks\WorthWhat;

use App\HealthChecks\ArchivedHealthCheck;

class ApiHealthCheck extends ArchivedHealthCheck
{
    public $name = 'worth-what-api';
    public $domain = "http://app.worthwhat.com/api/ping";
}
