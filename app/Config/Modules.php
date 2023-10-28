<?php

namespace Config;

use CodeIgniter\Modules\Modules as BaseModules;

class Modules extends BaseModules
{
    /**
     * @var bool
     */
    public $enabled = true;

    /**
     * @var bool
     */
    public $discoverInComposer = true;

    /**
     * @var array
     */
    public $composerPackages = [];

    /**
     * @var string[]
     */
    public $aliases = [
        'events',
        'filters',
        'registrars',
        'routes',
        'services',
    ];
}
