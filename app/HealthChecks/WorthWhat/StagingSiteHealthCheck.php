<?php

namespace App\HealthChecks\WorthWhat;

use App\HealthChecks\ArchivedHealthCheck;

class StagingSiteHealthCheck extends ArchivedHealthCheck
{
    public $name = 'worth-what-staging-site';
    public $domain = "http://staging.worthwhat.com";
}
