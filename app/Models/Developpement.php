<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developpement extends Model
{
    use HasFactory;

    protected $fillable = ['imageCarousel', 'imageCoach', 'nom', 'descriptionCoach', 'texteDuFabLab', 'video'];
}
