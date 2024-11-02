<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RadiologyResource extends JsonResource
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
            'ultrasound_image' => $this->ultrasound_image,
            'gestational_age' => $this->gestational_age,
            'est_birth' => $this->est_birth,
            'pregnancy_status' => $this->pregnancy_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
