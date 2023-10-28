<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Security extends BaseConfig
{
    /**
     * @var string 'cookie' or 'session'
     */
    public string $csrfProtection = 'session';

    public bool $tokenRandomize = false;

    public string $tokenName = 'csrf_test_name';

    public string $headerName = 'X-CSRF-TOKEN';

    public string $cookieName = 'csrf_cookie_name';

    public int $expires = 7200;

    public bool $regenerate = true;

    public bool $redirect = false;

    /**
     * @deprecated `Config\Cookie` $samesite property is used.
     */
    public string $samesite = 'Lax';
}
