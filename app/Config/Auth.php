<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\Auth as ShieldAuth;
use CodeIgniter\Shield\Authentication\Actions\ActionInterface;
use CodeIgniter\Shield\Authentication\AuthenticatorInterface;
use CodeIgniter\Shield\Authentication\Authenticators\AccessTokens;
use CodeIgniter\Shield\Authentication\Authenticators\JWT;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Authentication\Passwords\CompositionValidator;
use CodeIgniter\Shield\Authentication\Passwords\DictionaryValidator;
use CodeIgniter\Shield\Authentication\Passwords\NothingPersonalValidator;
use CodeIgniter\Shield\Authentication\Passwords\PwnedValidator;
use CodeIgniter\Shield\Authentication\Passwords\ValidatorInterface;
use CodeIgniter\Shield\Models\UserModel;

class Auth extends ShieldAuth
{
    public const RECORD_LOGIN_ATTEMPT_NONE    = 0; 
    public const RECORD_LOGIN_ATTEMPT_FAILURE = 1; 
    public const RECORD_LOGIN_ATTEMPT_ALL     = 2;

    public array $views = [
        'login'                       => '\CodeIgniter\Shield\Views\login',
        'register'                    => '\App\Views\Auth\register',
        'layout'                      => '\CodeIgniter\Shield\Views\layout',
        'action_email_2fa'            => '\CodeIgniter\Shield\Views\email_2fa_show',
        'action_email_2fa_verify'     => '\CodeIgniter\Shield\Views\email_2fa_verify',
        'action_email_2fa_email'      => '\CodeIgniter\Shield\Views\Email\email_2fa_email',
        'action_email_activate_show'  => '\CodeIgniter\Shield\Views\email_activate_show',
        'action_email_activate_email' => '\CodeIgniter\Shield\Views\Email\email_activate_email',
        'magic-link-login'            => '\CodeIgniter\Shield\Views\magic_link_form',
        'magic-link-message'          => '\CodeIgniter\Shield\Views\magic_link_message',
        'magic-link-email'            => '\CodeIgniter\Shield\Views\Email\magic_link_email',
    ];

    public ?string $DBGroup = null;

    /**
     * @var array<string, string>
     */
    public array $tables = [
        'users'             => 'users',
        'identities'        => 'auth_identities',
        'logins'            => 'auth_logins',
        'token_logins'      => 'auth_token_logins',
        'remember_tokens'   => 'auth_remember_tokens',
        'groups_users'      => 'auth_groups_users',
        'permissions_users' => 'auth_permissions_users',
    ];

    public array $redirects = [
        'register'    => '/',
        'login'       => '/',
        'logout'      => '/',
        'force_reset' => '/',
    ];

    /**
    
     * @var array<string, class-string<ActionInterface>|null>
     */
    public array $actions = [
        'register' => null,
        'login'    => null,
    ];

    /**
     * @var array<string, class-string<AuthenticatorInterface>>
     */
    public array $authenticators = [
        'tokens'  => AccessTokens::class,
        'session' => Session::class,
    ];

    public array $authenticatorHeader = [
        'tokens' => 'Authorization',
    ];

    public int $unusedTokenLifetime = YEAR;

    public string $defaultAuthenticator = 'session';

    /**
     * @var string[]
     * @phpstan-var list<string>
     */
    public array $authenticationChain = [
        'session',
        'tokens',
    ];

    public bool $allowRegistration = true;

    /**
    
     * @see https://codeigniter4.github.io/shield/install/#protect-all-pages for set filters.
     */
    public bool $recordActiveDate = true;

    public bool $allowMagicLinkLogins = true;

    public int $magicLinkLifetime = HOUR;

    /**
     * @var array<string, bool|int|string>
     */
    public array $sessionConfig = [
        'field'              => 'user',
        'allowRemembering'   => true,
        'rememberCookieName' => 'remember',
        'rememberLength'     => 30 * DAY,
    ];

    public int $minimumPasswordLength = 8;

    /**
   
     * @var class-string<ValidatorInterface>[]
     */
    public array $passwordValidators = [
        CompositionValidator::class,
        NothingPersonalValidator::class,
        DictionaryValidator::class,
    ];

    
    public array $validFields = [
        'email',
    ];

    public array $personalFields = [];

    public int $maxSimilarity = 50;

    public string $hashAlgorithm = PASSWORD_DEFAULT;

    
    public int $hashMemoryCost = 65536; 

    public int $hashTimeCost = 4;
    public int $hashThreads  = 1;  

    
    public int $hashCost = 10;

    /**
     * @deprecated This is only for backward compatibility.
     */
    public bool $supportOldDangerousPassword = false;

    /**
     * @var class-string<UserModel>
     */
    public string $userProvider = UserModel::class;

    public function loginRedirect(): string
    {
        $url = setting('Auth.redirects')['login'];

        return $this->getUrl($url);
    }

    public function logoutRedirect(): string
    {
        $url = setting('Auth.redirects')['logout'];

        return $this->getUrl($url);
    }

    public function registerRedirect(): string
    {
        $url = setting('Auth.redirects')['register'];

        return $this->getUrl($url);
    }

    public function forcePasswordResetRedirect(): string
    {
        $url = setting('Auth.redirects')['force_reset'];

        return $this->getUrl($url);
    }

    /**
     * @param string $url an absolute URL or a named route or just URI path
     */
    protected function getUrl(string $url): string
    {

        $final_url = '';

        switch (true) {
            case strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0: /
                $final_url = $url;
                break;

            case route_to($url) !== false: 
                $final_url = rtrim(url_to($url), '/ ');
                break;

            default: 
                $final_url = rtrim(site_url($url), '/ ');
                break;
        }

        return $final_url;
    }
}
