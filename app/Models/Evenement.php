<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Evenement extends Model
{
    protected $fillable = ['titre', 'description', 'date', 'image']; // Champs remplissables

    // Validation pour l'image (exemple)
    public static function rules()
    {
        return [
            'titre' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
