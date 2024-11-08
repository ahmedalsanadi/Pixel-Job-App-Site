<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    protected $companies = [
        [
            'name' => 'Google',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/2560px-Google_2015_logo.svg.png'
        ],
        [
            'name' => 'Microsoft',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/2048px-Microsoft_logo.svg.png'
        ],
        [
            'name' => 'Apple',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg'
        ],
        [
            'name' => 'Amazon',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/2560px-Amazon_logo.svg.png'
        ],
        [
            'name' => 'Meta',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Meta_Platforms_Inc._logo.svg/2560px-Meta_Platforms_Inc._logo.svg.png'
        ],
        [
            'name' => 'Netflix',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Netflix_2015_logo.svg/2560px-Netflix_2015_logo.svg.png'
        ],
        [
            'name' => 'Tesla',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Tesla_Motors.svg/2560px-Tesla_Motors.svg.png'
        ],
        [
            'name' => 'IBM',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/IBM_logo.svg/2560px-IBM_logo.svg.png'
        ],
        [
            'name' => 'Intel',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/Intel_logo_%282006-2020%29.svg/1280px-Intel_logo_%282006-2020%29.svg.png'
        ],
        [
            'name' => 'Adobe',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Adobe_Corporate_Logo.png/1280px-Adobe_Corporate_Logo.png'
        ]
    ];

    public function definition(): array
    {
        $company = $this->companies[array_rand($this->companies)];

        return [
            'name' => $company['name'],
            'logo' => $company['logo'],
            'user_id' => User::factory(),
        ];
    }
}
