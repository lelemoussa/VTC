<?php

namespace App\Models;


use App\Models\voiture;
use App\Models\Passager;
use App\Models\chauffeur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trajet extends Model
{
    use HasFactory;

    protected $fillable =["depart","arrive","client_id"];

    public function client()
    {
       return $this->belongsTo(Client::class);
    }

   
}
