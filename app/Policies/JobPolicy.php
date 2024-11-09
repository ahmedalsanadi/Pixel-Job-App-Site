<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Determine if the user can update the job.
     */
    public function update(User $user, Job $job)
    {
        // Only the job owner (employer) can update the job
        return $user->id === $job->employer->user_id;
    }

    /**
     * Determine if the user can delete the job.
     */
    public function delete(User $user, Job $job)
    {
        // Only the job owner (employer) can delete the job
        return $user->id === $job->employer->user_id;
    }
}
