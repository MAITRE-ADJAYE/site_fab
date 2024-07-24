<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenceDigital extends Model
{
    use HasFactory;

    protected $fillable = ['imageCaroussel', 'imageCoach', 'nom', 'descriptionCoach', 'texteDuFabLab', 'video'];
}
