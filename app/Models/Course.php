<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

   
    protected $fillable =["date","chauffeur_id","voiture_id","passager_id"];
    
    public function chauffeur()
    {
       return $this->belongsTo(chauffeur::class);
    }

    public function voiture()
    {
       return $this->belongsTo(voiture::class);
    }

    public function Passager()
    {
       return $this->belongsTo(Passager::class);
    }
    
}
