<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory(10)->create();
        $tags = Tag::factory(3)->create();
        //all single job will consist of all these 3 tags
        Job::factory(count:12)->hasAttached($tags)->create(new Sequence([
            'featured' => true,
            'schedule' => 'Full Time'
        ], [
            'featured' => false,
            'schedule' => 'Part Time'
        ]));
    }
}
