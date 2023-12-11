<?php

declare(strict_types=1);

return [

    'health-checks' => [
        \Wnx\LaravelBackupRestore\HealthChecks\Checks\DatabaseHasTables::class,
        \App\HealthChecks\MyCustomHealthCheck::class,

    ],
];
