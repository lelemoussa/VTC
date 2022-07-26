<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voiture extends Model
{
    use HasFactory;
    protected $fillable =['marque','immatriculation','place','description','modele','annee','couleur'];
}
           