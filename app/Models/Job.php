<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Employer;
use App\Models\Tag;


class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        'description',
        "salary",
        'job_type',
        "location",
        "schedule",
        "featured",
        "url",
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tag(string $name):void
    {
        $tag = Tag::firstOrCreate(['name' => $name]);
        $this->tags()->attach($tag);

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
