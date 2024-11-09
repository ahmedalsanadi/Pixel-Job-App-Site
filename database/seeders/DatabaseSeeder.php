<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Clear all files in the public/logos directory
        $logoDirectory = public_path('storage/logos');

        if (File::exists($logoDirectory)) {
            File::cleanDirectory($logoDirectory);
            $this->command->info('All logos have been deleted from public/logos.');
        } else {
            $this->command->info('The public/logos directory does not exist.');
        }

        $this->call(JobSeeder::class);


        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }




}
