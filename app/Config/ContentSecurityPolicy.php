<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;


class ContentSecurityPolicy extends BaseConfig
{

    public bool $reportOnly = false;


    public ?string $reportURI = null;


    public bool $upgradeInsecureRequests = false;

    /**
     * @var string|string[]|null
     */
    public $defaultSrc;

    /**
     * @var string|string[]
     */
    public $scriptSrc = 'self';

    /**
     * @var string|string[]
     */
    public $styleSrc = 'self';

    /**
     * @var string|string[]
     */
    public $imageSrc = 'self';

    /**
     * @var string|string[]|null
     */
    public $baseURI;

    /**
     * @var string|string[]
     */
    public $childSrc = 'self';

    /**
     * @var string|string[]
     */
    public $connectSrc = 'self';

    /**
     * @var string|string[]
     */
    public $fontSrc;

    /**
     * @var string|string[]
     */
    public $formAction = 'self';

    /**
     * @var string|string[]|null
     */
    public $frameAncestors;

    /**
     * @var array|string|null
     */
    public $frameSrc;

    /**
     * @var string|string[]|null
     */
    public $mediaSrc;

    /**
     * @var string|string[]
     */
    public $objectSrc = 'self';

    /**
     * @var string|string[]|null
     */
    public $manifestSrc;

    /**
     * @var string|string[]|null
     */
    public $pluginTypes;

    /**
     * @var string|string[]|null
     */
    public $sandbox;

    public string $styleNonceTag = '{csp-style-nonce}';

    public string $scriptNonceTag = '{csp-script-nonce}';

    public bool $autoNonce = true;
}
