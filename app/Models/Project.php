<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'title', 'slug', 'description', 'start_date', 'end_date', 'status', 'image_path'
    ];

    /**
     * Get categories for a project
     *
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_project', 'project_id','category_id');
    }

    /**
     * Get teams for a project
     *
     * @return BelongsToMany
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_project', 'project_id','team_id');
    }
}
