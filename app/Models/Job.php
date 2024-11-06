<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Employer;


class Job extends Model
{
    use HasFactory;

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
}
