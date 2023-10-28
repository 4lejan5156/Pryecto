<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
   
    public string $defaultGroup = 'user';

    /**
     * @var array<string, array<string, string>>
     */
    public array $groups = [
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'user' => [
            'title'       => 'User',
            'description' => 'General users of the site. Often customers.',
        ],
    ];

    public array $permissions = [
        "articles.edit"   => "Can edit any article",
        "articles.delete" => "Can delete any article"
    ];
    
    public array $matrix = [
        "admin" => [
            "articles.*"
        ]
    ];
}
