<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SprintTaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'difficulty' => $this->difficulty,
            'duration' => $this->duration,
            'estimated_completion_date' => $this->humanized_estimated_completion_date,
            'provider_name' => $this->provider,
            'developer_name' => $this->whenLoaded('developer', fn () => $this->developer->name),
            'sprint_name' => $this->whenLoaded('sprint', fn () => 'Sprint ' . $this->sprint->id),
        ];
    }
}
