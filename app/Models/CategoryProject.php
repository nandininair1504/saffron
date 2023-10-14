<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryProject extends Pivot
{
    use HasFactory;

    protected $table = 'category_project';

    protected $fillable = [
      'category_id', 'project_id',
    ];
}
