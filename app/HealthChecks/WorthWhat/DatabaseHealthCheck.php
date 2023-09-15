<?php

namespace App\HealthChecks\WorthWhat;

use App\HealthChecks\ArchivedHealthCheck;

class DatabaseHealthCheck extends ArchivedHealthCheck
{
    public $name = 'worth-what-database';
    public $domain = "http://app.worthwhat.com/api/ping/database";
}
