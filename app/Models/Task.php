<?php

namespace App\Models;

use App\Enum\TaskProviders;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'developer_id',
        'sprint_id',
        'name',
        'difficulty',
        'duration',
        'estimated_completion_date',
    ];

    protected $casts = [
        'estimated_completion_date' => 'datetime',
        'difficulty' => 'integer',
        'duration' => 'integer',
        'provider' => TaskProviders::class,
    ];

    protected $appends = [
        'humanized_estimated_completion_date',
    ];

    public function developer(): BelongsTo
    {
        return $this->belongsTo(Developer::class);
    }

    public function sprint(): BelongsTo
    {
        return $this->belongsTo(Sprint::class);
    }

    public function getHumanizedEstimatedCompletionDateAttribute()
    {
        return Carbon::make($this->estimated_completion_date)->format('Y-m-d H:i');
    }
}
