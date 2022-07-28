<?php

namespace App\Models;

use App\Models\Client;
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
