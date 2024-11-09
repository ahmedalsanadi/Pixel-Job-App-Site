<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        // 1- clear all images in the public/logos directory before seeding

            $logoDirectory = public_path('storage/logos');

            if (File::exists($logoDirectory)) {

                File::cleanDirectory($logoDirectory);

                $this->command->info('All logos have been deleted from public/logos.');

            } else {

                $this->command->info('The public/logos directory does not exist.');
            }

        // 2- call JobSeeder

             $this->call(JobSeeder::class);

    }
}
