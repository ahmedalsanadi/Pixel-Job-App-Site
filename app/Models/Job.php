<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
