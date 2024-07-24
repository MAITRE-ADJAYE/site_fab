<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectronicRobotique extends Model
{
    use HasFactory;

    protected $fillable = ['imageCarosel', 'imageCoach', 'nom', 'descriptionCoach', 'texteDuFabLab', 'video'];
}
