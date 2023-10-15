<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    protected $table = "teams";

    protected $fillable = [
        'title', 'slug', 'description',
    ];

    /**
     * Return projects under a team
     *
     * @return BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_team', 'team_id', 'project_id');
    }

}
