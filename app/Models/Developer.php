<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Developer extends Model
{
    protected $fillable = [
        'name',
        'difficulty_handling',
        'weekly_working_hours',
    ];

    protected $casts = [
        'difficulty_handling' => 'integer',
        'weekly_working_hours' => 'integer'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function currentWorkLoadHour(int $sprintId): int
    {
        return $this->tasks()
        ->where('sprint_id', $sprintId)
        ->sum('duration');
    }
}
