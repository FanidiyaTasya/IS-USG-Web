<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheep extends Model {
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $fillable = [
        'sheep_name',
        'sheep_birth',
        'sheep_type',
    ];

    public function initial_assessments() {
        return $this->hasMany(InitialAssessment::class);
    }
}
