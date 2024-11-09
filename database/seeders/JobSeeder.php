<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;



class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create job data with one with featured = false and another
        $this->createJobData(false);
        $this->createJobData(true);

                // Another Seeding method ------------
                    // Tag::factory(10)->create();
                    // $tags = Tag::factory(3)->create();
                    // //all single job will consist of all these 3 tags
                    // Job::factory(count:12)->hasAttached($tags)->create(new Sequence([
                    //     'featured' => true,
                    //     'schedule' => 'Full Time'
                    // ], [
                    //     'featured' => false,
                    //     'schedule' => 'Part Time'
                    // ]));

    }

    protected function createJobData(bool $featured): void
    {
        $jobData = [
            [
                'employer' => [
                    'name' => 'Microsoft',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/2048px-Microsoft_logo.svg.png',
                ],
                'job' => [
                    'title' => 'Software Engineer',
                    'description' => 'Join our team to develop innovative software solutions that enhance user experience across all Microsoft platforms. Collaborate with cross-functional teams to define, design, and ship new features.',
                    'salary' => '$120,000 USD',
                    'location' => 'Redmond, Washington',
                    'job_type' => 'Engineering',
                    'schedule' => 'Part Time',
                    'url' => 'https://microsoft.com/careers/software-engineer',
                ],
                'tags' => ['software', 'engineering', 'development']
            ],
            [
                'employer' => [
                    'name' => 'Apple',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg',
                ],
                'job' => [
                    'title' => 'Product Manager',
                    'description' => 'Lead the product vision and strategy for our next-generation hardware products. Work closely with engineering and design teams to bring innovative ideas to life and ensure successful product launches.',
                    'salary' => '$140,000 USD',
                    'location' => 'Cupertino, California',
                    'job_type' => 'Operations',
                    'schedule' => 'Full Time',
                    'url' => 'https://apple.com/careers/product-manager',
                ],
                'tags' => ['product management', 'hardware', 'innovation']
            ],
            [
                'employer' => [
                    'name' => 'IBM',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg',
                ],
                'job' => [
                    'title' => 'Data Scientist',
                    'description' => 'Analyze complex data sets to drive business solutions and insights. Utilize machine learning and statistical analysis to develop predictive models and improve decision-making processes.',
                    'salary' => '$110,000 USD',
                    'location' => 'Armonk, New York',
                    'job_type' => 'Engineering',
                    'schedule' => 'Full Time',
                    'url' => 'https://ibm.com/careers/data-scientist',
                ],
                'tags' => ['data science', 'analytics', 'machine learning']
            ],
            [
                'employer' => [
                    'name' => 'Intel',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/Intel_logo_%282006-2020%29.svg/1280px-Intel_logo_%282006-2020%29.svg.png',
                ],
                'job' => [
                    'title' => 'Hardware Engineer',
                    'description' => 'Design and develop cutting-edge hardware components for next-generation computing devices. Collaborate with software engineers to ensure seamless integration and functionality.',
                    'salary' => '$115,000 USD',
                    'location' => 'Santa Clara, California',
                    'job_type' => 'Engineering',
                    'schedule' => 'Full Time',
                    'url' => 'https://intel.com/careers/hardware-engineer',
                ],
                'tags' => ['hardware', 'engineering', 'design']
            ],
            [
                'employer' => [
                    'name' => 'Netflix',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/7/75/Netflix_icon.svg',
                ],
                'job' => [
                    'title' => 'Marketing Strategist',
                    'description' => 'Develop and execute comprehensive marketing strategies to promote Netflix content globally. Analyze market trends and viewer engagement to optimize marketing campaigns and audience reach.',
                    'salary' => '$130,000 USD',
                    'location' => 'Los Gatos, California',
                    'job_type' => 'Marketing',
                    'schedule' => 'Full Time',
                    'url' => 'https://netflix.com/careers/marketing-strategist',
                ],
                'tags' => ['marketing', 'strategy', 'media']
            ],
            [
                'employer' => [
                    'name' => 'Apple',
                    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg',
                ],
                'job' => [
                    'title' => 'Finance Manager',
                    'description' => 'Financial management and planning for our global operations. Lead our team in ensuring financial stability and sustainability while optimizing our operations for growth and success.',
                    'salary' => '$150,000 USD',
                    'location' => 'Cupertino, California',
                    'job_type' => 'Finance',
                    'schedule' => 'Full Time',
                    'url' => 'https://apple.com/careers/product-manager',
                ],
                'tags' => ['financial management', 'operations', 'innovation']
            ],
        ];

        foreach ($jobData as $data) {
            // Create a user and employer
            $user = User::factory()->create();
            $employer = $user->employer()->create([
                'name' => $data['employer']['name'],
                'logo' => $data['employer']['logo'],
            ]);

            //Create the job associated with the employer and  add the key 'featured' to the job data with a random a passed value
            $job = $employer->jobs()->create(array_merge($data['job'], ['featured' => $featured]));

            // Attach tags to the job
            foreach ($data['tags'] as $tagName) {

                // Use the `tag` method on the Job model that store a tag and attach it with the job
                 $job->tag($tagName);
            }

        }

    }
}
