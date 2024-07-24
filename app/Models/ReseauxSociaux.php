<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReseauxSociaux extends Model
{
    use HasFactory;

    protected $fillable = ['whatsapp', 'facebook', 'linkedin', 'youtube'];
}
