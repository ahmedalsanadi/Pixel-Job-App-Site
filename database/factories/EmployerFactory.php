<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    protected $companies = [

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
            'logo' => 'https://i.pinimg.com/736x/47/b7/bd/47b7bdac4285ee24654ca7d68cf06351.jpg'
        ],
        [
            'name' => 'Netflix',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/7/75/Netflix_icon.svg'
        ],
        [
            'name' => 'IBM',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg'
        ],
        [
            'name' => 'Intel',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/Intel_logo_%282006-2020%29.svg/1280px-Intel_logo_%282006-2020%29.svg.png'
        ],
    ];

    protected static $index = 0;

    public function definition(): array
    {
        $company = $this->companies[self::$index];

        // Increment index for the next call and wrap around if needed
        self::$index = (self::$index + 1) % count($this->companies);

        return [
            'name' => $company['name'],
            'logo' => $company['logo'],
            'user_id' => User::factory(),
        ];
    }
}
