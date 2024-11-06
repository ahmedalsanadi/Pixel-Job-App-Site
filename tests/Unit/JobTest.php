<?php
// tests\Unit\JobTest
use App\Models\Employer;
use App\Models\Job;

it('belongs to an employer', function () {
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);

    expect($job->employer->is($employer))->toBeTrue();
});


