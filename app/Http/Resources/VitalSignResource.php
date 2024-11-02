<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VitalSignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'assessment_id' => $this->assessment_id,
            'temperature' => $this->temperature,
            'heart_rate' => $this->heart_rate,
            'respiratory_rate' => $this->respiratory_rate,
            'weight' => $this->weight,
            'status_condition' => $this->status_condition,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
