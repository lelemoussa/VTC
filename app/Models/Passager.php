<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Passager extends Model
{
    use HasFactory;

    protected $fillable =["nom","prenom","telephone","societe","email","civilite","client_id"];

    public function client()
    {
       return $this->belongsTo(Client::class);
    }
}
